<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MembershipsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'memberships';
        $this->primary_key = 'id';
    }

    function loginCheck($user, $pass) {
        $user = $this->db->escape_str($user);
        $cond = array('email' => $user, 'status' => '1');
        $user_row = $this->getRowCond($cond);
        if($user_row){
            $pass = $this->db->escape_str($pass);
            $pass = sha1($user_row->salt.$pass.$user_row->salt);
            $cond = array('email' => $user, 'password' => $pass, 'status' => '1');
            $this->db->where($cond);
            $query = $this->db->get($this->table_name);
            $result = $query->num_rows();
            if ($result > 0) {
                return $query->row();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function forgotCheck($user) {
            $user = $this->db->escape_str($user);
            $cond = array('email' => $user);
            $orcond = array('email' => $user);
            $this->db->where($cond);
            $this->db->or_where($orcond);
            $query = $this->db->get($this->table_name);
            $result = $query->num_rows();
            if ($result > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
	function passwordCheck($cond)
	{
		$this->db->where($cond);
		$query = $this->db->get($this->table_name);
        $result = $query->num_rows();
		if($result>0){
			return true;
		} else {
			return false;
		}
	}
}
