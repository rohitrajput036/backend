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

    function get($for_table = false){
        $output = [];
        if($this->cast_category_id > 0){
            $where['cast_category_id'] = $this->cast_category_id;
        }
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active IN (1,2)'] = NULL;
        }
        $order_by = ['cast_name' => 'ASC'];
        $resutls = $this->global_model->select($this->table_name, $where,'*', NULL,NULL,NULL, $order_by);
        if(isset($resutls) && $resutls->num_rows() > 0){
            $i=0;
            foreach($resutls->result() as $result){
                ++$i;
                if($for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<btn class="btn active_deactive" data-cast_category_id="'.$result->cast_category_id.'" data-at="2"><i class="fa fa-check text-green"></i></btn>';
                    }else{
                        $active_deactive_btn = '<btn class="btn active_deactive" data-cast_category_id="'.$result->cast_category_id.'" data-at="1"><i class="fa fa-times text-red"></i></btn>';
                    }
                    $delete_btn = '<btn class="btn active_deactive" data-cast_category_id="'.$result->cast_category_id.'" data-at="3"><i class="fa fa-trash text-red"></i></btn>';
                    $edit_btn = '<btn class="btn edit" data-cast_category_id="'.$result->cast_category_id.'" data-cast_name="'.$result->cast_name.'" data-short_code="'.$result->short_code.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn. $delete_btn. $edit_btn;
                    $output[] = [
                        $i,
                        $result->cast_name,
                        $result->short_code,
                        $btns
                    ];
                }else{
                    $output[] = [
                        'cast_category_id'     => $result->cast_category_id,
                        'cast_name'            => $result->cast_name,
                        'short_code'           => $result->short_code,
                        'sort_order'           => $result->sort_order,
                        'is_active'            => $result->is_active,
                        'created_by'           => $result->created_by,
                        'created_on'           => $result->created_on
                    ];
                }
            }
        }
        return $output;
    }
}