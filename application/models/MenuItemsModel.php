<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuItemsModel extends CMS_Model {

    function __construct()
    {
        parent::__construct();
		$this->lang_table_name='languages';
		$this->table_name='menuitems';
		$this->primary_key ='id';
		$this->desc_table_name = 'menuitems_desc';
		$this->foreign_key = 'menuitem_id';
		$this->multilingual = TRUE;
    }

	function insert($maindata,$descdata=array())
	{
        $prime = false;
        $this->db->insert($this->table_name,$maindata);
        $prime=$this->db->insert_id();
        if($this->multilingual && is_array($descdata) && count($descdata)>0){
            $query = $this->db->get($this->lang_table_name);
            foreach($query->result_array() as $row):
                $rowdata=$descdata;
                $rowdata[$this->foreign_key]=$prime;
                $rowdata['language']=$row['code'];
                $this->db->insert($this->desc_table_name,$rowdata);
                unset($rowdata);
            endforeach;	
        }
        return $prime;
	}

	
	function getMenuTree($menuId, $parent_id='0',$lang='')
	{
		if($lang==''){
            $lang = $this->default_language;
        }
		$menu = array();
		$this->db->where('language', $lang);
		$this->db->where('menu_id', $menuId);
		$this->db->where('parent_id', $parent_id);
		$this->db->order_by('sort_order', 'ASC');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$query = $this->db->get();
		$menus = $query->result_array();
		if(count($menus)>0){
			foreach ($menus as $menuitem):
				$submenu = $this->getMenuTree($menuId, $menuitem['id'],$lang);
				if(count($submenu)>0){
					$menuitem['submenu'] = $submenu;
				}
				$menu[] = $menuitem;
			endforeach;
		}
		return $menu;
	}

	function getActiveMenuTree($menuId, $parent_id='0',$lang='')
	{
		if($lang==''){
            $lang = $this->default_language;
        }
		$menu = array();
		$this->db->where('language', $lang);
		$this->db->where('status', '1');
		$this->db->where('menu_id', $menuId);
		$this->db->where('parent_id', $parent_id);
		$this->db->order_by('sort_order', 'ASC');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$query = $this->db->get();
		$menus = $query->result_array();
		if(count($menus)>0){
			foreach ($menus as $menuitem):
				$submenu = $this->getActiveMenuTree($menuId, $menuitem['id'],$lang);
				if(count($submenu)>0){
					$menuitem['submenu'] = $submenu;
				}
				$menu[] = $menuitem;
			endforeach;
		}
		return $menu;
	}
	
	function getTargetTypes()
	{
		return array(
			'_self'=>'Self',
			'_blank'=>'Blank',
			'_new'=>'New',
			'_parent'=>'Parent',
			'_top'=>'Top'
		);
	}
	function getLinkTypes()
	{
		return array(
			'pages'=>'Pages',
			'external'=>'External Link',
			'internal'=>'Internal Link'
		);
	}

}