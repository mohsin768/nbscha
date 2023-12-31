<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Manuals extends MemberController {

	function __construct() {
		parent::__construct();
		$this->load->model('ManualsModel');
		$this->load->model('PoliciesModel');
		$this->load->model('SectionsModel');
		$this->load->model('SectionCategoriesModel');
		$this->load->model('PolicyCategoriesModel');
		$this->load->model('ManualContentsModel');
		$this->load->model('ManualVariablesModel');
	}

	public function index()
	{
		$newdata = array('manual_sort_field_filter',
		'manual_sort_order_filter',
		'manual_search_key_filter',
		'manual_status_filter');
		$this->session->unset_userdata($newdata);
		redirect(member_url_string('manuals/overview'));
	}

	public function overview($language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('language'=>$language,'status'=>'1','published'=>'1','delete_status'=>'0');
		$like = array();

		$sort_direction = 'desc';
		$sort_field =  'created';

		if($this->session->userdata('manual_status_filter')!=''){
			$cond['status']= $this->session->userdata('manual_status_filter');
		}

		if($this->session->userdata('manual_search_key_filter')!=''){
			$like[] = array('field'=>'question', 'value' => $this->session->userdata('manual_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('manual_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('manual_sort_field_filter');
			$sort_direction = $this->session->userdata('manual_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = member_url('manuals/overview/'.$language);
		$config['total_rows'] = $this->ManualsModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['manuals'] = $this->ManualsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(member_url_string('manuals/overview'),$vars,true);
		$this->load->view(member_url_string('main'),$this->mainvars);
	}

	

	function actions()
	{
		$actionStatus=false;
		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('manual_sort_field_filter'  => $sortField);

					if($this->session->userdata('manual_sort_order_filter')=='asc'){
						$newdata['manual_sort_order_filter'] = 'desc';
					} else{
						$newdata['manual_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('manual_sort_order_filter','manual_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('manual_sort_field_filter','manual_sort_order_filter',
				'manual_search_key_filter','manual_status_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('manual_search_key')!=''||
					 $this->input->post('manual_status')!=''){
						$newdata = array(
								'manual_search_key_filter'  => $this->input->post('manual_search_key'),
								'manual_status_filter'  => $this->input->post('manual_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('manual_search_key_filter','manual_status_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(member_url_string('manuals/overview'));
	}

	public function download($id='',$lang='en'){
		set_time_limit(0);
		$vars = array();
		$coverHeader = base_url('public/defaults/cover-header-default.jpg');
		$coverTitle = base_url('public/defaults/cover-title-default.jpg');
		$coverFooter = base_url('public/defaults/cover-footer-default.jpg');
		$headerTitle = 'Your Organization';
		$headerSubtitle = 'Human Resources Policies and Procedures';
		if($id!=''){
			$manual = $this->ManualsModel->getRowCond(array('language'=>$lang,'id'=>$id));
			if($manual){
				$coverHeader = (isset($manual->cover_header) && $manual->cover_header!='')?imageCropOnFly('public/uploads/manuals/cover',$manual->cover_header,'900','480'):$coverHeader;
				$coverTitle = (isset($manual->cover_title) && $manual->cover_title!='')?imageCropOnFly('public/uploads/manuals/cover',$manual->cover_title,'900','312'):$coverTitle;
				$coverFooter = (isset($manual->cover_footer) && $manual->cover_footer!='')?imageCropOnFly('public/uploads/manuals/cover',$manual->cover_footer,'900','480'):$coverFooter;
				$headerTitle = (isset($manual->header_title)&&$manual->header_title!='')?$manual->header_title:$headerTitle;
				$headerSubtitle = (isset($manual->header_subtitle)&&$manual->header_subtitle!='')?$manual->header_subtitle:$headerSubtitle;
			}
		}
		$vars['cover_header'] = $coverHeader;
		$vars['cover_title'] = $coverTitle;
		$vars['cover_footer'] = $coverFooter;
		$vars['header_title'] = $headerTitle;
		$vars['header_subtitle'] = $headerSubtitle;
		$dompdf = new Dompdf(array('enable_remote' => true));
		$customcss = '';
		$customcss .= $this->load->view(admin_url_string('manuals/customcss-abhijith'),'',true);
		$customcss .= $this->load->view(admin_url_string('manuals/customcss-malini'),'',true);
		$vars['customcss'] = $customcss;
		$sections = $this->SectionsModel->getArrayCond(array('manual_id'=>$id,'language'=>$lang,'status'=>'1'),'','sort_order','ASC');
		$sectionCategories = $this->SectionCategoriesModel->getArrayCond(array('manual_id'=>$id,'language'=>$lang,'status'=>'1'),'','sort_order','ASC');
		$sectionData = array();
		foreach($sections as $section):
			$sectionRow = array();
			$sectionRow = $section;
			$categoriesData = $contents = array();
			if($section['section_type']=='categorized'){
				$categoriesData = array();
				foreach($sectionCategories as $sectionCategory):
					$categoriesRow = array();
					$categoriesRow = $sectionCategory;
					$policies = $categoryContents = array();
					if($sectionCategory['category_type']=='policylist'){
						$policies = $this->PoliciesModel->getArrayCond(array('manual_id'=>$id,'section'=>$section['id'],'category'=>$sectionCategory['id'],'language'=>$lang,'status'=>'1'),'','sort_order','ASC');
					} else {
						$categoryContents = $this->ManualContentsModel->getArrayCond(array('manual_id'=>$id,'section'=>$section['id'],'category'=>$sectionCategory['id'],'language'=>$lang,'status'=>'1'),'','sort_order','ASC');
					}
					$categoriesRow['policies'] = $policies;
					$categoriesRow['contents'] = $categoryContents;
					$categoriesData[] = $categoriesRow;
				endforeach;
			} else {
				$contents = $this->ManualContentsModel->getArrayCond(array('manual_id'=>$id,'section'=>$section['id'],'language'=>$lang,'status'=>'1'),'','sort_order','ASC');
			}
			$sectionRow['contents'] = $contents;
			$sectionRow['categories'] = $categoriesData;
			$sectionData[] = $sectionRow;
		endforeach;
		$vars['sections'] = $sectionData;
		$vars['sectionCategories'] = $sectionCategories;
		$policyCond = array('manual_id'=>$id,'language'=>$lang,'status'=>'1');
		$vars['policyCategories'] = $this->PolicyCategoriesModel->getElementPair('id','title','sort_order','asc',$policyCond);
		$html = $this->load->view(admin_url_string('manuals/pdftemplate'),$vars,true);
		$processedVariables = array();
		$memberId = $this->session->userdata('member_user_id');
		$variableCond = array('manual_id'=>$id,'language'=>$lang);
		$variables = $this->ManualVariablesModel->getMemberArrayCond($variableCond,'','','',$memberId);
		foreach($variables as $variable):
			$variableValue = $variable['variable_value'];
			if(isset($variable['member_value']) && $variable['member_value']!=''){
				$variableValue = $variable['member_value'];
			}
			$processedVariables['{'.$variable['variable_key'].'}'] = $variableValue;
		endforeach;
		$html = strtr($html,$processedVariables);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$dompdf->stream();
	}


}
