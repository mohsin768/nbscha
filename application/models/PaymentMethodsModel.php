<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaymentMethodsModel extends CMS_Model {

    function __construct() {
        parent::__construct();
        $this->table_name = '';
        $this->primary_key = '';
    }

    function getMethods(){
      $results = array(
        '1' => array('name'=>'eTransfer','message'=>$this->settings['ETRANSFER_MESSAGE']),
        '2' => array('name'=>'Cheque','message'=>$this->settings['CASH_CHEQUE_MESSAGE']),
        '3' => array('name'=>'Cash','message'=>$this->settings['CASH_CHEQUE_MESSAGE']),
        '4' => array('name'=>'Auto Renewal','message'=>'')
      );
      return $results;
  }
}