<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residences extends AjaxController {

	function __construct() {
		parent::__construct();
		$this->load->helper('text');
	}

	public function index()
	{
		$residenceCond = array('residences.status'=>'1','language'=>$this->site_language);
		$residenceLike = array();
		$residenceFindIn = array();
		$page = secureInput($this->input->get('page'));
		$language_id = secureInput($this->input->get('language_id'));
		if($language_id!=''){
			$residenceCond['language_id'] = $language_id; 
		}
        $region_id = secureInput($this->input->get('region_id'));
		if($region_id!=''){
			$residenceCond['region_id'] = $region_id; 
		}
        $level_id = secureInput($this->input->get('level_id'));
		if($level_id!=''){
			$residenceCond['level_id'] = $level_id; 
		}
        $package_id = secureInput($this->input->get('package_id'));
		if($package_id!=''){
			$residenceCond['residences.package_id'] = $package_id; 
		}
        $facilities = secureInput($this->input->get('facilities'));
		if($facilities!=''){
			$facilities = explode(',',$facilities);
			$residenceFindIn = $facilities;
		}
        $vaccancy = secureInput($this->input->get('vaccancy'));
		if($vaccancy!=''){
			if($vaccancy=='is_free_vocancy'){
				$residenceCond['vacancy >'] = '0'; 
			}
		}
        $residence_name = secureInput($this->input->get('residence_name'));
		if($residence_name!=''){
			$residenceLike[] = array('field'=>'name','value'=>$residence_name,'location'=>'both'); 
		}
		$residencesData = array('status'=>'0','pager'=>array('current_page'=>'0','pages'=>'0'),'data'=>'');
		$this->load->model('ResidencesModel');
		$this->load->model('PackagesModel');
		$packages = $this->PackagesModel->getIdPair();
		$perPage = 12;
		$offset = $perPage*($page-1);
		
		$totalCount = $this->ResidencesModel->getActivePaginationCount($residenceCond,$residenceLike,$residenceFindIn);
		$totalPages = ceil($totalCount/$perPage);
		$residences = $this->ResidencesModel->getActivePagination($perPage,$offset,$residenceCond,'name','ASC',$residenceLike,$residenceFindIn);
		$residencesinfo = array();
		foreach($residences as $residence):
			if($residence['mainimage']!=''){
				$main_image = imageCropOnFly(frontend_uploads_path('requests/images'),$residence['mainimage'],'570','400','listthumb');
			}
			$residence['name'] = word_limiter(strip_tags($residence['name']), 7);
			$residence['main_image'] = $main_image;
			$residence['package_name'] = (isset($packages[$residence['package_id']]))?$packages[$residence['package_id']]:'';
			$residence['residence_url'] = residences_url($residence['slug']);
			$residencesinfo[] = $residence;
		endforeach;
		if(is_array($residences) && count($residences)>0){
			$residencesData = array('status'=>'1','pager'=>array('current_page'=>$page,'pages'=>$totalPages),'data'=>$residencesinfo);
		}
		$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($residencesData));
	}
}
