<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Religion_model extends CI_Model {
    public $religion_id , $is_active, $for_table, $table_name;
    function __construct() {
        parent::__construct();
        $this->religion_id  = 0;
        $this->is_active = '';
        $this->for_table = false;
        $this->table_name = DB_NAME.'religion';
    }

    function get(){
        $output = [];
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active in (1,2)'] = NULL;
        }
        if($this->religion_id > 0){
            $where['religion_id'] = $this->nationality_id;
        }
        $order_by = ['sort_order' => 'ASC'];
        $results = $this->global_model->select($this->table_name,$where,'*',NULL,NULL,NULL,$order_by);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                if($this->for_table){
                    $output[] = [];
                }else{
                    $output[] = [
                      'religion_id'    => $result->religion_id,
                      'religion'           => $result->religion,
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