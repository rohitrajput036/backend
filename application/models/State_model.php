<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State_model extends CI_Model {

    public $state_id, $country_id, $state_name, $state_code, $zone, $gst_code, $union_territories, $sort_order, $created_on, $updated_by, $status, $table_name;

    function __construct() {
        parent::__construct();
        $this->state_id = 0;
        $this->country_id = 0;
        $this->state_name ='';
        $this->state_code = '';
        $this->zone = '';
        $this->gst_code = '';
        $this->union_territories = '';
        $this->sort_order = '';
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->status = '';
        $this->table_name = DB_NAME.'state';
    }

    function add(){
        $insert_data =[
        'country_id' => $this->country_id,
        'state_name' => strtoupper($this->state_name),
        'state_code' => $this->state_code,
        'zone' => $this->zone,
        'gst_code' => $this->gst_code,
        'union_territories' => $this->union_territories,
        'sort_order' => $this->sort_order,
        'created_on' => $this->created_on,
        'status' => $this->status
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->state_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function update(){
        $where['state_id'] = $this->state_id;
        $update_data = [
        'country_id' => $this->country_id,
        'state_name' => strtoupper($this->state_name),
        'state_code' => $this->state_code,
        'zone' => $this->zone,
        'gst_code' => $this->gst_code,
        'union_territories' => $this->union_territories,
        'sort_order' => $this->sort_order,
        'update_by' => $this->update_by
        ];
        $this->global_model->update($this->table_name, $update_data, $where);
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['state_name' => strtoupper($this->state_name)]);
        if ($Results->num_rows() > 0) {
            $this->state_id = $Results->row()->state_id;
            return true;
        } else {
            return false;
        }
    }

    function delete(){
        $where['state_id'] = $this->state_id;
        $update_data = [
            'status' => $this->status,
            'updated_by' => $this->updated_by
        ];
        $results = $this->global_model->update($this->table_name, $update_data, $where);
        return $results;
    }

    function get($for_table = false){
        $this->load->model('country_model');
        if($this->state_id > 0){
            $where['s.state_id'] = $this->state_id;
        }
        if($this->country_id > 0){
            $where['s.country_id'] = $this->country_id;
        }
        if(!empty($this->status)){
            $where['s.status'] = $this->status;
        }else{
            $where['status IN ("1","2")'] = NULL;
        }
        $joins = [
            $this->country_model->table_name.' c' => ['(s.country_id = c.country_id AND c.is_active=1)','INNER']
        ];
        $fields = 's.*,c.country_name';
        $order_by = ['state_name' => 'ASC'];
        $results = $this->global_model->select($this->table_name.' s',$where, $fields, $joins, NULL,NULL, $order_by);
        // echo $this->db->last_query();exit;
        $output = [];
        if(isset($results) && $results->num_rows() > 0){
            $i=0;
            foreach($results->result() as $result){
                ++$i;
                if($for_table){
                    if($result->status == 1){
                        $active_deactive_btn = '<btn class="btn active_deactive" data-state_id="'.$result->state_id.'" data-at="2"><i class="fa fa-check text-green"></i></btn>';
                    }else{
                        $active_deactive_btn = '<btn class="btn active_deactive" data-state_id="'.$result->state_id.'" data-at="1"><i class="fa fa-times text-red"></i></btn>';
                    }
                    $delete_btn = '<btn class="btn active_deactive" data-state_id="'.$result->state_id.'" data-at="3"><i class="fa fa-trash text-red"></i></btn>';
                    $edit_btn = '<btn class="btn edit" data-state_id="'.$result->state_id.'" data-country_id="'.$result->country_id.'" data-state_name="'.$result->state_name.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn. $delete_btn. $edit_btn;
                    $output[] = [
                        $i,
                        $result->country_name,
                        $result->state_name,
                        $btns
                    ];
                }else{
                    $output[] = [
                        'state_id'         => $result->state_id,
                        'country_id'       => $result->country_id,
                        'state_name'         => $result->state_name,
                        'state_code'        => $result->state_code,
                        'zone'              => $result->zone,
                        'gst_code'          =>$result->gst_code,
                        'union_territories' =>$result->union_territories,
                        'sort_order'        =>$result->sort_order,
                        'created_on'        =>$result->created_on,
                        'status'            =>$result->status
                    ];
                }
            }
        }
        return $output;
    }
}