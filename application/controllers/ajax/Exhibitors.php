<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exhibitors extends GlobalController {

	function __construct() {
		parent::__construct();
	}

	public function index($package='',$page='1')
	{
		$exhibitorsData = array('status'=>'0','pager'=>array('current_page'=>'0','pages'=>'0'),'data'=>'');
		$this->load->model('PackagesModel');
		$package = $this->PackagesModel->load($package);
		if($package){
			$perPage = 2;
			$offset = $perPage*($page-1);
			$this->load->model('ExhibitorsModel');
			$exhibitorsCond = array('status'=>'1');
			$this->load->model('EventsModel');
			$currentEvent = $this->EventsModel->getCurrentEvent();
			if($currentEvent){
			  $exhibitorsCond['event'] = $currentEvent->id;
			}
			if($package!=''){
				$exhibitorsCond['package'] = $package->id;
			}
			$totalCount = $this->ExhibitorsModel->getPaginationCount($exhibitorsCond);
			$totalPages = ceil($totalCount/$perPage);
			$exhibitors = $this->ExhibitorsModel->getPagination($perPage,$offset,$exhibitorsCond,'','name','ASC');
			$exhibitorsData = array('status'=>'1','pager'=>array('current_page'=>$page,'pages'=>$totalPages),'data'=>$exhibitors);
		}
		$this->output->set_content_type('application/json');
		echo json_encode( $exhibitorsData );
	}
}
