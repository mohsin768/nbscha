<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function secureInput($postData,$htmlentities=TRUE){

    $thisCI =& get_instance();
    $cleanData = $thisCI->security->xss_clean($postData);
    $cleanData = $thisCI->db->escape_str($cleanData);
    if($htmlentities){
      $cleanData = htmlentities($cleanData);
    }
    return $cleanData;
}
