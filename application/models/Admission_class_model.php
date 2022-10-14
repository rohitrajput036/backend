<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission_class_model extends CI_Model {
    public $admission_class_id, $admission_id, $acadmic_session_id, $class_id, $is_adm_fee_completed, $approval_status, $approval_by, $approval_on, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->admission_class_id = 0;
        $this->admission_id = 0;
        $this->acadmic_session_id = 0;
        $this->class_id = 0;
        $this->is_adm_fee_completed = '';
        $this->approval_status = '';
        $this->approval_by = '';
        $this->approval_on = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');;
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'admission_class';
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