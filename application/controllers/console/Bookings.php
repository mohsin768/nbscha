<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('BookingsModel');
		$this->load->model('PackagesModel');

	}

	public function index()
	{
		redirect(admin_url_string('bookings/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('bookings/overview');
        $config['total_rows'] = $this->BookingsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['packages'] = $this->PackagesModel->getIdPair();
		$vars['bookings'] = $this->BookingsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','created','DESC');
		$this->mainvars['content']=$this->load->view(admin_url_string('bookings/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	public function view()
	{
		$id = $this->input->post('id', TRUE);
		$bookingRow = $this->BookingsModel->load($id);
		if(!$bookingRow){
			redirect(admin_url_string('bookings/overview'));
		}
		$edit['packages'] = $this->PackagesModel->getIdPair();
		$edit['booking']= $bookingRow;
		$this->load->view(admin_url_string('bookings/view'), $edit);
	}
	
	public function delete($id)
	{
		$bookingRow = $this->BookingsModel->load($id);
		if(!$bookingRow){
			redirect(admin_url_string('bookings/overview'));
		}
		$actionStatus=$this->BookingsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('bookings/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('bookings/overview'));
		}
    }

	

}
