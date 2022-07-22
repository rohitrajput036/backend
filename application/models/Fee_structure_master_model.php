<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fee_structure_master_model extends CI_Model {
    public $fsid,$structure_name,$is_required,$is_active,$created_by,$created_on,$updated_by,$updated_on,$table_name;
    function __construct() {
        parent::__construct();
        $this->fsid = 0;
        $this->structure_name = '';
        $this->is_required = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = 'fee_structure_branch';
    }

    function get(){
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active in ("Y","N")'] = NULL;
        }
        $results = $this->global_model->select($this->table_name,$where);
        $output = [];
        if(isset($results) && $results->num_rows()>0){
            $i=0;
            foreach($results->result() as $result){
                ++$i;
                $output[] = [
                    'sno'   => $i,
                    'fsid'              => $result->fsid,
                    'structure_name'    => $result->structure_name,
                    'is_required'       => $result->is_required,
                    'is_active'         => $result->is_active
                ];
            }
        }
        return $output;
    }
}