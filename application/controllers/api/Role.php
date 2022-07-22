<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Role extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('role_model');
    }

    public function index_get() {
        $StartTime = microtime(true);
        $response = [
            'Control' => [
                'Status' => 0,
                'Message' => 'You have wrong direction, Please check the manual',
                'MessageCode' => REST_Controller::HTTP_BAD_REQUEST,
                'TimeTaken' => (microtime(true) - $StartTime) . ' Second'
            ],
            'Data' => []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function index_post() {
        $StartTime = microtime(true);
        $response = [
            'Control' => [
                'Status' => 0,
                'Message' => 'You have wrong direction, Please check the manual',
                'MessageCode' => REST_Controller::HTTP_BAD_REQUEST,
                'TimeTaken' => (microtime(true) - $StartTime) . ' Second'
            ],
            'Data' => []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
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
                    $this->role_model->is_active = $request->data->is_active;
                }
                if(isset($request->data->for_table)){
                    $request->data->for_table = true;
                }else{
                    $request->data->for_table = false;
                }
                $data = $this->role_model->get($request->data->for_table);
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'control' => [
                    'status' => 1,
                    'message' => 'List of roles',
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
                'Control' => [
                    'Status' => 0,
                    'Message' => $E->getMessage(),
                    'MessageCode' => $E->getCode(),
                    'TimeTaken' => (microtime(true) - $start_time) . ' Second'
                ],
                'Data' => []
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, $E->getCode());
        }
    }
}