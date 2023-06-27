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
        $this->lang_table_name = 'languages';
    		$this->multilingual = TRUE;
    }



    function insert($maindata,$descdata=array())
    {
          $prime = false;
          $this->db->insert($this->table_name,$maindata);
          $prime=$this->db->insert_id();
          if($this->multilingual && is_array($descdata) && count($descdata)>0){
              $query = $this->db->get($this->lang_table_name);
              foreach($query->result_array() as $row):
                  $rowdata=$descdata;
                  $rowdata[$this->foreign_key]=$prime;
                  $rowdata['language']=$row['code'];
                  $this->db->insert($this->desc_table_name,$rowdata);
                  unset($rowdata);
              endforeach;
          }
          return $prime;
    }


    function getConsolePaginationCount($cond = '', $like='') {
      $this->db->select("*,".$this->table_name.".id as id,members.email as member_email,members.phone as member_phone,$this->table_name.created as created ");
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
      $this->db->join('members', "members.mid = $this->table_name.member_id");
      $this->db->join('memberships', "memberships.residence_id = $this->table_name.$this->primary_key");
      if($this->multilingual){
        $this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
      }
      return $this->db->count_all_results();
    }

    function getConsolePagination($num, $offset, $cond = '',$orderField='',$orderDirection='',$like='') {
      $this->db->select("*,".$this->table_name.".id as id,members.email as member_email,members.phone as member_phone,residences.phone as residence_phone,residences.status as residence_status,$this->table_name.created as created,memberships.identifier as member_identifier ");
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
      $this->db->join('members', "members.mid = $this->table_name.member_id");
      $this->db->join('memberships', "memberships.residence_id = $this->table_name.$this->primary_key");
      if($this->multilingual){
        $this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
      }
      $this->db->limit($num, $offset);
      $query = $this->db->get();
      return $query->result_array();
    }

    function getActivePaginationCount($cond = '', $like='',$findin='',$likeAnd='') {
      $currentDate = date('Y-m-d');
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
            if (is_array($likeAnd) && count($likeAnd) > 0) {
              $this->db->group_start();
              foreach($likeAnd as $row):
              $this->db->like($row['field'],$row['value'],$row['location']);
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
     
      $this->db->where('memberships.expiry_date >=',$currentDate);
      $this->db->from($this->table_name);
      $this->db->join('memberships', "memberships.residence_id = $this->table_name.$this->primary_key");
      if($this->multilingual){
        $this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
      }
		return $this->db->count_all_results();
	}

	function getActivePagination($num, $offset, $cond = '',$orderField='',$orderDirection='',$like='',$findin='',$likeAnd='') {
    $currentDate = date('Y-m-d');
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
          if (is_array($likeAnd) && count($likeAnd) > 0) {
      			$this->db->group_start();
      			foreach($likeAnd as $row):
      			$this->db->like($row['field'],$row['value'],$row['location']);
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
    $this->db->where('memberships.expiry_date >=',$currentDate);
		$this->db->from($this->table_name);
    $this->db->join('memberships', "memberships.residence_id = $this->table_name.$this->primary_key");
    if($this->multilingual){
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		}
		$this->db->limit($num, $offset);
		$query = $this->db->get();
		return $query->result_array();
	}
  function getDetailArrayCond($cond='',$like='',$orderField='',$orderDirection=''){
    $this->db->select("$this->table_name.*,$this->desc_table_name.*,members.first_name,members.last_name,members.email as member_email,
    members.phone as member_phone,residences.phone as residence_phone,memberships.identifier as member_identifier,
    memberships.issue_date,memberships.expiry_date ");
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
    $this->db->join('members', "members.mid = $this->table_name.member_id");
    $this->db->join('memberships', "memberships.residence_id = $this->table_name.$this->primary_key");
    if($this->multilingual){
      $this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
    }
    $query = $this->db->get();
    return $query->result_array();
  }

}
