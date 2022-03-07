<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'menus';
        $this->primary_key = 'id';
    }
}