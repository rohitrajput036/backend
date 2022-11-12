<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Batch extends REST_Controller {

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
        try{
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = (isset($request->control) && property_exists($request->control,"request_id")) ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                keyExist(['control', 'data'],$request);
                keyExist(['request_id', 'source', 'request_time'],$request->control);
                keyExist(['batch_id','branch_id', 'batch_name', 'start_time','end_time'], $request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['branch_id' => $request->data->branch_id, 'batch_name' => $request->data->batch_name, 'start_time' => $request->data->start_time, 'end_time' => $request->data->end_time]);
                $this->load->model('batch_model');
                $this->batch_model->batch_id = (!empty($request->data->batch_id)) ? $request->data->batch_id : 0;
                $this->batch_model->branch_id = $request->data->branch_id;
                $this->batch_model->batch_name = $request->data->batch_name;
                $this->batch_model->start_time = $request->data->start_time;
                $this->batch_model->end_time = $request->data->end_time;
                $this->batch_model->is_active = 1;
                $this->batch_model->created_by = $this->batch_model->updated_by = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                $msg = 'Batch create successfully!';
                if($this->batch_model->batch_id > 0){
                    $this->batch_model->update();
                    $msg = 'Batch update successfully!';
                }else{
                    if(!$this->batch_model->check()){
                        $this->batch_model->add();
                    }else{
                        throw new Exception('Batch alreay exists with the same name & time!',REST_Controller::HTTP_BAD_REQUEST);
                    }
                }
            }else{
                throw new Exception('Invalid request',REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'control' => [
                    'status' => 1,
                    'message' => $msg,
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
        try{
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = (isset($request->control) && property_exists($request->control,"request_id")) ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                keyExist(['control', 'data'],$request);
                keyExist(['request_id', 'source', 'request_time'],$request->control);
                keyExist(['batch_id','branch_id','is_active', 'login_id'], $request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['batch_id' => $request->data->batch_id, 'branch_id' => $request->data->branch_id, 'is_active' => $request->data->is_active, 'login_id' => $request->data->login_id]);
                $this->load->model('batch_model');
                $this->batch_model->batch_id = (!empty($request->data->batch_id)) ? $request->data->batch_id : 0;
                $this->batch_model->branch_id = $request->data->branch_id;
                $this->batch_model->is_active = $request->data->is_active;
                $this->batch_model->created_by = $this->batch_model->updated_by = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                $this->batch_model->delete();
            }else{
                throw new Exception('Invalid request',REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'control' => [
                    'status' => 1,
                    'message' => 'Status update successfully!',
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
        try{
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = (isset($request->control) && property_exists($request->control,"request_id")) ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                keyExist(['control', 'data'],$request);
                keyExist(['request_id', 'source', 'request_time'],$request->control);
                keyExist(['branch_id'], $request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['branch_id' => $request->data->branch_id]);
                $this->load->model('batch_model');
                $this->batch_model->batch_id = (isset($request->data->batch_id) && !empty($request->data->batch_id)) ? $request->data->batch_id : 0;
                $this->batch_model->branch_id = $request->data->branch_id;
                if(isset($request->data->is_active)){
                    $this->batch_model->is_active = $request->data->is_active;
                }
                $this->batch_model->created_by = $this->batch_model->updated_by = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                if(!isset($request->data->for_table)){
                    $request->data->for_table = false;
                }
                $this->batch_model->get($request->data->for_table);
            }else{
                throw new Exception('Invalid request',REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'control' => [
                    'status' => 1,
                    'message' => 'Batch List!',
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