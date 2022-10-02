<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_master_model extends CI_Model {
    public $enquiry_id, $enquiry_date, $branch_id, $form_id, $student_id, $class_id, $follow_up_status_id, $follow_up_date, $first_name, $middel_name, $last_name, $gender, $date_of_birth, $age, $sibling, $sibling_dob, $add_line_1, $add_line_2, $state_id, $city_id, $pincode, $father_first_name, $father_middel_name, $father_last_name, $father_mobile_no, $father_email_id, $father_education_type_id, $father_occupation_type_id, $mother_first_name, $mother_middel_name, $mother_last_name, $mother_mobile_no, $mother_email_id, $mother_education_type_id, $mother_occupation_type_id, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->enquiry_id = 0;
        $this->enquiry_date = date('Y-m-d');
        $this->branch_id = 0;
        $this->form_id = 0;
        $this->student_id = 0;
        $this->class_id = 0;
        $this->follow_up_status_id = 0;
        $this->follow_up_date = NULL;
        $this->first_name = '';
        $this->middel_name = '';
        $this->last_name = '';
        $this->gender = '';
        $this->date_of_birth = NULL;
        $this->age = 0;
        $this->sibling = 0;
        $this->sibling_dob = NULL;
        $this->add_line_1 = '';
        $this->add_line_2 = '';
        $this->state_id = 0;
        $this->city_id = 0;
        $this->pincode = '';
        $this->father_first_name = '';
        $this->father_middel_name = '';
        $this->father_last_name = '';
        $this->father_mobile_no = '';
        $this->father_email_id = '';
        $this->father_education_type_id = 0;
        $this->father_occupation_type_id = 0;
        $this->mother_first_name = '';
        $this->mother_middel_name = '';
        $this->mother_last_name = '';
        $this->mother_mobile_no = '';
        $this->mother_email_id ='';
        $this->mother_education_type_id = 0;
        $this->mother_occupation_type_id = 0;
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'enquiry_master';
    }

    function add(){
        $insert_data = [
            'enquiry_date' => $this->enquiry_date,
            'branch_id' => $this->branch_id,
            'form_id' => $this->form_id,
            'student_id' => $this->student_id,
            'class_id' => $this->class_id,
            'follow_up_status_id' => $this->follow_up_status_id,
            'follow_up_date' => $this->follow_up_date,
            'first_name' => $this->first_name,
            'middel_name' => $this->middel_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'age' => $this->age,
            'sibling' => $this->sibling,
            'sibling_dob' => $this->sibling_dob,
            'add_line_1' => $this->add_line_1,
            'add_line_2' => $this->add_line_2,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'pincode' => $this->pincode,
            'father_first_name' => $this->father_first_name,
            'father_middel_name' => $this->father_middel_name,
            'father_last_name' => $this->father_last_name,
            'father_mobile_no' => $this->father_mobile_no,
            'father_email_id' => $this->father_email_id,
            'father_education_type_id' => $this->father_education_type_id,
            'father_occupation_type_id' => $this->father_occupation_type_id,
            'mother_first_name' => $this->mother_first_name,
            'mother_middel_name' => $this->mother_middel_name,
            'mother_last_name' => $this->mother_last_name,
            'mother_mobile_no' => $this->mother_mobile_no,
            'mother_email_id' => $this->mother_email_id,
            'mother_education_type_id' => $this->mother_education_type_id,
            'mother_occupation_type_id' => $this->mother_occupation_type_id,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on
        ];
        if($this->global_model->insert($this->table_name, $insert_data)) {
            $this->enquiry_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $result = $this->global_model->select($this->table_name,['father_mobile_no' => $this->father_mobile_no,'is_active'=> $this->is_active]);
        if(isset($result) && $result->num_rows() > 0){
            $this->enquiry_id = $result->row()->enquiry_id;
            return true;
        }else{
            return false;
        }
    }

    function update(){
        $where['enquiry_id'] = $this->enquiry_id;
        $update_data = [
            'enquiry_date' => $this->enquiry_date,
            'class_id' => $this->class_id,
            'follow_up_status_id' => $this->follow_up_status_id,
            'follow_up_date' => $this->follow_up_date,
            'first_name' => $this->first_name,
            'middel_name' => $this->middel_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'age' => $this->age,
            'sibling' => $this->sibling,
            'sibling_dob' => $this->sibling_dob,
            'add_line_1' => $this->add_line_1,
            'add_line_2' => $this->add_line_2,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'pincode' => $this->pincode,
            'father_first_name' => $this->father_first_name,
            'father_middel_name' => $this->father_middel_name,
            'father_last_name' => $this->father_last_name,
            'father_mobile_no' => $this->father_mobile_no,
            'father_email_id' => $this->father_email_id,
            'father_education_type_id' => $this->father_education_type_id,
            'father_occupation_type_id' => $this->father_occupation_type_id,
            'mother_first_name' => $this->mother_first_name,
            'mother_middel_name' => $this->mother_middel_name,
            'mother_last_name' => $this->mother_last_name,
            'mother_mobile_no' => $this->mother_mobile_no,
            'mother_email_id' => $this->mother_email_id,
            'mother_education_type_id' => $this->mother_education_type_id,
            'mother_occupation_type_id' => $this->mother_occupation_type_id,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on           
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function delete(){
        $where['enquiry_id'] = $this->enquiry_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on,
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function get(){
        
    }
}