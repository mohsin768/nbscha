<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formhelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();

	}

  function getAskQuestionFormWidget($pageBlock){
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    return $this->CI->load->view(frontend_views_path('widgets/forms/askquestion'),$vars,TRUE);
  }

  function getSponsorshipFormWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('StypesModel');
    $sTypesCond = array('status'=>'1');
    $stypes = $this->CI->StypesModel->getArrayCond($sTypesCond,'','sort_order','ASC');
    $vars['stypes'] = $stypes;
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    return $this->CI->load->view(frontend_views_path('widgets/forms/sponsorship'),$vars,TRUE);
  }

  function getAdvertisingFormWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('AoptionsModel');
    $aOptionsCond = array('status'=>'1');
    $aoptions = $this->CI->AoptionsModel->getArrayCond($aOptionsCond,'','sort_order','ASC');
    $vars['aoptions'] = $aoptions;
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    return $this->CI->load->view(frontend_views_path('widgets/forms/advertising'),$vars,TRUE);
  }

  function getBookingFormWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('BoothsModel');
    $this->CI->load->model('PackagesModel');
    $boothsCond = array('status'=>'1');
    $booths = $this->CI->BoothsModel->getArrayCond($boothsCond,'','sort_order','ASC');
    $vars['booths'] = $booths;
    $vars['gst'] = $this->CI->settings['GST_PERCENTAGE'];
    $vars['package'] = $this->CI->PackagesModel->load($this->CI->pageId);
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    return $this->CI->load->view(frontend_views_path('widgets/forms/booking'),$vars,TRUE);
  }

  
}
