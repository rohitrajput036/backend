<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Registration_model extends CI_Model {
    
    public $registration_id, $branch_id, $enquiry_id, $registration_no, $registration_date, $class_id, $registration_fee, $is_qualified, $total_marks, $earn_marks, $earn_percentage, $remarks, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $datatable;
    
    function __construct() {
        parent::__construct();
        $this->registration_id      = 0;
        $this->branch_id            = 0;
        $this->enquiry_id           = 0;
        $this->registration_no      = '';
        $this->registration_date    = date('Y-m-d');
        $this->class_id             = 0;
        $this->registration_fee     = '0.00';
        $this->is_qualified         = '0';
        $this->total_marks          = '0';
        $this->earn_marks           = '0';
        $this->earn_percentage      = '0';
        $this->remarks              = '';
        $this->is_active            = '';
        $this->created_by           = 0;
        $this->created_on           = date('Y-m-d H:i:s');
        $this->updated_by           = 0;
        $this->updated_on           = date('Y-m-d H:i:s');
        $this->table_name           = DB_NAME.'registration';
        $this->datatable            = (object)[];
    }

    function add(){
        $insert_data = [
            'registration_no'       => $this->registration_no,
            'branch_id'             => $this->branch_id,
            'enquiry_id'            => $this->enquiry_id,
            'registration_date'     => $this->registration_date,
            'class_id'              => $this->class_id,
            'registration_fee'      => $this->registration_fee,
            'is_qualified'          => $this->is_qualified,
            'total_marks'           => $this->total_marks,
            'earn_marks'            => $this->earn_marks,
            'earn_percentage'       => $this->earn_percentage,
            'remarks'               => $this->remarks,
            'is_active'             => $this->is_active,
            'created_by'            => $this->created_by,
            'created_on'            => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->registration_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $where['registration_no'] = $this->registration_no;
        $where['is_active'] = $this->is_active;
        $where['branch_id'] = $this->branch_id;
        $where['enquiry_id'] = $this->enquiry_id;
        $results = $this->global_model->select($this->table_name, $where);
        if(isset($results) && $results->num_rows() > 0){
            $this->registration_id = $results->row()->registration_id;
            return true;
        }else{
            return false;
        }
    }

    function update(){
        $where['registration_id'] = $this->registration_id;
        $update_data = [
            'registration_no'       => $this->registration_no,
            'registration_date'     => $this->registration_date,
            'registration_fee'      => $this->registration_fee,
            'is_qualified'          => $this->is_qualified,
            'total_marks'           => $this->total_marks,
            'earn_marks'            => $this->earn_marks,
            'earn_percentage'       => $this->earn_percentage,
            'remarks'               => $this->remarks,
            'updated_by'            => $this->updated_by,
            'updated_on'            => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }

    function delete(){
        $where['registration_id'] = $this->registration_id;
        $update_data = [
            'is_active'             => $this->is_active,
            'updated_by'            => $this->updated_by,
            'updated_on'            => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);
    }
    function total_data(){
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active in (1,2)'] = NULL;
        }
        if($this->branch_id > 0){
            $where['branch_id'] = $this->branch_id;
        }
        $results = $this->global_model->select($this->table_name,$where);
        return $results->num_rows();
    }
    function get(){
        $this->load->model('class_model');
        $this->load->model('student_model');
        $this->load->model('enquiry_master_model');
        $this->load->model('student_parents_detail_model');
        $this->load->model('admission_model');
        $output = [];
        if(!empty($this->is_active)){
            $where['r.is_active'] = $this->is_active;
        }else{
            $where['r.is_active in (1,2)'] = NULL;
        }
        if($this->registration_id > 0){
            $where['r.registration_id'] = $this->registration_id;
        }
        if(isset($this->datatable->branch_id) && $this->datatable->branch_id > 0){
            $this->branch_id = $this->datatable->branch_id;
        }
        $where['r.branch_id'] = $this->branch_id;
        $joins = [
            $this->class_model->table_name.' c' => ['(r.class_id = c.class_id AND c.is_active = 1)','INNER'],
            $this->student_model->table_name.' s' => ['(r.registration_id = s.registration_id AND s.is_active=1)','INNER'],
            $this->admission_model->table_name.' a' => ['(s.student_id = a.student_id AND a.is_active=1)','LEFT'], 
            $this->enquiry_master_model->table_name.' e' => ['(r.enquiry_id = e.enquiry_id AND e.is_active = 1)','LEFT'],
            $this->student_parents_detail_model->table_name.' f' => ['(s.student_id = f.student_id AND f.parent_type = 1 AND f.is_active = 1)','LEFT'],
            $this->student_parents_detail_model->table_name.' m' => ['(s.student_id = m.student_id AND m.parent_type = 2 AND m.is_active = 1)','LEFT'],
            $this->cast_category_model->table_name.' ca' => ['r.cast_category_id = ca.cast_category_id AND ca.is_active =1','INNER']
        ];
        $or_like = [];
        $limit = NULL;
        $order_by = NULL;
        if(isset($this->datatable->length) && $this->datatable->length > 0) {
            $limit = [$this->datatable->length, $this->datatable->start];
        }
        if(!empty($this->datatable->search->value)){
            $or_like = [
                'r.registration_no'  => $this->datatable->search->value,
                'e.form_id'  => $this->datatable->search->value,
                'concat(s.first_name," ",s.middle_name," ",s.last_name)'  => $this->datatable->search->value,
                'concat(f.first_name," ",f.middle_name," ",f.last_name)' => $this->datatable->search->value,
                'c.class_name' => $this->datatable->search->value,
                'f.email_id' => $this->datatable->search->value,
                'f.alt_email_id' => $this->datatable->search->value,
                'f.contact_no' => $this->datatable->search->value,
                'f.alt_contact_no' => $this->datatable->search->value
            ];
        }
        $fields = "r.registration_id,e.form_id,r.registration_no,s.student_id,s.first_name child_first_name,s.middle_name child_middle_name, f.last_name child_last_name,c.class_name,f.first_name father_first_name, f.middle_name father_middel_name,f.last_name father_last_name, f.alt_contact_no father_alt_contact_no, m.first_name mother_first_name, m.middle_name mother_middel_name, m.last_name mother_last_name,m.email_id mother_email_id, m.alt_email_id mother_alt_email_id, m.contact_no mother_contact_no, m.alt_contact_no mother_alt_contact_no,a.admission_id,ca.cast_category_id,r.is_active";
        $results = $this->global_model->select($this->table_name.' r', $where, $fields, $joins, NULL, $limit, $order_by, NULL, NULL, NULL, NULL, NULL, NULL, $or_like);
        if(!empty($this->datatable) && isset($this->datatable->draw)){
            $output = $this->prepare_result_datatable($results);
        }else{
            $output = $this->prepare_result($results);
        }
        return $output;
    }
    function prepare_result_datatable($results){
        $data = [];
        if(isset($results) && $results->num_rows() > 0){
            $i = 0;
            foreach($results->result() as $result){
                $i++;
                $child_info = $result->child_first_name;
                if(!empty($result->child_middle_name)){
                    $child_info .= ' '.$result->child_middle_name;
                }
                if(!empty($result->child_last_name)){
                    $child_info .= ' '.$result->child_last_name;
                }
                $child_info .= '<br/><b>Class :</b>'.$result->class_name;
                $parents_info = '';
                if(!empty($result->father_first_name)){
                    $parents_info .= $result->father_first_name.' '.$result->father_middel_name.' '.$result->father_last_name;
                    if(!empty($result->father_email_id)){
                        $parents_info .= '<br/><b>Email : </b>'.$result->father_email_id;
                    }
                    if(!empty($result->father_contact_no)){
                        $parents_info .= '<br/><b>Contact No : </b>'.$result->father_contact_no;
                    }
                }
                $adm_btn = '<a href="'.base_url('admission/add/'.$result->student_id).'" class="btn btn-success btn-xs">Add Admission</a>';
                $edit_btn = '<a href="'.base_url('registration/edit/'.$result->registration_id).'" class="btn btn-default btn-xs" style="border:none; background:none"><i class="fa fa-edit"></i></a>';
                if(!empty($result->admission_id)){
                    if($result->is_active == 1){
                        $status_btn = '<button class="btn btn-default btn-xs active_deactive" style="border:none; background:none" data-rid="'.$result->registration_id.'" data-at="2" disabled><i class="fa fa-check text-green"></i></button>';
                    }else{
                        $status_btn = '<button class="btn btn-default btn-xs active_deactive" style="border:none; background:none" data-rid="'.$result->registration_id.'" data-at="1" disabled><i class="fa fa-times text-red"></i></button>';
                    }
                    $delete_btn = '<button class="btn btn-default btn-xs active_deactive" style="border:none; background:none" data-rid="'.$result->registration_id.'" data-at="3" disabled><i class="fa fa-trash text-red"></i></button>';    
                }else{
                    if($result->is_active == 1){
                        $status_btn = '<button class="btn btn-default btn-xs active_deactive" style="border:none; background:none" data-rid="'.$result->registration_id.'" data-at="2"><i class="fa fa-check text-green"></i></button>';
                    }else{
                        $status_btn = '<button class="btn btn-default btn-xs active_deactive" style="border:none; background:none" data-rid="'.$result->registration_id.'" data-at="1"><i class="fa fa-times text-red"></i></button>';
                    }
                    $delete_btn = '<button class="btn btn-default btn-xs active_deactive" style="border:none; background:none" data-rid="'.$result->registration_id.'" data-at="3"><i class="fa fa-trash text-red"></i></button>';
                }
                $btn = $edit_btn.' '.$status_btn.' '.$delete_btn;
                $data[] = [
                    $i,
                    (!empty($result->form_id)) ? $result->form_id : 'Direct',
                    $result->registration_no,
                    $result->class_name,
                    $child_info,
                    $parents_info,
                    (!empty($result->admission_id)) ? '<span class="text-green">Admission Done</span>' : $adm_btn,
                    $btn
                ];   
            }
        }
        $output = [
            'draw'              => $this->datatable->draw,
            'recordsTotal'      => $this->total_data(),
            'recordsFiltered'   => count($data),
            'data'              => $data
        ];
        return $output;
    }
    function prepare_result($results){
        $output = [];
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'registration_id' => $result->registration_id,
                    ''
                ];
            }
        }
        return $output;
    }
}