<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegionsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'regions';
        $this->primary_key = 'rid';
        $this->desc_table_name = 'regions_desc';
    		$this->foreign_key = 'region_id';
    		$this->multilingual = TRUE;
    }

}
