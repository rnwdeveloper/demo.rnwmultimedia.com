<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
<style type="text/css">
   .select2-container--default .select2-selection--multiple .select2-selection__choice {
   background-color: #2255a4;
   color: white;
   border: 1px solid #aaa;
   border-radius: 4px;
   cursor: default;
   float: left;
   margin-right: 5px;
   margin-top: 5px;
   padding: 0 5px;
   }
   /*.select2-container--default .select2-selection--multiple {
   line-height: 27px;
   }*/
   .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
   list-style: none;
   }
</style>
<style type="text/css">
   .modal-header{
   background-color: #315a7d;
   }
   .modal-title{
   color: white;
   }
   .t1{
   background-color: #7460ee;
   color: white;
   }
</style>
<main style="margin-left: -30px;" class="main_content d-inline-block">
<!-- <section class="page_title_block d-inline-block w-100 position-relative pb-0">
   <div class="container-fluid">
   
     <div class="row">
   
       <div class="col-lg-12">
   
         <div class="page_heading">
   
           <h1>Batch Created</h1>
   
         </div>
   
       </div>
   
     </div>
   
   </div>
   
   </section> -->
<section class="all_demo_student_block Add_New_Addmision_page_2 d-inline-block w-100 position-relative pb-0">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="accordion" id="student_list_aoc">
               <div id="data_insert_msg">
                  <div class="card">
                     <div class="card-header mb-0" style="background-color: #0b527e;">
                        <h2 class="mb-0">
                           <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_4" aria-expanded="false">
                           Admission Update<span class="d-inline-block float-right pluse_icon">✕</span>
                           </button>
                        </h2>
                     </div>
                     <div id="student_filter_panel_4" class="collapse show">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-xl-12">
                                 <form  enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/admission_update">
                                    <input type="hidden" name="id" value="<?php if(!empty($admission->admission_id)) { echo $admission->admission_id; } ?>"/>
                                    <div class="simple_border_box_design">
                                       <span class="addmision_process_top_title">Communication</span>
                                       <div class="row">
                                          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                             <div class="form-group">
                                                <label>Mobile No:</label>
                                                <input type="text" name="mobile_no" id="mobile_no" placeholder="Mobile No" class="form-control custom-form-control" value="<?php echo @$admission->mobile_no; ?>">
                                             </div>
                                          </div>
                                          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                             <div class="form-group">
                                                <label>Alternet No:</label>
                                                <input type="text" name="alternate_mobile_no" id="alternate_number" placeholder="Alternet No" class="form-control custom-form-control" value="<?php echo @$admission->alternate_mobile_no; ?>" >
                                             </div>
                                          </div>
                                          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                             <div class="form-group">
                                                <label>Email:</label>
                                                <input type="email" name="email" id="email" placeholder="Email" value="<?php echo @$admission->email; ?>" class="form-control custom-form-control">
                                             </div>
                                          </div>
                                          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                             <div class="form-group" id="source_data">
                                                <label>Source:</label>
                                                <select class="form-control custom-form-control" name="source_id" id="source_id">
                                                   <option value="">Select Source</option>
                                                   <?php foreach($list_source as $ld) { ?>
                                                   <option <?php if($ld->source_name==@$admission->source_id) { echo "selected"; } ?> value="<?php echo $ld->source_name; ?>"><?php echo $ld->source_name; ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                           <div class="row">
                           <div class="col-xl-12">
                           <div class="simple_border_box_design">
                           <span class="addmision_process_top_title">Personal Details</span>
                           <div class="row">
                           <form  enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/admission_update" >
                           <input type="hidden" name="update_id" value="<?php echo @$admission->admission_id; ?>"/>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label for="email">First Name:</label>
                           <input type="text" name="first_name" id="first_name" value="<?php echo @$admission->first_name; ?>" placeholder="First Name" class="form-control custom-form-control" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label for="email">Surname:</label>
                           <input type="text" name="surname" id="surname" value="<?php echo @$admission->surname; ?>" placeholder="Surname" class="form-control custom-form-control" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group" id="branch_data">
                           <label>Branch Name:</label>
                           <select class="form-control custom-form-control" name="admission_branch" id="admission_branch">
                           <option value="">Select branch</option>
                           <?php foreach($list_branch as $ld) { ?>
                           <option <?php if($ld->branch_id==@$admission->branch_id) { echo "selected"; } ?>
                              value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                           <?php } ?>  
                           </select>
                           </div>
                           </div>
                           <?php $addby =  $_SESSION['Admin']['username']; ?>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label for="email">Assigned To:</label>
                           <input type="text" name="addby" id="addby" value="<?php if(isset($addby)){ echo $addby; } ?>" placeholder="Assigned To" class="form-control custom-form-control" />
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                           <div class="row">
                           <div class="col-xl-12">
                           <div class="simple_border_box_design">
                           <span class="addmision_process_top_title">Course & Fees</span>
                           <div class="row">
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group" id="branch_data">
                           <label>Branch Name:</label>
                           <select class="form-control custom-form-control" name="branch_id" id="branch_id">
                           <option value="">Select branch</option>
                           <?php foreach($list_branch as $ld) { ?>
                           <option <?php if($ld->branch_id==@$admission->branch_id) { echo "selected"; } ?>
                              value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                           <?php } ?>  
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Session</label>                                    
                           <select class="form-control custom-form-control" name="no_year" id="session" >
                           <option value="0">Select Session</option>
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 select_course_package1">
                           <div class="form-group" id="department_data">
                           <label>Department:</label>
                           <select class="select2 form-control custom-form-control" name="department_id[]" id="department_id" multiple="multiple">
                           <option value="">Select Department</option>
                           <?php foreach($list_department as $ld) { ?>
                           <option <?php if($ld->department_id==@$admission->department_id) { echo "selected"; } ?>
                              value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                           <?php } ?>
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Course Category</label>
                           <ul>
                           <li class="d-inline-block mr-3 mr-mr-0">
                           <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" id="course_package" name="type" value="package" <?php if(@$admission->type=="package") { echo "checked"; } ?> onclick="return show_hide_package_course()" />Package
                           </div>
                           <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" id="course_single" name="type"  value="single" <?php if(@$admission->type=="single") { echo "checked"; } ?> onclick="return show_hide_package_course()"/>Single
                           </div>
                           </li>
                           </ul>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 select_course_package">
                           <div class="form-group">
                           <label>Select Package*</label>
                           <select class="select2 form-control custom-form-control" name="course_or_package[]" id="course_orpackage" multiple="multiple">
                           <option value="">Select Package</option>
                           <?php foreach($list_package as $lp) { ?>
                           <option <?php if($lp->package_id==@$admission->package_id) { echo "selected"; } ?>
                              value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                           <?php } ?> 
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 select_course_single" >
                           <div class="form-group">
                           <label>Select Course*</label>
                           <select class="select2 form-control custom-form-control" name="course_or_single[]" id="course_orsingle" multiple="multiple">
                           <option value="">Select Course</option>
                           <?php foreach($list_course as $lp) { ?>
                           <option <?php if($lp->course_id==@$admission->course_id) { echo "selected"; } ?>
                              value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
                           <?php } ?> 
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Assign To:</label>                                  
                           <select class="form-control custom-form-control" name="faculty_id" id="faculty_id">
                           <option value="0">Select faculty</option>
                           <?php foreach($faculty_all as $lp) { ?>
                           <option <?php if($lp->faculty_id==@$admission->faculty_id) { echo "selected"; } ?>
                              value="<?php echo $lp->faculty_id; ?>"><?php echo $lp->name; ?></option>
                           <?php } ?>
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Batch:</label>                                  
                           <select class="form-control custom-form-control" name="batch_id" id="batch_id">
                           <option value="0">Select Batch</option>
                           <?php foreach($list_batch as $lp) { ?>
                           <option <?php if($lp->batch_id==@$admission->batch_id) { echo "selected"; } ?>
                              value="<?php echo $lp->batch_id; ?>"><?php echo $lp->batch_name; ?></option>
                           <?php } ?>
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label for="text">Tution Fees:</label>
                           <input type="text" name="tuation_fees" id="tuation_fees" value="<?php echo @$admission->tuation_fees; ?>" placeholder="Tution Fees" class="form-control custom-form-control" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label for="text">Registration Fees:</label>
                           <input type="text" name="registration_fees" id="registration_fees" value="<?php echo @$admission->registration_fees; ?>" placeholder="Registration Fees" class="form-control custom-form-control" />
                           </div>
                           </div> 
                           </div>
                           </div>
                           </div>
                           </div>
                           <div class="row">
                           <div class="col-xl-12">
                           <form  enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/Admissionprocess" id="admission_form_validation">
                           <input type="hidden" name="update_id" id="admission_id">
                           <div class="simple_border_box_design">
                           <span class="addmision_process_top_title">Postal Communication</span>
                           <div class="row">
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group" id="state_data">
                           <label>State:</label>
                           <select class="form-control custom-form-control" name="state_id" id="state_id">
                           <option value="">Select State</option>
                           <?php foreach($list_state as $val) { ?>
                           <option <?php if($val->state_name==@$admission->state_id) { echo "selected"; } ?>
                              value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
                           <?php } ?>  
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>City:</label>
                           <select class="form-control custom-form-control" name="city_id" id="city_id">
                           <option value="">Select City</option>
                           <?php foreach($list_city as $val) { ?>
                           <option <?php if($val->city_name==@$admission->city_id) { echo "selected"; } ?>
                              value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
                           <?php } ?>  
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Area:</label>
                           <select class="form-control custom-form-control" name="area_id" id="area_id">
                           <option value="">Select Area</option>
                           <?php foreach($list_area as $ld) { ?>
                           <option <?php if($ld->area_id==@$admission->area_id) { echo "selected"; } ?>
                              value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
                           <?php } ?>  
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Pin Code:</label>
                           <input type="text" name="pin_code" value="<?php echo @$admission->pin_code; ?>" placeholder="Pin Code" class="form-control custom-form-control"/>  
                           </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Present Address:</label>
                           <textarea class="form-control" name="present_address"  placeholder="Present Address..."><?php echo @$admission->present_address; ?></textarea>
                           </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Permanent Address:</label>
                           <textarea class="form-control" name="permanent_address" placeholder="Permanent Address..."><?php echo @$admission->permanent_address; ?></textarea>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                           <div class="row">
                           <div class="col-xl-12">
                           <div class="simple_border_box_design">
                           <span class="addmision_process_top_title">Parents Details</span>
                           <div class="row">
                           <div class="col-xl-12 mb-2">
                           <h5>Guardian 1 Details</h5>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Name:</label>
                           <input type="text" name="father_name" value="<?php echo @$admission->father_name; ?>" id="father_name" class="form-control custom-form-control" placeholder="Father Name" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Email:</label>
                           <input type="email" name="father_email" value="<?php echo @$admission->father_email; ?>"  placeholder="Email Id" class="form-control custom-form-control" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Father Mobile No:</label>
                           <input type="text" name="father_mobile_no" value="<?php echo @$admission->father_mobile_no; ?>" id="father_mobile_no" placeholder="Phone Number" class="form-control custom-form-control" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Occupation:</label>
                           <input type="text" name="father_occupation" value="<?php echo @$admission->father_occupation; ?>" placeholder="Occupation" class="form-control custom-form-control" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Income:</label>
                           <input type="text" name="father_income" value="<?php echo @$admission->father_income; ?>" placeholder="Father Income" class="form-control custom-form-control" />
                           </div>
                           </div>
                           <div class="col-xl-12 mb-2">
                           <h5>Guardian 2 Details</h5>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Name:</label>
                           <input type="text" name="mother_name" value="<?php echo @$admission->mother_name; ?>" id="mother_mobile_no" class="form-control custom-form-control" placeholder="First Name" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Email:</label>
                           <input type="email" name="mother_email" value="<?php echo @$admission->mother_email; ?>" placeholder="Email Id" class="form-control custom-form-control" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Mother Mobile No:</label>
                           <input type="text" name="mother_mobile_no" value="<?php echo @$admission->mother_mobile_no; ?>" placeholder="Phone Number" class="form-control custom-form-control" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Occupation:</label>
                           <input type="text" name="mother_occupation" value="<?php echo @$admission->mother_occupation; ?>" placeholder="Mather Occupation" class="form-control custom-form-control">
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Income:</label>
                           <input type="text" name="mother_income" value="<?php echo @$admission->mother_income; ?>" placeholder="Mather Income" class="form-control custom-form-control" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Send Email</label>
                           <ul>
                           <li class="d-inline-block mr-3 mr-mr-0">
                           <div class="form-check form-check-inline">
                           <input type="radio"   name="admission_msg_email" value="Yes" <?php if(@$admission->admission_msg_email=="Yes") { echo "checked"; } ?> placeholder="content">Yes
                           </div>
                           <div class="form-check form-check-inline">
                           <input type="radio"  name="admission_msg_email" value="No" <?php if(@$admission->admission_msg_email=="No") { echo "checked"; } ?> placeholder="content">No
                           </div>
                           </li>
                           </ul>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Send SMS</label>
                           <ul>
                           <li class="d-inline-block mr-3 mr-mr-0">
                           <div class="form-check form-check-inline">
                           <input type="radio"  name="admission_msg_mobile" value="Yes" <?php if(@$admission->admission_msg_mobile=="Yes") { echo "checked"; } ?> placeholder="content">Yes
                           </div>
                           <div class="form-check form-check-inline">
                           <input type="radio"  name="admission_msg_mobile" value="No" <?php if(@$admission->admission_msg_mobile=="No") { echo "checked"; } ?> placeholder="content">No
                           </div>
                           </li>
                           </ul>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                           <div class="row">
                           <div class="col-xl-12">
                           <div class="simple_border_box_design">
                           <span class="addmision_process_top_title">Education & Proffasion</span>
                           <div class="row">
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>College / school Name</label>
                           <input type="text" name="school_collage_name" value="<?php echo @$admission->school_collage_name; ?>" placeholder="College / Scholl Name" class="form-control custom-form-control" />
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Country:</label>
                           <select class="form-control custom-form-control" name="country_id" id="country_id">
                           <option value="">Select Country</option>
                           <?php foreach($list_country as $val) { ?>
                           <option <?php if($val->country_name==@$admission->country_id) { echo "selected"; } ?>
                              value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
                           <?php } ?>  
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>State:</label>
                           <select class="form-control custom-form-control" name="school_clg_state" id="school_clg_state">
                           <option value="">Select State</option>
                           <?php foreach($list_state as $val) { ?>
                           <option <?php if($val->state_name==@$admission->school_clg_state) { echo "selected"; } ?>
                              value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
                           <?php } ?>  
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>City:</label>
                           <select class="form-control custom-form-control" name="school_clg_city" id="school_clg_city">
                           <option value="">Select City</option>
                           <?php foreach($list_city as $val) { ?>
                           <option <?php if($val->city_name==@$admission->school_clg_city) { echo "selected"; } ?>
                              value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
                           <?php }  ?>
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Area:</label>
                           <select class="form-control custom-form-control" name="school_clg_area" id="school_clg_area">
                           <option value="">Select Area</option>
                           <?php foreach($list_area as $ld) { ?>
                           <option <?php if($ld->area_id==@$admission->school_clg_area) { echo "selected"; } ?>
                              value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
                           <?php } ?>  
                           </select>
                           </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                           <div class="form-group">
                           <label>Type</label>
                           <ul>
                           <li class="d-inline-block mr-3 mr-mr-0">
                           <div class="form-check form-check-inline">
                           <input type="radio"  name="school_collage_type"  value="school" <?php if(@$admission->school_collage_type=="school") { echo "checked"; } ?>  placeholder="content">School
                           </div>
                           <div class="form-check form-check-inline">
                           <input type="radio"  name="school_collage_type"  value="college" <?php if(@$admission->school_collage_type=="college") { echo "checked"; } ?> placeholder="content">College
                           </div>
                           </li> 
                           </ul>
                           </div>
                           </div>
                           <div class="col-xl-12">
                           <div class="form-group">
                           <button type="submit" value="submit" name="submit" class="btn btn-primary">Update</button>
                           </div>
                           </div> 
                           </form>
                           </div>
                           </div>
                           </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>
<script>
   //***********************************//
   
   // For select 2
   
   //***********************************//
   
   $(".select2").select2();
   
   
   
   /*colorpicker*/
   
   $('.demo').each(function() {
   
   //
   
   // Dear reader, it's actually very easy to initialize MiniColors. For example:
   
   //
   
   //  $(selector).minicolors();
   
   //
   
   // The way I've done it below is just for the demo, so don't get confused
   
   // by it. Also, data- attributes aren't supported at this time...they're
   
   // only used for this demo.
   
   //
   $(this).minicolors({
           control: $(this).attr('data-control') || 'hue',
           position: $(this).attr('data-position') || 'bottom left',
           change: function(value, opacity) {
               if (!value) return;
               if (opacity) value += ', ' + opacity;
               if (typeof console === 'object') {
                   console.log(value);
               }
           },
           theme: 'bootstrap'
       });
   });
</script>
<script>
   function show_hide_package_course(){
     var course_package = $("input[name='quick_course_package']:checked").val();
     //alert(course_package);
     if(course_package == 'single'){
       $('.select_course_single').show();
       $('.select_course_package').hide(); 
     }else{
       $('.select_course_single').hide();
       $('.select_course_package').show();
   
     }
   }
</script>