<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blocks extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('BlocksModel');
		$this->load->model('BlockCategoriesModel');

	}

	public function index()
	{
		redirect(admin_url_string('blocks/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('blocks/overview');
        $config['total_rows'] = $this->BlocksModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['categories'] = $this->BlockCategoriesModel->getIdPair();
		$vars['blocks'] = $this->BlocksModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('blocks/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$vars['categories'] = $this->BlockCategoriesModel->getIdPair();
			$this->mainvars['content'] = $this->load->view(admin_url_string('blocks/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$image =$icon='';
			$blockImageUploadPath = 'public/uploads/blocks/images';
			if(!is_dir($blockImageUploadPath)){
				mkdir($blockImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $blockImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			$blockIconUploadPath = 'public/uploads/blocks/icons';
			if(!is_dir($blockIconUploadPath)){
				mkdir($blockIconUploadPath, 0777, TRUE);
			}
			$iconConfig['upload_path'] = $blockIconUploadPath;
			$iconConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $iconConfig);
			$this->upload->initialize($iconConfig);
			if($this->upload->do_upload('icon'))
			{
				$iconData=$this->upload->data();
				$icon=$iconData['file_name'];
			}
			$data=array(
				'category'=>$this->input->post('category'),
				'title'=>$this->input->post('title'),
				'summary'=>$this->input->post('summary'),
				'caption_title'=>$this->input->post('caption_title'),
				'caption_subtitle'=>$this->input->post('caption_subtitle'),
				'link_url'=>$this->input->post('link_url'),
				'link_title'=>$this->input->post('link_title'),
				'image'=>$image,
				'icon'=>$icon,
				'icon_class'=>$this->input->post('icon_class'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			$insertid = $this->BlocksModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('blocks/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('blocks/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$blockRow = $this->BlocksModel->load($id);
		if(!$blockRow){
			redirect(admin_url_string('blocks/overview'));
		}
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['categories'] = $this->BlockCategoriesModel->getIdPair();
			$edit['block']= $this->BlocksModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('blocks/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'category'=>$this->input->post('category'),
				'title'=>$this->input->post('title'),
				'summary'=>$this->input->post('summary'),
				'caption_title'=>$this->input->post('caption_title'),
				'caption_subtitle'=>$this->input->post('caption_subtitle'),
				'link_url'=>$this->input->post('link_url'),
				'link_title'=>$this->input->post('link_title'),
				'icon_class'=>$this->input->post('icon_class'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$data['image']='';
			} else{
			$blockImageUploadPath = 'public/uploads/blocks/images';
			if(!is_dir($blockImageUploadPath)){
				mkdir($blockImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $blockImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
				if($this->upload->do_upload('image'))
				{
					$imageData=$this->upload->data();
					$data['image']=$imageData['file_name'];
				}
			}
			
			if($this->input->post('remove_icon') && $this->input->post('remove_icon')=='1'){
				$data['icon']='';
			} else{
			$blockIconUploadPath = 'public/uploads/blocks/icons';
			if(!is_dir($blockIconUploadPath)){
				mkdir($blockIconUploadPath, 0777, TRUE);
			}
			$iconConfig['upload_path'] = $blockIconUploadPath;
			$iconConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $iconConfig);
			$this->upload->initialize($iconConfig);
				if($this->upload->do_upload('icon'))
				{
					$iconData=$this->upload->data();
					$data['icon']=$iconData['file_name'];
				}
			}
			$cond = array('id' => $id);
      		$actionStatus=$this->BlocksModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('blocks/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('blocks/overview'));
			}
		}
	}

	
	public function delete($id)
	{
		$blockRow = $this->BlocksModel->load($id);
		if(!$blockRow){
			redirect(admin_url_string('blocks/overview'));
		}
		$actionStatus=$this->BlocksModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('blocks/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('blocks/overview'));
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
				$actionStatus=$this->BlocksModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->BlocksModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('blocks/overview'));
	}

	public function categories()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('blocks/categories');
        $config['total_rows'] = $this->BlockCategoriesModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['categories'] = $this->BlockCategoriesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','id','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('blocks/categories'),$vars,true);
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
			$this->mainvars['content'] = $this->load->view(admin_url_string('blocks/addcategory'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data=array(
				'name'=>$this->input->post('name'),
				'status'=>$this->input->post('status')
			);
			$insertid = $this->BlockCategoriesModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('blocks/categories'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('blocks/categories'));
			}
		}
	}

  	public function editcategory($id)
	{
		$blockRow = $this->BlockCategoriesModel->load($id);
		if(!$blockRow){
			redirect(admin_url_string('blocks/categories'));
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['category']= $this->BlockCategoriesModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('blocks/editcategory'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'name'=>$this->input->post('name'),
				'status'=>$this->input->post('status')
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->BlockCategoriesModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('blocks/categories'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('blocks/categories'));
			}
		}
	}

	
	public function deletecategory($id)
	{
		$actionStatus = false;
		$blockRow = $this->BlockCategoriesModel->load($id);
		if(!$blockRow){
			redirect(admin_url_string('blocks/categories'));
		}
		$cond = array('category'=>$id);
		$blocks = $this->BlocksModel->getArrayCond($cond);
		if(isset($blocks) && count($blocks)>0){
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Cannot delete already have blocks under this category'));
			redirect(admin_url_string('blocks/categories'));
		} else {
			$actionStatus=$this->BlockCategoriesModel->delete($id);
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('blocks/categories'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('blocks/categories'));
		}
    }

	function categoryactions()
	{
		$actionStatus=false;
		$ids=$this->input->post('id');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='1';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='0';}
		if(isset($status) && isset($_POST['id'])){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$cond=array('id'=>$id);
				$actionStatus=$this->BlockCategoriesModel->updateCond($data,$cond);				
			endforeach;			
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('blocks/categories'));
	}

	

}
