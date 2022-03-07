<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StypesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'sponsorship_types';
        $this->primary_key = 'id';
    }

    function getIdPair(){
        $reqcats = array();
        $this->db->select('*');
        $this->db->from($this->table_name);
        $query = $this->db->get();
        $results = $query->result_array();
        foreach($results as $result):
        $reqcats[$result['id']] = $result['name'];
        endforeach;
        return $reqcats;
    }
}