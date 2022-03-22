<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NewsCategoriesModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'news_categories';
      $this->primary_key = 'id';
      $this->desc_table_name = 'news_categories_desc';
      $this->foreign_key = 'news_category_id';
      $this->multilingual = TRUE;
  }
}
