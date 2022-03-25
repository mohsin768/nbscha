<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residences extends ConsoleController {

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
		$newdata = array('residence_sort_field_filter','residence_sort_order_filter','residence_search_key_filter','residence_package_filter','residence_region_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('residences/overview'));
	}

	public function overview(){
		$cond = array();
		$like = array();

		$sort_direction = 'desc';
		$sort_field =  'residences.created';

		if($this->session->userdata('residence_package_filter')!=''){
			$cond['residences.package_id']= $this->session->userdata('residence_package_filter');
		}
		if($this->session->userdata('residence_region_filter')!=''){
			$cond['residences.region_id']= $this->session->userdata('residence_region_filter');
		}


		if($this->session->userdata('residence_search_key_filter')!=''){
			$like[] = array('field'=>'first_name', 'value' => $this->session->userdata('residence_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'last_name', 'value' => $this->session->userdata('residence_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'name', 'value' => $this->session->userdata('residence_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('residence_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('residence_sort_field_filter');
			$sort_direction = $this->session->userdata('residence_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('residences/overview');
    $config['total_rows'] = $this->ResidencesModel->getConsolePaginationCount();
    $this->pagination->initialize($config);
		$vars['residences'] = $this->ResidencesModel->getConsolePagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
		$vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
		$this->mainvars['content']=$this->load->view(admin_url_string('residences/overview'),$vars,true);
		$this->mainvars['page_scripts'] = $this->load->view(admin_url_string('residences/script'),'',true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	 public function view($rId){
				$this->output->set_content_type('application/json');
				$language = $this->default_language;
				$residence = $this->ResidencesModel->getRowCond(array('id'=>$rId,'language'=>$language));
				$vars['residence'] = $residence;
				$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
				$vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
				$vars['carelevels'] =$this->CarelevelsModel->getElementPair('cid','carelevel_title','sort_order','asc',array('language'=>$this->default_language));
				$vars['facilities'] =$this->FacilitiesModel->getElementPair('fid','facility_title','sort_order','asc',array('language'=>$this->default_language));
				$vars['features'] =$this->FeaturesModel->getElementPair('fid','feature_title','sort_order','asc',array('language'=>$this->default_language));
				$content = $this->load->view(admin_url_string('residences/details'),$vars, true);
				$results = array('content' => $content);
				$json=json_encode($results);
	 		 exit($json);
	 	 }

		 function actions()
	 	{
	 		$actionStatus=false;
	 		$ids=$this->input->post('id');

	 		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
	 					$sortField = $this->input->post('sort_field');
	 					$newdata = array('residence_sort_field_filter'  => $sortField);

	 					if($this->session->userdata('residence_sort_order_filter')=='asc'){
	 						$newdata['residence_sort_order_filter'] = 'desc';
	 					} else{
	 						$newdata['residence_sort_order_filter'] = 'asc';
	 					}
	 					$this->session->set_userdata($newdata);
	 				}else{
	 					$newdata = array('residence_sort_order_filter','residence_sort_field_filter');
	 					$this->session->unset_userdata($newdata);
	 				}

	 		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
	 				$newdata = array('residence_sort_field_filter','residence_sort_order_filter','residence_search_key_filter','residence_package_filter','residence_region_filter');
	 				$this->session->unset_userdata($newdata);
	 		}

	 		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
	 				if($this->input->post('residence_search_key')!=''||$this->input->post('residence_package')!=''||$this->input->post('residence_region')!=''){
	 						$newdata = array(
	 								'residence_search_key_filter'  => $this->input->post('residence_search_key'),
	 								'residence_region_filter'  => $this->input->post('residence_region'),
	 								'residence_package_filter'  => $this->input->post('residence_package'));
	 						$this->session->set_userdata($newdata);
	 				} else {
	 					$newdata = array('residence_search_key_filter','residence_package_filter','residence_region_filter');
	 					$this->session->unset_userdata($newdata);
	 				}
	 		}

	 		redirect(admin_url_string('residences/overview'));
	 	}

}
