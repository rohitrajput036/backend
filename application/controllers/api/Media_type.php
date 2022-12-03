<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Media_type extends REST_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('media_type_model');
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
                keyExist(['media_type_id','media_type'],$request->data);
                checkBlank(['request_id' => $request->control->request_id, 'source' => $request->control->source, 'request_time' => $request->control->request_time]);
                checkBlank(['media_type' => $request->data->media_type]);
                $this->media_type_model->media_type_id = $request->data->media_type_id;
                $this->media_type_model->media_type    = $request->data->media_type;
                $this->media_type_model->is_active     = 1;
                $this->media_type_model->created_by = $this->media_type_model->created_by = (isset($request->data->login_id) && $request->data->login_id > 0) ? $request->data->login_id : 0;
                $message = 'Media add successfully.';
                if(isset($request->data->relation_id) && $request->data->relation_id > 0){
                    $this->relation_master_model->relation_id = $request->data->relation_id;
                    $this->relation_master_model->update();
                    $message = 'Media update successfully.';
                } else{
                    if(!$this->relation_master_model->check()){
                        $this->relation_master_model->add();
                    }
                }
            } else{
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