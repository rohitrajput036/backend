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
            User
            {* <small>All Branch</small> *}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-2 form-group" id="unique_no_box">
                            <label>Unique No<span class="text-red">*</span></label>
                            <input type="text" name="unique_no" id="unique_no" class="form-control"/>
                            <label id="unique_no_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="first_name_box">
                            <label>First Name<span class="text-red">*</span></label>
                            <input type="text" name="first_name" id="first_name" class="form-control"/>
                            <label id="first_name_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="middel_name_box">
                            <label>Middel Name</label>
                            <input type="text" name="middel_name" id="middel_name" class="form-control"/>
                            <label id="middel_name_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="last_name_box">
                            <label>Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control"/>
                            <label id="last_name_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="display_name_box">
                            <label>Display Name</label>
                            <input type="text" name="display_name" id="display_name" class="form-control"/>
                            <label id="display_name_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="dob_box">
                            <label>Date of birth<span class="text-red">*</span></label>
                            <input type="date" name="dob" id="dob" class="form-control"/>
                            <label id="dob_error_msg"></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="col-md-3 form-group" id="gender_box">
                                    <label>Gender<span class="text-red">*</span></label>
                                    <div class="form-control" style="text-align: center;">
                                        <input type="radio" name="gender" id="gender_m" value="M" checked="true"/> <label for="gender_m">Male</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="gender" id="gender_f" value="F"/> <label for="gender_f">Female</label>
                                    </div>
                                    <label id="gender_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="mobile_no_box">
                                    <label>Mobile No<span class="text-red">*</span></label>
                                    <input type="text" name="mobile_no" id="mobile_no" class="form-control"/>
                                    <label id="mobile_no_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="alt_mobile_no_box">
                                    <label>Alt Mobile No</label>
                                    <input type="text" name="alt_mobile_no" id="alt_mobile_no" class="form-control"/>
                                    <label id="alt_mobile_no_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="email_id_box">
                                    <label>Email Id(<i>Login Id</i>)<span class="text-red">*</span></label>
                                    <input type="text" name="email_id" id="email_id" class="form-control"/>
                                    <label id="email_id_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="password_box">
                                    <label>Password<span class="text-red">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control"/>
                                    <label id="password_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="alt_email_id_box">
                                    <label>Alt Email Id</label>
                                    <input type="text" name="alt_email_id" id="alt_email_id" class="form-control"/>
                                    <label id="alt_email_id_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="add_line_1_box">
                                    <label>Address Line 1<span class="text-red">*</span></label>
                                    <input type="text" name="add_line_1" id="add_line_1" class="form-control"/>
                                    <label id="add_line_1_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="add_line_2_box">
                                    <label>Address Line 2</label>
                                    <input type="text" name="add_line_2" id="add_line_2" class="form-control"/>
                                    <label id="add_line_2_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="state_id_box">
                                    <label>State<span class="text-red">*</span></label>
                                    <select class="form-control" name="state_id" id="state_id">
                                        <option value="0">--Select State--</option>
                                    </select>
                                    <label id="state_id_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="city_id_box">
                                    <label>City<span class="text-red">*</span></label>
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option value="0">--Select City--</option>
                                    </select>
                                    <label id="city_id_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="pincode_box">
                                    <label>Pincode<span class="text-red">*</span></label>
                                    <input type="text" name="pincode" id="pincode" class="form-control"/>
                                    <label id="pincode_error_msg"></label>
                                </div>
                                <div class="col-md-3 form-group" id="doj_box">
                                    <label>Date of Joining<span class="text-red">*</span></label>
                                    <input type="date" name="doj" id="doj" class="form-control"/>
                                    <label id="doj_error_msg"></label>
                                </div>
                                <div class="col-md-12 form-group" id="comment_box">
                                    <label>Any comment?</label>
                                    <textarea class="form-control" name="comment" id="comment"></textarea>
                                    <label id="comment_error_msg"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Select Role<span class="text-red">*</span></label>
                                    <ul style="list-style-type:none">
                                        {foreach $role_list as $role}
                                            <li>
                                                <input type="radio" name="role_type" id="role_type_{$role['role_id']}" value="{$role['role_id']}"/> 
                                                <label for="role_type_{$role['role_id']}">{$role['role']}</label>
                                            </li>    
                                        {/foreach}
                                        
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label>Select Department<span class="text-red">*</span></label>
                                    <ul style="list-style-type:none">
                                        {if !empty($department_list)}
                                            {foreach $department_list as $departent}
                                                <li>
                                                    <input type="checkbox" name="department_type" id="department_type_{$departent['department_id']}" value="{$departent['department_id']}"/> 
                                                    <label for="department_type_{$departent['department_id']}">{$departent['department']}</label>
                                                </li>
                                            {/foreach}
                                        {/if}
                                        
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary" id="save">Save</button>
                            <button class="btn btn-danger" id="reset">Reset</button>
                        </div>
                        <div class="clearfix"></div>
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
        
    });
</script>