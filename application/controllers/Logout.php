<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    public $outputData;
    function __construct() {
        parent::__construct();
    }
    public function index() {
        unsetSession();
        redirect('login');
    }
}
