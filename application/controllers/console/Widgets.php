<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widgets extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('WidgetsModel');
		$this->load->model('BlockCategoriesModel');
	}

	public function index()
	{
		redirect(admin_url_string('widgets/overview'));
	}
	
	public function overview($language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('language'=>$language);
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('widgets/overview/'.$language);
		$config['uri_segment'] = '5';
		$config['per_page'] = 30;
        $config['total_rows'] = $this->WidgetsModel->getPaginationCount($cond);
        $this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['widgetTypes'] = $this->WidgetsModel->getWidgetTypes();
		$vars['widgets'] = $this->WidgetsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond);
		$this->mainvars['content']=$this->load->view(admin_url_string('widgets/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add($type)
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('title', 'Title', '');
		$this->form_validation->set_rules('left_widget', 'Left Widget', 'callback_combined_widget_check');
		$this->form_validation->set_rules('right_widget', 'Right Widget', 'callback_combined_widget_check');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$vars['type']= $type;
			$vars['content_widget_templates']= $this->WidgetsModel->getContentWidgetTemplates();
			$vars['block_widget_templates']= $this->WidgetsModel->getBlockWidgetTemplates();
			$vars['categories']= $this->BlockCategoriesModel->getIdPair();
			$vars['combinedWidgets'] = $this->WidgetsModel->getAllCombinableWidgets();
			$this->mainvars['content'] = $this->load->view(admin_url_string('widgets/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$image = $video = $background = $attachment = '';
			$widgetImageUploadPath = 'public/uploads/widgets/images';
			if(!is_dir($widgetImageUploadPath)){
				mkdir($widgetImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $widgetImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			$widgetBackgroundUploadPath = 'public/uploads/widgets/background';
			if(!is_dir($widgetBackgroundUploadPath)){
				mkdir($widgetBackgroundUploadPath, 0777, TRUE);
			}
			$backgroundConfig['upload_path'] = $widgetBackgroundUploadPath;
			$backgroundConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $backgroundConfig);
			$this->upload->initialize($backgroundConfig);
			if($this->upload->do_upload('background'))
			{
				$backgroundData=$this->upload->data();
				$background=$backgroundData['file_name'];
			}
			$widgetVideoUploadPath = 'public/uploads/widgets/videos';
			if(!is_dir($widgetVideoUploadPath)){
				mkdir($widgetVideoUploadPath, 0777, TRUE);
			}
			$videoConfig['upload_path'] = $widgetVideoUploadPath;
			$videoConfig['allowed_types'] = 'mp4';
			$this->load->library('upload', $videoConfig);
			$this->upload->initialize($videoConfig);
			if($this->upload->do_upload('video'))
			{
				$videoData=$this->upload->data();
				$video=$videoData['file_name'];
			}
			$widgetAttachmentUploadPath = 'public/uploads/widgets/attachments';
			if(!is_dir($widgetAttachmentUploadPath)){
				mkdir($widgetAttachmentUploadPath, 0777, TRUE);
			}
			$attachmentConfig['upload_path'] = $widgetAttachmentUploadPath;
			$attachmentConfig['allowed_types'] = 'pdf';
			$this->load->library('upload', $attachmentConfig);
			$this->upload->initialize($attachmentConfig);
			if($this->upload->do_upload('attachment'))
			{
				$attachmentData=$this->upload->data();
				$attachment=$attachmentData['file_name'];
			}
			$widgets = array();
			$widgets[0] = ($this->input->post('left_widget')!='')?$this->input->post('left_widget'):'0';
			$widgets[1] = ($this->input->post('right_widget')!='')?$this->input->post('right_widget'):'0';
			$widgets  = implode(',',$widgets);
			$maindata=array(
				'name'=>$this->input->post('name'),
				'widget_type'=>$type,
				'widget_template'=>$this->input->post('widget_template'),
				'block_category'=>$this->input->post('block_category'),
				'class'=>$this->input->post('class'),
				'image'=>$image,
				'background'=>$background,
				'video'=>$video,
				'widgets'=>$widgets
			);
			$descdata=array(
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'inset_title'=>$this->input->post('inset_title'),
				'class'=>$this->input->post('class'),
				'content'=>$this->input->post('content'),
				'primary_link_title'=>$this->input->post('primary_link_title'),
				'primary_link_url'=>$this->input->post('primary_link_url'),
				'secondary_link_title'=>$this->input->post('secondary_link_title'),
				'secondary_link_url'=>$this->input->post('secondary_link_url'),
				'attachment_link_title'=>$this->input->post('attachment_link_title'),
				'attachment'=>$attachment,
				'language'=>$this->input->post('language')
			);
			$actionStatus = $this->WidgetsModel->insert($maindata,$descdata);
			if($actionStatus){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('widgets/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('widgets/overview'));
			}
		}
	}

  	public function edit($type,$widgetId, $lang, $translate='')
	{
		$this->ckeditorCall();
		$widgetRow = $this->WidgetsModel->load($widgetId);
		if(!$widgetRow){
			redirect(admin_url_string('widgets/overview'));
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('title', 'Title', '');
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
			$edit['type']= $type;
			$edit['content_widget_templates']= $this->WidgetsModel->getContentWidgetTemplates();
			$edit['block_widget_templates']= $this->WidgetsModel->getBlockWidgetTemplates();
			$edit['categories']= $this->BlockCategoriesModel->getIdPair();
			$edit['combinedWidgets'] = $this->WidgetsModel->getAllCombinableWidgets();
			$edit['widget']= $this->WidgetsModel->getRowCond(array('id'=>$widgetId,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('widgets/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$widgets = array();
			$widgets[0] = ($this->input->post('left_widget')!='')?$this->input->post('left_widget'):'0';
			$widgets[1] = ($this->input->post('right_widget')!='')?$this->input->post('right_widget'):'0';
			$widgets  = implode(',',$widgets);
			$maindata=array(
				'name'=>$this->input->post('name'),
				'widget_template'=>$this->input->post('widget_template'),
				'block_category'=>$this->input->post('block_category'),
				'class'=>$this->input->post('class'),
				'widgets'=>$widgets
			);
			$descdata=array(
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'inset_title'=>$this->input->post('inset_title'),
				'content'=>$this->input->post('content'),
				'primary_link_title'=>$this->input->post('primary_link_title'),
				'primary_link_url'=>$this->input->post('primary_link_url'),
				'secondary_link_title'=>$this->input->post('secondary_link_title'),
				'secondary_link_url'=>$this->input->post('secondary_link_url'),
				'attachment_link_title'=>$this->input->post('attachment_link_title'),
				'language' => $this->input->post('language')
			);
			if($this->input->post('remove_gallery') && $this->input->post('remove_gallery')=='1'){
				$maindata['gallery']='';
			} else{
				$widgetGalleryUploadPath = 'public/uploads/widgets/gallery';
				if(!is_dir($widgetGalleryUploadPath)){
					mkdir($widgetGalleryUploadPath, 0777, TRUE);
				}
				$gallery = array();
				if(isset($_FILES['gallery']['name'])){
					$count = count($_FILES['gallery']['name']);
					for($i=0;$i<$count;$i++){
						if(!empty($_FILES['gallery']['name'][$i])){
							$_FILES['galleryitem']['name'] = $_FILES['gallery']['name'][$i];
							$_FILES['galleryitem']['type'] = $_FILES['gallery']['type'][$i];
							$_FILES['galleryitem']['tmp_name'] = $_FILES['gallery']['tmp_name'][$i];
							$_FILES['galleryitem']['error'] = $_FILES['gallery']['error'][$i];
							$_FILES['galleryitem']['size'] = $_FILES['gallery']['size'][$i];
							$imageConfig['upload_path'] = $widgetGalleryUploadPath;
							$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
							$imageConfig['file_name'] = $_FILES['gallery']['name'][$i];
							$this->load->library('upload', $imageConfig);
							$this->upload->initialize($imageConfig);
							if($this->upload->do_upload('galleryitem'))
							{
									$imageData=$this->upload->data();
									$gallery[] = $imageData['file_name'];
							}
						}
					}
				}
				$maindata['gallery']=implode(',',$gallery);
			}
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$maindata['image']='';
			} else{
				$widgetImageUploadPath = 'public/uploads/widgets/images';
				if(!is_dir($widgetImageUploadPath)){
					mkdir($widgetImageUploadPath, 0777, TRUE);
				}
				$imageConfig['upload_path'] = $widgetImageUploadPath;
				$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
				$this->load->library('upload', $imageConfig);
				$this->upload->initialize($imageConfig);
				if($this->upload->do_upload('image'))
				{
						$imageData=$this->upload->data();
						$maindata['image']=$imageData['file_name'];
				}
			}

			if($this->input->post('remove_background') && $this->input->post('remove_background')=='1'){
				$maindata['background']='';
			} else{
				$widgetBackgroundUploadPath = 'public/uploads/widgets/background';
				if(!is_dir($widgetBackgroundUploadPath)){
					mkdir($widgetBackgroundUploadPath, 0777, TRUE);
				}
				$backgroundConfig['upload_path'] = $widgetBackgroundUploadPath;
				$backgroundConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
				$this->load->library('upload', $backgroundConfig);
				$this->upload->initialize($backgroundConfig);
				if($this->upload->do_upload('background'))
				{
						$backgroundData=$this->upload->data();
						$maindata['background']=$backgroundData['file_name'];
				}
			}

			if($this->input->post('remove_video') && $this->input->post('remove_video')=='1'){
				$maindata['video']='';
			} else{
				$widgetVideoUploadPath = 'public/uploads/widgets/videos';
				if(!is_dir($widgetVideoUploadPath)){
					mkdir($widgetVideoUploadPath, 0777, TRUE);
				}
				$videoConfig['upload_path'] = $widgetVideoUploadPath;
				$videoConfig['allowed_types'] = 'mp4';
				$this->load->library('upload', $videoConfig);
				$this->upload->initialize($videoConfig);
				if($this->upload->do_upload('video'))
				{
						$videoData=$this->upload->data();
						$maindata['video']=$videoData['file_name'];
				}
			}
			if($this->input->post('remove_attachment') && $this->input->post('remove_attachment')=='1'){
				$descdata['attachment']='';
			} else{
				$widgetAttachmentUploadPath = 'public/uploads/widgets/attachments';
				if(!is_dir($widgetAttachmentUploadPath)){
					mkdir($widgetAttachmentUploadPath, 0777, TRUE);
				}
				$attachmentConfig['upload_path'] = $widgetAttachmentUploadPath;
				$attachmentConfig['allowed_types'] = 'pdf';
				$this->load->library('upload', $attachmentConfig);
				$this->upload->initialize($attachmentConfig);
				if($this->upload->do_upload('attachment'))
				{
						$attachmentData=$this->upload->data();
						$descdata['attachment']=$attachmentData['file_name'];
				}
			}
			$cond = array('id' => $widgetId);
			if($translate=='translate'){
				$actionStatus = $this->WidgetsModel->addTranslate($maindata,$cond,$descdata);
			}else{
				$actionStatus=$this->WidgetsModel->updateCond($maindata,$cond,$descdata);
			}
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('widgets/overview/'.$lang));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('widgets/overview/'.$lang));
			}
		}
	}

	function combined_widget_check($val){
		if($this->input->post('widget_type') == 'combined_widget' && $val==''){
			$this->form_validation->set_message('combined_widget_check', 'required');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function delete($widgetId)
	{
		$widgetRow = $this->WidgetsModel->load($widgetId);
		if(!$widgetRow){
			redirect(admin_url_string('widgets/overview'));
		}
		$this->WidgetsModel->deletePageWidgets($widgetId);
		$actionStatus=$this->WidgetsModel->deleteCond(array('id'=>$widgetId));
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('widgets/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('widgets/overview'));
		}
    }

}
