<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NewsModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'news';
      $this->primary_key = 'id';
      $this->desc_table_name = 'news_desc';
      $this->foreign_key = 'news_id';
      $this->multilingual = TRUE;
  }
}
