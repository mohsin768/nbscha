<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('CompaniesModel');
	}
    

	public function index()
	{
        
		redirect(admin_url_string('companies/overview'));
	}

    public function overview($language='')
    {
		$cond = array('delete_status'=>'0');
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('companies/overview');
        $config['total_rows'] = $this->CompaniesModel->getPaginationCount($cond);
        $this->pagination->initialize($config);
		$vars['companies'] = $this->CompaniesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']), $cond);
		$this->mainvars['content']=$this->load->view(admin_url_string('companies/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
    }
	

	function add()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('contact_number', 'Contact Number', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = [];
			$this->mainvars['content'] = $this->load->view(admin_url_string('companies/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$this->load->helper('string');
			$salt = random_string('alnum', 60);
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'contact_number' => $this->input->post('contact_number'),
				'access_token' => $salt,
				'created_by' => $this->session->userdata('admin_user_id'),
				'updated_by' => $this->session->userdata('admin_user_id'),
				'status' => $this->input->post('status'));
			$insertrow = $this->CompaniesModel->insert($data);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Company added successfully.'));
				redirect(admin_url_string('companies/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
                redirect(admin_url_string('companies/overview'));
			}
		}
	}
	
	public function edit($id){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('contact_number', 'Contact Number', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['company'] =$this->CompaniesModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('companies/edit'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'contact_number' => $this->input->post('contact_number'),
				'access_token' => $this->input->post('access_token'),
				'updated_by' => $this->session->userdata('admin_user_id'),
				'status' => $this->input->post('status'));
			$insertrow = $this->CompaniesModel->update($id,$data);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Company edited successfully.'));
				redirect(admin_url_string('companies/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('companies/overview'));
			}
		}
	}
	
	function delete($id) {
		$data = array('delete_status' => '1','status'=>'0');
		$cond = array('id'=>$id);
		$updaterow = $this->CompaniesModel->updateCond($data,$cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Company deleted successfully.'));
			redirect(admin_url_string('companies/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('companies/overview'));
		}
	}


}