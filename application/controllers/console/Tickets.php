<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('TicketsModel');
		$this->load->model('EventsModel');
	}

	public function index()
	{
		redirect(admin_url_string('tickets/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('tickets/overview');
        $config['total_rows'] = $this->TicketsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['events'] = $this->EventsModel->getIdPair();
		$vars['tickets'] = $this->TicketsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('tickets/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('event', 'Event', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$vars['events'] = $this->EventsModel->getIdPair();
			$this->mainvars['content'] = $this->load->view(admin_url_string('tickets/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data=array(
				'event'=>$this->input->post('event'),
				'title'=>$this->input->post('title'),
				'price'=>$this->input->post('price'),
				'body'=>$this->input->post('body'),
				'link_title'=>$this->input->post('link_title'),
				'link_url'=>$this->input->post('link_url'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			$insertid = $this->TicketsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('tickets/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('tickets/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$this->ckeditorCall();
		$ticketRow = $this->TicketsModel->load($id);
		if(!$ticketRow){
			redirect(admin_url_string('tickets/overview'));
		}
		$this->form_validation->set_rules('event', 'Event', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
    	$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['events'] = $this->EventsModel->getIdPair();
			$edit['ticket']= $this->TicketsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('tickets/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'event'=>$this->input->post('event'),
				'title'=>$this->input->post('title'),
				'price'=>$this->input->post('price'),
				'body'=>$this->input->post('body'),
				'link_title'=>$this->input->post('link_title'),
				'link_url'=>$this->input->post('link_url'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->TicketsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('tickets/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('tickets/overview'));
			}
		}
	}

	
	public function delete($id)
	{
		$ticketRow = $this->TicketsModel->load($id);
		if(!$ticketRow){
			redirect(admin_url_string('tickets/overview'));
		}
		$actionStatus=$this->TicketsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('tickets/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('tickets/overview'));
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
				$actionStatus=$this->TicketsModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->TicketsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('tickets/overview'));
	}

	

}
