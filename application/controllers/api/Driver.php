<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class driver extends REST_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('driver_master_model');
    }

    public function index_get() {
        $start_time = microtime(true);
        $response = [
            'control' => [
                'status' => 0,
                'message' => 'You have wrong direction, Please check the manual',
                'message_code' => REST_Controller::HTTP_BAD_REQUEST,
                'time_taken' => (microtime(true) - $start_time) . ' Second'
            ],
            'data' => []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function index_post() {
        $start_time = microtime(true);
        $response = [
            'control' => [
                'status' => 0,
                'message' => 'You have wrong direction, Please check the manual',
                'message_code' => REST_Controller::HTTP_BAD_REQUEST,
                'time_taken' => (microtime(true) - $start_time) . ' Second'
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
                keyExist(['request_id','source','request_time'],$request->control);
                keyExist(['driver_master_id', 'branch_id', 'first_name', 'middle_name', 'last_name', 'gender', 'contact_no', 'alt_contact_no', 'address_line_1', 'address_line_2', 'state_id', 'city_id', 'pincode', 'dl_no', 'driver_type'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['first_name' => $request->data->first_name, 'contact_no' => $request->data->contact_no, 'dl_no' => $request->data->dl_no, 'driver_type' => $request->data->driver_type,]);
                $this->driver_master_model->driver_master_id    = $request->data->driver_master_id;
                $this->driver_master_model->branch_id           = $request->data->branch_id;
                $this->driver_master_model->first_name          = $request->data->first_name;
                $this->driver_master_model->middle_name         = $request->data->middle_name;
                $this->driver_master_model->last_name           = $request->data->last_name;
                $this->driver_master_model->gender              = $request->data->gender;
                $this->driver_master_model->contact_no          = $request->data->contact_no;
                $this->driver_master_model->alt_contact_no      = $request->data->alt_contact_no;
                $this->driver_master_model->address_line_1      = $request->data->address_line_1;
                $this->driver_master_model->address_line_2      = $request->data->address_line_2;
                $this->driver_master_model->state_id            = $request->data->state_id;
                $this->driver_master_model->city_id             = $request->data->city_id;
                $this->driver_master_model->pincode             = $request->data->pincode;
                $this->driver_master_model->dl_no               = $request->data->dl_no;
                $this->driver_master_model->driver_type         = $request->data->driver_type;
                $this->driver_master_model->is_active           = 1;
                $this->driver_master_model->created_by = $this->driver_master_model->updated_by = (isset($request->data->login_id) && $request->data->login_id > 0) ? $request->data->login_id : 0;
                $message = 'Driver update successfully!';
                if(isset($request->data->driver_master_id) && $request->data->driver_master_id > 0){
                    $this->driver_master_model->driver_master_id = $request->data->driver_master_id;
                    $this->driver_master_model->add();
                    $message = 'Driver add successfully!';
                }else{
                    if(!$this->driver_master_model->check()){
                        $this->driver_master_model->update();
                    }else{
                        throw new Exception('Driver aready exists!',400);
                    }
                }
            }else{
                throw new Exception('Invalid request',400);
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

    function delete_post(){
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time'],$request->control);
                keyExist(['driver_master_id','is_active'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['driver_master_id' => $request->data->driver_master_id,'is_active' => $request->data->is_active]);
                $this->driver_master_model->driver_master_id = $request->data->driver_master_id;
                $this->driver_master_model->is_active = $request->data->is_active;
                $this->driver_master_model->created_by = $this->driver_master_model->updated_by = (isset($request->data->login_id) && $request->data->login_id > 0) ? $request->data->login_id : 0; 
                $this->driver_master_model->delete();
                $message = 'Driver update successfully';
                if($request->data->is_active == 1){
                    $message = 'Driver ID activate successfully';
                }else if($request->data->is_active == 2){
                    $message = 'Driver ID dactivate successfully';
                }else if($request->data->is_active == 3){
                    $message = 'Driver ID delete successfully';
                }
            }else{
                throw new Exception('Invalid request',400);
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
            if (!empty($request)) {
                if(isset($request->data->is_active)){
                    $this->driver_master_model->is_active = $request->data->is_active;
                }
                if(isset($request->data->for_table)){
                    $request->data->for_table = true;
                }else{
                    $request->data->for_table = false;
                }
                $data = $this->driver_master_model->get($request->data->for_table);
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'control' => [
                    'status' => 1,
                    'message' => 'List of driver',
                    'message_code' => REST_Controller::HTTP_OK,
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => $data
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, REST_Controller::HTTP_OK);
        } catch (Exception $E) {
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