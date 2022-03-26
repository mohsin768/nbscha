<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('EnquiriesModel');
		$this->load->model('ResidencesModel');
		$this->load->model('TeamsModel');

	}

	public function index()
	{
		$newdata = array('enquiry_sort_field_filter',
		'enquiry_sort_order_filter',
		'enquiry_search_key_filter',
		'enquiry_type_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('enquiries/overview'));
	}


	public function overview()
	{
		$cond = array();
		$like = array();

		$sort_direction = 'desc';
		$sort_field =  'created';

		if($this->session->userdata('enquiry_search_key_filter')!=''){
			$like[] = array('field'=>'name', 'value' => $this->session->userdata('enquiry_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'email', 'value' => $this->session->userdata('enquiry_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'phone', 'value' => $this->session->userdata('enquiry_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('enquiry_type_filter')!=''){
			$cond['type']= $this->session->userdata('enquiry_type_filter');
		}
		if($this->session->userdata('enquiry_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('enquiry_sort_field_filter');
			$sort_direction = $this->session->userdata('enquiry_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url_string('enquiries/overview');
    $config['total_rows'] = $this->EnquiriesModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['enquiries'] = $this->EnquiriesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$vars['residences'] =$this->ResidencesModel->getElementPair('id','name','','',array('language'=>$this->default_language));
		$vars['teams'] =$this->TeamsModel->getElementPair('id','name','','',array('language'=>$this->default_language));
		$this->mainvars['content']=$this->load->view(admin_url_string('enquiries/overview'),$vars,true);
		$this->mainvars['page_scripts'] = $this->load->view(admin_url_string('enquiries/script'),'',true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
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
				'enquiry_search_key_filter','enquiry_type_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('enquiry_search_key')!=''||$this->input->post('enquiry_type')!=''){
						$newdata = array(
								'enquiry_search_key_filter'  => $this->input->post('enquiry_search_key'),
								'enquiry_type_filter'  => $this->input->post('enquiry_type'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('enquiry_search_key_filter','enquiry_type_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('enquiries/overview'));
	}

  	public function view()
	{
		$id = $this->input->post('id', TRUE);
		$enquiryRow = $this->EnquiriesModel->load($id);
		if(!$enquiryRow){
			redirect(admin_url_string('enquiries/overview'));
		}
		$vars['enquiry']= $enquiryRow;
		$vars['residences'] =$this->ResidencesModel->getElementPair('id','name','','',array('language'=>$this->default_language));
		$vars['teams'] =$this->TeamsModel->getElementPair('id','name','','',array('language'=>$this->default_language));
		$this->load->view(admin_url_string('enquiries/view'), $vars);
	}


	public function delete($id)
	{

		$clientRow = $this->EnquiriesModel->load($id);
		if(!$clientRow){
			redirect(admin_url_string('enquiries/overview'));
		}
		$actionStatus=$this->EnquiriesModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('enquiries/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('enquiries/overview'));
		}
    }



}
