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
}
