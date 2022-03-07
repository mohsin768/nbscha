<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SponsorCategoriesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'sponsor_categories';
        $this->primary_key = 'id';
    }

    function getIdPair(){
        $reqcats = array();
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->order_by('sort_order', 'ASC');
        $query = $this->db->get();
        $results = $query->result_array();
        foreach($results as $result):
        $reqcats[$result['id']] = $result['name'];
        endforeach;
        return $reqcats;
    }
}