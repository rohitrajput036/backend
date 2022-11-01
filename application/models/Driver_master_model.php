<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver_master_model extends CI_Model {

    public $driver_master_id, $branch_id, $first_name, $middle_name, $last_name, $gender, $contact_no, $alt_contact_no, $address_line_1, $address_line_2, $state_id, $city_id, $pincode, $dl_no, $driver_type, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $for_table;

    function __construct(){
        parent::__construct();
        $this->driver_master_id = 0;
        $this->branch_id = '';
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->gender = '';
        $this->contact_no = '';
        $this->alt_contact_no = '';
        $this->address_line_1 = '';
        $this->address_line_2 = '';
        $this->state_id = '';
        $this->city_id = '';
        $this->pincode = '';
        $this->dl_no = '';
        $this->driver_type = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'driver_master';
    }

    function add(){
        $insert_data =[
            'branch_id'         => $this->branch_id,
            'first_name'        => $this->first_name,
            'middle_name'       => $this->middle_name,
            'last_name'         => $this->last_name,
            'gender'            => $this->gender,
            'contact_no'        => $this->contact_no,
            'alt_contact_no'    => $this->alt_contact_no,
            'address_line_1'    => $this->address_line_1,
            'address_line_2'    => $this->address_line_2,
            'state_id'          => $this->state_id,
            'city_id'           => $this->city_id,
            'pincode'           => $this->pincode,
            'dl_no'             => $this->dl_no,
            'driver_type'       => $this->driver_type,
            'is_active'         => $this->is_active,
            'created_by'        => $this->created_by,
            'created_on'        => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->driver_master_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check() {
        $Results = $this->global_model->select($this->table_name, ['driver_type' => $this->driver_type]);
        if ($Results->num_rows() > 0) {
            $this->driver_master_id = $Results->row()->driver_master_id;
            return true;
        } else {
            return false;
        }
    }

    function update(){
        $where['driver_master_id'] = $this->driver_master_id;
        $update_data =[
            'branch_id'         => $this->branch_id,
            'first_name'        => $this->first_name,
            'middle_name'       => $this->middle_name,
            'last_name'         => $this->last_name,
            'gender'            => $this->gender,
            'contact_no'        => $this->contact_no,
            'alt_contact_no'    => $this->alt_contact_no,
            'address_line_1'    => $this->address_line_1,
            'address_line_2'    => $this->address_line_2,
            'state_id'          => $this->state_id,
            'city_id'           => $this->city_id,
            'pincode'           => $this->pincode,
            'dl_no'             => $this->dl_no,
            'driver_type'       => $this->driver_type,
            'updated_by'        => $this->updated_by,
            'updated_on'        => $this->updated_on

        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function delete(){
        $where['driver_master_id'] = $this->driver_master_id;
        $update_data = [
            'is_active'        => $this->is_active,
            'updated_by'       => $this->updated_by,
            'updated_on'       => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function get($for_table = false) {
        $this->load->model('branch_model');
        // $this->load->model('city_model');
        // $this->load->model('state_model');
        if($this->driver_master_id > 0){
            $where['d.driver_master_id'] = $this->driver_master_id;
        }
        if($this->branch_id > 0){
            $where['b.branch_id'] = $this->branch_id;
        }
        if(!empty($this->is_active)){
            $where['d.is_active'] = $this->is_active;
        }else{
            $where['d.is_active IN ("1","2")'] = NULL;
        }
        $joins = [ 
            $this->branch_model->table_name.' b' => ['(d.branch_id = b.branch_id AND b.is_active = 1)','INNER'],
            // $this->city_model->table_name.' c' => ['(d.city_id = c.city_id AND c.is_active = 1)','INNER'],
            // $this->state_model->table_name.' s' => ['(d.state_id = s.state_id AND s.is_active = 1)','INNER']
        ];
        $fields = "d.*";
        $order_by= ['d.driver_type' => 'ASC'];
        $results = $this->global_model->select($this->table_name.' d',$where,$fields,$joins,NULL,NULL,$order_by);
        $output = [];
        if(isset($results) && $results->num_rows() > 0){
            $i = 0;
            foreach($results->result() as $result){
                ++$i;
                if($this->for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-driver_master_id="'.$result->driver_master_id.'" data-at="2" style="background:none"><i class="fa fa-check text-green"></i></button>';
                    }else{
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-driver_master_id="'.$result->driver_master_id.'" data-at="1" style="background:none"><i class="fa fa-times text-red"></i></button>';
                    }
                    $delete_btn = '<button class="btn active_deactive btn-xs" data-driver_master_id="'.$result->driver_master_id.'" data-at="3" style="background:none"><i class="fa fa-trash text-red"></i></button>';
                    $edit_btn = '<btn class="btn edit" data-driver_master_id="'.$result->driver_master_id.'" data-first_name="'.$result->first_name.'" data-gender="'.$result->gender.'" data-contact_no="'.$result->contact_no.'"  data-address_line_1="'.$result->address_line_1.'" data-state_id="'.$result->state_id.'" data-city_id="'.$result->city_id.'" data-dl_no="'.$result->dl_no.'" data-driver_type="'.$result->driver_type.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn.''.$delete_btn.''.$edit_btn.'';
                    $output [] = [
                        $i, 
                        $result->first_name,
                        $result->gender,
                        $result->contact_no,
                        $result->address_line_1,
                        $result->state_id,
                        $result->city_id,
                        $result->dl_no,
                        $result->driver_type,
                        $btns
                    ];
                }else{
                    $output [] = [
                        'driver_master_id' => $result->driver_master_id,
                        'branch_id' => $result->branch_id,
                        'first_name'=> $result->first_name,
                        'middle_name' => $result->middle_name,
                        'last_name' =>$result->last_name,
                        'gender' => $result->gender,
                        'contact_no' => $result->contact_no,
                        'alt_contact_no' => $result->alt_contact_no,
                        'address_line_1' => $result->address_line_1,
                        'address_line_2' => $result->address_line_2,
                        'state_id' => $result->state_id,
                        'city_id' => $result->city_id,
                        'pincode' => $result->pincode,
                        'dl_no' => $result->dl_no,
                        'driver_type' => $result->driver_type
                    ];
                }
            }
        }
        return $output;
    }
};