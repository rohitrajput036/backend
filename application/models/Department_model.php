<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {
    public $department_id,$department,$is_ho,$is_active,$created_by,$created_on,$updated_by,$updated_on,$table_name;
    function __construct() {
        parent::__construct();
        $this->department_id = 0;
        $this->department = '';
        $this->is_ho  = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = 'department_master';
    }

    function add(){
        $insert_data = [
            'department_id' => $this->department_id,
            'department'    => $this->department,
            'is_ho'         => $this->is_ho,
            'is_active'     => $this->is_active,
            'created_by'    => $this->created_by,
            'created_on'    => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->department_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function get(){
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active in ("Y","N")'] = NULL;
        }
        if(!empty($this->is_ho)){
            $where['is_ho'] = $this->is_ho;
        }
        if($this->department_id > 0){
            $where['department_id'] = $this->department_id;
        }
        $results = $this->global_model->select($this->table_name,$where);
        $output = [];
        if(isset($results) && $results->num_rows() > 0){
            $i=0;
            foreach($results->result() as $result){
                ++$i;
                $output[] = [
                    'sno'   => $i,
                    'department_id' => $result->department_id,
                    'department'    => $result->department,
                    'is_ho'         => $result->is_ho,
                    'is_active'     => $result->is_active
                ];
            }
        }
        return $output;
    }
}