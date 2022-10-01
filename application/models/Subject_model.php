<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model{

    public $subject_id, $school_id, $subject_name, $is_active, $created_by, $created_on, $updated_by, $updated_on;

    function __construct() {
        parent::__construct();
        $this->subject_id       ='';
        $this->school_id        ='';
        $this->subject_name     ='';
        $this->is_active        = '';
        $this->created_by       = 0;
        $this->created_on       = date('Y-m-d H:i:s');
        $this->updated_by       = 0;
        $this->updated_on       = date('Y-m-d H:i:s');
        $this->table_name       = DB_NAME.'subject';
    }

    function add(){
        $insert_data =[
            'school_id'     => $this->school_id,
            'subject_name'  => strtoupper($this->subject_name),
            'is_active'     => $this->is_active,
            'created_by'    => $this->created_by,
            'created_on'    => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->subject_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function update(){
        $where['subject_id'] = $this->subject_id;
        $update_data =[
            'school_id'     => $this->school_id,
            'subject_name'  => strtoupper($this->subject_name),
            'updated_by'    => $this->updated_by,
            'updated_on'    => $this->updated_on
        ];
        $this->global_model->update($this->table_name, $update_data, $where);
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['subject_name' => strtoupper($this->subject_name)]);
        if ($Results->num_rows() > 0) {
            $this->subject_id = $Results->row()->subject_id;
            return true;
        } else {
            return false;
        }
    }

    function delete(){
        $where['subject_id'] = $this->subject_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        $results = $this->global_model->update($this->table_name, $update_data, $where);
        return $results;
    }

    function get($for_table = false){
        $this->load->model('school_model');
        if($this->school_id > 0){
            $where['su.school_id'] = $this->school_id;
        }
        if(!empty($this->is_active)){
            $where['su.is_active'] = $this->is_active;
        }else{
            $where['su.is_active IN (1,2)'] = NULL;
        }
        $joins=[
            $this->school_model->table_name.' s'=> ['s.school_id = su.school_id AND s.is_active = 1','LEFT']
        ];
        $fildes = 'su.*,s.school_id';
        $oder_by = ['su.subject_id => ASC'];
        $results = $this->global_model->select($this->table_name.' su',$where, $fildes, $joins, NULL, NULL, $oder_by);
        $output = [];
        if(isset($results) &&  $results->num_rows() > 0){
            $i = 0;
            foreach($results->result() as $result){
                $i++;
                if($this->for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-subject_id="'.$result->subject_id.'" data-at="2" style="background:none"><i class="fa fa-check text-green"></i></button>';
                    }else{
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-subject_id="'.$result->subject_id.'" data-at="1" style="background:none"><i class="fa fa-times text-red"></i></button>';
                    }
                    $delete_btn = '<button class="btn active_deactive btn-xs" data-subject_id="'.$result->subject_id.'" data-at="3" style="background:none"><i class="fa fa-trash text-red"></i></button>';
                    $edit_btn = '<btn class="btn edit" data-subject_id="'.$result->subject_id.'" data-subject_name="'.$result->subject_name.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn.''.$delete_btn.''.$edit_btn.'';
                    $output [] = [
                        $i,
                        '<span id="subject_'.$result->subject_id.'">'.$result->subject_name.'</span>',
                        $btns
                    ];
                }else{
                    $output [] = [
                        'sno' => $i,
                        'subject_id' => $result->subject_id,
                        'school_id' => $result->school_id,
                        'subject_name' => $result->subjet_name,
                        $btns
                    ];
                }
            }
        }
        return $output;
    }
}