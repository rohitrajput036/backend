<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_parents_detail_model extends CI_Model {
    public $student_parents_detail_id, $student_id, $parent_type, $relation_id, $first_name, $middle_name, $last_name, $email_id, $alt_email_id, $contact_no, $alt_contact_no, $date_of_birth, $education_type_id, $occupation_type_id, $address_line_1, $address_line_2, $city_id, $state_id, $pincode, $office_address_line_1, $office_address_line_2, $office_city_id, $office_state_id, $office_pincode, $document_type_id, $document_no, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->student_parents_detail_id = 0;
        $this->student_id = 0;
        $this->parent_type = '';
        $this->relation_id = 0;
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->email_id = '';
        $this->alt_email_id = '';
        $this->contact_no = '';
        $this->alt_contact_no = '';
        $this->date_of_birth = NULL;
        $this->education_type_id = 0;
        $this->occupation_type_id = 0;
        $this->address_line_1 = '';
        $this->address_line_2 = '';
        $this->city_id = 0;
        $this->state_id = 0;
        $this->pincode = '';
        $this->office_address_line_1 = '';
        $this->office_address_line_2 = '';
        $this->office_city_id = 0;
        $this->office_state_id = 0;
        $this->office_pincode = 0;
        $this->document_type_id = 0;
        $this->document_no = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'student_parents_detail' ;
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