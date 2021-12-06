<!DOCTYPE html>

<html>

<head>

	<title></title>

</head>

<body>

  <?php if(@$_SESSION['logtype'] == 'Manager') {   ?>
  
    <?php if(@$st_record->application_status != '0') { ?>
    <div style="position: absolute; top:520px;">
       <form target="_blank" method="post" action="https://demo.rnwmultimedia.com/placement/student_login.php">
        <input type="hidden" name="username" value="<?php echo @$st_record->username; ?>">
        <input type="hidden" name="password" value="<?php echo @$st_record->password; ?>"><br>
        <input type="submit" value="Login" name="submit">
      </form>
    </div>
  <?php } ?>
    
    <form  id="tpo_update_record" name="tpo_update_record">

	         <div class="row" style="padding-top:20px; padding-bottom:20px">

								<div class="col-md-12 my-2" align="center">

									<label style="font-size: 30px; font-weight: 300;">Applicant Information</label>

								</div>

                              

                                <div class="col-md-3 " style="height: 400px; position:relative;">

                                    <img src="http://demo.rnwmultimedia.com/placement/img/<?php echo $st_record->photo; ?>" alt="face" height="150px" width="150px"> 

                                    <div style="position:absolute; font-size: 16px;">Application No ::<b> <?php echo $st_record->application_number; ?></b></div>

                                    <br>

                                    <div style="position:absolute; font-size: 16px;margin-top:20px;">Signature Image<br>

                                    <img src="http://demo.rnwmultimedia.com/placement/img/<?php echo $st_record->Signature; ?>" alt="face" height="100px" width="100px"></div>



                                    

                                    

                                     <div style="position:absolute; font-size: 16px;margin-top:130px;cursor: hand" id="ToggelEffectButton"><br>

                                   <!-- a href="#"> <img src="http://demo.rnwmultimedia.com/placement/img/lock_image.png" alt="face" height="20px" width="20px"></a> -->
                                 </div>

                                   <br>

                                   <div style="position:absolute; font-size: 16px;margin-top:150px;cursor: hand"><br>

                                     <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_userpass" onclick="return get_copy_paste_usernamePassowrd()" onmouseover="return change_copy_paste_usernamePassword()"><br>

                                    <span style="color:black" id="company_name_copy_paste_up">
                                      username : <?php echo $st_record->username;  ?><br>
                                      password : <?php echo $st_record->password;   ?>
                                    </span>

                                  </div>



                                 </div>



                            <input type="hidden" name="application_number" id="application_number" value="<?php echo $st_record->application_number; ?>">





                            

                               <?php $name = explode(' ', $st_record->name); ?>

                                <div class="col-md-3">

                                    <label>First Name <span class="text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="First name" name="fname"  required value="<?php if(isset($name[0])) { echo $name[0]; }?>">

                                </div>

                                <div class="col-md-3">

                                    <label>Middle Name<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control"  placeholder="Middle Name" name="mname" required   value="<?php if(isset($name[1])) { echo $name[1]; }?>">

                                </div>

                                <div class="col-md-3">

                                    <label>Last Name <span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control"  placeholder="Last name" name="lname" required  value="<?php if(isset($name[2])) { echo $name[2]; }?>">

                                </div>



                                <div class="col-md-3 my-2">

                                    <label>Address<span class=" text-danger">*</span></label>

                                    

                                     <input type="text" class="form-control" placeholder="Your Full Adress" name="address" required  value="<?php if(isset($st_record->address)) { echo $st_record->address; }?>">

                                </div>



                                <div class="col-md-3 my-2">

                                     <label>Number<span class=" text-danger">*</span></label>   

                                    

                                         <input type="text" class="form-control" id="inlineFormInputGroup" name="number" placeholder="Mobile No"  value="<?php if(isset($st_record->number)) { echo $st_record->number; }?>">

                                    

                                    

                                </div>



                                <div class="col-md-3 my-2">

                                     <label for="Grid">Gr id<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="####" name="grid" required  value="<?php if(isset($st_record->gr_id)) { echo $st_record->gr_id; }?>">

                                </div>

 <div class="col-md-3 my-2">

                                     <label for="Faculty">Faculty Name<span class=" text-danger">*</span></label>   

                                     

                                    <select class="form-control custom-select my-1 mr-sm-2" id="Faculty"  name="faculty_id">

                                        <!-- <option selected disabled>Click Here</option> -->

                                       <?php foreach(@$upd_faculty as $uf) { ?>

                                        <option value="<?php echo $uf->faculty_id; ?>" <?php if(@$uf->faculty_id == @$st_record->faculty_id) { echo "selected"; } ?> >

                                        	

                                          <?php echo $uf->name; ?>

                                        </option>



                                      <?php } ?>

                                        

                                    </select>

                                </div>



                                <div class="col-md-3 my-2">

                                     <label>Running Topic<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="Course Topics" name="running_topic" required  value="<?php if(isset($st_record->running_topic)) { echo $st_record->running_topic; }?>">

                                </div>



                                <div class="col-md-3 my-2">

                                     <label>Batch Time<span class=" text-danger">*</span></label>   

                                   <!--  <input type="text" class="form-control"  placeholder="Your Prefered Location" name="batch_time" required  value="<?php if(isset($st_record->batch_time)) { echo $st_record->batch_time; }?>"> -->

                                    <?php echo $st_record->batch_time; ?>

                                    <select id="batch_time" class="form-control" required name="batch_time">

                                        <option value=''>--Your Prefered Location--</option>

                                        <option value="8:00 AM" <?php if(@$st_record->batch_time=='8:00 AM') { echo 'selected'; } ?> >8:00 AM</option>

                                        <option <?php if(@$st_record->batch_time=='9:00 AM') { echo 'selected'; } ?> value="9:00 AM">9:00 AM</option>

                                        <option <?php if(@$st_record->batch_time=='10:00 AM') { echo 'selected'; } ?> value="10:00 AM">10:00 AM</option>

                                        <option <?php if(@$st_record->batch_time=='11:00 AM') { echo 'selected'; } ?> value="11:00 AM">11:00 AM</option>

                                        <option <?php if(@$st_record->batch_time=='12:00 PM') { echo 'selected'; } ?> value="12:00 PM">12:00 PM</option>

                                        <option <?php if(@$st_record->batch_time=='1:00 PM') { echo 'selected'; } ?> value="1:00 PM">1:00 PM</option>

                                        <option <?php if(@$st_record->batch_time=='2:00 PM') { echo 'selected'; } ?> value="2:00 PM">2:00 PM</option>

                                        <option <?php if(@$st_record->batch_time=='3:00 PM') { echo 'selected'; } ?> value="3:00 PM">3:00 PM</option>

                                        <option <?php if(@$st_record->batch_time=='4:00 PM') { echo 'selected'; } ?> value="4:00 PM">4:00 PM</option>

                                        <option <?php if(@$st_record->batch_time=='5:00 PM') { echo 'selected'; } ?> value="5:00 PM">5:00 PM</option>

                                        <option <?php if(@$st_record->batch_time=='6:00 PM') { echo 'selected'; } ?> value="6:00 PM">6:00 PM</option>

                                        <option <?php if(@$st_record->batch_time=='7:00 PM') { echo 'selected'; } ?> value="7:00 PM">7:00 PM</option>

                                      </select>



                                </div>

                                

                                 

                                



                               <div class="col-lg-9">

                                   <div class="row">

                                     <div class="col-md-4 my-2">

                                         <label>Position For Applied<span class=" text-danger">*</span></label>   

                                      

                                         <select class="form-control custom-select my-1 mr-sm-2"  name="position_for_apply"  required  >

                                           

                                           <?php foreach($upd_position_applied as $upa)  { ?>

                                            



                                            <!-- <option>Select </option> -->

                                            <option value="<?php echo $upa->job_position; ?>" <?php if(@$st_record->position_for_apply==@$upa->job_position) { echo 'selected'; } ?> > <?php echo $upa->job_position; ?> </option>

                                          <?php } ?>

                                        </select>

                                    </div>



                                    <div class="col-md-4 my-2">

                                         <label>Position Subcategory<span class=" text-danger">*</span></label>   

                                      

                                         <select class="form-control custom-select my-1 mr-sm-2"  name="position_subcategory"  required  >

                                           

                                            

                                            <!-- <option>Select </option> -->

                                            <!-- <option><?php echo $st_record->job_subcategory;?></option> -->

                                            <?php foreach($upd_position_subcategory as $ups) { 
                                              if(@$ups->job_position_cat == @$st_record->position_for_apply) { ?>



                                              <option value="<?php echo $ups->job_subcategory_name; ?>" <?php if(@$ups->job_subcategory_name == @$st_record->job_subcategory){ echo 'selected'; } ?> ><?php echo $ups->job_subcategory_name; ?></option>

                                            <?php } } ?>



                                        </select>

                                    </div>



                                    <div class="col-md-4 my-2">

                                       <label>Enter Skills<span class=" text-danger">*</span></label>   

                                      <input type="text" class="form-control" placeholder="Skill" name="skill" required  value="<?php if(isset($st_record->skill)) { echo $st_record->skill; }?>" >

                                    </div>



                                       

                                        

                                   </div>

                               </div>



                               <div class="col-md-3 my-2">

                                            <label>Prefer Location For Job:<span class=" text-danger">*</span></label>   

                                          

                                           <select class="form-control custom-select my-1 mr-sm-2"   name="prefer_job_location" required >

                                              

                                              

                                               





                                                <option value="">-- Select Option --</option>



                  <option value="Adajan" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Adajan') { echo "selected"; }}?>>Adajan</option>

                  

                  <option value="Amroli" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Amroli') { echo "selected"; }}?>>Amroli</option>

                 

                  <option value="Athvalines" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Athvalines') { echo "selected"; }}?>>Athvalines</option>



                  <option value="Bhattar" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Bhattar') { echo "selected"; }}?>>Bhattar</option>

                 

                  <option value="Chikuvadi" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Chikuvadi') { echo "selected"; }}?>>Chikuvadi</option>

                  

                  <option value="Delhi Gate" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Delhi Gate') { echo "selected"; }}?>>Delhi Gate</option>

                  

                  <option value="GhodDod Road" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='GhodDod Road') { echo "selected"; }}?>>GhodDod Road</option>

                  <option value="Gatanjali" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Gatanjali') { echo "selected"; }}?>>Gatanjali</option>

                   <option value="Katargam" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Katargam') { echo "selected"; }}?>>Katargam</option>

                  <option value="Hirabaug" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Hirabaug') { echo "selected"; }}?>>Hirabaug</option>

                  <option value="Kozve" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Kozve') { echo "selected"; }}?>>Kozve</option>

                  

                  <option value="Lal Darawaja" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Lal Darawaja') { echo "selected"; }}?>>Lal Darawaja</option>

                  

                  <option value="Majuragate" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Majuragate') { echo "selected"; }}?>>Majuragate</option>

                  <option value="Mini Bazar" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Mini Bazar') { echo "selected"; }}?>>Mini Bazar</option>

                 

                  <option value="Nanpura" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Nanpura') { echo "selected"; }}?>>Nanpura</option>





                  <option value="Varachha" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Varachha') { echo "selected"; }}?>>Varachha</option>

                  <option value="Mota Varachha" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Mota Varachha') { echo "selected"; }}?>>Mota Varachha</option>

                  <option value="Pandesara" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Pandesara') { echo "selected"; }}?>>Pandesara</option>

                 

                  <option value="Piplod" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Piplod') { echo "selected"; }}?>>Piplod</option>



                  <option value="Rachana" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Rachana') { echo "selected"; }}?>>Rachana</option>

                  <option value="Rander" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Rander') { echo "selected"; }}?>>Rander</option>

                  <option value="Ring Road" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Ring Road') { echo "selected"; }}?>>Ring Road</option>

                  <option value="Sarthana" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Sarthana') { echo "selected"; }}?>>Sarthana</option>

                  <option value="ShyamDham" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='ShyamDham') { echo "selected"; }}?>>ShyamDham</option>

                  <option value="Simadanaka" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Simadanaka') { echo "selected"; }}?>>Simadanaka</option>

                  <option value="Station" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Station') { echo "selected"; }}?>>Station</option>

                  <option value="Uttran" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Uttran') { echo "selected"; }}?>>Uttran</option>

                  

                  <option value="Yogichowk" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Yogichowk') { echo "selected"; }}?>>Yogichowk</option>



                 <option value="Vesu" <?php if(isset($st_record->prefer_job_location)) { if($st_record->prefer_job_location=='Vesu') { echo "selected"; }} ?> >Vesu</option>



                                               

                                           </select>

                                       </div>



                                <div class="col-md-3 my-2">

                                    <label>Salary expectation<span class=" text-danger">*</span></label>   

                                   <input type="text" class="form-control" placeholder="10k-15k"  name="salary_expectation" required   value="<?php if(isset($st_record->salary_expectation)) { echo $st_record->salary_expectation; }?>">

                               </div>

                             



                                <div class="col-md-3 my-2">

                                    <label>Remarks<span class=" text-danger">*</span></label>   

                                   <input type="text" class="form-control"  placeholder="Your Need"  name="remarks"  required value="<?php if(isset($st_record->remarks)) { echo $st_record->remarks; }?>">

                               </div>

                                </div>

                                <?php  if(@$st_record->company_name=='') { }else { ?>

                <div class="row" style="padding-top:20px; padding-bottom:20px" >

                                  

                          <div class="col-md-12 my-2" align="center">

                      <label>Previous Employeement Information</label>

                    </div>

                                    <div class="col-md-8 my-2">

                                        <label>Company Name<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="Previous Company Nname" name="company_name"  value="<?php if(isset($st_record->company_name)) { echo $st_record->company_name; }?>">

                                    </div> 

                                   

                                    <div class="col-md-4 my-2">

                                            <label>Number<span class=" text-danger">*</span></label>   

                                       

                                                <input type="text" class="form-control" id="inlineFormInputGroup"  name="company_number" placeholder="Company No" value="<?php if(isset($st_record->company_number)) { echo $st_record->company_number; }?>">

                                        

                                    </div>



                                    <div class="col-md-8 my-2">

                                        <label>Address<span class=" text-danger">*</span></label>

                                        

                                        <input type="text" class="form-control" id="inlineFormInputGroup"   name="company_address" placeholder="Comany Address" value="<?php if(isset($st_record->company_address)) { echo $st_record->company_address; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                        <label for="Supervisor">Company Supervisor<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control"  name="company_sup_name"  id="Supervisor" placeholder="Supervisor Name"  value="<?php if(isset($st_record->company_sup_name)) { echo $st_record->company_sup_name; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                            <label>Job Title<span class=" text-danger">*</span></label>   

                                               <input type="text" class="form-control" name="job_title"  placeholder="Your Profession"  value="<?php if(isset($st_record->job_title)) { echo $st_record->job_title; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                            <label>Starting Salary<span class=" text-danger">*</span></label>   

                                               <input type="text" class="form-control" name="starting_salary" placeholder="8k"  value="<?php if(isset($st_record->starting_salary)) { echo $st_record->starting_salary; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                            <label>Ending Salary<span class=" text-danger">*</span></label>   

                                               <input type="text" class="form-control" name="ending_salary"  placeholder="15k" value="<?php if(isset($st_record->ending_salary)) { echo $st_record->ending_salary; }?>">

                                    </div>



                                    <div class="col-md-12 my-2">

                                            <label>Responsibilities<span class=" text-danger">*</span></label>   

                                               <input type="text" class="form-control" name="responsibilities"  placeholder=""  value="<?php if(isset($st_record->responsibilities)) { echo $st_record->responsibilities; }?>">

                                    </div>

                                       

                                    <div class="col-md-4 my-2">

                                            <label>Form<span class=" text-danger">*</span></label>   

                                               <input type="" class="form-control datepicker"   name="leave_from"  value="<?php if(isset($st_record->leave_from)) { echo $st_record->leave_from; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                            <label>To<span class=" text-danger">*</span></label>   

                                               <input type="" class="form-control datepicker" name="leave_to"  value="<?php if(isset($st_record->leave_to)) { echo $st_record->leave_to; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                            <label>Reason For Leaving<span class=" text-danger">*</span></label>   

                                               <input type="text" class="form-control" name="leave_reason" value="<?php if(isset($st_record->leave_reason)) { echo $st_record->leave_reason; }?>" >

                                    </div>



                                    <div class="col-md-8 my-2">

                                            <label>May we contact your previous supervisor for a reference?                                          <span class="text-danger">*</span></label>  

                                             <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="radio" id="inlineCheckbox1"  value="yes" name="contact_sup">

                                                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>

                                            </div>

                                            

                                            <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="radio" id="inlineCheckbox2"  value="no" name="contact_sup">

                                                    <label class="form-check-label" for="inlineCheckbox2">No</label>

                                            </div>

                                              

                                    </div>







          </div>





         <?php } ?>

         <div id="upd_record_data"></div>

         <input type="submit" name="submit" value="Edit Information" class="form-control btn btn-success" >

       </form>

            </div>



            



       <?php } else { ?>





             <div class="row" style="padding-top:20px; padding-bottom:20px">

                <div class="col-md-12 my-2" align="center">

                  <label style="font-size: 30px; font-weight: 300;">Applicant Information</label>

                </div>

                              

                                <div class="col-md-3 my-2" style="height: 400px; position:relative;">

                                    <img src="http://demo.rnwmultimedia.com/placement/img/<?php echo @$st_record->photo; ?>" alt="face" height="150px" width="150px"> 

                                    <div style="position:absolute; font-size: 16px;">Application No ::<b> <?php echo @$st_record->application_number; ?></b></div>

                                    <br>

                                    <div style="position:absolute; font-size: 16px;margin-top:20px;">Signature Image<br>

                                    <img src="http://demo.rnwmultimedia.com/placement/img/<?php echo @$st_record->Signature; ?>" alt="face" height="100px" width="100px"></div>



                                    

                                    

                                     <div style="position:absolute; font-size: 16px;margin-top:130px;cursor: hand" id="ToggelEffectButton"><br>

                                   <a href="#"> <img src="http://demo.rnwmultimedia.com/placement/img/lock_image.png" alt="face" height="20px" width="20px"></a></div>

                                   <br>

                                   <!--<div style="position:absolute; font-size: 16px;margin-top:150px;cursor: hand" id="show_username_password"><br>-->
                                   <div style="font-size: 16px;margin-top:150px;cursor: hand" ><br>

                                    <form method="post" action="https://demo.rnwmultimedia.com/placement/student_login.php">
                                    username : <?php echo @$st_record->username;?><br>

                                    password : <?php echo @$st_record->password; ?>
                                    <input type="hidden" name="username" value="<?php echo @$st_record->username; ?>">
                                    <input type="hidden" name="password" value="<?php echo @$st_record->password; ?>"><br>
                                    <input type="submit" value="Login" name="submit">
                                  </form>
                                  </div>



                                 </div>



                            <input type="hidden" name="application_number" id="application_number" value="<?php echo @$st_record->application_number; ?>">





                            

                               <?php $name = explode(' ', @$st_record->name); ?>

                                <div class="col-md-3 my-2">

                                    <label>First Name <span class="text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="First name" name="fname" required readonly value="<?php if(isset($name[0])) { echo $name[0]; }?>">

                                </div>

                                <div class="col-md-3 my-2">

                                    <label>Middle Name<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control"  placeholder="Middle Name" name="mname" required  readonly value="<?php if(isset($name[1])) { echo $name[1]; }?>">

                                </div>

                                <div class="col-md-3 my-2">

                                    <label>Last Name <span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control"  placeholder="Last name" name="lname" required readonly value="<?php if(isset($name[2])) { echo $name[2]; }?>">

                                </div>



                                <div class="col-md-3 my-2">

                                    <label>Address<span class=" text-danger">*</span></label>

                                    

                                     <input type="text" class="form-control" placeholder="Your Full Adress" name="address" required readonly value="<?php if(isset($st_record->address)) { echo $st_record->address; }?>">

                                </div>



                                <div class="col-md-3 my-2">

                                     <label>Number<span class=" text-danger">*</span></label>   

                                    

                                         <input type="text" class="form-control" id="inlineFormInputGroup" name="number" placeholder="Mobile No" readonly value="<?php if(isset($st_record->number)) { echo $st_record->number; }?>">

                                    

                                    

                                </div>



                                <div class="col-md-3 my-2">

                                     <label for="Grid">Gr id<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="####"  required readonly value="<?php if(isset($st_record->gr_id)) { echo $st_record->gr_id; }?>">

                                </div>

 <div class="col-md-3 my-2">

                                     <label for="Faculty">Faculty Name<span class=" text-danger">*</span></label>   

                                    <select class="form-control custom-select my-1 mr-sm-2" id="Faculty"  name="faculty_id" disabled>

                                        <!-- <option selected disabled>Click Here</option> -->

                                       

                                        <option>

                                          <?php echo @$st_record->faculty_name; ?>

                                        </option>

                                        

                                    </select>

                                </div>



                                <div class="col-md-3 my-2">

                                     <label>Running Topic<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="Course Topics" name="running_topic" required readonly value="<?php if(isset($st_record->running_topic)) { echo $st_record->running_topic; }?>">

                                </div>



                                 

                                <div class="col-md-3 my-2">

                                     <label>Enter Skills<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="Skill" name="skill" required readonly value="<?php if(isset($st_record->skill)) { echo $st_record->skill; }?>" >

                                </div>

                                 

                                



                               <div class="col-lg-9">

                                   <div class="row">

                                     <div class="col-md-6 my-2">

                                         <label>Position For Applied<span class=" text-danger">*</span></label>   

                                      

                                         <select class="form-control custom-select my-1 mr-sm-2"  name="position_for_apply[]" multiple required disabled >

                                           

                                            

                                            <option>Select </option>

                                            <option><?php echo @$st_record->position_for_apply;?></option>

                                        </select>

                                    </div>

                                       <div class="col-md-6 my-2">

                                            <label>Prefer Location For Job:<span class=" text-danger">*</span></label>   

                                          

                                           <select class="form-control custom-select my-1 mr-sm-2"  multiple name="prefer_job_location[]" required disabled>

                                              

                                               <option>Select </option>

                                               <option><?php echo @$st_record->prefer_job_location;?></option>

                                              

                                           </select>

                                       </div>

                                        

                                   </div>

                               </div>

                                <div class="col-md-3 my-2">

                                    <label>Salary expectation<span class=" text-danger">*</span></label>   

                                   <input type="text" class="form-control" placeholder="10k-15k"  name="salary_expectation" required readonly  value="<?php if(isset($st_record->salary_expectation)) { echo $st_record->salary_expectation; }?>">

                               </div>

                                <div class="col-md-3 my-2">

                                     <label>Batch Time<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control"  placeholder="Your Prefered Location" name="batch_time" required readonly value="<?php if(isset($st_record->batch_time)) { echo $st_record->batch_time; }?>">

                                </div>



                                <div class="col-md-3 my-2">

                                    <label>Remarks<span class=" text-danger">*</span></label>   

                                   <input type="text" class="form-control"  placeholder="Your Need"  name="remarks" readonly required value="<?php if(isset($st_record->remarks)) { echo $st_record->remarks; }?>">

                               </div>



                                </div>

            </div>



            <?php  if(@$st_record->company_name=='') { }else { ?>

                <div class="row" style="padding-top:20px; padding-bottom:20px" >

                                  

                          <div class="col-md-12 my-2" align="center">

                      <label>Previous Employeement Information</label>

                    </div>

                                    <div class="col-md-8 my-2">

                                        <label>Company Name<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="Previous Company Nname" name="company_name"  value="<?php if(isset($st_record->company_name)) { echo $st_record->company_name; }?>">

                                    </div> 

                                   

                                    <div class="col-md-4 my-2">

                                            <label>Number<span class=" text-danger">*</span></label>   

                                       

                                                <input type="text" class="form-control" id="inlineFormInputGroup"  name="company_number" placeholder="Company No" value="<?php if(isset($st_record->company_number)) { echo $st_record->company_number; }?>">

                                        

                                    </div>



                                    <div class="col-md-8 my-2">

                                        <label>Address<span class=" text-danger">*</span></label>

                                        

                                        <input type="text" class="form-control" id="inlineFormInputGroup"   name="company_address" placeholder="Comany Address" value="<?php if(isset($st_record->company_address)) { echo $st_record->company_address; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                        <label for="Supervisor">Company Supervisor<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control"  name="company_sup_name"  id="Supervisor" placeholder="Supervisor Name"  value="<?php if(isset($st_record->company_sup_name)) { echo $st_record->company_sup_name; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                            <label>Job Title<span class=" text-danger">*</span></label>   

                                               <input type="text" class="form-control" name="job_title"  placeholder="Your Profession"  value="<?php if(isset($st_record->job_title)) { echo $st_record->job_title; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                            <label>Starting Salary<span class=" text-danger">*</span></label>   

                                               <input type="text" class="form-control" name="starting_salary" placeholder="8k"  value="<?php if(isset($st_record->starting_salary)) { echo $st_record->starting_salary; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                            <label>Ending Salary<span class=" text-danger">*</span></label>   

                                               <input type="text" class="form-control" name="ending_salary"  placeholder="15k" value="<?php if(isset($st_record->ending_salary)) { echo $st_record->ending_salary; }?>">

                                    </div>



                                    <div class="col-md-12 my-2">

                                            <label>Responsibilities<span class=" text-danger">*</span></label>   

                                               <input type="text" class="form-control" name="responsibilities"  placeholder=""  value="<?php if(isset($st_record->responsibilities)) { echo $st_record->responsibilities; }?>">

                                    </div>

                                       

                                    <div class="col-md-4 my-2">

                                            <label>Form<span class=" text-danger">*</span></label>   

                                               <input type="" class="form-control datepicker"   name="leave_from"  value="<?php if(isset($st_record->leave_from)) { echo $st_record->leave_from; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                            <label>To<span class=" text-danger">*</span></label>   

                                               <input type="" class="form-control datepicker" name="leave_to"  value="<?php if(isset($st_record->leave_to)) { echo $st_record->leave_to; }?>">

                                    </div>



                                    <div class="col-md-4 my-2">

                                            <label>Reason For Leaving<span class=" text-danger">*</span></label>   

                                               <input type="text" class="form-control" name="leave_reason" value="<?php if(isset($st_record->leave_reason)) { echo $st_record->leave_reason; }?>" >

                                    </div>



                                    <div class="col-md-8 my-2">

                                            <label>May we contact your previous supervisor for a reference?                                          <span class="text-danger">*</span></label>  

                                             <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="radio" id="inlineCheckbox1"  value="yes" name="contact_sup">

                                                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>

                                            </div>

                                            

                                            <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="radio" id="inlineCheckbox2"  value="no" name="contact_sup">

                                                    <label class="form-check-label" for="inlineCheckbox2">No</label>

                                            </div>

                                    </div>

          </div>



         <?php } ?>

 

       <?php } ?>



<div class="col-md-12 my-2" align="center">

<label style="font-size: 30px; margin-top: 60px; font-weight: 300;">Faculty Remarks</label>



<div class="col-md-12">



  search ::  <input type="text" name="re_searching" id="re_searching" onkeyup="return searchingByRemarks()">



</div>

								

<div class="w-100 mt-5" id="remarks_data_record">	



<div class="table-responsive">



<table class="table">

  <tr style="background:#7460ee; color:white;">

    <th>No</th>

    <th>Date</th>

    <th>Assign Faculty</th>

    <th>Labels</th>

    <th width="50%">Remarks</th>

    <th>Remarks By</th> 

   </tr>

<?php   

$i=1;

foreach($student_remakrs as $sr) { ?>

   <tr>

    <td><?php echo $i; ?></td>

    <td><?php echo $sr->re_date; ?></td>

    <td><?php echo $sr->faculty_assign; ?></td>

    <td><?php echo $sr->labels; ?></td>

    <td><?php echo $sr->remarks; ?></td>

    <td><?php echo $sr->remarks_by; ?></td>

  



   </tr>                     



<?php $i++; } ?>

  

</table>

</div>

</div>

</div>



</body>

</html>



<script>

function searchingByRemarks()

{

    var searching =  $('#re_searching').val();

    var appli_no =  $('#application_number').val();

   

    $.ajax({

      url : "<?php echo base_url(); ?>FormController/remarks_search",

      type : "post",

      data:{

        'remark_search' : searching,

        'application_no' : appli_no

      },

      success:function(res)

      {

        $('#remarks_data_record').html(res);

      }

    });



}

  



$(document).ready(function(){

   $("#ToggelEffectButton").click(function(){

        $('#show_username_password').fadeToggle(3000);

    });

 });



        $('#show_username_password').hide();





        





  </script>



<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>

// just for the demos, avoids form submit



$( "#tpo_update_record" ).submit(function(e){ 



    e.preventDefault();

}).validate({

  rules: {

    fname: {

      required: true

    },

    mname:{

      required: true

    },

    lname :{

      required: true

    },

    address:{

      required:true

    },

    number :{

      required:true

    },

    grid :{

      required:true

    },

    faculty_id:{

      required: true

    },

    running_topic:{

      required : true

    },

    batch_time :{

      required : true

    },

    position_for_apply:{

      required : true

    },

    position_subcategory :{

      required : true

    },

    skill :{

      required :true

    },

    prefer_job_location : {

      required : true

    },

    salary_expectation : {

      required : true

    },

    remarks : {

      required: true

    }

  },

  messages:{

    fname : {

      required :"<div style='color:red'>Enter First Name</div>"

    },

    mname:{

      required :"<div style='color:red'>Enter Middle Name</div>"

    },

    lname :{

      required: "<div style='color:red'>Enter Last Name</div>"

    },

    address:{

      required : "<div style='color:red'>Enter Address</div>"

    },

    number :{

      required : "<div style='color:red'>Enter Number</div>"

    },

    grid :{

      required:"<div style='color:red'>Enter Grid</div>"

    },

    faculty_id :{

      required: "<div style='color:red'>Select Faculty Name</div>"

    },

    running_topic : {

      required : "<div style='color:red'>Enter Running Topic</div>"

    },

    batch_time :{

      required : "<div style='color:red'>Select Batch Time<div>"

    },

    position_for_apply :{

      required : "<div style='color:red'>Select Postion for Apply</div>"

    },

    position_subcategory : {

      required : "<div style='color:red'>Select Postion for Subcategory</div>"

    },

    batch_time : {

      required : "<div style='color:red'>Select Batch Time</div>"

    },

    prefer_job_location : {

      required : "<div style='color:red'>Select Prefer Job Location</div>"

    },

    salary_expectation : {

      required : "<div style='color:red'>Select Salary Expectation</div>"

    },

    remarks : {

      required : "<div style='color:red'>Enter Remarks</div>"

    }

  },

 submitHandler: function(form) {

       // form.preventDefault();

      var formdata = $('#tpo_update_record').serialize(); 

  

      $.ajax({

        url : "<?php echo base_url(); ?>FormController/editjobApplication",

        type : "POST",

        data : formdata,

        dataType: "json",

        success:function(response){

          if(response == '1'){

              $('#upd_record_data').html("<div class='alert alert-success'>Successfully Updated Record</div>");

          }

          else if(response == '2'){

              $('#upd_record_data').html("<div class='alert alert-success'>Something Wrong!! Please Refresh it!!</div>");



          }





                    setTimeout(function () {

                      window.location = "<?php echo base_url(); ?>FormController/jobApplication";

                    }, 2000);



        }

      })

      return false;

    }

});

</script>