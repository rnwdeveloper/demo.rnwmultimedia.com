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
<style>
body {
  font-family: 'Poppins', sans-serif;
  font-size: 13px;
}
.bg {
  background-image: url(..//images/interview_2.jpg);
  background-size: cover;
  background-position: center;
}
.btn, .form-control {font-size: 13px;}
label {font-weight: bold;}
.text-red {color: #ed1d25!important;}
.shadow {box-shadow: 0 0 10px #ed1d25!important;}
.bg-white {background-color: #fff !important;}
.bg-grey {background-color: #eaeaea !important;}
.footer-bg {background: rgb(27, 29, 38) !important;}
.text-footer {color: #777;}
.btn-100{width: 100%;}
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
  padding: 15px;
}
.all-btn a {margin: 0 5px;}
.box-header {padding: 8px 0;}
.btn {border-radius: 0; transition: all 0.5s;}
.text-white {color: white;}
.inactive-a {background: #EC7063;}
.active-a {background: #DC7633;}
.postpone-a {background: #5DADE2;}
.confirm-a {background: #52BE80;}
.discart-a {background: #dd4b39;}
.inactive-a:hover {background: #CB4335; color: white;}
.active-a:hover {background: #BA4A00; color: white;}
.postpone-a:hover {background: #2E86C1; color: white;}
.confirm-a:hover {background: #1E8449; color: white;}
.discart-a:hover {background: darkred; color: white;}
.nav-tabs>li>a {margin-right: 15px;}
.nav-tabs>li.active>a,
.nav-tabs>li.active>a:focus,
.nav-tabs>li.active>a:hover {border-radius: 0;}
</style>
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1 class="text-center">Job Application</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Job Application</li>
  </ol>
  <div class="row text-uppercase d-flex all-btn justify-center" style="margin-top:20px;">
    <a class="btn text-white inactive-a"  href="<?php echo base_url(); ?>FormController/jobApplication?status=inactive">New</a> 
    <a class="btn text-white active-a"  href="<?php echo base_url(); ?>FormController/jobApplication?status=active">Active</a>   
    <a class="btn text-white confirm-a" href="<?php echo base_url(); ?>FormController/jobApplication?status=confirm">Confirm</a> 
    <a class="btn text-white postpone-a" href="<?php echo base_url(); ?>FormController/jobApplication?status=postpone">Postpone</a>  
    <a class="btn text-white discart-a" data-toggle="modal" data-target="#myModal_discart">Discart</a>
    <a class="btn btn-default">Profile</a>
  </div>
</section>
<!-- Main content -->
<section class="content">
                   <!-- Modal -->
  <div class="modal fade" id="myModal_discart" role="dialog">
    <div class="modal-dialog modal-lg w-90">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Discart Application</h4>
        </div>
        <div class="modal-body">
          <table id="example1" class="table table-bordered table-striped example10">
                <thead>
                <tr>
                   <th>Applicant Photo</th>
                   <th>Applicant Details</th>
                   <th>Position For Applied</th>
                   <th>Skill</th>
                   <th>Prefer Location For Job</th>
                    
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($application_job_all as $val) { if($val->discard=="1") {  ?>
                <tr>
                    
                    <td>
                      <?php echo $path =  FCPATH."/Placement/img/".$val->photo; ?>
                      <img src="<?php echo $path; ?>" alt="face11" height="180px" width="180px"></td>
                  <td>Name : <?php echo $val->name; ?> <br>
                  Gr Id : <?php echo $val->gr_id; ?><br>
                  Number : <?php echo $val->number; ?><br>
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
        
        
       
        
      
		 <?php if(empty($select_application)) { ?>
		 <div class="row">
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
              <h3 class="box-title">
                  <?php
                  if($appli_sts=="inactive") { $st=0;  echo "Display Inctive Job Application"; }
                 else  if($appli_sts=="active") { $st=1;  echo "Display Active Job Application"; }
                  else if($appli_sts=="confirm") { $st=2; echo "Display Confirm Job Application"; }
                else if($appli_sts=="postpone") { $st=3; echo "Display Postpone Job Application"; }
                
                  
                  ?>
                  </h3>
              
            </div>
            <!-- /.box-header -->
            <form method="post" action="<?php echo base_url(); ?>FormController/jobApplication" style="padding-bottom:20px; padding-top:20px;">
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
               
						 <input type="text"  class="form-control" value="<?php if(!empty($filterName)) { echo $filterName; } ?>"  id="" name="filterName" placeholder="Student Name" >
						
                 	</div>
                 	<div class="col-md-2" >
               
						 <input type="text"  class="form-control" value="<?php if(!empty($filter_applicationId)) { echo $filter_applicationId; } ?>"  id="" name="filter_applicationId" placeholder="Filter Application No " >
						
                 	</div>
                 		<div class="col-md-2" >
               
						 <input type="text"  class="form-control" value="<?php if(!empty($filter_grId)) { echo $filter_grId; } ?>"  id="" name="filter_grId" placeholder="Filter GR No " >
						
                 	</div>
                 	</div>
                 	<div class="row">
                 	<div class="col-md-3" style="margin-top:15px;">
                                   
                                     <select class="form-control custom-select my-1 mr-sm-2"  name="filter_position_for_apply"  >
                                       <option value="">Position For Applied</option>
                                        <?php foreach($jobtype_all as $val) { ?>
                                        
                                        <option  <?php if(@$filter_position_for_apply==$val->position) { echo "selected"; } ?> value="<?php echo $val->position; ?>"><?php echo $val->position; ?></option>
                                        <?php } ?>
                                        
                                    </select>
                                </div>
                                
                    <div class="col-md-3" style="margin-top:15px;">
                                     
                                   
                                    <select class="form-control custom-select my-1 mr-sm-2"   name="filter_prefer_job_location">
                                        <option value="">Prefer Job Location</option>
                                        <?php foreach($area_all as $val) { ?>
                                        <option <?php if(@$filter_prefer_job_location==$val->area_name) { echo "selected"; } ?>  value="<?php echo $val->area_name; ?>"><?php echo $val->area_name; ?></option>
                                        <?php } ?>
                                       
                                    </select>
                                </div>
                 	
                 	<div class="col-md-2" style="margin-top:15px;">
                            
                           <input type="text"  class="form-control datepicker input100" value="<?php if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start; } ?>"  id="" name="filter_demoDate_start" placeholder="Start Date" >
						   
                 	</div>
                 	<div class="col-md-2" style="margin-top:15px;">
                           <input type="text"  class="form-control datepicker input100" value="<?php if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } ?>"  id="" name="filter_demoDate_end" placeholder="End Date" >
                           
                          
                 	</div>
                 	
                 	<div class="col-md-2" style="margin-top:15px;">
            	
                
						<div class="col-sm-6">
                        <input type="submit" value="Filter" class="btn btn-default pull-right" name="search"/>
                        </div>
                        <div class="col-sm-6">
                        <a  href="<?php echo base_url(); ?>FormController/jobApplication" class="btn btn-default" >Reset</a>
                        </div>
					</div>
					</div>

			</form>
            
            
           
              <table id="example1" class="table table-bordered table-striped example10">
                <thead>
                <tr>
                    <th>Applicant Photo</th>
                  <th>Applicant Details</th>
                   <th>Position For Applied</th>
                   <th>Skill</th>
                   <th>Prefer Location For Job</th>
                    <th>Previous Employment?</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
               
                
                foreach($application_job_all as $val) { if($val->discard=="0") { if($val->application_status==$st) { ?>
                <tr>
                    <td><img src="https://www.rnwmultimedia.com/applications/images/application_images/<?php echo $val->photo; ?>" alt="face" height="80px" width="80px"></td>
                  <td>Name : <?php echo $val->name; ?> <br>
                  Gr Id : <?php echo $val->gr_id; ?> <br>  Application_No : <?php echo $val->application_number; ?><br>
                  Number : <?php echo $val->number; ?><br>
                  Faculty Name : 
                  <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) { echo $row->name; } } ?>
                  <br>
                   Branch : 
                  <?php foreach($branch_all as $row) { if($val->branch_id==$row->branch_id) { echo $row->branch_name; } } ?>
                  </td>
                  
                  <td><?php echo $val->position_for_apply; ?></td>
                  <td><?php echo $val->skill; ?></td>
                  <td><?php echo $val->prefer_job_location; ?></td>
                  <td><?php echo $val->company_name; ?></td>
                  
                 <td>
                 	    
                  	  
                  	            <a href="<?php echo base_url(); ?>FormController/jobApplication?action=view&id=<?php echo @$val->application_id; ?>" style="background-color:white; padding:2px; border:1px solid black;"><i class="fa fa-eye" style="color:black; "></i></a>
                                <br>
                  	         <div class="dropdown">
                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>FormController/jobApplication?action=view&id=<?php echo @$val->application_id; ?>"> View</a></li>
                               <li><a href="<?php echo base_url(); ?>FormController/jobApplication?action=discard&id=<?php echo @$val->application_id; ?>&discard=0"> Discard</a></li>
                             
                            </ul>
                          </div>
                  	
                  	</td>
                </tr>
                
             <?php } } } ?>
                
                </tfoot>
              </table>
          		
            
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
    <p>Application Date : <strong><?php echo @$select_application->application_date; ?></strong></p>
    <p>Application No : <strong><?php echo @$select_application->application_number; ?></strong></p>
  </div>
          <ul class="nav nav-tabs text-uppercase d-flex justify-center">
           
            <li class="active"><a data-toggle="tab" href="#home" onclick="return show_menu4_submit()"> Applicant Information</a></li>
               <?php if(@$_SESSION['user_name'] == 'URVIL PATEL' || @$_SESSION['user_name']=='Pradip Malaviya' ) { ?>
            <li><a data-toggle="tab" href="#menu1" onclick="return show_menu4_submit()">Previous Employment</a></li>
            <li><a data-toggle="tab" href="#menu2" onclick="return show_menu4_submit()">Faculty Use Only</a></li>

            <li><a data-toggle="tab" href="#menu3" onclick="return show_menu4_submit()">Status</a></li>
            <?php } ?>
             
            <li><a data-toggle="tab" href="#menu4" onclick="return hide_menu4_submit()">Remarks</a></li>
                     
          </ul>
        <form method="post" action="<?php echo base_url(); ?>/FormController/jobApplication" enctype= multipart/form-data>
                 <input type="hidden" name="application_id" value="<?php echo @$select_application->application_id; ?>">
          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
           <?php if(@$_SESSION['user_name'] == 'URVIL PATEL' || @$_SESSION['user_name'] == 'Pradip Malaviya' ) { ?>
             <div class="row" style="padding-top:20px; padding-bottom:20px">
                                <div class="col-md-3 my-2">
                                    <img src="https://www.rnwmultimedia.com/applications/images/application_images/<?php echo $val->photo; ?>" alt="face" height="150px" width="150px">
                                </div>
                            
                                <?php @$name = explode(" ",@$select_application->name); ?>
                                <div class="col-md-3 my-2">
                                    <label>First Name <span class="text-danger">*</span></label>   
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

                                 <div class="col-md-6 my-2">
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

                                <div class="col-md-6 my-2">
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
        <?php } else { ?>
        		<div class="row" style="padding-top:20px; padding-bottom:20px">
                                <div class="col-md-3 my-2">
                                    <img src="https://www.rnwmultimedia.com/applications/images/application_images/<?php echo $val->photo; ?>" alt="face" height="150px" width="150px">
                                </div>
                            
                                <?php @$name = explode(" ",@$select_application->name); ?>
                                <div class="col-md-3 my-2">
                                    <label>First Name <span class="text-danger">*</span></label>   
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
             <?php if(@$_SESSION['user_name'] == 'URVIL PATEL' || @$_SESSION['user_name']=='Pradip Malaviya' ) { ?>
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
                                    <label>Adress<span class=" text-danger">*</span></label>
                                    
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
    <?php if(@$_SESSION['user_name'] == 'URVIL PATEL' || @$_SESSION['user_name']=='Pradip Malaviya' ) { ?>
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
        <?php if(@$_SESSION['user_name'] == 'URVIL PATEL' || @$_SESSION['user_name']=='Pradip Malaviya' ) { ?>
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
                        </div>
                        <input class="form-control"type="hidden" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>" >

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
      <option value=''>Select</option>
      <option value="Assign Work Checking">Assign Work Checking</option>
      <option value="Work Complete">Work Complete</option>
      <option value="Work Pending">Work Pending</option>
      <option value="Location Issue">Location Issue</option>
      <option value="Salary Issue">Salary Issue</option>
	    <option value="Bond Issue">Bond Issue</option>
      <option value="Personal Issue">Personal Issue</option>
      <option value="Talk With Student">Talk With Student</option>
      <option value="Talk With Parents">Talk With Parents</option>
      <option value="Discipline">Discipline</option>
      <option value="Study">Study</option>
      <option value="Fees">Fees</option>
      <option value="Other">Others</option>
    </select>
    <span id="remarks_label_error" style="color:red"></span>
  </div>
  <div class="col-md-7">
    <label>Add New Remarks<span class=" text-danger">*</span></label>   
    <input type="hidden" name="application_no_job" id="application_no_job" value="<?php echo @$select_application->application_id; ?>">
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
    
    <strong>Copyright©2018 Red & White Multimedia.</strong> All rights
    reserved.
  </footer>

 
</div>
<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>



<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
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




<script>
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
  else if(remarks_label == '')
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
</script>
</body>
</html>
