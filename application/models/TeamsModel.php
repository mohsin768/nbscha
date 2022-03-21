<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TeamsModel extends CMS_Model {

  function __construct() {
      parent::__construct();
      $this->table_name = 'board_members';
      $this->primary_key = 'id';
      $this->desc_table_name = 'board_members_desc';
      $this->foreign_key = 'board_member_id';
      $this->multilingual = TRUE;
  }

}
