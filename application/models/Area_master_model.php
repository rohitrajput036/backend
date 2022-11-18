<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Area_master_model extends CI_Model {
    
    public $area_master_id, $city_id, $area_name, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->area_master_id   = 0;
        $this->state_id         = 0;
        $this->city_id          = 0;
        $this->area_name        = '';
        $this->is_active        = '';
        $this->created_by       = 0;
        $this->created_on       = date('Y-m-d H:i:s');
        $this->updated_by       = 0;
        $this->updated_on       = date('Y-m-d H:i:s');
        $this->table_name       = DB_NAME.'area_master';
    }

    function add(){
        $insert_data = [
            'state_id'      => $this->state_id,
            'city_id'       => $this->city_id,
            'area_name'     => strtoupper($this->area_name),
            'is_active'     => $this->is_active,
            'created_by'    => $this->created_by,
            'created_on'    => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->area_master_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['area_name' => $this->area_name]);
        if ($Results->num_rows() > 0) {
            $this->country_id = $Results->row()->country_id;
            return true;
        } else {
            return false;
        }
    }

    function update(){
        $where['area_master_id'] = $this->area_master_id;
        $update_data = [
            'state_id'  => $this->state_id,
            'city_id' => $this->city_id,
            'area_name' => strtoupper($this->area_name),
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where['area_master_id'] = $this->area_master_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get($for_table = false){
        $output = [];
        $this->load->model('city_model');
        $this->load->model('state_model');
        if($this->area_master_id > 0){
            $where['a.area_master_id'] = $this->area_master_id;
        }
        if($this->state_id > 0){
            $where['s.state_id'] = $this->state_id;
        }
        if(!empty($this->is_active)){
            $where['a.is_active'] = $this->is_active;
        }else{
            $where['a.is_active IN (1,2)'] = NULL;
        }
        $joins=[
            $this->state_model->table_name.' s'=> ['a.state_id = s.state_id AND s.status = 1','INNER'],
            $this->city_model->table_name.' c'=> ['a.city_id = c.city_id AND c.is_active = 1','INNER']
        ];
        $fields = 'a.*,s.state_name,c.city_name';
        $order_by = ['area_name' => 'ASC'];
        $resutls = $this->global_model->select($this->table_name.' a', $where, $fields, $joins,NULL,NULL, $order_by);
        if(isset($resutls) && $resutls->num_rows() > 0){
            $i=0;
            foreach($resutls->result() as $result){
                ++$i;
                if($for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<btn class="btn active_deactive" data-area_master_id="'.$result->area_master_id.'" data-at="2"><i class="fa fa-check text-green"></i></btn>';
                    }else{
                        $active_deactive_btn = '<btn class="btn active_deactive" data-area_master_id="'.$result->area_master_id.'" data-at="1"><i class="fa fa-times text-red"></i></btn>';
                    }
                    $delete_btn = '<btn class="btn active_deactive" data-area_master_id="'.$result->area_master_id.'" data-at="3"><i class="fa fa-trash text-red"></i></btn>';
                    $edit_btn = '<btn class="btn edit" data-area_master_id="'.$result->area_master_id.'" data-area_name="'.$result->area_name.'" data-state_id="'.$result->state_id.'" data-city_id="'.$result->city_id.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn. $delete_btn. $edit_btn;
                    $output[] = [
                        $i,
                        $result->city_name.' / '.$result->state_name,
                        $result->area_name,
                        $btns
                    ];
                }else{
                    $output[] = [
                        'area_master_id' => $result->area_master_id,
                        'state_id'       => $result->state_id,
                        'city_id'        => $result->city_id,
                        'area_name'      => $result->area_name,
                        'is_active'      => $result->is_active,
                        'created_by'     => $result->created_by,
                        'created_on'     => $result->created_on
                    ];
                }
            }
        }
        return $output;
    }
}