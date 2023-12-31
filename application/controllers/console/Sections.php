<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sections extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('SectionsModel');
		$this->load->model('SectionCategoriesModel');
		$this->load->model('ManualsModel');
		$this->sectionTypes = array('categorized'=>'Categorized','contentlist'=>'Content List','contents'=>'Contents');
	}

	public function index()
	{
		$newdata = array('section_sort_field_filter',
		'section_sort_order_filter',
		'section_search_key_filter',
		'section_status_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('sections/overview'));
	}

	public function overview($manualId,$language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('manual_id'=>$manualId,'language'=>$language);
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('section_status_filter')!=''){
			$cond['status']= $this->session->userdata('section_status_filter');
		}

		if($this->session->userdata('section_search_key_filter')!=''){
			$like[] = array('field'=>'title', 'value' => $this->session->userdata('section_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('section_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('section_sort_field_filter');
			$sort_direction = $this->session->userdata('section_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '6';
		$config['base_url'] = admin_url('sections/overview/'.$manualId.'/'.$language);
		$config['total_rows'] = $this->SectionsModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['sectionPolicyCategory'] = $this->SectionCategoriesModel->getRowCond(array('manual_id'=>$manualId,'category_type'=>'policylist','status'=>'1'));
		$vars['manual']= $this->ManualsModel->getRowCond(array('id'=>$manualId,'language'=>$language));
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['sections'] = $this->SectionsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('sections/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add($manualId,$language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('section_type', 'Section Type', 'required');
		$this->form_validation->set_rules('numbered', 'Numbered', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$vars['language'] = $language;
			$vars['manual']= $this->ManualsModel->getRowCond(array('id'=>$manualId,'language'=>$language));
			$this->mainvars['content'] = $this->load->view(admin_url_string('sections/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$maindata = array('status' => $this->input->post('status'),
			'section_type' => $this->input->post('section_type'),
			'numbered' => $this->input->post('numbered'),
			'manual_id'=>$manualId);
			$descdata = array(
				'title' => $this->input->post('title'),
				'language' => $this->input->post('language'));

			$insertrow = $this->SectionsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Section added successfully.'));
				redirect(admin_url_string('sections/overview/'.$manualId.'/'.$language));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        		redirect(admin_url_string('sections/overview/'.$manualId.'/'.$language));
			}
		}
	}

 public function edit($manualId,$id, $lang, $translate='')
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('section_type', 'Section Type', 'required');
		$this->form_validation->set_rules('numbered', 'Numbered', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$langCond = $lang;
			if($translate=='translate'){
				$langCond = $this->default_language;
			}
			$vars['language'] = $lang;
			$vars['translate'] = $translate;
			$vars['manual']= $this->ManualsModel->getRowCond(array('id'=>$manualId,'language'=>$langCond));
			$vars['section']= $this->SectionsModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('sections/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('numbered' => $this->input->post('numbered'),
			'section_type' => $this->input->post('section_type'),
			'status' => $this->input->post('status'));
			$descdata = array(
				'section_id' => $id,
				'title' => $this->input->post('title'),
				'language' => $this->input->post('language'));

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->SectionsModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->SectionsModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('sections/overview/'.$manualId.'/'.$lang));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('sections/overview/'.$manualId.'/'.$lang));
			}
		}
	}


	public function translates($manualId,$id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->SectionsModel->getTranslates($cond);
		$vars['section_id'] = $id;
		$vars['manual']= $this->ManualsModel->getRowCond(array('id'=>$manualId,'language'=>'en'));
		$this->mainvars['content']=$this->load->view(admin_url_string('sections/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($manualId,$id) {
		$cond = array('id'=>$id);
		$updaterow = $this->SectionsModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'section deleted successfully.'));
			redirect(admin_url_string('sections/overview/'.$manualId));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('sections/overview/'.$manualId));
		}
	}

	function actions($manualId,$language)
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
				$actionStatus=$this->SectionsModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->SectionsModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('section_sort_field_filter'  => $sortField);

					if($this->session->userdata('section_sort_order_filter')=='asc'){
						$newdata['section_sort_order_filter'] = 'desc';
					} else{
						$newdata['section_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('section_sort_order_filter','section_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('section_sort_field_filter','section_sort_order_filter',
				'section_search_key_filter','section_status_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('section_search_key')!=''||
				$this->input->post('section_language')!=''||
					 $this->input->post('section_status')!=''){
						$newdata = array(
								'section_search_key_filter'  => $this->input->post('section_search_key'),
								'section_status_filter'  => $this->input->post('section_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('section_search_key_filter','section_status_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('sections/overview/'.$manualId.'/'.$language));
	}


}
