<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Subject extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('subject_model');
    }

    public function index_get(){
        $start_time = microtime(true);
        $response =[
            'control' => [
                'status'        => 0,
                'message'       => 'You have wrong direction, Please check the manual',
                'message_code'  => REST_Controller::HTTP_BAD_REQUEST,
                'time_taken'    => (microtime(true) - $start_time) . ' Second'
            ],
            'data' => []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST );
    }

    public function index_post(){
        $start_time = microtime(true);
        $response =[
            'control' => [
                'status'        => 0,
                'message'       => 'You have wrong direction, Please check the manual',
                'message_code'  => REST_Controller::HTTP_BAD_REQUEST,
                'time_taken'    => (microtime(true) - $start_time) . ' Second'
            ],
            'data' => []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST );
    }

    function add_post(){
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if(!empty($request)){
                keyExist(['control','data'], $request);
                keyExist(['request_id', 'source', 'request_time'],$request->control);
                keyExist(['subject_id', 'school_id', 'subject_name'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['school_id' => $request->data->school_id, 'subject_name' => $request->data->subject_name]);
                $this->subject_model->subject_id = $request->data->subject_id;
                $this->subject_model->school_id = $request->data->school_id;
                $this->subject_model->subject_name = $request->data->subject_name;
                $this->subject_model->is_active = 1;
                $this->subject_model->created_by = $this->subject_model->updated_by = (isset($request->data->login_id) && $request->data->login_id > 0) ? $request->data->login_id : 0;
                $message = 'Subject Add successfully!';
                if(isset($request->data->subject_id) && $request->data->subject_id > 0){
                    $this->subject_model->subject_id = $request->data->subject_id;
                    $this->subject_model->update();
                    $message = 'Subject update successfully!';
                }else{
                    if(!$this->subject_model->check()){
                        $this->subject_model->add();
                    }else{
                        throw new Exception('This subject aready exists!',400);
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

    function get_post(){
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                if(isset($request->data->is_active)){
                    $this->subject_model->is_active = $request->data->is_active;
                }
                if(isset( $request->data->subject_id)){
                    $this->subject_model->subject_id = $request->data->subject_id;
                }
                if(isset($request->data->school_id)){
                    $this->subject_model->school_id = $request->data->school_id;
                }
                if(!isset($request->data->for_table)){
                    $request->data->for_table = false;
                }
                $this->subject_model->for_table = $request->data->for_table;
                $data = $this->subject_model->get();
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'control' => [
                    'status' => 1,
                    'message' => 'List of subjects',
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
                keyExist(['subject_id','is_active'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['subject_id' => $request->data->subject_id,'is_active' => $request->data->is_active]);
                $this->subject_model->subject_id = $request->data->subject_id;
                $this->subject_model->is_active = $request->data->is_active;
                $this->subject_model->created_by = $this->subject_model->updated_by = (isset($request->data->login_id) && $request->data->login_id > 0) ? $request->data->login_id : 0; 
                $this->subject_model->delete();
                $message = 'Subject update successfully';
                if($request->data->is_active == 1){
                    $message = 'Subject name activate successfully';
                }else if($request->data->is_active == 2){
                    $message = 'Subject name dactivate successfully';
                }else if($request->data->is_active == 3){
                    $message = 'Subject delete successfully';
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