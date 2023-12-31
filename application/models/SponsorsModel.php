<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SponsorsModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'sponsors';
      $this->primary_key = 'id';
      $this->desc_table_name = 'sponsors_desc';
      $this->foreign_key = 'sponsor_id';
      $this->multilingual = TRUE;
  }

}
