<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('FormsModel');
		$this->load->model('ResourceTypesModel');
	}

	public function index()
	{
		$newdata = array('form_sort_field_filter',
		'form_sort_order_filter',
		'form_search_key_filter',
		'form_status_filter',
		'form_type_filter',
		'form_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('forms/overview'));
	}

	public function overview()
	{
		$cond = $like = array();
		$sort_direction =	$sort_field =  '';

		if($this->session->userdata('form_status_filter')!=''){
			$cond['status']= $this->session->userdata('form_status_filter');
		}

		if($this->session->userdata('form_language_filter')!=''){
			$cond['language']= $this->session->userdata('form_language_filter');
		}
		if($this->session->userdata('form_type_filter')!=''){
			$cond['type']= $this->session->userdata('form_type_filter');
		}
		if($this->session->userdata('form_search_key_filter')!=''){
			$like[] = array('field'=>'name', 'value' => $this->session->userdata('form_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('form_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('form_sort_field_filter');
			$sort_direction = $this->session->userdata('form_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('forms/overview');
    $config['total_rows'] = $this->FormsModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['forms'] = $this->FormsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$vars['resourse_types'] = $this->ResourceTypesModel->getResourceTypes();
		$this->mainvars['content']=$this->load->view(admin_url_string('forms/overview'),$vars,true);
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
			$this->mainvars['content'] = $this->load->view(admin_url_string('forms/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$attachment='';
			$config['upload_path'] = 'public/uploads/forms';
			$config['allowed_types'] = 'pdf|png|jpeg|jpg|doc|docx|xlsx|csv|xls';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('attachment'))
			{
				$attachmentdata=$this->upload->data();
				$attachment=$attachmentdata['file_name'];
			}
			$publish_date = date('Y-m-d',strtotime($this->input->post('publish_date')));
			$maindata = array('attachment' => $attachment,
			'type' => $this->input->post('type'),
			'publish_date' => $publish_date,
			'status' => $this->input->post('status'));

			$descdata = array(
				'name' => $this->input->post('name'),
				'language' => $this->input->post('language'));

			$insertrow = $this->FormsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Form added successfully.'));
				redirect(admin_url_string('forms/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('forms/overview'));
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
			$vars['form']= $this->FormsModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$vars['resourse_types'] = $this->ResourceTypesModel->getResourceTypes();
			$this->mainvars['content'] = $this->load->view(admin_url_string('forms/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$publish_date = date('Y-m-d',strtotime($this->input->post('publish_date')));
			$maindata = array('attachment' => $attachment,
			'type' => $this->input->post('type'),
			'publish_date' => $publish_date,
			'status' => $this->input->post('status'));

			$descdata = array(
				'form_id' => $id,
				'name' => $this->input->post('name'),
				'language' => $this->input->post('language'));

				$config['upload_path'] = 'public/uploads/forms';
								$config['allowed_types'] = 'pdf|png|jpeg|jpg|doc|docx|xlsx|csv|xls';
								$this->load->library('upload', $config);

					if($this->input->post('remove_attachment') && $this->input->post('remove_attachment')=='1'){
						$maindata['attachment']='';
					} else{

						if($this->upload->do_upload('attachment'))
						{
								$attachmentdata=$this->upload->data();
								$maindata['attachment']=$attachmentdata['file_name'];
						}
					}

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->FormsModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->FormsModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('forms/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('forms/overview'));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->FormsModel->getTranslates($cond);
		$vars['form_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('forms/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->FormsModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Form deleted successfully.'));
			redirect(admin_url_string('forms/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('forms/overview'));
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
				$actionStatus=$this->FormsModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->FormsModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('form_sort_field_filter'  => $sortField);

					if($this->session->userdata('form_sort_order_filter')=='asc'){
						$newdata['form_sort_order_filter'] = 'desc';
					} else{
						$newdata['form_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('form_sort_order_filter','form_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('form_sort_field_filter','form_sort_order_filter',
				'form_search_key_filter','form_status_filter','form_type_filter','form_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('form_search_key')!=''||
				$this->input->post('form_type')!=''||
				$this->input->post('form_language')!=''||
					 $this->input->post('form_status')!=''){
						$newdata = array(
								'form_search_key_filter'  => $this->input->post('form_search_key'),
								'form_language_filter'  => $this->input->post('form_language'),
								'form_type_filter'  => $this->input->post('form_type'),
								'form_status_filter'  => $this->input->post('form_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('form_search_key_filter','form_status_filter','form_type_filter','form_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('forms/overview'));
	}


}
