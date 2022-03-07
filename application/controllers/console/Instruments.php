<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruments extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('InstrumentsModel');

	}

	public function index()
	{
		redirect(admin_url_string('instruments/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('instruments/overview');
        $config['total_rows'] = $this->InstrumentsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['instruments'] = $this->InstrumentsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('instruments/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('instruments/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$slug = $this->InstrumentsModel->createSlug($this->input->post('name'));
			$image =$banner='';
			$instrumentsImageUploadPath = 'public/uploads/instruments/images';
			if(!is_dir($instrumentsImageUploadPath)){
				mkdir($instrumentsImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $instrumentsImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			$instrumentsBannerUploadPath = 'public/uploads/instruments/banners';
			if(!is_dir($instrumentsBannerUploadPath)){
				mkdir($instrumentsBannerUploadPath, 0777, TRUE);
			}
			$bannerConfig['upload_path'] = $instrumentsBannerUploadPath;
			$bannerConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $bannerConfig);
			$this->upload->initialize($bannerConfig);
			if($this->upload->do_upload('banner'))
			{
				$bannerData=$this->upload->data();
				$banner=$bannerData['file_name'];
			}
			$data=array(
				'slug'=>$slug,
				'name'=>$this->input->post('name'),
				'content'=>$this->input->post('content'),
				'title'=>$this->input->post('name'),
				'meta_title'=>$this->input->post('name'),
				'image'=>$image,
				'banner'=>$banner,
				'status'=>$this->input->post('status'),
				'sort_order'=>$this->input->post('sort_order')
			);
			$insertid = $this->InstrumentsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('instruments/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('instruments/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$this->ckeditorCall();
		$instrumentRow = $this->InstrumentsModel->load($id);
		if(!$instrumentRow){
			redirect(admin_url_string('instruments/overview'));
		}
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['instrument']= $this->InstrumentsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('instruments/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(	
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'name'=>$this->input->post('name'),
				'content'=>$this->input->post('content'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status'),
			);
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$data['image']='';
			} else{
			$instrumentsImageUploadPath = 'public/uploads/instruments/images';
			if(!is_dir($instrumentsImageUploadPath)){
				mkdir($instrumentsImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $instrumentsImageUploadPath;
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
			$instrumentsBannerUploadPath = 'public/uploads/instruments/banners';
			if(!is_dir($instrumentsBannerUploadPath)){
				mkdir($instrumentsBannerUploadPath, 0777, TRUE);
			}
			$bannerConfig['upload_path'] = $instrumentsBannerUploadPath;
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
      		$actionStatus=$this->InstrumentsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('instruments/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('instruments/overview'));
			}
		}
	}

	public function banner($id)
	{
		$instructorRow = $this->InstrumentsModel->load($id);
		if(!$instructorRow){
			redirect(admin_url_string('instruments/overview'));
		}
		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$banner['instrument']= $this->InstrumentsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('instruments/banner'), $banner,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle')
			);
			if($this->input->post('remove_banner_image') && $this->input->post('remove_banner_image')=='1'){
				$data['banner_image']='';
			} else{
			$instrumentsBannerUploadPath = 'public/uploads/instruments/banners';
			if(!is_dir($instrumentsBannerUploadPath)){
				mkdir($instrumentsBannerUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $instrumentsBannerUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
				if($this->upload->do_upload('banner_image'))
				{
					$imageData=$this->upload->data();
					$data['banner_image']=$imageData['file_name'];
				}
			}
			$cond = array('id' => $id);
      		$actionStatus=$this->InstrumentsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('instruments/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('instruments/overview'));
			}
		}
	}

	public function seo($id)
	{
		$instructorRow = $this->InstrumentsModel->load($id);
		if(!$instructorRow){
			redirect(admin_url_string('instruments/overview'));
		}
		$this->form_validation->set_rules('slug', 'slug', 'required|callback_urlslug_check');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$seo['instrument']= $this->InstrumentsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('instruments/seo'), $seo,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'slug'=>$this->input->post('slug'),
				'meta_title'=>$this->input->post('meta_title'),
				'meta_desc'=>$this->input->post('meta_desc'),
				'meta_keywords'=>$this->input->post('meta_keywords')
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->InstrumentsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('instruments/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('instruments/overview'));
			}
		}
	}

	function urlslug_check($val) {
		if($this->input->post('id')){
			$cond = array('id !=' => $this->input->post('id'), 'slug' => $val);
		} else {
			$cond = array('slug' => $val);
		}
		if($this->InstrumentsModel->rowExists($cond)) {
			$this->form_validation->set_message('urlslug_check', 'Slug - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	
	public function delete($id)
	{
		$instrumentRow = $this->InstrumentsModel->load($id);
		if(!$instrumentRow){
			redirect(admin_url_string('instruments/overview'));
		}
		$actionStatus=$this->InstrumentsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('instruments/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('instruments/overview'));
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
				$actionStatus=$this->InstrumentsModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->InstrumentsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('instruments/overview'));
	}

	

}
