<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('TeamsModel');
	}

	public function index()
	{
		$newdata = array('team_sort_field_filter',
		'team_sort_order_filter',
		'team_search_key_filter',
		'team_status_filter',
		'team_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('teams/overview'));
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

		if($this->session->userdata('team_status_filter')!=''){
			$cond['status']= $this->session->userdata('team_status_filter');
		}

		if($this->session->userdata('team_language_filter')!=''){
			$cond['language']= $this->session->userdata('team_language_filter');
		}

		if($this->session->userdata('team_search_key_filter')!=''){
			$like[] = array('field'=>'name', 'value' => $this->session->userdata('team_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('team_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('team_sort_field_filter');
			$sort_direction = $this->session->userdata('team_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['uri_segment'] = '5';
		$config['base_url'] = admin_url('teams/overview/'.$language);
		$config['total_rows'] = $this->TeamsModel->getPaginationCount($cond,$like);
		$this->pagination->initialize($config);
		$vars['language'] = $language;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['teams'] = $this->TeamsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    	$vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('teams/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('teams/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$slug = $this->TeamsModel->createSlug($this->input->post('name'));
			$image='';
			$config['upload_path'] = 'public/uploads/teams';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('image'))
			{
				$imagedata=$this->upload->data();
				$image=$imagedata['file_name'];
			}

			$maindata = array('slug' => $slug,
												'phone' => $this->input->post('phone'),
												'email' => $this->input->post('email'),
												'facebook' => $this->input->post('facebook'),
												'twitter' => $this->input->post('twitter'),
												'linkedin' => $this->input->post('linkedin'),
												'skype' => $this->input->post('skype'),
												'photo' => $image,
												'status' => $this->input->post('status'));

			$descdata = array('name' => $this->input->post('name'),
												'position' => $this->input->post('position'),
												'location' => $this->input->post('location'),
												'bio' => $this->input->post('bio'),
												'language' => $this->input->post('language'));

			$insertrow = $this->TeamsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Member added successfully.'));
				redirect(admin_url_string('teams/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('teams/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
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
			$vars['team']= $this->TeamsModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('teams/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {

			$maindata = array('phone' => $this->input->post('phone'),
												'email' => $this->input->post('email'),
												'facebook' => $this->input->post('facebook'),
												'twitter' => $this->input->post('twitter'),
												'linkedin' => $this->input->post('linkedin'),
												'skype' => $this->input->post('skype'),
												'status' => $this->input->post('status'));

			$descdata = array('board_member_id' => $id,
				'name' => $this->input->post('name'),
				'position' => $this->input->post('position'),
				'location' => $this->input->post('location'),
				'bio' => $this->input->post('bio'),
				'language' => $this->input->post('language'));

				$config['upload_path'] = 'public/uploads/teams';
								$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
								$this->load->library('upload', $config);
								$this->upload->initialize($config);
					if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
						$maindata['photo']='';
					} else{

						if($this->upload->do_upload('image'))
						{
								$imagedata=$this->upload->data();
								$maindata['photo']=$imagedata['file_name'];
						}
					}

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->TeamsModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->TeamsModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('teams/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('teams/overview'));
			}
		}
	}
	public function seo($id, $lang)
	 {
		 $this->form_validation->set_rules('slug', 'slug', 'required|callback_urlslug_check');
		 $this->form_validation->set_message('required', 'required');
		 $this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		 if ($this->form_validation->run() == FALSE)
		 {
			 $vars['language'] = $lang;
			 $vars['team']= $this->TeamsModel->getRowCond(array('id'=>$id,'language'=>$lang));
			 $this->mainvars['content'] = $this->load->view(admin_url_string('teams/seo'), $vars,true);
			 $this->load->view(admin_url_string('main'), $this->mainvars);

		 } else {
			 $maindata = array('slug' => $this->input->post('slug'),);

			 $descdata = array('board_member_id' => $id,
			 									'meta_title' => $this->input->post('meta_title'),
											 'meta_desc' => $this->input->post('meta_desc'),
											 'meta_keywords' => $this->input->post('meta_keywords'),
											 'language' => $this->input->post('language'));

				 $cond = array('id'=>$id);
				 $updaterow = $this->TeamsModel->updateCond($maindata,$cond,$descdata);


			 if($updaterow){
				 $this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				 redirect(admin_url_string('teams/overview'));
			 } else {
				 $this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				 redirect(admin_url_string('teams/overview'));
			 }
		 }
	 }

	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->TeamsModel->getTranslates($cond);
		$vars['team_id']= $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('teams/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$cond = array('id'=>$id);
		$updaterow = $this->TeamsModel->deleteCond($cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Member deleted successfully.'));
			redirect(admin_url_string('teams/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('teams/overview'));
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
				$actionStatus=$this->TeamsModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->TeamsModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('team_sort_field_filter'  => $sortField);

					if($this->session->userdata('team_sort_order_filter')=='asc'){
						$newdata['team_sort_order_filter'] = 'desc';
					} else{
						$newdata['team_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('team_sort_order_filter','team_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('team_sort_field_filter','team_sort_order_filter',
				'team_search_key_filter','team_status_filter','team_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('team_search_key')!=''||
				$this->input->post('team_language')!=''||
					 $this->input->post('team_status')!=''){
						$newdata = array(
								'team_search_key_filter'  => $this->input->post('team_search_key'),
								'team_language_filter'  => $this->input->post('team_language'),
								'team_status_filter'  => $this->input->post('team_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('team_search_key_filter','team_status_filter','team_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('teams/overview'));
	}

	function urlslug_check($val) {
		if($this->input->post('id')){
			$cond = array('id !=' => $this->input->post('id'), 'slug' => $val);
		} else {
			$cond = array('slug' => $val);
		}
		if($this->TeamsModel->rowExists($cond)) {
			$this->form_validation->set_message('urlslug_check', 'Slug - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
