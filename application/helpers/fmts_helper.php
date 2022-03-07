<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function printSTypes($current,$stypes){
    $sTypesStr = '';
    $sTypesArr = array();
    $currentArr = explode(',',$current);
    if(count($currentArr)>0){
        foreach($currentArr as $currentEle):
            $sTypesArr[] = $stypes[$currentEle];
        endforeach;
    }
    $sTypesStr = implode(', ',$sTypesArr);
    return $sTypesStr;
}
