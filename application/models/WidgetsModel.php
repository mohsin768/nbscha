<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WidgetsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = 'widgets';
        $this->primary_key = 'id';
        $this->desc_table_name = 'widgets_desc';
        $this->foreign_key = 'widget_id';
        $this->multilingual = TRUE;
    }

    function getTypes()
	{
		return array(
            array('key' =>'page_content_widget','type'=>'system','dynamic'=>'0','combinable'=>'0','name'=>'Page Content'),
            array('key' =>'content_widget','type'=>'dynamic','dynamic'=>'1','combinable'=>'0','name'=>'Content Widget'),
            array('key' =>'content_block_widget','type'=>'dynamic','dynamic'=>'1','combinable'=>'0','name'=>'Content Block Widget'),
            array('key' =>'about_intro_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'About Intro'),
            array('key' =>'about_mission_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'About Mission Widget'),
            array('key' =>'home_about_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'Home About Widget'),
            array('key' =>'home_blocks_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'Home Blocks Widget'),
            array('key' =>'home_works_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'Home How It Works Widget'),
            array('key' =>'board_members_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'Board Members Widget'),
            array('key' =>'faqs_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'FAQs Widget'),
            array('key' =>'latest_news_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'Latest News Widget'),
            array('key' =>'news_list_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'News List Widget'),
            array('key' =>'residences_list_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'Residences List Widget'),
            array('key' =>'sponsors_list_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'Sponsors List Widget'),
            array('key' =>'statistics_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'Statistics Widget'),
            array('key' =>'testimonials_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'Testimonials Widget'),
            array('key' =>'contact_widget','type'=>'custom','dynamic'=>'0','combinable'=>'0','name'=>'Contact Widget')
		);
	}

    function getContentWidgetTemplates(){
        return array(
            'simple-callout'=> 'Simple Callout',
            'background-callout'=> 'Simple with Background Callout',
            'advanced-callout-left'=> 'Advanced Content Block with Left Image',
            'advanced-callout-right'=> 'Advanced Content Block with Right Image'
        );
    }

    function getBlockWidgetTemplates(){
        return array(
            'simple-row-grid'=> 'Single Row Grid',
            'masonary-rows-grid'=> 'Multiple Rows Grid',
            'advanced-rows-slider'=> 'Multiple Rows Slider'
        );
    }

    function getCombinableWidgetKeys(){
        $combinable = array();
        $types = $this->getTypes();
        foreach($types as $type):
            if($type['combinable']=='1'){
                $combinable[] = $type['key'];
            }
        endforeach;
        return $combinable;
    }

    function getWidgetTypes(){
        $typesPair = array();
        $types = $this->getTypes();
        foreach($types as $type):
            $typesPair[$type['key']] = $type;
        endforeach;
        return $typesPair;
    }

    function getPageWidgets($id,$language){
        $cond = array('page_id'=>$id,'widgets_desc.language'=>$language);
        $this->db->select($this->table_name.'.*,'.$this->desc_table_name.'.*,page_widgets.sort_order');
        $this->db->from($this->table_name);
        $this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
        $this->db->join("page_widgets", "page_widgets.widget_id = $this->table_name.id");
		if (is_array($cond) && count($cond) > 0) {
			$this->db->where($cond);
		}
        $this->db->order_by('page_widgets.sort_order','ASC');
		$query = $this->db->get();
		return $query->result_array();
    }

    function deletePageWidgets($id){
        $cond = array('widget_id'=>$id);
		return $this->db->delete('page_widgets',$cond);
    }

    function updatePageWidgets($pageid,$widgets){
        $cond = array('page_id'=>$pageid);
        $delete = $this->db->delete('page_widgets',$cond);
        if($delete){
            $insertData = array();
            if(isset($widgets) && count($widgets)>0){
                $sort = '1';
                foreach($widgets as $widget):
                    $insertData[] = array('widget_id'=>$widget,'page_id'=>$pageid,'sort_order'=>$sort);
                    $sort++;
                endforeach;
            }
            if(count($insertData)){
                $this->db->insert_batch('page_widgets',$insertData);
            }
        }
    }

    function getPackageWidgets($id){
        $cond = array('package_id'=>$id);
        $this->db->select($this->table_name.'.*,package_widgets.sort_order');
        $this->db->from($this->table_name);
        $this->db->join("package_widgets", "package_widgets.widget_id = $this->table_name.id");
        if (is_array($cond) && count($cond) > 0) {
            $this->db->where($cond);
        }
        $this->db->order_by('package_widgets.sort_order','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function deletePackageWidgets($id){
        $cond = array('widget_id'=>$id);
        return $this->db->delete('package_widgets',$cond);
    }
    
    function updatePackageWidgets($packageid,$widgets){
        $cond = array('package_id'=>$packageid);
        $delete = $this->db->delete('package_widgets',$cond);
        if($delete){
            $insertData = array();
            if(isset($widgets) && count($widgets)>0){
                $sort = '1';
                foreach($widgets as $widget):
                    $insertData[] = array('widget_id'=>$widget,'package_id'=>$packageid,'sort_order'=>$sort);
                    $sort++;
                endforeach;
            }
            if(count($insertData)){
                $this->db->insert_batch('package_widgets',$insertData);
            }
        }
    }

    function getAllCombinableWidgets(){
        $combinableKeys = $this->getCombinableWidgetKeys();
        $this->db->from($this->table_name);
        $this->db->where('status','1');
        if($combinableKeys){
            $this->db->where_in('widget_type',$combinableKeys);
        }
		$query = $this->db->get();
		return $query->result_array();
    }
}