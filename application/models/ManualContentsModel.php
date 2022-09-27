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
}
