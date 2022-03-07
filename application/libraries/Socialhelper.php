<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Socialhelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();
	}

  function getFacebookReviewWidget($pageBlock){
        $this->CI->load->model('ReviewsModel');

    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['class'] = isset($pageBlock['class'])?$pageBlock['class']:'';
    $vars['background'] = isset($pageBlock['background'])?frontend_uploads_url('widgets/background/'.$pageBlock['background']):'';
    $vars['reviews'] = $this->CI->ReviewsModel->getArrayCond(array('status'=>'1'),'','sort_order','ASC');
    return $this->CI->load->view(frontend_views_path('widgets/social/facebook_review'),$vars,TRUE);
  }
  

  function getInstagramWidget($pageBlock){
    $this->CI->load->model('SocialModel');
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['class'] = isset($pageBlock['class'])?$pageBlock['class']:'';
    $vars['link'] = isset($pageBlock['link'])?$pageBlock['link']:'';
    $vars['background'] = isset($pageBlock['background'])?frontend_uploads_url('widgets/background/'.$pageBlock['background']):'';
    $vars['instagram_feeds'] = $this->CI->SocialModel->getInstagramFeed();
    return $this->CI->load->view(frontend_views_path('widgets/social/instagram'),$vars,TRUE);
  }

  function getTwitterWidget($pageBlock){
    $this->CI->load->model('SocialModel');
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['class'] = isset($pageBlock['class'])?$pageBlock['class']:'';
    $vars['background'] = isset($pageBlock['background'])?frontend_uploads_url('widgets/background/'.$pageBlock['background']):'';
    $vars['twitter_feeds'] = $this->CI->SocialModel->getTwitterFeed();
    return $this->CI->load->view(frontend_views_path('widgets/social/twitter'),$vars,TRUE);
  }

}
