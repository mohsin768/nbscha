<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blocks extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('BlocksModel');
		$this->load->model('BlockCategoriesModel');
	}

	public function index()
	{
		$newdata = array('block_sort_field_filter',
		'block_sort_order_filter',
		'block_search_key_filter',
		'block_category_filter',
		'block_status_filter',
		'block_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('blocks/overview'));
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

		if($this->session->userdata('block_status_filter')!=''){
			$cond['status']= $this->session->userdata('block_status_filter');
		}
		if($this->session->userdata('block_category_filter')!=''){
			$cond['category']= $this->session->userdata('block_category_filter');
		}

		if($this->session->userdata('block_language_filter')!=''){
			$cond['language']= $this->session->userdata('block_language_filter');
		}

		if($this->session->userdata('block_search_key_filter')!=''){
			$like[] = array('field'=>'title', 'value' => $this->session->userdata('block_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('block_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('block_sort_field_filter');
			$sort_direction = $this->session->userdata('block_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = admin_url('blocks/overview/'.$language);
		$config['total_rows'] = $this->BlocksModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['blocks'] = $this->BlocksModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$vars['categories'] = $this->BlockCategoriesModel->getIdPair();
		$this->mainvars['content']=$this->load->view(admin_url_string('blocks/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add(){
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['categories'] = $this->BlockCategoriesModel->getIdPair();
			$this->mainvars['content'] = $this->load->view(admin_url_string('blocks/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$this->load->library('upload');
			$image='';
			$icon='';
			$config['upload_path'] = 'public/uploads/blocks/images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->upload->initialize($config);
			if($this->upload->do_upload('image'))
			{
				$imagedata=$this->upload->data();
				$image=$imagedata['file_name'];
			}

			$configIcon['upload_path'] = 'public/uploads/blocks/icons';
			$configIcon['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->upload->initialize($configIcon);
			if($this->upload->do_upload('icon'))
			{
				$icondata=$this->upload->data();
				$icon=$icondata['file_name'];
			}

			$maindata = array('category' => $this->input->post('category'),
												'image' => $image,
												'icon' => $icon,
												'status' => $this->input->post('status'));

			$descdata = array(
				'title' => $this->input->post('title'),
				'caption_title' => $this->input->post('caption_title'),
				'caption_subtitle' => $this->input->post('caption_subtitle'),
				'icon_class' => $this->input->post('icon_class'),
				'summary' => $this->input->post('summary'),
				'link_url' => $this->input->post('link_url'),
				'link_title' => $this->input->post('link_title'),
				'language' => $this->input->post('language'));

			$insertrow = $this->BlocksModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Block added successfully.'));
				redirect(admin_url_string('blocks/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('blocks/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate=''){
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
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
			$vars['block']= $this->BlocksModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$vars['categories'] = $this->BlockCategoriesModel->getIdPair();
			$this->mainvars['content'] = $this->load->view(admin_url_string('blocks/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else{
			$this->load->library('upload');

			$maindata = array('category' => $this->input->post('category'),'status' => $this->input->post('status'));

			$descdata = array(
				'block_id' => $id,
				'title' => $this->input->post('title'),
				'caption_title' => $this->input->post('caption_title'),
				'caption_subtitle' => $this->input->post('caption_subtitle'),
				'icon_class' => $this->input->post('icon_class'),
				'summary' => $this->input->post('summary'),
				'link_url' => $this->input->post('link_url'),
				'link_title' => $this->input->post('link_title'),
				'language' => $this->input->post('language'));

				$config['upload_path'] = 'public/uploads/blocks/images';
								$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
								$this->upload->initialize($config);

					if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
						$maindata['image']='';
					} else{
						if($this->upload->do_upload('image'))
						{
								$imagedata=$this->upload->data();
								$maindata['image']=$imagedata['file_name'];
						}
					}

					$configIcon['upload_path'] = 'public/uploads/blocks/icons';
									$configIcon['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
									$this->upload->initialize($configIcon);

						if($this->input->post('remove_icon') && $this->input->post('remove_icon')=='1'){
							$maindata['icon']='';
						} else{
							if($this->upload->do_upload('icon'))
							{
									$icondata=$this->upload->data();
									$maindata['icon']=$icondata['file_name'];
							}
						}

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->BlocksModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->BlocksModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('blocks/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('blocks/overview'));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->BlocksModel->getTranslates($cond);
		$vars['block_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('blocks/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->BlocksModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Block deleted successfully.'));
			redirect(admin_url_string('blocks/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('blocks/overview'));
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
				$actionStatus=$this->BlocksModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->BlocksModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('block_sort_field_filter'  => $sortField);

					if($this->session->userdata('block_sort_order_filter')=='asc'){
						$newdata['block_sort_order_filter'] = 'desc';
					} else{
						$newdata['block_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('block_sort_order_filter','block_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('block_sort_field_filter','block_sort_order_filter',
				'block_search_key_filter','block_category_filter','block_status_filter','block_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('block_search_key')!=''||
						$this->input->post('block_category')!=''||
						$this->input->post('block_language')!=''||
						$this->input->post('block_status')!=''){
						$newdata = array(
								'block_search_key_filter'  => $this->input->post('block_search_key'),
								'block_category_filter'  => $this->input->post('block_category'),
								'block_language_filter'  => $this->input->post('block_language'),
								'block_status_filter'  => $this->input->post('block_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('block_search_key_filter','block_status_filter','block_category_filter','block_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('blocks/overview'));
	}
	public function categories()
		{
			$this->load->library('pagination');
			$config = $this->paginationConfig();
	        $config['base_url'] = admin_url('blocks/categories');
	        $config['total_rows'] = $this->BlockCategoriesModel->getPaginationCount();
	        $this->pagination->initialize($config);
			$vars['categories'] = $this->BlockCategoriesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','id','ASC');
			$this->mainvars['content']=$this->load->view(admin_url_string('blocks/categories'),$vars,true);
			$this->load->view(admin_url_string('main'),$this->mainvars);
		}

		function addcategory()
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_message('required', 'required');
			$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
			if($this->form_validation->run() == FALSE)
			{
				$this->mainvars['content'] = $this->load->view(admin_url_string('blocks/addcategory'), $this->mainvars, true);
				$this->load->view(admin_url_string('main'), $this->mainvars);
			} else {
				$data=array(
					'name'=>$this->input->post('name'),
					'status'=>$this->input->post('status')
				);
				$insertid = $this->BlockCategoriesModel->insert($data);
				if($insertid){
					$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
					redirect(admin_url_string('blocks/categories'));
				} else {
					$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
					redirect(admin_url_string('blocks/categories'));
				}
			}
		}

	  	public function editcategory($id)
		{
			$blockRow = $this->BlockCategoriesModel->load($id);
			if(!$blockRow){
				redirect(admin_url_string('blocks/categories'));
			}
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_message('required', 'required');
			$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
			if ($this->form_validation->run() == FALSE)
			{
				$edit['category']= $this->BlockCategoriesModel->load($id);
				$this->mainvars['content'] = $this->load->view(admin_url_string('blocks/editcategory'), $edit,true);
				$this->load->view(admin_url_string('main'), $this->mainvars);

			} else {
				$data=array(
					'name'=>$this->input->post('name'),
					'status'=>$this->input->post('status')
				);
				$cond = array('id' => $id);
	      		$actionStatus=$this->BlockCategoriesModel->updateCond($data,$cond);
				if($actionStatus){
				 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
					redirect(admin_url_string('blocks/categories'));
				} else {
					$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
					redirect(admin_url_string('blocks/categories'));
				}
			}
		}


		public function deletecategory($id)
		{
			$actionStatus = false;
			$blockRow = $this->BlockCategoriesModel->load($id);
			if(!$blockRow){
				redirect(admin_url_string('blocks/categories'));
			}
			$cond = array('category'=>$id);
			$blocks = $this->BlocksModel->getArrayCond($cond);
			if(isset($blocks) && count($blocks)>0){
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Cannot delete already have blocks under this category'));
				redirect(admin_url_string('blocks/categories'));
			} else {
				$actionStatus=$this->BlockCategoriesModel->delete($id);
			}
			if($actionStatus){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
				redirect(admin_url_string('blocks/categories'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('blocks/categories'));
			}
	    }

		function categoryactions()
		{
			$actionStatus=false;
			$ids=$this->input->post('id');
			if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='1';}
			if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='0';}
			if(isset($status) && isset($_POST['id'])){
				foreach($ids as $id):
					$data=array('status'=>$status);
					$cond=array('id'=>$id);
					$actionStatus=$this->BlockCategoriesModel->updateCond($data,$cond);
				endforeach;
			}
			if($actionStatus){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			}
			redirect(admin_url_string('blocks/categories'));
		}

}
