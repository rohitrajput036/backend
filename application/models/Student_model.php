<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_model extends CI_Model {
    
    public $student_id, $registration_id, $first_name, $middle_name, $last_name, $date_of_birth, $place_of_birth, $gender, $cast_category_id, $cast, $nationality_id, $religion_id, $address_line_1, $address_line_2, $area_id, $city_id, $state_id, $pincode, $permanent_addresss_line_1, $permanent_addresss_line_2, $permanent_area_id, $permanent_city_id, $permanent_state_id, $permanent_pincode, $mother_tongue, $blood_group, $indentification_mark_1, $indentification_mark_2, $remarks, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $datatable;

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
        $this->cast_category_id = 0;
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
        $this->datatable = '';
    }

    function add(){
        $insert_data = [
            'registration_id' => $this->registration_id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'place_of_birth' => $this->place_of_birth,
            'gender' => $this->gender,
            'cast_category_id' => $this->cast_category_id,
            'cast' => $this->cast,
            'nationality_id' => $this->nationality_id,
            'religion_id' => $this->religion_id,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'area_id' => $this->area_id,
            'city_id' => $this->city_id,
            'state_id' => $this->state_id,
            'pincode' => $this->pincode,
            'permanent_addresss_line_1' => $this->permanent_addresss_line_1,
            'permanent_addresss_line_2' => $this->permanent_addresss_line_2,
            'permanent_area_id' => $this->permanent_area_id,
            'permanent_city_id' => $this->permanent_city_id,
            'permanent_state_id' => $this->permanent_state_id,
            'permanent_pincode' => $this->permanent_pincode,
            'mother_tongue' => $this->mother_tongue,
            'blood_group' => $this->blood_group,
            'indentification_mark_1' => $this->indentification_mark_1,
            'indentification_mark_2' => $this->indentification_mark_2,
            'remarks' => $this->remarks,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->student_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $results = $this->global_model->select($this->table_name,['registration_id' => $this->registration_id,'is_active' => $this->is_active]);
        if(isset($results) && $results->num_rows() > 0){
            $this->student_id = $results->row()->student_id;
            return true;
        }else{
            return false;
        }
    }

    function update(){
        $where['student_id'] = $this->student_id;
        $update_data = [
            'registration_id' => $this->registration_id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'place_of_birth' => $this->place_of_birth,
            'gender' => $this->gender,
            'cast_category_id' => $this->cast_category_id,
            'cast' => $this->cast,
            'nationality_id' => $this->nationality_id,
            'religion_id' => $this->religion_id,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'area_id' => $this->area_id,
            'city_id' => $this->city_id,
            'state_id' => $this->state_id,
            'pincode' => $this->pincode,
            'permanent_addresss_line_1' => $this->permanent_addresss_line_1,
            'permanent_addresss_line_2' => $this->permanent_addresss_line_2,
            'permanent_area_id' => $this->permanent_area_id,
            'permanent_city_id' => $this->permanent_city_id,
            'permanent_state_id' => $this->permanent_state_id,
            'permanent_pincode' => $this->permanent_pincode,
            'mother_tongue' => $this->mother_tongue,
            'blood_group' => $this->blood_group,
            'indentification_mark_1' => $this->indentification_mark_1,
            'indentification_mark_2' => $this->indentification_mark_2,
            'remarks' => $this->remarks,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where['student_id'] = $this->student_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get(){
        $output = [];
        $this->load->model('registration_model');
        if(!empty($this->is_active)){
            $where['s.is_active'] = $this->is_active;
        }else{
            $where['s.is_active IN (1,2)'] = NULL;
        }
        if($this->student_id > 0){
            $where['s.student_id'] = $this->student_id;
        }
        $joins = [
            $this->registration_model->table_name.' r' => ['(s.registration_id = r.registration_id AND r.is_active = 1)','LEFT']
        ];
        $fields = '*';
        $results = $this->global_model->select($this->table_name.' s', $where, $fields, $joins);
        if(!empty($this->datatable)){
            $output = $this->prepare_result_datatable($results);
        }else{
            $output = $this->prepare_result($results);
        }
        return $output;
    }
    function prepare_result($results){
        $output = [];
        $this->load->model('student_previous_acadmic_records_model');
        $this->load->model('student_parents_detail_model');
        $this->load->model('student_document_model');
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $this->student_previous_acadmic_records_model->student_id = $result->student_id;
                $this->student_previous_acadmic_records_model->is_active = 1;
                $prev_acadmic_record = $this->student_previous_acadmic_records_model->get();
                $this->student_parents_detail_model->student_id = $result->student_id;
                $this->student_parents_detail_model->is_active = 1;
                $parents_info = $this->student_parents_detail_model->get();
                $this->student_document_model->student_id = $result->student_id;
                $this->student_document_model->is_active = 1;
                $documents = $this->student_document_model->get();
                $data = [
                    'student_id' => $result->student_id,
                    'first_name' => $result->first_name,
                    'middle_name' => $result->middle_name,
                    'last_name' => $result->last_name,
                    'date_of_birth' => $result->date_of_birth,
                    'place_of_birth' => $result->place_of_birth,
                    'gender' => $result->gender,
                    'cast_category_id' => $result->cast_category_id,
                    'cast' => $result->cast,
                    'nationality_id' => $result->nationality_id,
                    'religion_id' => $result->religion_id,
                    'address_line_1' => $result->address_line_1,
                    'address_line_2' => $result->address_line_2,
                    'area_id' => $result->area_id,
                    'city_id' => $result->city_id,
                    'state_id' => $result->state_id,
                    'pincode' => $result->pincode,
                    'permanent_addresss_line_1' => $result->permanent_addresss_line_1,
                    'permanent_addresss_line_2' => $result->permanent_addresss_line_2,
                    'permanent_area_id' => $result->permanent_area_id,
                    'permanent_city_id' => $result->permanent_city_id,
                    'permanent_state_id' => $result->permanent_state_id,
                    'permanent_pincode' => $result->permanent_pincode,
                    'mother_tongue' => $result->mother_tongue,
                    'blood_group' => $result->blood_group,
                    'indentification_mark_1' => $result->indentification_mark_1,
                    'indentification_mark_2' => $result->indentification_mark_2,
                    'remarks' => $result->remarks,
                    'is_active' => $result->is_active,
                    'created_by' => $result->created_by,
                    'created_on' => $result->created_on,
                    'registration_info' => [
                        'registration_id' => $result->registration_id,
                        'branch_id' => $result->branch_id,
                        'enquiry_id' => $result->enquiry_id,
                        'registration_no' => $result->registration_no,
                        'registration_date' => $result->registration_date,
                        'class_id' => $result->class_id,
                        'registration_fee' => $result->registration_fee,
                        'is_qualified' => $result->is_qualified,
                        'total_marks' => $result->total_marks,
                        'earn_marks' => $result->earn_marks,
                        'earn_percentage' => $result->earn_percentage,
                        'remarks' => $result->remarks
                    ],
                    'prev_acadmic_record' => $prev_acadmic_record,
                    'parents' => $parents_info,
                    'documents' => $documents
                ];
                if($this->student_id > 0){
                    $output = $data;
                }else{
                    $output[] = $data;
                }
            }
        }
        return $output;
    }
    function prepare_result_datatable($results){
        $output = [];
        return $output;
    }
}