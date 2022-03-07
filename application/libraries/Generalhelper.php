<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generalhelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();

	}

  function getCounterWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('EventsModel');
    $vars['event'] = $this->CI->EventsModel->getCurrentEvent();
    return $this->CI->load->view(frontend_views_path('widgets/general/counter'),$vars,TRUE);
  }

  function getStatisticsWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('StatisticsModel');
    $this->CI->load->model('EventsModel');
    $statCond = array('status'=>'1');
    $currentEvent = $this->CI->EventsModel->getCurrentEvent();
    if($currentEvent){
      $statCond['event'] = $currentEvent->id;
    }
    $statistics = array();
    $statistics = $this->CI->StatisticsModel->getArrayLimitCond('4',$statCond,'','sort_order','ASC');
    $vars['statistics'] = $statistics;
    $vars['image'] = isset($pageBlock['image'])?frontend_uploads_url('widgets/images/'.$pageBlock['image']):'';
    return $this->CI->load->view(frontend_views_path('widgets/general/statistics'),$vars,TRUE);
  }

  function getContactDetailsWidget($pageBlock){
    $vars = array();
    $vars['contact_phone'] = $this->CI->settings['CONTACT_PHONE'];
    $vars['contact_email'] = $this->CI->settings['CONTACT_EMAIL'];
    $vars['contact_location'] = $this->CI->settings['CONTACT_LOCATION'];
    $vars['contact_message'] = $this->CI->settings['CONTACT_MESSAGE'];
    $vars['facebook'] = $this->CI->settings['FACEBOOK_URL'];
    $vars['twitter'] = $this->CI->settings['TWITTER_URL'];
    $vars['instagram'] = $this->CI->settings['INSTAGRAM_URL'];
    $vars['linkedin'] = $this->CI->settings['LINKEDIN_URL'];
    return $this->CI->load->view(frontend_views_path('widgets/general/contact'),$vars,TRUE);
  }

  function getContactMapWidget($pageBlock){
    $vars = array();
    $vars['contact_map'] = $this->CI->settings['CONTACT_MAP'];
    return $this->CI->load->view(frontend_views_path('widgets/general/google_map'),$vars,TRUE);
  }

  
}
