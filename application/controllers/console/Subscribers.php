<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('SubscribersModel');

	}

	public function index()
	{
		redirect(admin_url_string('subscribers/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('subscribers/overview');
        $config['total_rows'] = $this->SubscribersModel->getPaginationCount();
		$config['uri_segment'] = 4;
		$config['per_page'] = 15;
        $this->pagination->initialize($config);
		$vars['subscribers'] = $this->SubscribersModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','created','DESC');
		$this->mainvars['content']=$this->load->view(admin_url_string('subscribers/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}
	
	public function delete($id)
	{
		$subscriberRow = $this->SubscribersModel->load($id);
		if(!$subscriberRow){
			redirect(admin_url_string('subscribers/overview'));
		}
		$actionStatus=$this->SubscribersModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('subscribers/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('subscribers/overview'));
		}
    }

	

}
