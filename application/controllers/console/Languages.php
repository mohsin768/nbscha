<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Languages extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('LanguagesModel');
	}

	public function index()
	{
		redirect(admin_url_string('languages/overview'));
	}

	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('languages/overview');
    $config['total_rows'] = $this->LanguagesModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['languages'] = $this->LanguagesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']));
		$this->mainvars['content']=$this->load->view(admin_url_string('languages/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('label', 'Label', '');
		$this->form_validation->set_rules('class', 'Class', '');
		$this->form_validation->set_rules('code', 'Code', 'required|is_unique[languages.code]');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('is_unique', 'already exists');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['content'] = $this->load->view(admin_url_string('languages/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data=array(
						'name'=>$this->input->post('name'),
						'label'=>$this->input->post('label'),
						'class'=>$this->input->post('class'),
						'code'=>$this->input->post('code'),
						'status'=>$this->input->post('status'));
			$insertid=$this->LanguagesModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('languages/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('languages/overview'));
			}
		}
	}

  public function edit($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('class', 'Class', '');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['language']= $this->LanguagesModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('languages/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$data=array(
							'name'=>$this->input->post('name'),
							'label'=>$this->input->post('label'),
							'class'=>$this->input->post('class'),
							'status'=>$this->input->post('status'));

			$cond = array('id' => $id);
      $actionStatus=$this->LanguagesModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('languages/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('languages/overview'));
			}
		}
	}



	public function makedefault($id){
		$lanRow = $this->LanguagesModel->load($id);
		if(!$lanRow){
			redirect(admin_url_string('languages/overview'));
		}
		$resetData=array(
			'default_language'=>'0'
		);
		$this->LanguagesModel->updateCond($resetData,array());
		$data=array(
			'default_language'=>'1','status'=>'1'
		);
		$cond = array('id' => $id);
		$actionStatus=$this->LanguagesModel->updateCond($data,$cond);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
			redirect(admin_url_string('languages/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('languages/overview'));
		}
	}

}
