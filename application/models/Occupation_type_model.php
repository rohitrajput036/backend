<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Occupation_type_model extends CI_Model {
    
    public $occupation_type_id, $occupation_type, $gender_type, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    
    function __construct() {
        parent::__construct();
        $this->occupation_type_id = 0;
        $this->occupation_type = '';
        $this->gender_type = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'occupation_type';
    }

    function add(){
        $insert_data = [
            'occupation_type'    => $this->occupation_type,
            'gender_type'        => $this->gender_type,
            'is_active'         => $this->is_active,
            'created_by'        => $this->created_by,
            'created_on'        => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->occupation_type_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function update(){
        $where['occupation_type_id'] = $this->occupation_type_id;
        $update_data = [
            'occupation_type'    => $this->occupation_type,
            'gender_type'        => $this->gender_type,
            'updated_by'        => $this->updated_by,
            'updated_on'        => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function delete(){
        $where['occupation_type_id'] = $this->occupation_type_id;
        $update_data = [
            'is_active'        => $this->is_active,
            'updated_by'       => $this->updated_by,
            'updated_on'       => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function get(){
        $output = [];
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active IN (1,2)'] = NULL;
        }
        if(!empty($this->gender_type)){
            $where['gender_type IN (1,'.$this->gender_type.')'] = NULL;
        }
        $order_by = ['occupation_type' => 'ASC'];
        $results = $this->global_model->select($this->table_name,$where,'*',NULL,NULL,NULL,$order_by);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'occupation_type_id' => $result->occupation_type_id,
                    'occupation_type'    => $result->occupation_type,
                    'gender_type'        => $result->gender_type,
                    'is_active'         => $result->is_active,
                    'created_by'        => $result->created_by,
                    'created_on'        => $result->created_on
                ];
            }
        }
        return $output;
    }
}