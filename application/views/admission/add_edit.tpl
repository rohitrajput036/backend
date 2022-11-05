{include file='header.tpl'}
{css('plugins/bs-stepper/css/bs-stepper.min.css')}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<style>
.form-control[readonly]{
    cursor: auto;
    background-color:white !important;
    opacity: 1;
}
.small_table .form-control{
    height: 25px !important;
    padding: 0px 12px !important;
}
.small_table>tbody>tr>td, .small_table>tbody>tr>th, .small_table>tfoot>tr>td, .small_table>tfoot>tr>th, .small_table>thead>tr>td, .small_table>thead>tr>th {
    padding-right: 10px;
    padding-left: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
</style>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admission
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Admission</li>
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
                                <div class="step" data-target="#child-information-part" onclick="stepper.to(1)">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="child-information-part" id="child-information-part-trigger">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Child Information</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#father-information-part" onclick="stepper.to(2)">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="father-information-part" id="father-information-part-trigger">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Father Information</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#mother-information-part" onclick="stepper.to(3)">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="mother-information-part" id="mother-information-part-trigger">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Mother Information</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#guardian-information-part" onclick="stepper.to(4)">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="guardian-information-part" id="guardian-information-part-trigger">
                                        <span class="bs-stepper-circle">4</span>
                                        <span class="bs-stepper-label">Guardian Information</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#document-information-part" onclick="stepper.to(5)">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="document-information-part" id="document-information-part-trigger">
                                        <span class="bs-stepper-circle">5</span>
                                        <span class="bs-stepper-label">Documents Information</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#assignment-part" onclick="stepper.to(6)">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="assignment-part" id="assignment-part-trigger">
                                        <span class="bs-stepper-circle">6</span>
                                        <span class="bs-stepper-label">Assignment Information</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#fee-calculation-part" onclick="stepper.to(7)">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="fee-calculation-part" id="fee-calculation-part-trigger">
                                        <span class="bs-stepper-circle">7</span>
                                        <span class="bs-stepper-label">Fee Calculation</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <div id="child-information-part" class="content" role="tabpanel" aria-labelledby="child-information-part-trigger">
                                    <div class="row">
                                        <div class="col-md-2 form-group" id="academic_session_id_box">
                                            <label>Academic Session<span class="text-red">*</span></label>
                                            <select name="academic_session_id" id="academic_session_id" class="form-control">
                                                <option value="0">--Academic Session--</option>
                                            </select>
                                            <label id="academic_session_id_error_msg"></label>
                                        </div>
                                        <input type="hidden" name="student_id" id="student_id" value="{(isset($student_info['student_id'])) ? $student_info['student_id'] : 0}"/>
                                        <div class="col-md-2 form-group" id="child_first_name_box">
                                            <label>First Name<span class="text-red">*</span></label>
                                            <input type="text" name="child_first_name" id="child_first_name" class="form-control" placeholder="Child Fist Name" value="{(isset($student_info['first_name'])) ? $student_info['first_name'] : ''}"/>
                                            <label id="child_first_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_middle_name_box">
                                            <label>Middle Name</label>
                                            <input type="text" name="child_middle_name" id="child_middle_name" class="form-control" placeholder="Child Middle Name" value="{(isset($student_info['middle_name'])) ? $student_info['middle_name'] : ''}"/>
                                            <label id="child_middle_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_last_name_box">
                                            <label>Last Name</label>
                                            <input type="text" name="child_last_name" id="child_last_name" class="form-control" placeholder="Child Last Name" value="{(isset($student_info['middle_name'])) ? $student_info['last_name'] : ''}"/>
                                            <label id="child_last_name_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_date_of_birth_box">
                                            <label>Date Of Birth</label>
                                            <input type="text" name="child_date_of_birth" id="child_date_of_birth" class="form-control" placeholder="Child date of birth" value="{(isset($student_info['date_of_birth']) && !empty($student_info['date_of_birth'])) ? date('m/d/Y',strtotime($student_info['date_of_birth'])) : ''}" readonly/>
                                            <label id="child_date_of_birth_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_place_of_birth_box">
                                            <label>Place Of Birth</label>
                                            <input type="text" name="child_place_of_birth" id="child_place_of_birth" class="form-control" placeholder="Child place of birth" value="{(isset($student_info['place_of_birth'])) ? $student_info['place_of_birth'] : ''}"/>
                                            <label id="child_place_of_birth_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_gender_box">
                                            <label>Gender</label>
                                            <div class="form-control text-center">
                                                <input type="radio" name="child_gender" id="child_gender_male" value="M" {(isset($student_info['gender']) && $student_info['gender'] == 'M') ? 'checked' : ''}/> 
                                                <label for="child_gender_male">Male</label>&nbsp;&nbsp;
                                                <input type="radio" name="child_gender" id="child_gender_female" value="F" {(isset($student_info['gender']) && $student_info['gender'] == 'F') ? 'checked' : ''}/> 
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
                                                        <option value="{$cc['cast_category_id']}" {(isset($student_info['cast_category_id']) && $student_info['cast_category_id'] == $cc['cast_category_id']) ? 'selected' : ''}>{$cc['short_code']} ({$cc['cast_name']})</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="child_category_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-4 form-group" id="child_cast_box">
                                            <label>Cast</label>
                                            <input type="text" name="child_cast" id="child_cast" class="form-control" placeholder="Enter cast name" value="{(isset($student_info['cast'])) ? $student_info['cast'] : ''}"/>
                                            <label id="child_cast_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_nationality_id_box">
                                            <label>Nationality</label>
                                            <select name="child_nationality_id" id="child_nationality_id" class="form-control">
                                                <option value="0">--Select Nationality--</option>
                                                {if isset($nationality_list) && !empty($nationality_list)}
                                                    {foreach $nationality_list as $nl}
                                                        <option value="{$nl['nationality_id']}" {(isset($student_info['nationality_id']) && $student_info['nationality_id'] == $nl['nationality_id']) ? 'selected' : ''}>{$nl['nationality']}</option>
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
                                                        <option value="{$rl['religion_id']}" {(isset($student_info['religion_id']) && $student_info['religion_id'] == $rl['religion_id']) ? 'selected' : ''}>{$rl['religion']}</option>
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
                                                    <input type="text" name="child_address_line_1" id="child_address_line_1" class="form-control" placeholder="Enter address line 1" value="{(isset($student_info['address_line_1'])) ? $student_info['address_line_1'] : ''}"/>
                                                    <label id="child_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="child_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="child_address_line_2" id="child_address_line_2" class="form-control" placeholder="Enter address line 2" value="{(isset($student_info['address_line_2'])) ? $student_info['address_line_2'] : ''}"/>
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
                                                    <input type="text" name="child_pincode" id="child_pincode" class="form-control" maxlength="6" minlength="6" placeholder="Enter pincode" value="{(isset($student_info['pincode'])) ? $student_info['pincode'] : ''}"/>
                                                    <label id="child_pincode_error_msg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius: 10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold">Permanent Address</div>
                                                <div class="col-md-6 form-group" id="child_permanent_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="child_permanent_address_line_1" id="child_permanent_address_line_1" class="form-control" placeholder="Enter address line 1" value="{(isset($student_info['permanent_addresss_line_1'])) ? $student_info['permanent_addresss_line_1'] : ''}"/>
                                                    <label id="child_permanent_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="child_permanent_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="child_permanent_address_line_2" id="child_permanent_address_line_2" class="form-control" placeholder="Enter address line 2" value="{(isset($student_info['permanent_addresss_line_2'])) ? $student_info['permanent_addresss_line_2'] : ''}"/>
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
                                                    <input type="text" name="child_permanent_pincode" id="child_permanent_pincode" class="form-control" maxlength="6" minlength="6" placeholder="Enter pincode" value="{(isset($student_info['permanent_pincode'])) ? $student_info['permanent_pincode'] : ''}"/>
                                                    <label id="child_permanent_pincode_error_msg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12"></div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <label>Previous Acadmic Details</label>
                                                <table class="table table-bordered small_table">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:5%">S.No</th>
                                                            <th>School Name</th>
                                                            <th>Class</th>
                                                            <th>Acadmic Year</th>
                                                            <th>Grade/Marks</th>
                                                            <th>Achievements</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {for $i = 1 to 3}
                                                            <tr>
                                                                <td>{$i}.</td>
                                                                <td>
                                                                    <input type="hidden" name="pre_school_info_id" id="pre_school_info_id{$i}" value="{(isset($student_info['prev_acadmic_record'][($i-1)]['student_previous_acadmic_records_id'])) ? $student_info['prev_acadmic_record'][($i-1)]['student_previous_acadmic_records_id'] : 0}"/>
                                                                    <input type="text" name="pre_school_name" id="pre_school_name_{$i}" class="form-control" placeholder="Enter previous school name" value="{(isset($student_info['prev_acadmic_record'][($i-1)]['school_name'])) ? $student_info['prev_acadmic_record'][($i-1)]['school_name'] : ''}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="pre_class" id="pre_class_{$i}" class="form-control" placeholder="Enter class" value="{(isset($student_info['prev_acadmic_record'][($i-1)]['class'])) ? $student_info['prev_acadmic_record'][($i-1)]['class'] : ''}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="pre_acadmic_year" id="pre_acadmic_year_{$i}" class="form-control" placeholder="Enter acadmic year" value="{(isset($student_info['prev_acadmic_record'][($i-1)]['acadmic_year'])) ? $student_info['prev_acadmic_record'][($i-1)]['acadmic_year'] : ''}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="pre_grade" id="pre_grade_{$i}" class="form-control" placeholder="Enter grade/marks" value="{(isset($student_info['prev_acadmic_record'][($i-1)]['grade'])) ? $student_info['prev_acadmic_record'][($i-1)]['grade'] : ''}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="pre_achievements" id="pre_achievements_{$i}" class="form-control" placeholder="Enter achievements if any" value="{(isset($student_info['prev_acadmic_record'][($i-1)]['achievements'])) ? $student_info['prev_acadmic_record'][($i-1)]['achievements'] : ''}"/>
                                                                </td>
                                                            </tr>
                                                        {/for}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_mother_tongue_box">
                                            <label>Mother Tongue</label>
                                            <input type="text" name="child_mother_tongue" id="child_mother_tongue" class="form-control" placeholder="Enter Mother Tongue" value="{(isset($student_info['mother_tongue'])) ? $student_info['mother_tongue'] : ''}"/>
                                            <label id="child_mother_tongue_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="child_blood_group_box">
                                            <label>Blood Group</label>
                                            <select name="child_blood_group" id="child_blood_group" class="form-control">
                                                <option value="0">--Select Blood Group--</option>
                                                {foreach $smarty.const.BLOOD_GROUP_LIST as $b}
                                                    <option value="{$b}" {(isset($student_info['blood_group']) && $student_info['blood_group'] == $b) ? 'selected' : ''}>{$b}</option>
                                                {/foreach}
                                            </select>
                                            <label id="child_blood_group_error_msg"></label>
                                        </div>
                                        <div class="col-md-4 form-group" id="child_indentification_mark_1_box">
                                            <label>Indentification Mark 1</label>
                                            <input type="text" name="child_indentification_mark_1" id="child_indentification_mark_1" class="form-control" placeholder="Enter Indentification Mark 1" value="{(isset($student_info['indentification_mark_1'])) ? $student_info['indentification_mark_1'] : ''}"/>
                                            <label id="child_indentification_mark_1_error_msg"></label>
                                        </div>
                                        <div class="col-md-4 form-group" id="child_indentification_mark_2_box">
                                            <label>Indentification Mark 2</label>
                                            <input type="text" name="child_indentification_mark_2" id="child_indentification_mark_2" class="form-control" placeholder="Enter Indentification Mark 2" value="{(isset($student_info['indentification_mark_2'])) ? $student_info['indentification_mark_2'] : ''}"/>
                                            <label id="child_indentification_mark_2_error_msg"></label>
                                        </div>
                                        <div class="col-md-12 form-group" id="child_remarks_box">
                                            <label>Remarks</label>
                                            <textarea class="form-control" name="child_remarks" id="child_remarks">{(isset($student_info['remarks'])) ? $student_info['remarks'] : ''}</textarea>
                                            <label id="child_remarks_error_msg"></label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary pull-right next_btn" data-step="1">Next</button>
                                </div>
                                <div id="father-information-part" class="content" role="tabpanel" aria-labelledby="father-information-part-trigger">
                                    <div class="row">
                                        <div class="col-md-2 form-group" id="father_first_name_box">
                                            <label>First Name<span class="text-red">*</span></label>
                                            <input type="hidden" name="father_id" id="father_id" value="{(isset($student_info['parents']['father']['student_parents_detail_id'])) ? $student_info['parents']['father']['student_parents_detail_id'] : '0'}"/>
                                            <input type="text" name="father_first_name" id="father_first_name" class="form-control" placeholder="Enter first name" value="{(isset($student_info['parents']['father']['first_name'])) ? $student_info['parents']['father']['first_name'] : ''}"/>
                                            <label id="father_first_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_middle_name_box">
                                            <label>Middle Name</label>
                                            <input type="text" name="father_middle_name" id="father_middle_name" class="form-control" placeholder="Enter middle name" value="{(isset($student_info['parents']['father']['middle_name'])) ? $student_info['parents']['father']['middle_name'] : ''}"/>
                                            <label id="father_middle_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_last_name_box">
                                            <label>Last Name</label>
                                            <input type="text" name="father_last_name" id="father_last_name" class="form-control" placeholder="Enter last name" value="{(isset($student_info['parents']['father']['last_name'])) ? $student_info['parents']['father']['last_name'] : ''}"/>
                                            <label id="father_last_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_email_id_box">
                                            <label>Email Id</label>
                                            <input type="text" name="father_email_id" id="father_email_id" class="form-control" placeholder="Enter email id" value="{(isset($student_info['parents']['father']['email_id'])) ? $student_info['parents']['father']['email_id'] : ''}"/>
                                            <label id="father_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_alt_email_id_box">
                                            <label>Alt Email Id</label>
                                            <input type="text" name="father_alt_email_id" id="father_alt_email_id" class="form-control" placeholder="Enter alternate email id" value="{(isset($student_info['parents']['father']['alt_email_id'])) ? $student_info['parents']['father']['alt_email_id'] : ''}"/>
                                            <label id="father_alt_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_contact_no_box">
                                            <label>Contact No</label>
                                            <input type="text" name="father_contact_no" id="father_contact_no" class="form-control" placeholder="Enter contact no" value="{(isset($student_info['parents']['father']['contact_no'])) ? $student_info['parents']['father']['contact_no'] : ''}"/>
                                            <label id="father_contact_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_alt_contact_no_box">
                                            <label>Alt. Contact No</label>
                                            <input type="text" name="father_alt_contact_no" id="father_alt_contact_no" class="form-control" placeholder="Enter alternate contact no" value="{(isset($student_info['parents']['father']['alt_contact_no'])) ? $student_info['parents']['father']['alt_contact_no'] : ''}"/>
                                            <label id="father_alt_contact_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_date_of_birth_box">
                                            <label>Date of birth</label>
                                            <input type="text" name="father_date_of_birth" id="father_date_of_birth" class="form-control" placeholder="Enter date of birth" value="{(isset($student_info['parents']['father']['date_of_birth']) && !empty($student_info['parents']['father']['date_of_birth'])) ? date('m/d/Y',strtotime($student_info['parents']['father']['date_of_birth'])) : ''}" readonly/>
                                            <label id="father_date_of_birth_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_education_id_box">
                                            <label>Education</label>
                                            <select name="father_education_id" id="father_education_id" class="form-control">
                                                <option value="0">--Select Education--</option>
                                                {if isset($education_type_list) && !empty($education_type_list)}
                                                    {foreach $education_type_list as $edu}
                                                        <option value="{$edu['education_type_id']}" {(isset($student_info['parents']['father']['education_type_id']) && $student_info['parents']['father']['education_type_id'] == $edu['education_type_id']) ? 'selected' : ''}>{$edu['education_type']}</option>
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
                                                        <option value="{$fot['occupation_type_id']}" {(isset($student_info['parents']['father']['occupation_type_id']) && $student_info['parents']['father']['occupation_type_id'] == $fot['occupation_type_id']) ? 'selected' : ''}>{$fot['occupation_type']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="father_occupation_type_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_document_type_id_box">
                                            <label>Document Type</label>
                                            <select name="father_document_type_id" id="father_document_type_id" class="form-control">
                                                <option value="0">--Select Document--</option>
                                                {if isset($document_type_list) && !empty($document_type_list)}
                                                    {foreach $document_type_list as $dt}
                                                        <option value="{$dt['document_id']}" {(isset($student_info['parents']['father']['document_type_id']) && $student_info['parents']['father']['document_type_id'] == $dt['document_id']) ? 'selected' : ''}>{$dt['document']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="father_document_type_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="father_document_no_box">
                                            <label>Document No</label>
                                            <input type="text" name="father_document_no" id="father_document_no" class="form-control" placeholder="Enter document no." value="{(isset($student_info['parents']['father']['document_no'])) ? $student_info['parents']['father']['document_no'] : ''}"/>
                                            <label id="father_document_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius:10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold;"><span>Residence Address</span></div>
                                                <div class="col-md-6 form-group" id="father_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="father_address_line_1" id="father_address_line_1" class="form-control" placeholder="Enter address line 1" value="{(isset($student_info['address_line_1'])) ? $student_info['address_line_1'] : ''}"/>
                                                    <label id="father_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="father_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="father_address_line_2" id="father_address_line_2" class="form-control" placeholder="Enter address line 2" value="{(isset($student_info['address_line_2'])) ? $student_info['address_line_2'] : ''}"/>
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
                                                    <input type="text" name="father_pincode" id="father_pincode" class="form-control" placeholder="Enter Pincode" value="{(isset($student_info['pincode'])) ? $student_info['pincode'] : ''}"/>
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
                                                    <input type="text" name="father_office_address_line_1" id="father_office_address_line_1" class="form-control" placeholder="Enter office address line 1" value="{(isset($student_info['parents']['father']['office_address_line_1'])) ? $student_info['parents']['father']['office_address_line_1'] : ''}"/>
                                                    <label id="father_office_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="father_office_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="father_office_address_line_2" id="father_office_address_line_2" class="form-control" placeholder="Enter office address line 2" value="{(isset($student_info['parents']['father']['office_address_line_2'])) ? $student_info['parents']['father']['office_address_line_2'] : ''}"/>
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
                                                    <input type="text" name="father_office_pincode" id="father_office_pincode" class="form-control" placeholder="Enter office Pincode" value="{(isset($student_info['parents']['father']['office_pincode'])) ? $student_info['parents']['father']['office_pincode'] : ''}"/>
                                                    <label id="father_pincode_error_smsg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group"></div>
                                    </div>
                                    <button class="btn btn-warning previous_btn">Previous</button>
                                    <button class="btn btn-primary pull-right next_btn" data-step="2">Next</button>
                                </div>
                                <div id="mother-information-part" class="content" role="tabpanel" aria-labelledby="mother-information-part-trigger">
                                    <div class="row">
                                        <div class="col-md-2 form-group" id="mother_first_name_box">
                                            <label>First Name<span class="text-red">*</span></label>
                                            <input type="hidden" name="mother_id" id="mother_id" value="{(isset($student_info['parents']['mother']['student_parents_detail_id'])) ? $student_info['parents']['mother']['student_parents_detail_id'] : '0'}"/>
                                            <input type="text" name="mother_first_name" id="mother_first_name" class="form-control" placeholder="Enter first name" value="{(isset($student_info['parents']['mother']['first_name'])) ? $student_info['parents']['mother']['first_name'] : ''}"/>
                                            <label id="mother_first_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_middle_name_box">
                                            <label>Middle Name</label>
                                            <input type="text" name="mother_middle_name" id="mother_middle_name" class="form-control" placeholder="Enter middle name" value="{(isset($student_info['parents']['mother']['middle_name'])) ? $student_info['parents']['mother']['middle_name'] : ''}"/>
                                            <label id="mother_middle_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_last_name_box">
                                            <label>Last Name</label>
                                            <input type="text" name="mother_last_name" id="mother_last_name" class="form-control" placeholder="Enter last name" value="{(isset($student_info['parents']['mother']['last_name'])) ? $student_info['parents']['mother']['last_name'] : ''}"/>
                                            <label id="mother_last_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_email_id_box">
                                            <label>Email Id</label>
                                            <input type="text" name="mother_email_id" id="mother_email_id" class="form-control" placeholder="Enter email id" value="{(isset($student_info['parents']['mother']['email_id'])) ? $student_info['parents']['mother']['email_id'] : ''}"/>
                                            <label id="mother_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_alt_email_id_box">
                                            <label>Alt Email Id</label>
                                            <input type="text" name="mother_alt_email_id" id="mother_alt_email_id" class="form-control" placeholder="Enter alternate email id" value="{(isset($student_info['parents']['mother']['alt_email_id'])) ? $student_info['parents']['mother']['alt_email_id'] : ''}"/>
                                            <label id="mother_alt_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_contact_no_box">
                                            <label>Contact No</label>
                                            <input type="text" name="mother_contact_no" id="mother_contact_no" class="form-control" placeholder="Enter contact no" value="{(isset($student_info['parents']['mother']['contact_no'])) ? $student_info['parents']['mother']['contact_no'] : ''}"/>
                                            <label id="mother_contact_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_alt_contact_no_box">
                                            <label>Alt. Contact No</label>
                                            <input type="text" name="mother_alt_contact_no" id="mother_alt_contact_no" class="form-control" placeholder="Enter alternate contact no" value="{(isset($student_info['parents']['mother']['alt_contact_no'])) ? $student_info['parents']['mother']['alt_contact_no'] : ''}"/>
                                            <label id="mother_alt_contact_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_date_of_birth_box">
                                            <label>Date of birth</label>
                                            <input type="text" name="mother_date_of_birth" id="mother_date_of_birth" class="form-control" placeholder="Enter date of birth" value="{(isset($student_info['parents']['mother']['date_of_birth']) && !empty($student_info['parents']['mother']['date_of_birth'])) ? date('m/d/Y',strtotime($student_info['parents']['mother']['date_of_birth'])) : ''}" readonly/>
                                            <label id="mother_date_of_birth_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_education_id_box">
                                            <label>Education</label>
                                            <select name="mother_education_id" id="mother_education_id" class="form-control">
                                                <option value="0">--Select Education--</option>
                                                {if isset($education_type_list) && !empty($education_type_list)}
                                                    {foreach $education_type_list as $edu}
                                                        <option value="{$edu['education_type_id']}" {(isset($student_info['parents']['mother']['education_type_id']) && $student_info['parents']['mother']['education_type_id'] == $edu['education_type_id']) ? 'selected' : ''}>{$edu['education_type']}</option>
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
                                                        <option value="{$mot['occupation_type_id']}" {(isset($student_info['parents']['mother']['occupation_type_id']) && $student_info['parents']['mother']['occupation_type_id'] == $mot['occupation_type_id']) ? 'selected' : ''}>{$mot['occupation_type']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="mother_occupation_type_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_document_type_id_box">
                                            <label>Document Type</label>
                                            <select name="mother_document_type_id" id="mother_document_type_id" class="form-control">
                                                <option value="0">--Select Document--</option>
                                                {if isset($document_type_list) && !empty($document_type_list)}
                                                    {foreach $document_type_list as $dt}
                                                        <option value="{$dt['document_id']}" {(isset($student_info['parents']['mother']['document_type_id']) && $student_info['parents']['mother']['document_type_id'] == $dt['document_id']) ? 'selected' : ''}>{$dt['document']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="mother_document_type_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="mother_document_no_box">
                                            <label>Document No</label>
                                            <input type="text" name="mother_document_no" id="mother_document_no" class="form-control" placeholder="Enter document no." value="{(isset($student_info['parents']['mother']['document_no'])) ? $student_info['parents']['mother']['document_no'] : ''}"/>
                                            <label id="mother_document_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius:10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold;"><span>Residence Address</span></div>
                                                <div class="col-md-6 form-group" id="mother_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="mother_address_line_1" id="mother_address_line_1" class="form-control" placeholder="Enter address line 1" value="{(isset($student_info['address_line_1'])) ? $student_info['address_line_1'] : ''}"/>
                                                    <label id="mother_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="mother_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="mother_address_line_2" id="mother_address_line_2" class="form-control" placeholder="Enter address line 2" value="{(isset($student_info['address_line_2'])) ? $student_info['address_line_2'] : ''}"/>
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
                                                    <input type="text" name="mother_pincode" id="mother_pincode" class="form-control" placeholder="Enter Pincode" value="{(isset($student_info['pincode'])) ? $student_info['pincode'] : ''}"/>
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
                                                    <input type="text" name="mother_office_address_line_1" id="mother_office_address_line_1" class="form-control" placeholder="Enter office address line 1" value="{(isset($student_info['parents']['mother']['office_address_line_1'])) ? $student_info['parents']['mother']['office_address_line_1'] : ''}"/>
                                                    <label id="mother_office_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="mother_office_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="mother_office_address_line_2" id="mother_office_address_line_2" class="form-control" placeholder="Enter office address line 2" value="{(isset($student_info['parents']['mother']['office_address_line_2'])) ? $student_info['parents']['mother']['office_address_line_2'] : ''}"/>
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
                                                    <input type="text" name="mother_office_pincode" id="mother_office_pincode" class="form-control" placeholder="Enter office Pincode" value="{(isset($student_info['parents']['mother']['office_pincode'])) ? $student_info['parents']['mother']['office_pincode'] : ''}"/>
                                                    <label id="mother_pincode_error_smsg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group"></div>
                                    </div>
                                    <button class="btn btn-warning previous_btn">Previous</button>
                                    <button class="btn btn-primary pull-right next_btn" data-step="3">Next</button>
                                </div>
                                <div id="guardian-information-part" class="content" role="tabpanel" aria-labelledby="guardian-information-part-trigger">
                                    <div class="row">
                                        <div class="col-md-2 form-group" id="guardian_relation_id_box">
                                            <label>Relation</label>
                                                <select name="guardian_relation_id" id="guardian_relation_id" class="form-control">
                                                    <option value="0">--Select Relation--</option>
                                                    {if isset($relation_type_list) && !empty($relation_type_list)}
                                                        {foreach $relation_type_list as $rl}
                                                            <option value="{$rl['relation_id']}" {(isset($student_info['parents']['guardian']['relation_id']) && $student_info['parents']['guardian']['relation_id'] == $rl['relation_id']) ? 'selected' : ''}>{$rl['relation']}</option>
                                                        {/foreach}
                                                    {/if}
                                                </select>
                                            <label id="guardian_relation_id_error_msg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_first_name_box">
                                            <label>First Name<span class="text-red">*</span></label>
                                            <input type="hidden" name="guardian_id" id="guardian_id" value="{(isset($student_info['parents']['guardian']['student_parents_detail_id'])) ? $student_info['parents']['guardian']['student_parents_detail_id'] : '0'}"/>
                                            <input type="text" name="guardian_first_name" id="guardian_first_name" class="form-control" placeholder="Enter first name" value="{(isset($student_info['parents']['guardian']['first_name'])) ? $student_info['parents']['guardian']['first_name'] : ''}"/>
                                            <label id="guardian_first_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_middle_name_box">
                                            <label>Middle Name</label>
                                            <input type="text" name="guardian_middle_name" id="guardian_middle_name" class="form-control" placeholder="Enter middle name" value="{(isset($student_info['parents']['guardian']['middle_name'])) ? $student_info['parents']['guardian']['middle_name'] : ''}"/>
                                            <label id="guardian_middle_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_last_name_box">
                                            <label>Last Name</label>
                                            <input type="text" name="guardian_last_name" id="guardian_last_name" class="form-control" placeholder="Enter last name" value="{(isset($student_info['parents']['guardian']['last_name'])) ? $student_info['parents']['guardian']['last_name'] : ''}"/>
                                            <label id="guardian_last_name_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_email_id_box">
                                            <label>Email Id</label>
                                            <input type="text" name="guardian_email_id" id="guardian_email_id" class="form-control" placeholder="Enter email id" value="{(isset($student_info['parents']['guardian']['email_id'])) ? $student_info['parents']['guardian']['email_id'] : ''}"/>
                                            <label id="guardian_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_alt_email_id_box">
                                            <label>Alt Email Id</label>
                                            <input type="text" name="guardian_alt_email_id" id="guardian_alt_email_id" class="form-control" placeholder="Enter alternate email id" value="{(isset($student_info['parents']['guardian']['alt_email_id'])) ? $student_info['parents']['guardian']['alt_email_id'] : ''}"/>
                                            <label id="guardian_alt_email_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_contact_no_box">
                                            <label>Contact No</label>
                                            <input type="text" name="guardian_contact_no" id="guardian_contact_no" class="form-control" placeholder="Enter contact no" value="{(isset($student_info['parents']['guardian']['contact_no'])) ? $student_info['parents']['guardian']['contact_no'] : ''}"/>
                                            <label id="guardian_contact_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_alt_contact_no_box">
                                            <label>Alt. Contact No</label>
                                            <input type="text" name="guardian_alt_contact_no" id="guardian_alt_contact_no" class="form-control" placeholder="Enter alternate contact no" value="{(isset($student_info['parents']['guardian']['alt_contact_no'])) ? $student_info['parents']['guardian']['alt_contact_no'] : ''}
                                            "/>
                                            <label id="guardian_alt_contact_no_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_date_of_birth_box">
                                            <label>Date of birth</label>
                                            <input type="text" name="guardian_date_of_birth" id="guardian_date_of_birth" class="form-control" placeholder="Enter date of birth" value="{(isset($student_info['parents']['guardian']['date_of_birth']) && !empty($student_info['parents']['guardian']['date_of_birth'])) ? date('m/d/Y',strtotime($student_info['parents']['guardian']['date_of_birth'])) : ''}" readonly/>
                                            <label id="guardian_date_of_birth_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_education_id_box">
                                            <label>Education</label>
                                            <select name="guardian_education_id" id="guardian_education_id" class="form-control">
                                                <option value="0">--Select Education--</option>
                                                {if isset($education_type_list) && !empty($education_type_list)}
                                                    {foreach $education_type_list as $edu}
                                                        <option value="{$edu['education_type_id']}" {(isset($student_info['parents']['guardian']['education_type_id']) && $student_info['parents']['guardian']['education_type_id'] == $edu['education_type_id']) ? 'selected' : ''}>{$edu['education_type']}</option>
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
                                                        <option value="{$fot['occupation_type_id']}" {(isset($student_info['parents']['guardian']['occupation_type_id']) && $student_info['parents']['guardian']['occupation_type_id'] == $fot['occupation_type_id']) ? 'selected' : ''}>{$fot['occupation_type']}</option>
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
                                                {if isset($document_type_list) && !empty($document_type_list)}
                                                    {foreach $document_type_list as $dt}
                                                        <option value="{$dt['document_id']}" {(isset($student_info['parents']['guardian']['document_type_id']) && $student_info['parents']['guardian']['document_type_id'] == $dt['document_id']) ? 'selected' : ''}>{$dt['document']}</option>
                                                    {/foreach}
                                                {/if}
                                            </select>
                                            <label id="guardian_document_type_id_error_smsg"></label>
                                        </div>
                                        <div class="col-md-2 form-group" id="guardian_document_no_box">
                                            <label>Document No</label>
                                            <input type="text" name="guardian_document_no" id="guardian_document_no" class="form-control" placeholder="Enter document no." value="{(isset($student_info['parents']['guardian']['document_no'])) ? $student_info['parents']['guardian']['document_no'] : ''}"/>
                                            <label id="guardian_document_no_error_smsg"></label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6" style="border:1px solid #ccc; border-radius:10px;">
                                            <div class="row">
                                                <div class="col-md-12 text-center" style="font-weight:bold;"><span>Residence Address</span></div>
                                                <div class="col-md-6 form-group" id="guardian_address_line_1_box">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="guardian_address_line_1" id="guardian_address_line_1" class="form-control" placeholder="Enter address line 1" value="{(isset($student_info['parents']['guardian']['address_line_1'])) ? $student_info['parents']['guardian']['address_line_1'] : ''}"/>
                                                    <label id="guardian_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="guardian_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="guardian_address_line_2" id="guardian_address_line_2" class="form-control" placeholder="Enter address line 2" value="{(isset($student_info['parents']['guardian']['address_line_2'])) ? $student_info['parents']['guardian']['address_line_2'] : ''}"/>
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
                                                    <input type="text" name="guardian_pincode" id="guardian_pincode" class="form-control" placeholder="Enter Pincode" value="{(isset($student_info['parents']['guardian']['pincode'])) ? $student_info['parents']['guardian']['pincode'] : ''}"/>
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
                                                    <input type="text" name="guardian_office_address_line_1" id="guardian_office_address_line_1" class="form-control" placeholder="Enter office address line 1" value="{(isset($student_info['parents']['guardian']['office_address_line_1'])) ? $student_info['parents']['guardian']['office_address_line_1'] : ''}"/>
                                                    <label id="guardian_office_address_line_1_error_msg"></label>
                                                </div>
                                                <div class="col-md-6 form-group" id="guardian_office_address_line_2_box">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="guardian_office_address_line_2" id="guardian_office_address_line_2" class="form-control" placeholder="Enter office address line 2" value="{(isset($student_info['parents']['guardian']['office_address_line_2'])) ? $student_info['parents']['guardian']['office_address_line_2'] : ''}"/>
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
                                                    <input type="text" name="guardian_office_pincode" id="guardian_office_pincode" class="form-control" placeholder="Enter office Pincode" value="{(isset($student_info['parents']['guardian']['office_pincode'])) ? $student_info['parents']['guardian']['office_pincode'] : ''}"/>
                                                    <label id="guardian_pincode_error_smsg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group"></div>
                                    </div>
                                    <button class="btn btn-primary previous_btn">Previous</button>
                                    <button class="btn btn-primary pull-right next_btn" data-step="4">Next</button>
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
                                                                {if isset($document_type_list) && !empty($document_type_list)}
                                                                    {foreach $document_type_list as $dt}
                                                                        <option value="{$dt['document_id']}">{$dt['document']}</option>
                                                                    {/foreach}
                                                                {/if}
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="child_document_no" id="child_document_no_1" class="form-control" placeholder="Enter Document No"/>
                                                        </td>
                                                        <td>
                                                            <input type="file" name="child_document_file" id="child_document_file_1" class="form-control" onchange="encodeImagetoBase64(this,'child_document_file_base64_1')"/>
                                                            <input type="hidden" name="child_document_file_base64" id="child_document_file_base64_1"/>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12 form-group">
                                                <table class="table table-bordered">
                                                    <thead>
                                                            <tr>
                                                                <th>S.No.</th>
                                                                <th>Document Name</th>
                                                                <th>Document No</th>
                                                                <th>Document File</th>
                                                                <th>#</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                        {if isset($student_info['documents']) && !empty($student_info['documents'])}
                                                            {foreach $student_info['documents'] as $upd}
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>{$upd['document']}</td>
                                                                    <td>{$upd['document_no']}</td>
                                                                    <td>
                                                                        {if !empty($upd['document_file_name'])}
                                                                            <a download="{$upd['document_file_name']}" class="btn btn-default">
                                                                                <i class="fa fa-cloud-download"></i>
                                                                            </a>
                                                                        {/if}
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn" style="background:none" data-sdid="{$upd['student_document_id']}" data-at="3"><i class="fa fa-trash text-red"></i></button>
                                                                    </td>
                                                                </tr>
                                                            {/foreach}
                                                        {/if}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-warning previous_btn">Previous</button>
                                    <button type="submit" class="btn btn-primary pull-right next_btn" data-step="5">Next</button>
                                </div>
                                <div id="assignment-part" class="content" role="tabpanel" aria-labelledby="assignment-part-trigger">
                                    <button class="btn btn-warning previous_btn">Previous</button>
                                    <button type="submit" class="btn btn-primary pull-right next_btn" data-step="6">Next</button>
                                </div>
                                <div id="fee-calculation-part" class="content" role="tabpanel" aria-labelledby="fee-calculation-part-trigger">
                                    <div class="col-md-12">
                                        <div class="col-md-6 col-md-offset-3">
                                            <table class="table table-bordered small_table">
                                                <thead style="background-color: #3c8dbc; border-color: #3c8dbc; color:white">
                                                    <tr>
                                                        <th class="text-center">Fee Head</th>
                                                        <th class="text-center">Frequency</th>
                                                        <th class="text-center">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {if isset($branch_fee_structure) && !empty($branch_fee_structure)}
                                                        {foreach $branch_fee_structure as $bfs}
                                                            <tr>
                                                                <td>{$bfs['structure_name']}</td>
                                                                <td>
                                                                    <input type="number" name="fee_amount_{$bfs['fee_structure_master_id']}" id="fee_amount_{$bfs['fee_structure_master_id']}" class="form-control" value="{$bfs['fee_amount']}"/>
                                                                </td>
                                                                <td>
                                                                    <select name="fee_type_{$bfs['fee_structure_master_id']}" id="fee_type_{$bfs['fee_structure_master_id']}" class="form-control">
                                                                        <option value="0">--Select--</option>
                                                                        <option value="Annual" {($bfs['fee_type'] == 'Annual') ? 'selected' : ''}>Annual</option>
                                                                        <option value="Monthly" {($bfs['fee_type'] == 'Monthly') ? 'selected' : ''}>Monthly</option>
                                                                        <option value="Quarterly" {($bfs['fee_type'] == 'Quarterly') ? 'selected' : ''}>Quarterly</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        {/foreach}
                                                    {/if}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button class="btn btn-warning previous_btn">Previous</button>
                                    <button type="submit" class="btn btn-primary pull-right final_btn" data-step="7">Submit</button>
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
function get_state_list(id){
    var select_state_id = 0;
    if(id == 'child_state_id'){
        select_state_id = {(isset($student_info['state_id'])) ? $student_info['state_id'] : 0};
    }else if(id == 'child_permanent_state_id'){
        select_state_id = {(isset($student_info['permanent_state_id'])) ? $student_info['permanent_state_id'] : 0};
    }else if(id == 'father_state_id'){
        select_state_id = {(isset($student_info['state_id'])) ? $student_info['state_id'] : 0};
    }else if(id == 'father_office_state_id'){
        select_state_id = {(isset($student_info['parents']['father']['office_state_id'])) ? $student_info['parents']['father']['office_state_id'] : 0};
    }else if(id == 'mother_state_id'){
        select_state_id = {(isset($student_info['state_id'])) ? $student_info['state_id'] : 0};
    }else if(id == 'mother_office_state_id'){
        select_state_id = {(isset($student_info['parents']['mother']['office_state_id'])) ? $student_info['parents']['mother']['office_state_id'] : 0};
    }else if(id == 'guardian_state_id'){
        select_state_id = {(isset($student_info['parents']['guardian']['state_id'])) ? $student_info['parents']['guardian']['state_id'] : 0};
    }else if(id == 'guardian_office_state_id'){
        select_state_id = {(isset($student_info['parents']['guardian']['office_state_id'])) ? $student_info['parents']['guardian']['office_state_id'] : 0};
    }
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
            var selected = '';
            if(v.state_id == select_state_id){
                selected = 'selected';
            }
            $('#'+id).append("<option value='"+v.state_id+"' data-sc='"+v.state_code+"' "+selected+">"+v.state_name+"</option>");
        });
        $('#'+id).trigger('change');
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
    var selected_city_id = 0;
    if(target_id == 'child_city_id'){
        selected_city_id = {(isset($student_info['city_id'])) ? $student_info['city_id'] : 0};
    }else if(target_id == 'child_permanent_city_id'){
        selected_city_id = {(isset($student_info['permanent_city_id'])) ? $student_info['permanent_city_id'] : 0};
    }else if(target_id == 'father_city_id'){
        selected_city_id = {(isset($student_info['city_id'])) ? $student_info['city_id'] : 0};
    }else if(target_id == 'father_office_city_id'){
        selected_city_id = {(isset($student_info['parents']['father']['office_city_id'])) ? $student_info['parents']['father']['office_city_id'] : 0};
    }else if(target_id == 'mother_city_id'){
        selected_city_id = {(isset($student_info['city_id'])) ? $student_info['city_id'] : 0};
    }else if(target_id == 'mother_office_city_id'){
        selected_city_id = {(isset($student_info['parents']['mother']['office_city_id'])) ? $student_info['parents']['mother']['office_city_id'] : 0};
    }else if(target_id == 'guardian_city_id'){
        selected_city_id = {(isset($student_info['parents']['guardian']['city_id'])) ? $student_info['parents']['guardian']['city_id'] : 0};
    }else if(target_id == 'guardian_office_city_id'){
        selected_city_id = {(isset($student_info['parents']['guardian']['office_city_id'])) ? $student_info['parents']['guardian']['office_city_id'] : 0};
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
            var selected = '';
            if(v.city_id == selected_city_id){
                selected = 'selected';
            }
            $('#'+target_id).append("<option value='"+v.city_id+"' "+selected+">"+v.city_name+"</option>");
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
    var selected_area_id = 0;
    if(target_id == 'child_area_id'){
        selected_area_id = {(isset($student_info['area_id'])) ? $student_info['area_id'] : 0};
    }else if(target_id == 'child_permanent_area_id'){
        selected_area_id = {(isset($student_info['permanent_area_id'])) ? $student_info['permanent_area_id'] : 0};
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
            var selected = '';
            if(v.area_master_id == selected_area_id){
                selected = 'selected';
            }
            $('#'+target_id).append("<option value='"+v.area_master_id+"' "+selected+">"+v.area_name+"</option>");
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
    var child_date_of_birth_box = $('#child_date_of_birth').datepicker({

    });
    var father_date_of_birth_box = $('#father_date_of_birth').datepicker({

    });
    var mother_date_of_birth_box = $('#mother_date_of_birth').datepicker({

    });
    var guardian_date_of_birth_box = $('#guardian_date_of_birth').datepicker({

    });
    var class_box = $('#class_id').select2({
        width : '100%'
    });
    var child_categoty_box = $('#child_categoty_id').select2({
        width : '100%'
    });
    var child_nationality_box = $('#child_nationality_id').select2({
        width : '100%'
    });
    var child_religion_box = $('#child_religion_id').select2({
        width : '100%'
    });

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
    var father_state_box = $('#father_state_id').select2({
        width : '100%'
    });
    var father_office_state_box = $('#father_office_state_id').select2({
        width : '100%'
    });
    var father_city_box = $('#father_city_id').select2({
        width : '100%'
    });
    var father_office_city_box = $('#father_office_city_id').select2({
        width : '100%'
    });
    
    var mother_state_box = $('#mother_state_id').select2({
        width : '100%'
    });
    var mother_office_state_box = $('#mother_office_state_id').select2({
        width : '100%'
    });
    var mother_city_box = $('#mother_city_id').select2({
        width : '100%'
    });
    var mother_office_city_box = $('#mother_office_city_id').select2({
        width : '100%'
    });

    var guardian_state_box = $('#guardian_state_id').select2({
        width : '100%'
    });
    var guardian_office_state_box = $('#guardian_office_state_id').select2({
        width : '100%'
    });
    var guardian_city_box = $('#guardian_city_id').select2({
        width : '100%'
    });
    var guardian_office_city_box = $('#guardian_office_city_id').select2({
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
    $('.when_alumni').hide();
    $('.when_siblings').hide();
    $(document).on('click', '#is_any_siblings', function(){
        $('.when_siblings').hide();
        if($(this).is(':checked')){
            $('.when_siblings').show();
        }
    });
    $(document).on('click', '#is_any_alumni', function(){
        $('.when_alumni').hide();
        if($(this).is(':checked')){
            $('.when_alumni').show();
        }
    });
    $(document).on('click','.previous_btn',function(){
        stepper.previous();
    });
    $(document).on('click','.next_btn',function(){
        var step_no = $(this).data('step');
        stepper.next();
    });
});
</script>
<script>
    $(document.body).addClass('sidebar-collapse');
    $(document.body).addClass('fixed');
    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });
</script>