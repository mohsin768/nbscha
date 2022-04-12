<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regions extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('RegionsModel');
	}

	public function index()
	{
		$newdata = array('region_sort_field_filter',
		'region_sort_order_filter',
		'region_search_key_filter',
		'region_status_filter',
		'region_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('regions/overview'));
	}

	public function overview($language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('delete_status'=>'0','language'=>$language);
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('region_status_filter')!=''){
			$cond['status']= $this->session->userdata('region_status_filter');
		}

		if($this->session->userdata('region_language_filter')!=''){
			$cond['language']= $this->session->userdata('region_language_filter');
		}

		if($this->session->userdata('region_search_key_filter')!=''){
			$like[] = array('field'=>'region_name', 'value' => $this->session->userdata('region_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('region_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('region_sort_field_filter');
			$sort_direction = $this->session->userdata('region_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = admin_url('regions/overview/'.$language);
		$config['total_rows'] = $this->RegionsModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['regions'] = $this->RegionsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('regions/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->form_validation->set_rules('region_name', 'Title', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('regions/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'region_name' => $this->input->post('region_name'),
				'language' => $this->input->post('language'));

			$insertrow = $this->RegionsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Region added successfully.'));
				redirect(admin_url_string('regions/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('regions/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->form_validation->set_rules('region_name', 'Title', 'required');
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
			$vars['region']= $this->RegionsModel->getRowCond(array('rid'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('regions/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'region_id' => $id,
				'region_name' => $this->input->post('region_name'),
				'language' => $this->input->post('language'));

				$cond = array('rid'=>$id);
				if($translate=='translate'){
					$updaterow = $this->RegionsModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->RegionsModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('regions/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('regions/overview'));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('rid'=>$id);
		$vars['translates'] = $this->RegionsModel->getTranslates($cond);
		$vars['region_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('regions/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($rid) {
		$data = array('delete_status' => '1','status'=>'0');
		$cond = array('rid'=>$rid);
		$updaterow = $this->RegionsModel->updateCond($data,$cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'region deleted successfully.'));
			redirect(admin_url_string('regions/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('regions/overview'));
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
				$cond=array('rid'=>$id);
				$actionStatus=$this->RegionsModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('rid'=>$id);
					$actionStatus=$this->RegionsModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('region_sort_field_filter'  => $sortField);

					if($this->session->userdata('region_sort_order_filter')=='asc'){
						$newdata['region_sort_order_filter'] = 'desc';
					} else{
						$newdata['region_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('region_sort_order_filter','region_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('region_sort_field_filter','region_sort_order_filter',
				'region_search_key_filter','region_status_filter','region_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('region_search_key')!=''||
				$this->input->post('region_language')!=''||
					 $this->input->post('region_status')!=''){
						$newdata = array(
								'region_search_key_filter'  => $this->input->post('region_search_key'),
								'region_language_filter'  => $this->input->post('region_language'),
								'region_status_filter'  => $this->input->post('region_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('region_search_key_filter','region_status_filter','region_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('regions/overview'));
	}


}
