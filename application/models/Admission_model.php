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
        $insert_data = [
            'student_id'            => $this->student_id,
            'acadmic_session_id'    => $this->acadmic_session_id,
            'branch_id'             => $this->branch_id,
            'enquiry_id'            => $this->enquiry_id,
            'admission_no'          => $this->admission_no,
            'admission_date'        => $this->admission_date,
            'is_complete'           => $this->is_complete,
            'is_active'             => $this->is_active,
            'created_by'            => $this->created_by,
            'created_on'            => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->admission_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $where['is_active'] = $this->is_active;
        $where['student_id'] = $this->student_id;
        $results = $this->global_model->select($this->table_name,$where);
        if(isset($results) && $results->num_rows() > 0){
            $this->admission_id = $results->row()->admission_id;
            return true;
        }else{
            return false;
        }
    }

    function update(){
        $where['admission_id'] = $this->admission_id;
        $update_data = [
            'acadmic_session_id'    => $this->acadmic_session_id,
            'branch_id'             => $this->branch_id,
            'enquiry_id'            => $this->enquiry_id,
            'admission_no'          => $this->admission_no,
            'admission_date'        => $this->admission_date,
            'is_complete'           => $this->is_complete,
            'updated_by'            => $this->updated_by,
            'updated_on'            => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where['admission_id'] = $this->admission_id;
        $update_data = [
            'is_active'             => $this->is_active,
            'updated_by'            => $this->updated_by,
            'updated_on'            => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get(){
        
    }
}