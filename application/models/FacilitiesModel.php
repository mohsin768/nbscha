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

    function getIdPair($lang=''){
        if($lang==''){
            $lang = $this->default_language;
        }
        $cond = array('status'=>'1','language' => $lang);
        $results =$this->getArrayCond($cond);
        foreach($results as $result):
        $reqcats[$result['fid']] = $result['facility_title'];
        endforeach;
        return $reqcats;
    }

}
