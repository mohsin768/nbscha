<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PackagesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'packages';
        $this->primary_key = 'id';
    }

    function deletePackage($id){
        $this->db->delete('package_widgets',array('package_id'=>$id));
        $this->db->delete('package_contents',array('package_id'=>$id));
        return $this->db->delete($this->table_name,array('id'=>$id));
    }

    function getIdPair(){
        $reqcats = array();
        $this->db->select('*');
        $this->db->from($this->table_name);
        $query = $this->db->get();
        $results = $query->result_array();
        foreach($results as $result):
        $reqcats[$result['id']] = $result['title'];
        endforeach;
        return $reqcats;
    }
}