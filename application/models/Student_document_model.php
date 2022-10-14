<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_document_model extends CI_Model {
    public $student_document_id, $student_id, $document_id, $document_no, $document_file_name, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->student_document_id  = 0;
        $this->student_id           = 0;
        $this->document_id          = 0;
        $this->document_no          = '';
        $this->document_file_name   = '';
        $this->is_active            = '';
        $this->created_by           = 0;
        $this->created_on           = date('Y-m-d H:i:s');
        $this->updated_by           = 0;
        $this->updated_on           = date('Y-m-d H:i:s');
        $this->table_name           = DB_NAME.'student_document';
    }

    function add(){

    }

    function check(){

    }

    function update(){

    }

    function delete(){

    }

    function get(){
        
    }
}