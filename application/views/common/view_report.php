<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
   @$branch_ids = explode(",",$_SESSION['branch_ids']);
   @$depart_ids = explode(",",$_SESSION['department_id']);?>
<?php date_default_timezone_set("Asia/Calcutta");
   $month_b1 = date('m', strtotime('-1 month'));
   $month_b2 = date('m', strtotime('-2 month'));
   $month_b3 = date('m', strtotime('-3 month'));
   $month_b4 = date('m', strtotime('-4 month'));
   $month_b5 = date('m', strtotime('-5 month'));
   $month_b6 = date('m', strtotime('-6 month'));
   

   $month_f1 = date('F', strtotime('-1 month'));
   $month_f2 = date('F', strtotime('-2 month'));
   $month_f3 = date('F', strtotime('-3 month'));
   $month_f4 = date('F', strtotime('-4 month'));
   $month_f5 = date('F', strtotime('-5 month'));
   $month_f6 = date('F', strtotime('-6 month'));
   
   $mon = array($month_b6,$month_b5,$month_b4,$month_b3,$month_b2,$month_b1);
   ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
    .apexcharts-legend-series {
        margin: 0 8px !important;
    }
</style>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="extra_lead_menu">
                <div class="col-12 d-flex justify-content-end mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Report</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Analysis</li>
                        </ol>
                    </nav>
                </div>
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>Today Report</h4>
                                        <?php if($_SESSION['logtype'] == "Super Admin") {?>    
                                        <ul class="nav pl-0 ml-auto mb-3">
                                            <li class="float-right ml-2">
                                                <a href="" class="btn btn-info text-white" data-toggle="modal"
                                                    data-target=".employee_filter1">
                                                    <i class="fas fa-filter" data-toggle="tooltip"
                                                        data-placement="bottom" title="Filter"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                    </div>
                                    <div class="card-body px-3 pt-0">
                                        <table class="table report_table table-sm">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Branch</th>
                                                    <th rowspan="2">All Running Demo</th>
                                                    <th rowspan="2">
                                                        <p>Today New</p>
                                                    </th>
                                                    <th colspan="2">Today Absent</th>
                                                    <th colspan="2">Today Present</th>
                                                    <th colspan="2">Today Done</th>
                                                    <th colspan="2">Today Leave</th>
                                                    <th colspan="2">Today cancel</th>
                                                </tr>
                                                <tr>
                                                    <th>old</th>
                                                    <th>new</th>
                                                    <th>old</th>
                                                    <th>new</th>
                                                    <th>old</th>
                                                    <th>new</th>
                                                    <th>old</th>
                                                    <th>new</th>
                                                    <th>old</th>
                                                    <th>new</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $currentDate = date('Y-m-d');
                                                    $allrun = 0;
                                                    $all_today_new = 0;
                                                    $all_new_ab =0;
                                                    $all_old_ab=0;
                                                    $all_new_pr =0;
                                                    $all_old_pr=0;
                                                    $all_new_done=0;
                                                    $all_old_done=0;
                                                    $all_new_leave=0;
                                                    $all_old_leave=0;
                                                    $all_new_cancel=0;
                                                    $all_old_cancel=0;
                                                    foreach($demo_all as $val){
                                                    if($val->discard=="0") {
                                                        if($val->demoStatus=="0") { $allrun++; }
                                                        $add_date = explode(" ",$val->addDate);
                                                        if($add_date[0]==$currentDate) { 
                                                            $all_today_new++; 
                                                            if($val->demoStatus=="0") {
                                                                $all_att = explode("&&",$val->attendance);
                                                                for($i=0;$i<sizeof($all_att);$i++)
                                                                {
                                                                  $att = explode("/",$all_att[$i]);
                                                                  if(@$att[1]=="A")
                                                                  {
                                                                    $all_new_ab++;  
                                                                  }
                                                                  if(@$att[1]=="P")
                                                                  {
                                                                    $all_new_pr++;  
                                                                  }
                                                                }
                                                            }
                                                          if($val->demoStatus=="1") { $all_new_done++;  }
                                                          if($val->demoStatus=="2") { $all_new_leave++;  }
                                                          if($val->demoStatus=="3") { $all_new_cancel++;  }
                                                        }else{
                                                            if($val->demoStatus=="0") {
                                                                $all_att = explode("&&",$val->attendance);
                                                                for($i=0;$i<sizeof($all_att);$i++)
                                                                {
                                                                    $att = explode("/",$all_att[$i]);
                                                                    $date_att = $att[0];
                                                                    $att_df = explode(" ",$date_att);
                                                                    //rint_r($att_df[0]);
                                                                    if($currentDate==$att_df[0])
                                                                    {
                                                                        if(@$att[1]=="A")
                                                                        {
                                                                            $all_old_ab++;  
                                                                        }
                                                                        if(@$att[1]=="P")
                                                                        {
                                                                            $all_old_pr++;  
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                                            if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                                            if($val->demoStatus=="3" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                                                        }
                                                    }
                                                }
                                                ?>
                                            <?php if($_SESSION['logtype']=="Super Admin"){ ?>    
                                                <tr>
                                                    <td>All Branch</td>
                                                    <td><?php echo $allrun; ?></td>
                                                    <td><?php echo $all_today_new; ?></td>
                                                    <td><?php echo $all_old_ab; ?></td>
                                                    <td><?php echo $all_new_ab; ?></td>
                                                    <td><?php echo $all_old_pr; ?></td>
                                                    <td><?php echo $all_new_pr; ?></td>
                                                    <td><?php echo $all_old_done; ?></td>
                                                    <td><?php echo $all_new_done; ?></td>
                                                    <td><?php echo $all_old_leave; ?></td>
                                                    <td><?php echo $all_new_leave; ?></td>
                                                    <td><?php echo $all_old_cancel; ?></td>
                                                    <td><?php echo $all_new_cancel; ?></td>
                                                </tr>
                                                <?php } ?>
                                                <?php
                                                    $currentDate = date('Y-m-d');
                                                    $allrun = 0;
                                                    $all_today_new = 0;
                                                    $all_new_ab =0;
                                                    $all_old_ab=0;
                                                    $all_new_pr =0;
                                                    $all_old_pr=0;
                                                    $all_new_done=0;
                                                    $all_old_done=0;
                                                    $all_new_leave=0;
                                                    $all_old_leave=0;
                                                    $all_new_cancel=0;
                                                    $all_old_cancel=0;
                                                    foreach($demo_all as $val){
                                                        if($val->branch_id == "1"){
                                                            if($val->discard=="0") {
                                                                if($val->demoStatus=="0") { $allrun++; }
                                                                $add_date = explode(" ",$val->addDate);
                                                                if($add_date[0]==$currentDate) { 
                                                                    $all_today_new++; 
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            if(@$att[1]=="A")
                                                                            {
                                                                            $all_new_ab++;  
                                                                            }
                                                                            if(@$att[1]=="P")
                                                                            {
                                                                            $all_new_pr++;  
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1") { $all_new_done++;  }
                                                                    if($val->demoStatus=="2") { $all_new_leave++;  }
                                                                    if($val->demoStatus=="3") { $all_new_cancel++;  }
                                                                }else{
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            $date_att = $att[0];
                                                                            $att_df = explode(" ",$date_att);
                                                                            //rint_r($att_df[0]);
                                                                            if($currentDate==$att_df[0])
                                                                            {
                                                                                if(@$att[1]=="A")
                                                                                {
                                                                                    $all_old_ab++;  
                                                                                }
                                                                                if(@$att[1]=="P")
                                                                                {
                                                                                    $all_old_pr++;  
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                                                    if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                                                    if($val->demoStatus=="3" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                                                                }
                                                            }
                                                        }        
                                                    }
                                                    ?>
                                            <?php if($allrun != "0" ||  $_SESSION['logtype'] == "Super Admin") {?>            
                                                <tr>
                                                    <td>RW1 Web Technology</td>
                                                    <td><?php echo $allrun; ?></td>
                                                    <td><?php echo $all_today_new; ?></td>
                                                    <td><?php echo $all_old_ab; ?></td>
                                                    <td><?php echo $all_new_ab; ?></td>
                                                    <td><?php echo $all_old_pr; ?></td>
                                                    <td><?php echo $all_new_pr; ?></td>
                                                    <td><?php echo $all_old_done; ?></td>
                                                    <td><?php echo $all_new_done; ?></td>
                                                    <td><?php echo $all_old_leave; ?></td>
                                                    <td><?php echo $all_new_leave; ?></td>
                                                    <td><?php echo $all_old_cancel; ?></td>
                                                    <td><?php echo $all_new_cancel; ?></td>
                                                </tr>
                                            <?php }?>    
                                                <?php
                                                    $currentDate = date('Y-m-d');
                                                    $allrun = 0;
                                                    $all_today_new = 0;
                                                    $all_new_ab =0;
                                                    $all_old_ab=0;
                                                    $all_new_pr =0;
                                                    $all_old_pr=0;
                                                    $all_new_done=0;
                                                    $all_old_done=0;
                                                    $all_new_leave=0;
                                                    $all_old_leave=0;
                                                    $all_new_cancel=0;
                                                    $all_old_cancel=0;
                                                    foreach($demo_all as $val){
                                                        if($val->branch_id == "3"){
                                                            if($val->discard=="0") {
                                                                if($val->demoStatus=="0") { $allrun++; }
                                                                $add_date = explode(" ",$val->addDate);
                                                                if($add_date[0]==$currentDate) { 
                                                                    $all_today_new++; 
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            if(@$att[1]=="A")
                                                                            {
                                                                            $all_new_ab++;  
                                                                            }
                                                                            if(@$att[1]=="P")
                                                                            {
                                                                            $all_new_pr++;  
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1") { $all_new_done++;  }
                                                                    if($val->demoStatus=="2") { $all_new_leave++;  }
                                                                    if($val->demoStatus=="3") { $all_new_cancel++;  }
                                                                }else{
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            $date_att = $att[0];
                                                                            $att_df = explode(" ",$date_att);
                                                                            //rint_r($att_df[0]);
                                                                            if($currentDate==$att_df[0])
                                                                            {
                                                                                if(@$att[1]=="A")
                                                                                {
                                                                                    $all_old_ab++;  
                                                                                }
                                                                                if(@$att[1]=="P")
                                                                                {
                                                                                    $all_old_pr++;  
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                                                    if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                                                    if($val->demoStatus=="3" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                                                                }
                                                            }
                                                        }        
                                                    }
                                                    ?>
                                            <?php if($allrun != "0" ||  $_SESSION['logtype'] == "Super Admin") {?>
                                                <tr>
                                                    <td>RW4</td>
                                                    <td><?php echo $allrun; ?></td>
                                                    <td><?php echo $all_today_new; ?></td>
                                                    <td><?php echo $all_old_ab; ?></td>
                                                    <td><?php echo $all_new_ab; ?></td>
                                                    <td><?php echo $all_old_pr; ?></td>
                                                    <td><?php echo $all_new_pr; ?></td>
                                                    <td><?php echo $all_old_done; ?></td>
                                                    <td><?php echo $all_new_done; ?></td>
                                                    <td><?php echo $all_old_leave; ?></td>
                                                    <td><?php echo $all_new_leave; ?></td>
                                                    <td><?php echo $all_old_cancel; ?></td>
                                                    <td><?php echo $all_new_cancel; ?></td>
                                                </tr>
                                            <?php }?>
                                                <?php
                                                    $currentDate = date('Y-m-d');
                                                    $allrun = 0;
                                                    $all_today_new = 0;
                                                    $all_new_ab =0;
                                                    $all_old_ab=0;
                                                    $all_new_pr =0;
                                                    $all_old_pr=0;
                                                    $all_new_done=0;
                                                    $all_old_done=0;
                                                    $all_new_leave=0;
                                                    $all_old_leave=0;
                                                    $all_new_cancel=0;
                                                    $all_old_cancel=0;
                                                    foreach($demo_all as $val){
                                                        if($val->branch_id == "5"){
                                                            if($val->discard=="0") {
                                                                if($val->demoStatus=="0") { $allrun++; }
                                                                $add_date = explode(" ",$val->addDate);
                                                                if($add_date[0]==$currentDate) { 
                                                                    $all_today_new++; 
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            if(@$att[1]=="A")
                                                                            {
                                                                            $all_new_ab++;  
                                                                            }
                                                                            if(@$att[1]=="P")
                                                                            {
                                                                            $all_new_pr++;  
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1") { $all_new_done++;  }
                                                                    if($val->demoStatus=="2") { $all_new_leave++;  }
                                                                    if($val->demoStatus=="3") { $all_new_cancel++;  }
                                                                }else{
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            $date_att = $att[0];
                                                                            $att_df = explode(" ",$date_att);
                                                                            //rint_r($att_df[0]);
                                                                            if($currentDate==$att_df[0])
                                                                            {
                                                                                if(@$att[1]=="A")
                                                                                {
                                                                                    $all_old_ab++;  
                                                                                }
                                                                                if(@$att[1]=="P")
                                                                                {
                                                                                    $all_old_pr++;  
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                                                    if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                                                    if($val->demoStatus=="3" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                                                                }
                                                            }
                                                        }        
                                                    }
                                                    ?>
                                            <?php if($allrun != "0" ||  $_SESSION['logtype'] == "Super Admin") {?>        
                                                <tr>
                                                    <td>RW2</td>
                                                    <td><?php echo $allrun; ?></td>
                                                    <td><?php echo $all_today_new; ?></td>
                                                    <td><?php echo $all_old_ab; ?></td>
                                                    <td><?php echo $all_new_ab; ?></td>
                                                    <td><?php echo $all_old_pr; ?></td>
                                                    <td><?php echo $all_new_pr; ?></td>
                                                    <td><?php echo $all_old_done; ?></td>
                                                    <td><?php echo $all_new_done; ?></td>
                                                    <td><?php echo $all_old_leave; ?></td>
                                                    <td><?php echo $all_new_leave; ?></td>
                                                    <td><?php echo $all_old_cancel; ?></td>
                                                    <td><?php echo $all_new_cancel; ?></td>
                                                </tr>
                                            <?php } ?>
                                                <?php
                                                    $currentDate = date('Y-m-d');
                                                    $allrun = 0;
                                                    $all_today_new = 0;
                                                    $all_new_ab =0;
                                                    $all_old_ab=0;
                                                    $all_new_pr =0;
                                                    $all_old_pr=0;
                                                    $all_new_done=0;
                                                    $all_old_done=0;
                                                    $all_new_leave=0;
                                                    $all_old_leave=0;
                                                    $all_new_cancel=0;
                                                    $all_old_cancel=0;
                                                    foreach($demo_all as $val){
                                                        if($val->branch_id == "8"){
                                                            if($val->discard=="0") {
                                                                if($val->demoStatus=="0") { $allrun++; }
                                                                $add_date = explode(" ",$val->addDate);
                                                                if($add_date[0]==$currentDate) { 
                                                                    $all_today_new++; 
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            if(@$att[1]=="A")
                                                                            {
                                                                            $all_new_ab++;  
                                                                            }
                                                                            if(@$att[1]=="P")
                                                                            {
                                                                            $all_new_pr++;  
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1") { $all_new_done++;  }
                                                                    if($val->demoStatus=="2") { $all_new_leave++;  }
                                                                    if($val->demoStatus=="3") { $all_new_cancel++;  }
                                                                }else{
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            $date_att = $att[0];
                                                                            $att_df = explode(" ",$date_att);
                                                                            //rint_r($att_df[0]);
                                                                            if($currentDate==$att_df[0])
                                                                            {
                                                                                if(@$att[1]=="A")
                                                                                {
                                                                                    $all_old_ab++;  
                                                                                }
                                                                                if(@$att[1]=="P")
                                                                                {
                                                                                    $all_old_pr++;  
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                                                    if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                                                    if($val->demoStatus=="3" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                                                                }
                                                            }
                                                        }        
                                                    }
                                                    ?>
                                            <?php if($allrun != "0" ||  $_SESSION['logtype'] == "Super Admin") {?>        
                                                <tr>
                                                    <td>RW3</td>
                                                    <td><?php echo $allrun; ?></td>
                                                    <td><?php echo $all_today_new; ?></td>
                                                    <td><?php echo $all_old_ab; ?></td>
                                                    <td><?php echo $all_new_ab; ?></td>
                                                    <td><?php echo $all_old_pr; ?></td>
                                                    <td><?php echo $all_new_pr; ?></td>
                                                    <td><?php echo $all_old_done; ?></td>
                                                    <td><?php echo $all_new_done; ?></td>
                                                    <td><?php echo $all_old_leave; ?></td>
                                                    <td><?php echo $all_new_leave; ?></td>
                                                    <td><?php echo $all_old_cancel; ?></td>
                                                    <td><?php echo $all_new_cancel; ?></td>
                                                </tr>
                                            <?php }?>
                                                <?php
                                                    $currentDate = date('Y-m-d');
                                                    $allrun = 0;
                                                    $all_today_new = 0;
                                                    $all_new_ab =0;
                                                    $all_old_ab=0;
                                                    $all_new_pr =0;
                                                    $all_old_pr=0;
                                                    $all_new_done=0;
                                                    $all_old_done=0;
                                                    $all_new_leave=0;
                                                    $all_old_leave=0;
                                                    $all_new_cancel=0;
                                                    $all_old_cancel=0;
                                                    foreach($demo_all as $val){
                                                        if($val->branch_id == "9"){
                                                            if($val->discard=="0") {
                                                                if($val->demoStatus=="0") { $allrun++; }
                                                                $add_date = explode(" ",$val->addDate);
                                                                if($add_date[0]==$currentDate) { 
                                                                    $all_today_new++; 
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            if(@$att[1]=="A")
                                                                            {
                                                                            $all_new_ab++;  
                                                                            }
                                                                            if(@$att[1]=="P")
                                                                            {
                                                                            $all_new_pr++;  
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1") { $all_new_done++;  }
                                                                    if($val->demoStatus=="2") { $all_new_leave++;  }
                                                                    if($val->demoStatus=="3") { $all_new_cancel++;  }
                                                                }else{
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            $date_att = $att[0];
                                                                            $att_df = explode(" ",$date_att);
                                                                            //rint_r($att_df[0]);
                                                                            if($currentDate==$att_df[0])
                                                                            {
                                                                                if(@$att[1]=="A")
                                                                                {
                                                                                    $all_old_ab++;  
                                                                                }
                                                                                if(@$att[1]=="P")
                                                                                {
                                                                                    $all_old_pr++;  
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                                                    if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                                                    if($val->demoStatus=="3" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                                                                }
                                                            }
                                                        }        
                                                    }
                                                    ?>
                                            <?php if($allrun != "0" ||  $_SESSION['logtype'] == "Super Admin") {?>
                                                <tr>
                                                    <td>RW1B</td>
                                                    <td><?php echo $allrun; ?></td>
                                                    <td><?php echo $all_today_new; ?></td>
                                                    <td><?php echo $all_old_ab; ?></td>
                                                    <td><?php echo $all_new_ab; ?></td>
                                                    <td><?php echo $all_old_pr; ?></td>
                                                    <td><?php echo $all_new_pr; ?></td>
                                                    <td><?php echo $all_old_done; ?></td>
                                                    <td><?php echo $all_new_done; ?></td>
                                                    <td><?php echo $all_old_leave; ?></td>
                                                    <td><?php echo $all_new_leave; ?></td>
                                                    <td><?php echo $all_old_cancel; ?></td>
                                                    <td><?php echo $all_new_cancel; ?></td>
                                                </tr>
                                            <?php } ?>
                                                <?php
                                                    $currentDate = date('Y-m-d');
                                                    $allrun = 0;
                                                    $all_today_new = 0;
                                                    $all_new_ab =0;
                                                    $all_old_ab=0;
                                                    $all_new_pr =0;
                                                    $all_old_pr=0;
                                                    $all_new_done=0;
                                                    $all_old_done=0;
                                                    $all_new_leave=0;
                                                    $all_old_leave=0;
                                                    $all_new_cancel=0;
                                                    $all_old_cancel=0;
                                                    foreach($demo_all as $val){
                                                        if($val->branch_id == "10"){
                                                            if($val->discard=="0") {
                                                                if($val->demoStatus=="0") { $allrun++; }
                                                                $add_date = explode(" ",$val->addDate);
                                                                if($add_date[0]==$currentDate) { 
                                                                    $all_today_new++; 
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            if(@$att[1]=="A")
                                                                            {
                                                                            $all_new_ab++;  
                                                                            }
                                                                            if(@$att[1]=="P")
                                                                            {
                                                                            $all_new_pr++;  
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1") { $all_new_done++;  }
                                                                    if($val->demoStatus=="2") { $all_new_leave++;  }
                                                                    if($val->demoStatus=="3") { $all_new_cancel++;  }
                                                                }else{
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            $date_att = $att[0];
                                                                            $att_df = explode(" ",$date_att);
                                                                            //rint_r($att_df[0]);
                                                                            if($currentDate==$att_df[0])
                                                                            {
                                                                                if(@$att[1]=="A")
                                                                                {
                                                                                    $all_old_ab++;  
                                                                                }
                                                                                if(@$att[1]=="P")
                                                                                {
                                                                                    $all_old_pr++;  
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                                                    if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                                                    if($val->demoStatus=="3" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                                                                }
                                                            }
                                                        }        
                                                    }
                                                    ?>
                                            <?php if($allrun != "0" ||  $_SESSION['logtype'] == "Super Admin") {?>
                                                <tr>
                                                    <td>RW1 MM</td>
                                                    <td><?php echo $allrun; ?></td>
                                                    <td><?php echo $all_today_new; ?></td>
                                                    <td><?php echo $all_old_ab; ?></td>
                                                    <td><?php echo $all_new_ab; ?></td>
                                                    <td><?php echo $all_old_pr; ?></td>
                                                    <td><?php echo $all_new_pr; ?></td>
                                                    <td><?php echo $all_old_done; ?></td>
                                                    <td><?php echo $all_new_done; ?></td>
                                                    <td><?php echo $all_old_leave; ?></td>
                                                    <td><?php echo $all_new_leave; ?></td>
                                                    <td><?php echo $all_old_cancel; ?></td>
                                                    <td><?php echo $all_new_cancel; ?></td>
                                                </tr>
                                            <?php } ?>
                                                <?php
                                                    $currentDate = date('Y-m-d');
                                                    $allrun = 0;
                                                    $all_today_new = 0;
                                                    $all_new_ab =0;
                                                    $all_old_ab=0;
                                                    $all_new_pr =0;
                                                    $all_old_pr=0;
                                                    $all_new_done=0;
                                                    $all_old_done=0;
                                                    $all_new_leave=0;
                                                    $all_old_leave=0;
                                                    $all_new_cancel=0;
                                                    $all_old_cancel=0;
                                                    foreach($demo_all as $val){
                                                        if($val->branch_id == "11"){
                                                            if($val->discard=="0") {
                                                                if($val->demoStatus=="0") { $allrun++; }
                                                                $add_date = explode(" ",$val->addDate);
                                                                if($add_date[0]==$currentDate) { 
                                                                    $all_today_new++; 
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            if(@$att[1]=="A")
                                                                            {
                                                                            $all_new_ab++;  
                                                                            }
                                                                            if(@$att[1]=="P")
                                                                            {
                                                                            $all_new_pr++;  
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1") { $all_new_done++;  }
                                                                    if($val->demoStatus=="2") { $all_new_leave++;  }
                                                                    if($val->demoStatus=="3") { $all_new_cancel++;  }
                                                                }else{
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            $date_att = $att[0];
                                                                            $att_df = explode(" ",$date_att);
                                                                            //rint_r($att_df[0]);
                                                                            if($currentDate==$att_df[0])
                                                                            {
                                                                                if(@$att[1]=="A")
                                                                                {
                                                                                    $all_old_ab++;  
                                                                                }
                                                                                if(@$att[1]=="P")
                                                                                {
                                                                                    $all_old_pr++;  
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                                                    if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                                                    if($val->demoStatus=="3" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                                                                }
                                                            }
                                                        }        
                                                    }
                                                    ?>
                                            <?php if($allrun != "0" ||  $_SESSION['logtype'] == "Super Admin") {?>
                                                <tr>
                                                    <td>COLLEGE</td>
                                                    <td><?php echo $allrun; ?></td>
                                                    <td><?php echo $all_today_new; ?></td>
                                                    <td><?php echo $all_old_ab; ?></td>
                                                    <td><?php echo $all_new_ab; ?></td>
                                                    <td><?php echo $all_old_pr; ?></td>
                                                    <td><?php echo $all_new_pr; ?></td>
                                                    <td><?php echo $all_old_done; ?></td>
                                                    <td><?php echo $all_new_done; ?></td>
                                                    <td><?php echo $all_old_leave; ?></td>
                                                    <td><?php echo $all_new_leave; ?></td>
                                                    <td><?php echo $all_old_cancel; ?></td>
                                                    <td><?php echo $all_new_cancel; ?></td>
                                                </tr>
                                            <?php }?>
                                                <?php
                                                    $currentDate = date('Y-m-d');
                                                    $allrun = 0;
                                                    $all_today_new = 0;
                                                    $all_new_ab =0;
                                                    $all_old_ab=0;
                                                    $all_new_pr =0;
                                                    $all_old_pr=0;
                                                    $all_new_done=0;
                                                    $all_old_done=0;
                                                    $all_new_leave=0;
                                                    $all_old_leave=0;
                                                    $all_new_cancel=0;
                                                    $all_old_cancel=0;
                                                    foreach($demo_all as $val){
                                                        if($val->branch_id == "12"){
                                                            if($val->discard=="0") {
                                                                if($val->demoStatus=="0") { $allrun++; }
                                                                $add_date = explode(" ",$val->addDate);
                                                                if($add_date[0]==$currentDate) { 
                                                                    $all_today_new++; 
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            if(@$att[1]=="A")
                                                                            {
                                                                            $all_new_ab++;  
                                                                            }
                                                                            if(@$att[1]=="P")
                                                                            {
                                                                            $all_new_pr++;  
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1") { $all_new_done++;  }
                                                                    if($val->demoStatus=="2") { $all_new_leave++;  }
                                                                    if($val->demoStatus=="3") { $all_new_cancel++;  }
                                                                }else{
                                                                    if($val->demoStatus=="0") {
                                                                        $all_att = explode("&&",$val->attendance);
                                                                        for($i=0;$i<sizeof($all_att);$i++)
                                                                        {
                                                                            $att = explode("/",$all_att[$i]);
                                                                            $date_att = $att[0];
                                                                            $att_df = explode(" ",$date_att);
                                                                            //rint_r($att_df[0]);
                                                                            if($currentDate==$att_df[0])
                                                                            {
                                                                                if(@$att[1]=="A")
                                                                                {
                                                                                    $all_old_ab++;  
                                                                                }
                                                                                if(@$att[1]=="P")
                                                                                {
                                                                                    $all_old_pr++;  
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                                                    if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                                                    if($val->demoStatus=="3" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                                                                }
                                                            }
                                                        }        
                                                    }
                                                    ?>
                                            <?php if($allrun != "0"  ||  $_SESSION['logtype'] == "Super Admin") {?>        
                                                <tr>
                                                    <td>RW5</td>
                                                    <td><?php echo $allrun; ?></td>
                                                    <td><?php echo $all_today_new; ?></td>
                                                    <td><?php echo $all_old_ab; ?></td>
                                                    <td><?php echo $all_new_ab; ?></td>
                                                    <td><?php echo $all_old_pr; ?></td>
                                                    <td><?php echo $all_new_pr; ?></td>
                                                    <td><?php echo $all_old_done; ?></td>
                                                    <td><?php echo $all_new_done; ?></td>
                                                    <td><?php echo $all_old_leave; ?></td>
                                                    <td><?php echo $all_new_leave; ?></td>
                                                    <td><?php echo $all_old_cancel; ?></td>
                                                    <td><?php echo $all_new_cancel; ?></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>Last 6 Month</h4>
                                        <ul class="nav pl-0 ml-auto mb-3">
                                            <li class="float-right ml-2">
                                                <a href="" class="btn btn-info text-white" data-toggle="modal"
                                                    data-target=".employee_filter">
                                                    <i class="fas fa-filter" data-toggle="tooltip"
                                                        data-placement="bottom" title="Filter"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body px-3 pt-0">
                                        <div id="chart1" style="width: 800; height: 360px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary p-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header py-0 text-center">
                                        <h4>Current Month</h4>
                                        <ul class="nav pl-0 ml-auto mb-3">
                                            <li class="float-right ml-2">
                                                <a href="" class="btn btn-info text-white" data-toggle="modal"
                                                    data-target=".current-month">
                                                    <i class="fas fa-filter" data-toggle="tooltip"
                                                        data-placement="bottom" title="Filter"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="chart4" class="graph"></div>
                                </div>
                                <div class="col-md-6">
                                    <div id="chart2" class="mt-4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary p-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header py-0 text-center">
                                        <h4>Cancel Demo </h4>
                                        <ul class="nav pl-0 ml-auto mb-3">
                                            <li class="float-right ml-2">
                                                <a href="" class="btn btn-info text-white" data-toggle="modal"
                                                    data-target=".current-month">
                                                    <i class="fas fa-filter" data-toggle="tooltip"
                                                        data-placement="bottom" title="Filter"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div id="columnchart"></div>
                                </div> -->
                                <div class="col-md-6">
                                    <div id="cancel_demo_chart" class="cancel_demo_Chart"></div>
                                </div>
                                <div class="col-md-6"> 
                                    <table class="table table-sm today-rt table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th></th>
                                            <th></th>
                                            <th colspan="15" class="align-middle">Day </th>
                                        </tr>
                                        <tr>
                                            <th>Reason</th>
                                            <th>Total Cancel Demo</th>
                                            <th>0 </th>
                                            <th>1 </th>
                                            <th>2 </th>
                                            <th>3 </th>
                                            <th>4 </th>
                                            <th>5 </th>
                                            <th>6 </th>
                                            <th>7 </th>
                                            <th>8 </th>
                                            <th>9 </th>
                                            <th>10 &amp; more </th>
                                        
                                        </tr>
                                        </thead>
                                        <tbody>
                                
                                        <?php foreach($cancel_reason_all as $val) { 
                                    $cttt1=0;
                                    $d0=0;
                                    $d1=0;
                                    $d2=0;
                                    $d3=0;
                                    $d4=0;
                                    $d5=0;
                                    $d6=0;
                                    $d7=0;
                                    $d8=0;
                                    $d9=0;
                                    $d10=0;
                                    foreach($faculty_analysis as $row) {
                                       if($row->discard=="0") {
                                           if($row->demoStatus=="3") {
                                           if($val->reasonName==$row->cancel_reason) {
                                                    $cttt1++;
                                                    $day=0;
                                                    $all_att = explode("&&",$row->attendance);
                                                    
                                                    for($i=0;$i<sizeof($all_att);$i++)
                                                    {
                                                        $att = explode("/",$all_att[$i]);
                                                        if(@$att[1]=="P")
                                                        {
                                                            $day++; 
                                                        }
                                                    }
                                                    if($day==0) { $d0 = $d0 + 1; }
                                                    if($day==1) { $d1 = $d1 + 1; }
                                                    if($day==2) { $d2 = $d2 + 1; }
                                                    if($day==3) { $d3 = $d3 + 1; }
                                                    if($day==4) { $d4 = $d4 + 1; }
                                                    if($day==5) { $d5 = $d5 + 1; }
                                                    if($day==6) { $d6 = $d6 + 1; }
                                                    if($day==7) { $d7 = $d7 + 1; }
                                                    if($day==8) { $d8 = $d8 + 1; }
                                                    if($day==9) { $d9 = $d9 + 1; }
                                                    if($day>=10) { $d10 = $d10 + 1; }
                                                    
                                                    
                                                }
                                                
                                           }
                                       }
                                  }?>  
                                      <tr>
                                        <td><?php echo $val->reasonName; ?></td>
                                        <td><?php echo $cttt1; ?> </td>
                                         <td><?php echo $d0; ?></td>
                                        <td><?php echo $d1; ?></td>
                                        <td><?php echo $d2; ?></td>
                                        <td><?php echo $d3; ?></td>
                                        <td><?php echo $d4; ?></td>
                                        <td><?php echo $d5; ?></td>
                                        <td><?php echo $d6; ?></td>
                                        <td><?php echo $d7; ?></td>
                                        <td><?php echo $d8; ?></td>
                                        <td><?php echo $d9; ?></td>
                                        <td><?php echo $d10; ?></td>
                                        
                                      </tr>
                                  <?php } ?>   
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>




<div class="modal fade employee_filter" tabindex="-1" role="dialog" aria-labelledby="employee_filter"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="employe_filter">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="myForm" action="<?php echo base_url(); ?>Common/view_report">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Branch Name:</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Branch</option>
                                    <?php $bname=""; foreach($branch_all as $row) {
                                            if($row->branch_status=="0") {
                                                if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") {
                                                    if($bname==""){
                                                        $bname.=$row->branch_name;
                                                    }else{
                                                        $bname.=",  ".$row->branch_name;
                                                    }
                                                ?>
                                        <option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                      
                                    <?php   } } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Department:</label>
                                <select name="filter_department" id="filter_department" class="form-control" >
                                    <option value="">Select Department</option>
                                        <?php foreach($department_all as $row) {?>
                                        <option <?php if(@$filter_department==$row->department_id) { echo "selected"; } ?> value="<?php echo $row->department_id; ?>"><?php echo $row->department_name; ?></option>
                                        <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save" name="search">
                                <a class="btn btn-light text-dark" href="<?php  echo base_url();?>Common/view_report">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade employee_filter1" tabindex="-1" role="dialog" aria-labelledby="employee_filter1"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="employe_filter">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="myForm" action="<?php echo base_url(); ?>Common/view_report">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Branch Name:</label>
                                <select name="branch_id_filter" id="branch_ids" class="form-control" >
                                    <option value="">Select Branch</option>
                                    <?php foreach($branch_all as $row) {?>
                                        <option <?php if(@$branch_id_filter==$row->branch_id) { echo "selected"; } ?> value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                                        <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>LogType:</label>
                                <select name="logtype_name" id="logtype_name" class="form-control" onchange="return GetLogtypeUserOnChange()">
                                    <option value="">Select LogType</option>
                                    <?php foreach($logtypestaff_all as $row) {?>
                                        <option <?php if(@$logtype_name==$row->logtype_name) { echo "selected"; } ?> value="<?php echo $row->logtype_name; ?>"><?php echo $row->logtype_name; ?></option>
                                        <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User:</label>
                                <select name="user_id" id="user_id" class="form-control" >
                                    <option value="">Select User</option>
                                    <?php foreach($all_user as $row) {?>
                                        <option <?php if(@$user_id==$row->name) { echo "selected"; } ?> value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
                                        <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Duration:</label>
                                <select name="duration" id="duration" class="form-control">
                                    <option value="">Select Duration</option>
                                    <option <?php if(@$duration =="lastWeek") { echo "selected"; } ?> value="lastWeek">Last Week</option>
                                    <option <?php if(@$duration =="last6Months") { echo "selected"; } ?> value="last6Months">Last 6 months</option>
                                    <option <?php if(@$duration =="lastYear") { echo "selected"; } ?> value="lastYear">Last Year</option>
                                    <option <?php if(@$duration =="TillNow") { echo "selected"; } ?> value="TillNow">Till Now</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save" name="submit">
                                <a class="btn btn-light text-dark" href="<?php  echo base_url();?>Common/view_report">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="modal fade chart_filter" tabindex="-1" role="dialog" aria-labelledby="chart_filter" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="chart_filter">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Start Date:</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>End Date:</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<!-- <div class="modal fade demo_filter" tabindex="-1" role="dialog" aria-labelledby="demo_filter" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="demo_filter">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Start Date:</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>End Date:</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<!-- Large modal -->
<div class="modal fade current-month" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="myForm" action="<?php echo base_url(); ?>Common/view_report">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Date From To </label>
                            <input type="date" id="fromdate" class="form-control" name="filter_from_date" value="">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Date From To </label>
                            <input type="date" id="fromdate" class="form-control" name="filter_from_date" value="">
                        </div>
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label>Brach</label>
                                <select name="branch_id_filter" id="branch_ids" class="form-control" >
                                    <option value="">Select Branch</option>
                                    <?php foreach($branch_all as $row) {?>
                                        <option <?php if(@$branch_id_filter==$row->branch_id) { echo "selected"; } ?> value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                                        <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label>Department</label>
                                <select  class="form-control  " name="filter_department"  >
                                   <option value="">Select Department</option>
                                   <?php foreach($department_all as $val) {    ?>
                                   <option  <?php if(@$filter_department==$val->department_id) { echo "selected"; } ?> value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
                                   <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label>Faculty Name</label>
                                <select class="form-control  " name=" ">
                                    <option value="">Select Faculty</option>
                                    <?php foreach($user_all as $val) { if($val->logtype == "Faculty")  {  ?>
                                   <option  <?php if(@$filter_faculty==$val->department_id) { echo "selected"; } ?> value="<?php echo $val->useR_id; ?>"><?php echo $val->name; ?></option>
                                   <?php } } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <input type="submit" class="btn btn-primary" value="Filter" name="filter_outstanding_fees">
                        <a class="btn btn-light text-dark"
                            href="https://demo.rnwmultimedia.com/Common/view_report">Reset</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- Large modal -->
<?php 
   $ttt=0; $ddd=0; $lll=0;  $ccc=0; $rrr=0;
   foreach($two_analysis as $val)
   {
        if($val->discard=="0") {  if(in_array($val->branch_id,$branch_ids) && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
            
           $ttt++;
           if($val->demoStatus=="0")
           {
               $rrr++;
           }
           if($val->demoStatus=="1")
           {
               $ddd++;
           }
           if($val->demoStatus=="2")
           {
               $lll++;
           }
           if($val->demoStatus=="3")
           {
               $ccc++;
           }
   
   
           //$done_demo = ($ttt / 100) * $ccc;
           // $done_demo = ($ttt / 100) * $ccc;
           // $running_demo = ($ttt / 100) * $rrr;
           // $leave_demo = ($ttt / 100) * $lll;
           // $cancle_demo = ($ttt / 100) * $ddd;
   
   
           $ccc1 = ($ccc / $ttt) * 100; 
           $rrr1 = ($rrr / $ttt) * 100; 
           $lll1 = ($lll / $ttt) * 100; 
           $ddd1 = ($ddd / $ttt) * 100; 
           $ttt1 = ($ttt / $ttt) * 100; 
   
           $f_ccc1 = $ccc1.'%';
   
       
   } } }
   ?>
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>

<!-- General JS Scripts -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!--Excel Download-->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/table2excel.js"></script>

<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>

<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->




<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>

<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
<!-- Page Specific JS File -->



<script>
    $(function () {
        columnchart();
    });
    function chart4() {
          var options = {
              colors: ['#008ffb', '#00e396', '#feb019', '#ff4560', '#775dd0'],
              series: [{
                  name: 'Total Demo',
                  data: [<?php echo $ttt; ?>]
              }, {
                  name: 'Done Demo',
                  data: [<?php echo $rrr;  ?>]
              }, {
                  name: 'Leave Demo',
                  data: [<?php echo $ddd ;?>]
              }, {
                  name: 'Cancle Demo',
                  data: [<?php echo $ccc; ?>]
              }, {
                  name: 'Running Demo',
                  data: [<?php echo $lll; ?>]
              }],
              chart: {
                  height: 350,
                  type: 'bar',
              },
              plotOptions: {
                  bar: {
                      borderRadius: 50,
                      columnWidth: '50%',
                  }
              },
              dataLabels: {
                  enabled: false
              },
              stroke: {
                  width: 1
              },
   
              grid: {
                  row: {
                      colors: ['#fff']
                  }
              },

              legend: {
                    display : true 
              },

              xaxis: {
                  range : 500,
                  labels: {
                      rotate: -45
                  },
                  categories: ['<?php echo date('F');?>'],
                  tickPlacement: 'on'
              },
              yaxis: {
                  title: {
                      text: '',
                  },
              },
              fill: {
                  type: 'gradient',
                  gradient: {
                      shade: 'light',
                      type: "horizontal",
                      shadeIntensity: 0.25,
                      gradientToColors: undefined,
                      inverseColors: true,
                      opacityFrom: 0.85,
                      opacityTo: 0.85,
                      stops: [50, 0, 100]
                  },
              }
          };
   
          var chart = new ApexCharts(document.querySelector("#chart4"), options);
          chart.render();
      }

    function chart2() {
          var options = {
              //colors: ['#008ffb', '#00e396', '#feb019', '#ff4560', '#775dd0'],
              colors: [ '#00e396', '#feb019', '#ff4560', '#775dd0'],
              //series: [76, 67, 61, 90, 20],
              series: [ <?php echo round($ccc1); ?>, <?php echo round($lll1); ?>, <?php echo round($ddd1); ?>, <?php echo round($rrr1); ?>],
              chart: {
                  height: 390,
                  type: 'pie',
              },
              //labels: ['Total Demo', 'Done Demo', 'Leave Demo', 'Cancle Demo', 'Running Demo'],
              labels: ['Done Demo', 'Leave Demo', 'Cancle Demo', 'Running Demo'],
              responsive: [{
                  breakpoint: 480,
                  options: {
                      chart: {
                          width: 200
                      },
                      legend: {
                          position: 'bottom'
                      }
                  }
              }]
   
          };
   
          var chart = new ApexCharts(document.querySelector("#chart2"), options);
          chart.render();
      }
   


    function columnchart() {

        var options = {
            chart: {
                height: 400,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: '80%',
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: "12px",
                    fontFamily: "Nunito, Segoe UI, arial",
                    fontWeight: "bold"
                }
            },
            colors: ['#5864bd', '#ff0'],
            series: [{
                name: '',
                data: [44, 55, 41, 67, 22, 43, 21, 33, 45, 31, 87, 65, 35, 10, 15, 30, 38, 56, 78, 52, 63, 95, 12, 34, 50]
            }],
            xaxis: {
                labels: {
                    rotate: -45,

                },
                categories: ['fees vadhare lage', 'Time set nathi thato', 'Call Not Receive', 'Call Not Responding  ', 'Cut The Call    ', 'Ringing Not Respond',
                    'Phone Disconnect', 'Call Later', 'On Holiday', 'Traveling', 'Busy with Exams', 'Busy For Next Few Days', 'Need Some Time to Decide ', 'Want to Visit Institue', 'Need Discount', 'Went with another institute', 'Cancelled plan for now', 'Change plan so, not interested', 'Not Interested Anymore', 'Transfer Branch', 'Not Take Any Demo', 'Distance Issue  ', 'DUPLICATE', 'Went out of the city', 'Got job so not interested'
                ],
                tickPlacement: 'on',
                tooltip: {
                    enabled: true,
                    offsetY: -35,
                }
            },
            stroke: {
                width: 2
            },

            grid: {
                row: {
                    colors: ['#fff', '#f2f2f2']
                }
            },

        }

        var chart = new ApexCharts(
            document.querySelector("#columnchart"),
            options
        );

        chart.render();

    }







</script>


<script>
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Reason', 'Total Cancel Demo'],
           <?php foreach($cancel_reason_all as $val) { 
               $cttt=0;   
              foreach($faculty_analysis as $row) {
                   if($row->discard=="0") {
                       if($row->demoStatus=="3") {
                       if($val->reasonName==$row->cancel_reason) {
                                $cttt++;
                            }
                       }
                   }
              }
              ?>
          ['<?php echo $val->reasonName; ?>', <?php echo $cttt; ?>],
           <?php } ?>   
        ]);

        var options = {
            is3D: true,
           // title: 'Toppings I Like On My Pizza',
             colors:['#6FD1A5','#4A8DB3','#A0F47F','#1D340D','#C97C20','#9AB35A','#AF662F','#A12998','#C96D52','#1F24EA','#20A3CC','#A071F3','#35AB4F','#95B5F7','#E03ABB','#9F6816','#C2854B','#4EAA9E','#12F048','#66ABCC','#644B7D','#06F4F0','#1DE678','#53A5F3','#B3F39C','#5E09DC','#B4C88B'],
            fontName: 'Nunito'

        };
        var chart = new google.visualization.PieChart(document.getElementById('cancel_demo_chart'));
        chart.draw(data, options);
      }
</script>
<script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Total Demo', 'Cancel Demo', 'Done Demo'],
           <?php for($i=0;$i<sizeof($mon);$i++) {
              
              if($mon[$i]==1) { $mon_name="Jan"; }
              if($mon[$i]==2) { $mon_name="Feb"; }
              if($mon[$i]==3) { $mon_name="Mar"; }
              if($mon[$i]==4) { $mon_name="Apr"; }
              if($mon[$i]==5) { $mon_name="May"; }
              if($mon[$i]==6) { $mon_name="Jun"; }
              if($mon[$i]==7) { $mon_name="July"; }
              if($mon[$i]==8) { $mon_name="Aug"; }
              if($mon[$i]==9) { $mon_name="Sep"; }
              if($mon[$i]==10) { $mon_name="Oct"; }
              if($mon[$i]==11) { $mon_name="Nov"; }
              if($mon[$i]==12) { $mon_name="Dec"; }
              
              $total_d = 0;   $total_cancel=0;  $total_done=0;
               foreach($last as $val){
           if($val->discard=="0") {
                 if(in_array($val->branch_id,$branch_ids) && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
           
           $mo = explode("-",$val->demoDate);
           $yearr = $mo[0];
           if($mo[1]==$mon[$i])
           {
               $total_d++;
               if($val->demoStatus==1)
               {
                   $total_done++;
               }
               if($val->demoStatus==3)
               {
                   $total_cancel++;
               }
               
           }
           
           
       } } }
       
  //     $demo_res = $total_done*100/$total_d;
     
     
       ?>
       <?php if($i!=5) { ?>
          ['<?php echo $mon_name; ?>',  <?php echo $total_d; ?>,      <?php echo $total_cancel; ?>,         <?php echo $total_done; ?>],
          <?php } else { ?>
         ['<?php echo $mon_name; ?>',  <?php echo $total_d; ?>,      <?php echo $total_cancel; ?>,         <?php echo $total_done; ?>]
          
          <?php } } ?>
        
        ]);

        var options = {
          title : 'Monthly Demo Analysis',
          vAxis: {title: 'Demo'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {4: {type: 'line'}},
          colors: ['#008FFB', '#FF0000', '#006400']
        };
      
        var chart = new google.visualization.ComboChart(document.getElementById('chart1'));
        chart.draw(data, options);     
        
      }
    </script>
</body>

</html>