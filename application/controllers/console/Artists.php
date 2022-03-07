<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artists extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('ArtistsModel');

	}

	public function index()
	{
		redirect(admin_url_string('artists/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('artists/overview');
        $config['total_rows'] = $this->ArtistsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['artists'] = $this->ArtistsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('artists/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('position', 'position', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('artists/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$slug = $this->ArtistsModel->createSlug($this->input->post('name'));
			$image =$video='';
			$artistImageUploadPath = 'public/uploads/artists/images';
			if(!is_dir($artistImageUploadPath)){
				mkdir($artistImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $artistImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			$artistVideoUploadPath = 'public/uploads/artists/videos';
			if(!is_dir($artistVideoUploadPath)){
				mkdir($artistVideoUploadPath, 0777, TRUE);
			}
			$videoConfig['upload_path'] = $artistVideoUploadPath;
			$videoConfig['allowed_types'] = 'mp4';
			$this->load->library('upload', $videoConfig);
			$this->upload->initialize($videoConfig);
			if($this->upload->do_upload('video'))
			{
				$videoData=$this->upload->data();
				$video=$videoData['file_name'];
			}
			$data=array(
				'slug'=>$slug,
				'name'=>$this->input->post('name'),
				'position'=>$this->input->post('position'),
				'sort_order'=>$this->input->post('sort_order'),
				'bio'=>$this->input->post('bio'),
				'title'=>$this->input->post('name'),
				'meta_title'=>$this->input->post('name'),
				'image'=>$image,
				'video'=>$video,
				'status'=>$this->input->post('status')
			);
			$insertid = $this->ArtistsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('artists/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('artists/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$this->ckeditorCall();
		$artistRow = $this->ArtistsModel->load($id);
		if(!$artistRow){
			redirect(admin_url_string('artists/overview'));
		}
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('position', 'position', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['artist']= $this->ArtistsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('artists/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'name'=>$this->input->post('name'),
				'position'=>$this->input->post('position'),
				'sort_order'=>$this->input->post('sort_order'),
				'bio'=>$this->input->post('bio'),
				'status'=>$this->input->post('status')
			);
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$data['image']='';
			} else{
			$artistImageUploadPath = 'public/uploads/artists/images';
			if(!is_dir($artistImageUploadPath)){
				mkdir($artistImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $artistImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
				if($this->upload->do_upload('image'))
				{
					$imageData=$this->upload->data();
					$data['image']=$imageData['file_name'];
				}
			}
			
			if($this->input->post('remove_video') && $this->input->post('remove_video')=='1'){
				$data['video']='';
			} else{
			$artistVideoUploadPath = 'public/uploads/artists/videos';
			if(!is_dir($artistVideoUploadPath)){
				mkdir($artistVideoUploadPath, 0777, TRUE);
			}
			$videoConfig['upload_path'] = $artistVideoUploadPath;
			$videoConfig['allowed_types'] = 'mp4';
			$this->load->library('upload', $videoConfig);
			$this->upload->initialize($videoConfig);
				if($this->upload->do_upload('video'))
				{
					$videoData=$this->upload->data();
					$data['video']=$videoData['file_name'];
				}
			}
			$cond = array('id' => $id);
      		$actionStatus=$this->ArtistsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('artists/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('artists/overview'));
			}
		}
	}

	public function banner($id)
	{
		$artistRow = $this->ArtistsModel->load($id);
		if(!$artistRow){
			redirect(admin_url_string('artists/overview'));
		}
		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$banner['artist']= $this->ArtistsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('artists/banner'), $banner,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle')
			);
			if($this->input->post('remove_banner_image') && $this->input->post('remove_banner_image')=='1'){
				$data['banner_image']='';
			} else{
				$artistBannerUploadPath = 'public/uploads/artists/banners';
				if(!is_dir($artistBannerUploadPath)){
					mkdir($artistBannerUploadPath, 0777, TRUE);
				}
				$imageConfig['upload_path'] = $artistBannerUploadPath;
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
      		$actionStatus=$this->ArtistsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('artists/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('artists/overview'));
			}
		}
	}

	public function seo($id)
	{
		$artistRow = $this->ArtistsModel->load($id);
		if(!$artistRow){
			redirect(admin_url_string('artists/overview'));
		}
		$this->form_validation->set_rules('slug', 'slug', 'required|callback_urlslug_check');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$seo['artist']= $this->ArtistsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('artists/seo'), $seo,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'slug'=>$this->input->post('slug'),
				'meta_title'=>$this->input->post('meta_title'),
				'meta_desc'=>$this->input->post('meta_desc'),
				'meta_keywords'=>$this->input->post('meta_keywords')
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->ArtistsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('artists/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('artists/overview'));
			}
		}
	}

	function urlslug_check($val) {
		if($this->input->post('id')){
			$cond = array('id !=' => $this->input->post('id'), 'slug' => $val);
		} else {
			$cond = array('slug' => $val);
		}
		if($this->ArtistsModel->rowExists($cond)) {
			$this->form_validation->set_message('urlslug_check', 'Slug - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	
	public function delete($id)
	{
		$artistRow = $this->ArtistsModel->load($id);
		if(!$artistRow){
			redirect(admin_url_string('artists/overview'));
		}
		$actionStatus=$this->ArtistsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('artists/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('artists/overview'));
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
				$actionStatus=$this->ArtistsModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->ArtistsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('artists/overview'));
	}

	

}
