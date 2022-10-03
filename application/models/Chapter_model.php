<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chapter_model extends CI_Model {

    public $chapter_id, $subject_id, $class_id, $chapter_name, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $for_table;

    function __construct(){
        parent::__construct();
        $this->chapter_id       = 0;
        $this->subject_id       = '';
        $this->class_id         = '';
        $this->chapter_name     = '';
        $this->is_active        = '';
        $this->created_by       = 0;
        $this->created_on       = date('Y-m-d H:i:s');
        $this->updated_by       = 0;
        $this->updated_on       = date('Y-m-d H:i:s');
        $this->table_name       = DB_NAME.'chapter';
        $this->for_table        = false;
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
        if($this->chapter_id > 0){
            $where['ch.chapter_id'] = $this->chapter_id;
        }
        if($this->subject_id > 0){
            $where['ch.subject_id'] = $this->subject_id;
        }
        if($this->class_id > 0){
            $where['ch.class_id'] = $this->class_id;
        }
        if(!empty($this->is_active)){
            $where['ch.is_active'] = $this->is_active;
        }else{
            $where['ch.is_active IN ("1","2")'] = NULL;
        }
        $joins = [
            $this->subject_model->table_name.' su'=> ['(ch.subject_id = su.subject_id AND su.is_active = 1)','LEFT'],
            $this->class_model->table_name.' c' => ['(ch.class_id = c.class_id AND c.is_active = 1)','LEFT'],
        ];
        $fields = "ch.*,c.class_name, su.subject_name";
        $order_by= ['ch.chapter_name' => 'ASC'];
        $results = $this->global_model->select($this->table_name.' ch',$where, $fields, $joins, NULL,NULL, $order_by);
        $output =[];
        if(isset($results) && $results->num_rows() > 0){
            $i=0;
            foreach($results->result() as $result){
                $i++;
                if($this->for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-chapter_id="'.$result->chapter_id.'" data-at="2" style="background:none"><i class="fa fa-check text-green"></i></button>';
                    }else{
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-chapter_id="'.$result->chapter_id.'" data-at="1" style="background:none"><i class="fa fa-times text-red"></i></button>';
                    }
                    $delete_btn = '<button class="btn active_deactive btn-xs" data-chapter_id="'.$result->chapter_id.'" data-at="3" style="background:none"><i class="fa fa-trash text-red"></i></button>';
                    $edit_btn = '<a class="btn edit btn-xs" data-chapter_id="'.$result->chapter_id.'" data-class_name="'.$result->class_name.'" data-subject_name="'.$result->subject_name.'" style="background:none"><i class="fa fa-pencil-square-o text-primary"></i></a>';

                    $btns = $active_deactive_btn.''.$delete_btn.''.$edit_btn.'';
                    $output[] = [
                        $i,
                        $result->class_name.' ('.$result->class_name.')',
                        $result->chapter_name,
                        $result->subject_name.' ('.$result->subject_name.')',
                        $btns
                    ];    
                }else{
                    $output[] = [
                        'sno'               => $i,
                        'chapter_id'        => $result->chapter_id,
                        'class_id'          => $result->class_id,
                        'subject_id'        => $result->subject_id,
                        'chapter_name'      => $result->chapter_name                  
                    ];
                }
            }
        }
        return $output;
    }
}