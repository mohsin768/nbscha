<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VideosModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'videos';
        $this->primary_key = 'id';
    }
}