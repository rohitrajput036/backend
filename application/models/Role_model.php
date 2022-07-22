<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model {

    public $TableName;

    function __construct() {
        parent::__construct();
        $this->TableName = 'role_master';
    }
}