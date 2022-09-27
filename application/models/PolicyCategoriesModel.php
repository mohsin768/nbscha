<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PolicyCategoriesModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'manual_policy_categories';
      $this->primary_key = 'id';
      $this->desc_table_name = 'manual_policy_categories_desc';
      $this->foreign_key = 'policy_category_id';
      $this->multilingual = TRUE;
  }
}
