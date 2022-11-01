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
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = '';
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'student_previous_acadmic_records';
    }

    function add(){
        $insert_data = [
            'student_id' => $this->student_id,
            'school_name' => $this->school_name,
            'class' => $this->class,
            'acadmic_year' => $this->acadmic_year,
            'grade' => $this->grade,
            'achievements' => $this->achievements,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->student_previous_acadmic_records_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $where['student_id'] = $this->student_id;
        $where['school_name'] = $this->school_name;
        $where['class'] = $this->class;
        $results = $this->global_model->select($this->table_name,$where);
        if(isset($results) && $results->num_rows() > 0){
            $this->student_previous_acadmic_records_id = $results->row()->student_previous_acadmic_records_id;
            return true;
        }
        return false;
    }

    function update(){
        $where['student_previous_acadmic_records_id'] = $this->student_previous_acadmic_records_id;
        $update_data = [
            'school_name' => $this->school_name,
            'class' => $this->class,
            'acadmic_year' => $this->acadmic_year,
            'grade' => $this->grade,
            'achievements' => $this->achievements,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where = [];
        if($this->student_previous_acadmic_records_id > 0){
            $where['student_previous_acadmic_records_id'] = $this->student_previous_acadmic_records_id;
        }elseif($this->student_id > 0){
            $where['student_id'] = $this->student_id;
        }
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get(){
        $output = [];
        if($this->student_id > 0){
            $where['student_id'] = $this->student_id;
        }
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active IN (1,2)'] = NULL;
        }
        $results = $this->global_model->select($this->table_name, $where);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'student_previous_acadmic_records_id' => $result->student_previous_acadmic_records_id,
                    'student_id' => $result->student_id,
                    'school_name' => $result->school_name,
                    'class' => $result->class,
                    'acadmic_year' => $result->acadmic_year,
                    'grade' => $result->grade,
                    'achievements' => $result->achievements,
                    'is_active' => $result->is_active
                ];
            }
        }
        return $output;
    }
}