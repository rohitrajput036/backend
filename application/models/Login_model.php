<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public $UserName, $UserPassword, $IsActive, $TableName;

    function __construct() {
        parent::__construct();
        $this->IsActive = 'Y';
    }

    function ValidateLogin() {
        $Output = [];
        $this->load->model('User_model');
        $this->load->model('Role_model');
        $this->load->model('User_branch_model');
        $this->load->model('Branch_model');
        $Where[$this->User_model->TableName . '.email_id'] = $this->UserName;
        $Where[$this->User_model->TableName . '.is_active'] = $this->IsActive;
        $Fields = $this->User_model->TableName . ".user_id,emp_id,first_name as user_name,password,gender,role,
        ifnull(" . $this->Branch_model->TableName . ".branch_id,0) as branch_id," . $this->Branch_model->TableName . ".branch_name";
        $Joins = [
            $this->Role_model->TableName => [$this->User_model->TableName . '.role_id=' . $this->Role_model->TableName . '.role_id', 'INNER'],
            $this->User_branch_model->TableName => [$this->User_model->TableName . '.user_id=' . $this->User_branch_model->TableName . '.user_id', 'LEFT'],
            $this->Branch_model->TableName => [$this->User_branch_model->TableName . '.branch_id=' . $this->Branch_model->TableName . '.branch_id', 'LEFT']
        ];
        $Results = $this->global_model->select($this->User_model->TableName, $Where, $Fields, $Joins, NULL, NULL, NULL, [$this->User_model->TableName . '.user_id']);
        if (isset($Results) && $Results->num_rows() > 0) {
            foreach ($Results->result() as $Result) {
                $Output = [
                    'UserId' => $Result->user_id,
                    'EmpId' => $Result->emp_id,
                    'UserName' => $Result->user_name,
                    'Password' => $Result->password,
                    'Gender' => $Result->gender,
                    'Role' => $Result->role,
                    'BranchId' => $Result->branch_id,
                    'BranchName' => $Result->branch_name
                ];
            }
        }
        return $Output;
    }

}
