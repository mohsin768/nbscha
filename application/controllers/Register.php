<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends FrontController {

	var $pageObject, $pageType, $pageId;

	function __construct() {
		parent::__construct();
		$this->load->model('PagesModel');
		$this->load->model('RequestsModel');
		$this->load->model('PackagesModel');
		$this->load->model('CarelevelsModel');
		$this->load->model('FacilitiesModel');
		$this->load->model('RegionsModel');
		$this->load->model('FeaturesModel');
	}

	public function index()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('home_name', 'Home Name', 'required');
		$this->form_validation->set_rules('home_address', 'Home Address', 'required');
		$this->form_validation->set_rules('home_postalcode', 'Home Postal Code', 'required');
		$this->form_validation->set_rules('home_contact_name', 'Contact Name', 'required');
		$this->form_validation->set_rules('home_email', 'Home Email', 'required|valid_email');
		$this->form_validation->set_rules('home_phone', 'Home Phone', 'required');
		$this->form_validation->set_rules('home_fax', 'Home Fax', '');
		$this->form_validation->set_rules('package_id', 'Beds', 'required');
		$this->form_validation->set_rules('home_level', 'Level', 'required');
		$this->form_validation->set_rules('pharmacy_name', 'Pharmacy Name', 'required');
		$this->form_validation->set_rules('facilities[]', 'Facilities', 'required');
		$this->form_validation->set_rules('region_id', 'Region', 'required');
		$this->form_validation->set_rules('description', 'Description', '');
		$this->form_validation->set_rules('comments', 'Comments', '');
		if (empty($_FILES['mainimage']['name'])){$this->form_validation->set_rules('mainimage', 'Main Image', 'required');}
		$this->form_validation->set_rules('facebook', 'Facebook', '');
		$this->form_validation->set_rules('instagram', 'Instagram', '');
		$this->form_validation->set_rules('twitter', 'Twitter', '');
		$this->form_validation->set_rules('youtube', 'Youtube', '');
		$this->form_validation->set_rules('linkedin', 'Linkedin', '');
		$this->form_validation->set_rules('website', 'website', '');
		$this->form_validation->set_rules('features', 'Features', '');
		$this->form_validation->set_rules('token', 'reCaptcha', 'required|callback_recaptcha_check');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$pageId = $this->settings['REGISTER_PAGE_ID'];
			$pageObject = $this->PagesModel->getRowCond(array('id'=>$pageId,'language'=>$this->site_language));
			$this->pageType = 'register';
			if(!$pageObject){
				redirect('pagenotfound');
			}
			$this->pageObject = $pageObject;
			$this->pageId = $pageObject->id;
			$this->processPage();
			$this->mainvars['banner']=$this->widgethelper->bannerWidget();
			$vars = array();
			$vars['packages'] = $this->PackagesModel->getArrayCond(array('status'=>'1','language'=>$this->site_language),'','sort_order','ASC');
			$vars['levels'] = $this->CarelevelsModel->getArrayCond(array('status'=>'1','language'=>$this->site_language),'','sort_order','ASC');
			$vars['facilities'] = $this->FacilitiesModel->getArrayCond(array('status'=>'1','language'=>$this->site_language),'','sort_order','ASC');
			$vars['regions'] = $this->RegionsModel->getArrayCond(array('status'=>'1','language'=>$this->site_language),'','sort_order','ASC');
			$vars['features'] = $this->FeaturesModel->getArrayCond(array('status'=>'1','language'=>$this->site_language),'','sort_order','ASC');
			$this->mainvars['content_top']= $this->load->view(frontend_views_path('register/form'),$vars,TRUE);
			$this->mainvars['content']=$this->widgethelper->pageContent();
			$this->load->view(frontend_views_path('main'),$this->mainvars);
		} else {
			$this->load->helper('string');
			$salt = random_string('alnum', 6);
			$password = sha1($salt.$this->input->post('password').$salt);
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
			$mainimage = $image2 = $image3 = $image4 = $image5 = $image6 = '';
			$requestsImageUploadPath = 'public/uploads/requests/images';
			if(!is_dir($requestsImageUploadPath)){
				mkdir($requestsImageUploadPath, 0777, TRUE);
			}
			$imageConfig['encrypt_name'] = TRUE;
			$imageConfig['upload_path'] = $requestsImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('mainimage'))
			{
				$mainimageData=$this->upload->data();
				$mainimage=$mainimageData['file_name'];
			}
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image2'))
			{
				$image2Data=$this->upload->data();
				$image2=$image2Data['file_name'];
			}
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image3'))
			{
				$image3Data=$this->upload->data();
				$image3=$image3Data['file_name'];
			}
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image4'))
			{
				$image4Data=$this->upload->data();
				$image4=$image4Data['file_name'];
			}
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image5'))
			{
				$image5Data=$this->upload->data();
				$image5=$image5Data['file_name'];
			}
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image6'))
			{
				$image6Data=$this->upload->data();
				$image6=$image6Data['file_name'];
			}
			$data = array(
				'first_name' => secureInput($this->input->post('first_name')),
				'last_name' => secureInput($this->input->post('last_name')),
				'email' => secureInput($this->input->post('email')),
				'phone' => secureInput($this->input->post('phone')),
				'password' => $password,
				'salt' => $salt,
				'home_name' => secureInput($this->input->post('home_name')),
				'home_address' => secureInput($this->input->post('home_address')),
				'home_postalcode' => secureInput($this->input->post('home_postalcode')),
				'home_contact_name' => secureInput($this->input->post('home_contact_name')),
				'home_email' => secureInput($this->input->post('home_email')),
				'home_phone' => secureInput($this->input->post('home_phone')),
				'home_fax' => secureInput($this->input->post('home_fax')),
				'package_id' => $packageInfo->pid,
				'home_level' => secureInput($this->input->post('home_level')),
				'pharmacy_name' => secureInput($this->input->post('pharmacy_name')),
				'region_id' => secureInput($this->input->post('region_id')),
				'facilities' => $facilities,
				'features' => $features,
				'description' => secureInput($this->input->post('description')),
				'comments' => secureInput($this->input->post('comments')),
				'mainimage' => $mainimage,
				'image2' => $image2,
				'image3' => $image3,
				'image4' => $image4,
				'image5' => $image5,
				'image6' => $image6,
				'facebook' => secureInput($this->input->post('facebook')),
				'instagram' => secureInput($this->input->post('instagram')),
				'twitter' => secureInput($this->input->post('twitter')),
				'youtube' => secureInput($this->input->post('youtube')),
				'linkedin' => secureInput($this->input->post('linkedin')),
				'website' => secureInput($this->input->post('website')),
				'amount'=>$packageInfo->price,
				'payment_method' => secureInput($this->input->post('payment_method')),
				'payment_info' => secureInput($this->input->post('payment_info')),
				'payment_status' => '0',
				'created' => date('Y-m-d H:i:s'),
				'status' => 'pending'
			);
			$insertId = $this->RequestsModel->insert($data);
			$identifier = date('ym').sprintf('%04d', $insertId);
			$this->RequestsModel->updateCond(array('identifier'=>$identifier),array('id'=>$insertId));
			if($insertId){
				$adminMailData = $data;
				$adminMailData['mail_to'] = $this->settings['ADMIN_EMAIL'];
				$this->mailhelper->sendNotification('register_admin_notification',$adminMailData);
				$userMailData = $data;
				$userMailData['mail_to'] = $data['email'];
				$this->mailhelper->sendNotification('register_user_notification',$userMailData);
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'<strong>Well done!</strong> You have successfully registered. We will get back to you.'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'<strong>Error!</strong> Cannot register now. Try again later'));
			}
			redirect(site_url('register'));
		}
	}

	function email_check($email) {
		$cond = array('status !='=>'rejected','email'=>$email);
		if($this->RequestsModel->getRowCond($cond)) {
			$this->form_validation->set_message('email_check', 'Already Exists');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function recaptcha_check($email) {
		$token = secureInput($this->input->post('token'));
		$action = 'member_register';
		if(!$this->verifyReCaptcha($token,$action)){
			$this->form_validation->set_message('recaptcha_check', 'Invalid Captcha');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function verifyReCaptcha($token,$action){
        $secretKey = $this->settings['RECAPTCHA_SECRET_KEY'];
        // call curl to POST request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $secretKey, 'response' => $token)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);
        // verify the response
        if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
            return true;
        } else {
            return false;
        }
    }


}
