<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PagesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'pages';
        $this->primary_key = 'id';
        $this->desc_table_name = 'pages_desc';
        $this->foreign_key = 'page_id';
        $this->multilingual = TRUE;
    }

    function deletePage($id){
        $this->db->delete('page_widgets',array('page_id'=>$id));
        $this->db->delete('page_contents',array('page_id'=>$id));
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