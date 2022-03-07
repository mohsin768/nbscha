<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Srequests extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('SrequestsModel');
		$this->load->model('StypesModel');
		$this->load->helper('fmts_helper');

	}

	public function index()
	{
		redirect(admin_url_string('srequests/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('srequests/overview');
        $config['total_rows'] = $this->SrequestsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['stypes'] = $this->StypesModel->getIdPair();
		$vars['srequests'] = $this->SrequestsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','created','DESC');
		$this->mainvars['content']=$this->load->view(admin_url_string('srequests/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

  	public function view()
	{
		$id = $this->input->post('id', TRUE);
		$enquiryRow = $this->SrequestsModel->load($id);
		if(!$enquiryRow){
			redirect(admin_url_string('srequests/overview'));
		}
		$edit['stypes'] = $this->StypesModel->getIdPair();
		$edit['srequest']= $enquiryRow;
		$this->load->view(admin_url_string('srequests/view'), $edit);
	}

	
	public function delete($id)
	{

		$clientRow = $this->SrequestsModel->load($id);
		if(!$clientRow){
			redirect(admin_url_string('srequests/overview'));
		}
		$actionStatus=$this->SrequestsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('srequests/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('srequests/overview'));
		}
    }

	

}
