<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminHistoryModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'admins_login_history';
        $this->primary_key = 'id';
    }
}
