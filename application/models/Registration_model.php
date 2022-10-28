<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Registration_model extends CI_Model {
    
    public $registration_id, $branch_id, $enquiry_id, $registration_no, $registration_date, $registration_fee, $is_qualified, $total_marks, $earn_marks, $earn_percentage, $remarks, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $datatable;
    
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
        $this->datatable            = (object)[];
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
    function total_data(){
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active in (1,2)'] = NULL;
        }
        if($this->branch_id > 0){
            $where['branch_id'] = $this->branch_id;
        }
        $results = $this->global_model->select($this->table_name,$where);
        return $results->num_rows();
    }
    function get(){
        $output = [];
        if(!empty($this->is_active)){
            $where['r.is_active'] = $this->is_active;
        }else{
            $where['r.is_active in (1,2)'] = NULL;
        }
        if($this->datatable->branch_id > 0){
            $this->branch_id = $this->datatable->branch_id;
        }
        $where['r.branch_id'] = $this->branch_id;
        $or_like = [];
        $limit = NULL;
        $order_by = NULL;
        if($this->datatable->length>0) {
            $limit = [$this->datatable->length, $this->datatable->start];
        }
        if(!empty($this->datatable->search->value)){
            $or_like = [
                // 'vendor_name'  => $this->datatable->search->value,
                // 'vendor_address'  => $this->datatable->search->value
            ];
        }
        $fields = '*';
        $results = $this->global_model->select($this->table_name.' r', $where, $fields, NULL, NULL, $limit, $order_by, NULL, NULL, NULL, NULL, NULL, NULL, $or_like);
        echo $this->db->last_query();exit;
        if(!empty($this->datatable)){
            $output = $this->prepare_result_datatable($results);
        }else{
            $output = $this->prepare_result($results);
        }
        return $output;
    }
    function prepare_result_datatable($results){
        $data = [];
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $results){
                $data[] = [
                        1,
                        2,
                        3,
                        4,
                        5,
                        6,
                        7
                    ];   
            }
        }
        $output = [
            'draw'              => $this->datatable->draw,
            'recordsTotal'      => $this->total_data(),
            'recordsFiltered'   => count($data),
            'data'              => $data
        ];
        return $output;
    }
    function prepare_result($results){
        $output = [];
        return $output;
    }
}