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
        $this->parser->parse("registration/add_update.tpl", $this->outputData);
    }
}