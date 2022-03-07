<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EnquiriesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'enquiries';
        $this->primary_key = 'id';
    }
}