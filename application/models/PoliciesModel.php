<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PoliciesModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'manual_policies';
      $this->primary_key = 'id';
      $this->desc_table_name = 'manual_policies_desc';
      $this->foreign_key = 'manual_policies_id';
      $this->multilingual = TRUE;
  }
}
