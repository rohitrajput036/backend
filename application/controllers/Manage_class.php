<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_class extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
            redirect('login');
        }
    }

    public function index() {
        $this->parser->parse("settings/manage_class.tpl", $this->outputData);
    }
}