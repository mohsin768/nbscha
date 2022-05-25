<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FiltersModel extends CMS_Model {

    function __construct() {
        parent::__construct();
    }

    function getBedsCount(){
        $results = array(
            '1' => array('id'=>'1','title'=>'1-20','min'=>'','max'=>'20'),
            '2' => array('id'=>'2','title'=>'21-40','min'=>'20','max'=>'40'),
            '3' => array('id'=>'3','title'=>'41-60','min'=>'40','max'=>'60'),
            '4' => array('id'=>'4','title'=>'60+','min'=>'60','max'=>''),
        );
        return $results;
    }

}
