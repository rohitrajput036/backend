{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Fee Structure
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Fee Master</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <div class="form-group" id="fee_structure_box">
                                    <label>Fee Structure Name <span class="text-red">*</span></label>
                                    <input type="text" name="structure_name" id="structure_name" class="form-control" placeholder=""/>
                                    <input type="hidden" name="fee_structure_id" id="fee_structure_id" value="0"/>
                                    <label id="fee_structure_error_msg"></label>
                                </div>
                                
                            </div>
                            <div class="col-md-2">
                                <div class="forn-group" id="is_required_box" style="margin-top:25px;">
                                    <input type="checkbox" name="is_required" id="is_required" value="0"/>&nbsp;&nbsp;
                                    <label for="is_required">Is Required ?</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button id="save" class="btn btn-primary" style="margin-top:20px">Save</button>
                            </div>
                        </div>
                        <div class="col-md-12 form-group has-error text-center">
                            <label id="api_error"></label> 
                        </div>
                        <table class="table table-bordered" id="fee_table">
                            <thead>
                                <tr>
                                    <th style="width:10%">S NO</th>
                                    <th>Name</th>
                                    <th style="width:10%">Required</th>
                                    <th style="width:16%">Created On</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody></tbody> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->
{include file='footer.tpl'}
{js('common.js')}
<script>
    $(document).ready(function(){
        var DataTable = $('#fee_table').DataTable({
            searching:true,
            ordering:false
        });
        $(window).load(function(){
            var control  = {
                resssquest_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                for_table : true
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}feestructure/get";
            $.ajax({
                method: 'POST',
                url: url,
                crossDomain: true,
                processData: false,
                headers:{
                    "Content-Type": "application/json"
                },
                data: request,
                beforeSend: function(xhr) {
                    $("#animatedLoader").show();
                }
            }).done(function(response) {
                $("#animatedLoader").hide();
                $('#api_error').html('');
                DataTable.clear().draw();
                DataTable.rows.add(response.data).draw();
            }).fail(function(response) {
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
            });
        });
        $(document).on('click','#save',function(){
            var fee_structure_id = $('#fee_structure_id').val();
            var structure_name = $.trim($('#structure_name').val());
            var is_required = '0';
            if($('#is_required').is(':checked')){
                is_required = '1';
            }
            if(checkBlank('fee_structure_box','fee_structure_error_msg','Required..', structure_name, 'structure_name', '')){
                return false;
            }
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                fee_structure_id : fee_structure_id,
                structure_name : structure_name,
                is_required : is_required,
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}feestructure/add";
            $.ajax({
                method: "POST",
                url: url,
                async: true,
                crossDomain: true,
                processData: false,
                headers: {
                    "Content-Type": "application/json"
                },
                data: request,
                beforeSend: function(xhr) {
                    $("#animatedLoader").show();
                }
            }).done(function(response) {
                $("#animatedLoader").hide();
                $('#api_error').html('');
                $('#fee_structure_id').val(0);
                $('#structure_name').val('');
                $('#is_required').prop('checked',false);
                $(window).trigger('load');
            }).fail(function(response) {
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
            });
        });
        $(document).on('click','.active_deactive',function(){
            var fee_structure_id = $(this).data('fee_structure_id');
            var is_active = $(this).data('at');
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                fee_structure_id : fee_structure_id,
                is_active : is_active,
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}feestructure/delete";
            $.ajax({
                method: "POST",
                url: url,
                async: true,
                crossDomain: true,
                processData: false,
                headers: {
                    "Content-Type": "application/json"
                },
                data: request,
                beforeSend: function(xhr) {
                    $("#animatedLoader").show();
                }
            }).done(function(response) {
                $("#animatedLoader").hide();
                $('#api_error').html('');
                $('#fee_structure_id').val(0);
                $('#structure_name').val('');
                $('#is_required').prop('checked',false);
                $(window).trigger('load');
            }).fail(function(response) {
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
            });
        });
        $(document).on('click','.edit',function(){
            var fee_structure_id = $(this).data('fee_structure_id');
            var is_required = $(this).data('is_required');
            var structure_name = $(this).data('sname');
            $('#fee_structure_id').val(fee_structure_id);
            $('#structure_name').val(structure_name);
            $('#is_required').prop('checked',false);
            if(is_required == 1){
                $('#is_required').prop('checked',true);
            }
            $('#structure_name').focus();
        });
    });
</script>

 
               
                
                