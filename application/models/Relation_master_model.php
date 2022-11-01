<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Relation_master_model extends CI_Model {
    public $relation_id, $relation, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name;
    function __construct() {
        parent::__construct();
        $this->relation_id = 0;
        $this->relation = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->table_name = DB_NAME.'relation_master';
    }
}