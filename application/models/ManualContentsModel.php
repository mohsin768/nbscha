<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManualContentsModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'manual_contents';
      $this->primary_key = 'id';
      $this->desc_table_name = 'manual_contents_desc';
      $this->foreign_key = 'manual_contents_id';
      $this->multilingual = TRUE;
  }
  function getCategory() {
		$this->db->select("$this->table_name.*,manual_contents.category,manual_section_categories_desc.section_category_id,title");
		$this->db->from($this->table_name);
        $this->db->join('manual_section_categories_desc',"manual_section_categories_desc.section_category_id=$this->table_name.category");
		$query = $this->db->get();
		return $query->result_array();
	}
    

}
