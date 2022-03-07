<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menuhelper {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();
    $this->CI->load->model('MenuModel');
    $this->CI->load->model('MenuItemsModel');
    $this->CI->load->model('PagesModel');
	}

	function renderAdminMenuRows($menus,$intent='0'){
    $menuRows = '';
    $intent++;
    foreach($menus as $menu):
      $vars['menu'] = $menu;
      $vars['intent'] = $intent;
      $menuRows .= $this->CI->load->view(admin_views_path('menuitems/menurow'),$vars,TRUE);
      if(isset($menu['submenu']) && count($menu['submenu'])>0){
        $menuRows .= $this->renderAdminMenuRows($menu['submenu'],$intent);
      }
    endforeach;
    return $menuRows;
  }

  function getProcessedMenu($menu){
    $processMenuItems = array();
    $menuRow = $this->CI->MenuModel->getRowCond(array('code'=>$menu));
    if($menuRow){
      $menuItems = $this->CI->MenuItemsModel->getActiveMenuTree($menuRow->id);

      $processMenuItems = $this->processMenuItems($menuItems);
    }
    return $processMenuItems;
  }

  function processMenuItems($menuItems,$level = '0'){
    $processedMenuItems = array();
    foreach($menuItems as $menuItem):
      $url = '';
      $status = $this->processCurrentMenu($menuItem);
      if($menuItem['link_type']=='external'){
        $url = $menuItem['link'];
      }
      if($menuItem['link_type']=='internal'){
        $url = site_url($menuItem['link']);
      }
      if($menuItem['link_type']=='pages'){
        $pageRow = $this->CI->PagesModel->load($menuItem['link_object']);
        if($pageRow){
          $url = site_url($pageRow->slug);
        }
      }
      $submenu = array();
      if(isset($menuItem['submenu']) && count($menuItem['submenu'])>0){
        $level++;
        $submenu = $this->processMenuItems($menuItem['submenu'],$level);
      }
      $processedMenuItem = array(
        'name'=>$menuItem['name'],
        'url'=>$url,
        'status' =>$status,
        'level' => $level,
        'submenu' => $submenu
      );
      $processedMenuItems[] = $processedMenuItem;
    endforeach;
    return $processedMenuItems;
  }

  function processCurrentMenu($menuItem){
    $currentStatus = '';
    $currentURL = current_url();
    $url = '';
    if($menuItem['link_type']=='internal'){
      $url = site_url($menuItem['link']);
    }
    if($menuItem['link_type']=='pages'){
      $pageRow = $this->CI->PagesModel->load($menuItem['link_object']);
      if($pageRow){
        $url = site_url($pageRow->slug);
      }
    }
    if($url == $currentURL){
      $currentStatus = 'active';
    }
    return $currentStatus;
  }
}
