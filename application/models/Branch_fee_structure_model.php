<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_fee_structure_model extends CI_Model {
    public $branch_fee_structure_id, $branch_id, $fee_structure_master_id, $fee_amount, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->branch_fee_structure_id  = 0;
        $this->branch_id                = 0;
        $this->fee_structure_master_id  = 0;
        $this->fee_amount               = '0.00';
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
        
    }
}