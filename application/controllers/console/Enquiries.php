<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('EnquiriesModel');

	}

	public function index()
	{
		redirect(admin_url_string('enquiries/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('enquiries/overview');
        $config['total_rows'] = $this->EnquiriesModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['enquiries'] = $this->EnquiriesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','created','DESC');
		$this->mainvars['content']=$this->load->view(admin_url_string('enquiries/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

  	public function view()
	{
		$id = $this->input->post('id', TRUE);
		$enquiryRow = $this->EnquiriesModel->load($id);
		if(!$enquiryRow){
			redirect(admin_url_string('enquiries/overview'));
		}
		$edit['enquiry']= $enquiryRow;
		$this->load->view(admin_url_string('enquiries/view'), $edit);
	}

	
	public function delete($id)
	{

		$clientRow = $this->EnquiriesModel->load($id);
		if(!$clientRow){
			redirect(admin_url_string('enquiries/overview'));
		}
		$actionStatus=$this->EnquiriesModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('enquiries/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('enquiries/overview'));
		}
    }

	

}
