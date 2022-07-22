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
                $this->Login_model->UserName = $Request->UserName;
                $this->Login_model->UserPassword = $Request->Password;
                $this->Login_model->IsActive = 'Y';
                $UserInfo = $this->Login_model->ValidateLogin();
                if (count($UserInfo) > 0) {
                    $salt = '3x%%$bf83#dls2qgdf';
                    $hashed_password = md5($salt . $Request->Password);
                    if (password_verify($Request->Password, $UserInfo['Password'])) {
                        if ($UserInfo['Role'] == "Super Admin" || $UserInfo['Role'] == "Center Admin") {
                            $HeaderHeading = $UserInfo['Role'] . " <span style='font-size:10px;'>(Online Management System)</span>";
                        } else {
                            $HeaderHeading = $UserInfo['BranchName'] . " User ID-[" . $UserInfo['EmpId'] . "]";
                        }
                        $DefaultImg = "images/icons/male.png";
                        if ($UserInfo['Gender'] == "F") {
                            $DefaultImg = "images/icons/female.png";
                        }
                        if ($UserInfo['Role'] == "Super Admin") {
                            $BranchId = 0;
                        } else {
                            $BranchId = $UserInfo['BranchId'];
                        }
                        setSession($UserInfo['UserId'], $UserInfo['EmpId'], $UserInfo['UserName'], $UserInfo['Gender'], $UserInfo['Role'], $BranchId, $UserInfo['BranchName'], $HeaderHeading, $DefaultImg, '');
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
                'Data' => []
            ];
            $this->response($Response, $E->getCode());
        }
    }

}
