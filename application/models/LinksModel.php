<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LinksModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'links';
      $this->primary_key = 'id';
      $this->desc_table_name = 'links_desc';
      $this->foreign_key = 'link_id';
      $this->multilingual = TRUE;
  }

}
