<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fee_structure_master_model extends CI_Model {
    public $table_name , $fee_structure_master_id , $structure_name , $is_required , $is_active , $created_by , $created_on , $updated_by , $updated_on;
    function __construct() {
        parent::__construct();
        $this->table_name = 'fee_structure_master';
        $this->fee_structure_master_id =0;
        $this->structure_name = '';
        $this->is_required = '';
        $this->is_active = '';
        $this->created_by = 0;
        $this->created_on = date('Y-m-d H:i:s');
        $this->updated_by = 0;
        $this->updated_on = date('Y-m-d H:i:s'); 
    }

    function add(){
        $insert_data = [
            'fee_structure_master_id' => $this->fee_structure_master_id,
            'structure_name'=> $this->structure_name,
            'is_required'   => $this->is_required,
            'is_active'     => $this->is_active,
            'created_by'    => $this->created_by,
            'created_on'    => $this->created_on
        ];
        return ($this->global_model->insert($this->table_name , $insert_data));
            
    }

    function update(){
        $where['fee_structure_master_id'] = $this->fee_structure_master_id;
        $update_data = [
            'structure_name'=> $this->structure_name,
            'is_required'   => $this->is_required,
            'is_active'     => $this->is_active,
            'updated_by'    => $this->updated_by,
            'updated_on'    => $this->updated_on
        ];
        return ($this->global_model->update($this->table_name, $update_data, $where));
    }

    function delete(){
        $where['fee_structure_master_id'] = $this->fee_structure_master_id;
        $update_data = [
            'is_active' => $this->is_active,
            'updated_by' => $this->updated_by,
            'updated_on' => $this->updated_on
        ];
        return $this->global_model->update($this->table_name, $update_data, $where);

    }
    
    function check() {
        $Results = $this->global_model->select($this->table_name, ['structure_name' => $this->structure_name]);
        if ($Results->num_rows() > 0) {
            $this->fee_structure_master_id = $Results->row()->fee_structure_master_id;
            return true;
        } else {
            return false;
        }
    }

    function get($for_table = false){
        if(!empty($this->is_active)){
            $where['is_active'] = $this->is_active;
        }else{
            $where['is_active in ("1","2")'] = NULL;
        }
        $results = $this->global_model->select($this->table_name,$where);
        $output = [];
        if(isset($results) && $results->num_rows()>0){
            $i=0;
            foreach($results->result() as $result){
                ++$i;
                if($for_table){
                    if($result->is_active == 1){
                        $active_deactive_btn = '<btn class="btn active_deactive" data-fee_structure_id="'.$result->fee_structure_master_id.'" data-at="2"><i class="fa fa-check text-green"></i></btn>';
                    }else{
                        $active_deactive_btn = '<btn class="btn active_deactive" data-fee_structure_id="'.$result->fee_structure_master_id.'" data-at="1"><i class="fa fa-times text-red"></i></btn>';
                    }
                    $delete_btn = '<btn class="btn active_deactive" data-fee_structure_id="'.$result->fee_structure_master_id.'" data-at="3"><i class="fa fa-trash text-red"></i></btn>';
                    $edit_btn = '<btn class="btn edit" data-fee_structure_id="'.$result->fee_structure_master_id.'" data-is_required="'.$result->is_required.'" data-sname="'.$result->structure_name.'"><i class="fa fa-pencil-square-o text-primary"></i></btn>';
                    $btns = $active_deactive_btn.$delete_btn.$edit_btn;
                    $output[] = [
                        $i,
                        $result->structure_name,
                        ($result->is_required == 1) ? 'Yes' : 'No',
                        date('d/m/Y h:i A',strtotime($result->created_on)),
                        $btns
                    ];
                }else{
                    $output[] = [
                        'sno'   => $i,
                        'fee_structure_id'  => $result->fee_structure_master_id,
                        'structure_name'    => $result->structure_name,
                        'is_required'       => $result->is_required,
                        'is_active'         => $result->is_active
                    ];
                }
                
            }
        }
        return $output;
    }

    function get_branch_fee_structure($branch_id=0) {
        $where = [
            $this->table_name.'.is_active' => 1
        ];
        $joins = [
            'branch_fee_structure'  => ['('.$this->table_name.'.fee_structure_master_id=branch_fee_structure.fee_structure_master_id AND branch_fee_structure.branch_id='.$branch_id.' AND branch_fee_structure.is_active=1)','LEFT']
        ];
        $results = $this->global_model->select($this->table_name, $where,'branch_fee_structure.branch_id, branch_fee_structure.branch_fee_structure_id, branch_fee_structure.fee_amount, branch_fee_structure.fee_type,fee_structure_master.fee_structure_master_id, fee_structure_master.structure_name, fee_structure_master.is_required',$joins, NULL,NULL, ['fee_structure_master.fee_structure_master_id'=>'ASC']);
        if(isset($results) && $results->num_rows() > 0);
        foreach($results->result() as $result){
            $output [] = [
                'branch_fee_structure_id'   => $result->branch_fee_structure_id,
                'branch_id'                 => $result->branch_id,
                'fee_structure_master_id'   => $result->fee_structure_master_id,
                'structure_name'            => $result->structure_name,
                'is_required'               => $result->is_required,
                'fee_amount'                => $result->fee_amount,
                'fee_type'                  => $result->fee_type
            ];
        }
        return $output;
    }
}