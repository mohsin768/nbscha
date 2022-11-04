<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residences extends MemberController {

	function __construct() {
		parent::__construct();
		$this->load->model('MembershipsModel');
		$this->load->model('PackagesModel');
		$this->load->model('ResidencesModel');
		$this->load->model('PackagesModel');
		$this->load->model('RegionsModel');
		$this->load->model('FeaturesModel');
		$this->load->model('FacilitiesModel');
		$this->load->model('CarelevelsModel');
		$this->load->model('HomeLanguagesModel');
	}

	public function index()
	{
		$this->mainvars['content']=$this->load->view(member_views_path('residence/overview'),'',true);
		$this->mainvars['page_scripts'] = $this->load->view(member_views_path('residence/script'),'',true);
		$this->load->view(member_views_path('main'),$this->mainvars);

	}

	public function loadsummary(){
		$language = $this->default_language;
		$residence = $this->ResidencesModel->getRowCond(array('member_id'=>$this->session->userdata('member_user_id'),'language'=>$language));
		if(!$residence){
			exit;
		}
		$vars['residence'] = $residence;
		$content = $this->load->view(member_views_path('residence/summary'),$vars, true);
		$results = array('content' => $content);
		$json=json_encode($results);
		exit($json);
	}

	public function edittranslate($id, $lang, $translate='')
	{
		$this->ckeditorCall();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
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
			$vars['residence']= $this->ResidencesModel->getRowCond(array('id'=>$id,'language'=>$langCond));
			$this->mainvars['content'] = $this->load->view(member_views_path('residence/edit-translate'), $vars,true);
			$this->load->view(member_views_path('main'), $this->mainvars);

		} else {
			$maindata = array();
			$descdata = array(
				'residence_id' => $id,
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'language' => $this->input->post('language'));
				$cond = array('id'=>$id);
				if($translate=='translate'){
					$updaterow = $this->ResidencesModel->addTranslate($maindata,$cond,$descdata);
				}else{
					$updaterow = $this->ResidencesModel->updateCond($maindata,$cond,$descdata);
				}

			if($updaterow){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Updated Successfully.'));
				redirect(member_url_string('residences'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(member_url_string('residences'));
			}
		}
	}


	public function translates($id)
	{
		$cond = array('id'=>$id);
		$vars['translates'] = $this->ResidencesModel->getTranslates($cond);
		$vars['residence_id'] = $id;
		$this->mainvars['content']=$this->load->view(member_views_path('residence/translates'),$vars,true);
		$this->load->view(member_views_path('main'),$this->mainvars);
	}

	public function edit($rId){
			 $this->output->set_content_type('application/json');
			 $language = $this->default_language;
			 $residence = $this->ResidencesModel->getRowCond(array('id'=>$rId,'language'=>$language));
			 $vars['residence'] = $residence;
			 $vars['homeLanguages'] = $this->HomeLanguagesModel->getIdPair();
			 $vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
			 $vars['carelevels'] =$this->CarelevelsModel->getElementPair('cid','carelevel_title','sort_order','asc',array('language'=>$this->default_language));
			 $vars['facilities'] =$this->FacilitiesModel->getElementPair('fid','facility_title','sort_order','asc',array('language'=>$this->default_language));
			 $vars['features'] =$this->FeaturesModel->getElementPair('fid','feature_title','sort_order','asc',array('language'=>$this->default_language));
			 $vars['form'] = $this->load->view(member_views_path('residence/edit_form'),$vars, true);
			 $content = $this->load->view(member_views_path('residence/edit'),$vars, true);
			 $results = array('content' => $content);
			 $json=json_encode($results);
			 exit($json);
		 }

		 public function editsubmit(){
			 $language = $this->default_language;
				$rId = $this->input->post('id',TRUE);
				$residence = $this->ResidencesModel->getRowCond(array('id'=>$rId,'language'=>$language));

				$this->form_validation->set_rules('name', 'Home Name', 'required');
				$this->form_validation->set_rules('address', 'Home Address', 'required');
				$this->form_validation->set_rules('postalcode', 'Home Postal Code', 'required');
				$this->form_validation->set_rules('contact_name', 'Contact Name', 'required');
				$this->form_validation->set_rules('email', 'Home Email', 'required|valid_email');
				$this->form_validation->set_rules('phone', 'Home Phone', 'required');
				$this->form_validation->set_rules('fax', 'Home Fax', '');
				$this->form_validation->set_rules('max_beds_count', 'Maximum Licensed Beds', 'required|callback_package_count_check');
				$this->form_validation->set_rules('language_id', 'Language', 'required');
				$this->form_validation->set_rules('level_id', 'Level', 'required');
				$this->form_validation->set_rules('pharmacy_name', 'Pharmacy Name', 'required');
				$this->form_validation->set_rules('facilities[]', 'Facilities', 'required');
				$this->form_validation->set_rules('region_id', 'Region', 'required');
				$this->form_validation->set_rules('description', 'Description', '');
				$this->form_validation->set_rules('comments', 'Comments', '');
				$this->form_validation->set_rules('virtual_tour', 'Virtual Tour', 'callback_valid_url_check');
				$this->form_validation->set_rules('facebook', 'Facebook', 'callback_valid_url_check');
				$this->form_validation->set_rules('instagram', 'Instagram', 'callback_valid_url_check');
				$this->form_validation->set_rules('twitter', 'Twitter', 'callback_valid_url_check');
				$this->form_validation->set_rules('youtube', 'Youtube', 'callback_valid_url_check');
				$this->form_validation->set_rules('linkedin', 'Linkedin', 'callback_valid_url_check');
				$this->form_validation->set_rules('website', 'website', 'callback_valid_url_check');
				$this->form_validation->set_rules('features', 'Features', '');
				$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
				if($this->form_validation->run() == FALSE)
				{
					$vars['residence'] = $residence;
					$vars['homeLanguages'] = $this->HomeLanguagesModel->getIdPair();
					$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
	 			 $vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
	 			 $vars['carelevels'] =$this->CarelevelsModel->getElementPair('cid','carelevel_title','sort_order','asc',array('language'=>$this->default_language));
	 			 $vars['facilities'] =$this->FacilitiesModel->getElementPair('fid','facility_title','sort_order','asc',array('language'=>$this->default_language));
	 			 $vars['features'] =$this->FeaturesModel->getElementPair('fid','feature_title','sort_order','asc',array('language'=>$this->default_language));
					$form = $this->load->view(member_views_path('residence/edit_form'),$vars, true);
				  $results = array('status' => '0', 'data' => $form );
				} else {
					$facilities = $this->input->post('facilities');
					if(is_array($facilities)){
						$facilities = implode(',',$facilities);
					}
					$features = $this->input->post('features');
					if(is_array($features)){
						$features = serialize($features);
					}
					$residencepData = array('address' => $this->input->post('address'),
						'postalcode' => $this->input->post('postalcode'),
						'contact_name' => $this->input->post('contact_name'),
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
						'fax' => $this->input->post('fax'),
						'max_beds_count' => $this->input->post('max_beds_count'),
						'language_id' => $this->input->post('language_id'),
						'level_id' => $this->input->post('level_id'),
						'pharmacy_name' => $this->input->post('pharmacy_name'),
						'region_id' => $this->input->post('region_id'),
						'facilities' => $facilities,
						'features' => $features,
						'virtual_tour' => $this->input->post('virtual_tour'),
						'facebook' => $this->input->post('facebook'),
						'instagram' => $this->input->post('instagram'),
						'twitter' => $this->input->post('twitter'),
						'youtube' => $this->input->post('youtube'),
						'linkedin' => $this->input->post('linkedin'),
						'website' => $this->input->post('website'));

						$imageConfig['encrypt_name'] = TRUE;
						$imageConfig['upload_path'] = 'public/uploads/requests/images';
						$imageConfig['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
						$this->load->library('upload', $imageConfig);
						$this->upload->initialize($imageConfig);
						if($this->upload->do_upload('mainimage'))
						{
							$mainimageData=$this->upload->data();
							$residencepData['mainimage']=$mainimageData['file_name'];
						}
						$this->upload->initialize($imageConfig);
						if($this->upload->do_upload('image2'))
						{
							$image2Data=$this->upload->data();
							$residencepData['image2']=$image2Data['file_name'];
						}
						$this->upload->initialize($imageConfig);
						if($this->upload->do_upload('image3'))
						{
							$image3Data=$this->upload->data();
							$residencepData['image3']=$image3Data['file_name'];
						}
						$this->upload->initialize($imageConfig);
						if($this->upload->do_upload('image4'))
						{
							$image4Data=$this->upload->data();
							$residencepData['image4']=$image4Data['file_name'];
						}
						$this->upload->initialize($imageConfig);
						if($this->upload->do_upload('image5'))
						{
							$image5Data=$this->upload->data();
							$residencepData['image5']=$image5Data['file_name'];
						}
						$this->upload->initialize($imageConfig);
						if($this->upload->do_upload('image6'))
						{
							$image6Data=$this->upload->data();
							$residencepData['image6']=$image6Data['file_name'];
						}

						$residenceDescData = array('name' => $this->input->post('name'),
						'description' => $this->input->post('description'),
						'language' => $this->default_language);
						$this->ResidencesModel->insert($residencepData,$residenceDescData);

				 $this->ResidencesModel->updateCond($residencepData,array('id'=>$rId),$residenceDescData);


				$results = array('status' => '1', 'data' => 'Residence Details Updated Successfully');
				}
				$json=json_encode($results);
				exit($json);
		 }

		 function valid_url_check($url){
			$error = false;
			if($url!=''){
				$path = parse_url($url, PHP_URL_PATH);
				$encoded_path = array_map('urlencode', explode('/', $path));
				$url = str_replace($path, implode('/', $encoded_path), $url);
				if(!filter_var($url, FILTER_VALIDATE_URL)){
					$error = true;
				}
			}
			if($error){
				$this->form_validation->set_message('valid_url_check', 'Invalid URL');
				return FALSE;
			} else {
				return TRUE;
			}
		 }

		 function package_count_check($maxbadscount) {
			$residenceId = secureInput($this->input->post('id'));
			$residenceInfo = $this->ResidencesModel->load($residenceId);
			$packageId = $residenceInfo->package_id;
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

	public function updatevacancy($rId){
			 $this->output->set_content_type('application/json');
			 $language = $this->default_language;
			 $residence = $this->ResidencesModel->getRowCond(array('id'=>$rId,'language'=>$language));
			 $vars['residence'] = $residence;
			 $content = $this->load->view(member_views_path('residence/update_vacancy_form'),$vars, true);
			 $results = array('content' => $content);
			 $json=json_encode($results);
			 exit($json);
		 }

		 public function updatevacancysubmit(){
			 $language = $this->default_language;
				$rId = $this->input->post('id',TRUE);
				$residence = $this->ResidencesModel->getRowCond(array('id'=>$rId,'language'=>$language));
				$this->form_validation->set_rules('vacancy','New Vacancy','required|numeric|greater_than[0]|less_than_equal_to['.abs($residence->max_beds_count).']');
				if($this->form_validation->run() == FALSE)
				{
				  $results = array('status' => '0', 'data' => validation_errors('<span class="error">', '</span>'));
				} else {

				 $this->ResidencesModel->updateCond(array('vacancy'=>$this->input->post('vacancy',TRUE)),array('id'=>$rId));


				$results = array('status' => '1', 'data' => 'Residence Vacancy Updated Successfully');
				}
				$json=json_encode($results);
				exit($json);
		 }


		 public function viewdetails($rId){
					$this->output->set_content_type('application/json');
					$language = $this->default_language;
					$residence = $this->ResidencesModel->getRowCond(array('id'=>$rId,'language'=>$language));
					$vars['residence'] = $residence;
					$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
					$vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
					$vars['carelevels'] =$this->CarelevelsModel->getElementPair('cid','carelevel_title','sort_order','asc',array('language'=>$this->default_language));
					$vars['facilities'] =$this->FacilitiesModel->getElementPair('fid','facility_title','sort_order','asc',array('language'=>$this->default_language));
					$vars['features'] =$this->FeaturesModel->getElementPair('fid','feature_title','sort_order','asc',array('language'=>$this->default_language));
					$content = $this->load->view(member_views_path('residence/details'),$vars, true);
					$results = array('content' => $content);
					$json=json_encode($results);
		 		 exit($json);
		 	 }

}
