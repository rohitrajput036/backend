<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends CI_Controller {
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

    public function add(){
        $education_type_url = API_URL.'common/get_education_type';
        $request = [
            'control' => [
                'request_id' => generateUUId(),
                'source' => 1,
                'request_time' => time(),
                'version' => API_VERSION
            ],
            'data' => [
                'is_active' => 1
            ]
        ];
        $education_type_response = callAPI($education_type_url,'POST',json_encode($request));
        if(isset($education_type_response['data'])){
            $this->outputData['education_type_list'] = $education_type_response['data'];
        }
        $occupation_type_url = API_URL.'common/get_occupation_type';
        $request['data']['gender_type'] = 2;
        $f_occupation_type_response = callAPI($occupation_type_url,'POST',json_encode($request));
        if(isset($f_occupation_type_response['data'])){
            $this->outputData['father_occupation_type_list'] = $f_occupation_type_response['data'];
        }
        $request['data']['gender_type'] = 3;
        $m_occupation_type_response = callAPI($occupation_type_url,'POST',json_encode($request));
        if(isset($m_occupation_type_response['data'])){
            $this->outputData['mother_occupation_type_list'] = $m_occupation_type_response['data'];
        }
        $followup_status_url = API_URL.'common/get_follow_up_status';
        $followup_status_response = callAPI($followup_status_url,'POST',json_encode($request));
        if(isset($followup_status_response['data'])){
            $this->outputData['followup_status_list'] = $followup_status_response['data'];
        }
        $media_type_url = API_URL.'common/get_media_type';
        $media_type_response = callAPI($media_type_url,'POST',json_encode($request));
        if(isset($media_type_response['data'])){
            $this->outputData['media_type_list'] = $media_type_response['data'];
        }
        $class_url = API_URL.'class_managment/get';
        $request['data']['school_id'] = userdata('SchoolId');
        $class_response = callAPI($class_url,'POST',json_encode($request));
        if(isset($class_response['data'])){
            $this->outputData['class_list'] = $class_response['data'];
        }
        $this->parser->parse("enquiry/add_edit.tpl", $this->outputData);
    }
    public function list(){
        $this->parser->parse("enquiry/add_edit.tpl", $this->outputData);
    }
    public function call_back(){
        $this->parser->parse("enquiry/add_edit.tpl", $this->outputData);
    }
}