{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<style>
    #sidebar_toggle {
        display: none;
    }
</style>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Routes
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Routes</li>
        </ol>
    </section>
        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#manage_routes">Manage routes</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#manage_vehicle">Manage Vehicle</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#manage_driver">Manage Driver/Guard</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade">
                                <h3>HOME</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div id="manage_routes" class="tab-pane active">
                                <div class="col-md-4">
                                    <div class="col-md-12 form-group has-error text-center">
                                        <label id="api_error"></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 form-group" id="route_name_box">
                                            <label>Route Name<span class="text-red">*</span></label>
                                            <input type="text" name="route_name" id="route_name" class="form-control" placeholder="Enter Route name"/>
                                            <input type="hidden" name="route_master_id" id="route_master_id" value="0"/>
                                            <label id="route_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-4">
                                            <button id="add_route" class="btn btn-primary" style="margin-top:20px">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-bordered" id="DataTable1">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Route Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody> 
                                    </table>
                                
                                </div>
                            </div>
                            <div id="manage_vehicle" class="tab-pane fade"><br>
                                <div class="col-md-4">
                                    <div class="col-md-12 form-group has-error text-center">
                                        <label id="api_error"></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group" id="vehicle_no_box">
                                            <label>Vehicle NO.<span class="text-red">*</span></label>
                                            <input type="text" name="vehicle_no" id="vehicle_no" class="form-control" placeholder="Enter vehicle no."/>
                                            <label for="vehicle_no" id="vehicle_no_error_msg"></label>
                                        </div>
                                        <div class="col-md-6 form-group" id="vehicle_color_box">
                                            <label>Vehicle Colour</label>
                                            <input type="text" name="vehicle_color" id="vehicle_color" class="form-control" placeholder="Vehicle colour name"/>
                                            <label for="vehicle_color" id="vehicle_color_error_msg"></label>
                                        </div>
                                        <div class="col-md-6 form-group" id="manufacturing_year_box">
                                            <label>Manufacturing Year<span class="text-red">*</span></label>
                                            <input type="text" name="manufacturing_year" id="manufacturing_year" class="form-control" placeholder="Write your vehicle model"/>
                                            <label for="manufacturing_year" id="manufacturing_year_error_msg"></label>
                                        </div>
                                        <div class="col-md-6 form-group" id="seating_capacity_box">
                                            <label>Seating Capacity<span class="text-red">*</span></label>
                                            <input type="text" name="seating_capacity" id="seating_capacity" class="form-control" placeholder="Write your vehicle seat capiblity"/>
                                            <label for="seating_capacity" id="seating_capacity_error_msg"></label>
                                        </div>
                                        <div class="col-md-6 form-group" id="pre_reserved_seat_box">
                                            <label>Pre Reserved Seat<span class="text-red">*</span></label>
                                            <input type="text" name="pre_reserved_seat" id="pre_reserved_seat" class="form-control" placeholder="Is any seat book or not"/>
                                            <label for="pre_reserved_seat" id="pre_reserved_seat_error_msg"></label>
                                        </div>
                                        <div class="col-md-4">
                                            <button id="add_vehicle" class="btn btn-primary" style="margin-Ftop:20px">Save</button>
                                            <input type="hidden" name="vehicle_master_id" id="vehicle_master_id" value="0"/>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-bordered" id="DataTable2">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>vehicle No</th>
                                                <th>vehicle Colour</th>
                                                <th>Manufacturing Year</th>
                                                <th>Seating Capacity</th>
                                                <th>Pre Reserved Seat</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody> 
                                    </table>    
                                </div>
                            </div>
                            <div id="manage_driver" class="tab-pane fade"><br>
                                <div class="col-md-12">
                                    <div class="col-md-12 form-group has-error text-center">
                                        <label id="api_error"></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 form-group" id="first_name_box">
                                            <label>First Name<span class="text-red">*</span></label>
                                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter your first name"/>
                                            <label for="first_name" id="first_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-3 form-group" id="middle_name_box">
                                            <label>Middle Name</label>
                                            <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Enter your middle name"/>
                                            <label for="middle_name" id="middle_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-3 form-group" id="last_name_box">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter your last name"/>
                                            <label for="last_name" id="last_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-3 form-group" id="driver_type_box">
                                            <label>Type<span class="text-red">*</span></label>
                                            <select name="driver_type" id="driver_type" class="form-control">
                                                <option value="driver">Driver</option>
                                                <option value="guard">Guard</option>
                                            </select>
                                            <label for="driver_type" id="driver_type_error_msg"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 form-group" id="dl_no_box">
                                            <label>DL.NO<span class="text-red">*</span></label>
                                            <input type="text" name="dl_no" id="dl_no" class="form-control"/>
                                            <label for="dl_no" id="dl_no_error_msg"></label>
                                        </div>
                                        <div class="col-md-3 form-group" id="gender_box">
                                            <label>Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            <label for="gender" id="gender_error_msg"></label>
                                        </div>
                                        <div class="col-md-3 form-group" id="address_line_1_box">
                                            <label>Address Line 1<span class="text-red">*</span></label>
                                            <input type="text" name="address_line_1" id="address_line_1" class="form-control" placeholder="Enter your address"/>
                                            <label for="address_line_1" id="address_line_1_error_msg"></label>
                                        </div>
                                        <div class="col-md-3 form-group" id="address_line_2_box">
                                            <label>Address Line 2</label>
                                            <input type="text" name="address_line_2" id="address_line_2" class="form-control" placeholder="Enter your address"/>
                                            <label for="address_line_2" id="address_line_2_error_msg"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 form-group" id="contact_no_box">
                                            <label>Contact Number<span class="text-red">*</span></label>
                                            <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Enter your number"/>
                                            <label for="contact_no" id="contact_no_error_msg"></label>
                                        </div>
                                        <div class="col-md-3 form-group" id="alt_contact_no_box">
                                            <label>Alt. Contact Number</label>
                                            <input type="text" name="alt_contact_no" id="alt_contact_no" class="form-control" placeholder="Enter your number"/>
                                            <label for="alt_contact_no" id="alt_contact_no_error_msg"></label>
                                        </div>
                                        
                                        <div class="col-md-2 form-group" id="state_id_box">
                                            <label>State<span class="text-red">*</span></label>
                                            <select name="state_id" id="state_id" class="form-control">
                                                <option value="0">--Select State--</option>
                                            </select>
                                            <label for="state_id" id="state_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="city_id_box">
                                            <label>City<span class="text-red">*</span></label>
                                            <select name="city_id" id="city_id" class="form-control">
                                                <option value="0">--Select City--</option>
                                            </select>
                                            <label for="city_id" id="city_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="pincode_box">
                                            <label>Pincode</label>
                                            <input type="text" name="pincode" id="pincode" class="form-control"/>
                                            <label for="pincode" id="pincode_error_msg"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button id="add_driver" class="btn btn-primary pull-right" style="margin-top:20px">Save</button>
                                            <input type="hidden" name="driver_master_id" id="driver_master_id" value="0"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="DataTable3">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Contact Number</th>
                                                <th>Address</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>DL. No</th>
                                                <th>Type</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody> 
                                    </table>    
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div>
</div><!-- ./wrapper -->
{include file='footer.tpl'}
{js('common.js')}
<script>
    $(document).ready(function(){
        var DataTable = $('#DataTable1').DataTable({
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
                branch_id : '{userdata('BranchId')}',
                for_table : true
            };
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}route_master/get";
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
                $('#route_master_id').val(0);
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
        $(document).on('click', '#add_route', function(){
            var route_master_id = $('#route_master_id').val();
            var route_name = $.trim($('#route_name').val());
            if(checkBlank('route_name_box','route_name_error_msg','Required..', route_name, 'route_name', '')){
                return false;
            }
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                route_master_id     :  route_master_id,
               
                route_name          :  route_name,
                branch_id           :  '{userdata('BranchId')}',
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}route_master/add";
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
                $('#route_master_id').val(0);
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
            var route_master_id = $(this).data('#route_master_id');
            var is_active = $(this).data('at');
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                route_master_id : route_master_id,
                is_active : is_active,
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}route_master/delete";
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
                $('#route_master_id').val(0);
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
            var route_master_id = $(this).data('route_master_id');
            $('#route_master_id').val(route_master_id);
            $('#route_name').val($('#route_'+route_master_id).text());
            $('#route_name').focus();
        });
        var DataTable = $('#DataTable2').DataTable({
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
                branch_id : '{userdata('BranchId')}',
                for_table : true
            };
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}vehicle_master/get";
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
                $('#vehicle_master_id').val(0);
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
        $(document).on('click', '#add_vehicle', function(){
            var vehicle_master_id = $('#vehicle_master_id').val();
            var vehicle_no = $.trim($('#vehicle_no').val());
            var vehicle_color = $.trim($('#vehicle_color').val());
            var manufacturing_year = $.trim($('#manufacturing_year').val());
            var seating_capacity = $.trim($('#seating_capacity').val());
            var pre_reserved_seat = $.trim($('#pre_reserved_seat').val());
            if(checkBlank('vehicle_no_box','vehicle_no_error_msg','Required..', vehicle_no, 'vehicle_no', '')){
                return false;
            }
            if(checkBlank('vehicle_color_box','vehicle_color_error_msg','Required..', vehicle_color, 'vehicle_color', '')){
                return false;
            }
            if(checkBlank('manufacturing_year_box','manufacturing_year_error_msg','Required..', manufacturing_year, 'manufacturing_year', '')){
                return false;
            }
            if(checkBlank('seating_capacity_box','seating_capacity_error_msg','Required..', seating_capacity, 'seating_capacity', '')){
                return false;
            }
            if(checkBlank('pre_reserved_seat_box','pre_reserved_seat_error_msg','Required..', pre_reserved_seat, 'pre_reserved_seat', '')){
                return false;
            }
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                vehicle_master_id   :  vehicle_master_id,
                vehicle_no          :  vehicle_no,
                vehicle_color       : vehicle_color,
                manufacturing_year  : manufacturing_year,
                seating_capacity    : seating_capacity,
                pre_reserved_seat   : pre_reserved_seat,
                branch_id           : '{userdata('BranchId')}',
                login_id            : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}vehicle_master/add";
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
                $('#vehicle_master_id').val(0);
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
            var vehicle_master_id = $(this).data('#vehicle_master_id');
            var is_active = $(this).data('at');
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                vehicle_master_id : vehicle_master_id,
                is_active : is_active,
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}vehicle_master/delete";
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
                $('#vehicle_master_id').val(0);
                $(window).trigger('load');
            }).fail(function(response) {
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
            });
        });
        var DataTable = $('#DataTable3').DataTable({
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
                branch_id : '{userdata('BranchId')}',
                for_table : true
            };
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}driver/get";
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
                $('#driver_master_id').val(0);
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
        $(document).on('click', '#add_driver', function(){
            var driver_master_id = $('#driver_master_id').val();
            var first_name = $.trim($('#first_name').val());
            var middle_name = $.trim($('#middle_name').val());
            var last_name = $.trim($('#last_name').val());
            var gender = $.trim($('#gender').val());
            var contact_no = $.trim($('#contact_no').val());
            var alt_contact_no = $.trim($('#alt_contact_no').val());
            var address_line_1 = $.trim($('#address_line_1').val());
            var address_line_2 = $.trim($('#address_line_2').val());
            var state_id = $.trim($('#state_id').val());
            var city_id = $.trim($('#city_id').val());
            var pincode = $.trim($('#pincode').val());
            var dl_no = $.trim($('#dl_no').val());
            var driver_type = $.trim($('#driver_type').val());
            if(checkBlank('first_name_box','first_name_error_msg','Required..', first_name, 'first_name', '')){
                return false;
            }
            if(checkBlank('middle_name_box','middle_name_error_msg','Required..', middle_name, 'middle_name', '')){
                return false;
            }
            if(checkBlank('last_name_box','last_name_error_msg','Required..', last_name, 'last_name', '')){
                return false;
            }
            if(checkBlank('gender_box','gender_error_msg','Required..', gender, 'gender', '')){
                return false;
            }
            if(checkBlank('contact_no_box','contact_no_error_msg','Required..', contact_no, 'contact_no', '')){
                return false;
            }
            if(checkBlank('alt_contact_no_box','alt_contact_no_error_msg','Required..', alt_contact_no, 'alt_contact_no', '')){
                return false;
            }
            if(checkBlank('address_line_1_box','address_line_1_error_msg','Required..', address_line_1, 'address_line_1', '')){
                return false;
            }
            if(checkBlank('address_line_2_box','address_line_2_error_msg','Required..', address_line_2, 'address_line_2', '')){
                return false;
            }
            if(checkBlank('state_id_box','state_id_error_msg','Required..', state_id, 'state_id', '')){
                return false;
            }
            if(checkBlank('city_id_box','city_id_error_msg','Required..', city_id, 'city_id', '')){
                return false;
            }
            if(checkBlank('pincoded_box','pincode_error_msg','Required..', pincode, 'pincode', '')){
                return false;
            }
            if(checkBlank('dl_no_box','dl_no_error_msg','Required..', dl_no, 'dl_no', '')){
                return false;
            }
            if(checkBlank('driver_type_box','driver_type_error_msg','Required..', driver_type, 'driver_type', '')){
                return false;
            }
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                driver_master_id  : driver_master_id,
                branch_id         : '{userdata('BranchId')}',
                fisrt_name        : first_name,
                middle_name       : middle_name,
                last_name         : last_name,
                gender            : gender,
                contact_no        : contact_no,
                alt_contact_no    : alt_contact_no,
                address_line_1    : address_line_1,
                address_line_2    : address_line_2,
                state_id          : state_id,
                city_id           : city_id,
                pincode           : pincode,
                dl_no             : dl_no,
                driver_type       : driver_type,                
                login_id          : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}driver/add";
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
                $('#driver_master_id').val(0);
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
            var driver_master_id = $(this).data('#driver_master_id');
            var is_active = $(this).data('at');
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                driver_master_id : driver_master_id,
                is_active : is_active,
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}driver/delete";
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
                $('#driver_master_id').val(0);
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