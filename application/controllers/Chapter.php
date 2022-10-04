<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chapter extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
            redirect('login');
        }
    }

    public function index() {
        $url = API_URL.'subject/get';
        $request = [
            'control' => [
                'request_id'    => generateUUId(),
                'source'        => 1,
                'request_time'  => time()
            ],
            'data' => [
                'is_active' => '1'
            ]
        ];
        $response = callAPI($url,'POST',json_encode($request));
        $this->outputData['subject_list'] = $response['data'];
        $url = API_URL.'class_managment/get';
        $response = callAPI($url,'POST',json_encode($request));
        $this->outputData['class_list'] = $response['data'];

        $this->parser->parse("settings/manage_chapter.tpl", $this->outputData);
    }
}