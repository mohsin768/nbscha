<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends FrontController {

	var $pageObject, $pageType, $pageId;

	function __construct() {
		parent::__construct();
		$this->load->model('PagesModel');
		$this->load->model('LinksModel');
		$this->load->model('NewsModel');
		$this->load->model('NewsCategoriesModel');
	}

	public function index($slug='')
	{

		if($slug==''){
			redirect('/');
		}
		$newsObject = $this->NewsModel->getRowCond(array('slug'=>$slug,'language'=>$this->site_language));
		$this->pageType = 'news';
		if(!$newsObject){
			redirect('pagenotfound');
		}
		$this->pageObject = $newsObject;
		$this->pageId = $newsObject->id;
		$bodyClass = 'news-detail';
		$landingPageId = $this->settings['NEWS_PAGE_ID'];
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
		$vars['news'] = $newsObject;
		$vars['category'] = $this->NewsCategoriesModel->getRowCond(array('id'=>$newsObject->category,'language'=>$this->site_language));
		$this->mainvars['content_top']= $this->load->view(frontend_views_path('pages/news_details'),$vars,TRUE);
		$this->mainvars['content']=$this->widgethelper->pageContent();
		$this->mainvars['bodyClass'] = $bodyClass;
		$this->load->view(frontend_views_path('main'),$this->mainvars);
		
	}

	public function category($slug='')
	{
		$pageId = $this->settings['NEWS_PAGE_ID'];
		$pageObject = $this->PagesModel->getRowCond(array('id'=>$pageId,'language'=>$this->site_language));
		$this->pageType = 'register';
		if(!$pageObject){
			redirect('pagenotfound');
		}
		$this->pageObject = $pageObject;
		$this->pageId = $pageObject->id;
		$this->processPage();
		$this->mainvars['banner']=$this->widgethelper->bannerWidget();
		$newsCond = array('status'=>'1','type'=>'public','language'=>$this->site_language);
		$categoryObject = $this->NewsCategoriesModel->getRowCond(array('slug'=>$slug,'language'=>$this->site_language));
		if(!$categoryObject){
			redirect('pagenotfound');
		}
		$newsCond['category'] = $categoryObject->id;
		$vars = array();
		$linksCond = array('status'=>'1','type'=>'public','language'=>$this->site_language);
		$vars['links'] = $this->LinksModel->getArrayCond($linksCond);
		$catCond = array('status'=>'1','language'=>$this->site_language);
		$categories = $this->NewsCategoriesModel->getArrayCond($catCond);
		$categoryCount = array();
		foreach($categories as $category):
			$catCountCond = array('status'=>'1','category'=>$category['id'],'language'=>$this->site_language);
			$categoryCount[$category['id']] = $this->NewsModel->getCountCond($catCountCond);
		endforeach;
		$vars['categories'] = $categories;
		$vars['categoryCount'] = $categoryCount;
		
		$vars['news'] = $this->NewsModel->getArrayCond($newsCond);
		$this->mainvars['content_top']= $this->load->view(frontend_views_path('pages/news_category'),$vars,TRUE);
		$this->mainvars['content']=$this->widgethelper->pageContent();
		$this->load->view(frontend_views_path('main'),$this->mainvars);
		
	}

}
