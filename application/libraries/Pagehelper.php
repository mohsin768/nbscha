<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagehelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();
    $this->CI->load->library('contenthelper');
    $this->CI->load->library('paragraphhelper');
    $this->CI->load->model('WidgetsModel');
    $this->CI->load->model('BlocksModel');
	}

  function getPageContentWidget($pageBlock){
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['class'] = isset($pageBlock['class'])?$pageBlock['class']:'';
    $vars['background'] = isset($pageBlock['background'])?frontend_uploads_url('widgets/background/'.$pageBlock['background']):'';
    $vars['pageContent'] = $this->getFullPageContent($pageBlock);
    return $this->CI->load->view(frontend_views_path('widgets/pages/page_content'),$vars,TRUE);
  }


  function getContentWidget($pageBlock){
    $vars = array();
    $template = isset($pageBlock['widget_template'])?$pageBlock['widget_template']:'simple-callout';
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    $vars['class'] = isset($pageBlock['class'])?$pageBlock['class']:'';
    $vars['content'] = isset($pageBlock['content'])?$pageBlock['content']:'';
    $vars['background'] = isset($pageBlock['background'])?frontend_uploads_url('widgets/background/'.$pageBlock['background']):'';
    $vars['image'] = (isset($pageBlock['image']) && $pageBlock['image']!='')?frontend_uploads_url('widgets/images/'.$pageBlock['image']):'';
    $vars['video'] = (isset($pageBlock['video']) && $pageBlock['video']!='')?frontend_uploads_url('widgets/videos/'.$pageBlock['video']):'';
    $vars['primary_link_title'] = isset($pageBlock['primary_link_title'])?$pageBlock['primary_link_title']:'';
    $vars['primary_link_url'] = isset($pageBlock['primary_link_url'])?$pageBlock['primary_link_url']:'';
    $vars['secondary_link_title'] = isset($pageBlock['secondary_link_title'])?$pageBlock['secondary_link_title']:'';
    $vars['secondary_link_url'] = isset($pageBlock['secondary_link_url'])?$pageBlock['secondary_link_url']:'';
    $vars['attachment_link_title'] = isset($pageBlock['attachment_link_title'])?$pageBlock['attachment_link_title']:'';
    $vars['attachment'] = isset($pageBlock['attachment'])?frontend_uploads_url('widgets/attachments/'.$pageBlock['attachment']):'';
    return $this->CI->load->view(frontend_views_path('widgets/pages/'.$template),$vars,TRUE);
  }

  function getBlockWidget($pageBlock){
    $vars = array();
    $template = isset($pageBlock['widget_template'])?$pageBlock['widget_template']:'single-row';
    $category = isset($pageBlock['block_category'])?$pageBlock['block_category']:'';
    $limit = 0;
    if($template=='simple-row-grid'){
      $limit = 4;
    }
    if($template=='masonary-rows-grid'){
      $limit = 3;
    }
    if($category!=''){
      if($limit==0){
        $contents = $this->CI->BlocksModel->getArrayCond(array('category'=> $category),'','sort_order','ASC');
      } else {
        $contents = $this->CI->BlocksModel->getArrayLimitCond($limit,array('category'=> $category),'sort_order','ASC');
      }
    }
    $vars['contents'] = isset($category)?$contents:array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    $vars['class'] = isset($pageBlock['class'])?$pageBlock['class']:'';
    $vars['content'] = isset($pageBlock['content'])?$pageBlock['content']:'';
    $vars['background'] = isset($pageBlock['background'])?frontend_uploads_url('widgets/background/'.$pageBlock['background']):'';
    $vars['image'] = (isset($pageBlock['image']) && $pageBlock['image']!='')?frontend_uploads_url('widgets/images/'.$pageBlock['image']):'';
    $vars['video'] = (isset($pageBlock['video']) && $pageBlock['video']!='')?frontend_uploads_url('widgets/videos/'.$pageBlock['video']):'';
    $vars['primary_link_title'] = isset($pageBlock['primary_link_title'])?$pageBlock['primary_link_title']:'';
    $vars['primary_link_url'] = isset($pageBlock['primary_link_url'])?$pageBlock['primary_link_url']:'';
    $vars['secondary_link_title'] = isset($pageBlock['secondary_link_title'])?$pageBlock['secondary_link_title']:'';
    $vars['secondary_link_url'] = isset($pageBlock['secondary_link_url'])?$pageBlock['secondary_link_url']:'';
    $vars['attachment_link_title'] = isset($pageBlock['attachment_link_title'])?$pageBlock['attachment_link_title']:'';
    $vars['attachment'] = isset($pageBlock['attachment'])?frontend_uploads_url('widgets/attachments/'.$pageBlock['attachment']):'';
    return $this->CI->load->view(frontend_views_path('widgets/blocks/'.$template),$vars,TRUE);
  }

  function getBannerWidget($pageBlock){
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['class'] = isset($pageBlock['class'])?$pageBlock['class']:'';
    $vars['background'] = isset($pageBlock['background'])?frontend_uploads_url('widgets/background/'.$pageBlock['background']):'';
    return $this->CI->load->view(frontend_views_path('widgets/banners/promotion'),$vars,TRUE);
  }

  function getCombinedWidget($pageBlock){
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['class'] = isset($pageBlock['class'])?$pageBlock['class']:'';
    $vars['background'] = isset($pageBlock['background'])?frontend_uploads_url('widgets/background/'.$pageBlock['background']):'';
    $widgetIds = explode(',',$pageBlock['widgets']);
    if(count($widgetIds)>0){
      foreach($widgetIds as $widgetId):
        $widgetBlock = $this->CI->WidgetsModel->getRowArrayCond(array('id'=>$widgetId));
        if($widgetBlock){
          $vars['widgets'][] = $this->CI->widgethelper->processPageBlock($widgetBlock);
        }
      endforeach;
    }
    return $this->CI->load->view(frontend_views_path('widgets/combined'),$vars,TRUE);
  }

  function getFullPageContent($pageBlock){
    
    $pageContent = '';
    $pageContent .= $this->CI->contenthelper->getPageContent($pageBlock);
    $pageContent .= $this->CI->paragraphhelper->getParagraphContent($pageBlock);
    return $pageContent;
  }
	
}
