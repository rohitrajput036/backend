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
            Class Branch
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Class</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-1">
                                <button id="add_class" class="btn btn-primary" style="margin-top:20px">Add class</button>
                            </div>
                        </div>
                        <div class="col-md-12 form-group has-error text-center">
                            <label id="api_error"></label> 
                        </div>
                        <table class="table table-bordered" id="DataTable">
                            <thead>
                                <tr>
                                    <th style="width:10%">S NO</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Subject</th>
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
    <div class="modal fade" id="add_edit_class">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="add_edit_class_title">Add Class</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-14">
                        <div class="col-md-4 form-group" id="class_name_box">
                            <label>Class <span class="text-red">*</span></label>
                            <input type="text" name="class_name" id="class_name" class="form-control"/>
                            <label for="class_name" id="class_name_error_msg"></label>
                        </div>
                        <div class="col-md-4 form-group" id="section_name_box">
                            <label>Section <span class="text-red">*</span></label>
                            <input type="text" name="section_name" id="section_name" class="form-control"/>
                            <label for="section_name" id="section_name_error_msg"></label>
                        </div>
                        <div class="col-md-4 form-group" id="with_subject_box">
                            <label>Subject <span class="text-red">*</span></label>
                            <Select name="with_subject" id="with_subject" class="form-control">
                                <option value="select">Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">NO</option>
                            </select>
                            <label for="with_subject" id="with_subject_error_msg"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="cancel" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <button id="save" class="btn btn-success">save</button>
                    <input type="hidden" name="class_id" id="class_id" value="0"/>
                </div>
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div>
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
                school_id : '{userdata('SchoolId')}',
                for_table : true
            };
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}class_managment/get";
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
                $('#class_id').val(0);
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
        $('#add_edit_class').modal('hide');
            $(document).on('click','#add_class',function(){
                $('#add_edit_class').modal('show');
            });
        $(document).on('click', '#save', function(){
            var class_id = $('#class_id').val();
            var class_name = $.trim($('#class_name').val());
            var section_name = $.trim($('#section_name').val());
            var with_subject = $.trim($('#with_subject').val());
            if(checkBlank('class_name_box','class_name_error_msg','Required..', class_name, 'class_name', '')){
                return false;
            }
            if(checkBlank('section_name_box','section_name_error_msg','Required..', section_name, 'section_name', '')){
                return false;
            }
            if(checkBlank('with_subject_box','with_subject_error_msg','Required..', with_subject, 'with_subject', '')){
                return false;
            }
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                class_id     :  class_id,
                class_name   :  class_name,
                section_name :  section_name,
                with_subject :  with_subject,
                school_id    :  '{userdata('SchoolId')}',
                login_id     : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}class_managment/add";
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
                $('#class_id').val(0);
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
            var class_id = $(this).data('class_id');
            var is_active = $(this).data('at');
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                class_id : class_id,
                is_active : is_active,
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}class_managment/delete";
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
                $('#class_id').val(0);
                $(window).trigger('load');
            }).fail(function(response) {
                $("#animatedLoader").hide();
                if (response.responseJSON.control) {
                    $('#api_error').text(response.responseJSON.control.message);
                }
            }).always(function() {
            });
        });
        $(document).on('click','#cancel',function(){

        });
       
    });

</script>