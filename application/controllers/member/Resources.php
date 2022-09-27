<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resources extends MemberController {

	function __construct() {
		parent::__construct();
		$this->load->model('NewsModel');
		$this->load->model('NewsCategoriesModel');
		$this->load->model('FormsModel');
		$this->load->model('LinksModel');
	}

	public function index()
	{
		redirect(member_url_string('resources/links'));
	}

	public function news()
	{
		$cond = array('status'=>'1','type'=>'member','language'=>$this->default_language);
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('news_language_filter')!=''){
			$cond['language']= $this->session->userdata('news_language_filter');
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
    $config['base_url'] = member_url('resources/news');
    $config['total_rows'] = $this->NewsModel->getPaginationCount($cond);
    $this->pagination->initialize($config);
		$vars['news'] = $this->NewsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$vars['categories'] = $this->NewsCategoriesModel->getElementPair('id','name');
		$this->mainvars['content']=$this->load->view(member_views_path('resources/news'),$vars,true);
		$this->load->view(member_views_path('main'),$this->mainvars);
	}


	function newsactions()
	{
		$actionStatus=false;
		$ids=$this->input->post('id');

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
				'news_search_key_filter','news_category_filter','news_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('news_search_key')!=''||$this->input->post('news_category')!=''||
				$this->input->post('news_language')!=''){
						$newdata = array(
								'news_search_key_filter'  => $this->input->post('news_search_key'),
								'news_language_filter'  => $this->input->post('news_language'),
								'news_category_filter'  => $this->input->post('news_category'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('news_search_key_filter','news_category_filter','news_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(member_url_string('resources/news'));
	}

	public function newsdetails()
	{
		$id = $this->input->post('id', TRUE);
		$language = $this->input->post('language', TRUE);
		$newsRow = $this->NewsModel->getRowCond(array('id'=>$id,'language'=>$language));
		if(!$newsRow){
			redirect(member_url_string('resources/news'));
		}
		$var['news']= $newsRow;
		$var['categories'] = $this->NewsCategoriesModel->getElementPair('id','name');
		$this->load->view(member_url_string('resources/news_details'), $var);
	}

	public function forms()
	{
		$cond = array('status'=>'1','type'=>'member','language'=>$this->default_language);
		$like = array();
		$sort_direction = 'asc';
		$sort_field =  'publish_date';


		if($this->session->userdata('form_search_key_filter')!=''){
			$like[] = array('field'=>'name', 'value' => $this->session->userdata('form_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('form_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('form_sort_field_filter');
			$sort_direction = $this->session->userdata('form_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();

		$config['base_url'] = member_url('resources/forms');
		$config['total_rows'] = $this->FormsModel->getPaginationCount($cond);
		$this->pagination->initialize($config);
		$vars['forms'] = $this->FormsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
		$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(member_views_path('resources/forms'),$vars,true);
		$this->load->view(member_views_path('main'),$this->mainvars);
	}

	function formactions()
	{
		$actionStatus=false;

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('form_sort_field_filter'  => $sortField);

					if($this->session->userdata('form_sort_order_filter')=='asc'){
						$newdata['form_sort_order_filter'] = 'desc';
					} else{
						$newdata['form_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('form_sort_order_filter','form_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('form_sort_field_filter','form_sort_order_filter',
				'form_search_key_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('form_search_key')!=''){
						$newdata = array(
								'form_search_key_filter'  => $this->input->post('form_search_key'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('form_search_key_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(member_url_string('resources/forms'));
	}

	public function links()
	{
		$cond = array('status'=>'1','type'=>'member','language'=>$this->default_language);
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';


		if($this->session->userdata('link_search_key_filter')!=''){
			$like[] = array('field'=>'name', 'value' => $this->session->userdata('link_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('link_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('link_sort_field_filter');
			$sort_direction = $this->session->userdata('link_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = member_url('resources/links');
    $config['total_rows'] = $this->LinksModel->getPaginationCount($cond);
    $this->pagination->initialize($config);
		$vars['links'] = $this->LinksModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(member_views_path('resources/links'),$vars,true);
		$this->load->view(member_views_path('main'),$this->mainvars);
	}

	function linksactions()
	{
		$actionStatus=false;
		$ids=$this->input->post('id');


		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('link_sort_field_filter'  => $sortField);

					if($this->session->userdata('link_sort_order_filter')=='asc'){
						$newdata['link_sort_order_filter'] = 'desc';
					} else{
						$newdata['link_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('link_sort_order_filter','link_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('link_sort_field_filter','link_sort_order_filter',
				'link_search_key_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('link_search_key')!=''){
						$newdata = array(
								'link_search_key_filter'  => $this->input->post('link_search_key'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('link_search_key_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(member_url_string('resources/links'));
	}

}
