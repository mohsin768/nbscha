<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blockhelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();

	}

  function getAboutIntroWidget($pageBlock){
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    $vars['primary_link_title'] = isset($pageBlock['primary_link_title'])?$pageBlock['primary_link_title']:'';
    $vars['primary_link_url'] = isset($pageBlock['primary_link_url'])?$pageBlock['primary_link_url']:'';
    return $this->CI->load->view(frontend_views_path('widgets/blocks/about-intro'),$vars,TRUE);
  }

  function getAboutMissionWidget($pageBlock){
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    $vars['primary_link_title'] = isset($pageBlock['primary_link_title'])?$pageBlock['primary_link_title']:'';
    $vars['primary_link_url'] = isset($pageBlock['primary_link_url'])?$pageBlock['primary_link_url']:'';
    return $this->CI->load->view(frontend_views_path('widgets/blocks/about-mission'),$vars,TRUE);
  }

  function getHomeAboutWidget($pageBlock){
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    $vars['primary_link_title'] = isset($pageBlock['primary_link_title'])?$pageBlock['primary_link_title']:'';
    $vars['primary_link_url'] = isset($pageBlock['primary_link_url'])?$pageBlock['primary_link_url']:'';
    return $this->CI->load->view(frontend_views_path('widgets/blocks/home-about'),$vars,TRUE);
  }

  function getHomeBlocksWidget($pageBlock){
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    $vars['primary_link_title'] = isset($pageBlock['primary_link_title'])?$pageBlock['primary_link_title']:'';
    $vars['primary_link_url'] = isset($pageBlock['primary_link_url'])?$pageBlock['primary_link_url']:'';
    return $this->CI->load->view(frontend_views_path('widgets/blocks/home-blocks'),$vars,TRUE);
  }

  function getHomeWorksWidget($pageBlock){
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    $vars['primary_link_title'] = isset($pageBlock['primary_link_title'])?$pageBlock['primary_link_title']:'';
    $vars['primary_link_url'] = isset($pageBlock['primary_link_url'])?$pageBlock['primary_link_url']:'';
    return $this->CI->load->view(frontend_views_path('widgets/blocks/home-how-works'),$vars,TRUE);
  }

}
