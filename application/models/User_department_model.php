<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_department_model extends CI_Model {
    public $user_department_id, $user_id, $department_id, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->user_department_id = 0; 
        $this->user_id      = 0;
        $this->department_id      = 0;
        $this->is_active    = '';
        $this->created_by   = 0;
        $this->created_on   = date('Y-m-d H:i:s');
        $this->updated_by   = 0;
        $this->updated_on   = date('Y-m-d H:i:s');
        $this->table_name   = DB_NAME.'user_department'; 
    }

    function add(){
        $insert_data = [
            'user_id'       => $this->user_id,
            'department_id'       => $this->department_id,
            'is_active'     => $this->is_active,
            'created_by'    => $this->created_by,
            'created_on'    => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->user_department_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['user_id' => $this->user_id, 'department_id' => $this->department_id, 'is_active' => $this->is_active]);
        if ($Results->num_rows() > 0) {
            $this->user_department_id = $Results->row()->user_department_id;
            return true;
        } else {
            return false;
        }
    }

    function check_for_user(){
        $Results = $this->global_model->select($this->table_name, ['user_id' => $this->user_id, 'is_active' => $this->is_active]);
        if ($Results->num_rows() > 0) {
            $this->user_department_id = $Results->row()->user_department_id;
            return true;
        } else {
            return false;
        }
    }

    function update(){
        $where['user_department_id'] = $this->user_department_id;
        $update_data = [
            'user_id'       => $this->user_id,
            'department_id'       => $this->department_id,
            'updated_by'    => $this->updated_by,
            'updated_on'    => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function delete(){
        $where['user_department_id'] = $this->user_department_id;
        $update_data = [
            'is_active'     => $this->is_active,
            'updated_by'    => $this->updated_by,
            'updated_on'    => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }
    function delete_all(){
        $where['user_id'] = $this->user_id;
        $update_data = [
            'is_active'     => $this->is_active,
            'updated_by'    => $this->updated_by,
            'updated_on'    => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function get(){
        $this->load->model('department_model');
        $output = [];
        if(!empty($this->is_active)){
            $where['ud.is_active'] = $this->is_active;
        }
        if($this->user_id > 0){
            $where['ud.user_id'] = $this->user_id;
        }
        $joins = [
            $this->department_model->table_name.' d' => ['(ud.department_id = d.department_id)','INNER']
        ];
        $order_by = ['d.department' => 'ASC'];
        $results = $this->global_model->select($this->table_name.' ud',$where,'*',$joins);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'user_department_id' => $result->user_department_id,
                    'user_id' => $result->user_id,
                    'department_id' => $result->department_id,
                    'department' => $result->department
                ];
            }
        }
        return $output; 
    }
}