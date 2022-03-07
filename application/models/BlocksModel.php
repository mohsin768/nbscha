<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BlocksModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'blocks';
        $this->primary_key = 'id';
    }
}