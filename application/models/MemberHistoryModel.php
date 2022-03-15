<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MemberHistoryModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'members_login_history';
        $this->primary_key = 'id';
    }
}
