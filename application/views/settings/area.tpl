{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Area
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Area</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <div class="form-group" id="area_box">
                                    <label>Area Name <span class="text-red">*</span></label>
                                    <input type="text" name="area_name" id="area_name" class="form-control" placeholder="Write Your area name."/>
                                    <label id="area_error_msg"></label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" id="city_box">
                                    <label>City Name <span class="text-red">*</span></label>
                                    <select name="city_id" id="city_id" class="form-control">
                                        <option value="0">--select--</option>
                                    </select>
                                    <label id="area_error_msg"></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <input type="hidden" name="area_master_id" id="area_master_id" value="0"/>
                                <button id="save" class="btn btn-primary" style="margin-top:20px">Save</button>
                            </div>
                        </div>
                        <div class="col-md-12 form-group has-error text-center">
                            <label id="api_error"></label> 
                        </div>
                        <table class="table table-bordered" id="DataTable">
                            <thead>
                                <tr>
                                    <th style="width:10%">S NO</th>
                                    <th>Area Name</th>
                                    <th>City Name</th>
                                    <th style="width:15%">#</th>
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
        
        $(window).load(function(){
            var control  = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date()/1000)
            }
            var data = {
                for_table : true
            }
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