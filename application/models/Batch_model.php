<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Batch_model extends CI_Model {
    public $batch_id, $branch_id, $batch_name, $start_time, $end_time, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->batch_id = 0;
        $this->branch_id = 0;
        $this->batch_name = '';
        $this->start_time = NULL;
        $this->end_time = NULL;
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'batch';
    }

    function add(){
        $insert_data = [
            'branch_id'     => $this->branch_id,
            'batch_name'    => $this->batch_name,
            'start_time'    => $this->start_time,
            'end_time'      => $this->end_time,
            'is_active'     => $this->is_active,
            'created_by'    => $this->created_by,
            'created_on'    => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->batch_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $where['branch_id'] = $this->branch_id;
        $where['is_active'] = $this->is_active;
        $where['start_time'] = $this->start_time;
        $resutls = $this->global_model->select($this->table_name,$where);
        if(isset($resutls) && $resutls->num_rows() > 0){
            $this->batch_id = $resutls->row()->batch_id;
            return true;
        }else{
            return false;
        }
    }

    function update(){
        $where['batch_id'] = $this->batch_id;
        $update_data = [
            'branch_id'     => $this->branch_id,
            'batch_name'    => $this->batch_name,
            'start_time'    => $this->start_time,
            'end_time'      => $this->end_time,
            'updated_by'    => $this->updated_by,
            'updated_on'    => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where['batch_id'] = $this->batch_id;
        $update_data = [
            'is_active'     => $this->is_active,
            'updated_by'    => $this->updated_by,
            'updated_on'    => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get($for_table = false){
        $output = [];
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active IN (1,2)'] = NULL;
        }
        if($this->batch_id > 0){
            $where['batch_id'] = $this->batch_id;
        }
        $where['branch_id'] = $this->branch_id;
        $results = $this->global_model->select($this->table_name, $where);
        if(isset($results) && $results->num_rows() > 0){
            $sno = 0;
            foreach($results->result() as $result){
                $sno++;
                if($for_table){
                    $output[] = [
                        $sno,
                        $result->batch_name,
                        $result->start_time.' to '.$result->end_time,
                        'btns'
                    ];
                }else{
                    $output[] = [
                        'batch_id' => $result->batch_id,
                        'branch_id' => $result->branch_id,
                        'batch_name' => $result->batch_name,
                        'start_time' => $result->start_time,
                        'end_time' => $result->end_time,
                        'is_active' => $result->is_active
                    ];
                }
            }
        }
        return $output;
    }
}