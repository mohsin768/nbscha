<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variables extends MemberController {

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
		redirect(member_url_string('variables/overview'));
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
			$like[] = array('field'=>'variable_value', 'value' => $this->session->userdata('variable_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('variable_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('variable_sort_field_filter');
			$sort_direction = $this->session->userdata('variable_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = member_url('variables/overview/'.$language);
		$config['total_rows'] = $this->ManualVariablesModel->getMemberPaginationCount($cond,$like,$this->session->userdata('member_user_id'));
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['variables'] = $this->ManualVariablesModel->getMemberPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like,$this->session->userdata('member_user_id'));
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$vars['manual']= $this->ManualsModel->getRowCond(array('id'=>$manualId,'language'=>$language));
		$this->mainvars['content']=$this->load->view(member_url_string('variables/overview'),$vars,true);
		$this->mainvars['page_scripts']=$this->load->view(member_url_string('variables/script'),'',true);
		$this->load->view(member_url_string('main'),$this->mainvars);
	}
	public function edit($manualId,$varDescId){
				$this->output->set_content_type('application/json');
				$variableRow=$this->ManualVariablesModel->getMemberRowCond(array('desc_id'=>$varDescId),$this->session->userdata('member_user_id'));
				$language = $variableRow->language;
				$vars['manual']= $this->ManualsModel->getRowCond(array('id'=>$manualId,'language'=>$language));
				$vars['variable'] = $variableRow;
				$content = $this->load->view(member_url_string('variables/edit'),$vars, true);
				$results = array('status'=>'0','content' => $content);
				$json=json_encode($results);
				exit($json);
			}
	public function update(){
				$this->output->set_content_type('application/json');
				$this->form_validation->set_rules('course_custom_fees', 'Custom Fees', 'numeric');
				$this->form_validation->set_rules('member_course_status', 'Status', 'required');
				if($this->form_validation->run() == FALSE)
				{
					$results = array('status' => '0', 'content' => validation_errors('<span class="error">', '</span>'));

				}else{

					$relid = $this->input->post('relation_id',TRUE);
					if($this->input->post('course_original_fees') && $this->input->post('course_original_fees')=='1'){
						$course_original_fees='1';
					}else{
						$course_original_fees='0';
					}
					$relData = array(
						'course_custom_fees' => $this->input->post('course_custom_fees',TRUE),
						'course_original_fees' => $course_original_fees,
						'member_course_status' => $this->input->post('member_course_status',TRUE));
					$updaterow = $this->FranchiseCoursesModel->updateRelation($relData,array('memberes_course_relation.id'=>$relid));
					$results = array('status'=>'1','content' =>'');
				}
				$json=json_encode($results);
				exit($json);
			}

}
