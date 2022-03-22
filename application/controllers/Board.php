<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends FrontController {

	var $pageObject, $pageType, $pageId;

	function __construct() {
		parent::__construct();
		$this->load->model('PagesModel');
	}

	public function index($slug='')
	{
		$pageId = $this->settings['REGISTER_PAGE_ID'];
		$pageObject = $this->PagesModel->getRowCond(array('id'=>$pageId,'language'=>$this->site_language));
		$this->pageType = 'register';
		if(!$pageObject){
			redirect('pagenotfound');
		}
		$this->pageObject = $pageObject;
		$this->pageId = $pageObject->id;
		$this->processPage();
		$this->mainvars['banner']=$this->widgethelper->bannerWidget();
		$vars = array();
		$this->mainvars['content_top']= $this->load->view(frontend_views_path('pages/board_member'),$vars,TRUE);
		$this->mainvars['content']=$this->widgethelper->pageContent();
		$this->load->view(frontend_views_path('main'),$this->mainvars);
		
	}

}
