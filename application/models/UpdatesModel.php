<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UpdatesModel extends CMS_Model {

    function __construct()
    {
        parent::__construct();
		$this->table_name = 'database_updates';
		$this->primary_key = 'update_id';

    }

    function checkUpdate($filename){
    	$filename=$this->db->escape_str($filename);
		$cond = array('update_name' => $filename,'update_status'=>'1');
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$query = $this->db->get();
		$row = $query->row();
		if($row){ return TRUE; } else { return FALSE; }
    }

	function updateDatabase($update_string,$pending_update){
		$sqlstat = array();
		$sqls = explode(';', $update_string);
        array_pop($sqls);
        foreach($sqls as $statement){
            $statment = $statement . ";";
            $qstat = $this->db->query($statement);
            if($qstat){
            	$sqlstat[] = array('status'=>'true','statement'=>$pending_update.' - '.$statment);
			} else {
				$sqlstat[] = array('status'=>'false','statement'=>$pending_update.' - '.$statment);
			}
        }
        $data = array('update_name'=>$pending_update,'update_time' => date('Y-m-d H:i:s'),'update_status'=>'1');
        $this->insert($data);
        return $sqlstat;
	}

}
