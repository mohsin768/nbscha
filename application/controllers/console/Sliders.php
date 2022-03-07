<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('SlidersModel');

	}

	public function index()
	{
		redirect(admin_url_string('sliders/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('sliders/overview');
        $config['total_rows'] = $this->SlidersModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['sliders'] = $this->SlidersModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('sliders/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('sliders/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$image =$video='';
			$sliderImageUploadPath = 'public/uploads/sliders/images';
			if(!is_dir($sliderImageUploadPath)){
				mkdir($sliderImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $sliderImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			$sliderVideoUploadPath = 'public/uploads/sliders/videos';
			if(!is_dir($sliderVideoUploadPath)){
				mkdir($sliderVideoUploadPath, 0777, TRUE);
			}
			$videoConfig['upload_path'] = $sliderVideoUploadPath;
			$videoConfig['allowed_types'] = 'mp4';
			$this->load->library('upload', $videoConfig);
			$this->upload->initialize($videoConfig);
			if($this->upload->do_upload('video'))
			{
				$videoData=$this->upload->data();
				$video=$videoData['file_name'];
			}
			$data=array(
				'title'=>$this->input->post('title'),
				'body'=>$this->input->post('body'),
				'youtube_video'=>$this->input->post('youtube_video'),
				'link_url'=>$this->input->post('link_url'),
				'link_title'=>$this->input->post('link_title'),
				'image'=>$image,
				'video'=>$video,
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			$insertid = $this->SlidersModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('sliders/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('sliders/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$this->ckeditorCall();
		$sliderRow = $this->SlidersModel->load($id);
		if(!$sliderRow){
			redirect(admin_url_string('sliders/overview'));
		}
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['slider']= $this->SlidersModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('sliders/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'title'=>$this->input->post('title'),
				'body'=>$this->input->post('body'),
				'youtube_video'=>$this->input->post('youtube_video'),
				'link_url'=>$this->input->post('link_url'),
				'link_title'=>$this->input->post('link_title'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status')
			);
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$data['image']='';
			} else{
			$sliderImageUploadPath = 'public/uploads/sliders/images';
			if(!is_dir($sliderImageUploadPath)){
				mkdir($sliderImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $sliderImageUploadPath;
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
			$sliderVideoUploadPath = 'public/uploads/sliders/videos';
			if(!is_dir($sliderVideoUploadPath)){
				mkdir($sliderVideoUploadPath, 0777, TRUE);
			}
			$videoConfig['upload_path'] = $sliderVideoUploadPath;
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
      		$actionStatus=$this->SlidersModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('sliders/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('sliders/overview'));
			}
		}
	}

	
	public function delete($id)
	{
		$sliderRow = $this->SlidersModel->load($id);
		if(!$sliderRow){
			redirect(admin_url_string('sliders/overview'));
		}
		$actionStatus=$this->SlidersModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('sliders/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('sliders/overview'));
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
				$actionStatus=$this->SlidersModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->SlidersModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('sliders/overview'));
	}

	

}
