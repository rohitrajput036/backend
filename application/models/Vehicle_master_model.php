<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model{

    public $vehicle_master_id, $branch_id, $vehicle_no, $vehicle_color, $manufacturing_year, $seating_capacity, $pre_reserved_seat, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $for_table;
    
    function __construct(){
        parent:: __construct();
        $this->vehicle_master_id = 0;
        $this->branch_id = '';
        $this->vehicle_no = '';
        $this->vehicle_color = '';
        $this->manufacturing_year = '';
        $this->seating_capacity = '';
        $this->pre_reserved_seat = '';
        $this->is_active    = '';
        $this->created_by   = 0;
        $this->created_on   = date('Y-m-d H:i:s');
        $this->updated_by   = 0;
        $this->updated_on   = date('Y-m-d H:i:s');
        $this->table_name   = DB_NAME.'vehicle_master';
    }

    function add(){
        $insert_data = [
            'branch_id' => $this->branch_id,
            'vehicle_no' => $this->vehicle_no,
            'vehicle_color' => $this->vehicle_color,
            'manufacturing_year' => $this->manufacturing_year,
            'seating_capacity' => $this->seating_capacity,
            'pre_reserved_seat' => $this->pre_reserved_seat,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_by
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->vehicle_master_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function update(){
        $where['vehicle_master_id'] = $this->vehicle_master_id;
        $update_data =[
            'branch_id' => $this->branch_id,
            'vehicle_no' => $this->vehicle_no,
            'vehicle_color' => $this->vehicle_color,
            'manufacturing_year' => $this->manufacturing_year,
            'seating_capacity' => $this->seating_capacity,
            'pre_reserved_seat' => $this->pre_reserved_seat,
            'updated_by' =>  $this->updated_by,
            'updated_on' => $this->updated_on
        ]; 
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function check() {
        $Results = $this->global_model->select($this->table_name, ['vehicle_no' => $this->vehicle_no]);
        if ($Results->num_rows() > 0) {
            $this->vehicle_master_id = $Results->row()->vehicle_master_id;
            return true;
        } else {
            return false;
        }
    }

    function delete(){
        $where['vehicle_master_id'] = $this->vehicle_master_id;
        $update_data = [
            'is_active'        => $this->is_active,
            'updated_by'       => $this->updated_by,
            'updated_on'       => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function get(){
        $this->load->model('branch_model');
        if($this->vehicle_master_id > 0){
            $where['v.vehicle_master_id'] = $this->vehicle_master_id;
        }
        if($this->branch_id > 0){
            $where['b.branch_id'] = $this->branch_id;
        }
        if(!empty($this->is_active)){
            $where['v.is_active'] = $this->is_active;
        }else{
            $where['v.is_active IN ("1","2")'] = NULL;
        }
        $joins = [ 
            $this->branch_model->table_name.' b' => ['(v.branch_id = b.branch_id AND b.is_active = 1)','INNER'],
        ];
        $fields = "v.* b.branch_id";
        $order_by= ['v.vehicle_no' => 'ASC'];
        $results = $this->global_model->select($this->table_name.' v',$where,$fields,$joins,NULL,NULL,$order_by);
        $output = [];
        if(isset($results) && $results->num_rows() > 0){
            $s_no = 0;
            foreach($results->result() as $result){
                $i++;
                if($this->for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-vehicle_master_id="'.$result->vehicle_master_id.'" data-at="2" style="background:none"><i class="fa fa-check text-green"></i></button>';
                    }else{
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-vehicle_master_id="'.$result->vehicle_master_id.'" data-at="1" style="background:none"><i class="fa fa-times text-red"></i></button>';
                    }
                    $delete_btn = '<button class="btn active_deactive btn-xs" data-vehicle_master_id="'.$result->vehicle_master_id.'" data-at="3" style="background:none"><i class="fa fa-trash text-red"></i></button>';
                    $edit_btn = '<btn class="btn edit" data-vehicle_master_id="'.$result->vehicle_master_id.'" data-vehicle_no="'.$result->vehicle_no.'" data-vehicle_color="'.$result->vehicle_color.'" data-manufacturing_year="'.$result->manufacturing_year.'"  data-seating_capacity="'.$result->seating_capacity.'" data-pre_reserved_seat="'.$result->pre_reserved_seat.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn.''.$delete_btn.''.$edit_btn.'';
                    $output [] = [
                        $i, 
                        $result->vehicle_no,
                        $result->vehicle_color,
                        $result->manufacturing_year,
                        $result->seating_capacity,
                        $result->pre_reserved_seat,
                        $btns
                    ];
                }else{
                    $output [] = [
                        'vehicle_master_id' => $result->vehicle_master_id,
                        'branch_id' => $result->branch_id,
                        'vehicle_no'=> $result->vehicle_no,
                        'vehicle_color' => $result->vehicle_color,
                        'manufacturing_year' =>$result->manufacturing_year,
                        'seating_capacity' => $result->seating_capacity,
                        'pre_reserved_seat' => $result->pre_reserved_seat                        
                    ];
                }
            }
        }
        return $output;
    }
}