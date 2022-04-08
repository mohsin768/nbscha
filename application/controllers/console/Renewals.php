<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renewals extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('RenewalsModel');
		$this->load->model('PackagesModel');
		$this->load->model('ResidencesModel');
		$this->load->model('MembersModel');
		$this->load->model('MembershipsModel');
		$this->load->library('certificatehelper');
	}

	public function index()
	{
		redirect(admin_url_string('renewals/overview'));
	}
	
	public function overview()
	{
		$cond = array();
		$like = array();

		$sort_direction = 'desc';
		$sort_field =  'created_date';

		if($this->session->userdata('renewal_status_filter')!=''){
			$cond['status']= $this->session->userdata('renewal_status_filter');
		}

		if($this->session->userdata('renewal_date_filter')!=''){
			$cond['DATE(created_date)']= date('Y-m-d', strtotime($this->session->userdata('renewal_date_filter')));
		}

		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('renewals/overview');
        $config['total_rows'] = $this->RenewalsModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['members'] =$this->MembersModel->getIdPair();
		$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
		$vars['renewals'] = $this->RenewalsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$this->mainvars['content']=$this->load->view(admin_url_string('renewals/overview'),$vars,true);
		$this->mainvars['page_scripts'] = $this->load->view(admin_url_string('renewals/script'),'',true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	public function view($id){
			$request = $this->RenewalsModel->load($id);
			if(!$request){
				redirect(admin_url_string('renewals/overview'));
			}
			$vars['request'] = $request;
			$vars['member'] = $this->MembersModel->load($request->member_id);
			$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
			$this->mainvars['content'] = $this->load->view(admin_url_string('renewals/view'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
	}

	public function approve($id){
		$requestRow = $this->RenewalsModel->getRowCond(array('id'=>$id, 'status'=>'pending'));
		if(!$requestRow){
			redirect(admin_url_string('renewals/overview'));
		}
		$packageRow = $this->PackagesModel->getRowCond(array('pid'=>$requestRow->new_package_id));
		$membershipRow = $this->MembershipsModel->getRowCond(array('member_id'=>$requestRow->member_id));
		if($membershipRow){
			$expiryDate = date('Y-m-d', strtotime('31 march +1 year'));
			$data = array(
				'package_id'=>$requestRow->new_package_id,
				'issue_date'=>date('Y-m-d H:i:s'),
				'expiry_date'=>$expiryDate,
			);
			$membershipId = $membershipRow->id;
			$this->MembershipsModel->updateCond($data,array('id'=>$membershipId));
			$residenceRow = $this->ResidencesModel->getRowCond(array('id'=>$membershipRow->residence_id));
			$residenceData = array('package_id'=>$packageRow->pid,'beds_count'=>$packageRow->bed_count,'max_beds_count'=>$requestRow->new_max_beds_count);
			if($residenceRow->vacancy>$packageRow->bed_count){
				$residenceData['vacancy'] = $packageRow->bed_count;
			}
			$this->ResidencesModel->updateCond($residenceData,array('id'=>$membershipRow->residence_id));
			$certificates = $this->certificatehelper->generateCertificates($membershipId);
			$certificate = '';
			if($certificates['main_certificate']) $certificate = serialize($certificates['main_certificate']);
			$wallet_certificate = '';
			if($certificates['wallet_certificate']) $wallet_certificate = serialize($certificates['wallet_certificate']);
			$this->MembershipsModel->updateCond(array('certificate'=>$certificate,'wallet_certificate'=>$wallet_certificate),array('id'=>$membershipId));
			$actionStatus = $this->RenewalsModel->updateCond(array('status'=>'approved'),array('id'=>$id));
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Approved Successfully.'));
			redirect(admin_url_string('renewals/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('renewals/overview'));
		}
	}

	public function reject($id){
		$requestRow = $this->RenewalsModel->getRowCond(array('id'=>$id, 'status'=>'pending'));
		if(!$requestRow){
			redirect(admin_url_string('renewals/overview'));
		}
		$actionStatus = $this->RenewalsModel->updateCond(array('status'=>'rejected'),array('id'=>$id));
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Rejected Successfully.'));
			redirect(admin_url_string('renewals/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('renewals/overview'));
		}
	}

	function actions()
	{
		$actionStatus=false;
		$ids=$this->input->post('id');

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('renewal_status_filter','renewal_date_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('renewal_date')!=''||$this->input->post('renewal_status')!=''){
						$newdata = array(
								'renewal_date_filter'  => $this->input->post('renewal_date'),
								'renewal_status_filter'  => $this->input->post('renewal_status'));
						$this->session->set_userdata($newdata);
				} else {
					$newdata = array('renewal_date_filter','renewal_status_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('renewals/overview'));
	}

	function regeneratecertificates(){
		$memberships = $this->MembershipsModel->getArray();
		foreach($memberships as $membership):
			$membershipId = $membership['id'];
			$certificates = $this->certificatehelper->generateCertificates($membershipId);
			$certificate = '';
			if($certificates['main_certificate']) $certificate = serialize($certificates['main_certificate']);
			$wallet_certificate = '';
			if($certificates['wallet_certificate']) $wallet_certificate = serialize($certificates['wallet_certificate']);
			$this->MembershipsModel->updateCond(array('certificate'=>$certificate,'wallet_certificate'=>$wallet_certificate),array('id'=>$membershipId));
		endforeach;
		$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Regenerated All Certificates'));
		redirect(admin_url_string('home/dashboard'));
	}
	

}
