<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('ManualContentsModel');
		$this->load->model('ManualsModel');
		$this->load->model('SectionsModel');
	}

	public function index()
	{
		$newdata = array('manual_content_sort_field_filter',
		'manual_content_sort_order_filter',
		'manual_content_search_key_filter',
		'manual_content_status_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('contents/overview'));
	}

	public function overview($manualId,$sectionId,$language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('manual_id'=>$manualId,'section'=>$sectionId,'language'=>$language);
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('manual_content_status_filter')!=''){
			$cond['status']= $this->session->userdata('manual_content_status_filter');
		}

		if($this->session->userdata('manual_content_search_key_filter')!=''){
			$like[] = array('field'=>'title', 'value' => $this->session->userdata('manual_content_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('manual_content_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('manual_content_sort_field_filter');
			$sort_direction = $this->session->userdata('manual_content_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = admin_url('contents/overview/'.$manualId.'/'.$sectionId.'/'.$language);
		$config['total_rows'] = $this->ManualContentsModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['manual']= $this->ManualsModel->getRowCond(array('id'=>$manualId,'language'=>$language));
		$vars['section']= $this->SectionsModel->getRowCond(array('id'=>$sectionId,'language'=>$language));
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['contents'] = $this->ManualContentsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('contents/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('contents/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'language' => $this->input->post('language'));

			$insertrow = $this->ManualContentsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Policy added successfully.'));
				redirect(admin_url_string('contents/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('contents/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
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
			$vars['policy']= $this->ManualContentsModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('contents/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'manual_contents_id' => $id,
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'language' => $this->input->post('language'));

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->ManualContentsModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->ManualContentsModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('contents/overview/'.$lang));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('contents/overview/'.$lang));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->ManualContentsModel->getTranslates($cond);
		$vars['manual_contents_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('contents/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->ManualContentsModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Policy deleted successfully.'));
			redirect(admin_url_string('contents/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('contents/overview'));
		}
	}

	function actions($manualId,$sectionId,$language)
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
				$actionStatus=$this->ManualContentsModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->ManualContentsModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
			$sortField = $this->input->post('sort_field');
			$newdata = array('manual_content_sort_field_filter'  => $sortField);

			if($this->session->userdata('manual_content_sort_order_filter')=='asc'){
				$newdata['manual_content_sort_order_filter'] = 'desc';
			} else{
				$newdata['manual_content_sort_order_filter'] = 'asc';
			}
			$this->session->set_userdata($newdata);
		}else{
			$newdata = array('manual_content_sort_order_filter','manual_content_sort_field_filter');
			$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('manual_content_sort_field_filter','manual_content_sort_order_filter',
				'manual_content_search_key_filter','manual_content_status_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('manual_content_search_key')!=''||
				$this->input->post('manual_content_language')!=''||
					 $this->input->post('manual_content_status')!=''){
						$newdata = array(
								'manual_content_search_key_filter'  => $this->input->post('manual_content_search_key'),
								'manual_content_status_filter'  => $this->input->post('manual_content_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('manual_content_search_key_filter','manual_content_status_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('contents/overview/'.$manualId.'/'.$sectionId.'/'.$language));
	}


}
