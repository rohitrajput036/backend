<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_branch_model extends CI_Model {
    public $user_branch_id, $user_id, $branch_id, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->user_branch_id = 0; 
        $this->user_id      = 0;
        $this->branch_id      = 0;
        $this->is_active    = '';
        $this->created_by   = 0;
        $this->created_on   = date('Y-m-d H:i:s');
        $this->updated_by   = 0;
        $this->updated_on   = date('Y-m-d H:i:s');
        $this->table_name   = DB_NAME.'user_branch'; 
    }

    function add(){
        $insert_data = [
            'user_id'       => $this->user_id,
            'branch_id'       => $this->branch_id,
            'is_active'     => $this->is_active,
            'created_by'    => $this->created_by,
            'created_on'    => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->user_branch_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['user_id' => $this->user_id, 'branch_id' => $this->branch_id, 'is_active' => $this->is_active]);
        if ($Results->num_rows() > 0) {
            $this->user_branch_id = $Results->row()->user_branch_id;
            return true;
        } else {
            return false;
        }
    }

    function update(){
        $where['user_branch_id'] = $this->user_branch_id;
        $update_data = [
            'user_id'       => $this->user_id,
            'branch_id'       => $this->branch_id,
            'updated_by'    => $this->updated_by,
            'updated_on'    => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function delete(){
        $where['user_branch_id'] = $this->user_branch_id;
        $update_data = [
            'is_active'     => $this->is_active,
            'updated_by'    => $this->updated_by,
            'updated_on'    => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function get(){

    }
}