<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public $user_id, $unique_no, $first_name, $middel_name, $last_name, $display_name, $email_id, $alt_email_id, $display_password, $password, $dob, $doj, $gender, $contact_no, $alt_contact_no, $address_line_1, $address_line_2, $city_id, $state_id, $pincode, $country_id, $comment, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;

    function __construct() {
        parent::__construct();
        $this->user_id          = 0;
        $this->unique_no        = ''; 
        $this->first_name       = '';
        $this->middel_name      = ''; 
        $this->last_name        = ''; 
        $this->display_name     = ''; 
        $this->email_id         = ''; 
        $this->alt_email_id     = ''; 
        $this->display_password = '';  
        $this->password         = ''; 
        $this->dob              = ''; 
        $this->doj              = '';  
        $this->gender           = '';  
        $this->contact_no       = '';  
        $this->alt_contact_no   = ''; 
        $this->address_line_1   = ''; 
        $this->address_line_2   = '';  
        $this->city_id          = 0;
        $this->state_id         = 0;
        $this->pincode          = ''; 
        $this->country_id       = 0;
        $this->comment          = ''; 
        $this->is_active        = ''; 
        $this->created_by       = 0;
        $this->created_on       = date('Y-m-d H:i:s'); 
        $this->updated_by       = 0; 
        $this->updated_on       = date('Y-m-d H:i:s');
        $this->table_name       = DB_NAME.'user';
    }

    function add(){
        $insert_data = [
            'unique_no'         => $this->unique_no,
            'first_name'        => $this->first_name,
            'middel_name'       => $this->middel_name,
            'last_name'         => $this->last_name,
            'display_name'      => $this->display_name,
            'email_id'          => $this->email_id,
            'alt_email_id'      => $this->alt_email_id,
            'display_password'  => $this->display_password,
            'password'          => $this->password,
            'dob'               => $this->dob,
            'doj'               => $this->doj,
            'gender'            => $this->gender,
            'contact_no'        => $this->contact_no,
            'alt_contact_no'    => $this->alt_contact_no,
            'address_line_1'    => $this->address_line_1,
            'address_line_2'    => $this->address_line_2,
            'city_id'           => $this->city_id,
            'state_id'          => $this->state_id,
            'pincode'           => $this->pincode,
            'country_id'        => $this->country_id,
            'comment'           => $this->comment,
            'is_active'         => $this->is_active,
            'created_by'        => $this->created_by,
            'created_on'        => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->user_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check() {
        $Results = $this->global_model->select($this->table_name, ['email_id' => $this->email_id]);
        if ($Results->num_rows() > 0) {
            $this->user_id = $Results->row()->user_id;
            return true;
        } else {
            return false;
        }
    }

    function update(){
        $where['user_id'] = $this->user_id;
        $update_data = [
            'first_name'        => $this->first_name,
            'middel_name'       => $this->middel_name,
            'last_name'         => $this->last_name,
            'display_name'      => $this->display_name,
            'email_id'          => $this->email_id,
            'alt_email_id'      => $this->alt_email_id,
            'display_password'  => $this->display_password,
            'password'          => $this->password,
            'dob'               => $this->dob,
            'doj'               => $this->doj,
            'gender'            => $this->gender,
            'contact_no'        => $this->contact_no,
            'alt_contact_no'    => $this->alt_contact_no,
            'address_line_1'    => $this->address_line_1,
            'address_line_2'    => $this->address_line_2,
            'city_id'           => $this->city_id,
            'state_id'          => $this->state_id,
            'pincode'           => $this->pincode,
            'country_id'        => $this->country_id,
            'comment'           => $this->comment,
            'updated_by'        => $this->updated_by,
            'updated_on'        => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function delete(){
        $where['user_id'] = $this->user_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function get_unique_id(){
        $result = $this->global_model->select($this->table_name);
        return sum_in_string('UR000'.$result->num_rows());
    }
}
