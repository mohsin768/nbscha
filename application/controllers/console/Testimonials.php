<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('TestimonialsModel');
	}

	public function index()
	{
		$newdata = array('testimonial_sort_field_filter',
		'testimonial_sort_order_filter',
		'testimonial_search_key_filter',
		'testimonial_status_filter',
		'testimonial_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('testimonials/overview'));
	}

	public function overview($language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('language'=>$language);
		$like = array();

		$sort_direction = $sort_field = '';

		if($this->session->userdata('testimonial_status_filter')!=''){
			$cond['status']= $this->session->userdata('testimonial_status_filter');
		}

		if($this->session->userdata('testimonial_language_filter')!=''){
			$cond['language']= $this->session->userdata('testimonial_language_filter');
		}

		if($this->session->userdata('testimonial_search_key_filter')!=''){
			$like[] = array('field'=>'author', 'value' => $this->session->userdata('testimonial_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('testimonial_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('testimonial_sort_field_filter');
			$sort_direction = $this->session->userdata('testimonial_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = admin_url('testimonials/overview/'.$language);
		$config['total_rows'] = $this->TestimonialsModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['testimonials'] = $this->TestimonialsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('testimonials/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('author', 'Author', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('testimonials/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {

			$date = date('Y-m-d',strtotime($this->input->post('date')));
			$maindata = array('date' => $date,
			'status' => $this->input->post('status'));

			$descdata = array('author' => $this->input->post('author'),
				'message' => $this->input->post('message'),
				'language' => $this->input->post('language'));

			$insertrow = $this->TestimonialsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Testimonial added successfully.'));
				redirect(admin_url_string('testimonials/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('testimonials/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('author', 'Author', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
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
			$vars['testimonial']= $this->TestimonialsModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('testimonials/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$date = date('Y-m-d',strtotime($this->input->post('date')));
			$maindata = array('date' => $date,
			'status' => $this->input->post('status'));

			$descdata = array('testimonials_id'=>$id,
				'author' => $this->input->post('author'),
				'message' => $this->input->post('message'),
				'language' => $this->input->post('language'));


				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->TestimonialsModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->TestimonialsModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('testimonials/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('testimonials/overview'));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->TestimonialsModel->getTranslates($cond);
		$vars['testimonial_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('testimonials/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->TestimonialsModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'testimonial deleted successfully.'));
			redirect(admin_url_string('testimonials/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('testimonials/overview'));
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
				$actionStatus=$this->TestimonialsModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->TestimonialsModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('testimonial_sort_field_filter'  => $sortField);

					if($this->session->userdata('testimonial_sort_order_filter')=='asc'){
						$newdata['testimonial_sort_order_filter'] = 'desc';
					} else{
						$newdata['testimonial_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('testimonial_sort_order_filter','testimonial_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('testimonial_sort_field_filter','testimonial_sort_order_filter',
				'testimonial_search_key_filter','testimonial_status_filter','testimonial_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('testimonial_search_key')!=''||
				$this->input->post('testimonial_language')!=''||
					 $this->input->post('testimonial_status')!=''){
						$newdata = array(
								'testimonial_search_key_filter'  => $this->input->post('testimonial_search_key'),
								'testimonial_language_filter'  => $this->input->post('testimonial_language'),
								'testimonial_status_filter'  => $this->input->post('testimonial_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('testimonial_search_key_filter','testimonial_status_filter','testimonial_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('testimonials/overview'));
	}


}
