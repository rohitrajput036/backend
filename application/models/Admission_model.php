<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission_model extends CI_Model {
    public $admission_id, $student_id, $acadmic_session_id, $branch_id, $enquiry_id, $admission_no, $admission_date, $is_complete, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->admission_id         = 0;
        $this->student_id           = 0;
        $this->acadmic_session_id   = 0;
        $this->branch_id            = 0;
        $this->enquiry_id           = 0;
        $this->admission_no         = '';
        $this->admission_date       = date('Y-m-d H:i:s');
        $this->is_complete          = 0;
        $this->is_active            = '';
        $this->created_by           = 0;
        $this->created_on           = date('Y-m-d H:i:s');
        $this->updated_by           = 0;
        $this->updated_on           = date('Y-m-d H:i:s');
        $this->table_name           = DB_NAME.'admission';
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