<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeLanguagesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'home_languages';
        $this->primary_key = 'id';
    }

    function getIdPair(){
        $cond = array('status'=>'1');
        $results =$this->getArrayCond($cond);
        foreach($results as $result):
            $reqcats[$result['id']] = $result['name'];
        endforeach;
        return $reqcats;
    }

}
