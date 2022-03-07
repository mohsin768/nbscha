<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	var $pageObject, $pageType, $pageId;

	function __construct() {
		parent::__construct();
		//$this->load->model('PagesModel');
	}

	public function index($slug='')
	{
		// if($slug!=''){
		// 	$pageObject = $this->PagesModel->getRowCond(array('slug'=>$slug));
		// 	$this->pageType = 'pages';
		// } else {
		// 	$pageId = $this->settings['HOME_PAGE_ID'];
		// 	$pageObject = $this->PagesModel->load($pageId);
		// 	$this->pageType = 'home';
			
		// }
		// if(!$pageObject){
		// 	redirect('pagenotfound');
		// }
		// $this->pageObject = $pageObject;
		// $this->pageId = $pageObject->id;
		// $this->processPage();
		// if($this->pageType=='home'){
		// 	$this->mainvars['banner']=$this->widgethelper->homeBannerWidget();
		// } else {
		// 	$this->mainvars['banner']=$this->widgethelper->bannerWidget();
		// }
		// $this->mainvars['content']=$this->widgethelper->pageContent();
		$this->load->view(frontend_views_path('main'));
	}
}
