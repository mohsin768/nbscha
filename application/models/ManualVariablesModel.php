<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManualVariablesModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'manual_variables';
      $this->primary_key = 'id';
      $this->desc_table_name = 'manual_variables_desc';
      $this->foreign_key = 'manual_variable_id';
      $this->member_table_name = 'manual_variables_member';
      $this->member_key = 'variable_desc_id';
      $this->multilingual = TRUE;
  }
  function getPaginationCount($cond = '', $like='') {
		$this->db->select("$this->table_name.*,$this->desc_table_name.*,manual_sections_desc.title as section_title");
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
    $this->db->join('manual_sections',"$this->table_name.section_id=manual_sections.id",'left');
    $this->db->join('manual_sections_desc','manual_sections_desc.section_id=manual_sections.id','left');
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		return $this->db->count_all_results();
	}

	function getPagination($num, $offset, $cond = '',$orderField='',$orderDirection='',$like='') {
		$this->db->select("$this->table_name.*,$this->desc_table_name.*,manual_sections_desc.title as section_title");
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
    $this->db->join('manual_sections',"$this->table_name.section_id=manual_sections.id",'left');
    $this->db->join('manual_sections_desc','manual_sections_desc.section_id=manual_sections.id','left');
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		$this->db->limit($num, $offset);
		$query = $this->db->get();
		return $query->result_array();
	}
  function getMemberPaginationCount($cond = '', $like='',$memberId='0') {
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
      $this->db->join($this->member_table_name, "$this->member_table_name.$this->member_key = $this->desc_table_name.desc_id AND $this->member_table_name.member_id=$memberId","left");
    }
    return $this->db->count_all_results();
  }

  function getMemberPagination($num, $offset, $cond = '',$orderField='',$orderDirection='',$like='',$memberId='0') {
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
      $this->db->join($this->member_table_name, "$this->member_table_name.$this->member_key = $this->desc_table_name.desc_id AND $this->member_table_name.member_id=$memberId","left");
    }
    $this->db->limit($num, $offset);
    $query = $this->db->get();
    return $query->result_array();
  }
  function getMemberRowCond($cond,$memberId='0') {
		$this->db->where($cond);
		$this->db->from($this->table_name);
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
      $this->db->join($this->member_table_name, "$this->member_table_name.$this->member_key = $this->desc_table_name.desc_id AND $this->member_table_name.member_id=$memberId","left");
		}
		$query = $this->db->get();
		return $query->row();
	}
  function getMemberArrayCond($cond='',$like='',$orderField='',$orderDirection='',$memberId='0') {
		$this->db->from($this->table_name);
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
      $this->db->join($this->member_table_name, "$this->member_table_name.$this->member_key = $this->desc_table_name.desc_id AND $this->member_table_name.member_id=$memberId","left");
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
  function insertMemberVariable($data)
	{
		$prime = false;
		$this->db->insert($this->member_table_name,$data);
		$prime=$this->db->insert_id();
  	return $prime;
	}

	function updateMemberVariable($data=array(),$cond)
	{
			$updateid = $this->db->update($this->member_table_name,$data,$cond);
			return $updateid;
	}
  function deleteCond($cond) {
    if($this->multilingual && isset($cond[$this->primary_key])){
      $memCond=array('variable_id'=>$cond[$this->primary_key]);
			$this->db->delete($this->member_table_name,$memCond);
			$desccond=array($this->foreign_key=>$cond[$this->primary_key]);
			$this->db->delete($this->desc_table_name,$desccond);
		}
		return $this->db->delete($this->table_name,$cond);
	}
  function getSectionList($manualId,$lang='')
  {
    $this->db->select('*');
    $this->db->from($this->table_name);
    $this->db->join('manual_sections_desc',"$this->table_name.section_id=manual_sections_desc.section_id");
    $this->db->where("$this->table_name.manual_id",$manualId);
    $this->db->where('manual_sections_desc.language',$lang);
    $query = $this->db->get();
		return $query->result_array();
  }
}
