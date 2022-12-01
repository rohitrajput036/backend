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

    function add(){
        $insert_data = [
            'relation_id'   => $this->relation_id,
            'relation'      => $this->relation,
            'is_active'     => $this->is_active,
            'created_by'    => $this->created_by,
            'created_on'    => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->relation_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function update (){
        $where['relation'] = $this->relation_id;
        $update_data = [
            'relation'      => $this->relation,
            'updated_by'    => $this->updated_by,
            'updated_on'    => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['relation' => $this->relation]);
        if ($Results->num_rows() > 0) {
            $this->relation_id = $Results->row()->relation_id;
            return true;
        } else {
            return false;
        }
    }

    function get($for_table = false){
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