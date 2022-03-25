<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends MemberController {

	function __construct() {
		parent::__construct();
		$this->load->model('EnquiriesModel');
	}

	public function index()
	{
		redirect(member_url_string('enquiries/overview'));
	}

	public function overview()
	{
		$cond = array('member_id'=>$this->session->userdata('member_user_id'));
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'created';

		if($this->session->userdata('enquiry_search_key_filter')!=''){
			$like[] = array('field'=>'name', 'value' => $this->session->userdata('enquiry_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'email', 'value' => $this->session->userdata('enquiry_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'phone', 'value' => $this->session->userdata('enquiry_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('enquiry_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('enquiry_sort_field_filter');
			$sort_direction = $this->session->userdata('enquiry_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = member_url_string('enquiries/overview');
    $config['total_rows'] = $this->EnquiriesModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['enquiries'] = $this->EnquiriesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(member_views_path('enquiries/overview'),$vars,true);
		$this->load->view(member_views_path('main'),$this->mainvars);
	}


	function actions()
	{
		$actionStatus=false;
		$ids=$this->input->post('id');

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('enquiry_sort_field_filter'  => $sortField);

					if($this->session->userdata('enquiry_sort_order_filter')=='asc'){
						$newdata['enquiry_sort_order_filter'] = 'desc';
					} else{
						$newdata['enquiry_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('enquiry_sort_order_filter','enquiry_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('enquiry_sort_field_filter','enquiry_sort_order_filter',
				'enquiry_search_key_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('enquiry_search_key')!=''){
						$newdata = array(
								'enquiry_search_key_filter'  => $this->input->post('enquiry_search_key'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('enquiry_search_key_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(member_url_string('enquiries/overview'));
	}

	public function view()
	{
		$id = $this->input->post('id', TRUE);
		$enquiryRow = $this->EnquiriesModel->load($id);
		if(!$enquiryRow){
			redirect(member_url_string('enquiries/overview'));
		}
		$edit['enquiry']= $enquiryRow;
		$this->load->view(member_url_string('enquiries/view'), $edit);
	}

}
