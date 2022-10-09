{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admission
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admission</a></li>
            <li class="active">Add</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body"> 
                        <div class="col-md-3 form-group" id="acadmic_session_id_box">
                            <label>Acadmic Session<span class="text-red">*</span></label>
                            <select name="acadmic_session_id" id="acadmic_session_id" class="form-control">
                                <option value="0">--Select--</option>
                            </select>
                            <label id="acadmic_session_id_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="enquiry_form_no_box">
                            <label>Enquiry Form Id<span class="text-red">*</span></label>
                            <input type="text" name="enquiry_form_no" id="enquiry_form_no" class="form-control"/>
                            <label id="enquiry_form_no_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="enquiry_date_box">
                            <label>Date of Enquiry<span class="text-red">*</span></label>
                            <input type="text" name="enquiry_date" id="enquiry_date" class="form-control"/>
                            <label id="enquiry_date_error_msg"></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-3 form-group" id="child_first_name_box">
                            <label>First Name<span class="text-red">*</span></label>
                            <input type="text" name="child_first_name" id="child_first_name" class="form-control"/>
                            <label id="child_first_name_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="child_middel_name_box">
                            <label>Middel Name</label>
                            <input type="text" name="child_middel_name" id="child_middel_name" class="form-control"/>
                            <label id="child_middel_name_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="child_last_name_box">
                            <label>Last Name</label>
                            <input type="text" name="child_last_name" id="child_last_name" class="form-control"/>
                            <label id="child_last_name_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="gender_box">
                            <label>Gender<span class="text-red">*</span></label>
                            <div class="form-control text-center">
                                <input type="radio" name="gender" id="gender_m" value="M"/> <label for="gender_m">Male</label>
                                &nbsp;
                                <input type="radio" name="gender" id="gender_f" value="F"/> <label for="gender_f">Female</label>
                            </div>
                            <label id="gender_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="date_of_birth_box">
                            <label>Date of Birth<span class="text-red">*</span></label>
                            <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" readonly/>
                            <label id="date_of_birth_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="age_box">
                            <label>Age<span class="text-red">*</span></label>
                            <input type="text" name="age" id="age" class="form-control"/>
                            <label id="age_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="height_box">
                            <label>Height <i>(CM)</i></label>
                            <input type="text" name="height" id="height" class="form-control"/>
                            <label id="height_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="weight_box">
                            <label>Weight <i>(KG)</i></label>
                            <input type="text" name="weight" id="weight" class="form-control"/>
                            <label id="weight_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="blood_group_box">
                            <label>Blood Group</label>
                            <input type="text" name="blood_group" id="blood_group" class="form-control"/>
                            <label id="blood_group_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="uniform_size_box">
                            <label>Uniform Size</label>
                            <input type="text" name="uniform_size" id="uniform_size" class="form-control"/>
                            <label id="uniform_size_error_msg"></label>
                        </div>
                        <div class="col-md-4 form-group" id="lang_spoken_at_home_box">
                            <label>Lang. Spoken At Home</label>
                            <input type="text" name="lang_spoken_at_home" id="lang_spoken_at_home" class="form-control"/>
                            <label id="lang_spoken_at_home_error_msg"></label>
                        </div>
                        <div class="col-md-4 form-group" id="child_stay_with_box">
                            <label>Child Stay / Live With</label>
                            <input type="text" name="child_stay_with" id="child_stay_with" class="form-control"/>
                            <label id="child_stay_with_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="address_line_1_box">
                            <label>Address Line 1<span class="text-red">*</span></label>
                            <input type="text" name="address_line_1" id="address_line_1" class="form-control"/>
                            <label id="address_line_1_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="address_line_2_box">
                            <label>Address Line 2</label>
                            <input type="text" name="address_line_2" id="address_line_2" class="form-control"/>
                            <label id="address_line_2_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="state_id_box">
                            <label>State<span class="text-red">*</span></label>
                            <select name="state_id" id="state_id" class="form-control">
                                <option value="0">--Select State--</option>
                            </select>
                            <label id="state_id_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="city_id_box">
                            <label>City<span class="text-red">*</span></label>
                            <select name="city_id" id="city_id" class="form-control">
                                <option value="0">--Select City--</option>
                            </select>
                            <label id="city_id_error_msg"></label>
                        </div>
                        <div class="col-md-2 form-group" id="pincode_box">
                            <label>Pincode<span class="text-red">*</span></label>
                            <input type="text" name="pincode" id="pincode" class="form-control"/>
                            <label id="pincode_error_msg"></label>
                        </div>
                        <div class="col-md-4 from-group">
                            <input type="checkbox" name="is_any_siblings" id="is_any_siblings" value="1"/>
                            <label for="is_any_siblings">Is any Siblings Child's ?</label>
                        </div>
                        <div class="col-md-4 form-group" id="sibling_class_id_box">
                            <label>Sibling's Class<span class="text-red">*</span></label>
                            <select name="sibling_class_id" id="sibling_class_id" class="form-control">
                                <option value="0">--Select Class--</option>
                            </select>
                            <label for="sibling_class_id_error_msg"></label>
                        </div>
                        <div class="col-md-4 form-group" id="sibling_student_id_box">
                            <label>Sibling<span class="text-red">*</span></label>
                            <select name="sibling_student_id" id="sibling_student_id" class="form-control">
                                <option value="0">--Select Sibling--</option>
                            </select>
                            <label for="sibling_student_id_error_msg"></label>
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="checkbox" name="is_any_alumni" id="is_any_alumni" value="1"/>
                            <label for="is_any_alumni">Is any Alumni Child's ?</label>
                        </div>
                        <div class="col-md-4 form-group" id="alumni_class_id_box">
                            <label>Alumni's Class<span class="text-red">*</span></label>
                            <select name="alumni_class_id" id="alumni_class_id" class="form-control">
                                <option value="0">--Select Class--</option>
                            </select>
                            <label for="alumni_class_id_error_msg"></label>
                        </div>
                        <div class="col-md-4 form-group" id="alumni_student_id_box">
                            <label>Alumni<span class="text-red">*</span></label>
                            <select name="alumni_student_id" id="alumni_student_id" class="form-control">
                                <option value="0">--Select Sibling--</option>
                            </select>
                            <label for="alumni_student_id_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="father_first_name_box">
                            <label>First Name<span class="text-red">*</span></label>
                            <input type="text" name="father_first_name" id="father_first_name" class="form-control"/>
                            <label for="father_first_name_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="father_middle_name_box">
                            <label>Middle Name</label>
                            <input type="text" name="father_middle_name" id="father_middle_name" class="form-control"/>
                            <label for="father_middle_name_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="father_last_name_box">
                            <label>Last Name</label>
                            <input type="text" name="father_last_name" id="father_last_name" class="form-control"/>
                            <label for="father_last_name_error_msg"></label>
                        </div>
                        <div class="col-md-3 form-group" id="father_date_of_birth_box">
                            <label>Date of birth</label>
                            <input type="text" name="father_date_of_birth" id="father_date_of_birth" class="form-control" readonly/>
                            <label for="father_date_of_birth_error_msg"></label>
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