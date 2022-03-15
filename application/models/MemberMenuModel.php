<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MemberMenuModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'member_menu';
        $this->primary_key = 'id';
    }

    function getMenu() {
        return $this->getSuperMenu();
    }

    function getSuperMenu() {
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
              $submenu[] = array(
                  'id' => $sub_menu['id'],
                  'name' => $sub_menu['name'],
                  'class' => $sub_menu['class'],
                  'display' => $sub_menu['display'],
                  'link' => $sub_menu['link'],
                  'subsub_menu' => $subsub_menus
              );
          endforeach;
          $menu[] = array(
              'id' => $main_menu['id'],
              'name' => $main_menu['name'],
              'class' => $main_menu['class'],
              'link' => $main_menu['link'],
              'sub_menu' => $submenu
          );
      endforeach;
      return $menu;
    }

}
