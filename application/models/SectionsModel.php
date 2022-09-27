<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SectionsModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'manual_sections';
      $this->primary_key = 'id';
      $this->desc_table_name = 'manual_sections_desc';
      $this->foreign_key = 'section_id';
      $this->multilingual = TRUE;
  }
}
