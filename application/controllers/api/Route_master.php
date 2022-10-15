<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Route_master extends REST_Controller {

    function __construct(){
        parent:: __construct();
        $this->load->model('route_master_model');
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
                keyExist(['control','datas'],$request);
                keyExist(['request_id','source','request_time'],$request->control);
                keyExist(['route_id','branch_id','route_name','vehicle_master_id','driver_master_id','guard_id'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['route_name' => $request->data->route_name, 'branch_id' => $request->data->branch_id, 'vehicle_master_id'=>$request->data->vehicle_master_id, 'driver_master_id'=>$request->data->driver_master_id, 'guard_id'=>$request->data->guard_id]);
                $this->Route_master_model->branch_id = $request->data->branch_id;
                $this->route_master_model->route_name = $request->data->route_name;
                $this->Route_master_model->vehicle_master_id = $request->data->vehicle_master_id;
                $this->Route_master_model->driver_master_id = $request->driver_master_id;
                $this->Route_master_model->guard_id = $request->guard_id;                
                $this->route_master_model->is_active = 1;
                $this->route_master_model->created_by = $this->route_master_model->updated_by = (isset($request->data->login_id) && $request->data->login_id > 0) ? $request->data->login_id : 0;
                $message = 'Route add successfully!';
                if(isset($request->data->route_id) && $request->data->route_id > 0){
                    $this->route_master_model->route_id = $request->data->route_id;
                    $this->route_master_model->update();
                    $message = 'Route update successfully!';
                }else{
                    if(!$this->route_master_model->check()){
                        $this->route_master_model->add();
                    }else{
                        throw new Exception('Name aready exists!',400);
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
                keyExist(['route_id','is_active'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['route_id' => $request->data->route_id,'is_active' => $request->data->is_active]);
                $this->route_master_model->route_id = $request->data->route_id;
                $this->route_master_model->is_active = $request->data->is_active;
                $this->route_master_model->created_by = $this->route_master_model->updated_by = (isset($request->data->login_id) && $request->data->login_id > 0) ? $request->data->login_id : 0; 
                $this->route_master_model->delete();
                $message = 'Route update successfully';
                if($request->data->is_active == 1){
                    $message = 'Route ID activate successfully';
                }else if($request->data->is_active == 2){
                    $message = 'Route ID dactivate successfully';
                }else if($request->data->is_active == 3){
                    $message = 'Route ID delete successfully';
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
}