<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('AdminsModel');
	}

	public function index()
	{
		redirect(admin_url_string('home/dashboard'));
	}
	
	public function dashboard()
	{
		$this->load->model('EnquiriesModel');
		$vars = array();
		$vars['enquiries'] = $this->EnquiriesModel->getArrayLimitCond('5','','created','DESC');
		$this->mainvars['content'] = $this->load->view(admin_views_path('home/dashboard'),$vars,true);
		$this->load->view(admin_views_path('main'),$this->mainvars);
	}

	public function logout() {
		$newdata = array('admin_user_id',
                         'admin_user_name',
                         'admin_user_email',
                         'admin_user_role',
                         'admin_user_language',
                         'admin_user_logged_in'
                        );
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect(admin_url_string('login'));
	}

	public function editprofile(){
		$current_user=$this->session->userdata('admin_user_id');
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_email_exists');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|callback_username_exists');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['user'] =$this->AdminsModel->load($current_user);
			$this->mainvars['content'] = $this->load->view(admin_url_string('home/profiles/editprofile'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'username' => $this->input->post('username'));
			$cond = array('uid'=>$current_user);
			$insertrow = $this->AdminsModel->updateCond($data,$cond);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Profile edited successfully.'));
				redirect(admin_url_string('home/editprofile'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('home/editprofile'));
			}
		}
	}

	function username_exists($val) {
		$cond = array('uid !=' => $this->session->userdata('admin_user_id'), 'username' => $val);
		if($this->AdminsModel->rowExists($cond)) {
			$this->form_validation->set_message('username_exists', 'Username - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function email_exists($val) {
		$cond = array('uid !=' => $this->session->userdata('admin_user_id'), 'email' => $val);
		if($this->AdminsModel->rowExists($cond)) {
			$this->form_validation->set_message('email_exists', 'Email - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function changepwd(){
		$current_user=$this->session->userdata('admin_user_id');
		$this->form_validation->set_rules('passold', 'Old Password', 'required|callback_passwordCheck');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confpassword]|min_length[6]');
        $this->form_validation->set_rules('confpassword', 'Confirm Password', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['user'] =$this->AdminsModel->load($current_user);;
			$this->mainvars['content'] = $this->load->view(admin_url_string('home/profiles/changepwd'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$salt = $this->input->post('salt');
			$password = sha1($salt.$this->input->post('password').$salt);
			$data = array('password' => $password);
			$cond = array('uid'=>$current_user);
			$insertrow = $this->AdminsModel->updateCond($data,$cond);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'User password changed successfully.'));
				redirect(admin_url_string('home/changepwd'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('home/changepwd'));
			}
		}
	}

	function passwordCheck($code)
	{
		$salt = $this->input->post('salt');
		$pass = $this->db->escape_str($code);
        $pass = sha1($salt.$pass.$salt);
		$cond = array( 'password' => $pass, 'uid' => $this->session->userdata('admin_user_id'));
		if (!$this->AdminsModel->passwordCheck($cond))
		{
			$this->form_validation->set_message('passwordCheck', 'Invalid password');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	function settings()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('settings', 'Settings', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->model('PagesModel');
			$cond = array('parent'=>'0','settingtype'=>'group','status'=>'Y');
			$edit['settings_groups'] = $this->SettingsModel->getArrayCond($cond,'','sort_order','ASC');
			$edit['grouped_settings'] = $this->SettingsModel->getGroupArray();
			$edit['pages'] = $this->PagesModel->getIdPair();
			$this->mainvars['content']=$this->load->view(admin_url_string('home/settings/settings'),$edit,true);
			$this->load->view(admin_url_string('main'),$this->mainvars);
		} else {
			foreach($this->input->post('setting') as $identity => $setting):
				$data=array();
				$data=array('settingvalue'=>$setting);
				$insertrow =$this->SettingsModel->update($identity,$data);
			endforeach;
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Settings updated successfully.'));
				redirect(admin_url_string('home/settings'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('home/settings'));
			}
		}
	}


	function addsettings()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('parent', 'Parent', 'required');
		$this->form_validation->set_rules('settingkey', 'Key', 'required');
		$this->form_validation->set_rules('sort_order', 'Sort Order', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$cond = array('parent'=>'0','settingtype'=>'group','status'=>'Y');
			$vars['settings_groups'] = $this->SettingsModel->getArrayCond($cond,'','sort_order','ASC');
			$this->mainvars['content']=$this->load->view(admin_url_string('home/settings/addsettings'),$vars,true);
			$this->load->view(admin_url_string('main'),$this->mainvars);
		} else {
			$this->load->model('SettingsModel');
			$data = array('title' => $this->input->post('title'),
							'parent' => $this->input->post('parent'),
				              'settingkey' =>  $this->input->post('settingkey'),
				              'settingtype' =>  $this->input->post('settingtype'),
							  'settingvalue'=>$this->input->post('settingvalue'),
							  'sort_order'=>$this->input->post('sort_order'),
				              'status' => $this->input->post('status'));
			$insertrow =$this->SettingsModel->insert($data);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Settings added successfully.'));
				redirect(admin_url_string('home/settings'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('home/settings'));
			}
		}
	}

	function clearcache(){
		$this->output->clear_all_cache();
		$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Cache cleared successfully.'));
		redirect(admin_url_string('home/dashboard'));
	}

	function updatedb(){
		$this->load->helper('directory');
		$this->load->helper('file');
		$pending_updates = array();
		$updates = directory_map('updates/data', 1);
		$this->load->model('UpdatesModel');
		if(is_array($updates) && count($updates)>0){
			foreach($updates as $update){
				if($update!='.gitkeep'){
					$uploadstat = $this->UpdatesModel->checkUpdate($update);
					if(!$uploadstat){
						$pending_updates[] = $update;
					}
				}
			}
		}
		if(count($pending_updates)>0){
			$this->load->dbutil();
			$backup = $this->dbutil->backup();
			if(!is_dir('updates/backups')){
				mkdir('updates/backups', 0777, TRUE);
			}
			$backup_stat = write_file('updates/backups/backup-'.date('Ymdhis').'.gz', $backup);
			if($backup_stat){
				$message = 'Following updates has executed:';
				$update_stats = array();
				foreach($pending_updates as $pending_update){
					$update_string = read_file('updates/data/'.$pending_update);
					$updatestat = $this->UpdatesModel->updateDatabase($update_string,$pending_update);
					$update_stats = $update_stats+$updatestat;
				}
				$resultstat = true;
				foreach($update_stats as $update_stat){
					if($update_stat['status']=='true'){
						$message .= '<br/> SUCCESS - '.$update_stat['statement'];
					} else {
						$resultstat = false;
						$message .= '<br/> ERROR - '.$update_stat['statement'];
					}
				}
				if($resultstat){
					$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>$message));
				} else {
					$this->session->set_flashdata('message', array('status'=>'alert-warning','message'=>$message));
				}
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-error','message'=>'Backup Failed.'));
			}
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'No pending updates.'));
		}
		redirect(admin_url_string('home/dashboard'));
	}
}
