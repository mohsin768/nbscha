<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenthelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();

	}

  function getSponsorsWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('SponsorsModel');
    $this->CI->load->model('SponsorCategoriesModel');
    $this->CI->load->model('EventsModel');
    $sponsorsCond = array('status'=>'1');
    $currentEvent = $this->CI->EventsModel->getCurrentEvent();
    if($currentEvent){
      $sponsorsCond['event'] = $currentEvent->id;
    }
    $sponsors = $categorized_sponsors = array();
    $sponsors = $this->CI->SponsorsModel->getArrayCond($sponsorsCond,'','sort_order','ASC');
    foreach($sponsors as $sponsor):
      $categorized_sponsors[$sponsor['category']][] = $sponsor;
    endforeach;
    $vars['categories'] =  $this->CI->SponsorCategoriesModel->getIdPair();
    $vars['categorized_sponsors'] = $categorized_sponsors;
    $vars['sponsors'] = $sponsors;
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    $vars['primary_link_title'] = isset($pageBlock['primary_link_title'])?$pageBlock['primary_link_title']:'';
    $vars['primary_link_url'] = isset($pageBlock['primary_link_url'])?$pageBlock['primary_link_url']:'';
    return $this->CI->load->view(frontend_views_path('widgets/contents/sponsors'),$vars,TRUE);
  }

  function getPricingWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('TicketsModel');
    $this->CI->load->model('EventsModel');
    $ticketCond = array('status'=>'1');
    $currentEvent = $this->CI->EventsModel->getCurrentEvent();
    if($currentEvent){
      $ticketCond['event'] = $currentEvent->id;
    }
    $tickets = array();
    $tickets = $this->CI->TicketsModel->getArrayCond($ticketCond,'','sort_order','ASC');
    $vars['tickets'] = $tickets;
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    return $this->CI->load->view(frontend_views_path('widgets/contents/pricing'),$vars,TRUE);
  }


  function getLatestVideosWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('VideosModel');
    $videoCond = array('status'=>'1');
    $videos = $this->CI->VideosModel->getArrayLimitCond('2',$videoCond,'','date','DESC');
    $vars['videos'] = $videos;
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    $vars['primary_link_title'] = isset($pageBlock['primary_link_title'])?$pageBlock['primary_link_title']:'';
    $vars['primary_link_url'] = isset($pageBlock['primary_link_url'])?$pageBlock['primary_link_url']:'';
    return $this->CI->load->view(frontend_views_path('widgets/contents/latest_videos'),$vars,TRUE);
  }

  function getExhibitorsWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('PackagesModel');
    $packages = array();
    $packagesCond = array('status'=>'1');
    $packages = $this->CI->PackagesModel->getArrayCond($packagesCond,'','sort_order','ASC');
    $vars['packages'] = $packages;
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    $vars['primary_link_title'] = isset($pageBlock['primary_link_title'])?$pageBlock['primary_link_title']:'';
    $vars['primary_link_url'] = isset($pageBlock['primary_link_url'])?$pageBlock['primary_link_url']:'';
    $vars['secondary_link_title'] = isset($pageBlock['secondary_link_title'])?$pageBlock['secondary_link_title']:'';
    $vars['secondary_link_url'] = isset($pageBlock['secondary_link_url'])?$pageBlock['secondary_link_url']:'';
    $vars['attachment_link_title'] = isset($pageBlock['attachment_link_title'])?$pageBlock['attachment_link_title']:'';
    $vars['attachment'] = isset($pageBlock['attachment'])?frontend_uploads_url('widgets/attachments/'.$pageBlock['attachment']):'';
    return $this->CI->load->view(frontend_views_path('widgets/contents/exhibitors'),$vars,TRUE);
  }

  function getPackagesWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('PackagesModel');
    $packages = array();
    $packagesCond = array('status'=>'1');
    $packages = $this->CI->PackagesModel->getArrayCond($packagesCond,'','sort_order','ASC');
    $vars['packages'] = $packages;
    return $this->CI->load->view(frontend_views_path('widgets/contents/packages'),$vars,TRUE);
  }

  function getFaqListWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('FaqsModel');
    $faqCond = array('status'=>'1');
    $faqs = $this->CI->FaqsModel->getArrayCond($faqCond,'','sort_order','ASC');
    $vars['faqs'] = $faqs;
    return $this->CI->load->view(frontend_views_path('widgets/contents/faq_list'),$vars,TRUE);
  }

  function getPageContent($pageBlock){
    $pageContent = '';
    $pageType = $this->CI->pageType;
    switch ($pageType) {
      case 'blogs':
        $pageContent = $this->getBlogPageContent($pageBlock);
        break;
      case 'artists':
        $pageContent = $this->getArtistPageContent($pageBlock);
        break;
      case 'instruments':
        $pageContent = $this->getInstrumentPageContent($pageBlock);
        break; 
      default:
        $pageContent = "";
    }
    return $pageContent;
  }

}
