<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class RenewalsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'renewal_requests';
        $this->primary_key = 'id';
    }
}
