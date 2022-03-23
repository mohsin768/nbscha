<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blockhelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();

	}

  function getAboutIntroWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('BlocksModel');
    $blocksCond = array('status'=>'1','language'=>$this->CI->site_language);
    $categoryId = isset($pageBlock['block_category'])?$pageBlock['block_category']:'';
    if($categoryId!=''){
      $blocksCond['category'] = $categoryId;
    }
    $vars['blocks'] = $this->CI->BlocksModel->getArrayCond($blocksCond);
    $vars['content'] = isset($pageBlock['content'])?$pageBlock['content']:'';
    $vars['image'] = (isset($pageBlock['image']) && $pageBlock['image']!='')?frontend_uploads_url('widgets/images/'.$pageBlock['image']):'';
    return $this->CI->load->view(frontend_views_path('widgets/blocks/about-intro'),$vars,TRUE);
  }

  function getAboutMissionWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('BlocksModel');
    $blocksCond = array('status'=>'1','language'=>$this->CI->site_language);
    $categoryId = isset($pageBlock['block_category'])?$pageBlock['block_category']:'';
    if($categoryId!=''){
      $blocksCond['category'] = $categoryId;
    }
    $vars['blocks'] = $this->CI->BlocksModel->getArrayCond($blocksCond);
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['video'] = (isset($pageBlock['video']) && $pageBlock['video']!='')?frontend_uploads_url('widgets/videos/'.$pageBlock['video']):'';
    return $this->CI->load->view(frontend_views_path('widgets/blocks/about-mission'),$vars,TRUE);
  }

  function getHomeAboutWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('LinksModel');
    $linksCond = array('status'=>'1','type'=>'public','language'=>$this->CI->site_language);
    $vars['links'] = $this->CI->LinksModel->getArrayCond($linksCond);
    $vars['gallery'] = isset($pageBlock['gallery'])?$pageBlock['gallery']:'';
    $vars['content'] = isset($pageBlock['content'])?$pageBlock['content']:'';
    return $this->CI->load->view(frontend_views_path('widgets/blocks/home-about'),$vars,TRUE);
  }

  function getHomeBlocksWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('BlocksModel');
    $blocksCond = array('status'=>'1','language'=>$this->CI->site_language);
    $categoryId = isset($pageBlock['block_category'])?$pageBlock['block_category']:'';
    if($categoryId!=''){
      $blocksCond['category'] = $categoryId;
    }
    $vars['blocks'] = $this->CI->BlocksModel->getArrayCond($blocksCond);
    return $this->CI->load->view(frontend_views_path('widgets/blocks/home-blocks'),$vars,TRUE);
  }

  function getHomeWorksWidget($pageBlock){
    $vars = array();
    $vars['content'] = isset($pageBlock['content'])?$pageBlock['content']:'';
    $vars['video'] = (isset($pageBlock['video']) && $pageBlock['video']!='')?frontend_uploads_url('widgets/videos/'.$pageBlock['video']):'';
    return $this->CI->load->view(frontend_views_path('widgets/blocks/home-how-works'),$vars,TRUE);
  }

}
