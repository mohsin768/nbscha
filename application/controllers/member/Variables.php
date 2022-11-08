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
		$manualRow = $this->ManualsModel->getRowCond(array('id'=>$manualId,'language'=>$language));
		if(!$manualRow){
			redirect(member_url_string('manuals/overview'));
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
		$config['uri_segment'] = '6';
		$config['base_url'] = member_url('variables/overview/'.$manualId.'/'.$language);
		$config['total_rows'] = $this->ManualVariablesModel->getMemberPaginationCount($cond,$like,$this->session->userdata('member_user_id'));
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['variables'] = $this->ManualVariablesModel->getMemberPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like,$this->session->userdata('member_user_id'));
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$vars['manual']= $manualRow;
		$this->mainvars['content']=$this->load->view(member_url_string('variables/overview'),$vars,true);
		$this->mainvars['page_scripts']=$this->load->view(member_url_string('variables/script'),'',true);
		$this->load->view(member_url_string('main'),$this->mainvars);
	}
	public function edit($manualId,$varDescId){
				$this->output->set_content_type('application/json');
				$this->ckeditorCall();
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
					$varDescId = $this->input->post('desc_id',TRUE);
					$varId = $this->input->post('var_id',TRUE);
					$memberValue =  $this->input->post('member_value',TRUE);
					$variableRow=$this->ManualVariablesModel->getMemberRowCond(array('desc_id'=>$varDescId,'member_id'=>$this->session->userdata('member_user_id')),$this->session->userdata('member_user_id'));
					if($variableRow){
						$varData = array('member_value' => $memberValue);
						$updaterow = $this->ManualVariablesModel->updateMemberVariable($varData,array('member_value_id'=>$variableRow->member_value_id));
					}else{
						$varData = array('variable_id'=>$varId,
						'variable_desc_id'=>$varDescId,
						'member_id'=>$this->session->userdata('member_user_id'),
						'member_value' => $memberValue);
						$updaterow = $this->ManualVariablesModel->insertMemberVariable($varData);
					}

				$results = array('status'=>'1','content' =>'');
				$json=json_encode($results);
				exit($json);
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

				redirect(member_url_string('variables/overview/'.$manualId.'/'.$language));
			}
}
