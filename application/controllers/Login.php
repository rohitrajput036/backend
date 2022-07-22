<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public $outputData;

    function __construct() {
        parent::__construct();
        if (checkLogin()) {
            redirect('welcome');
        }
    }

    public function index() {
        $this->parser->parse("login.tpl", $this->outputData);
    }

    public function validateLogin() {
        try {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $Request = [
                'UserName' => $username,
                'Password' => $password
            ];
            $url = API_URL . '/Login/validate';
            $UserInfo = callAPI($url, 'POST', json_encode($Request));
            $Response = [
                'status' => 1,
                'valid' => 1,
                'message' => ''
            ];
        } catch (Exception $E) {
            $Response = [
                'status' => 0,
                'valid' => 0,
                'message' => $E->getMessage()
            ];
        }
    }

}
