<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widgethelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();
        $this->CI->load->library('contenthelper');
        $this->CI->load->library('pagehelper');
        $this->CI->load->library('socialhelper');
        $this->CI->load->library('generalhelper');
        $this->CI->load->library('formhelper');
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
                $pageBlocks = $this->CI->WidgetsModel->getPageWidgets($pageId);
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
            case 'counter_widget':
                $pageBlockContent = $this->CI->generalhelper->getCounterWidget($pageBlock);
                break;
            case 'statistics_widget':
                $pageBlockContent = $this->CI->generalhelper->getStatisticsWidget($pageBlock);
                break;
            case 'pricing_widget':
                $pageBlockContent = $this->CI->contenthelper->getPricingWidget($pageBlock);
                break;
            case 'sponsors_widget':
                $pageBlockContent = $this->CI->contenthelper->getSponsorsWidget($pageBlock);
                break;
            case 'latest_videos_widget':
                $pageBlockContent = $this->CI->contenthelper->getLatestVideosWidget($pageBlock);
                break;
            case 'packages_widget':
                $pageBlockContent = $this->CI->contenthelper->getPackagesWidget($pageBlock);
                break;
            case 'exhibitors_widget':
                $pageBlockContent = $this->CI->contenthelper->getExhibitorsWidget($pageBlock);
                break;
            case 'faq_list_widget':
                $pageBlockContent = $this->CI->contenthelper->getFaqListWidget($pageBlock);
                break;
            case 'contact_details_widget':
                $pageBlockContent = $this->CI->generalhelper->getContactDetailsWidget($pageBlock);
                break;
            case 'contact_map_widget':
                $pageBlockContent = $this->CI->generalhelper->getContactMapWidget($pageBlock);
                break;
            case 'askquestion_form_widget':
                $pageBlockContent = $this->CI->formhelper->getAskQuestionFormWidget($pageBlock);
                break;
            case 'sponsorship_form_widget':
                $pageBlockContent = $this->CI->formhelper->getSponsorshipFormWidget($pageBlock);
                break;
            case 'advertising_form_widget':
                $pageBlockContent = $this->CI->formhelper->getAdvertisingFormWidget($pageBlock);
                break;
            case 'booking_form_widget':
                $pageBlockContent = $this->CI->formhelper->getBookingFormWidget($pageBlock);
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