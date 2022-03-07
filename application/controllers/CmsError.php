<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CmsError extends FrontController {

	var $pageObject, $pageType, $pageId;

	function __construct() {
		parent::__construct();
		$this->load->model('PagesModel');
	}

    function pagenotfound(){
		$pageId = $this->settings['ERROR_PAGE_ID'];
		$pageObject = $this->PagesModel->load($pageId);
		$this->pageType = 'home';
		$this->pageObject = $pageObject;
		$this->pageId = (isset($pageObject))?$pageObject->id:$pageId;
        $this->processPage();
        $this->mainvars['banner']=$this->widgethelper->bannerWidget();
		$this->mainvars['content_top']= $this->load->view(frontend_views_path('includes/pagenotfound'),'',TRUE);
		$this->mainvars['content']= $this->widgethelper->pageContent();
		$this->load->view(frontend_views_path('main'),$this->mainvars);
    }
}