<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontController extends GlobalController {

    function __construct() {
        parent::__construct();
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
        $vars['main_menu'] = $this->menuhelper->getProcessedMenu('main_menu');
        $vars['top_menu'] = $this->menuhelper->getProcessedMenu('top_menu');
        $this->mainvars['header']= $this->load->view(frontend_views_path('includes/header'),$vars,TRUE);
    }
    function setFooter(){
        $vars = array();
        $vars['footer_menu'] = $this->menuhelper->getProcessedMenu('footer_menu');
        $this->mainvars['footer']= $this->load->view(frontend_views_path('includes/footer'),$vars,TRUE);
    }

}