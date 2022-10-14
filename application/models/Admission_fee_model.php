<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission_fee_model extends CI_Model {
    public $admission_fee_id, $admission_class_id, $fee_date, $fee_header_ids, $payable_amount, $fine_amount, $paid_amount, $balance_amount, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->admission_fee_id     = 0;
        $this->admission_class_id   = 0;
        $this->fee_date             = date('Y-m-d');
        $this->fee_header_ids       = '';
        $this->payable_amount       = '0.00';
        $this->fine_amount          = '0';
        $this->paid_amount          = '0';
        $this->balance_amount       = '0';
        $this->is_active            = '';
        $this->created_by           = '';
        $this->created_on           = '';
        $this->updated_by           = '';
        $this->updated_on           = '';
        $this->table_name           = DB_NAME.'admission_fee';
    }

    function add(){

    }

    function check(){

    }

    function update(){

    }

    function delete(){

    }

    function get(){
        
    }
}