<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '1000'); 
require_once APPPATH."third_party/PHPExcel/PHPExcel.php"; 

class Excel extends PHPExcel { 
    public function __construct() { 
        parent::__construct(); 
    } 
}