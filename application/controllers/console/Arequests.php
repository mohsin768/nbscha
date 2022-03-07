<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arequests extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('ArequestsModel');
		$this->load->model('AoptionsModel');

	}

	public function index()
	{
		redirect(admin_url_string('arequests/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('arequests/overview');
        $config['total_rows'] = $this->ArequestsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['aoptions'] = $this->AoptionsModel->getIdPair();
		$vars['arequests'] = $this->ArequestsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','created','DESC');
		$this->mainvars['content']=$this->load->view(admin_url_string('arequests/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

  	public function view()
	{
		$id = $this->input->post('id', TRUE);
		$enquiryRow = $this->ArequestsModel->load($id);
		if(!$enquiryRow){
			redirect(admin_url_string('arequests/overview'));
		}
		$edit['arequest']= $enquiryRow;
		$edit['aoptions'] = $this->AoptionsModel->getIdPair();
		$this->load->view(admin_url_string('arequests/view'), $edit);
	}

	
	public function delete($id)
	{

		$clientRow = $this->ArequestsModel->load($id);
		if(!$clientRow){
			redirect(admin_url_string('arequests/overview'));
		}
		$actionStatus=$this->ArequestsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('arequests/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('arequests/overview'));
		}
    }

	

}
