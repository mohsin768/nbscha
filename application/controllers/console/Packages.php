<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('PackagesModel');
		$this->load->model('PackageContentsModel');
		$this->load->model('WidgetsModel');
	}

	public function index()
	{
		redirect(admin_url_string('packages/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('packages/overview');
        $config['total_rows'] = $this->PackagesModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['packages'] = $this->PackagesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']));
		$this->mainvars['content']=$this->load->view(admin_url_string('packages/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('packages/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$slug = $this->PackagesModel->createSlug($this->input->post('title'));
			$image = $banner_image = $banner_video='';
			$packagesImageUploadPath = 'public/uploads/packages/images';
			if(!is_dir($packagesImageUploadPath)){
				mkdir($packagesImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $packagesImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			$packagesBannerUploadPath = 'public/uploads/packages/banners';
			if(!is_dir($packagesBannerUploadPath)){
				mkdir($packagesBannerUploadPath, 0777, TRUE);
			}
			$bannerConfig['upload_path'] = $packagesBannerUploadPath;
			$bannerConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $bannerConfig);
			$this->upload->initialize($bannerConfig);
			if($this->upload->do_upload('banner_image'))
			{
				$bannerData=$this->upload->data();
				$banner_image=$bannerData['file_name'];
			}
			$packagesVideoUploadPath = 'public/uploads/packages/videos';
			if(!is_dir($packagesVideoUploadPath)){
				mkdir($packagesVideoUploadPath, 0777, TRUE);
			}
			$videoConfig['upload_path'] = $packagesVideoUploadPath;
			$videoConfig['allowed_types'] = 'mp4';
			$this->load->library('upload', $videoConfig);
			$this->upload->initialize($videoConfig);
			if($this->upload->do_upload('banner_video'))
			{
				$videoData=$this->upload->data();
				$banner_video=$videoData['file_name'];
			}
			$data=array(
				'slug'=>$slug,
				'title'=>$this->input->post('title'),
				'meta_title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'caption'=>$this->input->post('caption'),
				'icon_class'=>$this->input->post('icon_class'),
				'summary'=>$this->input->post('summary'),
				'image'=>$image,
				'banner_image'=>$banner_image,
				'banner_video'=>$banner_video,
				'status'=>$this->input->post('status'),
			);
			$insertid = $this->PackagesModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('packages/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('packages/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$packageRow = $this->PackagesModel->load($id);
		if(!$packageRow){
			redirect(admin_url_string('packages/overview'));
		}
		$this->form_validation->set_rules('title', 'Title', 'required');
    	$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['package']= $this->PackagesModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('packages/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'status'=>$this->input->post('status'),
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'caption'=>$this->input->post('caption'),
				'icon_class'=>$this->input->post('icon_class'),
				'summary'=>$this->input->post('summary')
			);
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$data['image']='';
			} else{
				$packagesImageUploadPath = 'public/uploads/packages/images';
				if(!is_dir($packagesImageUploadPath)){
					mkdir($packagesImageUploadPath, 0777, TRUE);
				}
				$imageConfig['upload_path'] = $packagesImageUploadPath;
				$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
				$this->load->library('upload', $imageConfig);
				$this->upload->initialize($imageConfig);
				if($this->upload->do_upload('image'))
				{
					$imageData=$this->upload->data();
					$data['image']=$imageData['file_name'];
				}
			}
			if($this->input->post('remove_banner_image') && $this->input->post('remove_banner_image')=='1'){
				$data['banner_image']='';
			} else{
				$packagesBannerUploadPath = 'public/uploads/packages/banners';
				if(!is_dir($packagesBannerUploadPath)){
					mkdir($packagesBannerUploadPath, 0777, TRUE);
				}
				$bannerConfig['upload_path'] = $packagesBannerUploadPath;
				$bannerConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
				$this->load->library('upload', $bannerConfig);
				$this->upload->initialize($bannerConfig);
				if($this->upload->do_upload('banner_image'))
				{
					$bannerData=$this->upload->data();
					$data['banner_image']=$bannerData['file_name'];
				}
			}

			if($this->input->post('remove_banner_video') && $this->input->post('remove_banner_video')=='1'){
				$data['banner_video']='';
			} else{
				$packagesVideoUploadPath = 'public/uploads/packages/videos';
				if(!is_dir($packagesVideoUploadPath)){
					mkdir($packagesVideoUploadPath, 0777, TRUE);
				}
				$videoConfig['upload_path'] = $packagesVideoUploadPath;
				$videoConfig['allowed_types'] = 'mp4';
				$this->load->library('upload', $videoConfig);
				$this->upload->initialize($videoConfig);
				if($this->upload->do_upload('banner_video'))
				{
						$imageData=$this->upload->data();
						$data['banner_video']=$imageData['file_name'];
				}
			}
			$cond = array('id' => $id);
      		$actionStatus=$this->PackagesModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('packages/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('packages/overview'));
			}
		}
	}

	public function seo($id)
	{
		$packageRow = $this->PackagesModel->load($id);
		if(!$packageRow){
			redirect(admin_url_string('packages/overview'));
		}
		$this->form_validation->set_rules('slug', 'slug', 'required|callback_urlslug_check');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$seo['package']= $this->PackagesModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('packages/seo'), $seo,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'slug'=>$this->input->post('slug'),
				'meta_title'=>$this->input->post('meta_title'),
				'meta_desc'=>$this->input->post('meta_desc'),
				'meta_keywords'=>$this->input->post('meta_keywords')
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->PackagesModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('packages/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('packages/overview'));
			}
		}
	}

	function urlslug_check($val) {
		if($this->input->post('id')){
			$cond = array('id !=' => $this->input->post('id'), 'slug' => $val);
		} else {
			$cond = array('slug' => $val);
		}
		if($this->PackagesModel->rowExists($cond)) {
			$this->form_validation->set_message('urlslug_check', 'Slug - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}


	public function delete($id)
	{
		$packageRow = $this->PackagesModel->load($id);
		if(!$packageRow){
			redirect(admin_url_string('packages/overview'));
		}
		$actionStatus=$this->PackagesModel->deletePackage($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('packages/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('packages/overview'));
		}
    }

	public function contents($id)
	{
		$packageRow = $this->PackagesModel->load($id);
		if(!$packageRow){
			redirect(admin_url_string('packages/overview'));
		}
		$vars['contentTypes'] = $this->PackageContentsModel->getContentTypes();
		$vars['contents'] = $this->PackageContentsModel->getArrayCond(array('package_id'=>$id),'','sort_order','ASC');
		$vars['package'] = $packageRow;
		$this->mainvars['content']=$this->load->view(admin_url_string('packages/contents'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function contentadd($type,$packageId)
	{
		$this->ckeditorCall();
		$packageRow = $this->PackagesModel->load($packageId);
		if(!$packageRow){
			redirect(admin_url_string('packages/overview'));
		}
		$this->form_validation->set_rules('content_type', 'Type', 'required');
		$this->form_validation->set_rules('title', 'Title', '');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$vars['type']= $type;
			$vars['package']= $packageRow;
			$this->mainvars['content'] = $this->load->view(admin_url_string('packages/contentadd'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$image = $video='';
			$packageContentImageUploadPath = 'public/uploads/packages/contents/images';
			if(!is_dir($packageContentImageUploadPath)){
				mkdir($packageContentImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $packageContentImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			$packageContentVideoUploadPath = 'public/uploads/packages/contents/videos';
			if(!is_dir($packageContentVideoUploadPath)){
				mkdir($packageContentVideoUploadPath, 0777, TRUE);
			}
			$videoConfig['upload_path'] = $packageContentVideoUploadPath;
			$videoConfig['allowed_types'] = 'mp4';
			$this->load->library('upload', $videoConfig);
			$this->upload->initialize($videoConfig);
			if($this->upload->do_upload('video'))
			{
				$videoData=$this->upload->data();
				$video=$videoData['file_name'];
			}
			$data=array(
				'package_id'=>$packageId,
				'content_type'=>$type,
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'content'=>$this->input->post('content'),
				'image'=>$image,
				'video'=>$video
			);
			$insertid = $this->PackageContentsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('packages/contents/'.$packageId));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('packages/overview'));
			}
		}
	}

  	public function contentedit($type,$packageId,$contentId)
	{
		$this->ckeditorCall();
		$packageRow = $this->PackagesModel->load($packageId);
		if(!$packageRow){
			redirect(admin_url_string('packages/overview'));
		}
		$packageContentRow = $this->PackageContentsModel->load($contentId);
		if(!$packageContentRow){
			redirect(admin_url_string('packages/contents/'.$packageId));
		}
		$this->form_validation->set_rules('content_type', 'Type', 'required');
		$this->form_validation->set_rules('title', 'Title', '');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['type']= $type;
			$edit['package']= $this->PackagesModel->load($packageId);
			$edit['content']= $this->PackageContentsModel->load($contentId);
			$this->mainvars['content'] = $this->load->view(admin_url_string('packages/contentedit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data=array(
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'content'=>$this->input->post('content')
			);
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$data['image']='';
			} else{
				$packageContentImageUploadPath = 'public/uploads/packages/contents/images';
				if(!is_dir($packageContentImageUploadPath)){
					mkdir($packageContentImageUploadPath, 0777, TRUE);
				}
				$imageConfig['upload_path'] = $packageContentImageUploadPath;
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
				$packageContentVideoUploadPath = 'public/uploads/packages/contents/videos';
				if(!is_dir($packageContentVideoUploadPath)){
					mkdir($packageContentVideoUploadPath, 0777, TRUE);
				}
				$videoConfig['upload_path'] = $packageContentVideoUploadPath;
				$videoConfig['allowed_types'] = 'mp4';
				$this->load->library('upload', $videoConfig);
				$this->upload->initialize($videoConfig);
				if($this->upload->do_upload('video'))
				{
						$imageData=$this->upload->data();
						$data['video']=$imageData['file_name'];
				}
			}
			$cond = array('id' => $contentId);
      		$actionStatus=$this->PackageContentsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('packages/contents/'.$packageId));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('packages/contents/'.$packageId));
			}
		}
	}

	function contentactions($packageId)
	{
		$packageRow = $this->PackagesModel->load($packageId);
		if(!$packageRow){
			redirect(admin_url_string('packages/overview'));
		}
		$actionStatus=false;
		$sort_orders=$this->input->post('sort_order');
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->PackageContentsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Content Item updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('packages/contents/'.$packageId));
	}

	public function contentdelete($packageId,$contentId)
	{
		$packageContentRow = $this->PackageContentsModel->load($contentId);
		if(!$packageContentRow){
			redirect('packages/contents/'.$packageId);
		}
		$actionStatus=$this->PackageContentsModel->deleteCond(array('id'=>$contentId));
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('packages/contents/'.$packageId));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('packages/contents/'.$packageId));
		}
    }

	public function widgets($id){
		$packageRow = $this->PackagesModel->load($id);
		if(!$packageRow){
			redirect(admin_url_string('packages/overview'));
		}
		$vars['packageWidgets'] = $this->WidgetsModel->getPackageWidgets($id);
		$vars['availableWidgets'] = $this->WidgetsModel->getArrayCond(array('status'=>'1'));
		$vars['package'] = $packageRow;
		$this->mainvars['content']=$this->load->view(admin_url_string('packages/widgets'),$vars,true);
		$this->mainvars['page_scripts'] = $this->load->view(admin_url_string('packages/widgets-script'),'',true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	public function updatewidgets($id){
		$packageRow = $this->PackagesModel->load($id);
		if(!$packageRow){
			redirect(admin_url_string('packages/overview'));
		}
		$widgets = array();
		$packageboxIds = array();
		$packageboxes = $this->input->post('packageboxes');
		if($packageboxes!=''){
			$packageboxIds = explode(',',$packageboxes);
		}
		$this->WidgetsModel->updatePackageWidgets($id,$packageboxIds);
		$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Package widgets updated successfully.'));
		redirect(admin_url_string('packages/widgets/'.$id));
	}

}
