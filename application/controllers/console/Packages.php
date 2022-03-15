<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('PackagesModel');
	}

	public function index()
	{
		$newdata = array('package_sort_field_filter',
		'package_sort_order_filter',
		'package_search_key_filter',
		'package_status_filter',
		'package_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('packages/overview'));
	}

	public function overview()
	{
		$cond = array('delete_status'=>'0');
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'pid';

		if($this->session->userdata('package_status_filter')!=''){
			$cond['status']= $this->session->userdata('package_status_filter');
		}

		if($this->session->userdata('package_search_key_filter')!=''){
			$like[] = array('field'=>'title', 'value' => $this->session->userdata('package_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('package_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('package_sort_field_filter');
			$sort_direction = $this->session->userdata('package_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('packages/overview');
    $config['total_rows'] = $this->PackagesModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['packages'] = $this->PackagesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('packages/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('bed_count', 'Beds', 'required|numeric');
		$this->form_validation->set_rules('price', 'Price', 'numeric');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['certificates'] = array('1'=>'Template1','2'=>'Template2','3'=>'Template3');
			$this->mainvars['content'] = $this->load->view(admin_url_string('packages/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$maindata = array(
				'bed_count' => $this->input->post('bed_count'),
				'price' => $this->input->post('price'),
				'certificate_template' => $this->input->post('certificate_template'),
				'status' => $this->input->post('status'));

			$descdata = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'language' => $this->input->post('language'));

			$insertrow = $this->PackagesModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Package added successfully.'));
				redirect(admin_url_string('packages/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('packages/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('bed_count', 'Beds', 'required|numeric');
		$this->form_validation->set_rules('price', 'Price', 'numeric');
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
			$vars['package']= $this->PackagesModel->getRowCond(array('pid'=>$id,'language'=>$langCond));
			$vars['certificates'] = array('1'=>'Template1','2'=>'Template2','3'=>'Template3');
			$this->mainvars['content'] = $this->load->view(admin_url_string('packages/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array(
				'bed_count' => $this->input->post('bed_count'),
				'price' => $this->input->post('price'),
				'certificate_template' => $this->input->post('certificate_template'),
				'status' => $this->input->post('status'));

			$descdata = array(
				'package_id' => $id,
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'language' => $this->input->post('language'));
				$cond = array('pid'=>$id);
				if($translate=='translate'){
					$updaterow = $this->PackagesModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->PackagesModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('packages/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('packages/overview'));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('pid'=>$id);
		$vars['translates'] = $this->PackagesModel->getTranslates($cond);
		$vars['package_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('packages/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($mid) {
		$data = array('delete_status' => '1','status'=>'0');
		$cond = array('mid'=>$mid);
		$updaterow = $this->PackagesModel->updateCond($data,$cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'package deleted successfully.'));
			redirect(admin_url_string('packages/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('packages/overview'));
		}
	}

	function actions()
	{
		$actionStatus=false;
		$ids=$this->input->post('id');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='1';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='0';}
		if(isset($status) && isset($_POST['id'])){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$cond=array('mid'=>$id);
				$actionStatus=$this->PackagesModel->updateCond($data,$cond);
			endforeach;
		}


		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('package_sort_field_filter'  => $sortField);

					if($this->session->userdata('package_sort_order_filter')=='asc'){
						$newdata['package_sort_order_filter'] = 'desc';
					} else{
						$newdata['package_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('package_sort_order_filter','package_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}



		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('package_sort_field_filter','package_sort_order_filter','package_search_key_filter','package_status_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('package_search_key')!=''||
					 $this->input->post('package_status')!=''){
						$newdata = array(
								'package_search_key_filter'  => $this->input->post('package_search_key'),
								'package_status_filter'  => $this->input->post('package_status'));
						$this->session->set_userdata($newdata);

						if($this->session->userdata('student_event_filter')!='' && !$this->EventBatchesModel->rowExists(array('bid'=>$this->session->userdata('student_batch_filter'),'event_id'=>$this->session->userdata('student_event_filter')))){
							$this->session->unset_userdata(array('student_batch_filter'));
						}
				} else {
					$newdata = array('package_search_key_filter','package_status_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('packages/overview'));
	}
}
