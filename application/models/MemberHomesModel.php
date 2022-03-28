<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MemberHomesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'member_homes';
        $this->primary_key = 'id';
    }
}
