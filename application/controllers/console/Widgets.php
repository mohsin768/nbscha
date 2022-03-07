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
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('widgets/overview');
		$config['per_page'] = 30;
        $config['total_rows'] = $this->WidgetsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['widgetTypes'] = $this->WidgetsModel->getWidgetTypes();
		$vars['widgets'] = $this->WidgetsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']));
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
			$data=array(
				'name'=>$this->input->post('name'),
				'widget_type'=>$type,
				'widget_template'=>$this->input->post('widget_template'),
				'block_category'=>$this->input->post('block_category'),
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'inset_title'=>$this->input->post('inset_title'),
				'class'=>$this->input->post('class'),
				'content'=>$this->input->post('content'),
				'image'=>$image,
				'background'=>$background,
				'video'=>$video,
				'primary_link_title'=>$this->input->post('primary_link_title'),
				'primary_link_url'=>$this->input->post('primary_link_url'),
				'secondary_link_title'=>$this->input->post('secondary_link_title'),
				'secondary_link_url'=>$this->input->post('secondary_link_url'),
				'attachment_link_title'=>$this->input->post('attachment_link_title'),
				'attachment'=>$attachment,
				'widgets'=>$widgets
			);
			$actionStatus = $this->WidgetsModel->insert($data);
			if($actionStatus){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('widgets/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('widgets/overview'));
			}
		}
	}

  	public function edit($type,$widgetId)
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
			$edit['type']= $type;
			$edit['content_widget_templates']= $this->WidgetsModel->getContentWidgetTemplates();
			$edit['block_widget_templates']= $this->WidgetsModel->getBlockWidgetTemplates();
			$edit['categories']= $this->BlockCategoriesModel->getIdPair();
			$edit['combinedWidgets'] = $this->WidgetsModel->getAllCombinableWidgets();
			$edit['widget']= $this->WidgetsModel->load($widgetId);
			$this->mainvars['content'] = $this->load->view(admin_url_string('widgets/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$widgets = array();
			$widgets[0] = ($this->input->post('left_widget')!='')?$this->input->post('left_widget'):'0';
			$widgets[1] = ($this->input->post('right_widget')!='')?$this->input->post('right_widget'):'0';
			$widgets  = implode(',',$widgets);
			$data=array(
				'name'=>$this->input->post('name'),
				'widget_template'=>$this->input->post('widget_template'),
				'block_category'=>$this->input->post('block_category'),
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
				'widgets'=>$widgets
			);
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$data['image']='';
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
						$data['image']=$imageData['file_name'];
				}
			}

			if($this->input->post('remove_background') && $this->input->post('remove_background')=='1'){
				$data['background']='';
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
						$data['background']=$backgroundData['file_name'];
				}
			}

			if($this->input->post('remove_video') && $this->input->post('remove_video')=='1'){
				$data['video']='';
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
						$data['video']=$videoData['file_name'];
				}
			}
			if($this->input->post('remove_attachment') && $this->input->post('remove_attachment')=='1'){
				$data['attachment']='';
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
						$data['attachment']=$attachmentData['file_name'];
				}
			}
			$cond = array('id' => $widgetId);
      		$actionStatus=$this->WidgetsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('widgets/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('widgets/overview'));
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
