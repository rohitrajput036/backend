<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
    }

    function index(){
        $this->parser->parse("admission/list.tpl", $this->outputData);
    }

    function add(){
        $student_id = $this->uri->segment(3, 0);
        $api_url = API_URL.'student/get';
        $request = [
            'control' =>  [
                'request_id' => generateUUId(),
                'source' => 1,
                'request_time' => time(),
                'version' => WEB_VERSION
            ],
            'data' => [
                'branch_id' => userdata('BranchId'),
                'student_id' => $student_id,
                'login_id' => userdata('UserId')
            ]
        ];
        $response = callAPI($api_url,'POST',json_encode($request));
        $this->parser->parse("admission/add_edit.tpl", $this->outputData);
    }
}