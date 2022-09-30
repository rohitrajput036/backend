<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public $UserName, $UserPassword, $IsActive, $TableName;

    function __construct() {
        parent::__construct();
        $this->IsActive = 'Y';
    }

    function ValidateLogin() {
        $this->load->model('user_model');
        $this->load->model('role_model');
        $this->load->model('department_model');
        $this->load->model('branch_model');
        $this->load->model('school_model');
        $this->load->model('user_role_model');
        $this->load->model('user_branch_model');
        $this->load->model('user_student_model');
        $this->load->model('user_department_model');
        $this->load->model('user_school_model');
        $output = [];
        $where['u.email_id'] = $this->UserName;
        $where['u.is_active'] = 1;
        $joins = [
            $this->user_role_model->table_name.' ur' => ['(u.user_id = ur.user_id AND ur.is_active = 1)','INNER'],
            $this->role_model->table_name.' r' => ['(ur.role_id = r.role_id AND r.is_active = 1)','INNER'],
            $this->user_branch_model->table_name.' ub' => ['(u.user_id = ub.user_id AND ub.is_active = 1)','LEFT'],
            $this->branch_model->table_name.' b' => ['(ub.branch_id = b.branch_id AND b.is_active = 1)','LEFT'],
            $this->user_student_model->table_name.' us' => ['(u.user_id = us.user_id AND us.is_active = 1)','LEFT'],
            $this->user_school_model->table_name.' usc' => ['(u.user_id = usc.user_id AND usc.is_active = 1)','LEFT'],
            $this->school_model->table_name.' s' => ['(usc.school_id = s.school_id AND s.is_active = 1)','LEFT']
        ];
        $fileds = 'u.user_id,u.unique_no,u.display_name,u.first_name,u.middel_name,u.last_name,u.gender,u.password,r.role_id,r.role,b.branch_id,b.branch_name,b.branch_code,u.email_id,s.school_id,s.school_name';
        $results = $this->global_model->select($this->user_model->table_name.' u',$where,$fileds,$joins);
        if(isset($results) && $results->num_rows() > 0){
            $result = $results->row();
            $output = [
                'user_id'       => $result->user_id,
                'unique_no'     => $result->unique_no,
                'user_name'     => (!empty($result->display_name)) ? $result->display_name : $result->first_name.' '.$result->last_name,
                'gender'        => $result->gender,
                'password'      => $result->password,
                'role_id'       => $result->role_id,
                'role'          => $result->role,
                'email_id'      => $result->email_id,
                'branch_id'     => (int) $result->branch_id,
                'brnach_name'   => (string) $result->branch_name,
                'branch_code'   => (string) $result->branch_code,
                'school_id'     => (int) $result->school_id,
                'school_name'   => (string) $result->school_name
            ];
        }else{
            throw new Exception('invalid user!',400);
        }
        return $output;
    }

}
