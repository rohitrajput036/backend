<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Routes extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
            redirect('login');
        }
    }

    public function index() {
        $api_url = API_URL.'route_master/get';
        $request = [
            'control' => [
                'request_id' => generateUUId(),
                'source' => 1,
                'request_time' => time(),
                'version' => API_VERSION
            ],
            'data' =>  [
                'branch_id' => userdata('BranchId'),
                'is_active' => 1
            ]
        ];
        $response = callAPI($api_url,'POST',json_encode($request));
        $routes_info = (isset($response['data'])) ? $response['data'] : [];
        $this->outputData['routes_info'] = $routes_info;
        $this->parser->parse("settings/routes.tpl", $this->outputData);
    }
}