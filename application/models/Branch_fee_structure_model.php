<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_fee_structure_model extends CI_Model {
    public $branch_fee_structure_id, $branch_id, $fee_structure_master_id, $fee_amount, $fee_type, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->branch_fee_structure_id  = 0;
        $this->branch_id                = 0;
        $this->fee_structure_master_id  = 0;
        $this->fee_amount               = '0.00';
        $this->fee_type                 = '';
        $this->is_active                = '';
        $this->created_by               = 0;
        $this->created_on               = date('Y-m-d H:i:s');
        $this->updated_by               = 0;
        $this->updated_on               = date('Y-m-d H:i:s');
        $this->table_name               = DB_NAME.'branch_fee_structure';
    }

    function add(){
        $insert_data = [
            'branch_id'                 => $this->branch_id,
            'fee_structure_master_id'   => $this->fee_structure_master_id,
            'fee_amount'                => $this->fee_amount,
            'fee_type'                  => $this->fee_type,
            'is_active'                 => $this->is_active,
            'created_by'                => $this->created_by,
            'created_on'                => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->branch_fee_structure_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $where['branch_id'] = $this->branch_id;
        $where['fee_structure_master_id'] = $this->fee_structure_master_id;
        $where['is_active'] = 1;
        $resutls = $this->global_model->select($this->table_name,$where);
        if(isset($resutls) && $resutls->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function delete(){
        $where['is_active'] = 1;
        if($this->branch_fee_structure_id > 0){
            $where['branch_fee_structure_id'] = $this->branch_fee_structure_id;
        }else{
            $where['branch_id'] = $this->branch_id;
        }
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);

    }
    function get(){
        $where = [];
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }
        if($this->branch_fee_structure_id > 0){
            $where['branch_fee_structure_id'] = $this->branch_fee_structure_id;
        }
        if($this->fee_structure_master_id > 0){
            $where['fee_structure_master_id'] = $this->fee_structure_master_id;
        }
        if($this->branch_id > 0){
            $where['branch_id'] = $this->branch_id;
        }
        $results = $this->global_model->select($this->table_name,$where);
        if(isset($results) && $results->num_rows() > 0);
        foreach($results->result() as $result){
            $output [] = [
                'branch_fee_structure_id' => $result->branch_fee_structure_id,
                'fee_structure_master_id' => $result->fee_structure_master_id,
                'branch_id'                 => $result->branch_id
            ];
        }
        return $output;
    }
}