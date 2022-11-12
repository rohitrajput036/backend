<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_enquiry extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
            redirect('login');
        }
    }

    public function index() {
        $this->parser->parse("teacher_enquiry/teacher_enquiry.tpl", $this->outputData);
    }
}