<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MembersModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'members';
        $this->primary_key = 'mid';
    }
}
