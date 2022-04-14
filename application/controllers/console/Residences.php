<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Residences extends ConsoleController {

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
		$newdata = array('residence_sort_field_filter','residence_sort_order_filter','residence_search_key_filter','residence_package_filter','residence_region_filter');
		$this->session->unset_userdata($newdata);
		redirect(admin_url_string('residences/overview'));
	}

	public function overview(){
		$cond = array();
		$like = array();

		$sort_direction = 'desc';
		$sort_field =  'residences.created';

		if($this->session->userdata('residence_package_filter')!=''){
			$cond['residences.package_id']= $this->session->userdata('residence_package_filter');
		}
		if($this->session->userdata('residence_region_filter')!=''){
			$cond['residences.region_id']= $this->session->userdata('residence_region_filter');
		}


		if($this->session->userdata('residence_search_key_filter')!=''){
			$like[] = array('field'=>'first_name', 'value' => $this->session->userdata('residence_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'last_name', 'value' => $this->session->userdata('residence_search_key_filter'),'location' => 'both');
			$like[] = array('field'=>'name', 'value' => $this->session->userdata('residence_search_key_filter'),'location' => 'both');
		}

		if($this->session->userdata('residence_sort_field_filter')!=''){
			$sort_field = $this->session->userdata('residence_sort_field_filter');
			$sort_direction = $this->session->userdata('residence_sort_order_filter');
		}
		$this->load->library('pagination');
		$config = $this->paginationConfig();
    $config['base_url'] = admin_url('residences/overview');
    $config['total_rows'] = $this->ResidencesModel->getConsolePaginationCount($cond, $like);
    $this->pagination->initialize($config);
		$vars['residences'] = $this->ResidencesModel->getConsolePagination($config['per_page'], $this->uri->segment($config['uri_segment']),$cond,$sort_field,$sort_direction,$like);
		$vars['sort_field'] = $sort_field;
    $vars['sort_direction'] = $sort_direction;
		$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
		$vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
		$this->mainvars['content']=$this->load->view(admin_url_string('residences/overview'),$vars,true);
		$this->mainvars['page_scripts'] = $this->load->view(admin_url_string('residences/script'),'',true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	 public function view($rId){
				$this->output->set_content_type('application/json');
				$language = $this->default_language;
				$residence = $this->ResidencesModel->getRowCond(array('id'=>$rId,'language'=>$language));
				$vars['residence'] = $residence;
				$vars['packages'] =$this->PackagesModel->getElementPair('pid','title','sort_order','asc',array('language'=>$this->default_language));
				$vars['regions'] =$this->RegionsModel->getElementPair('rid','region_name','sort_order','asc',array('language'=>$this->default_language));
				$vars['carelevels'] =$this->CarelevelsModel->getElementPair('cid','carelevel_title','sort_order','asc',array('language'=>$this->default_language));
				$vars['facilities'] =$this->FacilitiesModel->getElementPair('fid','facility_title','sort_order','asc',array('language'=>$this->default_language));
				$vars['features'] =$this->FeaturesModel->getElementPair('fid','feature_title','sort_order','asc',array('language'=>$this->default_language));
				$content = $this->load->view(admin_url_string('residences/details'),$vars, true);
				$results = array('content' => $content);
				$json=json_encode($results);
	 		 exit($json);
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
					 $cond=array('id'=>$id);
					 $actionStatus=$this->ResidencesModel->updateCond($data,$cond);
				 endforeach;
			 }

	 		if(isset($_POST['sort_field']) && $this->input->post('sort_field')!=''){
	 					$sortField = $this->input->post('sort_field');
	 					$newdata = array('residence_sort_field_filter'  => $sortField);

	 					if($this->session->userdata('residence_sort_order_filter')=='asc'){
	 						$newdata['residence_sort_order_filter'] = 'desc';
	 					} else{
	 						$newdata['residence_sort_order_filter'] = 'asc';
	 					}
	 					$this->session->set_userdata($newdata);
	 				}else{
	 					$newdata = array('residence_sort_order_filter','residence_sort_field_filter');
	 					$this->session->unset_userdata($newdata);
	 				}

	 		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
	 				$newdata = array('residence_sort_field_filter','residence_sort_order_filter','residence_search_key_filter','residence_package_filter','residence_region_filter');
	 				$this->session->unset_userdata($newdata);
	 		}

	 		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
	 				if($this->input->post('residence_search_key')!=''||$this->input->post('residence_package')!=''||$this->input->post('residence_region')!=''){
	 						$newdata = array(
	 								'residence_search_key_filter'  => $this->input->post('residence_search_key'),
	 								'residence_region_filter'  => $this->input->post('residence_region'),
	 								'residence_package_filter'  => $this->input->post('residence_package'));
	 						$this->session->set_userdata($newdata);
	 				} else {
	 					$newdata = array('residence_search_key_filter','residence_package_filter','residence_region_filter');
	 					$this->session->unset_userdata($newdata);
	 				}
	 		}

	 		redirect(admin_url_string('residences/overview'));
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
				 $vars['form'] = $this->load->view(admin_url_string('residences/edit_form'),$vars, true);
				 $content = $this->load->view(admin_url_string('residences/edit'),$vars, true);
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
					$this->form_validation->set_rules('virtual_tour', 'Virtual Tour', '');
					$this->form_validation->set_rules('comments', 'Comments', '');
					$this->form_validation->set_rules('facebook', 'Facebook', '');
					$this->form_validation->set_rules('instagram', 'Instagram', '');
					$this->form_validation->set_rules('twitter', 'Twitter', '');
					$this->form_validation->set_rules('youtube', 'Youtube', '');
					$this->form_validation->set_rules('linkedin', 'Linkedin', '');
					$this->form_validation->set_rules('website', 'website', '');
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
						$form = $this->load->view(admin_url_string('residences/edit_form'),$vars, true);
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
				 $content = $this->load->view(admin_url_string('residences/update_vacancy_form'),$vars, true);
				 $results = array('content' => $content);
				 $json=json_encode($results);
				 exit($json);
			 }

			 public function updatevacancysubmit(){
				 $language = $this->default_language;
					$rId = $this->input->post('id',TRUE);
					$residence = $this->ResidencesModel->getRowCond(array('id'=>$rId,'language'=>$language));
					$this->form_validation->set_rules('vacancy','New Vacancy','required|numeric|less_than_equal_to['.abs($residence->max_beds_count).']');
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

			 public function exporttoexcel(){
				 $cond = array();
 				$like = array();
				$packages =$this->PackagesModel->getElementPair('pid','title','','',array('language'=>$this->default_language));
				$regions=$this->RegionsModel->getElementPair('rid','region_name','','',array('language'=>$this->default_language));
				$carelevels =$this->CarelevelsModel->getElementPair('cid','carelevel_title','','',array('language'=>$this->default_language));
				$facilities =$this->FacilitiesModel->getElementPair('fid','facility_title','','',array('language'=>$this->default_language));
 				$sort_direction = 'desc';
 				$sort_field =  'residences.created';

 				if($this->session->userdata('residence_package_filter')!=''){
 					$cond['residences.package_id']= $this->session->userdata('residence_package_filter');
 				}
 				if($this->session->userdata('residence_region_filter')!=''){
 					$cond['residences.region_id']= $this->session->userdata('residence_region_filter');
 				}


 				if($this->session->userdata('residence_search_key_filter')!=''){
 					$like[] = array('field'=>'first_name', 'value' => $this->session->userdata('residence_search_key_filter'),'location' => 'both');
 					$like[] = array('field'=>'last_name', 'value' => $this->session->userdata('residence_search_key_filter'),'location' => 'both');
 					$like[] = array('field'=>'name', 'value' => $this->session->userdata('residence_search_key_filter'),'location' => 'both');
 				}

 				if($this->session->userdata('residence_sort_field_filter')!=''){
 					$sort_field = $this->session->userdata('residence_sort_field_filter');
 					$sort_direction = $this->session->userdata('residence_sort_order_filter');
 				}
			 	$residences = $this->ResidencesModel->getDetailArrayCond($cond,$like,$sort_field,$sort_direction);

			 	$spreadsheet = new Spreadsheet();
			 	$sheet = $spreadsheet->getActiveSheet();
			 	$sheet->setCellValue('A1', 'SL No.');
			 	$sheet->setCellValue('B1', 'RESIDENCE NAME');
			 	$sheet->setCellValue('C1', 'ADDRESS');
				$sheet->setCellValue('D1', 'REGION');
				$sheet->setCellValue('E1', 'CONTACT PERSON');
			 	$sheet->setCellValue('F1', 'RESIDENCE EMAIL');
			 	$sheet->setCellValue('G1', 'RESIDENCE PHONE');
			 	$sheet->setCellValue('H1', 'MEMBER NAME');
				$sheet->setCellValue('I1', 'MEMBER PHONE');
				$sheet->setCellValue('J1', 'MEMBER EMAIL');
				$sheet->setCellValue('K1', 'MEMBERHIP ID');
				$sheet->setCellValue('L1', 'ISSUED DATE');
				$sheet->setCellValue('M1', 'EXPIRY DATE');
				$sheet->setCellValue('N1', 'LEVEL OF CARE');
				$sheet->setCellValue('O1', 'FARMACY NAME');
				$sheet->setCellValue('P1', 'FACILITIES');
				$sheet->setCellValue('Q1', 'PACKAGE(BEDS)');
				$sheet->setCellValue('R1', 'VACANCY');
			 	$sheet->setCellValue('S1', 'STATUS');
			 	$sheet->setCellValue('T1', 'CREATED');
			 	$rows = 2;
			 	$i=0;
			 	$status = array('0' => 'Disabled','1' => 'Enabled');
			 	foreach ($residences as $val){
						$facilityArr = (explode(",",$val['facilities']));
						$facility ='';
						 $j=0; foreach ($facilityArr as $key => $value):

								if(isset($facilities[$value])){
									if($j!=0) $facility .= ', ';
									$facility .=  $facilities[$value];
								}
								$j++;
						endforeach;
			 			$sheet->setCellValue('A' . $rows, ++$i);
			 			$sheet->setCellValue('B' . $rows, $val['name']);
			 			$sheet->setCellValue('C' . $rows, $val['address'].', Postal Code:'.$val['postalcode']);
			 			$sheet->setCellValue('D' . $rows, $regions[$val['region_id']]);
			 			$sheet->setCellValue('E' . $rows, $val['contact_name']);
			 			$sheet->setCellValue('F' . $rows, $val['email']);
						$sheet->setCellValue('G' . $rows, $val['residence_phone']);
			 			$sheet->setCellValue('H' . $rows, $val['first_name'].' '.$val['last_name']);
			 			$sheet->setCellValue('I' . $rows, $val['member_phone']);
			 			$sheet->setCellValue('J' . $rows, $val['member_email']);
			 			$sheet->setCellValue('K' . $rows, $val['member_identifier']);
						$sheet->setCellValue('L' . $rows, date('M j, Y', strtotime($val['issue_date'])));
			 			$sheet->setCellValue('M' . $rows, date('M j, Y', strtotime($val['expiry_date'])));
			 			$sheet->setCellValue('N' . $rows, $carelevels[$val['level_id']]);
						$sheet->setCellValue('O' . $rows, $val['pharmacy_name']);
			 			$sheet->setCellValue('P' . $rows, $facility);
			 			$sheet->setCellValue('Q' . $rows, $packages[$val['package_id']]);
			 			$sheet->setCellValue('R' . $rows, $val['vacancy']);
			 			$sheet->setCellValue('S' . $rows, $status[$val['status']]);
						$sheet->setCellValue('T' . $rows, date('M j, Y', strtotime($val['created'])));
			 			$rows++;
			 	}
			 	$writer = new Xlsx($spreadsheet);
			 	$filename = 'nbscha-residences';
			 	header('Content-Type: application/vnd.ms-excel');
			 	header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
			 	header('Cache-Control: max-age=0');
			 	$writer->save('php://output'); // download file
			 }
}
