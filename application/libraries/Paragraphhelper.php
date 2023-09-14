<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paragraphhelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();
    $this->CI->load->model('PageContentsModel');
	}

	function getParagraphContent($pageBlock){
    $paragraphContent = '';
    if($this->CI->pageType=='pages'){
      $cond = array('page_id'=>$this->CI->pageId,'language'=>$this->CI->site_language);
      $paragraphs = $this->CI->PageContentsModel->getArrayCond($cond,'','sort_order','ASC');
      if(count($paragraphs)>0){
        foreach($paragraphs as $paragraph):
          $paragraphContent .= $this->processParagraphContent($paragraph);
        endforeach;
      }
    }
    return $paragraphContent;
  }

  function processParagraphContent($paragraph){
    $paragraphContent = '';
    $paragraphType = $paragraph['content_type'];
    switch ($paragraphType) {
      case 'text_only':
        $paragraphContent = $this->getTextOnlyContent($paragraph);
        break;
      case 'image_text':
        $paragraphContent = $this->getImageTextContent($paragraph);
        break;
      case 'video_text':
        $paragraphContent = $this->getVideoTextContent($paragraph);
        break; 
      default:
        $paragraphContent = "";
    }
    return $paragraphContent;  
  }

  function getTextOnlyContent($paragraph){
    $vars = array();
    $vars['content'] = $paragraph['content'];
    $vars['id'] = $paragraph['id'];
    return $this->CI->load->view(frontend_views_path('pages/paragraphs/text_only'),$vars,TRUE);
  }

  function getImageTextContent($paragraph){
    $vars = array();
    $vars['image'] =  frontend_uploads_url('pages/contents/images/'.$paragraph['image']);
    $vars['content'] = $paragraph['content'];
    $vars['id'] = $paragraph['id'];
    return $this->CI->load->view(frontend_views_path('pages/paragraphs/image_text'),$vars,TRUE);
  }

  function getVideoTextContent($paragraph){
    $vars = array();
    $vars['image'] =  frontend_uploads_url('pages/contents/images/'.$paragraph['image']);
    $vars['video'] =  frontend_uploads_url('pages/contents/videos/'.$paragraph['video']);
    $vars['content'] = $paragraph['content'];
    $vars['id'] = $paragraph['id'];
    return $this->CI->load->view(frontend_views_path('pages/paragraphs/video_text'),$vars,TRUE);
  }

}
