<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audios extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('AudiosModel');

	}

	public function index()
	{
		redirect(admin_url_string('audios/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('audios/overview');
        $config['total_rows'] = $this->AudiosModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['audios'] = $this->AudiosModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('audios/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('artist', 'artist', '');
		if (empty($_FILES['audio']['name']))
		{
			$this->form_validation->set_rules('audio', 'Audio', 'required');
		}
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('audios/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$audio ='';
			$audioUploadPath = 'public/uploads/audios';
			if(!is_dir($audioUploadPath)){
				mkdir($audioUploadPath, 0777, TRUE);
			}
			$audioConfig['upload_path'] = $audioUploadPath;
			$audioConfig['allowed_types'] = 'mp3';
			$this->load->library('upload', $audioConfig);
			$this->upload->initialize($audioConfig);
			if($this->upload->do_upload('audio'))
			{
				$audioData=$this->upload->data();
				$audio=$audioData['file_name'];
			}
		
			$data=array(	
				'name'=>$this->input->post('name'),
				'artist'=>$this->input->post('artist'),
				'sort_order'=>$this->input->post('sort_order'),
				'mp3'=>$audio,
				'status'=>$this->input->post('status'),
			);
			$insertid = $this->AudiosModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('audios/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('audios/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$audioRow = $this->AudiosModel->load($id);
		if(!$audioRow){
			redirect(admin_url_string('audios/overview'));
		}
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('artist', 'artist', '');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['audio']= $this->AudiosModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('audios/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'name'=>$this->input->post('name'),
				'artist'=>$this->input->post('artist'),
				'sort_order'=>$this->input->post('sort_order'),
				
				'status'=>$this->input->post('status'),
			);
			$audioConfig['upload_path'] = 'public/uploads/audios';
			$audioConfig['allowed_types'] = 'mp3';
			$this->load->library('upload', $audioConfig);
			$this->upload->initialize($audioConfig);
			if($this->upload->do_upload('audio'))
			{
					$audioData=$this->upload->data();
					$data['mp3']=$audioData['file_name'];
			}
			$cond = array('id' => $id);
      		$actionStatus=$this->AudiosModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('audios/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('audios/overview'));
			}
		}
	}

	
	public function delete($id)
	{
		$audioRow = $this->AudiosModel->load($id);
		if(!$audioRow){
			redirect(admin_url_string('audios/overview'));
		}
		$actionStatus=$this->AudiosModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('audios/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('audios/overview'));
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
				$actionStatus=$this->AudiosModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->AudiosModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('audios/overview'));
	}

	

}
