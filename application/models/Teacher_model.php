<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_model extends CI_Model{
    public $teacher_id, $teacher_name, $class_teacher, $class_id, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;

    function __construct(){
        parent:: __construct();
        $this->teacher_id = 0;
        $this->teacher_name = '';
        $this->class_teacher = '';
        $this->class_id = '';
        $this->is_active    = '';
        $this->created_by   = 0;
        $this->created_on   = date('Y-m-d H:i:s');
        $this->updated_by   = 0;
        $this->updated_on   = date('Y-m-d H:i:s');
        $this->table_name   = DB_NAME.'teacher';
    }

    function add(){
        $insert_data=[
            'teacher_id' => $this->teacher_id,
            'teacher_name' => strtoupper($this->teacher_name),
            'class_teacher' => $this->class_teacher,
            'class_id' => $this->class_id,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->teacher_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function update(){
        $where['teacher_id'] = $this->teacher_id;
        $update_data=[
            'teacher_name' => strtoupper($this->teacher_name),
            'class_teacher' => $this->class_teacher,
            'class_id' => $this->class_id,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['class_id' => $this->class_id]);
        if ($Results->num_rows() > 0) {
            $this->teacher_id = $Results->row()->teacher_id;
            return true;
        } else {
            return false;
        }
    }

    function delete(){
        $where['teacher_id'] = $this->teacher_id;
        $update_data=[
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get($for_table = false){
        $output = [];
        if(isset($results) && $results->num_rows() > 0){
            $i=0;
            foreach($results->result() as $result){
                ++$i;
                if($for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<btn class="btn active_deactive" data-teacher_id="'.$result->teacher_id.'" data-at="2"><i class="fa fa-check text-green"></i></btn>';
                    }else{
                        $active_deactive_btn = '<btn class="btn active_deactive" data-teacher_id="'.$result->teacher_id.'" data-at="1"><i class="fa fa-times text-red"></i></btn>';
                    }
                    $delete_btn = '<btn class="btn active_deactive" data-teacher_id="'.$result->teacher_id.'" data-at="3"><i class="fa fa-trash text-red"></i></btn>';
                    $edit_btn = '<btn class="btn edit" data-teacher_id="'.$result->teacher_id.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn. $delete_btn. $edit_btn;
                    $output[] = [
                        $i,
                        
                        $btns
                    ];
                }else{
                    $output[] = [];
                }
            }
        }
        return $output;
    }
}