<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forms extends GlobalController {

	function __construct() {
		parent::__construct();
	}

	public function enquiries()
	{
        $error = false;
		$responseData = array("status"=>"0","message"=>"Form submission failed. Try again.");
        $type = secureInput($this->input->post('type'));
        $name = secureInput($this->input->post('name'));
        $email = secureInput($this->input->post('email'));
        $phone = secureInput($this->input->post('phone'));
        $subject = secureInput($this->input->post('subject'));
        $message = secureInput($this->input->post('message'));
        $token = secureInput($this->input->post('token'));
        $action = secureInput($this->input->post('action'));
        if($name=='' || $email ==''|| $subject ==''|| $message ==''){
            $error = true;
            $responseData = array("status"=>"0","message"=>"Form submission failed. Required field missing. Try again.");
        }
        if(!$this->verifyReCaptcha($token,$action)){
            $error = true;
            $responseData = array("status"=>"0","message"=>"Form submission failed. reCaptcha failed. Try again.");
        }
        if(!$error){
            $this->load->model('EnquiriesModel');
            $data=array(
				'type'=>$type,
				'name'=>$name,
                'email'=>$email,
                'phone'=>$phone,
                'subject'=>$subject,
                'message'=>$message
			);
			$insertid = $this->EnquiriesModel->insert($data);
            if($insertid){
                $adminMailData = $data;
				$adminMailData['mail_to'] = $this->settings['ADMIN_EMAIL'];
				$this->mailhelper->sendNotification('contact_admin_notification',$adminMailData);
                $responseData = array("status"=>"1","message"=>"Thank you for contacting us. Will get back to you soon.");
            }
        }
		$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($responseData));
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
