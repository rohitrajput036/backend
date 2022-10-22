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
                                <div class="step" data-target="#guardian-information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="guardian-information-part" id="guardian-information-part-trigger">
                                        <span class="bs-stepper-circle">4</span>
                                        <span class="bs-stepper-label">Guardian Information</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#document-information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="document-information-part" id="document-information-part-trigger">
                                        <span class="bs-stepper-circle">5</span>
                                        <span class="bs-stepper-label">Documents Information</span>
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
                                                {if isset($class_list) && !empty($class_list)}
                                                    {foreach $class_list as $cl}
                                                        <option value="{$cl['class_id']}">{$cl['class_name']}</option>
                                                    {/foreach}
                                                {/if}
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
                                                {if isset($cast_categoty_list) && !empty($cast_categoty_list)}
                                                    {foreach $cast_categoty_list as $cc}
                                                        <option value="{$cc['cast_category_id']}">{$cc['short_code']} ({$cc['cast_name']})</option>
                                                    {/foreach}
                                                {/if}
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
                                                {if isset($nationality_list) && !empty($nationality_list)}
                                                    {foreach $nationality_list as $nl}
                                                        <option value="{$nl['nationality_id']}">{$nl['nationality']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="child_nationality_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_religion_id_box">
                                            <label>Religion</label>
                                            <select name="child_religion_id" id="child_religion_id" class="form-control">
                                                <option value="0">--Select Religion--</option>
                                                {if isset($religion_list) && !empty($religion_list)}
                                                    {foreach $religion_list as $rl}
                                                        <option value="{$rl['religion_id']}">{$rl['religion']}</option>
                                                    {/foreach}
                                                {/if}
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
                                        <div class="col-md-12">
                                            <div class="row">
                                                <label>Previous Acadmic Details</label>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:5%">S.No</th>
                                                            <th>School Name</th>
                                                            <th>Class</th>
                                                            <th>Acadmic Year</th>
                                                            <th>Grade/Marks</th>
                                                            <th>Achievements</th>
                                                            <th><button class="btn btn-success btn-xs"><i class="fa fa-plus"></i></button></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>
                                                                <input type="text" name="pre_school_name" id="pre_school_name_1" class="form-control" placeholder="Enter previous school name"/>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pre_class" id="pre_class_1" class="form-control" placeholder="Enter class"/>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pre_acadmic_year" id="pre_acadmic_year_1" class="form-control" placeholder="Enter acadmic year"/>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pre_grade" id="pre_grade_1" class="form-control" placeholder="Enter grade/marks"/>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pre_achievements" id="pre_achievements_1" class="form-control" placeholder="Enter achievements if any"/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
                                        <div class="col-md-2 form-group" id="father_date_of_birth_box">
                                            <label>Date of birth</label>
                                            <input type="text" name="father_date_of_birth" id="father_date_of_birth" class="form-control" placeholder="Enter date of birth"/>
                                            <label id="father_date_of_birth_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_education_id_box">
                                            <label>Education</label>
                                            <select name="father_education_id" id="father_education_id" class="form-control">
                                                <option value="0">--Select Education--</option>
                                                {if isset($education_type_list) && !empty($education_type_list)}
                                                    {foreach $education_type_list as $edu}
                                                        <option value="{$edu['education_type_id']}">{$edu['education_type']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="father_education_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_occupation_type_id_box">
                                            <label>Occupation Type</label>
                                            <select name="father_occupation_type_id" id="father_occupation_type_id" class="form-control">
                                                <option value="0">--Select Occupation--</option>
                                                {if isset($father_occupation_type_list) && !empty($father_occupation_type_list)}
                                                    {foreach $father_occupation_type_list as $fot}
                                                        <option value="{$fot['occupation_type_id']}">{$fot['occupation_type']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="father_occupation_type_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_document_type_id_box">
                                            <label>Document Type</label>
                                            <select name="father_document_type_id" id="father_document_type_id" class="form-control">
                                                <option value="0">--Select Document--</option>
                                            </select>
                                            <label id="father_document_type_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_document_no_box">
                                            <label>Document No</label>
                                            <input type="text" name="father_document_no" id="father_document_no" class="form-control" placeholder="Enter document no."/>
                                            <label id="father_document_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius:10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold;"><span>Residence Address</span></div>
                                                <div class="col-md-6 form-group" id="father_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="father_address_line_1" id="father_address_line_1" class="form-control" placeholder="Enter address line 1"/>
                                                    <label id="father_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="father_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="father_address_line_2" id="father_address_line_2" class="form-control" placeholder="Enter address line 2"/>
                                                    <label id="father_address_line_2_error_msg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="father_state_id_box">
                                                    <label>State</label>
                                                    <select name="father_state_id" id="father_state_id" class="form-control">
                                                        <option value="0">--Select State--</option>
                                                    </select>
                                                    <label id="father_state_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="father_city_id_box">
                                                    <label>City</label>
                                                    <select name="father_city_id" id="father_city_id" class="form-control">
                                                        <option value="0">--Select City--</option>
                                                    </select>
                                                    <label id="father_city_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="father_pincode_box">
                                                    <label>Pincode</label>
                                                    <input type="text" name="father_pincode" id="father_pincode" class="form-control" placeholder="Enter Pincode"/>
                                                    <label id="father_pincode_error_smsg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius:10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold;">
                                                    <span>Office Address</span>
                                                </div>
                                                <div class="col-md-6 form-group" id="father_office_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="father_office_address_line_1" id="father_office_address_line_1" class="form-control" placeholder="Enter office address line 1"/>
                                                    <label id="father_office_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="father_office_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="father_office_address_line_2" id="father_office_address_line_2" class="form-control" placeholder="Enter office address line 2"/>
                                                    <label id="father_office_address_line_2_error_msg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="father_office_state_id_box">
                                                    <label>State</label>
                                                    <select name="father_office_state_id" id="father_office_state_id" class="form-control">
                                                        <option value="0">--Select State--</option>
                                                    </select>
                                                    <label id="father_office_state_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="father_office_city_id_box">
                                                    <label>City</label>
                                                    <select name="father_office_city_id" id="father_office_city_id" class="form-control">
                                                        <option value="0">--Select City--</option>
                                                    </select>
                                                    <label id="father_office_city_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="father_office_pincode_box">
                                                    <label>Pincode</label>
                                                    <input type="text" name="father_office_pincode" id="father_office_pincode" class="form-control" placeholder="Enter office Pincode"/>
                                                    <label id="father_pincode_error_smsg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group"></div>
                                    </div>
                                    <button class="btn btn-warning" onclick="stepper.previous()">Previous</button>
                                    <button class="btn btn-primary pull-right" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="mother-information-part" class="content" role="tabpanel" aria-labelledby="mother-information-part-trigger">
                                    <div class="row">
                                        <div class="col-md-2 form-group" id="mother_first_name_box">
                                            <label>First Name<span class="text-red">*</span></label>
                                            <input type="text" name="mother_first_name" id="mother_first_name" class="form-control" placeholder="Enter first name"/>
                                            <label id="mother_first_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_middle_name_box">
                                            <label>Middle Name</label>
                                            <input type="text" name="mother_middle_name" id="mother_middle_name" class="form-control" placeholder="Enter middle name"/>
                                            <label id="mother_middle_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_last_name_box">
                                            <label>Last Name</label>
                                            <input type="text" name="mother_last_name" id="mother_last_name" class="form-control" placeholder="Enter last name"/>
                                            <label id="mother_last_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_email_id_box">
                                            <label>Email Id</label>
                                            <input type="text" name="mother_email_id" id="mother_email_id" class="form-control" placeholder="Enter email id"/>
                                            <label id="mother_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_alt_email_id_box">
                                            <label>Alt Email Id</label>
                                            <input type="text" name="mother_alt_email_id" id="mother_alt_email_id" class="form-control" placeholder="Enter alternate email id"/>
                                            <label id="mother_alt_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_contact_no_box">
                                            <label>Contact No</label>
                                            <input type="text" name="mother_contact_no" id="mother_contact_no" class="form-control" placeholder="Enter contact no"/>
                                            <label id="mother_contact_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_alt_contact_no_box">
                                            <label>Alt. Contact No</label>
                                            <input type="text" name="mother_alt_contact_no" id="mother_alt_contact_no" class="form-control" placeholder="Enter alternate contact no"/>
                                            <label id="mother_alt_contact_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_date_of_birth_box">
                                            <label>Date of birth</label>
                                            <input type="text" name="mother_date_of_birth" id="mother_date_of_birth" class="form-control" placeholder="Enter date of birth"/>
                                            <label id="mother_date_of_birth_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_education_id_box">
                                            <label>Education</label>
                                            <select name="mother_education_id" id="mother_education_id" class="form-control">
                                                <option value="0">--Select Education--</option>
                                                {if isset($education_type_list) && !empty($education_type_list)}
                                                    {foreach $education_type_list as $edu}
                                                        <option value="{$edu['education_type_id']}">{$edu['education_type']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="mother_education_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_occupation_type_id_box">
                                            <label>Occupation Type</label>
                                            <select name="mother_occupation_type_id" id="mother_occupation_type_id" class="form-control">
                                                <option value="0">--Select Occupation--</option>
                                                {if isset($mother_occupation_type_list) && !empty($mother_occupation_type_list)}
                                                    {foreach $mother_occupation_type_list as $mot}
                                                        <option value="{$mot['occupation_type_id']}">{$mot['occupation_type']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="mother_occupation_type_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_document_type_id_box">
                                            <label>Document Type</label>
                                            <select name="mother_document_type_id" id="mother_document_type_id" class="form-control">
                                                <option value="0">--Select Document--</option>
                                            </select>
                                            <label id="mother_document_type_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_document_no_box">
                                            <label>Document No</label>
                                            <input type="text" name="mother_document_no" id="mother_document_no" class="form-control" placeholder="Enter document no."/>
                                            <label id="mother_document_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius:10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold;"><span>Residence Address</span></div>
                                                <div class="col-md-6 form-group" id="mother_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="mother_address_line_1" id="mother_address_line_1" class="form-control" placeholder="Enter address line 1"/>
                                                    <label id="mother_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="mother_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="mother_address_line_2" id="mother_address_line_2" class="form-control" placeholder="Enter address line 2"/>
                                                    <label id="mother_address_line_2_error_msg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="mother_state_id_box">
                                                    <label>State</label>
                                                    <select name="mother_state_id" id="mother_state_id" class="form-control">
                                                        <option value="0">--Select State--</option>
                                                    </select>
                                                    <label id="mother_state_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="mother_city_id_box">
                                                    <label>City</label>
                                                    <select name="mother_city_id" id="mother_city_id" class="form-control">
                                                        <option value="0">--Select City--</option>
                                                    </select>
                                                    <label id="mother_city_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="mother_pincode_box">
                                                    <label>Pincode</label>
                                                    <input type="text" name="mother_pincode" id="mother_pincode" class="form-control" placeholder="Enter Pincode"/>
                                                    <label id="mother_pincode_error_smsg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius:10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold;">
                                                    <span>Office Address</span>
                                                </div>
                                                <div class="col-md-6 form-group" id="mother_office_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="mother_office_address_line_1" id="mother_office_address_line_1" class="form-control" placeholder="Enter office address line 1"/>
                                                    <label id="mother_office_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="mother_office_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="mother_office_address_line_2" id="mother_office_address_line_2" class="form-control" placeholder="Enter office address line 2"/>
                                                    <label id="mother_office_address_line_2_error_msg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="mother_office_state_id_box">
                                                    <label>State</label>
                                                    <select name="mother_office_state_id" id="mother_office_state_id" class="form-control">
                                                        <option value="0">--Select State--</option>
                                                    </select>
                                                    <label id="mother_office_state_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="mother_office_city_id_box">
                                                    <label>City</label>
                                                    <select name="mother_office_city_id" id="mother_office_city_id" class="form-control">
                                                        <option value="0">--Select City--</option>
                                                    </select>
                                                    <label id="mother_office_city_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="mother_office_pincode_box">
                                                    <label>Pincode</label>
                                                    <input type="text" name="mother_office_pincode" id="mother_office_pincode" class="form-control" placeholder="Enter office Pincode"/>
                                                    <label id="mother_pincode_error_smsg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group"></div>
                                    </div>
                                    <button class="btn btn-warning" onclick="stepper.previous()">Previous</button>
                                    <button class="btn btn-primary pull-right" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="guardian-information-part" class="content" role="tabpanel" aria-labelledby="guardian-information-part-trigger">
                                    <div class="row">
                                        <div class="col-md-2 form-group" id="guardian_relation_id_box">
                                            <label>Relation</label>
                                                <select name="guardian_relation_id" id="guardian_relation_id" class="form-control">
                                                    <option value="0">--Select Relation--</option>    
                                                </select>
                                            <label id="guardian_relation_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_first_name_box">
                                            <label>First Name<span class="text-red">*</span></label>
                                            <input type="text" name="guardian_first_name" id="guardian_first_name" class="form-control" placeholder="Enter first name"/>
                                            <label id="guardian_first_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_middle_name_box">
                                            <label>Middle Name</label>
                                            <input type="text" name="guardian_middle_name" id="guardian_middle_name" class="form-control" placeholder="Enter middle name"/>
                                            <label id="guardian_middle_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_last_name_box">
                                            <label>Last Name</label>
                                            <input type="text" name="guardian_last_name" id="guardian_last_name" class="form-control" placeholder="Enter last name"/>
                                            <label id="guardian_last_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_email_id_box">
                                            <label>Email Id</label>
                                            <input type="text" name="guardian_email_id" id="guardian_email_id" class="form-control" placeholder="Enter email id"/>
                                            <label id="guardian_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_alt_email_id_box">
                                            <label>Alt Email Id</label>
                                            <input type="text" name="guardian_alt_email_id" id="guardian_alt_email_id" class="form-control" placeholder="Enter alternate email id"/>
                                            <label id="guardian_alt_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_contact_no_box">
                                            <label>Contact No</label>
                                            <input type="text" name="guardian_contact_no" id="guardian_contact_no" class="form-control" placeholder="Enter contact no"/>
                                            <label id="guardian_contact_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_alt_contact_no_box">
                                            <label>Alt. Contact No</label>
                                            <input type="text" name="guardian_alt_contact_no" id="guardian_alt_contact_no" class="form-control" placeholder="Enter alternate contact no"/>
                                            <label id="guardian_alt_contact_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_date_of_birth_box">
                                            <label>Date of birth</label>
                                            <input type="text" name="guardian_date_of_birth" id="guardian_date_of_birth" class="form-control" placeholder="Enter date of birth"/>
                                            <label id="guardian_date_of_birth_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_education_id_box">
                                            <label>Education</label>
                                            <select name="guardian_education_id" id="guardian_education_id" class="form-control">
                                                <option value="0">--Select Education--</option>
                                                {if isset($education_type_list) && !empty($education_type_list)}
                                                    {foreach $education_type_list as $edu}
                                                        <option value="{$edu['education_type_id']}">{$edu['education_type']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="guardian_education_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_occupation_type_id_box">
                                            <label>Occupation Type</label>
                                            <select name="guardian_occupation_type_id" id="guardian_occupation_type_id" class="form-control">
                                                <option value="0">--Select Occupation--</option>
                                                {if isset($father_occupation_type_list) && !empty($father_occupation_type_list)}
                                                    {foreach $father_occupation_type_list as $fot}
                                                        <option value="{$fot['occupation_type_id']}">{$fot['occupation_type']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="guardian_occupation_type_id_error_smsg"></label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-2 form-group" id="guardian_document_type_id_box">
                                            <label>Document Type</label>
                                            <select name="guardian_document_type_id" id="guardian_document_type_id" class="form-control">
                                                <option value="0">--Select Document--</option>
                                            </select>
                                            <label id="guardian_document_type_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_document_no_box">
                                            <label>Document No</label>
                                            <input type="text" name="guardian_document_no" id="guardian_document_no" class="form-control" placeholder="Enter document no."/>
                                            <label id="guardian_document_no_error_smsg"></label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius:10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold;"><span>Residence Address</span></div>
                                                <div class="col-md-6 form-group" id="guardian_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="guardian_address_line_1" id="guardian_address_line_1" class="form-control" placeholder="Enter address line 1"/>
                                                    <label id="guardian_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="guardian_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="guardian_address_line_2" id="guardian_address_line_2" class="form-control" placeholder="Enter address line 2"/>
                                                    <label id="guardian_address_line_2_error_msg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="guardian_state_id_box">
                                                    <label>State</label>
                                                    <select name="guardian_state_id" id="guardian_state_id" class="form-control">
                                                        <option value="0">--Select State--</option>
                                                    </select>
                                                    <label id="guardian_state_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="guardian_city_id_box">
                                                    <label>City</label>
                                                    <select name="guardian_city_id" id="guardian_city_id" class="form-control">
                                                        <option value="0">--Select City--</option>
                                                    </select>
                                                    <label id="guardian_city_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="guardian_pincode_box">
                                                    <label>Pincode</label>
                                                    <input type="text" name="guardian_pincode" id="guardian_pincode" class="form-control" placeholder="Enter Pincode"/>
                                                    <label id="guardian_pincode_error_smsg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius:10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold;">
                                                    <span>Office Address</span>
                                                </div>
                                                <div class="col-md-6 form-group" id="guardian_office_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="guardian_office_address_line_1" id="guardian_office_address_line_1" class="form-control" placeholder="Enter office address line 1"/>
                                                    <label id="guardian_office_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="guardian_office_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="guardian_office_address_line_2" id="guardian_office_address_line_2" class="form-control" placeholder="Enter office address line 2"/>
                                                    <label id="guardian_office_address_line_2_error_msg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="guardian_office_state_id_box">
                                                    <label>State</label>
                                                    <select name="guardian_office_state_id" id="guardian_office_state_id" class="form-control">
                                                        <option value="0">--Select State--</option>
                                                    </select>
                                                    <label id="guardian_office_state_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="guardian_office_city_id_box">
                                                    <label>City</label>
                                                    <select name="guardian_office_city_id" id="guardian_office_city_id" class="form-control">
                                                        <option value="0">--Select City--</option>
                                                    </select>
                                                    <label id="guardian_office_city_id_error_smsg"></label>
                                                </div>
                                                <div class="col-md-4 form-group" id="guardian_office_pincode_box">
                                                    <label>Pincode</label>
                                                    <input type="text" name="guardian_office_pincode" id="guardian_office_pincode" class="form-control" placeholder="Enter office Pincode"/>
                                                    <label id="guardian_pincode_error_smsg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group"></div>
                                    </div>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                    <button class="btn btn-primary pull-right" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="document-information-part" class="content" role="tabpanel" aria-labelledby="document-information-part-trigger">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Document Type</th>
                                                        <th width="35%">Document No</th>
                                                        <th width="35%">Document File</th>
                                                        <th width="5%"><button class="btn btn-success btn-xs"><i class="fa fa-plus"></i></button></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select name="child_document_type_id" id="child_document_type_id_1" class="form-control">
                                                                <option value="0">--Select--</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="child_document_no" id="child_document_no_1" class="form-control" placeholder="Enter Document No"/>
                                                        </td>
                                                        <td>
                                                            <input type="file" name="child_document_file" id="child_document_file_1" class="form-control"/>
                                                            <input type="hidden" name="child_document_file_base64" id="child_document_file_base64_1"/>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12 form-group">
                                                <label>Document details :</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-warning" onclick="stepper.previous()">Previous</button>
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
<script>
    function get_state_list(id){
        var control = {
            request_id : generateUUId(),
            source : 1,
            request_time : Math.round(+new Date() / 1000),
            version : {$smarty.const.API_VERSION}
        };
        var data = {
            is_active : 1
        };
        var request = {
            control : control,
            data : data
        };
        request = JSON.stringify(request);
        var url = "{$smarty.const.API_URL}state/get";
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
            $('#'+id).children().remove();
            $('#'+id).append("<option value='0'>--Select State--</option>");
            $.each(response.data,function(k,v){
                $('#'+id).append("<option value='"+v.state_id+"' data-sc='"+v.state_code+"'>"+v.state_name+"</option>");
            });
        }).fail(function(response) {
            $("#animatedLoader").hide();
            if (response.responseJSON.control) {
                $('#api_error').text(response.responseJSON.control.message);
            }
        }).always(function() {
            
        });
    }
    function get_city_list(target_id,state_id){
        if(state_id == 0){
            $('#'+target_id).children().remove();
            $('#'+target_id).append("<option value='0'>--Select City--</option>");
            return false;
        }
        var control = {
            request_id : generateUUId(),
            source : 1,
            request_time : Math.round(+new Date() / 1000),
            version : {$smarty.const.API_VERSION}
        };
        var data = {
            is_active : 1,
            state_id : state_id
        };
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
            $('#'+target_id).children().remove();
            $('#'+target_id).append("<option value='0'>--Select City--</option>");
            $.each(response.data,function(k,v){
                $('#'+target_id).append("<option value='"+v.city_id+"'>"+v.city_name+"</option>");
            });
            $('#'+target_id).trigger('change');
        }).fail(function(response) {
            $("#animatedLoader").hide();
            if (response.responseJSON.control) {
                $('#api_error').text(response.responseJSON.control.message);
            }
        }).always(function() {
            
        });
    }
    function get_area_list(target_id,city_id){
        if(city_id == 0){
            $('#'+target_id).children().remove();
            $('#'+target_id).append("<option value='0'>--Select Area--</option>");
            $('#'+target_id).trigger('change');
            return false;
        }
        var control = {
            request_id : generateUUId(),
            source : 1,
            request_time : Math.round(+new Date() / 1000),
            version : {$smarty.const.API_VERSION}
        };
        var data = {
            is_active : 1,
            city_id : city_id
        };
        var request = {
            control : control,
            data : data
        }
        request = JSON.stringify(request);
        var url = "{$smarty.const.API_URL}area/get";
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
            $('#'+target_id).children().remove();
            $('#'+target_id).append("<option value='0'>--Select Area--</option>");
            $.each(response.data,function(k,v){
                $('#'+target_id).append("<option value='"+v.area_master_id+"'>"+v.area_name+"</option>");
            });
            $('#'+target_id).trigger('change');
        }).fail(function(response) {
            $("#animatedLoader").hide();
            if (response.responseJSON.control) {
                $('#api_error').text(response.responseJSON.control.message);
            }
        }).always(function() {
            
        });
    }
    $(document).ready(function(){
        var child_state_box = $('#child_state_id').select2({
            width : '100%'
        });
        var child_city_box = $('#child_city_id').select2({
            width : '100%'
        });
        var child_area_box = $('#child_area_id').select2({
            width : '100%'
        });
        var child_permanent_state_box = $('#child_permanent_state_id').select2({
            width : '100%'
        });
        var child_permanent_city_box = $('#child_permanent_city_id').select2({
            width : '100%'
        });
        var child_permanent_area_box = $('#child_permanent_area_id').select2({
            width : '100%'
        });
        $(window).load(function(){
            get_state_list('child_state_id');
            get_state_list('child_permanent_state_id');
            get_state_list('father_state_id');
            get_state_list('father_office_state_id');
            get_state_list('mother_state_id');
            get_state_list('mother_office_state_id');
            get_state_list('guardian_state_id');
            get_state_list('guardian_office_state_id');
        });
        $(document).on('change','#child_state_id',function(){
            var state_id = $(this).val();    
            get_city_list('child_city_id',state_id);
        });
        $(document).on('change','#child_permanent_state_id',function(){
            var state_id = $(this).val();    
            get_city_list('child_permanent_city_id',state_id);
        });
        $(document).on('change','#father_state_id',function(){
            var state_id = $(this).val();    
            get_city_list('father_city_id',state_id);
        });
        $(document).on('change','#father_office_state_id',function(){
            var state_id = $(this).val();    
            get_city_list('father_office_city_id',state_id);
        });
        $(document).on('change','#mother_state_id',function(){
            var state_id = $(this).val();    
            get_city_list('mother_city_id',state_id);
        });
        $(document).on('change','#mother_office_state_id',function(){
            var state_id = $(this).val();    
            get_city_list('mother_office_city_id',state_id);
        });
        $(document).on('change','#guardian_state_id',function(){
            var state_id = $(this).val();    
            get_city_list('guardian_city_id',state_id);
        });
        $(document).on('change','#guardian_office_state_id',function(){
            var state_id = $(this).val();    
            get_city_list('guardian_office_city_id',state_id);
        });
        $(document).on('change','#child_city_id',function(){
            var city_id = $(this).val();
            get_area_list('child_area_id',city_id);
        });
        $(document).on('change','#child_permanent_city_id',function(){
            var city_id = $(this).val();
            get_area_list('child_permanent_area_id',city_id);
        });
    });
</script>