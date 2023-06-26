<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends GlobalController {

	function __construct() {
		parent::__construct();
	}
	public function index(){
		redirect(member_url_string('home'));
	}
	public function switch($language) {
		if(isset($this->languages_pair[$language])){
			$memberLanguage = array('member_site_language'=>$language);
			$this->session->set_userdata($memberLanguage);
		}
		redirect(member_url_string('home'));
	}
}
