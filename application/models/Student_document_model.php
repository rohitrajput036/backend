<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_document_model extends CI_Model {
    public $student_document_id, $student_id, $document_id, $document_no, $document_file_name, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->student_document_id  = 0;
        $this->student_id           = 0;
        $this->document_id          = 0;
        $this->document_no          = '';
        $this->document_file_name   = '';
        $this->is_active            = '';
        $this->created_by           = 0;
        $this->created_on           = date('Y-m-d H:i:s');
        $this->updated_by           = 0;
        $this->updated_on           = date('Y-m-d H:i:s');
        $this->table_name           = DB_NAME.'student_document';
    }

    function add(){
        $insert_data = [
            'student_id' => $this->student_id,
            'document_id' => $this->document_id,
            'document_no' => $this->document_no,
            'document_file_name' => $this->document_file_name,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->student_document_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $where['student_id'] = $this->student_id;
        if($this->document_id > 0){
            $where['document_id'] = $this->document_id;
        }
        $where['is_active'] = $this->is_active;
        $results = $this->global_model->select($this->table_name,$where);
        if(isset($results) && $results->num_rows() > 0){
            $this->student_document_id  = $results->row()->student_document_id;
            return true;
        }else{
            return false;
        }
    }

    function update(){
        $where['student_document_id'] = $this->student_document_id;
        $update_data = [
            'document_id' => $this->document_id,
            'document_no' => $this->document_no,
            'document_file_name' => $this->document_file_name,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where = [];
        if($this->student_document_id > 0){
            $where['student_document_id'] = $this->student_document_id;
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
        $this->load->model('document_model');
        if(!empty($this->is_active)){
            $where['sd.is_active'] = $this->is_active;
        }else{
            $where['sd.is_active IN (1,2)'] = NULL;
        }
        if($this->student_id > 0){
            $where['sd.student_id'] = $this->student_id;
        }
        $joins = [
            $this->document_model->table_name.' d' => ['(sd.document_id = d.document_id)','LEFT']
        ];
        $fields = 'd.document,sd.*';        
        $results = $this->global_model->select($this->table_name.' sd', $where, $fields, $joins);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'student_document_id' => $result->student_document_id,
                    'student_id' => $result->student_id,
                    'document_id' => $result->document_id,
                    'document' => $result->document,
                    'document_no' => $result->document_no,
                    'document_file_name' => $result->document_file_name
                ];
            }
        }
        return $output;
    }
}