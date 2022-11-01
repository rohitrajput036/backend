<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Registration extends REST_Controller {
    
    function __construct() {
        parent::__construct();
    }

    public function index_get() {
        $start_time = microtime(true);
        $response = [
            'control' => [
                'status' => 0,
                'message' => 'You have wrong direction, Please check the manual',
                'message_code' => REST_Controller::HTTP_BAD_REQUEST,
                'time_taken' => (microtime(true) - $start_time) . ' Second'
            ],
            'data' => (object) []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function index_post() {
        $start_time = microtime(true);
        $response = [
            'control' => [
                'status' => 0,
                'message' => 'You have wrong direction, Please check the manual',
                'message_code' => REST_Controller::HTTP_BAD_REQUEST,
                'time_taken' => (microtime(true) - $start_time) . ' Second'
            ],
            'data' => (object) []
        ];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
    }

    function add_post(){
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time'],$request->control);
                keyExist(['registration_id','branch_id','enquiry_id','registration_no','registration_date','registration_fee','is_qualified','total_marks','earn_marks','earn_percentage','remarks','student','previous_acadmic','parents'],$request->data);
                //student_document
                keyExist(['student_id','first_name','middle_name','last_name','date_of_birth','place_of_birth','gender','cast_category_id','cast','nationality_id','religion_id','address_line_1','address_line_2','area_id','city_id','state_id','pincode','permanent_maddress_line_1','permanent_address_line_2','permanent_area_id','permanent_city_id','permanent_state_id','permanent_pincode','mother_tongue','blood_group','indentification_mark_1','indentification_mark_2'],$request->data->student);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['branch_id' => $request->data->branch_id, 'enquiry_id' => $request->data->enquiry_id, 'registration_date' => $request->data->registration_date]);
                checkBlank(['first_name' => $request->data->student->first_name]);
                checkObject(['previous_acadmic' => $request->data]);
                checkObject(['parents' => $request->data]);
                if(isset($request->data->student_document)){
                    checkObject(['student_document' => $request->data]);
                }
                
                foreach($request->data->previous_acadmic as $previous_acadmic){
                    keyExist(['school_name','class','acadmic_year','grade','achievements'],$previous_acadmic);
                    checkBlank(['school_name' => $previous_acadmic->school_name,'class' => $previous_acadmic->class, 'acadmic_year' => $previous_acadmic->acadmic_year, 'grade' => $previous_acadmic->grade]);
                }
                foreach($request->data->parents as $parents){
                    keyExist(['parent_type','relation_id','first_name','middle_name','last_name', 'email_id', 'alt_email_id', 'contact_no', 'alt_contact_no', 'date_of_birth', 'education_type_id', 'occupation_type_id', 'address_line_1', 'address_line_2', 'city_id', 'state_id', 'pincode', 'office_address_line_1', 'office_address_line_2', 'office_city_id', 'office_state_id', 'office_pincode', 'document_type_id', 'document_no'],$parents);
                    checkBlank(['parent_type' => $parents->parent_type, 'relation_id' => $parents->relation_id, 'first_name' => $parents->first_name]);
                    if($parents->relation_id == '1'){
                        checkBlank(['contact_no' => $parents->contact_no]);
                    }
                }
                if(isset($request->data->student_document)){
                    foreach($request->data->student_document as $student_document){
                        keyExist(['document_id', 'document_no', 'document_file'],$student_document);
                        checkBlank(['document_id' => $student_document->document_id, 'document_no' => $student_document->document_no, 'document_file' => $student_document->document_file]);
                    }
                }
                
                $this->load->model('registration_model');
                $this->load->model('student_model');
                $this->load->model('student_parents_detail_model');
                $this->load->model('student_previous_acadmic_records_model');
                $this->load->model('student_document_model');
                $this->registration_model->registration_id      = $request->data->registration_id;
                $this->registration_model->branch_id            = $request->data->branch_id;
                $this->registration_model->enquiry_id           = $request->data->enquiry_id;
                $this->registration_model->registration_no      = $request->data->registration_no;
                $this->registration_model->registration_date    = date('Y-m-d',strtotime($request->data->registration_date));
                $this->registration_model->registration_fee     = $request->data->registration_fee;
                $this->registration_model->is_qualified         = $request->data->is_qualified;
                $this->registration_model->total_marks          = $request->data->total_marks;
                $this->registration_model->earn_marks           = $request->data->earn_marks;
                $this->registration_model->earn_percentage      = $request->data->earn_percentage;
                $this->registration_model->remarks              = $request->data->remarks;
                $this->registration_model->is_active            = '1';
                $this->registration_model->created_by           = $this->registration_model->updated_by  = (isset($request->data->login_id)) ? $request->data->login_id : 0; 
                if(!$this->registration_model->check()){
                    $this->registration_model->add();
                    if($this->registration_model->registration_id > 0){
                        $student_info = $request->data->student;
                        $this->student_model->registration_id = $this->registration_model->registration_id;
                        $this->student_model->first_name = $student_info->first_name;
                        $this->student_model->middle_name = $student_info->middle_name;
                        $this->student_model->last_name = $student_info->last_name;
                        $this->student_model->date_of_birth = (!empty($student_info->date_of_birth)) ? date('Y-m-d',strtotime($student_info->date_of_birth)) : NULL;
                        $this->student_model->place_of_birth = $student_info->place_of_birth;
                        $this->student_model->gender = $student_info->gender;
                        $this->student_model->case_category_id = $student_info->cast_category_id;
                        $this->student_model->cast = $student_info->cast;
                        $this->student_model->nationality_id = $student_info->nationality_id;
                        $this->student_model->religion_id = $student_info->religion_id;
                        $this->student_model->address_line_1 = $student_info->address_line_1;
                        $this->student_model->address_line_2 = $student_info->address_line_2;
                        $this->student_model->area_id = $student_info->area_id;
                        $this->student_model->city_id = $student_info->city_id;
                        $this->student_model->state_id = $student_info->state_id;
                        $this->student_model->pincode = $student_info->pincode;
                        $this->student_model->permanent_addresss_line_1 = $student_info->permanent_maddress_line_1;
                        $this->student_model->permanent_addresss_line_2 = $student_info->permanent_address_line_2;
                        $this->student_model->permanent_area_id = $student_info->permanent_area_id;
                        $this->student_model->permanent_city_id = $student_info->permanent_city_id;
                        $this->student_model->permanent_state_id = $student_info->permanent_state_id;
                        $this->student_model->permanent_pincode = $student_info->permanent_pincode;
                        $this->student_model->mother_tongue = $student_info->mother_tongue;
                        $this->student_model->blood_group  = $student_info->blood_group;
                        $this->student_model->indentification_mark_1 = $student_info->indentification_mark_1;
                        $this->student_model->indentification_mark_2 = $student_info->indentification_mark_2;
                        $this->student_model->remarks = $student_info->remarks;
                        $this->student_model->is_active = 1;
                        $this->student_model->created_by = $this->student_model->updated_by  = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                        if(!$this->student_model->check()){
                            $this->student_model->add();
                            if($this->student_model->student_id > 0){
                                // add in pre acadmic record if any
                                foreach($request->data->previous_acadmic as $previous_acadmic){
                                    $this->student_previous_acadmic_records_model->student_id = $this->student_model->student_id;
                                    $this->student_previous_acadmic_records_model->school_name = $previous_acadmic->school_name;
                                    $this->student_previous_acadmic_records_model->class = $previous_acadmic->class;
                                    $this->student_previous_acadmic_records_model->acadmic_year = $previous_acadmic->acadmic_year;
                                    $this->student_previous_acadmic_records_model->grade = $previous_acadmic->grade;
                                    $this->student_previous_acadmic_records_model->achievements =$previous_acadmic->achievements;
                                    $this->student_previous_acadmic_records_model->is_active = 1;
                                    $this->student_previous_acadmic_records_model->created_by = $this->student_previous_acadmic_records_model->updated_by  = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                                    if(!$this->student_previous_acadmic_records_model->check()){
                                        $this->student_previous_acadmic_records_model->add();
                                    }
                                }
                                // add in parents details if any.
                                foreach($request->data->parents as $parents){
                                    $this->student_parents_detail_model->student_id = $this->student_model->student_id;
                                    $this->student_parents_detail_model->parent_type = $parents->parent_type;
                                    $this->student_parents_detail_model->relation_id = $parents->relation_id;
                                    $this->student_parents_detail_model->first_name = $parents->first_name;
                                    $this->student_parents_detail_model->middle_name = $parents->middle_name;
                                    $this->student_parents_detail_model->last_name = $parents->last_name;
                                    $this->student_parents_detail_model->email_id = $parents->email_id;
                                    $this->student_parents_detail_model->alt_email_id = $parents->alt_email_id;
                                    $this->student_parents_detail_model->contact_no = $parents->contact_no;
                                    $this->student_parents_detail_model->alt_contact_no = $parents->alt_contact_no;
                                    $this->student_parents_detail_model->date_of_birth = (!empty($parents->date_of_birth)) ? date('Y-m-d',strtotime($parents->date_of_birth)) : NULL;
                                    $this->student_parents_detail_model->education_type_id = $parents->education_type_id;
                                    $this->student_parents_detail_model->occupation_type_id = $parents->occupation_type_id;
                                    $this->student_parents_detail_model->address_line_1 = $parents->address_line_1;
                                    $this->student_parents_detail_model->address_line_2 = $parents->address_line_2;
                                    $this->student_parents_detail_model->city_id = $parents->city_id;
                                    $this->student_parents_detail_model->state_id = $parents->state_id;
                                    $this->student_parents_detail_model->pincode = $parents->pincode;
                                    $this->student_parents_detail_model->office_address_line_1 = $parents->office_address_line_1;
                                    $this->student_parents_detail_model->office_address_line_2 = $parents->office_address_line_2;
                                    $this->student_parents_detail_model->office_city_id = $parents->office_city_id;
                                    $this->student_parents_detail_model->office_state_id = $parents->office_state_id;
                                    $this->student_parents_detail_model->office_pincode = $parents->office_pincode;
                                    $this->student_parents_detail_model->document_type_id = $parents->document_type_id;
                                    $this->student_parents_detail_model->document_no = $parents->document_no;
                                    $this->student_parents_detail_model->is_active = 1;
                                    $this->student_parents_detail_model->created_by = $this->student_parents_detail_model->updated_by  = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                                    if(!$this->student_parents_detail_model->check()){
                                        $this->student_parents_detail_model->add();
                                    }
                                }
                                // add document if any
                                if(isset($request->data->student_document)){
                                    foreach($request->data->student_document as $doc){
                                        // $doc->document_file = 'file';
                                        $file_name = '';
                                        $this->student_document_model->student_id           = $this->student_model->student_id;
                                        $this->student_document_model->document_id          = $doc->document_id;
                                        $this->student_document_model->document_no          = $doc->document_no;
                                        $this->student_document_model->document_file_name   = $file_name;
                                        $this->student_document_model->is_active            = 1;
                                        $this->student_document_model->created_by = $this->student_document_model->updated_by  = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                                        if(!$this->student_document_model->check()){
                                            $this->student_document_model->add();
                                        }
                                    }
                                }
                                
                            }else{
                                throw new Exception('Student id not set! Please contact to backend developmet team.',REST_Controller::HTTP_BAD_REQUEST);
                            }
                        }else{
                            throw new Exception('Student already exists with same resistration no!',REST_Controller::HTTP_BAD_REQUEST);        
                        }
                    }else{
                        throw new Exception('Registration id not set! Please contact to backend developmet team.',REST_Controller::HTTP_BAD_REQUEST);    
                    }
                    $response = [
                        'control' => [
                            'status' => 1,
                            'message' => 'Student registration completed successfully!',
                            'message_code' => REST_Controller::HTTP_OK,
                            'time_taken' => (microtime(true) - $start_time) . ' Second'
                        ],
                        'data' => []
                    ];
                    $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
                    $this->response($response, REST_Controller::HTTP_OK);
                }else{
                    throw new Exception('Registration already exists in system!',REST_Controller::HTTP_BAD_REQUEST);    
                }
            }else{
                throw new Exception('Invalid request',REST_Controller::HTTP_BAD_REQUEST);
            }
        }catch (Exception $E) {
            $this->log4php->log('error', 'ERROR', $api_name, $uuid, $E->getMessage(), 0);
            $response = [
                'control' => [
                    'status' => 0,
                    'message' => $E->getMessage(),
                    'message_code' => $E->getCode(),
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => []
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, $E->getCode());
        }
    }

    function delete_post(){
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time'],$request->control);
                keyExist(['registration_id','is_active','login_id'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['registration_id' => $request->data->registration_id, 'is_active' => $request->data->is_active,'login_id' => $request->data->login_id]);
                $this->load->model('registration_model');
                $this->registration_model->registration_id = $request->data->registration_id;
                $this->registration_model->is_active = $request->data->is_active;
                $this->registration_model->created_by = $this->registration_model->updated_by = (isset($request->data->login_id)) ? $request->data->login_id : 0;
                $this->registration_model->delete();
                $response = [
                    'control' => [
                        'status' => 1,
                        'message' => 'Registration update successfully!',
                        'message_code' => REST_Controller::HTTP_OK,
                        'time_taken' => (microtime(true) - $start_time) . ' Second'
                    ],
                    'data' => (object) []
                ];
                $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
                $this->response($response, REST_Controller::HTTP_OK);
            }else{
                throw new Exception('Invalid request',REST_Controller::HTTP_BAD_REQUEST);
            }
        }catch (Exception $E) {
            $this->log4php->log('error', 'ERROR', $api_name, $uuid, $E->getMessage(), 0);
            $response = [
                'control' => [
                    'status' => 0,
                    'message' => $E->getMessage(),
                    'message_code' => $E->getCode(),
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => []
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, $E->getCode());
        }
    }

    function get_post(){
        $start_time = microtime(true);
        try {
            $request = json_decode($this->input->raw_input_stream);
            $api_name = __CLASS__ . '/' . chop(__FUNCTION__, '_post');
            $uuid = property_exists($request->control,"request_id") ? $request->control->request_id : generateUUId();
            $this->log4php->log('info', 'REQUEST', $api_name, $uuid, $request, 0);
            if (!empty($request)) {
                keyExist(['control','data'],$request);
                keyExist(['request_id','source','request_time'],$request->control);
                keyExist(['branch_id','login_id'],$request->data);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['branch_id' => $request->data->branch_id]);
                $this->load->model('registration_model');
                if(isset($request->data->registration_id)){
                    $this->registration_model->registration_id = $request->data->registration_id;
                }
                if(isset($request->data->format) && $request->data->format == 'datatable'){
                    $this->registration_model->datatable = $request->data;
                }else{
                    $this->registration_model->branch_id = $request->data->branch_id;
                }
                $results = $this->registration_model->get();
                $response = [
                    'control' => [
                        'status' => 1,
                        'message' => 'List of registration!',
                        'message_code' => REST_Controller::HTTP_OK,
                        'time_taken' => (microtime(true) - $start_time) . ' Second'
                    ],
                    'data' => $results
                ];
                if(isset($request->data->format) && $request->data->format == 'datatable'){
                    $results['status'] = 1;
                    $results['message'] = 'List of registration!';
                    $results['message_code'] = REST_Controller::HTTP_OK;
                    $results['time_taken'] = (microtime(true) - $start_time) . ' Second';
                    $response = $results;
                }
                $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
                $this->response($response, REST_Controller::HTTP_OK);
            }else{
                throw new Exception('Invalid request',REST_Controller::HTTP_BAD_REQUEST);
            }
        }catch (Exception $E) {
            $this->log4php->log('error', 'ERROR', $api_name, $uuid, $E->getMessage(), 0);
            $response = [
                'control' => [
                    'status' => 0,
                    'message' => $E->getMessage(),
                    'message_code' => $E->getCode(),
                    'time_taken' => (microtime(true) - $start_time) . ' Second'
                ],
                'data' => []
            ];
            $this->log4php->log('info', 'RESPONSE', $api_name, $uuid, $response, 0);
            $this->response($response, $E->getCode());
        }
    }
}