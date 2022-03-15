<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailhelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();
	}

	function sendNotification($mailType,$mailData,$attachment=''){
    $mailMessageData = $this->processEmailMessage($mailType,$mailData);
    $message = isset($mailMessageData['message'])?$mailMessageData['message']:'';
    $subject = isset($mailMessageData['subject'])?$mailMessageData['subject']:'';
    $replyEmail = isset($mailData['reply_email'])?$mailData['reply_email']:'';
    $replyName = isset($mailData['reply_name'])?$mailData['reply_name']:'';
    $to = isset($mailData['mail_to'])?$mailData['mail_to']:'';
    $subject = isset($mailData['subject'])?$mailData['subject']:$subject;
    if($to!=''){
      $this->CI->load->library('email');
      if($this->CI->settings['MAILER_PROTOCOL']=='off'){
      return true;
      } else {
      $config['protocol'] = $this->CI->settings['MAILER_PROTOCOL'];
      if($this->CI->settings['MAILER_PROTOCOL']=='smtp'){
          $config['smtp_host'] = $this->CI->settings['MAILER_HOST'];
          $config['smtp_user'] = $this->CI->settings['MAILER_USER'];
          $config['smtp_pass'] = $this->CI->settings['MAILER_PASSWORD'];
          $config['smtp_port'] = $this->CI->settings['MAILER_PORT'];
          $config['smtp_crypto'] = $this->CI->settings['MAILER_TRANSPORT'];
          $config['newline']  = "\r\n";
      }
      $config['mailtype'] = 'html';
      $config['charset'] = 'utf-8';
      $config['wordwrap'] = TRUE;
      $this->CI->email->initialize($config);
      $this->CI->email->from($this->CI->settings['FROM_MAIL'],$this->CI->settings['SITE_NAME']);
      if($replyEmail!=''){
        $this->email->reply_to($replyEmail, $replyName);
      }
      $this->CI->email->to($to);
      $this->CI->email->subject($subject);
      $this->CI->email->message($message);
      if ($attachment != '') {
        $this->CI->email->attach($attachment);
      }
      $mailSend = $this->CI->email->send();
      if($mailSend){ $this->CI->email->clear(true); return true; } else { return false; }
      }
    }
  }

  function processEmailMessage($mailType,$mailData){
    $mailMessageData = array();
    $name = isset($mailData['name'])?$mailData['name']:'';
    $mailVars['{{name}}']= isset($name)?$name:'';
    $mailMessageData = $this->getMailTemplateHtml($mailType,$mailData);
    $message = isset($mailMessageData['message'])?$mailMessageData['message']:'';
    $mailMessageData['message'] = strtr($message,$mailVars);
    return $mailMessageData;
  }

  function getMailTemplateHtml($mailType,$mailData){
    $finalMessage =''; $messageData = $vars =array();
    switch ($mailType) {
			case 'admin_reset_password':
				$mailMessage = $this->CI->load->view(admin_views_path('mails/admin_reset_password'),$mailData,true);
        $mailSubject = "Reset password requested";
				break;
      case 'member_reset_password':
        $mailMessage = $this->CI->load->view(admin_views_path('mails/member_reset_password'),$mailData,true);
        $mailSubject = "Reset password requested";
        break;
      case 'contact_admin_notification':
        $mailMessage = $this->CI->load->view(admin_views_path('mails/contact_admin_notification'),$mailData,true);
        $mailSubject = "New Enquiry submitted on the Website";
        break;
      case 'advertising_admin_notification':
        $mailMessage = $this->CI->load->view(admin_views_path('mails/advertising_admin_notification'),$mailData,true);
        $mailSubject = "New Advertising Request submitted on the Website";
        break;
      case 'sponsorship_admin_notification':
        $mailMessage = $this->CI->load->view(admin_views_path('mails/sponsorship_admin_notification'),$mailData,true);
        $mailSubject = "New Sponsorship Request submitted on the Website";
        break;
      case 'booking_admin_notification':
        $mailMessage = $this->CI->load->view(admin_views_path('mails/booking_admin_notification'),$mailData,true);
        $mailSubject = "New Booking Request submitted on the Website";
        break;
      case 'booking_user_notification':
        $mailMessage = $this->CI->load->view(admin_views_path('mails/booking_user_notification'),$mailData,true);
        $mailSubject = "Thank You for booking with us";
        break;
			default:
				$mailMessage = "";
        $mailSubject = "";
		}
    $vars['content'] = $mailMessage;
    $finalMessage = $this->CI->load->view(admin_views_path('mails/main'),$vars,true);
    $messageData['subject'] = $mailSubject;
    $messageData['message'] = $finalMessage;
    return $messageData;
  }
}
