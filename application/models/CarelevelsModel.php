<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CarelevelsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'carelevels';
        $this->primary_key = 'cid';
        $this->desc_table_name = 'carelevels_desc';
        $this->foreign_key = 'carelevel_id';
        $this->multilingual = TRUE;
    }

    function getIdPair($lang=''){
        if($lang==''){
            $lang = $this->default_language;
        }
        $cond = array('status'=>'1','language' => $lang);
        $results =$this->getArrayCond($cond);
        foreach($results as $result):
            $reqcats[$result['cid']] = $result['carelevel_title'];
        endforeach;
        return $reqcats;
    }

}
