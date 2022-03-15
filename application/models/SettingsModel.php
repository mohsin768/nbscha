<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class SettingsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'settings';
        $this->primary_key = 'id';
        $this->desc_table_name = 'settings_desc';
        $this->foreign_key = 'setting_id';
        $this->multilingual = TRUE;
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

    function getGroupArray($lang){
        $groupedSettings = array();
        $cond = array('status'=>'Y','language'=>$lang);
		$settings = $this->getArrayCond($cond,'','sort_order','ASC');
        foreach($settings as $setting):
            $groupedSettings[$setting['parent']][] = $setting;
        endforeach;
        return $groupedSettings;
    }
	
}
