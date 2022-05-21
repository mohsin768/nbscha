<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminMenuModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'admin_menu';
        $this->primary_key = 'id';
    }
    function getMenu($currentUrl = '') {
        if($this->session->userdata('admin_user_role')!='1'){
            return $this->getUserMenu($currentUrl);
        } else {
            return $this->getSuperMenu($currentUrl);
        }
    }
    function getUserMenu($currentUrl = '') {
      $role_id = $this->session->userdata('admin_user_role');
    $menu = array();
    $this->db->where('admin_menu.status', 'Y');
    $this->db->where('admin_menu.parent_id', '0');
    $this->db->where('admin_menu_permission.role_id', $role_id);
    $this->db->order_by('admin_menu.sort_order', 'ASC');
    $this->db->from($this->table_name);
    $this->db->join('admin_menu_permission','admin_menu_permission.menu_id = admin_menu.id');
    $query = $this->db->get();
    $main_menus = $query->result_array();
    foreach ($main_menus as $main_menu):
        $this->db->where('admin_menu.status', 'Y');
        $this->db->where('admin_menu.parent_id', $main_menu['id']);
        $this->db->where('admin_menu_permission.role_id', $role_id);
        $this->db->order_by('admin_menu.sort_order', 'ASC');
        $this->db->from($this->table_name);
        $this->db->join('admin_menu_permission','admin_menu_permission.menu_id = admin_menu.id');
        $query = $this->db->get();
        $sub_menus = $query->result_array();
        $submenu = array();
        foreach ($sub_menus as $sub_menu):
            $this->db->where('admin_menu.status', 'Y');
            $this->db->where('admin_menu.parent_id', $sub_menu['id']);
            $this->db->where('admin_menu_permission.role_id', $role_id);
            $this->db->order_by('admin_menu.sort_order', 'ASC');
            $this->db->from($this->table_name);
            $this->db->join('admin_menu_permission','admin_menu_permission.menu_id = admin_menu.id');
            $query = $this->db->get();
            $subsub_menus = $query->result_array();
            $active = false;
            $currentUrlSegements = explode('/',strtolower($currentUrl));
            $currentMenuSegements = explode('/',strtolower($sub_menu['link']));
            if(isset($currentUrlSegements[1]) && isset($currentMenuSegements[0])){
                if($currentUrlSegements[1] == $currentMenuSegements[0]){
                    $active = true;
                }
            }
            $submenu[] = array(
                'id' => $sub_menu['id'],
                'name' => $sub_menu['name'],
                'class' => $sub_menu['class'],
                'link' => $sub_menu['link'],
                'display' => $sub_menu['display'],
                'subsub_menu' => $subsub_menus,
                'active' => $active
            );
        endforeach;
        $menu[] = array(
            'id' => $main_menu['id'],
            'name' => $main_menu['name'],
            'class' => $main_menu['class'],
            'link' => $main_menu['link'],
            'display' => $main_menu['display'],
            'sub_menu' => $submenu
        );
    endforeach;
    return $menu;
    }
    function getSuperMenu($currentUrl = '') {
      $menu = array();
      $this->db->where('status', 'Y');
      $this->db->where('parent_id', '0');
      $this->db->order_by('sort_order', 'ASC');
      $query = $this->db->get($this->table_name);
      $main_menus = $query->result_array();
      foreach ($main_menus as $main_menu):
          $this->db->where('status', 'Y');
          $this->db->where('parent_id', $main_menu['id']);
          $this->db->order_by('sort_order', 'ASC');
          $query = $this->db->get($this->table_name);
          $sub_menus = $query->result_array();
          $submenu = array();
          foreach ($sub_menus as $sub_menu):
              $this->db->where('status', 'Y');
              $this->db->where('parent_id', $sub_menu['id']);
              $this->db->order_by('sort_order', 'ASC');
              $query = $this->db->get($this->table_name);
              $subsub_menus = $query->result_array();
              $active = false;
              $currentUrlSegements = explode('/',strtolower($currentUrl));
              $currentMenuSegements = explode('/',strtolower($sub_menu['link']));
              if(isset($currentUrlSegements[1]) && isset($currentMenuSegements[0])){
                if(isset($currentUrlSegements[1])&& ($currentUrlSegements[1] == $currentMenuSegements[0])){
                    $active = true;
                }
              }
              $submenu[] = array(
                  'id' => $sub_menu['id'],
                  'name' => $sub_menu['name'],
                  'class' => $sub_menu['class'],
                  'display' => $sub_menu['display'],
                  'link' => $sub_menu['link'],
                  'subsub_menu' => $subsub_menus,
                  'active' => $active
              );
          endforeach;
          $menu[] = array(
              'id' => $main_menu['id'],
              'name' => $main_menu['name'],
              'class' => $main_menu['class'],
              'display' => $main_menu['display'],
              'link' => $main_menu['link'],
              'sub_menu' => $submenu
          );
      endforeach;
      return $menu;
    }
    function getFullMenu($currentUrl = '') {
      $menu = array();
      $this->db->where('parent_id', '0');
      $this->db->order_by('sort_order', 'ASC');
      $query = $this->db->get($this->table_name);
      $main_menus = $query->result_array();
      foreach ($main_menus as $main_menu):
          $this->db->where('parent_id', $main_menu['id']);
          $this->db->order_by('sort_order', 'ASC');
          $query = $this->db->get($this->table_name);
          $sub_menus = $query->result_array();
          $menu[] = array(
              'id' => $main_menu['id'],
              'name' => $main_menu['name'],
              'class' => $main_menu['class'],
              'link' => $main_menu['link'],
              'display' => $main_menu['display'],
              'sub_menu' => $sub_menus
          );
      endforeach;
      return $menu;
    }

}
