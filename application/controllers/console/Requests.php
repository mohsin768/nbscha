<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends ConsoleController {

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
	 * @see https://codeigniter.com/request_gide/general/urls.html
	 */

	function __construct() {
		parent::__construct();
		$this->load->model('RequestsModel');
		$this->load->model('PackagesModel');
		$this->load->model('RegionsModel');
	}

	public function index()
	{
		$newdata = array('request_sort_field_filter','request_sort_order_filter','request_search_key_filter','request_status_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('requests/overview'));
	}

	public function overview(){
		$cond = array();
		$like = array();

		$sort_direction = 'desc';
		$sort_field =  'created';

		if($this->session->userdata('request_status_filter')!=''){
			$cond['status']= $this->session->userdata('request_status_filter');
		}

		if($this->session->userdata('request_date_filter')!=''){
			$cond['DATE(created)']= date('Y-m-d', strtotime($this->session->userdata('request_date_filter')));
		}

		if($this->session->userdata('request_search_key_filter')!=''){
			$like[] = array('field'=>'first_name', 'value' => $this->session->userdata('request_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'last_name', 'value' => $this->session->userdata('request_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'email', 'value' => $this->session->userdata('request_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'phone', 'value' => $this->session->userdata('request_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('request_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('request_sort_field_filter');
			$sort_direction = $this->session->userdata('request_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('requests/overview');
    $config['total_rows'] = $this->RequestsModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['requests'] = $this->RequestsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
		$vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
		$this->mainvars['content']=$this->load->view(admin_url_string('requests/overview'),$vars,true);
		$this->mainvars['page_scripts'] = $this->load->view(admin_url_string('requests/script'),'',true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	public function view($id){
			$vars['request'] =$this->RequestsModel->load($id);
			$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
			$vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
			$this->mainvars['content'] = $this->load->view(admin_url_string('requests/view'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
	}

	function actions()
	{
		$actionStatus=false;
		$ids=$this->input->post('id');

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('request_sort_field_filter'  => $sortField);

					if($this->session->userdata('request_sort_order_filter')=='asc'){
						$newdata['request_sort_order_filter'] = 'desc';
					} else{
						$newdata['request_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('request_sort_order_filter','request_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('request_sort_field_filter','request_sort_order_filter','request_search_key_filter','request_status_filter','request_date_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('request_search_key')!=''||$this->input->post('request_date')!=''||$this->input->post('request_status')!=''){
						$newdata = array(
								'request_search_key_filter'  => $this->input->post('request_search_key'),
								'request_date_filter'  => $this->input->post('request_date'),
								'request_status_filter'  => $this->input->post('request_status'));
						$this->session->set_userdata($newdata);
				} else {
					$newdata = array('request_search_key_filter','request_status_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('requests/overview'));
	}

	public function approve($id){
		$requestRow = $this->RequestsModel->getRowCond(array('id'=>$id, 'status'=>'pending'));
		if(!$requestRow){
			redirect(admin_url_string('requests/overview'));
		}
		$resetData=array('status'=>'approved');
		$cond = array('id' => $id);
		$actionStatus=$this->RequestsModel->updateCond($resetData,$cond);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Approved Successfully.'));
			redirect(admin_url_string('requests/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('requests/overview'));
		}
	}

	public function reject($id){
		$requestRow = $this->RequestsModel->getRowCond(array('id'=>$id, 'status'=>'pending'));
		if(!$requestRow){
			redirect(admin_url_string('requests/overview'));
		}
		$resetData=array('status'=>'rejected');
		$cond = array('id' => $id);
		$actionStatus=$this->RequestsModel->updateCond($resetData,$cond);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Rejected Successfully.'));
			redirect(admin_url_string('requests/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('requests/overview'));
		}
	}
}
