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
}
