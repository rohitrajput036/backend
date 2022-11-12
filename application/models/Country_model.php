<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends CI_Model {

    public $country_id, $country_name, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;

    function __construct() {
        parent::__construct();
        $this->country_id       = 0;
        $this->country_name     = '';
        $this->is_active        = '';
        $this->created_by       = 0;
        $this->created_on       = date('Y-m-d H:i:s');
        $this->updated_by       = 0;
        $this->updated_on       = date('Y-m-d H:i:s');
        $this->table_name       = DB_NAME.'country';
    }

    function add(){
        $insert_data = [
            'country_name'  => strtoupper($this->country_name),
            'is_active'     => $this->is_active,
            'created_by'    => $this->created_by,
            'created_on'    => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->country_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check() {

        $Results = $this->global_model->select($this->table_name, ['country_name' => $this->country_name]);
        if ($Results->num_rows() > 0) {
            $this->country_id = $Results->row()->country_id;
            return true;
        } else {
            return false;
        }
    }

    function update(){
        $where['country_id'] = $this->country_id;
        $update_data = [
            'country_name' =>strtoupper($this->country_name),
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where['country_id'] = $this->country_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get($data_table = false){
        $output = [];
        if($this->country_id > 0){
            $where['country_id'] = $this->country_id;
        }
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active IN (1,2)'] = NULL;
        }
        $order_by = ['country_name' => 'ASC'];
        $resutls = $this->global_model->select($this->table_name, $where,'*', NULL,NULL,NULL, $order_by);
        if(isset($resutls) && $resutls->num_rows() > 0){
            $i=0;
            foreach($resutls->result() as $result){
                ++$i;
                if($data_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<btn class="btn active_deactive" data-country_id="'.$result->country_id.'" data-at="2"><i class="fa fa-check text-green"></i></btn>';
                    }else{
                        $active_deactive_btn = '<btn class="btn active_deactive" data-country_id="'.$result->country_id.'" data-at="1"><i class="fa fa-times text-red"></i></btn>';
                    }
                    $delete_btn = '<btn class="btn active_deactive" data-country_id="'.$result->country_id.'" data-at="3"><i class="fa fa-trash text-red"></i></btn>';
                    $edit_btn = '<btn class="btn edit" data-country_id="'.$result->country_id.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn. $delete_btn. $edit_btn;
                    $output[] = [
                        $i,
                        '<span id="country_'.$result->country_id.'">'.$result->country_name.'</span>',
                        $btns
                    ];
                }else{
                    $output[] = [
                        'country_id'         => $result->country_id,
                        'country_name'       => $result->country_name,
                        'is_active'         => $result->is_active,
                        'created_by'        => $result->created_by,
                        'created_on'        => $result->created_on
                    ];
                }
            }
        }
        return $output;
    }
}
