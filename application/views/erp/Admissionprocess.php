<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
   margin-top: 1px;
   padding:5px !important;
   font-size: 12px !important;
   line-height: 1 !important;
   }
   .select2-container--default .select2-results__option--highlighted[aria-selected]{
   font-size: 12px !important;
   }
   .select2-container--default .select2-selection--multiple{
   line-height: 1 !important;
   }
   .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
   list-style: none;
   }
</style>
<style type="text/css">
   .modal-header{
   background-color: #0b527e;
   }
   .modal-title{			
   color: white;
   }
   label{
   font-size: 12px;
   margin-bottom: 5px !important;
   }
   .form-control{
   height: 24px !important;
   font-size: 12px !important;
   padding: 0 0 0 10px;
   }
   select.form-control:not([size]):not([multiple]) {
   height: calc(1.7rem + 2px);
   }
   .form-group{
   margin-bottom: 5px;
   }
   .simple_border_box_design .form-group{
   display:block;
   }
   .number{
   border: 0;
   }
</style>
<main class="main_content d-inline-block">
   <section class="new_letest_addmision_process_block d-inline-block w-100 position-relative pb-0">
      <div class="container-fluid">
         <?php if(@$this->session->flashdata('msg_alert')) { ?>
         <div class="col-md-4" >
            <div id="yellow" class="alert alert-success" role="alert">
               <?php echo $this->session->flashdata('msg_alert'); ?>
            </div>
         </div>
         <?php } ?>
         <span class="form_one d-flex">
            <div class="card card-statistic p-3 mb-3 col-xl-8 col-lg-8 col-md-12 col-sm-12 d-flex">
               <form  id="form_validation" method="post" name="form_validation">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="simple_border_box_design">
                           <span class="addmision_process_top_title">Communication</span>
                           <div class="form-row" style="margin-top: -18px;">
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Mobile No:</label>
                                    <input type="hidden" name="lead_list_id" id="lead_list_id">
                                    <input type="hidden" name="demo_id" id="demo_id">
                                    <input type="hidden" name="shining_sheet_id" id="shining_sheet_id">
                                    <input type="text" name="mobile_no" id="mobile_no" placeholder="Mobile No" class="form-control custom-form-control" autofocus>
                                    <div class="errorName"></div>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Alternet No:</label>
                                    <input type="text" name="alternate_mobile_no" id="alternate_number" placeholder="Alternet No" class="form-control custom-form-control" onblur="check_alternate_number()">
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control custom-form-control">
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group" id="source_data">
                                    <label>Source:</label>
                                    <select class="form-control custom-form-control" name="source_id" id="source_id">
                                       <option value="">Select Source</option>
                                       <?php foreach($list_source as $ld) { ?>
                                       <option value="<?php echo $ld->source_name; ?>"><?php echo $ld->source_name; ?></option>
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
                           <div class="form-row" style="margin-top: -18px;">
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label for="email">First Name:</label>
                                    <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control custom-form-control" />
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label for="email">Surname:</label>
                                    <input type="text" name="surname" id="surname" placeholder="Surname" class="form-control custom-form-control" autofocus="" />
                                 </div>
                              </div>
                              <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group" id="branch_data">
                                     <label>Branch Name:</label>
                                     <select class="form-control custom-form-control" name="admission_branch" id="admission_branch">
                                        <option value="">Select branch</option>
                                 <?php foreach($list_branch as $ld) { ?>
                                 <option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                                 <?php } ?>	
                                     </select>
                                 </div>
                                 </div> -->
                              <?php $addby =  $_SESSION['Admin']['username']; ?>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <input type="hidden" name="addby" id="addby" value="<?php if(isset($addby)){ echo $addby; } ?>" placeholder="Assigned To" class="form-control custom-form-control" />
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
                           <div class="form-row" style="margin-top: -18px;">
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group" id="branch_data">
                                    <label>Branch Name:</label>
                                    <select class="form-control custom-form-control branch barch_wise_faculty" name="branch_id" id="branch_id">
                                       <option value="">Select branch</option>
                                       <?php foreach($list_branch as $ld) { ?>
                                       <option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                                       <?php } ?>	
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Course Category</label>
                                    <ul>
                                       <li class="d-inline-block mr-3 mr-mr-0" style="font-size: 12px;">
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" id="course_package" name="quick_course_package" value="package" onclick="return show_hide_package_course()" />Package
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" id="course_single" name="quick_course_package"  value="single" onclick="return show_hide_package_course()"/>Single
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 select_course_package">
                                 <div class="form-group">
                                    <label>Select Package*</label>
                                    <select class="select2 form-control custom-form-control course_orpackage" name="course_or_package[]" id="course_orpackage" multiple="multiple">
                                       <option value="">Select Package</option>
                                       <!--  <?php foreach($list_package as $lp) { ?>
                                          <option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                                          <?php } ?>  -->
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 select_course_single" >
                                 <div class="form-group">
                                    <label>Select Course*</label>
                                    <select class="select2 form-control custom-form-control course_or_single course_start_id" name="course_or_single[]" id="course_orsingle" multiple="multiple">
                                       <option value="">Select Course</option>
                                       <!-- <?php foreach($list_course as $lp) { ?>
                                          <option value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
                                          <?php } ?>  -->
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 select_course_package">
                                 <div class="form-group">
                                    <label>Stating Course</label>                                  
                                    <select class="form-control custom-form-control" name="stating_course_id" id="stating_course_id" required="true">
                                       <option value="0">Select Course</option>
                                      
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Batch:</label>                                  
                                    <select class="form-control custom-form-control" name="batch_id" id="batch_id">
                                       <option value="">Select Batch</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label for="text">Tution Fees:</label>
                                    <input type="text" name="tuation_fees" id="tuation_fees" placeholder="Tution Fees" class="form-control custom-form-control" />
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label for="text">Registration Fees:</label>
                                    <input type="text" name="registration_fees" id="registration_fees" placeholder="Registration Fees" class="form-control custom-form-control" autofocus="" />
                                    <input type="hidden" name="no_of_installment" id="no_of_installment" class="form-control custom-form-control">
                                 </div>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 align-self-end">
                                 <div class="form-group">
                                    <!-- <input type="text" name="receipt_admission_id" id="receipt_admission_id" class="align-content-center" style="width: 50px; border-radius: .25rem; border: 1px solid #ced4da;"> -->							
                                    <input type="submit" name="submit" value="Next" class="btn-sm btn-primary">
                                   <!--  <input type="submit" name="submit" value="Receipt" id="Receipt" class="btn-sm btn-primary">
                                    <input type="submit" name="submit" value="GstReceipt" id="GstReceipt" class="btn-sm btn-primary"> -->
                                 </div>
                              </div>
                              <!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6" id="process_button">
                                 <div class="form-group">								
                                 	<input type="submit" name="submit" value="Next" class="btn btn-primary" id="hide">
                                 </div>
                                 </div> -->
                              <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                 	<input type="text" name="no_of_installment" id="no_of_installment" style="margin-top: 28px; width: 50px; border-radius: .25rem;  border: 1px solid #ced4da;">
                                 	<input type="button" name="make_instllment" value="Make Installment" class="btn btn-primary" onclick="return make_installment_process()" style="border-radius: .25rem;  border: 1px solid #ced4da; margin-top:-6px;">
                                 </div>
                                 </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-md-2  record" id="redata">
               <ul class="list-group text-center">
                  <li class="list-group-item"><b>Previous Record Admission</b></li>
                  <li class="list-group-item">
                     <span style="color: red">
                        <div id="gr_ids"></div>
                     </span>
                     <span style="color: red">
                        <div id="enrollmentno"></div>
                     </span>
                     <span style="color: red">
                        <div id="admissionbarnch"></div>
                     </span>
                     <span style="color: red">
                        <div id="fullname"></div>
                     </span>
                     <span style="color: red">
                        <div id="admission_mobileno"></div>
                     </span>
                     <span style="color: red">
                        <div id="admission_course"></div>
                     </span>
                     <span style="color: red">
                        <div id="af"></div>
                     </span>
                     <span style="color: red">
                        <div id="admission_date"></div>
                     </span>
                     <span style="color: red">
                        <div id="admission_adby"></div>
                     </span>
                  </li>
                  <li class="list-group-item"><b>Previous Record Demo</b></li>
                  <li class="list-group-item">
                     <span style="color: red">
                        <div id="demo_idss"></div>
                     </span>
                     <span style="color: red">
                        <div id="branch"></div>
                     </span>
                     <span style="color: red">
                        <div id="name"></div>
                     </span>
                     <span style="color: red">
                        <div id="demomobileno"></div>
                     </span>
                     <span style="color: red">
                        <div id="startingCourse"></div>
                     </span>
                     <!-- <span style="color: red"><div id="faculty_demo"></div></span> -->
                     <span style="color: red">
                        <div id="demodate"></div>
                     </span>
                     <span style="color: red">
                        <div id="addedby"></div>
                     </span>
                  </li>
                  <li class="list-group-item"><b>Previous Record Lead</b></li>
                  <li class="list-group-item">
                     <span style="color: red">
                        <div id="lead_list_idss"></div>
                     </span>
                     <span style="color: red">
                        <div id="lead_branch"></div>
                     </span>
                     <span style="color: red">
                        <div id="lead_name"></div>
                     </span>
                     <span style="color: red">
                        <div id="leadmobile_no"></div>
                     </span>
                     <span style="color: red">
                        <div id="lead_course"></div>
                     </span>
                     <span style="color: red">
                        <div id="lead_creation_date"></div>
                     </span>
                     <span style="color: red">
                        <div id="reference_name"></div>
                     </span>
                  </li>
               </ul>
            </div>
         </span>
         <span class="form_two">
            <div class=" card card-statistic p-3 mb-3 col-xl-8 col-lg-8 col-md-12 col-sm-12 d-flex">
               <form  enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/Admissionprocess">
                  <input type="hidden" name="update_id" id="update_id">
                  <input type="hidden" name="registration_fees" id="registra_fees">
                  <input type="hidden" name="admission_id" id="amis_ids">
                  <input type="hidden" name="gr_id" id="g_ids">
                  <input type="hidden" name="enrollment_number" id="enrollnumber">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="simple_border_box_design">
                           <span class="addmision_process_top_title">Fees Installment</span>
                           <div class="row justify-content-end" style="margin-top: -20px;">
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-right">
                                 <div class="form-group mb-4">
                                    <input type="text" name="no_of_installments" id="no_of_installments" class="align-content-center" style="width: 50px; border-radius: .25rem; border: 1px solid #ced4da;">
                                    <input type="button" name="make_instllment" value="Make Installment" class="btn btn-primary" onclick="return make_installment_process()" style="border-radius: .25rem; border: 1px solid #ced4da; margin-top:-6px;">
                                 </div>
                              </div>
                           </div>
                           <div class="form-row align-content-center" style="margin-top: -18px;" id="installment_all_data">
                              <div class="col-xl-1 col-lg-1 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label for="email"><b>#NO</b></label>
                                    <?php $no = "1"; ?>
                                    <input type="text" name="" value="<?php if(isset($no)){ echo $no; } ?>"  class="form-control custom-form-control number" />			
                                 </div>
                              </div>
                              <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label for="email">Installment Date</label>
                                    <input type="text" name=""  class="form-control custom-form-control" />
                                 </div>
                              </div>
                              <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>	Due Amount</label>
                                    <input type="text" name=""  class="form-control custom-form-control" />
                                 </div>
                              </div>
                              <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label for="email"> Paid Amount</label>
                                    <input type="text" name=""  class="form-control custom-form-control" />
                                 </div>
                              </div>
                              <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Send SMS To:</label>
                                    <input type="checkbox" ><br>
                                    <label>Send Email To:</label>
                                    <input type="checkbox" >
                                 </div>
                              </div>
                              <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Send SMS Father:</label>
                                    <input type="checkbox" ><br>
                                    <label>Send Email Father:</label>
                                    <input type="checkbox">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="simple_border_box_design">
                           <span class="addmision_process_top_title">Postal Communication</span>
                           <div class="form-row" style="margin-top: -18px;">
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group" id="state_data">
                                    <label>State:</label>
                                    <select class="form-control custom-form-control" name="state_id" id="state_id" required>
                                       <option value="">Select State</option>
                                       <?php foreach($list_state as $val) { ?>
                                       <option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
                                       <?php } ?>	
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>City:</label>
                                    <select class="form-control custom-form-control" name="city_id" id="city_id" required>
                                       <option value="">Select City</option>
                                       <?php foreach($list_city as $val) { ?>
                                       <option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
                                       <?php } ?>	
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Area:</label>
                                    <select class="form-control custom-form-control" name="area_id" id="area_id" required>
                                       <option value="">Select Area</option>
                                       <?php foreach($list_area as $ld) { ?>
                                       <option value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
                                       <?php } ?>	
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Pin Code:</label>
                                    <input type="text" name="pin_code" id="pin_code" placeholder="Pin Code" class="form-control custom-form-control" required/>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Present Address:</label>
                                    <textarea class="form-control" id="pre_address" name="present_address" placeholder="Present Address..." required></textarea>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Permanent Address:</label>
                                    <textarea class="form-control" id="permanent_address" name="permanent_address" placeholder="Permanent Address..." required></textarea>
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
                           <div class="form-row" style="margin-top: -18px;">
                              <div class="col-xl-12 mb-2">
                                 <h5>Guardian 1 Details</h5>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="father_name" id="father_name" class="form-control custom-form-control" placeholder="Father Name" required/>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Surname:</label>
                                    <input type="text" name="Surname" id="atak_father" placeholder="Your Surname" class="form-control custom-form-control" required/>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" name="father_email" id="father_email" placeholder="Email Id" class="form-control custom-form-control" required/>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Father Mobile No:</label>
                                    <input type="text" name="father_mobile_no" id="father_mobile_no" placeholder="Phone Number" class="form-control custom-form-control" required/>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Occupation:</label>
                                    <input type="text" name="father_occupation" id="father_occupation" placeholder="Occupation" class="form-control custom-form-control" required/>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Income:</label>
                                    <input type="text" name="father_income" id="father_income" placeholder="Father Income" class="form-control custom-form-control" required/>
                                 </div>
                              </div>
                              <div class="col-xl-12 mb-2">
                                 <h5>Guardian 2 Details</h5>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="mother_name" id="mother_name" class="form-control custom-form-control" placeholder="First Name" required/>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Surname:</label>
                                    <input type="text" name="Surname" id="atak_mother" placeholder="Mother Name" class="form-control custom-form-control" required/>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" name="mother_email" id="mother_email" placeholder="Email Id" class="form-control custom-form-control" required/>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Mother Mobile No:</label>
                                    <input type="text" name="mother_mobile_no" id="mother_mobile_no" placeholder="Phone Number" class="form-control custom-form-control" required/>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Occupation:</label>
                                    <input type="text" name="mother_occupation" id="mother_occupation" placeholder="Mother Occupation" class="form-control custom-form-control" required>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Income:</label>
                                    <input type="text" name="mother_income" id="mother_income" placeholder="Mother Income" class="form-control custom-form-control" required/>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Send Email</label>
                                    <ul>
                                       <li class="d-inline-block mr-3 mr-mr-0">
                                          <div class="form-check form-check-inline" style="font-size: 12px;">
                                             <input type="radio"  name="admission_msg_email" value="Yes" placeholder="content" class="mr-2">Yes
                                          </div>
                                          <div class="form-check form-check-inline" style="font-size: 12px;">
                                             <input type="radio"  name="admission_msg_email" value="No" placeholder="content" class="mr-2">No
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
                                          <div class="form-check form-check-inline" style="font-size: 12px;">
                                             <input type="radio"  name="admission_msg_mobile" value="Yes" placeholder="content" class="mr-2">Yes
                                          </div>
                                          <div class="form-check form-check-inline" style="font-size: 12px;">
                                             <input type="radio"  name="admission_msg_mobile" value="No" placeholder="content" class="mr-2">No
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
                           <div class="form-row" style="margin-top: -18px;">
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>College / school Name</label>
                                    <input type="text" name="school_collage_name" id="school_collage_name" placeholder="College / Scholl Name" class="form-control custom-form-control" />
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Country:</label>
                                    <select class="form-control custom-form-control" name="country_id" id="country_id" required>
                                       <option value="">Select Country</option>
                                       <?php foreach($list_country as $val) { ?>
                                       <option <?php  if($val->country_name=="India") { echo "selected"; } ?> value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
                                       <?php } ?>			
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>State:</label>
                                    <select class="form-control custom-form-control" name="school_clg_state" id="school_clg_state" required>
                                       <option value="">Select State</option>
                                       <?php foreach($list_state as $val) { ?>
                                       <option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
                                       <?php } ?>	
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>City:</label>
                                    <select class="form-control custom-form-control" name="school_clg_city" id="school_clg_city" required>
                                       <option value="">Select City</option>
                                       <?php foreach($list_city as $val) { ?>
                                       <option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
                                       <?php }  ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Area:</label>
                                    <select class="form-control custom-form-control" name="school_clg_area" id="school_clg_area" required>
                                       <option value="">Select Area</option>
                                       <?php foreach($list_area as $ld) { ?>
                                       <option value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
                                       <?php } ?>	
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <label>Type</label>
                                    <ul>
                                       <li class="d-inline-block mr-3 mr-mr-0">
                                          <div class="form-check form-check-inline" style="font-size: 12px;">
                                             <input type="radio"  name="school_collage_type" id="sch_typ" value="school"  placeholder="content" class="mr-2">School
                                          </div>
                                          <div class="form-check form-check-inline" style="font-size: 12px;">									                    
                                             <input type="radio"  name="school_collage_type" id="clg_typ" value="college"  placeholder="content" class="mr-2">College
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
                           <span class="addmision_process_top_title">Document</span>
                           <div class="form-row" style="margin-top: -18px;">
                              <div class="photos">
                                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 pl-0">
                                    <div class="form-group">
                                       <label>Photos</label>
                                       <input type="file" name="photos" class="form-control custom-form-control"> 
                                    </div>
                                 </div>
                              </div>
                              <div class="10th_marksheet">
                                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 pl-0">
                                    <div class="form-group">
                                       <label>10th Marksheet</label>
                                       <input type="file" name="10th_marksheet" class="form-control custom-form-control"> 
                                    </div>
                                 </div>
                              </div>
                              <div class="12th_marksheet">
                                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 pl-0">
                                    <div class="form-group">
                                       <label>12th Marksheet</label>
                                       <input type="file" name="12th_marksheet" class="form-control custom-form-control"> 
                                    </div>
                                 </div>
                              </div>
                              <div class="leaving_certy">
                                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 pl-0">
                                    <div class="form-group">
                                       <label>Leaving Certy</label>
                                       <input type="file" name="leaving_certy" class="form-control custom-form-control"> 
                                    </div>
                                 </div>
                              </div>
                              <div class="treal_certy">
                                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 pl-0">
                                    <div class="form-group">
                                       <label>Treal Certy</label>
                                       <input type="file" name="treal_certy" class="form-control custom-form-control"> 
                                    </div>
                                 </div>
                              </div>
                              <div class="light_bill">
                                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 pl-0">
                                    <div class="form-group">
                                       <label>Light Bill</label>
                                       <input type="file" name="light_bill" class="form-control custom-form-control"> 
                                    </div>
                                 </div>
                              </div>
                              <div class="aadhar_card">
                                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 pl-0">
                                    <div class="form-group">
                                       <label>Aadhar Card</label>
                                       <input type="file" name="aadhar_card" class="form-control custom-form-control"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-12 d-flex px-0">
                     <div class="form-group">
                        <button type="submit" value="submit" name="submit" class="btn-sm btn-primary">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </span>
      </div>
      </div>
   </section>
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
      <div class="data_insert_msg">
      </div>
      <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle"><b>Verify The Numbers</b></h5>
         <div id="mag_otp"></div>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button> 
      </div>
      <div class="modal-body">
         <form method="post" id="form_validation_inner" name="form_validation_inner" >
            <input type="hidden" name="alternate_mobile_no" id="alternate_mobile_replace_no" class="form-control">
            <input type="hidden" name="father_mobile_no" id="father_mobile_replace_no" class="form-control">
            <input type="hidden" name="mother_mobile_no" id="mother_mobile_replace_no" class="form-control">
            <div class="row">
               <div class="col-xl-6">
                  <div class="form-group">
                     <label><b>Mobile NO</b><span style="color: red;">*</span></label>
                     <input type="text" name="mobile_no" id="mobile_replace_no" class="form-control">
                  </div>
               </div>
               <div class="col-xl-6">
                  <div class="form-group">
                     <label><b>OTP</b><span style="color: red;">*</span></label>
                     <input type="text" name="mobileOtp" id="mobileOtp" class="form-control">
                  </div>
               </div>
               <div class="col-xl-6">
                  <div class="form-group">
                     <input type="button" name="" id="sendotp" class="btn btn-sm btn-primary" value="Send OTP">
                  </div>
               </div>
               <div class="col-xl-6">
                  <div class="form-group">
                     <input type="button" name="" id="verifyotp" class="btn btn-sm btn-success" value="Verify">
                  </div>
               </div>
            </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <button type="submit" name="submit" value="Save" class="btn btn-primary">Save</button>
      </div>
   </div>
   </form>
</div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script type="text/javascript">
   $('#sendotp').on('click',function(){
       var mobile_replace_no = $('#mobile_replace_no').val();
       
       
       $.ajax({
           type : "POST",
           url  : "<?php echo base_url()?>AddmissionController/Send_Otp",
           data : {'mobile_no' : mobile_replace_no },
           success: function(resp)
           {
         	   var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if(ddd == '1')
               {
                   $('#mag_otp').fadeIn();
                   $('#mag_otp').html("<div class='btn btn-sm bg-light ml-4'><b style='color: green;'>Successfully Send OTP</b></div>");
                   $('#mag_otp').fadeOut(4000);
               }
               else
               {
               	$('#mag_otp').fadeIn();
                   $('#mag_otp').html("<div class='btn btn-sm bg-light ml-4'><b style='color: red;'>Someting Wrong!!</b></div>");
                   $('#mag_otp').fadeOut(4000);
               }
           }
       });
       return false;
   });
   
   
   $('#verifyotp').on('click',function(){
       var mobileOtp = $('#mobileOtp').val();
       
       
       $.ajax({
           type : "POST",
           url  : "<?php echo base_url()?>AddmissionController/verify_otp",
           data : {'mobileOtp' : mobileOtp },
           success: function(resp)
           {
         	   var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if(ddd == '1')
               {
                   $('#mag_otp').fadeIn();
                   $('#mag_otp').html("<div class='btn btn-sm bg-light ml-4'><b style='color: green;'>Successfully Verify OTP</b></div>");
                   $('#mag_otp').fadeOut(4000);
               }
               else
               {
               	$('#mag_otp').fadeIn();
                   $('#mag_otp').html("<div class='btn btn-sm bg-light ml-4'><b style='color: red;'>Someting Wrong!!</b></div>");
                   $('#mag_otp').fadeOut(4000);
               }
           }
       });
       return false;
   });
</script>		
<script>
   function check_process(){
   
   var mobile_no = $('#mobile_no').val();
   var alternate_mobile_no = $('#alternate_number').val();
   var email = $('#email').val();
   
   //console.log(mobile_no);
   $.ajax({
   type : "POST",
   url  : "<?php echo base_url()?>AddmissionController/Getrecode_multiple",
   data:{ 'mobile_no' : mobile_no , 'alternate_mobile_no' : alternate_mobile_no , 'email' : email },
   success:function(multiple_data){
   
   var data = $.parseJSON(multiple_data);
   
   // console.log(data.multiple_data.mobile_no);
   if(data.multiple_data.mobile_no){
    
   $('#mobile_replace_no').val(data.multiple_data.mobile_no);
   $('#alternate_mobile_replace_no').val(data.multiple_data.alternate_mobile_no);
   $('#father_mobile_replace_no').val(data.multiple_data.father_mobile_no);
   $('#mother_mobile_replace_no').val(data.multiple_data.mother_mobile_no);
   	
   }else{
   
    // console.log(" nathi malyo");
   
   		$('#mobile_replace_no').val(mobile_no);
   		
   		   $('#alternate_mobile_replace_no').val(alternate_mobile_no);
   
   }
   }
   });
   
   }
   
</script>
<script>
   $(document).ready(function(){
   
    mobileno_wise_data();
   
    function mobileno_wise_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>AddmissionController/GetRecord",
      method:"POST",
      data:{mobile_no:query},
      success:function(res)
      {
       var data = $.parseJSON(res);
   
   	    if(data.record['lead_list_id']!=''){
   	         $('#lead_list_id').val(data.record['lead_list_id']);
   	    }else{
   	         $('#lead_list_id').val('');
   	    }
   	     $('#mobile_no').val(data.record['mobile_no']);
   	     $('#source_id').val(data.record['source_id']);
   	     $('#alternate_number').val(data.record['alternate_mobile_no']);
   	     $('#email').val(data.record['email']);
   	     $('#email_id').val(data.record['email']);
   	     $('#first_name').val(data.record['first_name']);
   	     $('#surname').val(data.record['surname']);
   	     $('#admission_branch').val(data.record['branch_id']);
   	     $('#atak_father').val(data.record['surname']);
   	     $('#atak_mother').val(data.record['surname']);
   	     $('#state_id').val(data.record['state_id']);
   	     $('#city_id').val(data.record['city_id']);
   	     $('#area_id').val(data.record['area_id']);
   	     $('#pin_code').val(data.record['pin_code']);
   	     $('#pre_address').val(data.record['present_address']);
   	     $('#permanent_address').val(data.record['permanent_address']);
   	     $('#father_name').val(data.record['father_name']);
   	     $('#father_email').val(data.record['father_email']);
   	     $('#father_mobile_no').val(data.record['father_mobile_no']);
   	     $('#father_occupation').val(data.record['father_occupation']);
   	     $('#father_income').val(data.record['father_income']);
   	     $('#mother_name').val(data.record['mother_name']);
   	     $('#mother_email').val(data.record['mother_email']);
   	     $('#mother_mobile_no').val(data.record['mother_mobile_no']);
   	     $('#mother_occupation').val(data.record['mother_occupation']);
   	     $('#mother_income').val(data.record['mother_income']);
   	     $('#school_collage_name').val(data.record['school_collage_name']);
   	     $('#country_id').val(data.record['country_id']);
   	     $('#school_clg_state').val(data.record['school_clg_state']);
   	     $('#school_clg_city').val(data.record['school_clg_city']);
   	     $('#school_clg_area').val(data.record['school_clg_area']);
   	    
   	    var sch_clg_type = data.record['school_collage_type'];
   
   	    if(sch_clg_type == 'college') 
   	    {
   	        $("#clg_typ"). prop("checked", true);
   	    }
   	    if(sch_clg_type == 'school') 
   	    {
   	        $("#sch_typ"). prop("checked", true);
   	    }
   	     var pack_sin =  data.record['course_package'];
   	                 
   	    if(pack_sin == 'package')
   	    {
   	        $("#course_package"). prop("checked", true);
   	        // get_course_package('package');
   	         $('.select_course_package').show();
   	         $('.select_course_single').hide();
   	         $('#course_orpackage').val(data.record['course_or_package']);
   	        
   	    }
   	    else
   	    {
   	        $("#course_single"). prop("checked", true); 
   	        // get_course_package('single');
   	        $('.select_course_package').hide();
   	        $('.select_course_single').show();
   	       $('#course_orsingle').val(data.record['course_or_package']);
   	    
   	    }
      }
     })
    }
   
    $('#mobile_no').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      mobileno_wise_data(search);
     }
     else
     {
      mobileno_wise_data();
     }
    });
   });
</script>
<script>
   $(document).ready(function(){
   
    email_data();
   
    function email_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>AddmissionController/Getrecord_email_wise",
      method:"POST",
      data:{email:query},
      success:function(res){
       var data = $.parseJSON(res);
   
       if(data.record['lead_list_id']!=''){
        	 $('#lead_list_id').val(data.record['lead_list_id']);
    	}else{
    		 $('#lead_list_id').val('');
    	}
        $('#mobile_no').val(data.record['mobile_no']);
        $('#source_id').val(data.record['source_id']);
        $('#alternate_number').val(data.record['alternate_mobile_no']);
        $('#email').val(data.record['email']);
        $('#email_id').val(data.record['email']);
        $('#first_name').val(data.record['first_name']);
        $('#surname').val(data.record['surname']);
        $('#admission_branch').val(data.record['branch_id']);
        $('#atak_father').val(data.record['surname']);
        $('#atak_mother').val(data.record['surname']);
        $('#state_id').val(data.record['state_id']);
        $('#city_id').val(data.record['city_id']);
        $('#area_id').val(data.record['area_id']);
        $('#pin_code').val(data.record['pin_code']);
        $('#pre_address').val(data.record['present_address']);
        $('#permanent_address').val(data.record['permanent_address']);
        $('#father_name').val(data.record['father_name']);
        $('#father_email').val(data.record['father_email']);
        $('#father_mobile_no').val(data.record['father_mobile_no']);
        $('#father_occupation').val(data.record['father_occupation']);
        $('#father_income').val(data.record['father_income']);
        $('#mother_name').val(data.record['mother_name']);
        $('#mother_email').val(data.record['mother_email']);
        $('#mother_mobile_no').val(data.record['mother_mobile_no']);
        $('#mother_occupation').val(data.record['mother_occupation']);
        $('#mother_income').val(data.record['mother_income']);
        $('#school_collage_name').val(data.record['school_collage_name']);
        $('#country_id').val(data.record['country_id']);
        $('#school_clg_state').val(data.record['school_clg_state']);
        $('#school_clg_city').val(data.record['school_clg_city']);
        $('#school_clg_area').val(data.record['school_clg_area']);
   	
   	var sch_clg_type = data.record['school_collage_type'];
   
   	if(sch_clg_type == 'college') 
   	{
   		$("#clg_typ"). prop("checked", true);
   	}
   	if(sch_clg_type == 'school') 
   	{
   		$("#sch_typ"). prop("checked", true);
   	}
        var pack_sin =  data.record['course_package'];
   				 
   	if(pack_sin == 'package')
   	{
   		$("#course_package"). prop("checked", true);
   		// get_course_package('package');
   		 $('.select_course_package').show();
   		 $('.select_course_single').hide();
   		 $('#course_orpackage').val(data.record['course_or_package']);
   		
   	}
   	else
   	{
   		$("#course_single"). prop("checked", true);	
   		// get_course_package('single');
   		$('.select_course_package').hide();
   	    $('.select_course_single').show();
   	   $('#course_orsingle').val(data.record['course_or_package']);
   	
   	}
   
      }
     })
    }
   
    $('#email').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      email_data(search);
     }
     else
     {
      email_data();
     }
    });
   });
</script>
<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
   // just for the demos, avoids form submit
   jQuery.validator.setDefaults({
     debug: true,
     success: "valid"
   });
   $( "#form_validation_inner" ).validate({
     rules: {
       mobile_no: {
         required: true,
         number: true
       },
       mobileOtp :{
   				required :true,
   				number : true,
   				minlength : 6,
   				maxlength : 6
   			}
     },
     messages:{
     	mobile_no:{
     		required:"<div style='color:red'>Mobile Number is required</div>",
     		number: "<div style='color:red'>Only Numbers required</div>"
     	},
     	mobileOtp :{
   				required : "<div style='color:red'>Please Enter OTP Number</div>",
   				number : "<div style='color:red'>Please Enter Number</div>",
   				minlength : "<div style='color:red'>Minimum 6 digits</div>",
   				maxlength : "<div style='color:red'>Maximum 6 digits</div>"
   			}
     },
      submitHandler: function(form) {
                   // form.submit();
                   $('#exampleModalCenter').modal('hide');
   			    	var mobile_no = $('#mobile_replace_no').val();
   		 			$('#mobile_no').val(mobile_no);
   		            var alternate_mobile_no = $('#alternate_mobile_replace_no').val();
   		            $('#alternate_number').val(alternate_mobile_no);
   		            var father_mobile_no = $('#father_mobile_replace_no').val();
   		            $('#father_mobile_replace_no').val(father_mobile_no);
   		            var mother_mobile_no = $('#mother_mobile_replace_no').val();
   		            $('#mother_mobile_replace_no').val(mother_mobile_no);
   
                   	var confi = confirm("Are Your Sure To Take Admission");
                   	
                   	if(confi){
   						var dataform = $('#form_validation').serializeArray(); 
                   		$.ajax({
                   			url : "<?php echo base_url(); ?>AddmissionController/firstProcess",
                   			type:"post",
                   			data: dataform,
                   			success:function(resp){
                                   $(".form_two").show();
   						        $(".form_one").hide();
               				  var data = $.parseJSON(resp);
   						      var admis_id = data['allrecord'].admission_id;
   						      var regtra_fees = data['allrecord'].registration_fees;
   						      var adm_id = data['allrecord'].admission_id;
   						      var g_ids = data['allrecord'].gr_id;
   						      var enrollnumber = data['allrecord'].enrollment_number;
   					      
   						      $('#update_id').val(admis_id);
   						      $('#registra_fees').val(regtra_fees);
   						      $('#amis_ids').val(adm_id);
   						      $('#g_ids').val(g_ids);
   						      $('#enrollnumber').val(enrollnumber);
                   	    }
                   		});
   		        	}
      }
   });
</script>
<script>
   // just for the demos, avoids form submit
   $(document).ready(function(){
   	$('#form_validation').validate({
   		rules: {
   			mobile_no :{
   				required :true,
   				number : true,
   				minlength : 10,
   				maxlength :10
   			},
   			alternate_mobile_no :{
   				required :true,
   				number : true,
   				minlength : 10,
   				maxlength :10
   			},
   			email :{
   				required :true,
   				email : true
   			},
   			source_id :{
   				required :true
   			},
   			first_name:{
   				required: true
   			},
   			surname: {
   				required : true
   			},
   			admission_branch:{
   				required: true
   			},
   			branch_id:{
   				required : true
   			},
   			tuation_fees:{
   				required : true
   			},
   			registration_fees:{
   				required : true
   			}
   			
   		},
   		messages:{
   			mobile_no :{
   				required : "<div style='color:red'>Please Enter Mobile Number</div>",
   				number : "<div style='color:red'>Please Enter Number</div>",
   				minlength : "<div style='color:red'>Minimum 10 digits</div>",
   				maxlength : "<div style='color:red'>Maximum 10 digits</div>"
   			},
   			alternate_mobile_no :{
   				required : "<div style='color:red'>Please Enter Mobile Number</div>",
   				number : "<div style='color:red'>Please Enter Number</div>",
   				minlength : "<div style='color:red'>Minimum 10 digits</div>",
   				maxlength : "<div style='color:red'>Maximum 10 digits</div>"
   			},
   			email:{
   				required : "<div style='color:red'>Please Enter Email</div>",
   				email : "<div style='color:red'>Please Enter Valid Email</div>"
   			},
   			source_id :{
   				required : "<div style='color:red'>Please Select Source</div>"
   			},
   			first_name:{
   				required : "<div style='color:red'>Please enter first name</div>"
   			},
   			surname :{
   				required: "<div style='color:red'>Please enter surname</div>"
   			},
   			admission_branch:{
   				required : "<div style='color:red'>Please Select Branch</div>"
   			},
   			branch_id:{
   				required : "<div style='color:red'>Please Select Branch</div>"
   			},
   			tuation_fees:{
   				required : "<div style='color:red'>Please Enter TuationFees</div>",
   				number : "<div style='color:red'>Please Enter Number</div>"
   			},
   			registration_fees:{
   				required : "<div style='color:red'>Please Enter RegistrationFees</div>",
   				number : "<div style='color:red'>Please Enter Number</div>"
   			}
   		},
   		 submitHandler: function(form) {
                   // form.submit();
   			    $('#exampleModalCenter').modal('show');
   
   			     var mobile_no = $('#mobile_no').val();
               	 var alternate_mobile_no = $('#alternate_number').val();
               	 var email = $('#email').val();
               
               //console.log(mobile_no);
   		             $.ajax({
   		                type : "POST",
   		                url  : "<?php echo base_url()?>AddmissionController/Getrecode_multiple",
   		                data:{ 'mobile_no' : mobile_no , 'alternate_mobile_no' : alternate_mobile_no , 'email' : email },
   					   success:function(multiple_data){
   					   
   					  var data = $.parseJSON(multiple_data);
   
   					  // console.log(data.multiple_data.mobile_no);
   					   if(data.multiple_data.mobile_no){
   					     
   		                $('#mobile_replace_no').val(data.multiple_data.mobile_no);
   		                $('#alternate_mobile_replace_no').val(data.multiple_data.alternate_mobile_no);
   		                $('#father_mobile_replace_no').val(data.multiple_data.father_mobile_no);
   		                $('#mother_mobile_replace_no').val(data.multiple_data.mother_mobile_no);
   					   	
   					   }else{
   
   			    		 // console.log(" nathi malyo");
   
   			   				$('#mobile_replace_no').val(mobile_no);
   			   				$('#alternate_mobile_replace_no').val(alternate_mobile_no);
               
                   	}
               	}
               });
   		}	
   	});
   
   	});
   
   	
</script>
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
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
   }
</script>
<script>
   $(document).ready(function(){
   $('#branch_id').change(function(){
   
   var branch_id = $('#branch_id').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_single_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
      $('#course_orsingle').html(data);
   
     }
    });
   });
   
   $('.branch').change(function(){
   
   var branch_id = $('.branch').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_package_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
      $('#course_orpackage').html(data);
   
     }
    });
   });
   
   $('.barch_wise_faculty').change(function(){
   
   
   var branch_id = $('.barch_wise_faculty').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/filter_branch_wise_faculty",
     method:"POST",
     data:{'branch_id' : branch_id },
     success:function(data)
     {
      $('#faculty_id').html(data);
   
     }
    });
   });
   
   
   $('#course_orsingle').change(function(){
   var ssearch = $(this).val();
   
   
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/GetRecord_shining_sheet",
    type:"POST",
    data:{ 'course_id' : ssearch },
    success:function(record){
    	console.log(record);
   var data = $.parseJSON(record);
    	
    	console.log(data.record);
      $('#shining_sheet_id').val(data.record);
    }
   });
   });    
   
   
   
   $('#father_email').change(function(){
   
   var email_subject = $('#email_subject').val();
   // tinyMCE.activeEditor.getContent();
   // tinyMCE.activeEditor.getContent({format : 'html'});
   // var email_compose_textarea = tinyMCE.get('email_compose_Textarea').getContent()
   var email = $('#father_email').val();
   
   // alert(package_id);
   $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/send_email",
     method:"POST",
     data:{ 'email' : email,
     		'subject' : email_subject
   	 },
     success:function(Res)
     {
      
     // alert(Res);
   
     }
    });
   });
   

    $('#stating_course_id').change(function(){
   
   //var branch_id = $('#branch_id').val();
   
   var stating_course_id = $('#stating_course_id').val();
   var branch_id = $('.barch_wise_faculty').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_batch_data",
     method:"POST",
     data:{ 'stating_course_id' : stating_course_id , 'branch_id' : branch_id}, 
     success:function(data)
     {
      $('#batch_id').html(data);
   
     }

    });
   });

    $('.course_start_id').change(function(){
   
   var course_start_id = $('.course_start_id').val();
   var branch_id = $('.branch').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_course_wise_batch",
     method:"POST",
     data:{ 'course_start_id' : course_start_id , 'branch_id' : branch_id}, 
     success:function(data)
     {
      $('#batch_id').html(data);
   
     }

    });
   });

   $('.course_orpackage').change(function(){
   
   //var branch_id = $('#branch_id').val();
   
   var package_id = $('.course_orpackage').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_stating_course",
     method:"POST",
     data:{ 'package_id' : package_id }, 
     success:function(data)
     {
      $('#stating_course_id').html(data);
   
     }
    });
   });
   
   
   $('.course_or_single').change(function(){
   
   var course_id = $('.course_or_single').val();
   // alert(package_id);
     $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/getrecord_single_course",
    type:"POST",
    data:{ 'course_id' : course_id },	
    success:function(res)
    {
    	//$('#photos').html(res);
    var data = $.parseJSON(res);
    if(data.record==null)
    {
   
   
       }
       else 
       {
   
       $('#documents_id').val(data.record['documents_id']);
       if(data.record['photos']=="yes")
       {
       	$(".photos").show();
       }
       else
       {
       	$(".photos").hide();
       }
   
       if(data.record['tenth_marksheet']=="yes")
       {
       	$(".10th_marksheet").show();
       }
       else
       {
       	$(".10th_marksheet").hide();
       }
   
       if(data.record['twelth_marksheet']=="yes")
       {
       	$(".12th_marksheet").show();
       }
       else
       {
       	$(".12th_marksheet").hide();
       }
   
       if(data.record['leaving_certy']=="yes")
       {
       	$(".leaving_certy").show();
       }
       else
       {
       	$(".leaving_certy").hide();
       }	
   
       if(data.record['treal_certy']=="yes")
       {
       	$(".treal_certy").show();
       }
       else
       {
       	$(".treal_certy").hide();
       }
   
       if(data.record['light_bill']=="yes")
       {
       	$(".light_bill").show();
       }
       else
       {
       	$(".light_bill").hide();
       }
       
        if(data.record['aadhar_card']=="yes")
       {
       	$(".aadhar_card").show();
       }
       else
       {
       	$(".aadhar_card").hide();
       }
   }	
    }
   });
   });
   
   $('.course_orpackage').change(function(){
   
   var package_id = $('.course_orpackage').val();
   // alert(package_id);
     $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/getrecord_package",
    type:"POST",
    data:{ 'package_id' : package_id },	
    success:function(res)
    {
    	//$('#photos').html(res);
    var data = $.parseJSON(res);
    if(data.record==null)
    {
   
   
       }
       else 
       {
   
       $('#documents_id').val(data.record['documents_id']);
       if(data.record['photos']=="yes")
       {
       	$(".photos").show();
       }
       else
       {
       	$(".photos").hide();
       }
   
       if(data.record['tenth_marksheet']=="yes")
       {
       	$(".10th_marksheet").show();
       }
       else
       {
       	$(".10th_marksheet").hide();
       }
   
       if(data.record['twelth_marksheet']=="yes")
       {
       	$(".12th_marksheet").show();
       }
       else
       {
       	$(".12th_marksheet").hide();
       }
   
       if(data.record['leaving_certy']=="yes")
       {
       	$(".leaving_certy").show();
       }
       else
       {
       	$(".leaving_certy").hide();
       }	
   
       if(data.record['treal_certy']=="yes")
       {
       	$(".treal_certy").show();
       }
       else
       {
       	$(".treal_certy").hide();
       }
   
       if(data.record['light_bill']=="yes")
       {
       	$(".light_bill").show();
       }
       else
       {
       	$(".light_bill").hide();
       }
       
        if(data.record['aadhar_card']=="yes")
       {
       	$(".aadhar_card").show();
       }
       else
       {
       	$(".aadhar_card").hide();
       }
   }	
    }
   });
   });
   
   }); 
</script>
<script>
   $('.record').hide();
   $(".form_two").show_hide_package_course();
   $(".photos").hide();
   $(".10th_marksheet").hide();
   $(".12th_marksheet").hide();
   $(".leaving_certy").hide();
   $(".treal_certy").hide();
   $(".light_bill").hide();
   $(".aadhar_card").hide();
   $('.select_course_package').hide();
   function show_hide_package_course()
   {
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
   
   
   
   $('#course_orpackage').change(function(){
   var packageId = $('#course_orpackage').val();
   $.ajax({
   	url : "<?php echo base_url(); ?>AddmissionController/GetInstallmentDetails",
   	type :"post",
   	data:{
   		'packageId' : packageId
   	},
   	success:function(data)
   	{
   		// console.log(data);
   		var res = $.parseJSON(data);
   		$('#tuation_fees').val(res.get_install.package_fees);
   		$('#no_of_installment').val(res.get_install.installment);
   		$('#no_of_installments').val(res.get_install.installment);
   		// var newrec =  res.record['get_install'];
   		// console.log(newrec);
   	}
   });
   });
   
   $('#course_orsingle').change(function(){
   var courseId = $('#course_orsingle').val();
   $.ajax({
   	url : "<?php echo base_url(); ?>AddmissionController/GetInstallmentDetailssinglecourse",
   	type :"post",
   	data:{
   		'courseId' : courseId
   	},
   	success:function(data){
   		// console.log(data);
   		var res = $.parseJSON(data);
   		$('#tuation_fees').val(res.get_install.course_fees);
   		$('#no_of_installment').val(res.get_install.installment);
   		$('#no_of_installments').val(res.get_install.installment);
   		// var newrec =  res.record['get_install'];
   		// console.log(newrec);
   	}
   });
   });
   
   
   function make_installment_process(){
   var packageId = $('#course_orpackage').val();
   var tution_fee =  $('#tuation_fees').val();
   var registration_fees =  $('#registration_fees').val();
   var noOfInstallment =  $('#no_of_installments').val();
   if(tution_fee == '' || registration_fees == ''){
   	alert('please Enter Tution fees and Registration Fees');
   	return false;
   }
   else{
   	$.ajax({
   	url : "<?php echo base_url(); ?>AddmissionController/GetInstall_with_registration",	
   	type :"post",
   	data:{
   		'packageId' : packageId,
   		'tution_fee' : tution_fee,
   		'reg_fees'	: registration_fees,
   		'no_of_install' : noOfInstallment
   	},
   	success:function(data){
   		// console.log(data);
   		$('#installment_all_data').html(data);
   		// var res = $.parseJSON(data);
   		// $('#tuation_fees').val(res.get_install.package_fees);
   		// $('#no_of_installment').val(res.get_install.installment);
   		// // var newrec =  res.record['get_install'];
   		// // console.log(newrec);
   		// // $('#installment_all_data').html(data);
   	}
   });
   }
   }
   
   
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    
</script>
<script>
   $(document).ready(function(){
   
    demo_data();
   
    function demo_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>welcome/previous_data_demo",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);
   
       $('#redata').show(data.record['demo_id']);
   
       var d2 = data.record['demo_id'];
       var d1 = "<b style='color: black'>Demo ID : </b>";
       var demo = d1.concat(d2);
       $('#demo_idss').html(demo);
   
       var b2 = data.record['branch_name'];
       var b1 = "<b style='color: black'>Branch : </b>";
       var branch = b1.concat(b2);
       $('#branch').html(branch);
   
       var n2 = data.record['name'];
       var n1 = "<b style='color: black'>Name : </b>";
       var name = n1.concat(n2);
       $('#name').html(name);
   
       var mno2 = data.record['mobileNo'];
       var mno1 = "<b style='color: black'>MobileNo : </b>";
       var mobileno = mno1.concat(mno2);
       $('#demomobileno').html(mobileno);
   
       var staco2 = data.record['startingCourse'];
       var staco1 = "<b style='color: black'>Course : </b>";
       var staco = staco1.concat(staco2);
       $('#startingCourse').html(staco);
   
       // var fd2 = data.record['name'];
       // var fd1 = "<b style='color: black'>Assigned To : </b>";
       // var fdemo = fd1.concat(fd2);
       // $('#faculty_demo').html(fdemo);
   
       var demodate2 = data.record['addDate'];
       var demodate1 = "<b style='color: black'>Date : </b>";
       var demodate = demodate1.concat(demodate2);
       $('#demodate').html(demodate);
   
        var adb2 = data.record['addBy'];
       var adb1 = "<b style='color: black'>AddBy : </b>";
       var adby = adb1.concat(adb2);
       $('#addedby').html(adby);
   
      }
     })
    }
   
    $('#mobile_no').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      demo_data(search);
     }
     else
     {
      demo_data();
     }
    });
   });
</script>
<script>
   $(document).ready(function(){
   
    lead_data();
    function lead_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>welcome/previous_data_lead",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);
   
       $('#redata').show(data.record['lead_list_id']);
   
       var le2 = data.record['lead_list_id'];
       var le1 = "<b style='color: black'>Lead ID : </b>";
       var lead = le1.concat(le2);
       $('#lead_list_idss').html(lead);
   
       var lb2 = data.record['branch_name'];
       var lb1 = "<b style='color: black'>Branch : </b>";
       var lb = lb1.concat(lb2);
       $('#lead_branch').html(lb);
   
       var ln2 = data.record['name'];
       var ln1 = "<b style='color: black'>Name : </b>";
       var ln = ln1.concat(ln2);
       $('#lead_name').html(ln);
   
       var lm2 = data.record['mobile_no'];
       var lm1 = "<b style='color: black'>MobileNo : </b>";
       var lm = lm1.concat(lm2);
       $('#leadmobile_no').html(lm);
   
       var lc2 = data.record['package_name'];
       var lc1 = "<b style='color: black'>Course : </b>";
       var lc = lc1.concat(lc2);
       $('#lead_course').html(lc);
   
       var lead_creation_date1 = data.record['lead_creation_date'];
       var lead_creation_date2 = "<b style='color: black'>Date : </b>";
       var lead_creation_date = lead_creation_date2.concat(lead_creation_date1);
       $('#lead_creation_date').html(lead_creation_date);
   
       var ref2 = data.record['reference_name'];
       var ref1 = "<b style='color: black'>Reference By : </b>";
       var ref = ref1.concat(ref2);
       $('#reference_name').html(ref);
      }
     })
    }
   
    $('#mobile_no').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      lead_data(search);
     }
     else
     {
      lead_data();
     }
    });
   });
</script>
<script>
   $(document).ready(function(){
   
    admission_data();
   
    function admission_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>welcome/previous_data_admission",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);
   
       $('#redata').show(data.record['admission_id']);
   
       var gr2 = data.record['gr_id'];
       var gr1 = "<b style='color: black'>GR ID : </b>";
       var gr = gr1.concat(gr2);
       $('#gr_ids').html(gr);
   
       var enrollmentno2 = data.record['enrollment_number'];
       var enrollmentno1 = "<b style='color: black'>EnrollmentNo : </b>";
       var enrollmentno = enrollmentno1.concat(enrollmentno2);
       $('#enrollmentno').html(enrollmentno);
   
       const fullname2 = data.record['surname'] + " " + data.record['first_name'] + " " + data.record['father_name'];
       var fullname1 = "<b style='color: black'>Name : </b>";
       var fullname = fullname1.concat(fullname2);
       $('#fullname').html(fullname);
   
       var admissionbarnch1 = data.record['branch_name'];
       var admissionbarnch2 = "<b style='color: black'>Branch : </b>";
       var admissionbarnch = admissionbarnch2.concat(admissionbarnch1);
       $('#admissionbarnch').html(admissionbarnch);
   
        var admission_mobileno1 = data.record['mobile_no'];
       var admission_mobileno2 = "<b style='color: black'>MobileNo : </b>";
       var admission_mobileno = admission_mobileno2.concat(admission_mobileno1);
       $('#admission_mobileno').html(admission_mobileno);
   
       var course1 = data.record['course_name'];
       var course2 = "<b style='color: black'>Course : </b>";
       var course = course2.concat(course1);
       $('#admission_course').html(course);
   
       var af1 = data.record['name'];
       var af2 = "<b style='color: black'>Assigned To : </b>";
       var af = af2.concat(af1);
       $('#af').html(af);  
   
       var admission_date1 = data.record['admission_date'];
       var admission_date2 = "<b style='color: black'>Date : </b>";
       var admission_date = admission_date2.concat(admission_date1);
       $('#admission_date').html(admission_date);
   
        var adby1 = data.record['addby'];  
       var adby2 = "<b style='color: black'>AddBy : </b>";
       var adby = adby2.concat(adby1);
       $('#admission_adby').html(adby);
   
      }
     })
    }
   
    $('#mobile_no').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      admission_data(search);
     }
     else
     {
      admission_data();
     }
    });
   });
</script>
<script type="text/javascript">
   $('#Receipt').on('click',function(){
   
   var admission_id = $('#receipt_admission_id').val();
   alert(admission_id);
   
   window.open("<?php echo base_url()?>AddmissionController/admission_receipt?action=edit&id="+admission_id , '_blank');
   return false;
   });
</script>	

<script type="text/javascript">
   $('#GstReceipt').on('click',function(){
   
   var admission_id = $('#receipt_admission_id').val();
   alert(admission_id);
   
   window.open("<?php echo base_url()?>AddmissionController/admission_receiptGst?action=edit&id="+admission_id , '_blank');
   return false;
   });
</script>   
<!-- <script>
   $(".part").hide();
   $(document).ready(function(){
   			$("#hide").click(function(){
     			$(".part-1").hide();
     			$(".part").show();
   			});
   			$("#show").click(function(){
     			$(".part-1").show();
   			});
   });
   </script> -->
</body>
</html>