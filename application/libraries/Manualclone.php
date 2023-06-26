<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manualclone {

	protected $CI;

	public function __construct(){
		$this->CI = & get_instance();
	}

	function runClone($oldId,$newId){
    if(!$this->checkManualExists('manuals_desc','manuals_id',$newId)){
      $this->cloneManuals($oldId,$newId);
    }
    if(!$this->checkManualExists('manual_sections','manual_id',$newId)){
      $sectionMappings = $this->cloneManualSections($oldId,$newId);
    }
    if(!$this->checkManualExists('manual_section_categories','manual_id',$newId)){
      $sectionCategoryMappings = $this->cloneManualSectionCategories($oldId,$newId);
    }
    if(!$this->checkManualExists('manual_policy_categories','manual_id',$newId)){
      $policyCategoryMappings = $this->cloneManualPolicyCategories($oldId,$newId);
    }
    if(!$this->checkManualExists('manual_contents','manual_id',$newId) && count($sectionMappings)>0 && count($sectionCategoryMappings)>0 ){
      $this->cloneManualContents($oldId,$newId,$sectionMappings,$sectionCategoryMappings);
    }
    if(!$this->checkManualExists('manual_policies','manual_id',$newId) && count($sectionMappings)>0 && count($sectionCategoryMappings)>0 && count($policyCategoryMappings)>0){
      $this->cloneManualPolicies($oldId,$newId,$sectionMappings,$sectionCategoryMappings,$policyCategoryMappings);
    }
    if(!$this->checkManualExists('manual_variables','manual_id',$newId)){
      $this->cloneManualVariables($oldId,$newId);
    }
  }

  function cloneManuals($oldId,$newId){
    $currentRows = $this->getRows('manuals_desc','manuals_id',$oldId);
    $newRows = array();
    foreach($currentRows as $currentRow):
      unset($currentRow['desc_id']);
      $currentRow['published'] = '0';
      $currentRow['created'] = date('Y-m-d');
      $currentRow['updated'] = date('Y-m-d');
      $currentRow['manuals_id'] = $newId;
      $newRows[] = $currentRow;
    endforeach;
    $this->insertRows('manuals_desc',$newRows);
  }

  function cloneManualSections($oldManualId,$newManualId){
    return $this->handleMainInsert('manual_sections','id','manual_id','manual_sections_desc','desc_id','section_id',$oldManualId,$newManualId);
  }

  function cloneManualSectionCategories($oldManualId,$newManualId){
    return $this->handleMainInsert('manual_section_categories','id','manual_id','manual_section_categories_desc','desc_id','section_category_id',$oldManualId,$newManualId);
  }

  function cloneManualPolicyCategories($oldManualId,$newManualId){
    return $this->handleMainInsert('manual_policy_categories','id','manual_id','manual_policy_categories_desc','desc_id','policy_category_id',$oldManualId,$newManualId);
  }

  function cloneManualContents($oldManualId,$newManualId,$sectionMappings,$sectionCategoryMappings){
    $currentRows = $this->getRows('manual_contents','manual_id',$oldManualId);
    foreach($currentRows as $currentRow):
      $oldId = $currentRow['id'];
      unset($currentRow['id']);
      $currentRow['manual_id'] = $newManualId;
      $currentRow['section'] = (isset($sectionMappings[$currentRow['section']]))?$sectionMappings[$currentRow['section']]:'0';
      $currentRow['category'] = (isset($sectionCategoryMappings[$currentRow['category']]))?$sectionCategoryMappings[$currentRow['category']]:'0';
      $newId = $this->insertRow('manual_contents',$currentRow);
      $this->handleDescInsert('manual_contents_desc','desc_id','manual_contents_id',$oldId,$newId);
    endforeach;
  }

  function cloneManualPolicies($oldManualId,$newManualId,$sectionMappings,$sectionCategoryMappings,$policyCategoryMappings){
    $currentRows = $this->getRows('manual_policies','manual_id',$oldManualId);
    foreach($currentRows as $currentRow):
      $oldId = $currentRow['id'];
      unset($currentRow['id']);
      $currentRow['manual_id'] = $newManualId;
      $currentRow['section'] = (isset($sectionMappings[$currentRow['section']]))?$sectionMappings[$currentRow['section']]:'0';
      $currentRow['category'] = (isset($sectionCategoryMappings[$currentRow['category']]))?$sectionCategoryMappings[$currentRow['category']]:'0';
      $currentRow['policy_category'] = (isset($policyCategoryMappings[$currentRow['policy_category']]))?$policyCategoryMappings[$currentRow['policy_category']]:'0';
      $newId = $this->insertRow('manual_policies',$currentRow);
      $this->handleDescInsert('manual_policies_desc','desc_id','manual_policies_id',$oldId,$newId);
    endforeach;
  }

  function cloneManualVariables($oldManualId,$newManualId){
    $currentRows = $this->getRows('manual_variables','manual_id',$oldManualId);
    $idMappings  = array();
    $idDescMappings = array();
    foreach($currentRows as $currentRow):
      $oldId = $currentRow['id'];
      unset($currentRow['id']);
      $currentRow['manual_id'] = $newManualId;
      $newId = $this->insertRow('manual_variables',$currentRow);
      $idMappings[$oldId] = $newId;
      $currentDescRows = $this->getRows('manual_variables_desc','manual_variable_id',$oldId);
      foreach($currentDescRows as $currentDescRow):
        $oldDescId = $currentDescRow['desc_id'];
        unset($currentDescRow['desc_id']);
        $currentDescRow['manual_variable_id'] = $newId;
        $newDescId = $this->insertRow('manual_variables_desc',$currentDescRow);
        $idDescMappings[$oldDescId] = $newDescId;
      endforeach;
      $currentMemberRows = $this->getRows('manual_variables_member','variable_id',$oldId);
      foreach($currentMemberRows as $currentmemberRow):
        unset($currentmemberRow['member_value_id']);
        $currentmemberRow['variable_id'] = $newId;
        if(isset($idDescMappings[$currentmemberRow['variable_desc_id']])){
          $currentmemberRow['variable_desc_id'] = $idDescMappings[$currentmemberRow['variable_desc_id']];
          $this->insertRow('manual_variables_member',$currentmemberRow);
        }
      endforeach;
    endforeach;
  }

  function checkManualExists($tableName,$tableForeignKey,$newManualId){
    $this->CI->db->from($tableName);
    $this->CI->db->where($tableForeignKey,$newManualId);
		$count =  $this->CI->db->count_all_results();
    if($count>0){
      return true;
    } else {
      return false;
    }
  }

  function handleMainInsert($tableName,$tablePrimaryKey,$tableForeignKey,$descTableName,$descTablePrimaryKey,$descTableForeignKey,$oldManualId,$newManualId){
    $currentRows = $this->getRows($tableName,$tableForeignKey,$oldManualId);
    $newRows = array();
    $idMappings = array();
    foreach($currentRows as $currentRow):
      $oldId = $currentRow[$tablePrimaryKey];
      unset($currentRow[$tablePrimaryKey]);
      $currentRow[$tableForeignKey] = $newManualId;
      $newId = $this->insertRow($tableName,$currentRow);
      $this->handleDescInsert($descTableName,$descTablePrimaryKey,$descTableForeignKey,$oldId,$newId);
      $idMappings[$oldId] = $newId;
    endforeach;
    return $idMappings;
  }

  function handleDescInsert($tableName,$primaryKey,$foreignKey,$oldId,$newId){
    $currentRows = $this->getRows($tableName,$foreignKey,$oldId);
    $newRows = array();
    foreach($currentRows as $currentRow):
      unset($currentRow[$primaryKey]);
      $currentRow[$foreignKey] = $newId;
      $newRows[] = $currentRow;
    endforeach;
    $this->insertRows($tableName,$newRows);
  }
  function getRows($tableName,$foreignKey,$id){
    $this->CI->db->from($tableName);
    $this->CI->db->where($foreignKey,$id);
		$query = $this->CI->db->get();
		return $query->result_array();
  }

  function insertRows($tableName,$data){
    $this->CI->db->insert_batch($tableName,$data);
  }

  function insertRow($tableName,$data){
    $this->CI->db->insert($tableName,$data);
    return $this->CI->db->insert_id();
  }

  function deleteMainRows($tableName,$key,$descTableName,$mainKey,$descForeignKey,$id){
    $currentRows = $this->getRows($tableName,$key,$id);
    foreach($currentRows as $currentRow):
      $mainId = $currentRow[$mainKey];
      $this->CI->db->where($descForeignKey,$mainId);
      $this->CI->db->delete($descTableName);
    endforeach;
    $this->deleteDescRows($tableName,$key,$id);
  }

  function deleteDescRows($tableName,$key,$id){
    $this->CI->db->where($key,$id);
    $this->CI->db->delete($tableName);
  }


  function deleteVariables($id){
    $currentRows = $this->getRows('manual_variables','manual_id',$id);
    foreach($currentRows as $currentRow):
      $mainId = $currentRow['id'];
      $this->deleteDescRows('manual_variables_desc','manual_variable_id',$mainId);
      $this->deleteDescRows('manual_variables_member','variable_id',$mainId);
    endforeach;
    $this->deleteDescRows('manual_variables','manual_id',$id);
  }


  function deleteManualData($id){
    $this->deleteDescRows('manuals_desc','manuals_id',$id);
    $this->deleteMainRows('manual_sections','manual_id','manual_sections_desc','id','section_id',$id);
    $this->deleteMainRows('manual_section_categories','manual_id','manual_section_categories_desc','id','section_category_id',$id);
    $this->deleteMainRows('manual_policy_categories','manual_id','manual_policy_categories_desc','id','policy_category_id',$id);
    $this->deleteMainRows('manual_contents','manual_id','manual_contents_desc','id','manual_contents_id',$id);
    $this->deleteMainRows('manual_policies','manual_id','manual_policies_desc','id','manual_policies_id',$id);
    $this->deleteVariables($id);
  }
}
