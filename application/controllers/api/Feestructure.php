<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Feestructure extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('fee_structure_master_model');
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
                keyExist(['fee_structure_id','structure_name','is_required'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['structure_name' => $request->data->structure_name,'is_required' => $request->data->is_required]);
                if(!isset($request->data->login_id)){
                    $request->data->login_id = 0;
                }
                $this->fee_structure_master_model->fee_structure_master_id = $request->data->fee_structure_id;
                $this->fee_structure_master_model->structure_name = $request->data->structure_name;
                $this->fee_structure_master_model->is_required = $request->data->is_required;
                $this->fee_structure_master_model->is_active = 1;
                $this->fee_structure_master_model->created_by = $this->fee_structure_master_model->updated_by = (isset($request->data->login_id) && $request->data->login_id > 0) ?$request->data->login_id : 0;
                // print_r($this->fee_structure_master_model);exit;
                $message = 'Fee structure add successfully';
                if($request->data->fee_structure_id > 0){
                    $this->fee_structure_master_model->update();
                    $message = 'Fee structure successfully';
                }else{
                    if(!$this->fee_structure_master_model->check()){
                        $this->fee_structure_master_model->add();
                    } else {
                        throw new Exception('Fee structure already exists',400);        
                    }
                }
                $data = [];
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'Control' => [
                    'status' => 1,
                    'message' => (!empty($request->data->fee_structure_id)) ? 'Fee structure update succefully' : 'Fee structure add succefully',
                    'message_code' => REST_Controller::HTTP_OK,
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => $data
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, REST_Controller::HTTP_OK);
        } catch (Exception $E) {
            $this->log4php->log('error', 'ERROR', $api_name, $uuid, $E->getMessage(), 0);
            $Response = [
                'control' => [
                    'status' => 0,
                    'message' => $E->getMessage(),
                    'message_code' => $E->getCode(),
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => [
                ]
            ];
            $this->response($Response, $E->getCode());
        }
    }
    function get_post() {
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                if(isset($request->data->is_active)){
                    $this->fee_structure_master_model->is_active = $request->data->is_active;
                }
                $for_table = false;
                if(isset($request->data->for_table)){
                    $for_table = $request->data->for_table;
                }
                $data = $this->fee_structure_master_model->get($for_table);
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'Control' => [
                    'status' => 1,
                    'message' => 'List of Fee Headers',
                    'message_code' => REST_Controller::HTTP_OK,
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => $data
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, REST_Controller::HTTP_OK);
        } catch (Exception $E) {
            $this->log4php->log('error', 'ERROR', $api_name, $uuid, $E->getMessage(), 0);
            $Response = [
                'control' => [
                    'status' => 0,
                    'message' => $E->getMessage(),
                    'message_code' => $E->getCode(),
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => [
                ]
            ];
            $this->response($Response, $E->getCode());
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
                keyExist(['fee_structure_id','is_active'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['fee_structure_id' => $request->data->fee_structure_id,'is_active' => $request->data->is_active]);
                if(!isset($request->data->login_id)){
                    $request->data->login_id = 0;
                }
                $this->fee_structure_master_model->fee_structure_master_id = $request->data->fee_structure_id;
                $this->fee_structure_master_model->is_active =  $request->data->is_active;
                $this->fee_structure_master_model->updated_by = $request->data->login_id;
                $this->fee_structure_master_model->delete();

                $message = 'Fee structure update successfully';
                if($request->data->is_active == 1){
                    $message = 'Fee structure activate successfully';
                }else if($request->data->is_active == 2){
                    $message = 'Fee structure dactivate successfully';
                }else if($request->data->is_active == 3){
                    $message = 'Fee structure delete successfully';
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
    