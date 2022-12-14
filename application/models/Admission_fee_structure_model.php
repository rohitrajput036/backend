<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission_fee_structure_model extends CI_Model {
    public $admission_fee_structure_id, $admission_class_id, $fee_structure_master_id, $fee_amount, $fee_type, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $for_table;
    function __construct() {
        parent::__construct();
        $this->admission_fee_structure_id = 0;
        $this->admission_class_id = 0;
        $this->fee_structure_master_id = 0;
        $this->fee_amount = '0.00';
        $this->fee_type = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'admission_fee_structure';
        $this->for_table = '';
    }

    function add(){
        $insert_data = [
            'admission_class_id'      => $this->admission_class_id,
            'fee_structure_master_id' => $this->fee_structure_master_id,
            'fee_amount' => $this->fee_amount,
            'fee_type'   => $this->fee_type,
            'is_active'  => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->admission_fee_structure_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $Results = $this->global_model->select($this->table_name,['fee_type' => $this->fee_type, 'is_active' => $this->is_active]);
        if ($Results->num_rows() > 0) {
            $this->admission_fee_structure_id = $Results->row()->admission_fee_structure_id;
            return true;
        } else {
            return false;
        }
    }

    function update(){
        $where['admission_fee_structure_id'] = $this->admission_fee_structure_id;
        $update_data = [
            'admission_class_id'      => $this->admission_class_id,
            'fee_structure_master_id' => $this->fee_structure_master_id,
            'fee_amount' => $this->fee_amount,
            'fee_type'   => $this->fee_type,
            'updated_by' => $this->created_by,
            'updated_on' => $this->created_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where['admission_fee_structure_id'] = $this->admission_fee_structure_id;
        $update_data = [
            'is_active'  => $this->is_active,
            'updated_by' => $this->created_by,
            'updated_on' => $this->created_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get($for_table = false){
        $this->load->model('admission_class_model');
        $this->load->model('admission_fee_model');
        $this->load->model('admission_model');
        if($this->admission_fee_structure_id > 0){
            $where['a.admission_fee_structure_id'] = $this->admission_fee_structure_id;
        }
        if($this->admission_class_id>0){
            $where['ac.admission_class_id']  = $this->admission_class_id;
        }
        if(!empty($this->is_active)){
            $where['a.is_active'] = $this->is_active;
        }else{
            $where['a.is_active IN (1,2)'] = NULL;
        }
        $joins = [
            $this->admission_class_model->table_name.' ac' => ['(a.admission_class_id=ac.admission_class_id AND ac.is_active = 1)','INNER'],
            
        ];
    }
}