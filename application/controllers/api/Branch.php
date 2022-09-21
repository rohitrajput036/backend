<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Branch extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('branch_model');
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
                keyExist(['centre_id','centre_name','centre_gst','add_line_1','add_line_2','state_id','city_id','pincode','state_code','first_name','middle_name','last_name','gender','sign_email_id','sign_password','contact_no','alt_contact_no','username','alt_email_id','location','centre_start_day','roylity_case','comments','departments','default_fees'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['centre_name' => $request->data->centre_name,'add_line_1' => $request->data->add_line_1, 'state_id' => $request->data->state_id,'city_id' => $request->data->city_id, 'pincode' => $request->data->pincode, 'state_code' => $request->data->state_code, 'first_name',$request->data->first_name,'gender' => $request->data->gender, 'sign_email_id' => $request->data->sign_email_id, 'sign_password' => $request->data->sign_password, 'contact_no' => $request->data->contact_no,'username' => $request->data->username, 'centre_start_day' => $request->data->centre_start_day]);
                $this->branch_model->branch_id            = (!empty($request->data->centre_id)) ? $request->data->centre_id : 0;
                $this->branch_model->branch_code          = $this->branch_model->get_branch_code();
                $this->branch_model->branch_name          = $request->data->centre_name;
                $this->branch_model->gst_no               = $request->data->centre_gst;
                $this->branch_model->add_line_1           = $request->data->add_line_1;
                $this->branch_model->add_line_2           = $request->data->add_line_2;
                $this->branch_model->state_id             = $request->data->state_id;
                $this->branch_model->state_code           = $request->data->state_code;
                $this->branch_model->city_id              = $request->data->city_id;
                $this->branch_model->pincode              = $request->data->pincode;
                $this->branch_model->branch_location      = $request->data->location;
                $this->branch_model->start_date           = date('Y-m-d',strtotime($request->data->centre_start_day));
                $this->branch_model->concat_person_name   = $request->data->first_name.' '.$request->data->last_name;
                $this->branch_model->contact_no           = $request->data->contact_no;
                $this->branch_model->alt_contact_no       = $request->data->alt_contact_no;
                $this->branch_model->email_id             = $request->data->sign_email_id;
                $this->branch_model->royality_case        = $request->data->roylity_case;
                $this->branch_model->comments             = $request->data->comments;
                $this->branch_model->is_active            = 1;
                $this->branch_model->created_by           = $this->branch_model->updated_by = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                $msg = 'Centre add successfully!';
                if(!empty($request->data->centre_id) && $request->data->centre_id > 0){
                    $this->branch_model->update();
                    $msg = 'Centre update successfully!';
                }else{
                    if(!$this->branch_model->check()){
                        $this->branch_model->add();
                    }else{
                        throw new Exception('Centre already exists!');
                    }
                }
                
                if(!empty($request->data->centre_id) && $request->data->centre_id == 0){
                    // code for add in user
                }
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $response = [
                'Control' => [
                    'Status' => 1,
                    'Message' => $msg,
                    'MessageCode' => REST_Controller::HTTP_OK,
                    'TimeTaken' => (microtime(true) - $start_time) . ' Second'
                ],
                'Data' => []
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, REST_Controller::HTTP_OK);
        }catch (Exception $E) {
            $this->log4php->log('error', 'ERROR', $api_name, $uuid, $E->getMessage(), 0);
            $Response = [
                'control' => [
                    'status' => 0,
                    'message' => $E->getMessage(),
                    'message_code' => $E->getCode(),
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => []
            ];
            $this->response($Response, $E->getCode());
        }
    }
    function get_post() {
        $StartTime = microtime(true);
        try {
            $Request = json_decode($this->input->raw_input_stream);
            $APIName = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $UUId = property_exists($Request->Control,"RequestId") ? $Request->Control->RequestId : generateUUId();
            $this->log4php->log('info', 'REQUEST', $APIName, $UUId, $Request, 0);
            if (!empty($Request)) {
                
                $Data=[];
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $Response = [
                'Control' => [
                    'Status' => 1,
                    'Message' => 'List of Centers',
                    'MessageCode' => REST_Controller::HTTP_OK,
                    'TimeTaken' => (microtime(true) - $StartTime) . ' Second'
                ],
                'Data' => $Data
            ];
            $this->log4php->log('info', 'RESPONSE', $APIName, $UUId, $Response, 0);
            $this->response($Response, REST_Controller::HTTP_OK);
        } catch (Exception $E) {
            $this->log4php->log('error', 'ERROR', $APIName, $UUId, $E->getMessage(), 0);
            $Response = [
                'Control' => [
                    'Status' => 0,
                    'Message' => $E->getMessage(),
                    'MessageCode' => $E->getCode(),
                    'TimeTaken' => (microtime(true) - $StartTime) . ' Second'
                ],
                'Data' => [
                    'Id' => $this->Clientcode_model->ClientId
                ]
            ];
            $this->response($Response, $E->getCode());
        }
    }

}
