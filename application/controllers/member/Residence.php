<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residence extends MemberController {

	function __construct() {
		parent::__construct();
		$this->load->model('MembershipsModel');
		$this->load->model('PackagesModel');
		$this->load->model('ResidencesModel');
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

	public function certificatepreview(){
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id')));
		if($memberShip->certificate==''){
			exit;
		}
		$certificateContent = unserialize($memberShip->certificate);
		$vars['certificate'] = (isset($certificateContent['certificate']) && $certificateContent['certificate']!='')?$certificateContent['certificate']:'';
		$vars['background'] = (isset($certificateContent['background']) && $certificateContent['background']!='')?$certificateContent['background']:'http://nbscha.com/public/common/images/certificate_bg.jpg';
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

	public function walletBgdatacertificatepreview(){
		$memberShip  = $this->MembershipsModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id')));
		if($memberShip->wallet_certificate==''){
			exit;
		}
		$certificateContent = unserialize($memberShip->wallet_certificate);
		$vars['certificate'] = (isset($certificateContent['certificate']) && $certificateContent['certificate']!='')?$certificateContent['certificate']:'';
		$vars['background'] = (isset($certificateContent['background']) && $certificateContent['background']!='')?$certificateContent['background']:'http://nbscha.com/public/common/images/certificate_bg.jpg';
		$content = $this->load->view(member_views_path('membership/certificate'),$vars, true);
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
					$this->dompdf_lib->convert_html_to_custom_pdf($certificate, $pdf_filename, 'TRUE','A4','landscape',$background);
				}
				return true;
			}else{
				return false;
			}
		}

	}

}
