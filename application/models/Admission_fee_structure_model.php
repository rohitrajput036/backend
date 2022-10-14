<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission_fee_structure_model extends CI_Model {
    public $admission_fee_structure_id, $admission_class_id, $fee_structure_master_id, $fee_amount, $fee_type, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->admission_fee_structure_id = 0;
        $this->admission_class_id = 0;
        $this->fee_structure_master_id = 0;
        $this->fee_amount = '0.00';
        $this->fee_type = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'admission_fee_structure';
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