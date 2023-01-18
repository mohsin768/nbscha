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
  function getContents($manualId,$language,$sectionId)
  {
    $this->db->select('manual_contents.*,manual_contents_desc.*');
    $this->db->from('manual_contents');
    $this->db->join('manual_contents_desc','manual_contents.id=manual_contents_desc.manual_contents_id');
    $this->db->where('manual_contents.manual_id',$manualId);
    $this->db->where('manual_contents.section',$sectionId);
    $this->db->where('manual_contents_desc.language',$language);
    $query = $this->db->get();
		return $query->result_array();
  }
  function getPolicies($manualId,$language)
  {
    $this->db->select('manual_policies.*,manual_policies_desc.*');
    $this->db->from('manual_policies');
    $this->db->join('manual_policies_desc','manual_policies.id=manual_policies_desc.manual_policies_id');
    $this->db->where('manual_policies.manual_id',$manualId);
    $this->db->where('manual_policies_desc.language',$language);
    $query = $this->db->get();
		return $query->result_array();
  }
}
