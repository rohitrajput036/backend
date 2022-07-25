<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
            // redirect('login');
        }
    }

    public function index() {
        $this->parser->parse("user/list.tpl", $this->outputData);
    }
}