<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('VideosModel');

	}

	public function index()
	{
		redirect(admin_url_string('videos/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('videos/overview');
        $config['total_rows'] = $this->VideosModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['videos'] = $this->VideosModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','date','DESC');
		$this->mainvars['content']=$this->load->view(admin_url_string('videos/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add() 
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('video_url', 'Youtube Video URL', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('videos/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			
			$image ='';
			$videoImageUploadPath = 'public/uploads/videos/images';
			if(!is_dir($videoImageUploadPath)){
				mkdir($videoImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $videoImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			$date=date('Y-m-d',strtotime($this->input->post('date')));
			$data=array(
				'title'=> $this->input->post('title'),
				'date'=> $date,
				'video_url'=> $this->input->post('video_url'),
				'image'=> $image,
				'status'=> $this->input->post('status')
			);
			$insertid = $this->VideosModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('videos/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('videos/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$videoRow = $this->VideosModel->load($id);
		if(!$videoRow){
			redirect(admin_url_string('videos/overview'));
		}
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('video_url', 'Youtube Video URL', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['video']= $this->VideosModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('videos/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$date=date("Y-m-d ", strtotime($this->input->post('date')));
			$data=array(		
				'title'=>$this->input->post('title'),
				'date'=> $date,
				'video_url'=>$this->input->post('video_url'),
				'status'=>$this->input->post('status')
			);
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$data['image']='';
			} else{
				$videoImageUploadPath = 'public/uploads/videos/images';
				if(!is_dir($videoImageUploadPath)){
					mkdir($videoImageUploadPath, 0777, TRUE);
				}
				$imageConfig['upload_path'] = $videoImageUploadPath;
				$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
				$this->load->library('upload', $imageConfig);
				$this->upload->initialize($imageConfig);
				if($this->upload->do_upload('image'))
				{
					$imageData=$this->upload->data();
					$data['image']=$imageData['file_name'];
				}
			}
			$cond = array('id' => $id);
      		$actionStatus=$this->VideosModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('videos/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('videos/overview'));
			}
		}
	}
	
	public function delete($id)
	{
		$videoRow = $this->VideosModel->load($id);
		if(!$videoRow){
			redirect(admin_url_string('videos/overview'));
		}
		$actionStatus=$this->VideosModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('videos/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('videos/overview'));
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
				$actionStatus=$this->VideosModel->updateCond($data,$cond);				
			endforeach;			
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('videos/overview'));
	}	

}
