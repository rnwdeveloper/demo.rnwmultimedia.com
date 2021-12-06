<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<style>
   /* Rating Star Widgets Style */
   .rating-stars ul {
   list-style-type:none;
   padding:0;
   -moz-user-select:none;
   -webkit-user-select:none;
   }
   .rating-stars ul > li.star {
   display:inline-block;
   }
   .rating-stars ul > li.star_give {
   display:inline-block;
   }
   /* Idle State of the stars */
   .rating-stars ul > li.star > i.fa {
   font-size:2.5em; /* Change the size of the stars */
   color:#ccc; /* Color on idle state */
   }
   .rating-stars ul > li.star_give > i.fa {
   font-size:1em; /* Change the size of the stars */
   color:#FF912C; /* Color on idle state */
   list-style-type:none;
   padding:0;
   -moz-user-select:none;
   -webkit-user-select:none;
   }
   /* Hover state of the stars */
   .rating-stars ul > li.star.hover > i.fa {
   color:#FFCC36;
   }
   /* Selected state of the stars */
   .rating-stars ul > li.star.selected > i.fa {
   color:#FF912C;
   }
   body {
   font-family: 'Poppins', sans-serif;
   font-size: 12.5px;
   }
   .bg {
   background-image: url(..//images/interview_2.jpg);
   background-size: cover;
   background-position: center;
   }
   .btn, .form-control {font-size: 12.5px;}
   label {font-weight: bold; margin-bottom: 10px; margin-top: 20px;}
   .text-red {color: #ed1d25!important;}
   .shadow {box-shadow: 0 0 10px #ed1d25!important;}
   .bg-white {background-color: #fff !important;}
   .bg-grey {background-color: #eaeaea !important;}
   .footer-bg {background: rgb(27, 29, 38) !important;}
   .text-footer {color: #777;}
   .btn-100{width: 100% !important;}
   .w-90 {width: 90%;}
   .d-flex {
   display: flex;
   flex-wrap: wrap;
   }
   .justify-center {justify-content: center;}
   .justify-space-between {justify-content: space-between;}
   .mt-5 {margin-top: 30px;}
   .nav-tabs>li.active>a,
   .nav-tabs>li.active>a:focus,
   .nav-tabs>li.active>a:hover {
   background: #009efb;
   color: white;
   padding: 5px 15px;
   }
   .nav-tabs>li>a {padding: 5px 15px;}
   .nav-tabs>li>a:hover {border-radius: 0;}
   .table>thead>tr>th,
   .table>tbody>tr>th,
   .table>tfoot>tr>th,
   .table>thead>tr>td,
   .table>tbody>tr>td,
   .table>tfoot>tr>td {
   border-top: 1px solid #e9ecef;
   padding: 10px;
   }
   .table>thead>tr>th {vertical-align: middle;}
   .table>tbody>tr>td>span {opacity: 0.65;}
   .all-btn a {margin: 0 5px;}
   .box-header {padding: 8px 0;}
   .btn {border-radius: 0; transition: all 0.5s;}
   .text-white {color: white;}
   .all-btn span {padding: 0 10px; background: white; margin-left: 10px; border-radius: 5px;}
   .inactive-a {background: rgb(66,133,244);}
   .inactive-a>span {color: rgb(66,133,244);}
   .active-a {background: rgb(244,180,0);}
   .active-a>span {color: rgb(244,180,0);}
   .postpone-a {background: rgb(171,71,188);}
   .postpone-a>span {color: rgb(171,71,188);}
   .confirm-a {background: rgb(15,157,88);}
   .confirm-a>span {color: rgb(15,157,88);}
   .discart-a {background: rgb(219,68,55);}
   .discart-a>span {color: rgb(219,68,55);}
   .profile-a {background: rgb(0, 172, 193);}
   .profile-a>span {color: rgb(0, 172, 193);}
   .inactive-a:hover, .inactive-a:focus,
   .active-a:hover, .active-a:focus,
   .postpone-a:hover, .postpone-a:focus,
   .confirm-a:hover, .confirm-a:focus,
   .discart-a:hover, .discart-a:focus,
   .profile-a:hover, .profile-a:focus {
   color: white;
   }
   .nav-tabs>li>a {margin-right: 15px;}
   .nav-tabs>li.active>a,
   .nav-tabs>li.active>a:focus,
   .nav-tabs>li.active>a:hover {border-radius: 0;}
   .form-control {
   height: auto;
   padding: 4px 7px;
   line-height: 24px;
   }
   .notifive{
   background-color: #7460ee;
   color: white;
   }
   .noti
   {
   background-color: #fc4b6c;
   color: white;
   font-size: 16px;
   font: center;
   }
   .n{
   color: white;
   }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1 class="text-center">Job Apply Application</h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Job Application</li>
      </ol>
      <div class="row text-uppercase d-flex all-btn justify-center" style="margin-top:20px;">
         <?php  if(@$_SESSION['logtype'] == 'Manager' ||  @$_SESSION['logtype']=="Super Admin")
            { ?>
         <a class="btn text-white inactive-a"  href="<?php echo base_url(); ?>FormController/jobApplication?status=inactive">New<span><?php echo $newRecord; ?></span></a>
         <a class="btn text-white inactive-a"  href="<?php echo base_url(); ?>FormController/jobApplication?status=newfollowup">Today Followup <span><?php echo $newfollowupRecord; ?></span></a>
         <?php } ?>
         <a class="btn text-white active-a"  href="<?php echo base_url(); ?>FormController/jobApplication?status=active">Active<span><?php echo $activeRecord; ?></span></a> 
         <a class="btn text-white active-a"  href="<?php echo base_url(); ?>FormController/jobApplication?status=activefollowup">Today Record<span><?php echo $activefollowupRecord; ?></span></a>  
         <?php  if(@$_SESSION['logtype'] == 'Manager' ||  @$_SESSION['logtype']=="Super Admin")
            { ?>
         <!-- <a class="btn text-white confirm-a" href="<?php echo base_url(); ?>FormController/jobApplication?status=confirm">Confirm<span><?php echo $confirmRecord; ?></span></a> --> 
         <a class="btn text-white postpone-a" href="<?php echo base_url(); ?>FormController/jobApplication?status=postpone">Postponed<span><?php echo $postponeRecord; ?></span></a>
         <!--   <a class="btn text-white discart-a" href="<?php echo base_url(); ?>FormController/jobApplication?status=discard">Discart<span><?php echo $discardRecord; ?></span></a>  --> 
         <?php  } ?>
         <!-- <a class="btn text-white discart-a" data-toggle="modal" data-target="#myModal_discart">Discart<span><?php echo $discardRecord; ?></span></a> -->
         <!-- <a class="btn text-white profile-a" href="<?php echo base_url(); ?>FormController/profile">Profile<span></span></a> -->
         <?php  if(@$_SESSION['logtype'] == 'Manager' ||  @$_SESSION['logtype']=="Super Admin")
            { ?>
         <a class="btn text-white confirm-a" href="<?php echo base_url(); ?>FormController/jobApplication?status=wpf">Alumini<span><?php echo $wpf; ?></span></a> 
         <?php  } ?>
         <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" style="background-color: black; color:white;" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2"  style="min-width: auto;">
               <a style="color:white; background-color: green;padding:5px;  display: block;"  href="<?php echo base_url(); ?>FormController/jobApplication?status=confirm" class="dropdown-item" >Confirm<span style="color:black;"><?php echo $confirmRecord; ?></span></a>
               <a style="color:white; background-color: red;padding:5px; margin-top: 8px;   display: block;"  href="<?php echo base_url(); ?>FormController/jobApplication?status=discard" class="dropdown-item" >Discard<span style="color:black"><?php echo $discardRecord; ?></span></a>
               <a style="border:1px solid black;padding:5px;background-color:#94810B;color:white;    display: block;    margin-top: 8px;"  href="<?php echo base_url(); ?>FormController/profile" class="dropdown-item" >Profile</a>
            </div>
         </div>
      </div>
   </section>
   <style>
      .thead-danger {
      background:#232323;
      color: #fff;
      }
      .table .thead-danger th {
      font-weight: 500;
      }
      table th{
      font-weight: 400 !important;
      text-align: center;
      font-size: 16px;
      color: #000;
      }
   </style>
   <!-- Main content -->
   <section class="content">
      <?php  if(@$this->session->flashdata('msg_alert')) { ?>
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('msg_alert'); ?>
      </div>
      <?php } ?>
      <!-- start confimation student experience wise filtering only for pradip sir -->
      <div class="col-md-12" id="filter_section">
         <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
               <h3 class="box-title">Filter</h3>
            </div>
            <?php if($appli_sts=="inactive") { $st=0; $followup=''; 
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
            <div class="row">
               <form method="post" action="<?php echo base_url(); ?>FormController/jobApplication?status=<?php echo $appli_sts; ?>">
                  <input type="hidden" name="application_status_wise_filter" value="<?php echo $st; ?>">
                  <div class="col-md-2 my-2">
                     <label><b>Branch</b></label>
                     <select  class="form-control custom-select my-1 mr-sm-2" name="filter_branch"  >
                        <option value="">Select Branch</option>
                        <?php foreach($branch_all as $row) {
                           if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?>
                        <option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                        <?php   } } ?>
                     </select>
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Faculty</b></label>
                     <select  class="form-control custom-select my-1 mr-sm-2" name="filter_faculty"  >
                        <option value=""> Faculty</option>
                        <?php foreach($faculty_all as $val) {
                           @$bids = explode(",",@$val->branch_ids);
                           
                           
                           $bname="";
                           for($i=0;$i<sizeof(@$bids);$i++)
                           {
                               foreach($branch_all as $row) {   
                                   if($row->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$row->branch_name;}else { $bname = $bname." & ".$row->branch_name; } }
                               }
                           }
                           ?>
                        <option  <?php if(@$filter_faculty==$val->faculty_id) { echo "selected"; } ?>    value="<?php echo $val->faculty_id; ?>"><?php echo $val->name; ?>-  <?php echo $val->department_name; ?>  - <?php echo $bname; ?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Position For Applied</b></label>
                     <select class="form-control custom-select my-1 mr-sm-2"  name="filter_position_for_apply"  >
                        <option value="">Position For Applied</option>
                        <?php foreach($jobtype_all as $val) { ?>                                        
                        <option  <?php if(@$filter_position_for_apply==$val->job_id) { echo "selected"; } ?> value="<?php echo $val->position; ?>"><?php echo $val->position; ?></option>
                        <?php } ?>                                        
                     </select>
                  </div>
                  <!--  <div class="col-md-2 my-2">
                     <label><b>Prefer Job Location</b></label>
                      <select class="form-control custom-select my-1 mr-sm-2"  name="filter_prefer_job_location"  >
                       <option value="">Prefer Job Location</option>
                       <?php foreach($area_all as $val) { ?>
                      <option <?php if(@$filter_prefer_job_location==$val->area_id) { echo "selected"; } ?>  value="<?php echo $val->area_name; ?>"><?php echo $val->area_name; ?></option>
                       <?php } ?>                                       
                     </select>
                     </div> -->   
                  <div class="col-md-2 my-2">
                     <label>From Date</label>   
                     <div class='input-group date' id="datetimepicker1">
                        <input type='text'  class="form-control" name="filter_Next_Followup_Date_from" value="<?php if(!empty($filter_Next_Followup_Date_from)) { echo @$filter_Next_Followup_Date_from; } ?>" placeholder="Next Followup From"/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                     </div>
                  </div>
                  <div class="col-md-2 my-2">
                     <label>To Date</label>   
                     <div class='input-group date' id="datetimepicker2">
                        <input type='text'  class="form-control" name="filter_Next_Followup_Date_to" value="<?php if(!empty($filter_Next_Followup_Date_to)) { echo @$filter_Next_Followup_Date_to; } ?>" placeholder="Next Followup To"/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                     </div>
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Student Name</b></label>
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_fname)) { echo $filter_fname; } ?>"  id="" name="filter_fname" placeholder="Student Name">            
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Email</b></label>
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_email)) { echo $filter_email; } ?>"  id="" name="filter_email" placeholder="Example@gmail.com">            
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Mobile No</b></label>
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_mobile)) { echo $filter_mobile; } ?>"  id="" name="filter_mobile" placeholder="+91-00000-00000">            
                  </div>
                  <div class="col-md-2 my-2"> 
                     <label><b>Application No</b></label>             
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_applicationId)) { echo $filter_applicationId; } ?>"  id="" name="filter_applicationId" placeholder="Filter Application No" >
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>GR No</b></label>  
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_gr_id)) { echo $filter_gr_id; } ?>"  id="" name="filter_gr_id" placeholder="Filter GR No " >
                  </div>

                  
                  <div class="col-md-2 my-2">
                     <label><b>School Name</b></label>  
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_school_name)) { echo $filter_school_name; } ?>"  id="school_name" name="filter_school_name" placeholder="Filter School name">
                  </div>


                  <div class="col-md-2 my-2">
                     <label><b>Owner / Employee Types</b></label>  
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_oe_type)) { echo $filter_oe_type; } ?>"  id="" name="filter_oe_type" placeholder="Filter owner/employee" >
                  </div>
                  <div class="col-sm-2 my-2" style="margin-top: 48px;">
                     <input type="submit" class="btn btn-success" value="Filter" name="filter_profile"/>
                     <a class="btn btn-danger" href="<?php echo base_url(); ?>FormController/jobApplication">Reset</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- main filtering complete  -->
      <div class="col-md-12" id="filter_section_experience">
         <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
               <h3 class="box-title">Filter Student Experience wise</h3>
            </div>
            <!-- pradip sir confirmation filetering is start -->
            <div class="row">
               <form method="get" action="<?php echo base_url(); ?>FormController/jobApplication">
                  <input type="hidden" name="status" value="<?php echo $this->input->get('status'); ?>">
                  <div class="col-md-2 my-2">
                     <label><b>Company Name</b></label>
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_company_name)) { echo $filter_company_name; } ?>"  id="" name="filter_company_name" placeholder="Company Name">            
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Joining Date</b></label>
                     <input type="date"  class="form-control" value="<?php if(!empty($filter_joining_date_wise)) { echo $filter_joining_date_wise; } ?>"  id="filter_joining_date_wise" name="filter_joining_date_wise" placeholder="joining Date">            
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Starting Salary</b></label>
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_starting_salary)) { echo $filter_mobile; } ?>"  id="filter_starting_salary" name="filter_starting_salary" placeholder="Enter Starting Salary">            
                  </div>
                  <div class="col-md-3 my-3">
                     <label><b>Bond in Months / Years </b></label>
                     <select class="form-control custom-select my-1 mr-sm-2" name="filter_bond_year_month"  >
                        <option value="">--Months--</option>
                        <option value="12 months">12 months</option>
                        <option value="24 months">24 months</option>
                        <option value="36 months">36 months</option>
                     </select>
                  </div>
                  <div class="col-sm-2 my-2" style="margin-top: 48px;">
                     <input type="submit" class="btn btn-success" value="Filter" name="filter_student_experience"/>
                     <a class="btn btn-danger" href="<?php echo base_url(); ?>FormController/jobApplication">Reset</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- end confimation student experience wise filtering only for pradip sir -->
      <!-- Modal -->
      <div class="modal fade" id="myModal_discart" role="dialog">
         <div class="modal-dialog modal-lg w-90">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Discart Application</h4>
               </div>
               <div class="modal-body">
                  <table id="example1" class="table table-bordered table-striped example1">
                     <thead class="thead-danger">
                        <tr>
                           <th>Applicant Photo</th>
                           <th>Applicant Details</th>
                           <th>Position For Applied</th>
                           <th>Skill</th>
                           <th>Prefer Location For Job</th>
                           <th>action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($application_job_all as $val) { if($val->discard=="1") {  ?>
                        <tr>
                           <td>
                              <?php echo $path =  "http://demo.rnwmultimedia.com/placement/img/".$val->photo; ?>
                              <img src="<?php echo $path; ?>" alt="face11" height="180px" width="180px">
                           </td>
                           <td>Name : <?php echo $val->name; ?> <br>
                              Gr Id : <?php echo $val->gr_id; ?><br>
                              Number : <?php echo $val->number; ?><br>
                              Parent's Mobile: <?php echo $val->pphone; ?>
                              Faculty Name : 
                              <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) { echo $row->name; } } ?>
                           </td>
                           <td><?php echo $val->position_for_apply; ?></td>
                           <td><?php echo $val->skill; ?></td>
                           <td><?php echo $val->prefer_job_location; ?></td>
                           <td>
                              <div class="dropdown">
                                 <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                                 <span class="caret"></span></button>
                                 <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>FormController/jobApplication?action=view&id=<?php echo @$val->application_id; ?>"> View</a></li>
                                    <li><a href="<?php echo base_url(); ?>FormController/jobApplication?action=discard&id=<?php echo @$val->application_id; ?>&discard=1"> Restore</a></li>
                                 </ul>
                              </div>
                           </td>
                        </tr>
                        <?php } }  ?>
                        </tfoot>
                  </table>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <?php $n=0; foreach($notification_all as $val) { $n++;  }?>
      <div class="float-right">
         <a href="#" data-toggle="modal" data-target="#notifive">
         <span class="label label-danger ml-2"><?php echo $n; ?></span>
         <i class="fa fa-bell fa-lg"></i>
         </a>
      </div>
      <div class="modal fade" id="notifive" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="max-height: 50%;">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header notifive">
                  <h5 class="modal-title" id="exampleModalLabel">
                     <span class="label label-danger ml-2 float-right"><?php echo $n; ?></span>
                     <i class="fa fa-bell fa-lg"></i>
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-responsive table-bordered table-striped example10">
                        <thead>
                           <tr class="noti">
                              <th>GR ID</th>
                              <th>Remaks</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($notification_all as $val) {   ?>
                           <tr   >
                              <td><?php echo $val->gr_id; ?></td>
                              <td><?php echo $val->remarks; ?></td>
                           </tr>
                           <?php }?>
                           </tfoot>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn notifive" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <button type="button" class="btn btn-sm noti"  id="filter_section_company"><i class="fa fa-search"  aria-hidden="true"></i>Filter</button>
      <?php if(@$this->input->get('status')=='confirm') { ?>
      <button type="button" class="btn btn-sm noti" style="float:right;" id="filter_section_exp_student"><i class="fa fa-search"  aria-hidden="true"></i>Experince Student Filter</button>
      <?php } ?>
      <!-- <input type="button" class="btn-sm noti" value="Filter" id="filter_section_company"> -->
      <!--  <input type="button" class="btn btn-primary float-right" value="Notification <?php echo ":".''.$n; ?>"  id="notifive"> -->
      <?php if(empty($select_application)) { ?>
      <div class="row">
         <div class="col-md-12" >
            <?php if(@$this->session->flashdata('star_msg')) { ?>
            <div class="alert alert-success">
               <?php echo $this->session->flashdata('star_msg'); ?>
            </div>
            <?php } ?>
            <!-- general form elements -->
            <div class="box box-success" style="padding:20px;">
               <div class="box-header with-border">
                  <h3 class="box-title">
                     <?php
                        if($appli_sts=="inactive") { $st=0; $followup='';  echo "Display Inctive Job Application"; 
                        }
                        else if($appli_sts == 'newfollowup'){
                          $st=5;  echo "Display New followup Jobs Application"; 
                        }
                        else if($appli_sts=="active") { 
                          $st=1;  echo "Display Active Job Application"; 
                        }
                        else if($appli_sts == 'activefollowup'){
                          $st=6;  echo "Display Active followup Jobs Application"; 
                        }
                        else if($appli_sts=="confirm") { 
                          $st=2; echo "Display Confirm Job Application"; 
                        }
                        else if($appli_sts=="postpone") { 
                          $st=3; echo "Display Postpone Job Application"; 
                        }
                        else if($appli_sts=="discard") { 
                          $st=4; echo "Display Discard Job Application"; 
                        }else if($appli_sts == 'wpf'){
                          $st =7; echo "Without Placed Form";
                        }
                          ?>
                  </h3>
                  <a href="<?php echo base_url(); ?>FormController/excelJobApplication/<?php echo $st; ?>" style="float:right; color:white; background-color: green; padding:5px;border-radius: 3px;">Exports to Excel</a> 
               </div>
               <table id="example1" class="table table-bordered table-striped example10">
                  <thead>
                     <tr style="background-color: #3c8dbc;">
                        <th width="10%">Applicant Photo</th>
                        <th width="25%">Applicant Details</th>
                        <?php if(@$this->input->get('status')!='wpf') { ?>
                        <th width="10%">Position For Applied</th>
                        <th width="10%">Skill</th>
                        <th width="10%">Prefer Location For Job</th>
                        <th width="25%">Previous Employment?</th>
                        <?php } ?>
                        <?php if(@$this->input->get('status')=='confirm' || @$this->input->get('status')=='wpf' ) { ?>
                        <th>Current Employement By RNw. </th>
                        <?php } ?>
                        <th width="5%">Action</th>
                        <th width="5%">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <?php 
                           $i=1;
                           $cncp =1;
                           // $username = $_SESSION['Admin']['username'];
                           // $role = $_SESSION['Admin']['role'];
                           
                           // echo "in file record<<br>";
                           // echo "<pre>";
                           // print_r($application_job_all);
                           // exit;
                           foreach($application_job_all as $val) 
                           { 
                             // print_r($val->discard);
                             // exit;
                             if($val->discard=="0") 
                             { 
                               if($val->application_status==$st) 
                               {  
                           
                             $cdate      =  date('Y-m-d');  
                             $newd       =  $val->application_date;
                             $newDate    =  date("Y-m-d", strtotime($newd));  
                             $datetime1  =  date_create("$newDate"); 
                             $datetime2  =  date_create("$cdate"); 
                               
                             // calculates the difference between DateTime objects 
                             $interval = date_diff($datetime1, $datetime2); 
                               
                             // printing result in days format 
                              $days = $interval->format('%R%a'); 
                              $days = substr($days,1,3);
                              if($val->application_status == 0)
                              {
                                 if($days <= 3)
                                   { 
                                     $bgcolor ="rgba(244, 164, 96,0.2)"; 
                                   }
                                   else 
                                   { 
                                     $bgcolor = "rgba(66,133,244,0.2)";
                                   }
                              }
                             if($val->application_status == 1){ $bgcolor = "rgba(244,180,0,0.2)"; }
                             if($val->application_status == 2){ $bgcolor = "rgba(15,157,88,0.2)"; }
                             if($val->application_status == 3){ $bgcolor = "rgba(171,71,188,0.2)"; }
                             if($val->application_status == 4){ $bgcolor = "rgba(178,34,34,0.2)"; }
                             
                             ?>
                     <tr style="background-color: <?php echo @$bgcolor; ?>">
                        <td>
                           <!-- <img src="http://demo.rnwmultimedia.com/placement/img/<?php echo $val->photo; ?>" alt="face" height="80px" width="80px"> -->
                           <?php if(!empty($val->photo)){ ?>
                           <img src="http://demo.rnwmultimedia.com/placement/img/<?php echo $val->photo;  ?>" name="aboutme" width="80" height="80" border="1" class="img-circle">
                           <?php }else{ ?>
                           <img src="http://demo.rnwmultimedia.com/placement/img/default.png" name="aboutme" width="80" height="80" border="1" class="img-circle">
                           <?php } ?>
                           <?php echo $val->application_number; ?> / 
                           <br><img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_grid_<?php echo $cncp; ?>" onclick="return get_copy_paste_grid(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_grid(<?php echo $cncp; ?>)">
                           <?php  $al_gr = substr($val->gr_id,0,7); 
                              if(@$al_gr == 'Alumini'){ ?>
                           <span style="color:white; padding:1px; background-color: blue;border-radius: 3px;"  id="company_name_copy_paste_grid_<?php echo $cncp; ?>"><?php echo $val->gr_id; ?></span>
                           <br><br>
                           <?php } else { ?>
                           <span style="color:white; padding:1px; background-color: green;border-radius: 3px;"  id="company_name_copy_paste_grid_<?php echo $cncp; ?>"><?php echo $val->gr_id; ?></span>
                           <br><br>
                           <?php } ?>
                           <!--  <a style="margin-left: 30px;" href="<?php echo base_url(); ?>FormController/jobApplication?action=notifive_status&id=<?php echo @$val->application_id; ?>&notifive_status=<?php echo @$val->notifive_status; ?>"><i class="fa fa-bell fa-lg n"></i></a>  -->
                           <!-- <a href="#" class="btn btn-xs btn-default text-center" style="margin-bottom: 10px; padding: 5px; border-radius: 3px;" onclick="return get_notification(<?php echo @$val->application_id; ?>)" >
                              <i class="fa fa-bell" aria-hidden="true"></i>
                              </a>
                              <?php $notifive_status = 1;?>
                              <input type="hidden" name="notifive_status" value="<?php if(isset($notifive_status)){ echo $notifive_status; } ?>" id="notifive_status"> -->
                        </td>
                        <td>
                           <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy" style="cursor: hand"   id="copy_paste_record_mobile_<?php echo $cncp; ?>" onclick="return get_copy_paste_mobile(<?php echo $cncp; ?>)">
                           <span style="color:black;" id="company_name_copy_paste_mobile_<?php echo $cncp; ?>"><?php echo $val->number; ?></span>
                           <a href="https://wa.me/<?php echo "91".$val->number; ?>" target="_blank"><img src="<?php echo base_url();?>assets/images/whatsapp1.png" width="30"></a>
                           <a href="javascript:send_whatsapp_template('<?php echo $val->application_number; ?>')"><img src="<?php echo base_url();?>assets/images/whatsapp1.png" width="20"></a>
                           <br>
                           Application Date :<?php echo $val->application_date; ?>
                           <br>
                           <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_name_<?php echo $cncp; ?>" onclick="return get_copy_paste_name(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_name(<?php echo $cncp; ?>)">
                           <span style="color:black" id="company_name_copy_paste_name_<?php echo $cncp; ?>"><?php echo $val->name; ?></span>
                           <br>
                           <?php if(@$this->input->get('status')=='wpf' || @$this->input->get('status')=='confirm'){ ?>
                           <span>School Name</span> : <?php echo $val->school_name; ?>
                           <br>
                           <span>Type </span> : <?php  echo $val->owner_employee_type; ?>
                           <br>
                           <span>No Of Employee</span> : <?php  echo @$val->no_of_employee; ?>
                           <br>
                           <span>Designation</span> : <?php  echo @$val->designation; ?>
                           <?php } else { ?>
                           <span>Parent's Number</span> : <?php echo $val->parents_phone; ?>
                           <br>
                           <span>Faculty Name</span> : <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) { echo $row->name; } } ?>
                           <br>
                           <span>Branch</span> : <?php  echo @$val->branch_id; ?>
                           <?php } ?>
                           <span style="position:relative; margin-left:100px; color:red;">
                              <!-- <a href="" style="color:red;"><i class="fa fa-circle-o" aria-hidden="true"></i></a>
                                 <a href="" style="color:red;"><i class="fa fa-circle-o" aria-hidden="true"></i></a>
                                 
                                 <a href="" style="color:red;"><i class="fa fa-circle-o" aria-hidden="true"></i></a> -->
                           </span>
                        </td>
                        <?php if(@$this->input->get('status')!='wpf') { ?>
                        <td><?php echo $val->position_for_apply; ?></td>
                        <td><?php echo $val->skill; ?></td>
                        <td><?php echo $val->prefer_job_location; ?></td>
                        <td><?php echo $val->company_name; ?> <br>  <?php echo $val->company_number; ?> <br> <?php echo $val->company_address; ?> <br>  <?php echo $val->starting_salary; ?><br>  <?php echo $val->ending_salary; ?> </td>
                        <?php } ?>
                        <?php if(@$this->input->get('status') =='confirm' || @$this->input->get('status') =='wpf' ) { ?>
                        <td>Company Name :<?php echo $val->confirm_company_name; ?><br>
                           Starting Salary :<?php echo $val->confirm_starting_salary_confirm; ?><br>
                           Joining Date : <?php echo $val->confirm_joining_date; ?><br>
                           Bond : <?php echo $val->confirm_bond_year_month; ?><br>
                           School Name: <?php echo $val->school_name; ?>
                        </td>
                        <?php } ?>
                        <td class="text-center">
                           <a href="#" class="btn btn-xs btn-default text-center" data-toggle="modal" data-target="#myModal_view" style="margin-bottom: 10px; padding: 5px; border-radius: 3px;" onclick="return get_student_record(<?php echo @$val->application_id; ?>)" data-toggle="tooltip" data-placement="top" title="View Details">
                           <i class="fa fa-eye"></i>
                           </a>
                           <a class="btn btn-xs text-white"  onclick="return get_add_remakrs('<?php echo $val->application_number; ?>','<?php echo $val->assign_faculty; ?>')"  title="Add Remarks"><img src="http://demo.rnwmultimedia.com/placement/img/add_remarks.svg" height="20" width="20"></a><br>
                           <a class="btn btn-xs text-white"  onclick="return get_add_upload_joning_letter('<?php echo $val->application_number; ?>')"  title="Joining Letter"><img src="http://demo.rnwmultimedia.com/placement/img/joining_letter.png" height="20" width="20"></a><br><br>
                           <a style="padding:2px; background-color: lightgray;color:black;margin:2px; border-radius:5px;cursor: hand;" onclick="return give_rate('<?php echo $val->application_id; ?>')"   data-toggle="tooltip" data-placement="top" title="Give Rating"><i class="fa fa-diamond" aria-hidden="true"></i></a>
                           <!-- <br><br>
                              <img src="http://demo.rnwmultimedia.com/placement/img/<?php echo $val->Signature; ?>" alt="face" height="50px" width="80px">
                              
                              -->                     <br><br>
                           <div class='rating-stars text-center'>
                              <ul id='stars'>
                                 <?php  
                                    $star =  @$val->star;
                                    for($k=1;$k<=$star ; $k++){
                                    ?>
                                 <li class='star_give' title='Poor' data-value="<?php echo $k; ?>">
                                    <i class='fa fa-star fa-fw'></i>
                                 </li>
                                 <?php } ?>
                              </ul>
                           </div>
                        </td>
                        <?php if(@$_SESSION['user_name'] == 'Jeel Patel' || @$_SESSION['user_name'] == 'Pradip Malaviya' || 
                           @$_SESSION['logtype']=="Super Admin" ||  @$_SESSION['user_name'] == 'DIVYESH DESAI')  { ?>
                        <td>
                           <?php if(@$this->input->get('status')!='wpf') { ?>
                           <div style="margin: 5px 0; width: 150px;">
                              <select class="form-control btn-100" style="margin-bottom: 10px;" name="p_status" id="p_status<?php echo $i; ?>" onchange="return onchange_active_de(<?php echo $i; ?>)">
                                 <option value="">--select--</option>
                                 <option value="New">New</option>
                                 <option value="New_Followup">New Followup</option>
                                 <option value="Active">Active</option>
                                 <option value="Active_Followup">Active Followup</option>
                                 <option value="Postpone">Postpone</option>
                                 <option value="Confirm">Confirm</option>
                                 <option value="Discart">Discart</option>
                                 <option value="wpf">wpf</option>
                              </select>
                              <input type="hidden" name="change_status" id="change_status<?php echo $i; ?>">
                              <div class="text-right">
                                 <button style="background-color: #c52410;" type="button" onclick="return insert_record_status('<?php echo $val->application_number; ?>','')" class="btn btn-primary"  data-whatever="@mdo">Submit</button>
                              </div>
                           </div>
                           <?php } else  { ?>
                           <div style="margin: 5px 0; width: 150px;">
                              <select class="form-control btn-100" style="margin-bottom: 10px;" name="wpf_status" id="wpf_status<?php echo $i; ?>" onchange="return without_placed_form(<?php echo $i; ?>)">
                                 <!-- <option value="">--select--</option> -->
                                 <option value="Confirm">Confirm</option>
                                 <option value="reject">Reject</option>
                              </select>
                              <input type="hidden" name="wpf_change_status" id="wpf_change_status<?php echo $i; ?>">
                              <div class="text-right">
                                 <button style="background-color: #c52410;" type="button" onclick="return insert_record_status_wpf('<?php echo $val->application_number; ?>','')" class="btn btn-primary"  data-whatever="@mdo">Submit</button>
                              </div>
                           </div>
                           <?php } ?>
                        </td>
                        <?php } ?>
                     </tr>
                  
                     <?php  $i++; $cncp++;  } } } ?>
                     </tr>
                     </tfoot>
               </table>
               <input type="text" name="change_status_popup" id="change_status_popup">
               <!-- Modal_ADD Status Remarks -->
               <form method="post" id="add_status">
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <input class="form-control"type="hidden" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>" >
                              <input type="hidden" name="application_id"  id="rem_application_status" value="<?php echo @$select_application->application_id; ?>">
                              <?php  date_default_timezone_set("Asia/Calcutta");
                                 $dat_c = date('Y-m-d h:i:sA');  ?>
                              <input type="hidden" name="cure_date"  id="cure_date" value="<?php echo @$dat_c; ?>"> 
                              <h3 class="modal-title" id="exampleModalLabel">Remarks</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
               <form>
               <div class="form-group">
               <label for="recipient-name" class="col-form-label">Remarks*</label>
               <textarea class="form-control" rows="4" id="u_status"></textarea>
               </div>
               <div class="form-group">
               <label>Next Followup Date*</label>   
               <input type="text" class="form-control datepickernextfolloup"  id="next_followup_date"  name="next_followup_date" >
               </div>
               </form>
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary" onclick="return insert_status_remarks()">Submit</button>
               </div>
               </div>
               </div>
               </div>
               </form>
               <div class="modal fade" id="exampleModalConfirm111" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <form  id="add_confirm_student_data" name="add_confirm_student_data">
                              <!-- <input type="text" name="change_status_popup_confirm" id="change_status_popup_confirm" > -->
                              <!-- <input class="form-control"type="text" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>" > -->
                              <!--  <input type="text" name="rem_application_status_confirm"  id="rem_application_status_confirm"> -->
                              <?php   date_default_timezone_set("Asia/Calcutta");
                                 $dat_c = date('Y-m-d h:i:sA');  
                                 ?>
                              <!-- <input type="text" name="cure_date"  id="cure_date" value="<?php echo @$dat_c; ?>"><h3 class="modal-title" id="exampleModalLabel">Confirmation Details</h3> -->
                              <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button> -->
                        </div>
                        <div class="modal-body">
                        <!-- <div class="form-group">
                           <label for="company_name_confirm" class="col-form-label">Company Name</label>
                            <input type="text" name="company_name_confirm" class="form-control" rows="4" id="company_name_confirm" placeholder="Enter Company Name">
                           </div>
                           <div class="form-group">
                           <label for="recipient-name" class="col-form-label">Joining Date</label>
                           <input type="date" name="joining_date_confirm" class="form-control" id="joining_date_confirm" placeholder="Enter joining Date">
                           </div>
                           
                           <div class="form-group">
                           <label for="recipient-name" class="col-form-label">Starting Salary</label>
                            <input type="text" name="starting_salary_confirm" class="form-control"  id="starting_salary_confirm" placeholder="Enter Starting Salary">
                           </div> -->
                        <!-- 
                           <div class="form-group">
                             <label for="recipient-name" class="col-form-label">Joining Letter</label><br>
                              <input type="radio" name="joining_letter_confirm"   id="joining_letter_confirm" value="yes" onclick="return showJoningLetterUpload('yes');">Yes
                             <input type="radio" name="joining_letter_confirm"   id="joining_letter_confirm" value="no" onclick="return showJoningLetterUpload('no');">No
                           </div>
                           
                           <div class="form-group" id="joining_letter_upload_data">
                             <label for="recipient-name" class="col-form-label">Upload Joining Letter</label><br>
                             <input type="file" name="joining_letter_upload" id="joining_letter_upload">
                           </div> -->
                        <!-- 
                           <div class="form-group">
                             <label for="recipient-name" class="col-form-label">Bond</label><br>
                             <input type="radio" name="bond_confirm"   id="bond_confirm" value="yes" onclick="return showBondYearData('yes')">Yes
                             <input type="radio" name="bond_confirm" id="bond_confirm" value="no" onclick="return showBondYearData('no')">No
                           </div> -->
                        <!-- div class="form-group" id="bond_total_year_confirm">
                           <label for="recipient-name" class="col-form-label">Years OR Months</label>
                           <select name="bond_total_confirm" class="form-control"  id="bond_total_confirm">
                               <option value="">--select year/Months</option>
                               <option value="6 Months">6 Months</option>
                               <option value="1 Year">1 Year</option>
                               <option value="1.2 Year">1.2 Years</option>
                               <option value="1.5 Year">1.5 Years</option>
                               <option value="2 Year">2 Years</option>
                               <option value="2.5 Year">2.5 Years</option>
                               <option value="3 Year">3 Years</option>
                           </select>
                           </div> -->
                        <!--  <div class="form-group">
                           <label for="recipient-name" class="col-form-label">Remarks*</label>
                           <textarea class="form-control" rows="4" id="u_status_confirm"></textarea>
                           </div> -->
                        </div>
                        <!-- <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <input type="submit" value="submit1"  onclick="return insert_status_remarks_confirm()" name="submit" class="btn btn-primary">
                           </div> -->
                        </form>
                     </div>
                  </div>
               </div>
               <!--    wpf modal form -->
               <div class="modal fade" id="exampleModalwpf123" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Alumini Students</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <form method="post" name="wpf_form_data" id="wpf_form_data" enctype="multipart/form-data">
                              <input type="hidden" name="wpf_change_status_popup_confirm" id="wpf_change_status_popup_confirm" value="Confirm">
                              <input class="form-control"type="hidden" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>" >
                              <input type="hidden" name="wpf_rem_application_status_confirm"  id="wpf_rem_application_status_confirm">
                              <div class="form-group">
                                 <label for="recipient-name" class="col-form-label">Upload Photo:</label>
                                 <input type="file" class="form-control" id="upload_photo" name="upload_photo">
                                 <a href="" id="upload_photo_wpf_ankor" download title="click Me For Download"><img src="" height="200" width="200" id="upload_photo_wpf"></a>
                              </div>
                              <div class="form-group">
                                 <label for="recipient-name" class="col-form-label">Name:</label>
                                 <input type="text" class="form-control" id="oe_name" name="oe_name">
                              </div>
                              <div class="form-group">
                                 <label for="recipient-name" class="col-form-label">What's app Number:</label>
                                 <input type="text" class="form-control" id="oe_number" name="oe_number">
                              </div>
                              <div class="form-group">
                                 <label for="recipient-name" class="col-form-label">School Name:</label>
                                 <input type="text" class="form-control" id="oe_school_name" name="oe_school_name">
                              </div>
                              <div class="form-group">
                                 <label for="recipient-name" class="col-form-label">Owner Employee Type:</label>
                                 <input type="text" class="form-control" id="oe_type" name="oe_type">
                              </div>
                              <div class="form-group">
                                 <label for="recipient-name" class="col-form-label">Company Name:</label>
                                 <input type="text" class="form-control" id="oe_company_name" name="oe_company_name">
                              </div>
                              <div class="form-group" id="oe_sdesigation">
                                 <label for="recipient-name" class="col-form-label">Designation:</label>
                                 <input type="text" class="form-control" id="oe_designation" name="oe_designation">
                              </div>
                              <div class="form-group" id="oe_sno_of_employee">
                                 <label for="recipient-name" class="col-form-label">No Of Employee:</label>
                                 <input type="text" class="form-control" id="oe_no_of_employee" name="oe_no_of_employee">
                              </div>
                              <div class="form-group" id="oe_ssalary">
                                 <label for="recipient-name" class="col-form-label">Salary:</label>
                                 <input type="text" class="form-control" id="oe_salary" name="oe_salary">
                              </div>
                              <?php $category = array("Web Designing","Web Development","Android Development","iOS Development","Graphics Design","Game Design or Development","Animation","Career in Flutter","Advance in Phython","Artchitec Interior Visualization","Civil & Interior","Mechanical","Project Training","UG/PG Collage","Ms Office","Front end Codding","Digital Marketing","Video Editing","Digital Printing","Tally & Accounting","Other"); ?>
                              <div class="form-group" id="oe_sno_of_employee">
                                 <label for="recipient-name" class="col-form-label">Category:</label>
                                 <select  class="form-control" id="category_data" name="category_data">
                                    <option value="">--select Category--</option>
                                    <?php foreach($category as $c) { ?>
                                    <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group" id="category_other">
                                 <label for="recipient-name" class="col-form-label">Other category:</label>
                                 <input type="text" class="form-control" id="oe_category_other" name="oe_category_other">
                              </div>
                              <div class="form-group" id="oe_ssalary">
                                 <label for="recipient-name" class="col-form-label">Remarks:</label>
                                 <textarea  class="form-control" id="oe_remarks" name="oe_remarks"></textarea>
                              </div>
                              <div class="form-group" id="oe_ssalary">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <!-- <input type="submit" class="btn btn-primary" name="submit" value="Update" id="wpf_submit" onclick="return wpf_form_edited()"> -->
                                 <input type="submit" class="btn btn-primary" name="Update_record" value="Update Record" id="Update_record" >
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <!---end wpf form -->
               <!-- <div id="exampleModalwpf" class="modal fade" role="dialog">
                  <div class="modal-dialog" style="width:800px !important;">
                  
                    <div class="modal-content">
                  
                      <div class="modal-header">
                  
                        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i>Without Placed Employee</h3>
                  
                      </div>
                  
                      <div class="modal-body" id="get_company_query12">
                  
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>FormController/studentConfirmationData">
                  
                          <input type="text" name="wpf_change_status_popup_confirm" id="wpf_change_status_popup_confirm" >
                          <input class="form-control"type="text" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>" >
                          <input type="text" name="wpf_rem_application_status_confirm"  id="wpf_rem_application_status_confirm">
                  
                          <div class="row">
                            <div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 select_course_package form-group">
                              <label for="exampleFormControlTextarea1">Company Name</label>
                              <input type="text"  class="form-control" name="company_name_confirm" id="company_name_confirm"><span style="color:red" id="con_name_error"></span><br>
                  
                              <label for="exampleFormControlTextarea1">Joining Date</label>
                              <input type="date"  class="form-control" name="joining_date_confirm" id="joining_date_confirm"><span style="color:red" id="join_date_error"></span><br>
                  
                              <label for="exampleFormControlTextarea1">Starting Salary</label>
                              <input type="text"  class="form-control" name="starting_salary_confirm" id="starting_salary_confirm"><span style="color:red" id="starting_salary_error"></span><br>
                  
                              <label for="exampleFormControlTextarea1">Joining_Letter</label><br>
                              <input type="radio"  name="joining_letter_confirm" id="joining_letter_confirm" value="yes" onclick="return showJoningLetterUpload('yes')">Yes
                  
                              <input type="radio"   name="joining_letter_confirm" id="joining_letter_confirm" value="no" onclick="return showJoningLetterUpload('no')">No<br>
                          
                              <span id="upload_joining_letter_data">
                                <label for="exampleFormControlTextarea1">Upload Joining Letter</label>
                                <input type="file"  class="form-control" name="upload_joining_letter_confirm" id="upload_joining_letter_confirm" onchange="return check_resume_maximum_file_size()" >
                              </span>
                  
                              <label for="exampleFormControlTextarea1">Bond</label><br>
                                <input type="radio" name="bond_confirm" id="bond_confirm" value="yes" onclick="return showBondYearData('yes')">yes
                                <input type="radio" name="bond_confirm" id="bond_confirm" value="no" onclick="return showBondYearData('no')">No<br>
                          
                              <span id="bond_data_confirm">
                                <label for="exampleFormControlTextarea1">Year/Months</label>
                                <select class="form-control" name="bond_year_month_confirm" id="bond_year_month_confirm">
                                  <option value="">Select Year/Month</option>
                                  <option value="12 Months">12 Months</option>
                                  <option value="24 Months">24 Months</option>
                                  <option value="36 Months">36 Months</option>
                                </select>
                              </span>
                  
                           
                              <label for="exampleFormControlTextarea1">Remarks</label>
                              <textarea class="form-control" name="student_remarks_confirm" id="student_remarks_confirm" rows="5"></textarea><span style="color:red" id="stu_re_confirms"></span><br>
                               <input type="submit" class="btn btn-success" id="btn_ins"> -->
               <!-- </div>
                  <div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 select_course_package form-group">
                    <input type="submit" name="submit" value="submit" onclick="return submitConfirmationData()" class="btn btn-success" id="btn_ins">
                  </div>
                  </div>
                  </form>
                  
                  
                  </div>
                  
                  <div class="modal-footer">
                  
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                  
                  </div>
                  
                  </div>
                  
                  </div>
                  
                  </div> -->
               <div id="exampleModalConfirm" class="modal fade" role="dialog">
                  <div class="modal-dialog" style="width:800px !important;">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i>Confirmation Details</h3>
                        </div>
                        <div class="modal-body" id="get_company_query12">
                           <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>FormController/studentConfirmationData">
                              <input type="text" name="change_status_popup_confirm" id="change_status_popup_confirm" >
                              <input class="form-control"type="text" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>" >
                              <input type="text" name="rem_application_status_confirm"  id="rem_application_status_confirm">
                              <div class="row">
                                 <div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 select_course_package form-group">
                                    <label for="exampleFormControlTextarea1">Company Name</label>
                                    <input type="text"  class="form-control" name="company_name_confirm" id="company_name_confirm"><span style="color:red" id="con_name_error"></span><br>
                                    <label for="exampleFormControlTextarea1">Joining Date</label>
                                    <input type="date"  class="form-control" name="joining_date_confirm" id="joining_date_confirm"><span style="color:red" id="join_date_error"></span><br>
                                    <label for="exampleFormControlTextarea1">Starting Salary</label>
                                    <input type="text"  class="form-control" name="starting_salary_confirm" id="starting_salary_confirm"><span style="color:red" id="starting_salary_error"></span><br>
                                    <label for="exampleFormControlTextarea1">Joining_Letter</label><br>
                                    <input type="radio"  name="joining_letter_confirm" id="joining_letter_confirm" value="yes" onclick="return showJoningLetterUpload('yes')">Yes
                                    <input type="radio"   name="joining_letter_confirm" id="joining_letter_confirm" value="no" onclick="return showJoningLetterUpload('no')">No<br>
                                    <span id="upload_joining_letter_data">
                                    <label for="exampleFormControlTextarea1">Upload Joining Letter</label>
                                    <input type="file"  class="form-control" name="upload_joining_letter_confirm" id="upload_joining_letter_confirm" onchange="return check_resume_maximum_file_size()" >
                                    </span>
                                    <label for="exampleFormControlTextarea1">Bond</label><br>
                                    <input type="radio" name="bond_confirm" id="bond_confirm" value="yes" onclick="return showBondYearData('yes')">yes
                                    <input type="radio" name="bond_confirm" id="bond_confirm" value="no" onclick="return showBondYearData('no')">No<br>
                                    <span id="bond_data_confirm">
                                       <label for="exampleFormControlTextarea1">Year/Months</label>
                                       <select class="form-control" name="bond_year_month_confirm" id="bond_year_month_confirm">
                                          <option value="">Select Year/Month</option>
                                          <option value="12 Months">12 Months</option>
                                          <option value="24 Months">24 Months</option>
                                          <option value="36 Months">36 Months</option>
                                       </select>
                                    </span>
                                    <label for="exampleFormControlTextarea1">Remarks</label>
                                    <textarea class="form-control" name="student_remarks_confirm" id="student_remarks_confirm" rows="5"></textarea>
                                    <span style="color:red" id="stu_re_confirms"></span><br>
                                    <!-- <input type="submit" class="btn btn-success" id="btn_ins"> -->
                                 </div>
                                 <div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 select_course_package form-group">
                                    <input type="submit" name="submit" value="submit" onclick="return submitConfirmationData()" class="btn btn-success" id="btn_ins">
                                 </div>
                              </div>
                           </form>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Modal_ADD REMARKS -->
               <form method="post" id="add_remarks">
                  <div class="modal fade" id="myModal_remarks" role="dialog">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Applicant Remarks</h4>
                           </div>
                           <div class="modal-body">
                              <div class="col-md-4">
                                 <input class="form-control"type="hidden" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>"  >
                                 <input type="hidden" name="application_id"  id="rem_application" value="<?php echo @$select_application->application_id; ?>">
                                 <?php   date_default_timezone_set("Asia/Calcutta");
                                    $dat_c = date('Y-m-d h:i:sA');  ?>
                                 <input type="hidden" name="cure_date"  id="cure_date" value="<?php echo @$dat_c; ?>">
                                 <h5>Select Label</h5>
                                 <select class="btn-100 form-control" name="label_rem" id="label_rem" 
                                    onchange="return get_label_work()">
                                    <option value="">--select Label--</option>
                                    <option value="Assign Work Checking">Assign Work Checking</option>
                                    <!-- <option value="Assign Company">Assign Company</option> -->
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
                                 <br><br>
                                 <h5 id="label_assign_faculty">Select Faculty TO Assign Student</h5>
                                 <select class="btn-100 form-control" name="assign_faculty" id="assign_faculty">
                                    <?php 
                                       if(@$_SESSION['logtype']=='Manager' || @$_SESSION['logtype']=='Super Admin'){ ?>
                                    <option value="">-- select-- </option>
                                    <?php foreach($upd_faculty as $f) { ?>
                                    <option value="<?php echo $f->name; ?>"><?php echo $f->name; ?></option>
                                    <?php }  }  else { ?>
                                    <?php foreach($upd_faculty as $f) { ?>
                                    <option value="<?php echo $f->name; ?>" <?php if(@$f->name == $_SESSION['Admin']['username']) { echo 'selected'; } ?> ><?php echo $f->name; ?></option>
                                    <?php } } ?>
                                 </select>
                                 <br>
                                 <h5 id="label_assign_company_to_student">Select Company</h5>
                                 <select class="btn-100 form-control" name="assign_company_to_student" id="assign_company_to_student" onchange="return acotostudent()">
                                    <option value="">-- select-- </option>
                                    <?php foreach($company_list as $f) { ?>
                                    <option value="<?php echo $f->company_name; ?>"><?php echo $f->company_name; ?></option>
                                    <?php } ?>
                                    <option value="Other">Other</option>
                                 </select>
                                 <br>
                                 <h5 id="label_company_name_by_other">Enter Company Name</h5>
                                 <input type="text" name="company_name_by_other"  id="company_name_by_other" class="btn-100 form-control">
                              </div>
                              <div class="col-md-8">
                                 <h5>Add Remark</h5>
                                 <textarea rows="5" class="btn-100 form-control" id="remarks_job" name="remarks_job">
           

         </textarea>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" onclick="return insert_record_remarks()" value="submit" name="submit" class="btn btn-success">Submit</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
               <!--Modal_Close-->
               <!---   Jonining Letter Upload modal  -->
               <div id="joining_letter_modal" class="modal fade" role="dialog" >
                  <div class="modal-dialog" style="width:800px !important;">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> :: Upload Joining Letter ::</h3>
                        </div>
                        <div class="modal-body">
                           <table class="table table-bordered table-striped">
                              <tbody>
                                 <form method="post" name="joining_letter_data" id="joining_letter_data">
                                    <input type="hidden" class="form-control" id="jobapplication_number" name="jobapplication_number">
                                    <div class="form-group">
                                       <label for="comment">Upload Joining Letter:</label>
                                       <input type="file" class="form-control" name="up_joning_letter">
                                       <div id="error_remarks"></div>
                                    </div>
                                    <div class="form-group">
                                       <label for="comment">Confirmation Date::</label>
                                       <input type="date" class="form-control" name="confirm_date">
                                       <div id="error_remarks"></div>
                                    </div>
                                    <div class="form-group">
                                       <label for="comment">Remarks:</label>
                                       <textarea class="form-control" rows="5" id="ad_remarks" name="ad_remarks"></textarea>
                                       <div id="error_remarks"></div>
                                    </div>
                                    <button type="submit" name="submit"  class="btn btn-primary" id="upload_letter_joining">Upload Letter</button>
                                 </form>
                              </tbody>
                           </table>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- modal over -->
               <!--   whatsapp template --->
               <div id="whatsapp_template_modal" class="modal fade" role="dialog" >
                  <div class="modal-dialog" style="width:600px !important;">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> :: Send Whastapp Message ::</h3>
                        </div>
                        <div class="modal-body">
                           <table class="table table-bordered table-striped">
                              <tbody>
                                 <form method="post" name="send_whhhts_template" id="send_whhhts_template">
                                    <input type="hidden" name="whatsapp_template_id_send" id="whatsapp_template_id_send" >
                                    <div class="form-group">
                                       <label for="comment">Select Template</label>
                                       <select name="whastapp_tem" id="whatapp_tem" class="form-control" onchange="return get_whatsapp_template_message()">
                                          <option value="">--select Template--</option>
                                          <?php 
                                             foreach($whatsapp_tem_data as $wtd) { ?>
                                          <option value="<?php echo $wtd->w_template_name; ?>"><?php echo $wtd->w_template_name; ?></option>
                                          <?php } ?>
                                       </select>
                                       <div id="error_whatapp_tem"></div>
                                    </div>
                                    <div class="form-group">
                                       <label for="comment">Template:</label>
                                       <textarea class="form-control" rows="5" id="what_template_mess" name="what_template_mess"></textarea>
                                       <div id="error_what_template_mess"></div>
                                    </div>
                                    <button type="submit" name="submit"  class="btn btn-primary" 
                                       id="whatsapp_sen_mm_data">Send Message</button>
                                 </form>
                              </tbody>
                           </table>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!--  end whatsapp template --->
               <!-- Modal_VIEW APPLICANT DETAILS -->
               <div class="modal fade" id="myModal_view" role="dialog">
                  <div class="modal-dialog modal-lg w-90">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">Applicant Details  </h4>
                        </div>
                        <div class="modal-body" id="result">
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!--Modal_Close-->
            </div>
         </div>
      </div>
      <?php } ?>
      <?php if(!empty($select_application)) { ?>
      <div class="row">
         <div class="col-md-12" >
            <!-- general form elements -->
            <div class="box box-success" style="padding:20px;">
               <div class="box-header with-border text-center" style="padding: 10px 0; margin-bottom: 15px;">
                  <h3 class="box-title"><strong>Employee Information Form</strong></h3>
               </div>
               <div class="d-flex justify-space-between">
                  <p>Application Date : <strong><?php echo $select_application->application_date; ?></strong></p>
                  <p>Application No : <strong><?php echo @$select_application->application_number; ?></strong></p>
               </div>
               <ul class="nav nav-tabs text-uppercase d-flex justify-center">
                  <li class="active"><a data-toggle="tab" href="#home" onclick="return show_menu4_submit()"> Applicant Information12</a></li>
                  <li><a data-toggle="tab" href="#menu1" onclick="return show_menu4_submit()">Previous Employment</a></li>
                  <li><a data-toggle="tab" href="#menu2" onclick="return show_menu4_submit()">Faculty Use Only</a></li>
                  <li><a data-toggle="tab" href="#menu3" onclick="return show_menu4_submit()">Status</a></li>
                  <li><a data-toggle="tab" href="#menu4" onclick="return hide_menu4_submit()">Remarks</a></li>
               </ul>
               <form method="post" action="<?php echo base_url(); ?>/FormController/jobApplication" enctype= multipart/form-data>
                  <input type="hidden" name="application_id" value="<?php echo @$select_application->application_id; ?>">
                  <div class="tab-content">
                     <div id="home" class="tab-pane fade in active">
                        <?php 
                           echo $_SESSION['user_name'];
                           if(@$_SESSION['user_name'] == 'Pradip Malaviya' || @$_SESSION['user_name'] == 'Jeel Patel')  { ?>
                        <div class="row" style="padding-top:20px; padding-bottom:20px">
                           <div class="col-md-3 my-2">
                              <?php if(!empty($val->photo)){ ?>
                              <img src="https://www.rnwmultimedia.com/applications/images/application_images/<?php echo $val->photo; ?>" alt="face1" height="150px" width="150px">
                              <?php }else{ ?>
                              <img src="https://demo.rnwmultimedia.com/placement/img/default.png" alt="face12" height="150px" width="150px">
                              <?php } ?>
                           </div>
                           <?php @$name = explode(" ",@$select_application->name); ?>
                           <div class="col-md-3 my-2">
                              <label>First Name2 <span class="text-danger">*</span></label>   
                              <input type="text" class="form-control" value="<?php echo @$name[0]; ?>" placeholder="First name" name="fname" required>
                           </div>
                           <div class="col-md-3 my-2">
                              <label>Middle Name<span class=" text-danger">*</span></label>   
                              <input type="text" class="form-control" value="<?php echo @$name[1]; ?>" placeholder="Middle Name" name="mname" required>
                           </div>
                           <div class="col-md-3 my-2">
                              <label>Last Name <span class=" text-danger">*</span></label>   
                              <input type="text" class="form-control" value="<?php echo @$name[2]; ?>" placeholder="Last name" name="lname" required>
                           </div>
                           <div class="col-md-12 my-2">
                              <label>Adress<span class=" text-danger">*</span></label>
                              <input type="text" class="form-control" value="<?php echo @$select_application->address; ?>" placeholder="Your Full Adress" name="address" required>
                           </div>
                           <div class="col-md-4 my-2">
                              <label>Number<span class=" text-danger">*</span></label>   
                              <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->number; ?>" name="number" placeholder="Mobile No">
                           </div>
                           <div class="col-md-4 my-2">
                              <label for="Grid">Gr id<span class=" text-danger">*</span></label>   
                              <input type="text" class="form-control" placeholder="####" value="<?php echo @$select_application->gr_id; ?>"  id="Grid" name="gr_id" required>
                           </div>
                           <div class="col-md-6 my-2">
                              <label for="Faculty">Faculty Name<span class=" text-danger">*</span></label>   
                              <select class="form-control custom-select my-1 mr-sm-2" id="Faculty"  name="faculty_id">
                                 <option selected disabled>Click Here</option>
                                 <?php foreach($faculty_all as $val) { ?>
                                 <option <?php if(@$select_application->faculty_id==$val->faculty_id) { echo "selected"; } ?> value="<?php echo $val->faculty_id; ?>"><?php echo $val->name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-6 my-2">
                              <label>Running Topic<span class=" text-danger">*</span></label>   
                              <input type="text" class="form-control" value="<?php echo @$select_application->running_topic; ?>" placeholder="Course Topics" name="running_topic" required>
                           </div>
                           <div class="col-md-4 my-2">
                              <label>Position For Applied<span class=" text-danger">*</span></label>   
                              <?php  $posi = explode(",",$select_application->position_for_apply); ?>
                              <select class="form-control custom-select my-1 mr-sm-2"  name="position_for_apply[]" multiple required>
                                 <?php foreach($jobtype_all as $val) { ?>
                                 <option <?php if(in_array($val->position,$posi)) { echo "selected"; } ?> value="<?php echo $val->position; ?>"><?php echo $val->position; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-4 my-2">
                              <label>Position For Applied<span class=" text-danger">*</span></label>   
                              <?php  $posi = explode(",",$select_application->position_for_apply); ?>
                              <select class="form-control custom-select my-1 mr-sm-2"  name="position_for_apply[]" multiple required>
                                 <?php foreach($jobtype_all as $val) { ?>
                                 <option <?php if(in_array($val->position,$posi)) { echo "selected"; } ?> value="<?php echo $val->position; ?>"><?php echo $val->position; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-6 my-2">
                              <label>Enter Skills<span class=" text-danger">*</span></label>   
                              <input type="text" class="form-control" value="<?php echo @$select_application->skill; ?>" placeholder="Skill" name="skill" required>
                           </div>
                           <div class="col-md-6 my-2">
                              <label>Salary expectation<span class=" text-danger">*</span></label>   
                              <input type="text" class="form-control" placeholder="10k-15k" value="<?php echo @$select_application->salary_expectation; ?>" name="salary_expectation" required>
                           </div>
                           <div class="col-md-4 my-2">
                              <label>Prefer Location For Job:<span class=" text-danger">*</span></label>   
                              <?php  $loca = explode(",",$select_application->prefer_job_location); ?>
                              <select class="form-control custom-select my-1 mr-sm-2"  multiple name="prefer_job_location[]" required>
                                 <?php foreach($area_all as $val) { ?>
                                 <option  <?php if(in_array($val->area_name,$loca)) { echo "selected"; } ?> value="<?php echo $val->area_name; ?>"><?php echo $val->area_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-4 my-2">
                              <label>Batch Time<span class=" text-danger">*</span></label>   
                              <input type="text" class="form-control" value="<?php echo @$select_application->batch_time; ?>"  placeholder="Your Prefered Location" name="batch_time" required>
                           </div>
                           <div class="col-md-8 my-2">
                              <label>Remarks<span class=" text-danger">*</span></label>   
                              <input type="text" class="form-control"  placeholder="Your Need" value="<?php echo @$select_application->remarks; ?>" name="remarks" required>
                           </div>
                        </div>
                     </div>
                     <?php } else {  ?>
                     <div class="row" style="padding-top:20px; padding-bottom:20px">
                        <div class="col-md-3 my-2">
                           <img src="https://www.rnwmultimedia.com/applications/images/application_images/<?php echo $val->photo; ?>" alt="face" height="150px" width="150px">
                        </div>
                        <?php @$name = explode(" ",@$select_application->name); ?>
                        <div class="col-md-3 my-2">
                           <label>First Name1 <span class="text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$name[0]; ?>" placeholder="First name" name="fname" required readonly>
                        </div>
                        <div class="col-md-3 my-2">
                           <label>Middle Name<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$name[1]; ?>" placeholder="Middle Name" name="mname" required readonly>
                        </div>
                        <div class="col-md-3 my-2">
                           <label>Last Name <span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$name[2]; ?>" placeholder="Last name" name="lname" required readonly>
                        </div>
                        <div class="col-md-12 my-2">
                           <label>Adress<span class=" text-danger">*</span></label>
                           <input type="text" class="form-control" value="<?php echo @$select_application->address; ?>" placeholder="Your Full Adress" name="address" required readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Number<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->number; ?>" name="number" placeholder="Mobile No" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label for="Grid">Gr id<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" placeholder="####" value="<?php echo @$select_application->gr_id; ?>"  id="Grid" name="gr_id" required readonly>
                        </div>
                        <div class="col-md-6 my-2">
                           <label for="Faculty">Faculty Name<span class=" text-danger">*</span></label>   
                           <select class="form-control custom-select my-1 mr-sm-2" id="Faculty"  name="faculty_id" disabled>
                              <option selected disabled>Click Here</option>
                              <?php foreach($faculty_all as $val) { ?>
                              <option <?php if(@$select_application->faculty_id==$val->faculty_id) { echo "selected"; } ?> value="<?php echo $val->faculty_id; ?>"><?php echo $val->name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                        <div class="col-md-6 my-2">
                           <label>Running Topic<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->running_topic; ?>" placeholder="Course Topics" name="running_topic" required readonly>
                        </div>
                        <div class="col-md-6 my-2">
                           <label>Position For Applied<span class=" text-danger">*</span></label>   
                           <?php  $posi = explode(",",$select_application->position_for_apply); ?>
                           <select class="form-control custom-select my-1 mr-sm-2"  name="position_for_apply[]" multiple required disabled>
                              <?php foreach($jobtype_all as $val) { ?>
                              <option <?php if(in_array($val->position,$posi)) { echo "selected"; } ?> value="<?php echo $val->position; ?>"><?php echo $val->position; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                        <div class="col-md-6 my-2">
                           <label>Enter Skills<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->skill; ?>" placeholder="Skill" name="skill" required readonly>
                        </div>
                        <div class="col-md-6 my-2">
                           <label>Salary expectation<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" placeholder="10k-15k" value="<?php echo @$select_application->salary_expectation; ?>" name="salary_expectation" required readonly>
                        </div>
                        <div class="col-md-6 my-2">
                           <label>Prefer Location For Job:<span class=" text-danger">*</span></label>   
                           <?php  $loca = explode(",",$select_application->prefer_job_location); ?>
                           <select class="form-control custom-select my-1 mr-sm-2"  multiple name="prefer_job_location[]" required disabled>
                              <?php foreach($area_all as $val) { ?>
                              <option  <?php if(in_array($val->area_name,$loca)) { echo "selected"; } ?> value="<?php echo $val->area_name; ?>"><?php echo $val->area_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Batch Time<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->batch_time; ?>"  placeholder="Your Prefered Location" name="batch_time" required readonly>
                        </div>
                        <div class="col-md-8 my-2">
                           <label>Remarks<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control"  placeholder="Your Need" value="<?php echo @$select_application->remarks; ?>" name="remarks" readonly required>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <div id="menu1" class="tab-pane fade">
                     <?php if(@$_SESSION['user_name']=='Pradip Malaviya' || @$_SESSION['user_name']=='Jeel Patel') { ?>
                     <div class="row" style="padding-top:20px; padding-bottom:20px" >
                        <div class="col-md-8 my-2">
                           <label>Company Name<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->company_name; ?>" placeholder="Previous Company Nname" name="company_name" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Number<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->company_number; ?>" name="company_number" placeholder="Company No">
                        </div>
                        <div class="col-md-8 my-2">
                           <label>Adress<span class=" text-danger">*</span></label>
                           <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->company_address; ?>"  name="company_address" placeholder="Comany Address">
                        </div>
                        <div class="col-md-4 my-2">
                           <label for="Supervisor">Company Supervisor<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control"  name="company_sup_name" value="<?php echo @$select_application->company_sup_name; ?>" id="Supervisor" placeholder="Supervisor Name" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Job Title<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" name="job_title" value="<?php echo @$select_application->job_title; ?>" placeholder="Your Profession" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Starting Salary<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->starting_salary; ?>" name="starting_salary" placeholder="8k" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Ending Salary<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" name="ending_salary" value="<?php echo @$select_application->ending_salary; ?>" placeholder="15k" >
                        </div>
                        <div class="col-md-12 my-2">
                           <label>Responsibilities<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" name="responsibilities" value="<?php echo @$select_application->responsibilities; ?>" placeholder="" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Form<span class=" text-danger">*</span></label>   
                           <input type="" class="form-control datepicker" value="<?php echo @$select_application->leave_from; ?>"  name="leave_from" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>To<span class=" text-danger">*</span></label>   
                           <input type="" class="form-control datepicker" name="leave_to" value="<?php echo @$select_application->leave_to; ?>" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Reason For Leaving<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" name="leave_reason" value="<?php echo @$select_application->leave_reason; ?>" >
                        </div>
                        <div class="col-md-8 my-2">
                           <label>May we contact your previous supervisor for a reference?                                          <span class="text-danger">*</span></label>  
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" id="inlineCheckbox1" <?php if(@$select_application->contact_sup=="yes") { echo "checked"; } ?> value="yes" name="contact_sup">
                              <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" id="inlineCheckbox2" <?php if(@$select_application->contact_sup=="no") { echo "checked"; } ?> value="no" name="contact_sup">
                              <label class="form-check-label" for="inlineCheckbox2">No</label>
                           </div>
                        </div>
                     </div>
                     <?php } else { ?>
                     <div class="row" style="padding-top:20px; padding-bottom:20px" >
                        <div class="col-md-8 my-2">
                           <label>Company Name<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->company_name; ?>" placeholder="Previous Company Nname" name="company_name" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Number<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->company_number; ?>" name="company_number" placeholder="Company No" readonly>
                        </div>
                        <div class="col-md-8 my-2">
                           <label>Address<span class=" text-danger">*</span></label>
                           <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->company_address; ?>"  name="company_address" placeholder="Comany Address" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label for="Supervisor">Company Supervisor<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control"  name="company_sup_name" value="<?php echo @$select_application->company_sup_name; ?>" id="Supervisor" placeholder="Supervisor Name" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Job Title<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" name="job_title" value="<?php echo @$select_application->job_title; ?>" placeholder="Your Profession" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Starting Salary<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->starting_salary; ?>" name="starting_salary" placeholder="8k" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Ending Salary<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" name="ending_salary" value="<?php echo @$select_application->ending_salary; ?>" placeholder="15k" readonly>
                        </div>
                        <div class="col-md-12 my-2">
                           <label>Responsibilities<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" name="responsibilities" value="<?php echo @$select_application->responsibilities; ?>" placeholder="" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Form<span class=" text-danger">*</span></label>   
                           <input type="" class="form-control datepicker" value="<?php echo @$select_application->leave_from; ?>"  name="leave_from" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>To<span class=" text-danger">*</span></label>   
                           <input type="" class="form-control datepicker" name="leave_to" value="<?php echo @$select_application->leave_to; ?>" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Reason For Leaving<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" name="leave_reason" value="<?php echo @$select_application->leave_reason; ?>" readonly>
                        </div>
                        <div class="col-md-8 my-2">
                           <label>May we contact your previous supervisor for a reference?                                          <span class="text-danger">*</span></label>  
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" id="inlineCheckbox1" <?php if(@$select_application->contact_sup=="yes") { echo "checked"; } ?> value="yes" name="contact_sup" readonly>
                              <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" id="inlineCheckbox2" <?php if(@$select_application->contact_sup=="no") { echo "checked"; } ?> value="no" name="contact_sup" readonly>
                              <label class="form-check-label" for="inlineCheckbox2">No</label>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
                  <div id="menu2" class="tab-pane fade">
                     <?php if(@$_SESSION['user_name']=='Jeel Patel' || @$_SESSION['user_name']=='Pradip Malaviya' ) { ?>
                     <div class="row" style="padding-top:20px; padding-bottom:20px">
                        <div class="col-md-8 my-2">
                           <label>Company Name<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" placeholder="Previous Company Nname" value="<?php echo @$select_application->user_company_name; ?>" name="user_company_name" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Number<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" id="inlineFormInputGroup" name="user_company_number" value="<?php echo @$select_application->user_company_number; ?>" placeholder="7202947622">
                        </div>
                        <div class="col-md-8 my-2">
                           <label>Adress<span class=" text-danger">*</span></label>
                           <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->user_company_address; ?>"  name="user_company_address" placeholder="Comany Address">
                        </div>
                        <div class="col-md-4 my-2">
                           <label for="Supervisor">Company Supervisor<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->user_company_sup_name; ?>"  name="user_company_sup_name" id="Supervisor" placeholder="Supervisor Name" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Job Title<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->user_job_title; ?>" name="user_job_title" placeholder="Your Profession" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Starting Salary<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->user_starting_salary; ?>" name="user_starting_salary" placeholder="8k" >
                        </div>
                        <div class="col-md-12 my-2">
                           <label>Responsibilities<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->user_responsibilities; ?>" name="user_responsibilities" placeholder="" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Form<span class=" text-danger">*</span></label>   
                           <input type="" class="form-control datepicker" value="<?php echo @$select_application->user_from; ?>"  name="user_from" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Ref By<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" name="user_refby" value="<?php echo @$select_application->user_refby; ?>" >
                        </div>
                     </div>
                     <?php } else { ?>
                     <div class="row" style="padding-top:20px; padding-bottom:20px">
                        <div class="col-md-8 my-2">
                           <label>Company Name<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" placeholder="Previous Company Nname" value="<?php echo @$select_application->user_company_name; ?>" name="user_company_name" readonly >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Number<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" id="inlineFormInputGroup" name="user_company_number" value="<?php echo @$select_application->user_company_number; ?>" placeholder="7202947622" readonly>
                        </div>
                        <div class="col-md-8 my-2">
                           <label>Adress<span class=" text-danger">*</span></label>
                           <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->user_company_address; ?>"  name="user_company_address" placeholder="Comany Address" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label for="Supervisor">Company Supervisor<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->user_company_sup_name; ?>"  name="user_company_sup_name" id="Supervisor" placeholder="Supervisor Name" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Job Title<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->user_job_title; ?>" name="user_job_title" placeholder="Your Profession" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Starting Salary<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->user_starting_salary; ?>" name="user_starting_salary" placeholder="8k" readonly>
                        </div>
                        <div class="col-md-12 my-2">
                           <label>Responsibilities<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" value="<?php echo @$select_application->user_responsibilities; ?>" name="user_responsibilities" placeholder="" readonly>
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Form<span class=" text-danger">*</span></label>   
                           <input type="" class="form-control datepicker" value="<?php echo @$select_application->user_from; ?>" readonly name="user_from" >
                        </div>
                        <div class="col-md-4 my-2">
                           <label>Ref By<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control" name="user_refby" value="<?php echo @$select_application->user_refby; ?>" readonly >
                        </div>
                     </div>
                     <?php } ?>
                  </div>
                  <div id="menu3" class="tab-pane fade">
                     <div class="row" style="padding:15px 0;">
                        <?php if(@$_SESSION['user_name'] == 'Jeel Patel' || @$_SESSION['user_name']=='Pradip Malaviya' || @$_SESSION['logtype']=="Super Admin") { ?>
                        <div class="col-md-8 my-2">
                           <label>Application Status   <span class="text-danger">*</span></label>  
                           <div class="checkbox">
                              <label> <input class="form-check-input" type="radio"  <?php if(@$select_application->application_status=="0") { echo "checked"; } ?> value="0" name="application_status">Inctive</label>
                           </div>
                           <div class="checkbox">
                              <label> <input class="form-check-input" type="radio"  <?php if(@$select_application->application_status=="1") { echo "checked"; } ?> value="1" name="application_status">Active</label>
                           </div>
                           <div class="checkbox">
                              <label> <input class="form-check-input" type="radio"  <?php if(@$select_application->application_status=="2") { echo "checked"; } ?> value="2" name="application_status">Confirm</label>
                           </div>
                           <div class="checkbox">
                              <label><input class="form-check-input" type="radio"  <?php if(@$select_application->application_status=="3") { echo "checked"; } ?> value="3" name="application_status">Postpone</label>
                           </div>
                           <div class="checkbox">
                              <label><input class="form-check-input" type="radio"  <?php if(@$select_application->application_status=="4") { echo "checked"; } ?> value="4" name="application_status">Discart</label>
                           </div>
                        </div>
                        <?php } else { ?>
                        <?php } ?>
                        <div class="col-md-12">
                           <label>Faculty Remarks<span class=" text-danger">*</span></label>   
                           <input type="text" class="form-control"  placeholder="Your Need" value="<?php echo @$select_application->faculty_remarks; ?>" name="faculty_remarks" >
                        </div>
                     </div>
                  </div>
                  <div class="row" >
                     <div class="col-md-12">
                        <input type="submit" id="submit_job" name="submit_job" class="btn btn-danger w-100 font-weight-bold" value="SUBMIT" >
                     </div>
               </form>
               </div>
               <div id="menu4" class="tab-pane fade">
                  <div class="row" style="padding:15px;">
                     <form method="post" >
                        <div class="col-md-12">
                           <div class="row d-flex align-item-center">
                              <div class="col-md-3">
                                 <label>Labels<span class=" text-danger">*</span></label>   
                                 <input class="form-control"type="hidden" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>" >
                                 <select name="remarks_label" class="form-control" id="remarks_label">
                                    <option name=''>Select</option>
                                    <option name="Work">Assign Work Checking</option>
                                    <option name="Work1">Work Complete</option>
                                    <option name="Work2">Work Pending</option>
                                    <option name="Assign Company">Assign Company & Location</option>
                                    <option name="student_absent">Student Absent</option>
                                    <option name="Location">Location Issue</option>
                                    <option name="Salary">Salary Issue</option>
                                    <option name="Bond">Bond Issue</option>
                                    <option name="Personal">Personal Issue</option>
                                    <option name="Talkstudent">Talk With Student</option>
                                    <option name="Talkparents">Talk With Parents</option>
                                    <option name="Discipline">Discipline</option>
                                    <option name="Study">Study</option>
                                    <option name="Fees">Fees</option>
                                    <option name="Other">Others</option>
                                 </select>
                                 <span id="remarks_label_error" style="color:red"></span>
                              </div>
                              <div class="col-md-7">
                                 <label>Add New Remarks<span class=" text-danger">*</span></label>   
                                 <textarea class="form-control" name="remarks_job" id="remarks_job" placeholder="Add New Remarks"></textarea>
                                 <span id="remarks_job_error" style="color:red"></span>
                              </div>
                              <div class="col-md-2">
                                 <input type="button" name="submit_job_remarks" value="SUBMIT"  onclick="return remarks_add_re()" class="btn btn-success btn-100">
                              </div>
                           </div>
                           <div class="w-100 mt-5" id="remarks_data_record">
                              <div class="table-responsive">
                                 <table class="table">
                                    <tr style="background:#7460ee; color:white;">
                                       <th>No</th>
                                       <th>Date</th>
                                       <th>Labels</th>
                                       <th width="70%">Remarks</th>
                                       <th>Remarks By</th>
                                    </tr>
                                    <?php $i=0;
                                       if(isset($remarks_record)) {  foreach($remarks_record as $r)  { ?>
                                    <tr>
                                       <td><?php echo ++$i; ?></td>
                                       <td><?php echo $r->re_date; ?></td>
                                       <td><?php echo $r->labels; ?></td>
                                       <td align="justify"><?php echo $r->remarks; ?></td>
                                       <td><?php echo $r->remarks_by; ?></td>
                                    </tr>
                                    <?php  }  } ?>
                                 </table>
                              </div>
                           </div>
                     </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php    } ?>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->
<footer class="main-footer">
   <strong>Copyright©2020 Red & White Multimedia.</strong> All rights
   reserved.
</footer>
</div>
<div class="modal fade" id="rating-modal" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times</button>
            <h3 class="modal-title">Change Rating</h3>
         </div>
         <div class="modal-body">
            <form method="post" action="<?php echo base_url(); ?>FormController/give_student_rating">
               <table class="table table-bordered">
                  <tbody>
                     <tr>
                        <td>
                           <div>
                              <div class='rating-stars text-center'>
                                 <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
                                       <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                       <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                       <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                       <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                       <i class='fa fa-star fa-fw'></i>
                                    </li>
                                 </ul>
                              </div>
                              <!--  <input type="hidden" name="status" id="remarks_status"><br>
                                 <input type="hidden" name="remarks_by" id="cr_remarks_by"><br> -->
                              <input type="hidden" name="cr_star_id" id="cr_star_id"><br>
                              <input type="hidden" name="star_company_id" id="star_company_id"><br>
                              <!-- <input type="hidden" name="status_data_change" id="status_data_change"><br> -->
                              <input type="submit" value="submit" name="star_submit" class="btn btn-primary">
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- page script -->
<!-- DataTables -->
<script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
   // function wpf_form_edited()
   // {
   //   event.preventDefault();
   //    var confi = confirm('Are You sure?');
   //    if(confi){
   //     // var formdata = $('#wpf_form_data').serialize();
   //     $.ajax({
   //       url : "<?php echo base_url(); ?>FormController/editedWPF",
   //       type : "Post",
       
   //       data : $('#wpf_form_data').serialize(),
   
   //       success : function(rec){
   //           // window.location="<?php echo base_url(); ?>FormController/jobApplication?status=wpf";
   //       }
   //     });
   //     return true;
   //    }
   //    else{
   //     return false;
   //    }
   // }
   $(document).ready(function (e){
     $("#wpf_form_data").on('submit',(function(e){
   
       // var file_data = $('#upload_photo').prop('files')[0]; 
       e.preventDefault();
         $.ajax({
           url: "<?php echo base_url(); ?>FormController/editedWPF",
           type: "POST",
           data: new FormData(this),
           dataType: 'json',
           contentType: false,
           cache: false,
           processData:false,
           success: function(res){
             // alert(res)
             window.location="<?php echo base_url(); ?>FormController/jobApplication?status=wpf";
           },
         });
     }));
   });
   // $('#Update_record').click(function(e){
   //     var file_data = $('#upload_photo').prop('files')[0];   
   //     var form_data = new FormData(this);                 
   //     form_data.append('file', file_data);
   //     e.preventDefault();
   //     alert(form_data);                             
   //     $.ajax({
   //         url: "<?php echo base_url(); ?>FormController/editedWPF",
   //         type: 'post',
   //         data: form_data,                         
   //         success: function(res){
   //             alert(res); // <-- display response from the PHP script, if any
   //         }
   //      });
   //     alert("test");
   // })
</script>
<script type="text/javascript">
   // just for the demos, avoids form submit
   jQuery.validator.setDefaults({
     debug: true,
     success: "valid"
   });
   $( "#tpo_update_record" ).validate({
     rules: {
       ffname: {
         required: true,
         step: 100
       }
     }
   });
   
   $(function() {
   
   
      var start1=moment().subtract(1, 'days');
       var end1=moment();
   
       
       var start=""
        var end=""
       
       
   
       function cb(start, end) {
           $('#fromdate').val(start.format('YYYY-MM-DD'));
           $('#todate').val(end.format('YYYY-MM-DD'));
           $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
       }
   
       $('#reportrange').daterangepicker({
           startDate: start1,
           endDate: end1,
           ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
           }
       }, cb);
   
       cb(start, end);
   
   });
</script>
<script>
   $('.datepickernextfolloup').datepicker({
     autoclose: true,
     todayHighlight: true,
    format:"mm-dd-yyyy"
   })
   
</script>
<script>
   $(function () {
                   $('#datetimepicker1').datetimepicker({
                       format: 'DD/MM/YYYY'
                   });
               });
               
               $(function () {
                   $('#datetimepicker2').datetimepicker({
                       format: 'DD/MM/YYYY'
                   });
               });
   
   
    $('.datepicker').datepicker({
         autoclose: true,
   	   format:"yyyy-mm-dd"
   	   
       })
   
   
     $(function () {
       $('#example1').DataTable()
       $('.example10').DataTable()
       $('#example2').DataTable({
         'paging'      : true,
         'lengthChange': false,
         'searching'   : false,
         'ordering'    : true,
         'info'        : true,
         'autoWidth'   : false
       })
     });
   
   
   
   function remarks_add_re()
   {
     var app_id =  $('#application_no_job').val();
     var remarks_d =  $('#remarks_job').val();
     var user_name_re =  $('#user_name_re').val();
     var remarks_label =  $('#remarks_label').val();
     
   var currentdate = new Date(); 
       var datetime =  currentdate.getDate() + "/"
                   + (currentdate.getMonth()+1)  + "/" 
                   + currentdate.getFullYear() + "  "  
                   + currentdate.getHours() + ":"  
                   + currentdate.getMinutes() + ":" 
                   + currentdate.getSeconds();
   
     
     
   
     if(remarks_d=='')
     {
       $('#remarks_job_error').html("Please Enter Remarks");
        $('#remarks_label_error').html("");
       return false;
     }
     else if(remarks_label == 'select')
     {
       $('#remarks_job_error').html("");
       $('#remarks_label_error').html("Please Select Labels");
       return false;
     }
   
   
     $.ajax({
         url : "<?php echo base_url(); ?>FormController/records_remarks",
         type:"post",
         data:{
           'application_id' : app_id,
           'remarks_id' : remarks_d,
           'user_name_re' : user_name_re,
           'remarks_label' : remarks_label,
           'date1' : datetime
         },
         success:function(res)
         {
           $('#remarks_data_record').html(res);
           $('#remarks_job').val('');
           $('#remarks_job_error').html("");
           
         }
     });
   }
   
   
   function hide_menu4_submit()
   {
   		$('#submit_job').hide();
   }
   function show_menu4_submit()
   {
   		$('#submit_job').show();
   }
   
   
   
   function get_student_record(id)
   {
   	$.ajax({
   		url : "<?php echo base_url(); ?>index.php/FormController/get_pop_student_record",
   		type : "post",
   		data:{
   			'id' : id
   		},
   		success:function(response)
   		{
   			$('#result').html(response);
   		}
   	});
   }
   
   function get_notification(application_id)
   {
     // alert(id);
   
     var notifive_status = $('#notifive_status').val();
   
     $.ajax({
       url : "<?php echo base_url(); ?>FormController/ajax_notification",
       type : "post",
       dataType : "JSON",
       data:{
         'application_id' : application_id , 'notifive_status' : notifive_status
       },
       success:function(response)
       {
         //$('#result').html(response);
       }
     });
     return false;
   }
   
   
   
   function get_add_remakrs(appli_id,as_fa)
   {
     // alert(appli_id); 
      // alert(assign_faculty);
      console.log(as_fa);
       $("#myModal_remarks").modal();
       $('#rem_application').val(appli_id);
       $('#assign_faculty').val(as_fa);
   
   }
   
   
   function insert_record_remarks()
   {
     var assign_company =  $('#assign_company_to_student').val();
     if(assign_company !=''){ assign_company= "Company Name List= "+assign_company +"<br>"; }else{ assign_company='';}
     var company_name_by_other = $('#company_name_by_other').val();
     if(company_name_by_other !=''){ company_name_by_other="Company Name = "+company_name_by_other +"<br>"; }else{ company_name_by_other='';}
   
     var re_by = $('#user_name_re').val();
     var appli_id = $('#rem_application').val();
     var remarks = $('#remarks_job').val();
     remarks =  assign_company + company_name_by_other +"Remarks = "+remarks;
     var label_rema = $('#label_rem').val();
     var date_remakr = $('#cure_date').val();
     var faculty_assign =  $('#assign_faculty').val();
   
   // alert(remarks);
     // alert(re_by);
     // alert(appli_id);
     // alert(remarks);
     // alert(label_rema);
     // alert(date_remakr);
     // alert(faculty_assign);
     $.ajax({
         url : "<?php echo base_url(); ?>/FormController/records_remarks",
         type:"post",
         data:{
           'application_id':appli_id,
           'remarks_id':remarks,
           'user_name_re':re_by,
           'remarks_label' : label_rema,
           'date1': date_remakr,
           'faculty_assign' : faculty_assign
         },
         success:function(res)
         {
           // console.log(res);
           $('#myModal_remarks').modal('hide');
           $('#add_remarks')[0].reset();
         }
     });
   
   }
   
   function insert_status_remarks()
   {
     var re_by = $('#user_name_re').val();
     var remarks = $('#u_status').val();
     var date_remakr = $('#cure_date').val();
     var status = $('#change_status_popup').val();
     var appli_id =  $('#rem_application_status').val();
     var assign_faculty = $('#assign_faculty').val();
     var next_followup_date = $('#next_followup_date').val();
   
     $.ajax({
         url : "<?php echo base_url(); ?>/FormController/records_remarks",
         type:"post",
         data:{
           'application_id':appli_id,
           'remarks_id':remarks,
           'user_name_re':re_by,
           'remarks_label' : status,
           'date1': date_remakr,
           'assign_faculty' : assign_faculty,
           'next_followup_date' : next_followup_date
         },
         success:function(res)
         {
           
           $('#exampleModal').modal('hide');
           $('#add_status')[0].reset();
            $('#assign_faculty').hide();
           // $('#user_name_re').val('');
           $('#status').val('');
           $('#rem_application_status').val('');
   
                       setTimeout(function () {
                         window.location = "<?php echo base_url(); ?>FormController/jobApplication";
                       }, 1000);
   
         }
     });
   }
   
   
   
   function insert_status_remarks_confirm()
   {
     // var formData = $('#add_confirm_student_data').
      // var form = $('#add_confirm_student_data')[0];
   
           // Create an FormData object 
     // var data = new FormData(form);
     // alert(data);
   
     var formData = new FormData($('#add_confirm_student_data')[0]);
   
   formData.append('joiningLetter', $('input[name=joining_letter_upload]')[0].files[0]);
     // var re_by = $('#user_name_re_confirm').val();
     // var remarks = $('#u_status_confirm').val();
     // var date_remakr = $('#cure_date_confirm').val();
     var status = $('#change_status_popup').val();
     // var appli_id =  $('#rem_application_status_confirm').val();
     // var assign_faculty = $('#assign_faculty_confirm').val();
   
   
   
     // var next_folloup_date = $('#next_folloup_date').val();
     $.ajax({
         url : "<?php echo base_url(); ?>/FormController/records_remarks_confirms",
         type:"post",
         enctype: 'multipart/form-data',
         data:{
           'confirm_data':formData,
           'confirm_status':status
         },
         success:function(res)
         {
           alert(res);
           // $('#exampleModal').modal('hide');
           // $('#add_status')[0].reset();
           //  $('#assign_faculty').hide();
           // // $('#user_name_re').val('');
           // $('#status').val('');
           // $('#rem_application_status').val('');
   
           //             setTimeout(function () {
           //               window.location = "<?php echo base_url(); ?>FormController/jobApplication";
           //             }, 1000);
   
         }
     });
   }
   
   function without_placed_form(id)
   {
   
     // alert(id);
       var p_sta =  "wpf_status"+id;
       var sta = $("#"+p_sta).val();
   
       // alert(sta);
       var ch_status =  "wpf_change_status"+id;
       // alert(ch_status);
       var status_data = $("#"+ch_status).val(sta);
       $('#change_status_popup').val(sta);
       $('#wpf_change_status_popup_confirm').val(sta);
   
   }
   
   
   
   function onchange_active_de(id)
   {
   
     // alert(id);
     var p_sta =  "p_status"+id;
       var sta = $("#"+p_sta).val();
   
       // alert(sta);
       var ch_status =  "change_status"+id;
       // alert(ch_status);
       var status_data = $("#"+ch_status).val(sta);
       $('#change_status_popup').val(sta);
       $('#change_status_popup_confirm').val(sta);
   
   }
   function insert_record_status_wpf(appli_id){
   
      var statusC = $('#change_status_popup').val();
       // alert(statusC);
        $('#rem_application_status').val(appli_id);
        $('#rem_application_status_confirm').val(appli_id);
   
       if(statusC == 'Confirm')
       {
         $("#exampleModalwpf123").modal('show'); 
         // $("#exampleModal").modal('hide'); 
         // $('#change_status_popup').val(sta);
       }
       else
       {
         $("#exampleModalwpf123").modal('show'); 
         // $("#exampleModalConfirm").modal('hide'); 
         // $('#change_status_popup').val(sta);
       }
   
       $.ajax({
         url: '<?php echo base_url(); ?>FormController/getStudentsRecordWpf',
         type : "POST",
         data : {
           'application_id' : appli_id
         },
         success: function(data){
           // console.log(data);
           var record = $.parseJSON(data);
           console.log(record);
           $('#oe_name').val(record.name);
           $('#oe_number').val(record.number);
           $('#oe_school_name').val(record.school_name);
           $('#oe_type').val(record.owner_employee_type);
           $('#oe_company_name').val(record.confirm_company_name);
           $('#oe_designation').val(record.designation);
           var path = "https://demo.rnwmultimedia.com/placement/img/"+record.photo;
           $('#upload_photo_wpf').attr('src',path);
           $('#upload_photo_wpf_ankor').attr('href',path);
   
           // $(this).attr("src", path);
           if(record.owner_employee_type == 'owner'){
             $('#oe_no_of_employee').val(record.no_of_employee);
             $('#oe_ssalary').hide();
             $('#oe_sno_of_employee').show();
             $('#category_other').hide();
           }else{
             $('#oe_salary').val(record.confirm_starting_salary_confirm);
             $('#oe_ssalary').show();
             $('#oe_sno_of_employee').hide();
           }
         } 
       })
   
       $('#wpf_rem_application_status_confirm').val(appli_id);
   }
   $('#category_other').hide();
   $('#category_data').change(function(){
        var ccData = $('#category_data').val();
       if(ccData == 'Other'){
           $('#category_other').show();
       }else{
   
           $('#category_other').hide();
       } 
   
   });
   
   
   function insert_record_status(appli_id)
   {
      var statusC = $('#change_status_popup').val();
       alert(statusC);
        $('#rem_application_status').val(appli_id);
        $('#rem_application_status_confirm').val(appli_id);
       if(statusC == 'Confirm')
       {
         $("#exampleModalConfirm").modal('show'); 
         // $("#exampleModal").modal('hide'); 
         // $('#change_status_popup').val(sta);
       }
       else
       {
         $("#exampleModal").modal('show'); 
         // $("#exampleModalConfirm").modal('hide'); 
         // $('#change_status_popup').val(sta);
       }
   
       $('#wpf_rem_application_status').val(appli_id);
   }
   
   function insert_record_status_confirm(appli_id)
   {
       $('#rem_application_status_confirm').val(appli_id);
   }
   
   
   $('#assign_faculty').hide();
   $('#label_assign_faculty').hide();
    $('#assign_company_to_student').hide();
    $('#label_assign_company_to_student').hide();
   
   function get_label_work()
   {
      var label_rem = $('#label_rem').val();
      // alert(label_rem);
      if(label_rem == 'Assign Work Checking')
      {
         $('#assign_faculty').show();
         $('#label_assign_faculty').show();
      }
      else
      {
         $('#label_assign_faculty').hide();
         $('#assign_faculty').hide();
      }
   
   
      if(label_rem == 'Assign Company & Location'){
         $('#assign_company_to_student').show();
         $('#label_assign_company_to_student').show();
      }
      else
      {
        $('#assign_company_to_student').hide();
        $('#label_assign_company_to_student').hide();
          $('#label_company_name_by_other').hide();
         $('#company_name_by_other').hide();
      }
   }
   
   
   function give_rate(appli_id)
   {
     
     $("#rating-modal").modal();  
     $('#star_company_id').val(appli_id);
   }
   
</script>
<script>
   $(document).ready(function(){
   
     $('#filter_section_exp_student').click(function(){
           $('#filter_section_experience').slideToggle();
   });
   
   
   
     $('#filter_section_company').click(function(){
           $('#filter_section').slideToggle();
   });
   
      
   
       $('#stars li').on('mouseover', function(){
     var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
    
     // Now highlight all the stars that's not after the current hovered star
     $(this).parent().children('li.star').each(function(e){
       if (e < onStar) {
         $(this).addClass('hover');
       }
       else {
         $(this).removeClass('hover');
       }
     });
     
   }).on('mouseout', function(){
     $(this).parent().children('li.star').each(function(e){
       $(this).removeClass('hover');
     });
   });
   
   
   /* 2. Action to perform on click */
   $('#stars li').on('click', function(){
     var onStar = parseInt($(this).data('value'), 10); // The star currently selected
     var stars = $(this).parent().children('li.star');
     
     for (i = 0; i < stars.length; i++) {
       $(stars[i]).removeClass('selected');
     }
     
     for (i = 0; i < onStar; i++) {
       $(stars[i]).addClass('selected');
     }
     
     // JUST RESPONSE (Not needed)
     var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
     var msg = "";
     if (ratingValue > 1) {
         // alert("Thanks! You rated this " + ratingValue + " stars.");
         $('#cr_star_id').val(ratingValue);
     }
     else {
         // alert("We will improve ourselves. You rated this " + ratingValue + " stars.");
         $('#cr_star_id').val(ratingValue);
     }
     responseMessage(msg);
   });
   });
   
   $('#filter_section').hide();
   $('#filter_section_experience').hide();
   $('#notification').hide();
</script>
<script>
   $(".add_details").click(function(){
       $(".user-details").append('<div class="user_data col-md-12"><div class="form-group col-md-6"> <label class="control-label">Student Name</label> <input name="rating_remarks[]" class="form-control"  autocomplete="false" type="text"></div> <div class="form-group col-md-4"><label class="control-label">Rank</label><input name="rating_no[]" class="form-control"  autocomplete="false" type="text"></div><div class="form-group col-md-2"><button class="remove-btn" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i>X</button></div></div></div>');
   });
   
   $("body").on("click",".remove-btn",function(e){
          $(this).parents('.user_data').remove();
     });
   
   
   
   
   //session automatic  
       $(document).ready(function(){
           var submenu = sessionStorage.getItem("submenu");
            var leadsubmenu = sessionStorage.getItem("leadsubmenu");
              $('#sub_menu_'+submenu).addClass('show');
              $('#lead_submenu_'+leadsubmenu).addClass('show');
       });
   
       function getClick(id,subid){
         sessionStorage.setItem("submenu", id);
         sessionStorage.setItem("leadsubmenu", subid);
       }
   
       function hideMenu(id,subid){
         $("#sub_menu_"+id).removeClass('show');
         $("#lead_submenu_"+subid).removeClass('show');
       }
   //end session of sidebar menu open 
   
   
   function change_copy_paste_text_mobile(ic){
     var copy_ppp =  "copy_paste_record_mobile_"+ic;
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
   
   
   
   function get_copy_paste_usernamePassowrd(){
     var data_text  = "company_name_copy_paste_up";
     var dd =  document.getElementById(data_text).textContent;
     var inp =document.createElement('input');
     document.body.appendChild(inp)
     inp.value =dd;
     inp.select();
     document.execCommand('copy',false);
     inp.remove();
     var copy_ppp =  "copy_paste_record_userpass";
     var ddd =  document.getElementById(copy_ppp);
      $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
   }
    
   function change_copy_paste_text_name(ic){
     var copy_ppp =  "copy_paste_record_name_"+ic;
      $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'Click to Copy').tooltip('show');
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
   function change_copy_paste_text_grid(ic){
     var copy_ppp =  "copy_paste_record_grid_"+ic;
      $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'Click to Copy').tooltip('show');
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
   </script>
   <script>
   
   $('#company_name_by_other').hide();
   $('#label_company_name_by_other').hide();
   function acotostudent()
   {
     var comp_list_label = $('#assign_company_to_student').val();
     if(comp_list_label == 'Other')
     {
         $('#company_name_by_other').show();
         $('#label_company_name_by_other').show();
     }
     else
     {
         $('#label_company_name_by_other').hide();
         $('#company_name_by_other').hide();
     }
   }
   
   
   function get_add_upload_joning_letter(appli_id)
   {
      $('#jobapplication_number').val(appli_id);
     $('#joining_letter_modal').modal('show');
     // alert(faculty_id);
   }
   
   function send_whatsapp_template(appli_id)
   {
      $('#whatsapp_template_id_send').val(appli_id);
     $('#whatsapp_template_modal').modal('show');
     // alert(faculty_id);
   }
   
   
   function get_whatsapp_template_message()
   {
     var temp_name = $('#whatapp_tem').val();
     $.ajax({
       url : "<?php echo base_url() ?>FormController/whatsapp_tem_me_get",
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
   
   
   // just for the demos, avoids form submit
   // jQuery.validator.setDefaults({
   //   debug: true,
   //   success: "valid"
   // });
   // $("#add_confirm_student_data").validate({
   //   rules: {
   //     company_name_confirm: {
   //       required: true
   //     }
   //   },
   //   messages: {
   //     company_name_confirm:{
   //       required : "<span style='color:red'>Enter Company Name</span>"
   //     }
   //   }
   // });
</script>
<script>
   // just for the demos, avoids form submit
   jQuery.validator.setDefaults({
     debug: true,
     success: "valid"
   });
   $( "#add_confirm_student_data" ).validate({
     rules: {
       company_name_confirm: {
         required : true
       }
     }
   });
   
   
   var mm = document.querySelectorAll('#whatsapp_sen_mm_data');
   mm[0].addEventListener('click', function(){  
     var whatapp_tem = $('#whatapp_tem').val();
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
           url : "<?php echo base_url() ?>FormController/send_mes_through_wht",
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
     alert(data);
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
      alert(data)
      if(data == 'yes'){
       $('#bond_data_confirm').show();
      }else{
       $('#bond_data_confirm').hide();
      }
   }
   
   
   function submitConfirmationData()
   {
     var company_name_confirm    = $('#company_name_confirm').val();
     var joining_date_confirm    = $('#joining_date_confirm').val();
     var starting_salary_confirm = $('#starting_salary_confirm').val();
     var stu_re_confirms         = $('#student_remarks_confirm').val();
     if(company_name_confirm == ''){
         $('#con_name_error').html("Enter Company Name");
         document.getElementById('company_name_confirm').focus();
         return false;
     }
     else if(joining_date_confirm == '')
     {
         $('#con_name_error').html('');
         $('#join_date_error').html("Enter Joining Date");
         document.getElementById('join_date_error').focus();
         return false;
     }
     else if(starting_salary_confirm == '')
     {
         $('#con_name_error').html('');
         $('#join_date_error').html('');
         $('#starting_salary_error').html("Enter Starting salary");
         document.getElementById('starting_salary_confirm').focus();
         return false;
     }
     else if(stu_re_confirms == '')
     {
         $('#con_name_error').html('');
         $('#join_date_error').html('');
         $('#starting_salary_error').html("");
         $('#stu_re_confirms').html("Enter remarks");
         document.getElementById('starting_salary_confirm').focus();
         return false;
     }
     else
     { 
         $('#con_name_error').html('');
         $('#join_date_error').html('');
         $('#starting_salary_error').html("");
         $('#stu_re_confirms').html("");
         return true;
     }
   }
   
   
   function check_resume_maximum_file_size()
   {
       var re_sh = "upload_joining_letter_confirm";
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
   
   
   $(document).ready(function() {
       $('#example1').DataTable( {
           dom: 'Bfrtip',
           buttons: [
               'copy', 'csv', 'excel', 'pdf', 'print'
           ]
       } );
   } );
</script>
</body>
</html>