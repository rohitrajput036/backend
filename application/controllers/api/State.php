<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class State extends REST_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('state_model');
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

    function get_post(){
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                if(isset($request->data->is_active)){
                    $this->state_model->status = $request->data->is_active;
                }
                if(isset($request->data->country_id)){
                    $this->state_model->country_id = $request->data->country_id;
                }
                $data = $this->state_model->get();
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'Control' => [
                    'status' => 1,
                    'message' => 'List of state',
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
}