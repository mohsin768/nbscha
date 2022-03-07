<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsoleController extends GlobalController {

	function __construct() {
		parent::__construct();
		if (!$this->session->userdata('admin_user_logged_in')) {
			redirect(admin_url_string('login'));
		}
		$this->mainvars = array();
		$this->mainvars['side_menu']=$this->sideMenu();
		$this->mainvars['top_menu']=$this->load->view(admin_url_string('includes/top_menu'),'',true);
		$this->mainvars['footer']=$this->load->view(admin_url_string('includes/footer'),'',true);
		$this->mainvars['page_scripts']='';
	}

	function sideMenu(){
		$this->load->model('AdminMenuModel');
		$vars = array();
		$vars['menus'] = $this->AdminMenuModel->getMenu();
		return $this->load->view(admin_url_string('includes/side_menu'),$vars,true);
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