{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Area
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Area</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <div class="form-group" id="state_box">
                                    <label>State Name <span class="text-red">*</span></label>
                                    <select name="state_id" id="state_id" class="form-control">
                                        <option value="0">--select--</option>
                                    </select>
                                    <label id="state_error_msg"></label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" id="city_box">
                                    <label>City Name <span class="text-red">*</span></label>
                                    <select name="city_id" id="city_id" class="form-control">
                                        <option value="0">--select--</option>
                                    </select>
                                    <label id="city_error_msg"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" id="area_box">
                                    <label>Area Name <span class="text-red">*</span></label>
                                    <input type="text" name="area_name" id="area_name" class="form-control" placeholder="Write Your area name."/>
                                    <label id="area_error_msg"></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <input type="hidden" name="area_master_id" id="area_master_id" value="0"/>
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
                                    <th>State / City Name</th>
                                    <th>Area Name</th>
                                    <th style="width:15%">#</th>
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
function get_state_list(id){
    var control = {
        request_id : generateUUId(),
        source : 1,
        request_time : Math.round(+new Date() / 1000),
        cersion : {$smarty.const.API_VERSION}
    };
    var data = {
        is_active : 1
    };
    var request = {
        control : control,
        data : data
    }
    request = JSON.stringify(request);
    var url = "{$smarty.const.API_URL}state/get";
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
        $('#'+id).children().remove();
        $('#'+id).append("<option value='0'>--Select State--</option>");
        $.each(response.data,function(k,v){
            $('#'+id).append("<option value='"+v.state_id+"' data-sc='"+v.state_code+"'>"+v.state_name+"</option>");
        });
    }).fail(function(response) {
        $("#animatedLoader").hide();
        if (response.responseJSON.control) {
            $('#api_error').text(response.responseJSON.control.message);
        }
    }).always(function() {
        
    });
}
    $(document).ready(function(){
        var DataTable = $('#DataTable').DataTable({
            searching:true,
            ordering:false
        });
        var city_id = $('#city_id').select2({
            width:'100%'
        });
        var state_id = $('#state_id').select2({
            width:'100%'
        });
        $(window).load(function(){
            get_state_list('state_id');
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
            var url = "{$smarty.const.API_URL}area/get";
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
        
        $(document).on('change','#state_id',function(){
            var state_id = $(this).val();
            var state_code = $('#state_id option:selected').data('sc');
            $("#state_code").val(state_code);
            var control = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date() / 1000),
                cersion : 1.0
            };
            var data = {
                is_active : 1,
                state_id : state_id
            };
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}city/get";
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
                $('#city_id').children().remove();
                $('#city_id').append("<option value='0'>--Select City--</option>");
                $.each(response.data,function(k,v){
                    $('#city_id').append("<option value='"+v.city_id+"'>"+v.city_name+"</option>");
                });
                $('#city_id').trigger('change');
            }).fail(function(response) {
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
                
            });
        });
        $(document).on('click','#save',function(){
            var area_master_id = $('#area_master_id').val();
            var state_id = $.trim($('#state_id').val());
            var city_id = $.trim($('#city_id').val());    
            var area_name = $.trim($('#area_name').val());    
            if(checkBlank('state_box','state_error_msg','Required..', state_id, 'state_id', '')){
                return false;
            }
            if(checkBlank('city_box','city_error_msg','Required..', city_id, 'city_id', '')){
                return false;
            }
            if(checkBlank('area_box','area_error_msg','Required..', area_name, 'area_name', '')){
                return false;
            }
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                area_master_id : area_master_id,
                state_id : state_id,
                city_id : city_id,
                area_name : area_name,
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}area/add";
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
                $('#area_master_id').val(0);
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
            var area_master_id = $(this).data('area_master_id');
            var is_active = $(this).data('at');
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                area_master_id : area_master_id,
                is_active : is_active,
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}area/delete";
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
                $('#area_master_id').val(0);
                $(window).trigger('load');
            }).fail(function(response) {
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
            });
        });
    });
</script>