<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LiveMembersModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'live_members';
        $this->primary_key = 'id';
    }
}
