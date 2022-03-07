<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CMS_Model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->table_name = '';
		$this->primary_key = '';
	}
	function getAll(){
		$functions = array();
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}
  	function getArray(){
		$this->db->from($this->table_name);
		$query = $this->db->get();
        return $query->result_array();
	}
	function getRows(){
		$this->db->from($this->table_name);
		$query = $this->db->get();
		return $query->result();
	}

	function getArrayLimit($limit) {
		$this->db->limit($limit);
		$this->db->from($this->table_name);
		$query = $this->db->get();
		return $query->result_array();
	}

    function getArrayLimitCond($limit, $cond, $orderField='', $orderDirection='') {
    	if (is_array($cond) && count($cond) > 0) {
			$this->db->where($cond);
		}
		$this->db->limit($limit);
		$this->db->from($this->table_name);
    	if ($orderField!='' && $orderDirection!='') {
			$this->db->order_by($orderField, $orderDirection);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	function getArrayCond($cond='',$like='',$orderField='',$orderDirection='') {
		$this->db->from($this->table_name);
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
   		if ($orderField!='' && $orderDirection!='') {
			$this->db->order_by($orderField, $orderDirection);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	function load($id)
	{
		$id=$this->db->escape_str($id);
		$cond = array($this->primary_key => $id);
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$query = $this->db->get();
		return $query->row();
	}

	function getRowCond($cond) {
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$query = $this->db->get();
		return $query->row();
	}
	function getRowArrayCond($cond) {
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$query = $this->db->get();
		return $query->row_array();
	}

	function insert($data)
	{
		$prime = false;
		$this->db->insert($this->table_name,$data);
		$prime=$this->db->insert_id();
		return $prime;
	}

	function insertBatch($data){
		$this->db->insert_batch($this->table_name,$data);
	}

	function update($id,$data)
	{
		$updateid = false;
    	$cond = array();
		if($id!=''){
			$cond[$this->primary_key]=$id;
		}
		if(count($data)>0){
			$updateid = $this->db->update($this->table_name,$data,$cond);
		}
		return $updateid;
	}

	function updateCond($data,$cond)
	{
		$updateid = false;
		$updateid = $this->db->update($this->table_name,$data,$cond);
		return $updateid;
	}

	function delete($id) {
		$cond=array($this->primary_key=>$id);
		return $this->db->delete($this->table_name,$cond);
	}

	function deleteCond($cond) {
		return $this->db->delete($this->table_name,$cond);
	}

	function getPaginationCount($cond = '', $like='') {
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
		$this->db->from($this->table_name);
		return $this->db->count_all_results();
	}

	function getPagination($num, $offset, $cond = '',$orderField='',$orderDirection='',$like='') {
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
		if ($orderField!='' && $orderDirection!='') {
			$this->db->order_by($orderField, $orderDirection);
		}
		$this->db->from($this->table_name);
		$this->db->limit($num, $offset);
		$query = $this->db->get();
		return $query->result_array();
	}
	function rowExists($cond) {
		if (is_array($cond)) {
			$this->db->where($cond);
		}
    	$this->db->from($this->table_name);
    	$query = $this->db->get();
		$result = $query->num_rows();
		if ($result > 0) {
			return $query->row();
		} else {
			return false;
		}
	}
	function getCountCond($cond = '') {
		$this->db->select('*');
		if (is_array($cond) && count($cond) > 0) {
			$this->db->where($cond);
		}
		$this->db->from($this->table_name);
		return $this->db->count_all_results();
	}

    function createSlug($title)
	{
		$slug = url_title($title, '-', TRUE);
		$this->db->where('slug',$slug);
		$this->db->from($this->table_name);
		$query = $this->db->get();
        $result = $query->num_rows();
		if($result>0){
			return $slug.'-'.date('ymdhis');
		} else {
			return $slug;
		}
	}
	function updateSlug($slug,$id)
	{
		$slug = url_title($slug, '-', TRUE);
		$this->db->where('slug', $slug);
		$this->db->where("$this->primary_key !=",$id);
		$this->db->from($this->table_name);
		$query = $this->db->get();
        $result = $query->num_rows();
		if($result>0){
			return $slug.'-'.date('ymdhis');
		} else {
			return $slug;
		}
	}
}
