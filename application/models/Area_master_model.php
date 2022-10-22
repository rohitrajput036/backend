<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Area_master_model extends CI_Model {
    public $area_master_id, $city_id, $area_name, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->area_master_id   = 0; 
        $this->city_id          = 0; 
        $this->area_name        = '';
        $this->is_active        = '';
        $this->created_by       = 0;
        $this->created_on       = date('Y-m-d H:i:s');
        $this->updated_by       = 0;
        $this->updated_on       = date('Y-m-d H:i:s');
        $this->table_name       = DB_NAME.'area_master';
    }

    function add(){
        $insert_data = [
            'city_id'       => $this->city_id,
            'area_name'     => $this->area_name,
            'is_active'     => $this->is_active,
            'created_by'    => $this->created_by,
            'created_on'    => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->area_master_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $where['is_active'] = 1;
        $where['city_id'] = $this->city_id;
        $where['area_name'] = $this->area_name;
        $results = $this->global_model->select($this->table_name,$where);
        if(isset($results) && $results->num_rows() > 0){
            $this->area_master_id = $results->row()->area_master_id;
            return true;
        }else{
            return false;
        }
    }

    function update(){
        $where['area_master_id'] = $this->area_master_id;
        $update_data = [
            'city_id' => $this->city_id,
            'area_name' => $this->area_name,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where['area_master_id'] = $this->area_master_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get(){
        $this->load->model('city_model');
        $output = [];
        if(!empty($this->is_active)){
            $where['a.is_active'] = $this->is_active;
        }else{
            $where['a.is_active in (1,2)'] = NULL;
        }
        if($this->city_id > 0){
            $where['a.city_id'] = $this->city_id;
        }
        $joins = [
            $this->city_model->table_name.' c' => ['(a.city_id = c.city_id AND c.is_active = 1)','INNER']
        ];
        $fields = 'area_master_id,c.city_id,area_name,city_name,a.is_active';
        $order_by = ['area_name' => 'ASC'];
        $results = $this->global_model->select($this->table_name.' a', $where, $fields, $joins, NULL, NULL, $order_by);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'area_master_id' => $result->area_master_id,
                    'city_id' => $result->city_id,
                    'area_name' => $result->area_name,
                    'city_name' => $result->city_name,
                    'is_active' => $result->is_active
                ];
            }
        }
        return $output;
    }
}