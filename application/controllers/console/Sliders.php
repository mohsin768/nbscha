<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('SlidersModel');
	}

	public function index()
	{
		$newdata = array('slider_sort_field_filter',
		'slider_sort_order_filter',
		'slider_search_key_filter',
		'slider_status_filter',
		'slider_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('sliders/overview'));
	}

	public function overview()
	{
		$cond = array();
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('slider_status_filter')!=''){
			$cond['status']= $this->session->userdata('slider_status_filter');
		}

		if($this->session->userdata('slider_language_filter')!=''){
			$cond['language']= $this->session->userdata('slider_language_filter');
		}

		if($this->session->userdata('slider_search_key_filter')!=''){
			$like[] = array('field'=>'title', 'value' => $this->session->userdata('slider_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('slider_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('slider_sort_field_filter');
			$sort_direction = $this->session->userdata('slider_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('sliders/overview');
    $config['total_rows'] = $this->SlidersModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['sliders'] = $this->SlidersModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('sliders/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('sliders/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$this->load->library('upload');
			$image='';
			$video='';
			$config['upload_path'] = 'public/uploads/sliders/images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->upload->initialize($config);
			if($this->upload->do_upload('image'))
			{
				$imagedata=$this->upload->data();
				$image=$imagedata['file_name'];
			}

			$configVideo['upload_path'] = 'public/uploads/sliders/videos';
			$configVideo['allowed_types'] = 'mp4|webm';
			$this->upload->initialize($configVideo);
			if($this->upload->do_upload('video'))
			{
				$videodata=$this->upload->data();
				$video=$videodata['file_name'];
			}

			$maindata = array('image' => $image,
			'video' => $video,
			'status' => $this->input->post('status'));

			$descdata = array(
				'title' => $this->input->post('title'),
				'subtitle' => $this->input->post('subtitle'),
				'summary' => $this->input->post('summary'),
				'link_url' => $this->input->post('link_url'),
				'link_title' => $this->input->post('link_title'),
				'language' => $this->input->post('language'));

			$insertrow = $this->SlidersModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Slider added successfully.'));
				redirect(admin_url_string('sliders/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('sliders/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$langCond = $lang;
			if($translate=='translate'){
				$langCond = $this->default_language;
			}
			$vars['language'] = $lang;
			$vars['translate'] = $translate;
			$vars['slider']= $this->SlidersModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('sliders/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$this->load->library('upload');
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'slider_id' => $id,
				'title' => $this->input->post('title'),
				'subtitle' => $this->input->post('subtitle'),
				'summary' => $this->input->post('summary'),
				'link_url' => $this->input->post('link_url'),
				'link_title' => $this->input->post('link_title'),
				'language' => $this->input->post('language'));

				$config['upload_path'] = 'public/uploads/sliders/images';
								$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
								$this->upload->initialize($config);

					if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
						$maindata['image']='';
					} else{
						if($this->upload->do_upload('image'))
						{
								$imagedata=$this->upload->data();
								$maindata['image']=$imagedata['file_name'];
						}
					}

					$configVideo['upload_path'] = 'public/uploads/sliders/videos';
									$configVideo['allowed_types'] = 'mp4|webm';
									$this->upload->initialize($configVideo);

						if($this->input->post('remove_video') && $this->input->post('remove_video')=='1'){
							$maindata['video']='';
						} else{
							if($this->upload->do_upload('video'))
							{
									$videodata=$this->upload->data();
									$maindata['video']=$videodata['file_name'];
							}
						}

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->SlidersModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->SlidersModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('sliders/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('sliders/overview'));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->SlidersModel->getTranslates($cond);
		$vars['slider_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('sliders/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->SlidersModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'slider deleted successfully.'));
			redirect(admin_url_string('sliders/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('sliders/overview'));
		}
	}

	function actions()
	{
		$actionStatus=false;
		$ids=$this->input->post('id');
		$sort_orders=$this->input->post('sort_order');

		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='1';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='0';}
		if(isset($status) && isset($_POST['id'])){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$cond=array('id'=>$id);
				$actionStatus=$this->SlidersModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->SlidersModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('slider_sort_field_filter'  => $sortField);

					if($this->session->userdata('slider_sort_order_filter')=='asc'){
						$newdata['slider_sort_order_filter'] = 'desc';
					} else{
						$newdata['slider_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('slider_sort_order_filter','slider_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('slider_sort_field_filter','slider_sort_order_filter',
				'slider_search_key_filter','slider_status_filter','slider_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('slider_search_key')!=''||
				$this->input->post('slider_language')!=''||
					 $this->input->post('slider_status')!=''){
						$newdata = array(
								'slider_search_key_filter'  => $this->input->post('slider_search_key'),
								'slider_language_filter'  => $this->input->post('slider_language'),
								'slider_status_filter'  => $this->input->post('slider_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('slider_search_key_filter','slider_status_filter','slider_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('sliders/overview'));
	}


}
