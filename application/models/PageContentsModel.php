<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PageContentsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'page_contents';
        $this->primary_key = 'id';
        $this->desc_table_name = 'page_contents_desc';
        $this->foreign_key = 'content_id';
        $this->multilingual = TRUE;
    }

    function getContentTypes(){
        return array(
			'text_only'=>'Text Only',
            'image_text'=>'Image & Text',
            'video_text'=>'Video & Text'
		);
    }
    function addTranslate($data,$cond,$descdata=array())
	{
	$updateid='';
	if(is_array($data) && count($data) > 0) {
		$updateid = $this->db->update($this->table_name,$data,$cond);
	}
    if($this->multilingual){
      if(count($descdata)>0){
        $updateid = $this->db->insert($this->desc_table_name,$descdata);
      }
    }
		return $updateid;
	}
}