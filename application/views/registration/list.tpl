{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registration
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{base_url('welcome')}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Registration</li>
            <li class="active">List</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">
                            <a href="{base_url('registration/add')}" class="btn btn-primary btn-xs pull-right">Add Registration</a>
                        </div>
                        <div style="margin-top:10px ;" class="col-md-12">
                            <table id="registration_table" class="table table-striped">
                                <thead>
                                    <th>S.No.</th>
                                    <th>Enq. Form Id</th>
                                    <th>Registration No.</th>
                                    <th>Class</th>
                                    <th>Child Info</th>
                                    <th>Father Info</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </thead>
                            </table>
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
    var login_user_id = {userdata("UserId")};
    var registration_table = $('#registration_table').DataTable({
        responsive: true,
        lengthChange: true,
        autoWidth: false,
        paging: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "{$smarty.const.API_URL}registration/get",
            type: "POST",
            dataType: "json",
            async: false,
            headers: {
                "Content-Type": "application/json"
            },
            data: function (d) {
                var control = {
                    request_id : generateUUId(),
                    source : 1,
                    request_time : Math.round(+new Date()/1000),
                    version : {$smarty.const.API_VERSION}
                }
                d.branch_id = {userdata('BranchId')};
                d.login_id = login_user_id;
                d.format = 'datatable';
                var req = {
                    control : control,
                    data : d,
                }
                return JSON.stringify(req);
            }
        }
    });
});
</script>