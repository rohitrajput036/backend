<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_model extends CI_Model {

    public $branch_id, $branch_code, $branch_name, $gst_no, $add_line_1, $add_line_2, $state_id, $state_code, $city_id, $pincode, $branch_location, $start_date, $concat_person_name, $contact_no, $alt_contact_no, $email_id, $royality_case, $comments, $user_id, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;

    function __construct() {
        parent::__construct();
        $this->branch_id            = 0;
        $this->branch_code          = '';
        $this->branch_name          = '';
        $this->gst_no               = '';
        $this->add_line_1           = '';
        $this->add_line_2           = '';
        $this->state_id             = 0;
        $this->state_code           = '';
        $this->city_id              = 0;
        $this->pincode              = '';
        $this->branch_location      = '';
        $this->start_date           = date('Y-m-d');
        $this->concat_person_name   = '';
        $this->contact_no           = '';
        $this->alt_contact_no       = '';
        $this->email_id             = '';
        $this->royality_case        = '';
        $this->comments             = '';
        $this->user_id              = 0;
        $this->is_active            = '';
        $this->created_by           = 0;
        $this->created_on           = date('Y-m-d H:i:s');
        $this->updated_by           = 0;
        $this->updated_on           = date('Y-m-d H:i:s');
        $this->table_name           = DB_NAME.'branch';
    }

    function add() {
        $insert_data = [
            'branch_code'           => $this->branch_code,  
            'branch_name'           => $this->branch_name, 
            'gst_no'                => $this->gst_no, 
            'add_line_1'            => $this->add_line_1, 
            'add_line_2'            => $this->add_line_2, 
            'state_id'              => $this->state_id, 
            'state_code'            => $this->state_code, 
            'city_id'               => $this->city_id, 
            'pincode'               => $this->pincode, 
            'branch_location'       => $this->branch_location, 
            'start_date'            => $this->start_date, 
            'concat_person_name'    => $this->concat_person_name, 
            'contact_no'            => $this->contact_no, 
            'alt_contact_no'        => $this->alt_contact_no, 
            'email_id'              => $this->email_id, 
            'royality_case'         => $this->royality_case, 
            'comments'              => $this->comments, 
            'user_id'               => $this->user_id, 
            'is_active'             => $this->is_active, 
            'created_by'            => $this->created_by, 
            'created_on'            => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->branch_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }
    function update(){
        $where['branch_id'] = $this->branch_id;
        $update_data = [
            'branch_code'           => $this->branch_code,  
            'branch_name'           => $this->branch_name, 
            'gst_no'                => $this->gst_no, 
            'add_line_1'            => $this->add_line_1, 
            'add_line_2'            => $this->add_line_2, 
            'state_id'              => $this->state_id, 
            'state_code'            => $this->state_code, 
            'city_id'               => $this->city_id, 
            'pincode'               => $this->pincode, 
            'branch_location'       => $this->branch_location, 
            'start_date'            => $this->start_date, 
            'concat_person_name'    => $this->concat_person_name, 
            'contact_no'            => $this->contact_no, 
            'alt_contact_no'        => $this->alt_contact_no, 
            'email_id'              => $this->email_id, 
            'royality_case'         => $this->royality_case, 
            'comments'              => $this->comments,
            'updated_by'            => $this->updated_by,
            'updated_on'            => $this->updated_on 
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }
    function check() {
        $Results = $this->global_model->select($this->table_name, ['branch_name' => $this->branch_name, 'is_active' => $this->is_active]);
        if ($Results->num_rows() > 0) {
            $this->branch_id = $Results->row()->branch_id;
            return true;
        } else {
            return false;
        }
    }

    function get($for_table = false){
        if($this->BranchId > 0){
            $where[$this->TableName.'.branch_id'] = $this->BranchId;
        }
        if(!empty($this->isActive)){
            $where[$this->TableName.'.is_active'] = $this->IsActive;
        }else{
            $where[$this->TableName.'.is_active IN ("Y","N")'] = NULL;
        }
        $fields = $this->TableName.'.branch_id, center_id, branch_name, branch_gst, branch_phone, login_email, login_password, 
        address, address_line_2, city, state, pincode, state_code, location, start_date, roylity_case, 
        comments, '.$this->TableName.'.is_active, '.$this->TableName.'.created_by, '.$this->TableName.'.created_on';
        $order_by = ['branch_name' => 'ASC'];
        $results = $this->global_model->select($this->TableName,$where,$fields,NULL,NULL,NULL,$order_by);
        $output = [];
        if(isset($results) && $results->num_rows() > 0){
            $i=0;
            foreach($results->result() as $result){
                ++$i;
                if($for_table){
                    $output[] = [
                        $i,
                        
                    ];
                }else{
                    $output[] = [
                        'branch_id'         => $result->branch_id,
                        'center_id'         => $result->center_id,
                        'branch_name'       => $result->branch_name,
                        'branch_gst'        => $result->branch_gst,
                        'branch_phone'      => $result->branch_phone,
                        'login_email'       => $result->login_email,
                        'login_password'    => $result->login_password,
                        'address'           => $result->address,
                        'address_line_2'    => $result->address_line_2,
                        'city'              => $result->city,
                        'state'             => $result->state,
                        'pincode'           => $result->pincode,
                        'state_code'        => $result->state_code,
                        'location'          => $result->location,
                        'start_date'        => $result->start_date,
                        'roylity_case'      => $result->roylity_case,
                        'comments'          => $result->comments,
                        'is_active'         => $result->is_active,
                        'created_by'        => $result->created_by,
                        'created_on'        => $result->created_on
                    ];
                }
            }
        }
        return $output;
    }
    function get_branch_code(){
        $result = $this->global_model->select($this->table_name);
        return sum_in_string('CT000'.$result->num_rows());
    }
}
