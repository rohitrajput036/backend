<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model {

    public $city_id, $state_id, $city_name, $sort_order, $created_by, $created_on, $updated_by, $updated_on, $is_active, $city_alias_name, $table_name;

    function __construct() {
        parent::__construct();
        $this->city_id      = 0;
        $this->state_id     = 0;
        $this->city_name    ='';
        $this->sort_order   = '';
        $this->created_by   = 0;
        $this->created_on   = date('Y-m-d H:i:s');
        $this->updated_by   = 0;
        $this->updated_on   = date('Y-m-d H:i:s');
        $this->is_active    = '';
        $this->city_alias_name = '';
        $this->table_name = DB_NAME.'city';
    }

    function add(){
        $insert_data =[
        'state_id'      => $this->state_id,
        'city_name'     => strtoupper($this->city_name),
        'sort_order'    => $this->sort_order,
        'created_by'    => $this->created_by,
        'created_on'    => $this->created_on,
        'is_active'     => $this->is_active,
        'city_alias_name'     => $this->city_alias_name
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->city_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function update(){
        $where['city_id'] = $this->city_id;
        $update_data = [
        'state_id'      => $this->state_id,
        'city_name'     => strtoupper($this->city_name),
        'sort_order'    => $this->sort_order,
        'updated_by'    => $this->updated_by,
        'updated_on'    => $this->updated_on,
        'city_alias_name'     => $this->city_alias_name
        ];
        $this->global_model->update($this->table_name, $update_data, $where);
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['city_name' => strtoupper($this->city_name)]);
        if ($Results->num_rows() > 0) {
            $this->city_id = $Results->row()->city_id;
            return true;
        } else {
            return false;
        }
    }

    function delete(){
        $where['city_id'] = $this->city_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        $results = $this->global_model->update($this->table_name, $update_data, $where);
        return $results;
    }

    function get($for_table = false){
        $this->load->model('state_model');
        if($this->city_id > 0){
            $where['c.city_id'] = $this->city_id;
        }
        if($this->state_id > 0){
            $where['c.state_id'] = $this->state_id;
        }
        if(!empty($this->is_active)){
            $where['c.is_active'] = $this->is_active;
        }else{
            $where['is_active IN ("1","2")'] = NULL;
        }
        $joins = [
            $this->state_model->table_name.' s' => ['(c.state_id = s.state_id AND s.status=1)','INNER']
        ];
        $fields = 'c.*,s.state_name';
        $order_by = ['city_name' => 'ASC'];
        $results = $this->global_model->select($this->table_name.' c',$where, $fields, $joins, NULL,NULL, $order_by);
        // echo $this->db->last_query();exit;
        $output = [];
        if(isset($results) && $results->num_rows() > 0){
            $i=0;
            foreach($results->result() as $result){
                ++$i;
                if($for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<btn class="btn active_deactive" data-city_id="'.$result->city_id.'" data-at="2"><i class="fa fa-check text-green"></i></btn>';
                    }else{
                        $active_deactive_btn = '<btn class="btn active_deactive" data-city_id="'.$result->city_id.'" data-at="1"><i class="fa fa-times text-red"></i></btn>';
                    }
                    $delete_btn = '<btn class="btn active_deactive" data-city_id="'.$result->city_id.'" data-at="3"><i class="fa fa-trash text-red"></i></btn>';
                    $edit_btn = '<btn class="btn edit" data-city_id="'.$result->city_id.'" data-state_id="'.$result->state_id.'" data-city_name="'.$result->city_name.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn. $delete_btn. $edit_btn;
                    $output[] = [
                        $i,
                        $result->state_name,
                        $result->city_name,
                        $btns
                    ];
                }else{
                    $output[] = [
                        'city_id'           => $result->city_id,
                        'state_id'          => $result->state_id,
                        'city_name'         => $result->city_name,
                        'sort_order'        => $result->sort_order,
                        'city_alias_name'   => $result->city_alias_name,
                        'created_on'        =>$result->created_on,
                        'is_active'            =>$result->is_active
                    ];
                }
            }
        }
        return $output;
    }
}