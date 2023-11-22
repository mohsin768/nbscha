<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CompaniesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'companies';
        $this->primary_key = 'id';
    }

}
