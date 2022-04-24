<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('NewsModel');
		$this->load->model('NewsCategoriesModel');
		$this->load->model('ResourceTypesModel');
	}

	public function index()
	{
		$newdata = array('news_sort_field_filter',
		'news_sort_order_filter',
		'news_search_key_filter',
		'news_status_filter',
		'news_type_filter',
		'news_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('news/overview'));
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

		if($this->session->userdata('news_status_filter')!=''){
			$cond['status']= $this->session->userdata('news_status_filter');
		}

		if($this->session->userdata('news_language_filter')!=''){
			$cond['language']= $this->session->userdata('news_language_filter');
		}
		if($this->session->userdata('news_type_filter')!=''){
			$cond['type']= $this->session->userdata('news_type_filter');
		}
		if($this->session->userdata('news_category_filter')!=''){
			$cond['category']= $this->session->userdata('news_category_filter');
		}
		if($this->session->userdata('news_search_key_filter')!=''){
			$like[] = array('field'=>'title', 'value' => $this->session->userdata('news_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('news_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('news_sort_field_filter');
			$sort_direction = $this->session->userdata('news_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = admin_url('news/overview/'.$language);
		$config['total_rows'] = $this->NewsModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['news'] = $this->NewsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$vars['resourse_types'] = $this->ResourceTypesModel->getResourceTypes();
		$vars['categories'] = $this->NewsCategoriesModel->getElementPair('id','name');
		$this->mainvars['content']=$this->load->view(admin_url_string('news/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$vars['resourse_types'] = $this->ResourceTypesModel->getResourceTypes();
			$vars['categories'] = $this->NewsCategoriesModel->getElementPair('id','name');
			$this->mainvars['content'] = $this->load->view(admin_url_string('news/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$this->load->library('upload');
			$slug = $this->NewsModel->createSlug($this->input->post('title'));
			$image='';
			$config['upload_path'] = 'public/uploads/news/images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->upload->initialize($config);
			if($this->upload->do_upload('image'))
			{
				$imagedata=$this->upload->data();
				$image=$imagedata['file_name'];
			}

			$publish_date = date('Y-m-d',strtotime($this->input->post('publish_date')));

			$maindata = array('slug' => $slug,
			'image' => $image,
			'type' => $this->input->post('type'),
			'category' => $this->input->post('category'),
			'author' => $this->input->post('author'),
			'publish_date' => $publish_date,
			'status' => $this->input->post('status'));

			$video = '';
			$configVideo['upload_path'] = 'public/uploads/news/videos';
			$configVideo['allowed_types'] = 'mp4|webm';
			$this->upload->initialize($configVideo);
			if($this->upload->do_upload('video'))
			{
				$videodata=$this->upload->data();
				$video=$videodata['file_name'];
			}
			$descdata = array(
				'title' => $this->input->post('title'),
				'meta_title' => $this->input->post('title'),
				'summary' => $this->input->post('summary'),
				'body' => $this->input->post('body'),
				'video' => $video,
				'language' => $this->input->post('language'));

			$insertrow = $this->NewsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'News added successfully.'));
				redirect(admin_url_string('news/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('news/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
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
			$vars['news']= $this->NewsModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$vars['resourse_types'] = $this->ResourceTypesModel->getResourceTypes();
			$vars['categories'] = $this->NewsCategoriesModel->getElementPair('id','name');
			$this->mainvars['content'] = $this->load->view(admin_url_string('news/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$this->load->library('upload');
			$publish_date = date('Y-m-d',strtotime($this->input->post('publish_date')));

			$maindata = array('type' => $this->input->post('type'),
			'category' => $this->input->post('category'),
			'author' => $this->input->post('author'),
			'publish_date' => $publish_date,
			'status' => $this->input->post('status'));

			$descdata = array('news_id' => $id,
											'title' => $this->input->post('title'),
											'summary' => $this->input->post('summary'),
											'body' => $this->input->post('body'),
											'language' => $this->input->post('language'));

				$config['upload_path'] = 'public/uploads/news/images';
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
					$configVideo['upload_path'] = 'public/uploads/news/videos';
									$configVideo['allowed_types'] = 'mp4|webm';
									$this->upload->initialize($configVideo);

						if($this->input->post('remove_video') && $this->input->post('remove_video')=='1'){
							$descdata['video']='';
						} else{
							if($this->upload->do_upload('video'))
							{
									$videodata=$this->upload->data();
									$descdata['video']=$videodata['file_name'];
							}
						}
				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->NewsModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->NewsModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('news/overview/'.$lang));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('news/overview/'.$lang));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->NewsModel->getTranslates($cond);
		$vars['news_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('news/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->NewsModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted successfully.'));
			redirect(admin_url_string('news/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('news/overview'));
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
				$actionStatus=$this->NewsModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->NewsModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('news_sort_field_filter'  => $sortField);

					if($this->session->userdata('news_sort_order_filter')=='asc'){
						$newdata['news_sort_order_filter'] = 'desc';
					} else{
						$newdata['news_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('news_sort_order_filter','news_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('news_sort_field_filter','news_sort_order_filter',
				'news_search_key_filter','news_status_filter','news_type_filter','news_category_filter','news_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('news_search_key')!=''||
				$this->input->post('news_type')!=''||$this->input->post('news_category')!=''||
				$this->input->post('news_language')!=''||
					 $this->input->post('news_status')!=''){
						$newdata = array(
								'news_search_key_filter'  => $this->input->post('news_search_key'),
								'news_language_filter'  => $this->input->post('news_language'),
								'news_type_filter'  => $this->input->post('news_type'),
								'news_category_filter'  => $this->input->post('news_category'),
								'news_status_filter'  => $this->input->post('news_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('news_search_key_filter','news_status_filter','news_type_filter','news_category_filter','news_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('news/overview'));
	}
	public function seo($id, $lang)
	 {
		 $this->form_validation->set_rules('slug', 'slug', 'required|callback_urlslug_check');
		 $this->form_validation->set_message('required', 'required');
		 $this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		 if ($this->form_validation->run() == FALSE)
		 {
			 $vars['language'] = $lang;
			 $vars['news']= $this->NewsModel->getRowCond(array('id'=>$id,'language'=>$lang));
			 $this->mainvars['content'] = $this->load->view(admin_url_string('news/seo'), $vars,true);
			 $this->load->view(admin_url_string('main'), $this->mainvars);

		 } else {
			 $maindata = array('slug' => $this->input->post('slug'));

			 $descdata = array('news_id' => $id,
						'meta_title' => $this->input->post('meta_title'),
						'meta_desc' => $this->input->post('meta_desc'),
						'meta_keywords' => $this->input->post('meta_keywords'),
						'language' => $this->input->post('language'));

				 $cond = array('id'=>$id);
				 $updaterow = $this->NewsModel->updateCond($maindata,$cond,$descdata);


			 if($updaterow){
				 $this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				 redirect(admin_url_string('news/overview/'.$lang));
			 } else {
				 $this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				 redirect(admin_url_string('news/overview/'.$lang));
			 }
		 }
	 }
	function urlslug_check($val) {
		if($this->input->post('id')){
			$cond = array('id !=' => $this->input->post('id'), 'slug' => $val);
		} else {
			$cond = array('slug' => $val);
		}
		if($this->NewsModel->rowExists($cond)) {
			$this->form_validation->set_message('urlslug_check', 'Slug - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function categories($language='')
	{
		if($language ==''){
			$language = 'en';
		}
		$cond = array('language'=>$language);
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('newscategory_status_filter')!=''){
			$cond['status']= $this->session->userdata('newscategory_status_filter');
		}

		if($this->session->userdata('newscategory_language_filter')!=''){
			$cond['language']= $this->session->userdata('newscategory_language_filter');
		}

		if($this->session->userdata('newscategory_search_key_filter')!=''){
			$like[] = array('field'=>'name', 'value' => $this->session->userdata('newscategory_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('newscategory_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('newscategory_sort_field_filter');
			$sort_direction = $this->session->userdata('newscategory_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = admin_url('news/categories/'.$language);
		$config['total_rows'] = $this->NewsCategoriesModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['categories'] = $this->NewsCategoriesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('news/categories'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function addcategory()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('news/addcategory'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$slug = $this->NewsCategoriesModel->createSlug($this->input->post('name'));
			$maindata = array('slug' => $slug,'status' => $this->input->post('status'));

			$descdata = array(
				'name' => $this->input->post('name'),
				'language' => $this->input->post('language'));

			$insertrow = $this->NewsCategoriesModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'News Category added successfully.'));
				redirect(admin_url_string('news/categories'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('news/categories'));
			}
		}
	}

 public function editcategory($id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
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
			$vars['category']= $this->NewsCategoriesModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('news/editcategory'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('status' => $this->input->post('status'));

			$descdata = array(
				'news_category_id' => $id,
				'name' => $this->input->post('name'),
				'language' => $this->input->post('language'));

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->NewsCategoriesModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->NewsCategoriesModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('news/categories/'.$lang));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('news/categories/'.$lang));
			}
		}
	}


	public function categorytranslates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->NewsCategoriesModel->getTranslates($cond);
		$vars['category_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('news/categorytranslates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function deletecategory($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->NewsCategoriesModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted successfully.'));
			redirect(admin_url_string('news/categories'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('news/categories'));
		}
	}

	function categoryactions()
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
				$actionStatus=$this->NewsCategoriesModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->NewsCategoriesModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('newscategory_sort_field_filter'  => $sortField);

					if($this->session->userdata('newscategory_sort_order_filter')=='asc'){
						$newdata['newscategory_sort_order_filter'] = 'desc';
					} else{
						$newdata['newscategory_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('newscategory_sort_order_filter','newscategory_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('newscategory_sort_field_filter','newscategory_sort_order_filter',
				'newscategory_search_key_filter','newscategory_status_filter','newscategory_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('newscategory_search_key')!=''||
				$this->input->post('newscategory_language')!=''||
					 $this->input->post('newscategory_status')!=''){
						$newdata = array(
								'newscategory_search_key_filter'  => $this->input->post('newscategory_search_key'),
								'newscategory_language_filter'  => $this->input->post('newscategory_language'),
								'newscategory_status_filter'  => $this->input->post('newscategory_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('newscategory_search_key_filter','newscategory_status_filter','newscategory_type_filter','newscategory_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('news/categories'));
	}

	public function categoryseo($id, $lang)
	 {
		 $this->form_validation->set_rules('slug', 'slug', 'required|callback_categoryurlslug_check');
		 $this->form_validation->set_message('required', 'required');
		 $this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		 if ($this->form_validation->run() == FALSE)
		 {
			 $vars['language'] = $lang;
			 $vars['category']= $this->NewsCategoriesModel->getRowCond(array('id'=>$id,'language'=>$lang));
			 $this->mainvars['content'] = $this->load->view(admin_url_string('news/categoryseo'), $vars,true);
			 $this->load->view(admin_url_string('main'), $this->mainvars);

		 } else {
			 $maindata = array('slug' => $this->input->post('slug'),);

			 $descdata = array('news_category_id' => $id,
												'meta_title' => $this->input->post('meta_title'),
											 'meta_desc' => $this->input->post('meta_desc'),
											 'meta_keywords' => $this->input->post('meta_keywords'),
											 'language' => $this->input->post('language'));

				 $cond = array('id'=>$id);
				 $updaterow = $this->NewsCategoriesModel->updateCond($maindata,$cond,$descdata);


			 if($updaterow){
				 $this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				 redirect(admin_url_string('news/categories/'.$lang));
			 } else {
				 $this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				 redirect(admin_url_string('news/categories/'.$lang));
			 }
		 }
	 }
	function categoryurlslug_check($val) {
		if($this->input->post('id')){
			$cond = array('id !=' => $this->input->post('id'), 'slug' => $val);
		} else {
			$cond = array('slug' => $val);
		}
		if($this->NewsCategoriesModel->rowExists($cond)) {
			$this->form_validation->set_message('categoryurlslug_check', 'Slug - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
