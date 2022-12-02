{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Relation
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage relation</li>
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
                                <div class="form-group" id="relation_box">
                                    <label>Relation <span class="text-red">*</span></label>
                                    <input type="text" name="relation" id="relation" class="form-control" placeholder="Type Your relation."/>
                                    <input type="hidden" name="relation_id" id="relation_id" value="0"/>
                                    <label id="relation_error_msg"></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button id="save" class="btn btn-primary" style="margin-top:20px">Save</button>
                            </div>
                        </div>
                        <div class="col-md-12 form-group has-error text-center">
                            <label id="api_error"></label> 
                        </div>
                        <table class="table table-bordered" id="DataTable">
                            <thead>
                                <tr>
                                    <th style="width:10%">S NO</th>
                                    <th>Relation</th>
                                    <th style="width:20%">#</th>
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
        var DataTable = $('#DataTable').DataTable({
            searching:true,
            ordering:false
        });
        $(window).load(function(){
            var control  = {
                request_id : generateUUId(),
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
            var url = "{$smarty.const.API_URL}relation/get";
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
            var relation_id = $('#relation_id').val();
            var relation = $.trim($('#relation').val());
            if(checkBlank('relation_box','relation_error_msg','Required..', relation, 'relation', '')){
                return false;
            }
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                relation_id : relation_id,
                relation : relation,
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}relation/add";
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
                $('#relation_id').val(0);
                $('#relation').val('');
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
            var relation_id = $(this).data('relation_id');
            var is_active = $(this).data('at');
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                relation_id : relation_id,
                is_active : is_active,
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}relation/delete";
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
                $('#relation_id').val(0);
                $('#relation').val('');
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
            var relation_id = $(this).data('relation_id');
            $('#relation_id').val(relation_id);
            $('#relation').val($('#relation_'+relation_id).text());
            $('#relation').focus();
        });
    });
</script>