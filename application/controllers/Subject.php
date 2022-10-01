<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
            redirect('login');
        }
    }

    public function index() {
        $this->parser->parse("settings/manage_subject.tpl", $this->outputData);
    }
}