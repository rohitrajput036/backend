{include file='header.tpl'}
{css('plugins/bs-stepper/css/bs-stepper.min.css')}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registration
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{base_url('welcome')}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Registration</li>
            <li class="active">Add</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                                <div class="step" data-target="#child-information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="child-information-part" id="child-information-part-trigger">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Registration/Child Information</span>
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
                                    <div class="row">
                                        <div class="col-md-2 form-group" id="registration_no_box">
                                            <label>Registration No<span class="text-red">*</span></label>
                                            <input type="text" name="registration_no" id="registration_no" class="form-control" placeholder="Enter Registration No"/>
                                            <label id="registration_no_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="registration_date_box">
                                            <label>Registration Date<span class="text-red">*</span></label>
                                            <input type="text" name="registration_date" id="registration_date" class="form-control" placeholder="Enter Registration Date"/>
                                            <label id="registration_date_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="registration_fee_box">
                                            <label>Registration Fee<span class="text-red">*</span></label>
                                            <input type="text" name="registration_fee" id="registration_fee" class="form-control" placeholder="Enter Registration Fee"/>
                                            <label id="registration_fee_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="total_marks_box">
                                            <label>Total Marks<span class="text-red">*</span></label>
                                            <input type="text" name="total_marks" id="total_marks" class="form-control" placeholder="Enter Total Marks"/>
                                            <label id="total_marks_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="earn_marks_box">
                                            <label>Earn Marks<span class="text-red">*</span></label>
                                            <input type="text" name="earn_marks" id="earn_marks" class="form-control" placeholder="Enter Earn Marks"/>
                                            <label id="earn_marks_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="earn_percentage_box">
                                            <label>Earn Percentage<span class="text-red">*</span></label>
                                            <input type="text" name="earn_percentage" id="earn_percentage" class="form-control" placeholder="Enter Earn Percentage(%)"/>
                                            <label id="earn_percentage_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="class_id_box">
                                            <label>Class<span class="text-red">*</span></label>
                                            <select name="class_id" id="class_id" class="form-control">
                                                <option value="0">--Select Class--</option>
                                            </select>
                                            <label id="class_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_first_name_box">
                                            <label>First Name<span class="text-red">*</span></label>
                                            <input type="text" name="child_first_name" id="child_first_name" class="form-control" placeholder="Child Fist Name"/>
                                            <label id="child_first_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_middle_name_box">
                                            <label>Middle Name</label>
                                            <input type="text" name="child_middle_name" id="child_middle_name" class="form-control" placeholder="Child Middle Name"/>
                                            <label id="child_middle_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_last_name_box">
                                            <label>Last Name</label>
                                            <input type="text" name="child_last_name" id="child_last_name" class="form-control" placeholder="Child Last Name"/>
                                            <label id="child_last_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_date_of_birth_box">
                                            <label>Date Of Birth</label>
                                            <input type="text" name="child_date_of_birth" id="child_date_of_birth" class="form-control" placeholder="Child date of birth"/>
                                            <label id="child_date_of_birth_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_place_of_birth_box">
                                            <label>Place Of Birth</label>
                                            <input type="text" name="child_place_of_birth" id="child_place_of_birth" class="form-control" placeholder="Child place of birth"/>
                                            <label id="child_place_of_birth_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_gender_box">
                                            <label>Gender</label>
                                            <div class="form-control text-center">
                                                <input type="radio" name="child_gender" id="child_gender_male" value="M" checked/> 
                                                <label for="child_gender_male">Male</label>&nbsp;&nbsp;
                                                <input type="radio" name="child_gender" id="child_gender_female" value="F"/> 
                                                <label for="child_gender_female">Female</label>
                                            </div>
                                            <label id="child_gender_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_category_id_box">
                                            <label>Category</label>
                                            <select name="child_categoty_id" id="child_categoty_id" class="form-control">
                                                <option value="0">--Select Category--</option>
                                            </select>
                                            <label id="child_category_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-4 form-group" id="child_cast_box">
                                            <label>Cast</label>
                                            <input type="text" name="child_cast" id="child_cast" class="form-control" placeholder="Enter cast name"/>
                                            <label id="child_cast_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_nationality_id_box">
                                            <label>Nationality</label>
                                            <select name="child_nationality_id" id="child_nationality_id" class="form-control">
                                                <option value="0">--Select Nationality--</option>
                                            </select>
                                            <label id="child_nationality_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_religion_id_box">
                                            <label>Religion</label>
                                            <select name="child_religion_id" id="child_religion_id" class="form-control">
                                                <option value="0">--Select Religion--</option>
                                            </select>
                                            <label id="child_religion_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius: 10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold;">Residence Address</div>
                                                <div class="col-md-6 form-group" id="child_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="child_address_line_1" id="child_address_line_1" class="form-control" placeholder="Enter address line 1"/>
                                                    <label id="child_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="child_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="child_address_line_2" id="child_address_line_2" class="form-control" placeholder="Enter address line 2"/>
                                                    <label id="child_address_line_2_error_msg"></label>
                                                </div>
                                                <div class="col-md-3 form-group" id="child_state_id_box">
                                                    <label>State</label>
                                                    <select name="child_state_id" id="child_state_id" class="form-control">
                                                        <option value="0">--Select State--</option>
                                                    </select>
                                                    <label id="child_state_id_error_msg"></label>
                                                </div>
                                                <div class="col-md-3 form-group" id="child_city_id_box">
                                                    <label>City</label>
                                                    <select name="child_city_id" id="child_city_id" class="form-control">
                                                        <option value="0">--Select City--</option>
                                                    </select>
                                                    <label id="child_city_id_error_msg"></label>
                                                </div>
                                                <div class="col-md-3 form-group" id="child_area_id_box">
                                                    <label>Area</label>
                                                    <select name="child_area_id" id="child_area_id" class="form-control">
                                                        <option value="0">--Select Area--</option>
                                                    </select>
                                                    <label id="child_area_id_error_msg"></label>
                                                </div>
                                                <div class="col-md-3 form-group" id="child_pincode_box">
                                                    <label>Pincode</label>
                                                    <input type="text" name="child_pincode" id="child_pincode" class="form-control" maxlength="6" minlength="6" placeholder="Enter pincode"/>
                                                    <label id="child_pincode_error_msg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius: 10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold">Permanent Address</div>
                                                <div class="col-md-6 form-group" id="child_permanent_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="child_permanent_address_line_1" id="child_permanent_address_line_1" class="form-control" placeholder="Enter address line 1"/>
                                                    <label id="child_permanent_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="child_permanent_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="child_permanent_address_line_2" id="child_permanent_address_line_2" class="form-control" placeholder="Enter address line 2"/>
                                                    <label id="child_permanent_address_line_2_error_msg"></label>
                                                </div>
                                                <div class="col-md-3 form-group" id="child_permanent_state_id_box">
                                                    <label>State</label>
                                                    <select name="child_permanent_state_id" id="child_permanent_state_id" class="form-control">
                                                        <option value="0">--Select State--</option>
                                                    </select>
                                                    <label id="child_permanent_state_id_error_msg"></label>
                                                </div>
                                                <div class="col-md-3 form-group" id="child_permanent_city_id_box">
                                                    <label>City</label>
                                                    <select name="child_permanent_city_id" id="child_permanent_city_id" class="form-control">
                                                        <option value="0">--Select City--</option>
                                                    </select>
                                                    <label id="child_permanent_city_id_error_msg"></label>
                                                </div>
                                                <div class="col-md-3 form-group" id="child_permanent_area_id_box">
                                                    <label>Area</label>
                                                    <select name="child_permanent_area_id" id="child_permanent_area_id" class="form-control">
                                                        <option value="0">--Select Area--</option>
                                                    </select>
                                                    <label id="child_permanent_area_id_error_msg"></label>
                                                </div>
                                                <div class="col-md-3 form-group" id="child_permanent_pincode_box">
                                                    <label>Pincode</label>
                                                    <input type="text" name="child_permanent_pincode" id="child_permanent_pincode" class="form-control" maxlength="6" minlength="6" placeholder="Enter pincode"/>
                                                    <label id="child_permanent_pincode_error_msg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12"></div>
                                        <div class="col-md-2 form-group" id="child_mother_tongue_box">
                                            <label>Mother Tongue</label>
                                            <input type="text" name="child_mother_tongue" id="child_mother_tongue" class="form-control" placeholder="Enter Mother Tongue"/>
                                            <label id="child_mother_tongue_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_blood_group_box">
                                            <label>Blood Group</label>
                                            <select name="child_blood_group" id="child_blood_group" class="form-control">
                                                <option value="0">--Select Blood Group--</option>
                                            </select>
                                            <label id="child_blood_group_error_msg"></label>
                                        </div>
                                        <div class="col-md-4 form-group" id="child_indentification_mark_1_box">
                                            <label>Indentification Mark 1</label>
                                            <input type="text" name="child_indentification_mark_1" id="child_indentification_mark_1" class="form-control" placeholder="Enter Indentification Mark 1"/>
                                            <label id="child_indentification_mark_1_error_msg"></label>
                                        </div>
                                        <div class="col-md-4 form-group" id="child_indentification_mark_2_box">
                                            <label>Indentification Mark 2</label>
                                            <input type="text" name="child_indentification_mark_2" id="child_indentification_mark_2" class="form-control" placeholder="Enter Indentification Mark 2"/>
                                            <label id="child_indentification_mark_2_error_msg"></label>
                                        </div>
                                        <div class="col-md-12 form-group" id="child_remarks_box">
                                            <label>Remarks</label>
                                            <textarea class="form-control" name="child_remarks" id="child_remarks"></textarea>
                                            <label id="child_remarks_error_msg"></label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary pull-right" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="father-information-part" class="content" role="tabpanel" aria-labelledby="father-information-part-trigger">
                                    <div class="row">
                                        <div class="col-md-2 form-group" id="father_first_name_box">
                                            <label>First Name<span class="text-red">*</span></label>
                                            <input type="text" name="father_first_name" id="father_first_name" class="form-control" placeholder="Enter first name"/>
                                            <label id="father_first_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_middle_name_box">
                                            <label>Middle Name</label>
                                            <input type="text" name="father_middle_name" id="father_middle_name" class="form-control" placeholder="Enter middle name"/>
                                            <label id="father_middle_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_last_name_box">
                                            <label>Last Name</label>
                                            <input type="text" name="father_last_name" id="father_last_name" class="form-control" placeholder="Enter last name"/>
                                            <label id="father_last_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_email_id_box">
                                            <label>Email Id</label>
                                            <input type="text" name="father_email_id" id="father_email_id" class="form-control" placeholder="Enter email id"/>
                                            <label id="father_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_alt_email_id_box">
                                            <label>Alt Email Id</label>
                                            <input type="text" name="father_alt_email_id" id="father_alt_email_id" class="form-control" placeholder="Enter alternate email id"/>
                                            <label id="father_alt_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_contact_no_box">
                                            <label>Contact No</label>
                                            <input type="text" name="father_contact_no" id="father_contact_no" class="form-control" placeholder="Enter contact no"/>
                                            <label id="father_contact_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_alt_contact_no_box">
                                            <label>Alt. Contact No</label>
                                            <input type="text" name="father_alt_contact_no" id="father_alt_contact_no" class="form-control" placeholder="Enter alternate contact no"/>
                                            <label id="father_alt_contact_no_error_smsg"></label>
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-warning" onclick="stepper.previous()">Previous</button>
                                    <button class="btn btn-primary pull-right" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="mother-information-part" class="content" role="tabpanel" aria-labelledby="mother-information-part-trigger">
                                    <h1>Mother</h1>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                    <button class="btn btn-primary pull-right" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="document-information-part" class="content" role="tabpanel" aria-labelledby="document-information-part-trigger">
                                    <h1>Document</h1>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                    <button class="btn btn-primary pull-right" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="structure-information-part" class="content" role="tabpanel" aria-labelledby="structure-information-part-trigger">
                                    <h1>Structure</h1>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        </div class="clearfix"></div>
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
$(document.body).addClass('sidebar-collapse');
$(document.body).addClass('fixed');
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>