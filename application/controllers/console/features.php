<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Features extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('FeaturesModel');
	}

	public function index()
	{
		$newdata = array('feature_sort_field_filter',
		'feature_sort_order_filter',
		'feature_search_key_filter',
		'feature_status_filter',
		'feature_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('features/overview'));
	}

	public function overview()
	{
		$cond = array('delete_status'=>'0');
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('feature_status_filter')!=''){
			$cond['status']= $this->session->userdata('feature_status_filter');
		}

		if($this->session->userdata('feature_language_filter')!=''){
			$cond['language']= $this->session->userdata('feature_language_filter');
		}

		if($this->session->userdata('feature_search_key_filter')!=''){
			$like[] = array('field'=>'feature_title', 'value' => $this->session->userdata('feature_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('feature_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('feature_sort_field_filter');
			$sort_direction = $this->session->userdata('feature_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('features/overview');
    $config['total_rows'] = $this->FeaturesModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['features'] = $this->FeaturesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('features/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->form_validation->set_rules('feature_title', 'Title', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('features/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'feature_title' => $this->input->post('feature_title'),
				'language' => $this->input->post('language'));

			$insertrow = $this->FeaturesModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Feature added successfully.'));
				redirect(admin_url_string('features/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('features/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->form_validation->set_rules('feature_title', 'Title', 'required');
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
			$vars['feature']= $this->FeaturesModel->getRowCond(array('fid'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('features/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'feature_id' => $id,
				'feature_title' => $this->input->post('feature_title'),
				'language' => $this->input->post('language'));

				$cond = array('fid'=>$id);
				if($translate=='translate'){
					$updaterow = $this->FeaturesModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->FeaturesModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('features/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('features/overview'));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('fid'=>$id);
		$vars['translates'] = $this->FeaturesModel->getTranslates($cond);
		$vars['feature_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('features/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($fid) {
		$data = array('delete_status' => '1','status'=>'0');
		$cond = array('fid'=>$fid);
		$updaterow = $this->FeaturesModel->updateCond($data,$cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'feature deleted successfully.'));
			redirect(admin_url_string('features/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('features/overview'));
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
				$cond=array('fid'=>$id);
				$actionStatus=$this->FeaturesModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('fid'=>$id);
					$actionStatus=$this->FeaturesModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('feature_sort_field_filter'  => $sortField);

					if($this->session->userdata('feature_sort_order_filter')=='asc'){
						$newdata['feature_sort_order_filter'] = 'desc';
					} else{
						$newdata['feature_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('feature_sort_order_filter','feature_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('feature_sort_field_filter','feature_sort_order_filter',
				'feature_search_key_filter','feature_status_filter','feature_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('feature_search_key')!=''||
				$this->input->post('feature_language')!=''||
					 $this->input->post('feature_status')!=''){
						$newdata = array(
								'feature_search_key_filter'  => $this->input->post('feature_search_key'),
								'feature_language_filter'  => $this->input->post('feature_language'),
								'feature_status_filter'  => $this->input->post('feature_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('feature_search_key_filter','feature_status_filter','feature_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('features/overview'));
	}


}
