<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ArequestsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'advertising_requests';
        $this->primary_key = 'id';
    }
}