<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FaqsModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'faqs';
      $this->primary_key = 'id';
      $this->desc_table_name = 'faqs_desc';
      $this->foreign_key = 'faq_id';
      $this->multilingual = TRUE;
  }
}
