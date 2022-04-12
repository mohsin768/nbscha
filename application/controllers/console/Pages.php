<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('PagesModel');
		$this->load->model('PageContentsModel');
		$this->load->model('WidgetsModel');
	}

	public function index()
	{
		redirect(admin_url_string('pages/overview'));
	}
	
	public function overview($language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('language'=>$language);
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('pages/overview/'.$language);
		$config['uri_segment'] = '5';
        $config['total_rows'] = $this->PagesModel->getPaginationCount($cond);
        $this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['pages'] = $this->PagesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond);
		$this->mainvars['content']=$this->load->view(admin_url_string('pages/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('pages/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$slug = $this->PagesModel->createSlug($this->input->post('title'));
			$banner_image = $banner_video='';
			$pagesImageUploadPath = 'public/uploads/pages/images';
			if(!is_dir($pagesImageUploadPath)){
				mkdir($pagesImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $pagesImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('banner_image'))
			{
				$imageData=$this->upload->data();
				$banner_image=$imageData['file_name'];
			}
			$pagesVideoUploadPath = 'public/uploads/pages/videos';
			if(!is_dir($pagesVideoUploadPath)){
				mkdir($pagesVideoUploadPath, 0777, TRUE);
			}
			$videoConfig['upload_path'] = $pagesVideoUploadPath;
			$videoConfig['allowed_types'] = 'mp4';
			$this->load->library('upload', $videoConfig);
			$this->upload->initialize($videoConfig);
			if($this->upload->do_upload('banner_video'))
			{
				$videoData=$this->upload->data();
				$banner_video=$videoData['file_name'];
			}
			$maindata=array(
				'slug'=>$slug,
				'banner_image'=>$banner_image,
				'banner_video'=>$banner_video,
				'status'=>$this->input->post('status')
			);

			$descdata=array(
				'title'=>$this->input->post('title'),
				'meta_title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'language' => $this->input->post('language')
			);
			$insertid = $this->PagesModel->insert($maindata,$descdata);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('pages/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('pages/overview'));
			}
		}
	}

  	public function edit($id, $lang, $translate='')
	{
		$pageRow = $this->PagesModel->load($id);
		if(!$pageRow){
			redirect(admin_url_string('pages/overview'));
		}
		$this->form_validation->set_rules('title', 'Title', 'required');
    	$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$langCond = $lang;
			if($translate=='translate'){
				$langCond = $this->default_language;
			}
			$edit['language'] = $lang;
			$edit['translate'] = $translate;
			$edit['page']= $this->PagesModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('pages/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'status'=>$this->input->post('status')
			);
			if($this->input->post('remove_banner_image') && $this->input->post('remove_banner_image')=='1'){
				$data['banner_image']='';
			} else{
				$pagesImageUploadPath = 'public/uploads/pages/images';
				if(!is_dir($pagesImageUploadPath)){
					mkdir($pagesImageUploadPath, 0777, TRUE);
				}
				$imageConfig['upload_path'] = $pagesImageUploadPath;
				$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
				$this->load->library('upload', $imageConfig);
				$this->upload->initialize($imageConfig);
				if($this->upload->do_upload('banner_image'))
				{
						$imageData=$this->upload->data();
						$data['banner_image']=$imageData['file_name'];
				}
			}

			if($this->input->post('remove_banner_video') && $this->input->post('remove_banner_video')=='1'){
				$data['banner_video']='';
			} else{
				$pagesVideoUploadPath = 'public/uploads/pages/videos';
				if(!is_dir($pagesVideoUploadPath)){
					mkdir($pagesVideoUploadPath, 0777, TRUE);
				}
				$videoConfig['upload_path'] = $pagesVideoUploadPath;
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
			$descData = array(
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'language' => $this->input->post('language')
			);
			if($translate=='translate'){
				$descData['page_id']= $id;
				$actionStatus = $this->PagesModel->addTranslate($data,$cond,$descData);
			}else{
				$actionStatus=$this->PagesModel->updateCond($data,$cond,$descData);
			}
      		
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('pages/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('pages/overview'));
			}
		}
	}

	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->PagesModel->getTranslates($cond);
		$vars['page_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('pages/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	public function seo($id)
	{
		$pageRow = $this->PagesModel->load($id);
		if(!$pageRow){
			redirect(admin_url_string('pages/overview'));
		}
		$this->form_validation->set_rules('slug', 'slug', 'required|callback_urlslug_check');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$seo['page']= $this->PagesModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('pages/seo'), $seo,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'slug'=>$this->input->post('slug'),
				'meta_title'=>$this->input->post('meta_title'),
				'meta_desc'=>$this->input->post('meta_desc'),
				'meta_keywords'=>$this->input->post('meta_keywords')
			);
			$cond = array('id' => $id);
      		$actionStatus=$this->PagesModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('pages/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('pages/overview'));
			}
		}
	}

	function urlslug_check($val) {
		if($this->input->post('id')){
			$cond = array('id !=' => $this->input->post('id'), 'slug' => $val);
		} else {
			$cond = array('slug' => $val);
		}
		if($this->PagesModel->rowExists($cond)) {
			$this->form_validation->set_message('urlslug_check', 'Slug - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}


	public function delete($id)
	{
		$pageRow = $this->PagesModel->load($id);
		if(!$pageRow){
			redirect(admin_url_string('pages/overview'));
		}
		$actionStatus=$this->PagesModel->deletePage($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('pages/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('pages/overview'));
		}
    }

	public function contents($id)
	{
		$pageRow = $this->PagesModel->load($id);
		if(!$pageRow){
			redirect(admin_url_string('pages/overview'));
		}
		$vars['contentTypes'] = $this->PageContentsModel->getContentTypes();
		$vars['contents'] = $this->PageContentsModel->getArrayCond(array('page_id'=>$id),'','sort_order','ASC');
		$vars['page'] = $pageRow;
		$this->mainvars['content']=$this->load->view(admin_url_string('pages/contents'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function contentadd($type,$pageId)
	{
		$this->ckeditorCall();
		$pageRow = $this->PagesModel->load($pageId);
		if(!$pageRow){
			redirect(admin_url_string('pages/overview'));
		}
		$this->form_validation->set_rules('content_type', 'Type', 'required');
		$this->form_validation->set_rules('title', 'Title', '');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$vars['type']= $type;
			$vars['page']= $pageRow;
			$this->mainvars['content'] = $this->load->view(admin_url_string('pages/contentadd'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$image = $video='';
			$pageContentImageUploadPath = 'public/uploads/pages/contents/images';
			if(!is_dir($pageContentImageUploadPath)){
				mkdir($pageContentImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $pageContentImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			$pageContentVideoUploadPath = 'public/uploads/pages/contents/videos';
			if(!is_dir($pageContentVideoUploadPath)){
				mkdir($pageContentVideoUploadPath, 0777, TRUE);
			}
			$videoConfig['upload_path'] = $pageContentVideoUploadPath;
			$videoConfig['allowed_types'] = 'mp4';
			$this->load->library('upload', $videoConfig);
			$this->upload->initialize($videoConfig);
			if($this->upload->do_upload('video'))
			{
				$videoData=$this->upload->data();
				$video=$videoData['file_name'];
			}
			$data=array(
				'page_id'=>$pageId,
				'content_type'=>$type,
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'content'=>$this->input->post('content'),
				'image'=>$image,
				'video'=>$video
			);
			$insertid = $this->PageContentsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('pages/contents/'.$pageId));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('pages/overview'));
			}
		}
	}

  	public function contentedit($type,$pageId,$contentId)
	{
		$this->ckeditorCall();
		$pageRow = $this->PagesModel->load($pageId);
		if(!$pageRow){
			redirect(admin_url_string('pages/overview'));
		}
		$pageContentRow = $this->PageContentsModel->load($contentId);
		if(!$pageContentRow){
			redirect(admin_url_string('pages/contents/'.$pageId));
		}
		$this->form_validation->set_rules('content_type', 'Type', 'required');
		$this->form_validation->set_rules('title', 'Title', '');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['type']= $type;
			$edit['page']= $this->PagesModel->load($pageId);
			$edit['content']= $this->PageContentsModel->load($contentId);
			$this->mainvars['content'] = $this->load->view(admin_url_string('pages/contentedit'), $edit,true);
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
				$pageContentImageUploadPath = 'public/uploads/pages/contents/images';
				if(!is_dir($pageContentImageUploadPath)){
					mkdir($pageContentImageUploadPath, 0777, TRUE);
				}
				$imageConfig['upload_path'] = $pageContentImageUploadPath;
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
				$pageContentVideoUploadPath = 'public/uploads/pages/contents/videos';
				if(!is_dir($pageContentVideoUploadPath)){
					mkdir($pageContentVideoUploadPath, 0777, TRUE);
				}
				$videoConfig['upload_path'] = $pageContentVideoUploadPath;
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
      		$actionStatus=$this->PageContentsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('pages/contents/'.$pageId));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('pages/contents/'.$pageId));
			}
		}
	}

	function contentactions($pageId)
	{
		$pageRow = $this->PagesModel->load($pageId);
		if(!$pageRow){
			redirect(admin_url_string('pages/overview'));
		}
		$actionStatus=false;
		$sort_orders=$this->input->post('sort_order');
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->PageContentsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Content Item updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('pages/contents/'.$pageId));
	}

	public function contentdelete($pageId,$contentId)
	{
		$pageContentRow = $this->PageContentsModel->load($contentId);
		if(!$pageContentRow){
			redirect('pages/contents/'.$pageId);
		}
		$actionStatus=$this->PageContentsModel->deleteCond(array('id'=>$contentId));
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('pages/contents/'.$pageId));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('pages/contents/'.$pageId));
		}
    }

	public function widgets($id){
		$pageRow = $this->PagesModel->load($id);
		if(!$pageRow){
			redirect(admin_url_string('pages/overview'));
		}
		$vars['pageWidgets'] = $this->WidgetsModel->getPageWidgets($id);
		$vars['availableWidgets'] = $this->WidgetsModel->getArrayCond(array('status'=>'1'));
		$vars['page'] = $pageRow;
		$this->mainvars['content']=$this->load->view(admin_url_string('pages/widgets'),$vars,true);
		$this->mainvars['page_scripts'] = $this->load->view(admin_url_string('pages/widgets-script'),'',true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	public function updatewidgets($id){
		$pageRow = $this->PagesModel->load($id);
		if(!$pageRow){
			redirect(admin_url_string('pages/overview'));
		}
		$widgets = array();
		$pageboxIds = array();
		$pageboxes = $this->input->post('pageboxes');
		if($pageboxes!=''){
			$pageboxIds = explode(',',$pageboxes);
		}
		$this->WidgetsModel->updatePageWidgets($id,$pageboxIds);
		$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Page widgets updated successfully.'));
		redirect(admin_url_string('pages/widgets/'.$id));
	}

}
