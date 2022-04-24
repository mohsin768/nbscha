<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Helcim extends MemberController{

    function  __construct(){
        parent::__construct();
        $this->load->model('RenewalsModel');
        $this->load->config('helcim');
    }

    function paynow($identifier){
        $order = $this->RenewalsModel->getRowCond(array('identifier'=>$identifier,'payment_method'=>'Credit Card','payment_status'=>'0'));
        if(!$order){
    		redirect('/');
    	}
        if(($this->input->post()) && ($this->input->post('response')=='1')){
            if($this->input->post('orderNumber')!=$identifier){redirect('/');}
            $response = $this->input->post(); $responseStr = serialize($response);
            $transactionId = isset($response['transactionId'])?$response['transactionId']:'';
            $approvalCode = isset($response['approvalCode'])?$response['approvalCode']:'';
            if($this->input->post('responseMessage')=='APPROVAL' || $this->input->post('responseMessage')=='APPROVED'){
                $this->RenewalsModel->updateCond(array('payment_response'=>$responseStr,'transaction_id' => $transactionId,'payment_status' => '1'),array('id'=>$order->id));
                $this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Renewal Requested Successfully.'));
				redirect(member_url_string('membership'));
            } else {
                $this->RenewalsModel->updateCond(array('payment_response'=>$responseStr,'transaction_id' => $transactionId),array('id'=>$order->id));
                $this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Renewal Requested Successfully. But payment has failed. You can try again or contact NBSCHA Team.<a href="'.member_url('helcim/paynow/'.$identifier).'">Try Again</a>'));
				redirect(member_url_string('membership'));
            }
        } else {
            $vars['helcim_response'] = $this->input->post();
            $vars['site_name']= $this->config->item('site_name');
            $this->pagetitle = "Helcim Payment Gateway";
            $vars['meta_title']= "Helcim Payment Gateway";
            $vars['meta_keywords']="Helcim Payment Gateway";
            $vars['meta_description']="Helcim Payment Gateway";
            $vars['order_identifier'] = $order->identifier;
            $vars['total'] = $order->amount;
            $amountHashString = $this->config->item('helcim_secret_key').$order->amount;
            $amountHash = hash('sha256', $amountHashString);
            $vars['amount_hash'] = $amountHash;
            $vars['payment_mode'] = $this->config->item('helcim_mode');
            $vars['payment_token'] = $this->config->item('helcim_token');
            $this->load->view(member_views_path('helcim/paynow'),$vars);
        }
    }

}
