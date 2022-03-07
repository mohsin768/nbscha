<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminResetModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'admin_reset';
        $this->primary_key = 'id';
    }

}
