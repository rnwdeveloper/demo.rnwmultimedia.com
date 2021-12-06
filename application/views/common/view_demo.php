<!DOCTYPE html>

<?php 

// $runnung = count(array_filter($demo_all, function ($var) {return ($var->demoStatus == '0');}));
// $done = count(array_filter($demo_all, function ($var) {return ($var->demoStatus == '1');}));
// $leave = count(array_filter($demo_all, function ($var) {return ($var->demoStatus == '2');}));
// $cancle = count(array_filter($demo_all, function ($var) {return ($var->demoStatus == '3');}));
// $confusion = count(array_filter($demo_all, function ($var) {return ($var->demoStatus == '4');}));
// $discard = count(array_filter($demo_all, function ($var) {return ($var->discard == '1');}));



  @$user_permission =  explode(",",@$_SESSION['user_permission']);
      @$branch_ids = explode(",",$_SESSION['branch_ids']);
    //   print_r($branch_ids);
    //   die();
      @$depart_ids = explode(",",$_SESSION['department_id']);
      if($_SESSION['logtype']=="Faculty")
      {
          @$faculty_course_ids = explode(",",$_SESSION['course_ids']);
          @$faculty_package_ids = explode(",",$_SESSION['package_ids']);
      }

      $ttll = 0;   
      $ttpp=0;
      $ttaa=0;
      $ttpend =0;
      $ldata =0;
      $cdemo =0;
   ?>

<link rel="stylesheet"
    href="https://demo.rnwmultimedia.com/dist/assets/bundles/owlcarousel2/dist/assets/owl.carousel.min.css">
<link rel="stylesheet"
    href="https://demo.rnwmultimedia.com/dist/assets/bundles/owlcarousel2/dist/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/izitoast/css/iziToast.min.css">
<style>
    .search_data_row{
        height: 400px;
    }
</style>


<div class="main-wrapper main-wrapper-1">
    <div class="main-content dashboard_section">
        <div class="col-12 d-flex justify-content-between align-items-center pb-3 px-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item"><a href="#" class="open_rightsidebar">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>

        <div class="extra_lead_menu pt-2">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item mb-3">
                        <a class="btn btn-primary text-white mx-1" href="<?php echo base_url();?>Welcome">All
                            <span class="badge rounded-pill text-white badge-transparent">
                                <?php echo $AllDemo;?>
                            </span> </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="btn btn-info mx-1 text-white"
                            href="<?php echo base_url();?>Welcome?status=0">Running <span
                                class="badge rounded-pill text-white badge-transparent">
                                <?php echo @$runnung;?>
                            </span> </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="btn btn-success text-white mx-1"
                            href="<?php echo base_url();?>Welcome?status=1">Done <span
                                class="badge rounded-pill text-white badge-transparent">
                                <?php echo @$done;?>
                            </span> </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="btn btn-warning text-white mx-1"
                            href="<?php echo base_url();?>Welcome?status=4">Confusion <span
                                class="badge rounded-pill text-white badge-transparent">
                                <?php echo @$confusion;?>
                            </span> </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="btn btn-hold text-white mx-1"
                            href="<?php echo base_url();?>Welcome?status=2">Leave <span
                                class="badge rounded-pill text-white badge-transparent">
                                <?php echo @$leave;?>
                            </span> </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="btn btn-red text-white mx-1"
                            href="<?php echo base_url();?>Welcome?status=3">Cancel <span
                                class="badge rounded-pill text-white badge-transparent">
                                <?php echo @$cancle;?>
                            </span> </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="btn btn-dark text-white mx-1"
                            href="<?php echo base_url();?>Welcome?status=5">Discard <span
                                class="badge rounded-pill text-white badge-transparent">
                                <?php echo @$discard;?>
                            </span> </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="btn btn btn-secondary text-dark mx-1"
                            href="<?php echo base_url();?>Welcome?status=6">Followup<span
                                class="badge rounded-pill text-dark badge-transparent">
                                <?php echo @$followup;?>
                            </span> </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-wrap">
                    <div class="crm-search-menu mb-3">
                        <input onkeyup="submit_searching()" type="search" class="form-control" name="searching_form"
                            id="searching_form" placeholder="Search by Name or Demo id ">
                        <i type="button" class="fa fa-search" aria-hidden="true"></i>
                    </div>
                    <!-- <a href="#" class="btn btn-info text-white mb-3" data-toggle="modal" data-target=".filter-dashboard">
                        <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i
                                class="fas fa-filter mr-1 text-white"></i></span>
                    </a> -->
                    <a href="javascript:filter_demo_reco()" class="btn btn-info text-white mb-3 open_rightsidebar">
                        <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i
                                class="fas fa-filter mr-1 text-white"></i></span>
                    </a>
                </div>
            </div>

            <div class="demo_tab_wrap">
                <div class="col-md-12 px-0">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="new-demo-dash">
                                    <div class="owl-carousel owl-theme slider" id="slider1">
                                        <?php $cn=1; foreach($upd_demo as $val) { ?>
                                        <div class="demo-item card card-primary shadow-sm py-2 mx-2 ">
                                            <h6 class="mt-3 page-title text-dark text-center">
                                                <?php echo $val->name;?>(
                                                <?php echo $val->demo_id ;?>)
                                            </h6>
                                            <label class="mt-1 mb-2 text-center">(
                                                <?php if(!empty($val->courseName)) {echo $val->courseName; } else {echo $val->packageName; } ?>)
                                            </label>
                                        </div>
                                        <?php $cn++; } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="sub_demo">
                        <div class="accordion mb-0">
                            <div class="accordion-item">
                                <div class="main-accordion shadow-sm card card-primary mb-3">
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
                                    <h6 class="accordion-title d-flex flex-wrap align-items-center justify-content-between p-3 mb-0"
                                        href="javascript:void(0)">
                                        <?php if(!empty($sdt)) { echo $sdt." To ".$edt." Timing Demo Students";    } ?><i
                                            class="fa fa-angle-down"></i>
                                    </h6>

                                    <div class="accordion-content show" style="display: none;">
                                        <?php foreach($demo_all as $val)  { 

                               $i=1;     
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
                               
                               if($val->attendance=="") { $day=0; }  if($flag==0) {

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
                                


                              if($current_hour == $hour) {   ?>

                                        <div class="row mx-0">
                                            <div class="col-12 mb-3">
                                                <div class="card-item shadow-sm">
                                                    <?php if($val->demoStatus == "0") { $holding = "info" ; } else if($val->demoStatus == "1") {$holding = "primary" ;} else if($val->demoStatus == "2") {$holding = "hold" ;} else if($val->demoStatus == "3") { $holding = "red" ;} else if($val->demoStatus == "4") { $holding = "warning" ; } ?>
                                                    <div class="card card-<?php echo $holding; ?>">
                                                        <div class="card-header form-title">
                                                            <h4 title="Mobile No :<?php echo $val->mobileNo; ?>">
                                                                <?php echo $val->name; ?>(
                                                                <?php echo $val->demo_id; ?>)
                                                            </h4>
                                                        </div>
                                                        <div class="card-body px-0 pt-1">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>
                                                                            <?php if(!empty($val->courseName)) { echo "Course Nme " ;} else { echo "Package Name "; } ?>
                                                                            :
                                                                        </label>
                                                                        <span>
                                                                            <?php if(!empty($val->courseName)) { echo $val->courseName ;} else { echo $val->packageName; } ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Branch : </label>
                                                                        <span>
                                                                            <?php foreach($all_branches as $row) { if($val->branch_id == $row->branch_id) {echo  $row->branch_name;} } ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Department : </label>
                                                                        <span>
                                                                            <?php foreach($list_department as $row) { if($val->department_id == $row->department_id) {echo  $row->department_name;} } ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap  text-dark">
                                                                        <label>Present Days :</label>
                                                                        <div class="progress shadow-none d-inline-flex"
                                                                            style="width:70%">
                                                                            <span class="position-absolute"
                                                                                style="top:-25px;right:25px;">
                                                                                <?php if(!empty($val->attendance)) {  echo $day;  ?>
                                                                                Days
                                                                                <?php } ?>
                                                                            </span>
                                                                            <div class="progress-bar" <?php if($day>5) {
                                                                                ?>
                                                                                <?php } ?> style="width:
                                                                                <?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>;
                                                                                ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Starting Course : </label>
                                                                        <span>
                                                                            <?php echo $val->startingCourse; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Added By : </label>
                                                                        <span>
                                                                            <?php echo $val->addBy; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Paresent Date : </label>
                                                                        <?php $stdate = explode(" ",$val->addDate); ?>
                                                                        <span>
                                                                            <?php echo $stdate[0]; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Start Date : </label>
                                                                        <?php $stdate = explode("-",$val->demoDate); ?>
                                                                        <span>
                                                                            <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap  text-dark">
                                                                        <label>Assign To : </label>
                                                                        <span>
                                                                                <?php if($val->faculty_id) {foreach($all_faculty as $row){ if($row->faculty_id == $val->faculty_id) { echo $row->name ; } } }
                                                                                else {
                                                                                    foreach($list_user as $row){ if($row->user_id == $val->hod_id) { echo $row->name ; } }
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-md-6 col-lg-3">
                                                            <div class="demo_detail_wrap text-dark d-flex">
                                                                <div class="mr-3">
                                                                    <label class="d-block">Course Category :</label>
                                                                </div>
                                                                <div>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="quick_course_package" id="exampleRadios1"
                                                                            value="package" <?php if($val->course_type=="package") { ?>checked = "checked"<?php } ?>>
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Package</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="quick_course_package" id="exampleRadios2"
                                                                            value="single" <?php if($val->course_type=="single" || $val->course_type=="Single Course") { ?>checked ="checked"<?php } ?> >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Single</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Time : </label>
                                                                        <span>
                                                                            <?php echo $val->fromTime; ?> To
                                                                            <?php echo $val->toTime; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Status:</label>
                                                                        <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                        <div class="d-inline-block">
                                                                            <select class="form-control" id="demoStatus"
                                                                                name="demoStatus"
                                                                                onchange="return GetStatus(this,<?php echo $val->demo_id;?>);">
                                                                                <option value="">Select Status</option>
                                                                                <option value="0" <?php if($val->
                                                                                    demoStatus == "0") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Running
                                                                                </option>
                                                                                <option value="1" <?php if($val->
                                                                                    demoStatus == "1") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Done
                                                                                </option>
                                                                                <option value="2" <?php if($val->
                                                                                    demoStatus == "2") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Leave
                                                                                </option>
                                                                                <option value="3" <?php if($val->
                                                                                    demoStatus == "3") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Cancel
                                                                                </option>
                                                                                <option value="4" <?php if($val->
                                                                                    demoStatus == "4") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Confusion
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <?php } else { ?>
                                                                        <div class="d-inline-block">
                                                                            <select class="form-control" id="demoStatus"
                                                                                name="demoStatus"
                                                                                onchange="return GetStatus(this,<?php echo $val->demo_id;?>);"
                                                                                disabled>
                                                                                <option value="">Select Status</option>
                                                                                <option value="0" <?php if($val->
                                                                                    demoStatus == "0") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Running
                                                                                </option>
                                                                                <option value="1" <?php if($val->
                                                                                    demoStatus == "1") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Done
                                                                                </option>
                                                                                <option value="2" <?php if($val->
                                                                                    demoStatus == "2") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Leave
                                                                                </option>
                                                                                <option value="3" <?php if($val->
                                                                                    demoStatus == "3") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Cancel
                                                                                </option>
                                                                                <option value="4" <?php if($val->
                                                                                    demoStatus == "4") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Confusion
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="form-group">
                                                                        <label class="text-dark">Attendence : </label>
                                                                        <div class="d-inline-block ml-1">
                                                                            <div
                                                                                class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                                <input
                                                                                    class="form-check-input package_type"
                                                                                    type="radio" name="attend"
                                                                                    id="attend" value="P"
                                                                                    onclick="return getAttend(this,<?php echo $val->demo_id;?>)">
                                                                                <div class="state p-info">
                                                                                    <i
                                                                                        class="icon material-icons">done</i>
                                                                                    <label>P</label>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                                <input
                                                                                    class="form-check-input course_type"
                                                                                    type="radio" name="attend"
                                                                                    id="attend" value="A"
                                                                                    onclick="return getAttend(this,<?php echo $val->demo_id;?>)">
                                                                                <div class="state p-info">
                                                                                    <i
                                                                                        class="icon material-icons">done</i>
                                                                                    <label>A</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php }?>
                                                                <div
                                                                    class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                                                                    <div>
                                                                        <a href="javascript:attend_remark(<?php echo $val->demo_id;?>)"
                                                                            class="btn btn-info btn-sm text-white">Attendance
                                                                            & follow
                                                                            up</a>
                                                                        <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") {?>
                                                                        <input class="btn btn-primary btn-sm ml-2"
                                                                            type="submit" name="full_submit"
                                                                            value="Submit">
                                                                        <?php }?>
                                                                        <a href="javascript:View_single(<?php echo  $val->demo_id ;?>)"
                                                                            class="bg-primary action-icon text-white btn-primary ml-2"><i
                                                                                class="far fa-eye"></i></a>
                                                                        <a href="javascript:View_history(<?php echo $val->demo_id ;?>)"
                                                                            class="bg-primary action-icon text-white btn-primary ml-2 open_rightsidebar mt-2 mt-sm-0"><i
                                                                                class="fas fa-history"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; } } }?>
                                    </div>


                                </div>
                                <div class="main-accordion shadow-sm card card-primary mb-3">
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
                                    <h6 class="accordion-title d-flex flex-wrap align-items-center justify-content-between p-3 mb-0"
                                        href="javascript:void(0)">
                                        <?php if(!empty($sdt)) { echo $sdt." To ".$edt." Timing Demo Students";    } ?><i
                                            class="fa fa-angle-down"></i>
                                    </h6>
                                    <div class="accordion-content show" style="display: none;">
                                        <?php foreach($demo_all as $val)  { 
                               $i=1;     
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
                               
                               if($val->attendance=="") { $day=0; }  if($flag==0) {

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
                              
                              if($current_hour == $hour) { ?>
                                        <div class="row mx-0">
                                            <div class="col-12 mb-3">
                                                <div class="card-item shadow-sm">
                                                    <?php if($val->demoStatus == "0") { $holding = "info" ; } else if($val->demoStatus == "1") {$holding = "primary" ;} else if($val->demoStatus == "2") {$holding = "hold" ;} else if($val->demoStatus == "3") { $holding = "red" ;} else if($val->demoStatus == "4") { $holding = "warning" ; } ?>
                                                    <div class="card card-<?php echo $holding; ?>">
                                                        <div class="card-header form-title">
                                                            <h4 title="Mobile No :<?php echo $val->mobileNo; ?>">
                                                                <?php echo $val->name; ?>(
                                                                <?php echo $val->demo_id; ?>)
                                                            </h4>
                                                        </div>
                                                        <div class="card-body px-0 pt-1">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>
                                                                            <?php if(!empty($val->courseName)) { echo "Course Nme " ;} else { echo "Package Name "; } ?>
                                                                            :
                                                                        </label>
                                                                        <span>
                                                                            <?php if(!empty($val->courseName)) { echo $val->courseName ;} else { echo $val->packageName; } ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Branch : </label>
                                                                        <span>
                                                                            <?php foreach($all_branches as $row) { if($val->branch_id == $row->branch_id) {echo  $row->branch_name;} } ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Department : </label>
                                                                        <span>
                                                                            <?php foreach($list_department as $row) { if($val->department_id == $row->department_id) {echo  $row->department_name;} } ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap  text-dark">
                                                                        <label>Present Days :</label>
                                                                        <div class="progress shadow-none d-inline-flex"
                                                                            style="width:70%">
                                                                            <span class="position-absolute"
                                                                                style="top:-25px;right:25px;">
                                                                                <?php if(!empty($val->attendance)) {  echo $day;  ?>
                                                                                Days
                                                                                <?php } ?>
                                                                            </span>
                                                                            <div class="progress-bar" <?php if($day>5) {
                                                                                ?>
                                                                                <?php } ?> style="width:
                                                                                <?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>;
                                                                                ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Starting Course : </label>
                                                                        <span>
                                                                            <?php echo $val->startingCourse; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Added By : </label>
                                                                        <span>
                                                                            <?php echo $val->addBy; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Paresent Date : </label>
                                                                        <?php $stdate = explode(" ",$val->addDate); ?>
                                                                        <span>
                                                                            <?php echo $stdate[0]; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Start Date : </label>
                                                                        <?php $stdate = explode("-",$val->demoDate); ?>
                                                                        <span>
                                                                            <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap  text-dark">
                                                                        <label>Assign To : </label>
                                                                        <span>
                                                                                <?php if($val->faculty_id) {foreach($all_faculty as $row){ if($row->faculty_id == $val->faculty_id) { echo $row->name ; } } }
                                                                                else {
                                                                                    foreach($list_user as $row){ if($row->user_id == $val->hod_id) { echo $row->name ; } }
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-md-6 col-lg-3">
                                                                  <div class="demo_detail_wrap text-dark d-flex">
                                                                     <div class="mr-3">
                                                                        <label class="d-block">Course Category :</label>
                                                                     </div>
                                                                     <div>
                                                                        <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                              <input class="form-check-input" type="radio"
                                                                                 name="quick_course_package" id="exampleRadios1"
                                                                                 value="package" <?php if($val->course_type=="package") { ?>checked = "checked"<?php } ?>>
                                                                              <div class="state p-info">
                                                                                 <i class="icon material-icons">done</i>
                                                                                 <label>Package</label>
                                                                              </div>
                                                                        </div>
                                                                        <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                              <input class="form-check-input" type="radio"
                                                                                 name="quick_course_package" id="exampleRadios2"
                                                                                 value="single" <?php if($val->course_type=="single" || $val->course_type=="Single Course") { ?>checked ="checked"<?php } ?> >
                                                                              <div class="state p-info">
                                                                                 <i class="icon material-icons">done</i>
                                                                                 <label>Single</label>
                                                                              </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                            </div> -->
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Time : </label>
                                                                        <span>
                                                                            <?php echo $val->fromTime; ?> To
                                                                            <?php echo $val->toTime; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Status:</label>
                                                                        <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                        <div class="d-inline-block">
                                                                            <select class="form-control" id="demoStatus"
                                                                                name="demoStatus"
                                                                                onchange="return GetStatus(this,<?php echo $val->demo_id;?>);">
                                                                                <option value="">Select Status</option>
                                                                                <option value="0" <?php if($val->
                                                                                    demoStatus == "0") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Running
                                                                                </option>
                                                                                <option value="1" <?php if($val->
                                                                                    demoStatus == "1") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Done
                                                                                </option>
                                                                                <option value="2" <?php if($val->
                                                                                    demoStatus == "2") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Leave
                                                                                </option>
                                                                                <option value="3" <?php if($val->
                                                                                    demoStatus == "3") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Cancel
                                                                                </option>
                                                                                <option value="4" <?php if($val->
                                                                                    demoStatus == "4") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Confusion
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <?php } else { ?>
                                                                        <div class="d-inline-block">
                                                                            <select class="form-control" id="demoStatus"
                                                                                name="demoStatus"
                                                                                onchange="return GetStatus(this,<?php echo $val->demo_id;?>);"
                                                                                disabled>
                                                                                <option value="">Select Status</option>
                                                                                <option value="0" <?php if($val->
                                                                                    demoStatus == "0") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Running
                                                                                </option>
                                                                                <option value="1" <?php if($val->
                                                                                    demoStatus == "1") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Done
                                                                                </option>
                                                                                <option value="2" <?php if($val->
                                                                                    demoStatus == "2") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Leave
                                                                                </option>
                                                                                <option value="3" <?php if($val->
                                                                                    demoStatus == "3") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Cancel
                                                                                </option>
                                                                                <option value="4" <?php if($val->
                                                                                    demoStatus == "4") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Confusion
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="form-group">
                                                                        <label class="text-dark">Attendence : </label>
                                                                        <div class="d-inline-block ml-1">
                                                                            <div
                                                                                class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                                <input
                                                                                    class="form-check-input package_type"
                                                                                    type="radio" name="attend"
                                                                                    id="attend" value="P"
                                                                                    onclick="return getAttend(this,<?php echo $val->demo_id;?>)">
                                                                                <div class="state p-info">
                                                                                    <i
                                                                                        class="icon material-icons">done</i>
                                                                                    <label>P</label>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                                <input
                                                                                    class="form-check-input course_type"
                                                                                    type="radio" name="attend"
                                                                                    id="attend" value="A"
                                                                                    onclick="return getAttend(this,<?php echo $val->demo_id;?>)">
                                                                                <div class="state p-info">
                                                                                    <i
                                                                                        class="icon material-icons">done</i>
                                                                                    <label>A</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php }?>
                                                                <div
                                                                    class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                                                                    <div>
                                                                        <a href="javascript:attend_remark(<?php echo $val->demo_id;?>)"
                                                                            class="btn btn-info btn-sm text-white">Attendance
                                                                            & follow
                                                                            up</a>
                                                                        <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") {?>
                                                                        <input
                                                                            class="btn btn-primary btn-sm ml-2 full_submit_form"
                                                                            type="submit" name="full_submit_form"
                                                                            id="full_submit_form" value="Submit">
                                                                        <?php }?>
                                                                        <a href="javascript:View_single(<?php echo  $val->demo_id ;?>)"
                                                                            class="bg-primary action-icon text-white btn-primary ml-2"><i
                                                                                class="far fa-eye"></i></a>
                                                                        <a href="javascript:View_history(<?php echo $val->demo_id ;?>)"
                                                                            class="bg-primary action-icon text-white btn-primary ml-2 open_rightsidebar mt-2 mt-sm-0"><i
                                                                                class="fas fa-history"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; } } } ?>
                                    </div>


                                </div>
                                <div class="main-accordion shadow-sm card card-primary mb-3">
                                    <?php date_default_timezone_set("Asia/Calcutta");
                           $time = time();
                           $current_hour =  date('H', $time); 
                           $current_hour = $current_hour + 1;
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
                                    <h6 class="accordion-title d-flex flex-wrap align-items-center justify-content-between p-3 mb-0"
                                        href="javascript:void(0)">
                                        <?php if(!empty($sdt)) { echo $sdt." To ".$edt." Timing Demo Students";    } ?><i
                                            class="fa fa-angle-down"></i>
                                    </h6>
                                    <div class="accordion-content show" style="display: none;">

                                        <?php foreach($demo_all as $val)  { 
                
                               $i=1;     
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
                               if($val->attendance=="") { $day=0; }  if($flag==0) {
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
                              
                              if($current_hour == $hour) { ?>
                                        <div class="row mx-0">
                                            <div class="col-12 mb-3">
                                                <div class="card-item shadow-sm">
                                                    <?php if($val->demoStatus == "0") { $holding = "info" ; } else if($val->demoStatus == "1") {$holding = "primary" ;} else if($val->demoStatus == "2") {$holding = "hold" ;} else if($val->demoStatus == "3") { $holding = "red" ;} else if($val->demoStatus == "4") { $holding = "warning" ; } ?>
                                                    <div class="card card-<?php echo $holding; ?>">
                                                        <div class="card-header form-title">
                                                            <h4 title="Mobile No :<?php echo $val->mobileNo; ?>">
                                                                <?php echo $val->name; ?>(
                                                                <?php echo $val->demo_id; ?>)
                                                            </h4>
                                                        </div>
                                                        <div class="card-body px-0 pt-1">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>
                                                                            <?php if(!empty($val->courseName)) { echo "Course Nme " ;} else { echo "Package Name "; } ?>
                                                                            :
                                                                        </label>
                                                                        <span>
                                                                            <?php if(!empty($val->courseName)) { echo $val->courseName ;} else { echo $val->packageName; } ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Branch : </label>
                                                                        <span>
                                                                            <?php foreach($all_branches as $row) { if($val->branch_id == $row->branch_id) {echo  $row->branch_name;} } ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Department : </label>
                                                                        <span>
                                                                            <?php foreach($list_department as $row) { if($val->department_id == $row->department_id) {echo  $row->department_name;} } ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap  text-dark">
                                                                        <label>Present Days :</label>
                                                                        <div class="progress shadow-none d-inline-flex"
                                                                            style="width:70%">
                                                                            <span class="position-absolute"
                                                                                style="top:-25px;right:25px;">
                                                                                <?php if(!empty($val->attendance)) {  echo $day;  ?>
                                                                                Days
                                                                                <?php } ?>
                                                                            </span>
                                                                            <div class="progress-bar" <?php if($day>5) {
                                                                                ?>
                                                                                <?php } ?> style="width:
                                                                                <?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>;
                                                                                ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Starting Course : </label>
                                                                        <span>
                                                                            <?php echo $val->startingCourse; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Added By : </label>
                                                                        <span>
                                                                            <?php echo $val->addBy; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Paresent Date : </label>
                                                                        <?php $stdate = explode(" ",$val->addDate); ?>
                                                                        <span>
                                                                            <?php echo $stdate[0]; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Start Date : </label>
                                                                        <?php $stdate = explode("-",$val->demoDate); ?>
                                                                        <span>
                                                                            <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap  text-dark">
                                                                        <label>Assign To : </label>
                                                                        <span>
                                                                                <?php if($val->faculty_id) {foreach($all_faculty as $row){ if($row->faculty_id == $val->faculty_id) { echo $row->name ; } } }
                                                                                else {
                                                                                    foreach($list_user as $row){ if($row->user_id == $val->hod_id) { echo $row->name ; } }
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-md-6 col-lg-3">
                                                            <div class="demo_detail_wrap text-dark d-flex">
                                                                <div class="mr-3">
                                                                    <label class="d-block">Course Category :</label>
                                                                </div>
                                                                <div>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="quick_course_package" id="exampleRadios1"
                                                                            value="package" <?php if($val->course_type=="package") { ?>checked = "checked"<?php } ?>>
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Package</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="quick_course_package" id="exampleRadios2"
                                                                            value="single" <?php if($val->course_type=="single" || $val->course_type=="Single Course") { ?>checked ="checked"<?php } ?> >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Single</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Time : </label>
                                                                        <span>
                                                                            <?php echo $val->fromTime; ?> To
                                                                            <?php echo $val->toTime; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="demo_detail_wrap text-dark">
                                                                        <label>Status:</label>
                                                                        <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                        <div class="d-inline-block">
                                                                            <select class="form-control" id="demoStatus"
                                                                                name="demoStatus"
                                                                                onchange="return GetStatus(this,<?php echo $val->demo_id;?>);">
                                                                                <option value="">Select Status</option>
                                                                                <option value="0" <?php if($val->
                                                                                    demoStatus == "0") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Running
                                                                                </option>
                                                                                <option value="1" <?php if($val->
                                                                                    demoStatus == "1") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Done
                                                                                </option>
                                                                                <option value="2" <?php if($val->
                                                                                    demoStatus == "2") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Leave
                                                                                </option>
                                                                                <option value="3" <?php if($val->
                                                                                    demoStatus == "3") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Cancel
                                                                                </option>
                                                                                <option value="4" <?php if($val->
                                                                                    demoStatus == "4") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Confusion
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <?php } else { ?>
                                                                        <div class="d-inline-block">
                                                                            <select class="form-control" id="demoStatus"
                                                                                name="demoStatus"
                                                                                onchange="return GetStatus(this,<?php echo $val->demo_id;?>);"
                                                                                disabled>
                                                                                <option value="">Select Status</option>
                                                                                <option value="0" <?php if($val->
                                                                                    demoStatus == "0") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Running
                                                                                </option>
                                                                                <option value="1" <?php if($val->
                                                                                    demoStatus == "1") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Done
                                                                                </option>
                                                                                <option value="2" <?php if($val->
                                                                                    demoStatus == "2") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Leave
                                                                                </option>
                                                                                <option value="3" <?php if($val->
                                                                                    demoStatus == "3") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Cancel
                                                                                </option>
                                                                                <option value="4" <?php if($val->
                                                                                    demoStatus == "4") { ?>selected =
                                                                                    "selected"
                                                                                    <?php  }?>>Confusion
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                <div class="col-md-6 col-lg-3">
                                                                    <div class="form-group">
                                                                        <label class="text-dark">Attendence:</label>
                                                                        <div class="d-inline-block ml-1">
                                                                            <div
                                                                                class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                                <input
                                                                                    class="form-check-input package_type"
                                                                                    type="radio" name="attend"
                                                                                    id="attend" value="P"
                                                                                    onclick="return getAttend(this,<?php echo $val->demo_id;?>)">
                                                                                <div class="state p-info">
                                                                                    <i
                                                                                        class="icon material-icons">done</i>
                                                                                    <label>P</label>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                                <input
                                                                                    class="form-check-input course_type"
                                                                                    type="radio" name="attend"
                                                                                    id="attend" value="A"
                                                                                    onclick="return getAttend(this,<?php echo $val->demo_id;?>)">
                                                                                <div class="state p-info">
                                                                                    <i
                                                                                        class="icon material-icons">done</i>
                                                                                    <label>A</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php }?>
                                                                <div
                                                                    class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                                                                    <div>
                                                                        <a href="javascript:attend_remark(<?php echo $val->demo_id;?>)"
                                                                            class="btn btn-info btn-sm text-white">Attendance
                                                                            & follow
                                                                            up</a>
                                                                        <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") {?>
                                                                        <input
                                                                            class="btn btn-primary btn-sm ml-2 full_submit_form"
                                                                            type="submit" name="full_submit_form"
                                                                            id="full_submit_form" value="Submit">
                                                                        <?php }?>
                                                                        <a href="javascript:View_single(<?php echo  $val->demo_id ;?>)"
                                                                            class="bg-primary action-icon text-white btn-primary ml-2"><i
                                                                                class="far fa-eye"></i></a>
                                                                        <a href="javascript:View_history(<?php echo $val->demo_id ;?>)"
                                                                            class="bg-primary action-icon text-white btn-primary ml-2 open_rightsidebar mt-2 mt-sm-0"><i
                                                                                class="fas fa-history"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; } } } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="all_demo_show">
                        <h6>
                            <?php $viewStatus = $this->input->get('status');
               if($viewStatus == "0"){
                  echo "Running Demo Student";
               }else if($viewStatus == "1"){
                  echo "Done Demo Student";
               }else if($viewStatus == "2"){
                  echo "Leave Demo Student";
               }else if($viewStatus == "3"){
                  echo "Cancle Demo Student";
               }else if($viewStatus == "4"){
                  echo "Confusion Demo Student";
                }else if($viewStatus == "5"){
                  echo "Discard Demo Student";
               }else{
                  echo "All Demo Students";
               }
            ?>
        </h6>
            <div class="search_data_row">
                <?php foreach($demo_all as $val) { ?>
                <?php  
               $i=1;     
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
               
               if($val->attendance=="") { $day=0; }  if($flag==0) { ?>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-running-demo" role="tabpanel"
                                            aria-labelledby="pills-running-demo-tab">
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <div class="card-item shadow-sm">
                                                        <?php if($val->demoStatus == "0") { $holding = "info" ; } else if($val->demoStatus == "1") {$holding = "primary" ;} else if($val->demoStatus == "2") {$holding = "hold" ;} else if($val->demoStatus == "3") { $holding = "red" ;} else if($val->demoStatus == "4") { $holding = "warning" ; } ?>
                                                        <div class="card card-<?php echo $holding; ?>">
                                                            <div class="card-header form-title">
                                                                <h4 title="Mobile No :<?php echo $val->mobileNo; ?>">
                                                                    <?php echo $val->name; ?>(
                                                                    <?php echo $val->demo_id; ?>)
                                                                </h4>
                                                            </div>
                                                            <div class="card-body px-0 pt-1">
                                                                <div class="d-flex flex-wrap">
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>
                                                                                <?php if(!empty($val->courseName)) { echo "Single " ;} else { echo "Package "; } ?>
                                                                                :
                                                                            </label>
                                                                            <span>
                                                                                <?php if(!empty($val->courseName)) { echo $val->courseName ;} else { echo $val->packageName; } ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Barnch: </label>
                                                                            <span>
                                                                                <?php foreach($all_branches as $row){ if($val->branch_id == $row->branch_id) { echo $row->branch_name; }  } ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Department: </label>
                                                                            <span>
                                                                                <?php foreach($list_department as $row){ if($val->department_id  == $row->department_id ) { echo $row->department_name; }  } ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div class="demo_detail_wrap  text-dark">
                                                                            <label>Present Days :</label>
                                                                            <div class="progress shadow-none d-inline-flex"
                                                                                style="width: calc(100% - 110px);">
                                                                                <span class="position-absolute"
                                                                                    style="top:-10px;right:25px;">
                                                                                    <?php if(!empty($val->attendance)) {  echo $day;  ?>
                                                                                    Days
                                                                                    <?php } ?>
                                                                                </span>
                                                                                <div class="progress-bar" <?php if($day>
                                                                                    5) { ?>
                                                                                    <?php } ?> style="width:
                                                                                    <?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>;
                                                                                    ">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Starting Course: </label>
                                                                            <span>
                                                                                <?php echo $val->startingCourse; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Added By: </label>
                                                                            <span>
                                                                                <?php echo $val->addBy; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Present Date : </label>
                                                                            <?php $stdate = explode(" ",$val->addDate); ?>
                                                                            <span>
                                                                                <?php echo $stdate[0]; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Start Date : </label>
                                                                            <?php $stdate = explode("-",$val->demoDate); ?>
                                                                            <span>
                                                                                <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div class="demo_detail_wrap  text-dark">
                                                                            <label>Assign To : </label>
                                                                            <span>
                                                                                <?php if($val->faculty_id) {foreach($all_faculty as $row){ if($row->faculty_id == $val->faculty_id) { echo $row->name ; } } }
                                                                                else {
                                                                                    foreach($list_user as $row){ if($row->user_id == $val->hod_id) { echo $row->name ; } }
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="col-lg-3 col-md-6 px-md-2">
                                                    <div class="demo_detail_wrap text-dark d-flex">
                                                        <div class="mr-1">
                                                            <label class="d-block">Course Category :</label>
                                                        </div>
                                                         <div>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2 mr-1">
                                                                <input class="form-check-input" type="radio"
                                                                    name="quick_course_package" id="exampleRadios1 <?php  echo $val->demo_id; ?>"
                                                                    value="package" <?php if(@$val->course_type=="single") { echo "checked"; } ?>>
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Package</label>
                                                                </div>
                                                            </div>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2 mr-1">
                                                                <input class="form-check-input" type="radio" name="quick_course_package" id="exampleRadios2 <?php  echo $val->demo_id; ?>" value="single" <?php if(@$val->course_type=="single") { echo "checked"; } ?>>
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Single</label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <span><?php echo $val->course_type; ?></span>
                                                    </div>
                                                </div> -->
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Time : </label>
                                                                            <span>
                                                                                <?php echo $val->fromTime; ?> To
                                                                                <?php echo $val->toTime; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Status:</label>
                                                                            <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                            <div class="d-inline-block">
                                                                                <select class="form-control"
                                                                                    id="demoStatus" name="demoStatus"
                                                                                    onchange="return GetStatus(this,<?php echo $val->demo_id;?>);">
                                                                                    <option value="">Select Status
                                                                                    </option>
                                                                                    <option value="0" <?php if($val->
                                                                                        demoStatus == "0") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Running
                                                                                    </option>
                                                                                    <option value="1" <?php if($val->
                                                                                        demoStatus == "1") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Done
                                                                                    </option>
                                                                                    <option value="2" <?php if($val->
                                                                                        demoStatus == "2") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Leave
                                                                                    </option>
                                                                                    <option value="3" <?php if($val->
                                                                                        demoStatus == "3") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Cancel
                                                                                    </option>
                                                                                    <option value="4" <?php if($val->
                                                                                        demoStatus == "4") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Confusion
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <?php } else { ?>
                                                                            <div class="d-inline-block text-dark">
                                                                                <select class="form-control"
                                                                                    id="demoStatus" name="demoStatus"
                                                                                    onchange="return GetStatus(this,<?php echo $val->demo_id;?>);"
                                                                                    disabled>
                                                                                    <option value="">Select Status
                                                                                    </option>
                                                                                    <option value="0" <?php if($val->
                                                                                        demoStatus == "0") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Running
                                                                                    </option>
                                                                                    <option value="1" <?php if($val->
                                                                                        demoStatus == "1") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Done
                                                                                    </option>
                                                                                    <option value="2" <?php if($val->
                                                                                        demoStatus == "2") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Leave
                                                                                    </option>
                                                                                    <option value="3" <?php if($val->
                                                                                        demoStatus == "3") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Cancel
                                                                                    </option>
                                                                                    <option value="4" <?php if($val->
                                                                                        demoStatus == "4") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Confusion
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                    <div class="col-md-6 col-lg-3">
                                                                        <div
                                                                            class="form-group text-dark demo_detail_wrap">
                                                                            <label class="text-dark">Attendence :
                                                                            </label>
                                                                            <div class="d-inline-block ml-1">
                                                                                <div
                                                                                    class="pretty p-icon p-jelly p-round p-bigger">
                                                                                    <input
                                                                                        class="form-check-input package_type"
                                                                                        type="radio" name="attend"
                                                                                        id="attend" value="P"
                                                                                        onclick="return getAttend(this,<?php echo $val->demo_id;?>)">
                                                                                    <div class="state p-info">
                                                                                        <i
                                                                                            class="icon material-icons">done</i>
                                                                                        <label>P</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                                    <input
                                                                                        class="form-check-input course_type"
                                                                                        type="radio" name="attend"
                                                                                        id="attend" value="A"
                                                                                        onclick="return getAttend(this,<?php echo $val->demo_id;?>)">
                                                                                    <div class="state p-info">
                                                                                        <i
                                                                                            class="icon material-icons">done</i>
                                                                                        <label>A</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php }?>
                                                                    <div
                                                                        class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                                                                        <div>
                                                                            <a href="javascript:attend_remark(<?php echo $val->demo_id ;?>)"
                                                                                class="btn btn-info btn-sm text-white">Attendance
                                                                                & follow
                                                                                up</a>
                                                                            <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                            <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") {?>
                                                                            <input
                                                                                class="btn btn-primary btn-sm ml-2 full_submit_form"
                                                                                type="submit" name="full_submit"
                                                                                value="Submit" id=full_submit_form>
                                                                            <?php }?>
                                                                            <a href="javascript:View_single(<?php echo  $val->demo_id ;?>)"
                                                                                class="bg-primary action-icon text-white btn-primary ml-2"><i
                                                                                    class="far fa-eye"></i></a>
                                                                            <a href="javascript:AddRmark(<?php echo $val->demo_id ;?>)"
                                                                                class="bg-primary action-icon text-white btn-primary ml-2"><i
                                                                                    class="fas fa-comment-alt"></i></a>
                                                                            <a href="javascript:View_history(<?php echo $val->demo_id ;?>)"
                                                                                class="bg-primary action-icon text-white btn-primary ml-2 open_rightsidebar mt-2 mt-sm-0"><i
                                                                                    class="fas fa-history"></i></a>
                                                                            <?php }?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; } } ?>
                                </div>
                    </div>
                </div>
            </div>
            <div class="extra_sidebar-menu">
                <div class="">
                    <button class="close-sidebar-left">X</button>
                    <div class="rsidebar-items send-sms admission-remraks">
                        <div class="rsidebar-title">
                            <h3 class="mb-0">Demo History</h3>
                        </div>
                        <div class="rsidebar-middle p-0 history">
                            <div class="accordion">
                                <div class="accordion-body">
                                    <span><b>Course Name : </b><a class="text-dark">(Fashion Designing-2021)</a></span>
                                    <span><b>Paresent Date : </b><a class="text-dark">25-08-2021</a></span>
                                    <span><b>Start Date : </b><a class="text-dark">15-06-2021</a></span>
                                    <span><b>Assign To : </b><a class="text-dark">Hitesh Koladiya</a></span>
                                    <span><b>Time : </b><a class="text-dark">11:00 AM To 1:00 PM</a></span>
                                    <span><b>Status : </b><a class="text-dark">Running</a></span>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-body">
                                    <span><b>Course Name : </b><a class="text-dark">(Fashion Designing-2021)</a></span>
                                    <span><b>Paresent Date : </b><a class="text-dark">25-08-2021</a></span>
                                    <span><b>Start Date : </b><a class="text-dark">15-06-2021</a></span>
                                    <span><b>Assign To : </b><a class="text-dark">Hitesh Koladiya</a></span>
                                    <span><b>Time : </b><a class="text-dark">11:00 AM To 1:00 PM</a></span>
                                    <span><b>Status : </b><a class="text-dark">Running</a></span>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-body">
                                    <span><b>Course Name : </b><a class="text-dark">(Fashion Designing-2021)</a></span>
                                    <span><b>Paresent Date : </b><a class="text-dark">25-08-2021</a></span>
                                    <span><b>Start Date : </b><a class="text-dark">15-06-2021</a></span>
                                    <span><b>Assign To : </b><a class="text-dark">Hitesh Koladiya</a></span>
                                    <span><b>Time : </b><a class="text-dark">11:00 AM To 1:00 PM</a></span>
                                    <span><b>Status : </b><a class="text-dark">Running</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" tabindex="-1" role="dialog" id="attendance_follow_up" aria-labelledby="attendance_follow_up"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="background-color:#f7f7f7;">
                <div class="modal-header px-3">
                    <h5 class="page-title text-primary" id="myLargeModalLabel">
                        <div id="student_name_single"></div>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body px-3 pt-0">
                    <div class="card-item shadow-sm">
                        <div class="card card-primary">
                            <div class="card-header form-title">
                                <h4>Attendance Detail</h4>
                            </div>
                            <div class="card-body px-3 py-1">
                                <div class="attendance_table" id="attendance_table">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-item shadow-sm">
                        <div class="card card-primary">
                            <div class="card-header form-title">
                                <h4>Follow Up Details</h4>
                            </div>
                            <div class="card-body px-3 py-1">
                                <div class="follow_table" id="follow_table">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-item shadow-sm">
                        <div class="card card-primary">
                            <div class="card-header form-title">
                                <h4>Remark Details</h4>
                            </div>
                            <div class="card-body px-3 py-1">
                                <div class="remark_wrap" id="remark_wrap">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade filter-dashboard" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="myLargeModalLabel">Batch Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url();?>Common/View_demo" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Branch</label>
                                    <select class="form-control" name="filter_branch">
                                        <option>-----Select Branch-----</option>
                                        <?php foreach($all_branches as $val) {  ?>
                                        <option <?php if(@$filter_branch==$val->branch_id) { echo "selected"; } ?>
                                            value="
                                            <?php echo $val->branch_id; ?>">
                                            <?php echo $val->branch_name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                     <div class="form-group">
                        <label>Select Department</label>
                        <select class="form-control" name="filter_department">
                        <option>-----Select Department-----</option>
                        <?php foreach($list_department as $val) {  ?>
                        <option <?php if(@$filter_department==$val->department_id) { echo "selected"; } ?> value="<?php echo $val->department_id ; ?>"><?php echo $val->department_name; ?></option>
                        <?php } ?>
                        </select>
                     </div>
                  </div> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Faculty Name</label>
                                    <select class="form-control" name="filter_faculty">
                                        <option>-----Select Faculty-----</option>
                                        <?php foreach($list_faculty as $val) {  ?>
                                        <option <?php if(@$filter_faculty==$val->faculty_id) { echo "selected"; } ?>
                                            value="
                                            <?php echo $val->faculty_id ; ?>">
                                            <?php echo $val->name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Select Course</label>
                                    <select class="form-control" name="filter_course">
                                        <option>-----Select Course-----</option>
                                        <?php foreach($list_course as $val) {  ?>
                                        <option <?php if(@$filter_course==$val->course_id) { echo "selected"; } ?>
                                            value="
                                            <?php echo $val->course_id  ; ?>">
                                            <?php echo $val->course_name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Select Package</label>
                                    <select class="form-control" name="filter_package">
                                        <option>-----Select Package------</option>
                                        <?php foreach($list_package as $val) {  ?>
                                        <option <?php if(@$filter_package==$val->package_id) { echo "selected"; } ?>
                                            value="
                                            <?php echo $val->package_id ; ?>">
                                            <?php echo $val->package_name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Student Name</label>
                                    <input type="text" class="form-control" name="filter_name"
                                        value="<?php if(!empty($filter_name)) { echo $filter_name; } ?>"
                                        placeholder="Student Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Student Demo ID</label>
                                    <input type="text" class="form-control" name="filter_demo_id"
                                        value="<?php if(!empty($filter_demo_id)) { echo $filter_demo_id; } ?>"
                                        placeholder="Student Demo ID">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="filter_number"
                                        value="<?php if(!empty($filter_number)) { echo $filter_number; } ?>"
                                        placeholder="Filter Phone Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" name="filter_start_date"
                                        value="<?php if(!empty($filter_start_date)) { echo $filter_start_date; } ?>"
                                        placeholder="Start Date">
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" name="filter_end_date"
                                        value="<?php if(!empty($filter_end_date)) { echo $filter_end_date; } ?>"
                                        placeholder="End Date">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Filter" name="demo_filter">
                                    <a class="btn btn-light text-dark ml-md-2"
                                        href="<?php echo base_url();?>Common/view_demo">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal with form -->
    <div class="modal fade" id="ReasoneModel" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="demo_id_status" name="demo_id_status">
                    <input type="hidden" id="demo_status" name="demo_status">
                    <div class="form-group" id="lable_remark_id">
                        <label>Select Lable:</label>
                        <div class="form-group">
                            <select class="form-control" name="lable_remark" id="lable_remark">
                                <option>-----Select lable-----</option>
                                <?php foreach($reason_list as $val) {  ?>
                                <option value="<?php echo $val->reasonName ; ?>">
                                    <?php echo $val->reasonName; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="remark_id">
                        <label>Reason:</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" id="remarks" name="remarks" value=""
                                rows="7"></textarea>
                        </div>
                    </div>
                    <div class="form-group" id="from_date_id">
                        <label>From :</label>
                        <div class="input-group">
                            <input type="date" class="form-control fromdate" id="fromdate" name="fromdate" value="">
                        </div>
                    </div>
                    <div class="form-group" id="willdate_id">
                        <label>Will come:</label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="willdate" name="willdate" value="">
                        </div>
                    </div>
                    <div class="form-group mb-0">
                    </div>
                    <button type="button" id="remark_submit" style="margin-left:20px;"
                        class="btn btn-primary m-t-15 waves-effect remark_submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- basic modal -->
    <div class="modal fade" id="AddRemark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remark</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="demo_rem_id" id="demo_rem_id">
                    <div class="col-md-12 px-md-0">
                        <div class="form-group">
                            <label>Add Remark</label>
                            <textarea rows="5" class="form-control" id="demo_remark_comment"
                                name="demo_remark_comment"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-10 waves-effect" id="ad_remark_demo"
                        name="ad_remark_demo">Add remark</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="extra_sidebar-menu history-for-demo">
    <div class="">
        <button class="close-sidebar-left">X</button>
        <div class="rsidebar-items send-sms admission-remraks">
            <div class="rsidebar-title">
                <h3 class="mb-0">Demo History</h3>
            </div>
            <div class="rsidebar-middle p-0 remarks_data">

            </div>
        </div>
    </div>
</div>
<div class="extra_sidebar-menu filter-for-demoreco">
    <div class="">
        <button class="close-sidebar-left">X</button>
        <div class="rsidebar-items send-sms admission-remraks">
            <div class="rsidebar-title">
                <h3 class="mb-0">Demo Filter</h3>
            </div>
            <div class="rsidebar-middle p-0">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label for="FirstName">Full Name</label>
                                <input type="text" maxlength="50" class="form-control" id="filter_name"
                                    placeholder="Full Name"
                                    value="<?php if(!empty($filter_prospected_name)) { echo @$filter_prospected_name; } ?>"
                                    name="filter_prospected_name">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="tel" class="form-control" id="filter_number" name="filter_mobile"
                                    placeholder="Mobile"
                                    value="<?php if(!empty($filter_mobile)) { echo @$filter_mobile; } ?>">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label>Demo_ id</label>
                                <input type="tel" class="form-control" id="filter_demo_id" name="filter_demo_id"
                                    placeholder="Demi Id"
                                    value="<?php if(!empty($filter_mobile)) { echo @$filter_mobile; } ?>">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label>Faculty Name</label>
                                <select class="form-control" name="filter_faculty" id="filter_faculty">
                                    <option>-----Select Faculty-----</option>
                                    <?php foreach($all_faculty as $val) {?>
                                    <option <?php if(@$filter_faculty==$val->faculty_id) { echo "selected"; } ?> value="
                                        <?php echo $val->faculty_id; ?>">
                                        <?php echo $val->name; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label>Select Branch</label>
                                <select class="form-control" name="filter_branch" id="filter_branch">
                                    <option>-----Select Branch-----</option>
                                    <?php foreach($all_branches as $row) {?>
                                    <option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?> value="
                                        <?php echo $row->branch_id; ?>">
                                        <?php echo $row->branch_name; ?>
                                    </option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label>Select Course</label>
                                <select class="form-control" name="filter_course" id="filter_course">
                                    <option>-----Select Course-----</option>
                                    <?php foreach($list_course as $val) {  ?>
                                    <option <?php if(@$filter_course==$val->course_name) { echo "selected"; } ?> value="
                                        <?php echo $val->course_name  ; ?>">
                                        <?php echo $val->course_name; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label>Select Package</label>
                                <select class="form-control" name="filter_package" id="filter_package">
                                    <option>-----Select Package------</option>
                                    <?php foreach($list_package as $val) {  ?>
                                    <option <?php if(@$filter_package==$val->package_id) { echo "selected"; } ?> value="
                                        <?php echo $val->package_name ; ?>">
                                        <?php echo $val->package_name; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" class="form-control" name="filter_start_date" id="filter_start_date"
                                    value="<?php if(!empty($filter_start_date)) { echo $filter_start_date; } ?>"
                                    placeholder="Start Date">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" class="form-control" name="filter_end_date" id="filter_end_date"
                                    value="<?php if(!empty($filter_end_date)) { echo $filter_end_date; } ?>"
                                    placeholder="End Date">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-fix-bottom">
                                <div class="btn-group mb-3 float-right" role="group" aria-label="Basic example">
                                    <a href="<?php echo base_url(); ?>Common/View_demo"
                                        class="btn btn-light text-dark">Reset</a>
                                    <button type="button" class="btn btn-primary text-white"
                                        onclick="return filtering_lead()">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="" id="demo_ids">
<input type="hidden" name="" id="demo_status_ids">
<div class="modal fade demo_single_detail" id="demo_single_detail" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="myLargeModalLabel">Demo Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link btn-sm active" id="pills-details-tab" data-toggle="pill" href="#home1"
                            role="tab" aria-controls="pills-details" aria-selected="true">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-sm" id="pills-edit-tab" data-toggle="pill" href="#home2" role="tab"
                            aria-controls="pills-edit" aria-selected="false">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-sm" id="pills-discard-tab" data-toggle="pill" href="#home3" role="tab"
                            aria-controls="pills-discard" aria-selected="false">Discard</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active detail" id="home1" role="tabpanel"
                        aria-labelledby="pills-details-tab">
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group demo_detail_wrap text-dark">
                                            <label>Demo Id:</label>
                                            <span name="demo_id" id="demo_id"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group demo_detail_wrap text-dark">
                                            <label>Name:</label>
                                            <span name="stu_name" id="stu_name"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group demo_detail_wrap text-dark">
                                            <label> Mobile Number:</label>
                                            <span name="mob_number" id="mob_number"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group demo_detail_wrap text-dark">
                                            <label id="pack_or_cor"></label>
                                            <span name="cour_or_peck" id="cour_or_peck"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group demo_detail_wrap text-dark">
                                            <label id="s_pac_cor"></label>
                                            <span name="starting_course" id="starting_course"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group demo_detail_wrap text-dark">
                                            <label>Demo Date:</label>
                                            <span name="starting_date" id="starting_date"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group demo_detail_wrap text-dark">
                                            <label>Demo Time:</label>
                                            <span name="de_time" id="de_time"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group demo_detail_wrap text-dark">
                                            <label>Faculty name:</label>
                                            <span name="fac_name" id="fac_name"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group demo_detail_wrap text-dark">
                                            <label>Total Attendence:</label>
                                            <span name="total_att" id="total_att"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group demo_detail_wrap text-dark">
                                            <label>Demo Status:</label>
                                            <div class="d-inline-block text-white" id="status_demo"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade edit" id="home2" role="tabpanel" aria-labelledby="pills-edit-tab">
                        <input type="hidden" name="demo_id_edit" id="demo_id_edit">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail4">Date:</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputPassword4">Name:</label>
                                    <input type="text" class="form-control" id="stud_name" name="stud_name"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputPassword4">Mobile no: </label>
                                    <input type="text" class="form-control moblie_no_d" id="moblie_no_d"
                                        name="moblie_no_d" placeholder="Mobile no">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputPassword4">Branch:</label>
                                    <select id="inputState"
                                        class="form-control branch_two branch_ids barch_wise_faculty_two"
                                        name="branch_ids_d" id="branch_ids" onchange="branch_data(this)">
                                        <option value="">Select Barnch</option>
                                        <?php foreach($list_branch as $val) { ?>
                                        <option value="<?php echo $val->branch_id; ?>">
                                            <?php echo $val->branch_name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputPassword4">Faculty:</label>
                                    <select id="inputState" class="form-control faculty_ids clgfids" name="faculty_ids"
                                        id="faculty_ids">
                                        <option value="">----Select faculty-----</option>
                                        <?php foreach($list_user as $val) { ?>
                                        <option value="<?php echo $val->user_id ; ?>">
                                            <?php echo $val->name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputPassword4">Time From :</label>
                                    <input type="text" class="form-control timeFrom" id="timeFrom" name="timeFrom"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputPassword4">To: </label>
                                    <input type="text" class="form-control toTime" id="toTime" name="toTime">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="d-block">Course Category</label>
                                    <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                        <input class="form-check-input package_type" type="radio" name="courses_type"
                                            id="courses_type" value="package" onclick="show_hide_package_course_two()">
                                        <div class="state p-info">
                                            <i class="icon material-icons">done</i>
                                            <label>Package</label>
                                        </div>
                                    </div>
                                    <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                        <input class="form-check-input course_type" type="radio" name="courses_type"
                                            id="courses_type" value="single" onclick="show_hide_package_course_two()">
                                        <div class="state p-info">
                                            <i class="icon material-icons">done</i>
                                            <label>Single</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 select_course_package_two section-hidden">
                                <div class="form-group">
                                    <label>Select Course*</label>
                                    <select class="form-control course_or_single_two subco" name="course_orsingle_two"
                                        id="course_orsingle_two">
                                        <option value="">----Select Course----</option>
                                        <?php foreach($list_course as $val) { ?>
                                        <option value="<?php echo $val->course_name ; ?>">
                                            <?php echo $val->course_name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 select_course_single_two section-hidden">
                                <div class="form-group ">
                                    <label>Select Package:</label>
                                    <select class="form-control subpa pafees course_or_package_two"
                                        name="course_or_package_two" id="course_or_package_two">
                                        <option value="">----Select package----</option>
                                        <?php foreach($list_package as $val) { ?>
                                        <option value="<?php echo $val->package_name ; ?>">
                                            <?php echo $val->package_name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <input type="submit" class="btn btn-primary" value="Submit" id="edit_demo"
                                    name="edit_demo">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade discard" id="home3" role="tabpanel" aria-labelledby="pills-discard-tab">
                        <input type="hidden" id="discard" name="discard" value="1">
                        <div class="form-group" id="lable_remark_id">
                            <label>Select Lable:</label>
                            <div class="form-group">
                                <select class="form-control" name="demo_discard_reason" id="demo_discard_reason">
                                    <option>-----Select lable-----</option>
                                    <?php foreach($reason_list as $val) {  ?>
                                    <option value="<?php echo $val->reasonName ; ?>">
                                        <?php echo $val->reasonName; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="remark_id">
                            <label>Reason:</label>
                            <div class="input-group">
                                <textarea type="text" class="form-control" id="demo_discard_comment"
                                    name="demo_discard_comment" value="" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <input type="submit" class="btn btn-primary" value="Submit" id="discard_demo"
                                name="discard_demo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade bd-example-modal-sm attresone" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">Take Attendence</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="att" id="att">
                <input type="hidden" name="demo_id_att" id="demo_id_att">
                <div class="form-group att_remark_id" id="att_remark_id">
                    <label>Reason:</label>
                    <div class="input-group">
                        <textarea type="text" class="form-control" id="demo_absent_comment" name="demo_absent_comment"
                            value="" rows="7"></textarea>
                    </div>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-primary" value="Submit" id="attend_demo" name="attend_demo">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
<script
    src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script
    src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script
    src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/owlcarousel2/dist/owl.carousel.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
<!-- JS Libraies -->
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- JS Libraies -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- JS Libraies -->
<!-- <script>
    $( document ).ready(function() { 
      $getheight = $( window ).height();
      
      $navheight = $('.navbar-bg').height();
      $topheight = $('.extra_top-menu').height();
      $bredheight = $('.main-content > .row').height();
    
      $totalheight = $navheight + $topheight + $bredheight;
     
      $get_Height = $(window).height() - $totalheight - 55;
      $('.view_demoM').css("height", $get_Height);
   });
 </script>
 <script>
    $(".view_demoM").niceScroll({
    cursorcolor:"#5864bd"
    }); 

 </script> -->
<script type="text/javascript">
    $(".sub_demo, .search_data_row").niceScroll({
        cursorcolor: "#5864bd"
    });
    jQuery(".nicescroll-rails-vr").clone().appendTo(".search_data_row");
    jQuery(".nicescroll-rails-hr").remove();
    $('.owl-carousel').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                loop: true
            },
            600: {
                items: 3,
                loop: true
            },
            1000: {
                items: 3,
                loop: true
            }
        }
    })

</script>
<script>
    function View_single(demo_id) {
        $.ajax({
            url: "<?php echo base_url(); ?>Common/get_single_reco",
            type: "post",
            data: {
                'id': demo_id,
            },
            success: function (Resp) {
                $('.demo_single_detail').modal();
                var data = $.parseJSON(Resp);
                var demo_id = data['single_reco_demo'].demo_id;
                var name = data['single_reco_demo'].name;
                var mobileNo = data['single_reco_demo'].mobileNo;
                var courseName = data['single_reco_demo'].courseName;
                var packageName = data['single_reco_demo'].packageName;
                var startingCourse = data['single_reco_demo'].startingCourse;
                var demoDate = data['single_reco_demo'].demoDate;
                var faculty_id = data['single_reco_demo'].faculty_id;
                var fromTime = data['single_reco_demo'].fromTime;
                var toTime = data['single_reco_demo'].toTime;
                var branch_id = data['single_reco_demo'].branch_id;
                var Pday = data['present_att'];
                var Aday = data['Absent_att'];
                var demoStatus = data['single_reco_demo'].demoStatus;
                var fac_name = data['single_faculty'].name
                var demotime = fromTime + "        to       " + toTime;
                var atten = "P :" + Pday + "  " + "  A: " + Aday;

                $('#timeFrom').val(fromTime);
                $('#toTime').val(toTime);
                $('#demo_id').html(demo_id);
                $('#demo_id_edit').val(demo_id);
                $('#stu_name').html(name);
                $('#stud_name').val(name);
                $('#mob_number').html(mobileNo);
                $('#moblie_no_d').val(mobileNo);
                $('.branch_ids').val(branch_id);
                $('#starting_date').html(demoDate);
                $('#startDate').val(demoDate);
                $('#de_time').html(demotime);
                $('#total_att').html(atten);
                $('#fac_name').html(fac_name);
                $('#faculty_ids').html(faculty_id);
                var corType = data['single_reco_demo'].course_type;
                var demoStatus = data['single_reco_demo'].demoStatus;
                if (corType == "package") {
                    $('#pack_or_cor').html("Demo Package : ");
                    $('#s_pac_cor').html("Starting Demo Package : ");
                    $('#cour_or_peck').html(packageName);
                    $('#starting_course').html(packageName);
                    $('.package_type').attr("checked", "checked");
                    $('.select_course_single_two').show();
                    $('.select_course_package_two').hide();
                    $('.course_or_package_two').val(packageName);
                }
                else if (corType == "single") {
                    $('#pack_or_cor').html("Demo course : ");
                    $('#s_pac_cor').html("Starting Demo Course : ");
                    $('#cour_or_peck').html(courseName);
                    $('#starting_course').html(courseName);
                    $('.course_type').attr("checked", "checked");
                    $('.select_course_single_two').hide();
                    $('.select_course_package_two').show();
                    $('.course_or_single_two').val(courseName);
                }
                else if (corType == "Single Course") {
                    $('#pack_or_cor').html("Demo course : ");
                    $('#s_pac_cor').html("Starting Demo Course : ");
                    $('#cour_or_peck').html(courseName);
                    $('#starting_course').html(courseName);
                }
                else {
                    alert("something wrong");
                }

                if (demoStatus == "0") {
                    $("#status_demo").html("<span class='badge badge-primary text-white'>Running</span>");
                    $("#status_demo_mod").html("Running");


                }
                else if (demoStatus == "1") {
                    $("#status_demo").html("<span class='badge badge-success'>Done</span>");
                    $("#status_demo_mod").html("Done");
                }
                else if (demoStatus == "2") {
                    $("#status_demo").html("<span class='badge badge-hold'>leave</span>");
                    $("#status_demo_mod").html("Leave");

                }
                else if (demoStatus == "3") {
                    $("#status_demo").html("<span class='badge badge-red'>Cancle</span>");
                    $("#status_demo_mod").html("Cancle");

                }
                else if (demoStatus == "4") {
                    $("#status_demo").html("<span class='badge badge-info'>Confusion</span>");
                    $("#status_demo_mod").html("Info");

                }
                else {
                    alert("Wrong");
                }

            }
        });
    }
</script>
<script>
    function attend_remark(demo_id) {

        $('#attendance_follow_up').modal();
        $.ajax({
            url: "<?php echo base_url(); ?>Common/get_recoDemo",
            type: "post",
            data: {
                'id': demo_id,
            },
            success: function (Resp) {
                $('#attendance_table').html(Resp);
                var data = $.parseJSON(Resp);
                console.log(data);
                var name = data['single_reco_demo'].name;
                $('#student_name_single').html(name);
            }
        });

        $.ajax({
            url: "<?php echo base_url(); ?>Common/get_followup",
            type: "post",
            data: {
                'id': demo_id,
            },
            success: function (Resp) {
                $('#follow_table').html(Resp);
            }
        });

        $.ajax({
            url: "<?php echo base_url(); ?>Common/get_recoRemarks",
            type: "post",
            data: {
                'id': demo_id,
            },
            success: function (Resp) {
                $('#remark_wrap').html(Resp);
            }
        });

        $.ajax({
            url: "<?php echo base_url(); ?>Common/get_recoDemo1",
            type: "post",
            data: {
                'id': demo_id,
            },
            success: function (Resp) {
                var data = $.parseJSON(Resp);
                console.log(data);
                var name = data['single_reco_demo'].name;
                $('#student_name_single').html(name);
            }
        });

    }



</script>
<script>
    function show_hide_package_course_two() {
        var courses_type = $("input[name='courses_type']:checked").val();
        //alert(courses_type);
        if (courses_type == 'single') {

            $('.select_course_single_two').hide();
            $('.select_course_package_two').show();
        } else if (courses_type == 'package') {

            $('.select_course_single_two').show();
            $('.select_course_package_two').hide();
        }

    }

    $('.barch_wise_faculty_two').change(function () {
        var branch_id = $('.branch_ids').val();
        console.log(branch_id);
        $.ajax({
            url: "<?php echo base_url(); ?>Common/branch_wise_faculty",
            method: "POST",
            data: { branch_id: branch_id },
            success: function (data) {
                $('.clgfids').html(data);
            }
        });

    });

    $('.branch_two').change(function () {
        var branch_id = $('.branch_two').val();

        $.ajax({
            url: "<?php echo base_url(); ?>Common/fetch_package_course",
            method: "POST",
            data: { branch_id: branch_id },
            success: function (data) {
                $('#course_or_package_two').html(data);
            }
        });
    });


    $(document).ready(function () {
        $('#branch_ids').change(function () {

            var branch_id = $('#branch_id').val();

            $.ajax({
                url: "<?php echo base_url(); ?>Common/fetch_single_course",
                method: "POST",
                data: { branch_id: branch_id },
                success: function (data) {
                    $('#course_orsingle_two').html(data);
                }
            });
        });

    });



    function branch_data(b) {

        var x = b.options[b.selectedIndex].text;

        if (x == "COLLEGE") {
            $(".section-hidden").hide();
            $(".clg-section").show();
        }
        else {
            $(".section-hidden").show();
            $('.select_course_package_two').hide();
            $(".clg-section").hide();
        }
    }
    $(".section-hidden").hide();

</script>
<Script>
//    function selecttime()
//  {
//          var faculty_id = $('.faculty_ids').val();
//          var demo_date = $('#startDate').val();
//          if(faculty_id!="")
//          {
//              $.ajax({
//                  url : '<?php echo base_url(); ?>Common/checkTime',
//                  type:"post",

//                  data:{
//                      'faculty_id':faculty_id,
//                      'demo_date':demo_date
//                      },
//                      success: function(data)
//                      {


//                          $('.checkTime').html(data);
//                          $('#MyModel').modal("show");

//                      }
//                  });

//          }
//  }
</script>
<script>

    function GetStatus(val = '', demo_id = '') {
        $('#demo_status_ids').val(val.value);
        $('#demo_ids').val(demo_id);
        if (val.value == 2) {
            $('#ReasoneModel').modal();
            $('#demo_id_status').val(demo_id);
            $('#demo_status').val(val.value);
            $('#lable_remark_id').hide();
        } else if (val.value == 4) {
            $('#ReasoneModel').modal();
            $('#demo_id_status').val(demo_id);
            $('#demo_status').val(val.value);
            $('#lable_remark_id').hide();
            $('#from_date_id').show();
            $('#willdate_id').show();
            $.ajax({
                url: "<?php echo base_url(); ?>Common/get_recoDemo1",
                type: "post",
                data: {
                    'id': demo_id,
                },
                success: function (Resp) {
                    var data = $.parseJSON(Resp);
                    var demoDate = data['single_reco_demo'].demoDate;
                    $('.fromdate').val(demoDate);
                }
            });
        } else if (val.value == 3) {
            $('#ReasoneModel').modal();
            $('#demo_id_status').val(demo_id);
            $('#demo_status').val(val.value);
            $('#lable_remark_id').show();
            $('#from_date_id').hide();
            $('#willdate_id').hide();
            $.ajax({
                url: "<?php echo base_url(); ?>Common/get_recoDemo1",
                type: "post",
                data: {
                    'id': demo_id,
                },
                success: function (Resp) {
                    var data = $.parseJSON(Resp);
                    var demoDate = data['single_reco_demo'].demoDate;
                    $('.fromdate').val(demoDate);
                }
            });
        }
    }


    $('.full_submit_form').on('click', function () {

        var demoStatus = $('#demo_status_ids').val();
        var demo_id = $('#demo_ids').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Common/Update_status_demo",
            data: {
                'demoStatus': demoStatus,
                'demo_id': demo_id,
            },
            success: function (resp) {
                var data = $.parseJSON(resp);
                var ddd = data['all_record'].status;
                if (ddd == '1') {
                    $('#msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'HI! Status is changed......',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);
                } else if (ddd == '2') {
                    $('#msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);

                }
            }
        });
        return false;
    });
</script>
<script>

    $('#remark_submit').on('click', function () {

        var demoStatus = $('#demo_status_ids').val();
        var demo_id = $('#demo_ids').val();
        var lable_remark = $('#lable_remark').val();
        var remarks = $('#remarks').val();
        var fromdate = $('#fromdate').val();
        var willdate = $('#willdate').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Common/add_remark_and_change_status",
            data: {
                'demoStatus': demoStatus,
                'demo_id': demo_id,
                'cancel_reason': lable_remark,
                'reason': remarks,
                'leave_from_date': fromdate,
                'leave_to_date': willdate,
            },
            success: function (resp) {
                var data = $.parseJSON(resp);
                console.log(data['all_record']);
                var ddd = data['all_record'].status;
                if (ddd == '4') {
                    $('#msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'HI! This demo student has been moved to confusion list.....',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);
                } else if (ddd == '3') {
                    $('#msg').html(iziToast.success({
                        title: 'Success!',
                        timeout: 2500,
                        message: 'HI! This demo student has been moved to Cancle list.....',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);

                }
                else if (ddd == '2') {
                    $('#msg').html(iziToast.success({
                        title: 'Success!',
                        timeout: 2500,
                        message: 'HI! This demo student has been moved to leave list.....',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);

                } else if (ddd == '1') {
                    $('#msg').html(iziToast.success({
                        title: 'Success!',
                        timeout: 2500,
                        message: 'HI! This demo student has been moved to Done list.....',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);

                } else if (ddd == '0') {
                    $('#msg').html(iziToast.success({
                        title: 'Success!',
                        timeout: 2500,
                        message: 'HI! This demo student has been moved to Running list.....',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);

                } else if (ddd == '6') {
                    $('#msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);

                }
            }
        });
        return false;
    });


    function AddRmark(demo_id) {
        $('#AddRemark').modal();
        $.ajax({
            url: "<?php echo base_url(); ?>Common/get_recoDemo1",
            type: "post",
            data: {
                'id': demo_id,
            },
            success: function (Resp) {
                var data = $.parseJSON(Resp);
                console.log(data);
                var name = data['single_reco_demo'].demo_id;
                $('#demo_rem_id').val(demo_id);
            }
        });

    }

    function View_history(demo_id) {
        $('.history-for-demo').show();
        $('.filter-for-demoreco').hide();
        $.ajax({
            url: "<?php echo base_url(); ?>Common/view_demo_history",
            type: "post",
            data: {
                'id': demo_id,
            },
            success: function (Resp) {
                $('.remarks_data').html(Resp);
            }
        });

    }

    function filter_demo_reco(id) {
        $('.history-for-demo').hide();
        $('.filter-for-demoreco').show();
    }

    $('#ad_remark_demo').on('click', function () {

        var demo_remark_comment = $('#demo_remark_comment').val();
        var demo_id = $('#demo_rem_id').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Common/add_remark_demo",
            data: {
                'demo_remark_comment': demo_remark_comment,
                'demo_id': demo_id,
            },
            success: function (resp) {
                var data = $.parseJSON(resp);
                var ddd = data['all_record'].status;
                if (ddd == '1') {
                    $('#msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'HI! Remark is added......',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);
                } else if (ddd == '2') {
                    $('#msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);

                }
            }
        });
        return false;
    });


    $('#edit_demo').on('click', function () {

        var demo_id = $('#demo_id_edit').val();
        var name = $('#stud_name').val();
        var startDate = $('#startDate').val();
        var mobile_number = $('.moblie_no_d').val();
        var branch_id = $('.branch_ids').val();
        var faculty_id = $('.clgfids').val();
        var toTime = $('#toTime').val();
        var timeFrom = $('#timeFrom').val();
        var courses_type = $('#courses_type').val();
        var packageName = $('#course_or_package_two').val();
        var courseName = $('#course_orsingle_two').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Common/edit_demo_student",
            data: {
                'demo_id': demo_id,
                'name': name,
                'demoDate': startDate,
                'mobileNo': mobile_number,
                'branch_id': branch_id,
                'faculty_id': faculty_id,
                'fromTime': timeFrom,
                'toTime': toTime,
                'course_type': courses_type,
                'packageName': packageName,
                'courseName': courseName
            },
            success: function (resp) {
                var data = $.parseJSON(resp);
                var ddd = data['all_record'].status;
                if (ddd == '1') {
                    $('#msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'HI! Record is updated......',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);
                } else if (ddd == '2') {
                    $('#msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);

                }
            }
        });
        return false;
    });


    $('#discard_demo').on('click', function () {

        var demo_id = $('#demo_id_edit').val();
        var demo_discard_reason = $('#demo_discard_reason').val();
        var demo_discard_comment = $('#demo_discard_comment').val();
        var discard = $('#discard').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Common/discard_demo_edit",
            data: {
                'demo_discard_reason': demo_discard_reason,
                'demo_discard_comment': demo_discard_comment,
                'demo_id': demo_id,
                'discard': discard,
            },
            success: function (resp) {
                var data = $.parseJSON(resp);
                var ddd = data['all_record'].status;
                if (ddd == '1') {
                    $('#msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'HI! Demo is discarded......',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);
                } else if (ddd == '2') {
                    $('#msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);

                }
            }
        });
        return false;
    });



    function getAttend(att, demo_id) {
        //alert(att.value);
        $('.attresone').modal();
        $("#att").val(att.value);
        $("#demo_id_att").val(demo_id);
        if (att.value == "P") {
            $('.att_remark_id').hide();
        }
        else {
            $('.att_remark_id').show();
        }
    }



    $('#attend_demo').on('click', function () {

        var demo_id = $('#demo_id_att').val();
        var attt = $('#att').val();
        var demo_absent_comment = $('#demo_absent_comment').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Common/attendence_demo",
            data: {
                'demo_absent_comment': demo_absent_comment,
                'demo_id': demo_id,
                'attt': attt,
            },
            success: function (resp) {
                var data = $.parseJSON(resp);
                var ddd = data['all_record'].status;
                if (ddd == '1') {
                    $('#msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'HI! Attendence is taken......',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);
                } else if (ddd == '2') {
                    $('#msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2020);

                }
            }
        });
        return false;
    });

    function submit_searching() {
        var se_form = $('#searching_form').val();
        if (se_form == "") {
            setTimeout(function () {
                location.reload();
            }, 1000);
        }
        var se = se_form.length;
        if (se >= 3) {
            $.ajax({
                url: "<?php echo base_url(); ?>Common/grt_search_rows",
                type: "post",
                data: {
                    //'status_f': filter_name,
                    'searching_l': se_form,
                },
                success: function (resp) {
                    $('.search_data_row').html(resp);
                }
            });
        } else {
            $('#msg').html("<div class='alert alert-warning'>Atleast 3 characters required</div>");
            $('#msg').fadeIn();
            $('#msg').fadeOut(2000);
        }
    }


    function filtering_lead() {
        var filter_name = $('#filter_name').val();
        var filter_demo_id = $('#filter_demo_id').val();
        var filter_number = $('#filter_number').val();
        var filter_branch = $('#filter_branch').val();
        var filter_faculty = $('#filter_faculty').val();
        var filter_course = $('#filter_course').val();
        var filter_package = $('#filter_package').val();
        var filter_start_date = $('#filter_start_date').val();
        var filter_end_date = $('#filter_end_date').val();

        $.ajax({
            url: "<?php echo base_url(); ?>Common/demo_filter",
            type: "post",
            data: {
                'filter_name': filter_name,
                'filter_demo_id': filter_demo_id,
                'filter_number': filter_number,
                'filter_branch': filter_branch,
                'filter_faculty': filter_faculty,
                'filter_course': filter_course,
                'filter_package': filter_package,
                'filter_start_date': filter_start_date,
                'filter_end_date': filter_end_date
            },
            success: function (resp) {
                $('.search_data_row').html(resp);
            }
        });
    }

</script>

</body>

</html>