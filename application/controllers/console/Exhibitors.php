<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exhibitors extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('ExhibitorsModel');
		$this->load->model('PackagesModel');
		$this->load->model('EventsModel');

	}

	public function index()
	{
		redirect(admin_url_string('exhibitors/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('exhibitors/overview');
        $config['total_rows'] = $this->ExhibitorsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['events'] = $this->EventsModel->getIdPair();
		$vars['packages'] = $this->PackagesModel->getIdPair();
		$vars['exhibitors'] = $this->ExhibitorsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','name','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('exhibitors/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->form_validation->set_rules('event', 'Event', 'required');
		$this->form_validation->set_rules('package', 'Pacakge', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$vars['events'] = $this->EventsModel->getIdPair();
			$vars['packages'] = $this->PackagesModel->getIdPair();
			$this->mainvars['content'] = $this->load->view(admin_url_string('exhibitors/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$logo ='';
			$exhibitorLogoUploadPath = 'public/uploads/exhibitors/logos';
			if(!is_dir($exhibitorLogoUploadPath)){
				mkdir($exhibitorLogoUploadPath, 0777, TRUE);
			}
			$logoConfig['upload_path'] = $exhibitorLogoUploadPath;
			$logoConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $logoConfig);
			$this->upload->initialize($logoConfig);
			if($this->upload->do_upload('logo'))
			{
				$logoData=$this->upload->data();
				$logo=$logoData['file_name'];
			}
			$data=array(
				'event'=>$this->input->post('event'),
				'package'=>$this->input->post('package'),
				'name'=>$this->input->post('name'),
				'logo' => $logo,
				'room'=>$this->input->post('room'),
				'location'=>$this->input->post('location'),
				'status'=>$this->input->post('status')
			);
			$insertid = $this->ExhibitorsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('exhibitors/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('exhibitors/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$exhibitorRow = $this->ExhibitorsModel->load($id);
		if(!$exhibitorRow){
			redirect(admin_url_string('exhibitors/overview'));
		}
		$this->form_validation->set_rules('event', 'Event', 'required');
		$this->form_validation->set_rules('package', 'Package', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['events'] = $this->EventsModel->getIdPair();
			$edit['packages'] = $this->PackagesModel->getIdPair();
			$edit['exhibitor']= $this->ExhibitorsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('exhibitors/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'event'=>$this->input->post('event'),
				'package'=>$this->input->post('package'),
				'name'=>$this->input->post('name'),
				'room'=>$this->input->post('room'),
				'location'=>$this->input->post('location'),
				'status'=>$this->input->post('status')
			);
			if($this->input->post('remove_logo') && $this->input->post('remove_logo')=='1'){
				$data['logo']='';
			} else{
			$exhibitorLogoUploadPath = 'public/uploads/exhibitors/logos';
			if(!is_dir($exhibitorLogoUploadPath)){
				mkdir($exhibitorLogoUploadPath, 0777, TRUE);
			}
			$logoConfig['upload_path'] = $exhibitorLogoUploadPath;
			$logoConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $logoConfig);
			$this->upload->initialize($logoConfig);
				if($this->upload->do_upload('logo'))
				{
					$logoData=$this->upload->data();
					$data['logo']=$logoData['file_name'];
				}
			}
			
			$cond = array('id' => $id);
      		$actionStatus=$this->ExhibitorsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('exhibitors/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('exhibitors/overview'));
			}
		}
	}

	
	public function delete($id)
	{
		$exhibitorRow = $this->ExhibitorsModel->load($id);
		if(!$exhibitorRow){
			redirect(admin_url_string('exhibitors/overview'));
		}
		$actionStatus=$this->ExhibitorsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('exhibitors/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('exhibitors/overview'));
		}
    }

	function actions()
	{
		$actionStatus=false;
		$ids=$this->input->post('id');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='1';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='0';}
		if(isset($status) && isset($_POST['id'])){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$cond=array('id'=>$id);
				$actionStatus=$this->ExhibitorsModel->updateCond($data,$cond);				
			endforeach;			
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('exhibitors/overview'));
	}

	

}
