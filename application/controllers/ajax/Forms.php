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

    public function advertising()
	{
        $error = false;
		$responseData = array("status"=>"0","message"=>"Form submission failed. Try again.");
        $aoption = secureInput($this->input->post('aoption'));
        $company_name = secureInput($this->input->post('company_name'));
        $first_name = secureInput($this->input->post('first_name'));
        $last_name = secureInput($this->input->post('last_name'));
        $email = secureInput($this->input->post('email'));
        $phone = secureInput($this->input->post('phone'));
        $website = secureInput($this->input->post('website'));
        $token = secureInput($this->input->post('token'));
        $action = secureInput($this->input->post('action'));
        if($aoption=='' || $company_name=='' ||$first_name=='' || $last_name=='' || $email ==''|| $phone ==''){
            $error = true;
            $responseData = array("status"=>"0","message"=>"Form submission failed. Required field missing. Try again.");
        }
        if(!$this->verifyReCaptcha($token,$action)){
            $error = true;
            $responseData = array("status"=>"0","message"=>"Form submission failed. reCaptcha failed. Try again.");
        }
        if(!$error){
            $this->load->model('ArequestsModel');
            $data=array(
				'aoption'=>$aoption,
				'company_name'=>$company_name,
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'email'=>$email,
                'phone'=>$phone,
                'website'=>$website
			);
			$insertid = $this->ArequestsModel->insert($data);
            if($insertid){
                $adminMailData = $data;
				$adminMailData['mail_to'] = $this->settings['ADMIN_EMAIL'];
				$this->mailhelper->sendNotification('advertising_admin_notification',$adminMailData);
                $responseData = array("status"=>"1","message"=>"Thank you for your in advertising with us. Will get back to you soon.");
            }
        }
		$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($responseData));
	}

    public function sponsorship()
	{
        $error = false;
		$responseData = array("status"=>"0","message"=>"Form submission failed. Try again.");
        $stype = $this->input->post('stype');
        $stypes= implode(',',$stype);
        $company_name = secureInput($this->input->post('company_name'));
        $first_name = secureInput($this->input->post('first_name'));
        $last_name = secureInput($this->input->post('last_name'));
        $email = secureInput($this->input->post('email'));
        $phone = secureInput($this->input->post('phone'));
        $prize_details = secureInput($this->input->post('prize_details'));
        $amount = secureInput($this->input->post('amount'));
        $token = secureInput($this->input->post('token'));
        $action = secureInput($this->input->post('action'));
        if($stypes=='' || $company_name=='' ||$first_name=='' || $last_name=='' || $email ==''|| $phone =='' || $amount ==''){
            $error = true;
            $responseData = array("status"=>"0","message"=>"Form submission failed. Required field missing. Try again.");
        }
        if(!$this->verifyReCaptcha($token,$action)){
            $error = true;
            $responseData = array("status"=>"0","message"=>"Form submission failed. reCaptcha failed. Try again.");
        }
        if(!$error){
            $this->load->model('SrequestsModel');
            $data=array(
				'stypes'=>$stypes,
				'company_name'=>$company_name,
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'email'=>$email,
                'phone'=>$phone,
                'amount'=>$amount,
                'prize_details'=>$prize_details
			);
			$insertid = $this->SrequestsModel->insert($data);
            if($insertid){
                $adminMailData = $data;
				$adminMailData['mail_to'] = $this->settings['ADMIN_EMAIL'];
				$this->mailhelper->sendNotification('sponsorship_admin_notification',$adminMailData);
                $responseData = array("status"=>"1","message"=>"Thank you for your interest in being a sponsor. Will get back to you soon.");
            }
        }
		$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($responseData));
	}

    public function booking()
	{
        $error = false;
		$responseData = array("status"=>"0","message"=>"Form submission failed. Try again.");
        $booth_selections = $this->input->post('booth_selections');
        $package = secureInput($this->input->post('package'));
        $business_name = secureInput($this->input->post('business_name'));
        $first_name = secureInput($this->input->post('first_name'));
        $last_name = secureInput($this->input->post('last_name'));
        $street_address = secureInput($this->input->post('street_address'));
        $street_address2 = secureInput($this->input->post('street_address2'));
        $city = secureInput($this->input->post('city'));
        $state = secureInput($this->input->post('state'));
        $postal_code = secureInput($this->input->post('postal_code'));
        $country = secureInput($this->input->post('country'));
        $email = secureInput($this->input->post('email'));
        $phone = secureInput($this->input->post('phone'));
        $website = secureInput($this->input->post('website'));
        $facebook = secureInput($this->input->post('facebook'));
        $twitter = secureInput($this->input->post('twitter'));
        $instagram = secureInput($this->input->post('instagram'));
        $product_description = secureInput($this->input->post('product_description'));
        $booth_choices = secureInput($this->input->post('booth_choices'));
        $booth_description = secureInput($this->input->post('booth_description'));
        $subtotal = secureInput($this->input->post('subtotal'));
        $gst = secureInput($this->input->post('gst'));
        $total = secureInput($this->input->post('total'));
        $card_number = secureInput($this->input->post('card_number'));
        $card_cvv = secureInput($this->input->post('card_cvv'));
        $card_expiry = secureInput($this->input->post('card_expiry'));
        $card_type = secureInput($this->input->post('card_type'));
        $signature = $this->db->escape_str($this->input->post('signature_data'));
        $token = secureInput($this->input->post('token'));
        $action = secureInput($this->input->post('action'));
        if($business_name=='' || $first_name=='' || $last_name=='' || $street_address=='' || $street_address2=='' || $city=='' || $state=='' || $postal_code=='' || $country=='' || $email ==''|| $phone =='' || $product_description =='' || $booth_choices =='' || $booth_description =='' || $signature ==''){
            $error = true;
            $responseData = array("status"=>"0","message"=>"Form submission failed. Required field missing. Try again.");
        }
        if(!$this->verifyReCaptcha($token,$action)){
            $error = true;
            $responseData = array("status"=>"0","message"=>"Form submission failed. reCaptcha failed. Try again.");
        }
        if(!$error){
            $this->load->model('BookingsModel');
            $this->load->model('BoothsModel');
            $this->load->model('PackagesModel');
            $booth_selections_data = array();
            foreach($booth_selections as $id => $quantity):
                if($quantity!='' && $quantity>0){
                    $booth = $this->BoothsModel->load($id);
                    if($booth){
                        $booth_selections_data[] = array('id'=>$id,'name'=>$booth->name,'price'=>'$'.$booth->price,'quantity'=>$quantity,'total'=>'$'.$booth->price*$quantity);
                    }
                }
            endforeach;
            $booth_selections_data = serialize($booth_selections_data);
            $data=array(
                'package'=>$package,
				'business_name'=>$business_name,
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'street_address'=>$street_address,
                'street_address2'=>$street_address2,
                'city'=>$city,
                'state'=>$state,
                'postal_code'=>$postal_code,
                'country'=>$country,
                'email'=>$email,
                'phone'=>$phone,
                'website'=>$website,
                'facebook'=>$facebook,
                'twitter'=>$twitter,
                'instagram'=>$instagram,
                'product_description'=>$product_description,
                'booth_choices'=>$booth_choices,
                'booth_description'=>$booth_description,
                'booth_selections'=>$booth_selections_data,
                'gst_percentage'=>$this->settings['GST_PERCENTAGE'],
                'subtotal_amount'=>$subtotal,
                'gst_amount'=>$gst,
                'total_amount'=>$total,
                'card_number'=>substr($card_number, -4),
                'card_cvv'=>$card_cvv,
                'card_expiry'=>$card_expiry,
                'card_type'=>$card_type,
                'signature'=>$signature
			);
			$insertid = $this->BookingsModel->insert($data);
            if($insertid){
                $packages = $this->PackagesModel->getIdPair();
                $data['package_name'] = $packages[$data['package']];
                $data['full_card'] = $card_number;
                $adminMailData = $data;
				$adminMailData['mail_to'] = $this->settings['ADMIN_EMAIL'];
				$this->mailhelper->sendNotification('booking_admin_notification',$adminMailData);
                $responseData = array("status"=>"1","message"=>"Thank you for your interest. Will get back to you soon.");
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
