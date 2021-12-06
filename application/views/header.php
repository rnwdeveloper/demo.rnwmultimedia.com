

<?php 

@$user_permission =  explode(",",$_SESSION['user_permission']); 


     @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);
        
        $con = mysqli_connect("localhost","rnwsoftt_mzfrxmujjb","nathikevo#@!2021","rnwsoftt_mzfrxmujjb");
        
        $qu_course = mysqli_query($con,"SELECT * FROM `course`");
        
        ?>
<!DOCTYPE html>
<html>
<head>
  <style>
    



.sidebar-menu > li {
    padding: 6px 15px !important;
}
.sidebar-menu > li a {
    font-size: 16px;
    margin-left: 30px;
    display: block;
}

.side_all_menu_sub_menu li a i {
    margin-right: 10px;
}

.sidebar-menu > li a i {
    position: absolute;
    left: 15px;
    top: 10px;
}
.side_all_menu_sub_menu li a[aria-expanded="true"] span i {
    transform: rotate(-90deg);
}
.side_all_menu_sub_menu li a {
    display: block;
    padding: 6px 8px;
    font-size: 14px;
}
.side_all_menu_sub_menu li a span i {
    margin-right: 10px;
}
.side_all_menu_sub_menu li a span i {
    transform: rotate(-180deg);
}
.side_all_menu_sub_menu li a span {
    display: inline-block;
    vertical-align: middle;
    margin-left: 6px;
}





  </style>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
      <li>
                <a href="https://demo.rnwmultimedia.com/" title="Dashboard"><i class="fa fa-home" style="font-size: 18px;"></i></a>
            </li>
        <?php if($_SESSION['logtype']!="Progress Report Checker") { ?>
        <li>
          <a href="<?php echo base_url() ?>settings/gmail" title="Send Email" ><i class="fa fa-envelope"></i></i></a>
        </li>
       <!--  <li>
          <a href="<?php echo base_url() ?>welcome/addemo" title="Add Demo"><i class="fa fa-user"></i></i></a>
        </li> -->
        <li>
          <a href="<?php echo base_url() ?>welcome/AdDemo_New" title="Add Demo New"><i class="fa fa-user"></i></i></a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>FormController/managementForm" title="Form"><i class="fa fa-fw fa-list-alt"></i></a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>Common/course_details" title="Course Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
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
         <li>
          <a href="<?php echo base_url(); ?>TaskController/cal_index" title="Events"><i class="fa fa-calendar" aria-hidden="true"></i></a>
        </li>
      </ul>


      <div class="navbar-custom-menu">
          <style type="text/css">
             blink {
              -webkit-animation: 2s linear infinite condemned_blink_effect; 
              animation: 2s linear infinite condemned_blink_effect;
            }

            /* for Safari 4.0 - 8.0 */
            @-webkit-keyframes condemned_blink_effect { 
              0% {
                visibility: hidden;
              }
              50% {
                visibility: hidden;
              }
              100% {
                visibility: visible;
              }
            }

            @keyframes condemned_blink_effect {
              0% {
                visibility: hidden;
              }
              50% {
                visibility: hidden;
              }
              100% {
                visibility: visible;
              }
            }
           </style>

          
        <ul class="nav navbar-nav">





             <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

             <?php
             // print_r($tall[0]);
             // die;
               if(isset($tall[0]) && !empty($tall[0])){ ?>
          
            <blink><span><i class="fa fa-briefcase" aria-hidden="true"></i></span></blink>
             <?php }else{ ?><span><i class="fa fa-briefcase" aria-hidden="true"></i></span> <?php } ?>

              <?php if(isset($tall) && !empty($tall)){ ?>
              <span class="label label-danger" id="gave_total_task"></span>
               <?php } ?>
            </a>
            <ul class="dropdown-menu">
            
              <li class="header"> Working task:-<p id="gave_total_task_main"></p>  </li>
             
              <li>
                
                <ul class="menu">
                 <?php
                 if(isset($tall) && !empty($tall)){
                  foreach ($tall as $key => $value) {
                  foreach ($value as $k => $v){ ?>
                        <li><?php echo $v->task_name; ?></li>
              <?php } } }?>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>


           <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php  if(isset($to_ob_task[0]) && !empty($to_ob_task[0])){ ?>
            <blink><span><i class="fa fa-search-plus" aria-hidden="true"></i></span></blink>
             <?php }else{?><span><i class="fa fa-search-plus" aria-hidden="true"></i></span> <?php } ?>
            


             <?php  if(isset($to_ob_task) && !empty($to_ob_task)){ ?>
              <span class="label label-success" id="gave_total_ob_task"></span>
               <?php } ?>
            </a>
            <ul class="dropdown-menu">
             
              <li class="header"> Observe task:-<p id="gave_total_ob_task_main"></p>  </li>
             
              <li>
                
                <ul class="menu">
                 <?php
                 if(isset($to_ob_task) && !empty($to_ob_task)){
                  foreach ($to_ob_task as $key => $value) {
                  foreach ($value as $k => $v){ ?>
                        <li><?php echo $v->task_name; ?></li>
              <?php } } }?>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>



 

          <!-- Messages: style can be found in dropdown.less-->
           <?php $nos=0; foreach($upd_see as $val) { if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Faculty") { $nos++; } } ?> 
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell fa-lg"></i>
              <span class="label label-danger"><?php if($nos!=0) { echo $nos; }  ?></span>
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
                  <a href="<?php echo base_url(); ?>welcome/logout" class="btn btn-default btn-flat">Sign out</a>
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
          <?php   $methods = $this->uri->segment(2);
            $controll = $this->uri->segment(1); ?>
        </div>
      </div>
      <!-- search form -->
   <?php foreach($l_module as $lm){  

         $lastModule = explode('/',$lm->method);
         for($i=0; $i<sizeof($lastModule);$i++){
           $record[] = @$lastModule[1];
         }


   }
         // $allController = array_unique($record);
         $allController = array("sub_menu_0","sub_menu_1","sub_menu_2");


         // print_r($allController);

         
?>



      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION </li>
        <?php  
        if(!empty($f_module)){
          foreach (@$f_module as $key => $value) {
            if(in_array($value->f_module_name, explode(",", $_SESSION['f_permission']))){
          ?>
          <li >
           <b>
            <a href="#sub_menu_<?php echo $key; ?>" data-toggle="collapse" class="sub_menu collapsed"><i class="<?php  echo $value->f_module_icon; ?>"></i>   <?php echo $value->f_module_name; ?> <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
          </b>
        </li>

           <ul class="side_all_menu_sub_menu collapse"  id="sub_menu_<?php echo $key; ?>" data-parent="#ollcollapse">
        <?php foreach($m_module as  $j=>$m){ 
          if($m->f_module_id == $value->f_module_id){
             if(in_array($m->module_name, explode(",", $_SESSION['m_permission']))){
          ?>
            <li><a href="#lead_submenu_<?php echo $j; ?>" data-toggle="collapse" class="collapsed" onclick="return hideMenu(<?php echo $key; ?>,<?php echo $j; ?>)"><i class="<?php echo  $m->module_icon; ?>"></i><?php echo $m->module_name; ?> <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a></li>

           <ul class="side_all_menu_sub_menu side_all_menu_sub_menu_in_sub collapse"  id="lead_submenu_<?php echo $j; ?>">
           <?php foreach($l_module as $l){ 
          if($l->m_module_id == $m->m_module_id){
          ?> 
          <?php if(in_array($l->name,$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
           
           <li ><a href="<?php echo base_url() ?><?php echo $l->controller; ?><?php echo $l->method; ?>" onclick="return getClick(<?php echo $key; ?>,<?php echo $j; ?>)"><i class="fa fa-circle-o" ></i><?php echo $l->name; ?></a></li>

           <?php } ?>
            <?php } }  ?> 
           
          </ul>
        <!-- </li> -->

       

        <?php } }  } ?>
         </ul>
        <?php } } } ?>


    </section>
    
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

