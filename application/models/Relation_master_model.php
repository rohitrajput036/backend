<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Relation_master_model extends CI_Model {
    public $relation_id, $relation, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $ignore_id;
    function __construct() {
        parent::__construct();
        $this->relation_id = 0;
        $this->relation = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'relation_master';
        $this->ignore_id = [];
    }

    function get(){
        $output = [];
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active IN (1,2)'] = NULL;
        }
        if($this->relation_id > 0){
            $where['relation_id'] = $this->relation_id;
        }
        if(!empty($this->ignore_id)){
            $where['relation_id NOT IN ('.implode(',',$this->ignore_id).')'] = NULL;
        }
        $results = $this->global_model->select($this->table_name, $where);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'relation_id' => $result->relation_id,
                    'relation' => $result->relation,
                    'is_active' => $result->is_active
                ];
            }
        }
        return $output;
    }
}