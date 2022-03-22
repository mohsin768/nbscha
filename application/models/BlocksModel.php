<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BlocksModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'blocks';
      $this->primary_key = 'id';
      $this->desc_table_name = 'blocks_desc';
      $this->foreign_key = 'block_id';
      $this->multilingual = TRUE;
  }
}
