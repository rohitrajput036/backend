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
        $Results = $this->global_model->select($this->table_name, ['contact_no' => $this->contact_no]);
        if ($Results->num_rows() > 0) {
            $this->driver_master_id = $Results->row()->driver_master_id;
            return true;
        } else {
            return false;
        }
    }
};