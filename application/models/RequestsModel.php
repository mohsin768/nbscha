<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class RequestsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'membership_requests';
        $this->primary_key = 'id';
    }
}
