<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormsModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'forms';
      $this->primary_key = 'id';
      $this->desc_table_name = 'forms_desc';
      $this->foreign_key = 'form_id';
      $this->multilingual = TRUE;
  }

}
