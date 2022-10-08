<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_follow_up_model extends CI_Model {
    
    public $enquiry_follow_up_id, $enquiry_id, $follow_up_status_id, $remarks, $follow_up_date, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    
    function __construct() {
        parent::__construct();
        $this->enquiry_follow_up_id = 0;
        $this->enquiry_id = 0;
        $this->follow_up_status_id = 0;
        $this->remarks ='';
        $this->follow_up_date = NULL;
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'enquiry_follow_up';
    }

    function add(){
        $insert_data = [
            'enquiry_id'            => $this->enquiry_id,
            'follow_up_status_id'   => $this->follow_up_status_id,
            'remarks'               => $this->remarks,
            'follow_up_date'        => $this->follow_up_date,
            'is_active'             => $this->is_active,
            'created_by'            => $this->created_by,
            'created_on'            => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->enquiry_follow_up_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $where = [
            'enquiry_id'            => $this->enquiry_id,
            'follow_up_status_id'   => $this->follow_up_status_id,
            'remarks'               => $this->remarks,
            'follow_up_date'        => $this->follow_up_date,
            'is_active'             => $this->is_active
        ];
        $results = $this->global_model->select($this->table_name,$where);
        if(isset($results) && $results->num_rows() > 0){
            $this->enquiry_follow_up_id = $results->row()->enquiry_follow_up_id;
            return true;
        }else{
            return false;
        }
    }

    function update(){
        $where['enquiry_follow_up_id'] = $this->enquiry_follow_up_id;
        $update_data = [
            'enquiry_id'            => $this->enquiry_id,
            'follow_up_status_id'   => $this->follow_up_status_id,
            'remarks'               => $this->remarks,
            'follow_up_date'        => $this->follow_up_date,
            'updated_by'            => $this->updated_by,
            'updated_on'            => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function delete(){
        $where['enquiry_follow_up_id'] = $this->enquiry_follow_up_id;
        $update_data = [
            'is_active'   => $this->is_active,
            'updated_by'  => $this->updated_by,
            'updated_on'  => $this->updated_on
        ];
        return $this->global_model->update($this->table_name,$update_data,$where);
    }

    function get(){
        $output = [];
        $this->load->model('follow_up_status_model');
        $this->load->model('user_model');
        $where['ef.enquiry_id'] = $this->enquiry_id;
        if(!empty($this->is_active)){
            $where['ef.is_active'] = $this->is_active;
        }else{
            $where['ef.is_active IN (1,2)'] = NULL;
        }
        $joins = [
            $this->follow_up_status_model->table_name.' fs' => ['(ef.follow_up_status_id = fs.follow_up_status_id AND fs.is_active = 1)','INNER'],
            $this->user_model->table_name.' u' => ['(ef.created_by = u.user_id AND u.is_active = 1)','LEFT']

        ];
        $fields = 'ef.enquiry_follow_up_id, ef.enquiry_id, ef.follow_up_status_id, fs.follow_up_status, ef.remarks, ef.follow_up_date, ef.is_active, ef.created_by called_user_id,u.first_name,u.middel_name,u.last_name,u.display_name,u.unique_no, ef.created_on';
        $order_by = ['ef.created_on' => 'ASC'];
        $results = $this->global_model->select($this->table_name.' ef', $where, $fields, $joins,NULL,NULL,$order_by);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $called_user_name = $result->display_name;
                if(empty($called_user_name)){
                    $called_user_name = $result->first_name.' '.$result->middel_name.' '.$result->last_name;
                }
                if(!empty($result->unique_no)){
                    $called_user_name .=' ('.$result->unique_no.')';
                }
                $output[] = [
                    'enquiry_follow_up_id'  => $result->enquiry_follow_up_id,
                    'enquiry_id'            => $result->enquiry_id,
                    'follow_up_status_id'   => $result->follow_up_status_id,
                    'follow_up_status'      => $result->follow_up_status,
                    'remarks'               => $result->remarks,
                    'follow_up_date'        => $result->follow_up_date,
                    'display_follow_up_date' => (!empty($result->follow_up_date) && $result->follow_up_date != '0000-00-00 00:00:00') ? date('d/m/Y h:i A',strtotime($result->follow_up_date)) : '',
                    'called_user_id'        => (int) $result->called_user_id,
                    'called_user_name'      => (!empty($called_user_name)) ? $called_user_name : 'NA', 
                    'first_later'           => (!empty($called_user_name)) ? strtoupper(substr($called_user_name,0,1)) : 'N',
                    'called_time'           => $result->created_on,
                    'display_called_time'   => date('d/m/Y h:i A',strtotime($result->created_on))
                ];
            }
        }
        return $output;
    }
}