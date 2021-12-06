<!DOCTYPE html>
<html lang="en">
<?php 
@$user_permission =  explode(",",$_SESSION['user_permission']); 
     @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);
        
        $con = mysqli_connect("localhost","rnwsoftt_mzfrxmujjb","nathikevo#@!2021","rnwsoftt_mzfrxmujjb");
        
        $qu_course = mysqli_query($con,"SELECT * FROM `course`");
        
        ?>

<?php //echo "<pre>"; print_r($f_module); die; ?>

<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>RNW</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/css/app.min.css">
  <!-- Shining sheet editor -->
  <link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/css/components.css">
  <!-- Select Multiple Dropdown--> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/css/custom.css">
  <!-- Checkbox Style--> 

  
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url(); ?>assets/images/main_header_logo.png'/>
  <!-- <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>

<body onkeypress="return keyPress(event);">
<script> 
  </script> 
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <header class="navbar navbar-expand-md main-navbar sticky">
        <div class="navbar-brand mr-lg-5 pr-lg-5 text-center">
          <a href="<?php echo base_url(); ?>"> <img alt="image" width="30" src="<?php echo base_url(); ?>assets/images/main_header_logo.png" class="header-logo" alt="..." onerror="this.src='<?php echo base_url(); ?>dist/admissiondocuments/dummy-user.png'" />
            <span class="logo-name text-white">RNW</span>
          </a>
        </div>
        <div class="toggler_btn text-white ml-auto">
          <i data-feather="menu"></i>
        </div>
        <nav class="ml-lg-3 navbar_menu">
          <div class="mobile_popup_overlay"></div>
          <div class="mobile_popup_inner">
            <div class="close_btn">
              <i data-feather="x" width="40px" height="40px"></i>
            </div>
            <div class="form-inline mr-auto">
              <ul class="navbar-nav mr-3 d-flex align-items-center">
                <!-- <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                      collapse-btn"> <i data-feather="align-justify"></i></a></li> -->
                <li class="fullscreen-btn"><a href="#" class="nav-link nav-link-lg ">
                    <i data-feather="maximize"></i>
                  </a></li>
                  <?php 
              foreach ($f_module as $key => $value) { if($value->status=="1"){

                if(in_array($value->f_module_name, explode(",", $_SESSION['f_permission']))){ 
              ?>
                  <li class="open-drop-menu" style="position:inherit;">
                    <a href="#sub_menu_<?php echo $key; ?>" class="nav-link nav-link-lg open_mobile_drop_menu"> <i class="<?php  echo $value->f_module_icon; ?> mr-1"></i><?php echo $value->f_module_name; ?></a>
                    <div class="main-drop-menu shadow rounded">
                        <div class="header-sub">
                            <div class="header-sub-item d-flex flex-wrap">
                            <?php foreach($m_module as  $j=>$m){ if($m->status=="0"){
                              if($m->f_module_id == $value->f_module_id){
                                if(in_array($m->module_name, explode(",", $_SESSION['m_permission']))){
                              ?>
                                <div class="header-sub-item">
                                    <h4><?php echo $m->module_name; ?></h4>
                                    <ul>
                                    <?php foreach($l_module as $l){ if($l->status=="0"){
                                  if($l->m_module_id == $m->m_module_id){ 
                                  ?> 
                                  <?php if(in_array($l->name,$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
                                        <li><a href="<?php echo base_url() ?><?php echo $l->controller; ?><?php echo $l->method; ?>"><?php echo $l->name; ?></a></li>
                                        <?php } ?>
                                <?php } } } ?>
                                    </ul>
                                </div>
                                <?php } } } } ?>
                            </div>
                        </div>
                    </div>
                  </li>
                  <?php } } }?>
                  <!-- <li class="open-drop-menu" style="position:inherit;">
                    <a href="#" class="nav-link nav-link-lg">LMS</a>
                    <div class="main-drop-menu shadow rounded">
                        <div class="header-sub">
                            <div class="header-sub-item d-flex">
                                <div class="header-sub-item ">
                                    <h4>Job Application List</h4>
                                    <ul>
                                        <li><a href="# ">Job Apply Application</a></li>
                                        <li><a href="# ">View Stu Questions</a></li>
                                        <li><a href="# ">View Company</a></li>
                                        <li><a href="# ">View all jobs</a></li>
                                        <li><a href="# ">View student applied on job</a></li>
                                        <li><a href="# ">View Rapid Job</a></li>
                                    </ul>
                                </div>
                                <div class="header-sub-item ">
                                    <h4>LmsSettings</h4>
                                    <ul>
                                        <li><a href="# ">Job Position</a></li>
                                        <li><a href="# ">Job Main Category</a></li>
                                        <li><a href="# ">Job Sub Category</a></li>
                                        <li><a href="# ">Whatsapp Template</a></li>
                                        <li><a href="# ">Email Template</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                  </li>
                  <li class="open-drop-menu" style="position:inherit;">
                    <a href="#" class="nav-link nav-link-lg">ERP</a>
                    <div class="main-drop-menu shadow rounded">
                        <div class="header-sub">
                            <div class="header-sub-item d-flex">
                                <div class="header-sub-item ">
                                    <h4>Events</h4>
                                    <ul>
                                        <li><a href="# ">Create Event</a></li>
                                        <li><a href="# ">Show Event</a></li>
                                    </ul>
                                </div>
                                <div class="header-sub-item ">
                                    <h4>Admission</h4>
                                    <ul>
                                        <li><a href="# ">Quick Admission</a></li>
                                        <li><a href="# ">Full Admission</a></li>
                                        <li><a href="# ">View Admission</a></li>
                                        <li><a href="# ">Unfillup Fields</a></li>
                                        <li><a href="# ">Batch</a></li>
                                    </ul>
                                </div>
                                <div class="header-sub-item ">
                                    <h4>Admission Settings</h4>
                                    <ul>
                                        <li><a href="# ">Permission</a></li>
                                        <li><a href="# ">Shining Sheet</a></li>
                                        <li><a href="# ">Doc Permission</a></li>
                                        <li><a href="# ">ID Card</a></li>
                                    </ul>
                                </div>
                                <div class="header-sub-item ">
                                    <h4>Account</h4>
                                    <ul>
                                        <li><a href="# ">Overdue Fees</a></li>
                                        <li><a href="# ">Outstanding Fees</a></li>
                                        <li><a href="# ">Income</a></li>
                                        <li><a href="# ">Expenses</a></li>
                                        <li><a href="# ">Receipt List</a></li>
                                        <li><a href="# ">Cheque Collected</a></li>
                                        <li><a href="# ">Deleted Receipt</a></li>
                                        <li><a href="# ">Other Income</a></li>
                                        <li><a href="# ">Expenses Deleted</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                  </li> -->
              </ul>
            </div>
            <ul class="navbar-nav navbar-right">
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                  class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                  <span class="badge headerBadge1">
                    6 </span> </a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                  <div class="dropdown-header">
                    Messages
                    <div class="float-right">
                      <a href="#">Mark All As Read</a>
                    </div>
                  </div>
                  <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
                          text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                      </span> <span class="dropdown-item-desc"> <span class="message-user">John
                          Deo</span>
                        <span class="time messege-text">Please check your mail !!</span>
                        <span class="time">2 Min Ago</span>
                      </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                        <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                      </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                          Smith</span> <span class="time messege-text">Request for leave
                          application</span>
                        <span class="time">5 Min Ago</span>
                      </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                        <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                      </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                          Ryan</span> <span class="time messege-text">Your payment invoice is
                          generated.</span> <span class="time">12 Min Ago</span>
                      </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                        <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                      </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                          Smith</span> <span class="time messege-text">hii John, I have upload
                          doc
                          related to task.</span> <span class="time">30
                          Min Ago</span>
                      </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                        <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                      </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                          Joshi</span> <span class="time messege-text">Please do as specify.
                          Let me
                          know if you have any query.</span> <span class="time">1
                          Days Ago</span>
                      </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                        <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                      </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                          Smith</span> <span class="time messege-text">Client Requirements</span>
                        <span class="time">2 Days Ago</span>
                      </span>
                    </a>
                  </div>
                  <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </li>
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                  class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
                  <span class="badge headerBadge1">2</span>
                </a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                  <div class="dropdown-header">
                    Notifications
                    <div class="float-right">
                      <a href="#">Mark All As Read</a>
                    </div>
                  </div>

                  <!-- <div class="dropdown-list-content dropdown-list-icons">
                    <?php foreach ($batch_datas as $key) { ?>
                    <a href="#" class="dropdown-item dropdown-item-unread"> <span
                        class="dropdown-item-icon bg-primary text-white"> <i class="fas fa-hourglass-half" onclick="return batch_notification(<?php echo $key->admission_courses_id; ?>);"></i>
                      </span> <span class="dropdown-item-desc">(<b><?php echo $key->gr_id; ?></b>) <?php echo $key->surname; ?> <?php echo $key->first_name; ?> <?php $courseids = explode(",",$key->courses_id);
                            foreach($course_data as $row) { if(in_array($row->course_id,$courseids)) {  echo $row->course_name; }  } ?>
                            <span class="time">2 Min Ago</span>
                      </span>
                    </a> 
                  <?php } ?>
                  <?php foreach ($course_completed as $key) { ?>
                  <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> 
                    <i class="fas fa-hourglass-half" onclick="return course_completed_notification(<?php echo $key->admission_courses_id; ?>);"></i>
                      </span> <span class="dropdown-item-desc">(<b><?php echo $key->gr_id; ?></b>) <?php echo $key->surname; ?> <?php echo $key->first_name; ?> <?php $courseids = explode(",",$key->courses_id);
                            foreach($course_data as $row) { if(in_array($row->course_id,$courseids)) {  echo $row->course_name; }  } ?> <br>
                            <?php echo "<b class='coursecompete'>(Completed Course)</b>"; ?>
                        <span class="time">12
                          Hours
                          Ago</span>
                      </span> 
                    </a>
                  <?php } ?>
                  </div> -->
                   <div class="dropdown-list-content dropdown-list-icons">
                    <!-- <a href="#" class="dropdown-item dropdown-item-unread"><span
                        class="dropdown-item-icon bg-primary text-white"><i class="fas fa-hourglass-half"></i>
                            <span class="time">2 Min Ago</span>
                      </span>
                    </a> 
                   -->
                  <a href="#" class="dropdown-item"><span class="dropdown-item-icon bg-success text-white"> 
                    <i class="fas fa-hourglass-half"></i>
                      </span> <span class="dropdown-item-desc">
                        <span class="time">12
                          Hours
                          Ago</span>
                      </span> 
                    </a>
                  </div>
                  <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </li>
              <li class="dropdown"><a href="#" data-toggle="dropdown"
                  class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image']; ?>"
                    class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                <div class="dropdown-menu dropdown-menu-right pullDown">
                  <div class="dropdown-title"><?php echo $_SESSION['user_name']; ?></div>
                  <a href="<?php echo base_url(); ?>Common/view_profile" class="dropdown-item has-icon"> <i class="far
                        fa-user"></i> Profile
                  </a> 
                  <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                    Activities
                  </a>
                  <?php if($_SESSION['logtype']=="Faculty") { ?> 
                  <a href="<?php echo base_url(); ?>settings/aspectedtime" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                    Expected Demo Time
                  </a> 
                  <?php } ?>
                  <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                    Settings
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="<?php echo base_url(); ?>welcome/logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <!-- <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="<?php echo base_url(); ?>assets/images/main_header_logo.png" class="header-logo" /> <span
                class="logo-name text-white">RNW</span>
            </a>
          </div> -->

          
         
          <!-- <ul class="sidebar-menu">
            <li class="dropdown active">
              <a href="" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
             <?php 
          foreach ($f_module as $key => $value) {

             if(in_array($value->f_module_name, explode(",", $_SESSION['f_permission']))){
           ?>
            <li class="dropdown">
              <a href="#sub_menu_<?php echo $key; ?>" class="menu-toggle nav-link has-dropdown"><i class="<?php  echo $value->f_module_icon; ?>"></i><span><?php echo $value->f_module_name; ?></span></a>
              <ul class="dropdown-menu" id="sub_menu_<?php echo $key; ?>">
                <?php foreach($m_module as  $j=>$m){ 
              if($m->f_module_id == $value->f_module_id){
                if(in_array($m->module_name, explode(",", $_SESSION['m_permission']))){
              ?>
                <li class="dropdown">
              <a href="#lead_submenu_<?php echo $j; ?>" class="menu-toggle nav-link has-dropdown"><i class="<?php echo  $m->module_icon; ?>"></i><span><?php echo $m->module_name; ?></span></a>
              <ul class="dropdown-menu" id="lead_submenu_<?php echo $j; ?>">
                 <?php foreach($l_module as $l){ 
                if($l->m_module_id == $m->m_module_id){
                ?> 
                <?php if(in_array($l->name,$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
                 
                <li><a class="nav-link" href="<?php echo base_url() ?><?php echo $l->controller; ?><?php echo $l->method; ?>"><?php echo $l->name; ?></a></li>

              <?php } ?>
            <?php } }  ?>
              </ul>
            </li>
             <?php } }  } ?>
              </ul>
            </li>
             <?php } } ?>
          </ul> -->
       
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content0">

        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div> 
