<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ResidencesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'residences';
        $this->primary_key = 'id';
        $this->desc_table_name = 'residences_desc';
    		$this->foreign_key = 'residence_id';
    		$this->multilingual = TRUE;
    }

    function getPaginationCount($cond = '', $like='',$findin='') {
		$this->db->select('*');
		if (is_array($cond) && count($cond) > 0) {
			$this->db->where($cond);
		}
    	if (is_array($like) && count($like) > 0) {
      			$this->db->group_start();
      			foreach($like as $row):
      			$this->db->or_like($row['field'],$row['value'],$row['location']);
      			endforeach;
      			$this->db->group_end();
      		}
        if (is_array($findin) && count($findin) > 0) {
                $this->db->group_start();
                foreach($findin as $value):
                $this->db->where("find_in_set($value, 'facilities')");
                endforeach;
                $this->db->group_end();
        } 
		$this->db->from($this->table_name);
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		return $this->db->count_all_results();
	}

	function getPagination($num, $offset, $cond = '',$orderField='',$orderDirection='',$like='',$findin='') {
		$this->db->select('*');
		if (is_array($cond) && count($cond) > 0) {
		  $this->db->where($cond);
		}
	    if (is_array($like) && count($like) > 0) {
      			$this->db->group_start();
      			foreach($like as $row):
      			$this->db->or_like($row['field'],$row['value'],$row['location']);
      			endforeach;
      			$this->db->group_end();
      		}
        if (is_array($findin) && count($findin) > 0) {
                $this->db->group_start();
                foreach($findin as $value):
                $this->db->where("find_in_set($value, facilities)");
                endforeach;
                $this->db->group_end();
        }       
		if ($orderField!='' && $orderDirection!='') {
			$this->db->order_by($orderField, $orderDirection);
		}
		$this->db->from($this->table_name);
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		$this->db->limit($num, $offset);
		$query = $this->db->get();
		return $query->result_array();
	}

}
