<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BookingsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'bookings';
        $this->primary_key = 'id';
    }
}