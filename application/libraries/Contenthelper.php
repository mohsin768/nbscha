<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenthelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();

	}

  function getContactWidget($pageBlock){
    $vars = array();
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['inset_title'] = isset($pageBlock['inset_title'])?$pageBlock['inset_title']:'';
    $vars['primary_link_title'] = isset($pageBlock['primary_link_title'])?$pageBlock['primary_link_title']:'';
    $vars['primary_link_url'] = isset($pageBlock['primary_link_url'])?$pageBlock['primary_link_url']:'';
    return $this->CI->load->view(frontend_views_path('widgets/contents/contact'),$vars,TRUE);
  }

  function getBoardMembersWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('TeamsModel');
    $boardMembersCond = array('status'=>'1','language'=>$this->CI->site_language);
    $vars['boardMembers'] = $this->CI->TeamsModel->getArrayCond($boardMembersCond,'','sort_order','ASC');
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['content'] = isset($pageBlock['content'])?$pageBlock['content']:'';
    return $this->CI->load->view(frontend_views_path('widgets/contents/board_members'),$vars,TRUE);
  }

  function getFaqsWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('FaqsModel');
    $faqsCond = array('status'=>'1','language'=>$this->CI->site_language);
    $vars['faqs'] = $this->CI->FaqsModel->getArrayCond($faqsCond,'','sort_order','ASC');
    return $this->CI->load->view(frontend_views_path('widgets/contents/faqs'),$vars,TRUE);
  }

  function getLatestNewsWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('NewsModel');
    $newsCond = array('status'=>'1','type'=>'public','language'=>$this->CI->site_language);
    $vars['news'] = $this->CI->NewsModel->getArrayLimitCond('3',$newsCond,'publish_date','DESC');
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['content'] = isset($pageBlock['content'])?$pageBlock['content']:'';
    return $this->CI->load->view(frontend_views_path('widgets/contents/latest_news'),$vars,TRUE);
  }

  function getNewsWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('LinksModel');
    $this->CI->load->model('NewsModel');
    $this->CI->load->model('NewsCategoriesModel');
    $linksCond = array('status'=>'1','type'=>'public','language'=>$this->CI->site_language);
    $vars['links'] = $this->CI->LinksModel->getArrayCond($linksCond,'','sort_order','ASC');
    $catCond = array('status'=>'1','language'=>$this->CI->site_language);
    $categories = $this->CI->NewsCategoriesModel->getArrayCond($catCond,'','sort_order','ASC');
    $categoryCount = array();
    foreach($categories as $category):
      $catCountCond = array('status'=>'1','category'=>$category['id'],'language'=>$this->CI->site_language,'type'=>'public');
      $categoryCount[$category['id']] = $this->CI->NewsModel->getCountCond($catCountCond);
    endforeach;
    $vars['categories'] = $categories;
    $vars['categoryCount'] = $categoryCount;
    $newsCond = array('status'=>'1','type'=>'public','language'=>$this->CI->site_language);
    $vars['news'] = $this->CI->NewsModel->getArrayCond($newsCond,'','publish_date','DESC');
    return $this->CI->load->view(frontend_views_path('widgets/contents/news'),$vars,TRUE);
  }

  function getResidencesWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('PackagesModel');
    $this->CI->load->model('CarelevelsModel');
    $this->CI->load->model('RegionsModel');
    $this->CI->load->model('FeaturesModel');
    $this->CI->load->model('FiltersModel');
    $this->CI->load->model('FacilitiesModel');
    $this->CI->load->model('HomeLanguagesModel');
    $vars['bedCounts'] = $this->CI->FiltersModel->getBedsCount();
    $vars['homeLanguages'] = $this->CI->HomeLanguagesModel->getIdPair();
    $vars['packages'] = $this->CI->PackagesModel->getArrayCond(array('status'=>'1','language'=>$this->CI->site_language),'','sort_order','ASC');
		$vars['levels'] = $this->CI->CarelevelsModel->getArrayCond(array('status'=>'1','language'=>$this->CI->site_language),'','sort_order','ASC');
		$vars['regions'] = $this->CI->RegionsModel->getArrayCond(array('status'=>'1','language'=>$this->CI->site_language),'','sort_order','ASC');
		$vars['features'] = $this->CI->FeaturesModel->getArrayCond(array('status'=>'1','language'=>$this->CI->site_language),'','sort_order','ASC');
    $vars['facilities'] = $this->CI->FacilitiesModel->getArrayCond(array('status'=>'1','language'=>$this->CI->site_language),'','sort_order','ASC');
    return $this->CI->load->view(frontend_views_path('widgets/contents/residences'),$vars,TRUE);
  }

  function getSponsorsWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('SponsorsModel');
    $sponsorsCond = array('status'=>'1','language'=>$this->CI->site_language);
    $vars['sponsors'] = $this->CI->SponsorsModel->getArrayCond($sponsorsCond,'','sort_order','ASC');
    return $this->CI->load->view(frontend_views_path('widgets/contents/sponsors'),$vars,TRUE);
  }

  function getStatisticsWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('StatisticsModel');
    $factsCond = array('status'=>'1','language'=>$this->CI->site_language);
    $vars['facts'] = $this->CI->StatisticsModel->getArrayLimitCond('4',$factsCond,'sort_order','ASC');
    $vars['background'] = isset($pageBlock['background'])?frontend_uploads_url('widgets/background/'.$pageBlock['background']):'';
    return $this->CI->load->view(frontend_views_path('widgets/contents/statistics'),$vars,TRUE);
  }

  function getTestimonialsWidget($pageBlock){
    $vars = array();
    $this->CI->load->model('TestimonialsModel');
    $newsCond = array('status'=>'1','language'=>$this->CI->site_language);
    $vars['testimonials'] = $this->CI->TestimonialsModel->getArrayLimitCond('5',$newsCond,'date','DESC');
    $vars['title'] = isset($pageBlock['title'])?$pageBlock['title']:'';
    $vars['subtitle'] = isset($pageBlock['subtitle'])?$pageBlock['subtitle']:'';
    $vars['content'] = isset($pageBlock['content'])?$pageBlock['content']:'';
    $vars['background'] = isset($pageBlock['background'])?frontend_uploads_url('widgets/background/'.$pageBlock['background']):'';
    return $this->CI->load->view(frontend_views_path('widgets/contents/testimonials'),$vars,TRUE);
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
