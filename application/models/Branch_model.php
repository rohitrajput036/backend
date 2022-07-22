<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_model extends CI_Model {

    public $BranchId, $UniquId, $BranchName, $BranchGst, $BranchPhone, $LoginEmail, $LoginPassword, $Address, $AddressLine2, $City, $State, $Pincode, $StateCode, $Location, $StartDate, $RoylityCase, $Comments, $IsActive, $CreatedBy, $CreatedOn, $UpdatedBy, $UpdatedOn, $TableName;

    function __construct() {
        parent::__construct();
        $this->BranchId = 0;
        $this->UniquId = 0;
        $this->BranchName = '';
        $this->BranchGst = '';
        $this->BranchPhone = '';
        $this->LoginEmail = '';
        $this->LoginPassword = '';
        $this->Address = '';
        $this->AddressLine2 = '';
        $this->City = '';
        $this->State = '';
        $this->Pincode = '';
        $this->StateCode = '';
        $this->Location = '';
        $this->StartDate = date('Y-m-d');
        $this->RoylityCase = '0';
        $this->Comments = '';
        $this->IsActive = 'Y';
        $this->CreatedBy = userdata('UserId');
        $this->CreatedOn = date('Y-m-d H:i:s');
        $this->UpdatedBy = userdata('UserId');
        $this->UpdatedOn = date('Y-m-d H:i:s');
        $this->TableName = 'branch_master';
    }

    function add() {
        $InsertData = [
            'center_id' => $this->UniquId,
            'branch_name' => $this->BranchName,
            'branch_gst' => $this->BranchGst,
            'branch_phone' => $this->BranchPhone,
            'login_email' => $this->LoginEmail,
            'login_password' => $this->LoginPassword,
            'address' => $this->Address,
            'address_line_2' => $this->AddressLine2,
            'city' => $this->City,
            'state' => $this->State,
            'pincode' => $this->Pincode,
            'state_code' => $this->StateCode,
            'location' => $this->Location,
            'start_date' => $this->StartDate,
            'roylity_case' => $this->RoylityCase,
            'comments' => $this->Comments,
            'is_active' => $this->IsActive,
            'created_by' => $this->CreatedBy,
            'created_on' => $this->CreatedOn,
        ];
        if ($this->global_model->insert($this->TableName, $InsertData)) {
            $this->BranchId = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check() {
        $Results = $this->global_model->select($this->TableName, ['login_email' => $this->LoginEmail, 'is_active' => $this->IsActive]);
        if ($Results->num_rows() > 0) {
            $this->BranchId = $Results->row()->branch_id;
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

}
