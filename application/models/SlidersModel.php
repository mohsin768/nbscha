<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SlidersModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'sliders';
      $this->primary_key = 'id';
      $this->desc_table_name = 'sliders_desc';
      $this->foreign_key = 'slider_id';
      $this->multilingual = TRUE;
  }

}
