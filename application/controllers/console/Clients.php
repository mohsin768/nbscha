<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('ClientsModel');

	}

	public function index()
	{
		redirect(admin_url_string('clients/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('clients/overview');
        $config['total_rows'] = $this->ClientsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['clients'] = $this->ClientsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order','ASC');
		$this->mainvars['content']=$this->load->view(admin_url_string('clients/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add() 
	{
		$this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('link', 'link', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('clients/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$logo ='';
			$clientsLogoUploadPath = 'public/uploads/clients/logos';
			if(!is_dir($clientsLogoUploadPath)){
				mkdir($clientsLogoUploadPath, 0777, TRUE);
			}
			$logoConfig['upload_path'] = $clientsLogoUploadPath;
			$logoConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $logoConfig);
			$this->upload->initialize($logoConfig);
			if($this->upload->do_upload('logo'))
			{
				$logoData=$this->upload->data();
				$logo=$logoData['file_name'];
			}
			$data=array(
				
				'name'=>$this->input->post('name'),
				'link'=>$this->input->post('link'),
				'logo'=>$logo,
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status'),
			);
			$insertid = $this->ClientsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('clients/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('clients/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$clientRow = $this->ClientsModel->load($id);
		if(!$clientRow){
			redirect(admin_url_string('clients/overview'));
		}
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('link', 'link', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['client']= $this->ClientsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('clients/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
				'name'=>$this->input->post('name'),
				'link'=>$this->input->post('link'),
				'sort_order'=>$this->input->post('sort_order'),
				'status'=>$this->input->post('status'),
			);
			if($this->input->post('logo_image') && $this->input->post('logo_image')=='1'){
				$data['logo']='';
			} else{
			$clientsLogoUploadPath = 'public/uploads/clients/logos';
			if(!is_dir($clientsLogoUploadPath)){
				mkdir($clientsLogoUploadPath, 0777, TRUE);
			}
			$logoConfig['upload_path'] = $clientsLogoUploadPath;
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
      		$actionStatus=$this->ClientsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('clients/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('clients/overview'));
			}
		}
	}

	
	public function delete($id)
	{
		$clientRow = $this->ClientsModel->load($id);
		if(!$clientRow){
			redirect(admin_url_string('clients/overview'));
		}
		$actionStatus=$this->ClientsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('clients/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('clients/overview'));
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
				$actionStatus=$this->ClientsModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->ClientsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('clients/overview'));
	}

	

}
