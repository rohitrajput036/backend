<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Chapter extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('chapter_model');
    }

    public function index_get(){
        $start_time = microtime(true);
        $response =[
            'control' => [
                'status'        => 0,
                'message'       => 'You have wrong direction, Please check the manual',
                'message_code'  => REST_Controller::HTTP_BAD_REQUEST,
                'time_taken'    => (microtime(true) - $start_time) . ' Second'
            ],
            'data' => []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST );
    }

    public function index_post(){
        $start_time = microtime(true);
        $response =[
            'control' => [
                'status'        => 0,
                'message'       => 'You have wrong direction, Please check the manual',
                'message_code'  => REST_Controller::HTTP_BAD_REQUEST,
                'time_taken'    => (microtime(true) - $start_time) . ' Second'
            ],
            'data' => []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST );
    }
}