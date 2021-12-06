
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rnw</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/media.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/bootstrap-timepicker.css">
  
</head>
<body class="position-relative" id="track">

<header class="top_header d-inline-block w-100 position-relative align-bottom">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div  class="col-lg-2 col-md-3 col-sm-12 text-center text-lg-left">
        <img src="<?php echo base_url(); ?>New_Demo_Soft/images/logo_White.png" class="logo" width="100%">
        <!-- <h2 class="logo_text">Red & White <br> Group Of Institute</h2> -->
      </div>
      <div class="col-lg-5 col-md-5 col-sm-12 text-sm-center text-lg-left text-md-left sort_details_row">
        <ul class="navbar-icon-list">
        	<li>
                <a href="https://demo.rnwmultimedia.com/" title="Dashboard"><i class="fa fa-home" style="font-size: 18px;"></i></a>
            </li>
          <li>
                <a href="https://demo.rnwmultimedia.com/TaskController/group" title="Tasks"><i class="fa fa-tasks" aria-hidden="true"></i></a>
            </li>
             <li>
                <a href="https://demo.rnwmultimedia.com/settings/gmail" title="Email"><i class="fa fa-envelope"></i></a>
            </li>
            <li>
                <a href="https://demo.rnwmultimedia.com/welcome/AdDemo_New" title="Add Demo"><i class="fa fa-user"></i></a>
            </li>
            <li>
                <a href="https://demo.rnwmultimedia.com/FormController/managementForm" title="Form"><i class="fa fa-fw fa-list-alt"></i></a>
            </li>
            <li>
                <a href="https://demo.rnwmultimedia.com/welcome/courseDetails" title="Course Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
            </li>
            <li>

                <a href="https://demo.rnwmultimedia.com/FaqController/FaqView" title="FAQ's"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
            </li>

            <li>
                <a href="https://demo.rnwmultimedia.com/PropertyController/addcomplain_new" title="Add-Complain"><i class="fa fa-bullhorn" aria-hidden="true"></i></a>
            </li>
            <li>
                <a href="https://demo.rnwmultimedia.com/GRid_search_api.php" title="GR_id"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
            </li>
              <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Manager" || $_SESSION['logtype']=="Progress Report Checker") { ?>
        <li>
          <a href="<?php echo base_url(); ?>GoogleFormController/googleform" title="Google-Form"><i class="fa fa-file-text-o"></i></a>
        </li>
      <?php } ?>
            <li>
                <a href="https://demo.rnwmultimedia.com/GoogleFormController/StaffDetail" title="Employee-Details"><i class="fa fa-users" aria-hidden="true"></i></a>
            </li>

             <li>
          <a href="<?php echo base_url(); ?>TaskController/cal_index" title="Events"><i class="fa fa-calendar" aria-hidden="true"></i></a>
        </li>
         <?php if($_SESSION['logtype'] == "Super Admin"){ ?>
          <li>
                <a href="https://demo.rnwmultimedia.com/ChartController/chart_index" title="Dashboard">Chart</a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="col-lg-5 col-md-4 col-sm-12 text-lg-right text-md-right text-sm-center">
        <ul class="top_header_right_block">
          <div class="toogle_btn_gp">
            <a href="javascript:void(0)" class="toogle_btn"><i class="fa fa-bars"></i></a>
          </div>
          <div class="d-inline-block">
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
            .coursecompete{
              color: green;
            }
           </style>

            





                








         <!--    <li class="dropdown New_Demo_Msg_Dropdown d-inline-block">
              <button type="button" class="btn btn-link text-white" data-toggle="dropdown"><i class="fas fa-envelope"></i></button>
              <ul class="dropdown-menu">
                <li>You have 0 messages</li>
                <li class="dropdown-divider"></li>
                <li class="text-center">
                  <a href="#" class="text-black">See All Messages</a>
                </li>
              </ul>
            </li> -->

              <li class="dropdown New_Demo_Msg_Dropdown d-inline-block">
              <button type="button" class="btn btn-link text-white" data-toggle="dropdown"><i class="fa fa-bell"></i></button>
              <ul class="dropdown-menu">
                <li>Notification</li>
                <li class="dropdown-divider"></li>
                <li class="text-center">
                  <a href="#" class="text-black">See All Messages</a><br>
                   
                    <div class="toast-body">
                     
                  </div>
              
                </li>
              </ul>
            </li>


            <li class="dropdown User_Profile_Block d-inline-block">
              <a href="#" class="d-inline-block" data-toggle="dropdown">
               <?php if($_SESSION['user_image']=="") { ?>
              <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="user_image rounded-circle" width="100%" alt="User Image">
              <?php } else  {  ?>
              <img src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image']; ?>" class="user_image rounded-circle" width="100%" alt="User Image">
              <?php } ?>
               
                <span class="d-inline-block align-middle ml-2"><?php echo $_SESSION['user_name']; ?></span>
              </a>
              <ul class="dropdown-menu text-center">
                <div class="card">
                  <div class="card-header">
                  <?php if($_SESSION['user_image']=="") { ?>
                <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="main_profile_image mb-2" alt="User Image">
      <?php } else  { ?>
            <img src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image']; ?>" class="main_profile_image mb-2" alt="User Image">
            <?php  } ?>
                   
                    <p class="text-white"><?php echo $_SESSION['user_name']; ?> - <?php echo $_SESSION['logtype']; ?></p>
                    <small><a href="#"><?php echo $_SESSION['user_email']; ?></a></small>
                  </div>
                   <?php if($_SESSION['logtype']=="Faculty") { ?>
                  <div class="card-body">
                    <a href="<?php echo base_url(); ?>settings/aspectedtime">Expected Demo Time</a>
                  </div>
                  <?php } ?>
                  <div class="card-footer">
                    <div class="float-left">
                      <a href="<?php echo base_url(); ?>settings/profile" class="btn btn-primary">Profile</a>
                    </div>
                    <div class="float-right">
                      <a href="<?php echo base_url(); ?>welcome/logout" class="btn btn-primary">Sign out</a>
                    </div>
                  </div>
                </div>
              </ul>
            </li>
          </div>
        </ul>       
      </div>
    </div>
  </div>
</header>
<aside class="side_Menu d-inline-block">
  <div class="side_menu_in_block">
    <div class="Side_profile">
      <span class="User_Profile_Block">
       <?php if($_SESSION['user_image']=="") { ?>
          <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="user_image rounded-circle" alt="User Image" width="100%">
          <?php } else { ?>
          <img src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image']; ?>" class="user_image rounded-circle" alt="User Image" width="100%">
          <?php } ?>
           <!--  <img src="https://demo.rnwmultimedia.com/dist/img/1576739309service_bg.jpg" class="user_image rounded-circle" width="100%"> -->
            <span class="d-inline-block align-middle ml-2"><?php echo $_SESSION['user_name']; ?> </span>
      </span>
    </div>
    <div class="Nav_Title">
      MAIN NAVIGATION
    </div>
    <div class="side_all_menu" id="sidebar">
      <ul class="side_all_menu_block" id="ollcollapse"> 





                <?php 


                foreach ($f_module as $key => $value) {

                   if(in_array($value->f_module_name, explode(",", $_SESSION['f_permission']))){
                 ?>
           <li>
           <b>
      
           <a href="#sub_menu_<?php echo $key; ?>" data-toggle="collapse" class="sub_menu collapsed"><i class="<?php  echo $value->f_module_icon; ?>"></i><?php echo $value->f_module_name; ?> <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
          </b>
        </li>

           <ul class="side_all_menu_sub_menu collapse" id="sub_menu_<?php echo $key; ?>" data-parent="#ollcollapse">
        <?php foreach($m_module as  $j=>$m){ 
          if($m->f_module_id == $value->f_module_id){
            if(in_array($m->module_name, explode(",", $_SESSION['m_permission']))){
          ?>
            <li><a href="#lead_submenu_<?php echo $j; ?>" data-toggle="collapse" class="collapsed"><i class="<?php echo  $m->module_icon; ?>"></i><?php echo $m->module_name; ?> <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a></li>

           <ul class="side_all_menu_sub_menu side_all_menu_sub_menu_in_sub collapse" id="lead_submenu_<?php echo $j; ?>">
           <?php foreach($l_module as $l){ 
          if($l->m_module_id == $m->m_module_id){
          ?> 
          <?php if(in_array($l->name,$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>
           
           <li><a href="<?php echo base_url() ?><?php echo $l->controller; ?><?php echo $l->method; ?>"><i class="fa fa-circle-o"></i><?php echo $l->name; ?></a></li>

           <?php } ?>
            <?php } }  ?> 
           
          </ul>
        <!-- </li> -->

       

        <?php } }  } ?>
         </ul>
        <?php } } ?>



       
        
      </ul>
    </div>
  </div>
</aside>

<script>
  function batch_notification(admission_courses_id=''){
   $.ajax({
     url : "<?php echo base_url(); ?>welcome/batchnotification_status",
     type:"post",
     data:{
       'admission_courses_id':admission_courses_id 
     },
     success:function(Resp){
      
      setTimeout(function() {
                location.reload();
            },500);
     }
   });
 }
</script>

<script>
  function course_completed_notification(admission_courses_id=''){
   $.ajax({
     url : "<?php echo base_url(); ?>welcome/course_completed_notification",
     type:"post",
     data:{
       'admission_courses_id':admission_courses_id 
     },
     success:function(Resp){
      
      setTimeout(function() {
                location.reload();
            },500);
     }
   });
 }
</script>


<script>
  function demo_notifive(d_id=''){
   $.ajax({
     url : "<?php echo base_url(); ?>welcome/demonotification_status",
     type:"post",
     data:{
       'd_id':d_id 
     },
     success:function(Resp){
      
      setTimeout(function() {
                location.reload();
            },500);
     }
   });
 }
</script>
