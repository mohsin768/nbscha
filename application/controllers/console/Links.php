<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Links extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('LinksModel');
		$this->load->model('ResourceTypesModel');
	}

	public function index()
	{
		$newdata = array('link_sort_field_filter',
		'link_sort_order_filter',
		'link_search_key_filter',
		'link_status_filter',
		'link_type_filter',
		'link_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('links/overview'));
	}

	public function overview()
	{
		$cond = array();
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('link_status_filter')!=''){
			$cond['status']= $this->session->userdata('link_status_filter');
		}

		if($this->session->userdata('link_language_filter')!=''){
			$cond['language']= $this->session->userdata('link_language_filter');
		}
		if($this->session->userdata('link_type_filter')!=''){
			$cond['type']= $this->session->userdata('link_type_filter');
		}
		if($this->session->userdata('link_search_key_filter')!=''){
			$like[] = array('field'=>'name', 'value' => $this->session->userdata('link_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('link_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('link_sort_field_filter');
			$sort_direction = $this->session->userdata('link_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('links/overview');
    $config['total_rows'] = $this->LinksModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['links'] = $this->LinksModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$vars['resourse_types'] = $this->ResourceTypesModel->getResourceTypes();
		$this->mainvars['content']=$this->load->view(admin_url_string('links/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$vars['resourse_types'] = $this->ResourceTypesModel->getResourceTypes();
			$this->mainvars['content'] = $this->load->view(admin_url_string('links/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$image='';
			$config['upload_path'] = 'public/uploads/links';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image'))
			{
				$imagedata=$this->upload->data();
				$image=$imagedata['file_name'];
			}

			$maindata = array('image' => $image,
			'type' => $this->input->post('type'),
			'status' => $this->input->post('status'));

			$descdata = array(
				'name' => $this->input->post('name'),
				'summary' => $this->input->post('summary'),
				'link_url' => $this->input->post('link_url'),
				'language' => $this->input->post('language'));

			$insertrow = $this->LinksModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Link added successfully.'));
				redirect(admin_url_string('links/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('links/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
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
			$vars['link']= $this->LinksModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$vars['resourse_types'] = $this->ResourceTypesModel->getResourceTypes();
			$this->mainvars['content'] = $this->load->view(admin_url_string('links/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('type' => $this->input->post('type'),
												'status' => $this->input->post('status'));

			$descdata = array(
				'link_id' => $id,
				'name' => $this->input->post('name'),
				'summary' => $this->input->post('summary'),
				'link_url' => $this->input->post('link_url'),
				'language' => $this->input->post('language'));

				$config['upload_path'] = 'public/uploads/links';
								$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
								$this->load->library('upload', $config);

					if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
						$maindata['image']='';
					} else{

						if($this->upload->do_upload('image'))
						{
								$imagedata=$this->upload->data();
								$maindata['image']=$imagedata['file_name'];
						}
					}

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->LinksModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->LinksModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('links/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('links/overview'));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->LinksModel->getTranslates($cond);
		$vars['link_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('links/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->LinksModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'link deleted successfully.'));
			redirect(admin_url_string('links/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('links/overview'));
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
				$actionStatus=$this->LinksModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->LinksModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('link_sort_field_filter'  => $sortField);

					if($this->session->userdata('link_sort_order_filter')=='asc'){
						$newdata['link_sort_order_filter'] = 'desc';
					} else{
						$newdata['link_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('link_sort_order_filter','link_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('link_sort_field_filter','link_sort_order_filter',
				'link_search_key_filter','link_status_filter','link_type_filter','link_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('link_search_key')!=''||
				$this->input->post('link_type')!=''||
				$this->input->post('link_language')!=''||
					 $this->input->post('link_status')!=''){
						$newdata = array(
								'link_search_key_filter'  => $this->input->post('link_search_key'),
								'link_language_filter'  => $this->input->post('link_language'),
								'link_type_filter'  => $this->input->post('link_type'),
								'link_status_filter'  => $this->input->post('link_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('link_search_key_filter','link_status_filter','link_type_filter','link_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('links/overview'));
	}


}