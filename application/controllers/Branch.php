<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

    public $outputData;

    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
            // redirect('login');
        }
    }

    public function index() {
        $this->parser->parse("no_access.tpl", $this->outputData);
    }

    public function add_branch() {
        $api_url = API_URL."department/get";
        $request = [
            'control' => [
                'request_id'     => generateUUId(),
                'source'        => 1,
                'request_time'   => time()
            ],
            'data'              => [
                'is_active'      => '1',
                'is_ho'          => '1'
            ]
        ];
        $response = callAPI($api_url,'POST',json_encode($request));
        // print_r($response['data']);exit;
        if(isset($response['data'])){
            $this->outputData['departments'] = $response['data'];
        }
        $api_url = API_URL.'feestructure/get';
        $response = callAPI($api_url,'POST',json_encode($request));
        if(isset($response['data'])){
            $this->outputData['fee_headers'] = $response['data'];
        }
        // print_r($this->outputData);exit;
        $this->parser->parse("centers/add_center.tpl", $this->outputData);
    }

    public function all_branch() {
        $this->parser->parse("centers/list.tpl", $this->outputData);
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

