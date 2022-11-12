{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ADD Teacher
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">teacher</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <div class="form-group" id="teacher-box">
                                    <label>Teacher Name<span class="text-red">*</span></label>
                                    <input type="text" name="teacher_name" id="teacher_name" class="form-control" placeholder="Write Your name.">
                                    <label id="teacher_error_msg"></label>
                                </div>
                            </div>
                            <div class="col-md-2 form-group" id="class_teacher_box">
                                <label>Class Teacher</label>
                                    <Select name="class_teacher" id="class_teacher" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                <label for="with_subject" id="with_subject_error_msg"></label>
                            </div>
                            <div class="col-md-2 form-group" id="class_box">
                                <label>Class</label>
                                    <Select name="class_id" id="class_id" class="form-control">
                                        <option value="0">--Select--</option>
                                    </select>
                                <label for="with_subject" id="with_subject_error_msg"></label>
                            </div>
                            <div class="col-md-1">
                                <input type="hidden" name="teacher_id" id="teacher_id" value="0"/>
                                <button id="save" class="btn btn-primary" style="margin-top:20px">Save</button>
                            </div>
                        </div>
                        <div class="col-md-12 form-group has-error text-center">
                            <label id="api_error"></label> 
                        </div>
                        <table class="table table-bordered" id="DataTable">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Teacher Name</th>
                                    <th>Class Teacher</th>
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
    });
</script>