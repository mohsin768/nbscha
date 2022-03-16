<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends ConsoleController {

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
	 * @see https://codeigniter.com/member_gmide/general/urls.html
	 */

	function __construct() {
		parent::__construct();
		$this->load->model('MembersModel');
	}

	public function index()
	{
		$newdata = array('member_sort_field_filter','member_sort_order_filter','member_search_key_filter','member_status_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('members/overview'));
	}

	public function overview(){
		$cond = array('delete_status'=>'0');
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'created';

		if($this->session->userdata('member_status_filter')!=''){
			$cond['status']= $this->session->userdata('member_status_filter');
		}

		if($this->session->userdata('member_search_key_filter')!=''){
			$like[] = array('field'=>'first_name', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'last_name', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'email', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'phone', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('member_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('member_sort_field_filter');
			$sort_direction = $this->session->userdata('member_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('members/overview');
    $config['total_rows'] = $this->MembersModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['members'] = $this->MembersModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('members/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add() {
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[members.email]');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confpassword]|min_length[6]');
		$this->form_validation->set_rules('confpassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$this->mainvars['content'] = $this->load->view(admin_url_string('members/add'), '', true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$this->load->helper('string');
			$salt = random_string('alnum', 6);
			$password = sha1($salt.$this->input->post('password').$salt);
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'password' => $password,
				'salt' => $salt,
				'created' => date('Y-m-d H:i:s'),
				'status' => $this->input->post('status'));
			$insertrow = $this->MembersModel->insert($data);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Member added successfully.'));
				redirect(admin_url_string('members/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('members/overview'));
			}
		}
	}

	public function edit($mid){
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['member'] =$this->MembersModel->load($mid);
			$this->mainvars['content'] = $this->load->view(admin_url_string('members/edit'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'status' => $this->input->post('status'));
			$insertrow = $this->MembersModel->update($mid,$data);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Member edited successfully.'));
				redirect(admin_url_string('members/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('members/overview'));
			}
		}
	}
	public function changepwd($mid){
		$member = $this->MembersModel->load($mid);
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confpassword]|min_length[6]');
    $this->form_validation->set_rules('confpassword', 'Confirm Password', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['member'] =$member;
			$this->mainvars['content'] = $this->load->view(admin_url_string('members/changepwd'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$salt = $member->salt;
			$password = sha1($salt.$this->input->post('password').$salt);
			$data = array('password' => $password);
			$cond = array('mid'=>$mid);
			$updaterow = $this->MembersModel->updateCond($data,$cond);
			if ($updaterow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Member password changed successfully.'));
				redirect(admin_url_string('members/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('members/overview'));
			}
		}
	}
	function delete($mid) {
		$data = array('delete_status' => '1','status'=>'0');
		$cond = array('mid'=>$mid);
		$updaterow = $this->MembersModel->updateCond($data,$cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Member deleted successfully.'));
			redirect(admin_url_string('members/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('members/overview'));
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
				$cond=array('mid'=>$id);
				$actionStatus=$this->MembersModel->updateCond($data,$cond);
			endforeach;
		}


		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('member_sort_field_filter'  => $sortField);

					if($this->session->userdata('member_sort_order_filter')=='asc'){
						$newdata['member_sort_order_filter'] = 'desc';
					} else{
						$newdata['member_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('member_sort_order_filter','member_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('member_sort_field_filter','member_sort_order_filter','member_search_key_filter','member_status_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('member_search_key')!=''||
					 $this->input->post('member_status')!=''){
						$newdata = array(
								'member_search_key_filter'  => $this->input->post('member_search_key'),
								'member_status_filter'  => $this->input->post('member_status'));
						$this->session->set_userdata($newdata);
				} else {
					$newdata = array('member_search_key_filter','member_status_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('members/overview'));
	}

}
