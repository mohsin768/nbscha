<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsors extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('SponsorsModel');
		$this->load->model('SponsorCategoriesModel');
		$this->load->model('EventsModel');

	}

	public function index()
	{
		redirect(admin_url_string('sponsors/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('sponsors/overview');
        $config['total_rows'] = $this->SponsorsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['events'] = $this->EventsModel->getIdPair();
		$vars['categories'] = $this->SponsorCategoriesModel->getIdPair();
		$vars['sponsors'] = $this->SponsorsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('sponsors/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->form_validation->set_rules('event', 'Event', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$vars['events'] = $this->EventsModel->getIdPair();
			$vars['categories'] = $this->SponsorCategoriesModel->getIdPair();
			$this->mainvars['content'] = $this->load->view(admin_url_string('sponsors/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$logo ='';
			$sponsorLogoUploadPath = 'public/uploads/sponsors/logos';
			if(!is_dir($sponsorLogoUploadPath)){
				mkdir($sponsorLogoUploadPath, 0777, TRUE);
			}
			$logoConfig['upload_path'] = $sponsorLogoUploadPath;
			$logoConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $logoConfig);
			$this->upload->initialize($logoConfig);
			if($this->upload->do_upload('logo'))
			{
				$logoData=$this->upload->data();
				$logo=$logoData['file_name'];
			}
			$data=array(
				'event'=>$this->input->post('event'),
				'category'=>$this->input->post('category'),
				'name'=>$this->input->post('name'),
				'logo' => $logo,
				'link_url'=>$this->input->post('link_url'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			$insertid = $this->SponsorsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('sponsors/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('sponsors/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$sponsorRow = $this->SponsorsModel->load($id);
		if(!$sponsorRow){
			redirect(admin_url_string('sponsors/overview'));
		}
		$this->form_validation->set_rules('event', 'Event', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['events'] = $this->EventsModel->getIdPair();
			$edit['categories'] = $this->SponsorCategoriesModel->getIdPair();
			$edit['sponsor']= $this->SponsorsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('sponsors/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'event'=>$this->input->post('event'),
				'category'=>$this->input->post('category'),
				'name'=>$this->input->post('name'),
				'link_url'=>$this->input->post('link_url'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			if($this->input->post('remove_logo') && $this->input->post('remove_logo')=='1'){
				$data['logo']='';
			} else{
			$sponsorLogoUploadPath = 'public/uploads/sponsors/logos';
			if(!is_dir($sponsorLogoUploadPath)){
				mkdir($sponsorLogoUploadPath, 0777, TRUE);
			}
			$logoConfig['upload_path'] = $sponsorLogoUploadPath;
			$logoConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $logoConfig);
			$this->upload->initialize($logoConfig);
				if($this->upload->do_upload('logo'))
				{
					$logoData=$this->upload->data();
					$data['logo']=$logoData['file_name'];
				}
			}
			
			$cond = array('id' => $id);
      		$actionStatus=$this->SponsorsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('sponsors/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('sponsors/overview'));
			}
		}
	}

	
	public function delete($id)
	{
		$sponsorRow = $this->SponsorsModel->load($id);
		if(!$sponsorRow){
			redirect(admin_url_string('sponsors/overview'));
		}
		$actionStatus=$this->SponsorsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('sponsors/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('sponsors/overview'));
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
				$actionStatus=$this->SponsorsModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->SponsorsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('sponsors/overview'));
	}

	public function categories()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('sponsors/categories');
        $config['total_rows'] = $this->SponsorCategoriesModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['categories'] = $this->SponsorCategoriesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','id','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('sponsors/categories'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function addcategory()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('sponsors/addcategory'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data=array(
				'name'=>$this->input->post('name'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			$insertid = $this->SponsorCategoriesModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('sponsors/categories'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('sponsors/categories'));
			}
		}
	}

  	public function editcategory($id)
	{
		$sponsorRow = $this->SponsorCategoriesModel->load($id);
		if(!$sponsorRow){
			redirect(admin_url_string('sponsors/categories'));
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['category']= $this->SponsorCategoriesModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('sponsors/editcategory'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'name'=>$this->input->post('name'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->SponsorCategoriesModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('sponsors/categories'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('sponsors/categories'));
			}
		}
	}

	
	public function deletecategory($id)
	{
		$actionStatus = false;
		$sponsorRow = $this->SponsorCategoriesModel->load($id);
		if(!$sponsorRow){
			redirect(admin_url_string('sponsors/categories'));
		}
		$cond = array('category'=>$id);
		$sponsors = $this->SponsorsModel->getArrayCond($cond);
		if(isset($sponsors) && count($sponsors)>0){
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Cannot delete already have sponsors under this category'));
			redirect(admin_url_string('sponsors/categories'));
		} else {
			$actionStatus=$this->SponsorCategoriesModel->delete($id);
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('sponsors/categories'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('sponsors/categories'));
		}
    }

	function categoryactions()
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
				$actionStatus=$this->SponsorCategoriesModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->SponsorCategoriesModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('sponsors/categories'));
	}

	

}
