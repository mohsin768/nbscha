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
  }

}
