<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class User extends REST_Controller {

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
            if (!empty($request)) {
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time','version'],$request->control);
                keyExist(['user_id','school_id','first_name','middel_name','last_name','display_name','dob','gender','mobile_no','alt_mobile_no','email_id','password','alt_email_id','address_line_1','address_line_2','state_id','city_id','pincode','doj','comment','role_id','department'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time,'version' => $request->control->version]);
                checkBlank(['school_id' => $request->data->school_id, 'first_name' => $request->data->first_name,'display_name' => $request->data->display_name,'dob' => $request->data->dob,'gender' => $request->data->gender,'mobile_no' => $request->data->mobile_no,'email_id' => $request->data->email_id,'password' => $request->data->password,'address_line_1'=> $request->data->address_line_1,'state_id' => $request->data->state_id,'city_id' => $request->data->city_id,'pincode' => $request->data->pincode,'doj' => $request->doj]);
                $this->load->model('user_model');
                $this->load->model('user_role_model');
                $this->load->model('user_department_model');
                $this->load->model('user_branch_model');
                $this->user_model->user_id          = (!empty($request->data->user_id)) ? $request->data->user_id : 0;
                $this->user_model->school_id        = $request->data->school_id;
                $this->user_model->unique_no        = $this->user_model->get_unique_id(); 
                $this->user_model->first_name       = $request->data->first_name;
                $this->user_model->middel_name      = $request->data->middel_name; 
                $this->user_model->last_name        = $request->data->last_name; 
                $this->user_model->display_name     = $request->data->display_name; 
                $this->user_model->email_id         = $request->data->email_id; 
                $this->user_model->alt_email_id     = $request->data->alt_email_id; 
                $this->user_model->display_password = $request->data->password;  
                $this->user_model->password         = $request->data->password; 
                $this->user_model->dob              = $request->data->dob; 
                $this->user_model->doj              = $request->data->doj;  
                $this->user_model->gender           = strtoupper($request->data->gender);  
                $this->user_model->contact_no       = $request->data->mobile_no;  
                $this->user_model->alt_contact_no   = $request->data->alt_mobile_no; 
                $this->user_model->address_line_1   = $request->data->address_line_1; 
                $this->user_model->address_line_2   = $request->data->address_line_2;  
                $this->user_model->city_id          = $request->data->city_id;
                $this->user_model->state_id         = $request->data->state_id;
                $this->user_model->pincode          = $request->data->pincode; 
                $this->user_model->country_id       = 0;
                $this->user_model->comment          = $request->data->comment; 
                $this->user_model->is_active        = 1; 
                $this->user_model->created_by       = $this->user_model->updated_by = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                $message = 'User add successfully!';
                if(!empty($request->data->user_id) && $request->data->user_id > 0){
                    $this->user_model->update();
                    $message = 'User update successfully!';
                }else{
                    if(!$this->user_model->check()){
                        $this->user_model->add();
                    }
                }
                if($this->user_model->user_id > 0){
                    // code for add and edit role
                    $this->user_role_model->user_id = $this->user_model->user_id;
                    $this->user_role_model->role_id = $request->data->role_id;
                    $this->user_role_model->is_active = 1;
                    $this->user_role_model->created_by       = $this->user_role_model->updated_by = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                    if($this->user_role_model->check()){
                        $this->user_role_model->is_active = 2;
                        $this->user_role_model->delete();
                    }
                    $this->user_role_model->is_active = 1;
                    $this->user_role_model->add();

                    // code for add and edit in departments
                    if(!empty($request->data->department)){
                        $this->user_department_model->user_id = $this->user_model->user_id;
                        $this->user_department_model->is_active = 1;
                        if($this->user_department_model->check_for_user()){
                            $this->user_department_model->is_active = 2;
                            $this->user_department_model->delete_all();
                        }
                        $this->user_department_model->user_id = $this->user_model->user_id;
                        $this->user_department_model->is_active = 1;
                        foreach($request->data->department as $d){
                            $this->user_department_model->department_id = $d;
                            $this->user_department_model->add();
                        }
                    }
                }
            }else{
                throw new Exception('Invalid Request',400);
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
}