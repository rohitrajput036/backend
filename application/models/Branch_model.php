<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_model extends CI_Model {

    public $branch_id, $branch_code, $branch_name, $gst_no, $add_line_1, $add_line_2, $state_id, $state_code, $city_id, $pincode, $branch_location, $start_date, $concat_person_name, $contact_no, $alt_contact_no, $email_id, $royality_case, $comments, $user_id, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name,$for_table;

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
        $this->for_table            = false;
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
        $this->load->model('user_model');
        $this->load->model('user_branch_model');
        $this->load->model('user_role_model');
        $this->load->model('city_model');
        $this->load->model('user_department_model');
        $this->load->model('branch_fee_structure_model');
        if($this->branch_id > 0){
            $where['b.branch_id'] = $this->branch_id;
        }
        if(!empty($this->is_active)){
            $where['b.is_active'] = $this->is_active;
        }else{
            $where['b.is_active IN ("1","2")'] = NULL;
        }
        $joins = [
            $this->city_model->table_name.' c'=> ['(b.city_id = c.city_id AND c.is_active = 1)','INNER'],
            $this->user_branch_model->table_name.' ub' => ['(b.branch_id = ub.branch_id AND ub.is_active = 1)','INNER'],
            $this->user_model->table_name.' u' => ['(ub.user_id = u.user_id AND u.is_active = 1)','INNER'],
            $this->user_role_model->table_name.' ur' => ['(u.user_id = ur.user_id AND ur.is_active = 1)','INNER']
        ];
        $fields = "b.*,c.city_name,u.email_id,u.display_password,u.alt_email_id,u.first_name,u.middel_name,u.last_name,u.gender,u.user_id";
        $order_by= ['b.branch_name' => 'ASC'];
        $results = $this->global_model->select($this->table_name.' b',$where,$fields,$joins,NULL,NULL,$order_by);
        $output = [];
        if(isset($results) && $results->num_rows() > 0){
            $i=0;
            foreach($results->result() as $result){
                //print_r($result);exit;
                ++$i;
                if($this->for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-branchid="'.$result->branch_id.'" data-at="2" style="background:none"><i class="fa fa-check text-green"></i></button>';
                    }else{
                        $active_deactive_btn = '<button class="btn active_deactive btn-xs" data-branchid="'.$result->branch_id.'" data-at="1" style="background:none"><i class="fa fa-times text-red"></i></button>';
                    }
                    $delete_btn = '<button class="btn active_deactive btn-xs" data-branchid="'.$result->branch_id.'" data-at="3" style="background:none"><i class="fa fa-trash text-red"></i></button>';
                    $edit_btn = '<a class="btn edit btn-xs" href="'.base_url('branch/edit/'.$result->branch_id).'" data-branchid="'.$result->branch_id.'" data-branch_name="'.$result->branch_name.'" data-branch_code="'.$result->branch_code.'" data-add_line_1="'. $result->add_line_1.'" data-add_line_2="'.$result->add_line_2.'" data-pincode="'.$result->pincode.'"  data-branch_location="'.$result->branch_location.'" data-email_id="'.$result->email_id.'" style="background:none"><i class="fa fa-pencil-square-o text-primary"></i></a>';
                    $enter_btn = '<button class="btn btn-success enter btn-xs" data-branchid="'.$result->branch_id.'">
                    Enter
                    </button>';
                    $btns = $active_deactive_btn.''.$delete_btn.''.$edit_btn.' '.$enter_btn;
                    $output[] = [
                        $i,
                        $result->branch_name.' ('.$result->branch_code.')',
                        $result->contact_no,
                        $result->branch_location.' ('.$result->city_name.')',
                        $result->email_id,
                        $result->display_password,
                        $btns
                    ];    
                }else{
                    $this->user_department_model->user_id = $result->user_id;
                    $this->user_department_model->is_active = 1;
                    $user_department = $this->user_department_model->get();
                    $departments = [];
                    foreach($user_department as $d){
                        $departments[] = $d['department_id'];
                    }
                    $this->branch_fee_structure_model->branch_id = $result->branch_id;
                    $this->branch_fee_structure_model->is_active = 1;
                    //$this->branch_fee_structure_model->branch_fee_structure_id = $result->fee_structure_master_id;
                    $branch_fee_structures = $this->branch_fee_structure_model->get();
                    $fee_structure_master_id = [];
                    foreach($branch_fee_structures as $bfs){
                        $fee_structure_master_id[] = $bfs['branch_fee_structure_id'];
                    }
                    $output[] = [
                        'sno'               => $i,
                        'branch_id'         => $result->branch_id,
                        'branch_name'       => $result->branch_name,
                        'branch_code'       => $result->branch_code,
                        'gst_no'            => $result->gst_no,
                        'state_id'          => $result->state_id,
                        'state_code'        => $result->state_code,
                        'city_id'           =>$result->city_id,
                        'concat_person_name'=>$result->concat_person_name,
                        'add_line_1'        => $result->add_line_1, 
                        'add_line_2'        => $result->add_line_2, 
                        'pincode'           => $result->pincode, 
                        'branch_location'   => $result->branch_location, 
                        'email_id'          => $result->email_id,
                        'start_date'        => $result->start_date,
                        'comments'          => $result->comments,
                        'contact_no'        => $result->contact_no,
                        'alt_contact_no'    => $result->alt_contact_no,
                        'alt_email_id'      => $result->alt_email_id,
                        'first_name'        =>$result->first_name,
                        'middel_name'       =>$result->middel_name,
                        'last_name'         =>$result->last_name,
                        'gender'            =>$result->gender,
                        'departments'       => $departments,
                        'fee_structure_master_id' => $fee_structure_master_id                   
                    ];
                }
            }
        }
        return $output;
    }
    function delete(){
        $where['branch_id'] = $this->branch_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        $results = $this->global_model->update($this->table_name,$update_data,$where);
        echo $this->db->last_query();exit;
        return $results;
    }

    function get_branch_code(){
        $result = $this->global_model->select($this->table_name);
        return sum_in_string('CT000'.$result->num_rows());
    }
}
