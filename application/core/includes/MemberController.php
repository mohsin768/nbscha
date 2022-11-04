<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberController extends GlobalController {

	function __construct() {
		parent::__construct();
		if (!$this->session->userdata('member_user_logged_in')) {
			redirect(member_url_string('login'));
		}
		$this->member_language = $this->default_language;
		if ($this->session->userdata('member_site_language') && isset($this->languages_pair[$this->session->userdata('member_site_language')])) {
			$this->member_language = $this->session->userdata('member_site_language');
		}
		$settings=$this->SettingsModel->getArrayCond(array('language'=>$this->member_language));
		foreach($settings as $setting):
			$this->settings[$setting['settingkey']]=$setting['settingvalue'];
		endforeach;
		$localizations=$this->LocalizationModel->getArrayCond(array('language'=>$this->member_language));
		foreach($localizations as $localization):
			$this->localizations[$localization['lang_key']]=$localization['lang_value'];
		endforeach;
		$this->load->helper('translate');
		$this->mainvars = array();
		$this->mainvars['side_menu']=$this->sideMenu();
		$this->mainvars['top_menu']=$this->load->view(member_url_string('includes/top_menu'),'',true);
		$this->mainvars['footer']=$this->load->view(member_url_string('includes/footer'),'',true);
		$this->mainvars['page_scripts']='';

	}

	function sideMenu(){
		$this->load->model('MemberMenuModel');
		$vars = array();
		$vars['menus'] = $this->MemberMenuModel->getMenu();
		return $this->load->view(member_url_string('includes/side_menu'),$vars,true);
	}

	function ckeditorCall(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url('public/common/ckeditor/');
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['width'] = '100%';
		$this->ckeditor->config['height'] = '200px';
		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/common/ckfinder/'));

	}

}
