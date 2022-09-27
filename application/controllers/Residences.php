<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residences extends FrontController {

	var $pageObject, $pageType, $pageId;

	function __construct() {
		parent::__construct();
		$this->load->model('PagesModel');
		$this->load->model('ResidencesModel');
		$this->load->model('PackagesModel');
		$this->load->model('CarelevelsModel');
		$this->load->model('FacilitiesModel');
		$this->load->model('RegionsModel');
		$this->load->model('FeaturesModel');
		$this->load->model('HomeLanguagesModel');
	}

	public function index($slug='')
	{
		if($slug==''){
			redirect('/');
		}
		$slug = urldecode($slug);
		$residenceObject = $this->ResidencesModel->getRowCond(array('slug'=>$slug,'language'=>$this->site_language));
		$this->pageType = 'residences';
		if(!$residenceObject){
			redirect('pagenotfound');
		}
		$this->pageObject = $residenceObject;
		$this->pageId = $residenceObject->id;
		$bodyClass = 'residence';
		$landingPageId = $this->settings['RESIDENCE_PAGE_ID'];
		$landingPageObject = $this->PagesModel->getRowCond(array('id'=>$landingPageId,'language'=>$this->site_language));
		if(!$landingPageObject){
			redirect('pagenotfound');
		}
		if($landingPageObject){
			$this->landingPageObject = $landingPageObject;
			if($landingPageObject->class!=''){
				$bodyClass = $landingPageObject->class;
			}
		}
		$this->processPage();
		$this->mainvars['banner']=$this->widgethelper->bannerWidget();
		$vars = array();
		$vars['residence'] = $residenceObject;
		$youtubeId = '';
		if($residenceObject->virtual_tour!=''){ 
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',$residenceObject->virtual_tour,$matches);
			if(isset( $matches[1]) &&  $matches[1] !=''){
				$youtubeId = $matches[1];
			}
		}
		$vars['youtubeId'] = $youtubeId;
		$residenceImages = array();
		if($residenceObject->mainimage!=''){
			$residenceImages[] = frontend_uploads_url('requests/images/'.$residenceObject->mainimage);
		}
		if($residenceObject->image2!=''){
			$residenceImages[] = frontend_uploads_url('requests/images/'.$residenceObject->image2);
		}
		if($residenceObject->image3!=''){
			$residenceImages[] = frontend_uploads_url('requests/images/'.$residenceObject->image3);
		}
		if($residenceObject->image4!=''){
			$residenceImages[] = frontend_uploads_url('requests/images/'.$residenceObject->image4);
		}
		if($residenceObject->image5!=''){
			$residenceImages[] = frontend_uploads_url('requests/images/'.$residenceObject->image5);
		}
		if($residenceObject->image6!=''){
			$residenceImages[] = frontend_uploads_url('requests/images/'.$residenceObject->image6);
		}
		$vars['images'] = $residenceImages;
		$facilities = $this->FacilitiesModel->getIdPair();
		$residenceFacilitiesStr = '';
		$residenceFacilitiesStrArray = array();
		if($residenceObject->facilities!=''){
			$residenceFacilitiesArray = explode(',',$residenceObject->facilities);
			foreach($residenceFacilitiesArray as $facilityId):
				if(isset($facilities[$facilityId])){
					$residenceFacilitiesStrArray[]= $facilities[$facilityId];
				}
			endforeach;
			$residenceFacilitiesStr = implode(', ',$residenceFacilitiesStrArray);
		}
		$residenceFeatures = $residenceObject->features; 
		$residenceFeatures = unserialize($residenceFeatures);
		$vars['residenceFeatures'] = $residenceFeatures;
		$vars['facilities'] = $residenceFacilitiesStr;
		$vars['homeLanguages'] = $this->HomeLanguagesModel->getIdPair();
		$vars['packages'] = $this->PackagesModel->getIdPair();
		$vars['levels'] = $this->CarelevelsModel->getIdPair();
		$vars['regions'] = $this->RegionsModel->getIdPair();
		$vars['features'] = $this->FeaturesModel->getIdPair();
		$this->mainvars['content_top']= $this->load->view(frontend_views_path('pages/residence'),$vars,TRUE);
		$this->mainvars['content']=$this->widgethelper->pageContent();
		$this->mainvars['bodyClass'] = $bodyClass;
		$this->load->view(frontend_views_path('main'),$this->mainvars);
		
	}

}
