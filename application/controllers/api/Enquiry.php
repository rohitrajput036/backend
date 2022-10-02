<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Enquiry extends REST_Controller {

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
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)){
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time','version'],$request->control);
                keyExist(['enquiry_id','enquiry_date','branch_id','form_id','student_id','class_id','first_name','middel_name','last_name','gender','date_of_birth','age','sibling','sibling_dob','add_line_1','add_line_2','state_id','city_id','pincode','father_first_name','father_middel_name','father_last_name','father_mobile_no','father_email_id','father_education_id','father_occupation_id','mother_first_name','mother_middel_name','mother_last_name','mother_mobile_no','mother_email_id','mother_education_id','mother_occupation_id','follow_up_status_id','remarks','follow_up_date'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time, 'version' => $request->control->version]);
                checkBlank(['enquiry_date' => $request->data->enquiry_date, 'branch_id' => $request->data->branch_id, 'first_name' => $request->data->first_name, 'father_first_name' => $request->data->father_first_name, 'father_mobile_no' => $request->data->father_mobile_no]);
                
                $message = 'Enquiry add successfully!';
            }else{
                throw new Exception('Invalid request!',400);
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