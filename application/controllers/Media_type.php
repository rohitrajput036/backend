<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Media_type extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
        if (!checkLogin()) {
            redirect('login');
        }
    }

    public function index() {
        $this->parser->parse("settings/media_type.tpl", $this->outputData);
    }
}