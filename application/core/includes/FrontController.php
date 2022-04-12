<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontController extends GlobalController {

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
        $this->load->library('widgethelper');
        $this->load->library('menuhelper');
        $this->load->helper('text');
        $this->mainvars = array();
        $this->mainvars['site_name']=$this->settings['SITE_NAME'];
        $this->mainvars['meta_title']=$this->settings['DEFAULT_META_TITLE'];
        $this->mainvars['meta_description']=$this->settings['DEFAULT_META_DESCRIPTION'];
        $this->mainvars['meta_keywords']=$this->settings['DEFAULT_META_KEYWORDS'];
        $this->mainvars['content_top']='';
        $this->mainvars['content']='';
        $this->mainvars['content_bottom']='';
        $this->mainvars['bodyClass'] ='';
    }

    function processPage(){
        $this->setHeader();
        $this->setFooter();
        if($this->pageObject){
            $this->mainvars['meta_title']=$this->pageObject->meta_title;
            $this->mainvars['meta_description']=$this->pageObject->meta_desc;
            $this->mainvars['meta_keywords']=$this->pageObject->meta_keywords;
        }
        $this->mainvars['banner']=$this->widgethelper->bannerWidget();
    }
    function setHeader(){
        $vars = array();
        $currentUrl = current_url();
        $vars['current_url'] = $currentUrl;
        $vars['main_menu'] = $this->menuhelper->getProcessedMenu('main_menu');
        $vars['top_menu'] = $this->menuhelper->getProcessedMenu('top_menu');
        $this->mainvars['header']= $this->load->view(frontend_views_path('includes/header'),$vars,TRUE);
    }
    function setFooter(){
        $vars = array();
        $this->load->model('NewsModel');
        $newsCond = array('status'=>'1','type'=>'public','language'=>$this->site_language);
        $vars['news'] = $this->NewsModel->getArrayLimitCond('5',$newsCond);
        $this->load->model('LinksModel');
        $linksCond = array('status'=>'1','type'=>'public','language'=>$this->site_language);
        $vars['links'] = $this->LinksModel->getArrayLimitCond('5',$linksCond);
        $this->mainvars['footer']= $this->load->view(frontend_views_path('includes/footer'),$vars,TRUE);
    }

}