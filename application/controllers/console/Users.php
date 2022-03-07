<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends ConsoleController {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
		parent::__construct();
		$this->load->model('AdminRolesModel');
		$this->load->model('AdminsModel');
	}

	public function index()
	{
		redirect(admin_url_string('users/overview'));
	}

	public function overview(){
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('users/overview');
        $config['total_rows'] = $this->AdminsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['users'] = $this->AdminsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']));
		$vars['roles'] = $this->AdminRolesModel->getRolesArray();
		$this->mainvars['content']=$this->load->view(admin_url_string('users/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add() {
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admins.email]');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|callback_username_exists');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confpassword]|min_length[6]');
		$this->form_validation->set_rules('confpassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['roles'] = $this->AdminRolesModel->getRolesArray();
			$this->mainvars['content'] = $this->load->view(admin_url_string('users/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$this->load->helper('string');
			$salt = random_string('alnum', 6);
			$password = sha1($salt.$this->input->post('password').$salt);
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'username' => $this->input->post('username'),
				'password' => $password,
				'salt' => $salt,
				'role' => $this->input->post('role'),
				'created' => date('Y-m-d H:i:s'),
				'status' => $this->input->post('status'));
			$insertrow = $this->AdminsModel->insert($data);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'User added successfully.'));
				redirect(admin_url_string('users/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
                redirect(admin_url_string('users/overview'));
			}
		}
	}
	function username_exists($val) {
		if($this->input->post('uid')){
			$cond = array('uid !=' => $this->input->post('uid'), 'username' => $val);
		} else {
			$cond = array('username' => $val);
		}
		if($this->AdminsModel->rowExists($cond)) {
			$this->form_validation->set_message('username_exists', 'Username - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function edit($uid){
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|callback_username_exists');
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['roles'] = $this->AdminRolesModel->getRolesArray();
			$vars['user'] =$this->AdminsModel->load($uid);
			$this->mainvars['content'] = $this->load->view(admin_url_string('users/edit'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'username' => $this->input->post('username'),
				'role' => $this->input->post('role'),
				'status' => $this->input->post('status'));
			$insertrow = $this->AdminsModel->update($uid,$data);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'User edited successfully.'));
				redirect(admin_url_string('users/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('users/overview'));
			}
		}
	}
	public function changepwd($uid){
		$user = $this->AdminsModel->load($uid);
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confpassword]|min_length[6]');
        $this->form_validation->set_rules('confpassword', 'Confirm Password', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['user'] =$user;
			$this->mainvars['content'] = $this->load->view(admin_url_string('users/changepwd'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$salt = $user->salt;
			$password = sha1($salt.$this->input->post('password').$salt);
			$data = array('password' => $password);
			$cond = array('uid'=>$uid);
			$insertrow = $this->AdminsModel->updateCond($data,$cond);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'User password changed successfully.'));
				redirect(admin_url_string('users/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('users/overview'));
			}
		}
	}
	function delete($uid) {
		$data = array('uid'=>$uid);
		$insertrow = $this->AdminsModel->deleteCond($data);
		if ($insertrow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'User deleted successfully.'));
			redirect(admin_url_string('users/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('users/overview'));
		}
	}
}
