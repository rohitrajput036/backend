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
        // $this->parser->parse("enquiry/add_edit.tpl", $this->outputData);
    }

    function add(){
        $this->parser->parse("enquiry/add_edit.tpl", $this->outputData);
    }
}