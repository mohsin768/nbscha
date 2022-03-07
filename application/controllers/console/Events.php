<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('EventsModel');

	}

	public function index()
	{
		redirect(admin_url_string('events/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('events/overview');
        $config['total_rows'] = $this->EventsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['events'] = $this->EventsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','start_date','DESC');
		$this->mainvars['content']=$this->load->view(admin_url_string('events/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('end_date', 'End Date', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('events/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data=array(
				'title'=>$this->input->post('title'),
				'start_date'=> date("Y-m-d", strtotime($this->input->post('start_date'))),
				'end_date'=> date("Y-m-d", strtotime($this->input->post('end_date')))
			);
			$insertid = $this->EventsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('events/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('events/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$eventRow = $this->EventsModel->load($id);
		if(!$eventRow){
			redirect(admin_url_string('events/overview'));
		}
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('end_date', 'End Date', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['event']= $this->EventsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('events/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'title'=>$this->input->post('title'),
				'start_date'=> date("Y-m-d", strtotime($this->input->post('start_date'))),
				'end_date'=> date("Y-m-d", strtotime($this->input->post('end_date')))
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->EventsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('events/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('events/overview'));
			}
		}
	}

	
	public function delete($id)
	{
		$eventRow = $this->EventsModel->load($id);
		if(!$eventRow){
			redirect(admin_url_string('events/overview'));
		}
		$actionStatus=$this->EventsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('events/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('events/overview'));
		}
    }

	public function activate($id)
	{
		$eventRow = $this->EventsModel->load($id);
		if(!$eventRow){
			redirect(admin_url_string('events/overview'));
		}
		$resetData=array(
			'status'=>'0'
		);
		$this->EventsModel->updateCond($resetData,array());
		$data=array(
			'status'=>'1'
		);
		$cond = array('id' => $id);
		$actionStatus=$this->EventsModel->updateCond($data,$cond);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Activated Successfully.'));
			redirect(admin_url_string('events/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('events/overview'));
		}
    }

	

}
