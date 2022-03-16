<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menuitems extends ConsoleController {

	function __construct()
    {
		parent::__construct();
		$this->load->model('MenuModel');
		$this->load->model('MenuItemsModel');
		$this->load->model('PagesModel');
		$this->load->library('Menuhelper');
	}
		
	public function index()
	{
		redirect(admin_url_string('menuitems/overview'));	
	}
	
	public function overview($menuId,$lang='')
	{
		if($lang==''){
			$lang = $this->default_language;
		}
		$menuRow = $this->MenuModel->load($menuId);
		if(!$menuRow){
			redirect(admin_url_string('menus/overview'));
		}
		$menus = $this->MenuItemsModel->getMenuTree($menuId,'',$lang);
		$vars['language'] = $lang;
		$vars['menu_detail'] = $menuRow;
		$vars['languages'] = $this->LanguagesModel->getArrayCond(array('status'=>'1'));
		$vars['menus_list'] = $this->menuhelper->renderAdminMenuRows($menus,'',$lang);
		$this->mainvars['content']=$this->load->view(admin_url_string('menuitems/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add($menuId) {
		$menuRow=$this->MenuModel->load($menuId);
		if(!$menuRow){
			redirect(admin_url_string('menus/overview'));
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('class', 'Class', '');
		$this->form_validation->set_rules('link', 'Link', 'callback_link_check');
		$this->form_validation->set_rules('target_type', 'Target', '');
		$this->form_validation->set_rules('parent_id', 'Parent', 'required');
		$this->form_validation->set_rules('link_type', 'Link Type', 'required');
		$this->form_validation->set_rules('link_object', 'Link object', 'callback_linkobject_check');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$add['menu_detail'] = $menuRow;
			$add['pages'] = $this->PagesModel->getArrayCond(array('status'=>'1'));	
			$add['targettypes'] = $this->MenuItemsModel->getTargetTypes();
			$add['linktypes'] = $this->MenuItemsModel->getLinkTypes();
			$add['menus'] = $this->MenuItemsModel->getMenuTree($menuId);
			$this->mainvars['content'] = $this->load->view(admin_url_string('menuitems/add'), $add, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$maindata = array(
				'menu_id'=>$menuId,
				'parent_id'=>$this->input->post('parent_id'),
				'link_type'=>$this->input->post('link_type'),
				'link_object'=>$this->input->post('link_object'),
				'target_type'=>$this->input->post('target_type'),
				'sort_order'=>$this->input->post('sort_order'),
				'class'=>$this->input->post('class'),
				'status'=>$this->input->post('status')
			);
			$descdata = array(
				'name'=>$this->input->post('name'),
				'link'=>$this->input->post('link')
			);
			$insertrow=$this->MenuItemsModel->insert($maindata,$descdata);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Menu Item added successfully.'));
				redirect(admin_url_string('menuitems/overview/'.$menuId));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
                redirect(admin_url_string('menuitems/overview/'.$menuId));
			}
		}
	}

	function link_check($val) {
		if(in_array($this->input->post('link_type'),array('external','internal')) && $val=='') {
			$this->form_validation->set_message('link_check', 'Link cannot be empty');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function linkobject_check($val) {
		if(in_array($this->input->post('link_type'),array('pages')) && $val=='') {
			$this->form_validation->set_message('linkobject_check', 'Page cannot be empty');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function edit($menuId,$itemId,$lang){
		$menuRow=$this->MenuModel->load($menuId);
		$menuItemRow=$this->MenuItemsModel->getRowCond(array('id'=>$itemId,'language'=>$lang));
		if(!$menuRow || !$menuItemRow){
			redirect(admin_url_string('menus/overview'));
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('class', 'Class', '');
		$this->form_validation->set_rules('link', 'Link', 'callback_link_check');
		$this->form_validation->set_rules('target_type', 'Target', '');
		$this->form_validation->set_rules('parent_id', 'Parent', 'required');
		$this->form_validation->set_rules('link_type', 'Link Type', 'required');
		$this->form_validation->set_rules('link_object', 'Link object', 'callback_linkobject_check');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['lang'] = $lang;
			$edit['menu_detail'] = $menuRow;
			$edit['menu_item'] = $menuItemRow;
			$edit['pages'] = $this->PagesModel->getArrayCond(array('status'=>'1'));	
			$edit['targettypes'] = $this->MenuItemsModel->getTargetTypes();
			$edit['linktypes'] = $this->MenuItemsModel->getLinkTypes();
			$edit['menus'] = $this->MenuItemsModel->getMenuTree($menuId);
			$this->mainvars['content'] = $this->load->view(admin_url_string('menuitems/edit'), $edit, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$maindata = array(
				'menu_id'=>$menuId,
				'parent_id'=>$this->input->post('parent_id'),
				'link_type'=>$this->input->post('link_type'),
				'link_object'=>$this->input->post('link_object'),
				'target_type'=>$this->input->post('target_type'),
				'sort_order'=>$this->input->post('sort_order'),
				'class'=>$this->input->post('class'),
				'status'=>$this->input->post('status')
			);
			$descdata = array(
				'name'=>$this->input->post('name'),
				'link'=>$this->input->post('link'),
				'language'=> $lang
			);
			$cond = array('id'=>$itemId);
			$actionStatus=$this->MenuItemsModel->updateCond($maindata,$cond,$descdata);
			if ($actionStatus) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Menu Item edited successfully.'));
				redirect(admin_url_string('menuitems/overview/'.$menuId.'/'.$lang));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
                redirect(admin_url_string('menuitems/overview/'.$menuId.'/'.$lang));
			}
		}
	}
	
	function delete($menuId,$itemId)
	{
		$itemsCond=array('id'=>$itemId);
		$menuItemRow = $this->MenuItemsModel->load($itemId);
		$subData = array('parent_id'=>$menuItemRow->parent_id);
		$subCond = array('parent_id'=>$itemId);
		$this->MenuItemsModel->updateCond($subData,$subCond);
		$actionStatus=$this->MenuItemsModel->deleteCond($itemsCond);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Menu Item deleted Successfully.'));
			redirect(admin_url_string('menuitems/overview/'.$menuId));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('menuitems/overview/'.$menuId));
		}
	}
	
	function actions($menuId)
	{
		$menuRow = $this->MenuModel->load($menuId);
		if(!$menuRow){
			redirect(admin_url_string('menus/overview'));
		}
		$actionStatus=false;
		$ids=$this->input->post('id');
		$sort_orders=$this->input->post('sort_order');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='1';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='0';}
		if(isset($status) && isset($_POST['id'])){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$cond=array('id'=>$id);
				$actionStatus=$this->MenuItemsModel->updateCond($data,$cond);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
			if(count($sort_orders)>0){
				foreach($sort_orders as $id => $sort_order):
					$data=array('sort_order'=>$sort_order);
					$cond=array('id'=>$id);
					$actionStatus=$this->MenuItemsModel->updateCond($data,$cond);				
				endforeach;			
			}
		}
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Menu Item updated Successfully.'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
		}
		redirect(admin_url_string('menuitems/overview/'.$menuId));
	}
	
}