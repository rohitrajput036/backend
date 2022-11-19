<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cast_categoty_model extends CI_Model {

    public $cast_category_id, $cast_name, $short_code, $sort_order, $is_active, $created_by, $created_on, $updated_by, $updated_on, $for_table, $table_name;
    
    function __construct() {
        parent::__construct();
        $this->cast_category_id = 0;
        $this->cast_name = '';
        $this->short_code = '';
        $this->sort_order = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->for_table = false;
        $this->table_name = DB_NAME.'cast_categoty';
    }

    function add(){
        $insert_data = [
            'cast_name' => strtoupper($this->cast_name),
            'short_code' => $this->short_code,
            'sort_order' => $this->sort_order,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on,
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->cast_category_id = $this->db->insert_id();
           
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function update(){
        $where['cast_category_id'] = $this->cast_category_id;
        $update_data = [
            'cast_name' => strtoupper($this->cast_name),
            'short_code' => $this->short_code,
            'sort_order' => $this->sort_order,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on,
        ];
        $this->global_model->update($this->table_name, $update_data, $where);
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['cast_name' => strtoupper($this->cast_name)]);
        if ($Results->num_rows() > 0) {
            $this->cast_category_id = $Results->row()->cast_category_id;
            return true;
        } else {
            return false;
        }
    }

    function delete(){
        $where['cast_category_id'] = $this->cast_category_id;
        $update_data = [
            'is_active' => is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on,
        ];
        $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get(){
        $output = [];
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active in (1,2)'] = NULL;
        }
        if($this->cast_category_id > 0){
            $where['cast_category_id'] = $this->cast_category_id;
        }
        $order_by = ['sort_order' => 'ASC'];
        $results = $this->global_model->select($this->table_name,$where,'*',NULL,NULL,NULL,$order_by);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                if($this->for_table){
                    $output[] = [];
                }else{
                    $output[] = [
                      'cast_category_id'    => $result->cast_category_id,
                      'cast_name'           => $result->cast_name,
                      'short_code'          => $result->short_code,
                      'sort_order'          => $result->sort_order,
                      'is_active'           => $result->is_active,
                      'created_by'          => $result->created_by,
                      'created_on'          => $result->created_on    
                    ];
                }
            }
        }
        return $output;
    }
}