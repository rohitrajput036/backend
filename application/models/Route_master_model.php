<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route_master_model extends CI_Model{

    public $route_master_id, $branch_id, $route_name, $vehicle_master_id, $driver_master_id, $guard_id, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;

    function __construct(){
        parent:: __construct();
        $this->route_master_id  = 0;
        $this->branch_id        = '';
        $this->route_name       = '';
        $this->vehicle_master_id = '';
        $this->driver_master_id = '';
        $this->guard_id         = '';
        $this->is_active        = '';
        $this->created_by       = 0;
        $this->created_on       = date('Y-m-d H:i:s');
        $this->updated_by       = 0;
        $this->updated_on       = date('Y-m-d H:i:s');
        $this->table_name       = DB_NAME.'route_master';
    }

    function add(){
        $insert_data = [
            'branch_id' => $this->branch_id,
            'route_name' => strtoupper($this->route_name),
            'vehicle_master_id' => $this->vehicle_master_id,
            'driver_master_id' => $this->driver_master_id,
            'guard_id'          => $this->guard_id,
            'is_active'   => $this->is_active,
            'created_by'  => $this->created_by,
            'created_on'  => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->route_master_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $Results = $this->global_model->select($this->table_name, ['route_name' => strtoupper($this->route_name)]);
        if ($Results->num_rows() > 0) {
            $this->route_master_id = $Results->row()->route_master_id;
            return true;
        } else {
            return false;
        }
    }

    function update(){
        $where['route_master_id'] = $this->route_master_id;
        $update_data =[
            'branch_id' => $this->branch_id,
            'route_name' => strtoupper($this->route_name),
            'vehicle_master_id' => $this->vehicle_master_id,
            'driver_master_id' => $this->driver_master_id,
            'guard_id' => $this->guard_id,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }
    function delete(){
        $where['route_master_id'] = $this->route_master_id;
        $update_data =[
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        $results = $this->global_model->update($this->table_name, $update_data, $where);
        return $results;
    }

    function get($for_table = false){
        $this->load->model('branch_model');
        $this->load->model('vehicle_master_model');
        $this->load->model('driver_master_model');
        if($this->route_master_id > 0){
            $where['r.route_master_id'] = $this->route_master_id;
        }
        if($this->branch_id > 0){
            $where['r.branch_id'] = $this->branch_id;
        }
        if(!empty($this->is_active)){
            $where['r.is_active'] = $this->is_active;
        }else{
            $where['r.is_active IN ("1","2")'] = NULL;
        }
        $joins = [ 
            $this->branch_model->table_name.' b' => ['(r.branch_id = b.branch_id AND b.is_active = 1)','INNER'],
            $this->vehicle_master_model->table_name.' v' => ['(r.vehicle_master_id = v.vehicle_master_id AND v.is_active = 1)','LEFT'],
            $this->driver_master_model->table_name.' d' => ['r.driver_master_id = d.driver_master_id AND d.driver_type = 0 AND d.is_active = 1','LEFT'],
            $this->driver_master_model->table_name.' g' => ['r.guard_id = g.driver_master_id AND g.driver_type = 1 AND g.is_active = 1','LEFT'],
        ];
        $fields = "r.*,v.vehicle_no,d.first_name driver_first_name,d.middle_name driver_middle_name,d.last_name driver_last_name, g.first_name guard_first_name,g.middle_name guard_middle_name,g.last_name guard_last_name";
        $order_by= ['r.route_name' => 'ASC'];
        $results = $this->global_model->select($this->table_name.' r',$where,$fields,$joins,NULL,NULL,$order_by);
        $output = [];
        if(isset($results) && $results->num_rows() > 0){
            $i = 0;
            foreach($results->result() as $result){
                ++$i;
                if($for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<button class="btn active_deactive_route btn-xs" data-route_master_id="'.$result->route_master_id.'" data-at="2" style="background:none"><i class="fa fa-check text-green"></i></button>';
                    }else{
                        $active_deactive_btn = '<button class="btn active_deactive_route btn-xs" data-route_master_id="'.$result->route_master_id.'" data-at="1" style="background:none"><i class="fa fa-times text-red"></i></button>';
                    }
                    $delete_btn = '<button class="btn active_deactive_route btn-xs" data-route_master_id="'.$result->route_master_id.'" data-at="3" style="background:none"><i class="fa fa-trash text-red"></i></button>';
                    $edit_btn = '<btn class="btn edit_route" data-route_master_id="'.$result->route_master_id.'" data-route_name="'.$result->route_name.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn.''.$delete_btn.''.$edit_btn.'';
                    $output [] = [
                        $i, 
                        $result->route_name,
                        $btns
                    ];
                }else{
                    $output [] = [
                        'route_master_id' => $result->route_master_id,
                        'route_name'=> $result->route_name,
                        'branch_id' => $result->branch_id,
                        'vehicle_master_id' =>$result->vehicle_master_id,
                        'vehicle_no' => (string) $result->vehicle_no,
                        'driver_master_id' => $result->driver_master_id,
                        'driver_name' => trim($result->driver_first_name.' '.$result->driver_middle_name.' '.$result->driver_last_name),
                        'guard_id' => $result->guard_id,
                        'guard_name' => trim($result->guard_first_name.' '.$result->guard_middle_name.' '.$result->guard_last_name),
                    ];
                }
            }
        }
        return $output;
    }
}
