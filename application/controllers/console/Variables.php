<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variables extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('ManualVariablesModel');
		$this->load->model('ManualsModel');
		$this->variableTypes = array('text'=>'Text','textarea'=>'Textarea','editor'=>'Textarea with Editor');
	}

	public function index()
	{
		$newdata = array('variable_sort_field_filter',
		'variable_sort_order_filter',
		'variable_search_key_filter',
		'variable_status_filter',
		'variable_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('variables/overview'));
	}

	public function overview($manualId,$language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('language'=>$language);
		$like = array();

		$sort_direction = '';
		$sort_field =  '';

		if($this->session->userdata('variable_language_filter')!=''){
			$cond['language']= $this->session->userdata('variable_language_filter');
		}

		if($this->session->userdata('variable_search_key_filter')!=''){
			$like[] = array('field'=>'title', 'value' => $this->session->userdata('variable_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('variable_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('variable_sort_field_filter');
			$sort_direction = $this->session->userdata('variable_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = admin_url('variables/overview/'.$language);
		$config['total_rows'] = $this->ManualVariablesModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['variables'] = $this->ManualVariablesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$vars['manual']= $this->ManualsModel->getRowCond(array('id'=>$manualId,'language'=>$language));
		$this->mainvars['content']=$this->load->view(admin_url_string('variables/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add($manualId,$language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('variable_value', 'Value', 'required');
		$this->form_validation->set_rules('variable_key', 'Key', 'required|callback_variablekey_exists');
		$this->form_validation->set_rules('variable_type', 'Type', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$vars['language'] = $language;
			$vars['manual']= $this->ManualsModel->getRowCond(array('id'=>$manualId,'language'=>$language));
			$this->mainvars['content'] = $this->load->view(admin_url_string('variables/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$maindata = array('variable_type' => $this->input->post('variable_type'),
			'variable_key' => $this->input->post('variable_key'),
			'manual_id'=>$manualId);
			$descdata = array('title' => $this->input->post('title'),
				'variable_value' => $this->input->post('variable_value'),
				'language' => $this->input->post('language'));

			$insertrow = $this->ManualVariablesModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Variable added successfully.'));
				redirect(admin_url_string('variables/overview/'.$manualId.'/'.$language));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
						redirect(admin_url_string('variables/overview/'.$manualId.'/'.$language));
			}
		}
	}

 public function edit($manualId,$id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('variable_value', 'Value', 'required');
		$this->form_validation->set_rules('variable_key', 'Key', 'required|callback_variablekey_exists');
		$this->form_validation->set_rules('variable_type', 'Type', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
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
			$vars['variable']= $this->ManualVariablesModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('variables/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('variable_type' => $this->input->post('variable_type'),
			'variable_key' => $this->input->post('variable_key'));

			$descdata = array(
				'manual_variable_id	' => $id,
				'variable_value' => $this->input->post('variable_value'),
				'title' => $this->input->post('title'),
				'language' => $this->input->post('language'));

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->ManualVariablesModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->ManualVariablesModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Variable updated successfully.'));
 				redirect(admin_url_string('variables/overview/'.$manualId.'/'.$language));
 			} else {
 				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
 						redirect(admin_url_string('variables/overview/'.$manualId.'/'.$language));
 			}
		}
	}

	function variablekey_exists($val) {
		if($this->input->post('id')){
			$cond = array('id !=' => $this->input->post('id'), 'variable_key' => $val);
		} else {
			$cond = array('variable_key' => $val);
		}
		if($this->ManualVariablesModel->rowExists($cond)) {
			$this->form_validation->set_message('variablekey_exists', 'Variable Key - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function translates($manualId,$id)
		{
			$cond = array('id'=>$id);
			$vars['translates'] = $this->ManualVariablesModel->getTranslates($cond);
			$vars['manual_variable_id'] = $id;
			$vars['manual']= $this->ManualsModel->getRowCond(array('id'=>$manualId,'language'=>'en'));
			$this->mainvars['content']=$this->load->view(admin_url_string('variables/translates'),$vars,true);
			$this->load->view(admin_url_string('main'),$this->mainvars);
		}

	function delete($manualId,$id) {
		$cond = array('id'=>$id);
		$updaterow = $this->ManualVariablesModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'section deleted successfully.'));
			redirect(admin_url_string('variables/overview/'.$manualId));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('variables/overview/'.$manualId));
		}
	}

	function actions($manualId,$language)
	{
		$actionStatus=false;
		$ids=$this->input->post('id');



		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('variable_sort_field_filter'  => $sortField);

					if($this->session->userdata('variable_sort_order_filter')=='asc'){
						$newdata['variable_sort_order_filter'] = 'desc';
					} else{
						$newdata['variable_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('variable_sort_order_filter','variable_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('variable_sort_field_filter','variable_sort_order_filter',
				'variable_search_key_filter','variable_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('variable_search_key')!=''||
				$this->input->post('variable_language')!=''){
						$newdata = array(
								'variable_search_key_filter'  => $this->input->post('variable_search_key'),
								'variable_language_filter'  => $this->input->post('variable_language'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('variable_search_key_filter','variable_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('variables/overview/'.$manualId.'/'.$language));
	}


}
