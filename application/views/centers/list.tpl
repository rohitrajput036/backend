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
            Branch
            <small>All Branch</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Branch</a></li>
            <li class="active">All Branch</li>
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
                                    <th style="width:7%">S NO</th>
                                    <th>Center Name</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Login Id</th>
                                    <th style="width:10%;">Password</th>
                                    <th style="width:15%;">#</th>
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
            searching:true
        });
        $(window).load(function(){
            var control = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date() / 1000),
                cersion : 1.0
            };
            var data = {
                for_table : true
            };
            var request = {
                control : control,
                data : data
            }
            request = JSON.stringify(request);
            var url = "{$smarty.const.API_URL}branch/get";
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
    });
</script>
