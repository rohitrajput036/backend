<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission_class_model extends CI_Model {
    public $admission_class_id, $admission_id, $acadmic_session_id, $class_id, $is_adm_fee_completed, $approval_status, $approval_by, $approval_on, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->admission_class_id = 0;
        $this->admission_id = 0;
        $this->acadmic_session_id = 0;
        $this->class_id = 0;
        $this->is_adm_fee_completed = '';
        $this->approval_status = '';
        $this->approval_by = '';
        $this->approval_on = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');;
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'admission_class';
    }

    function add(){
        $insert_data = [
            'admission_id' => $this->admission_id,
            'acadmic_session_id' => $this->acadmic_session_id,
            'class_id' => $this->class_id,
            'is_adm_fee_completed' => $this->is_adm_fee_completed,
            'approval_status' => $this->approval_status,
            'approval_by' => $this->approval_by,
            'approval_on' => $this->approval_on,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->acadmic_session_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $where['is_active'] = $this->is_active;
        $where['admission_id'] = $this->admission_id;
        $results = $this->global_model->select($this->table_name, $where);
        if(isset($results) && $results->num_rows() > 0){
            $this->acadmic_session_id = $results->row()->acadmic_session_id;
            return true;
        }else{
            return false;
        }
    }

    function update(){
        $where['admission_class_id'] = $this->admission_class_id;
        $update_data = [
            'admission_id' => $this->admission_id,
            'acadmic_session_id' => $this->acadmic_session_id,
            'class_id' => $this->class_id,
            'is_adm_fee_completed' => $this->is_adm_fee_completed,
            'approval_status' => $this->approval_status,
            'approval_by' => $this->approval_by,
            'approval_on' => $this->approval_on,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where['admission_class_id'] = $this->admission_class_id;
        $update_data = [
            'is_active'     => $this->is_active,
            'updated_by'    => $this->updated_by,
            'updated_on'    => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get(){
        
    }
}