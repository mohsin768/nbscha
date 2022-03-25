<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PackagesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'membership_packages';
        $this->primary_key = 'pid';
        $this->desc_table_name = 'membership_packages_desc';
    		$this->foreign_key = 'package_id';
    		$this->multilingual = TRUE;
    }

    function getIdPair($lang=''){
        if($lang==''){
            $lang = $this->default_language;
        }
        $cond = array('status'=>'1','language' => $lang);
        $results =$this->getArrayCond($cond);
        foreach($results as $result):
            $reqcats[$result['pid']] = $result['title'];
        endforeach;
        return $reqcats;
    }

}
