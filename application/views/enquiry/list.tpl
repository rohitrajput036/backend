{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All enquiry
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Enquiry list</li>
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
        <table class="table table-bordered">
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
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                {for $sn=1 to 5}
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">{userdata('UserName')}</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    {image('dist/avatar.png',['class'=>'direct-chat-img', 'alt'=>'user image'])}
                    <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                    </div>
                    <!-- /.direct-chat-text -->
                    </div>
                <!-- /.direct-chat-msg -->
                {/for}
                

              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="col-md-3">
                    <select class="form-control">
                        <option value="0">--Select--</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-flat">Send</button>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-flat">Send</button>
                        </span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /.box-footer-->
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
        $('#view_update_enquiry').modal('hide');
        var DataTable = $('#DataTable').DataTable({
            searching:true,
            ordering:false
        });
        $(window).load(function(){
            $('#view_update_enquiry').modal('show');
            var control = {
                request_id : generateUUId(),
                source : 1,
                request_time : Math.round(+new Date() / 1000),
                version : {$smarty.const.API_VERSION}
            };
            var data = {
                branch_id : {userdata('BranchId')},
                school_id : {userdata('SchoolId')},
                for_table : true
            };
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
    });
</script>