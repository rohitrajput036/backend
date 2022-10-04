<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends CI_Model {

    public $class_id, $school_id, $class_name, $section_name, $with_subject, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;

    function __construct() {
        parent::__construct();
        $this->class_id      = 0;
        $this->school_id     = '';
        $this->class_name    = '';
        $this->section_name  = '';
        $this->with_subject = '';
        $this->is_active     = '';
        $this->created_by    = 0;
        $this->created_on    = date('Y-m-d H:i:s');
        $this->updated_by    = 0;
        $this->updated_on    = date('Y-m-d H:i:s');
        $this->table_name    = DB_NAME.'class';
    }

    function add(){
        $insert_data = [
            'school_id'   => $this->school_id,
            'class_name'  => strtoupper($this->class_name),
            'section_name'=> strtoupper($this->section_name),
            'with_subject'  => $this->with_subject,
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
        $Results = $this->global_model->select($this->table_name, ['class_id' => $this->class_id, 'is_active' => $this->is_active]);
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
            'class_name'  => strtoupper($this->class_name),
            'section_name'=> strtoupper($this->section_name),
            'with_subject' => $this->with_subject,
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
        echo $this->db->last_query();exit;
        return $results;
    }

    function get($for_table = false){
        $this->load->model('school_model');
        if($this->school_id > 0){
            $where['c.school_id'] = $this->school_id;
        }
        if(!empty($this->is_active)){
            $where['c.is_active'] = $this->is_active;
        }else{
            $where['c.is_active IN (1,2)'] = NULL;
        }
        $joins=[
            $this->school_model->table_name.' s'=> ['c.school_id = s.school_id AND s.is_active = 1','LEFT']
        ];
        $fildes = 'c.*,s.school_name';
        $oder_by = ['c.class_id => ASC'];
        $results = $this->global_model->select($this->table_name.' c',$where,$fildes,$joins,NULL,NULL,$oder_by);
        $output =[];
        if(isset($results) &&  $results->num_rows() > 0){
            $i = 0;
            foreach($results->result() as $result){
                $i++;
                if($this->for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-class_id="'.$result->class_id.'" data-at="2" style="background:none"><i class="fa fa-check text-green"></i></button>';
                    }else{
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-class_id="'.$result->class_id.'" data-at="1" style="background:none"><i class="fa fa-times text-red"></i></button>';
                    }
                    $delete_btn = '<button class="btn active_deactive btn-xs" data-class_id="'.$result->class_id.'" data-at="3" style="background:none"><i class="fa fa-trash text-red"></i></button>';
                    $edit_btn = '<btn class="btn edit" data-class_id="'.$result->class_id.'" data-class_name="'.$result->class_name.'" data-section_name="'.$result->section_name.'" data-with_subject="'.$result->with_subject.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn.''.$delete_btn.''.$edit_btn.'';
                    $output [] = [
                        $i, 
                        $result->class_name,
                        $result->section_name,
                        ($result->with_subject == 1) ? 'Yes' : 'No',
                        $btns
                    ];
                }else{
                    
                    $output [] = [
                        's_no' => $i, 
                        'class_id' => $result->class_id,
                        'school_id'=> $result->school_id,
                        'class_name' => $result->class_name,
                        'section' =>$result->section_name,
                        'with_subject' => $result->with_subject
                    ];
                }
            }
        }
        return $output;
    }
}