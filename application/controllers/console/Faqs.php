<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('FaqsModel');

	}

	public function index()
	{
		redirect(admin_url_string('faqs/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('faqs/overview');
        $config['total_rows'] = $this->FaqsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['faqs'] = $this->FaqsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('faqs/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('question', 'question', 'required');
		$this->form_validation->set_rules('answer', 'answer', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('faqs/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data=array(
				
				'question'=>$this->input->post('question'),
				'answer'=>$this->input->post('answer'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status'),
			);
			$insertid = $this->FaqsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('faqs/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('faqs/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$this->ckeditorCall();
		$faqRow = $this->FaqsModel->load($id);
		if(!$faqRow){
			redirect(admin_url_string('faqs/overview'));
		}
		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
    	$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['faq']= $this->FaqsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('faqs/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'status'=>$this->input->post('status'),
				'question'=>$this->input->post('question'),
				'answer'=>$this->input->post('answer'),
				'sort_order'=>$this->input->post('sort_order')
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->FaqsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('faqs/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('faqs/overview'));
			}
		}
	}

	
	public function delete($id)
	{
		$faqRow = $this->FaqsModel->load($id);
		if(!$faqRow){
			redirect(admin_url_string('faqs/overview'));
		}
		$actionStatus=$this->FaqsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('faqs/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('faqs/overview'));
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
				$actionStatus=$this->FaqsModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->FaqsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('faqs/overview'));
	}

	

}
