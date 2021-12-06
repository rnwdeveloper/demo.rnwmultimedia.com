<!DOCTYPE html>
<html>
   <head>
      <title>How to Import Excel Data into Mysql in Codeigniter</title>
      <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
      <style>
         /* The customcheck */
         .customcheck {
         display: block;
         position: relative;
         padding-left: 35px;
         margin-bottom: 12px;
         cursor: pointer;
         -webkit-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
         }
         /* Hide the browser's default checkbox */
         .customcheck input {
         position: absolute;
         opacity: 0;
         cursor: pointer;
         }
         /* Create a custom checkbox */
         .checkmark {
         position: absolute;
         top: 0;
         left: 0;
         height: 25px;
         width: 25px;
         background-color: #eee;
         border-radius: 5px;
         }
         /* On mouse-over, add a grey background color */
         .customcheck:hover input ~ .checkmark {
         background-color: #ccc;
         }
         /* When the checkbox is checked, add a blue background */
         .customcheck input:checked ~ .checkmark {
         background-color: #02cf32;
         border-radius: 5px;
         }
         /* Create the checkmark/indicator (hidden when not checked) */
         .checkmark:after {
         content: "";
         position: absolute;
         display: none;
         }
         /* Show the checkmark when checked */
         .customcheck input:checked ~ .checkmark:after {
         display: block;
         }
         /* Style the checkmark/indicator */
         .customcheck .checkmark:after {
         left: 9px;
         top: 5px;
         width: 5px;
         height: 10px;
         border: solid white;
         border-width: 0 3px 3px 0;
         -webkit-transform: rotate(45deg);
         -ms-transform: rotate(45deg);
         transform: rotate(45deg);
         }
      </style>
      <style>
         .form-group input[type="checkbox"] {
         display: none;
         }
         .form-group input[type="checkbox"] + .btn-group > label span {
         width: 10px;
         }
         .form-group input[type="checkbox"] + .btn-group > label span:first-child {
         display: none;
         }
         .form-group input[type="checkbox"] + .btn-group > label span:last-child {
         display: inline-block;   
         }
         .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
         display: inline-block;
         }
         .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
         display: none;   
         }
         .modal-title{
         font-size: 18px;
         color: black;
         }
      </style>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/fontawesome-stars.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/bars-reversed.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         .br-theme-bars-reversed .br-widget a {
         background-color: pink;
         }
         .br-theme-bars-reversed .br-widget a.br-active,
         .br-theme-bars-reversed .br-widget a.br-selected {
         background-color: #ff446a;
         }
         .br-theme-bars-reversed .br-widget .br-current-rating {
         color: #ff446a;
         font-size: 20px;  
         }
         .checked {
         color: orange;
         }
         .tbl{
         background:#7460ee;
         color: white;
         }
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
         .modal-title{
         font-size: 20px;
         }
         .em{
         color: black;
         }
      </style>
   </head>
   <body>
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <!--  <section class="content-header">
            <h1><b>Bulk Lead</b></h1>
            
            <ol class="breadcrumb">
            
              <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            
              <li class="active">Bulk Lead</li>
            
            </ol>
            
            </section> -->
         <!-- Main content -->
         <section class="content">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Bulk Lead Data Insert</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-12">
                              <!-- general form elements -->
                              <div class="box box-primary" style="padding:20px;">
                                 <div class="box-header with-border" style="margin-bottom:10px;">
                                    <h3 class="box-title"><b>ADD Bulk Lead</b></h3>
                                 </div>
                                 <?php if(isset($ins_msg)){echo $ins_msg;}?>
                                 <form method="post" id="import_form" action="<?php echo base_url(); ?>Bulk_LeadController/import" enctype="multipart/form-data">
                                    <p><label>Select Excel File</label>
                                       <input type="file" name="file" id="file" />
                                    </p>
                                    <br />
                                    <input type="submit" name="import" value="Import" class="btn btn-success"/>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div style="margin-left: 10px;">
                        <p><b>Notes</b></p>
                        <p>Two Type File Uplode</p>
                        <p>1)xlsx</p>
                        <p>2)csv</p>
                        <p>All Feald Are Properly Feelup In Excelsheet Athorwise Data Not Inserted!</p>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header" style="background: #00a65a;">
                        <h5 class="modal-title" style="font-size: 25px;color: white;" id="exampleModalLabel">whatsapp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div>
                           <input type="checkbox" checked>
                           <label>Primary Mobile</label>
                           <input type="checkbox" style="margin-left: 50px;">
                           <label style="margin-left: 70;">Father's Mobile</label>
                        </div>
                        <div>
                           <input type="checkbox">
                           <label>Guardian's Mobile</label>
                           <input type="checkbox"  style="margin-left: 32px;">
                           <label style="margin-left: 15x;">Alternate Mobile</label>
                        </div>
                        <div>
                           <br>
                           <label for="templect">Whatsapp Templet</label><br>
                           <select  id="mySelect" onchange="myFunction()" class="form-control">
                              <option value="">Select Templets</option>
                              <option value="Greeting!How can help you?">Greeting!</option>
                              <option value="Hello">Hello</option>
                           </select>
                        </div>
                        <br>
                        <div>
                           <b><textarea class="form-control"  rows="4" cols="50" id="demo"></textarea></b>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=0123456789&text=I'm%20interested%20in%20your%20services" target="https:whatsapp.com">
                        Send Whatsapp</a>
                     </div>
                  </div>
               </div>
            </div>
            <?php if($_SESSION['logtype']=="Super Admin") { ?>
            <div style="margin-left: 87.5%;">
               <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Import-Bulk-Data</button>
            </div>
            <?php } ?>
            <!-- Count Lead -->
            <!--  -->
            <div class="row text-uppercase d-flex all-btn justify-center" style="margin-left: 22%;">
               <?php $to=0; foreach($all_bulk_lead as $val) { $to++;  }?>
               <a class="btn text-white inactive-a" href="<?php echo base_url(); ?>Bulk_LeadController/Bulk_lead">Lead<span><?php echo $to; ?></span></a>
               <?php $a=0; foreach($all_assignData as $val) { $a++;  }?>
               <a class="btn text-white active-a" href="<?php echo base_url(); ?>Bulk_LeadController/Bulk_lead_assign">assign lead all<span><?php echo $a; ?></span></a>
               <?php $new=0; foreach($all_assignnewData as $val) { $new++;  }?>
               <a class="btn text-white confirm-a" href="<?php echo base_url(); ?>Bulk_LeadController/Bulk_lead_assignNew">New Lead<span><?php echo $new; ?></span></a>
               <?php $old=0; foreach($all_assignOldData as $val) { $old++;  }?>
               <a class="btn text-white postpone-a" href="<?php echo base_url(); ?>Bulk_LeadController/Bulk_lead_assignOld">Old Lead<span><?php echo $old; ?></span></a>
            </div>
            <br>
            <div class="row">
               <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary" style="padding:20px;">
                     <div class="box-header with-border">
                        <h3 class="box-title"><b>Display Bulk Laed Data</b></h3>
                        <br><br>
                        <div class="dropdown pull-right">
                           <button class="btn btn-sm btn-info active dropdown-toggle" type="button" data-toggle="dropdown">Action
                           <span class="caret"></span></button>
                           <ul class="dropdown-menu">
                              <li><a onclick="createExcel()">Download Bulk Lead</a></li>
                              <form method="post" id="frm_data" action="<?php  echo base_url();?>Bulk_LeadController/download_excel">
                                 <input type="hidden" id="tb_data" name="data">  
                              </form>
                           </ul>
                        </div>
                        <button type="button" class="btn btn-sm <?php if(!empty($filter_on)) { echo "btn-success"; } else { echo "btn-default"; } ?>  pull-right" data-toggle="modal" data-target="#myModal_filter" style="margin-right:10px;"><i class="fa fa-search" style="margin-right:5px;" aria-hidden="true"></i>Filter <?php if(!empty($filter_on)) { echo "On"; } else { echo "Off"; } ?> </button>
                        <div class="[ form-group ]">
                           <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" />
                           <div class="[ btn-group ]">
                              <label for="fancy-checkbox-default" onclick='selectAll()'  class="[ btn btn-sm btn-default ]">
                              <span class="[ glyphicon glyphicon-ok ]"></span>
                              <span> </span>
                              </label>
                              <label for="fancy-checkbox-default" id="selectall" onclick='selectAll()' class="[ btn btn-sm btn-default active ]">
                              Select All
                              </label>
                              <label for="fancy-checkbox-default" id="unselectall" style="display:none"  onclick='selectAll()' class="[ btn btn-sm btn-default active ]">
                              Assign Data
                              </label>
                           </div>
                           <button type="button" class="btn btn-sm btn-success" onclick='UpdateUserData()'><i class="fa fa-edit" aria-hidden="true"></i> Assign User </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                           <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title"><b>Assign User</b></h4>
                                 </div>
                                 <?php if(isset($edit_msg)){echo $edit_msg;}?>
                                 <form method="post" action="<?php echo base_url(); ?>Bulk_LeadController/update_User_Data">
                                    <div class="modal-body">
                                       <div class="form-group">
                                          <input type="hidden" name="id" id="id">
                                          <div>
                                             <label for="email">Users:</label>
                                             <select required  name="assign_to" class="form-control" >
                                                <option>Select Users</option>
                                                <?php foreach($user_all as $val) { ?>
                                                <option value="<?php echo $val->name;?>"><?php echo $val->name; ?></option>
                                                <?php } ?>
                                                <!--  <?php foreach($hod_all as $val) { ?>
                                                   <option value="<?php echo $val->name;?>"><?php echo $val->name; ?></option>
                                                   
                                                   <?php } ?>
                                                   
                                                   <?php foreach($faculty_all as $val) { ?>
                                                   
                                                   <option value="<?php echo $val->name;?>"><?php echo $val->name; ?></option>
                                                   
                                                   <?php } ?> -->
                                             </select>
                                          </div>
                                          <div>
                                             <br>
                                             <label for="email">Assign day:</label>
                                             <select required  name="assign_day" class="form-control" >
                                                <option>Select Days</option>
                                                <?php for($i=1;$i<=7;$i++) { ?>
                                                <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                       </div>
                                       <input type="submit" name="update" value="Update" class="btn btn-success">
                                    </div>
                                    <div class="modal-footer">
                                       <!-- <button type="button" data-dismiss="modal" id="updateok" name="update" class="btn btn-primary">OK</button> -->
                                       <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- Modal -->
                        <div class="modal fade" id="myModal_filter" role="dialog">
                           <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Filter  :  Bulk Lead  Data
                                    </h4>
                                 </div>
                                 <form method="post" action="<?php  echo base_url(); ?>Bulk_LeadController/Bulk_lead">
                                    <div class="modal-body">
                                       <div class="row" >
                                          <div class="col-md-12 my-2" >
                                             <label>Date Range Picker </label> 
                                             <input type="hidden" id="fromdate" name="filter_startDate" value="<?php if(!empty($filter_startDate)) { echo @$filter_startDate; } ?>">
                                             <input type="hidden" id="todate" name="filter_endDate" value="<?php if(!empty($filter_endDate)) { echo @$filter_endDate; } ?>">
                                             <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                                <i class="fa fa-calendar"></i>&nbsp;
                                                <span><?php if(!empty($filter_startDate) && !empty($filter_endDate)) { echo @$filter_startDate." - ".$filter_endDate; } ?></span> <i class="fa fa-caret-down"></i>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-6 my-2">
                                             <label>Next Followup From </label>   
                                             <div class='input-group date' id="datetimepicker1">
                                                <input type='text'  class="form-control" name="filter_Next_Followup_Date_from" value="<?php if(!empty($filter_Next_Followup_Date_from)) { echo @$filter_Next_Followup_Date_from; } ?>" placeholder="Next Followup From"/>
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                             </div>
                                          </div>
                                          <div class="col-md-6 my-2">
                                             <label>Next Followup To </label>   
                                             <div class='input-group date' id="datetimepicker2">
                                                <input type='text'  class="form-control" name="filter_Next_Followup_Date_to" value="<?php if(!empty($filter_Next_Followup_Date_to)) { echo @$filter_Next_Followup_Date_to; } ?>" placeholder="Next Followup To"/>
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                             </div>
                                          </div>
                                          <div class="col-md-3 my-2">
                                             <label>Bulk Lead ID </label>   
                                             <input type="text" class="form-control" value="<?php if(!empty($filter_id)) { echo @$filter_id; } ?>" placeholder="Bulk Lead ID"  name="filter_id">
                                          </div>
                                          <div class="col-md-3 my-2">
                                             <label>Name </label>   
                                             <input type="text" class="form-control" value="<?php if(!empty($filter_fname)) { echo @$filter_fname; } ?>" placeholder="Name"  name="filter_fname">
                                          </div>
                                          <div class="col-md-3 my-2">
                                             <label>Father Name </label>    
                                             <input type="text" class="form-control" value="<?php if(!empty($filter_lname)) { echo @$filter_lname; } ?>" placeholder="Last name" name="filter_lname" >
                                          </div>
                                          <div class="col-md-3 my-2">
                                             <label>Email </label>   
                                             <input type="text" class="form-control" value="<?php if(!empty($filter_email)) { echo @$filter_email; } ?>" placeholder="Email" name="filter_email">
                                          </div>
                                          <div class="col-md-3 my-2">
                                             <label>Mobile </label>   
                                             <input type="text" class="form-control" value="<?php if(!empty($filter_mobile)) { echo @$filter_mobile; } ?>" placeholder="Lead Mobile" name="filter_mobile">
                                          </div>
                                          <div class="col-md-4 my-2">
                                             <label for="Faculty">Source</label>   
                                             <select class="form-control custom-select my-1 mr-sm-2"   name="filter_source">
                                                <option selected disabled>Filter Source</option>
                                                <?php foreach($all_source as $val) { ?>
                                                <option  <?php if(@$filter_source==$val->source_name) { echo "selected"; } ?> value="<?php echo $val->source_name; ?>"> <?php echo $val->source_name; ?></option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                          <div class="col-md-4 my-2">
                                             <label for="Faculty">Assigned To (User)</label>   
                                             <select class="form-control custom-select my-1 mr-sm-2"   name="filter_enquiry_assignedUser">
                                                <option selected disabled>Filter Source</option>
                                                <?php foreach($all_user as $val) { ?>
                                                <option  <?php if(@$filter_enquiry_assignedUser==$val->name) { echo "selected"; } ?> value="<?php echo $val->name; ?>"> <?php echo $val->name; ?></option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                          <div class="col-md-4 my-2">
                                             <label for="Faculty">Rating</label>  
                                             <select class="ex" name="filter_follwup_interestRating">
                                                <option selected disabled></option>
                                                <?php  for($i=1;$i<=3;$i++) { ?>
                                                <option <?php if(@$filter_follwup_interestRating==$i) { echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <input type="submit" class="btn btn-success" value="Filter" name="filter_bulk_lead" >
                                       <a class="btn btn-primary" href="<?php echo base_url(); ?>Bulk_LeadController/Bulk_lead">Reset</a>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div  id="enq_table">
                           <div class="table-responsive">
                              <table id="example1" class="table table-responsive table-bordered table-striped example1">
                                 <thead>
                                    <tr>
                                       <th>NO</th>
                                       <th>Bulk Lead Details</th>
                                       <th>Father Name</th>
                                       <th>Father Contact No</th>
                                       <th>Source Type</th>
                                       <th>School&Collage</th>
                                       <th>Occupation</th>
                                       <th>Intersting Field</th>
                                       <!-- <th>Address</th>
                                          <th>Other Remark</th> --> 
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $sno=1; foreach($all_bulk_lead as $val) { ?>
                                    <tr>
                                       <td>
                                          <label class="customcheck"><?php echo $sno; ?>
                                          <input type="checkbox" name="mark" value="<?php echo $val->id; ?>">
                                          <span class="checkmark"></span>
                                          </label>
                                       </td>
                                       <td>
                                          <?php if(!empty($val->name)) { echo $val->name."<br>"; } else { echo "Name Not Available <br>"; } ?>
                                          <a href="#" class="em" data-toggle="modal" data-target="#modalRegister" ><?php if(!empty($val->email)) { echo $val->email."<br>"; } else { echo "Email Not Available <br>"; }  ?></a>
                                          <?php if(!empty($val->contact_no)) { echo $val->contact_no."<br>"; } else { echo "Contact No Not Available <br>"; } ?>
                                          <?php if(!empty($val->area)) { echo $val->area."<br>"; } else { echo "Area Not Available <br>"; } ?>
                                          <?php if(!empty($val->priority)) { echo $val->priority; } ?><br>
                                          <?php for($k=1;$k<=3;$k++) { ?>
                                          <span class="fa fa-star <?php if($val->intresting_rating>=$k) { echo "checked"; } ?>"></span>
                                          <?php } ?>
                                          <!-- Button trigger modal -->
                                          <i class="fa fa-whatsapp" data-toggle="modal" data-target="#exampleModal4" style="font-size:20px;color: green;margin-left: 10px;"></i>
                                          <a href="tel:123-456-7890"><i class="fa fa-phone" style="font-size: 20px;color: green;margin-left: 9px;"></i></a>
                                       </td>
                                       <td><?php echo $val->father_name; ?></td>
                                       <td><?php echo $val->father_contact_no; ?></td>
                                       <td><?php echo $val->source_type; ?></td>
                                       <td><?php echo $val->school_collage; ?></td>
                                       <td><?php echo $val->occupation; ?></td>
                                       <td><?php echo $val->intersting_field; ?></td>
                                       <!-- <td><?php echo $val->address; ?></td>
                                          <td><?php echo $val->other_remark; ?></td> -->               
                                       <td>
                                          <!-- <a class="btn btn-warning" href="<?php echo base_url(); ?>Bulk_LeadController/Bulk_lead_view/<?php echo $val->id; ?>">View</a> -->
                                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $val->id; ?>">View</button>
                                          <div class="modal fade" id="myModal<?php echo $val->id; ?>" role="dialog">
                                             <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                   <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title"><b>Bulk Lead Data</b></h4>
                                                   </div>
                                                   <div class="modal-body">
                                                      <div class="table-responsive">
                                                         <table class="table table-responsive color-table primary-table table-bordered table-striped">
                                                            <thead>
                                                               <tr class="tbl">
                                                                  <th>Sno</th>
                                                                  <th>Name</th>
                                                                  <th>Email</th>
                                                                  <th>Father Name</th>
                                                                  <th>Contect NO</th>
                                                                  <th>Father Contect NO</th>
                                                                  <th>Source Type</th>
                                                                  <th>School & Collage</th>
                                                                  <th>Occupation</th>
                                                                  <th>Intersting Field</th>
                                                                  <th>Area</th>
                                                                  <th>Priority</th>
                                                                  <th>Address</th>
                                                                  <th>Other Remark</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr>
                                                                  <td><?php echo $val->id; ?></td>
                                                                  <td><?php echo $val->name; ?></td>
                                                                  <td><?php echo $val->email; ?></td>
                                                                  <td><?php echo $val->father_name; ?></td>
                                                                  <td><?php echo $val->contact_no; ?></td>
                                                                  <td><?php echo $val->father_contact_no; ?></td>
                                                                  <td><?php echo $val->source_type; ?></td>
                                                                  <td><?php echo $val->school_collage; ?></td>
                                                                  <td><?php echo $val->occupation; ?></td>
                                                                  <td><?php echo $val->intersting_field; ?></td>
                                                                  <td><?php echo $val->area; ?></td>
                                                                  <td>
                                                                     <span class="fa fa-star <?php if($val->intresting_rating>=1) { echo "checked"; } ?>"></span>
                                                                     <span class="fa fa-star <?php if($val->intresting_rating>=2) { echo "checked"; } ?>"></span>
                                                                     <span class="fa fa-star <?php if($val->intresting_rating>=3) { echo "checked"; } ?>"></span>
                                                                     <br>
                                                                     <?php echo $val->priority; ?>
                                                                  </td>
                                                                  <td><?php echo $val->address ; ?></td>
                                                                  <td><?php echo $val->other_remark; ?></td>
                                                                  <!-- Modal -->
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                    </tr>
                                    <?php $sno++; } ?>
                                    </tfoot>
                                 </tbody>
                              </table>
                              <!--             <div class="pagination-container text-center">
                                 <p><?php echo $links; ?></p>
                                 
                                 </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <footer class="main-footer">
         <strong>Copyright©2018 Red & White Multimedia.</strong> All rights
         reserved.
      </footer>
      <!-- ./wrapper -->
      <!-- jQuery 3 -->
      <script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- DataTables -->
      <script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
      <script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
      <!-- Select2 -->
      <script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
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
      <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/jquery.barrating.min.js"></script>
      <!-- page script -->
      <script>
         // jQuery / jQuery Bar Rating
         
         // FontAwesome / Bootstrap / jBR plugin
         
         
         
         $(function() {
         
         $('.ex').barrating({
         
           theme: 'fontawesome-stars'
         
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
         function createExcel()
         
         {
         
             
         
                     var excel_data = $('#enq_table').html();  
         
                     $('#tb_data').val(excel_data);
         
                    $('#frm_data').submit();
         
             
         
         }
         
      </script>
      <script>
         $(function () {
         
                         $('#datetimepicker1').datetimepicker({
         
                             format: 'YYYY-MM-DD'
         
                         });
         
                     });
         
                     
         
                     $(function () {
         
                         $('#datetimepicker2').datetimepicker({
         
                             format: 'YYYY-MM-DD'
         
                         });
         
                     });
         
         $('.datepicker').datepicker({
         
               autoclose: true,
         
              format:"yyyy-mm-dd"
         
              
         
             
         
             })
         
             
         
           $(function () {
         
             $('.example1').DataTable({
         
                 "pageLength": 25
         
             })
         
             $('#example2').DataTable({
         
               'paging'      : true,
         
               'lengthChange': false,
         
               'searching'   : false,
         
               'ordering'    : true,
         
               'info'        : true,
         
               'autoWidth'   : false
         
             })
         
           })
         
      </script>
      <script type="text/javascript">
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
      <script type="text/javascript">
         function selectAll(){
         
             if($('#fancy-checkbox-default').prop("checked") == true){
         
                       var items=document.getElementsByName('mark');
         
               for(var i=0; i<items.length; i++){
         
                 if(items[i].type=='checkbox')
         
                   items[i].checked=false;
         
               }
         
               $('#selectall').show();
         
               $('#unselectall').hide();
         
                   }
         
                   else
         
                   {
         
                       var items=document.getElementsByName('mark');
         
               for(var i=0; i<items.length; i++){
         
                 if(items[i].type=='checkbox')
         
                   items[i].checked=true;
         
               }
         
                 $('#selectall').hide();
         
               $('#unselectall').show();
         
                   }
         
           
         
         }
         
         
         
         
         
         function UpdateUserData()
         
         {
         
                
         
                 var id="";
         
                 var items=document.getElementsByName('mark');
         
               for(var i=0; i<items.length; i++){
         
                 if(items[i].type=='checkbox')
         
                 {
         
                     if(items[i].checked)
         
                     {
         
                         if(id=="")
         
                         {
         
                             id =items[i].value;
         
                         }
         
                         else
         
                         {
         
                             id = id+","+items[i].value;
         
                         }
         
                     }
         
                 }
         
                   
         
               }
         
               
         
               if(id!="")
         
               {
         
                   $('#id').val(id);
         
                   $('#myModal').modal("show").on('click', '#updateok', function(e) {
         
                   //  //var user_id=$("#subscription").val();  
         
                   // window.location.href = "<?php  echo base_url();?>Bulk_LeadController/update_User_Data?id="+id;  
         
                      
         
                             
         
                         });
         
                  
         
                           
         
                   
         
               }
         
               else
         
               {
         
                   
         
                   alert("Please Select Row");
         
               }
         
             
         
         }
         
         
         
      </script>
      <script>
         function myFunction() {
         
           var x = document.getElementById("mySelect").value;
         
           document.getElementById("demo").innerHTML = "" + x;
         
         }
         
      </script>
      <div id="modalRegister" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="text-align-last: center">Mail Templets</h4>
               </div>
               <meta charset="utf-8">
               <div class="modal-body">
                  <?php
                     echo $this->session->flashdata('email_sent');
                     
                     echo form_open('/Bulk_LeadController/send_mail');
                     
                     ?>
                  <input type = "email"  name = "email" required />
                  <input class="btn-success" type = "submit" value = "SEND MAIL">
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
               <?php 
                  echo form_close(); 
                  
                  ?> 
            </div>
         </div>
      </div>
   </body>
</html>
<!-- <script>
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
   
   
   
   </script> -->