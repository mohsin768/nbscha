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
		$this->load->model('FeaturesModel');
		$this->load->model('FacilitiesModel');
		$this->load->model('CarelevelsModel');
		$this->load->model('MembersModel');
		$this->load->model('MembershipsModel');
		$this->load->model('ResidencesModel');
		$this->load->model('CertificatetemplatesModel');
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
			$vars['carelevels'] =$this->CarelevelsModel->getElementPair('cid','carelevel_title','sort_order','asc',array('language'=>$this->default_language));
			$vars['facilities'] =$this->FacilitiesModel->getElementPair('fid','facility_title','sort_order','asc',array('language'=>$this->default_language));
			$vars['features'] =$this->FeaturesModel->getElementPair('fid','feature_title','sort_order','asc',array('language'=>$this->default_language));
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
		$membershipId = $memberId = $residenceId = false;
		if(!$requestRow){
			redirect(admin_url_string('requests/overview'));
		}

/////Insert Member//////
		$memberData = array('first_name' => $requestRow->first_name,
		'last_name' => $requestRow->last_name,
		'email' => $requestRow->email,
		'phone' => $requestRow->phone,
		'password' => $requestRow->password,
		'salt' => $requestRow->salt,
		'created' => date('Y-m-d H:i:s'),
		'status' => '1');
		$memberId = $this->MembersModel->insert($memberData);

/////Insert Residence Data//////
		if($memberId){
			$slug = $this->ResidencesModel->createSlug($requestRow->home_name);
			$metaTitle = $requestRow->home_name;
			$vacancy = '0';
			$bedsCount = '0';
			$package =$this->PackagesModel->load($requestRow->package_id);
			if($package)$bedsCount = $vacancy = $package->bed_count;
			$residencepData = array('slug' => $slug,
			'member_id' => $memberId,
			'address' => $requestRow->home_address,
			'postalcode' => $requestRow->home_postalcode,
			'contact_name' => $requestRow->home_contact_name,
			'email' => $requestRow->home_email,
			'phone' => $requestRow->home_phone,
			'fax' => $requestRow->home_fax,
			'package_id' => $requestRow->package_id,
			'level_id' => $requestRow->home_level,
			'pharmacy_name' => $requestRow->pharmacy_name,
			'facilities' => $requestRow->facilities,
			'region_id' => $requestRow->region_id,
			'mainimage' => $requestRow->mainimage,
			'image2' => $requestRow->image2,
			'image3' => $requestRow->image3,
			'image4' => $requestRow->image4,
			'image5' => $requestRow->image5,
			'image6' => $requestRow->image6,
			'facebook' => $requestRow->facebook,
			'instagram' => $requestRow->instagram,
			'twitter' => $requestRow->twitter,
			'youtube' => $requestRow->youtube,
			'linkedin' => $requestRow->linkedin,
			'website' => $requestRow->website,
			'features' => $requestRow->features,
			'beds_count' => $bedsCount,
			'vacancy' => $vacancy,
			'created' => date('Y-m-d H:i:s'),
			'status' => '1');
			$residenceDescData = array('name' => $requestRow->home_name,
			'description' => $requestRow->description,
			'meta_title'=>$metaTitle,
			'language' => $this->default_language);
			$residenceId = $this->ResidencesModel->insert($residencepData,$residenceDescData);
		}
/////Insert Membership//////
		if($memberId && $residenceId){
			$expiryDate = date('Y-m-d', strtotime('31 march +1 year'));
			$membershipData = array('member_id' => $memberId,
			'residence_id' => $residenceId,
			'package_id' => $requestRow->package_id,
			'issue_date' => date('Y-m-d H:i:s'),
			'expiry_date' => $expiryDate,
			'status' => '1');
			$membershipId = $this->MembershipsModel->insert($membershipData);
			if($membershipId){
				$membershipIdentifier = date('ymd').sprintf('%04d',$membershipId);
				$certificates = $this->generateCertificates($membershipId);
				$certificate = '';
				if($certificates['main_certificate']) $certificate = serialize($certificates['main_certificate']);
				$wallet_certificate = '';
				if($certificates['wallet_certificate']) $wallet_certificate = serialize($certificates['wallet_certificate']);
				$this->MembershipsModel->updateCond(array('certificate'=>$certificate,'wallet_certificate'=>$wallet_certificate,'identifier'=>$membershipIdentifier),array('id'=>$membershipId));
			}
		}

		if($membershipId){
			$resetData=array('status'=>'approved','processed_date'=>date('Y-m-d H:i:s'),'processed_by'=>$this->session->userdata('admin_user_id'));
			$cond = array('id' => $id);
			$actionStatus=$this->RequestsModel->updateCond($resetData,$cond);

			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Approved Successfully.'));
			redirect(admin_url_string('requests/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('requests/overview'));
		}
	}

	function generateCertificates($membershipId,$language=''){
		if($language==''){
			$language = $this->default_language;
		}
		$memberShip  = $this->MembershipsModel->load($membershipId);
		$memberId = $memberShip->member_id;
		$residenceId = $memberShip->residence_id;
		$packageId = $memberShip->package_id;
		$member = $this->MembersModel->load($memberId);
		$residence = $this->ResidencesModel->getRowCond(array('id'=>$residenceId,'language'=>$language));
		$package = $this->PackagesModel->getRowCond(array('pid'=>$packageId,'language'=>$language));

		$certificateContent = array('main_certificate'=>array(),'wallet_certificate'=>array());
		$certificateTemplateId = $package->certificate_template;
		$certificateTemplate = $this->CertificatetemplatesModel->getRowCond(array('id'=>$certificateTemplateId,'language'=>$language));

		$certificate = $certificateTemplate->template;
		$walletCertificate = $certificateTemplate->wallet_template;
		$residenceName = $residence->name;
		$membershipIdentifier = $memberShip->identifier;
		$certificateDate = $memberShip->issue_date;
		$expiryDate= $memberShip->expiry_date;
		$certificateSignature = '';
		if($certificateTemplate->signature!='')$certificateSignature = '<img src="'.base_url('public/uploads/certificates/'.$certificateTemplate->signature).'" style="max-width:100%" />';
		$signatory = $certificateTemplate->signatory;
		$background = '';
		$walletBackground = '';
		if($certificateTemplate->background!='') $background = base_url('public/uploads/certificates/'.$certificateTemplate->background);
		if($certificateTemplate->wallet_bg!='') $walletBackground = base_url('public/uploads/certificates/'.$certificateTemplate->wallet_bg);

		$replacements = array('{{residence}}'=>$residenceName,
													'{{identifier}}'=>$membershipIdentifier,
													'{{signature}}'=>$certificateSignature,
													'{{signatory}}'=>$signatory,
													'{{date}}'=>$certificateDate,
													'{{expiry}}'=>$expiryDate);
		if($certificate!=''){
			$certificate = strtr($certificate,$replacements);
			$certificateContent['main_certificate'] = array('certificate'=>$certificate,'background'=>$background);
		}
		if($walletCertificate!=''){
			$walletCertificate = strtr($walletCertificate,$replacements);
			$certificateContent['wallet_certificate'] = array('certificate'=>$walletCertificate,'background'=>$background);
		}

		return $certificateContent;

	}

	public function reject($id){
		$requestRow = $this->RequestsModel->getRowCond(array('id'=>$id, 'status'=>'pending'));
		if(!$requestRow){
			redirect(admin_url_string('requests/overview'));
		}
		$resetData=array('status'=>'rejected','processed_date'=>date('Y-m-d H:i:s'),'processed_by'=>$this->session->userdata('admin_user_id'));
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
