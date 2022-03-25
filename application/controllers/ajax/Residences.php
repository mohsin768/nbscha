<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residences extends GlobalController {

	function __construct() {
		parent::__construct();
	}

	public function index($page='1')
	{
		$residencesData = array('status'=>'0','pager'=>array('current_page'=>'0','pages'=>'0'),'data'=>'');
		$this->load->model('ResidencesModel');
		$perPage = 12;
		$offset = $perPage*($page-1);
		$residenceCond = array('status'=>'1');
		$totalCount = $this->ResidencesModel->getPaginationCount($residenceCond);
		$totalPages = ceil($totalCount/$perPage);
		$residences = $this->ResidencesModel->getPagination($perPage,$offset,$residenceCond,'','name','ASC');
		if(is_array($residences) && count($residences)>0){
			$residencesData = array('status'=>'1','pager'=>array('current_page'=>$page,'pages'=>$totalPages),'data'=>$residences);
		}
		$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($residencesData));
	}
}
