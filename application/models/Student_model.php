<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_model extends CI_Model {
    
    public $student_id, $registration_id, $first_name, $middle_name, $last_name, $date_of_birth, $place_of_birth, $gender, $case_category_id, $cast, $nationality_id, $religion_id, $address_line_1, $address_line_2, $area_id, $city_id, $state_id, $pincode, $permanent_addresss_line_1, $permanent_addresss_line_2, $permanent_area_id, $permanent_city_id, $permanent_state_id, $permanent_pincode, $mother_tongue, $blood_group, $indentification_mark_1, $indentification_mark_2, $remarks, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;

    function __construct() {
        parent::__construct();
        $this->student_id = 0;
        $this->registration_id = 0;
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->date_of_birth = NULL;
        $this->place_of_birth = '';
        $this->gender = '';
        $this->case_category_id = 0;
        $this->cast = '';
        $this->nationality_id = 0;
        $this->religion_id = 0;
        $this->address_line_1 = '';
        $this->address_line_2 = '';
        $this->area_id = 0;
        $this->city_id = 0;
        $this->state_id = 0;
        $this->pincode = '';
        $this->permanent_addresss_line_1 = '';
        $this->permanent_addresss_line_2 = '';
        $this->permanent_area_id = 0;
        $this->permanent_city_id = 0;
        $this->permanent_state_id = 0;
        $this->permanent_pincode = '';
        $this->mother_tongue = '';
        $this->blood_group  = '';
        $this->indentification_mark_1 = '';
        $this->indentification_mark_2 = '';
        $this->remarks = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'student';
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