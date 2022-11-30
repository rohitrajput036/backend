<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cast_category extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
            redirect('login');
        }
    }

    public function index() {
        $this->parser->parse("settings/cast_category.tpl", $this->outputData);
    }
}