<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxController extends GlobalController {

  function __construct() {
    parent::__construct();
	$langUri = $this->uri->segment(1);
	if(isset($this->languages_pair[$langUri])){
		$this->site_language = $langUri;
		$currentUriString =  uri_string();
		if($langUri== $this->default_language){
			$newUriString = str_replace($langUri,'',$currentUriString);
			redirect($newUriString);
		}
	}
	$settings=$this->SettingsModel->getArrayCond(array('language'=>$this->site_language));
	foreach($settings as $setting):
		$this->settings[$setting['settingkey']]=$setting['settingvalue'];
	endforeach;
	$localizations=$this->LocalizationModel->getArrayCond(array('language'=>$this->site_language));
	foreach($localizations as $localization):
		$this->localizations[$localization['lang_key']]=$localization['lang_value'];
	endforeach;
  }

}
