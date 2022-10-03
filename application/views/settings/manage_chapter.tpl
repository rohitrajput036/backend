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
            chapters
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage chapters</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-1">
                                <button id="add_chpater" class="btn btn-primary" style="margin-top:20px">Add chapter</button>
                            </div>
                        </div>
                        <div class="col-md-12 form-group has-error text-center">
                            <label id="api_error"></label> 
                        </div>
                        <table class="table table-bordered" id="DataTable">
                            <thead>
                                <tr>
                                    <th style="width:10%">S NO</th>
                                    <th>Class name</th>
                                    <th>Subject name</th>
                                    <th>Chapter name</th>
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
    <div class="modal fade" id="add_edit_chapter">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="add_edit_chapter_title">Add chapter</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-14">
                        <div class="col-md-4 form-group" id="chapter_box">
                            <label>Chapter Name <span class="text-red">*</span></label>
                            <input type="text" name="chapter_name" id="chapter_name" class="form-control" placeholder="Enter the chapter name."/>
                            <input type="hidden" name="chapter_id" id="chapter_id" value="0"/>
                            <label id="chapter_error_msg"></label>
                        </div>
                        <div class="col-md-4 form-group" id="subject_box">
                            <label>Subject <span class="text-red">*</span></label>
                            <Select name="subject_name" id="subject_name" class="form-control">
                                <option value="0">Select</option>
                            </select>
                            <label for="subject_id" id="subject_error_msg"></label>
                        </div>
                        <div class="col-md-4 form-group" id="class_box">
                            <label>Class <span class="text-red">*</span></label>
                            <Select name="class_name" id="class_name" class="form-control">
                                <option value="0">Select</option>
                            </select>
                            <label for="class_id" id="class_error_msg"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="cancel" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <button id="save" class="btn btn-success">save</button>
                    <input type="hidden" name="chapter_id" id="chapter_id" value="0"/>
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
                subject_id : '{userdata('subject_id')}',
                class_id : '{userdata('class_id')}',
                for_table : true
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}chapter/get";
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
                $('#chapter_id').val(0);
                $('#subject_id').val('');
                $('#class_id').val('');
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
        $('#add_edit_chapter').modal('hide');
            $(document).on('click','#add_chpater',function(){
                $('#add_edit_chapter').modal('show');
            });
        $(document).on('click', '#save', function(){
            var chapter_id = $('#chapter_id').val();
            var chapter_name = $.trim($('#chapter_name').val());
            var subject_name = $.trim($('#subject_name').val());
            var class_name = $.trim($('#class_name').val());
            if(checkBlank('chapter_box','chapter_error_msg','Required..', chapter_name, 'chapter_name', '')){
                return false;
            }
            if(checkBlank('subject_box','subject_error_msg','Required..', subject_name, 'subject_name', '')){
                return false;
            }
            if(checkBlank('class_box','class_error_msg','Required..', class_name, 'class_name', '')){
                return false;
            }
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                chapter_id   :  chapter_id,
                chapter_name :  chapter_name,
                subject_id   :  '{userdata('subject_id')}',
                class_id   :  '{userdata('class_id')}',
                login_id     : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}chapter/add";
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
                $('#chapter_id').val(0);
                $('#subject_id').val('');
                $('#class_id').val('');
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
            var chapter_id = $(this).data('chapter_id');
            var is_active = $(this).data('at');
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                chapter_id : chapter_id,
                is_active : is_active,
                login_id : '{userdata('UserId')}'
            }
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}chapter/delete";
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
                $('#chapter_id').val(0);
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