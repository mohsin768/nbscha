<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CMS_Model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->table_name = '';
		$this->primary_key = '';
    $this->desc_table_name = '';
		$this->foreign_key = '';
		$this->multilingual = FALSE;
	}
	function getAll(){
		$functions = array();
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}
  	function getArray(){
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		$this->db->from($this->table_name);
		$query = $this->db->get();
        return $query->result_array();
	}
	function getRows(){
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		$this->db->from($this->table_name);
		$query = $this->db->get();
		return $query->result();
	}

	function getArrayLimit($limit) {
		$this->db->limit($limit);
		$this->db->from($this->table_name);
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		$query = $this->db->get();
		return $query->result_array();
	}

    function getArrayLimitCond($limit, $cond, $orderField='', $orderDirection='') {
    	if (is_array($cond) && count($cond) > 0) {
			$this->db->where($cond);
		}
		$this->db->limit($limit);
		$this->db->from($this->table_name);
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
    	if ($orderField!='' && $orderDirection!='') {
			$this->db->order_by($orderField, $orderDirection);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	function getArrayCond($cond='',$like='',$orderField='',$orderDirection='') {
		$this->db->from($this->table_name);
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
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
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		$query = $this->db->get();
		return $query->row();
	}

	function getRowCond($cond) {
		$this->db->where($cond);
		$this->db->from($this->table_name);
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		$query = $this->db->get();
		return $query->row();
	}
	function getRowArrayCond($cond) {
		$this->db->where($cond);
		$this->db->from($this->table_name);
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		$query = $this->db->get();
		return $query->row_array();
	}

	function insert($maindata,$descdata=array())
	{
		$prime = false;
		$this->db->insert($this->table_name,$maindata);
		$prime=$this->db->insert_id();
    if($this->multilingual && is_array($descdata) && count($descdata)>0){
      $descdata[$this->foreign_key]=$prime;
			$this->db->insert($this->desc_table_name,$descdata);
		}
		return $prime;
	}

  function update($id,$maindata,$descdata=array())
  	{
  		$cond[$this->primary_key]=$id;
  		if($this->multilingual){
  			$desccond[$this->foreign_key]=$id;
  			if(count($descdata)>0){
				$desccond['language'] = $descdata['language'];
				$updateid =  $this->db->update($this->desc_table_name,$descdata,$desccond);
  			}
  		}
  		if(count($maindata)>0){
  			$updateid = $this->db->update($this->table_name,$maindata,$cond);
  		}
  		return $updateid;
  	}

	function updateCond($data,$cond,$descdata=array())
	{
		$updateid = false;
    if($this->multilingual && isset($cond[$this->primary_key])){
      $id = $cond[$this->primary_key];
      $desccond[$this->foreign_key]=$id;
      if(count($descdata)>0){
        $desccond['language'] = $descdata['language'];
        $this->db->update($this->desc_table_name,$descdata,$desccond);
      }
    }
		$updateid = $this->db->update($this->table_name,$data,$cond);
		return $updateid;
	}

	function delete($id) {
    if($this->multilingual){
			$desccond=array($this->foreign_key=>$id);
			$this->db->delete($this->desc_table_name,$desccond);
		}
		$cond=array($this->primary_key=>$id);
		return $this->db->delete($this->table_name,$cond);
	}

	function deleteCond($cond) {
    if($this->multilingual && isset($cond[$this->primary_key])){
			$desccond=array($this->foreign_key=>$cond[$this->primary_key]);
			$this->db->delete($this->desc_table_name,$desccond);
		}
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
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
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
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		$this->db->limit($num, $offset);
		$query = $this->db->get();
		return $query->result_array();
	}
	function rowExists($cond) {
		if (is_array($cond)) {
			$this->db->where($cond);
		}
    	$this->db->from($this->table_name);
      if($this->multilingual){
  			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
  		}
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
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
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

  function getElementPair($key='',$val='',$orderField='',$orderDirection='', $cond=array()){
      $pairs =array();
      if($key!='' && $val!=''){
        $this->db->select('*');
        if (is_array($cond)) {
    			$this->db->where($cond);
    		}
        $this->db->from($this->table_name);
        if($this->multilingual){
    			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
    		}
        if ($orderField!='' && $orderDirection!='') {
    			$this->db->order_by($orderField, $orderDirection);
    		}
        $query = $this->db->get();
        $results = $query->result_array();
        foreach($results as $result):
          if(isset($result[$key]) && isset($result[$val])){
            $pairs[$result[$key]] = $result[$val];
          }
        endforeach;
      }
      return $pairs;
  }

  function getTranslates($cond=array()){
    $translates = false;
    if($this->multilingual && is_array($cond) && count($cond) > 0){
    		$this->db->where($cond);
        $this->db->from($this->table_name);
  			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
        $query = $this->db->get();
        $results = $query->result_array();
        foreach($results as $result):
            $translates[$result['language']] = $result;
        endforeach;
  		}
      return $translates;
  }

  function addTranslate($data,$cond,$descdata=array())
	{
    $updateid = $this->db->update($this->table_name,$data,$cond);
    if($this->multilingual){
      if(count($descdata)>0){
        $this->db->insert($this->desc_table_name,$descdata);
      }
    }
		return $updateid;
	}

}
