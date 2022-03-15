<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LocalizationModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'localization';
        $this->primary_key = 'id';
        $this->lang_table_name = 'languages';
    }

    function getDefaultLocalizations()
	{
		$data=array();
		$this->db->where('language',$this->default_language);
		$query = $this->db->get($this->table_name);
        foreach($query->result_array() as $row):
			$data[$row['lang_key']]=$row['lang_value'];
		endforeach;
		return $data;
	}

}
