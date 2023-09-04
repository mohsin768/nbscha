<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends GlobalController {

	function __construct() {
		parent::__construct();
		if ($this->session->userdata('member_user_logged_in')) {
			redirect(member_url_string('home'));
		}
		$this->member_language = $this->default_language;
		if ($this->session->userdata('member_site_language') && isset($this->languages_pair[$this->session->userdata('member_site_language')])) {
			$this->member_language = $this->session->userdata('member_site_language');
		}
		$settings=$this->SettingsModel->getArrayCond(array('language'=>$this->member_language));
		foreach($settings as $setting):
			$this->settings[$setting['settingkey']]=$setting['settingvalue'];
		endforeach;
		$localizations=$this->LocalizationModel->getArrayCond(array('language'=>$this->member_language));
		foreach($localizations as $localization):
			$this->localizations[$localization['lang_key']]=$localization['lang_value'];
		endforeach;
		$this->load->helper('translate');
		$this->load->model('MembersModel');
		$this->load->model('MemberHistoryModel');
	}

	public function index() {
		$this->form_validation->set_rules('username', 'Username', 'required|callback_login_check');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', '(required)');
		if ($this->form_validation->run() == FALSE) {
			$login['content'] = $this->load->view(member_views_path('login/login'),'', true);
			$this->load->view(member_views_path('login'), $login);
		} else {
			$user = $this->db->escape_str($this->input->post('username'));
			$pass = $this->db->escape_str($this->input->post('password'));
			$language = $this->db->escape_str($this->input->post('language'));
			$user_row = $this->MembersModel->loginCheck($user, $pass);
			if($user_row) {
				$logindata = array(
					'mid' => $user_row->mid,
					'timestamp' => time(),
					'ipaddress' => $this->input->ip_address());
				$this->MemberHistoryModel->insert($logindata);
				$newdata = array(
					'member_user_id' => $user_row->mid,
					'member_user_name' => $user_row->first_name.' '.$user_row->last_name,
					'member_user_email' => $user_row->email,
					'member_user_logged_in' => TRUE
				);
				$this->session->set_userdata($newdata);
			}
            $target = $this->session->userdata('member_user_destination');
            $baseurl = base_url();
            if(strpos($target, $baseurl) !== false) {
                $this->session->unset_userdata('member_user_destination');
                redirect($target);
            }else{
                redirect(member_url_string('home'));
            }

		}
	}

	function login_check($user) {
		$pass = $this->input->post('password');
		if(!$this->MembersModel->loginCheck($user, $pass)) {
			$this->form_validation->set_message('login_check', 'Invalid Login');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function forgot() {
		$this->form_validation->set_rules('username', 'Username', 'required|callback_forgot_check');
		$this->form_validation->set_message('required', '(required)');
		if ($this->form_validation->run() == FALSE) {
			$login['content'] = $this->load->view(member_url_string('login/forgot'), '', true);
			$this->load->view(member_url_string('login'), $login);
		} else {
			$user = $this->db->escape_str($this->input->post('username'));
			$user_row = $this->MembersModel->forgotCheck($user);
			if ($user_row) {
				$this->load->model('MemberResetModel');
				$this->load->helper('string');
				$userKey = random_string('alnum', 16);
				$resetdata = array('user_id' => $user_row->mid, 'user_key' =>$userKey );
				$this->MemberResetModel->insert($resetdata);
				$mailData = array('mail_to'=>$user_row->email,'fullname'=>$user_row->fullname,'reset_url'=>member_url('login/resetpwd/'.$user_row->mid.'/'.$userKey));
				$this->mailhelper->sendNotification('member_reset_password',$mailData);
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Password reset link sent to your email.'));
				redirect(member_url_string('login/forgot'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-error','message'=>'Invalid User'));
				redirect(member_url_string('login/forgot'));
			}
		}
	}

	function forgot_check($user) {
		if (!$this->MembersModel->forgotCheck($user)) {
			$this->form_validation->set_message('forgot_check', 'Invalid Username');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function resetpwd($id, $key) {
		$this->load->model('MemberResetModel');
		$resetcond = array('user_id' => $id, 'user_key' => $key);
		$resetStatus = $this->MemberResetModel->rowExists($resetcond);
		$cond = array('mid' => $id, 'status' => '1');
		$userStatus = $this->MembersModel->getRowCond($cond);
		if ($resetStatus &&  $userStatus){
			$this->form_validation->set_rules('pass', 'Password', 'required|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'Confirm Password', 'required');
			$this->form_validation->set_message('required', '(required)');
			$this->form_validation->set_message('matches', 'Password Mismatch');
			if ($this->form_validation->run() == FALSE) {
				$reset['id'] = $id;
				$reset['key'] = $key;
				$login['content'] = $this->load->view(member_url_string('login/reset'), $reset, true);
				$this->load->view(member_url_string('login'), $login);
			} else {
				$cond = array('mid' => $id, 'status' => '1');
				$user_row = $this->MembersModel->getRowCond($cond);
				if(!$user_row){
					redirect(member_url_string('login'));
				} else {
					$passtext = $this->db->escape_str($this->input->post('pass'));
					$pass = sha1($user_row->salt.$passtext.$user_row->salt);
					$data = array('password' => $pass);
					$cond = array('mid' => $id);
					$this->MembersModel->updateCond($data, $cond);
					$resetdata = array('user_id' => $id, 'user_key' => $key);
					$this->MemberResetModel->deleteCond($resetdata);
					redirect(member_url_string('login/resetsuccess'));
				}
			}
		} else {
			redirect(member_url_string('login/forgot'));
		}
	}

	public function resetsuccess() {
		$login['content'] = $this->load->view(member_url_string('login/resetsuccess'), '', true);
		$this->load->view(member_url_string('login'), $login);
	}
}
