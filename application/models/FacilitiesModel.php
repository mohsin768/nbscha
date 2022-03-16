<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FacilitiesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'facilities';
        $this->primary_key = 'fid';
        $this->desc_table_name = 'facilities_desc';
    		$this->foreign_key = 'facility_id';
    		$this->multilingual = TRUE;
    }

}
