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
            Centre
            <small>Add Centre</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Centre</a></li>
            <li class="active">{if $action=='edit'}Edit{else}Add{/if} Centre</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-8">
                            <div class="col-md-6 form-group" id="centre_name_box">
                                <label>Centre Name <span class="text-red">*</span></label>
                                <input type="text" name="centre_name" id="centre_name" value="{if $action=='edit'}{$centre_data['branch_name']}{/if}" class="form-control"/>
                                <label for="centre_name" id="centre_name_error_msg"></label>
                            </div>
                            <div class="col-md-6 form-group" id="centre_gst_box">
                                <label>Centre GST</label>
                                <input type="text" name="centre_gst" id="centre_gst" value="{if $action=='edit'}{$centre_data['gst_no']}{/if}" class="form-control"/>
                                <label for="centre_gst" id="centre_gst_error_msg"></label>
                            </div>
                            <div class="col-md-6 form-group" id="add_line_1_box">
                                <label>Address Line 1 <span class="text-red">*</span></label>
                                <input type="text" name="add_line_1" id="add_line_1" value="{if $action=='edit'}{$centre_data['add_line_1']}{/if}" class="form-control"/>
                                <label for="add_line_1" id="add_line_1_error_msg"></label>
                            </div>
                            <div class="col-md-6 form-group" id="add_line_2_box">
                                <label>Address Line 2</label>
                                <input type="text" name="add_line_2" id="add_line_2" value="{if $action=='edit'}{$centre_data['add_line_2']}{/if}" class="form-control"/>
                                <label for="add_line_2" id="add_line_2_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="state_id_box">
                                <label>State <span class="text-red">*</span></label>
                                <select class="form-control" name="state_id" id="state_id">
                                    <option value="0">--Select--</option>
                                </select>
                                <label for="state_id" id="state_id_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="city_id_box">
                                <label>City <span class="text-red">*</span></label>
                                <select class="form-control" name="city_id" id="city_id">
                                    <option value="0">--Select--</option>
                                </select>
                                <label for="city_id" id="city_id_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="pincode_box">
                                <label>Pincode <span class="text-red">*</span></label>
                                <input type="text" name="pincode" id="pincode" value="{if $action=='edit'}{$centre_data['pincode']}{/if}" class="form-control"/>
                                <label for="pincode" id="pincode_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="state_code_box">
                                <label>State Code <span class="text-red">*</span></label>
                                <input type="text" name="state_code" id="state_code" value="{if $action=='edit'}{$centre_data['state_code']}{/if}" class="form-control"/>
                                <label for="state_code" id="state_code_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="first_name_box">
                                <label>First Name <span class="text-red">*</span></label>
                                <input type="text" name="first_name" id="first_name" value="{if $action=='edit'}{$centre_data['first_name']}{/if}" class="form-control"/>
                                <label for="first_name" id="first_name_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="middle_name_box">
                                <label>Middel Name</label>
                                <input type="text" name="middle_name" id="middle_name" value="{if $action=='edit'}{$centre_data['middel_name']}{/if}"class="form-control"/>
                                <label for="middle_name" id="middle_name_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="last_name_box">
                                <label>Last Name</label>
                                <input type="text" name="last_name" id="last_name" value="{if $action=='edit'}{$centre_data['last_name']}{/if}" class="form-control"/>
                                <label for="last_name" id="last_name_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="gender_box">
                                <label>Gender <span class="text-red">*</span></label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="0">--Select--</option>
                                    {if $action=='edit'}
                                        <option value="M" {($centre_data['gender'] == 'M') ? 'selected' : ''}>Male</option>
                                        <option value="F" {($centre_data['gender'] == 'F') ? 'selected' : ''}>Female</option>
                                    {else}
                                        <option value="M" selected>Male</option>
                                        <option value="F">Female</option>
                                    {/if}
                                    
                                </select>
                                <label for="gender" id="gender_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="sign_email_id_box">
                                <label>Signing Email Id <span class="text-red">*</span></label>
                                <input type="text" name="sign_email_id" id="sign_email_id" value="{if $action=='edit'}{$centre_data['email_id']}{/if}" class="form-control"/>
                                <label for="sign_email_id" id="sign_email_id_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="sign_password_box">
                                <label>Signing Password <span class="text-red">*</span></label>
                                <input type="text" name="sign_password" id="sign_password" class="form-control"/>
                                <label for="sign_password" id="sign_password_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="contact_no_box">
                                <label>Contact No <i style="font-size:10px">(Printed on fee receipt)</i> <span class="text-red">*</span></label>
                                <input type="text" name="contact_no" id="contact_no" value="{if $action=='edit'}{$centre_data['contact_no']}{/if}"class="form-control"/>
                                <label for="contact_no" id="contact_no_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="alt_contact_no_box">
                                <label>Alt Contact No</label>
                                <input type="text" name="alt_contact_no" id="alt_contact_no" value="{if $action=='edit'}{$centre_data['alt_contact_no']}{/if}" class="form-control"/>
                                <label for="alt_contact_no" id="alt_contact_no_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="username_box">
                                <label>Username <span class="text-red">*</span></label>
                                <input type="text" name="username" id="username" value="{if $action=='edit'}{$centre_data['concat_person_name']}{/if}" class="form-control"/>
                                <label for="username" id="username_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="alt_email_id_box">
                                <label>Alt Email Id</label>
                                <input type="text" name="alt_email_id" id="alt_email_id" value="{if $action=='edit'}{$centre_data['alt_email_id']}{/if}" class="form-control"/>
                                <label for="alt_email_id" id="alt_email_id_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="location_box">
                                <label>Location</label>
                                <input type="text" name="location" id="location" value="{if $action=='edit'}{$centre_data['branch_location']}{/if}" class="form-control"/>
                                <label for="location" id="location_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="centre_start_day_box">
                                <label>Centre Start Date <span class="text-red">*</span></label>
                                <input type="text" name="centre_start_day" id="centre_start_day" value="{if $action=='edit'}{$centre_data['start_date']}{/if}" class="form-control"/>
                                <label for="centre_start_day" id="centre_start_day_error_msg"></label>
                            </div>
                            <div class="col-md-12 form-group" id="roylity_case_box">
                                <label>Roylity Calculation Case <span class="text-red">*</span></label><br/>
                                <input type="radio" name="roylity_case" id="case_1" value="case1"/> <label for="case_1" style="font-size:12px">Case 1 (10% of their gross callection - which is already there in the software and the royalty is calculated properly )</label><br/>

                                <input type="radio" name="roylity_case" id="case_2" value="case2" checked/> <label for="case_2" style="font-size:12px">Case 2 (Fixed Royalty)</label>
                                <br/>
                                <label id="roylity_case_error_msg"></label>
                            </div>
                            <div class="col-md-12 form-group" id="comment_box">
                                <label>Comment</label>
                                <textarea class="form-control" name="comments" id="comments" rows="7">{if $action=='edit'}{$centre_data['comments']}{/if}</textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="centre_id" id="centre_id" value="{($action=='edit') ? $centre_data['branch_id'] : 0}"/>
                                    <button id="save" class="btn btn-success">Create Centre</button>
                                    <button id="cancel" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12" style="border-radius:10px; border:1px solid blue;">
                                <h3 style="margin-top:6px;">Default Privileges</h3>
                                {if isset($departments) && !empty($departments)}
                                    <ul style="list-style-type:none;">
                                        {foreach $departments as $dd}
                                            <li>
                                                <input type="checkbox" name="centre_departments" id="centre_departments_{$dd['department_id']}" value="{$dd['department_id']}" {($action == 'edit' && in_array($dd['department_id'],$centre_data['branch_departments'])) ? 'checked' : ''}/>
                                                <label for="centre_departments_{$dd['department_id']}">{$dd['department']}</label>
                                            </li>
                                        {/foreach}
                                    </ul>
                                {/if} 
                            </div>
                            <div class="col-md-12" style="border-radius:10px; border:1px solid blue; margin-top:10px; padding-bottom:10px;">
                                <h3 style="margin-top:6px;">Center Default Fee</h3>
                                {if $action == 'edit'}
                                    {if isset($centre_data['fee_structure']) && !empty($centre_data['fee_structure'])}
                                        {$sn=1}
                                        {foreach $centre_data['fee_structure'] as $fee_header}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {$sn}. {$fee_header['structure_name']} {if $fee_header['is_required'] == '1'}<span class="text-red">*</span>{/if}
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" value="{$fee_header['fee_amount']}" name="{strtolower(str_replace(' ','_',$fee_header['structure_name']))}" id="{strtolower(str_replace(' ','_',$fee_header['structure_name']))}" class="default_fees" placeholder="{$fee_header['structure_name']} {if $fee_header['is_required'] == 'Y'}*{/if}" data-fsid="{$fee_header['fee_structure_master_id']}" style="width:100%" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode==46 ||event.charCode==127 ||event.charCode==8"/>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="default_fees_type" name="{strtolower(str_replace(' ','_',$fee_header['structure_name']))}_type" id="{strtolower(str_replace(' ','_',$fee_header['structure_name']))}_type" style="width:100%">
                                                        <option value="Annual" {if $fee_header['fee_type']=='Annual'} selected {/if}>Annual</option>
                                                        <option value="Monthly" {if $fee_header['fee_type']=='Monthly'} selected {/if}>Monthly</option>
                                                        <option value="Quarterly" {if $fee_header['fee_type']=='Quarterly'} selected {/if}>Quarterly</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {$sn = $sn+1}
                                        {/foreach}
                                    {/if}
                                {else}
                                    {if isset($fee_headers) && !empty($fee_headers)}
                                        {foreach $fee_headers as $fee_header}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {$fee_header['sno']}. {$fee_header['structure_name']} {if $fee_header['is_required'] == '1'}<span class="text-red">*</span>{/if}
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" name="{strtolower(str_replace(' ','_',$fee_header['structure_name']))}" id="{strtolower(str_replace(' ','_',$fee_header['structure_name']))}" class="default_fees" placeholder="{$fee_header['structure_name']} {if $fee_header['is_required'] == 'Y'}*{/if}" data-fsid="{$fee_header['fee_structure_id']}" style="width:100%" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode==46 ||event.charCode==127 ||event.charCode==8"/>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="default_fees_type" name="{strtolower(str_replace(' ','_',$fee_header['structure_name']))}_type" id="{strtolower(str_replace(' ','_',$fee_header['structure_name']))}_type" style="width:100%">
                                                        <option value="Annual">Annual</option>
                                                        <option value="Monthly">Monthly</option>
                                                        <option value="Quarterly">Quarterly</option>
                                                    </select>
                                                </div>
                                            </div>
                                        {/foreach}
                                    {/if}
                                {/if}
                            </div>
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
function get_state(fieldsId){
    
}
$(document).ready(function(){
    var city_id = $('#city_id').select2({
        width:'100%'
    });
    var state_id = $('#state_id').select2({
        width:'100%'
    });
    var centre_start_day = $('#centre_start_day').datepicker({
        format: 'mm/dd/yyyy',
        todayHighlight : true
    });
    $(window).load(function(){
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
            var selected_state_id = "{$centre_data['state_id']}";
            var action = "{$action}";
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
            var selected_city_id = "{$centre_data['city_id']}";
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
        var centre_id = $.trim($('#centre_id').val());
        var centre_name = $.trim($('#centre_name').val());
        var centre_gst = $.trim($('#centre_gst').val());
        var add_line_1 = $.trim($('#add_line_1').val());
        var add_line_2 = $.trim($('#add_line_2').val());
        var state_id = $.trim($('#state_id').val());
        var city_id = $.trim($('#city_id').val());
        var pincode = $.trim($('#pincode').val());
        var state_code = $.trim($('#state_code').val());
        var first_name = $.trim($('#first_name').val());
        var middle_name = $.trim($('#middle_name').val());
        var last_name = $.trim($('#last_name').val());
        var gender = $.trim($('#gender').val());
        var sign_email_id = $.trim($('#sign_email_id').val());
        var sign_password = $.trim($('#sign_password').val());
        var contact_no = $.trim($('#contact_no').val());
        var alt_contact_no = $.trim($('#alt_contact_no').val());
        var username = $.trim($('#username').val());
        var alt_email_id = $.trim($('#alt_email_id').val());
        var location = $.trim($('#location').val());
        var centre_start_day = $.trim($('#centre_start_day').val());
        var roylity_case = $.trim($('input[name=roylity_case]:selected').val());
        var comments = $.trim($('#comments').val());
        var gst_partern = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([0-9]){1}?$/;
        var departments = [];
        var default_fees = [];
        $('input[name=centre_departments]:checked').map(function () {
            departments.push($(this).val());
        }).get();
        $('.default_fees').map(function () {
            var innerJson = {
                fsid: $(this).data('fsid'),
                fee_amt: $(this).val(),
                fee_type: $("#" + $(this).attr('id') + "_type").val()
            }
            if ($.trim($(this).val()).length > 0 && $(this).val() > 0) {
                default_fees.push(innerJson);
            }
        }).get();
        if(checkBlank('centre_name_box','centre_name_error_msg','Required!', centre_name, 'centre_name', '')){
            return false;
        }
        if(centre_gst.length > 0){
            if(!gst_partern.test(centre_gst)){
                $('#centre_gst_error_msg').text('Invalid GST!');
                $("#centre_gst_box").addClass('has-error');
                $("#centre_gst").focus();
                return false;
            }else{
                $('#centre_gst_error_msg').text('');
                $("#centre_gst_box").removeClass('has-error');
            }
        }else{
            $('#centre_gst_error_msg').text('');
            $("#centre_gst_box").removeClass('has-error');
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
        if(checkBlank('state_code_box','state_code_error_msg','Required!', state_code, 'state_code', '')){
            return false;
        }
        if(checkBlank('first_name_box','first_name_error_msg','Required!', first_name, 'first_name', '')){
            return false;
        }
        if(checkBlank('gender_box','gender_error_msg','Required!', gender, 'gender', '0')){
            return false;
        }
        if(checkBlank('sign_email_id_box','sign_email_id_error_msg','Required!', sign_email_id, 'sign_email_id', '')){
            return false;
        }
        if(checkBlank('sign_password_box','sign_password_error_msg','Required!', sign_password, 'sign_password', '')){
            return false;
        }
        if(checkBlank('contact_no_box','contact_no_error_msg','Required!', contact_no, 'contact_no', '')){
            return false;
        }
        if(checkBlank('username_box','username_error_msg','Required!', username, 'username', '')){
            return false;
        }
        if(checkBlank('centre_start_day_box','centre_start_day_error_msg','Required!', centre_start_day, 'centre_start_day', '')){
            return false;
        }
        var control = {
            request_id : generateUUId(),
            source : 1,
            request_time : Math.round(+new Date() / 1000),
            version : 1.0
        };
        var data = {
            centre_id : centre_id,
            centre_name : centre_name,
            centre_gst : centre_gst,
            add_line_1 : add_line_1,
            add_line_2 : add_line_2,
            state_id : state_id,
            city_id  : city_id,
            pincode : pincode,
            state_code : state_code,
            first_name : first_name,
            middle_name : middle_name,
            last_name : last_name,
            gender : gender,
            sign_email_id : sign_email_id,
            sign_password : sign_password,
            contact_no : contact_no,
            alt_contact_no : alt_contact_no,
            username : username,
            alt_email_id : alt_email_id,
            location : location,
            centre_start_day : centre_start_day,
            roylity_case : roylity_case,
            comments : comments,
            departments : departments,
            default_fees : default_fees,
            login_id : '{userdata('UserId')}'
        };
        var request = {
            control : control,
            data : data
        };
        request = JSON.stringify(request);
        var url = "{$smarty.const.API_URL}branch/add";
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
            $('#api_error').html('<span class="text-green">'+response.control.Message+'</span>');
            setTimeout(function(){
                location.reload();
            }, 2000);
        }).fail(function(response) {
            $("#animatedLoader").hide();
            if (response.responseJSON.control) {
                $('#api_error').text(response.responseJSON.control.Message);
            }
        }).always(function() {
            
        });
    });
    $(document).on('click','#cancel',function(){

    });
});
</script>
