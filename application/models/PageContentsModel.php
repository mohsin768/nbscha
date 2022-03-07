<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PageContentsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'page_contents';
        $this->primary_key = 'id';
    }

    function getContentTypes(){
        return array(
			'text_only'=>'Text Only',
            'image_text'=>'Image & Text',
            'video_text'=>'Video & Text'
		);
    }
}