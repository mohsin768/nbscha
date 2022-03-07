<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booths extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('BoothsModel');
		$this->load->model('PackagesModel');
	}

	public function index()
	{
		redirect(admin_url_string('booths/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('booths/overview');
        $config['total_rows'] = $this->BoothsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['packages'] = $this->PackagesModel->getIdPair();
		$vars['booths'] = $this->BoothsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('booths/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('package', 'Package', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$vars['packages'] = $this->PackagesModel->getIdPair();
			$this->mainvars['content'] = $this->load->view(admin_url_string('booths/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data=array(
				'package'=>$this->input->post('package'),
				'name'=>$this->input->post('name'),
				'price'=>$this->input->post('price'),
				'number'=>$this->input->post('number'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			$insertid = $this->BoothsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('booths/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('booths/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$this->ckeditorCall();
		$boothRow = $this->BoothsModel->load($id);
		if(!$boothRow){
			redirect(admin_url_string('booths/overview'));
		}
		$this->form_validation->set_rules('package', 'Package', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['packages'] = $this->PackagesModel->getIdPair();
			$edit['booth']= $this->BoothsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('booths/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'package'=>$this->input->post('package'),
				'name'=>$this->input->post('name'),
				'price'=>$this->input->post('price'),
				'number'=>$this->input->post('number'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->BoothsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('booths/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('booths/overview'));
			}
		}
	}

	
	public function delete($id)
	{
		$boothRow = $this->BoothsModel->load($id);
		if(!$boothRow){
			redirect(admin_url_string('booths/overview'));
		}
		$actionStatus=$this->BoothsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('booths/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('booths/overview'));
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
				$actionStatus=$this->BoothsModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->BoothsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('booths/overview'));
	}

	

}
