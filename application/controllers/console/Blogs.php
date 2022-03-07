<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('BlogsModel');

	}

	public function index()
	{
		redirect(admin_url_string('blogs/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('blogs/overview');
        $config['total_rows'] = $this->BlogsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['blogs'] = $this->BlogsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','publish_date','DESC');
		$this->mainvars['content']=$this->load->view(admin_url_string('blogs/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('author', 'Author', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('blogs/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$slug = $this->BlogsModel->createSlug($this->input->post('title'));
			$image =$banner='';
			$blogImageUploadPath = 'public/uploads/blogs/images';
			if(!is_dir($blogImageUploadPath)){
				mkdir($blogImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $blogImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			$blogBannerUploadPath = 'public/uploads/blogs/banners';
			if(!is_dir($blogBannerUploadPath)){
				mkdir($blogBannerUploadPath, 0777, TRUE);
			}
			$bannerConfig['upload_path'] = $blogBannerUploadPath;
			$bannerConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $bannerConfig);
			$this->upload->initialize($bannerConfig);
			if($this->upload->do_upload('banner'))
			{
				$bannerData=$this->upload->data();
				$banner=$bannerData['file_name'];
			}
			$pub_date=$this->input->post('publish_date');
			$data=array(
				'slug'=>$slug,
				'title'=>$this->input->post('title'),
				'author'=>$this->input->post('author'),
				'content'=>$this->input->post('content'),
				'category'=>$this->input->post('category'),
				'publish_date'=> date("Y-m-d", strtotime($pub_date)),
				'meta_title'=>$this->input->post('title'),
				'image'=>$image,
				'banner'=>$banner,
				'status'=>$this->input->post('status'),
			);
			$insertid = $this->BlogsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('blogs/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('blogs/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$this->ckeditorCall();
		$blogRow = $this->BlogsModel->load($id);
		if(!$blogRow){
			redirect(admin_url_string('blogs/overview'));
		}
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('author', 'author', 'required');
	
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['blog']= $this->BlogsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('blogs/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$pub_date=$this->input->post('publish_date');
			$data=array(
				'title'=>$this->input->post('title'),
				'author'=>$this->input->post('author'),
				'content'=>$this->input->post('content'),
				'category'=>$this->input->post('category'),
				'publish_date'=>  date("Y-m-d ", strtotime($pub_date)),
				'status'=>$this->input->post('status')
			);
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$data['image']='';
			} else{
			$blogImageUploadPath = 'public/uploads/blogs/images';
			if(!is_dir($blogImageUploadPath)){
				mkdir($blogImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $blogImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig); 
				if($this->upload->do_upload('image'))
				{
					$imageData=$this->upload->data();
					$data['image']=$imageData['file_name'];
				}
			}
			
			if($this->input->post('remove_banner') && $this->input->post('remove_banner')=='1'){
				$data['banner']='';
			} else{
			$blogBannerUploadPath = 'public/uploads/blogs/banners';
			if(!is_dir($blogBannerUploadPath)){
				mkdir($blogBannerUploadPath, 0777, TRUE);
			}
			$bannerConfig['upload_path'] = $blogBannerUploadPath;
			$bannerConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $bannerConfig);
			$this->upload->initialize($bannerConfig); 
				if($this->upload->do_upload('banner'))
				{
					$bannerData=$this->upload->data();
					$data['banner']=$bannerData['file_name'];
				}
			}
			$cond = array('id' => $id);
      		$actionStatus=$this->BlogsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('blogs/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('blogs/overview'));
			}
		}
	}

	public function seo($id)
	{
		$blogRow = $this->BlogsModel->load($id);
		if(!$blogRow){
			redirect(admin_url_string('blogs/overview'));
		}
		$this->form_validation->set_rules('slug', 'slug', 'required|callback_urlslug_check');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$seo['blog']= $this->BlogsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('blogs/seo'), $seo,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'slug'=>$this->input->post('slug'),
				'meta_title'=>$this->input->post('meta_title'),
				'meta_desc'=>$this->input->post('meta_desc'),
				'meta_keywords'=>$this->input->post('meta_keywords')
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->BlogsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('blogs/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('blogs/overview'));
			}
		}
	}

	function urlslug_check($val) {
		if($this->input->post('id')){
			$cond = array('id !=' => $this->input->post('id'), 'slug' => $val);
		} else {
			$cond = array('slug' => $val);
		}
		if($this->BlogsModel->rowExists($cond)) {
			$this->form_validation->set_message('urlslug_check', 'Slug - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function delete($id)
	{
		$blogRow = $this->BlogsModel->load($id);
		if(!$blogRow){
			redirect(admin_url_string('blogs/overview'));
		}
		$actionStatus=$this->BlogsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('blogs/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('blogs/overview'));
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
				$actionStatus=$this->BlogsModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->BlogsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('blogs/overview'));
	}

	

}
