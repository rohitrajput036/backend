<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Enquiry extends REST_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index_get() {
        $StartTime = microtime(true);
        $response = [
            'control' => [
                'status' => 0,
                'message' => 'You have wrong direction, Please check the manual',
                'message_code' => REST_Controller::HTTP_BAD_REQUEST,
                'time_taken' => (microtime(true) - $StartTime) . ' Second'
            ],
            'data' => []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function index_post() {
        $StartTime = microtime(true);
        $response = [
            'control' => [
                'status' => 0,
                'message' => 'You have wrong direction, Please check the manual',
                'message_code' => REST_Controller::HTTP_BAD_REQUEST,
                'time_taken' => (microtime(true) - $StartTime) . ' Second'
            ],
            'data' => []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
    }

    function add_post(){
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)){
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time','version'],$request->control);
                keyExist(['enquiry_id','enquiry_date','branch_id','class_id','child_first_name','child_middel_name','child_last_name','gender','child_dob','child_age','sibling','sibling_dob','child_add_line_1','child_add_line_2','child_state_id','child_city_id','child_pincode','father_first_name','father_middel_name','father_last_name','father_mobile_no','father_email_id','father_education_id','father_occupation_id','mother_first_name','mother_middel_name','mother_last_name','mother_mobile_no','mother_email_id','mother_education_id','mother_occupation_id','follow_up_status_id','comment','follow_up_date_time'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time, 'version' => $request->control->version]);
                checkBlank(['enquiry_date' => $request->data->enquiry_date, 'branch_id' => $request->data->branch_id, 'first_name' => $request->data->child_first_name, 'father_first_name' => $request->data->father_first_name, 'father_mobile_no' => $request->data->father_mobile_no]);
                $this->load->model('enquiry_master_model');
                $this->load->model('enquiry_follow_up_model');
                $this->enquiry_master_model->enquiry_id = $request->data->enquiry_id;
                $this->enquiry_master_model->enquiry_date = date('Y-m-d',strtotime($request->data->enquiry_date));
                $this->enquiry_master_model->branch_id = $request->data->branch_id;
                $this->enquiry_master_model->form_id = 0;
                $this->enquiry_master_model->student_id = 0;
                $this->enquiry_master_model->class_id = $request->data->class_id;
                $this->enquiry_master_model->follow_up_status_id = $request->data->follow_up_status_id;
                $this->enquiry_master_model->follow_up_date = (!empty($request->data->follow_up_date_time)) ? date('Y-m-d H:i:s',strtotime($request->data->follow_up_date_time)) : NULL;
                $this->enquiry_master_model->first_name = $request->data->child_first_name;
                $this->enquiry_master_model->middel_name = $request->data->child_middel_name;
                $this->enquiry_master_model->last_name = $request->data->child_last_name;
                $this->enquiry_master_model->gender = $request->data->gender;
                $this->enquiry_master_model->date_of_birth = (!empty($request->data->child_dob)) ? date('Y-m-d',strtotime($request->data->child_dob)) : NULL;
                $this->enquiry_master_model->age = $request->data->child_age;
                $this->enquiry_master_model->sibling = $request->data->sibling;
                $this->enquiry_master_model->sibling_dob = $request->data->sibling_dob;
                $this->enquiry_master_model->add_line_1 = $request->data->child_add_line_1;
                $this->enquiry_master_model->add_line_2 = $request->data->child_add_line_2;
                $this->enquiry_master_model->state_id = $request->data->child_state_id;
                $this->enquiry_master_model->city_id = $request->data->child_city_id;
                $this->enquiry_master_model->pincode = $request->data->child_pincode;
                $this->enquiry_master_model->father_first_name = $request->data->father_first_name;
                $this->enquiry_master_model->father_middel_name = $request->data->father_middel_name;
                $this->enquiry_master_model->father_last_name = $request->data->father_last_name;
                $this->enquiry_master_model->father_mobile_no = $request->data->father_mobile_no;
                $this->enquiry_master_model->father_email_id = $request->data->father_email_id;
                $this->enquiry_master_model->father_education_type_id = $request->data->father_education_id;
                $this->enquiry_master_model->father_occupation_type_id = $request->data->father_occupation_id;
                $this->enquiry_master_model->mother_first_name = $request->data->mother_first_name;
                $this->enquiry_master_model->mother_middel_name = $request->data->mother_middel_name;
                $this->enquiry_master_model->mother_last_name = $request->data->mother_last_name;
                $this->enquiry_master_model->mother_mobile_no = $request->data->mother_mobile_no;
                $this->enquiry_master_model->mother_email_id = $request->data->mother_email_id;
                $this->enquiry_master_model->mother_education_type_id = $request->data->mother_education_id;
                $this->enquiry_master_model->mother_occupation_type_id = $request->data->mother_occupation_id;
                $this->enquiry_master_model->is_active = 1;
                $this->enquiry_master_model->created_by = $this->enquiry_master_model->updated_by = (isset($request->data->login_id) && !empty($request->data->login_id)) ? $request->data->login_id : 0;
                $message = 'Enquiry add successfully!';
                if(isset($request->data->enquiry_id) && $request->data->enquiry_id > 0){
                    $this->enquiry_master_model->update();
                    $message = 'Enquiry update successfully!';
                }else{
                    if(!$this->enquiry_master_model->check()){
                        $this->enquiry_master_model->add();
                    }else{
                        throw new Exception('Enquiry already exists with the same mobile no!');
                    }
                }
                if(isset($request->data->enquiry_id) && $request->data->enquiry_id == 0){
                    if($this->enquiry_master_model->enquiry_id > 0){
                        $this->enquiry_follow_up_model->enquiry_id = $this->enquiry_master_model->enquiry_id;
                        $this->enquiry_follow_up_model->follow_up_status_id = $request->data->follow_up_status_id;
                        $this->enquiry_follow_up_model->remarks = $request->data->comment;
                        $this->enquiry_follow_up_model->follow_up_date = (!empty($request->data->follow_up_date_time)) ? date('Y-m-d H:i:s',strtotime($request->data->follow_up_date_time)) : NULL;
                        $this->enquiry_follow_up_model->is_active = 1;
                        $this->enquiry_follow_up_model->created_by = $this->enquiry_follow_up_model->updated_by = (isset($request->data->login_id) && !empty($request->data->login_id)) ? $request->data->login_id : 0;
                        if(!$this->enquiry_follow_up_model->check()){
                            $this->enquiry_follow_up_model->add();
                        }
                    }
                }
            }else{
                throw new Exception('Invalid request!',400);
            }
            $response = [
                'control' => [
                    'status' => 1,
                    'message' => $message,
                    'message_code' => REST_Controller::HTTP_OK,
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => []
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, REST_Controller::HTTP_OK);
        }catch (Exception $E) {
            $this->log4php->log('error', 'ERROR', $api_name, $uuid, $E->getMessage(), 0);
            $response = [
                'control' => [
                    'status' => 0,
                    'message' => $E->getMessage(),
                    'message_code' => $E->getCode(),
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => []
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, $E->getCode());
        }
    }

    function get_post(){
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)){
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time','version'],$request->control);
                keyExist(['branch_id'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time, 'version' => $request->control->version]);
                $this->load->model('enquiry_master_model');
                $this->enquiry_master_model->branch_id = $request->data->branch_id;
                if(isset($request->data->mobile_no)){
                    $this->enquiry_master_model->father_mobile_no = $request->data->mobile_no;
                }
                if(isset($request->data->enquiry_id)){
                    $this->enquiry_master_model->enquiry_id = $request->data->enquiry_id;
                }
                if(!isset($request->data->for_table)){
                    $request->data->for_table = false;
                } else {
                    $this->enquiry_master_model->for_table =  $request->data->for_table;
                }
                if(isset($request->data->follow_up_status_id)){
                    $this->enquiry_master_model->follow_up_status_id = $request->data->follow_up_status_id;
                }
                $data = $this->enquiry_master_model->get();
            }else{
                throw new Exception('Invalid request!',400);
            }
            $response = [
                'control' => [
                    'status' => 1,
                    'message' => 'Enquiry list!',
                    'message_code' => REST_Controller::HTTP_OK,
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => $data
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, REST_Controller::HTTP_OK);
        }catch (Exception $E) {
            $this->log4php->log('error', 'ERROR', $api_name, $uuid, $E->getMessage(), 0);
            $response = [
                'control' => [
                    'status' => 0,
                    'message' => $E->getMessage(),
                    'message_code' => $E->getCode(),
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => []
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, $E->getCode());
        }
    }

    function add_followup_post(){
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)){
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time','version'],$request->control);
                keyExist(['enquiry_id','follow_up_status_id','remarks','follow_up_date'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time, 'version' => $request->control->version]);
                checkBlank(['enquiry_id' => $request->data->enquiry_id,'follow_up_status_id' => $request->data->follow_up_status_id]);
                if($request->data->follow_up_status_id != 6){
                    checkBlank(['remarks' => $request->data->remarks, 'follow_up_date' => $request->data->follow_up_date]);
                }
                $this->load->model('enquiry_follow_up_model');
                $this->enquiry_follow_up_model->enquiry_id = $request->data->enquiry_id;
                $this->enquiry_follow_up_model->follow_up_status_id = $request->data->follow_up_status_id;
                $this->enquiry_follow_up_model->remarks = $request->data->remarks;
                $this->enquiry_follow_up_model->follow_up_date = (!empty($request->data->follow_up_date)) ? date('Y-m-d H:i:s',strtotime($request->data->follow_up_date)) : NULL;
                $this->enquiry_follow_up_model->is_active = 1;
                $this->enquiry_follow_up_model->created_by = $this->enquiry_follow_up_model->updated_by = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                $this->enquiry_follow_up_model->add();
                $this->load->model('enquiry_master_model');
                $this->enquiry_master_model->enquiry_id             = $request->data->enquiry_id;
                $this->enquiry_master_model->follow_up_status_id    = $request->data->follow_up_status_id;
                $this->enquiry_master_model->follow_up_date         = (!empty($request->data->follow_up_date)) ? date('Y-m-d H:i:s',strtotime($request->data->follow_up_date)) : NULL;
                $this->enquiry_master_model->created_by             = $this->enquiry_master_model->updated_by = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                $this->enquiry_master_model->update_follow_up_status();
                $response = [
                    'control' => [
                        'status' => 1,
                        'message' => 'Follow up add successfully!',
                        'message_code' => REST_Controller::HTTP_OK,
                        'time_taken' => (microtime(true) - $start_time) . ' Second'
                    ],
                    'data' => (object) []
                ];
                $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
                $this->response($response, REST_Controller::HTTP_OK);
            }else{
                throw new Exception('Invalid request!',REST_Controller::HTTP_BAD_REQUEST);
            }
        }catch (Exception $E) {
            $this->log4php->log('error', 'ERROR', $api_name, $uuid, $E->getMessage(), 0);
            $response = [
                'control' => [
                    'status' => 0,
                    'message' => $E->getMessage(),
                    'message_code' => $E->getCode(),
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => []
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, $E->getCode());
        }
    }
}