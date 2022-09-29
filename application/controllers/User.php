<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
        redirect('login');
        }
    }

    public function index() {
        $this->parser->parse("user/list.tpl", $this->outputData);
    }
    public function add() {
        $url = API_URL.'role/get';
        $request = [
            'control' => [
                'request_id'    => generateUUId(),
                'source'        => 1,
                'request_time'  => time()
            ],
            'data' => [
                'is_active' => '1',
                'is_ho' => (userdata('Role') == 'Super Admin') ? '1' : '0'
            ]
        ];
        $response = callAPI($url,'POST',json_encode($request));
        $this->outputData['role_list'] = $response['data'];
        $url = API_URL.'department/get';
        $response = callAPI($url,'POST',json_encode($request));
        $this->outputData['department_list'] = $response['data'];
        $this->parser->parse("user/add_update.tpl", $this->outputData);
    }
}