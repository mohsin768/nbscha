<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TestimonialsModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'testimonials';
      $this->primary_key = 'id';
      $this->desc_table_name = 'testimonials_desc';
      $this->foreign_key = 'testimonials_id';
      $this->multilingual = TRUE;
  }

}
