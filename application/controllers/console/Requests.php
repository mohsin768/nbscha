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
		$this->load->model('HomeLanguagesModel');
		$this->load->model('CertificatetemplatesModel');
		$this->load->library('certificatehelper');
		$this->load->model('PaymentMethodsModel');
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
    $config['total_rows'] = $this->RequestsModel->getPaginationCount($cond,$like);
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
		'username' => $requestRow->username,
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
			'max_beds_count' => $requestRow->max_beds_count,
			'language_id' => $requestRow->home_language,
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
			'virtual_tour' => $requestRow->virtual_tour,
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
			'meta_title'=>$metaTitle);
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
				$certificates = $this->certificatehelper->generateCertificates($membershipId);
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

	public function edit($rId){
		$this->output->set_content_type('application/json');
		$language = $this->default_language;
		$request = $this->RequestsModel->getRowCond(array('id'=>$rId));
		$vars['request'] = $request;
		$vars['packages'] = $this->PackagesModel->getIdPair();
		$vars['homeLanguages'] = $this->HomeLanguagesModel->getIdPair();
		$vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
		$vars['carelevels'] =$this->CarelevelsModel->getElementPair('cid','carelevel_title','sort_order','asc',array('language'=>$this->default_language));
		$vars['facilities'] =$this->FacilitiesModel->getElementPair('fid','facility_title','sort_order','asc',array('language'=>$this->default_language));
		$vars['features'] =$this->FeaturesModel->getElementPair('fid','feature_title','sort_order','asc',array('language'=>$this->default_language));
		$vars['form'] = $this->load->view(admin_url_string('requests/edit_form'),$vars, true);
		$content = $this->load->view(admin_url_string('requests/edit'),$vars, true);
		$results = array('content' => $content);
		$json=json_encode($results);
		exit($json);
	}

	public function editsubmit(){
		$language = $this->default_language;
		   $rId = $this->input->post('id',TRUE);
		   $request = $this->RequestsModel->getRowCond(array('id'=>$rId));
		   $this->form_validation->set_rules('first_name', 'First Name', 'required');
		   $this->form_validation->set_rules('last_name', 'Last Name', 'required');
		   $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		   $this->form_validation->set_rules('phone', 'Phone', 'required');
		   $this->form_validation->set_rules('home_name', 'Home Name', 'required');
		   $this->form_validation->set_rules('home_address', 'Home Address', 'required');
		   $this->form_validation->set_rules('home_postalcode', 'Home Postal Code', 'required');
		   $this->form_validation->set_rules('home_contact_name', 'Contact Name', 'required');
		   $this->form_validation->set_rules('home_email', 'Home Email', 'required|valid_email');
		   $this->form_validation->set_rules('home_phone', 'Home Phone', 'required');
		   $this->form_validation->set_rules('home_fax', 'Home Fax', '');
		   $this->form_validation->set_rules('package_id', 'Package', 'required');
		   $this->form_validation->set_rules('max_beds_count', 'Maximum Licensed Beds', 'required|callback_package_count_check');
		   $this->form_validation->set_rules('home_language', 'Language', 'required');
		   $this->form_validation->set_rules('home_level', 'Level', 'required');
		   $this->form_validation->set_rules('pharmacy_name', 'Pharmacy Name', 'required');
		   $this->form_validation->set_rules('facilities[]', 'Facilities', 'required');
		   $this->form_validation->set_rules('region_id', 'Region', 'required');
		   $this->form_validation->set_rules('description', 'Description', '');
		   $this->form_validation->set_rules('virtual_tour', 'Virtual Tour', 'callback_valid_url_check');
		   $this->form_validation->set_rules('comments', 'Comments', '');
		   $this->form_validation->set_rules('facebook', 'Facebook', 'callback_valid_url_check');
		   $this->form_validation->set_rules('instagram', 'Instagram', 'callback_valid_url_check');
		   $this->form_validation->set_rules('twitter', 'Twitter', 'callback_valid_url_check');
		   $this->form_validation->set_rules('youtube', 'Youtube', 'callback_valid_url_check');
		   $this->form_validation->set_rules('linkedin', 'Linkedin', 'callback_valid_url_check');
		   $this->form_validation->set_rules('website', 'website', 'callback_valid_url_check');
		   $this->form_validation->set_rules('features', 'Features', '');
		   $this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		   if($this->form_validation->run() == FALSE)
		   {
				$vars['request'] = $request;
				$vars['packages'] = $this->PackagesModel->getIdPair();
				$vars['homeLanguages'] = $this->HomeLanguagesModel->getIdPair();
				$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
				$vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
				$vars['carelevels'] =$this->CarelevelsModel->getElementPair('cid','carelevel_title','sort_order','asc',array('language'=>$this->default_language));
				$vars['facilities'] =$this->FacilitiesModel->getElementPair('fid','facility_title','sort_order','asc',array('language'=>$this->default_language));
				$vars['features'] =$this->FeaturesModel->getElementPair('fid','feature_title','sort_order','asc',array('language'=>$this->default_language));
				$form = $this->load->view(admin_url_string('requests/edit_form'),$vars, true);
			 	$results = array('status' => '0', 'data' => $form );
		   } else {
			$facilities = $this->input->post('facilities');
			if(is_array($facilities)){
				$facilities = implode(',',$facilities);
			}
			$features = $this->input->post('features');
			if(is_array($features)){
				$features = serialize($features);
			}
			$packageId = secureInput($this->input->post('package_id'));
		   	$packageInfo = $this->PackagesModel->load($packageId);
			$requestData = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'home_name' => $this->input->post('home_name'),
				'home_address' => $this->input->post('home_address'),
				'home_postalcode' => $this->input->post('home_postalcode'),
				'home_contact_name' => $this->input->post('home_contact_name'),
				'home_email' => $this->input->post('home_email'),
				'home_phone' => $this->input->post('home_phone'),
				'home_fax' => $this->input->post('home_fax'),
				'package_id' => $this->input->post('package_id'),
				'max_beds_count' => $this->input->post('max_beds_count'),
				'home_language' => $this->input->post('home_language'),
				'home_level' => $this->input->post('home_level'),
				'pharmacy_name' => $this->input->post('pharmacy_name'),
				'region_id' => $this->input->post('region_id'),
				'facilities' => $facilities,
				'features' => $features,
				'virtual_tour' => $this->input->post('virtual_tour'),
				'facebook' => $this->input->post('facebook'),
				'instagram' => $this->input->post('instagram'),
				'twitter' => $this->input->post('twitter'),
				'youtube' => $this->input->post('youtube'),
				'linkedin' => $this->input->post('linkedin'),
				'website' => $this->input->post('website'),
				'amount' => $packageInfo->price
			);
			$imageConfig['encrypt_name'] = TRUE;
			$imageConfig['upload_path'] = 'public/uploads/requests/images';
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('mainimage'))
			{
				$mainimageData=$this->upload->data();
				$requestData['mainimage']=$mainimageData['file_name'];
			}
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image2'))
			{
				$image2Data=$this->upload->data();
				$requestData['image2']=$image2Data['file_name'];
			}
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image3'))
			{
				$image3Data=$this->upload->data();
				$requestData['image3']=$image3Data['file_name'];
			}
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image4'))
			{
				$image4Data=$this->upload->data();
				$requestData['image4']=$image4Data['file_name'];
			}
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image5'))
			{
				$image5Data=$this->upload->data();
				$requestData['image5']=$image5Data['file_name'];
			}
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image6'))
			{
				$image6Data=$this->upload->data();
				$requestData['image6']=$image6Data['file_name'];
			}

			$this->RequestsModel->updateCond($requestData,array('id'=>$rId));
		   	$results = array('status' => '1', 'data' => 'Request Details Updated Successfully');
		   }
		   $json=json_encode($results);
		   exit($json);
	}

	function valid_url_check($url){
		$error = false;
		if($url!=''){
			$path = parse_url($url, PHP_URL_PATH);
			$encoded_path = array_map('urlencode', explode('/', $path));
			$url = str_replace($path, implode('/', $encoded_path), $url);
			if(!filter_var($url, FILTER_VALIDATE_URL)){
				$error = true;
			}
		}
		if($error){
			$this->form_validation->set_message('valid_url_check', 'Invalid URL');
			return FALSE;
		} else {
			return TRUE;
		}
	 }

	function package_count_check($maxbadscount) {
	   $packageId = secureInput($this->input->post('package_id'));
	   if($packageId!=''){
		   $packageInfo = $this->PackagesModel->load($packageId);
		   if($packageInfo->bed_count>0 && $maxbadscount>$packageInfo->bed_count) {
			   $this->form_validation->set_message('package_count_check', 'Licensed bed cannot exceed package limit.');
			   return FALSE;
		   } else {
			   return TRUE;
		   }
	   } else {
		   return TRUE;
	   }
   }

   public function editpayment($rId){
		$this->output->set_content_type('application/json');
		$language = $this->default_language;
		$request = $this->RequestsModel->getRowCond(array('id'=>$rId));
		$vars['request'] = $request;
		$vars['paymentMethods'] = $this->PaymentMethodsModel->getMethods();
		$vars['form'] = $this->load->view(admin_url_string('requests/edit_payment_form'),$vars, true);
		$content = $this->load->view(admin_url_string('requests/editpayment'),$vars, true);
		$results = array('content' => $content);
		$json=json_encode($results);
		exit($json);
	}

	public function editpaymentsubmit(){
		$language = $this->default_language;
		$rId = $this->input->post('id',TRUE);
		$request = $this->RequestsModel->getRowCond(array('id'=>$rId));
		$this->form_validation->set_rules('payment_method', 'Payment', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
				$vars['request'] = $request;
				$vars['paymentMethods'] = $this->PaymentMethodsModel->getMethods();
				$form = $this->load->view(admin_url_string('requests/edit_payment_form'),$vars, true);
				$results = array('status' => '0', 'data' => $form );
		} else {
			$requestData = array(
				'payment_method' => $this->input->post('payment_method')
			);
			$this->RequestsModel->updateCond($requestData,array('id'=>$rId));
			$results = array('status' => '1', 'data' => 'Request Details Updated Successfully');
		}
		$json=json_encode($results);
		exit($json);
	}
}
