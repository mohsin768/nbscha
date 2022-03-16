<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends FrontController {

	var $pageObject, $pageType, $pageId;

	function __construct() {
		parent::__construct();
		$this->load->model('PagesModel');
	}

	public function index()
	{
		$this->form_validation->set_rules('instrument', 'Instrument', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('home_phone', 'Home Phone', '');
		$this->form_validation->set_rules('mobile', 'Cellphone', 'required');
		$this->form_validation->set_rules('find_us', 'Find Us', 'required');
		$this->form_validation->set_rules('experience', 'Experience', 'required');
		$this->form_validation->set_rules('experience_summary', 'Experience Summary', '');
		$this->form_validation->set_rules('emergency_contact_name', 'Contact Name', '');
		$this->form_validation->set_rules('emergency_contact_phone', 'Contact Phone', '');
		$this->form_validation->set_rules('medical_condition', 'Medical Condition', '');
		$this->form_validation->set_rules('age_confirmation', 'Age', 'required');
		$this->form_validation->set_rules('student_name', 'Student Name', 'required');
		$this->form_validation->set_rules('agreement_date', 'Agreement Date', 'required');
		$this->form_validation->set_rules('agreement', 'Agreement', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->model('PackagesModel');
			$pageId = $this->settings['REGISTER_PAGE_ID'];
			$pageObject = $this->PagesModel->getRowCond(array('id'=>$pageId,'language'=>$this->site_language));
			$this->pageType = 'register';
			if(!$pageObject){
				redirect('pagenotfound');
			}
			$this->pageObject = $pageObject;
			$this->pageId = $pageObject->id;
			$this->processPage();
			$this->mainvars['banner']=$this->widgethelper->bannerWidget();
			$vars = array();
			$vars['pacakges'] = $this->PackagesModel->getArrayCond(array('status'=>'1','language'=>$this->site_language),'','sort_order','ASC');
			$this->mainvars['content_top']= $this->load->view(frontend_views_path('register/form'),$vars,TRUE);
			$this->mainvars['content']=$this->widgethelper->pageContent();
			$this->load->view(frontend_views_path('main'),$this->mainvars);
		} else {
			$this->load->model('MembersModel');
			$data = array(
				'instrument' => secureInput($this->input->post('instrument')),
				'name' => secureInput($this->input->post('name')),
				'address' => secureInput($this->input->post('address')),
				'email' => secureInput($this->input->post('email')),
				'dob' => date('Y-m-d',strtotime(secureInput($this->input->post('dob')))),
				'home_phone' => secureInput($this->input->post('home_phone')),
				'mobile' => secureInput($this->input->post('mobile')),
				'find_us' => secureInput($this->input->post('find_us')),
				'experience' => secureInput($this->input->post('experience')),
				'experience_summary' => secureInput($this->input->post('experience_summary')),
				'emergency_contact_name' => secureInput($this->input->post('emergency_contact_name')),
				'emergency_contact_phone' => secureInput($this->input->post('emergency_contact_phone')),
				'medical_condition' => secureInput($this->input->post('medical_condition')),
				'age_confirmation' => secureInput($this->input->post('age_confirmation')),
				'student_name' => secureInput($this->input->post('student_name')),
				'agreement_date' => date('Y-m-d',strtotime(secureInput($this->input->post('agreement_date'))))
			);
			$actionStatus = $this->MembersModel->insert($data);
			if($actionStatus){
				$adminMailData = $data;
				$adminMailData['mail_to'] = $this->settings['ADMIN_EMAIL'];
				$this->mailhelper->sendNotification('register_admin_notification',$adminMailData);
				$userMailData = $data;
				$userMailData['mail_to'] = $data['email'];
				$this->mailhelper->sendNotification('register_user_notification',$userMailData);
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'<strong>Well done!</strong> You have successfully registered. We will get back to you.'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'<strong>Error!</strong> Cannot register now. Try again later'));
			}
			redirect(site_url('register'));
		}
	}
}
