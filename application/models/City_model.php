<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model {

    public $state_id,$table_name;

    function __construct() {
        parent::__construct();
        $this->state_id = 0;
        $this->table_name = 'cities';
    }

    function get(){
        $output = [];
        $where = NULL;
        if($this->state_id > 0){
            $where['state_id'] = $this->state_id;
        }
        $order_by = ['name' => 'ASC'];
        $results = $this->global_model->select($this->table_name,$where,'*',NULL,NULL,NULL,$order_by);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'id' => $result->id,
                    'name' => $result->name
                ];
            }
        }
        return $output;
    }
}