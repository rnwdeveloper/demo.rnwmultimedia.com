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
<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
   @$branch_ids = explode(",",$_SESSION['branch_ids']);
   @$depart_ids = explode(",",$_SESSION['department_id']);
   
   if($_SESSION['logtype']=="Faculty")
   {
    //   echo $_SESSION['course_ids']; die();
       @$faculty_course_ids = explode(",",$_SESSION['course_ids']);
       @$faculty_package_ids = explode(",",$_SESSION['package_ids']);
   }
   ?>
<?php 
   $overdue=false;
   if($viewStatus=="as")    { $visible="all"; }
           if($viewStatus=="rd")  { $visible="0"; }
           if($viewStatus=="ord") {
               $visible="0";    
               $overdue = true;
               
           }
           if($viewStatus=="ld")  { $visible="2"; }
           if($viewStatus=="dd") { $visible="1"; }
           if($viewStatus=="cd")  { $visible="3"; } 
           if($viewStatus=="cfd")  { $visible="4"; } 
           
           
           
           
       date_default_timezone_set("Asia/Calcutta");
       
    for ($i = 1; $i <= 2; $i++) {
         $display_sdate= date('Y-m-d', strtotime("-$i month"));
       }
       $display_edate = date('Y-m-d');
         
          ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h4>
         <?php   if($viewStatus=="as")  { if(!empty($filter_demoDate_start) || !empty($filter_demoDate_end)) { echo @$filter_demoDate_start." To ".@$filter_demoDate_end; } else { echo $display_sdate." To ".$display_edate; } echo "  DEMO STUDENTS";  }
            if($viewStatus=="rd")  { echo "Running DEMO STUDENTS"; }
            if($viewStatus=="ord")  { echo "Overdue Running Demo"; }
            if($viewStatus=="ld")  { echo "Leave DEMO STUDENTS"; }
            if($viewStatus=="cfd")  { echo "Confusion DEMO STUDENTS"; }
            if($viewStatus=="dd")  {  if(!empty($filter_demoDate_start) || !empty($filter_demoDate_end)) { echo @$filter_demoDate_start." To ".@$filter_demoDate_end; } else { echo $display_sdate." To ".$display_edate; } echo " Done DEMO STUDENTS";  }
            if($viewStatus=="cd")  {  if(!empty($filter_demoDate_start) || !empty($filter_demoDate_end)) { echo @$filter_demoDate_start." To ".@$filter_demoDate_end; } else { echo $display_sdate." To ".$display_edate; } echo " Cancel DEMO STUDENTS"; } ?>
      </h4>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">
            <?php   
               if($viewStatus=="as")  { echo " ALL DEMO STUDENTS";  }
               if($viewStatus=="rd")  { echo "Running DEMO STUDENTS"; }
               if($viewStatus=="ord")  { echo "Overdue Running Demo"; }
               if($viewStatus=="ld")  { echo "Leave DEMO STUDENTS"; }
               if($viewStatus=="dd")  { echo "Done DEMO STUDENTS";  }
               if($viewStatus=="cd")  { echo "Cancel DEMO STUDENTS"; } 
               if($viewStatus=="cfd")  { echo "Confusion DEMO STUDENTS"; } ?>
         </li>
      </ol>
   </section>
   <!-- Main content -->
   <?php if($_SESSION['logtype']=="Super Admin") { ?> 
   <div style="margin-left: 33px;">
      <a href="<?php echo base_url() ?>welcome/viewDemo/as" class="btn btn-info">AllStudent</a>
      <a href="<?php echo base_url() ?>welcome/viewDemo/rd" class="btn btn-success">RunningDemo</a>
      <a href="<?php echo base_url() ?>welcome/viewDemo/ord" class="btn btn-info">OverdueRunningDemo</a>
      <a href="<?php echo base_url() ?>welcome/viewDemo/cfd" class="btn btn-primary">ConfusionDemo</a>
      <a href="<?php echo base_url() ?>welcome/viewDemo/ld" class="btn btn-warning">LeaveDemo</a>
      <a href="<?php echo base_url() ?>welcome/viewDemo/dd" class="btn btn-success">DoneDemo</a>
      <a href="<?php echo base_url() ?>welcome/viewDemo/cd" class="btn btn-danger">CancelDemo</a>
   </div>
   <?php } ?>
   <section class="content">
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
               <h3 class="box-title">Filter</h3>
            </div>
            <form method="post" action="<?php echo base_url(); ?>welcome/viewDemo/<?php echo $viewStatus; ?>">
               <div class="row">
                  <div class="col-md-3">
                     <select  class="form-control" name="filter_branch"  >
                        <option value="">Select Branch</option>
                        <?php foreach($branch_all as $row) { 
                           if($row->branch_status=="0") {
                           if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?> ?>
                        <option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                        <?php  } } } ?>
                     </select>
                  </div>
                  <div class="col-md-3">
                     <select  class="form-control" name="filter_department" >
                        <option value=""> Department</option>
                        <?php foreach($department_all as $val) { 
                           if(in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {?>
                        <option  <?php if(@$filter_department==$val->department_id) { echo "selected"; } ?>    value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
                        <?php } } ?>
                     </select>
                  </div>
                  <div class="col-md-3">
                     <select  class="form-control" name="filter_faculty"  >
                        <option value="">Select Faculty</option>
                        <?php foreach($faculty_all as $row) {   
                           @$bids = explode(",",@$row->branch_ids);
                           $bname="";
                           for($i=0;$i<sizeof(@$bids);$i++)
                           {
                              foreach($branch_all as $val) {   
                                  if($val->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$val->branch_name;}else { $bname = $bname." & ".$val->branch_name; } }
                              }
                           }
                           ?>
                        <option <?php if(@$filter_faculty==$row->faculty_id) { echo "selected"; } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>
                        <?php  } ?> 
                     </select>
                  </div>
                  <div class="col-md-3">
                     <select  class="form-control" name="filter_course" >
                        <option value="">Select Course</option>
                        <?php foreach($course_all as $row) {  ?>
                        <option <?php if(@$filter_course == $row->course_name) { echo "selected"; }  ?> value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="row" style="margin-top:10px;">
                  <?php if($viewStatus=="as") { ?>
                  <div class="col-md-3">
                     <select  class="form-control" name="filter_demoStatus"  >
                        <option value="">Demo Status</option>
                        <option <?php if(@$filter_demoStatus=="0") { echo "selected"; } ?> value="0">Running</option>
                        <option <?php if(@$filter_demoStatus=="1") { echo "selected"; } ?> value="1">Done</option>
                        <option <?php if(@$filter_demoStatus=="2") { echo "selected"; } ?> value="2">Leave</option>
                        <option <?php if(@$filter_demoStatus=="3") { echo "selected"; } ?> value="3">Cancel</option>
                     </select>
                  </div>
                  <?php } ?>
                  <div class="col-md-3">
                     <input type="text"  class="form-control datepicker" value="<?php if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start; } ?>"  id="" name="filter_demoDate_start" placeholder="Staring Date" >
                  </div>
                  <div class="col-md-3">
                     <input type="text"  class="form-control datepicker" value="<?php if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } ?>"  id="" name="filter_demoDate_end" placeholder="End Date" >
                  </div>
                  <div class="col-md-3">
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_demoName)) { echo $filter_demoName; } ?>"   name="filter_demoName" placeholder="Student Name" >
                  </div>
               </div>
               <div class="row" style="margin-top:10px;">
                  <div class="col-md-3">
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_demoId)) { echo $filter_demoId; } ?>"   name="filter_demoId" placeholder="Demo ID">
                  </div>
                  <div class="col-md-3">
                     <input type="text"  class="form-control" value="<?php if(!empty($filter_phoneNo)) { echo $filter_phoneNo; } ?>"   name="filter_phoneNo" placeholder="Phone No">
                  </div>
                  <?php if($viewStatus=="cd") { ?>
                  <div class="col-md-3">
                     <select  class="form-control" name="filter_cancel_reason"  >
                        <option value="">Cancel Reason</option>
                        <?php foreach($reason_list as $val1) { ?>   
                        <option <?php if(@$filter_cancel_reason == $val1->reasonName) { echo "selected"; }  ?> value="<?php echo $val1->reasonName; ?>"><?php echo $val1->reasonName; ?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <?php } ?>
                  <div class="col-md-2">
                     <input type="submit" value="Filter" class="btn btn-success" name="search"/>
                  </div>
                  <div class="col-md-2">
                     <a  href="<?php echo base_url(); ?>welcome/viewDemo/<?php echo $viewStatus; ?>" class="btn btn-primary" style="color:#FFF">Reset</a>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <?php if(!empty($msg)) { ?>
      <div class="col-md-12" >
         <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $msg; ?></div>
      </div>
      <?php } ?>
      <?php if(!empty($sts_msg)) { ?>
      <div class="col-md-12" >
         <div id="yellow1" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $sts_msg; ?></div>
      </div>
      <?php } ?>
      <div class="col-md-12" >
         <!-- general form elements -->
         <div class="box box-success" >
            <div class="box-header with-border">
               <div class="pull-right">
                  <form method="post" action="<?php echo base_url(); ?>welcome/demo_download/<?php echo $viewStatus; ?>">
                     <div style="display: none">
                        <div class="row">
                           <div class="col-md-3">
                              <select  class="form-control" name="filter_branch"  >
                                 <option value="">Select Branch</option>
                                 <?php foreach($branch_all as $row) { 
                                    if($row->branch_status=="0") {
                                    if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?> ?>
                                 <option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                                 <?php  } } } ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <select  class="form-control" name="filter_department" >
                                 <option value=""> Department</option>
                                 <?php foreach($department_all as $val) { 
                                    if(in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {?>
                                 <option  <?php if(@$filter_department==$val->department_id) { echo "selected"; } ?>    value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
                                 <?php } } ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <select  class="form-control" name="filter_faculty"  >
                                 <option value="">Select Faculty</option>
                                 <?php foreach($faculty_all as $row) {   
                                    @$bids = explode(",",@$row->branch_ids);
                                    $bname="";
                                    for($i=0;$i<sizeof(@$bids);$i++)
                                    {
                                       foreach($branch_all as $val) {   
                                           if($val->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$val->branch_name;}else { $bname = $bname." & ".$val->branch_name; } }
                                       }
                                    }
                                    ?>
                                 <option <?php if(@$filter_faculty==$row->faculty_id) { echo "selected"; } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>
                                 <?php  } ?> 
                              </select>
                           </div>
                           <div class="col-md-3">
                              <select  class="form-control" name="filter_course" >
                                 <option value="">Select Course</option>
                                 <?php foreach($course_all as $row) {  ?>
                                 <option <?php if(@$filter_course == $row->course_name) { echo "selected"; }  ?> value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                           <?php if($viewStatus=="as") { ?>
                           <div class="col-md-3">
                              <select  class="form-control" name="filter_demoStatus"  >
                                 <option value="">Demo Status</option>
                                 <option <?php if(@$filter_demoStatus=="0") { echo "selected"; } ?> value="0">Running</option>
                                 <option <?php if(@$filter_demoStatus=="1") { echo "selected"; } ?> value="1">Done</option>
                                 <option <?php if(@$filter_demoStatus=="2") { echo "selected"; } ?> value="2">Leave</option>
                                 <option <?php if(@$filter_demoStatus=="3") { echo "selected"; } ?> value="3">Cancel</option>
                                 <option <?php if(@$filter_demoStatus=="4") { echo "selected"; } ?> value="3">Confusion</option>
                              </select>
                           </div>
                           <?php } ?>
                           <div class="col-md-3">
                              <input type="text"  class="form-control datepicker" value="<?php if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start; } ?>"  id="" name="filter_demoDate_start" placeholder="Staring Date" >
                           </div>
                           <div class="col-md-3">
                              <input type="text"  class="form-control datepicker" value="<?php if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } ?>"  id="" name="filter_demoDate_end" placeholder="End Date" >
                           </div>
                           <div class="col-md-3">
                              <input type="text"  class="form-control" value="<?php if(!empty($filter_demoName)) { echo $filter_demoName; } ?>"   name="filter_demoName" placeholder="Student Name" >
                           </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                           <div class="col-md-3">
                              <input type="text"  class="form-control" value="<?php if(!empty($filter_demoId)) { echo $filter_demoId; } ?>"   name="filter_demoId" placeholder="Demo ID">
                           </div>
                           <?php if($viewStatus=="cd") { ?>
                           <div class="col-md-3">
                              <select  class="form-control" name="filter_cancel_reason"  >
                                 <option value="">Cancel Reason</option>
                                 <?php foreach($reason_list as $val1) { ?>   
                                 <option <?php if(@$filter_cancel_reason == $val1->reasonName) { echo "selected"; }  ?> value="<?php echo $val1->reasonName; ?>"><?php echo $val1->reasonName; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <?php } ?>
                           <div class="col-md-2">
                           </div>
                           <div class="col-md-2">
                              <a  href="<?php echo base_url(); ?>welcome/viewDemo/<?php echo $viewStatus; ?>" class="btn btn-primary" style="color:#FFF">Reset</a>
                           </div>
                        </div>
                     </div>
                     <input type="submit" value="Download CSV" class="btn btn-sm btn-success" name="search"/>
                  </form>
               </div>
               <?php if($_SESSION['logtype']!="Faculty") { ?>
               <a href="<?php echo base_url(); ?>Enquiry/demo_discard_list" class="btn pull-right btn-info btn-sm" >Discard List</a>
               <?php } ?>
               <h3 class="box-title">Display <?php   if($viewStatus=="as")  {  if(!empty($filter_demoDate_start) || !empty($filter_demoDate_end)) { echo @$filter_demoDate_start." To ".@$filter_demoDate_end; } else { echo $display_sdate." To ".$display_edate; } echo " ALL DEMO STUDENTS";  }
                  if($viewStatus=="rd")  {  echo "Running DEMO STUDENTS"; }
                  if($viewStatus=="ord")  { echo "Overdue Running Demo"; }
                  if($viewStatus=="ld")  { echo "Leave DEMO STUDENTS"; }
                    if($viewStatus=="cfd")  { echo "Confusion DEMO STUDENTS"; }
                  if($viewStatus=="dd")  {  if(!empty($filter_demoDate_start) || !empty($filter_demoDate_end)) { echo @$filter_demoDate_start." To ".@$filter_demoDate_end; } else { echo $display_sdate." To ".$display_edate; } echo " Done DEMO STUDENTS";  }
                  if($viewStatus=="cd")  {  if(!empty($filter_demoDate_start) || !empty($filter_demoDate_end)) { echo @$filter_demoDate_start." To ".@$filter_demoDate_end; } else { echo $display_sdate." To ".$display_edate; } echo " Cancel DEMO STUDENTS"; } ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
               <table  class="table table-responsive table-bordered table-striped example1">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Demo Id</th>
                        <th>Demo Details</th>
                        <th>Demo Date / Time</th>
                        <th>Course</th>
                        <th>Branch Details</th>
                        <th>Faculty</th>
                        <th> Remarks</th>
                        <?php if($_SESSION['logtype']=="Super Admin" || in_array("Take Attendance=1",$user_permission)) {  ?>
                        <th>Status</th>
                        <?php } ?>
                        <th>action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no=1; foreach($demo_all as $val) {  if($val->discard=="0") {
                        if(in_array($val->branch_id,$branch_ids) && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
                            if($visible=="all" || $visible==$val->demoStatus) {
                            
                            $isRelavent = false;    
                            if($_SESSION['logtype']=="Faculty")
                            {
                                if($val->course_type=="single")
                                {
                                   
                                    if(in_array($val->courseName,$faculty_course_ids)) { $isRelavent=true;   }
                               
                                }
                                if($val->course_type=="package")
                                {
                                    if(in_array($val->packageName,$faculty_package_ids)) { $isRelavent=true;   }
                                }
                                if(in_array($val->startingCourse,$faculty_course_ids)) 
                                { 
                                    $isRelavent=true;   
                                    
                                }
                                
                            }
                            
                            if($isRelavent==true || $_SESSION['logtype']!="Faculty") {
                                
                                $day=0;
                        $all_att = explode("&&",$val->attendance);
                        
                        for($i=0;$i<sizeof($all_att);$i++)
                        {
                        $att = explode("/",$all_att[$i]);
                        
                        if(@$att[1]=="P")
                        {
                        $day++;	
                        }
                        }
                                
                                
                                
                            if($overdue==false || $day>=5) {
                        ?>
                     <tr style=" <?php if($val->demoStatus=="0") { ?> background-color:#4c87c7; <?php  }
                        if($val->demoStatus=="1") { ?> background-color:#5cb85c;  <?php  } 
                        if($val->demoStatus=="2") { ?> background-color:#f0ad4e;  <?php  } 
                        if($val->demoStatus=="3") { ?> background-color:#d9534f;  <?php  }
                        if($val->demoStatus=="4") { ?> background-color:#504c87c7;  <?php  } ?>  color:#FFF;">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $val->demo_id; ?></td>
                        <td><?php echo $val->name;  ?> <br> <?php  echo "Mobile : ".$val->mobileNo; ?> 	<br>
                           <?php  $day=0;
                              $all_att = explode("&&",$val->attendance);
                              
                              for($i=0;$i<sizeof($all_att);$i++)
                              {
                              	$att = explode("/",$all_att[$i]);
                              	if(@$att[1]=="P")
                              	{
                              		$day++;	
                              	}
                              }
                              if($val->attendance=="") { $day=0; } 
                              if($day>0) { echo "Total Attendance : ".$day;  } ?>  
                           <?php if($val->demoStatus==2) 
                              {  
                                  if(!empty($val->leaveDate)) {
                                  $leave = explode("to",$val->leaveDate); 
                                  $fromd = explode("-",@$leave[0]);
                                  $tod = explode("-",@$leave[1]);
                                  echo "<br>Leave From :".@$fromd[2]."-".@$fromd[1]." To ".@$tod[2]."-".@$tod[1]; 
                                 
                              } } ?> 
                           <a href="<?php echo base_url(); ?>Enquiry/demoView/<?php echo $val->demo_id; ?>" class="btn btn-info btn-xs " >Attendance & follow up</a>
                        </td>
                        <td><?php echo $val->demoDate;  ?> <br> <?php echo $val->fromTime;  ?> To <?php echo $val->toTime;  ?> </td>
                        <td><?php if($val->course_type=="package") { echo $val->packageName." >> <br>"; } ?><?php echo $val->courseName;  ?> </td>
                        <td><?php  foreach($branch_all as $row) {  if($val->branch_id==$row->branch_id) {
                           echo $row->branch_name;  } } ?>
                           <br> <?php foreach($department_all as $row) { if($val->department_id==$row->department_id) {  echo $row->department_name;  } } ?> 
                           <br> <?php echo $val->addDate;  ?>
                           <br> Added By - <?php echo $val->addBy;  ?> 
                        </td>
                        <td><?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?> </td>
                        <td><?php echo $val->remarks;  ?> </td>
                        </td>
                        <?php if($_SESSION['logtype']=="Super Admin" || in_array("Take Attendance=1",$user_permission)) {  ?>
                        <td>
                           <form method="post" action="<?php echo base_url(); ?>welcome/changeDemoStatus">
                              <input type="hidden" value="<?php echo $val->demo_id; ?>" name="demo_id">
                              <input type="hidden" value="<?php echo $viewStatus; ?>" name="vs">
                              <select style=" <?php if($val->demoStatus=="0") { ?> background-color:#4c87c7; <?php  }
                                 if($val->demoStatus=="1") { ?> background-color:#5cb85c;  <?php  } 
                                 if($val->demoStatus=="2") { ?> background-color:#f0ad4e;  <?php  } 
                                 if($val->demoStatus=="3") { ?> background-color:#d9534f;  <?php  }
                                 if($val->demoStatus=="4") { ?> background-color:#504c87c7; <?php } ?>  color:#FFF;" name="demoStatus" onChange="changeStatus(<?php echo $val->demo_id; ?>)" id="dstatus<?php echo $val->demo_id; ?>">
                                 <option <?php if(@$val->demoStatus=="0") { echo "selected"; } ?> value="0">Running</option>
                                 <option <?php if(@$val->demoStatus=="1") { echo "selected"; } ?> value="1">Done</option>
                                 <option <?php if(@$val->demoStatus=="2") { echo "selected"; } ?> value="2">Leave</option>
                                 <option <?php if(@$val->demoStatus=="3") { echo "selected"; } ?> value="3">Cancel</option>
                                 <option <?php if(@$val->demoStatus=="4") { echo "selected"; } ?> value="4">Confusion</option>
                              </select>
                              <div class="modal fade" id="myModal_cancel2<?php echo $val->demo_id; ?>" role="dialog">
                                 <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title" style="color:#000">Are you Sure</h4>
                                       </div>
                                       <div class="modal-body" style="color:#000;">
                                          <select class="form-control"  id="reasontype2<?php echo $val->demo_id; ?>" style="width:100%; color:#000"  name="cancel_reason">
                                             <option value="">Select Reason</option>
                                             <?php foreach($reason_list as $val1) { ?>   
                                             <option value="<?php echo $val1->reasonName; ?>"><?php echo $val1->reasonName; ?></option>
                                             <?php } ?>
                                          </select>
                                          <input type="text" class="form-control" style="width:100%; color:#000" id="reason2<?php echo $val->demo_id; ?>"  name="reason" placeholder="Enter Reason" >
                                          <div style="display:none; margin-Top:20px;" id="leavedate2<?php echo $val->demo_id; ?>">
                                             <div class="form-group">
                                                <label for="email">From :</label>
                                                <input type="text" id="leavefrom2<?php echo $val->demo_id; ?>" class="form-control datepicker" value="<?php echo date("Y-m-d"); ?>" id="" name="leave_from_date"  >
                                             </div>
                                             <div class="form-group">
                                                <label for="email">Will come :</label>
                                                <input type="text" id="leaveto2<?php echo $val->demo_id; ?>" class="form-control datepicker" id="" name="leave_to_date" placeholder="select date" >
                                             </div>
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                                          <input type="submit" name="change_status" value="OK" class="btn btn-sm btn-success pull-right">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </td>
                        <?php } ?>
                        <td>
                           <div class="dropdown">
                              <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Action
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                 <li ><a href="<?php echo base_url(); ?>Enquiry/demoView/<?php echo $val->demo_id; ?>">View</a></li>
                              </ul>
                           </div>
                        </td>
                     </tr>
                     <?php $no++; } } } } }  } ?>
                     </tfoot>
               </table>
            </div>
            <div class="col-md-2" >Row Color:</div>
            <div class="col-md-2  text-white" style="background-color:#4c87c7;">Running</div>
            <div class="col-md-2  text-white" style="background-color:#504c87c7;">Confusion</div>
            <div class="col-md-2  text-white" style="background-color:#5cb85c;">Done </div>
            <div class="col-md-2  text-white" style="background-color:#f0ad4e;">Leave</div>
            <div class="col-md-2  text-white" style="background-color:#d9534f;">Cancel</div>
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
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
   }
   
   if (document.getElementById("yellow1") != null) {
    setTimeout(function() {
      document.getElementById('yellow1').style.display = 'none';
    }, 5000);
   }
</script>
<script>
   function changeStatus(demo_id)
   {
       var status;
   		status = $('#dstatus'+demo_id).val();
   		$('#myModal_cancel2'+demo_id).modal("show");
   
       if(status==0)
          {
              $('#reasontype2'+demo_id).hide();
              $('#reason2'+demo_id).hide();
              
              document.getElementById("reason2"+demo_id).required= false;
              document.getElementById("reasontype2"+demo_id).required= false;
              document.getElementById("leavefrom2"+demo_id).required= false;
              document.getElementById("leaveto2"+demo_id).required= false;
             
          }
          
          if(status==1)
          {
              
              
              $('#reason2'+demo_id).hide();
              $('#reasontype2'+demo_id).hide();
              document.getElementById("reason2"+demo_id).required= false;
               document.getElementById("reasontype2"+demo_id).required= false;
              document.getElementById("leavefrom2"+demo_id).required= false;
              document.getElementById("leaveto2"+demo_id).required= false;
             
          }
         
          if(status==2)
          {
              
            
             
              $('#leavedate2'+demo_id).show();
              $('#reason2'+demo_id).show();
              $('#reasontype2'+demo_id).hide();
              document.getElementById("reason2"+demo_id).required= true;
               document.getElementById("reasontype2"+demo_id).required= false;
              document.getElementById("leavefrom2"+demo_id).required= true;
              document.getElementById("leaveto2"+demo_id).required= true;
             
          }
          if(status==3)
          {
              
          
            $('#leavedate2'+demo_id).hide();
            $('#reason2'+demo_id).show();
            $('#reasontype2'+demo_id).show();
            document.getElementById("reason2"+demo_id).required= true;
             document.getElementById("reasontype2"+demo_id).required= true;
            document.getElementById("leavefrom2"+demo_id).required= false;
              document.getElementById("leaveto2"+demo_id).required= false;
          }
          if(status==4)
          {
              
            
             
              $('#leavedate2'+demo_id).show();
              $('#reason2'+demo_id).show();
              $('#reasontype2'+demo_id).hide();
              document.getElementById("reason2"+demo_id).required= true;
               document.getElementById("reasontype2"+demo_id).required= false;
              document.getElementById("leavefrom2"+demo_id).required= true;
              document.getElementById("leaveto2"+demo_id).required= true;
             
          }
   
       
       
       
       
       
   
   }
</script>
<script>
   $('.datepicker').datepicker({
         autoclose: true,
   	  todayHighlight: true,
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
</body>
</html>