<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FeaturesModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'features';
        $this->primary_key = 'fid';
        $this->desc_table_name = 'features_desc';
    		$this->foreign_key = 'feature_id';
    		$this->multilingual = TRUE;
    }

    function getIdPair($lang=''){
        if($lang==''){
            $lang = $this->default_language;
        }
        $cond = array('status'=>'1','language' => $lang);
        $results =$this->getArrayCond($cond);
        foreach($results as $result):
        $reqcats[$result['fid']] = $result['feature_title'];
        endforeach;
        return $reqcats;
    }

}
