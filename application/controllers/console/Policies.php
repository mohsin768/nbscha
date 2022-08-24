<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policies extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('PoliciesModel');
	}

	public function index()
	{
		$newdata = array('policy_sort_field_filter',
		'policy_sort_order_filter',
		'policy_search_key_filter',
		'policy_status_filter',
		'policy_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('policies/overview'));
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

		if($this->session->userdata('policy_status_filter')!=''){
			$cond['status']= $this->session->userdata('policy_status_filter');
		}

		if($this->session->userdata('policy_language_filter')!=''){
			$cond['language']= $this->session->userdata('policy_language_filter');
		}

		if($this->session->userdata('policy_search_key_filter')!=''){
			$like[] = array('field'=>'title', 'value' => $this->session->userdata('policy_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('policy_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('policy_sort_field_filter');
			$sort_direction = $this->session->userdata('policy_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = admin_url('policies/overview/'.$language);
		$config['total_rows'] = $this->PoliciesModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['policies'] = $this->PoliciesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('policies/overview'),$vars,true);
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
			$this->mainvars['content'] = $this->load->view(admin_url_string('policies/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'language' => $this->input->post('language'));

			$insertrow = $this->PoliciesModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Policy added successfully.'));
				redirect(admin_url_string('policies/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('policies/overview'));
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
			$vars['policy']= $this->PoliciesModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('policies/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'manual_policies_id' => $id,
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'language' => $this->input->post('language'));

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->PoliciesModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->PoliciesModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('policies/overview/'.$lang));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('policies/overview/'.$lang));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->PoliciesModel->getTranslates($cond);
		$vars['manual_policies_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('policies/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->PoliciesModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Policy deleted successfully.'));
			redirect(admin_url_string('policies/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('policies/overview'));
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
				$actionStatus=$this->PoliciesModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->PoliciesModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('policy_sort_field_filter'  => $sortField);

					if($this->session->userdata('policy_sort_order_filter')=='asc'){
						$newdata['policy_sort_order_filter'] = 'desc';
					} else{
						$newdata['policy_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('policy_sort_order_filter','policy_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('policy_sort_field_filter','policy_sort_order_filter',
				'policy_search_key_filter','policy_status_filter','policy_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('policy_search_key')!=''||
				$this->input->post('policy_language')!=''||
					 $this->input->post('policy_status')!=''){
						$newdata = array(
								'policy_search_key_filter'  => $this->input->post('policy_search_key'),
								'policy_language_filter'  => $this->input->post('policy_language'),
								'policy_status_filter'  => $this->input->post('policy_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('policy_search_key_filter','policy_status_filter','policy_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('policies/overview'));
	}


}
