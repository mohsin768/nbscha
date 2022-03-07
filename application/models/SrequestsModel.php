<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SrequestsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'sponsorship_requests';
        $this->primary_key = 'id';
    }
}