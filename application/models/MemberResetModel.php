<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MemberResetModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'member_reset';
        $this->primary_key = 'id';
    }

}
