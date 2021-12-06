<style>
.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 4vw;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
 <link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<div class="main-content">
   <div class="row">
      <div class="col-12 d-flex justify-content-between">
         <h6 class="page-title text-dark mb-3">Job Apply Application</h6>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
               <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target=".filter-income">Home</a></li>
               <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target=".whastapp-message">Library</a></li>
               <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
         </nav>
      </div>
   </div>
  

   <div class="extra_lead_menu">
      <div class="extra_top-menu d-flex justify-content-between">
         <ul class="pl-0">
            <li>
               <a href="<?php echo base_url(); ?>Common/lms_jobApplication?status=Inactive" class="btn btn-primary ">
               NeW<span class="badge badge-transparent"><?php echo $newRecord; ?></span>
               </a>
            </li>
            <li>
               <a href="<?php echo base_url(); ?>Common/lms_jobApplication?status=newfollowup" class="btn btn-primary ">
               New  Today Followup<span class="badge badge-transparent"><?php echo $newfollowupRecord; ?></span>
               </a>
            </li>
            <li>
               <a href="<?php echo base_url(); ?>Common/lms_jobApplication?status=Active" class="btn btn-primary ">
               Active<span class="badge badge-transparent"><?php echo $activeRecord ;?></span>
               </a>
            </li>
            <li>
               <a href="<?php echo base_url(); ?>Common/lms_jobApplication?status=newfollowup" class="btn btn-primary ">
               Today Record<span class="badge badge-transparent"><?php echo $activefollowupRecord; ?></span>
               </a>
            </li>
            <li>
               <a href="<?php echo base_url(); ?>Common/lms_jobApplication?status=postpone" class="btn btn-primary ">
               New  Today Followup Postponed<span class="badge badge-transparent"><?php echo $postponeRecord; ?></span>
               </a>
            </li>
            <li>
               <a href="<?php echo base_url(); ?>Common/lms_jobApplication?status=wpf" class="btn btn-primary ">
               Alumini<span class="badge badge-transparent"><?php echo $wpf; ?></span>
               </a>
            </li>
            <li>
               <a href="<?php echo base_url(); ?>Common/lms_jobApplication?status=confirm" class="btn btn-primary ">
               Confirm<span class="badge badge-transparent"><?php echo $confirmRecord; ?></span>
               </a>
            </li>
            <li>
               <a href="<?php echo base_url(); ?>Common/lms_jobApplication?status=discard" class="btn btn-primary ">
               Discard<span class="badge badge-transparent"><?php echo $discardRecord; ?></span>
               </a>
            </li>
         </ul>
         <ul style="padding-left:0;">
            <li class="float-right ml-2"><a href="" class="btn btn-info" data-toggle="modal" data-target=".filter-income"><span data-toggle="tooltip" data-placement="bottom" title="Export Data"><i class="fas fa-filter mr-1 text-white"></i></sapn></a></li>
            <li class="float-right ml-2"><a href="" class="btn btn-info" data-toggle="modal" data-target=" "><span data-toggle="tooltip" data-placement="bottom" title="Remarks"><i class="far fa-bell text-white"></i></span></a></li>
            <li class="float-right"><a href="javascript:" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg" id="btnExporttoExcel"><span data-toggle="tooltip" data-placement="bottom" title="Filter"><i class="far fa-file-excel text-white"></i></span></a></li>
         </ul>
      </div>
   </div>
   <div class="card mt-4">
      <div class="card-body">
          <div class="flash_data" id="flash_data">
      <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success bg-success" id="yellow">      
                           <?php echo $this->session->flashdata('message')?>
                        </div>
                        <?php } ?>
      </div>
         <div class="table-responsive">
            <table class="table table-striped overdue-table" id="table-1">
               <thead>
                  <tr>
                     <th width="100px">Applicant Photo</th>
                     <th width="250px">Applicant Details</th>
                     <th>Position</th>
                     <th>Skill</th>
                     <th>Location</th>
                     <th>Previous Employment?   </th>
                     <th width="150px" class="text-center">Action</th>
                     <th width="180px">Status</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  $i=1;
                  $cncp=1; 
                  foreach($application_job_all as $job)  { ?>
                  <tr>
                     <td class="text-center">
                        <?php if(!empty($job->photo)){ ?>
                        <img src="http://demo.rnwmultimedia.com/placement/img/<?php echo $job->photo;  ?>" name="aboutme" width="80" height="80" border="1" class="img-circle">
                        <?php }else{ ?>
                        <img src="http://demo.rnwmultimedia.com/placement/img/default.png" name="aboutme" width="80" height="80" border="1" class="img-circle">
                        <?php } ?>
                        <?php echo $job->application_number; ?> / 
                        <br><img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_grid_<?php echo $cncp; ?>" onclick="return get_copy_paste_grid(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_grid(<?php echo $cncp; ?>)">
                        <?php  $al_gr = substr($job->gr_id,0,7); 
                           if(@$al_gr == 'Alumini'){ ?>
                        <span style="color:white; padding:1px; background-color: blue;border-radius: 3px;"  id="company_name_copy_paste_grid_<?php echo $cncp; ?>"><?php echo $job->gr_id; ?></span>
                        <br><br>
                        <?php } else { ?>
                        <span style="color:white; padding:1px; background-color: green;border-radius: 3px;"  id="company_name_copy_paste_grid_<?php echo $cncp; ?>"><?php echo $job->gr_id; ?></span>
                        <br><br>
                        <?php } ?>
                     </td>
                     <td class="app-details">
                        <a onclick="return get_copy_paste_mobile(<?php echo $cncp;?>)" id="copy_paste_record_mobile_<?php echo $cncp; ?>" class=" bg-primary action-icon text-white btn-primary mr-1" target="_blank"><span id="company_name_copy_paste_mobile_<?php echo $cncp;?>" style="display:none;"><?php echo $job->number; ?></span><span data-toggle="tooltip" data-placement="top" title="Copy Phone Number"><i class="fa fa-phone"></i></span></a>
                        <a href="https://api.whatsapp.com/send/?phone=<?php echo $job->number; ?>&text&app_absent=0" class="bg-success action-icon text-white btn-success mr-1" target="_blank"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>
                        <a href="javascript:send_whatsapp_template(<?php echo  $job->application_id?>)" class="bg-info action-icon text-white btn-info" ><i class="far fa-comment-dots" style="font-size:16px;"></i></a>  
                        <p class="mt-2"><strong>Date :</strong><?php echo $job->application_date; ?></p>
                        <p ><strong><i class="far fa-copy" id="copy_paste_record_name_<?php echo $cncp; ?>" onclick="return get_copy_paste_name(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_name(<?php echo $cncp; ?>)"></i></strong> <span id="company_name_copy_paste_name_<?php echo $cncp; ?>"><?php echo  $job->name;?></span></p>
                        <p><strong>Parent's No :</strong><?php echo $job->parents_phone ;?></p>
                        <p><strong>Faculty Name :</strong> <?php foreach($all_faculty as $row) { if($job->faculty_id==$row->faculty_id) { echo $row->name; } } ?></p>
                        <p><strong>Branch :</strong><?php foreach($all_branches as $row) { if($job->branch_id ==$row->branch_id) { echo $row->branch_name; } } ?></p>
                     <td><?php echo $job->position_for_apply ?></td>
                     <td><?php echo $job->skill; ?></br> </td>
                     <td><?php echo $job->prefer_job_location; ?></td>
                       <td>Company Name :<?php echo $job->confirm_company_name; ?><br>
                           Starting Salary :<?php echo $job->confirm_starting_salary_confirm; ?><br>
                           Joining Date : <?php echo $job->confirm_joining_date; ?><br>
                           Bond : <?php echo $job->confirm_bond_year_month; ?>
                       </td>
                     <td class="text-center">
                        <?php $aid = $job->application_id; ?>
                        <a href="javascript:co_upd(<?php echo $aid; ?>)" class="bg-primary action-icon text-white btn-primary"><span data-toggle="tooltip" data-placement="top" title="Applicant Details"><i class="fas fa-eye"></i></span></a>
                        <a href="javascript:add_remark(<?php echo $aid;?>)" class="bg-info action-icon text-white btn-info"><span data-toggle="tooltip" data-placement="top" title="Applicant Remarks"><i class="far fa-comment-alt"></i></span></a>
                        <a href="javascript:add_Joining_letter(<?php echo $aid;?>)" class="bg-hold action-icon text-white btn-hold"><span data-toggle="tooltip" data-placement="top" title="Upload Joining Letter"><i class="fas fa-link"></i></span></a>
                        <a href="javascript:rate_app(<?php echo $aid; ?>)" class="bg-warning action-icon text-white btn-warning"><span data-toggle="tooltip" data-placement="top" title="Rating"><i class="far fa-star"></i></span></a>
                     </td>
                     <td>
                     <input type="hidden" id="app_con_pop_id" value="<?php echo  $job->application_id; ?>">
                        <select class="form-control btn-100 d-inline-block w-75 mr-1 appstatus" style="margin-bottom:10px;" name="appjobstatus" id="applicationstatus" onchange="return getval(this,'<?php echo $job->application_number;?>');">
                           <option value="">----select----</option>
                           <option value="5">New Followup</option>
                           <option value="1">Active</option>
                           <option value="6">Active Followup</option>
                           <option value="3">Postpone</option>
                           <option value="2">Confirm</option>
                           <option value="4">Discart</option>
                           <option value="7">wpf</option>
                        </select>
                        <?php $bid = $job->application_id; ?>
                        <!-- <a href="javascript:status_change(<?php echo $bid;?>)" class="bg-info action-icon text-white btn-info" ><i class="fas fa-arrow-right"></i></a> -->
                     </td>
                  </tr>
                  <?php  $i++; $cncp++; } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- Large modal -->
<?php if($appli_sts=="inactive") {
         $st=0; $followup=''; 
         }
         else if($appli_sts == 'newfollowup'){
         $st=5;  
         }
         else if($appli_sts=="active") { 
         $st=1; 
         }
         else if($appli_sts == 'activefollowup'){
         $st=6;  
         }
         else if($appli_sts=="confirm") { 
         $st=2; 
         }
         else if($appli_sts=="postpone") { 
         $st=3; 
         }
         else if($appli_sts=="discard") { 
         $st=4;
         }else if($appli_sts == 'wpf'){
         $st =7; 
         }
   ?>
<div class="modal fade filter-income" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Search</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="post" action="<?php echo base_url(); ?>Common/lms_jobApplication?status=<?php echo $appli_sts;?>" >
            <input type="hidden" name="application_status_wise_filter" value="<?php echo $st; ?>">
               <div class="form-row">
                  <div class="form-group col-md-3">
                     <label for="inputEmail4">First Name</label>
                     <input type="text" class="form-control" id="" name="filter_fname" value="<?php if(!empty($filter_fname)) { echo $filter_fname; } ?>"  placeholder="Name">
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputPassword4">Last Name</label>
                     <input type="text" class="form-control" id="" name="filter_lname" value="" placeholder="Surname">
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputPassword4">Email</label>
                     <input type="email" class="form-control" id="" name="filter_email" value="<?php if(!empty($filter_email)) { echo $filter_email; } ?>" placeholder="Email">
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputPassword4">Mobile</label>
                     <input type="text" class="form-control" id="" name="filter_mobile" value="<?php if(!empty($filter_mobile)) { echo $filter_mobile; } ?>" placeholder="Mobile">
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputPassword4">Enrollment NO</label>
                     <input type="text" class="form-control" id="filter_enrollnno" name="filter_enrollnno" value="<?php if(!empty($filter_applicationId)) { echo $filter_applicationId; } ?>" placeholder="Enrollment No">
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputState">Branch</label>
                     <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
                        <option  value="">Select Barnch</option>
                        <?php foreach($list_branch as $val) { ?>
                              <option <?php if(@$filter_branch==$val->branch_id) { echo "selected"; } ?>  value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                              <?php } ?>
                     </select>
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputState">Position For Applied</label>
                     <select id="inputState" class="form-control" name="filter_position_for_apply" id="filter_position_for_apply">
                        <option  value="">Select position</option>
                        <?php foreach($jobtype_all as $val) { ?>                                        
                        <option  <?php if(@$filter_position_for_apply==$val->job_id) { echo "selected"; } ?> value="<?php echo $val->position; ?>"><?php echo $val->position; ?></option>
                        <?php } ?> 
                     </select>
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputState">Assigned To</label>
                     <select id="inputState" class="form-control" name="filter_faculty" id="filter_faculty">
                        <option value="">Select</option>
                        <?php foreach($all_faculty as $val) { ?>
                                <option <?php if(@$filter_faculty==$val->faculty_id) { echo "selected"; } ?> value="<?php echo $val->faculty_id ; ?>"><?php echo $val->name; ?></option>
                                <?php } ?>
                     </select>
                  </div>
                  <div class="form-group col-md-3">
                      <label>Date</label> 
                      <input type="date" class="form-control" id="filter_Next_Followup_Date_from" name="filter_Next_Followup_Date_from" value="<?php if(!empty($filter_Next_Followup_Date_from)) { echo @$filter_Next_Followup_Date_from; } ?>">
                  </div>
                  <div class="form-group col-md-3">
                      <label>Date</label> 
                      <input type="date" class="form-control" id="filter_Next_Followup_Date_to" name="filter_Next_Followup_Date_to" value="<?php if(!empty($filter_Next_Followup_Date_to)) { echo @$filter_Next_Followup_Date_to; } ?>">
                  </div>
                </div>
               </div>
               <div class="text-right">
                  <input type="submit" class="btn btn-primary" value="Filter" id="filter_profile" name="filter_profile">
                  <a class="btn btn-light text-dark" href="<?php echo base_url();?>Common/lms_jobApplication?status=inactive">Reset</a>  
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Large modal -->
<div class="modal fade whastapp-message" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="myLargeModalLabel">Send Whastapp Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="post" action="">
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="inputState">Select Template</label>
                     <input type="hidden" name="whatsapp_template_id_send" id="whatsapp_template_id_send" >

                     <select id="inputState" class="form-control whatapp_tem" name="whatapp_tem" id="whatapp_tem" onchange="return get_whatsapp_template_message()">
                        <option value="">Select Template</option>
                        <?php foreach($whatsapp_tem_data as $wtd) { ?>
                      <option value="<?php echo $wtd->w_template_name; ?>"><?php echo $wtd->w_template_name; ?></option>
                     <?php } ?>
                     </select>
                  </div>
                  <div class="form-group col-md-12">
                     <label for="inputEmail4">Template</label>
                     <textarea type="text" class="form-control" id="what_template_mess" name="filter_fname" name="what_template_mess" rows="7"></textarea>
                  </div>
               </div>
               <div class="text-right">
                  <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
                  <input type="submit" class="btn btn-primary" value="Send Messages" name="whatsapp_sen_mm_data" id="whatsapp_sen_mm_data">
                  <a class="btn btn-light text-dark" href="">Reset</a>  
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Large modal -->
<div class="modal fade applicant-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="myLargeModalLabel">Applicant Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12 student-details col-ml-auto">
                  <table class="table table-bordered">
                     <tr>
                        <td class="text-center">
                           <div class="student-photo p-3 s-photo">
                              <img src="" height="100px" width="100px" id="photo"/> 
                           </div>
                        </td>
                        <td>
                           <div class="student-photo app_no">
                              <p ><strong>Application No : </strong> <span class="app_id"> </span></p>
                           </div>
                        </td>
                        <td class="text-center">
                           <div class="student-photo p-3 signature">
                              <img src="" height="100px" width="100px" id="signature" />
                           </div>
                        </td>
                        <form method="post" action="https://demo.rnwmultimedia.com/placement/student_login.php" target="_blank">
                        <td>
                           <div class="student-photo">
                              <p ><strong>Username : </strong><span class="uname"> </span> </p>
                              <p><strong>Password : </strong><span class="pass"> </span> </p>
                              <input type="hidden" name="usname" id="usname">
                              <input type="hidden" name="passw" id="passw">
                           </div>
                        </td>
                        <td class="text-center">
                           <input type="submit" class="btn btn-light" id="submit" name="submit"  value="LogIn">
                        </td>
                        </form>
                        <td class="text-center">
                           <button class="btn btn-primary" data-toggle="modal" data-target="#remarkmodal" onclick="return jobremrk()">Remarks</button>
                           <input class="form-control app-id" type="hidden" name="appids" id="appids">
                        </td>
                     </tr>
                  </table>
               </div>
               <div class="col-md-12 mt-3">
                  <div class="row">
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>First Name:</label> 
                           <input type="text"  class="form-control" name="name" id="name"  placeholder="Enter Your First Name" readonly>
                        </div>
                     </div>
                     <!-- <div class="col-lg-3">
                        <div class="form-group">
                          <label>Middle Name:</label> 
                          <input type="text"  class="form-control" name=" " id=" " placeholder="Enter Your Last Name">
                        </div>
                        </div> -->
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Address:</label> 
                           <input type="text"  class="form-control" name="address" id="address" placeholder="Enter Your Address" readonly>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Number:</label> 
                           <input type="text"  class="form-control mob_number" name="mob_number" id="mob_number" placeholder="Enter Your Phone Number" readonly>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Gr Id:</label> 
                           <input type="text"  class="form-control" name="gr_id" id="gr_id" placeholder="GR ID" readonly>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Faculty Name:</label> 
                           <input type="text"  class="form-control" name="faculty_id" id="faculty_id" placeholder="Faculty" readonly>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Running Topic:</label> 
                           <input type="text"  class="form-control" name="running_topic" id="running_topic" placeholder="Topic" readonly>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Skills:</label> 
                           <input type="text"  class="form-control" name="skill" id="skill" placeholder="Enter Your Skill" readonly>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Position For Applied:</label> 
                           <textarea type="text"  class="form-control" name="position_for_apply" id="position_for_apply" rows="5" readonly></textarea>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Prefer Location For Job:</label> 
                           <textarea type="text"  class="form-control" name="prefer_job_location" id="prefer_job_location" rows="5" readonly></textarea>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Salary expectation:</label> 
                           <input type="text"  class="form-control" name="salary_expectation" id="salary_expectation" placeholder="/-" readonly>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Batch Time:</label> 
                           <input type="text"  class="form-control" name="batch_time" id="batch_time" placeholder="00:00:00 AM/PM" readonly>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Remarks:</label> 
                           <input type="text"  class="form-control" name="remark" id="remark" placeholder="Remarks" readonly>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="text-right">
               <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
               <!-- <input type="submit" class="btn btn-primary" value="Filter" name="filter_income_fees"> -->
               <a class="btn btn-light text-dark close" href="#"  data-dismiss="modal">close</a>  
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Rate apllicant -->
<div class="modal fade" tabindex="-1" role="dialog" id="rateapplicant" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
   <div class="modal-header">
      <h5 class="modal-title" id="myLargeModalLabel">Rate Applicant</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <div class="modal-body">
   <input type="hidden" name="app_rate_id" id="app_rate_id">
      <div class="rating"> 
         <input type="radio" name="star" value="5" id="5"><label for="5">☆</label> 
         <input type="radio" name="star" value="4" id="4"><label for="4">☆</label> 
         <input type="radio" name="star" value="3" id="3"><label for="3">☆</label> 
         <input type="radio" name="star" value="2" id="2"><label for="2">☆</label> 
         <input type="radio" name="star" value="1" id="1"><label for="1">☆</label>
      </div>
      <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="ad_rate_app" name="ad_rate_app">Add rateing</button>
   </div>
</div>
</div>
</div>
<!-- end rateing -->
<!-- basic modal -->
<div class="modal fade" id="remarkmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalLabel" >Remarks</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body job-remarks">
         </div>
      </div>
   </div>
</div>
<!--end remarks -->
<div class="modal fade  applicant-remarks" id="applicant-remarks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog job_remark_ad" role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel" >Applicant Remarks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="hidden" name="job_remark_id" id="job_remark_id">
                    <input type="hidden" name="appid" id="appid">
                      <label>Select Label:</label> 
                      <select class="form-control" name="labels" id="labels" >
                        <option value="">select Label</option>
                        <option value="Assign Work Checking">Assign Work Checking</option>
                        <option value="Assign Resume">Assign Resume</option>
                        <option value="Work Pending">Work Pending</option>
                        <option value="Work Complete">Work Complete</option>
                        <option name="Assign Company">Assign Company & Location</option>
                        <option name="student_absent">Student Absent</option>
                        <option value="Location Issue">Location Issue</option>
                        <option value="Salary Issue">Salary Issue</option>
                        <option value="Bond Issue">Bond Issue</option>
                        <option value="Personal Issue">Personal Issue</option>
                        <option value="Talk With Student">Talk With Student</option>
                        <option value="Talk With Parents">Talk With Parents</option>
                        <option value="Discipline">Discipline</option>
                        <option value="Low Performance">Low Performance</option>
                        <option value="Study">Study</option>
                        <option value="Fees">Fees</option>
                        <option value="Others">Others</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label>Add Remark</label> 
                      <textarea rows="5" class="form-control" id="remarks" name="remarks"></textarea>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="ad_remark_app" name="ad_remark_app">Add remark</button>
            </div>
          </div>
   </div>
</div>
<!--end add remark model -->
<div class="modal fade  change_status_poup_confirm" id="change_status_poup_confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog job_remark_ad" role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel" >Confirmation details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
         <div class="modal-body">
            <form enctype="multipart/form-data" class="document-createmodal confirm_form" method="post" action="<?php echo base_url(); ?>Common/studentConfirmationData">
            <input type="hidden" name="change_status_popup_confirm" id="change_status_popup_confirm" >
            <input type="hidden" name="change_status_confirm" id="change_status_confirm" >
            <div class="form-group labe_div" id="labe_div_id">
                      <label>Select Label:</label> 
                      <select class="form-control" name="labels" id="lables_con" >
                        <option value="">select Label</option>
                        <option value="Assign Work Checking">Assign Work Checking</option>
                        <option value="Assign Resume">Assign Resume</option>
                        <option value="Work Pending">Work Pending</option>
                        <option value="Work Complete">Work Complete</option>
                        <option name="Assign Company">Assign Company & Location</option>
                        <option name="student_absent">Student Absent</option>
                        <option value="Location Issue">Location Issue</option>
                        <option value="Salary Issue">Salary Issue</option>
                        <option value="Bond Issue">Bond Issue</option>
                        <option value="Personal Issue">Personal Issue</option>
                        <option value="Talk With Student">Talk With Student</option>
                        <option value="Talk With Parents">Talk With Parents</option>
                        <option value="Discipline">Discipline</option>
                        <option value="Low Performance">Low Performance</option>
                        <option value="Study">Study</option>
                        <option value="Fees">Fees</option>
                        <option value="Others">Others</option>
                      </select>
                  </div>
               <div class="form-group " id=name_div>
                  <label>Company Name:</label> 
                  <input type="text" class="mt-2 form-control" name="company_name_confirm" id="company_name_confirm"> 
               </div>
               <div class="form-group " id="date_div_id">
                  <label>Joining Date:</label> 
                  <input type="date" class="mt-2 form-control" name="joining_date_confirm" id="joining_date_confirm"> 
               </div>
               <div class="form-group " id="salary_div">
                  <label>Starting salary:</label> 
                  <input type="text" class="mt-2 form-control" name="starting_salary_confirm" id="starting_salary_confirm"> 
               </div>
               <div class="form-group section-hidden" id="letter_div_id">
                     <label class="d-block">Joining Letter</label>
                     <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                     <input class="form-check-input" type="radio" name="joining_letter_confirm" id="joining_letter_confirm" value="yes" onclick="return showJoningLetterUpload('yes')">
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>Yes</label>
                     </div>
                     </div>
                     <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                     <input class="form-check-input" type="radio" name="joining_letter_confirm" id="joining_letter_confirm" value="no" onclick="return showJoningLetterUpload('no')">
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>No</label>
                     </div>
                     </div> 
                  </div>         
                  <span id="upload_joining_letter_data">
                     <div class="form-group" >
                        <label>Joining letter:</label> 
                        <input type="file" class="mt-2 form-control" name="confirm_joining_letter_con" id="confirm_joining_letter_con"  onchange="return check_resume_maximum_file_size()"> 
                     </div>
                  </span>
                  <div class="form-group section-hidden" id="bond_div_id">
                     <label class="d-block">Bond</label>
                     <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                     <input class="form-check-input" type="radio" name="bond_confirm" id="bond_confirm" value="yes" onclick="return showBondYearData('yes')">
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>Yes</label>
                     </div>
                     </div>
                     <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                     <input class="form-check-input" type="radio" name="bond_confirm" id="bond_confirm" value="no" onclick="return showBondYearData('no')">
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>No</label>
                     </div>
                     </div> 
                  </div>
               <span id="bond_data_confirm">
                  <div class="form-group " >
                     <label>Years/months:</label> 
                     <select id="inputState" class="form-control whatapp_tem bond_year_month_confirm" name="bond_year_month_confirm" id="bond_year_month_confirm">
                        <option value="">Select Template</option>
                        <option value="12 Months">12 Months</option>
                        <option value="24 Months">24 Months</option>
                        <option value="36 Months">36 Months</option>
                     </select> 
                  </div>
               </span>
            <div class="form-group " id="next_follow_div">
                  <label>Next Followup date:</label> 
                  <input type="date" class="mt-2 form-control" name="next_followup_date" id="next_followup_date"> 
               </div>
               <div class="form-group " id="rem_div">
                  <label>Add Remark</label> 
                  <textarea rows="5" class="form-control" id="student_remarks_confirm" name="student_remarks_confirm"></textarea>
               </div>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="submit" name="submit">Submit</button>
         </form>
         </div>
      </div>
   </div>
</div>

<!-- <div class="modal fade  change_status_poup_confirm" id="change_status_poup_confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog job_remark_ad" role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel" >Confirmation details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="col-md-12">
            <input type="hidden" name="change_status_popup_confirm" id="change_status_popup_confirm" >
            <input class="form-control" type="hidden" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>" >
            <input type="hidden" name="rem_application_status_confirm"  id="rem_application_status_confirm">
               <div class="form-group">
                  <label>Company Name:</label> 
                  <input type="text" class="mt-2 form-control" name="company_name_confirm" id="company_name_confirm"> 
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label>Joining Date:</label> 
                  <input type="date" class="mt-2 form-control" name="joining_date_confirm" id="joining_date_confirm"> 
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label>Starting salary:</label> 
                  <input type="text" class="mt-2 form-control" name="starting_salary_confirm" id="starting_salary_confirm"> 
               </div>
            </div>
            <div class="col-lg-3 section-hidden">
               <div class="form-group">
                     <label class="d-block">Joining Letter</label>
                     <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                     <input class="form-check-input" type="radio" name="joining_letter_confirm" id="joining_letter_confirm" value="yes" onclick="return showJoningLetterUpload('yes')">
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>Yes</label>
                     </div>
                     </div>
                     <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                     <input class="form-check-input" type="radio" name="joining_letter_confirm" id="joining_letter_confirm" value="no" onclick="return showJoningLetterUpload('no')">
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>No</label>
                     </div>
                     </div> 
                  </div>         
            </div>
            <span id="upload_joining_letter_data">
            <div class="col-md-12">
               <div class="form-group">
                  <label>Joining letter:</label> 
                  <input type="file" class="mt-2 form-control" name="upload_joining_letter_confirm" id="upload_joining_letter_confirm"> 
               </div>
            </div>
            </span>
            <div class="col-lg-3 section-hidden">
               <div class="form-group">
                     <label class="d-block">Bond</label>
                     <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                     <input class="form-check-input" type="radio" name="bond_confirm" id="bond_confirm" value="yes" onclick="return showBondYearData('yes')">
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>Yes</label>
                     </div>
                     </div>
                     <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                     <input class="form-check-input" type="radio" name="bond_confirm" id="bond_confirm" value="no" onclick="return showBondYearData('no')">
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>No</label>
                     </div>
                     </div> 
                  </div>
               
               </div>
               <span id="bond_data_confirm">
               <div class="col-md-12">
               <div class="form-group">
                  <label>Years/months:</label> 
                  <select id="inputState" class="form-control whatapp_tem bond_year_month_confirm" name="bond_year_month_confirm" id="bond_year_month_confirm">
                        <option value="">Select Template</option>
                        <option value="12 Months">12 Months</option>
                        <option value="24 Months">24 Months</option>
                        <option value="36 Months">36 Months</option>
                     </select> 
               </div>
            </div>
                        </span>
            <div class="col-md-12">
               <div class="form-group">
                  <label>Add Remark</label> 
                  <textarea rows="5" class="form-control" id="student_remarks_confirm" name="student_remarks_confirm"></textarea>
               </div>
            </div>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="con_submit" name="con_submit">Submit</button>
         </div>
   </div>
</div> -->
<!-- start change status model-->
<div class="modal fade change_status_poup" id="change_status_poup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog job_remark_ad" role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel" >Remarks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                  <div class="form-group">
                      <label>Add Remark</label> 
                      <input type="hidden" name="app_con_id" id="app_con_id">
                      <input type="hidden" name="appli_status" id="appli_status">
                      <input type="hidden" name="job_remark_id_con" id="job_remark_id_con">
                      <textarea rows="5" class="form-control" id="remarksad" name="remarksad"></textarea>
                  </div>
                  <div class="form-group">
                      <label>Next Followup date</label> 
                      <input type="date" class="form-control" id="next_followup_date" name="next_followup_date">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="ad_confirm_date" name="ad_confirm_date">Add remark</button>
            </div>
          </div>
   </div>
</div>
<!-- End status change model-->
<div class="modal fade" id="joining-letter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalLabel" >Upload Joining Letter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="col-lg-12">
               <div class="form-group">
                    <input type="hidden" name="jobapplication_number" id="jobapplication_number">
                  <label>Upload Joining Letter:</label> 
                  <input type="file" class="mt-2" name="confirm_joining_letter " id="confirm_joining_letter"> 
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label>Confirmation Date:</label> 
                  <input type="date" class="mt-2 form-control" name="confirm_joining_date" id="confirm_joining_date"> 
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label>Add Remark</label> 
                  <textarea rows="5" class="form-control" id="remarks_join" name="remarks"></textarea>
               </div>
            </div>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="ad_joining_letter" name="ad_joining_letter">Submit</button>
         </div>
      </div>
   </div>
</div>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>  
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/table2excel.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/sweetalert/sweetalert.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/sweetalert.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script> 
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script> 
<!-- Page Specific JS File -->
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- JS Libraies --> 
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.0/js/star-rating.min.js" integrity="sha512-HijzPVdslZ4AK/kJWc5zxAyHBFiP9GXyZ68gha0YiyGy+71+GReNGZzIpCokjHIHBmUd38iO7O2n65cvjXb8+A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.0/js/star-rating.js" integrity="sha512-4kL6Lh4Rq52taKlKV3lmUKYEDYVJwOUSd2KDXInz2PY8GdJYQVAazN/+nv/JRB1tGHCzXcdw9NJ4KWusNWmmng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">    
   $(function () {    
       $("#btnExporttoExcel").click(function () {    
           $("#table-1").table2excel({    
               filename: "Job Apply Application.xls"    
           });    
       });    
   }); 

   $('.flash_data').hide();

    $(document).ready( function() {
      $('#flash_data').show();
        $('#yellow').delay(1000).fadeOut('fast');
      });    
</script>
<script>
   function get_copy_paste_mobile(ic){

   var data_text  = "company_name_copy_paste_mobile_"+ic;
   var dd =  document.getElementById(data_text).textContent;
   var inp =document.createElement('input');
   document.body.appendChild(inp)
   inp.value =dd;
   inp.select();
   document.execCommand('copy',false);
   inp.remove(); 
   var copy_ppp =  "copy_paste_record_mobile_"+ic;
   var ddd =  document.getElementById(copy_ppp);
   $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
   }

   function get_copy_paste_mobile_and_name(ic){
   var data_text  = "copy_paste_record_mobile_and_name"+ic;
   var dd =  document.getElementById(data_text).textContent;
   var inp =document.createElement('input');
   document.body.appendChild(inp)
   inp.value =dd;
   inp.select();
   document.execCommand('copy',false);
   inp.remove();
   var copy_ppp =  "copy_paste_record_mobile_and_name"+ic;
   var ddd =  document.getElementById(copy_ppp);
   // $("#copy_paste_record_2").prop('tooltipText', "copied");
   $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
   
   }
   
   
   function get_copy_paste_grid(ic){
  var data_text  = "company_name_copy_paste_grid_"+ic;
  var dd =  document.getElementById(data_text).textContent;
  var inp =document.createElement('input');
  document.body.appendChild(inp)
  inp.value =dd;
  inp.select();
  document.execCommand('copy',false);
  inp.remove();
  var copy_ppp =  "copy_paste_record_grid_"+ic;
  var ddd =  document.getElementById(copy_ppp);
  $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
   }
   
   
   
   
    function change_copy_paste_text_grid(ic){
      var copy_ppp =  "copy_paste_record_grid_"+ic;
      $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'Click to Copy').tooltip('show');
    }
   
   
   
   
    function get_copy_paste_mobile(ic){
      var data_text  = "company_name_copy_paste_mobile_"+ic;
      var dd =  document.getElementById(data_text).textContent;
      var inp =document.createElement('input');
      document.body.appendChild(inp)
      inp.value =dd;
      inp.select();
      document.execCommand('copy',false);
      inp.remove();
      var copy_ppp =  "copy_paste_record_mobile_"+ic;
      var ddd =  document.getElementById(copy_ppp);
      $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
    }
   
   
   
   function get_copy_paste_name(ic){
   
   var data_text  = "company_name_copy_paste_name_"+ic;
   var dd =  document.getElementById(data_text).textContent; 
   var inp =document.createElement('input');
   document.body.appendChild(inp)
   inp.value =dd;
   inp.select();
   document.execCommand('copy',false);
   inp.remove();
   var copy_ppp =  "copy_paste_record_name_"+ic;
   var ddd =  document.getElementById(copy_ppp);
   $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
   }
   
   function change_copy_paste_text_name(ic){
   var copy_ppp =  "copy_paste_record_name_"+ic;
   $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'Click to Copy').tooltip('show');
   } 
</script>
<script>
   function co_upd(application_id ) {

       $.ajax({
         url: "<?php echo base_url(); ?>Common/get_recoJobapp",
         type: "post",
         data: {
           'id': application_id ,
         },
         success: function(resp) {
           $(".applicant-details").modal();
           var data = $.parseJSON(resp);
           var application_id = data['single_record'].application_id;
           var application_number = data['single_record'].application_number;
           var name = data['single_record'].name;
           var address = data['single_record'].address;
           var faculty_id = data['single_record'].faculty_id;
           var gr_id = data['single_record'].gr_id;   
           var username = data['single_record'].username;
           var number = data['single_record']. number;
           var password = data['single_record'].password;   
           var running_topic = data['single_record'].running_topic; 
           var skill = data['single_record'].skill;
           var position_for_apply = data['single_record'].position_for_apply;
           var prefer_job_location = data['single_record'].prefer_job_location;
           var salary_expectation = data['single_record'].salary_expectation;   
           var batch_time = data['single_record'].batch_time; 
           var photo = data['single_record'].photo;
           var signature = data['single_record'].Signature;  
           
           var applications_id = data['single_remark'].applications_id;
         
           $('.app-id').val(application_id);
           $('#name').val(name);
           $('#address').val(address);
           $('.uname').html(username);
           $('.pass').html(password);
           $('#usname').val(username);
           $('#passw').val(password);
           $('.app_id').html(application_number);
           $('#skill').val(skill);   
           $('#running_topic').val(running_topic);   
           $('.mob_number').val(number);   
           $('#gr_id').val(gr_id);
           $('#faculty_id').val(faculty_id);
           $('#position_for_apply').val(position_for_apply);
           $('#salary_expectation').val(salary_expectation);
           $('#prefer_job_location').val(prefer_job_location);
           $('#batch_time').val(batch_time);
           $('#rem_application_status_confirm').val(applications_id);
           $('#photo').attr("src","http://demo.rnwmultimedia.com/placement/img/" + photo);
           $('#signature').attr("src","http://demo.rnwmultimedia.com/placement/img/" + signature);
         }
       });
     }
</script>
<script>
   function jobremrk()
     {
         var application_id = $("#appids").val();
   
         $.ajax({
           url: "<?php echo base_url(); ?>Common/get_jobremarks",
           type: "post",
           data: {
             'id': application_id ,
           },
           success: function(Resp) {
             $('.job-remarks').html(Resp);
           }
         });
     }
</script>
<script>
     function add_remark(application_id) {

      $.ajax({
           url: "<?php echo base_url(); ?>Common/get_recoJobapp",
           type: "post",
           data: {
             'id': application_id ,
           },
           success: function(Resp) {
             $('#applicant-remarks').modal();
             var data = $.parseJSON(Resp);
             var application_id = data['single_record'].application_id;
             $('#appid').val(application_id);
           }
         });
     }
</script>
<script> 
   $('#ad_remark_app').on('click', function() {

    var applications_id = $('#appid').val();
    var job_remark_id = $('#job_remark_id').val();
    var remarks = $('#remarks').val();
    var labels = $('#labels').val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/add_remark_appl",
        data: {
             'applications_id' :applications_id,
             'job_remark_id' :job_remark_id ,
             'remarks' :remarks ,
             'labels' :labels
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            console.log(data);
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Inserted.',
                    position: 'topRight'
                }));
            } else if(ddd == '2'){

              $('#msg').html(iziToast.error({
                    title: 'Cencelled',
                    timeout: 2500,
                    message: 'something went wrong',
                    position: 'topRight'
                }));
            }
        }
    });

  });

</script>
<script>
   function getval(sel= '', application_number=''){
         //alert(sel.value);
         if(sel.value == 2){
            //alert("confirm");
            $('#change_status_poup_confirm').modal();
         $('#change_status_popup_confirm').val(application_number);
         $('#change_status_confirm').val(sel.value);
         $('#labe_div_id').hide();
         $('#name_di').show();
         $('#date_div_id').show();
         $('#salary_div').show();
         $('#letter_div_id').show();
         $('#bond_div_id').show();
         $('#rem_div').show();
         $('#next_follow_div').hide();
         }
         else{
            //alert("other");
         $('#change_status_poup_confirm').modal();
         $('#change_status_popup_confirm').val(application_number);
         $('#change_status_confirm').val(sel.value);
         $('#labe_div_id').show();
         $('#name_div').hide();
         $('#date_div_id').hide();
         $('#salary_div').hide();
         $('#letter_div_id').hide();
         $('#bond_div_id').hide();
         $('#rem_div').show();
         $('#next_follow_div').show();
         }
      }


   $('#ad_confirm_date').on('click', function() {

    var applications_id = $('#app_con_id').val();
    var remarks = $('#remarksad').val();
    var next_followup_date = $('#next_followup_date').val();
    var application_status = $('#application_status').val();  
   //  alert(application_status);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/change_status_and_add_remark",
        data: {
             'applications_id' : applications_id,
             'remarks' : remarks,
             'next_followup_date' : next_followup_date,
             'application_status' : application_status
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            console.log(data);
            var ddd = data['all_record'].status;
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! status and next folow up date is updated.',
                    position: 'topRight'
                }));
            } else if(ddd == '2'){

              $('#msg').html(iziToast.error({
                    title: 'Cencelled',
                    timeout: 2500,
                    message: 'something went wrong',
                    position: 'topRight'
                }));
            }
        }
    });

  });

</script>
<script>
     function add_Joining_letter(application_id) {
      $.ajax({
           url: "<?php echo base_url(); ?>Common/get_recoJobapp",
           type: "post",
           data: {
             'id': application_id,
           },
           success: function(Resp) {
             $('#joining-letter').modal();
             var data = $.parseJSON(Resp);
             var application_id = data['single_record'].application_id;
             $('#jobapplication_number').val(application_id);
           }
         });
     }

</script>
<script>
   $('#ad_joining_letter').on('click', function() {

    var applications_id = $('#jobapplication_number').val();
    var confirm_joining_letter = $('#confirm_joining_letter').val();
    var remarks = $('#remarks_join').val();
    var confirm_joining_date = $('#confirm_joining_date').val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/Add_joining_letter",
        data: {
             'applications_id' :applications_id,
             'confirm_joining_letter' :confirm_joining_letter ,
             'remarks' :remarks ,
             'confirm_joining_date' :confirm_joining_date
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            console.log(data);
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Inserted.',
                    position: 'topRight'
                }));
            } else if(ddd == '2'){

              $('#msg').html(iziToast.error({
                    title: 'Cencelled',
                    timeout: 2500,
                    message: 'something went wrong',
                    position: 'topRight'
                }));
            }
        }
    });

  });
  
function send_whatsapp_template(application_id)
{
   $('#whatsapp_template_id_send').val(application_id);
   $.ajax({
           url: "<?php echo base_url(); ?>Common/get_recoJobapp",
           type: "post",
           data: {
             'id': application_id ,
           },
           success: function(Resp) {
             $('.whastapp-message').modal();
             var data = $.parseJSON(Resp);
             var application_id = data['single_record'].application_id;
             $('#app_rate_id').val(application_id);
           }
         });
}


</script>
<script>
   function rate_app(application_id) {
      $.ajax({
           url: "<?php echo base_url(); ?>Common/get_recoJobapp",
           type: "post",
           data: {
             'id': application_id ,
           },
           success: function(Resp) {
             $('#rateapplicant').modal();
             var data = $.parseJSON(Resp);
             var application_id = data['single_record'].application_id;
             $('#app_rate_id').val(application_id);
             
           }
         });
     }
</script>
<script>
$('#ad_rate_app').on('click', function() {

var applications_id = $('#app_rate_id').val();
var star = $("input[name='star']:checked").val();

$.ajax({
    type: "POST",
    url: "<?php echo base_url() ?>Common/give_student_rating",
    data: {
         'applications_id' :applications_id,
          'star' : star
    },       
    success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        console.log(data);
        if (ddd == '1') {
            $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2500,
                message: 'HI!  rating is submitted.',
                position: 'topRight'
            }));
        } else if(ddd == '2'){

          $('#msg').html(iziToast.error({
                title: 'Cencelled',
                timeout: 2500,
                message: 'something went wrong',
                position: 'topRight'
            }));
        }
    }
});

});

</script>
<script>
function myFunction() {
   $('#change_status_poup').modal();
}
</script>
<script>

   </script>
<script>
$('#con_submit').on('click', function() {

  var confirm_joining_date  = $('#joining_date_confirm').val();
  var confirm_company_name  = $('#company_name_confirm').val();
  var confirm_starting_salary_confirm = $('#starting_salary_confirm').val();
  var confirm_bond_year_month = $('.bond_year_month_confirm').val();
  var confirm_joining_letter = $('#upload_joining_letter_confirm').val();
  var remarks = $('#student_remarks_confirm').val();
  var application_id  = $('#rem_application_status_confirm').val();
  var application_status  = $('#change_status_popup_confirm').val();

$.ajax({
    type: "POST",
    url: "<?php echo base_url() ?>Common/studentConfirmationData",
    data: {
         'application_id' :application_id,
         'application_status':application_status,
         'remarks':remarks,
         'confirm_joining_date':confirm_joining_date,
         'confirm_company_name' :confirm_company_name,
         'confirm_starting_salary_confirm':confirm_starting_salary_confirm,
         'confirm_bond_year_month':confirm_bond_year_month,
         'confirm_joining_letter':confirm_joining_letter,
    },       
    success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        //console.log(data);
        if (ddd == '1') {
            $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2500,
                message: 'HI!  rating is submitted.',
                position: 'topRight'
            }));
        } else if(ddd == '2'){

          $('#msg').html(iziToast.error({
                title: 'Cencelled',
                timeout: 2500,
                message: 'something went wrong',
                position: 'topRight'
            }));
        }
    }
});

});

</script>
<script>

      function get_whatsapp_template_message()
{
  var temp_name = $('.whatapp_tem').val();
  console.log(temp_name);
  $.ajax({
    url : "<?php echo base_url() ?>Common/whatsapp_tem_me_get",
    type : "post",
    data:{
      'templat_namm' : temp_name
    },
    success:function(Response){
      var rr = Response.replace(/^\s+|\s+$/gm,'');
      $('#what_template_mess').val(rr);
    }
  });
}



var mm = document.querySelectorAll('#whatsapp_sen_mm_data');
mm[0].addEventListener('click', function(){  
  var whatapp_tem = $('.whatapp_tem').val();
  var what_template_mess = $('#what_template_mess').val();
  var template_id = $('#whatsapp_template_id_send').val();
  var wh_te = '';
  var what_tem_me = '';
  if(whatapp_tem == '')
  {
     $('#error_whatapp_tem').html("<span style='color:red'>Please Select Whatsapp Template</span>");
        wh_te ='';
  }
  else
  {
    $('#error_whatapp_tem').html("");
  
     wh_te =1;
  }

  if(what_template_mess == '')
  {
    $('#error_what_template_mess').html("<span style='color:red'>Enetr Message </span>");
     what_tem_me ='';
    

  }
  else
  {
    $('#error_what_template_mess').html("");
    what_tem_me =1;
  }
  
  if(what_tem_me ==1 && wh_te == 1)
  {
    var con = confirm("Are You Sure to send Message!!");
    if(con)
    {
        $.ajax({
        url : "<?php echo base_url() ?>Common/send_mes_through_wht",
        type :"POST",
        data:{
          'template_name' : whatapp_tem,
          'template_message' : what_template_mess,
          'appl_number' : template_id
        },
        success:function(res)
        {
          var data = $.parseJSON(res);
          phe = "91"+data.phone_no;
           if(data.status == "1")
           {
            var tth = "https://api.whatsapp.com/send/?phone="+phe+"&text="+what_template_mess+"&app_absent=0";
            window.location = tth;
           }
           
        }
    });

    
    }
    else
    {
      return false;
    }
    
  }
  else
  {
    return false;

  }
});


function showJoningLetterUpload(data)
{
   if(data == 'yes'){
    $('#upload_joining_letter_data').show();
   }else{
    $('#upload_joining_letter_data').hide();
   }
}
    $('#upload_joining_letter_data').hide();
    $('#bond_data_confirm').hide();

function showBondYearData(data)
{
   if(data == 'yes'){
    $('#bond_data_confirm').show();
   }else{
    $('#bond_data_confirm').hide();
   }
}


function check_resume_maximum_file_size()
{
    var re_sh = "confirm_joining_letter_con";
    var validExtensions = ["pdf","doc","docx","jpeg","jpg"]
    var file = $('#'+re_sh).val().split('.').pop();
    var numb = $('#'+re_sh)[0].files[0].size/1024/1024;
    numb = numb.toFixed(2);
    if (validExtensions.indexOf(file) == -1) {
        alert("Only formats are allowed : "+validExtensions.join(', '));
        $('#'+re_sh).val('');
    }
    else if(numb > 1){
      alert('to big, maximum is 1MB. You file size is: ' + numb +' MB');
       $('#'+re_sh).val('');
    }
}

      </script>
</body> 
</html>