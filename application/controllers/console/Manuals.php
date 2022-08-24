<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Manuals extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('ManualsModel');
		$this->load->model('PoliciesModel');
	}

	public function download(){
		$dompdf = new Dompdf();
		$vars = array();
		$vars['policies'] = $this->PoliciesModel->getArrayCond(array('language'=>'en','status'=>'1'),'','sort_order','ASC');
		$html = $this->load->view(admin_url_string('manuals/pdftemplate'),$vars,true);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$dompdf->stream();
	}

	public function index()
	{
		$newdata = array('manual_sort_field_filter',
		'manual_sort_order_filter',
		'manual_search_key_filter',
		'manual_status_filter',
		'manual_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('manuals/overview'));
	}

	public function overview($language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('language'=>$language);
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('manual_status_filter')!=''){
			$cond['status']= $this->session->userdata('manual_status_filter');
		}

		if($this->session->userdata('manual_language_filter')!=''){
			$cond['language']= $this->session->userdata('manual_language_filter');
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
		$config['total_rows'] = $this->FaqsModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['manuals'] = $this->FaqsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('manuals/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('manuals/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'question' => $this->input->post('question'),
				'answer' => $this->input->post('answer'),
				'language' => $this->input->post('language'));

			$insertrow = $this->FaqsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Faq added successfully.'));
				redirect(admin_url_string('manuals/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('manuals/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
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
			$vars['faq']= $this->FaqsModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('manuals/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'faq_id' => $id,
				'question' => $this->input->post('question'),
				'answer' => $this->input->post('answer'),
				'language' => $this->input->post('language'));

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->FaqsModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->FaqsModel->updateCond($maindata,$cond,$descdata);
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
		$vars['translates'] = $this->FaqsModel->getTranslates($cond);
		$vars['faq_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('manuals/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->FaqsModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'faq deleted successfully.'));
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
				$actionStatus=$this->FaqsModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->FaqsModel->updateCond($data,$cond);
				endforeach;
			}
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
				'manual_search_key_filter','manual_status_filter','manual_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('manual_search_key')!=''||
				$this->input->post('manual_language')!=''||
					 $this->input->post('manual_status')!=''){
						$newdata = array(
								'manual_search_key_filter'  => $this->input->post('manual_search_key'),
								'manual_language_filter'  => $this->input->post('manual_language'),
								'manual_status_filter'  => $this->input->post('manual_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('manual_search_key_filter','manual_status_filter','manual_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('manuals/overview'));
	}


}
