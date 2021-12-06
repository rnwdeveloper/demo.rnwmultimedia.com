  
    
   <?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?> 
    
    
    
    
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
  
  <!-- <style type="text/css">
    .modal-header{
      background-color: #3c8dbc;
    }
    .modal-title{
      color: white;
      font-size: 22px;
    }
  </style> -->
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hod
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Branch</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <?php if(!empty($msg)) { ?>
     	    <div class="col-md-12">
     	        
     	        <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $msg; ?></div>
     	    </div>
     	    <?php } ?>
     	    <div class="row">
		        <div class="col-md-12">
          <!-- general form elements -->
                     <div class="box box-primary" style="padding:20px;">
                        <div class="box-header with-border" style="margin-bottom:10px;">
                          <h3 class="box-title">ADD Hod</h3>
                        </div>
           
            
            
                     <form  method="post" action="<?php echo base_url(); ?>settings/hod" id="filterForm"> 
                            <div class="row" style="padding:10px">
            				     <div class="col-md-6" >
                                    	<input type="hidden" name="update_id" value="<?php if(!empty($select_hod->hod_id)) { echo $select_hod->hod_id; } ?>"/>
                                                                                
                                            
                                        
                                            <!-- <div class="form-group">
                                            <label for="email">Department:</label>
                                            <select required  name="department_ids" id="department" class="form-control" >
                                                	<option value="">Select Department</option>
                                                    <?php foreach($department_all as $val) { ?>
                                                    	<option <?php if($val->department_id==@$select_hod->department_ids) { echo "selected"; } ?>   value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                          </div>

                                          <div class="form-group">
                                            <label for="email">Sub Department:</label>
                                            <select required  name="subdepartment_id" id="subdepartment" class="form-control" value="<?php if(!empty($select_hod->subdepartment_id)) { echo $select_hod->subdepartment_id; } ?>">
                                                  <option value="">Select Sub Department</option>
                                                </select>
                                          </div> -->
                   <?php if($_SESSION['logtype'] == "Super Admin"){ ?>
                  <div class="form-group">
                            <label for="email">Admin:</label>
                            <select required class="form-control" name="admin_id"  id="admin" required>
                                  <option value="">Select Admin</option>
                                    <?php foreach($user_all as $val) { if($val->status==0 && $val->logtype == "Admin") { ?>
                                      <option <?php if($val->name==@$select_user->logtype) { echo "selected"; } ?>   value="<?php echo $val->user_id; ?>" ><?php echo $val->name; ?></option>
                                    <?php } } ?>
                                </select>
                          </div>
                            <div class="form-group">
                                            <label>Branch:</label>

                                          <span id="branch"></span>
                                          </div>
                          <?php }else{ ?>
                             <div class="form-group">
                                            <label>Branch:</label>
                                             <div class="form-group" >
                            
                            <?php 
                                    foreach($aa_branch as $val) {  ?>
                      <div class="checkbox">
                                  <label><input class="filterCheck" type="checkbox" <?php if(@in_array($val->branch_id,@$brans)) { echo "checked"; } ?> name="b_ids[]" value="<?php echo $val->branch_id ?>" ><?php echo $val->branch_name ?></label>
                                </div>
                                <?php }  ?>
                          </div>

                                          <span id="branch"></span>
                                          </div>
                          <?php } ?>
                                         <!--  <div class="form-group" >
                            <label for="pwd">Select Branch:</label>
                            <?php if(!empty($select_hod->branch_ids)) { $brans = explode(",",$select_hod->branch_ids); }
                                    foreach($branch_all as $val) { if($val->branch_status==0) {  ?>
                      <div class="checkbox">
                                  <label><input class="filterCheck" type="checkbox" <?php if(@in_array($val->branch_id,@$brans)) { echo "checked"; } ?> name="b_ids[]" value="<?php echo $val->branch_id ?>" ><?php echo $val->branch_name ?></label>
                                </div>
                                <?php } } ?>
                          </div> -->
                          <div class="form-group">
                                            <label for="email">Department:</label>
                                            <span id="department"></span>
                                          </div>


                                           <div class="form-group">
                                            <label for="email">SubDepartment:</label>

                                            <span id="subdepartment"></span>
                                          </div>

                                    	   <!--  <div class="form-group">
                                            <label for="email">Faculty:</label>

                                            <select id="faculty_id" onChange="addFaculty()" class="form-control">
                                                  <option value="0">Select Faculty</option>
                                            </select>
                                          </div> -->

                                          
                                             <!--  <div class="form-group">
                                                <label for="email">Faculty</label>
                                              <select id="getfaculty" onChange="addFaculty()" id="facultya" required class="form-control">
                                                  <option value="">Select Faculty</option>
                                              </select>
                                          </div> -->
                                      
                                      <div class="row" id="showCourse" >
                                        </div>
                                            <div class="form-group" >
                                            <label for="pwd">Name:</label>
                                           <input class="form-control"  value="<?php if(!empty($select_hod->name)) { echo $select_hod->name; } ?>"  type="text"  name="name_hod" placeholder="Enter Name" required>
                                          </div>

                                           <div class="form-group" >
                                            <label for="pwd">Phone:</label>
                                           <input class="form-control"  value="<?php if(!empty($select_hod->phone)) { echo $select_hod->phone; } ?>"  type="text"  name="phone" placeholder="Enter Phone No." required>
                                          </div>
                        					
                        				     <div class="form-group" >
                                            <label for="pwd">Email Id:</label>
                                           <input class="form-control"   value="<?php if(!empty($select_hod->email)) { echo $select_hod->email; } ?>"  type="email"  name="email" placeholder="Enter Email" required>
                                          </div>
                                          
                        					<div class="form-group">
                                                <label for="pwd">Password :</label>
                                               <input type="password" class="form-control"  value="<?php if(!empty($select_hod->password)) { echo $select_hod->password; } ?>"  type="text"  name="password" placeholder="Enter password" required>
                                              </div>
                        					
                        						<!-- <?php if(!empty($select_hod->branch_ids)){
                        					    $brans = explode(",",$select_hod->branch_ids);
                        					    
                        					} ?>
                        					<div>
                        					    <label>Select Branch</label> 
                        					    <?php foreach($branch_all as $val) { ?>
                            					<div class="checkbox">
                                                  <label><input type="checkbox" <?php if(@in_array($val->branch_id,@$brans)) { echo "checked"; } ?> name="b_ids[]" value="<?php echo $val->branch_id ?>"><?php echo $val->branch_name ?></label>
                                                </div>
                                                <?php } ?>
                        					</div>
                   -->
        					
        					    </div>
        					     <div class="col-md-6" >
                            <div class="form-group" >
                                 <?php if(!empty($select_hod->permission)) { $permission = explode(",",$select_hod->permission); } ?>
                            <label for="pwd">Permission :-</label>
                            
                            <br><br>
                            <label for="pwd">Dashboard :</label>
                            <br>
                                 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Dashboard") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
            					  <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <label for="pwd">Lead :</label>
                            <br>
                                 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Bulk_Lead") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     
                                      if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio"  name="<?php echo $p_name  ?>" <?php if($flag==0) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>
                           
                                <label for="pwd">Enquery :</label>
                            <br>
                                 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Leads") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="New Enquiry") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Enquiry List") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>


                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="PendingFollowup") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="OverdueFollowup") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                            
                            <label for="pwd">Demo :</label>
                            <br>
                                 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Demo") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
            					  <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio"  name="<?php echo $p_name  ?>" <?php if($flag==0) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <label for="pwd">Course Details :</label>
                            <br>
                                 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Course Details") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <label for="pwd">Form :</label>
                            <br>
                                 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Form") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <label for="pwd">Analysis :</label>
                            <br>
                                 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Today Report") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Last 6 Months") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Current Month") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Faculty Wise performance") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Cancel Demo Reason wise") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <label for="pwd">Property :</label>
                            <br>
                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Place Type") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Property Type") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Property List") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Add Complain") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="View All Complain") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="AddComplain New") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>



                                <label for="pwd">Report :</label>
                            <br>
                                 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Demo Report") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <label for="pwd">Job Application List :</label>
                            <br>
                                 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Job Application") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>
                               
                               <label for="pwd">FAQ :</label>
                            <br>
                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="FaqAdd") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="FaqView") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <label for="pwd">Hardware :</label>
                            <br>
                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="HardwareForm") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="HardwareShow") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                             <label for="pwd">Terms&conditions :</label>
                            <br>
                                <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="TcForm") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>

                                 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="TcShow") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
                        <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>
                               
                            <label for="pwd">Other :</label>
                            <br>
                                 <?php foreach($permission_all as $val)  { $flag=0; if($val->permission_category=="Other") {
                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                    if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 ?>
            					  <label style="width:30%;font-weight: normal;"> <?php echo $val->permission_name;  ?></label> 
                                    <label class="radio-inline">
                                      <input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio"  name="<?php echo $p_name  ?>" <?php if($flag==0) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=0">No
                                    </label>
                                    <br>
                                <?php } } ?>
                                
                                
                          </div>
                        </div><br> 
                          </form> 
        					    <div class="col-md-12">
                					
                					<input type="submit" name="submit" value="Save" class="btn btn-primary pull-right" />
                				</div>
                			</div>
        
        					<div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">ADD Faculty</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
             
           <div >
            <form method="post" action="<?php echo base_url(); ?>Settings/setFacultyasain">
                 <table class="table table-striped">
            <tr>
              <th></th>
             <th>Faculty Name</th>

           </tr>
           <?php foreach ($faculty_all as $val) {?>
           <tr>
            <td><input type="checkbox" value="<?php  echo $val->faculty_id; ?>" name="faculty_ids[]"></td>
             <td><?php  echo $val->name; ?></td>
           </tr> 
         <?php } ?>
           </table>
           <div><input type="submit" name="submit"  value="submit" class="btn-primary" style="float: right;"></div><br>
         </form>
         
           
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>


        			
                    </div>
        
                </div>
            </div>
           
           <div class="row">
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Display STAFF</h3>
            </div>
            <!-- /.box-header -->
           
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Details</th>
                  <th>Branch</th>
                  <th>Admin</th>
                  <th>Subject</th>
                  <th>Faculty</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($hod_all as $val) {
                $flag=0;
                $fbrans = explode(",",$val->branch_ids) ;
                for($i=0;$i<sizeof($branch_ids);$i++)
                {
                  if(in_array($branch_ids[$i],$fbrans))
                  {
                      
                      $flag=1;
                  }
                } 
                if($flag==1 || $_SESSION['logtype']=="Super Admin") {
                ?>
                <tr>
                 
                  <td>

                    <?php echo "<b>Name : </b>".$val->name;  ?> <br> 
                    <?php  echo "<b>Email : </b>".$val->email; ?>  <br> 
                    <?php  echo "<b>Phone : </b>".$val->phone; ?>  <br>
                     <?php $branch_ids = explode(",",$val->department_ids);
                        foreach($department_all as $row) { if(in_array($row->department_id,$branch_ids)) {  echo "<b>Department : </b>" .$row->department_name; }  } ?> <br>
                    <?php $branch_ids = explode(",",$val->subdepartment_id);
                        foreach($subdepartment_all as $row) { if(in_array($row->subdepartment_id,$branch_ids)) {  echo "<b>Sub Department : </b>" .$row->subdepartment_name; }  } ?> <br>
                   <?php  echo "<b>Last Seen : </b>".$val->timestamp; ?></td>
                   <td><?php
                  @$bids = explode(",",@$val->branch_ids);
                            $bname="";      
                            for($i=0;$i<sizeof(@$bids);$i++)
                            {
                                foreach($branch_all as $row) {   
                                    if($row->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$row->branch_name;}else { $bname = $bname." & ".$row->branch_name; } }
                                }
                            }
                  echo $bname;
                  ?>  </td>
                   <td> <?php $branch_ids = explode(",",$val->admin_id);
                        foreach($user_all as $row) { if(in_array($row->user_id,$branch_ids)) {  echo $row->name; }  } ?></td>
                 

                  <td><button type="button" onclick="viewCourse(<?php echo $val->hod_id;?>)" class="btn btn-info btn-sm" >View</button></td>
              <td><button type="button" onclick="viewFaculty(<?php echo $val->hod_id;?>)" class="btn btn-warning btn-sm" >Faculty</button></td>
                  <!-- <td>

                    <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#GSCCModal">+</button>
                  </td> -->
                  
                 	<td>
                    <?php if($_SESSION['logtype']=="Super Admin") {  ?>
                    <a href="<?php echo base_url(); ?>settings/hod?action=delete&id=<?php echo @$val->hod_id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
                    <?php } ?>
                  	<a href="<?php echo base_url(); ?>settings/hod?action=edit&id=<?php echo @$val->hod_id; ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a></td>
                </tr>
                
             <?php } } ?>
                
                </tfoot>
              </table>
          		
            
          </div>
        
        </div>
        </div>
        
        <div class="col-ms-12">
            <div id="viewc"></div>
            
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
<script>
    
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
  }
</script>

<script>
    function viewCourse(id)
    {
        
       $.ajax({
           url:"<?php echo base_url(); ?>settings/view_course_hod",
           type:"post",
           data:{
               'hod_id':id
               
           },
           success: function(data) {
                $('#viewc').html(data);
                $('#myModal_course').modal('show');
            }
           
       });
    }
</script>

<script>
    function viewFaculty(id)
    {
        
       $.ajax({
           url:"<?php echo base_url(); ?>settings/view_faculty",
           type:"post",
           data:{
               'hod_id':id
               
           },
           success: function(data) {
                $('#viewc').html(data);
                $('#myModal_course').modal('show');
            }
           
       });
    }
</script>

   

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example5').DataTable()
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
  $(document).ready(function(){
    $('#admin').change(function(){
      // alert();
      var d = $(this).val();
      /*console.log("called");
      console.log($('#filterForm').serialize());*/
      // alert($('#filterForm').serialize());
      $.ajax({
        type:'POST',
        data:{

          'id':d
        },
        url:"<?php echo base_url(); ?>settings/fetch_all_branch",
        success:function(data){
          $('#branch').html(data);
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.filterCheck').change(function(){
      /*console.log("called");
      console.log($('#filterForm').serialize());*/
      // alert($('#filterForm').serialize());
      $.ajax({
        type:'POST',
        data:$('#filterForm').serialize(),
        url:"<?php echo base_url(); ?>settings/fetch_all_department",
        success:function(data){
          $('#department').html(data);
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.tt').change(function(){
      alert();
      /*console.log("called");
      console.log($('#filterForm').serialize());*/
      // alert($('#filterForm').serialize());
      // $.ajax({
      //   type:'POST',
      //   data:$('#filterForm').serialize(),
      //   url:"<?php //echo base_url(); ?>settings/fatch_all_subdepartment",
      //   success:function(data){
      //     $('#subdepartment').html(data);
      //   }
      // });
    });
  });
</script>
<script>
   var kb=1;
    function removefaculty(dvid)
    {
       
       $('#'+dvid).remove();
       
    }
    
function addFaculty()
    {
        var faculty = $('#faculty_id').val();
        // alert(faculty);
        $.ajax({
            url:'<?php echo base_url(); ?>settings/select_single_course',
            type:'post',
            dataType:"JSON",
            data:{
                'faculty_id':faculty
               
            },
            success: function(data)
            {
               var e = $('<div class="col-sm-4" id="hello'+kb+'"><div class="box box-success box-solid" style="padding:0px;"><div class="box-header" style="padding:0px 0px 0px 5px;"><h6 >'+data.selectdata['name']+'<input type="hidden" name="name[]" value="'+data.selectdata['faculty_id']+'"></h6><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" onclick="removefaculty('+"'hello"+kb+"'"+')"><i class="fa fa-times"></i></button></div> </div> </div> </div>');
    
                    $("#showCourse").append(e);
                    kb++;  
            }
        });
     }
 </script>
</body>
</html>
