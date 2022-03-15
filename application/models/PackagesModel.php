<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PackagesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'membership_packages';
        $this->primary_key = 'pid';
        $this->desc_table_name = 'membership_packages_desc';
    		$this->foreign_key = 'package_id';
    		$this->multilingual = TRUE;
    }

}
