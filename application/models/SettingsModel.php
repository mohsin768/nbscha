<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class SettingsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->lang_table_name = 'languages';
        $this->table_name = 'settings';
        $this->primary_key = 'id';
        $this->desc_table_name = 'settings_desc';
        $this->foreign_key = 'setting_id';
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

    function getSettingsValue($key){
        $value = 0;
        $key=$this->db->escape_str($key);
        $cond = array('settingkey' => $key);
        $this->db->where($cond);
        $this->db->from($this->table_name);
        $query = $this->db->get();
        $row = $query->row();
        if($row && $row->settingvalue!=''){
            $value = $row->settingvalue;
        }
        return $value;

    }
    function setSettingsValue($key,$value){
        $updateid = false;
        $value=$this->db->escape_str($value);
        $key=$this->db->escape_str($key);
        $cond = array('settingkey' => $key);
        $data = array('settingvalue' => $value);
        $settingsRow = $this->getRowCond($cond);
        if($settingsRow){
            $setCond = array('settings_id' => $settingsRow->id);
            $updateid = $this->db->update($this->table_name,$data,$setCond);
        }
        return $updateid;

    }

    function getGroupArray($lang=''){
        if($lang==''){
            $lang = $this->default_language;
        }
        $groupedSettings = array();
        $cond = array('status'=>'Y','language'=>$lang);
		$settings = $this->getArrayCond($cond,'','sort_order','ASC');
        foreach($settings as $setting):
            $groupedSettings[$setting['parent']][] = $setting;
        endforeach;
        return $groupedSettings;
    }
	
}
