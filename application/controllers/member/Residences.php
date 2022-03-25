<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residences extends MemberController {

	function __construct() {
		parent::__construct();
		$this->load->model('MembershipsModel');
		$this->load->model('PackagesModel');
		$this->load->model('ResidencesModel');
		$this->load->model('PackagesModel');
		$this->load->model('RegionsModel');
		$this->load->model('FeaturesModel');
		$this->load->model('FacilitiesModel');
		$this->load->model('CarelevelsModel');
	}

	public function index()
	{
		$this->mainvars['content']=$this->load->view(member_views_path('residence/overview'),'',true);
		$this->mainvars['page_scripts'] = $this->load->view(member_views_path('residence/script'),'',true);
		$this->load->view(member_views_path('main'),$this->mainvars);

	}

	public function loadsummary(){
		$language = $this->default_language;
		$residence = $this->ResidencesModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id'),'language'=>$language));
		if(!$residence){
			exit;
		}
		$vars['residence'] = $residence;
		$content = $this->load->view(member_views_path('residence/summary'),$vars, true);
		$results = array('content' => $content);
		$json=json_encode($results);
		exit($json);
	}

	public function updatevacancy($rId){
			 $this->output->set_content_type('application/json');
			 $language = $this->default_language;
			 $residence = $this->ResidencesModel->getRowCond(array('id'=>$rId,'language'=>$language));
			 $vars['residence'] = $residence;
			 $content = $this->load->view(member_views_path('residence/update_vacancy_form'),$vars, true);
			 $results = array('content' => $content);
			 $json=json_encode($results);
			 exit($json);
		 }

		 public function updatevacancysubmit(){
			 $language = $this->default_language;
				$rId = $this->input->post('id',TRUE);
				$residence = $this->ResidencesModel->getRowCond(array('id'=>$rId,'language'=>$language));
				$this->form_validation->set_rules('vacancy','New Vacancy','required|numeric|greater_than[0]|less_than_equal_to['.abs($residence->beds_count).']');
				if($this->form_validation->run() == FALSE)
				{
				  $results = array('status' => '0', 'data' => validation_errors('<span class="error">', '</span>'));
				} else {

				 $this->ResidencesModel->updateCond(array('vacancy'=>$this->input->post('vacancy',TRUE)),array('id'=>$rId));


				$results = array('status' => '1', 'data' => 'Residence Vacancy Updated Successfully');
				}
				$json=json_encode($results);
				exit($json);
		 }


		 public function viewdetails($rId){
					$this->output->set_content_type('application/json');
					$language = $this->default_language;
					$residence = $this->ResidencesModel->getRowCond(array('id'=>$rId,'language'=>$language));
					$vars['residence'] = $residence;
					$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
					$vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
					$vars['carelevels'] =$this->CarelevelsModel->getElementPair('cid','carelevel_title','sort_order','asc',array('language'=>$this->default_language));
					$vars['facilities'] =$this->FacilitiesModel->getElementPair('fid','facility_title','sort_order','asc',array('language'=>$this->default_language));
					$vars['features'] =$this->FeaturesModel->getElementPair('fid','feature_title','sort_order','asc',array('language'=>$this->default_language));
					$content = $this->load->view(member_views_path('residence/details'),$vars, true);
					$results = array('content' => $content);
					$json=json_encode($results);
		 		 exit($json);
		 	 }

}
