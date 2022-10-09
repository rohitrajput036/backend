<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
    }

    function index(){
        $this->parser->parse("admission/list.tpl", $this->outputData);
    }

    function add(){
        $this->parser->parse("admission/add_edit.tpl", $this->outputData);
    }
}