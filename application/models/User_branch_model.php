<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_branch_model extends CI_Model {

    public $TableName;

    function __construct() {
        parent::__construct();
        $this->TableName = 'user_branch';
    }
}