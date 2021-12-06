

<?php 

@$user_permission =  explode(",",$_SESSION['user_permission']); 
     @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);
        
        $con = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb");
        
        $qu_course = mysqli_query($con,"SELECT * FROM `course`");
        
        ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>RNW</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assetslogin/images/rnw2.png"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/Ionicons/css/ionicons.min.css">
  
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/custom.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="mystyle.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">
      body{
        /*display: none !important;*/
      }
      #graphs{
        /*display: none !important;*/
      }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini <?php if(@$collapse==1) { ?> sidebar-collapse  <?php } ?>">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>welcome" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>RNW</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Red</b>&<b>White</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top admin-header">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="togle">
        <span class="sr-only">Toggle navigation</span>
      </a>


      <ul class="navbar-icon-list">
        <?php if($_SESSION['logtype']!="Progress Report Checker") { ?>
        <li>
          <a href="<?php echo base_url() ?>welcome/addemo" title="Add Demo"><i class="fa fa-user"></i></i></a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>FormController/managementForm" title="Form"><i class="fa fa-fw fa-list-alt"></i></a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>welcome/courseDetails" title="Course Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
        </li>
        <li>
         
          <a href="<?php echo base_url() ?>FaqController/FaqView" title="FAQ's"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
        </li>
    
        <li>
          <a href="<?php echo base_url(); ?>PropertyController/addcomplain_new" title="Add-Complain"><i class="fa fa-bullhorn" aria-hidden="true"></i></a>
        </li>
         <li>
          <a href="<?php echo base_url(); ?>GRid_search_api.php" title="GR_id"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
        </li>
      <?php } ?>
          <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Manager" || $_SESSION['logtype']=="Progress Report Checker") { ?>
        <li>
          <a href="<?php echo base_url(); ?>GoogleFormController/googleform" title="Google-Form"><i class="fa fa-file-text-o"></i></a>
        </li>
      <?php } ?>
        <li>
          <a href="<?php echo base_url(); ?>GoogleFormController/StaffDetail" title="Employee-Details"><i class="fa fa-users" aria-hidden="true"></i></a>
        </li>
      </ul>


      <div class="navbar-custom-menu">
          
          
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           <?php $nos=0; foreach($upd_see as $val) { if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Faculty") { $nos++; } } ?> 
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o fa-lg"></i>
              <span class="label label-danger"><?php if($nos!=0) { echo $nos; } ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $nos; ?> messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                 
                <?php foreach($upd_see as $val) { if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Faculty") { ?>
                  <li><!-- start message -->
                    <a href="#">
                      
                      <h4>
                        New Demo : <?php echo $val->name; ?> 
                       
                      </h4>
                      <p>Added By <?php echo $val->addBy; ?></p>
                      <p>Assign to <?php foreach($upd_faculty as $row) { if($val->faculty_id==$row->faculty_id) { echo $row->name; } } ?>  - <?php foreach($upd_branch as $row) { if($val->branch_id==$row->branch_id) { echo $row->branch_name ; } } ?> </p>
                     <p>Course : <?php echo $val->courseName; ?> Date : <?php echo $val->demoDate; ?></p> 
                    </a>
                  </li>
                <?php } } ?>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php if($_SESSION['user_image']=="") { ?>
              <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <?php } else  {  ?>
              <img src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image']; ?>" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs"><?php echo $_SESSION['user_name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <?php if($_SESSION['user_image']=="") { ?>
                <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      <?php } else  { ?>
            <img src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image']; ?>" class="img-circle" alt="User Image">
            <?php  } ?>
                <p>
                  <?php echo $_SESSION['user_name']; ?> - <?php echo $_SESSION['logtype']; ?>
                  <small><?php echo $_SESSION['user_email']; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <?php if($_SESSION['logtype']=="Faculty") { ?>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="<?php echo base_url(); ?>settings/aspectedtime">Expected Demo Time</a>
                  </div>
                  
                </div>
                <!-- /.row -->
              </li>
              <?php } ?>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url(); ?>settings/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>/welcome/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <style>
    .info-box:after {
    content: "";
    display: block;
    clear: both;
    padding-bottom: 5px;
}
  </style>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <?php if($_SESSION['user_image']=="") { ?>
          <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          <?php } else { ?>
          <img src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image']; ?>" class="img-circle" alt="User Image">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['user_name']; ?> </p>
         
        </div>
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php if($_SESSION['logtype']!="Access Document" && $_SESSION['logtype']!="Access Property") { ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>


       
        <li>
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
      
          
        </li>
        <?php if($_SESSION['logtype']=="Hello") { ?>
        <li>
          <a href="<?php echo base_url() ?>ChatController">
            <i class="fa fa-comments-o"></i> <span>Chat</span>
           
          </a>
          
        </li>
       
      <?php } ?>
       
       
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <?php if($_SESSION['logtype']=="Super Admin") { ?>
            
           <li><a href="<?php echo base_url() ?>settings/admin"><i class="fa fa-circle-o"></i>Admin</a></li>  
           <li><a href="<?php echo base_url() ?>settings/branch"><i class="fa fa-circle-o"></i>Branch</a></li>  
            <li><a href="<?php echo base_url() ?>settings/department"><i class="fa fa-circle-o"></i>Department</a></li>
            <li><a href="<?php echo base_url() ?>settings/subdepartment"><i class="fa fa-circle-o"></i>SubDepartment</a></li>
            <li><a href="<?php echo base_url() ?>settings/user"><i class="fa fa-circle-o"></i>Role </a></li>
             <?php } ?>
             <?php if(in_array("hod=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
             <li><a href="<?php echo base_url() ?>settings/hod"><i class="fa fa-user"></i> Hod</a></li>
             <?php } ?>
             <?php if(in_array("Faculty=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
             <li><a href="<?php echo base_url() ?>settings/staff"><i class="fa fa-user"></i> Faculty</a></li>
             <?php } ?>
             
             <?php if(in_array("Single Course=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
            <li><a href="<?php echo base_url() ?>settings/course"><i class="fa fa-circle-o"></i>Single Course</a></li>
            <?php } ?>
            
            <?php if(in_array("Course Package=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
            <li><a href="<?php echo base_url() ?>settings/course_package"><i class="fa fa-circle-o"></i>Course Package</a></li>
             <?php } ?>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Lead</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(in_array("Bulk_Lead=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
            <li>
            <a href="<?php echo base_url(); ?>Bulk_LeadController/Bulk_lead" title="Bulk-Lead"><i class="fa fa-circle-o"></i>Bukl Lead</a>
          </li>
            <?php }  ?> 
           
              
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Enquiry</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(in_array("Leads=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
           <li><a href="<?php echo base_url() ?>Enquiry/leads_list"><i class="fa fa-circle-o"></i>Leads</a></li> 
            <?php }  ?> 
            <?php if(in_array("New Enquiry=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
           <li><a href="<?php echo base_url() ?>Enquiry/proceedEnq"><i class="fa fa-circle-o"></i>New Enquiry</a></li> 
         <?php } ?>
          <?php if(in_array("Enquiry List=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
           <li><a href="<?php echo base_url() ?>Enquiry/inquirys"><i class="fa fa-circle-o"></i>Enquiry List</a></li>
         <?php } ?>
          <?php if(in_array("PendingFollowup=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
           <li><a href="<?php echo base_url() ?>Enquiry/enquiryPendingFollowup"><i class="fa fa-circle-o"></i>Pending Follow ups</a></li>
         <?php } ?>
          <?php if(in_array("OverdueFollowup=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
           <li><a href="<?php echo base_url() ?>Enquiry/enquiryOverdueFollowup"><i class="fa fa-circle-o"></i>Overdue Follow ups</a></li>
         <?php } ?>
              
          </ul>
        </li>
        
        

         <?php if(in_array("Add Demo=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
        <li>
          <a href="<?php echo base_url() ?>welcome/addemo">
            <i class="fa fa-user"></i> <span>ADD DEMO STUDENT</span>
           
          </a>
          
        </li>
        <?php } ?>
        
        <?php if(in_array("View Demo=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>VIEW STUDENTS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
           <li><a href="<?php echo base_url() ?>welcome/viewDemo/as"><i class="fa fa-circle-o"></i>All Students</a></li>  
            <li><a href="<?php echo base_url() ?>welcome/viewDemo/rd"><i class="fa fa-circle-o"></i>Running Demo</a></li>
            <li><a href="<?php echo base_url() ?>welcome/viewDemo/ord"><i class="fa fa-circle-o"></i>Overdue Running Demo</a></li>
            <li><a href="<?php echo base_url() ?>welcome/viewDemo/cfd"><i class="fa fa-circle-o"></i>Confusion Demo</a></li>
            <li><a href="<?php echo base_url() ?>welcome/viewDemo/ld"><i class="fa fa-circle-o"></i>Leave Demo</a></li>
            <li><a href="<?php echo base_url() ?>welcome/viewDemo/dd"><i class="fa fa-circle-o"></i> Done Demo</a></li>
            <li><a href="<?php echo base_url() ?>welcome/viewDemo/cd"><i class="fa fa-circle-o"></i>Cancel Demo</a></li>
            
              
          </ul>
        </li>
           
        
        <?php } ?>
        
        <?php if(in_array("Course Details=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
        <li>
          <a href="<?php echo base_url() ?>welcome/courseDetails">
            <i class="fa fa-info-circle" aria-hidden="true"></i> <span>Course Details</span>
           
          </a>
          
        </li>
      <?php } ?>
      
      <?php if(in_array("Form=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
       <li>
          <a href="<?php echo base_url(); ?>FormController/managementForm">
            <i class="fa fa-fw fa-list-alt"></i> <span>Form</span>
            
          </a>
         
        </li>
      <?php } ?>
        <li class="treeview">

          <a href="#">
            <i class="fa fa-fw fa-area-chart"></i> <span>Analysis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

           <?php

           if(in_array("Today Report=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 
           <li><a href="<?php echo base_url(); ?>welcome/todayr"><i class="fa fa-circle-o"></i>Today Report</a></li>
         <?php } ?>
          <?php if(in_array("Last 6 Months=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 
           <li><a href="<?php echo base_url(); ?>welcome/analysis/sixm"><i class="fa fa-circle-o"></i>Last 6 Months</a></li> 
         <?php } ?>
         <?php if(in_array("Current Month=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 
            <li><a href="<?php echo base_url(); ?>welcome/analysis/cm"><i class="fa fa-circle-o"></i>Current Month</a></li>
          <?php } ?>
          <?php if(in_array("Faculty Wise performance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 
            <li><a href="<?php echo base_url(); ?>welcome/analysis/fp"><i class="fa fa-circle-o"></i>Faculty Wise performance</a></li>
          <?php } ?>
          <?php if(in_array("Cancel Demo Reason wise=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 
            <li><a href="<?php echo base_url(); ?>welcome/analysis/cr"><i class="fa fa-circle-o"></i>Cancel Demo Reason wise</a></li>
          <?php } ?>
           <?php if(in_array("Demo Report=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
        <li>
          <a href="<?php echo base_url() ?>welcome/demoReport">
            <i class="fa fa-file-o"></i> <span>Report</span>
          </a>
          
        </li>
       <?php } ?>
          </ul>
        </li> 

        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-dashboard"></i> <span>Property</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <?php if(in_array("Place Type=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 
           <li><a href="<?php echo base_url(); ?>PropertyController/place"><i class="fa fa-circle-o"></i>Place Type</a></li>
           <?php } ?>
           <?php if(in_array("Property Type=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>  
           <li><a href="<?php echo base_url(); ?>PropertyController/producttype"><i class="fa fa-circle-o"></i>Property Type</a></li>
           <?php } ?>
           <?php if(in_array("Property List=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>   
            <li><a href="<?php echo base_url(); ?>PropertyController/productlist"><i class="fa fa-circle-o"></i>Property List</a></li>
            <?php } ?>
           <!--  <?php if(in_array("Add Complain=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 
            <li><a href="<?php echo base_url(); ?>PropertyController/addComplain"><i class="fa fa-circle-o"></i>Add Complain</a></li>
          <?php } ?> -->
          <?php if(in_array("View All Complain=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 
            <li><a href="<?php echo base_url(); ?>PropertyController/viewComplain"><i class="fa fa-circle-o"></i>View All Complain</a></li>
          <?php } ?>
          <?php if(in_array("AddComplain New=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 
            <li><a href="<?php echo base_url(); ?>PropertyController/addcomplain_new"><i class="fa fa-circle-o"></i>AddComplain New</a></li>
          <?php } ?>
              
          </ul>
        </li>
        
        
        
       
       <?php if(in_array("Job Application=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-dashboard"></i> <span>Job Apply Application List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url(); ?>FormController/jobApplication">
                <i class="fa fa-fw fa-file-o"></i> <span>Job Apply Application List</span>
              </a>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>FormController/gradecompanyQuestions">
                <i class="fa fa-fw fa-file-o"></i> <span>View Grade Company Questions</span>
              </a>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>FormController/viewgradeStudentsQuestions">
                <i class="fa fa-fw fa-file-o"></i> <span>view Stu Questions</span>
              </a>
            </li>


            <li>
              <a href="<?php echo base_url(); ?>FormController/viewall_company_detail">
                <i class="fa fa-fw fa-file-o"></i> <span>View Company</span>
              </a>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>FormController/view_all_jobs">
                <i class="fa fa-fw fa-file-o"></i> <span>view All Jobs</span>
              </a>
            </li>


            <li>
              <a href="<?php echo base_url(); ?>FormController/view_student_applied_jobs">
                <i class="fa fa-fw fa-file-o"></i> <span>view Student applied on job</span>
              </a>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>FormController/view_rapid_job_post">
                <i class="fa fa-fw fa-file-o"></i> <span>view Rapid Job</span>
              </a>
            </li>
            
          </ul>
        </li>
      <?php } ?>


           <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>FAQ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">                           
           <?php if(in_array("FaqAdd=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>        
                <li><a href="<?php echo base_url() ?>FaqController/FaqAdd"><i class="fa fa-circle-o"></i>FaqInsert</a></li> 
                <?php } ?>
                <?php if(in_array("FaqView=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
             <li><a href="<?php echo base_url() ?>FaqController/FaqView"><i class="fa fa-circle-o"></i>FaqShow</a></li>
             <?php } ?>                
          </ul>
        </li>
         
      
        
         <li class="treeview">
          
          
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Hardware</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <?php if(in_array("HardwareForm=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
           <li><a href="<?php echo base_url() ?>HardwareController/HardwareForm"><i class="fa fa-circle-o"></i>HardwareForm</a></li>
           <?php } ?>
           <?php if(in_array("HardwareShow=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
           <li><a href="<?php echo base_url() ?>HardwareController/HardwareShow"><i class="fa fa-circle-o"></i>HardwareShow</a></li>
           <?php } ?>          
          </ul>
        </li>
      
     
        
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Terms&Conditions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">                           
                  <?php if(in_array("TcForm=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
                <li><a href="<?php echo base_url() ?>Tc_Controller/TcAdd"><i class="fa fa-circle-o"></i>TcInsert</a></li> 
                <?php } ?>
                <?php if(in_array("TcShow=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
             <li><a href="<?php echo base_url() ?>Tc_Controller/TcView"><i class="fa fa-circle-o"></i>TcShow</a></li>
                 <?php } ?>
          </ul>
        </li> 

        <?php if($_SESSION['logtype']=="Super Admin") { ?>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Admission</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">                           
                  
                <li><a href="<?php echo base_url() ?>AddmissionController/seat_branch"><i class="fa fa-circle-o"></i>Seat-Branch</a></li>

                 <li><a href="<?php echo base_url() ?>AddmissionController/seat_course"><i class="fa fa-circle-o"></i>Seat-Course</a></li>

                 <li><a href="<?php echo base_url() ?>AddmissionController/seat_assign"><i class="fa fa-circle-o"></i>Seat-Assign</a></li> 
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Task</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">                           
                  
                <li><a href="<?php echo base_url() ?>TaskController/group"><i class="fa fa-circle-o"></i>Group create</a></li>
<!-- 
                 <li><a href="<?php echo base_url() ?>AddmissionController/seat_course"><i class="fa fa-circle-o"></i>Seat-Course</a></li>

                 <li><a href="<?php echo base_url() ?>AddmissionController/seat_assign"><i class="fa fa-circle-o"></i>Seat-Assign</a></li>  -->
          </ul>
        </li>
        <?php } ?>
        
      </ul>
    <?php } ?>

      <?php if($_SESSION['logtype']=="Access Document" || $_SESSION['logtype']=="Access Property") { ?>

       <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       <li>
          <a href="<?php echo base_url() ?>welcome/courseDetails">
            <i class="fa fa-info-circle" aria-hidden="true"></i> <span>Course Details</span>
           
          </a>
          
        </li>

      

       <li>
          <a href="<?php echo base_url(); ?>FormController/managementForm">
            <i class="fa fa-fw fa-list-alt"></i> <span>Form</span>
            
          </a>
         
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-dashboard"></i> <span>Property</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($_SESSION['logtype']=="Access Property" || $_SESSION['logtype']=="Super Admin") { ?>
           <li><a href="<?php echo base_url(); ?>PropertyController/place"><i class="fa fa-circle-o"></i>Place Type</a></li> 
           <li><a href="<?php echo base_url(); ?>PropertyController/producttype"><i class="fa fa-circle-o"></i>Property Type</a></li>  
            <li><a href="<?php echo base_url(); ?>PropertyController/productlist"><i class="fa fa-circle-o"></i>Property List</a></li>
          <?php } ?>
            <li><a href="<?php echo base_url(); ?>PropertyController/addComplain"><i class="fa fa-circle-o"></i>Add Complain</a></li>
            <li><a href="<?php echo base_url(); ?>PropertyController/viewComplain"><i class="fa fa-circle-o"></i>View All Complain</a></li>
           
              
          </ul>
        </li>
        
       </ul>



     <?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  
  
  
  
  
  
  
  
  
  
  
    <!-- Control Sidebar -->
  
  <div class="control-sidebar-bg"></div>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <?php if($_SESSION['logtype']=="Super Admin") { ?>
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post"> 
          <h3 class="control-sidebar-heading">Software General Settings</h3>
          
          <?php if($_SESSION['logtype']=="Super Admin") { ?>
           <li>
          <a href="<?php echo base_url(); ?>Settings/main_menu" >Add menu</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>Settings/mid_menu" >Mid menu</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>Settings/las_menu" >Last menu</a>
        </li>

          <a class="form-group" data-toggle="modal" data-target="#myModal_selected_course">
            <label class="control-sidebar-subheading">
              Selected Courses
              
            </label>
                <p>
              Selected Courses show in Inquiry Form
            </p>
          </a>
          <!-- /.form-group -->

          <a class="form-group" href="<?php echo base_url(); ?>Settings/source">
            <label class="control-sidebar-subheading">
              Enquiry/Leads Source List
              
            </label>
            <p>
              you can add source and view
            </p>
          </a>
          <!-- /.form-group -->
          
          <a class="form-group" href="<?php echo base_url(); ?>Settings/setmail">
            <label class="control-sidebar-subheading">
              Set Email
              
            </label>
            <p>
              get all Enquiry Messages from mail
            </p>
          </a>
          
          
          <a class="form-group" href="<?php echo base_url(); ?>Settings/setMsgTemplate">
            <label class="control-sidebar-subheading">
             Message Template
              
            </label>
            <p>
              create message Template, edit and view
            </p>
          </a>
          
          <a class="form-group" href="<?php echo base_url(); ?>Settings/softset">
            <label class="control-sidebar-subheading">
             Network IP Address
              
            </label>
            <p>
              IP Address Add, edit and view
            </p>
          </a>
          
          <h3 class="control-sidebar-heading">SelectBox Option Settings</h3>
          
          <div class="form-group">
          <a class="form-group" href="<?php echo base_url(); ?>Settings/addSchool">
            <label class="control-sidebar-subheading">
             Add School
              </label>
          </a>
          </div>
          
          <div class="form-group">
          <a class="form-group" href="<?php echo base_url(); ?>Settings/addInterestLevel">
            <label class="control-sidebar-subheading">
             Add Interest Level Option
              </label>
          </a>
          </div>
          
          <div class="form-group">
          <a  href="<?php echo base_url(); ?>Settings/addStudentResponse">
            <label class="control-sidebar-subheading">
             Add Student Response Op
              </label>
          </a>
          </div>
          
          <div class="form-group">
          <a class="form-group" href="<?php echo base_url(); ?>Settings/addFollowupAction">
            <label class="control-sidebar-subheading">
             Add Followup Action Option
              </label>
          </a>
          </div>
          
          <div class="form-group">
          <a class="form-group" href="<?php echo base_url(); ?>Settings/addFollowupMode">
            <label class="control-sidebar-subheading">
             Add Followup Mode Option
              </label>
          </a>
          </div>
          
          <div class="form-group">
          <a class="form-group" href="<?php echo base_url(); ?>Settings/addCancellationReason">
            <label class="control-sidebar-subheading">
             Add Cancellation Reason Option
              </label>
          </a>
          </div>
          
          <!-- /.form-group -->
          
          <?php } ?>
        </form>
      </div>
      <?php } ?>
      <!-- /.tab-pane -->
    </div>
  </aside>
  
  
   <!-- Modal -->
  <div class="modal fade" id="myModal_selected_course" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Selected Course</h4>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url(); ?>Settings/selectedCourse" method="post">
         <table class="table">
    <thead>
      <tr>
        
        <th>Course</th>
      
      </tr>
    </thead>
    <tbody>
        
        <?php while($val = mysqli_fetch_array($qu_course)) { ?>
      <tr>
       
        <td>  
        <label class="checkbox-inline"><input type="checkbox" <?php if($val['selected_course']==1) { echo "checked"; } ?> name="selected_course[]" value="<?php echo $val['course_id'] ?>">  <?php echo $val['course_name'] ?></label></td>
      
      </tr>
     <?php } ?>
    
    </tbody>
  </table>
  
            <input type="submit" value="Submit" class="btn btn-success">
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>