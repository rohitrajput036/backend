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
            User
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                    {if $role == 'Super Admin'}
                        <div class="col-md-12 row">
                            <div class="col-md-3 form-group" id="school_id_box">
                                <label>Select School</label>
                                <select name="school_id" id="school_id" class="form-control">
                                    <option value="0">--Select School--</option>
                                </select>
                                <label id="school_id_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="branch_id_box">
                                <label>Select Branch</label>
                                <select name="branch_id" id="branch_id" class="form-control">
                                    <option value="0">--Select Branch--</option>
                                </select>
                                <label id="branch_id_error_msg"></label>
                            </div>
                        </div>
                    {/if}
                        <div class="col-md-2 form-group" id="first_name_box">
                            <label>First Name<span class="text-red">*</span></label>
                            <input type="text" name="first_name" id="first_name" class="form-control"/>
                            <label id="first_name_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="middel_name_box">
                            <label>Middel Name</label>
                            <input type="text" name="middel_name" id="middel_name" class="form-control"/>
                            <label id="middel_name_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="last_name_box">
                            <label>Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control"/>
                            <label id="last_name_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="display_name_box">
                            <label>Display Name</label>
                            <input type="text" name="display_name" id="display_name" class="form-control"/>
                            <label id="display_name_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="dob_box">
                            <label>Date of birth<span class="text-red">*</span></label>
                            <input type="date" name="dob" id="dob" class="form-control"/>
                            <label id="dob_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="gender_box">
                            <label>Gender<span class="text-red">*</span></label>
                            <div class="form-control" style="text-align: center;">
                                <input type="radio" name="gender" id="gender_m" value="M" checked="true"/> <label for="gender_m">Male</label>
                                &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="gender" id="gender_f" value="F"/> <label for="gender_f">Female</label>
                            </div>
                            <label id="gender_error_msg"></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-9">
                                
                                <div class="col-md-3 form-group" id="mobile_no_box">
                                    <label>Mobile No<span class="text-red">*</span></label>
                                    <input type="text" name="mobile_no" id="mobile_no" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode==46 ||event.charCode==127 ||event.charCode==8"/>
                                    <label id="mobile_no_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="alt_mobile_no_box">
                                    <label>Alt Mobile No</label>
                                    <input type="text" name="alt_mobile_no" id="alt_mobile_no" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode==46 ||event.charCode==127 ||event.charCode==8"/>
                                    <label id="alt_mobile_no_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="email_id_box">
                                    <label>Email Id(<i>Login Id</i>)<span class="text-red">*</span></label>
                                    <input type="text" name="email_id" id="email_id" class="form-control"/>
                                    <label id="email_id_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="password_box">
                                    <label>Password<span class="text-red">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control"/>
                                    <label id="password_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="alt_email_id_box">
                                    <label>Alt Email Id</label>
                                    <input type="text" name="alt_email_id" id="alt_email_id" class="form-control"/>
                                    <label id="alt_email_id_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="add_line_1_box">
                                    <label>Address Line 1<span class="text-red">*</span></label>
                                    <input type="text" name="add_line_1" id="add_line_1" class="form-control"/>
                                    <label id="add_line_1_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="add_line_2_box">
                                    <label>Address Line 2</label>
                                    <input type="text" name="add_line_2" id="add_line_2" class="form-control"/>
                                    <label id="add_line_2_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="state_id_box">
                                    <label>State<span class="text-red">*</span></label>
                                    <select class="form-control" name="state_id" id="state_id">
                                        <option value="0">--Select State--</option>
                                    </select>
                                    <label id="state_id_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="city_id_box">
                                    <label>City<span class="text-red">*</span></label>
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option value="0">--Select City--</option>
                                    </select>
                                    <label id="city_id_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="pincode_box">
                                    <label>Pincode<span class="text-red">*</span></label>
                                    <input type="text" name="pincode" id="pincode" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode==46 ||event.charCode==127 ||event.charCode==8"/>
                                    <label id="pincode_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="doj_box">
                                    <label>Date of Joining<span class="text-red">*</span></label>
                                    <input type="date" name="doj" id="doj" class="form-control"/>
                                    <label id="doj_error_msg"></label>
                                </div>
                                <div class="col-md-12 form-group" id="comment_box">
                                    <label>Any comment?</label>
                                    <textarea class="form-control" name="comment" id="comment"></textarea>
                                    <label id="comment_error_msg"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" {($role != 'Super Admin') ? 'hidden' : ''}>
                                    <label>Select Role<span class="text-red">*</span></label>
                                    <ul style="list-style-type:none">
                                        {foreach $role_list as $role}
                                            <li>
                                                <input type="radio" name="role_type" id="role_type_{$role['role_id']}" value="{$role['role_id']}" {($role['role'] == 'Normal') ? 'checked':''}/> 
                                                <label for="role_type_{$role['role_id']}">{$role['role']}</label>
                                            </li>    
                                        {/foreach}
                                    </ul>
                                </div>
                                <div class="form-group" id="department_box">
                                    <label>Select Department<span class="text-red">*</span></label>
                                    <ul style="list-style-type:none">
                                        {if !empty($department_list)}
                                            {foreach $department_list as $departent}
                                                <li>
                                                    <input type="checkbox" name="department_type" id="department_type_{$departent['department_id']}" value="{$departent['department_id']}"/> 
                                                    <label for="department_type_{$departent['department_id']}">{$departent['department']}</label>
                                                </li>
                                            {/foreach}
                                        {/if}
                                    </ul>
                                    <label id="department_error_msg"></label>
                                </div>
                                <div class="form-group">
                                    <label>Upload Document</label>
                                    <input type="file" name="user_document" id="user_document" clas="form-control"/>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <p class="form-group has-error">
                                <label id="api_error"></label>
                            </p>
                            <input type="hidden" name="user_id" id="user_id" value="0"/> 
                            <button class="btn btn-primary" id="save">Save</button>
                            <button class="btn btn-danger" id="reset">Reset</button>
                        </div>
                        <div class="clearfix"></div>
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
    function get_school_list(){
        var control  = {
            request_id : generateUUId(),
            source : 1,
            request_time : Math.round(+new Date()/1000),
            version : {$smarty.const.API_VERSION}
        }
        var data = {
            is_active : 1
        }
        var request = {
            control : control,
            data : data
        }
        request = JSON.stringify(request);
        var url = "{$smarty.const.API_URL}school/get";
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
            $('#school_id').children().remove();
            $('#school_id').append("<option value='0'>--Select School--</option>");
            $.each(response.data,function(k,v){
                $('#school_id').append("<option value='"+v.school_id+"'>"+v.school_name+"</option>");
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
        var city_id = $('#city_id').select2({
            width:'100%'
        });
        var state_id = $('#state_id').select2({
            width:'100%'
        });
        {if $role == 'Super Admin'}
            var school_id = $('#school_id').select2({
                width:'100%'
            });
            var branch_id = $('#branch_id').select2({
                width:'100%'
            });
            $(document).on('change','#school_id',function(){
                var school_id = $(this).val();
                var control  = {
                    request_id : generateUUId(),
                    source : 1,
                    request_time : Math.round(+new Date()/1000),
                    version : {$smarty.const.API_VERSION}
                }
                var data = {
                    school_id : school_id,
                    is_active : 1
                }
                var request = {
                    control : control,
                    data : data
                }
                request = JSON.stringify(request);
                var url = "{$smarty.const.API_URL}branch/get";
                console.log(url);
                console.log(request);
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
                    $('#branch_id').children().remove();
                    $('#branch_id').append("<option value='0'>--Select Branch--</option>");
                    $.each(response.data,function(k,v){
                        $('#branch_id').append("<option value='"+v.branch_id+"'>"+v.branch_name+" ("+v.branch_code+")</option>");
                    });
                }).fail(function(response) {
                    $("#animatedLoader").hide();
                    if (response.responseJSON.control) {
                        $('#api_error').text(response.responseJSON.control.message);
                    }
                }).always(function() {
                });
            });
        {/if}
        $(window).load(function(){
            {if $role == 'Super Admin'}
                get_school_list();
            {/if}
            var control = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date() / 1000),
                cersion : 1.0
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
                $('#state_id').children().remove();
                $('#state_id').append("<option value='0'>--Select State--</option>");
                var action = "{$action}";
                var selected_state_id = "{($action == 'edit') ? $centre_data['state_id'] : 0}";
                $.each(response.data,function(k,v){
                    if(action == 'edit'){
                        if (selected_state_id == v.state_id){
                            $('#state_id').append("<option value='"+v.state_id+"' selected data-sc='"+v.state_code+"'>"+v.state_name+"</option>");
                        }else{
                            $('#state_id').append("<option value='"+v.state_id+"' data-sc='"+v.state_code+"'>"+v.state_name+"</option>");
                        }
                    }else{
                        $('#state_id').append("<option value='"+v.state_id+"' data-sc='"+v.state_code+"'>"+v.state_name+"</option>");
                    }    
                });
                if(action == 'edit'){
                    $('#state_id').trigger('change');
                }
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
                var action = "{$action}";
                var selected_city_id = "{($action == 'edit') ? $centre_data['city_id'] : 0}";
                $.each(response.data,function(k,v){
                    if(action == 'edit'){
                        if (selected_city_id == v.city_id){
                            $('#city_id').append("<option value='"+v.city_id+"' selected>"+v.city_name+"</option>");
                        }else{
                            $('#city_id').append("<option value='"+v.city_id+"'>"+v.city_name+"</option>");   
                        }
                    }else{
                        $('#city_id').append("<option value='"+v.city_id+"'>"+v.city_name+"</option>");
                    }
                        
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
            var user_id         = $('#user_id').val();
            {if $role == 'Super Admin'}
                var school_id       = $('#school_id').val();
                var branch_id       = $('#branch_id').val();
            {else}
                var school_id       = "{userdata('SchoolId')}";
                var branch_id       = "{userdata('BranchId')}";
            {/if}
            var first_name      = $('#first_name').val();
            var middel_name     = $('#middel_name').val();
            var last_name       = $('#last_name').val();
            var display_name    = $('#display_name').val();
            var dob             = $('#dob').val();
            var gender          = $('input[name=gender]:checked').val();
            var mobile_no       = $('#mobile_no').val();
            var alt_mobile_no   = $('#alt_mobile_no').val();
            var email_id        = $('#email_id').val();
            var password        = $('#password').val();
            var alt_email_id    = $('#alt_email_id').val();
            var add_line_1      = $('#add_line_1').val();
            var add_line_2      = $('#add_line_2').val();
            var state_id        = $('#state_id').val();
            var city_id         = $('#city_id').val();
            var pincode         = $('#pincode').val();
            var doj             = $('#doj').val();
            var comment         = $('#comment').val();
            var role_id         = $('input[name=role_type]:checked').val();
            var departments = [];
            $('input[name=department_type]:checked').map(function () {
                departments.push($(this).val());
            }).get();
            {if $role == 'Super Admin'}
                if(checkBlank('school_id_box','school_id_error_msg','Required!', school_id, 'school_id', '0')){
                    return false;
                }
                if(checkBlank('branch_id_box','branch_id_error_msg','Required!', branch_id, 'branch_id', '0')){
                    return false;
                }    
            {/if}
            if(checkBlank('first_name_box','first_name_error_msg','Required!', first_name, 'first_name', '')){
                return false;
            }
            if(checkBlank('dob_box','dob_error_msg','Required!', dob, 'dob', '')){
                return false;
            }
            if(checkBlank('gender_box','gender_error_msg','Required!', gender, 'gender_m', '')){
                return false;
            }
            if(checkBlank('mobile_no_box','mobile_no_error_msg','Required!', mobile_no, 'mobile_no', '')){
                return false;
            }
            if(checkBlank('email_id_box','email_id_error_msg','Required!', email_id, 'email_id', '')){
                return false;
            }
            if(checkBlank('password_box','password_error_msg','Required!', password, 'password', '')){
                return false;
            }
            if(checkBlank('add_line_1_box','add_line_1_error_msg','Required!', add_line_1, 'add_line_1', '')){
                return false;
            }
            if(checkBlank('state_id_box','state_id_error_msg','Required!', state_id, 'state_id', '0')){
                return false;
            }
            if(checkBlank('city_id_box','city_id_error_msg','Required!', city_id, 'city_id', '0')){
                return false;
            }
            if(checkBlank('pincode_box','pincode_error_msg','Required!', pincode, 'pincode', '')){
                return false;
            }
            if(checkBlank('doj_box','doj_error_msg','Required!', doj, 'doj', '')){
                return false;
            }
            if(checkBlank('department_box','department_error_msg','Required!', departments.length, 'department_box', '0')){
                return false;
            }
            var control = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date() / 1000),
                version : {$smarty.const.API_VERSION}
            };
            var data = {
                user_id : user_id,
                branch_id : branch_id,
                school_id : school_id,
                first_name : first_name,
                middel_name : middel_name,
                last_name : last_name,
                display_name : display_name,
                dob : dob,
                gender : gender,
                mobile_no : mobile_no,
                alt_mobile_no : alt_mobile_no,
                email_id : email_id,
                password : password,
                alt_email_id : alt_email_id,
                address_line_1 : add_line_1,
                address_line_2 : add_line_2,
                state_id : state_id,
                city_id : city_id,
                pincode : pincode,
                doj : doj,
                comment : comment,
                role_id : role_id,
                department : departments,
                login_id : "{userdata('UserId')}"
            };
            var request = {
                control : control,
                data : data
            };
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}user/add";
            console.log(url);
            console.log(request);
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
                $('#api_error').html('<span class="text-success">'+response.control.message+'</span>');
                setTimeout(function(){
                    location.realod();
                }, 2000);
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