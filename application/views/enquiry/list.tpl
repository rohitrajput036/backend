{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<!-- Right side column. Contains the navbar and content of the page -->
<style>
.detail_table>tbody>tr>td, 
.detail_table>tbody>tr>th, 
.detail_table>tfoot>tr>td, 
.detail_table>tfoot>tr>th, 
.detail_table>thead>tr>td, 
.detail_table>thead>tr>th{
    padding : 2px !important;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {$enquiry_type}
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{$enquiry_type}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">

                        <table class="table table-bordered" id="DataTable">
                            <thead>
                                <tr>
                                    <th style="width:5%">S.No.</th>
                                    <th>Enquiry Date</th>
                                    <th>Form Id</th>
                                    <th>Child name</th>
                                    <th>Parents Email</th>
                                    <th>City</th>
                                    <th>Follow-Up Status</th>
                                    <th>Next Follow-Up Date Time</th>
                                    <th style="width:15%">Action</th>
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
<div class="modal fade" id="view_update_enquiry" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="enquiry_modal_title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered detail_table">
                <tr>
                    <td><b>Enquiry Date :</b> <span id="enquiry_date"></span></td>
                    <td colspan="2"><b>Form No :</b> <span id="form_id"></span></td>
                </tr>
                <tr>
                    <td><b>Child First Name :</b> <span id="child_first_name"></span></td>
                    <td><b>Child Middel Name :</b> <span id="child_middel_name"></span></td>
                    <td><b>Child Last Name :</b> <span id="child_last_name"></span></td>
                </tr>
                <tr>
                    <td><b>Father Name :</b> <span id="father_name"></span></td>
                    <td><b>Father Email Id :</b> <span id="father_email_id"></span></td>
                    <td><b>Father Mobile No :</b> <span id="father_mobile_no"></span></td>
                </tr>
                <tr>
                    <td><b>Mother Name :</b> <span id="mother_name"></span></td>
                    <td><b>Mother Email Id :</b> <span id="mother_email_id"></span></td>
                    <td><b>Mother Mobile No :</b> <span id="mother_mobile_no"></span></td>
                </tr>
                <tr>
                    <td><b>Address  :</b> <span id="address"></span></td>
                    <td><b>City/State :</b> <span id="city_state"></span></td>
                    <td><b>Pincode :</b> <span id="pincode"></span></td>
                </tr>
                <tr>
                    <td><b>Follow-Up Status :</b> <span id="follow_up_status"></span></td>
                    <td colspan="2"><b>Next Follow-Up Datetime :</b> <span id="next_follow_up_date"></span></td>
                </tr>
            </table>
            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="box box-primary direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Follow-Up History</h3>
                    </div>
                    <!-- /.box-header -->            
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-md-2 form-group" id="current_follow_up_status_id_box">
                            <select id="current_follow_up_status_id" class="form-control">
                                <option value="0">--Select--</option>
                                {if isset($followup_status_list) && !empty($followup_status_list)}
                                    {foreach $followup_status_list as $fsl}
                                        <option value="{$fsl['follow_up_status_id']}">{$fsl['follow_up_status']}</option>
                                    {/foreach}
                                {/if}
                            </select>
                            <label id="current_follow_up_status_id_error_msg"></label>
                        </div>
                        <div class="col-md-6 form-group" id="message_box">
                            <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control"/>
                            <label id="message_error_msg"></label>
                        </div>
                        <div class="col-md-4 form-group" id="next_followup_date_box">
                            <div class="input-group">
                                <input type="text" name="next_followup_date" id="next_followup_date" placeholder="Next Followup Date" class="form-control"/>
                                <span class="input-group-btn">
                                <input type="hidden" name="followup_enquiry_id" id="followup_enquiry_id" value="0"/>
                                <button id="save_follow_up" class="btn btn-primary btn-flat">Save</button>
                            </span>
                        </div>
                        <label id="next_followup_date_error_msg"></label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" id="follow_up_history_view">
                    </div>
                    <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-footer-->
                </div>
                
            </div>
            <!--/.direct-chat -->
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {* <button type="button" class="btn btn-primary">Save</button> *}
    </div>
    </div>
    </div>
</div>
</div><!-- ./wrapper -->
{include file='footer.tpl'}
{js('common.js')}
<script>
    $(document).ready(function(){
        $('#view_update_enquiry').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#view_update_enquiry').modal('hide');
        $('#next_followup_date').datetimepicker({
            useCurrent: false
        });
        var follow_up_status_id = $('#current_follow_up_status_id').select2({
            width:'100%'
        });
        var DataTable = $('#DataTable').DataTable({
            searching:true,
            ordering:false
        });
        $(window).load(function(){
            var control = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date() / 1000),
                version : {$smarty.const.API_VERSION}
            };
            //follow_up_status_id
            {if $enquiry_type == 'All Enquiry'}
                var data = {
                    branch_id : {userdata('BranchId')},
                    school_id : {userdata('SchoolId')},
                    for_table : true
                };
            {else}
                var data = {
                    branch_id : {userdata('BranchId')},
                    school_id : {userdata('SchoolId')},
                    follow_up_status_id : {$follow_up_status_id},
                    for_table : true
                };
            {/if}
            
            var request = {
                control : control,
                data : data
            };
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
                DataTable.clear().draw();
                DataTable.rows.add(response.data).draw();
            }).fail(function(response) {
                $("#animatedLoader").hide();
                DataTable.clear().draw();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
                
            });
        });
        $(document).on('click','.view_enquiry',function(){
            var enquiry_id = $(this).data('enquiry_id');
            var control = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date() / 1000),
                version : {$smarty.const.API_VERSION}
            };

            var data ={
                enquiry_id :enquiry_id,
                branch_id : {userdata('BranchId')},
            };
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}enquiry/get";
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
                $('#followup_enquiry_id').val(response.data[0].enquiry_id);
                $("#enquiry_date").html(response.data[0].display_enquiry_date);
                $("#form_id").html(response.data[0].form_id);
                $("#child_first_name").html(response.data[0].first_name);
                $("#child_middel_name").html(response.data[0].middel_name);
                $("#child_last_name").html(response.data[0].last_name);
                $("#father_name").html(response.data[0].father_first_name);
                $("#father_email_id").html(response.data[0].father_email_id);
                $("#father_mobile_no").html(response.data[0].father_mobile_no);
                $("#mother_name").html(response.data[0].mother_first_name);
                $("#mother_email_id").html(response.data[0].mother_email_id);
                $("#mother_mobile_no").html(response.data[0].mother_mobile_no);
                $("#address").html(response.data[0].add_line_2);
                $("#city_state").html(response.data[0].city_name+' / '+response.data[0].state_name);
                $("#pincode").html(response.data[0].pincode);
                $("#follow_up_status").html(response.data[0].follow_up_status);
                $("#next_follow_up_date").html(response.data[0].display_follow_up_date);
                var follow_up_history_html = '';
                var i=0;
                $.each(response.data[0].follow_up_history,function(k,v){
                    i++;
                    if(v.called_user_id == {userdata('UserId')}){
                        follow_up_history_html += '<div class="direct-chat-msg right" id="last_follow_up_remark_'+i+'">';
                    }else{
                        follow_up_history_html += '<div class="direct-chat-msg" id="last_follow_up_remark_'+i+'">';
                    }
                    follow_up_history_html += '<div class="direct-chat-info clearfix">';
                    follow_up_history_html += '<span class="direct-chat-name pull-left">'+v.called_user_name+'</span>';
                    follow_up_history_html += '<span class="direct-chat-timestamp pull-right">'+v.display_called_time+'</span>';
                    follow_up_history_html += '</div>';
                    follow_up_history_html += '<div class="direct-chat-img" style="border:1px solid #ccc; font-weight: bold; text-align:center; vertical-align: middle; background-color:#3c8dbc; color:white">';
                    follow_up_history_html += '<h4>'+v.first_later+'</h4>';
                    follow_up_history_html += '</div>';
                    follow_up_history_html += '<div class="direct-chat-text">';
                    follow_up_history_html += '<span style="font-weight:;">'+v.follow_up_status+'</span> (';
                    follow_up_history_html += v.remarks+')';
                    follow_up_history_html +='</div>';
                    follow_up_history_html +='</div>';
                });
                $('#follow_up_history_view').html(follow_up_history_html);
                $('#last_follow_up_remark_'+i).focus();
                $('#current_follow_up_status_id').val(0).trigger('change');
                $('#message').val('');
                $('#next_followup_date').val('');
                $('#view_update_enquiry').modal('show');
                $("#animatedLoader").hide();
            }).fail(function(response) {
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
                
            });
        });
        $(document).on('click','#save_follow_up',function(){
            var enquiry_id = $('#followup_enquiry_id').val();
            var follow_up_status_id = $('#current_follow_up_status_id').val();
            var follow_up_remarks = $('#message').val();
            var follow_up_date = $('#next_followup_date').val();
            if(checkBlank('current_follow_up_status_id_box','current_follow_up_status_id_error_msg','Required!', follow_up_status_id, 'current_follow_up_status_id', '0')){
                return false;
            }
            if(checkBlank('message_box','message_error_msg','Required!', follow_up_remarks, 'message', '')){
                return false;
            }
            if(follow_up_status_id != 6){
                if(checkBlank('next_followup_date_box','next_followup_date_error_msg','Required!', follow_up_date, 'next_followup_date', '')){
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
                enquiry_id : enquiry_id,
                follow_up_status_id : follow_up_status_id,
                remarks : follow_up_remarks,
                follow_up_date : follow_up_date,
                login_id : {userdata('UserId')}
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}enquiry/add_followup";
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
                    $('#save_follow_up').prop('disabled',true);
                }
            }).done(function(response) {
                $('#save_follow_up').prop('disabled',false);
                $(window).trigger('load');
                $('#view_update_enquiry').modal('hide');
                $('#view_enquiry_'+enquiry_id).click();
            }).fail(function(response) {
                $('#save_follow_up').prop('disabled',true);
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
                
            });
        });
    });
</script>