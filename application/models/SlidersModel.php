<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SlidersModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'sliders';
        $this->primary_key = 'id';
    }
}