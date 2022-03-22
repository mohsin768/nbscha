<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StatisticsModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'statistics';
      $this->primary_key = 'id';
      $this->desc_table_name = 'statistics_desc';
      $this->foreign_key = 'statistics_id';
      $this->multilingual = TRUE;
  }

}
