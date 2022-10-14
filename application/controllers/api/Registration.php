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
                keyExist(['registration_id','branch_id','enquiry_id','registration_no','registration_date','registration_fee','is_qualified','total_marks','earn_marks','earn_percentage','remarks','student','previous_acadmic','parents','student_document'],$request->data);
                keyExist(['student_id','first_name','middle_name','last_name','date_of_birth','place_of_birth','gender','cast_category_id','cast','nationality_id','religion_id','address_line_1','address_line_2','area_id','city_id','state_id','pincode','permanent_maddress_line_1','permanent_address_line_2','permanent_area_id','permanent_city_id','permanent_state_id','permanent_pincode','mother_tongue','blood_group','indentification_mark_1','indentification_mark_2'],$request->data->student);
                checkBlank(['request_id' => $request->control->request_id,'source' => $request->control->source,'request_time' => $request->control->request_time]);
                checkBlank(['branch_id' => $request->data->branch_id, 'enquiry_id' => $request->data->enquiry_id, 'registration_date' => $request->data->registration_date]);
                checkBlank(['first_name' => $request->data->student->first_name]);
                checkArray(['previous_acadmic' => $request->data]);
                checkArray(['parents' => $request->data]);
                checkArray(['student_document' => $request->data]);
                foreach($request->data->previous_acadmic as $previous_acadmic){
                    keyExist(['school_name','class','acadmic_year','grade','achievements'],$previous_acadmic);
                    checkBlank(['school_name' => $previous_acadmic->school_name,'class' => $previous_acadmic->class, 'acadmic_year' => $previous_acadmic->acadmic_year, 'grade' => $previous_acadmic->grade]);
                }
                foreach($request->data->parents as $parents){
                    keyExist(['parent_type','relation_id','first_name','middle_name','last_name', 'email_id', 'alt_email_id', 'contact_no', 'alt_contact_no', 'date_of_birth', 'education_type_id', 'occupation_type_id', 'address_line_1', 'address_line_2', 'city_id', 'state_id', 'pincode', 'office_address_line_1', 'office_address_line_2', 'office_city_id', 'office_state_id', 'office_pincode', 'document_type_id', 'document_no'],$parents);
                    checkBlank(['parent_type' => $parents->parent_type, 'relation_id' => $parents->relation_id, 'first_name' => $parents->first_name,'email_id' => $parents->email_id, 'contact_no' => $parents->contact_no, 'education_type_id' => $parents->education_type_id, 'occupation_type_id' => $parents->occupation_type_id]);
                }
                foreach($request->data->student_document as $student_document){
                    keyExist(['document_id', 'document_no', 'document_file'],$student_document);
                    checkBlank(['document_id' => $student_document->document_id, 'document_no' => $student_document->document_no, 'document_file' => $student_document->document_file]);
                }
                $this->load->model('registration_model');
                $this->load->model('student_model');
                $this->load->model('student_parents_detail_model');
                $this->load->model('student_previous_acadmic_records_model');
                $this->load->model('student_document_model');
                
                //Student_document_model

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