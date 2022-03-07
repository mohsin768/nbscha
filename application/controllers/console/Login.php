<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends GlobalController {

	function __construct() {
		parent::__construct();
		if ($this->session->userdata('admin_user_logged_in')) {
			redirect(admin_url_string('home'));
		}
		$this->load->model('AdminsModel');
		$this->load->model('AdminHistoryModel');
	}

	public function index() {
		$this->form_validation->set_rules('username', 'Username', 'required|callback_login_check');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', '(required)');
		if ($this->form_validation->run() == FALSE) {
			$login['content'] = $this->load->view(admin_views_path('login/login'),'', true);
			$this->load->view(admin_views_path('login'), $login);
		} else {
			$user = $this->db->escape_str($this->input->post('username'));
			$pass = $this->db->escape_str($this->input->post('password'));
			$language = $this->db->escape_str($this->input->post('language'));
			$user_row = $this->AdminsModel->loginCheck($user, $pass);
			if($user_row) {
				$logindata = array(
					'uid' => $user_row->uid,
					'timestamp' => time(),
					'ipaddress' => $this->input->ip_address());
				$this->AdminHistoryModel->insert($logindata);
				$newdata = array(
					'admin_user_id' => $user_row->uid,
					'admin_user_name' => $user_row->fullname,
					'admin_user_email' => $user_row->email,
					'admin_user_role' => $user_row->role,
					'admin_user_language' => $language,
					'admin_user_logged_in' => TRUE
				);
				$this->session->set_userdata($newdata);
			}
            $target = $this->session->userdata('admin_user_destination');
            $baseurl = base_url();
            if(strpos($target, $baseurl) !== false) {
                $this->session->unset_userdata('admin_user_destination');
                redirect($target);
            }else{
                redirect(admin_url_string('home'));
            }

		}
	}

	function login_check($user) {
		$pass = $this->input->post('password');
		if(!$this->AdminsModel->loginCheck($user, $pass)) {
			$this->form_validation->set_message('login_check', 'Invalid Login');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function forgot() {
		$this->form_validation->set_rules('username', 'Username or Email Address', 'required|callback_forgot_check');
		$this->form_validation->set_message('required', '(required)');
		if ($this->form_validation->run() == FALSE) {
			$login['content'] = $this->load->view(admin_url_string('login/forgot'), '', true);
			$this->load->view(admin_url_string('login'), $login);
		} else {
			$user = $this->db->escape_str($this->input->post('username'));
			$user_row = $this->AdminsModel->forgotCheck($user);
			if ($user_row) {
				$this->load->model('AdminResetModel');
				$this->load->helper('string');
				$userKey = random_string('alnum', 16);
				$resetdata = array('user_id' => $user_row->uid, 'user_key' =>$userKey );
				$this->AdminResetModel->insert($resetdata);
				$mailData = array('mail_to'=>$user_row->email,'fullname'=>$user_row->fullname,'reset_url'=>admin_url('login/resetpwd/'.$user_row->uid.'/'.$userKey));
				$this->mailhelper->sendNotification('admin_reset_password',$mailData);
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Password reset link sent to your email.'));
				redirect(admin_url_string('login/forgot'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-error','message'=>'Invalid User'));
				redirect(admin_url_string('login/forgot'));
			}
		}
	}

	function forgot_check($user) {
		if (!$this->AdminsModel->forgotCheck($user)) {
			$this->form_validation->set_message('forgot_check', 'Invalid Username or Email Address');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function resetpwd($id, $key) {
		$this->load->model('AdminResetModel');
		$resetcond = array('user_id' => $id, 'user_key' => $key);
		$resetStatus = $this->AdminResetModel->rowExists($resetcond);
		$cond = array('uid' => $id, 'status' => '1');
		$userStatus = $this->AdminsModel->getRowCond($cond);
		if ($resetStatus &&  $userStatus){
			$this->form_validation->set_rules('pass', 'Password', 'required|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'Confirm Password', 'required');
			$this->form_validation->set_message('required', '(required)');
			$this->form_validation->set_message('matches', 'Password Mismatch');
			if ($this->form_validation->run() == FALSE) {
				$reset['id'] = $id;
				$reset['key'] = $key;
				$login['content'] = $this->load->view(admin_url_string('login/reset'), $reset, true);
				$this->load->view(admin_url_string('login'), $login);
			} else {
				$cond = array('uid' => $id, 'status' => '1');
				$user_row = $this->AdminsModel->getRowCond($cond);
				if(!$user_row){
					redirect(admin_url_string('login'));
				} else {
					$passtext = $this->db->escape_str($this->input->post('pass'));
					$pass = sha1($user_row->salt.$passtext.$user_row->salt);
					$data = array('password' => $pass);
					$cond = array('uid' => $id);
					$this->AdminsModel->updateCond($data, $cond);
					$resetdata = array('user_id' => $id, 'user_key' => $key);
					$this->AdminResetModel->deleteCond($resetdata);
					redirect(admin_url_string('login/resetsuccess'));
				}
			}
		} else {
			redirect(admin_url_string('login/forgot'));
		}
	}

	public function resetsuccess() {
		$login['content'] = $this->load->view(admin_url_string('login/resetsuccess'), '', true);
		$this->load->view(admin_url_string('login'), $login);
	}
}
