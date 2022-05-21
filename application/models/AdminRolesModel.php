<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminRolesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'admin_roles';
        $this->primary_key = 'rid';
    }

    function getRolesArray(){
        $reqcats = array();
        $this->db->select('*');
        $this->db->from($this->table_name);
        $query = $this->db->get();
        $results = $query->result_array();
        foreach($results as $result):
        $reqcats[$result['rid']] = $result['name'];
        endforeach;
        return $reqcats;
    }

    function getMenu($rid){
        $this->db->where('role_id', $rid);
        $query = $this->db->get('admin_menu_permission');
        $results = $query->result_array();
        $menus = array();
        foreach($results as $result):
            $menus[] = $result['menu_id'];
        endforeach;
        return $menus;
    }

    function updateMenu($data,$rid){
        $this->db->delete('admin_menu_permission', array('role_id'=>$rid));
        return $this->db->insert_batch('admin_menu_permission', $data);
    }
}
