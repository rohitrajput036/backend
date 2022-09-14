<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Fee_master extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('fee_structure_master_model');
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
                'MessageCode' => REST_0Controller::HTTP_BAD_REQUEST,
                'TimeTaken' => (microtime(true) - $StartTime) . ' Second'
            ],
            'Data' => []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
    }
    function get_post() {
        $StartTime = microtime(true);
        try {
            $Request = json_decode($this->input->raw_input_stream);
            $APIName = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $UUId = array_key_exists("RequestId", $Request->Control) ? $Request->Control->RequestId : generateUUId();
            $this->log4php->log('info', 'REQUEST', $APIName, $UUId, $Request, 0);
            if (!empty($Request)) {
                if(isset($Request->Data->IsActive)){
                    $this->fee_structure_master_model->is_active = $Request->Data->IsActive;
                }
                $Data=$this->fee_structure_master_model->get();
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $Response = [
                'Control' => [
                    'Status' => 1,
                    'Message' => 'List of Fee Headers',
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