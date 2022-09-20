<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model_mango extends CI_Model {

    public $role_id, $role, $is_dev_op, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;

    function __construct() {
        parent::__construct();
        $this->role_id      = 0;
        $this->role         = '';
        $this->is_dev_op    = 0;
        $this->is_active    = '';
        $this->created_by   = 0;
        $this->created_on   = date('Y-m-d H:i:s');
        $this->updated_by   = 0;
        $this->updated_on   = date('Y-m-d H:i:s');
        $this->table_name   = 'role';
    }

    function add(){
        $insert_data = [
            'role' => $this->role,
            'is_dev_op' => $this->is_dev_op,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on,
            'updated_by' => $this->updated_by,
            'updated_on' => NULL
        ];
        $results = $this->mongo_db->insert($this->table_name,$insert_data);
        print_r($results);exit;
        // if ($this->global_model->insert($this->table_name, $insert_data)) {
        //     $this->role_id = $this->db->insert_id();
        // } else {
        //     throw new Exception("Issue in insertion", 500);
        // }
    }

    function check() {
        return false;
        $Results = $this->global_model->select($this->table_name, ['role' => $this->role]);
        if ($Results->num_rows() > 0) {
            $this->role_id = $Results->row()->role_id;
            return true;
        } else {
            return false;
        }
    }

    function update(){
        $where['role_id'] = $this->role_id;
        $update_data = [
            'role' => $this->role,
            'is_dev_op' => $this->is_dev_op,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function delete(){
        $where['role_id'] = $this->role_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function get($data_table = false){
        // $results = $this->mongo_db->get($this->table_name);
        // print_r($results);
        $where = [];
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }

        $results = $this->mongo_db->get_where($this->table_name,$where);

        print_r($results);exit;
        $output = [];
        if($this->role_id > 0){
            $where['role_id'] = $this->role_id;
        }
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active IN (1,2)'] = NULL;
        }
        $order_by = ['role' => 'ASC'];
        $resutls = $this->global_model->select($this->table_name,$where,'*',NULL,NULL,NULL,$order_by);
        if(isset($resutls) && $resutls->num_rows() > 0){
            $i=0;
            foreach($resutls->result() as $result){
                ++$i;
                if($data_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<btn class="btn active_deactive" data-roleid="'.$result->role_id.'" data-at="2"><i class="fa fa-check text-green"></i></btn>';
                    }else{
                        $active_deactive_btn = '<btn class="btn active_deactive" data-roleid="'.$result->role_id.'" data-at="1"><i class="fa fa-times text-red"></i></btn>';
                    }
                    $delete_btn = '<btn class="btn active_deactive" data-roleid="'.$result->role_id.'" data-at="3"><i class="fa fa-trash text-red"></i></btn>';
                    $edit_btn = '<btn class="btn edit" data-roleid="'.$result->role_id.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn.$delete_btn.$edit_btn;
                    $output[] = [
                        $i,
                        '<span id="role_'.$result->role_id.'">'.$result->role.'</span>',
                        $btns
                    ];
                }else{
                    $output[] = [
                        'role_id'       => $result->role_id,
                        'role'          => $result->role,
                        'is_active'     => $result->is_active,
                        'created_by'    => $result->created_by,
                        'created_on'    => $result->created_on
                    ];
                }
            }
        }
        return $output;
    }
}