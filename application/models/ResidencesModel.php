<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ResidencesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'residences';
        $this->primary_key = 'id';
        $this->desc_table_name = 'residences_desc';
    		$this->foreign_key = 'residence_id';
    		$this->multilingual = TRUE;
    }

}
