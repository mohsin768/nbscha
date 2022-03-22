<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ResourceTypesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = '';
        $this->primary_key = '';
    }

    function getResourceTypes(){
      $results = array(
            'public' => 'Public',
            'member' => 'Member'
      );
      return $results;
  }
}
