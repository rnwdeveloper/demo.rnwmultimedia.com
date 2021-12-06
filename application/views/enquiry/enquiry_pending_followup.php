<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']) ;?>
    
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
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/fontawesome-stars.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/bars-reversed.min.css" rel="stylesheet">
  
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
</style> 
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Pending Follow Ups
        
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active"><a href="<?php echo base_url(); ?>Enquiry/enquiryPendingFollowup">Pending Follow Ups</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
		 <?php if(!empty($msg)) { ?>
     	            <div class="col-md-12" >
     	        
     	        <div style="padding:2px 5px 2px 5px" id="yellow" class="box yellow bg-green"><?php echo $msg; ?></div>
     	    </div>
     	    <?php } ?>
        </div>
        <div class="row">
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
                <div class="col-md-12">
                    <?php $to=0; foreach($all_inquiry as $val) { if($val->enquiry_trash=="0") { $to++;  } }?>
              <h3 class="box-title">Pending Follow Ups (Count: <?php echo $to; ?>)</h3>
              
              
              <div class="dropdown pull-right">
                            <button class="btn btn-sm btn-info active dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>Enquiry/proceedEnq"> New Enquiry</a></li>
                             <li><a href="<?php echo base_url(); ?>Enquiry/trashedInquirys">Cancelled Enquiry List</a></li>
                              <li><a onclick="createExcel()">Download Enquiry List</a></li>
                              
                              <form method="post" id="frm_data" action="<?php  echo base_url();?>Enquiry/download_excel">
                                <input type="hidden" id="tb_data" name="data">  
                                </form>
                             </ul>
                            
                                                
                          </div>
                          
                          <button type="button" class="btn btn-sm <?php if(!empty($filter_on)) { echo "btn-success"; } else { echo "btn-default"; } ?>  pull-right" data-toggle="modal" data-target="#myModal_filter" style="margin-right:10px;"><i class="fa fa-search" style="margin-right:5px;" aria-hidden="true"></i>Filter <?php if(!empty($filter_on)) { echo "On"; } else { echo "Off"; } ?> </button>
                </div>
                <div class="col-md-2">
                     <div class="[ form-group ]">
                        <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" />
                        <div class="[ btn-group ]">
                            <label for="fancy-checkbox-default" onclick='selectAll()'  class="[ btn btn-sm btn-default ]">
                                <span class="[ glyphicon glyphicon-ok ]"></span>
                                <span> </span>
                            </label>
                            <label for="fancy-checkbox-default" id="selectall" onclick='selectAll()' class="[ btn btn-sm btn-default active ]">
                                Select All
                            </label>
                            <label for="fancy-checkbox-default" id="unselectall" style="display:none"  onclick='selectAll()' class="[ btn btn-sm btn-default active ]">
                                Deselect All
                            </label>
                        </div>
                    </div>
                 </div>
                <div class="col-md-2">
                    
                     <button type="button" class="btn btn-sm btn-default" onclick='selectedAssign()'> Assign Enquiry</button>
                   
                     <!-- Modal -->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                              <div class="modal-header">
                               
                                <h4 class="modal-title"> Assign</h4>
                              </div>
                            <form method="post" action="<?php echo base_url(); ?>Enquiry/assignEnq">
                            <div class="modal-body">
                                <input type="hidden" id="enqids" name="enqids">
                                <div class="row">
                        <div class="col-md-4 m-1 p-1 right">
                            <label>Branch:*</label>
                        </div>
                        <div class="col-md-8 m-1 p-1">
                            <select class="form-control" onChange="selectContent()" id="brans" name="enquiry_branch" required>
                                <option value="">Select</option>
                                <?php foreach($all_branch as $val) { if($val->branch_status=="0") { 
                                if(in_array($val->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?>
                                <option  <?php if(@$selectdata->lead_branch==$val->branch_id) { echo "selected"; } ?> value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                                <?php } } } ?>
                            </select>
                        </div>
                    </div>
                    
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-md-4 m-1 p-1 right">
                                        <label>Assigned To (User):*</label>
                                    </div>
                                    <div class="col-md-8 m-1 p-1" id="ass_user">
                                        <select class="form-control" name="enquiry_assignedUser" required>
                                            <option value="" >select user</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary"  value="Assign" name="assign">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                            </form>
                          </div>
                          
                        </div>
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
          <h4 class="modal-title">Filter  :  Enquiry  Data
</h4>
        </div>
        <form method="post" action="<?php  echo base_url(); ?>Enquiry/enquiryPendingFollowup">
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
                                    <label>Enquiry ID </label>   
                                    <input type="text" class="form-control" value="<?php if(!empty($filter_enquiry_id)) { echo @$filter_enquiry_id; } ?>" placeholder="Enquiry ID"  name="filter_enquiry_id">
                                </div>
                                
                                
                                
                                 <div class="col-md-3 my-2">
                                     <label for="Faculty">Department</label>   
                                    <select class="form-control custom-select my-1 mr-sm-2"   name="filter_department">
                                        <option selected disabled>Filter Department</option>
                                        <?php foreach($all_department as $val) { if($val->depart_status=="0") { ?>
                                        <option  <?php if(@$filter_department==$val->department_id) { echo "selected"; } ?> value="<?php echo $val->department_id; ?>"> <?php echo $val->department_name; ?></option>
                                        <?php } } ?>
                                     </select>
                                </div>
                                
                                <div class="col-md-3 my-2">
                                     <label for="Faculty">Interest Level</label>   
                                    <select class="form-control custom-select my-1 mr-sm-2"   name="filter_Interest_Level">
                                        <option selected disabled>Filter Interest Level</option>
                                        <?php foreach($all_list_interest_level as $val) {  ?>
                                        <option  <?php if(@$filter_Interest_Level==$val->interest_level_name) { echo "selected"; } ?> value="<?php echo $val->interest_level_name; ?>"> <?php echo $val->interest_level_name; ?></option>
                                        <?php } ?>
                                     </select>
                                </div>
                                
                                <div class="col-md-3 my-2">
                                     <label for="Faculty">Student Response</label>   
                                    <select class="form-control custom-select my-1 mr-sm-2"   name="filter_Student_Response">
                                        <option selected disabled>Filter Student Response</option>
                                        <?php foreach($all_list_student_response as $val) {  ?>
                                        <option  <?php if(@$filter_Student_Response==$val->student_response_name) { echo "selected"; } ?> value="<?php echo $val->student_response_name; ?>"> <?php echo $val->student_response_name; ?></option>
                                        <?php } ?>
                                     </select>
                                </div>
                                
                                
                                <div class="col-md-3 my-2">
                                    <label>First Name </label>   
                                    <input type="text" class="form-control" value="<?php if(!empty($filter_fname)) { echo @$filter_fname; } ?>" placeholder="Name"  name="filter_fname">
                                </div>
                                <div class="col-md-3 my-2">
                                    <label>Last Name </label>   
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
                                        <?php foreach($all_source as $val) { if($val->source_status=="0" || $val->source_status=="2") { ?>
                                        <option  <?php if(@$filter_source==$val->source_name) { echo "selected"; } ?> value="<?php echo $val->source_name; ?>"> <?php echo $val->source_name; ?></option>
                                        <?php } } ?>
                                     </select>
                                </div>
                                <div class="col-md-4 my-2">
                                     <label for="Faculty">Course</label>   
                                    <select class="form-control custom-select my-1 mr-sm-2"   name="filter_course">
                                        <option selected disabled>Filter Course </option>
                                        <?php foreach($all_course as $val) { if($val->status=="0") { ?>
                                        <option   <?php if(@$filter_course==$val->course_name) { echo "selected"; } ?> value="<?php echo $val->course_name; ?>"> <?php echo $val->course_name; ?></option>
                                        <?php } } ?>
                                     </select>
                                </div>
                                <div class="col-md-4 my-2">
                                     <label for="Faculty">Package</label>   
                                    <select class="form-control custom-select my-1 mr-sm-2"   name="filter_package">
                                        <option selected disabled>Filter Package </option>
                                        <?php foreach($all_package as $val) { if($val->status=="0") { ?>
                                        <option   <?php if(@$filter_package==$val->package_name) { echo "selected"; } ?> value="<?php echo $val->package_name; ?>"> <?php echo $val->package_name; ?></option>
                                        <?php } } ?>
                                     </select>
                                </div>
                                <div class="col-md-4 my-2">
                                     <label for="Faculty">Branch</label>   
                                    <select class="form-control custom-select my-1 mr-sm-2"   name="filter_branch">
                                        <option selected disabled>Filter Branch </option>
                                        <?php foreach($all_branch as $val) { if($val->branch_status=="0") { ?>
                                        <option <?php if(@$filter_branch==$val->branch_id) { echo "selected"; } ?> value="<?php echo $val->branch_id; ?>"> <?php echo $val->branch_name; ?></option>
                                        <?php } } ?>
                                     </select>
                                </div>
                                <div class="col-md-4 my-2">
                                     <label for="Faculty">Assigned To (User)</label>   
                                     <select class="form-control" name="filter_enquiry_assignedUser">
                                            <option selected disabled >select user</option>
                                            <?php foreach($all_user as $us) {
                                               $u_brids =  explode(",",$us->branch_ids);
                                               $flag=0;
                                            for($p=0;$p<sizeof($u_brids);$p++)
                                            {
                                                if(in_array($u_brids[$p],$branch_ids))
                                                {
                                                    $flag = 1;
                                                }
                                            }
                                            
                                            if($flag==1 || $_SESSION['logtype']=="Super Admin")
                                            {
                                            ?>
                                             
                                             <option  value="<?php echo $us->user_id; ?>" <?php if(@$filter_enquiry_assignedUser==$us->user_id) { echo "selected"; } ?> ><?php echo $us->email; ?></option>
                                            
                                            <?php }  } ?>
                                        </select>
                                </div>
                                 <div class="col-md-4 my-2">
                                     <label for="Faculty">Rating</label>  
                                      <select class="ex" name="filter_follwup_interestRating">
                                         <option selected disabled></option>
                                         <?php  for($i=1;$i<=5;$i++) { ?>
                                       <option <?php if(@$filter_follwup_interestRating==$i) { echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                       <?php } ?>
                                     </select>
                                    
                                </div>
                               
                                
                </div>
            
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Filter" name="filter_inquirys" >
          <a class="btn btn-primary" href="<?php echo base_url(); ?>Enquiry/enquiryPendingFollowup">Reset</a>
        </div>
        </form>
      </div>
    </div>
  </div>
            <div  id="enq_table" class="table-responsive">  
              <table  class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>S No</th>
                   <th>Next FollowUp</th>
                  <th>Snapshot</th>
                   <th>Date-Time</th>
                    <th>Enquiry Details</th>
                    <th>Courses/Course Pkgs</th>
                   
                    <th>Assigned To</th>
                    <th>FollowUp Action</th>
                    <th>Comment</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
            <?php $sno=1; foreach($all_inquiry as $val) { if($val->enquiry_trash=="0") { ?>    
                <tr>
                  <td>
                       <label class="customcheck"><?php echo $sno; ?>
                          <input type="checkbox" name="mark" value="<?php echo $val->enquiry_id; ?>">
                          <span class="checkmark"></span>
                        </label>
                    </td>
                     <td>
                       <?php if(!empty($val->enquiry_next_followp)) { echo $val->enquiry_next_followp."<br>"; }  ?>
                      
                      
                  </td>
                  <td><?php if(!empty($val->enq_id)) { echo $val->enq_id."/".$val->enquiry_id."<br>"; } ?>
                 <?php if(!empty($val->enquiry_sourceType)) { echo $val->enquiry_sourceType."<br>"; } ?>
                 <?php if(!empty($val->enquiry_follwup_interestLevel)) { echo $val->enquiry_follwup_interestLevel; } ?>
                 <br>
                 <?php for($k=1;$k<=5;$k++) { ?>
                 <span class="fa fa-star <?php if($val->enquiry_follwup_interestRating>=$k) { echo "checked"; } ?>"></span>
                 <?php } ?>
                  </td>
                  <td> <?php   echo $val->enquiry_timestamp;  ?></td>
                  <td><?php if(!empty($val->enquiry_name)) { echo $val->enquiry_name."<br>"; } else { echo "Name Not Available <br>"; } ?>
                  <?php if(!empty($val->enquiry_email)) { echo $val->enquiry_email."<br>"; } else { echo "Email Not Available <br>"; } ?>
                   <?php if(!empty($val->enquiry_number)) { echo $val->enquiry_number."<br>"; } else { echo "Number Not Available <br>"; } ?>
                   <?php if(!empty($val->enquiry_area)) { echo $val->enquiry_area.", "; } ?>
                   <?php if(!empty($val->enquiry_city)) { echo $val->enquiry_city; } ?></td>
                  <td><?php if($val->enquiry_course_type=="Single Course") { echo $val->enquiry_courseName; } ?>
                  <?php if($val->enquiry_course_type=="Package") { echo $val->enquiry_packageName; } ?></td>
                 
                  <td>
                      <?php foreach($all_branch as $bran) { if($bran->branch_id==$val->enquiry_branch) { echo $bran->branch_name; } } ?>
                      <br>
                      <?php foreach($all_user as $user) { if($user->user_id==$val->enquiry_assignedUser) { echo $user->email."<br>"; } } ?>
                    <?php   echo "Followup By<br>"; ?>
                    <?php echo $val->follwup_by; ?>
                    </td>
                     <td><?php echo $val->enquiry_follwup_action; ?></td>
                  <td><?php echo $val->enquiry_follwup_comment; ?></td>
                  <td>
                     
                  	 <div class="dropdown">
                            <button class="btn btn-xs btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li ><a href="<?php echo base_url(); ?>Enquiry/enquiryView/<?php echo $val->enquiry_id; ?>">View</a></li>
                             
                            </ul>
                          </div>
                  	
                 
                            
                                  
                                  
                    </form>
                  	
                  	</td>
                </tr>
                
            <?php $sno++; } } ?>
                
                </tfoot>
              </table>
              
                     
          	</div>	
          	
          	
          
            
          </div>
        
        </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 
	
    
    
    
    
    
    
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright©2018 Red & White Multimedia.</strong> All rights
    reserved.
  </footer>

 
</div>


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
    function selectContent()
    {
        var brans = $('#brans').val();
        $.ajax({
            url:'<?php echo base_url(); ?>Enquiry/getcontent',
            type:'post',
            data:{
                'status':'getbranchwise',
                'branch_id':brans
            },
            success: function(data)
            {
                $('#ass_user').html(data);
            }
        });
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
			
			
			function selectedAssign()
			{
			       
			        var enq_ids="";
			        var items=document.getElementsByName('mark');
    				for(var i=0; i<items.length; i++){
    					if(items[i].type=='checkbox')
    					{
    					    if(items[i].checked)
    					    {
    					        if(enq_ids=="")
    					        {
    					            enq_ids =items[i].value;
    					        }
    					        else
    					        {
    					            enq_ids = enq_ids+","+items[i].value;
    					        }
    					    }
    					}
    						
    				}
    				
    				if(enq_ids!="")
    				{
    				    $('#myModal').modal("show");
    				    
                        $('#enqids').val(enq_ids);
    				    
    				}
    				else
    				{
    				    
    				    alert("Please Select Row");
    				}
			    
			}
					
		</script>
		
<script>

$(function () {
                $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss'
                });
            });
            
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss'
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
</body>
</html>
