<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Helcim extends FrontController{

    function  __construct(){
        parent::__construct();
        $this->load->model('RequestsModel');
        $this->load->config('helcim');
    }

    function paynow($identifier){
        $order = $this->RequestsModel->getRowCond(array('identifier'=>$identifier,'payment_method'=>'Credit Card','payment_status'=>'0'));
        if(!$order){
    		redirect('/');
    	}
        if(($this->input->post()) && ($this->input->post('response')=='1')){
            if($this->input->post('orderNumber')!=$identifier){redirect('/');}
            $response = $this->input->post(); $responseStr = serialize($response);
            $transactionId = isset($response['transactionId'])?$response['transactionId']:'';
            $approvalCode = isset($response['approvalCode'])?$response['approvalCode']:'';
            if($this->input->post('responseMessage')=='APPROVAL' || $this->input->post('responseMessage')=='APPROVED'){
                $this->RequestsModel->updateCond(array('payment_response'=>$responseStr,'transaction_id' => $transactionId,'payment_status' => '1'),array('id'=>$order->id));
                redirect('register/process/'.$identifier);
            } else {
                $this->RequestsModel->updateCond(array('payment_response'=>$responseStr,'transaction_id' => $transactionId),array('id'=>$order->id));
                redirect('register/process/'.$identifier);
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
            $this->load->view('frontend/helcim/paynow',$vars);
        }
    }

}
