<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function translate($key,$default=''){
    $thisCI = &get_instance();
    $txt = $default;
    $localizations = $thisCI->localizations;
    $language = $thisCI->site_language;
    if(isset($localizations[$key])){
        $txt = $localizations[$key];
    } else if($default!='') {
        $data = array('lang_key'=>$key,'lang_value'=>$default,'language' => $language);
        $thisCI->LocalizationModel->insert($data);
    }
    return $txt;
}