<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

    public $outputData;

    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
            redirect('login');
        }
    }

    public function index() {
        $this->parser->parse("no_access.tpl", $this->outputData);
    }

    public function add_branch() {
        $api_url = API_URL."department/get";
        $request = [
            'Control' => [
                'RequestId'     => generateUUId(),
                'Source'        => 1,
                'RequestTime'   => time()
            ],
            'Data'              => [
                'IsActive'      => 'Y',
                'IsHo'          => 'N'
            ]
        ];
        $response = callAPI($api_url,'POST',json_encode($request));
        if(isset($response['Data'])){
            $this->outputData['departments'] = $response['Data'];
        }
        $api_url = API_URL.'fee_master/get';
        $response = callAPI($api_url,'POST',json_encode($request));
        if(isset($response['Data'])){
            $this->outputData['fee_headers'] = $response['Data'];
        }
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

