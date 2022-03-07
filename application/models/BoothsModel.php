<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BoothsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'booths';
        $this->primary_key = 'id';
    }
}