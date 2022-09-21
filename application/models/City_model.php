<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model {

    public $city_id, $state_id, $city_name, $sort_order, $created_by, $created_on, $updated_by, $updated_on, $is_active, $city_alias_name, $table_name;

    function __construct() {
        parent::__construct();
        $this->state_id = 0;
        $this->is_active = '';
        $this->table_name = 'city';
    }

    function get(){
        $output = [];
        $where = NULL;
        if($this->state_id > 0){
            $where['state_id'] = $this->state_id;
        }
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }
        $order_by = ['city_name' => 'ASC'];
        $results = $this->global_model->select($this->table_name,$where,'*',NULL,NULL,NULL,$order_by);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'city_id' => $result->city_id,
                    'city_name' => $result->city_name
                ];
            }
        }
        return $output;
    }
}