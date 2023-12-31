<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Manuals extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('ManualsModel');
		$this->load->model('PoliciesModel');
		$this->load->model('SectionsModel');
		$this->load->model('SectionCategoriesModel');
		$this->load->model('PolicyCategoriesModel');
		$this->load->model('ManualContentsModel');
		$this->load->model('ManualVariablesModel');
		$this->load->library('manualclone');
	}

	public function index()
	{
		$newdata = array('manual_sort_field_filter',
		'manual_sort_order_filter',
		'manual_search_key_filter',
		'manual_status_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('manuals/overview'));
	}

	public function overview($language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('language'=>$language,'delete_status'=>'0');
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
		$config['base_url'] = admin_url('manuals/overview/'.$language);
		$config['total_rows'] = $this->ManualsModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['manuals'] = $this->ManualsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('manuals/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('version', 'Version', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('manuals/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$this->load->library('upload');
			$coverHeader = $coverTitle = $coverFooter = '';
			$coverUploadPath = 'public/uploads/manuals/cover';
			if(!is_dir($coverUploadPath)){
				mkdir($coverUploadPath, 0777, TRUE);
			}
			$config['upload_path'] = $coverUploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->upload->initialize($config);
			if($this->upload->do_upload('cover_header'))
			{
				$coverHeaderData=$this->upload->data();
				$coverHeader=$coverHeaderData['file_name'];
			}
			$this->upload->initialize($config);
			if($this->upload->do_upload('cover_title'))
			{
				$coverTitleData=$this->upload->data();
				$coverTitle=$coverTitleData['file_name'];
			}
			$this->upload->initialize($config);
			if($this->upload->do_upload('cover_footer'))
			{
				$coverFooterData=$this->upload->data();
				$coverFooter=$coverFooterData['file_name'];
			}
			$maindata = array('version' => $this->input->post('version'));
			$descdata = array(
				'title' => $this->input->post('title'),
				'cover_header' => $coverHeader,
				'cover_title' => $coverTitle,
				'cover_footer' => $coverFooter,
				'header_title' => $this->input->post('header_title'),
				'header_subtitle' => $this->input->post('header_subtitle'),
				'language' => $this->input->post('language'));
			$insertrow = $this->ManualsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Manual added successfully.'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			}
			redirect(admin_url_string('manuals/overview'));
		}
	}

 	public function edit($id, $lang, $translate='')
	{
		$langCond = $lang;
		if($translate=='translate'){
			$langCond = $this->default_language;
		}
		$manualRow = $this->ManualsModel->getRowCond(array('id'=>$id,'language'=>$langCond));
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('version', 'Version', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$vars['language'] = $lang;
			$vars['translate'] = $translate;
			$vars['manual']= $manualRow;
			$this->mainvars['content'] = $this->load->view(admin_url_string('manuals/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('version' => $this->input->post('version'));
			$descdata = array(
				'manuals_id' => $id,
				'title' => $this->input->post('title'),
				'header_title' => $this->input->post('header_title'),
				'header_subtitle' => $this->input->post('header_subtitle'),
				'status' => $this->input->post('status'),
				'language' => $this->input->post('language'));
				$this->load->library('upload');
				$coverHeader = $coverTitle = $coverFooter = '';
				$coverUploadPath = 'public/uploads/manuals/cover';
				if(!is_dir($coverUploadPath)){
					mkdir($coverUploadPath, 0777, TRUE);
				}
				$config['upload_path'] = $coverUploadPath;
				$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
				if($this->input->post('remove_cover_header') && $this->input->post('remove_cover_header')=='1'){
					$descdata['cover_header']='';
				} else{
					$this->upload->initialize($config);
					if($this->upload->do_upload('cover_header'))
					{
						$coverHeaderData=$this->upload->data();
						$descdata['cover_header']=$coverHeaderData['file_name'];
					}
				}
				if($this->input->post('remove_cover_title') && $this->input->post('remove_cover_title')=='1'){
					$descdata['cover_title']='';
				} else{
					$this->upload->initialize($config);
					if($this->upload->do_upload('cover_title'))
					{
						$coverTitleData=$this->upload->data();
						$descdata['cover_title']=$coverTitleData['file_name'];
					}
				}
				if($this->input->post('remove_cover_footer') && $this->input->post('remove_cover_footer')=='1'){
					$descdata['cover_footer']='';
				} else{
					$this->upload->initialize($config);
					if($this->upload->do_upload('cover_footer'))
					{
						$coverFooterData=$this->upload->data();
						$descdata['cover_footer']=$coverFooterData['file_name'];
					}
				}

				$cond = array('id'=>$id);
				if($translate=='translate'){
					if($manualRow->cover_header!='' && $descdata['cover_header']==''){
						$descdata['cover_header'] = $manualRow->cover_header;
					}
					if($manualRow->cover_title!='' && $descdata['cover_title']==''){
						$descdata['cover_title'] = $manualRow->cover_title;
					}
					if($manualRow->cover_footer!='' && $descdata['cover_footer']==''){
						$descdata['cover_footer'] = $manualRow->cover_footer;
					}
					$updaterow = $this->ManualsModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->ManualsModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('manuals/overview/'.$lang));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('manuals/overview/'.$lang));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->ManualsModel->getTranslates($cond);
		$vars['manual_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('manuals/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$data = array('delete_status'=>'1');
		$updaterow = $this->ManualsModel->updateCond($data,$cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Manual deleted successfully.'));
			redirect(admin_url_string('manuals/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('manuals/overview'));
		}
	}

	function issue($id, $lang, $published){
		if($published=='1'){
			$message = 'Unpublished';
			$publish = '0';
		} else {
			$manualRow = $this->ManualsModel->getRowCond(array('id'=>$id,'language'=>$lang));
			if($manualRow->status=='0'){
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed. Manual not enabled yet.'));
				redirect(admin_url_string('manuals/overview'));
			}
			$message = 'Published';
			$publish = '1';
		}
		$maindata = array();
		$cond = array('id'=>$id);
		$descdata = array('published'=>$publish,'language'=>$lang);
		$updaterow = $this->ManualsModel->updateCond($maindata,$cond,$descdata);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Manual '.$message.' successfully.'));
			redirect(admin_url_string('manuals/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('manuals/overview'));
		}
	}

	function actions()
	{
		$actionStatus=false;
		$ids=$this->input->post('id');
		$sort_orders=$this->input->post('sort_order');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='1';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='0';}
		if(isset($status) && isset($_POST['id'])){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$cond=array('id'=>$id);
				$actionStatus=$this->ManualsModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['publish']) && $this->input->post('publish')=='Publish'){ $published='1';}
		if(isset($_POST['unpublish']) && $this->input->post('unpublish')=='Unpublish'){ $published='0';}
		if(isset($published) && isset($_POST['id'])){
			foreach($ids as $id):
				$data=array('published'=>$published);
				$cond=array('id'=>$id);
				$actionStatus=$this->ManualsModel->updateCond($data,$cond);
			endforeach;
		}

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

		redirect(admin_url_string('manuals/overview'));
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
		$variableCond = array('manual_id'=>$id,'language'=>$lang);
		$variables = $this->ManualVariablesModel->getArrayCond($variableCond);
		foreach($variables as $variable):
			$processedVariables['{'.$variable['variable_key'].'}'] = $variable['variable_value'];
		endforeach;
		$html = strtr($html,$processedVariables);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$dompdf->stream();
	}

	public function clone($id){
		$language = 'en';
		$englishManualRow = $this->ManualsModel->getRowCond(array('id'=>$id,'language'=>$language,'status'=>'1','published'=>'1'));
		$frenchManualRow = $this->ManualsModel->getRowCond(array('id'=>$id,'language'=>'fr','status'=>'1','published'=>'1'));
		if(!$englishManualRow || !$frenchManualRow){
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Only Fully published manuals can be cloned...'));
			redirect(admin_url_string('manuals/overview/'.$language));
		}
		$this->form_validation->set_rules('version', 'Version', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$vars['language'] = $language;
			$vars['manual']= $englishManualRow;
			$this->mainvars['content'] = $this->load->view(admin_url_string('manuals/clone'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('version' => $this->input->post('version'));
			$descdata = array();
			$insertId = $this->ManualsModel->insert($maindata,$descdata);
			$this->manualclone->runClone($id,$insertId);
			if ($insertId) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Manual cloned successfully.'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			}
			redirect(admin_url_string('manuals/overview'));
		}
	}

/* 	public function deleteclone($id){
		$this->manualclone->deleteManualData($id);
		redirect(admin_url_string('manuals/overview'));
	} */

}
