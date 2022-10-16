<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
            redirect('login');
        }
    }

    public function index() {
        $this->parser->parse("registration/list.tpl", $this->outputData);
    }
    public function add() {
        $cast_categoty_url = API_URL.'common/get_cast_category';
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
        $cast_categoty_response = callAPI($cast_categoty_url,'POST',json_encode($request));
        if(isset($cast_categoty_response['data'])){
            $this->outputData['cast_categoty_list'] = $cast_categoty_response['data'];
        }
        $nationality_url = API_URL.'common/get_nationality';
        $nationality_response = callAPI($nationality_url,'POST',json_encode($request));
        if(isset($nationality_response['data'])){
            $this->outputData['nationality_list'] = $nationality_response['data'];
        }
        $religion_url = API_URL.'common/get_religion';
        $religion_response = callAPI($religion_url,'POST',json_encode($request));
        if(isset($religion_response['data'])){
            $this->outputData['religion_list'] = $religion_response['data'];
        }
        $education_type_url = API_URL.'common/get_education_type';
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
        $request['data']['school_id'] = userdata('SchoolId');
        $class_url = API_URL.'class_managment/get';
        $class_response = callAPI($class_url,'POST',json_encode($request));
        if(isset($class_response['data'])){
            $this->outputData['class_list'] = $class_response['data'];
        }
        $this->parser->parse("registration/add_update.tpl", $this->outputData);
    }
}