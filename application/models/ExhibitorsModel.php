<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExhibitorsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'exhibitors';
        $this->primary_key = 'id';
    }
}