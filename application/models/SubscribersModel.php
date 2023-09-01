<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SubscribersModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'subscribers';
        $this->primary_key = 'id';
    }

}