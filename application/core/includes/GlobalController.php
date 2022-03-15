<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GlobalController extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('SettingsModel');
    $this->load->model('LanguagesModel');
    $this->languages_pair = $this->LanguagesModel->getElementPair('code','name','default_language','asc');
    $defaultLanguage = $this->LanguagesModel->getRowCond(array('default_language'));
    $this->default_language = 'en';
	$this->site_language = 'en';
    if($defaultLanguage){
      $this->default_language = $defaultLanguage->code;
    }
	if($this->session->userdata('frontend_site_language') && $this->session->userdata('frontend_site_language')!=''){
		$this->site_language = $this->session->userdata('frontend_site_language');
	}
	$settings=$this->SettingsModel->getArrayCond(array('language'=>$this->site_language));
	foreach($settings as $setting):
		$this->settings[$setting['settingkey']]=$setting['settingvalue'];
	endforeach;
  }

  function paginationConfig(){
		$config = array();
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['uri_segment'] = 4;
		$config['per_page'] = 15;
		return $config;
	}

}
