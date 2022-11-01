<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Document_model extends CI_Model {
    
    public $document_id, $document_type, $document, $sort_order, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    
    function __construct() {
        parent::__construct();
        $this->document_id = 0;
        $this->document_type = '';
        $this->document = '';
        $this->sort_order = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'document';
    }

    function get(){
        $output = [];
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active IN (1,2)'] = NULL;
        }
        if($this->document_id > 0){
            $where['document_id'] = $this->document_id;
        }
        $results = $this->global_model->select($this->table_name, $where);
        if(isset($results) && $results->num_rows() > 0){
            foreach($results->result() as $result){
                $output[] = [
                    'document_id' => $result->document_id,
                    'document_type' => $result->document_type,
                    'document' => $result->document,
                    'sort_order' => $result->sort_order,
                    'is_active' => $result->is_active
                ];
            }
        }
        return $output;
    }
}
