<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Registration_model extends CI_Model {
    
    public $registration_id, $branch_id, $enquiry_id, $registration_no, $registration_date, $registration_fee, $is_qualified, $total_marks, $earn_marks, $earn_percentage, $remarks, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    
    function __construct() {
        parent::__construct();
        $this->registration_id      = 0;
        $this->branch_id            = 0;
        $this->enquiry_id           = 0;
        $this->registration_no      = '';
        $this->registration_date    = date('Y-m-d');
        $this->registration_fee     = '0.00';
        $this->is_qualified         = '0';
        $this->total_marks          = '0';
        $this->earn_marks           = '0';
        $this->earn_percentage      = '0';
        $this->remarks              = '';
        $this->is_active            = '';
        $this->created_by           = 0;
        $this->created_on           = date('Y-m-d H:i:s');
        $this->updated_by           = 0;
        $this->updated_on           = date('Y-m-d H:i:s');
        $this->table_name           = DB_NAME.'registration';
    }

    function add(){
        $insert_data = [
            'registration_no'       => $this->registration_no,
            'branch_id'             => $this->branch_id,
            'enquiry_id'            => $this->enquiry_id,
            'registration_date'     => $this->registration_date,
            'registration_fee'      => $this->registration_fee,
            'is_qualified'          => $this->is_qualified,
            'total_marks'           => $this->total_marks,
            'earn_marks'            => $this->earn_marks,
            'earn_percentage'       => $this->earn_percentage,
            'remarks'               => $this->remarks,
            'is_active'             => $this->is_active,
            'created_by'            => $this->created_by,
            'created_on'            => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->registration_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $where['registration_no'] = $this->registration_no;
        $where['is_active'] = $this->is_active;
        $where['branch_id'] = $this->branch_id;
        $where['enquiry_id'] = $this->enquiry_id;
        $results = $this->global_model->select($this->table_name, $where);
        if(isset($results) && $results->num_rows() > 0){
            $this->registration_id = $results->row()->registration_id;
            return true;
        }else{
            return false;
        }
    }

    function update(){
        $where['registration_id'] = $this->registration_id;
        $update_data = [
            'registration_no'       => $this->registration_no,
            'registration_date'     => $this->registration_date,
            'registration_fee'      => $this->registration_fee,
            'is_qualified'          => $this->is_qualified,
            'total_marks'           => $this->total_marks,
            'earn_marks'            => $this->earn_marks,
            'earn_percentage'       => $this->earn_percentage,
            'remarks'               => $this->remarks,
            'updated_by'            => $this->updated_by,
            'updated_on'            => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where['registration_id'] = $this->registration_id;
        $update_data = [
            'is_active'             => $this->is_active,
            'updated_by'            => $this->updated_by,
            'updated_on'            => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get(){
        
    }
}