<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Login extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
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

    function validate_post() {
        $StartTime = microtime(true);
        try {
            $Request = json_decode($this->input->raw_input_stream);
            $APIName = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $UUId = generateUUId();
            $this->log4php->log('info', 'REQUEST', $APIName, $UUId, $Request, 0);
            if (!empty($Request)) {
                keyExist(['UserName', 'Password'], $Request);
                checkBlank(['UserName' => $Request->UserName, 'Password' => $Request->Password]);
                $this->load->model('Login_model');
                $this->load->model('academic_session_model');
                $this->Login_model->UserName = $Request->UserName;
                $this->Login_model->UserPassword = $Request->Password;
                $this->Login_model->IsActive = '1';
                $UserInfo = $this->Login_model->ValidateLogin();
                $this->academic_session_model->get_current = true;
                $this->academic_session_model->date = date('Y-m-d');
                $academic_session = $this->academic_session_model->get();
                if (count($UserInfo) > 0) {
                    if (password_verify($Request->Password, $UserInfo['password'])) {
                        $BranchId = $UserInfo['branch_id'];
                        $DefaultImg = "images/icons/male.png";
                        if(in_array($UserInfo['role'],['Super Admin','Center Admin'])){
                            $HeaderHeading = $UserInfo['role'] . " <span style='font-size:10px;'>(Online Management System)</span>";
                        }else{
                            $HeaderHeading = $UserInfo['brnach_name'] . " User ID- [" . $UserInfo['unique_no'] . "]";
                        }
                        if ($UserInfo['gender'] == "F") {
                            $DefaultImg = "images/icons/female.png";
                        }
                        setSession($UserInfo['user_id'], $UserInfo['unique_no'], $UserInfo['user_name'], $UserInfo['gender'], $UserInfo['role'], $BranchId, $UserInfo['brnach_name'], $HeaderHeading, $DefaultImg, $UserInfo['email_id'],$UserInfo['school_id'],$UserInfo['school_name'],$UserInfo['department_list'],$academic_session);
                        $Data = $UserInfo;
                    } else {
                        throw new Exception("Invalid Password! Please Try Again!", REST_Controller::HTTP_BAD_REQUEST);
                    }
                } else {
                    throw new Exception("No Account Found With That User Name!", REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                throw new Exception("Invalid Request", REST_Controller::HTTP_BAD_REQUEST);
            }
            $Response = [
                'Control' => [
                    'Status' => 1,
                    'Message' => 'Login successfully!',
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
                'Data' => []
            ];
            $this->response($Response, $E->getCode());
        }
    }

}
