{include file='header.tpl'}
{css('plugins/bs-stepper/css/bs-stepper.min.css')}
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
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Add Admission</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                                <!-- your steps here -->
                                <div class="step" data-target="#child-information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="child-information-part" id="child-information-part-trigger">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Child Information</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#father-information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="father-information-part" id="father-information-part-trigger">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Father Information</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#mother-information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="mother-information-part" id="mother-information-part-trigger">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Mother Information</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#document-information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="document-information-part" id="document-information-part-trigger">
                                        <span class="bs-stepper-circle">4</span>
                                        <span class="bs-stepper-label">Child Document</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#structure-information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="structure-information-part" id="structure-information-part-trigger">
                                        <span class="bs-stepper-circle">5</span>
                                        <span class="bs-stepper-label">Class structure</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <div id="child-information-part" class="content" role="tabpanel" aria-labelledby="child-information-part-trigger">
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
                                    <div class="clearfix"></div>
                                    <div class="col-md-3 form-group" id="date_of_birth_box">
                                        <label>Date of Birth<span class="text-red">*</span></label>
                                        <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" readonly/>
                                        <label id="date_of_birth_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="gender_box">
                                        <label>Gender<span class="text-red">*</span></label>
                                        <div class="form-control text-center">
                                            <input type="radio" name="gender" id="gender_m" value="M" checked/> <label for="gender_m">Male</label>
                                            &nbsp;
                                            <input type="radio" name="gender" id="gender_f" value="F"/> <label for="gender_f">Female</label>
                                        </div>
                                        <label id="gender_error_msg"></label>
                                    </div>
                                    <div class="col-md-2 form-group" id="age_box">
                                        <label>Age<span class="text-red">*</span></label>
                                        <input type="text" name="age" id="age" class="form-control"/>
                                        <label id="age_error_msg"></label>
                                    </div>
                                    <div class="col-md-2 form-group" id="height_box">
                                        <label>Height <i>(CM)</i></label>
                                        <input type="text" name="height" id="height" class="form-control"/>
                                        <label id="height_error_msg"></label>
                                    </div>
                                    <div class="col-md-2 form-group" id="weight_box">
                                        <label>Weight <i>(KG)</i></label>
                                        <input type="text" name="weight" id="weight" class="form-control"/>
                                        <label id="weight_error_msg"></label>
                                    </div>
                                    <div class="clearfix"></div>
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
                                    <legend class="custom-border">Sibling Information</legend>
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
                                    <button class="btn btn-primary pull-right" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="father-information-part" class="content" role="tabpanel" aria-labelledby="father-information-part-trigger">
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
                                    <div class="col-md-3 form-group" id="father_contact_number_box">
                                        <label>Contact Number 1<span class="text-red">*</span></label>
                                        <input type="text" name="father_contact_number" id="father_contact_number" class="form-control"/>
                                        <label for="father_contact_number_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="father_contact_number2_box">
                                        <label>Contact Number 2</label>
                                        <input type="text" name="father_contact_number2" id="father_contact_number2" class="form-control"/>
                                        <label for="father_contact_number2_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="father_qualification_box">
                                        <label>Father Qualification<span class="text-red">*</span></label>
                                        <select name="father_qualification" id="father_qualification" class="form-control">
                                            <option value="0">--Select Qualification--</option>
                                        </select>
                                        <label id="father_qualification_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="father_Occupation_box">
                                        <label>Father Occupation<span class="text-red">*</span></label>
                                        <select name="father_occupation" id="father_occupation" class="form-control">
                                            <option value="0">--Select Occupation--</option>
                                        </select>
                                        <label id="father_occupation_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="father_address_line_1_box">
                                        <label>Address Line 1<span class="text-red">*</span></label>
                                        <input type="text" name="father_address_line_1" id="father_address_line_1" class="form-control"/>
                                        <label id="father_address_line_1_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="father_address_line_2_box">
                                        <label>Address Line 2</label>
                                        <input type="text" name="father_address_line_2" id="father_address_line_2" class="form-control"/>
                                        <label id="father_address_line_2_error_msg"></label>
                                    </div>
                                    <div class="col-md-2 form-group" id="father_state_id_box">
                                        <label>State<span class="text-red">*</span></label>
                                        <select name="father_state_id" id="father_state_id" class="form-control">
                                            <option value="0">--Select State--</option>
                                        </select>
                                        <label id="father_state_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-2 form-group" id="father_city_id_box">
                                        <label>City<span class="text-red">*</span></label>
                                        <select name="father_city_id" id="father_city_id" class="form-control">
                                            <option value="0">--Select City--</option>
                                        </select>
                                        <label id="father_city_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-2 form-group" id="father_pincode_box">
                                        <label>Pincode<span class="text-red">*</span></label>
                                        <input type="text" name="father_pincode" id="father_pincode" class="form-control"/>
                                        <label id="father_pincode_error_msg"></label>
                                    </div>
                                    <legend class="custom-border">Office Information</legend>
                                    <div class="col-md-4 form-group" id="father_email_id_box">
                                        <label>Email ID<span class="text-red">*</span></label>
                                        <input type="text" name="father_email_id" id="father_email_id" class="form-control"/>
                                        <label id="father_email_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="father_office_address_box">
                                        <label> Office Address<span class="text-red">*</span></label>
                                        <input type="text" name="father_office_address" id="father_office_address" class="form-control"/>
                                        <label id="father_office_address_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="father_office_address_2_box">
                                        <label>Office Address 2</label>
                                        <input type="text" name="father_office_address_2" id="father_office_address_2" class="form-control"/>
                                        <label id="father_office_address_2_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="father_office_state_id_box">
                                        <label>State<span class="text-red">*</span></label>
                                        <select name="father_office_state_id" id="father_office_state_id" class="form-control">
                                            <option value="0">--Select State--</option>
                                        </select>
                                        <label id="father_office_state_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="father_office_city_id_box">
                                        <label>City<span class="text-red">*</span></label>
                                        <select name="father_office_city_id" id="father_office_city_id" class="form-control">
                                            <option value="0">--Select City--</option>
                                        </select>
                                        <label id="father_office_city_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="father_office_pincode_box">
                                        <label>Pincode<span class="text-red">*</span></label>
                                        <input type="text" name="father_office_pincode" id="father_office_pincode" class="form-control"/>
                                        <label id="father_office_pincode_error_msg"></label>
                                    </div>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                    <button class="btn btn-primary pull-right" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="mother-information-part" class="content" role="tabpanel" aria-labelledby="mother-information-part-trigger">
                                    <div class="col-md-3 form-group" id="mother_first_name_box">
                                        <label>First Name<span class="text-red">*</span></label>
                                        <input type="text" name="mother_first_name" id="mother_first_name" class="form-control"/>
                                        <label for="mother_first_name_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="mother_middle_name_box">
                                        <label>Middle Name</label>
                                        <input type="text" name="mother_middle_name" id="mother_middle_name" class="form-control"/>
                                        <label for="mother_middle_name_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="mother_last_name_box">
                                        <label>Last Name</label>
                                        <input type="text" name="mother_last_name" id="mother_last_name" class="form-control"/>
                                        <label for="mother_last_name_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="mother_date_of_birth_box">
                                        <label>Date of birth</label>
                                        <input type="text" name="mother_date_of_birth" id="mother_date_of_birth" class="form-control" readonly/>
                                        <label for="mother_date_of_birth_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="mother_contact_number_box">
                                        <label>Contact Number 1<span class="text-red">*</span></label>
                                        <input type="text" name="mother_contact_number" id="mother_contact_number" class="form-control"/>
                                        <label for="mother_contact_number_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="mother_contact_number2_box">
                                        <label>Contact Number 2</label>
                                        <input type="text" name="mother_contact_number2" id="mother_contact_number2" class="form-control"/>
                                        <label for="mother_contact_number2_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="mother_qualification_box">
                                        <label>Mother Qualification<span class="text-red">*</span></label>
                                        <select name="mother_qualification" id="mother_qualification" class="form-control">
                                            <option value="0">--Select Qualification--</option>
                                        </select>
                                        <label id="mother_qualification_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="mother_Occupation_box">
                                        <label>Mother Occupation<span class="text-red">*</span></label>
                                        <select name="mother_occupation" id="mother_occupation" class="form-control">
                                            <option value="0">--Select Occupation--</option>
                                        </select>
                                        <label id="mother_occupation_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="mother_address_line_1_box">
                                        <label>Address Line 1<span class="text-red">*</span></label>
                                        <input type="text" name="mother_address_line_1" id="mother_address_line_1" class="form-control"/>
                                        <label id="mother_address_line_1_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="mother_address_line_2_box">
                                        <label>Address Line 2</label>
                                        <input type="text" name="mother_address_line_2" id="mother_address_line_2" class="form-control"/>
                                        <label id="mother_address_line_2_error_msg"></label>
                                    </div>
                                    <div class="col-md-2 form-group" id="mother_state_id_box">
                                        <label>State<span class="text-red">*</span></label>
                                        <select name="mother_state_id" id="mother_state_id" class="form-control">
                                            <option value="0">--Select State--</option>
                                        </select>
                                        <label id="mother_state_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-2 form-group" id="mother_city_id_box">
                                        <label>City<span class="text-red">*</span></label>
                                        <select name="mother_city_id" id="mother_city_id" class="form-control">
                                            <option value="0">--Select City--</option>
                                        </select>
                                        <label id="mother_city_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-2 form-group" id="mother_pincode_box">
                                        <label>Pincode<span class="text-red">*</span></label>
                                        <input type="text" name="mother_pincode" id="mother_pincode" class="form-control"/>
                                        <label id="mother_pincode_error_msg"></label>
                                    </div>
                                    <legend class="custom-border">Office Information</legend>
                                    <div class="col-md-4 form-group" id="mother_email_id_box">
                                        <label>Email ID<span class="text-red">*</span></label>
                                        <input type="text" name="mother_email_id" id="mother_email_id" class="form-control"/>
                                        <label id="mother_email_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="mother_office_address_box">
                                        <label> Office Address<span class="text-red">*</span></label>
                                        <input type="text" name="mother_office_address" id="mother_office_address" class="form-control"/>
                                        <label id="mother_office_address_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="mother_office_address_2_box">
                                        <label>Office Address 2</label>
                                        <input type="text" name="mother_office_address_2" id="mother_office_address_2" class="form-control"/>
                                        <label id="mother_office_address_2_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="mother_office_state_id_box">
                                        <label>State<span class="text-red">*</span></label>
                                        <select name="mother_office_state_id" id="mother_office_state_id" class="form-control">
                                            <option value="0">--Select State--</option>
                                        </select>
                                        <label id="mother_office_state_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="mother_office_city_id_box">
                                        <label>City<span class="text-red">*</span></label>
                                        <select name="mother_office_city_id" id="mother_office_city_id" class="form-control">
                                            <option value="0">--Select City--</option>
                                        </select>
                                        <label id="mother_office_city_id_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="mother_office_pincode_box">
                                        <label>Pincode<span class="text-red">*</span></label>
                                        <input type="text" name="mother_office_pincode" id="mother_office_pincode" class="form-control"/>
                                        <label id="mother_office_pincode_error_msg"></label>
                                    </div>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                    <button class="btn btn-primary pull-right" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="document-information-part" class="content" role="tabpanel" aria-labelledby="document-information-part-trigger">
                                    <div class="col-md-3 form-group" id="document_name_box">
                                        <label>Document Name</label>
                                        <input type="text" name="document_name" id="document_name" class="form-control"/>
                                        <label for="document_name_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="document_file_box">
                                        <label>Upload Document</label>
                                        <input type="file" name="document_file" id="document_file" clas="form-control"/>
                                        <input type = "hidden" name="document_img_file" id="document_img_file"/>
                                        <label for="document_file_error_msg"></label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                    <button class="btn btn-primary pull-right" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="structure-information-part" class="content" role="tabpanel" aria-labelledby="structure-information-part-trigger">
                                    <div class="col-md-3 form-group" id="class_start_time_box">
                                        <label>Start Class</label>
                                        <input type="time" name="class_start" id="class_start" class="form-control"/>
                                        <label for="class_start_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="end_class_time_box">
                                        <label>End Class</label>
                                        <input type="time" name="class_end" id="class_end" class="form-control"/>
                                        <label for="end_class_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="class_name_box">
                                        <label>Class<span class="text-red">*</span></label>
                                        <select name="class_name" id="class_name" class="form-control">
                                            <option value="0">--Select Class--</option>
                                        </select>
                                        <label id="class_name_error_msg"></label>
                                    </div>
                                    <div class="col-md-3 form-group" id="class_name_box">
                                        <label>Section<span class="text-red">*</span></label>
                                        <select name="section_name" id="section_name" class="form-control">
                                            <option value="0">--Select Section--</option>
                                        </select>
                                        <label id="section_name_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="joining_date_box">
                                        <label>Date Of Joining</label>
                                        <input type="date" name="joining_date" id="joining_date" class="form-control">
                                        <label for="joining_date_error_msg"></label>
                                    </div>
                                    <div class="col-md-4 form-group" id="joining_date_box">
                                        <label>Route</label>
                                        <select name="class_route" id="class_route" class="form-control">
                                            <option value="walker">Walker</option>
                                            <option value="walker">..</option>
                                            <option value="walker">..</option>
                                        </select>
                                        <label for="class_route_error_msg"></label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
{include file='footer.tpl'}
{js('plugins/bs-stepper/js/bs-stepper.min.js')}
{js('common.js')}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>