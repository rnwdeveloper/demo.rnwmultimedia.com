
<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?>
<?php 
$total_running=0;  $total_done=0;  $total_leave=0;   $total_cancel=0;
if(!empty($filter)) {
foreach($demo_all as $val) 
{
    if($val->discard=="0") {
            if(in_array($val->branch_id,$branch_ids) && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
                
               if($val->demoStatus=="0")
               {
                   $total_running++;
                   
               }
               else if($val->demoStatus=="1")
               {
                   $total_done++;
                   
               }
               else if($val->demoStatus=="2")
               {
                   $total_leave++;
                   
               }
               else if($val->demoStatus=="3")
               {
                   $total_cancel++;
                   
               }
                
            }
     }
}
}
?>

<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>RNW</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assetslogin/images/rnw2.png"/>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>



  

<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
</head>
<body>
    
<div>
    <div class="row">
    	<div class="col-md-12">
          <!-- general form elements -->
          <div class="panel panel-primary">
      <div class="panel-heading">Filter Report
      <a href="<?php echo base_url(); ?>welcome" class="btn btn-sm btn-default pull-right">Home</a></div>
      <div class="panel-body">
             <form method="post" action="<?php echo base_url(); ?>welcome/demoReport">
                    
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
               
						 <select  class="form-control" name="filter_course"  >
                        	<option value="">Select Course</option>
                           <?php foreach($course_all as $row) {  ?>
                      <option <?php if(@$filter_course == $row->course_name) { echo "selected"; }  ?> value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>
                            <?php } ?>
                        </select>
						
                 	</div>
                 	<div class="col-md-2">
               
						 <select  class="form-control" name="filter_demoStatus" >
                        	<option value="">Demo Status</option>
                           	<option <?php if(@$filter_demoStatus=="0") { echo "selected"; } ?> value="0">Running</option>
                            <option <?php if(@$filter_demoStatus=="1") { echo "selected"; } ?> value="1">Done</option>
                            <option <?php if(@$filter_demoStatus=="2") { echo "selected"; } ?> value="2">Leave</option>
                            <option <?php if(@$filter_demoStatus=="3") { echo "selected"; } ?> value="3">Cancel</option>
                        </select>
						
                 	</div>
                 	
                 	<div class="col-md-6" style="margin-top:15px;">
               
						  
						  <div class="form-inline">
                           <input type="text"  class="form-control datepicker1 input100" value="<?php if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start; } ?>"  id="" name="filter_demoDate_start" placeholder="Start Date" >
						   <input type="text"  class="form-control datepicker1 input100" value="<?php if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } ?>"  id="" name="filter_demoDate_end" placeholder="End Date" >
                          </div>
                 	</div>
                 	
                 	<div class="col-md-6" style="margin-top:15px;">
            	
                
						<div class="col-sm-6">
                        <input type="submit" value="Filter" class="btn btn-default pull-right" name="search"/>
                        </div>
                        <div class="col-sm-6">
                        <a  href="<?php echo base_url(); ?>welcome/demoReport" class="btn btn-default" >Reset</a>
                        </div>
					</div>

			</form>
           
        </div>
        </div>
        </div>
    </div>
    <?php if(!empty($filter)) { ?>
    <div id="html-content-holder">  
    
        <div class="panel panel-success">
          <div class="panel-heading">Report Details</div>
          <div class="panel-body">
            <?php  if(!empty($filter_branch)) { ?>
              <span>Branch : 
              <?php foreach($branch_all as $row) {
                    	if(@$filter_branch==$row->branch_id) {
                    	    echo $row->branch_name;                   
                      } } ?></span> <?php } ?>
                      
            
            <?php  if(!empty($filter_department)) { ?>
              <span style="margin-left:30px;">Department : 
                <?php foreach($department_all as $val) 
                {
                            
                            	 if(@$filter_department==$val->department_id) 
                            	 {    echo $val->department_name; }  
                                
                             
                } ?>
                </span> 
            <?php } ?>
            
            <?php  if(!empty($filter_faculty)) { ?>
              <span style="margin-left:30px;">Faculty : 
                <?php foreach($faculty_all as $val) 
                {
                            
                            	if(@$filter_faculty==$val->faculty_id)
                            	{ echo $val->name; }
                                
                             
                } ?>
                </span> 
            <?php } ?>
            
            
             <?php  if(!empty($filter_course)) { ?>
              <span style="margin-left:30px;">Course : <?php echo $filter_course; ?>  </span> 
            <?php } ?>
            
            
              <span style="margin-left:30px;">
             <?php if(@$filter_demoStatus=="0") { echo "Demo Status  : Running"; } ?> 
             <?php if(@$filter_demoStatus=="1") { echo "Demo Status  : Done"; } ?> 
             <?php if(@$filter_demoStatus=="2") { echo "Demo Status  : Leave"; } ?> 
              <?php if(@$filter_demoStatus=="3") { echo "Demo Status  : Cancel"; } ?>
              </span> 
            <br>
            
           <?php if(!empty($filter_demoDate_start) || !empty($filter_demoDate_end)) { ?>
            <span>Date :
            <?php if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start." To "; } ?> 
            <?php if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } ?>
            </span>
            <?php } ?>
            <br>
            <table class="table table-bordered">
            <thead>
              <tr>
                <th>Demo Status</th>
                <th>Total Student</th>
                
              </tr>
            </thead>
            <tbody>
                <?php if($total_running!=0) { ?>
              <tr style="background-color:#4c87c7; color:#ffff;">
                <td>Running : </td>
                <td><?php echo $total_running; ?></td>
               
              </tr>
              <?php } ?>
              
              <?php if($total_done!=0) { ?>
              <tr style="background-color:#5cb85c; color:#ffff;">
                <td>Done : </td>
                <td><?php echo $total_done; ?></td>
                
              </tr>
              <?php } ?>
              
              <?php if($total_leave!=0) { ?>
              <tr style="background-color:#f0ad4e; color:#ffff;">
                <td>Leave  : </td>
                <td><?php echo $total_leave; ?></td>
                
              </tr>
              <?php } ?>
              
              <?php if($total_cancel!=0) { ?>
              <tr style="background-color:#d9534f; color:#ffff;">
                <td>Cancel : </td>
                <td><?php echo $total_cancel; ?></td>
                
              </tr>
              <?php } ?>
              
            </tbody>
          </table>
            
            
             
          </div>
        </div>
        
       
        <table style="margin-left:10px;"  class="table table-responsive table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Demo Id</th>
                  <th>Demo Details</th>
                   <th>Demo Date / Time</th>
                  <th>Course</th>
                  <th>Branch Details</th>
                  <th>Faculty</th>
                  <th>Follow Up</th>
                  <th> Remarks</th>
                  
                  
                  
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($demo_all as $val) {  if($val->discard=="0") {
                 if(in_array($val->branch_id,$branch_ids) && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
                ?>
                <tr style=" <?php if($val->demoStatus=="0") { ?> background-color:#4c87c7; <?php  }
				if($val->demoStatus=="1") { ?> background-color:#5cb85c;  <?php  } 
				if($val->demoStatus=="2") { ?> background-color:#f0ad4e;  <?php  } 
				if($val->demoStatus=="3") { ?> background-color:#d9534f;  <?php  } ?>  color:#FFF;">
                 
                 <td><?php echo $no; ?></td>
                  <td><?php echo $val->demo_id; ?></td>
                  <td><?php echo $val->name;  ?> <br> <?php  echo "Mo.".$val->mobileNo; ?> 	<br>
                  
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
					if($day>0) { echo "P Days : ".$day;  } ?>  
					
					
					
				   
                
                  </td>
                  <td><?php echo $val->demoDate;  ?> <br> <?php echo $val->fromTime;  ?> To <?php echo $val->toTime;  ?> </td>
                  <td style="width:100px;"><?php if($val->course_type=="Package") { echo $val->packageName; } else { ?><?php echo $val->courseName;  } ?> </td>
                  <td><?php  foreach($branch_all as $row) {  if($val->branch_id==$row->branch_id) {
				   echo $row->branch_name;  } } ?>
                  
                   <br> <?php foreach($department_all as $row) { if($val->department_id==$row->department_id) {  echo $row->department_name;  } } ?> 
                   
                    </td>
                  <td><?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?> </td>
                  <td><?php 
                  if(!empty($val->reason)) { 
                       @$all_re = explode("&&",$val->reason);
                     for($i=0;$i<sizeof(@$all_re);$i++)
    				{
    					 @$res = explode("|/|",@$all_re[$i]);
    														      
                                echo @$res[0]." >> ".@$res[1]." >> ".@$res[2];
                                echo "<br>";                                   
                    } } ?>
                      
                  </td>
                  <td style="width:100px;"><?php echo $val->remarks;  ?> </td>
                  
               </td>
                 
                  
                 
                 	
                    
                </tr>
                
             <?php $no++; } } } ?>
                
                </tfoot>
              </table>
              </div>
          
            <a id="btn-Convert-Html2Image" class="btn btn-success" style="margin-left:20px;" href="#">Download</a>
           
            
            <div style="margin-top:10px;" id="previewImage"></div>
    </div>
    
    <?php } ?>
    </div>
   
    



<script>

	var element = $("#html-content-holder"); // global variable
        var getCanvas; // global variable
        
        
        html2canvas(element, {
                 onrendered: function (canvas) {
                        $("#previewImage").append(canvas);
                        getCanvas = canvas;
                     }
                 });
         
          $('#html-content-holder').hide();
          
$("#btn-Convert-Html2Image").on('click', function () {
            
                var imgageData = getCanvas.toDataURL("image/png",1.0);
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", "Demo_Report.png").attr("href", newData);
                
	}); 
		 
		 
</script>

<script>
     
    $('.datepicker1').datepicker({
      autoclose: true,
      todayHighlight: true,
	   format:"yyyy-mm-dd"
	  
	  
    })
    
</script>
</body>
</html>