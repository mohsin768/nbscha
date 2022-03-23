<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widgethelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();
        $this->CI->load->library('contenthelper');
        $this->CI->load->library('blockhelper');
        $this->CI->load->library('pagehelper');
	}

    function bannerWidget(){
        $vars = array();
        $banner = frontend_assets_url('images/default_header.jpg');
        $title = 'Fort McMurray Trade Show';
        $subtitle = 'Are you ready to attend?';
        $bannerPageObject = '';
        if(isset($this->CI->landingPageObject) && $this->CI->pageType=='blogs'){
            $bannerPageObject = $this->CI->landingPageObject;
        } else if($this->CI->pageObject){
            $bannerPageObject = $this->CI->pageObject;
        }
        if(isset($bannerPageObject->banner_image) && $bannerPageObject->banner_image!=''){
            $banner = frontend_uploads_url('pages/images/'.$bannerPageObject->banner_image);
        }
        if(isset($bannerPageObject->title) && $bannerPageObject->title!=''){
            $title = $bannerPageObject->title;
        }
        if(isset($bannerPageObject->subtitle) && $bannerPageObject->subtitle!=''){
            $subtitle = $bannerPageObject->subtitle;
        }
        $vars['banner'] = $banner;
        $vars['title'] = $title;
        $vars['subtitle'] = $subtitle;
        return $this->CI->load->view(frontend_views_path('widgets/banners/inside_banner'),$vars,TRUE);
    }

    function homeBannerWidget(){
        $vars = array();
        $this->CI->load->model('SlidersModel');
        $sliders = array();
        $sliders = $this->CI->SlidersModel->getArrayLimitCond('10',array('status'=>'1'),'','sort_order','ASC');
        $vars['sliders'] = $sliders;
        return $this->CI->load->view(frontend_views_path('widgets/banners/home_banner'),$vars,TRUE);
    }

    function pageContent(){
        $this->CI->load->model('WidgetsModel');
        $pageContent = '';
        if(isset($this->CI->landingPageObject)){
            $pageId = $this->CI->landingPageObject->id;
        } else {
            $pageId = $this->CI->pageId;         
        }
        if(isset($pageId) && $pageId !=''){
            if($this->CI->pageType=="packages"){
                $pageBlocks = $this->CI->WidgetsModel->getPackageWidgets($pageId);
            } else {
                $pageBlocks = $this->CI->WidgetsModel->getPageWidgets($pageId,$this->CI->site_language);
            }
            foreach($pageBlocks as $pageBlock):
                $pageContent .= $this->processPageBlock($pageBlock);
            endforeach;
        }
        return $pageContent;
    }

    function processPageBlock($pageBlock){
        $pageBlockContent = '';
        $blockType = $pageBlock['widget_type'];
        switch ($blockType) {
            case 'page_content_widget':
				$pageBlockContent = $this->CI->pagehelper->getPageContentWidget($pageBlock);
				break;
			case 'content_widget':
				$pageBlockContent = $this->CI->pagehelper->getContentWidget($pageBlock);
				break;
            case 'content_block_widget':
                $pageBlockContent = $this->CI->pagehelper->getBlockWidget($pageBlock);
                break;
            case 'about_intro_widget':
                $pageBlockContent = $this->CI->blockhelper->getAboutIntroWidget($pageBlock);
                break;
            case 'about_mission_widget':
                $pageBlockContent = $this->CI->blockhelper->getAboutMissionWidget($pageBlock);
                break;
            case 'home_about_widget':
                $pageBlockContent = $this->CI->blockhelper->getHomeAboutWidget($pageBlock);
                break;
            case 'home_blocks_widget':
                $pageBlockContent = $this->CI->blockhelper->getHomeBlocksWidget($pageBlock);
                break;
            case 'home_works_widget':
                $pageBlockContent = $this->CI->blockhelper->getHomeWorksWidget($pageBlock);
                break;
            case 'board_members_widget':
                $pageBlockContent = $this->CI->contenthelper->getBoardMembersWidget($pageBlock);
                break;
            case 'faqs_widget':
                $pageBlockContent = $this->CI->contenthelper->getFaqsWidget($pageBlock);
                break;
            case 'latest_news_widget':
                $pageBlockContent = $this->CI->contenthelper->getLatestNewsWidget($pageBlock);
                break;
            case 'news_list_widget':
                $pageBlockContent = $this->CI->contenthelper->getNewsWidget($pageBlock);
                break;
            case 'residences_list_widget':
                $pageBlockContent = $this->CI->contenthelper->getResidencesWidget($pageBlock);
                break;
            case 'sponsors_list_widget':
                $pageBlockContent = $this->CI->contenthelper->getSponsorsWidget($pageBlock);
                break;
            case 'statistics_widget':
                $pageBlockContent = $this->CI->contenthelper->getStatisticsWidget($pageBlock);
                break;
            case 'testimonials_widget':
                $pageBlockContent = $this->CI->contenthelper->getTestimonialsWidget($pageBlock);
                break;
            case 'contact_widget':
                $pageBlockContent = $this->CI->contenthelper->getContactWidget($pageBlock);
                break;
            case 'combined_widget':
                $pageBlockContent = $this->CI->pagehelper->getCombinedWidget($pageBlock);
                break;
			default:
				$pageBlockContent = "";
		}
        return $pageBlockContent;
    }

}