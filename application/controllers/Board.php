<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends FrontController {

	var $pageObject, $pageType, $pageId;

	function __construct() {
		parent::__construct();
		$this->load->model('PagesModel');
		$this->load->model('TeamsModel');
		$this->landingPageObject ='';
	}

	public function index($slug='')
	{
		if($slug==''){
			redirect('/');
		}
		$slug = urldecode($slug);
		$boardObject = $this->TeamsModel->getRowCond(array('slug'=>$slug,'language'=>$this->site_language));
		$this->pageType = 'board';
		if(!$boardObject){
			redirect('pagenotfound');
		}
		$this->pageObject = $boardObject;
		$this->pageId = $boardObject->id;
		$bodyClass = 'board-member';
		$landingPageId = $this->settings['BOARD_PAGE_ID'];
		$landingPageObject =  $this->PagesModel->getRowCond(array('id'=>$landingPageId,'language'=>$this->site_language));
		if(!$landingPageObject){
			redirect('pagenotfound');
		}
		if($landingPageObject){
			$this->landingPageObject = $landingPageObject;
			if($landingPageObject->class!=''){
				$bodyClass = $landingPageObject->class;
			}
		}
		$this->processPage();
		$this->mainvars['banner']=$this->widgethelper->bannerWidget();
		$vars = array();
		$vars['boardMember'] = $boardObject;
		$this->mainvars['content_top']= $this->load->view(frontend_views_path('pages/board_member'),$vars,TRUE);
		$this->mainvars['content']=$this->widgethelper->pageContent();
		$this->mainvars['bodyClass'] = $bodyClass;
		$this->load->view(frontend_views_path('main'),$this->mainvars);
		
	}

}
