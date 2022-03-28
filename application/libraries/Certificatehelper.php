<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificatehelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();
        $this->CI->load->model('PackagesModel');
        $this->CI->load->model('MembersModel');
		$this->CI->load->model('MembershipsModel');
		$this->CI->load->model('ResidencesModel');
		$this->CI->load->model('CertificatetemplatesModel');

	}

    function generateCertificates($membershipId,$language=''){
        if($language==''){
            $language = $this->CI->default_language;
        }
        $memberShip  = $this->CI->MembershipsModel->load($membershipId);
        $memberId = $memberShip->member_id;
        $residenceId = $memberShip->residence_id;
        $packageId = $memberShip->package_id;
        $member = $this->CI->MembersModel->load($memberId);
        $residence = $this->CI->ResidencesModel->getRowCond(array('id'=>$residenceId,'language'=>$language));
        $package = $this->CI->PackagesModel->getRowCond(array('pid'=>$packageId,'language'=>$language));

        $certificateContent = array('main_certificate'=>array(),'wallet_certificate'=>array());
        $certificateTemplateId = $package->certificate_template;
        $certificateTemplate = $this->CI->CertificatetemplatesModel->getRowCond(array('id'=>$certificateTemplateId,'language'=>$language));

        $certificate = $certificateTemplate->template;
        $walletCertificate = $certificateTemplate->wallet_template;
        $residenceName = $residence->name;
        $certificateDate = $memberShip->issue_date;
        $expiryDate= $memberShip->expiry_date;
        $certificateSignature = '';
        if($certificateTemplate->signature!='')$certificateSignature = '<img src="'.base_url('public/uploads/certificates/'.$certificateTemplate->signature).'" style="max-width:100%" />';
        $signatory = $certificateTemplate->signatory;
        $background = '';
        $walletBackground = '';
        if($certificateTemplate->background!='') $background = base_url('public/uploads/certificates/'.$certificateTemplate->background);
        if($certificateTemplate->wallet_bg!='') $walletBackground = base_url('public/uploads/certificates/'.$certificateTemplate->wallet_bg);

        $replacements = array('{{residence}}'=>$residenceName,
                                                    '{{identifier}}'=>$memberShip->identifier,
                                                    '{{signature}}'=>$certificateSignature,
                                                    '{{signatory}}'=>$signatory,
                                                    '{{date}}'=>$certificateDate,
                                                    '{{expiry}}'=>$expiryDate);
        if($certificate!=''){
            $certificate = strtr($certificate,$replacements);
            $certificateContent['main_certificate'] = array('certificate'=>$certificate,'background'=>$background);
        }
        if($walletCertificate!=''){
            $walletCertificate = strtr($walletCertificate,$replacements);
            $certificateContent['wallet_certificate'] = array('certificate'=>$walletCertificate,'background'=>$background);
        }

        return $certificateContent;

    }
}