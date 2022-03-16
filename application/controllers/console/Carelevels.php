<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carelevels extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('CarelevelsModel');
	}

	public function index()
	{
		$newdata = array('carelevel_sort_field_filter',
		'carelevel_sort_order_filter',
		'carelevel_search_key_filter',
		'carelevel_status_filter',
		'carelevel_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('carelevels/overview'));
	}

	public function overview()
	{
		$cond = array('delete_status'=>'0');
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('carelevel_status_filter')!=''){
			$cond['status']= $this->session->userdata('carelevel_status_filter');
		}

		if($this->session->userdata('carelevel_language_filter')!=''){
			$cond['language']= $this->session->userdata('carelevel_language_filter');
		}

		if($this->session->userdata('carelevel_search_key_filter')!=''){
			$like[] = array('field'=>'carelevel_title', 'value' => $this->session->userdata('carelevel_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('carelevel_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('carelevel_sort_field_filter');
			$sort_direction = $this->session->userdata('carelevel_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('carelevels/overview');
    $config['total_rows'] = $this->CarelevelsModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['carelevels'] = $this->CarelevelsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('carelevels/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->form_validation->set_rules('carelevel_title', 'Title', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('carelevels/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'carelevel_title' => $this->input->post('carelevel_title'),
				'language' => $this->input->post('language'));

			$insertrow = $this->CarelevelsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Carelevel added successfully.'));
				redirect(admin_url_string('carelevels/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('carelevels/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->form_validation->set_rules('carelevel_title', 'Title', 'required');
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
			$vars['carelevel']= $this->CarelevelsModel->getRowCond(array('cid'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('carelevels/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'carelevel_id' => $id,
				'carelevel_title' => $this->input->post('carelevel_title'),
				'language' => $this->input->post('language'));

				$cond = array('cid'=>$id);
				if($translate=='translate'){
					$updaterow = $this->CarelevelsModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->CarelevelsModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('carelevels/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('carelevels/overview'));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('cid'=>$id);
		$vars['translates'] = $this->CarelevelsModel->getTranslates($cond);
		$vars['carelevel_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('carelevels/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($cid) {
		$data = array('delete_status' => '1','status'=>'0');
		$cond = array('cid'=>$cid);
		$updaterow = $this->CarelevelsModel->updateCond($data,$cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'carelevel deleted successfully.'));
			redirect(admin_url_string('carelevels/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('carelevels/overview'));
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
				$cond=array('cid'=>$id);
				$actionStatus=$this->CarelevelsModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('cid'=>$id);
					$actionStatus=$this->CarelevelsModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('carelevel_sort_field_filter'  => $sortField);

					if($this->session->userdata('carelevel_sort_order_filter')=='asc'){
						$newdata['carelevel_sort_order_filter'] = 'desc';
					} else{
						$newdata['carelevel_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('carelevel_sort_order_filter','carelevel_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('carelevel_sort_field_filter','carelevel_sort_order_filter',
				'carelevel_search_key_filter','carelevel_status_filter','carelevel_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('carelevel_search_key')!=''||
				$this->input->post('carelevel_language')!=''||
					 $this->input->post('carelevel_status')!=''){
						$newdata = array(
								'carelevel_search_key_filter'  => $this->input->post('carelevel_search_key'),
								'carelevel_language_filter'  => $this->input->post('carelevel_language'),
								'carelevel_status_filter'  => $this->input->post('carelevel_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('carelevel_search_key_filter','carelevel_status_filter','carelevel_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('carelevels/overview'));
	}


}
