<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends AjaxController {

	function __construct() {
		parent::__construct();
        $this->load->model('TeamsModel');
        $this->load->model('ResidencesModel');
	}

	public function enquiries()
	{
        $error = false;
		$responseData = array("status"=>"0","message"=>"Form submission failed. Try again.");
        $type = secureInput($this->input->post('form_type'));
        $board_member_id = secureInput($this->input->post('form_board_member_id'));
        $member_id = secureInput($this->input->post('form_member_id'));
        $home_id = secureInput($this->input->post('form_home_id'));
        $name = secureInput($this->input->post('form_name'));
        $email = secureInput($this->input->post('form_email'));
        $phone = secureInput($this->input->post('form_phone'));
        $subject = secureInput($this->input->post('form_subject'));
        $message = secureInput($this->input->post('form_message'));
        $token = secureInput($this->input->post('form_token'));
        $action = secureInput($this->input->post('form_action'));
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
                'board_member_id'=>$board_member_id,
                'member_id'=>$member_id,
                'home_id'=>$home_id,
				'name'=>$name,
                'email'=>$email,
                'phone'=>$phone,
                'subject'=>$subject,
                'message'=>$message
			);
			$insertid = $this->EnquiriesModel->insert($data);
            if($insertid){
                $adminMailData = $data;
                $toName = 'Administrator';
                $toEmail = $this->settings['ADMIN_EMAIL'];
                $mailTemplateType = 'contact_admin_notification';
                if($type=='board_member' && $board_member_id!=''){
                    $boardMember = $this->TeamsModel->getRowCond(array('id'=>$board_member_id,'language'=>$this->site_language));
                    if($boardMember->email != ''){
                        $toEmail = $boardMember->email;
                    }
                    if($boardMember->name != ''){
                        $toName = $boardMember->name;
                    }
                    $mailTemplateType = 'contact_board_member_notification';
                }
                if($type=='residence'  && $home_id!=''){
                    $residenceObj = $this->ResidencesModel->getRowCond(array('id'=>$home_id,'language'=>$this->site_language));
                    if($residenceObj->email != ''){
                        $toEmail = $residenceObj->email;
                    }
                    if($residenceObj->contact_name != ''){
                        $toName = $residenceObj->contact_name;
                    }
                    $mailTemplateType = 'contact_residence_notification';
                }
                $adminMailData['toName'] = $toName;
				$adminMailData['mail_to'] = $toEmail;
				$this->mailhelper->sendNotification($mailTemplateType,$adminMailData);
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

    function newsletter(){


        $this->load->model('SubscribersModel');
        $error = false;
		$responseData = array("status"=>"0","message"=>"Form submission failed. Try again.");
        $email = secureInput($this->input->post('email'));
        $token = secureInput($this->input->post('token'));
        $action = secureInput($this->input->post('action'));
        if($email ==''){
            $error = true;
            $responseData = array("status"=>"0","message"=>"Form submission failed. Required field missing. Try again.");
        }
        if(!$this->verifyReCaptcha($token,$action)){
            $error = true;
            $responseData = array("status"=>"0","message"=>"Form submission failed. reCaptcha failed. Try again.");
        }
        if($this->SubscribersModel->getRowCond(array('email'=>$email))){
            $error = true;
            $responseData = array("status"=>"0","message"=>"Already subscribed to the list.");
        }
        if(!$error){

            $data=array(
                'email'=>$email,
                'created'=>date('Y-m-d H:i:s')
			);
			$insertid = $this->SubscribersModel->insert($data);
            if($insertid){
                $adminMailData = $data;
				$adminMailData['mail_to'] = $this->settings['ADMIN_EMAIL'];
				$this->mailhelper->sendNotification('newsletter_admin_notification',$adminMailData);
                $responseData = array("status"=>"1","message"=>"Thank you for getting in touch with us. Will get back to you soon.");
            }
        }
		$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($responseData));

    }
}
