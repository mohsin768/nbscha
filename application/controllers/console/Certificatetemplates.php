<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificatetemplates extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('CertificatetemplatesModel');
	}

	public function index()
	{
		$newdata = array('certificatetemplate_sort_field_filter',
		'certificatetemplate_sort_order_filter',
		'certificatetemplate_search_key_filter',
		'certificatetemplate_status_filter',
		'certificatetemplate_language_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('certificatetemplates/overview'));
	}

	public function overview()
	{
		$cond = array('delete_status'=>'0');
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'sort_order';

		if($this->session->userdata('certificatetemplate_status_filter')!=''){
			$cond['status']= $this->session->userdata('certificatetemplate_status_filter');
		}

		if($this->session->userdata('certificatetemplate_language_filter')!=''){
			$cond['language']= $this->session->userdata('certificatetemplate_language_filter');
		}

		if($this->session->userdata('certificatetemplate_search_key_filter')!=''){
			$like[] = array('field'=>'title', 'value' => $this->session->userdata('certificatetemplate_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('certificatetemplate_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('certificatetemplate_sort_field_filter');
			$sort_direction = $this->session->userdata('certificatetemplate_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('certificatetemplates/overview');
    $config['total_rows'] = $this->CertificatetemplatesModel->getPaginationCount();
    $this->pagination->initialize($config);
		$vars['certificatetemplates'] = $this->CertificatetemplatesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('certificatetemplates/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('c_key', 'Key', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars = array();
			$this->mainvars['content'] = $this->load->view(admin_url_string('certificatetemplates/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
				$image='';
				$signature='';
				$background='';
				$wallet_background='';
				$config['upload_path'] = 'public/uploads/certificates';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('image'))
				{
					$imagedata=$this->upload->data();
					$image=$imagedata['file_name'];
				}
				if($this->upload->do_upload('backgound'))
				{
					$bgdata=$this->upload->data();
					$background=$bgdata['file_name'];
				}
				if($this->upload->do_upload('wallet_bg'))
				{
					$walletBgdata=$this->upload->data();
					$wallet_background=$walletBgdata['file_name'];
				}

				if($this->upload->do_upload('signature'))
				{
					$signaturedata=$this->upload->data();
					$signature=$signaturedata['file_name'];
				}

				$maindata = array('title' => $this->input->post('title'),
				                              'c_key' => $this->input->post('c_key'),
				                              'image' => $image,
																			'background' => $background,
																			'signature' => $signature,
																			'wallet_bg' => $wallet_background,
																		'status' => $this->input->post('status'));

			$descdata = array('template' => $this->input->post('template'),
												'wallet_template' => $this->input->post('wallet_template'),
												'signatory' => $this->input->post('signatory'),
												'language' => $this->input->post('language'));

			$insertrow = $this->CertificatetemplatesModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Template added successfully.'));
				redirect(admin_url_string('certificatetemplates/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('certificatetemplates/overview'));
			}
		}
	}

 public function edit($id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('c_key', 'Key', 'required');
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
			$vars['template']= $this->CertificatetemplatesModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(admin_url_string('certificatetemplates/edit'), $vars,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$maindata = array('title' => $this->input->post('title'),
																		'c_key' => $this->input->post('c_key'),
																	'status' => $this->input->post('status'));

		$descdata = array('template_id' => $id,
											'template' => $this->input->post('template'),
											'wallet_template' => $this->input->post('wallet_template'),
											'signatory' => $this->input->post('signatory'),
											'language' => $this->input->post('language'));

											$config['upload_path'] = 'public/uploads/certificates';
															$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
															$this->load->library('upload', $config);

															if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
																$maindata['image']='';
															} else{

																if($this->upload->do_upload('image'))
																{
																		$imagedata=$this->upload->data();
																		$maindata['image']=$imagedata['file_name'];
																}
															}

															if($this->input->post('remove_background') && $this->input->post('remove_background')=='1'){
																$maindata['background']='';
															} else{

																if($this->upload->do_upload('background'))
																{
																		$bgdata=$this->upload->data();
																		$maindata['background']=$bgdata['file_name'];
																}
															}

															if($this->input->post('remove_wallet_bg') && $this->input->post('remove_wallet_bg')=='1'){
																$maindata['wallet_bg']='';
															} else{

																if($this->upload->do_upload('wallet_bg'))
																{
																		$walletbgdata=$this->upload->data();
																		$maindata['wallet_bg']=$walletbgdata['file_name'];
																}
															}

															if($this->input->post('remove_signature') && $this->input->post('remove_signature')=='1'){
																$maindata['signature']='';
															} else{

																if($this->upload->do_upload('signature'))
																{
																		$signaturedata=$this->upload->data();
																		$maindata['signature']=$signaturedata['file_name'];
																}
															}

				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->CertificatetemplatesModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->CertificatetemplatesModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('certificatetemplates/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('certificatetemplates/overview'));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->CertificatetemplatesModel->getTranslates($cond);
		$vars['certificatetemplate_id'] = $id;
		$this->mainvars['content']=$this->load->view(admin_url_string('certificatetemplates/translates'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function delete($id) {
		$data = array('delete_status' => '1','status'=>'0');
		$cond = array('id'=>$id);
		$updaterow = $this->CertificatetemplatesModel->updateCond($data,$cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'certificatetemplate deleted successfully.'));
			redirect(admin_url_string('certificatetemplates/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('certificatetemplates/overview'));
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
				$actionStatus=$this->CertificatetemplatesModel->updateCond($data,$cond);
			endforeach;
		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->CertificatetemplatesModel->updateCond($data,$cond);
				endforeach;
			}
		}

		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('certificatetemplate_sort_field_filter'  => $sortField);

					if($this->session->userdata('certificatetemplate_sort_order_filter')=='asc'){
						$newdata['certificatetemplate_sort_order_filter'] = 'desc';
					} else{
						$newdata['certificatetemplate_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('certificatetemplate_sort_order_filter','certificatetemplate_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('certificatetemplate_sort_field_filter','certificatetemplate_sort_order_filter',
				'certificatetemplate_search_key_filter','certificatetemplate_status_filter','certificatetemplate_language_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('certificatetemplate_search_key')!=''||
				$this->input->post('certificatetemplate_language')!=''||
					 $this->input->post('certificatetemplate_status')!=''){
						$newdata = array(
								'certificatetemplate_search_key_filter'  => $this->input->post('certificatetemplate_search_key'),
								'certificatetemplate_language_filter'  => $this->input->post('certificatetemplate_language'),
								'certificatetemplate_status_filter'  => $this->input->post('certificatetemplate_status'));
						$this->session->set_userdata($newdata);

				} else {
					$newdata = array('certificatetemplate_search_key_filter','certificatetemplate_status_filter','certificatetemplate_language_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('certificatetemplates/overview'));
	}


}
