<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<style type="text/css">
   li.select2-selection__choice {
   background-color: #5864BC !important;
   }
</style>
<div class="main-content">
<div class="section-body">
   <div id="updsmg"></div>
   <div class="row">
      <div class="col-12 d-flex justify-content-between">
         <h6 class="page-title text-dark mb-3">Edit Admission Record</h6>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item"><a href="#">Library</a></li>
               <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
         </nav>
      </div>
      <div class="col-12 col-md-8 col-lg-8">
         <form id="form" enctype="multipart/form-data" method="post"
            action="<?php echo base_url(); ?>Admission/ErpUpdAdm_Data/">
            <input type="hidden" name="ErpAdmissionId" value="<?php echo @$this->uri->segment(3); ?>" >
            <input type="hidden" class="form-control" id="tuation_fees_two" value="<?php if (isset($admission_record->tuation_fees)) {
               echo $admission_record->tuation_fees;
               } ?>">
            <input type="hidden" class="form-control" id="registration_fees_two" value="<?php if (isset($admission_record->registration_fees)) {
               echo $admission_record->registration_fees;
               } ?>">
            <input type="hidden" class="form-control" name="Admission_id" value="<?php if (isset($admission_record->admission_id)) {
               echo $admission_record->admission_id;
               } ?>">
                <input type="hidden" class="form-control" name="Branch_id" value="<?php if (isset($admission_record->branch_id)) {
               echo $admission_record->branch_id;
               } ?>">
            <div class="card-item">
               <div class="card card-primary">
                  <div class="card-header form-title">
                     <h4>Fees Installment</h4>
                  </div>
                  <div class="col-md-4 ml-auto text-right"><input type="text"
                     class="form-control w-25 ml-auto d-inline-block mr-3" name="no_of_installments"
                     id="no_of_installments" value="<?php if (isset($admission_record->no_of_installment)) {																																		
                        echo $admission_record->no_of_installment;																																					
                        } ?>"><input type="button" value="Make Installment"
                     class="btn btn-primary" onclick="return make_installment_process()">
                     <label id="no_of_installments-error" class="error" for="no_of_installments" style="color:red;"></label>
                  </div>
                  <div class="card-body pl-3 pr-3 row pb-1 pt-2" id="installment_all_data">
                     <div class="col-lg-12">
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group text-center">
                           <label><strong>#NO</strong></label>
                           <?php $no = "1"; ?>
                           <p><?php if (isset($no)) {
                              echo $no;
                              
                              } ?></p>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Installment Date</label>
                           <input type="text" class="form-control" name="installment_date[]">
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Due Amount</label>
                           <input type="text" class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Paid Amount</label>
                           <input type="text" class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-2">
                     </div>
                     <div class="col-lg-2">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="customCheck1">
                           <label class="custom-control-label" for="customCheck1">Send SMS To:</label>
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="customCheck2">
                           <label class="custom-control-label" for="customCheck2">Send Email To:</label>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="customCheck3">
                           <label class="custom-control-label" for="customCheck3">Send SMS Father:</label>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="customCheck4">
                           <label class="custom-control-label" for="customCheck4">Send Email
                           Father:</label>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header form-title">
                     <h4>Postal Communication</h4>
                  </div>
                  <div class="card-body pl-3 pr-3 row pb-1 pt-2">
                        
                        <div class="col-lg-5">
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                 <label>Present Address:</label>
                                 <input type="text" class="form-control" name="present_house_building_no" id="present_house_building_no" placeholder="Flate, House, Building, Apartment, Company" value="<?php if(!empty($admission_record->present_flate_house_no)) { echo $admission_record->present_flate_house_no; }?>">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                 <input type="text" class="form-control" name="present_street_area" id="present_street_area" placeholder="Area, colony, street, Village" value="<?php if(!empty($admission_record->present_area_street)) { echo $admission_record->present_area_street; }?>">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                 <input type="text" class="form-control" name="present_landmark_colony" id="present_landmark_colony" placeholder="Landmark near location eg.Apolo Hospital"  value="<?php if(!empty($admission_record->present_landmark)) { echo $admission_record->present_landmark; }?>">
                                 </div>
                              </div>
                           </div>   
                           <div class="border rounded p-3" style="border-color: #e3e6fc !important;position:relative;    margin-top: 5px;">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Pin Code:</label>
                                    <input type="text" class="form-control" name="present_pin_code" id="present_pin_code" placeholder="Pin Code"  onblur="return getCountryCityDetails()"  onkeypress="return isNumberKey(event)" value="<?php if(!empty($admission_record->present_pin_code)){echo $admission_record->present_pin_code;} ?>">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>State:</label>
                                       <select class="form-control" name="present_state_id" id="present_state_id">
                                       <option value="">Select State</option>
                                       <?php foreach($list_state as $val) { ?>
                                       <option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>" <?php if(!empty($admission_record->present_state_id)) {if($admission_record->present_state_id == $val->state_name){echo "selected"; }}?>><?php echo $val->state_name; ?></option>
                                       <?php } ?>  
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>City:</label>
                                       <select class="form-control" name="present_city_id" id="present_city_id">
                                       <option value="">Select City</option>
                                       <?php foreach($list_city as $val) { ?>
                                       <option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>" <?php if(!empty($admission_record->present_city_id)) {if($admission_record->present_city_id == $val->city_name){echo "selected"; }}?>><?php echo $val->city_name; ?></option>
                                       <?php } ?>  
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label>Area:</label>
                                       <select class="form-control" name="present_area_id" id="present_area_id">
                                       <option value="">Select Area</option>
                                       <?php foreach($list_area as $ld) { ?>
                                       <option value="<?php echo $ld->area_name; ?>"><?php echo @$ld->area_name; ?></option>
                                       <?php } ?>  
                                       </select>
                                    </div>
                                 </div>
                                  
                                 <a href="javascript:" class="btn btn-primary text-white rounded-circle btn-sm post-card-btn" data-toggle="modal"
                                    data-target="#postal-area" style="border-radius: 100px !important;line-height: 17px;">+</a>
                                  
                              </div>
                           </div>
                        </div>
                    
                        <div class="col-lg-2 text-center d-flex justify-content-center align-items-center">
                           <div class=""><input type="button" class="btn btn-primary btn-sm rounded-circle" value=">>" style="border-radius: 100px !important;" onclick="return copyPresentAddressData()"></div>
                        </div>

                        <div class="col-lg-5">
                           <div class="row">          
                              <div class="col-lg-12">
                                 <div class="form-group">
                                 <label>Permanent Address:</label>
                                 <input type="text" class="form-control" name="permanent_house_building_no" id="permanent_house_building_no" placeholder="Flate, House, Building, Apartment, Company" value="<?php if(!empty($admission_record->permanent_flate_house_no)) { echo $admission_record->permanent_flate_house_no; }?>">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                 <input type="text" class="form-control" name="permanent_street_area" id="permanent_street_area" placeholder="Area, colony, street, Village" value="<?php if(!empty($admission_record->permanent_area_street)) { echo $admission_record->permanent_area_street; }?>">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                 <input type="text" class="form-control" name="permanent_landmark_colony" id="permanent_landmark_colony" placeholder="Landmark near location eg.Apolo Hospital" value="<?php if(!empty($admission_record->permanent_landmark)) { echo $admission_record->permanent_landmark; }?>">
                                 </div>
                              </div>
                           </div>         
                           <div class="border rounded p-3" style="border-color: #e3e6fc !important;position:relative;    margin-top: 5px;">        
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Pin Code:</label>
                                    <input type="text" class="form-control" name="permanent_pin_code" id="permanent_pin_code" placeholder="Pin Code"  value="<?php if(!empty($admission_record->permanent_pin_code)) { echo $admission_record->permanent_pin_code; }?>">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>State:</label>
                                       <select class="form-control" name="permanent_state_id" id="permanent_state_id">
                                       <option value="">Select State</option>
                                       <?php foreach($list_state as $val) { ?>
                                       <option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>" <?php if(!empty($admission_record->permanent_state_id)) {if($admission_record->permanent_state_id == $val->state_name){echo "selected"; }}?>><?php echo $val->state_name; ?></option>
                                       <?php } ?>  
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>City:</label>
                                       <select class="form-control" name="permanent_city_id" id="permanent_city_id">
                                       <option value="">Select City</option>
                                       <?php foreach($list_city as $val) { ?>
                                       <option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
                                       <?php } ?>  
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Area:</label>
                                       <select class="form-control" name="permanent_area_id" id="permanent_area_id">
                                       <option value="">Select Area</option>
                                       <?php foreach($list_area as $ld) { ?>
                                       <option value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
                                       <?php } ?>  
                                       </select>
                                    </div>
                                 </div>
                                 <a href="javascript:" class="btn btn-primary text-white rounded-circle btn-sm post-card-btn" data-toggle="modal"
                                    data-target="#postal-area1" style="border-radius: 100px !important;line-height: 17px;">+</a>
                              </div>   
                           </div>
                        </div>
                           


                           <!-- <div class="col-lg-6">
                              <div class="form-group">
                               <label>Present Address:</label>
                               <textarea class="form-control" autocomplete="off" id="pre_address" name="present_address" placeholder="Present Address..." required=""></textarea>
                             </div>
                           </div>
                           <div class="col-lg-6"> 
                             <div class="form-group">
                               <label>Permanent Address:</label>
                               <textarea class="form-control" autocomplete="off" id="permanent_address" name="permanent_address" placeholder="Permanent Address..." required=""></textarea>
                             </div>
                          </div> -->
                        </div> 
               </div>
               <div class="card">
                  <div class="card-header form-title">
                     <h4>Parents Details</h4>
                  </div>
                  <div class="card-body pl-3 pr-3 row pb-1 pt-2">
                     <div class="parents-detail m-3 p-3">
                        <div class="row">
                           <div class="col-lg-12">
                              <h5>Guardian 1 Details</h5>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Name:</label>
                                 <input type="text" class="form-control" name="father_name"
                                    id="father_name" placeholder="Father Name" value="<?php if(!empty($admission_record->father_name)) { echo $admission_record->father_name; }?>">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Surname:</label>
                                 <input type="text" class="form-control" name="atak_father"
                                    id="atak_father" placeholder="Your Surname" value="<?php if(!empty($admission_record->surname)) { echo $admission_record->surname; }?>">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Father Email:</label>
                                 <input type="email" class="form-control" name="father_email"
                                    id="father_email" placeholder="jone@gmail.com" value="<?php if(!empty($admission_record->father_email)) { echo $admission_record->father_email; }?>">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Father Mobile No:</label>
                                 <input type="text" class="form-control" name="father_mobile_no"
                                    id="father_mobile_no" minlength="10" placeholder="+91-00000-00000" value="<?php if(!empty($admission_record->father_mobile_no)) { echo $admission_record->father_mobile_no; }?>">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Occupation:</label>
                                 <input type="text" class="form-control" name="father_occupation"
                                    id="father_occupation" placeholder="Occupation" value="<?php if(!empty($admission_record->father_occupation)) { echo $admission_record->father_occupation; }?>">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Income:</label>
                                 <input type="text" class="form-control" name="father_income"
                                    id="father_income" placeholder="Father Income" value="<?php if(!empty($admission_record->father_income)) { echo $admission_record->father_income; }?>">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="parents-detail m-3 p-3">
                        <div class="row">
                           <div class="col-lg-12">
                              <h5>Guardian 2 Details</h5>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Name:</label>
                                 <input type="text" class="form-control" name="mother_name" value="<?php if(!empty($admission_record->mother_name)) { echo $admission_record->mother_name; }?>" 
                                    id="mother_name" placeholder="Mother Name">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Surname:</label>
                                 <input type="text" class="form-control" name="atak_mother" value="<?php if(!empty($admission_record->surname)) { echo $admission_record->surname; }?>" 
                                    id="atak_mother" placeholder="Mother Name">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Mother Email:</label>
                                 <input type="email" class="form-control" name="mother_email" value="<?php if(!empty($admission_record->mother_email)) { echo $admission_record->mother_email; }?>" 
                                    id="mother_email" placeholder="jone@gmail.com" >
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Mother Mobile No:</label>
                                 <input type="text" class="form-control" name="mother_mobile_no" value="<?php if(!empty($admission_record->mother_mobile_no)) { echo $admission_record->mother_mobile_no; }?>" 
                                    id="mother_mobile_no" placeholder="+91-00000-00000" minlength="10">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Occupation:</label>
                                 <input type="text" class="form-control" name="mother_occupation" value="<?php if(!empty($admission_record->mother_occupation)) { echo $admission_record->mother_occupation; }?>" 
                                    id="mother_occupation" placeholder="Mother Occupation">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Income:</label>
                                 <input type="text" class="form-control" name="mother_income" value="<?php if(!empty($admission_record->mother_income)) { echo $admission_record->mother_income; }?>" 
                                    id="mother_income" placeholder="Mother Income" >
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header form-title">
                     <h4>Education & Proffasion</h4>
                  </div>
                  <div class="card-body pl-3 pr-3 row pb-1 pt-2">
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>College / School Name:</label>
                           <input type="text" name="school_collage_name" id="school_collage_name" value="<?php if(!empty($admission_record->school_collage_name)) { echo $admission_record->school_collage_name; }?>"
                              class="form-control" placeholder="CLG-SCL Name">
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Country::</label>
                           <select class="form-control" name="country_id" id="country_id">
                              <option value="">Select Country</option>
                              <?php foreach ($list_country as $val) { ?>
                              <option <?php if ($val->country_name == "India") {
                                 echo "selected";
                                 } ?> value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>State:</label>
                           <select class="form-control" name="school_clg_state" id="school_clg_state">
                              <option value="">Select State</option>
                              <?php foreach ($list_state as $val) { ?>
                              <option <?php if($val->state_name == "Gujarat") {
                                 echo "selected";
                                 } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>City:</label>
                           <select class="form-control" name="school_clg_city" id="school_clg_city">
                              <option value="">Select City</option>
                              <?php foreach ($list_city as $val) { ?>
                              <option <?php if($val->city_name == "Surat") { echo "selected";} ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
                              <?php }  ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Area:</label>
                           <select class="form-control" name="school_clg_area" id="school_clg_area">
                              <option value="">Select Area</option>
                              <?php foreach ($list_area as $ld) { ?>
                              <option <?php if($ld->area_id == $admission_record->school_clg_area) { echo "selected";} ?> value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?>
                              </option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="d-block">Course Category</label>
                           <div class="pretty p-icon p-jelly p-round p-bigger">
                              <input class="form-check-input" type="radio" name="school_collage_type"
                                 value="school" id="coursecategory1" <?php if(@$admission_record->school_collage_type=="school") { echo "checked"; } ?>>
                              <div class="state p-info">
                                 <i class="icon material-icons">done</i>
                                 <label>School</label>
                              </div>
                           </div>
                           <div class="pretty p-icon p-jelly p-round p-bigger">
                              <input class="form-check-input" type="radio" name="school_collage_type"
                                 value="college" id="coursecategory2" <?php if(@$admission_record->school_collage_type=="college") { echo "checked"; } ?>>
                              <div class="state p-info">
                                 <i class="icon material-icons">done</i>
                                 <label>College</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card ">
                  <div class="card-header form-title">
                     <h4>Document</h4>
                  </div>
                  <div class="card-body pl-3 pr-3 row pb-1 pt-2">
                     <?php if(@$document_list->photos=='yes') {  ?>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>Photos</label>
                              <input type="file" class="mt-2" name="photos" id="photoLabel" value="<?php if(!empty($docrecord->photos)) { echo $docrecord->photos; }?>" 
                                 onchange="myFunction()">
                           </div>
                        </div>
                     <?php } 
                     if(@$document_list->tenth_marksheet == 'yes') {  ?>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>10th Marksheet</label>
                           <input type="file" class="mt-2" name="tenth_marksheet" value="<?php if(!empty($docrecord->tenth_marksheet)) { echo $docrecord->tenth_marksheet; }?>">
                        </div>
                     </div>
                  <?php }  
                     if(@$document_list->twelth_marksheet == 'yes') { ?>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>12th Marksheet</label>
                           <input type="file" class="mt-2" name="twelfth_marksheet" value="<?php if(!empty($docrecord->twelfth_marksheet)) { echo $docrecord->twelfth_marksheet; }?>">
                        </div>
                     </div>
                  <?php } 
                  if(@$document_list->leaving_certy == 'yes') {?>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Leaving Certy</label>
                           <input type="file" class="mt-2" name="leaving_certy" value="<?php if(!empty($docrecord->leaving_certy)) { echo $docrecord->leaving_certy; }?>">
                        </div>
                     </div>
                  <?php } 
                  if(@$document_list->treal_certy == 'yes'){ ?>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Trial Certy</label>
                           <input type="file" name="treal_certy" value="<?php if(!empty($docrecord->treal_certy)) { echo $docrecord->treal_certy; }?>">
                        </div>
                     </div>
                  <?php }
                  if(@$document_list->light_bill == 'yes') { ?>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="d-block">Light Bill</label>
                           <input type="file" name="light_bill" value="<?php if(!empty($docrecord->light_bill)) { echo $docrecord->light_bill; }?>">
                        </div>
                     </div>
                  <?php } 
                  if(@$document_list->aadhar_card == 'yes') { ?>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="d-block">Aadhar Card</label>
                           <input type="file" name="aadhar_card" value="<?php if(!empty($docrecord->aadhar_card)) { echo $docrecord->aadhar_card; }?>">
                        </div>
                     </div>
                  </div>
               <?php } ?>
                  <div class="pb-3 px-3">
                     <input class="btn btn-primary mr-1" type="submit" name="upd_record" value="Submit">
                     <!-- <button class="btn btn-light mr-1 final-receipt" type="submit" id="Receipt">Receipt</button>
                        <button class="btn btn-light mr-1 processingcheck-receipt" type="submit" id="CehckReceipt">Receipt</button>  -->
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script
   src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script>
   function make_installment_process() {
       var tution_fee = $('#tuation_fees_two').val();
       var registration_fees = $('#registration_fees_two').val();
       var noOfInstallment = $('#no_of_installments').val();
       if (tution_fee == '' || registration_fees == '') {
           alert('please Enter Tution fees and Registration Fees');
           return false;
       } else {
           $.ajax({
               url: "<?php echo base_url(); ?>Admission/Ufillup_NewInstallment",
               type: "post",
               data: {
                   'tution_fee': tution_fee,
                   'reg_fees': registration_fees,
                   'no_of_install': noOfInstallment
               },
               success: function(data) {
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



   function copyPresentAddressData(){
      var phb = $('#present_house_building_no').val();
      var psa = $('#present_street_area').val();
      var lmd = $('#present_landmark_colony').val();
      var pce = $('#present_pin_code').val();
      var pst = $('#present_state_id').val();
      var pct = $('#present_city_id').val();
      var par = $('#present_area_id').val();
      $('#permanent_house_building_no').val(phb);
      $('#permanent_street_area').val(psa);
      $('#permanent_landmark_colony').val(lmd);
      $('#permanent_pin_code').val(pce);
      $('#permanent_state_id').val(pst);
      $('#permanent_city_id').val(pct);
      $('#permanent_area_id').val(par);
   }

   function getCountryCityDetails(){
      var pinCode = $('#present_pin_code').val();
      var urlApi = "https://api.postalpincode.in/pincode/"+pinCode;
      $.ajax({
         url : urlApi,
         type : "get",
         success:function(res){
            console.log(res);
            if(res != ''){
               $('#present_state_id').val(res[0].PostOffice[0].State);
               $('#present_city_id').val(res[0].PostOffice[0].District);
            }
            else{
               $('#present_state_id').val('');
            }
         }
      });
   }

   // function disable_for_submit(){
   //    $('input[type="submit"]').attr('disabled','disabled');
   //    $('#updsmg').html(iziToast.success({
   //         title: 'Success',
   //         timeout: 2500,
   //         message: 'All Ready Updated On This Form',
   //         position: 'topRight'
   //     }));
   // }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
  $(document).ready(function () {
    $('#form').validate({
      rules: {
         no_of_installments : {
         required:true
      },
      present_house_building_no : {
            required:true
         },
      present_street_area : {
         required:true
      },
      present_landmark_colony : {
         required:true
      },
      present_pin_code : {
         required:true
      },
      present_state_id : {
         required:true
      },
      present_city_id : {
         required:true
      },
      present_area_id : {
         required:true
      },
      permanent_house_building_no : {
         required:true
      },
      permanent_street_area : {
         required:true
      },
      permanent_landmark_colony : {
         required:true
      },
      permanent_pin_code : {
         required:true
      },
      permanent_state_id : {
         required:true
      },
      permanent_city_id : {
         required:true
      },
      permanent_area_id : {
         required:true
      },
      father_name : {
         required:true
      },
      atak_father : {
         required:true
      },
      // father_email : {
      // 	required:true
      // },
      // father_mobile_no :{
      //    required : true,
      //    minlength : 10,
      //    maxlength : 10
      // },
      father_occupation : {
         required:true
      },
      father_income : {
         required:true
      },
      mother_name : {
         required:true
      },
      atak_mother : {
         required:true
      },
      // mother_email : {
      // 	required:true
      // },
      // mother_mobile_no :{
      //    required : true,
      //    minlength : 10,
      //    maxlength : 10
      // },
      mother_occupation : {
         required:true
      },
      mother_income : {
         required:true
      },
      school_collage_name : {
         required:true
      },
      country_id : {
         required:true
      },
      school_clg_state : {
         required:true
      },
      school_clg_city : {
         required:true
      },
      school_clg_area : {
         required:true
      },
      },
      messages: {
            no_of_installments:{
            required : "Enter No-OF Installment!!"
         },
         present_house_building_no :{
            required : "<span style='color:red;'>Enter House No, Building No!!</span>"
         },
         present_street_area :{
            required : "<span style='color:red;'>Enter Area Street Village!!</span>"
         },
         present_landmark_colony :{
            required : "<span style='color:red;'>Enter Near Landmark Location!!</span>"
         },
         present_pin_code :{
            required : "<span style='color:red;'>Enter Pincode!!</span>"
         },
         present_state_id :{
            required : "<span style='color:red;'>Enter State!!</span>"
         },
         present_city_id :{
            required : "<span style='color:red;'>Enter City!!</span>"
         },
         present_area_id :{
            required : "<span style='color:red;'>Enter Area!!</span>"
         },
         permanent_house_building_no :{
            required : "<span style='color:red;'>Enter House No, Building No!!</span>"
         },
         permanent_street_area :{
            required : "<span style='color:red;'>Enter Area Street Village!!</span>"
         },
         permanent_landmark_colony :{
            required : "<span style='color:red;'>Enter Near Landmark Location!!</span>"
         },
         permanent_pin_code :{
            required : "<span style='color:red;'>Enter Pincode!!</span>"
         },
         permanent_state_id :{
            required : "<span style='color:red;'>Enter State!!</span>"
         },
         permanent_city_id :{
            required : "<span style='color:red;'>Enter City!!</span>"
         },
         permanent_area_id :{
            required : "<span style='color:red;'>Enter Area!!</span>"
         },
         father_name :{
            required : "<span style='color:red;'>Enter Father Name!!</span>"
         },
         atak_father :{
            required : "<span style='color:red;'>Enter Father Name!!</span>"
         },
         // father_email :{
         //    required : "<span style='color:red;'>Enter Father Email !!</span>"
         // },
         // father_mobile_no :{
      	// required : "<span style='color:red;'>Enter Mobile No!!</span>",
      	// minlength : "<span style='color:red;'>Enter Minimum 10 digits!!</span>",
      	// maxlength : "<span style='color:red;'>Enter Maximum 10 digits!!</span>"
         // },
         father_occupation :{
            required : "<span style='color:red;'>Enter Father Occupation !!</span>"
         },
         father_income :{
            required : "<span style='color:red;'>Enter Father Income!!</span>"
         },
         mother_name :{
            required : "<span style='color:red;'>Enter Mother Name!!</span>"
         },
         atak_mother :{
            required : "<span style='color:red;'>Enter Mother Name!!</span>"
         },
         // mother_email :{
         //    required : "<span style='color:red;'>Enter Mother Email !!</span>"
         // },
         // mother_mobile_no :{
      	// required : "<span style='color:red;'>Enter Mobile No!!</span>",
      	// minlength : "<span style='color:red;'>Enter Minimum 10 digits!!</span>",
      	// maxlength : "<span style='color:red;'>Enter Maximum 10 digits!!</span>"
         // },
         mother_occupation :{
            required : "<span style='color:red;'>Enter Mother Occupation!!</span>"
         },
         mother_income :{
            required : "<span style='color:red;'>Enter Mother Income!!</span>"
         },
         school_collage_name :{
            required : "<span style='color:red;'>Enter School-Collage Name!!</span>"
         },
         country_id :{
            required : "<span style='color:red;'>please Select Country!!</span>"
         },
         school_clg_state :{
            required : "<span style='color:red;'>please Select State!!</span>"
         },
         school_clg_city :{
            required : "<span style='color:red;'>please Select City!!</span>"
         },
         school_clg_area :{
            required : "<span style='color:red;'>please Select Area!!</span>"
         }
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>