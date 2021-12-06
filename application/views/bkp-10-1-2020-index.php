
  <?php if(!empty($msg))  { ?>
 <script>  alert("This Date Attendance already marked"); </script>
 <?php } ?>

 <?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);
        
        if($_SESSION['logtype']=="Faculty")
        {
            @$faculty_course_ids = explode(",",$_SESSION['course_ids']);
            @$faculty_package_ids = explode(",",$_SESSION['package_ids']);
        }
        
     $ttll = 0;   
     $ttpp=0;
     $ttaa=0;
     $ttpend = 0;   
     foreach($demo_all as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {
         			    
         if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
             
             	    $date = date("Y-m-d");
				
					$all_att = explode("&&",$val->attendance);
					$ttll++;
					for($i=0;$i<sizeof($all_att);$i++)
					{
						$att = explode("/",$all_att[$i]);
						if($date==$att[0])
						{
						    if($att[1]=="P")
						    {
							    $ttpp++;
						    }
						    else if($att[1]=="A")
						    {
						        $ttaa++;
						        
						    }
						}
						
					}
					
					if( strpos($val->attendance,$date) == false) {
                                            
                               $ttpend++;            
                    }
         			        
         }
     }
     }
     } 
        
        ?>
<?php date_default_timezone_set("Asia/Calcutta");  ?>

<style type="text/css">
    
    .char{
        float: left;
    }

   
</style>	
 
 <!-- Content Wrapper. Contains page content -->
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('visualization', "1", {
          packages: ['corechart']
      });
  </script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small >Control panel</small>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
      <?php $nos=0; foreach($upd_see as $val) { if($val->discard=="0") { if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Faculty") { $nos++; } } } ?> 
     <?php  if($nos!=0) {
     $dd = "";
      foreach($upd_see as $val) { if($val->discard=="0") { if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Faculty") { 
     
            $dd = $dd." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$val->name."( ".$val->courseName." ) , ";
      } } }
     ?>
      <div class="col-md-12" >
     	        
     	        <div  style="padding:2px 5px 2px 5px; font-size:20px; margin-top:5px;" class="box yellow bg-green">
     	            
     	             <marquee><?php echo "New Demo : ".$dd; ?> </marquee>
     	        </div>
     	</div>
     	<?php } ?>
    </section>

    <!-- Main content -->
    <section class="content">
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('visualization', "1", {
          packages: ['corechart']
      });
  </script>
    
    <!-- <?php echo "test" ?> -->
<?php if(@$_SESSION['logtype']=="Super Admin" ) { ?>
    <div class="row">
    <div class="char">
    <div class="col-md-6" style="position: relative;">
  
    <div id="year_pie" style="width: 600px; height: 300px; margin: 0 auto">
    
    </div>
    <div > <span id="tota_d" style="position:absolute;top:255px;left:30px;font-size:20px; ">Total Demo :</span><span style="position:absolute;top:255px;
    left:140px;font-size:20px;" id="total_demo"></span></div><br>
    <div class="mbarchar">
    <div id="columnchart_material" style="height: 300px; position: relative; margin-top:-318px; margin-left:670px; "></div>
</div>

        <!-- <div class="panel-body">
                <div id="chart_area" style="width: 1000px; height: 620px;"></div>
            </div> -->
  </div> 
</div>
</div>
<?php } ?>

    <div class="row">
    	<div class="col-md-12">
          <!-- general form elements -->
          <div class="box" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
             <form method="post" action="<?php echo base_url(); ?>welcome">
                    <div class="row">
                	<div class="col-md-2">
               
						 <select  class="form-control select2" name="filter_branch"  >
                        	<option value="">Select Branch</option>
                            <?php foreach($branch_all as $row) {
                            if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?>
                                
							<option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                      
                     	<?php   } } ?>
                        </select>
						
               		 </div>
               		
                	<div class="col-md-2">
						 <select  class="form-control select2" name="filter_department"  >
                        	<option value=""> Department</option>
                            <?php foreach($department_all as $val) {
                            if(in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") { ?>
                            	<option  <?php if(@$filter_department==$val->department_id) { echo "selected"; } ?>    value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
                            <?php } } ?>
                        </select>
					</div>	
                    <div class="col-md-4">
						 <select  class="form-control select2" name="filter_faculty"  >
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
                   
                	<div class="col-md-2">
               
						 <select  class="form-control select2	" name="filter_course"  >
                        	<option value="">Select Course</option>
                           <?php foreach($course_all as $row) {  ?>
                      <option <?php if(@$filter_course == $row->course_name) { echo "selected"; }  ?> value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>
                            <?php } ?>
                        </select>
						
                 	</div>
                 	<div class="col-md-2">
               
						 <input type="text"  class="form-control" value="<?php if(!empty($filter_demoName)) { echo $filter_demoName; } ?>"  id="" name="filter_demoName" placeholder="Student Name" >
						
                 	</div>
                 	</div>
                 	<div class="row">
                 	<div class="col-md-2" style="margin-top:15px;">
               
						 <input type="text"  class="form-control" value="<?php if(!empty($filter_demoId)) { echo $filter_demoId; } ?>"  id="" name="filter_demoId" placeholder="Demo ID " >
						
                 	</div>

                    <div class="col-md-2" style="margin-top:15px;">
               
                         <input type="text"  class="form-control" value="<?php if(!empty($filter_phoneNo)) { echo $filter_phoneNo; } ?>"  id="" name="filter_phoneNo" placeholder="Filter Phone No" >
                        
                    </div>
                 	
                 	<div class="col-md-6" style="margin-top:15px;">
               
						  
						  <div class="form-inline">
                           <input type="text"  class="form-control datepicker1 input100" value="<?php if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start; } ?>"  id="" name="filter_demoDate_start" placeholder="Start Date" >
						   <input type="text"  class="form-control datepicker1 input100" value="<?php if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } ?>"  id="" name="filter_demoDate_end" placeholder="End Date" >
                          </div>
                 	</div>
                 	
                 	<div class="col-md-2" style="margin-top:15px;">
            	
                
						<div class="col-sm-6">
                        <input type="submit" value="Filter" class="btn btn-default pull-right" name="search"/>
                        </div>
                        <div class="col-sm-6">
                        <a  href="<?php echo base_url(); ?>welcome" class="btn btn-default" >Reset</a>
                        </div>
					</div>
					</div>

			</form>
            </div>
           </div>
        
        </div>
    </div>
    
     	<div class="row" style="background-color:#FFF;">
        
        	<?php if(!empty($sts_msg)) { ?>
     	    <div class="col-md-12" >
     	        
     	        <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $sts_msg; ?></div>
     	    </div>
     	    <?php } ?>
        	<div class="col-md-12">
                 
                  
                  <div class="box box-default collapsed-box box-solid">
                    <div class="box-header with-border">
                        <?php date_default_timezone_set("Asia/Calcutta");
                    $time = time();
                    $current_hour =  date('H', $time); 
                    $current_hour = $current_hour-1;
                    if($current_hour==7) { $sdt = 7; $edt = 8; }
                    if($current_hour==8) { $sdt = 8; $edt = 9;  }
                    if($current_hour==9) { $sdt = 9;  $edt = 10; }
                    if($current_hour==10) { $sdt = 10;  $edt =11; }
                    if($current_hour==11) { $sdt =11;  $edt = 12; }
                    if($current_hour==12) { $sdt = 12;  $edt = 1; }
                    if($current_hour==13) { $sdt = 1; $edt = 2;  }
                    if($current_hour==14) { $sdt = 2;  $edt = 3; }
                    if($current_hour==15) { $sdt = 3; $edt = 4;  }
                    if($current_hour==16) { $sdt = 4;  $edt = 5; }
                    if($current_hour==17) { $sdt = 5;  $edt = 6; }
                    if($current_hour==18) { $sdt = 6; $edt = 7;  }
                    if($current_hour==19) { $sdt = 7;  $edt = 8; }
                    if($current_hour==20) { $sdt = 8; $edt = 9;  }
                    if($current_hour==21) { $sdt = 9;  $edt = 10; }?>
                      <h3 class="box-title"><?php if(!empty($sdt)) { echo $sdt." To ".$edt." Timing Demo Students";    } ?></h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                        	<?php foreach($demo_all as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {
         			    
         			    if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
         			        
         			        $isRelavent = false;    
                             if($_SESSION['logtype']=="Faculty")
                             {
                                 if($val->course_type=="Single Course")
                                 {
                                    
                                     if(in_array($val->courseName,$faculty_course_ids)) { $isRelavent=true;   }
                                 }
                                 if($val->course_type=="Package")
                                 {
                                     if(in_array($val->packageName,$faculty_package_ids)) { $isRelavent=true;   }
                                 }
                                  if(in_array($val->startingCourse,$faculty_course_ids)) 
                         { 
                             $isRelavent=true;   
                             
                         }
                                 
                             }
                             
                             if($isRelavent==true || $_SESSION['logtype']!="Faculty") {
         			        
         			        
         			        $dtime = explode(":",$val->fromTime);
                        if($dtime[0]==8)   {   $hour = 8;  }
                        if($dtime[0]==9)   {   $hour = 9;  }
                        if($dtime[0]==10)   {   $hour = 10;  }
                         if($dtime[0]==11)   {   $hour = 11;  }
                           if($dtime[0]==12)   {   $hour = 12;  }
                            if($dtime[0]==1)   {   $hour = 13;  }
                             if($dtime[0]==2)   {   $hour = 14;  }
                              if($dtime[0]==3)   {   $hour = 15;  }
                               if($dtime[0]==4)   {  $hour = 16;  }
                                if($dtime[0]==5)   {   $hour = 17;  }
                                 if($dtime[0]==6)   {   $hour = 18;  }
                                  if($dtime[0]==7)   {   $hour = 19;  }
                       
                        if($current_hour==$hour) {
                        
					
					
					$date = date("Y-m-d");
					$flag=0;
					$day=0;
					$all_att = explode("&&",$val->attendance);
					
					for($i=0;$i<sizeof($all_att);$i++)
					{
						$att = explode("/",$all_att[$i]);
						if($date==$att[0])
						{
						    if($att[1]=="P")
						    {
							    $flag = 1;
						    }
						    else if($att[1]=="A")
						    {
						        $flag = 2;
						        
						    }
						}
						if(@$att[1]=="P")
						{
							$day++;	
						}
					}
					
					if($val->attendance=="") { $day=0; }
					
					if($flag==0) {
					
					 ?>
			    		 
                <div class="col-md-12">
                        
                      <div class="info-box <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>">
                        
            
                        <div style="padding-top:5px;">
                            
                            <div class="col-md-12">
                                        <div class="col-md-3">
                                         <span class="info-box-number" style="text-transform:uppercase;" title="Mobile No : <?php echo $val->mobileNo; ?>"><?php echo $val->name; ?> (<?php echo $val->demo_id; ?>)</span>
                                         
                                         <span class="info-box-text" style="text-transform:capitalize;"  ><?php if($val->course_type=="Package") { echo $val->packageName; } else { echo $val->courseName; } ?></span>
                                        
                                       
                    
                                        </div>
                                        <form method="post" action="<?php echo base_url(); ?>welcome">
                                        
                                         <div class="col-md-3">
                                         		<select class="<?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" onchange="return getReson2(<?php  echo $val->demo_id; ?>)" id="demoStatus2<?php  echo $val->demo_id; ?>" name="demoStatus" style="border:none">
                                                	<option  value="0">Running</option>                            
                                                    <option  value="1">Done</option>
                                                    <option  value="2">Leave</option>
                                                    <option  value="3">Cancel</option>
                                                    <option  value="4">Confusion</option>
                                                </select>
                                                <?php $stdate = explode("-",$val->demoDate); ?>
                                                <span class="info-box-text" style="text-transform:capitalize; font-style:italic;"> Start Date : <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?> </span>
                                        </div>
                                        <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
                                        <div class="col-md-2">
                                         		<label class="radio-inline">
                                                  <input type="radio" checked id="radioP2" name="att" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'P')" value="P">P
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="att" id="radioA2" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'A')" value="A">A
                                                </label>
                                        </div>
                                        <div class="col-md-2">
                                            
                                         		<input type="text" value="<?php echo date("Y-m-d"); ?>"  class="form-control datepicker <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" 	 placeholder="Select Date" name="attDate" style="border:none; color:#FFF;" >
                                               
                                                
                                        </div>
                                        <?php } ?> 
                                        <div class="modal fade" id="myModal_cancel2<?php echo $val->demo_id; ?>" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:#000">Reason</h4>
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
                      <input type="text" id="leavefrom2<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" value="<?php echo date("Y-m-d"); ?>" id="" name="leave_from_date"  >
                    </div>
                    <div class="form-group">
                      <label for="email">Will come :</label>
                      <input type="text" id="leaveto2<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" id="" name="leave_to_date" placeholder="select date" >
                    </div>
                
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="take_attendance" value="Submit" class="btn btn-sm btn-default pull-right">
            </div>
          </div>
        </div>
      </div>
                                        
                                        
                                        <div class="col-md-1">
                                         		<input type="hidden" name="demo_id" value="<?php  echo $val->demo_id; ?>">
                                         		<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
                                         		 <button type="button" style="display:none;" id="modal_button2<?php  echo $val->demo_id; ?>"  class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#myModal_cancel2<?php echo $val->demo_id; ?>">Submit</button>
                                                <input type="submit" id="formsubmit2<?php  echo $val->demo_id; ?>" name="take_attendance" value="Submit" class="btn btn-sm btn-default pull-right">
                                                <?php } ?>
                                        </div>
                                        </form>
                                        
                                        <div class="col-md-1">
                                           
                                          	<a href="<?php echo base_url(); ?>Enquiry/demoView/<?php echo $val->demo_id; ?>" class="btn btn-xs btn-default pull-right"><i class="fa fa-eye"></i></a>
                                           
                                        </div>
                                       
                                        
                             	</div>
                            <div class="col-md-12">
                                          <div class="progress" style="height:3px;">
                                            <div class="progress-bar <?php if($day>5) { ?>  <?php } ?>" style="width:<?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>; "></div>
                                          </div>
                                </div>
                            <div class="col-md-12">
                                          <div class="col-md-2">
                                              <span class="progress-description">
                                                    <?php if(!empty($val->attendance)) {  echo $day;  ?> Days  <?php } ?>
                                              </span>
                                          </div>
                                          <div class="col-md-3">
                                          <?php if(!empty($val->attendance)) { ?>
                                          		
                                                <button type="button" class="btn  btn-xs <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" data-toggle="modal" data-target="#myModal2<?php echo $val->demo_id; ?>">Attendance & follow up</button>
                                                <div class="modal fade " id="myModal2<?php echo $val->demo_id; ?>" role="dialog" style="color:#000">
                                                    <div class="modal-dialog modal-lg">
                                                    
                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title"><?php echo $val->name;  ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Attendance Details</h4>
                                                            <div class="table-responsive">          
                                                              <table class="table">
                                                                <thead>
                                                                  <tr>
                                                                    
                                                                    <th>Date</th>
                                                                    <th>Attendance</th>
                                                                    <th>Mark by</th>
                                                                    <th>Time</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                 <?php for($i=0;$i<sizeof($all_att);$i++)
    									                        {
    														        @$att = explode("/",@$all_att[$i]);
    														    ?>   
                                                                  <tr>
                                                                    <td><?php echo @$att[0]; ?></td>
                                                                    <td><?php echo @$att[1]; ?></td>
                                                                    <td><?php echo @$att[2] ?></td>
                                                                    <td><?php echo @$att[3] ?></td>
                                                                   
                                                                  </tr>
                                                                  <?php } ?>
                                                                </tbody>
                                                              </table>
                                                              </div>
                                                              
                                                              <h4>follow up Details</h4>
                                                            <div class="table-responsive">          
                                                              <table class="table">
                                                                <thead>
                                                                  <tr>
                                                                    
                                                                    <th>Date</th>
                                                                    <th>follow up</th>
                                                                    <th>by</th>
                                                                    <th>Time</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                 <?php
                                                                 @$all_re = explode("&&",$val->reason);
                                                                 for($i=0;$i<sizeof(@$all_re);$i++)
    									                        {
    														        @$res = explode("|/|",@$all_re[$i]);
    														    ?>   
                                                                  <tr>
                                                                    <td><?php echo @$res[0]; ?></td>
                                                                    <td><?php echo @$res[1]; ?></td>
                                                                    <td><?php echo @$res[2] ?></td>
                                                                    <td><?php echo @$res[3] ?></td>
                                                                   
                                                                  </tr>
                                                                  <?php } ?>
                                                                </tbody>
                                                              </table>
                                                              </div>
                                                              <h4>Remarks : </h4>
                                                              <p><?php echo $val->remarks; ?></p>
                                                         
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                
                                                <?php } else { ?>  <span style="background-color:#06C; padding:0 2px 0 2px;"> <?php echo "New Demo Student"; ?> </span> <?php } ?>
                                          </div>
                                          <div class="col-md-3">
                                          		<span class="info-box-text" style="text-transform:capitalize; font-style:italic;"> Time : <?php echo $val->fromTime; ?> To <?php echo $val->toTime; ?> </span>
                                          </div>
                                          <div class="col-md-4">
                                          		<span class="info-box-text" style="text-transform:capitalize; font-style:italic;">Assign To : <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?></span>
                                          </div>
                                  </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                      
                      
                      </div>
                      <!-- /.info-box -->
                    </div>
                     
                    
                     
        
                    
                    <?php } } } } } } } ?>
                       
                    </div>
                    <!-- /.box-body -->
                  </div> 
                  <div class="box box-default collapsed-box box-solid">
                    <div class="box-header with-border">
                        <?php date_default_timezone_set("Asia/Calcutta");
                    $time = time();
                    $current_hour =  date('H', $time); 
                    if($current_hour==7) { $sdt = 7; $edt = 8; }
                    if($current_hour==8) { $sdt = 8; $edt = 9;  }
                    if($current_hour==9) { $sdt = 9;  $edt = 10; }
                    if($current_hour==10) { $sdt = 10;  $edt =11; }
                    if($current_hour==11) { $sdt =11;  $edt = 12; }
                    if($current_hour==12) { $sdt = 12;  $edt = 1; }
                    if($current_hour==13) { $sdt = 1; $edt = 2;  }
                    if($current_hour==14) { $sdt = 2;  $edt = 3; }
                    if($current_hour==15) { $sdt = 3; $edt = 4;  }
                    if($current_hour==16) { $sdt = 4;  $edt = 5; }
                    if($current_hour==17) { $sdt = 5;  $edt = 6; }
                    if($current_hour==18) { $sdt = 6; $edt = 7;  }
                    if($current_hour==19) { $sdt = 7;  $edt = 8; }
                    if($current_hour==20) { $sdt = 8; $edt = 9;  }
                    if($current_hour==21) { $sdt = 9;  $edt = 10; }?>
                      <h3 class="box-title"><?php if(!empty($sdt)) { echo $sdt." To ".$edt." Timing Demo Students";    } ?></h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                        	<?php foreach($demo_all as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {
         			    
         			    if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
         			        
         			        $isRelavent = false;    
                             if($_SESSION['logtype']=="Faculty")
                             {
                                 if($val->course_type=="Single Course")
                                 {
                                    
                                     if(in_array($val->courseName,$faculty_course_ids)) { $isRelavent=true;   }
                                 }
                                 if($val->course_type=="Package")
                                 {
                                     if(in_array($val->packageName,$faculty_package_ids)) { $isRelavent=true;   }
                                 }
                                  if(in_array($val->startingCourse,$faculty_course_ids)) 
                         { 
                             $isRelavent=true;   
                             
                         }
                                 
                             }
                             
                             if($isRelavent==true || $_SESSION['logtype']!="Faculty") {
         			        
         			        
         			        $dtime = explode(":",$val->fromTime);
                        if($dtime[0]==8)   {   $hour = 8;  }
                        if($dtime[0]==9)   {   $hour = 9;  }
                        if($dtime[0]==10)   {   $hour = 10;  }
                         if($dtime[0]==11)   {   $hour = 11;  }
                           if($dtime[0]==12)   {   $hour = 12;  }
                            if($dtime[0]==1)   {   $hour = 13;  }
                             if($dtime[0]==2)   {   $hour = 14;  }
                              if($dtime[0]==3)   {   $hour = 15;  }
                               if($dtime[0]==4)   {  $hour = 16;  }
                                if($dtime[0]==5)   {   $hour = 17;  }
                                 if($dtime[0]==6)   {   $hour = 18;  }
                                  if($dtime[0]==7)   {   $hour = 19;  }
                       
                        if($current_hour==$hour) {
                        
					
					
					$date = date("Y-m-d");
					$flag=0;
					$day=0;
					$all_att = explode("&&",$val->attendance);
					
					for($i=0;$i<sizeof($all_att);$i++)
					{
						$att = explode("/",$all_att[$i]);
						if($date==$att[0])
						{
						    if($att[1]=="P")
						    {
							    $flag = 1;
						    }
						    else if($att[1]=="A")
						    {
						        $flag = 2;
						        
						    }
						}
						if(@$att[1]=="P")
						{
							$day++;	
						}
					}
					
					if($val->attendance=="") { $day=0; }
					
					if($flag==0) {
					
					 ?>
			    		 
                <div class="col-md-12">
                        
                      <div class="info-box <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>">
                        
            
                        <div style="padding-top:5px;">
                            
                            <div class="col-md-12">
                                        <div class="col-md-3">
                                         <span class="info-box-number" style="text-transform:uppercase;" title="Mobile No : <?php echo $val->mobileNo; ?>"><?php echo $val->name; ?> (<?php echo $val->demo_id; ?>)</span>
                                         
                                         <span class="info-box-text" style="text-transform:capitalize;"  ><?php if($val->course_type=="Package") { echo $val->packageName; } else { echo $val->courseName; } ?></span>
                                        
                                       
                    
                                        </div>
                                        <form method="post" action="<?php echo base_url(); ?>welcome">
                                        
                                         <div class="col-md-3">
                                         		<select class="<?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" onchange="return getReson2(<?php  echo $val->demo_id; ?>)" id="demoStatus2<?php  echo $val->demo_id; ?>" name="demoStatus" style="border:none">
                                                	<option  value="0">Running</option>                            
                                                    <option  value="1">Done</option>
                                                    <option  value="2">Leave</option>
                                                    <option  value="3">Cancel</option>
                                                    <option  value="4">Confusion</option>
                                                </select>
                                                <?php $stdate = explode("-",$val->demoDate); ?>
                                                <span class="info-box-text" style="text-transform:capitalize; font-style:italic;"> Start Date : <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?> </span>
                                        </div>
                                        <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
                                        <div class="col-md-2">
                                         		<label class="radio-inline">
                                                  <input type="radio" checked id="radioP2" name="att" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'P')" value="P">P
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="att" id="radioA2" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'A')" value="A">A
                                                </label>
                                        </div>
                                        <div class="col-md-2">
                                            
                                         		<input type="text" value="<?php echo date("Y-m-d"); ?>"  class="form-control datepicker <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" 	 placeholder="Select Date" name="attDate" style="border:none; color:#FFF;" >
                                               
                                                
                                        </div>
                                        <?php } ?> 
                                        <div class="modal fade" id="myModal_cancel2<?php echo $val->demo_id; ?>" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:#000">Reason</h4>
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
                      <input type="text" id="leavefrom2<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" value="<?php echo date("Y-m-d"); ?>" id="" name="leave_from_date"  >
                    </div>
                    <div class="form-group">
                      <label for="email">Will come :</label>
                      <input type="text" id="leaveto2<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" id="" name="leave_to_date" placeholder="select date" >
                    </div>
                
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="take_attendance" value="Submit" class="btn btn-sm btn-default pull-right">
            </div>
          </div>
        </div>
      </div>
                                        
                                        
                                        <div class="col-md-1">
                                         		<input type="hidden" name="demo_id" value="<?php  echo $val->demo_id; ?>">
                                         		<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
                                         		 <button type="button" style="display:none;" id="modal_button2<?php  echo $val->demo_id; ?>"  class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#myModal_cancel2<?php echo $val->demo_id; ?>">Submit</button>
                                                <input type="submit" id="formsubmit2<?php  echo $val->demo_id; ?>" name="take_attendance" value="Submit" class="btn btn-sm btn-default pull-right">
                                                <?php } ?>
                                        </div>
                                        </form>
                                      
                                        <div class="col-md-1">
                                           	<a href="<?php echo base_url(); ?>Enquiry/demoView/<?php echo $val->demo_id; ?>" class="btn btn-xs btn-default pull-right"><i class="fa fa-eye"></i></a>
                                        </div>
                                        
                                        
                             	</div>
                            <div class="col-md-12">
                                          <div class="progress" style="height:3px;">
                                            <div class="progress-bar <?php if($day>5) { ?>  <?php } ?>" style="width:<?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>; "></div>
                                          </div>
                                </div>
                            <div class="col-md-12">
                                          <div class="col-md-2">
                                              <span class="progress-description">
                                                    <?php if(!empty($val->attendance)) {  echo $day;  ?> Days  <?php } ?>
                                              </span>
                                          </div>
                                          <div class="col-md-3">
                                          <?php if(!empty($val->attendance)) { ?>
                                          		
                                                <button type="button" class="btn  btn-xs <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" data-toggle="modal" data-target="#myModal2<?php echo $val->demo_id; ?>">Attendance & follow up</button>
                                                <div class="modal fade" id="myModal2<?php echo $val->demo_id; ?>" role="dialog" style="color:#000">
                                                    <div class="modal-dialog modal-lg">
                                                    
                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title"><?php echo $val->name;  ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Attendance Details</h4>
                                                            <div class="table-responsive">          
                                                              <table class="table">
                                                                <thead>
                                                                  <tr>
                                                                    
                                                                    <th>Date</th>
                                                                    <th>Attendance</th>
                                                                    <th>Mark by</th>
                                                                    <th>Time</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                 <?php for($i=0;$i<sizeof($all_att);$i++)
    									                        {
    														        @$att = explode("/",@$all_att[$i]);
    														    ?>   
                                                                  <tr>
                                                                    <td><?php echo @$att[0]; ?></td>
                                                                    <td><?php echo @$att[1]; ?></td>
                                                                    <td><?php echo @$att[2] ?></td>
                                                                    <td><?php echo @$att[3] ?></td>
                                                                   
                                                                  </tr>
                                                                  <?php } ?>
                                                                </tbody>
                                                              </table>
                                                              </div>
                                                              
                                                              <h4>follow up Details</h4>
                                                            <div class="table-responsive">          
                                                              <table class="table">
                                                                <thead>
                                                                  <tr>
                                                                    
                                                                    <th>Date</th>
                                                                    <th>follow up</th>
                                                                    <th>by</th>
                                                                    <th>Time</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                 <?php
                                                                 @$all_re = explode("&&",$val->reason);
                                                                 for($i=0;$i<sizeof(@$all_re);$i++)
    									                        {
    														        @$res = explode("|/|",@$all_re[$i]);
    														    ?>   
                                                                  <tr>
                                                                    <td><?php echo @$res[0]; ?></td>
                                                                    <td><?php echo @$res[1]; ?></td>
                                                                    <td><?php echo @$res[2] ?></td>
                                                                    <td><?php echo @$res[3] ?></td>
                                                                   
                                                                  </tr>
                                                                  <?php } ?>
                                                                </tbody>
                                                              </table>
                                                              </div>
                                                              <h4>Remarks : </h4>
                                                              <p><?php echo $val->remarks; ?></p>
                                                         
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                
                                                <?php } else { ?>  <span style="background-color:#06C; padding:0 2px 0 2px;"> <?php echo "New Demo Student"; ?> </span> <?php } ?>
                                          </div>
                                          <div class="col-md-3">
                                          		<span class="info-box-text" style="text-transform:capitalize; font-style:italic;"> Time : <?php echo $val->fromTime; ?> To <?php echo $val->toTime; ?> </span>
                                          </div>
                                          <div class="col-md-4">
                                          		<span class="info-box-text" style="text-transform:capitalize; font-style:italic;">Assign To : <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?></span>
                                          </div>
                                  </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                      
                      
                      </div>
                      <!-- /.info-box -->
                    </div>
                     
                    
                     
        
                    
                    <?php } } } } } } } ?>
                       
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <div class="box box-default collapsed-box box-solid">
                    <div class="box-header with-border">
                        <?php date_default_timezone_set("Asia/Calcutta");
                    $time = time();
                    $current_hour =  date('H', $time); 
                    $current_hour = $current_hour+1;
                    if($current_hour==7) { $sdt = 7; $edt = 8; }
                    if($current_hour==8) { $sdt = 8; $edt = 9;  }
                    if($current_hour==9) { $sdt = 9;  $edt = 10; }
                    if($current_hour==10) { $sdt = 10;  $edt =11; }
                    if($current_hour==11) { $sdt =11;  $edt = 12; }
                    if($current_hour==12) { $sdt = 12;  $edt = 1; }
                    if($current_hour==13) { $sdt = 1; $edt = 2;  }
                    if($current_hour==14) { $sdt = 2;  $edt = 3; }
                    if($current_hour==15) { $sdt = 3; $edt = 4;  }
                    if($current_hour==16) { $sdt = 4;  $edt = 5; }
                    if($current_hour==17) { $sdt = 5;  $edt = 6; }
                    if($current_hour==18) { $sdt = 6; $edt = 7;  }
                    if($current_hour==19) { $sdt = 7;  $edt = 8; }
                    if($current_hour==20) { $sdt = 8; $edt = 9;  }
                    if($current_hour==21) { $sdt = 9;  $edt = 10; }?>
                      <h3 class="box-title"><?php if(!empty($sdt)) { echo $sdt." To ".$edt." Timing Demo Students";    } ?></h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                        	<?php foreach($demo_all as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {
         			    
         			    if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
         			        
         			        $isRelavent = false;    
                             if($_SESSION['logtype']=="Faculty")
                             {
                                 if($val->course_type=="Single Course")
                                 {
                                    
                                     if(in_array($val->courseName,$faculty_course_ids)) { $isRelavent=true;   }
                                 }
                                 if($val->course_type=="Package")
                                 {
                                     if(in_array($val->packageName,$faculty_package_ids)) { $isRelavent=true;   }
                                 }
                                  if(in_array($val->startingCourse,$faculty_course_ids)) 
                                 { 
                                     $isRelavent=true;   
                                     
                                 }
                                 
                             }
                             
                             if($isRelavent==true || $_SESSION['logtype']!="Faculty") {
         			        
         			        
         			        $dtime = explode(":",$val->fromTime);
                        if($dtime[0]==8)   {   $hour = 8;  }
                        if($dtime[0]==9)   {   $hour = 9;  }
                        if($dtime[0]==10)   {   $hour = 10;  }
                         if($dtime[0]==11)   {   $hour = 11;  }
                           if($dtime[0]==12)   {   $hour = 12;  }
                            if($dtime[0]==1)   {   $hour = 13;  }
                             if($dtime[0]==2)   {   $hour = 14;  }
                              if($dtime[0]==3)   {   $hour = 15;  }
                               if($dtime[0]==4)   {  $hour = 16;  }
                                if($dtime[0]==5)   {   $hour = 17;  }
                                 if($dtime[0]==6)   {   $hour = 18;  }
                                  if($dtime[0]==7)   {   $hour = 19;  }
                       
                        if($current_hour==$hour) {
                        
					
					
					$date = date("Y-m-d");
					$flag=0;
					$day=0;
					$all_att = explode("&&",$val->attendance);
					
					for($i=0;$i<sizeof($all_att);$i++)
					{
						$att = explode("/",$all_att[$i]);
						if($date==$att[0])
						{
						    if($att[1]=="P")
						    {
							    $flag = 1;
						    }
						    else if($att[1]=="A")
						    {
						        $flag = 2;
						        
						    }
						}
						if(@$att[1]=="P")
						{
							$day++;	
						}
					}
					
					if($val->attendance=="") { $day=0; }
					
					if($flag==0) {
					
					 ?>
			    		 
                <div class="col-md-12">
                        
                      <div class="info-box <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>">
                        
            
                        <div style="padding-top:5px;">
                            
                            <div class="col-md-12">
                                        <div class="col-md-3">
                                         <span class="info-box-number" style="text-transform:uppercase;" title="Mobile No : <?php echo $val->mobileNo; ?>"><?php echo $val->name; ?> (<?php echo $val->demo_id; ?>)</span>
                                         
                                         <span class="info-box-text" style="text-transform:capitalize;"  ><?php if($val->course_type=="Package") { echo $val->packageName; } else { echo $val->courseName; } ?></span>
                                        
                                       
                    
                                        </div>
                                        <form method="post" action="<?php echo base_url(); ?>welcome">
                                        
                                         <div class="col-md-3">
                                         		<select class="<?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" onchange="return getReson2(<?php  echo $val->demo_id; ?>)" id="demoStatus2<?php  echo $val->demo_id; ?>" name="demoStatus" style="border:none">
                                                	<option  value="0">Running</option>                            
                                                    <option  value="1">Done</option>
                                                    <option  value="2">Leave</option>
                                                    <option  value="3">Cancel</option>
                                                    <option  value="4">Confusion</option>
                                                </select>
                                                 <?php $stdate = explode("-",$val->demoDate); ?>
                                                <span class="info-box-text" style="text-transform:capitalize; font-style:italic;"> Start Date : <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?> </span>
                                        </div>
                                        <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
                                        <div class="col-md-2">
                                         		<label class="radio-inline">
                                                  <input type="radio" checked id="radioP2" name="att" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'P')" value="P">P
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="att" id="radioA2" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'A')" value="A">A
                                                </label>
                                        </div>
                                        <div class="col-md-2">
                                            
                                         		<input type="text" value="<?php echo date("Y-m-d"); ?>"  class="form-control datepicker <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" 	 placeholder="Select Date" name="attDate" style="border:none; color:#FFF;" >
                                               
                                                
                                        </div>
                                        <?php } ?> 
                                        <div class="modal fade" id="myModal_cancel2<?php echo $val->demo_id; ?>" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:#000">Reason</h4>
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
                      <input type="text" id="leavefrom2<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" value="<?php echo date("Y-m-d"); ?>" id="" name="leave_from_date"  >
                    </div>
                    <div class="form-group">
                      <label for="email">Will come :</label>
                      <input type="text" id="leaveto2<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" id="" name="leave_to_date" placeholder="select date" >
                    </div>
                
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="take_attendance" value="Submit" class="btn btn-sm btn-default pull-right">
            </div>
          </div>
        </div>
      </div>
                                        
                                        
                                        <div class="col-md-1">
                                         		<input type="hidden" name="demo_id" value="<?php  echo $val->demo_id; ?>">
                                         		<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
                                         		 <button type="button" style="display:none;" id="modal_button2<?php  echo $val->demo_id; ?>"  class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#myModal_cancel2<?php echo $val->demo_id; ?>">Submit</button>
                                                <input type="submit" id="formsubmit2<?php  echo $val->demo_id; ?>" name="take_attendance" value="Submit" class="btn btn-sm btn-default pull-right">
                                                <?php } ?>
                                        </div>
                                        </form>
                                        
                                        <div class="col-md-1">
                                            	<a href="<?php echo base_url(); ?>Enquiry/demoView/<?php echo $val->demo_id; ?>" class="btn btn-xs btn-default pull-right"><i class="fa fa-eye"></i></a>
                                        </div>
                                       
                                        
                             	</div>
                            <div class="col-md-12">
                                          <div class="progress" style="height:3px;">
                                            <div class="progress-bar <?php if($day>5) { ?>  <?php } ?>" style="width:<?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>; "></div>
                                          </div>
                                </div>
                            <div class="col-md-12">
                                          <div class="col-md-2">
                                              <span class="progress-description">
                                                    <?php if(!empty($val->attendance)) {  echo $day;  ?> Days  <?php } ?>
                                              </span>
                                          </div>
                                          <div class="col-md-3">
                                          <?php if(!empty($val->attendance)) { ?>
                                          		
                                                <button type="button" class="btn  btn-xs <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" data-toggle="modal" data-target="#myModal2<?php echo $val->demo_id; ?>">Attendance & follow up</button>
                                                <div class="modal fade" id="myModal2<?php echo $val->demo_id; ?>" role="dialog" style="color:#000">
                                                    <div class="modal-dialog">
                                                    
                                                      <!-- Modal content-->
                                                      <div class="modal-dialog modal-lg">
                                                    
                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title"><?php echo $val->name;  ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Attendance Details</h4>
                                                            <div class="table-responsive">          
                                                              <table class="table">
                                                                <thead>
                                                                  <tr>
                                                                    
                                                                    <th>Date</th>
                                                                    <th>Attendance</th>
                                                                    <th>Mark by</th>
                                                                    <th>Time</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                 <?php for($i=0;$i<sizeof($all_att);$i++)
    									                        {
    														        @$att = explode("/",@$all_att[$i]);
    														    ?>   
                                                                  <tr>
                                                                    <td><?php echo @$att[0]; ?></td>
                                                                    <td><?php echo @$att[1]; ?></td>
                                                                    <td><?php echo @$att[2] ?></td>
                                                                    <td><?php echo @$att[3] ?></td>
                                                                   
                                                                  </tr>
                                                                  <?php } ?>
                                                                </tbody>
                                                              </table>
                                                              </div>
                                                              
                                                              <h4>follow up Details</h4>
                                                            <div class="table-responsive">          
                                                              <table class="table">
                                                                <thead>
                                                                  <tr>
                                                                    
                                                                    <th>Date</th>
                                                                    <th>follow up</th>
                                                                    <th>by</th>
                                                                    <th>Time</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                 <?php
                                                                 @$all_re = explode("&&",$val->reason);
                                                                 for($i=0;$i<sizeof(@$all_re);$i++)
    									                        {
    														        @$res = explode("|/|",@$all_re[$i]);
    														    ?>   
                                                                  <tr>
                                                                    <td><?php echo @$res[0]; ?></td>
                                                                    <td><?php echo @$res[1]; ?></td>
                                                                    <td><?php echo @$res[2] ?></td>
                                                                    <td><?php echo @$res[3] ?></td>
                                                                   
                                                                  </tr>
                                                                  <?php } ?>
                                                                </tbody>
                                                              </table>
                                                              </div>
                                                              <h4>Remarks : </h4>
                                                              <p><?php echo $val->remarks; ?></p>
                                                         
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>
                                                      
                                                    </div>
                                                      
                                                    </div>
                                                  </div>
                                                
                                                <?php } else { ?>  <span style="background-color:#06C; padding:0 2px 0 2px;"> <?php echo "New Demo Student"; ?> </span> <?php } ?>
                                          </div>
                                          <div class="col-md-3">
                                          		<span class="info-box-text" style="text-transform:capitalize; font-style:italic;"> Time : <?php echo $val->fromTime; ?> To <?php echo $val->toTime; ?> </span>
                                          </div>
                                          <div class="col-md-4">
                                          		<span class="info-box-text" style="text-transform:capitalize; font-style:italic;">Assign To : <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?></span>
                                          </div>
                                  </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                      
                      
                      </div>
                      <!-- /.info-box -->
                    </div>
                     
                    
                     
        
                    
                    <?php } } } } } } } ?>
                       
                    </div>
                    <!-- /.box-body -->
                  </div> 
                  
                  
                  
                  
                  <!-- /.box -->
            </div>
        	<div class="col-md-12">
         
         		 <div class="box box-primary" style="margin-bottom:10px;">
                    <div class="box-header with-border">
                      <h3 class="box-title">Take Demo Attendance &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; <?php if($_SESSION['logtype']!="Faculty") { echo "Total Demo : ".$ttll." &nbsp;&nbsp; P : ".$ttpp." &nbsp;&nbsp; A : ".$ttaa." &nbsp;&nbsp; Pending Attendance : ".$ttpend;  } ?></h3>
                    </div>
                </div>
         			<?php foreach($demo_all as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {
         			    
         			    if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
         			        
         			        
         			        
         			        $isRelavent = false;    
                             if($_SESSION['logtype']=="Faculty")
                             {
                                 if($val->course_type=="Single Course")
                                 {
                                    
                                     if(in_array($val->courseName,$faculty_course_ids)) { $isRelavent=true;   }
                                 }
                                 if($val->course_type=="Package")
                                 {
                                     if(in_array($val->packageName,$faculty_package_ids)) { $isRelavent=true;   }
                                 }
                                  if(in_array($val->startingCourse,$faculty_course_ids)) 
                                 { 
                                     $isRelavent=true;   
                                     
                                 }
                                 
                             }
                             
                             if($isRelavent==true || $_SESSION['logtype']!="Faculty") {
					
					
            					$date = date("Y-m-d");
            					$flag=0;
            					$day=0;
            					$all_att = explode("&&",$val->attendance);
            					
            					for($i=0;$i<sizeof($all_att);$i++)
            					{
            						$att = explode("/",$all_att[$i]);
            						if($date==$att[0])
            						{
            						    if($att[1]=="P")
            						    {
            							    $flag = 1;
            						    }
            						    else if($att[1]=="A")
            						    {
            						        $flag = 2;
            						        
            						    }
            						}
            						if(@$att[1]=="P")
            						{
            							$day++;	
            						}
            					}
            					
            					if($val->attendance=="") { $day=0; }
					
					
					
					 ?>
			    		 
                <div class="col-md-12">
                        
                      <div class="info-box <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>">
                        
            
                        <div style="padding-top:5px;">
                            
                            <div class="col-md-12">
                                        <div class="col-md-4">
                                         <span class="info-box-number" style="text-transform:uppercase;" title="Mobile No : <?php echo $val->mobileNo; ?>"><?php echo $val->name; ?> (<?php echo $val->demo_id; ?>)</span>
                                         
                                         <span class="info-box-text" style="text-transform:capitalize;"  ><?php if($val->course_type=="Package") { echo $val->packageName; } else { echo $val->courseName; } ?></span>
                                        
                                       
                    
                                        </div>
                                        <form method="post" action="<?php echo base_url(); ?>welcome">
                                        
                                         <div class="col-md-2">
                                         		<select class="<?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" onchange="return getReson(<?php  echo $val->demo_id; ?>)" id="demoStatus<?php  echo $val->demo_id; ?>" name="demoStatus" style="border:none">
                                                	<option  value="0">Running</option>                            
                                                    <option  value="1">Done</option>
                                                    <option  value="2">Leave</option>
                                                    <option  value="3">Cancel</option>
                                                    <option  value="4">Confusion</option>
                                                </select>
                                                <?php $stdate = explode("-",$val->demoDate); ?>
                                                <span class="info-box-text" style="text-transform:capitalize; font-style:italic;"> Start Date : <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?> </span>
                                        </div>
                                        <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
                                        <div class="col-md-2">
                                         		<label class="radio-inline">
                                                  <input type="radio" checked id="radioP" name="att" onclick="whichSelect(<?php  echo $val->demo_id; ?>,'P')" value="P">P
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="att" id="radioA" onclick="whichSelect(<?php  echo $val->demo_id; ?>,'A')" value="A">A
                                                </label>
                                        </div>
                                        <div class="col-md-2">
                                            
                                         		<input type="text" value="<?php echo date("Y-m-d"); ?>"  class="form-control datepicker <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" 	 placeholder="Select Date" name="attDate" style="border:none; color:#FFF;" >
                                               
                                                
                                        </div>
                                        <?php } ?> 
                                        <div class="modal fade" id="myModal_cancel<?php echo $val->demo_id; ?>" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:#000">Reason</h4>
            </div>
            <div class="modal-body" style="color:#000;">
               
                <select class="form-control"  id="reasontype<?php echo $val->demo_id; ?>" style="width:100%; color:#000"  name="cancel_reason">
                    <option value="">Select Reason</option>
                 <?php foreach($reason_list as $val1) { ?>   
                    <option value="<?php echo $val1->reasonName; ?>"><?php echo $val1->reasonName; ?></option>
                    <?php } ?>
                    
                </select>
                <input type="text" class="form-control" style="width:100%; color:#000" id="reason<?php echo $val->demo_id; ?>"  name="reason" placeholder="Enter Reason" >
                
                <div style="display:none; margin-Top:20px;" id="leavedate<?php echo $val->demo_id; ?>">
                    <div class="form-group">
                      <label for="email">From :</label>
                      <input type="text" id="leavefrom<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" value="<?php echo date("Y-m-d"); ?>" id="" name="leave_from_date"  >
                    </div>
                    <div class="form-group">
                      <label for="email">Will come :</label>
                      <input type="text" id="leaveto<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" id="" name="leave_to_date" placeholder="select date" >
                    </div>
                
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="take_attendance" value="Submit" class="btn btn-sm btn-default pull-right">
            </div>
          </div>
        </div>
      </div>
                                        
                                        
                                        <div class="col-md-1">
                                         		<input type="hidden" name="demo_id" value="<?php  echo $val->demo_id; ?>">
                                         		<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
                                         		 <button type="button" style="display:none;" id="modal_button<?php  echo $val->demo_id; ?>"  class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#myModal_cancel<?php echo $val->demo_id; ?>">Submit</button>
                                                <input type="submit" id="formsubmit<?php  echo $val->demo_id; ?>" name="take_attendance" value="Submit" class="btn btn-sm btn-default pull-right">
                                                <?php } ?>
                                        </div>
                                        </form>
                                       
                                        <div class="col-md-1">
                                            	<a href="<?php echo base_url(); ?>Enquiry/demoView/<?php echo $val->demo_id; ?>" class="btn btn-xs btn-default pull-right"><i class="fa fa-eye"></i></a>
                                        </div>
                                       
                                        
                             	</div>
                            <div class="col-md-12">
                                          <div class="progress" style="height:3px;">
                                            <div class="progress-bar <?php if($day>5) { ?>  <?php } ?>" style="width:<?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>; "></div>
                                          </div>
                                </div>
                            <div class="col-md-12">
                                          <div class="col-md-2">
                                              <span class="progress-description">
                                                    <?php if(!empty($val->attendance)) {  echo $day;  ?> Days  <?php } ?>
                                              </span>
                                          </div>
                                          <div class="col-md-3">
                                          <?php if(!empty($val->attendance)) { ?>
                                          		
                                                <button type="button" class="btn  btn-xs <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" data-toggle="modal" data-target="#myModal<?php echo $val->demo_id; ?>">Attendance & follow up</button>
                                                <div class="modal fade" id="myModal<?php echo $val->demo_id; ?>" role="dialog" style="color:#000">
                                                    <div class="modal-dialog">
                                                    
                                                      <!-- Modal content-->
                                                     <div class="modal-dialog modal-lg">
                                                    
                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title"><?php echo $val->name;  ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Attendance Details</h4>
                                                            <div class="table-responsive">          
                                                              <table class="table">
                                                                <thead>
                                                                  <tr>
                                                                    
                                                                    <th>Date</th>
                                                                    <th>Attendance</th>
                                                                    <th>Mark by</th>
                                                                    <th>Time</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                 <?php for($i=0;$i<sizeof($all_att);$i++)
    									                        {
    														        @$att = explode("/",@$all_att[$i]);
    														    ?>   
                                                                  <tr>
                                                                    <td><?php echo @$att[0]; ?></td>
                                                                    <td><?php echo @$att[1]; ?></td>
                                                                    <td><?php echo @$att[2] ?></td>
                                                                    <td><?php echo @$att[3] ?></td>
                                                                   
                                                                  </tr>
                                                                  <?php } ?>
                                                                </tbody>
                                                              </table>
                                                              </div>
                                                              
                                                              <h4>follow up Details</h4>
                                                            <div class="table-responsive">          
                                                              <table class="table">
                                                                <thead>
                                                                  <tr>
                                                                    
                                                                    <th>Date</th>
                                                                    <th>follow up</th>
                                                                    <th>by</th>
                                                                    <th>Time</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                 <?php
                                                                 @$all_re = explode("&&",$val->reason);
                                                                 for($i=0;$i<sizeof(@$all_re);$i++)
    									                        {
    														        @$res = explode("|/|",@$all_re[$i]);
    														    ?>   
                                                                  <tr>
                                                                    <td><?php echo @$res[0]; ?></td>
                                                                    <td><?php echo @$res[1]; ?></td>
                                                                    <td><?php echo @$res[2] ?></td>
                                                                    <td><?php echo @$res[3] ?></td>
                                                                   
                                                                  </tr>
                                                                  <?php } ?>
                                                                </tbody>
                                                              </table>
                                                              </div>
                                                              <h4>Remarks : </h4>
                                                              <p><?php echo $val->remarks; ?></p>
                                                         
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>
                                                      
                                                    </div>
                                                      
                                                    </div>
                                                  </div>
                                                
                                                <?php } else { ?>  <span style="background-color:#06C; padding:0 2px 0 2px;"> <?php echo "New Demo Student"; ?> </span> <?php } ?>
                                          </div>
                                          <div class="col-md-3">
                                          		<span class="info-box-text" style="text-transform:capitalize; font-style:italic;"> Time : <?php echo $val->fromTime; ?> To <?php echo $val->toTime; ?> </span>
                                          </div>
                                          <div class="col-md-4">
                                          		<span class="info-box-text" style="text-transform:capitalize; font-style:italic;">Assign To : <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?></span>
                                          </div>
                                  </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                      
                      
                      </div>
                      <!-- /.info-box -->
                    </div>
                     
                    
                     
        
                    
                    <?php } } } } } ?>
        	</div>
        	
        	
        </div>
        
        <div class="row" style="padding-left:30px; margin-top:20px;">
        	 <div class="col-md-2 bg-yellow text-white" >Attendance Pending</div>
            <div class="col-md-1 bg-green text-white">P</div>
            <div class="col-md-1 bg-red text-white">A</div>
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
<!-- Select2 -->
<script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>




<script>
    
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 3000);
  }
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

<script>
    function whichSelect(demo_id,a)
    {
        var status = $('#demoStatus'+demo_id).val();
        if(a=="A")
        {
            if(status==2 || status==4)
            {
                $('#modal_button'+demo_id).show();
                $('#leavedate'+demo_id).show();
                $('#formsubmit'+demo_id).hide();
                $('#reasontype'+demo_id).hide();
                document.getElementById("reasontype"+demo_id).required= false;
                document.getElementById("reason"+demo_id).required= true;
                document.getElementById("leavefrom"+demo_id).required= true;
                document.getElementById("leaveto"+demo_id).required= true;
            }
            else if(status==3)
            {
                $('#modal_button'+demo_id).show();
                $('#leavedate'+demo_id).hide();
                $('#formsubmit'+demo_id).hide();
                $('#reasontype'+demo_id).show();
                document.getElementById("reasontype"+demo_id).required= true;
                document.getElementById("reason"+demo_id).required= true;
                document.getElementById("leavefrom"+demo_id).required= false;
                document.getElementById("leaveto"+demo_id).required= false;
            }
            else
            {
                $('#reasontype'+demo_id).hide();
                $('#modal_button'+demo_id).show();
                $('#formsubmit'+demo_id).hide();
                $('#leavedate'+demo_id).hide();
                document.getElementById("reasontype"+demo_id).required= false;
                document.getElementById("reason"+demo_id).required= true;
                document.getElementById("leavefrom"+demo_id).required= false;
                document.getElementById("leaveto"+demo_id).required= false;
            }
            
        }
        if(a=="P")
        {
            $('#reasontype'+demo_id).hide();
            $('#modal_button'+demo_id).hide();
            $('#formsubmit'+demo_id).show();
            document.getElementById("reasontype"+demo_id).required= false;
            document.getElementById("reason"+demo_id).required= false;
            document.getElementById("leavefrom"+demo_id).required= false;
            document.getElementById("leaveto"+demo_id).required= false;
            
        } 
    }
</script>
<script>
    function getReson(demo_id)
    {
        var status = $('#demoStatus'+demo_id).val();
        
       if(status==0)
        {
            $('#reasontype'+demo_id).hide();
            $('#modal_button'+demo_id).hide();
            $('#formsubmit'+demo_id).show();
             document.getElementById("reasontype"+demo_id).required= false;
            document.getElementById("reason"+demo_id).required= false;
            document.getElementById("leavefrom"+demo_id).required= false;
            document.getElementById("leaveto"+demo_id).required= false;
           
        }
        
        if(status==1)
        {
            $('#reasontype'+demo_id).hide();
            $('#modal_button'+demo_id).hide();
            $('#formsubmit'+demo_id).show();
             document.getElementById("reasontype"+demo_id).required= false;
            document.getElementById("reason"+demo_id).required= false;
            document.getElementById("leavefrom"+demo_id).required= false;
            document.getElementById("leaveto"+demo_id).required= false;
           
        }
       
        if(status==2 || status==4)
        {
            $('#reasontype'+demo_id).hide();
            $('#modal_button'+demo_id).show();
            $('#leavedate'+demo_id).show();
            $('#formsubmit'+demo_id).hide();
             document.getElementById("reasontype"+demo_id).required= false;
            document.getElementById("reason"+demo_id).required= true;
            document.getElementById("leavefrom"+demo_id).required= true;
            document.getElementById("leaveto"+demo_id).required= true;
           
        }
        if(status==3)
        {
            $('#reasontype'+demo_id).show();
          $('#modal_button'+demo_id).show();
          $('#formsubmit'+demo_id).hide();
          $('#leavedate'+demo_id).hide();
           document.getElementById("reasontype"+demo_id).required= true;
          document.getElementById("reason"+demo_id).required= true;
          document.getElementById("leavefrom"+demo_id).required= false;
            document.getElementById("leaveto"+demo_id).required= false;
        }

        
        
    }
    
    
   
    
</script>



<script>
    function whichSelect2(demo_id,a)
    {
        var status2 = $('#demoStatus2'+demo_id).val();
        if(a=="A")
        {
            if(status2==2 || status2==4)
            {
                $('#modal_button2'+demo_id).show();
                $('#leavedate2'+demo_id).show();
                $('#formsubmit2'+demo_id).hide();
                 $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
                document.getElementById("reason2"+demo_id).required= true;
                document.getElementById("leavefrom2"+demo_id).required= true;
                document.getElementById("leaveto2"+demo_id).required= true;
            }
            else if(status2==3)
            {
                $('#modal_button2'+demo_id).show();
                $('#leavedate2'+demo_id).hide();
                $('#formsubmit2'+demo_id).hide();
                 $('#reasontype2'+demo_id).show();
                document.getElementById("reasontype2"+demo_id).required= true;
                document.getElementById("reason2"+demo_id).required= true;
                document.getElementById("leavefrom2"+demo_id).required= false;
                document.getElementById("leaveto2"+demo_id).required= false;
            }
            else
            {
                $('#modal_button2'+demo_id).show();
                $('#formsubmit2'+demo_id).hide();
                $('#leavedate2'+demo_id).hide();
                 $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
                document.getElementById("reason2"+demo_id).required= true;
                document.getElementById("leavefrom2"+demo_id).required= false;
                document.getElementById("leaveto2"+demo_id).required= false;
            }
            
        }
        if(a=="P")
        {
            $('#modal_button2'+demo_id).hide();
            $('#formsubmit2'+demo_id).show();
             $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
            document.getElementById("reason2"+demo_id).required= false;
            document.getElementById("leavefrom2"+demo_id).required= false;
            document.getElementById("leaveto2"+demo_id).required= false;
            
        } 
    }
</script>
<script>
    function getReson2(demo_id)
    {
        var status2 = $('#demoStatus2'+demo_id).val();
        
       if(status2==0)
        {
            $('#modal_button2'+demo_id).hide();
            $('#formsubmit2'+demo_id).show();
             $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
            document.getElementById("reason2"+demo_id).required= false;
            document.getElementById("leavefrom2"+demo_id).required= false;
            document.getElementById("leaveto2"+demo_id).required= false;
           
        }
        
        if(status2==1)
        {
            $('#modal_button2'+demo_id).hide();
            $('#formsubmit2'+demo_id).show();
             $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
            document.getElementById("reason2"+demo_id).required= false;
            document.getElementById("leavefrom2"+demo_id).required= false;
            document.getElementById("leaveto2"+demo_id).required= false;
           
        }
       
        if(status2==2 || status2==4)
        {
            $('#modal_button2'+demo_id).show();
            $('#leavedate2'+demo_id).show();
            $('#formsubmit2'+demo_id).hide();
             $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
            document.getElementById("reason2"+demo_id).required= true;
            document.getElementById("leavefrom2"+demo_id).required= true;
            document.getElementById("leaveto2"+demo_id).required= true;
           
        }
        if(status2==3)
        {
          $('#modal_button2'+demo_id).show();
          $('#formsubmit2'+demo_id).hide();
          $('#leavedate2'+demo_id).hide();
           $('#reasontype2'+demo_id).show();
                document.getElementById("reasontype2"+demo_id).required= true;
          document.getElementById("reason2"+demo_id).required= true;
          document.getElementById("leavefrom2"+demo_id).required= false;
            document.getElementById("leaveto2"+demo_id).required= false;
        }
        
    }
    
    
   
    
</script>





<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    var FromEndDate = new Date();
    
    $('.datepicker').datepicker({
      autoclose: true,
	   format:"yyyy-mm-dd",
	   todayHighlight: true,
	   
	   endDate: FromEndDate
	  
    })
    
    
    
    $('.datepicker1').datepicker({
      autoclose: true,
      todayHighlight: true,
	   format:"yyyy-mm-dd"
	  
	  
    })
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false,
	   defaultTime: false
    })
  })
</script>

<?php $total_student =  array('lkj'=>0,'Absent'=>$ttaa,'Leave'=>$ttpend,'Present'=>$ttpp); ?>
<script language="JavaScript">

    $("#total_demo").html(<?php echo $ttll?>);
  // Draw the pie chart for registered users month wise

 
  // Draw the pie chart for registered users year wise
  google.charts.setOnLoadCallback(yearWiseChart);
   
  //for month wise
 
  function yearWiseChart() {
 
    /* Define the chart to be drawn.*/
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Users Count'],
        <?php 
         foreach ($total_student as $k=>$row){
         echo "['".$k."',".$row."],";
         }
         ?>
    ]);
    var options = {
        title: 'Demo Ratio',
        is3D: true,
         backgroundColor: [
              "#DEB887",
              "#F4A460",
              "#A9A9A9",
              "#DC143C",
              
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
            ],
            borderColor: [
              "#CDA776",
              "#E39371",
              "#989898",
              "#CB252B",
              
              "#1D7A46",
              "#F4A460",
              "#CDA776",
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
            ],
    };
    /* Instantiate and draw the chart.*/
    var chart = new google.visualization.PieChart(document.getElementById('year_pie'));
    chart.draw(data, options);
  }
  // for year wise
  
</script>


<script type="text/javascript">

              
                  
    <?php 
        $ttt=2; $ddd=4; $lll=1;  $ccc=9; $rrr=0; $duration=1;
        
    ?>

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['        ', 'Total Demo',  'Leave Demo','pending Demo','Done Demo'],
         
          ['<?php echo $duration; ?>', <?php echo $ttll; ?>, <?php echo $ttaa; ?>, <?php echo $ttpend; ?>,<?php echo $ttpp; ?>,]
        ]);

        var options = {
          chart: {
            title: 'RNW <?php echo $duration; ?> Performance',
            subtitle: 'Total Demo, Done, Leave and Cancel: <?php echo $duration; ?>',

          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


</body>


</html>

