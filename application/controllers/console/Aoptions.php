<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aoptions extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('AoptionsModel');
	}

	public function index()
	{
		redirect(admin_url_string('aoptions/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('aoptions/overview');
        $config['total_rows'] = $this->AoptionsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['aoptions'] = $this->AoptionsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('aoptions/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$vars=array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('aoptions/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data=array(
				'name'=>$this->input->post('name'),
				'price'=>$this->input->post('price'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			$insertid = $this->AoptionsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('aoptions/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('aoptions/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$this->ckeditorCall();
		$aoptionRow = $this->AoptionsModel->load($id);
		if(!$aoptionRow){
			redirect(admin_url_string('aoptions/overview'));
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['aoption']= $this->AoptionsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('aoptions/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'name'=>$this->input->post('name'),
				'price'=>$this->input->post('price'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->AoptionsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('aoptions/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('aoptions/overview'));
			}
		}
	}

	
	public function delete($id)
	{
		$aoptionRow = $this->AoptionsModel->load($id);
		if(!$aoptionRow){
			redirect(admin_url_string('aoptions/overview'));
		}
		$actionStatus=$this->AoptionsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('aoptions/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('aoptions/overview'));
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
				$actionStatus=$this->AoptionsModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->AoptionsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('aoptions/overview'));
	}

	

}
