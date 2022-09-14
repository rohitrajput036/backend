<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Global_mongo_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function insert($TableName = '', $InsertData=[]) {
        if($TableName == '') {
            throw new Exception('Please specify a table name',400);
        }
        if(count($InsertData)==0) {
            throw new Exception('Please specify the insert content' ,400);
        }
        $Result = $this->db->insert($TableName,$InsertData);
        return $Result;
    }
    
    function update($TableName ='', $UpdateData=[],  $WhereCondition=[]) {
        if($TableName == '') {
            die('Please specify a table name');
        }
        if(count($UpdateData)==0) {
            die('Please specify the update Value');
        }
        if(count($WhereCondition)==0) {
            die('Please specify the where conditon');
        }
        try {
            $this->db->update($TableName, $UpdateData,$WhereCondition);
            return true;
        } catch (Exception $E) {   
            return $E->getMessage();
        }
    }
    
    function delete($TableName='',$WhereCondition = []) {
        if($TableName == '') {
            die('Please specify a table name');
        }
        if(count($WhereCondition)==0) {
            die('Please specify the where conditon');
        }
        try {
            $this->db->delete($TableName, $WhereCondition);
            return true;
        } catch (Exception $E) {   
            return $E->getMessage();
        }
    }
    
    function select($TableName = '', $Conditions=[], $Fields='*',$Join = [], $Like=[],$Limit=[],$OrderBy=[], $GroupBy=[], $ResultType = 'result', $WhereIn =[], $WhereNotIn=[], $OrWhere = [],$Having = [],$OrLike=[]) {
        if($TableName=='') {
            die('Please specify a table name'); 
        }
        if(is_array($Conditions) && count($Conditions)>0) {
            $this->db->where($Conditions);
        }
        if(is_array($OrWhere) && count($OrWhere)>0) {
            $this->db->group_start();
            $this->db->or_where($OrWhere);
            $this->db->group_end();
        }
        if(is_array($Like) && count($Like)>0) {
            $this->db->like($Like);
        }
        if(is_array($OrLike) && count($OrLike)>0) {
            $this->db->or_like($OrLike);
        }
        if(is_array($WhereNotIn) && count($WhereNotIn)>0) {
            foreach($WhereNotIn as $key=>$val) { 
                $this->db->where_not_in($key, $val);
            }
        }
        if(is_array($WhereIn) && count($WhereIn)>0) {
            foreach($WhereIn as $key=>$val) { 
                $this->db->where_in($key, $val);
            }
        }
        if(is_array($GroupBy) && count($GroupBy)>0) {
            $this->db->group_by($GroupBy);
        }
        if(is_array($Having) && count($Having)>0) {
            $this->db->having($Having);
        }
        if(is_array($Limit)) {
            if(count($Limit)==1) {
                $this->db->limit($Limit[0]);
            } elseif(count($Limit)==2) {
                $this->db->limit($Limit[0],$Limit[1]);
            }
        }
        if(is_array($OrderBy) && count($OrderBy)>0) {
            foreach($OrderBy as $key=>$val) { 
                $this->db->order_by($key, $val);
            }   
        }
        // if(is_array($OrderBy)) {
        //     if(count($OrderBy)==1) {
        //         $this->db->order_by($OrderBy[0]);
        //     } elseif(count($OrderBy)==2) {
        //         $this->db->order_by($OrderBy[0], $OrderBy[1]);
        //     }
        // }
        $this->db->from($TableName);
        if(is_array($Join) && count($Join)>0) {
            foreach($Join as $key=>$val) { 
                $this->db->join($key, $val[0], $val[1]);
            }   
        }

        if(!empty($Fields)) {
            $this->db->select($Fields);
        }
        try {
            $Result = $this->db->get();
            if(isset($ResultType) && $ResultType =='result_array' ) {
                $Result = $Result->result_array();
            } else if(isset($ResultType) && $ResultType =='row_array' ) {
                $Result = $Result->row_array();
            } else if(isset($ResultType) && $ResultType =='num_rows' ) {
                $Result = $Result->num_rows();
            }
            return $Result;
        } catch (Exception $E) {
            throw new Exception("Error in Fatching data from database: " . $E->getMessage());
        }
    }
    
    function aggregate($TableName = '', $AggregateFunction = '', $FieldName='',$AliasName='') {
        if($TableName == '') {
            die('Please specify a table name');
        }
        if($AggregateFunction=='') {
            die('Please specify the field name');
        }
        if($AggregateFunction=='select_max') {
            if(isset($AliasName) && $AliasName != '') {
                $this->db->select_max($FieldName, $AliasName);
            } else {
                $this->db->select_max($FieldName);  
            }
        } else if($AggregateFunction=='select_min') {
            if(isset($AliasName) && $AliasName != '') {
                $this->db->select_min($FieldName, $AliasName);
            } else {
                $this->db->select_min($FieldName);  
            }
        } else if($AggregateFunction=='select_avg') {
            if(isset($AliasName) && $AliasName != '') {
                $this->db->select_avg($FieldName, $AliasName);
            } else {
                $this->db->select_avg($FieldName);  
            }
        } else if($AggregateFunction=='select_sum') {
            if(isset($AliasName) && $AliasName != '') {
                $this->db->select_sum($FieldName, $AliasName);
            } else {
                $this->db->select_sum($FieldName);  
            }
        } else {
            die('Aggregate function defination not defined');
        }
        try {
            $Result = $this->db->get($TableName);
            return $Result;
        } catch (Exception $E) {   
            return $E->getMessage();
        }
    }
    
    function truncate($TableName = '') {
        if($TableName == '') {
            die('Please specify a table name');
        } else {
            try {
                $this->db->truncate($TableName);
                return true;
            } catch (Exception $E) {   
                return $E->getMessage();
            }
        }
    }
    
    function emptyTable($TableName = '') {
        if($TableName == '') {
            die('Please specify a table name');
        } else {
            try {
                $this->db->empty_table($TableName);
                return true;
            } catch (Exception $E) {   
                return $E->getMessage();
            }
        }
    }
    
    function insertId() {
        return $this->db->insert_id();
    }
}