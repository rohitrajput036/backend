{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<style>
.form-control[readonly]{
    cursor: auto;
    background-color:white !important;
    opacity: 1;
}
fieldset.custom-border {
    border: 1px groove #357ca5 !important;
    padding: 0px 5px 5px 5px !important;
    margin: 0px 0px 5px 0px !important;
    -webkit-box-shadow: 0px 0px 0px 0px #000;
    box-shadow: 0px 0px 0px 0px #000;
}

legend.custom-border {
    width: auto;
    padding: 0 10px;
    border-bottom: none;
    font-weight: 700;
    font-size: 13px;
    color:#357ca5
}
.custom-radio-box>label{
    display: inline-block;
    color: #333;
    width: auto;
    height: 20px;
    text-align: center;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 20px;
    transition: all 0.3s;
    border: 1px solid #333;
    margin-left: 5px;
    padding-right:5px;
    padding-left:5px;
}
.custom-radio-btn:checked+label {
    border: 2px solid yellowgreen;
    background: yellowgreen;
    color: #fff;
    width: auto;
    height: 20px;
}
.custom-radio-btn{
    display: none;
}
.when_enter_mobile_show{
    display: none;
}
</style>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Enquiry
            <small>Add Enquiry</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Enquiry</li>
            <li class="active">Add Enquiry</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row when_enter_mobile_success">
                            <div class="col-md-4 form-group" id="mobile_no_box">
                                <label>Enter Mobile No<span class="text-red">*</span></label>
                                <input type="text" name="mobile_no" id="mobile_no" maxlength="10" minlength="10" class="form-control" placeholder="Please enter mobile no*" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode==46 ||event.charCode==127 ||event.charCode==8"/>
                                <label id="mobile_no_error_msg"></label>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group" style="padding-top:19px;">
                                    <button class="btn btn-success btn-block" id="search">Search</button>
                                </div>
                            </div>
                        </div>
                        <fieldset class="custom-border when_enter_mobile_show">
                            <legend class="custom-border">Child Information</legend>
                            <div class="col-md-3 form-group" id="enquiry_date_box">
                                <label>Enquiry Date<span class="text-red">*</span></label>
                                <input type="text" name="enquiry_date" id="enquiry_date" class="form-control" value="{date('m/d/Y')}" readonly/>
                                <label id="enquiry_date_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="child_first_name_box">
                                <label>First Name<span class="text-red">*</span></label>
                                <input type="text" name="child_first_name" id="child_first_name" class="form-control"/>
                                <label id="child_first_name_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="child_middel_name_box">
                                <label>Middel Name</label>
                                <input type="text" name="child_middel_name" id="child_middel_name" class="form-control"/>
                                <label id="child_middel_name_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="child_last_name_box">
                                <label>Last Name</label>
                                <input type="text" name="child_last_name" id="child_last_name" class="form-control"/>
                                <label id="child_last_name_error_msg"></label>
                            </div>
                            <div class="col-md-2 form-group" id="child_gender_box">
                                <label>Gender</label>
                                <div class="form-control custom-radio-box" style="text-align:center;">
                                    <input type="radio" name="child_gender" id="child_gender_m" value="M" class="custom-radio-btn" checked /> <label for="child_gender_m">Male</label>&nbsp;
                                    <input type="radio" name="child_gender" id="child_gender_f" value="F" class="custom-radio-btn"/> <label for="child_gender_f">Female</label>
                                </div>
                                <label id="child_gender_error_msg"></label>
                            </div>
                            <div class="col-md-2 form-group" id="child_dob_box">
                                <label>Date of birth</label>
                                <input type="text" name="child_dob" id="child_dob" class="form-control"  readonly/>
                                <label id="child_dob_error_msg"></label>
                            </div>
                            <div class="col-md-2 form-group" id="child_age_box">
                                <label>Age</label>
                                <input type="text" name="child_age" id="child_age" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode==46 ||event.charCode==127 ||event.charCode==8"/>
                                <label id="child_age_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="sibling_box">
                                <label>&nbsp;</label>
                                <div class="form-control text-center">
                                    <input type="checkbox" name="sibling" id="sibling" value="0"/>
                                    <label for="sibling">Is sibling of the child ?</label>
                                </div>
                                <label id="sibling_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="sibling_dob_box">
                                <label>Sibling date of birth</label>
                                <input type="text" name="sibling_dob" id="sibling_dob" class="form-control"  readonly/>
                                <label id="sibling_dob_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="child_add_line_1_box">
                                <label>Address Line 1</label>
                                <input type="text" name="child_add_line_1" id="child_add_line_1" class="form-control"/>
                                <label id="child_add_line_1_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="child_add_line_2_box">
                                <label>Address Line 2</label>
                                <input type="text" name="child_add_line_2" id="child_add_line_2" class="form-control"/>
                                <label id="child_add_line_2_error_msg"></label>
                            </div>
                            <div class="col-md-2 form-group" id="child_state_id_box">
                                <label>State</label>
                                <select name="child_state_id" id="child_state_id" class="form-control">
                                    <option value="0">--Select State--</option>
                                </select>
                                <label id="child_state_id_error_msg"></label>
                            </div>
                            <div class="col-md-2 form-group" id="child_city_id_box">
                                <label>City</label>
                                <select name="child_city_id" id="child_city_id" class="form-control">
                                    <option value="0">--Select City--</option>
                                </select>
                                <label id="child_city_id_error_msg"></label>
                            </div>
                            <div class="col-md-2 form-group" id="child_pincode_box">
                                <label>Pincode</label>
                                <input type="text" name="child_pincode" id="child_pincode" class="form-control" maxlength="6" minlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode==46 ||event.charCode==127 ||event.charCode==8"/>
                                <label id="child_pincode_error_msg"></label>
                            </div>
                        </fieldset>
                        <fieldset class="custom-border when_enter_mobile_show">
                            <legend class="custom-border">Parents Information</legend>
                            <div class="col-md-3 form-group" id="father_first_name_box">
                                <label>Father First Name</label>
                                <input type="text" name="father_first_name" id="father_first_name" class="form-control"/>
                                <label id="father_first_name_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="father_middel_name_box">
                                <label>Father Middel Name</label>
                                <input type="text" name="father_middel_name" id="father_middel_name" class="form-control"/>
                                <label id="father_middel_name_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="father_last_name_box">
                                <label>Father Last Name</label>
                                <input type="text" name="father_last_name" id="father_last_name" class="form-control"/>
                                <label id="father_last_name_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="father_mobile_no_box">
                                <label>Father Mobile No</label>
                                <input type="text" name="father_mobile_no" id="father_mobile_no" class="form-control" minlength="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode==46 ||event.charCode==127 ||event.charCode==8"/>
                                <label id="father_mobile_no_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="father_email_id_box">
                                <label>Father Email Id</label>
                                <input type="text" name="father_email_id" id="father_email_id" class="form-control"/>
                                <label id="father_email_id_error_msg"><label>
                            </div>
                            <div class="col-md-3 form-group" id="father_education_id_box">
                                <label>Father Educational</label>
                                <select name="father_education_id" id="father_education_id" class="form-control">
                                    <option value="0">--Select--</option>
                                    {if isset($education_type_list) && !empty($education_type_list)}
                                        {foreach $education_type_list as $edu}
                                            <option value="{$edu['education_type_id']}">{$edu['education_type']}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                                <label id="father_education_id_error_msg"><label>
                            </div>
                            <div class="col-md-3 form-group" id="father_occupation_id_box">
                                <label>Father Occupation</label>
                                <select name="father_occupation_id" id="father_occupation_id" class="form-control">
                                    <option value="0">--Select--</option>
                                    {if isset($father_occupation_type_list) && !empty($father_occupation_type_list)}
                                        {foreach $father_occupation_type_list as $fot}
                                            <option value="{$fot['occupation_type_id']}">{$fot['occupation_type']}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                                <label id="father_occupation_id_error_msg"><label>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-3 form-group" id="mother_first_name_box">
                                <label>Mother First Name</label>
                                <input type="text" name="mother_first_name" id="mother_first_name" class="form-control"/>
                                <label id="mother_first_name_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="mother_middel_name_box">
                                <label>Mother Middel Name</label>
                                <input type="text" name="mother_middel_name" id="mother_middel_name" class="form-control"/>
                                <label id="mother_middel_name_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="mother_last_name_box">
                                <label>Mother Last Name</label>
                                <input type="text" name="mother_last_name" id="mother_last_name" class="form-control"/>
                                <label id="mother_last_name_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="mother_mobile_no_box">
                                <label>Mother Mobile No</label>
                                <input type="text" name="mother_mobile_no" id="mother_mobile_no" class="form-control" minlength="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode==46 ||event.charCode==127 ||event.charCode==8"/>
                                <label id="mother_mobile_no_error_msg"></label>
                            </div>
                            <div class="col-md-3 form-group" id="mother_email_id_box">
                                <label>Mother Email Id</label>
                                <input type="text" name="mother_email_id" id="mother_email_id" class="form-control"/>
                                <label id="mother_email_id_error_msg"><label>
                            </div>
                            <div class="col-md-3 form-group" id="mother_education_id_box">
                                <label>Mother Educational</label>
                                <select name="mother_education_id" id="mother_education_id" class="form-control">
                                    <option value="0">--Select--</option>
                                    {if isset($education_type_list) && !empty($education_type_list)}
                                        {foreach $education_type_list as $edu}
                                            <option value="{$edu['education_type_id']}">{$edu['education_type']}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                                <label id="mother_education_id_error_msg"><label>
                            </div>
                            <div class="col-md-3 form-group" id="mother_occupation_id_box">
                                <label>Mother Occupation</label>
                                <select name="mother_occupation_id" id="mother_occupation_id" class="form-control">
                                    <option value="0">--Select--</option>
                                    {if isset($mother_occupation_type_list) && !empty($mother_occupation_type_list)}
                                        {foreach $mother_occupation_type_list as $mot}
                                            <option value="{$mot['occupation_type_id']}">{$mot['occupation_type']}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                                <label id="mother_occupation_id_error_msg"><label>
                            </div>
                        </fieldset>
                        <fieldset class="custom-border when_enter_mobile_show">
                            <legend class="custom-border">Follow-up Information</legend>
                            <div class="col-md-4 form-group" id="class_id_box">
                                <label>Select Class<span class="text-red">*</span></label>
                                <select name="class_id" id="class_id" class="form-control">
                                    <option value="0">--Select--</option>
                                    {if isset($class_list) && !empty($class_list)}
                                        {foreach $class_list as $cl}
                                            <option value="{$cl['class_id']}">{$cl['class_name']}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                                <label id="class_id_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="follow_up_status_id_box">
                                <label>Follow-up Status<span class="text-red">*</span></label>
                                <select name="follow_up_status_id" id="follow_up_status_id" class="form-control">
                                    <option value="0">--Select--</option>
                                    {if isset($followup_status_list) && !empty($followup_status_list)}
                                        {foreach $followup_status_list as $fsl}
                                            <option value="{$fsl['follow_up_status_id']}">{$fsl['follow_up_status']}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                                <label id="follow_up_status_id_error_msg"></label>
                            </div>
                            <div class="col-md-4 form-group" id="follow_up_date_time_box">
                                <label>Follow-up Date Time<span class="text-red">*</span></label>
                                <input type="text" name="follow_up_date_time" id="follow_up_date_time" class="form-control"/>
                                <label id="follow_up_date_time_error_msg"></label>
                            </div>
                            <div class="col-md-12 form-group" id="media_type_id_box">
                                <label>How did you come to know about {userdata('SchoolName')}?<span class="text-red">*</span></label>
                                <div class="custom-radio-box">
                                    {if isset($media_type_list) && !empty($media_type_list)}
                                        {foreach $media_type_list as $mt}
                                            <input type="radio" name="media_type" id="media_type_{$mt['media_type_id']}" value="{$mt['media_type_id']}" class="custom-radio-btn"/> <label for="media_type_{$mt['media_type_id']}">{$mt['media_type']}</label>
                                        {/foreach}
                                    {/if}
                                </div>
                                <label id="media_type_id_error_msg"></label>
                            </div>
                            <div class="col-md-12 form-group" id="comment_box">
                                <label>Comment</label>
                                <textarea class="form-control" id="comment" name="comment"></textarea>
                                <label id="comment_error_msg"></label>
                            </div>
                        </fieldset>
                        <div class="col-md-12 text-center when_enter_mobile_show">
                            <input type="hidden" name="enquiry_id" id="enquiry_id" value="0"/>
                            <button class="btn btn-success" id="save">Save</button>
                            <button class="btn btn-danger" id="cancel">Cancel</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
{include file='footer.tpl'}
{js('common.js')}
<script>
    $(document).ready(function(){
        $('.when_enter_mobile_show').hide();
        $('.when_enter_mobile_success').show();
        var child_state_box = $('#child_state_id').select2({
            width:'100%'
        });
        var child_city_box = $('#child_city_id').select2({
            width:'100%'
        });
        var father_education_box = $('#father_education_id').select2({
            width:'100%'
        });
        var father_occupation_box = $('#father_occupation_id').select2({
            width:'100%'
        });
        var mother_education_box = $('#mother_education_id').select2({
            width:'100%'
        });
        var mother_occupation_box = $('#mother_occupation_id').select2({
            width:'100%'
        });
        var class_box = $('#class_id').select2({
            width:'100%'
        });
        var class_box = $('#class_id').select2({
            width:'100%'
        });
        var follow_up_status_box = $('#follow_up_status_id').select2({
            width:'100%'
        });
        $('#enquiry_date').datepicker({

        });
        $('#child_dob').datepicker({

        });
        $('#sibling_dob').datepicker({

        });
        $('#follow_up_date_time').datetimepicker({
            useCurrent: false
        });
        $(window).load(function(){
            var control = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date() / 1000),
                version : {$smarty.const.API_VERSION}
            };
            var data = {
                is_active : 1
            };
            var request = {
                control : control,
                data : data
            };
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
                $('#child_state_id').children().remove();
                $('#child_state_id').append("<option value='0'>--Select State--</option>");
                $.each(response.data,function(k,v){
                    $('#child_state_id').append("<option value='"+v.state_id+"' data-sc='"+v.state_code+"'>"+v.state_name+"</option>");
                });
            }).fail(function(response) {
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
                
            });
        });
        $(document).on('change','#child_state_id',function(){
            var state_id = $(this).val();
            var state_code = $('#state_id option:selected').data('sc');
            $("#state_code").val(state_code);
            var control = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date() / 1000),
                version : {$smarty.const.API_VERSION}
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
                $('#child_city_id').children().remove();
                $('#child_city_id').append("<option value='0'>--Select City--</option>");
                $.each(response.data,function(k,v){
                    $('#child_city_id').append("<option value='"+v.city_id+"'>"+v.city_name+"</option>");
                });
                $('#child_city_id').trigger('change');
            }).fail(function(response) {
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
                
            });
        });
        $(document).on('keydown','#mobile_no',function(e){
            if (e.keyCode == 27) {
                $('#mobile_no').val('');
            }
            if (e.keyCode == 13) {
                $('#search').trigger('click');
            }
        });
        $(document).on('click','#search',function(){
            var mobile_no = $.trim($('#mobile_no').val());
            if(checkBlank('mobile_no_box','mobile_no_error_msg','Required!', mobile_no, 'mobile_no', '')){
                return false;
            }
            if(mobile_no.length != 10){
                if(checkBlank('mobile_no_box','mobile_no_error_msg','Enter valid mobile no!', mobile_no.length, 'mobile_no', mobile_no.length)){
                    return false;
                }   
            }
            var control = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date() / 1000),
                version : {$smarty.const.API_VERSION}
            };
            var data = {
                mobile_no : mobile_no,
                branch_id : {userdata('BranchId')},
                school_id : {userdata('SchoolId')}
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = '{$smarty.const.API_URL}enquiry/get';
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
                $('.when_enter_mobile_show').show();
                $('.when_enter_mobile_success').hide();
                $('#father_mobile_no').val(mobile_no);
            }).fail(function(response) {
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
                
            });
        });
        $(document).on('click','#save',function(){
            var enquiry_id = $('#enquiry_id').val();
            var enquiry_date = $('#enquiry_date').val();
            var child_first_name = $('#child_first_name').val();
            var child_middel_name = $('#child_middel_name').val();
            var child_last_name = $('#child_last_name').val();
            var gender = $('input[name=child_gender]:checked').val();
            var child_dob = $('#child_dob').val();
            var child_age = $('#child_age').val();
            var sibling = 0;
            if($('#sibling').is(':checked')){
                sibling = 1;
            }
            var sibling_dob = $('#sibling_dob').val();
            var child_add_line_1 = $('#child_add_line_1').val();
            var child_add_line_2 = $('#child_add_line_2').val();
            var child_state_id = $('#child_state_id').val();
            var child_city_id = $('#child_city_id').val();
            var child_pincode = $('#child_pincode').val();
            var father_first_name = $('#father_first_name').val();
            var father_middel_name = $('#father_middel_name').val();
            var father_last_name = $('#father_last_name').val();
            var father_mobile_no = $('#father_mobile_no').val();
            var father_email_id = $('#father_email_id').val();
            var father_education_id = $('#father_education_id').val();
            var father_occupation_id = $('#father_occupation_id').val();
            var mother_first_name = $('#mother_first_name').val();
            var mother_middel_name = $('#mother_middel_name').val();
            var mother_last_name = $('#mother_last_name').val();
            var mother_mobile_no = $('#mother_mobile_no').val();
            var mother_email_id = $('#mother_email_id').val();
            var mother_education_id = $('#mother_education_id').val();
            var mother_occupation_id = $('#mother_occupation_id').val();
            var class_id = $('#class_id').val();
            var follow_up_status_id = $('#follow_up_status_id').val();
            var follow_up_date_time = $('#follow_up_date_time').val();
            var media_type = $('input[name=media_type]:checked').val();
            var comment = $('#comment').val();
            if(checkBlank('enquiry_date_box','enquiry_date_error_msg','Required!', enquiry_date, 'enquiry_date', '')){
                return false;
            }
            if(checkBlank('child_first_name_box','child_first_name_error_msg','Required!', child_first_name, 'child_first_name', '')){
                return false;
            }
            if(checkBlank('father_mobile_no_box','father_mobile_no_error_msg','Required!', father_mobile_no, 'father_mobile_no', '')){
                return false;
            }
            if(checkBlank('class_id_box','class_id_error_msg','Required!',class_id,'class_id','0')){
                return false;
            }
            if(checkBlank('follow_up_status_id_box','follow_up_status_id_error_msg','Required!',follow_up_status_id,'follow_up_status_id','0')){
                return false;
            }
            if(follow_up_status_id != 6){
                if(checkBlank('follow_up_date_time_box','follow_up_date_time_error_msg','Required!',follow_up_date_time,'follow_up_date_time','')){
                    return false;
                }
            }
            if (typeof media_type === "undefined") {
                media_type = '';
            }
            if(checkBlank('media_type_id_box','media_type_id_error_msg','Required!',media_type,'media_type_1','')){
                return false;
            }
            var control = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date() / 1000),
                version : {$smarty.const.API_VERSION}
            };
            var data = {
                branch_id : {userdata("BranchId")},
                enquiry_id : enquiry_id,
                enquiry_date : enquiry_date,
                child_first_name : child_first_name,
                child_middel_name : child_middel_name,
                child_last_name : child_last_name,
                gender : gender,
                child_dob : child_dob,
                child_age : child_age,
                sibling : sibling,
                sibling_dob : sibling_dob,
                child_add_line_1 : child_add_line_1,
                child_add_line_2 : child_add_line_2,
                child_state_id : child_state_id,
                child_city_id : child_city_id,
                child_pincode : child_pincode,
                father_first_name : father_first_name,
                father_middel_name : father_middel_name,
                father_last_name : father_last_name,
                father_mobile_no : father_mobile_no,
                father_email_id : father_email_id,
                father_education_id : father_education_id,
                father_occupation_id : father_occupation_id,
                mother_first_name : mother_first_name,
                mother_middel_name : mother_middel_name,
                mother_last_name : mother_last_name,
                mother_mobile_no : mother_mobile_no,
                mother_email_id : mother_email_id,
                mother_education_id : mother_education_id,
                mother_occupation_id : mother_occupation_id,
                class_id : class_id,
                follow_up_status_id : follow_up_status_id,
                follow_up_date_time : follow_up_date_time,
                media_type : media_type,
                comment : comment
            };
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}enquiry/add";
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
                location.reload(true);
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