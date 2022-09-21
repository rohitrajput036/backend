<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State_model extends CI_Model {

    public $state_id, $country_id, $state_name, $state_code, $zone, $gst_code, $union_territories, $sort_order, $created_on, $updated_by, $status, $table_name;

    function __construct() {
        parent::__construct();
        $this->country_id = 0;
        $this->status = '';
        $this->table_name = 'state';
    }

    function get(){
        $output = [];
        $where = NULL;
        if($this->country_id > 0){
            $where['country_id'] = $this->country_id;
        }
        if(!empty($this->status)){
            $where['status'] = $this->status;
        }
        $order_by = ['state_name' => 'ASC'];
        $results = $this->global_model->select($this->table_name,$where,'*',NULL,NULL,NULL,$order_by);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'state_id' => $result->state_id,
                    'state_name' => $result->state_name
                ];
            }
        }
        return $output;
    }
}