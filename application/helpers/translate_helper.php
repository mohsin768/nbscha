<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function translate($key,$default='',$interface="site"){
    $thisCI = &get_instance();
    $txt = $default;
    $localizations = $thisCI->localizations;
    if($interface=='member'){
        $language = $thisCI->member_language;
    } else {
        $language = $thisCI->site_language;
    }
    if(isset($localizations[$key])){
        $txt = $localizations[$key];
    } else if($default!='') {
        $data = array('lang_key'=>$key,'lang_value'=>$default,'language' => $language);
        $thisCI->LocalizationModel->insert($data);
    }
    return $txt;
}