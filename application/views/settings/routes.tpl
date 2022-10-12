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
            Routes
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Routes</li>
        </ol>
    </section>
        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#manage_routes">Manage routes</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#manage_vehicle">Manage Vehicle</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#manage_driver">Manage Driver/Guard</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade">
                                <h3>HOME</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div id="manage_routes" class="tab-pane fade">
                                <div class="col-md-4">
                                    <div class="col-md-12 form-group has-error text-center">
                                        <label id="api_error"></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 form-group" id="routes_name_box">
                                            <label>Route Name<span class="text-red">*</span></label>
                                            <input type="text" name="route_name" id="route_name" class="form-control" placeholder="Enter Route name"/>
                                            <input type="hidden" name="route_id" id="route_id" value="0"/>
                                            <label id="route_error_msg"></label>
                                        </div>
                                        <div class="col-md-4">
                                            <button id="add_route" class="btn btn-primary" style="margin-top:20px">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-bordered" id="DataTable">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Route Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody> 
                                    </table>
                                
                                </div>
                            </div>
                            <div id="manage_vehicle" class="tab-pane fade"><br>
                                <div class="col-md-6">
                                    <div class="col-md-12 form-group has-error text-center">
                                        <label id="api_error"></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group" id="vehicle_no_box">
                                            <label>Vehicle NO.<span class="text-red">*</span></label>
                                            <input type="text" name="vehicle_no" id="vehicle_no" class="form-control" placeholder="Enter vehicle no."/>
                                            <label for="vehicle_no" id="vehicle_no_error_msg"></label>
                                        </div>
                                        <div class="col-md-6 form-group" id="vehicle_name_box">
                                            <label>Vehicle Name<span class="text-red">*</span></label>
                                            <input type="text" name="vehicle_name" id="vehicle_name" class="form-control" placeholder="Write your vehicle model"/>
                                            <label for="vehicle_name" id="vehicle_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-6 form-group" id="vehicle_color_box">
                                            <label>Vehicle Colour</label>
                                            <input type="text" name="vehicle_color" id="vehicle_color" class="form-control" placeholder="Vehicle colour name"/>
                                            <label for="vehicle_color" id="vehicle_color_error_msg"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <button id="add_vehicle" class="btn btn-primary" style="margin-top:20px">Save</button>
                                            <input type="hidden" name="vehicle_id" id="vehicle_id" value="0"/>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered" id="DataTable">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>vehicle No</th>
                                                <th>vehicle Name</th>
                                                <th>vehicle Colour</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody> 
                                    </table>    
                                </div>
                            </div>
                            <div id="manage_driver" class="tab-pane active"><br>
                                <div class="col-md-12">
                                    <div class="col-md-12 form-group has-error text-center">
                                        <label id="api_error"></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" id="first_name_box">
                                            <label>First Name<span class="text-red">*</span></label>
                                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter your first name"/>
                                            <label for="first_name" id="first_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-4 form-group" id="middle_name_box">
                                            <label>Middle Name</label>
                                            <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Enter your middle name"/>
                                            <label for="middle_name" id="middle_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-4 form-group" id="last_name_box">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter your last name"/>
                                            <label for="last_name" id="last_name_error_msg"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 form-group" id="gender_box">
                                            <label>Gender</label>
                                            <Select name="gender" id="gender" class="form-control">
                                                <option value="male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <label for="gender" id="gender_error_msg"></label>
                                        </div>
                                        <div class="col-md-5 form-group" id="address_line_box">
                                            <label>Address Line 1<span class="text-red">*</span></label>
                                            <input type="text" name="address_line" id="address_line" class="form-control" placeholder="Enter your address"/>
                                            <label for="address_line" id="address_line_error_msg"></label>
                                        </div>
                                        <div class="col-md-5 form-group" id="address_line2_box">
                                            <label>Address Line 2<span class="text-red">*</span></label>
                                            <input type="text" name="address_line2" id="address_line2" class="form-control" placeholder="Enter your address"/>
                                            <label for="address_line2" id="address_line2_error_msg"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 form-group" id="contact_no_box">
                                            <label>Contact Number<span class="text-red">*</span></label>
                                            <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Enter your number"/>
                                            <label for="contact_no" id="contact_no_error_msg"></label>
                                        </div>
                                        <div class="col-md-3 form-group" id="alt_contact_no_box">
                                            <label>Alt. Contact Number</label>
                                            <input type="text" name="alt_contact_no" id="alt_contact_no" class="form-control" placeholder="Enter your number"/>
                                            <label for="alt_contact_no" id="alt_contact_no_error_msg"></label>
                                        </div>
                                        
                                        <div class="col-md-2 form-group" id="state_id_box">
                                            <label>State<span class="text-red">*</span></label>
                                            <select name="state_id" id="state_id" class="form-control">
                                                <option value="0">--Select State--</option>
                                            </select>
                                            <label for="state_id" id="state_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="city_id_box">
                                            <label>City<span class="text-red">*</span></label>
                                            <select name="city_id" id="city_id" class="form-control">
                                                <option value="0">--Select City--</option>
                                            </select>
                                            <label for="city_id" id="city_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="pincode_box">
                                            <label>Pincode</label>
                                            <input type="text" name="pincode" id="pincode" class="form-control"/>
                                            <label for="pincode" id="pincode_error_msg"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" id="dl_no_box">
                                            <label>DL.NO<span class="text-red">*</span></label>
                                            <input type="text" name="dl_no" id="dl_no" class="form-control"/>
                                            <label for="dl_no" id="dl_no_error_msg"></label>
                                        </div>
                                        <div class="col-md-4 form-group" id="driver_type_box">
                                            <label>Type</label>
                                            <Select name="driver_type" id="driver_type" class="form-control">
                                                <option value="driver">Driver</option>
                                                <option value="guard">Guard</option>
                                            </select>
                                            <label for="driver_type" id="driver_type_error_msg"></label>
                                        </div>
                                        <div class="col-md-4">
                                            <button id="add_driver" class="btn btn-primary" style="margin-top:20px">Save</button>
                                            <input type="hidden" name="driver_id" id="driver_id" value="0"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="DataTable">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Contact Number</th>
                                                <th>Address</th>
                                                <th>City/State</th>
                                                <th>DL. No</th>
                                                <th>Type</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody> 
                                    </table>    
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div>
</div><!-- ./wrapper -->
{include file='footer.tpl'}
{js('common.js')}