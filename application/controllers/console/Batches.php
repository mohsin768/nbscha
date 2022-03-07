<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batches extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('BatchesModel');
		$this->load->model('InstrumentsModel');

	}

	public function index()
	{
		redirect(admin_url_string('batches/overview'));
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('batches/overview');
        $config['total_rows'] = $this->BatchesModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['batches'] = $this->BatchesModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),'','start_date','DESC');
		$vars['instruments'] = $this->InstrumentsModel->getInstrumentArray();
		$this->mainvars['content']=$this->load->view(admin_url_string('batches/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add()
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('instrument_id', 'Instrument', 'required');
		$this->form_validation->set_rules('seats', 'Seat', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if($this->form_validation->run() == FALSE)
		{

		$vars['instruments'] = $this->InstrumentsModel->getInstrumentArray();
			
			$this->mainvars['content'] = $this->load->view(admin_url_string('batches/add'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$image =$banner='';
			$batchImageUploadPath = 'public/uploads/batches/images';
			if(!is_dir($batchImageUploadPath)){
				mkdir($batchImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $batchImageUploadPath;
			$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
			$this->load->library('upload', $imageConfig);
			$this->upload->initialize($imageConfig);
			if($this->upload->do_upload('image'))
			{
				$imageData=$this->upload->data();
				$image=$imageData['file_name'];
			}
			
			$start_date=$this->input->post('start_date');
			$end_date=$this->input->post('end_date');
			$data=array(
				'name'=>$this->input->post('name'),
				'instrument_id'=>$this->input->post('instrument_id'),
				'short_description'=>$this->input->post('short_description'),
				'description'=>$this->input->post('description'),
				'start_date'=> date("Y-m-d", strtotime($start_date)),
				'end_date'=> date("Y-m-d", strtotime($end_date)),
				'amount'=>$this->input->post('amount'),
				'seats'=>$this->input->post('seats'),
				'image'=>$image,
				'status'=>$this->input->post('status'),
			);
			$insertid = $this->BatchesModel->insert($data);
			if($insertid){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Added Successfully.'));
				redirect(admin_url_string('batches/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('batches/overview'));
			}
		}
	}

  	public function edit($id)
	{
		$this->ckeditorCall();
		$batchRow = $this->BatchesModel->load($id);
		if(!$batchRow){
			redirect(admin_url_string('batches/overview'));
		}
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('instrument_id', 'instrument_id', 'required');
		$this->form_validation->set_rules('seats', 'Seat', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['batch']= $this->BatchesModel->load($id);
			$edit['instruments'] = $this->InstrumentsModel->getInstrumentArray();
			$this->mainvars['content'] = $this->load->view(admin_url_string('batches/edit'), $edit,true);
			$this->load->view(admin_url_string('main'), $this->mainvars);

		} else {
			$start_date=$this->input->post('start_date');
			$end_date=$this->input->post('end_date');

			$data=array(
				'name'=>$this->input->post('name'),
				'instrument_id'=>$this->input->post('instrument_id'),
				'short_description'=>$this->input->post('short_description'),
				'description'=>$this->input->post('description'),
				'start_date'=> date("Y-m-d", strtotime($start_date)),
				'end_date'=> date("Y-m-d", strtotime($end_date)),
				'amount'=>$this->input->post('amount'),
				'seats'=>$this->input->post('seats'),
				'image'=>$image,
				'status'=>$this->input->post('status'),
			);
			if($this->input->post('remove_image') && $this->input->post('remove_image')=='1'){
				$data['image']='';
			} else{
			$batchImageUploadPath = 'public/uploads/batches/images';
			if(!is_dir($batchImageUploadPath)){
				mkdir($batchImageUploadPath, 0777, TRUE);
			}
			$imageConfig['upload_path'] = $batchImageUploadPath;
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
      		$actionStatus=$this->BatchesModel->updateCond($data,$cond);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(admin_url_string('batches/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('batches/overview'));
			}
		}
	}





	public function delete($id)
	{
		$batchRow = $this->BatchesModel->load($id);
		if(!$batchRow){
			redirect(admin_url_string('batches/overview'));
		}
		$actionStatus=$this->BatchesModel->delete($id);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Deleted Successfully.'));
			redirect(admin_url_string('batches/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('batches/overview'));
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
				$actionStatus=$this->BatchesModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->BatchesModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('batches/overview'));
	}

	

}
