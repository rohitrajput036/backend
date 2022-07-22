<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State_model extends CI_Model {

    public $country_id,$table_name;

    function __construct() {
        parent::__construct();
        $this->country_id = 0;
        $this->table_name = 'states';
    }

    function get(){
        $output = [];
        $where = NULL;
        if($this->country_id > 0){
            $where['country_id'] = $this->country_id;
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