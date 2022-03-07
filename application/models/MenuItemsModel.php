<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuItemsModel extends CMS_Model {

    function __construct()
    {
        parent::__construct();
		$this->table_name='menuitems';
		$this->primary_key ='id';
    }
	
	function getMenuTree($menuId, $parent_id='0')
	{
		$menu = array();
		$this->db->where('menu_id', $menuId);
		$this->db->where('parent_id', $parent_id);
		$this->db->order_by('sort_order', 'ASC');
		$query = $this->db->get($this->table_name);
		$menus = $query->result_array();
		if(count($menus)>0){
			foreach ($menus as $menuitem):
				$submenu = $this->getMenuTree($menuId, $menuitem['id']);
				if(count($submenu)>0){
					$menuitem['submenu'] = $submenu;
				}
				$menu[] = $menuitem;
			endforeach;
		}
		return $menu;
	}

	function getActiveMenuTree($menuId, $parent_id='0')
	{
		$menu = array();
		$this->db->where('status', '1');
		$this->db->where('menu_id', $menuId);
		$this->db->where('parent_id', $parent_id);
		$this->db->order_by('sort_order', 'ASC');
		$query = $this->db->get($this->table_name);
		$menus = $query->result_array();
		if(count($menus)>0){
			foreach ($menus as $menuitem):
				$submenu = $this->getActiveMenuTree($menuId, $menuitem['id']);
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