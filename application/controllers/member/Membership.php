<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends MemberController {

	function __construct() {
		parent::__construct();
		$this->load->model('MembershipsModel');
		$this->load->model('PackagesModel');
		$this->load->model('ResidencesModel');
		$this->load->model('RenewalsModel');
	}

	public function index()
	{
		$language = $this->default_language;
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id')));
		if(!$memberShip){
			redirect(member_url('home'));
		}
		$residenceId = $memberShip->residence_id;
		$packageId = $memberShip->package_id;
		$residence = $this->ResidencesModel->getRowCond(array('id'=>$residenceId,'language'=>$language));
		$package = $this->PackagesModel->getRowCond(array('pid'=>$packageId,'language'=>$language));
		$vars['membership'] = $memberShip;
		$vars['residence'] = $residence;
		$vars['package'] = $package;
		$this->mainvars['content']=$this->load->view(member_views_path('membership/overview'),$vars,true);
		$this->mainvars['page_scripts'] = $this->load->view(member_views_path('membership/script'),'',true);
		$this->load->view(member_views_path('main'),$this->mainvars);

	}

	public function renew()
	{
		$language = $this->default_language;
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id')));
		if(!$memberShip){
			redirect(member_url('home'));
		}
		$renewalRequest  = $this->RenewalsModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id'),'status'=>'pending'));
		if($renewalRequest){
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'You already have a renewal request in process.'));
			redirect(member_url('membership'));
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
			redirect(member_url('membership'));
		}
		$this->form_validation->set_rules('package_id', 'Number of beds', 'required');
		$this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$vars['packages'] =$this->PackagesModel->getArrayCond(array('status'=>'1','language'=>$this->default_language));
			$this->mainvars['content']=$this->load->view(member_views_path('membership/renew'),$vars,true);
			$this->mainvars['page_scripts'] = $this->load->view(member_views_path('membership/script'),'',true);
			$this->load->view(member_views_path('main'),$this->mainvars);
		} else {
			$packageId = $this->input->post('package_id');
			$package = $this->PackagesModel->getRowCond(array('pid'=>$packageId,'language'=>$language));
			$data=array(
				'member_id' => $this->session->userdata('member_user_id'),
				'previous_package_id'=>$memberShip->package_id,
				'previous_issue_date'=>$memberShip->issue_date,
				'previous_expiry_date'=>$memberShip->expiry_date,
				'new_package_id'=>$packageId,
				'amount'=>$package->price,
				'payment_method'=>$this->input->post('payment_method'),
				'payment_comments'=>$this->input->post('comments'),
				'payment_info'=>$this->input->post('payment_info'),
				'created_by'=>'member',
				'created_date'=>date('Y-m-d H:i:s'),
				'status'=>'pending'
			);
      		$actionStatus=$this->RenewalsModel->insert($data);
			if($actionStatus){
			 	$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Renewal Requested Successfully.'));
				redirect(member_url_string('membership'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(member_url_string('membership'));
			}
		}
	}

	public function certificatepreview(){
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id')));
		if($memberShip->certificate==''){
			exit;
		}
		$certificateContent = unserialize($memberShip->certificate);
		$vars['certificate'] = (isset($certificateContent['certificate']) && $certificateContent['certificate']!='')?$certificateContent['certificate']:'';
		$vars['background'] = (isset($certificateContent['background']) && $certificateContent['background']!='')?$certificateContent['background']:'https://nbscha.celiums.com/public/common/images/certificate_bg.jpg';
		$content = $this->load->view(member_views_path('membership/certificate'),$vars, true);
		$results = array('content' => $content);
		$json=json_encode($results);
		exit($json);
	}
	public function generatecertificate(){
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id')));
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
					$this->dompdf_lib->convert_html_to_custom_pdf($certificate, $pdf_filename, 'TRUE','A4','landscape',$background);
				}
				return true;
			}else{
				return false;
			}
		}
	}

	public function walletcertificatepreview(){
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id')));
		if($memberShip->wallet_certificate==''){
			exit;
		}
		$certificateContent = unserialize($memberShip->wallet_certificate);
		$vars['certificate'] = (isset($certificateContent['certificate']) && $certificateContent['certificate']!='')?$certificateContent['certificate']:'';
		$vars['background'] = (isset($certificateContent['background']) && $certificateContent['background']!='')?$certificateContent['background']:'https://nbscha.celiums.com/public/common/images/certificate_bg.jpg';
		$content = $this->load->view(member_views_path('membership/wallet_certificate'),$vars, true);
		$results = array('content' => $content);
		$json=json_encode($results);
		exit($json);
	}
	public function generatewalletcertificate(){
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id')));
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
					$this->dompdf_lib->convert_html_to_custom_pdf($certificate, $pdf_filename, 'TRUE','custom','landscape',$background);
				}
				return true;
			}else{
				return false;
			}
		}

	}

}
