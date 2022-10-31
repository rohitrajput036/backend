<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route_master_model extends CI_Model{

    public $route_master_id, $branch_id, $route_name, $vehicle_master_id, $driver_master_id, $guard_id, $is_active, $created_by, $created_on, $updated_by, $updated_on;

    function __construct(){
        parent:: __construct();
        $this->route_master_id  = 0;
        $this->branch_id        = '';
        $this->route_name       = '';
        $this->vehicle_master_id = '';
        $this->driver_master_id = '';
        $this->guard_id         = '';
        $this->is_active        = '';
        $this->created_by       = 0;
        $this->created_on       = date('Y-m-d H:i:s');
        $this->updated_by       = 0;
        $this->updated_on       = date('Y-m-d H:i:s');
        $this->table_name       = DB_NAME.'route_master';
    }

    function add(){
        $insert_data=[
            'branch_id' => $this->branch_id,
            'route_name' => $this->route_name,
            'vehicle_master_id' => $this->vehicle_master_id,
            'driver_master_id' => $this->driver_master_id,
            'guard_id' => $this->guard_id,
            'is_active'   => $this->is_active,
            'created_by'  => $this->created_by,
            'created_on'  => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->route_master_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['route_name' => $this->route_name]);
        if ($Results->num_rows() > 0) {
            $this->route_master_id = $Results->row()->route_master_id;
            return true;
        } else {
            return false;
        }
    }

    function update(){
        $where['route_master_id'] = $this->route_master_id;
        $update_data =[
            'branch_id' => $this->branch_id,
            'route_name' => $this->route_name,
            'vehicle_master_id' => $this->vehicle_master_id,
            'driver_master_id' => $this->driver_master_id,
            'guard_id' => $this->guard_id,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }
    function delete(){
        $where['route_master_id'] = $this->route_master_id;
        $update_data =[
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get(){
        
    }
}
