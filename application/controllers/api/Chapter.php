<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Chapter extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('chapter_model');
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

    public function add_post(){
        $start_time = microtime(true);
        try{
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if(!empty($request)){
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time'],$request->control);
                keyExist(['chapter_id', 'subject_id', 'class_id' , 'chapter_name'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['subject_id' => $request->data->subject_id, 'class_id' =>$request->data->class_id, 'chapter_name' => $request->data->chapter_name]);
                $this->chapter_model->chapter_id = $request->data->chapter_id;
                $this->chapter_model->subject_id = $request->data->subject_id;
                $this->chapter_model->class_id = $request->data->class_id;
                $this->chapter_model->chapter_name = $request->data->chapter_name;
                $this->chapter_model->is_active = 1;
                $this->chapter_model->created_by = $this->chapter_model->updated_by = (isset($request->data->login_id) && $request->data->login_id > 0) ? $request->data->login_id : 0;
                $message = 'Chapter add successfully!';
                if(isset($request->data->chapter_id) && $request->data->chapter_id > 0){
                    $this->chapter_model->chapter_id = $request->data->chapter_id;
                    $this->chapter_model->update();
                    $message = 'Chapter update successfully!';
                }else{
                    if(!$this->chapter_model->check()){
                        $this->chapter_model->add();
                    }else{
                        throw new Exception('Chapter name  aready exists!',400);
                    }
                }
            }else{
                throw new Exception('Invalid request',400);
            }
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

    function get_post() {
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                if(isset($request->data->is_active)){
                    $this->chapter_model->is_active = $request->data->is_active;
                }
                if(isset( $request->data->chapter_id)){
                    $this->chapter_model->chapter_id = $request->data->chapter_id;
                }
                if(isset($request->data->subject_id)){
                    $this->chapter_model->subject_id = $request->data->subject_id;
                }
                if(isset($request->data->class_id)){
                    $this->chapter_model->class_id = $request->data->class_id;
                }
                if(!isset($request->data->for_table)){
                    $request->data->for_table = false;
                }
                $this->chapter_model->for_table = $request->data->for_table;
                $data = $this->chapter_model->get();
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'control' => [
                    'status' => 1,
                    'message' => 'List of chapters',
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
                keyExist(['chapter_id','is_active'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['chapter_id' => $request->data->chapter_id,'is_active' => $request->data->is_active]);
                $this->chapter_model->chapter_id = $request->data->chapter_id;
                $this->chapter_model->is_active = $request->data->is_active;
                $this->chapter_model->created_by = $this->chapter_model->updated_by = (isset($request->data->login_id) && $request->data->login_id > 0) ? $request->data->login_id : 0; 
                $this->chapter_model->delete();
                $message = 'chapter update successfully';
                if($request->data->is_active == 1){
                    $message = 'chapter name activate successfully';
                }else if($request->data->is_active == 2){
                    $message = 'chapter dactivate successfully';
                }else if($request->data->is_active == 3){
                    $message = 'chapter delete successfully';
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