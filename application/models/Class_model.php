<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends CI_Model {

    public $class_id, $school_id, $class_name, $section_name, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;

    function __construct() {
        parent::__construct();
        $this->class_id      = 0;
        $this->school_id     = '';
        $this->class_name    = '';
        $this->section_name  = '';
        $this->is_active     = '';
        $this->created_by    = 0;
        $this->created_on    = date('Y-m-d H:i:s');
        $this->updated_by    = 0;
        $this->updated_on    = date('Y-m-d H:i:s');
        $this->table_name    = DB_NAME.' class';
    }

    function add(){
        $insert_data = [
            'school_id'   => $this->school_id,
            'class_name'  => $this->class_name,
            'section_name'=> $this->section_name,
            'is_active'   => $this->is_active,
            'created_by'  => $this->created_by,
            'created_on'  => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->class_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['class_name' => $this->class_name, 'is_active' => $this->is_active]);
        if ($Results->num_rows() > 0) {
            $this->class_id = $Results->row()->class_id;
            return true;
        } else {
            return false;
        }
    }

    function update(){
        $where['class_id'] = $this->class_id;
        $update_data = [
            'school_id'   => $this->school_id,
            'class_name'  => $this->class_name,
            'section_name'=> $this->section_name,
            'updated_by'  => $this->updated_by,
            'updated_on'  => $this->updated_on 
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where['class_id'] = $this->class_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        $results = $this->global_model->update($this->table_name, $update_data, $where);
        return $results;
    }

    function get($for_table = false){
        $this->load('school_model');
        if($this->school_id > 0){
            $where['s.school_id'] = $this->school_id;
        }
        if(!empty($this->is_active)){
            $where['s.is_active'] = $this->is_active;
        }else{
            $where['s.is_active IN ("1","2")'] = NULL;
        }
        $joins=[
            $this->school_model->table_name. 's'=> ['s.school_id = c.school_id AND is_active = 1','INNER']
        ];
        $fildes = 'c.* s.school_id';
        $oder_by = ['c.class_id => ASC'];
        $output =[];
        if(isset($results) &&  $results->num_rows() > 0){
            $i = 0;
            foreach($results->result() as $result){
               ++$i;
                if($this->for_table){
                    if($result->is_active=1){
                        //edit btn
                    }


                }
            }
        }

    }
}