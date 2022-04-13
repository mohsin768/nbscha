<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaymentMethodsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = '';
        $this->primary_key = '';
    }

    function getMethods(){
      $results = array(
        '1' => array('name'=>'Credit Card','message'=>$this->settings['ETRANSFER_MESSAGE'],'show_admin'=>'0'),
        '2' => array('name'=>'eTransfer','message'=>$this->settings['ETRANSFER_MESSAGE'],'show_admin'=>'1'),
        '3' => array('name'=>'Cheque','message'=>$this->settings['CASH_CHEQUE_MESSAGE'],'show_admin'=>'1'),
        '4' => array('name'=>'Cash','message'=>$this->settings['CASH_CHEQUE_MESSAGE'],'show_admin'=>'1'),
        '5' => array('name'=>'Auto Renewal','message'=>'','show_admin'=>'1')
      );
      return $results;
  }
}