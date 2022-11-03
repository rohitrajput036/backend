<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Vehicle_master extends REST_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('vehicle_master_model');
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
            if(!empty($request)){
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time'],$request->control);
                keyExist(['vehicle_master_id','branch_id','vehicle_no','vehicle_color','manufacturing_year','seating_capacity', 'pre_reserved_seat'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['vehicle_no' => $request->data->vehicle_no, 'manufacturing_year' => $request->data->vehicle_no]);
                $this->vehicle_master_model->vehicle_master_id      = $request->data->vehicle_master_id;
                $this->vehicle_master_model->branch_id              = $request->data->branch_id;
                $this->vehicle_master_model->vehicle_no             = $request->data->vehicle_no;
                $this->vehicle_master_model->vehicle_color          = $request->data->vehicle_color;
                $this->vehicle_master_model->manufacturing_year     = $request->data->manufacturing_year;
                $this->vehicle_master_model->seating_capacity       = $request->data->seating_capacity;
                $this->vehicle_master_model->pre_reserved_seat      = $request->data->pre_reserved_seat;
                $this->vehicle_master_model->is_active              = 1;
                $this->vehicle_master_model->created_by  = $this->vehicle_master_model->updated_by = (isset($request->data->login_id) && $request->data->login_id > 0) ? $request->data->login_id : 0;
                $message = 'Vehicle add successfully!';
                if(isset($request->data->vehicle_master_id) && $request->data->vehicle_master_id > 0){
                    $this->vehicle_master_model->vehicle_master_id = $request->data->vehicle_master_id;
                    $this->vehicle_master_model->update();
                    $message = 'Vehicle update successfully!';
                }else{
                    if(!$this->vehicle_master_model->check()){
                        $this->vehicle_master_model->add();
                    }else{
                        throw new Exception('Vehicle aready exists!',400);
                    }
                }
            }else{
                throw new Exception('Invalid request',400);
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
                keyExist(['vehicle_master_id','is_active'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['vehicle_master_id' => $request->data->vehicle_master_id,'is_active' => $request->data->is_active]);
                $this->vehicle_master_model->vehicle_master_id = $request->data->vehicle_master_id;
                $this->vehicle_master_model->is_active = $request->data->is_active;
                $this->vehicle_master_model->created_by = $this->vehicle_master_model->updated_by = (isset($request->data->login_id) && $request->data->login_id > 0) ? $request->data->login_id : 0; 
                $this->vehicle_master_model->delete();
                $message = 'Vehicle update successfully';
                if($request->data->is_active == 1){
                    $message = 'Vehicle no activate successfully';
                }else if($request->data->is_active == 2){
                    $message = 'Vehicle no dactivate successfully';
                }else if($request->data->is_active == 3){
                    $message = 'Vehicle no delete successfully';
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
                    $this->vehicle_master_model->is_active = $request->data->is_active;
                }
                if(isset($request->data->for_table)){
                    $request->data->for_table = true;
                }else{
                    $request->data->for_table = false;
                }
                $data = $this->vehicle_master_model->get($request->data->for_table);
                if(isset($request->data->for) && $request->data->for == 'select2'){
                    $newdata = [];
                    foreach($data as $d){
                        $newdata[] = [
                           'text' => $d['vehicle_no'],
                           'id' => $d['vehicle_master_id'] 
                        ];
                    }
                    $data = $newdata;
                }
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'control' => [
                    'status' => 1,
                    'message' => 'List of Vehicles',
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