<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Members extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('MembersModel');
		$this->load->model('ResidencesModel');

	}

	public function index()
	{
		$newdata = array('member_sort_field_filter','member_sort_order_filter','member_search_key_filter','member_status_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('members/overview'));
	}

	public function overview(){
		$cond = array('delete_status'=>'0');
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'created';

		if($this->session->userdata('member_status_filter')!=''){
			$cond['members.status']= $this->session->userdata('member_status_filter');
		}

		if($this->session->userdata('member_search_key_filter')!=''){
			$like[] = array('field'=>'first_name', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'last_name', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'email', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'phone', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('member_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('member_sort_field_filter');
			$sort_direction = $this->session->userdata('member_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('members/overview');
    $config['total_rows'] = $this->MembersModel->getPaginationCount($cond,$like);
    $this->pagination->initialize($config);
	$vars['residences'] = $this->ResidencesModel->getElementPair('member_id','name');
		$vars['members'] = $this->MembersModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$this->mainvars['content']=$this->load->view(admin_url_string('members/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add() {
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[members.email]');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confpassword]|min_length[6]');
		$this->form_validation->set_rules('confpassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$this->mainvars['content'] = $this->load->view(admin_url_string('members/add'), '', true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$this->load->helper('string');
			$salt = random_string('alnum', 6);
			$password = sha1($salt.$this->input->post('password').$salt);
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'password' => $password,
				'salt' => $salt,
				'created' => date('Y-m-d H:i:s'),
				'status' => $this->input->post('status'));
			$insertrow = $this->MembersModel->insert($data);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Member added successfully.'));
				redirect(admin_url_string('members/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
        redirect(admin_url_string('members/overview'));
			}
		}
	}

	public function edit($mid){
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['member'] =$this->MembersModel->load($mid);
			$this->mainvars['content'] = $this->load->view(admin_url_string('members/edit'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'status' => $this->input->post('status'));
			$insertrow = $this->MembersModel->update($mid,$data);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Member edited successfully.'));
				redirect(admin_url_string('members/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('members/overview'));
			}
		}
	}
	public function changepwd($mid){
		$member = $this->MembersModel->load($mid);
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confpassword]|min_length[6]');
    $this->form_validation->set_rules('confpassword', 'Confirm Password', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['member'] =$member;
			$this->mainvars['content'] = $this->load->view(admin_url_string('members/changepwd'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$salt = $member->salt;
			$password = sha1($salt.$this->input->post('password').$salt);
			$data = array('password' => $password);
			$cond = array('mid'=>$mid);
			$updaterow = $this->MembersModel->updateCond($data,$cond);
			if ($updaterow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Member password changed successfully.'));
				redirect(admin_url_string('members/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('members/overview'));
			}
		}
	}
	function delete($mid) {
		$data = array('delete_status' => '1','status'=>'0');
		$cond = array('mid'=>$mid);
		$updaterow = $this->MembersModel->updateCond($data,$cond);
		if ($updaterow) {
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Member deleted successfully.'));
			redirect(admin_url_string('members/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('members/overview'));
		}
	}

	function actions()
	{
		$actionStatus=false;
		$ids=$this->input->post('id');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='1';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='0';}
		if(isset($status) && isset($_POST['id'])){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$cond=array('mid'=>$id);
				$actionStatus=$this->MembersModel->updateCond($data,$cond);
			endforeach;
		}


		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
					$sortField = $this->input->post('sort_field');
					$newdata = array('member_sort_field_filter'  => $sortField);

					if($this->session->userdata('member_sort_order_filter')=='asc'){
						$newdata['member_sort_order_filter'] = 'desc';
					} else{
						$newdata['member_sort_order_filter'] = 'asc';
					}
					$this->session->set_userdata($newdata);
				}else{
					$newdata = array('member_sort_order_filter','member_sort_field_filter');
					$this->session->unset_userdata($newdata);
				}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
				$newdata = array('member_sort_field_filter','member_sort_order_filter','member_search_key_filter','member_status_filter');
				$this->session->unset_userdata($newdata);
		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
				if($this->input->post('member_search_key')!=''||
					 $this->input->post('member_status')!=''){
						$newdata = array(
								'member_search_key_filter'  => $this->input->post('member_search_key'),
								'member_status_filter'  => $this->input->post('member_status'));
						$this->session->set_userdata($newdata);
				} else {
					$newdata = array('member_search_key_filter','member_status_filter');
					$this->session->unset_userdata($newdata);
				}
		}

		redirect(admin_url_string('members/overview'));
	}

	public function membership($id)
	{
		$this->load->model('MembershipsModel');
		$this->load->model('ResidencesModel');
		$this->load->model('PackagesModel');
		$language = $this->default_language;
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$id));
		if(!$memberShip){
			redirect(admin_url_string('members/overview'));
		}
		$residenceId = $memberShip->residence_id;
		$packageId = $memberShip->package_id;
		$residence = $this->ResidencesModel->getRowCond(array('id'=>$residenceId,'language'=>$language));
		$package = $this->PackagesModel->getRowCond(array('pid'=>$packageId,'language'=>$language));
		$vars['membership'] = $memberShip;
		$vars['residence'] = $residence;
		$vars['package'] = $package;
		$this->mainvars['content']=$this->load->view(admin_url_string('members/membership/overview'),$vars,true);
		$this->mainvars['page_scripts'] = $this->load->view(admin_url_string('members/membership/script'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);

	}

	public function renew($id)
	{
		$this->load->model('MembershipsModel');
		$this->load->model('RenewalsModel');
		$this->load->model('PackagesModel');
		$this->load->model('PaymentMethodsModel');
		$language = $this->default_language;
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$id));
		if(!$memberShip){
			redirect(admin_url('members'));
		}
		$renewalRequest  = $this->RenewalsModel->getRowCond(array('member_id'=>$id,'status'=>'pending'));
		if($renewalRequest){
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'You already have a renewal request in process.'));
			redirect(admin_url_string('members/membership/'.$id));
		}
		$memberShipRenewal = false;
		$expiryYear = date('Y',strtotime($memberShip->expiry_date));
		$currentYear = date('Y');
		$yearDifference = $currentYear-$expiryYear;
		if($expiryYear==$currentYear){
			$memberShipRenewal = true;
		}
		if($yearDifference>=1){
			$memberShipRenewal = true;
		}
		if(!$memberShipRenewal){
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Your membership cannot be renewed now'));
			redirect(admin_url_string('members/membership/'.$id));
		}
		$this->form_validation->set_rules('package_id', 'Number of beds', 'required');
		$this->form_validation->set_rules('max_beds_count', 'Maximum Licensed Beds', 'required|callback_package_count_check');
		$this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$vars['paymentMethods'] = $this->PaymentMethodsModel->getMethods();
			$vars['membership'] =$memberShip;
			$vars['packages'] =$this->PackagesModel->getArrayCond(array('status'=>'1','language'=>$this->default_language));
			$this->mainvars['content']=$this->load->view(admin_url_string('members/membership/renew'),$vars,true);
			$this->mainvars['page_scripts'] = $this->load->view(admin_url_string('members/membership/script'),'',true);
			$this->load->view(admin_url_string('main'),$this->mainvars);
		} else {
			$packageId = $this->input->post('package_id');
			$package = $this->PackagesModel->getRowCond(array('pid'=>$packageId,'language'=>$language));
			$data=array(
				'member_id' => $id,
				'previous_package_id'=>$memberShip->package_id,
				'previous_issue_date'=>$memberShip->issue_date,
				'previous_expiry_date'=>$memberShip->expiry_date,
				'new_package_id'=>$packageId,
				'new_max_beds_count'=>$this->input->post('max_beds_count'),
				'amount'=>$package->price,
				'payment_method'=>$this->input->post('payment_method'),
				'payment_comments'=>$this->input->post('comments'),
				'payment_info'=>$this->input->post('payment_info'),
				'created_by'=>'member',
				'created_date'=>date('Y-m-d H:i:s'),
				'status'=>'pending'
			);
			$renewId=$this->RenewalsModel->insert($data);
			$identifier = date('ymdhi').sprintf('%04d', $renewId);
			$this->RenewalsModel->updateCond(array('identifier'=>$identifier),array('id'=>$renewId));
			if($renewId){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Renewal Requested Successfully.'));
				redirect(admin_url_string('members/membership/'.$id));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('members/membership/'.$id));
			}
		}
	}

	function package_count_check($maxbadscount) {
		$packageId = secureInput($this->input->post('package_id'));
		if($packageId!=''){
			$packageInfo = $this->PackagesModel->load($packageId);
			if($packageInfo->bed_count>0 && $maxbadscount>$packageInfo->bed_count) {
				$this->form_validation->set_message('package_count_check', 'Licensed bed cannot exceed package limit.');
				return FALSE;
			} else {
				return TRUE;
			}
		} else {
			return TRUE;
		}
	}

	public function certificatepreview($id){
		$this->load->model('MembershipsModel');
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$id));
		if($memberShip->certificate==''){
			exit;
		}
		$certificateContent = unserialize($memberShip->certificate);
		$vars['member_id'] = $id;
		$vars['certificate'] = (isset($certificateContent['certificate']) && $certificateContent['certificate']!='')?$certificateContent['certificate']:'';
		$vars['background'] = (isset($certificateContent['background']) && $certificateContent['background']!='')?$certificateContent['background']:'https://nbscha.celiums.com/public/common/images/certificate_bg.jpg';
		$content = $this->load->view(admin_url_string('members/membership/certificate'),$vars, true);
		$results = array('content' => $content);
		$json=json_encode($results);
		exit($json);
	}

	public function generatecertificate($id){
		$this->load->model('MembershipsModel');
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$id));
		if($memberShip->certificate==''){
			return false;
		} else{
			$pdf_filename  = $memberShip->identifier.'-certificate.pdf';
			$certificateContent = unserialize($memberShip->certificate);
			if($certificateContent){
				$certificate = (isset($certificateContent['certificate']) && $certificateContent['certificate']!='')?$certificateContent['certificate']:'';
				$background = (isset($certificateContent['background']) && $certificateContent['background']!='')?$certificateContent['background']:'';
				if($certificate){
					$this->load->library('dompdf_lib');
					$this->dompdf_lib->convert_html_to_custom_pdf($certificate, $pdf_filename, TRUE,'A4','landscape',$background);
				}
				return true;
			}else{
				return false;
			}
		}
	}

	public function walletcertificatepreview($id){
		$this->load->model('MembershipsModel');
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$id));
		if($memberShip->wallet_certificate==''){
			exit;
		}
		$certificateContent = unserialize($memberShip->wallet_certificate);
		$vars['member_id'] = $id;
		$vars['certificate'] = (isset($certificateContent['certificate']) && $certificateContent['certificate']!='')?$certificateContent['certificate']:'';
		$vars['background'] = (isset($certificateContent['background']) && $certificateContent['background']!='')?$certificateContent['background']:'https://nbscha.celiums.com/public/common/images/certificate_bg.jpg';
		$content = $this->load->view(admin_url_string('members/membership/wallet_certificate'),$vars, true);
		$results = array('content' => $content);
		$json=json_encode($results);
		exit($json);
	}

	public function generatewalletcertificate($id){
		$this->load->model('MembershipsModel');
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$id));
		if($memberShip->wallet_certificate==''){
			return false;
		} else{
			$pdf_filename  = $memberShip->identifier.'-certificate.pdf';
			$certificateContent = unserialize($memberShip->wallet_certificate);
			if($certificateContent){
				$certificate = (isset($certificateContent['certificate']) && $certificateContent['certificate']!='')?$certificateContent['certificate']:'';
				$background = (isset($certificateContent['background']) && $certificateContent['background']!='')?$certificateContent['background']:'';
				if($certificate){
					$this->load->library('dompdf_lib');
					$this->dompdf_lib->convert_html_to_custom_pdf($certificate, $pdf_filename, TRUE,'custom','landscape',$background);
				}
				return true;
			}else{
				return false;
			}
		}

	}

	public function exporttoexcel(){
		$cond = array('members.delete_status'=>'0','residences_desc.language'=>'en');
		$like = array();

		$sort_direction = 'asc';
		$sort_field =  'members.created';

		if($this->session->userdata('member_status_filter')!=''){
			$cond['members.status']= $this->session->userdata('member_status_filter');
		}

		if($this->session->userdata('member_search_key_filter')!=''){
			$like[] = array('field'=>'first_name', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'last_name', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'email', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'phone', 'value' => $this->session->userdata('member_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('member_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('member_sort_field_filter');
			$sort_direction = $this->session->userdata('member_sort_order_filter');
		}
		$members = $this->MembersModel->getDetailArrayCond($cond,$like,$sort_field,$sort_direction);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'SL No.');
    $sheet->setCellValue('B1', 'FIRST NAME');
    $sheet->setCellValue('C1', 'LAST NAME');
    $sheet->setCellValue('D1', 'EMAIL');
		$sheet->setCellValue('E1', 'PHONE');
		$sheet->setCellValue('F1', 'RESIDENCE');
    $sheet->setCellValue('G1', 'STATUS');
		$sheet->setCellValue('H1', 'CREATED');
		$rows = 2;
		$i=0;
		$status = array('0' => 'Disabled','1' => 'Enabled');
    foreach ($members as $val){
        $sheet->setCellValue('A' . $rows, ++$i);
        $sheet->setCellValue('B' . $rows, $val['first_name']);
        $sheet->setCellValue('C' . $rows, $val['last_name']);
        $sheet->setCellValue('D' . $rows, $val['email']);
  			$sheet->setCellValue('E' . $rows, $val['phone']);
				$sheet->setCellValue('F' . $rows, $val['name']);
        $sheet->setCellValue('G' . $rows, $status[$val['status']]);
				$sheet->setCellValue('H' . $rows, date('M j, Y', strtotime($val['created'])));
        $rows++;
    }
		$writer = new Xlsx($spreadsheet);
		$filename = 'nbscha-members';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output'); // download file
	}
}
