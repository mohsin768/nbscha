<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('StatisticsModel');
	}

	public function index()
	{
		$newdata = array('statistic_sort_field_filter',
		'statistic_sort_order_filter',
		'statistic_search_key_filter',
		'statistic_status_filter',
		'statistic_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('statistics/overview'));
	}

	public function overview($language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('language'=>$language);
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('statistic_status_filter')!=''){
			$cond['status']= $this->session->userdata('statistic_status_filter');
		}

		if($this->session->userdata('statistic_language_filter')!=''){
			$cond['language']= $this->session->userdata('statistic_language_filter');
		}

		if($this->session->userdata('statistic_search_key_filter')!=''){
			$like[] = array('field'=>'name', 'value' => $this->session->userdata('statistic_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('statistic_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('statistic_sort_field_filter');
			$sort_direction = $this->session->userdata('statistic_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = admin_url('statistics/overview/'.$language);
		$config['total_rows'] = $this->StatisticsModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['statistics'] = $this->StatisticsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('statistics/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('number', 'Number', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('statistics/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$image='';
			$config['upload_path'] = 'public/uploads/statistics';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image'))
			{
				$imagedata=$this->upload->data();
				$image=$imagedata['file_name'];
			}

			$maindata = array('icon' => $image,
			'icon_class' => $this->input->post('icon_class'),
			'number' => $this->input->post('number'),
			'status' => $this->input->post('status'));

			$descdata = array(
				'name' => $this->input->post('name'),
				'language' => $this->input->post('language'));

			$insertrow = $this->StatisticsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Statistic added successfully.'));
				redirect(admin_url_string('statistics/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('statistics/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('number', 'Number', 'required');
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
			$vars['statistic']= $this->StatisticsModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('statistics/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array(
				'icon_class' => $this->input->post('icon_class'),
				'number' => $this->input->post('number'), 
				'status' => $this->input->post('status'));

			$descdata = array(
				'statistics_id' => $id,
				'name' => $this->input->post('name'),
				'language' => $this->input->post('language'));

				$config['upload_path'] = 'public/uploads/statistics';
								$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
								$this->load->library('upload', $config);

					if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
						$maindata['icon']='';
					} else{

						if($this->upload->do_upload('image'))
						{
								$imagedata=$this->upload->data();
								$maindata['icon']=$imagedata['file_name'];
						}
					}

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->StatisticsModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->StatisticsModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('statistics/overview/'.$lang));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('statistics/overview/'.$lang));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->StatisticsModel->getTranslates($cond);
		$vars['statistic_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('statistics/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->StatisticsModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'statistic deleted successfully.'));
			redirect(admin_url_string('statistics/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('statistics/overview'));
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
				$actionStatus=$this->StatisticsModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->StatisticsModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('statistic_sort_field_filter'  => $sortField);

					if($this->session->userdata('statistic_sort_order_filter')=='asc'){
						$newdata['statistic_sort_order_filter'] = 'desc';
					} else{
						$newdata['statistic_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('statistic_sort_order_filter','statistic_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('statistic_sort_field_filter','statistic_sort_order_filter',
				'statistic_search_key_filter','statistic_status_filter','statistic_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('statistic_search_key')!=''||
				$this->input->post('statistic_language')!=''||
					 $this->input->post('statistic_status')!=''){
						$newdata = array(
								'statistic_search_key_filter'  => $this->input->post('statistic_search_key'),
								'statistic_language_filter'  => $this->input->post('statistic_language'),
								'statistic_status_filter'  => $this->input->post('statistic_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('statistic_search_key_filter','statistic_status_filter','statistic_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('statistics/overview'));
	}


}
