<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Academic_session_model extends CI_Model {
    public $academic_session_id, $academic_session, $start_date, $end_date, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $get_current, $date;
    function __construct() {
        parent::__construct();
        $this->academic_session_id  = 0;
        $this->academic_session     = '';
        $this->start_date           = '';
        $this->end_date             = '';
        $this->is_active            = '';
        $this->created_by           = 0;
        $this->created_on           = date('Y-m-d H:i:s');
        $this->updated_by           = 0;
        $this->updated_on           = date('Y-m-d H:i:s');
        $this->get_current          = false;
        $this->date                 = '';
        $this->table_name           = DB_NAME.'academic_session';
    }

    function add(){
        $insert_data = [
            'academic_session'  => $this->academic_session,
            'start_date'        => $this->start_date,
            'end_date'          => $this->end_date,
            'is_active'         => $this->is_active,
            'created_by'        => $this->created_by,
            'created_on'        => $this->created_on
        ];
        if ($this->global_model->insert($this->table_name, $insert_data)) {
            $this->academic_session_id = $this->db->insert_id();
        } else {
            throw new Exception("Issue in insertion", 500);
        }
    }

    function check(){
        $where['is_active'] = $this->is_active;
        $where['end_date <= '] = $this->start_date;
        $results = $this->global_model->select($this->table_name,$where);
        if(isset($results) && $results->num_rows() > 0){
            $this->academic_session_id = $results->row()->academic_session_id;
            return true;
        }else{
            return false;
        }
    }

    function get(){
        $output = [];
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active in (1,2)'] = NULL;
        }
        if($this->get_current){
            $this->date = (empty($this->date)) ? date('Y-m-d') : $this->date;
            $where['"'.$this->date.'" >= start_date AND "'.$this->date.'" <= end_date'] = NULL;
        }
        $results = $this->global_model->select($this->table_name,$where);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'academic_session_id'   => $result->academic_session_id,
                    'academic_session'      => $result->academic_session,
                    'start_date'            => $result->start_date,
                    'end_date'              => $result->end_date,
                    'is_active'             => $result->is_active,
                    'created_by'            => $result->created_by,
                    'created_on'            => $result->created_on
                ];
            }   
        }
        return ($this->get_current) ? ((isset($output[0])) ? $output[0] : []) : $output;
    }
}