<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chapter_model extends CI_Model {

    public $chapter_id, $subject_id, $class_id, $chapter_name, $is_active, $created_by, $created_on, $updated_by, $updated_on;

    function _construct(){
        parent::__construct();
        $this->chapter_id       = 0;
        $this->subject_id       ='';
        $this->class_id         ='';
        $this->chapter_name     ='';
        $this->is_active        = '';
        $this->created_by       = 0;
        $this->created_on       = date('Y-m-d H:i:s');
        $this->updated_by       = 0;
        $this->updated_on       = date('Y-m-d H:i:s');
        $this->table_name       = DB_NAME.'chapter';
    }

    function add(){
        $insert_data =[
            'chapter_id' =>  $this->chapter_id,
            'subject_id' =>  $this->subject_id,
            'class_id'   =>  $this->class_id,
            'chapter_name' => strtoupper($this->chapter_name),
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->chapter_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function update(){
        $where['chapter_id'] =  $this->chapter_id;
        $update_data=[
            'subject_id' => $this->subject_id,
            'class_id' => $this->class_id,
            'chapter_name' => strtoupper($this->chapter_name),
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        $this->global_model->update($this->table_name, $update_data, $where);
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['chapter_name' => strtoupper($this->chapter_name)]);
        if ($Results->num_rows() > 0) {
            $this->chapter_id = $Results->row()->chapter_id;
            return true;
        } else {
            return false;
        }
    }

    function delete(){
        $where['chapter_id'] = $this->chapter_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        $results = $this->global_model->update($this->table_name, $update_data, $where);
        return $results;
    }

    function get($for_table = false){
        $this->load->model('subject_model');
        $this->load->model('class_model');
    }
}