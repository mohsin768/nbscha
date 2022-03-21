<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CertificatetemplatesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'certificate_templates';
        $this->primary_key = 'id';
        $this->desc_table_name = 'certificate_templates_desc';
    		$this->foreign_key = 'template_id';
    		$this->multilingual = TRUE;
    }

}
