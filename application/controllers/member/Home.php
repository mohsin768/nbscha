<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MemberController {

	function __construct() {
		parent::__construct();
		$this->load->model('MembersModel');
		$this->load->model('MembershipsModel');
		$this->load->model('PackagesModel');
		$this->load->model('ResidencesModel');
		$this->load->model('PackagesModel');
		$this->load->model('RegionsModel');
		$this->load->model('FeaturesModel');
		$this->load->model('FacilitiesModel');
		$this->load->model('CarelevelsModel');
		$this->load->model('EnquiriesModel');
	}

	public function index()
	{
		redirect(member_url_string('home/dashboard'));
	}

	public function dashboard()
	{
		$language = $this->default_language;
		$residence = $this->ResidencesModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id'),'language'=>$language));
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id')));
		$packageId = $memberShip->package_id;
		$package = $this->PackagesModel->getRowCond(array('pid'=>$packageId,'language'=>$language));
		$vars['membership'] = $memberShip;
		$vars['residence'] = $residence;
		$vars['package'] = $package;
		$vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
		$vars['enquiries'] = $this->EnquiriesModel->getArrayLimitCond('5', array('member_id'=>$this->session->userdata('member_user_id')),'created' , 'asc');
		$this->mainvars['content'] = $this->load->view(member_views_path('home/dashboard'),$vars,true);
		$this->load->view(member_views_path('main'),$this->mainvars);
	}

	public function logout() {
		$newdata = array('member_user_id',
                         'member_user_name',
                         'member_user_email',
                         'member_user_logged_in'
                        );
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect(member_url_string('login'));
	}

	public function editprofile(){
		$current_user=$this->session->userdata('member_user_id');
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_email_exists');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['user'] =$this->MembersModel->load($current_user);
			$this->mainvars['content'] = $this->load->view(member_url_string('home/profiles/editprofile'), $vars, true);
			$this->load->view(member_url_string('main'), $this->mainvars);
		} else {
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'));
			$cond = array('mid'=>$current_user);
			$insertrow = $this->MembersModel->updateCond($data,$cond);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Profile edited successfully.'));
				redirect(member_url_string('home/editprofile'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(member_url_string('home/editprofile'));
			}
		}
	}

	function email_exists($val) {
		$cond = array('mid !=' => $this->session->userdata('member_user_id'), 'email' => $val);
		if($this->MembersModel->rowExists($cond)) {
			$this->form_validation->set_message('email_exists', 'Email - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function changepwd(){
		$current_user=$this->session->userdata('member_user_id');
		$this->form_validation->set_rules('passold', 'Old Password', 'required|callback_passwordCheck');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confpassword]|min_length[6]');
        $this->form_validation->set_rules('confpassword', 'Confirm Password', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['user'] =$this->MembersModel->load($current_user);;
			$this->mainvars['content'] = $this->load->view(member_url_string('home/profiles/changepwd'), $vars, true);
			$this->load->view(member_url_string('main'), $this->mainvars);
		} else {
			$salt = $this->input->post('salt');
			$password = sha1($salt.$this->input->post('password').$salt);
			$data = array('password' => $password);
			$cond = array('mid'=>$current_user);
			$insertrow = $this->MembersModel->updateCond($data,$cond);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'User password changed successfully.'));
				redirect(member_url_string('home/changepwd'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(member_url_string('home/changepwd'));
			}
		}
	}

	function passwordCheck($code)
	{
		$salt = $this->input->post('salt');
		$pass = $this->db->escape_str($code);
        $pass = sha1($salt.$pass.$salt);
		$cond = array( 'password' => $pass, 'mid' => $this->session->userdata('member_user_id'));
		if (!$this->MembersModel->passwordCheck($cond))
		{
			$this->form_validation->set_message('passwordCheck', 'Invalid password');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

}
