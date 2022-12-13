<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Student extends REST_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('student_model');
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
            'data' => (object) []
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
            'data' => (object) []
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
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time'],$request->control);
                keyExist(['branch_id','login_id'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['branch_id' => $request->data->branch_id]);
                $student_id = (isset($request->data->student_id) && $request->data->student_id > 0) ? $request->data->student_id : 0;
                $this->load->model('student_model');
                $this->student_model->student_id = $student_id;
                if(isset($request->data->is_active)){
                    $this->student_model->is_active = $request->data->is_active;
                }
                if(isset($request->data->format) && $request->data->format == 'datatable'){
                    $this->student_model->datatable = $request->data;
                }
                $results = $this->student_model->get();
                $response = [
                    'control' => [
                        'status' => 1,
                        'message' => ($student_id > 0 )? 'Student detail!' : 'List of students!',
                        'message_code' => REST_Controller::HTTP_OK,
                        'time_taken' => (microtime(true) - $start_time) . ' Second'
                    ],
                    'data' => $results
                ];
                if(isset($request->data->format) && $request->data->format == 'datatable'){
                    $results['status'] = 1;
                    $results['message'] = 'List of registration!';
                    $results['message_code'] = REST_Controller::HTTP_OK;
                    $results['time_taken'] = (microtime(true) - $start_time) . ' Second';
                    $response = $results;
                }
                $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
                $this->response($response, REST_Controller::HTTP_OK);
            }else{
                throw new Exception('Invalid request',REST_Controller::HTTP_BAD_REQUEST);
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

    function add_post(){
        $start_time = microtime(true);
        try{
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time'],$request->control);
                keyExist(['student_id','registration_id','first_name','middle_name','last_name','date_of_birth','place_of_birth','gender','cast_category_id','cast_name','nationality_id','religion_id','address_line_1','address_line_2','area_id','city_id','state_id','pincode','permanent_addresss_line_1','permanent_addresss_line_2','permanent_area_id','permanent_city_id','permanent_state_id','permanent_pincode','mother_tongue','blood_group','indentification_mark_1','indentification_mark_2','remarks'],$request->data);
                checkBlank(['request_id' =>$request->control->request_id, 'source' =>$request->control->source, 'request_time' =>$request->control->request_time]);
                checkBlank(['registration_id' =>$request->data->registration_id,'first_name' =>$request->data->first_name, 'date_of_birth' =>$request->data->date_of_birth, 'cast_category_id' =>$request->data->cast_category_id, 'state_id' =>$request->data->state_id, 'city_id' =>$request->data->city_id]);
                

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