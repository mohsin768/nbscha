<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManualsModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'manuals';
      $this->primary_key = 'id';
      $this->desc_table_name = 'manuals_desc';
      $this->foreign_key = 'manuals_id';
      $this->multilingual = TRUE;
  }
  function getSections($manualId,$language)
  {
    $this->db->select('manual_sections.*,manual_sections_desc.*');
    $this->db->from('manual_sections');
    $this->db->join('manual_sections_desc','manual_sections.id=manual_sections_desc.section_id');
    $this->db->where('manual_sections.manual_id',$manualId);
    $this->db->where('manual_sections_desc.language',$language);
    $query = $this->db->get();
		return $query->result_array();
  }
}
