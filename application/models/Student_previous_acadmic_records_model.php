<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_previous_acadmic_records_model extends CI_Model {
    public $student_previous_acadmic_records_id, $student_id, $school_name, $class, $acadmic_year, $grade, $achievements, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->student_previous_acadmic_records_id = 0;
        $this->student_id = 0;
        $this->school_name = '';
        $this->class = '';
        $this->acadmic_year = '';
        $this->grade = '';
        $this->achievements = '';
        $this->is_active = '';
        $this->created_by = '';
        $this->created_on = '';
        $this->updated_by = '';
        $this->updated_on = '';
        $this->table_name = DB_NAME.'student_previous_acadmic_records';
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