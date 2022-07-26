<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_master_model extends CI_Model {
    public $enquiry_id, $enquiry_date, $branch_id, $form_id, $student_id, $class_id, $follow_up_status_id, $follow_up_date, $first_name, $middel_name, $last_name, $gender, $date_of_birth, $age, $sibling, $sibling_dob, $add_line_1, $add_line_2, $state_id, $city_id, $pincode, $father_first_name, $father_middel_name, $father_last_name, $father_mobile_no, $father_email_id, $father_education_type_id, $father_occupation_type_id, $mother_first_name, $mother_middel_name, $mother_last_name, $mother_mobile_no, $mother_email_id, $mother_education_type_id, $mother_occupation_type_id, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $for_table, $school_id;
    function __construct() {
        parent::__construct();
        $this->enquiry_id = 0;
        $this->enquiry_date = date('Y-m-d');
        $this->branch_id = 0;
        $this->form_id = 0;
        $this->student_id = 0;
        $this->class_id = 0;
        $this->follow_up_status_id = 0;
        $this->follow_up_date = NULL;
        $this->first_name = '';
        $this->middel_name = '';
        $this->last_name = '';
        $this->gender = '';
        $this->date_of_birth = NULL;
        $this->age = 0;
        $this->sibling = 0;
        $this->sibling_dob = NULL;
        $this->add_line_1 = '';
        $this->add_line_2 = '';
        $this->state_id = 0;
        $this->city_id = 0;
        $this->pincode = '';
        $this->father_first_name = '';
        $this->father_middel_name = '';
        $this->father_last_name = '';
        $this->father_mobile_no = '';
        $this->father_email_id = '';
        $this->father_education_type_id = 0;
        $this->father_occupation_type_id = 0;
        $this->mother_first_name = '';
        $this->mother_middel_name = '';
        $this->mother_last_name = '';
        $this->mother_mobile_no = '';
        $this->mother_email_id ='';
        $this->mother_education_type_id = 0;
        $this->mother_occupation_type_id = 0;
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'enquiry_master';
        $this->for_table = false;
        $this->school_id = 0;
    }

    function add(){
        $insert_data = [
            'enquiry_date' => $this->enquiry_date,
            'branch_id' => $this->branch_id,
            'form_id' => $this->form_id,
            'student_id' => $this->student_id,
            'class_id' => $this->class_id,
            'follow_up_status_id' => $this->follow_up_status_id,
            'follow_up_date' => $this->follow_up_date,
            'first_name' => $this->first_name,
            'middel_name' => $this->middel_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'age' => $this->age,
            'sibling' => $this->sibling,
            'sibling_dob' => $this->sibling_dob,
            'add_line_1' => $this->add_line_1,
            'add_line_2' => $this->add_line_2,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'pincode' => $this->pincode,
            'father_first_name' => $this->father_first_name,
            'father_middel_name' => $this->father_middel_name,
            'father_last_name' => $this->father_last_name,
            'father_mobile_no' => $this->father_mobile_no,
            'father_email_id' => $this->father_email_id,
            'father_education_type_id' => $this->father_education_type_id,
            'father_occupation_type_id' => $this->father_occupation_type_id,
            'mother_first_name' => $this->mother_first_name,
            'mother_middel_name' => $this->mother_middel_name,
            'mother_last_name' => $this->mother_last_name,
            'mother_mobile_no' => $this->mother_mobile_no,
            'mother_email_id' => $this->mother_email_id,
            'mother_education_type_id' => $this->mother_education_type_id,
            'mother_occupation_type_id' => $this->mother_occupation_type_id,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on
        ];
        if($this->global_model->insert($this->table_name, $insert_data)) {
            $this->enquiry_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $result = $this->global_model->select($this->table_name,['father_mobile_no' => $this->father_mobile_no,'is_active'=> $this->is_active]);
        if(isset($result) && $result->num_rows() > 0){
            $this->enquiry_id = $result->row()->enquiry_id;
            return true;
        }else{
            return false;
        }
    }

    function update(){
        $where['enquiry_id'] = $this->enquiry_id;
        $update_data = [
            'enquiry_date' => $this->enquiry_date,
            'class_id' => $this->class_id,
            'follow_up_status_id' => $this->follow_up_status_id,
            'follow_up_date' => $this->follow_up_date,
            'first_name' => $this->first_name,
            'middel_name' => $this->middel_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'age' => $this->age,
            'sibling' => $this->sibling,
            'sibling_dob' => $this->sibling_dob,
            'add_line_1' => $this->add_line_1,
            'add_line_2' => $this->add_line_2,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'pincode' => $this->pincode,
            'father_first_name' => $this->father_first_name,
            'father_middel_name' => $this->father_middel_name,
            'father_last_name' => $this->father_last_name,
            'father_mobile_no' => $this->father_mobile_no,
            'father_email_id' => $this->father_email_id,
            'father_education_type_id' => $this->father_education_type_id,
            'father_occupation_type_id' => $this->father_occupation_type_id,
            'mother_first_name' => $this->mother_first_name,
            'mother_middel_name' => $this->mother_middel_name,
            'mother_last_name' => $this->mother_last_name,
            'mother_mobile_no' => $this->mother_mobile_no,
            'mother_email_id' => $this->mother_email_id,
            'mother_education_type_id' => $this->mother_education_type_id,
            'mother_occupation_type_id' => $this->mother_occupation_type_id,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on           
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function delete(){
        $where['enquiry_id'] = $this->enquiry_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on,
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function get(){
        $output = [];
        if(!empty($this->is_active)){
            $where['e.is_active'] = $this->is_active;
        }else{
            $where['e.is_active in (1,2)'] = NULL;
        }
        if(!empty($this->father_mobile_no)){
            $where['e.father_mobile_no'] = $this->father_mobile_no;
        }
        if($this->enquiry_id > 0){
            $where['e.enquiry_id'] = $this->enquiry_id;
        }
        if($this->branch_id > 0){
            $where['e.branch_id'] = $this->branch_id;
        }
        if($this->class_id > 0){
            $where['e.class_id'] = $this->class_id;
        }
        if($this->follow_up_status_id > 0){
            $where['e.follow_up_status_id'] = $this->follow_up_status_id;
        }
        if($this->state_id > 0){
            $where['e.state_id'] = $this->state_id;
        }
        if($this->city_id > 0){
            $where['e.city_id'] = $this->city_id;
        }
        $this->load->model('city_model');
        $this->load->model('state_model');
        $this->load->model('follow_up_status_model');
        $this->load->model('enquiry_follow_up_model');
        $joins = [
            $this->state_model->table_name.' s' => ['(e.state_id = s.state_id AND s.status=1)','LEFT'],
            $this->city_model->table_name.' c' => ['(e.city_id = c.city_id AND c.is_active=1)','LEFT'],
            $this->follow_up_status_model->table_name.' fs' => ['(e.follow_up_status_id = fs.follow_up_status_id AND fs.is_active=1)','LEFT']
        ];
        $results = $this->global_model->select($this->table_name.' e',$where,'*',$joins);
        if(isset($results) && $results->num_rows() > 0){
            $i = 0;
            foreach($results->result() as $result){
                $i++;
                $this->enquiry_follow_up_model->is_active = 1;
                $this->enquiry_follow_up_model->enquiry_id = $result->enquiry_id;
                $followup_history = $this->enquiry_follow_up_model->get();
                if($this->for_table){
                    $delete_btn = '<btn class="btn active_deactive" data-enquiry_id="'.$result->enquiry_id.'" data-at="3"><i class="fa fa-trash text-red"></i></btn>';
                    $view_btn = '<btn class="btn btn-xs view_enquiry" id="view_enquiry_'.$result->enquiry_id.'" data-enquiry_id="'.$result->enquiry_id.'" title="view & update status"><i class="fa fa-eye text-primary"></i></btn>';
                    $btns = $delete_btn.' '.$view_btn;
                    $output[] = [
                        $i,
                        date('d/m/Y',strtotime($result->enquiry_date)),
                        $result->form_id,
                        $result->first_name.' '.$result->middel_name.' '.$result->last_name,
                        $result->father_email_id,
                        (string) $result->city_name,
                        $result->follow_up_status,
                        (!empty($result->follow_up_date) && $result->follow_up_date != '0000-00-00 00:00:00') ? date('d/m/Y h:i A',strtotime($result->follow_up_date)) : '',
                        $btns
                    ];
                }else{
                    $output[] = [
                        'enquiry_id'                => $result->enquiry_id,
                        'enquiry_date'              => $result->enquiry_date,
                        'display_enquiry_date'      => date('d/m/Y',strtotime($result->enquiry_date)),
                        'branch_id'                 => $result->branch_id,
                        'form_id'                   => $result->form_id,
                        'student_id'                => $result->student_id,
                        'class_id'                  => $result->class_id,
                        'follow_up_status_id'       => $result->follow_up_status_id,
                        'follow_up_status'          => $result->follow_up_status,
                        'follow_up_date'            => $result->follow_up_date,
                        'display_follow_up_date'    => (!empty($result->follow_up_date) && $result->follow_up_date != '0000-00-00 00:00:00') ? date('d/m/Y h:i A',strtotime($result->follow_up_date)) : '',
                        'first_name'                => $result->first_name,
                        'middel_name'               => $result->middel_name,
                        'last_name'                 => $result->last_name,
                        'gender'                    => $result->gender,
                        'date_of_birth'             => $result->date_of_birth,
                        'age'                       => $result->age,
                        'sibling'                   => $result->sibling,
                        'sibling_dob'               => $result->sibling_dob,
                        'add_line_1'                => $result->add_line_1,
                        'add_line_2'                => $result->add_line_2,
                        'state_id'                  => $result->state_id,
                        'state_name'                => $result->state_name,
                        'city_id'                   => $result->city_id,
                        'city_name'                 => $result->city_name,
                        'pincode'                   => $result->pincode,
                        'father_first_name'         => $result->father_first_name,
                        'father_middel_name'        => $result->father_middel_name,
                        'father_last_name'          => $result->father_last_name,
                        'father_mobile_no'          => $result->father_mobile_no,
                        'father_email_id'           => $result->father_email_id,
                        'father_education_type_id'  => $result->father_education_type_id,
                        'father_occupation_type_id' => $result->father_occupation_type_id,
                        'mother_first_name'         => $result->mother_first_name,
                        'mother_middel_name'        => $result->mother_middel_name,
                        'mother_last_name'          => $result->mother_last_name,
                        'mother_mobile_no'          => $result->mother_mobile_no,
                        'mother_email_id'           => $result->mother_email_id,
                        'mother_education_type_id'  => $result->mother_education_type_id,
                        'mother_occupation_type_id' => $result->mother_occupation_type_id,
                        'is_active'                 => $result->is_active,
                        'created_by'                => $result->created_by,
                        'created_on'                => $result->created_on,
                        'follow_up_history'         => $followup_history
                    ];
                }
            }
        }
        return $output;
    }

    function update_follow_up_status(){
        $where['enquiry_id'] = $this->enquiry_id;
        $update_data = [
            'follow_up_status_id'   => $this->follow_up_status_id,
            'follow_up_date'        => $this->follow_up_date,
            'updated_by'            => $this->updated_by,
            'updated_on'            => $this->updated_on
        ];
        return $this->global_model->update($this->enquiry_master_model->table_name,$update_data,$where);
    }
}