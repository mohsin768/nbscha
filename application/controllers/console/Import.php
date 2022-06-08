<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends ConsoleController {

	function __construct() {
		parent::__construct();
		$this->load->model('LiveMembersModel');
		$this->load->model('MemberHomesModel');
		$this->load->model('MembersModel');
		$this->load->library('certificatehelper');
	}

	public function index()
	{
		redirect(admin_url_string('home/dashboard'));
	}
	
	public function members()
	{
		/*
		$featuresMaster = array('charge_above_government'=> '28',
		'provide_transport' => '18',
		'allow_pet' =>'1',
		'allow_furniture' =>'2',
		'comfort_clothing_money' =>'3',
		'home_hairdressing' =>'4',
		'have_foot_care' =>'5',
		'staf_diabetes_insulin_train' =>'6',
		'staf_oxygen_thrapy_train' =>'7',
		'staf_colostomy_care_train' =>'8',
		'staf_wound_care_train' =>'9',
		'staf_dementia_care_train' =>'20',
		'accept_incontinent_urine' =>'10',
		'monitoring_sys_door' =>'21',
		'accept_mrsa_positve_client' =>'11',
		'have_experience_client_suffering_addictions' =>'22',
		'client_keep_physicians' =>'12',
		'have_practitioner_doc_nurse' =>'23',
		'relationship_extra_menual_nursing' =>'13',
		'provide_adaptive_equipment' =>'24',
		'provide_house_excursions' =>'14',
		'resident_outreach_attend_program'  =>'25',
		'resident_work_community' =>'15',
		'accommodate_special_diet' =>'26',
		'accessible_shower_wheelchair_person' =>'16',
		'have_outdoor_area' =>'27',
		'provide_reference_existing_client' =>'17',
		'accept_resident_incontinent' =>'29',
		'administering_medication_training_required' =>'19');
		$regions = array('Chaleur'=>'6','Fredericton'=>'3','Miramichi'=>'7','Moncton'=>'1','Restigouche'=>'5','Saint John'=>'2');
		$facilities = array('Seniors'=>'1','Mental Health'=>'2','Intellectual and Developmental'=>'3','Blended Facility'=>'4');
		$packages = array('1-20'=>'1','21-40'=>'2','41-60'=>'3','60+'=>'4');
		$levels = array('Level-2'=>'1','Level-3'=>'2','Level-3B'=>'3','Level-3G'=>'4','Level-4'=>'5');
		$liveMembers = $this->LiveMembersModel->getArrayCond(array('is_approve '=>'1'));
		foreach($liveMembers as $liveMember):
			$liveMemberId = $liveMember['id'];
			$memberHomesCount = $this->MemberHomesModel->getCountCond(array('spch_member_id '=>$liveMemberId));
			if($memberHomesCount=='1'){
				$memberHome = $this->MemberHomesModel->getRowCond(array('spch_member_id '=>$liveMemberId));
				if($memberHome){
					$this->load->helper('string');
					$salt = random_string('alnum', 6);
					$password = sha1($salt.$liveMember['mem_password'].$salt);
					$memberData = array('first_name' => $liveMember['mem_first_name'],
					'last_name' => $liveMember['mem_last_name'],
					'email' => $liveMember['mem_email'],
					'phone' => $liveMember['mem_phone'],
					'password' => $password,
					'salt' => $salt,
					'created' => date('Y-m-d H:i:s',strtotime($liveMember['created_at'])),
					'status' => '1');
					$memberId = $this->MembersModel->insert($memberData);
					if($memberId){
						$features = array();
						foreach($featuresMaster as $feature => $id):
							if(isset($memberHome->$feature) && $memberHome->$feature=='1'){
								$features[$id] = '1';
							}
						endforeach;	
						$facilitiesStr = trim($memberHome->spch_facility);
						$facilityNames = explode(',',$facilitiesStr);
						$facilityIds = array();
						foreach($facilityNames as $facilityName):
							if(isset($facilities[$facilityName])){
								$facilityIds[] = $facilities[$facilityName];
							}
						endforeach;
						$facilityId = implode(',',$facilityIds);
						$pacakgeName = trim($memberHome->spch_num_bed);
						$levelName = trim($memberHome->spch_level_care);
						$regionName = trim($memberHome->region);
						$packageId = (isset($packages[$pacakgeName]))?$packages[$pacakgeName]:'';
						$levelId = (isset($levels[$levelName]))?$levels[$levelName]:'';
						$regionId = (isset($regions[$regionName]))?$regions[$regionName]:'';
						$slug = $this->ResidencesModel->createSlug($memberHome->spch_name);
						$metaTitle = $memberHome->spch_name;
						$allowedBeds = $memberHome->num_open_beds;
						$vacancy = $memberHome->free_vacancy;
						$bedsCount = '0';
						$package =$this->PackagesModel->load($packageId);
						if($package)$bedsCount = $package->bed_count;
						$residencepData = array('slug' => $slug,
						'member_id' => $memberId,
						'address' => $memberHome->spch_address,
						'postalcode' => $memberHome->spch_postal_code,
						'contact_name' => $memberHome->spch_contact_name,
						'email' => $memberHome->spch_email,
						'phone' => $memberHome->spch_phone,
						'fax' => $memberHome-> spch_fax,
						'package_id' => $packageId,
						'level_id' => $levelId,
						'pharmacy_name' => $memberHome->spch_pharmacy_name,
						'facilities' => $facilityId,
						'region_id' => $regionId,
						'mainimage' => $memberHome->photo_url,
						'image2' => $memberHome->photo_url_two,
						'image3' => $memberHome->photo_url_three,
						'image4' => $memberHome->photo_url_four,
						'image5' => $memberHome->photo_url_five,
						'image6' => $memberHome->photo_url_six,
						'facebook' => $memberHome->fb_url,
						'instagram' => $memberHome->inst_url,
						'twitter' => $memberHome->twi_url,
						'youtube' => $memberHome->youtube_url,
						'linkedin' => $memberHome->linkdin_url,
						'website' => $memberHome->website_url,
						'features' => serialize($features),
						'beds_count' => $bedsCount,
						'max_beds_count' => $allowedBeds,
						'vacancy' => $vacancy,
						'created' => date('Y-m-d H:i:s',strtotime($memberHome->created_at)),
						'status' => $memberHome->status);
						$residenceDescData = array('name' => $memberHome->spch_name,
						'description' => $memberHome->public_description,
						'meta_title'=>$metaTitle,
						'language' => $this->default_language);
						$residenceId = $this->ResidencesModel->insert($residencepData,$residenceDescData);
					}
					if($memberId && $residenceId){
						$expiryDate = date('Y-m-d', strtotime('31 March 2023'));
						$membershipData = array('member_id' => $memberId,
						'residence_id' => $residenceId,
						'package_id' => $packageId,
						'issue_date' => date('Y-m-d H:i:s'),
						'expiry_date' => $expiryDate,
						'status' => '1');
						$membershipId = $this->MembershipsModel->insert($membershipData);
						if($membershipId){
							$membershipIdentifier = date('ymd').sprintf('%04d',$membershipId);
							$certificates = $this->certificatehelper->generateCertificates($membershipId);
							$certificate = '';
							if($certificates['main_certificate']) $certificate = serialize($certificates['main_certificate']);
							$wallet_certificate = '';
							if($certificates['wallet_certificate']) $wallet_certificate = serialize($certificates['wallet_certificate']);
							$this->MembershipsModel->updateCond(array('certificate'=>$certificate,'wallet_certificate'=>$wallet_certificate,'identifier'=>$membershipIdentifier),array('id'=>$membershipId));
						}
					}
				}
			}
		endforeach;
		*/
		$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Imported Successfully'));
		redirect(admin_url_string('home/dashboard'));
	}


	

}
