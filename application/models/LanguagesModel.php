<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LanguagesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'languages';
        $this->primary_key = 'id';
    }

}
