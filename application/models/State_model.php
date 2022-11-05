<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State_model extends CI_Model {

    public $state_id, $country_id, $state_name, $state_code, $zone, $gst_code, $union_territories, $sort_order, $created_on, $updated_by, $status, $table_name;

    function __construct() {
        parent::__construct();
        $this->state_id = 0;
        $this->country_id = 0;
        $this->state_name ='';
        $this->state_code = '';
        $this->zone = '';
        $this->gst_code = '';
        $this->union_territories = '';
        $this->sort_order = '';
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->status = '';
        $this->table_name = DB_NAME.'state';
    }

    function add(){
        $insert_data =[
        'country_id' => $this->country_id,
        'state_name' => strtoupper($this->state_name),
        'state_code' => $this->state_code,
        'zone' => $this->zone,
        'gst_code' => $this->gst_code,
        'union_territories' => $this->union_territories,
        'sort_order' => $this->sort_order,
        'created_on' => $this->created_on,
        'status' => $this->status
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->state_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function update(){
        $where['state_id'] = $this->state_id;
        $update_data = [
        'country_id' => $this->country_id,
        'state_name' => strtoupper($this->state_name),
        'state_code' => $this->state_code,
        'zone' => $this->zone,
        'gst_code' => $this->gst_code,
        'union_territories' => $this->union_territories,
        'sort_order' => $this->sort_order,
        'update_by' => $this->update_by
        ];
        $this->global_model->update($this->table_name, $update_data, $where);
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['state_name' => strtoupper($this->state_name)]);
        if ($Results->num_rows() > 0) {
            $this->state_id = $Results->row()->state_id;
            return true;
        } else {
            return false;
        }
    }

    function delete(){
        $update_data = [
            'status' => $this->status,
            'updated_by' => $this->updated_by
        ];
        $results = $this->global_model->update($this->table_name, $update_data, $where);
        return $results;
    }

    function get(){
        $output = [];
        $where = NULL;
        if($this->country_id > 0){
            $where['country_id'] = $this->country_id;
        }
        if(!empty($this->status)){
            $where['status'] = $this->status;
        }
        $order_by = ['state_name' => 'ASC'];
        $results = $this->global_model->select($this->table_name,$where,'*',NULL,NULL,NULL,$order_by);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'state_id' => $result->state_id,
                    'state_name' => $result->state_name,
                    'state_code' => $result->state_code
                ];
            }
        }
        return $output;
    }
}