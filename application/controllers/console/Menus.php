<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menus extends ConsoleController {

	function __construct()
    {
		parent::__construct();
		$this->load->model('MenuModel');
		$this->load->model('MenuItemsModel');	
	}
		
	public function index()
	{
		redirect(admin_url_string('menus/overview'));	
	}
	
	public function overview()
	{
		$this->load->library('pagination');
		$config = $this->paginationConfig();
        $config['base_url'] = admin_url('menus/overview');
        $config['total_rows'] = $this->MenuModel->getPaginationCount();
        $this->pagination->initialize($config);
		$vars['menus'] = $this->MenuModel->getPagination($config['per_page'], $this->uri->segment($config['uri_segment']));
		$this->mainvars['content']=$this->load->view(admin_url_string('menus/overview'),$vars,true);
		$this->load->view(admin_url_string('main'),$this->mainvars);
	}

	function add() {
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('class', 'Class', '');
		$this->form_validation->set_rules('code', 'Code', 'required|callback_menucode_exists');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$this->mainvars['content'] = $this->load->view(admin_url_string('menus/add'), '', true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data=array(
				'name'=>$this->input->post('name'),
				'class'=>$this->input->post('class'),
				'code'=>$this->input->post('code'),
				'status'=>$this->input->post('status')
			);
			$insertrow = $this->MenuModel->insert($data);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Menu added successfully.'));
				redirect(admin_url_string('menus/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
                redirect(admin_url_string('menus/overview'));
			}
		}
	}
	function menucode_exists($val) {
		if($this->input->post('id')){
			$cond = array('id !=' => $this->input->post('id'), 'code' => $val);
		} else {
			$cond = array('code' => $val);
		}
		if($this->MenuModel->rowExists($cond)) {
			$this->form_validation->set_message('menucode_exists', 'Code - '. $val .' - already exists!!');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function edit($id){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('class', 'Class', '');
		$this->form_validation->set_rules('code', 'Code', 'required|callback_menucode_exists');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="validation-error red">(', ')</span>');
		if ($this->form_validation->run() == FALSE) {
			$vars['menu'] =$this->MenuModel->load($id);
			$this->mainvars['content'] = $this->load->view(admin_url_string('menus/edit'), $vars, true);
			$this->load->view(admin_url_string('main'), $this->mainvars);
		} else {
			$data=array(
				'name'=>$this->input->post('name'),
				'class'=>$this->input->post('class'),
				'code'=>$this->input->post('code'),
				'status'=>$this->input->post('status')
			);
			$cond=array('id'=>$id);
			$insertrow = $this->MenuModel->updateCond($data,$cond);
			if ($insertrow) {
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Menu edited successfully.'));
				redirect(admin_url_string('menus/overview'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
				redirect(admin_url_string('menus/overview'));
			}
		}
	}
	
	function delete($id)
	{
		$cond=array('id'=>$id);
		$itemsCond=array('menu_id'=>$id);
		$this->MenuItemsModel->deleteCond($itemsCond);
		$actionStatus=$this->MenuModel->deleteCond($cond);
		if($actionStatus){
			$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Menu deleted Successfully.'));
			redirect(admin_url_string('menus/overview'));
		} else {
			$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			redirect(admin_url_string('menus/overview'));
		}
	}
	
	function actions()
	{
		$ids=$this->input->post('id');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='1';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='0';}
		if(count($ids)>0){
			foreach($ids as $id):
				$data = array('status'=>$status);
				$actionStatus=$this->MenuModel->updateCond($data,array('id' => $id));				
			endforeach;
			if($actionStatus){
				$this->session->set_flashdata('message', array('status'=>'alert-success','message'=>'Menu updated Successfully.'));
			} else {
				$this->session->set_flashdata('message', array('status'=>'alert-danger','message'=>'Error! - Failed.'));
			}
		}
		redirect(admin_url_string('menus/overview'));
	}
	
	public function menuitems($id)
	{
		$menucond=array('menu_id'=>$id,'parent_id'=>'0');
		$main['page_title']=$this->config->item('site_name').' - Menus';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$content['menudetail']=$this->menu_model->load($id);
		$content['menus']=$this->render_menuitems_lists($menucond);
		$main['content']=$this->load->view('admin/menus/menuitems',$content,true);
		$this->load->view('admin/main',$main);
	}
	
	function menuitemadd($id)
	{
		$menudetail=$this->menu_model->load($id);
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('class', 'Class', '');
		$this->form_validation->set_rules('link', 'Link', '');
		$this->form_validation->set_rules('show_subitems', 'Sub items', '');
		$this->form_validation->set_rules('target_type', 'Target', '');
		$this->form_validation->set_rules('parent_id', 'Parent', '');
		$this->form_validation->set_rules('link_type', 'Link Type', '');
		$this->form_validation->set_rules('link_object', 'Link object', '');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Menus';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$add['menudetail']=$menudetail;			
			$add['targettypes']=$this->menuitems_model->get_target_types();
			$add['linktypes']=$this->menuitems_model->get_link_types();
			$add['parentmenus']=$this->get_menu_tree($id);
			$main['content']=$this->load->view('admin/menus/addmenuitem',$add,true);
			$this->load->view('admin/main',$main);
		} else {
			$attachment='';
			$config['upload_path'] = 'public/uploads/menus';
			$config['allowed_types'] = 'docx|doc|pdf|rtf|txt';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('attachment'))
			{
				$attachmentdata=$this->upload->data();
				$attachment=$attachmentdata['file_name'];
			}
			$maindata=array('menu_id'=>$id,'parent_id'=>$this->input->post('parent_id'),'link_type'=>$this->input->post('link_type'),'link_object'=>$this->input->post('link_object'),'show_subitems'=>$this->input->post('show_subitems'),'target_type'=>$this->input->post('target_type'),'sort_order'=>$this->input->post('sort_order'));
			$descdata=array('class'=>$this->input->post('class'),'name'=>$this->input->post('name'),'attachment'=>$attachment,'link'=>$this->input->post('link'),'status'=>$this->input->post('status'));
			$insertid=$this->menuitems_model->insert($maindata,$descdata);
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Menu Item added Successfully.</p></div>');
				redirect('admin/menus/menuitems/'.$id);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Menu Item not added.</p></div>');
				redirect('admin/menus/menuitems/'.$id);
			}
		}
	}
	
	function menuitemedit($id,$itemid)
	{
		$menudetail=$this->menu_model->load($id);
		$menuitemdetail=$this->menuitems_model->load($itemid);
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('class', 'Class', '');
		$this->form_validation->set_rules('link', 'Link', '');
		$this->form_validation->set_rules('show_subitems', 'Sub items', '');
		$this->form_validation->set_rules('target_type', 'Target', '');
		$this->form_validation->set_rules('parent_id', 'Parent', '');
		$this->form_validation->set_rules('link_type', 'Link Type', '');
		$this->form_validation->set_rules('link_object', 'Link object', '');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Menus';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['menudetail']=$menudetail;
			$edit['menuitemdetail']=$menuitemdetail;		
			$edit['targettypes']=$this->menuitems_model->get_target_types();
			$edit['linktypes']=$this->menuitems_model->get_link_types();
			$edit['parentmenus']=$this->get_menu_tree($id,'0',$menuitemdetail->parent_id);
			$main['content']=$this->load->view('admin/menus/editmenuitem',$edit,true);
			$this->load->view('admin/main',$main);
		} else {			
			$maindata=array('menu_id'=>$id,'parent_id'=>$this->input->post('parent_id'),'link_type'=>$this->input->post('link_type'),'link_object'=>$this->input->post('link_object'),'show_subitems'=>$this->input->post('show_subitems'),'target_type'=>$this->input->post('target_type'),'sort_order'=>$this->input->post('sort_order'));
			$descdata=array('class'=>$this->input->post('class'),'name'=>$this->input->post('name'),'link'=>$this->input->post('link'),'status'=>$this->input->post('status'));
			$config['upload_path'] = 'public/uploads/menus';
			$config['allowed_types'] = 'docx|doc|pdf|rtf|txt';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('attachment'))
			{
				$attachmentdata=$this->upload->data();
				$descdata['attachment']=$attachmentdata['file_name'];
			}
			$insertid=$this->menuitems_model->update($maindata,$descdata,$itemid);
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Menu Item updated Successfully.</p></div>');
				redirect('admin/menus/menuitems/'.$id);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Menu Item not updated.</p></div>');
				redirect('admin/menus/menuitems/'.$id);
			}
		}
	}
	
	function menuitemactions($menuid)
	{
		$loginid=false;
		$ids=$this->input->post('id');
		$sort_orders=$this->input->post('sort_order');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}
		if(isset($status) && isset($_POST['id'])){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$loginid=$this->menuitems_model->update_status($data,$id);				
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
		if(count($sort_orders)>0){
			foreach($sort_orders as $id => $sort_order):
				$data=array('sort_order'=>$sort_order);
				$loginid=$this->menuitems_model->update($data,array(),$id);				
			endforeach;			
		}
		}
		if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Menu item updated Successfully.</p></div>');
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Menu item not updated.</p></div>');
		}
		redirect('admin/menus/menuitems/'.$menuid.'/'.$this->input->post('return'));
	}
	
	function getlinkto()
	{
		$linktype=$this->input->post('link_id');
		if($linktype==''){
			$finalarr=array();
		} else {
			$this->load->model('accounts_model');
			$this->load->model('platforms_model');
			$this->load->model('products_model');
			$this->load->model('contents_model');
			$this->load->model('contentcategory_model');
			$this->load->model('downloads_model');
			$linktypes=array();
			$linktypes['downloads']=$this->downloads_model->get_idpair();
			$linktypes['account']=$this->accounts_model->get_idpair();
			$linktypes['platforms']=$this->platforms_model->get_idpair();
			$linktypes['products']=$this->products_model->get_idpair();
			$linktypes['contents']=$this->contents_model->get_idpair();
			$linktypes['contentlist']=$this->contentcategory_model->get_idpair();
			$linktypes['external']=array();
			$linktypes['internal']=array();
			$linktypes['attachments']=array();
			$intial=array('0'=>'Select');
			$finalarr=$linktypes[$linktype];
			$finalarr=$intial+$finalarr;
		}
		header('Content-Type: application/x-json; charset=utf-8');
      	echo(json_encode($finalarr));
	}
	
}