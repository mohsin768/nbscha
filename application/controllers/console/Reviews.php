<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reviews extends ConsoleController {

	function __construct()
    {
		// Call the Model constructor
		parent::__construct();
		$this->load->model('ReviewsModel');
	}

	public function index()
	{

		redirect(admin_url_string('reviews/overview'));
	}

	public function overview()
	{
		$this->mainvars['page_title']= 'Reviews';
		$this->load->library('pagination');
		$config = $this->paginationConfig();
		$config['base_url'] = admin_url('reviews/overview/');
		$config['uri_segment'] = 4;
		$config['total_rows'] = $this->ReviewsModel->getPaginationCount();
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		$this->mainvars['reviews'] = $this->ReviewsModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','sort_order', 'asc');
		$this->mainvars['content']=$this->load->view(admin_url_string('reviews/overview'),$this->mainvars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{
			$this->mainvars['page_title']='Add reviews';
			$this->mainvars['content'] = $this->load->view(admin_url_string('reviews/add'), $this->mainvars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$image ='';
			$reviewimagePath = 'public/uploads/reviews/images';
			if(!is_dir($reviewimagePath)){
				mkdir($reviewimagePath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $reviewimagePath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			
			$date=$this->input->post('date');
			$data=array(
				'name'=>$this->input->post('name'),
				'body'=>$this->input->post('body'),
				'position'=>$this->input->post('position'),
				'date'=> date("Y-m-d", strtotime($date)),
				'image'=>$image,
				'status'=>$this->input->post('status'),
			);
			$insertid = $this->ReviewsModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('reviews/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('reviews/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$this->ckeditorCall();
		$reviewRow = $this->ReviewsModel->load($id);
		if(!$reviewRow){
			redirect(admin_url_string('reviews/overview'));
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['review']= $this->ReviewsModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('reviews/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$date=$this->input->post('date');

			$data=array(
				'name'=>$this->input->post('name'),
				'body'=>$this->input->post('body'),
				'position'=>$this->input->post('position'),
				'date'=> date("Y-m-d", strtotime($date)),
				'status'=>$this->input->post('status'),
			);
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$data['image']='';
			} else{
			$reviewimagePath = 'public/uploads/reviews/images';
			if(!is_dir($reviewimagePath)){
				mkdir($reviewimagePath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $reviewimagePath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
				if($this->upload->do_upload('image'))
				{
					$imageData=$this->upload->data();
					$data['image']=$imageData['file_name'];
				}
			}
			$cond = array('id' => $id);
      		$actionStatus=$this->ReviewsModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('reviews/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('reviews/overview'));
			}
		}
	}





	public function delete($id)
	{
		$reviewRow = $this->ReviewsModel->load($id);
		if(!$reviewRow){
			redirect(admin_url_string('reviews/overview'));
		}
		$actionStatus=$this->ReviewsModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('reviews/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('reviews/overview'));
		}
    }



	 function actions()
	{
		$ids=$this->input->post('id');
		$sort_orders=$this->input->post('sort_order');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='1';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='0';}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){
			foreach($sort_orders as $id => $sort_order):
				$data=array('sort_order'=>$sort_order);
				$updateid=$this->ReviewsModel->update($id,$data,array());
			endforeach;
		}

        if(isset($_POST['delete']) && $ids){
			foreach($ids as $id):
				$updateid=$this->ReviewsModel->delete($id);
				$flashmsg = 'Deleted Successfully.';
			endforeach;
		}

		if(isset($status) && isset($_POST['id'])){
			if(count($ids)>0){
				foreach($ids as $id):
					$data=array('status'=>$status);
					$updateid=$this->ReviewsModel->update($id,$data,array());
				endforeach;
				if($updateid){
					$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				} else {
					$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				}
			}
		}
		redirect(admin_url_string('reviews/overview'));
	}

}
