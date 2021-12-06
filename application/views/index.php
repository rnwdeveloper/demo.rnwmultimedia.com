  
<?php if(!empty($msg))  { ?>
  <script>  alert("This Date Attendance already marked"); </script>
    <?php } ?>

      <?php 

        // echo "<pre>";
        // print_r($_SESSION);
        // die;
        @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);        
        if($_SESSION['logtype']=="Faculty" || $_SESSION['logtype']=="hod")
        {
            @$faculty_course_ids = explode(",",$_SESSION['course_ids']);
            @$faculty_package_ids = explode(",",$_SESSION['package_ids']);
            @$hod_faculty_ids  = explode(",", $_SESSION['faculty_id']);
        }        
        $ttll = 0;   
        $ttpp=0;
        $ttaa=0;
        $ttpend =0;
        $ldata =0;
        $cdemo =0;
             
        // echo "<pre>";            
        // print_r($demo_all);
        // die;
        if(isset($demo_all))

            // echo '<pre>';
            // print_r($aaa_data);
            // die();
        {
          foreach($demo_all as $val) { if($val->discard=="0") { 
            if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin" || $_SESSION['logtype']=="Admin") {

              // if($val->demoStatus=="0") 
              // {
              //     $ldata++;
              // }
              $date = date("Y-m-d");
                if(strcmp($date, date('Y-m-d',strtotime($val->addDate))) == 0)
                {
                  $all_att = explode("&&",$val->attendance);
                  $ttll++;
                  if($val->demoStatus=="0"){
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
                      else if(strpos($val->attendance,$date) == false)
                      {
                        $ttpend++;        
                      }                         
                    }
                  }
                  else if($val->demoStatus){
                    $ldata++;
                  }
                  else if($val->demoStatus){
                    $cdata++;
                  }
                }
              }
            }
          } 
        } 
        $tpall = 0;
        $untaken=0;
        $taall=0;
        $key=0;
        if(isset($curent_month_all))
        {
          foreach ($curent_month_all as $key => $value) {
            $all_att = explode("&&",$value->attendance);
              for($i=0;$i<sizeof($all_att);$i++)
              {
                $att = explode("/",$all_att[$i]);
                  if(isset($att[1]))
                  {
                    // print_r($att[1]);
                    if($att[1]=="P")
                    {
                      $tpall++;
                      break;                                                      
                    }
                    else
                    {
                      $untaken++;
                      break; 
                    }
                  }
                  else
                  {
                    $taall++;
                  }
                }
                # code...
              }
        }       
        //print_r(100*1767/4969);
           $allData = $key+1;
           $untackData = $untaken + $taall;

                    
            //print_r(100*4/6);
       //print_r($key+1;); //4969
      //print_r($untaken+$taall); //1767
      //print_r($untaken); //1712
      //print_r($taall); //55
     // die;


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
                $all_new_confus=0;
                $all_old_confus=0;
                //$takedemo=0;
                //$currentDate = date('Y-m-d');
                if(isset($demo_all)){
                foreach($demo_all as $val) {
                // echo '<pre>';
                // print_r($aaa_data);
                // die();
                 $currentDate = "2018-12-25";
                        if($val->discard=="0") {
                             
                       if($val->demoStatus=="0") { $allrun++;  }
                            
                       if($currentDate==$val->demoDate) 
                       { 
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
                            if($val->demoStatus=="4") { $all_new_confus++; }
                           
                       }
                       else
                       {             
                          if($val->demoStatus=="0") {
                            $all_att = explode("&&",$val->attendance);
                            for($i=0;$i<sizeof($all_att);$i++)
                            {
                              $att = explode("/",$all_att[$i]);
                              if($currentDate==$att[0])
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
                          if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                          if($val->demoStatus=="2" && $val->statusChangeDate
                            ==$currentDate) {$all_old_confus++; }                                              
                       }
                   }

                }

    }
    // print_r($all_old_done);
     // die;
?>


           


<?php date_default_timezone_set("Asia/Calcutta");  ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small >Control panel</small>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>

      <?php

      // echo "<pre>";
      // print_r($upd_see);
      // die;
        $nos=0; foreach($upd_see as $val) { if($val->discard=="0") { if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Faculty" || $_SESSION['logtype']=="hod" || $_SESSION['logtype']=="Admin") { $nos++; } } } ?> 
          <?php  if($nos!=0) {
            $dd = "";
              foreach($upd_see as $val) { if($val->discard=="0") { if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Faculty"  || $_SESSION['logtype']=="hod" || $_SESSION['logtype']=="Admin") { 
                    $dd = $dd." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$val->name."( ".$val->courseName.") , ";
                  } 
              } 
            }
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
      <style>
          .chart-box{
              padding:15px;
              border:1px solid #ccc;
              border-radius:3px;
              background-color:#fff;
              margin-bottom:20px;
              position:relative;
              min-height:395px;
          }
          .chart-box h3 {
              position: absolute;
              left: 0;
              bottom: 0;
              margin: 15px;
              font-size: 21px;
          }
          .chart-box-min{
            min-height:0;
            padding-bottom:110px;
          }
          .chart-box-d-ratio{
            min-height: 295px !important;
          }
          .chart-box.chart-box-min h4 {
              font-size: 18px;
              font-weight: bold;
              margin: 0 0;
          }
          .untaken-box-wrap {
               margin: 15px 0 0px;
          }
          .untaken-box-wrap .untake {
              font-size: 25px;
              color: red;
              text-align: center;
              margin-top: 100px;
          }
      </style>
      <div class="row">
        <div class="col-lg-4 col-4">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <ul class="list-group">
                <h2>Today Add Task</h2>
                <!--  <li class="list-group-item">Dapibus ac facilisis in</li> -->
                  <?php foreach ($to_ad_task as $key => $value) { ?>
                    <li class="list-group-item <?php if($value->status == 0){ echo "list-group-item-danger";}else{ echo "list-group-item-success";} ?>"><?php echo $value->task_name; ?> - &nbsp&nbsp<b><?php echo date("d-m-y",strtotime($value->task_dedline_date));     echo "&nbsp;&nbsp;".date("h:iA",strtotime($value->task_dedline_time)); ?></b>
                    </li>
                  <?php } ?>
              </ul>   
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-4">
          <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <ul class="list-group">
                  <h2>Today Observe Task</h2>
                      <?php foreach ($to_ob_task as $k => $v) { 
                        foreach ($v as $key => $value) {
                      ?>                  
                  <li class="list-group-item <?php if($value->status == 0){ echo "list-group-item-danger";}else{ echo "list-group-item-success";} ?>"><?php echo $value->task_name; ?> - &nbsp&nbsp<b><?php echo date("d-m-y",strtotime($value->task_dedline_date));     echo "&nbsp;&nbsp;".date("h:iA",strtotime($value->task_dedline_time)); ?></b></li>
                  <?php }  }?>
                </ul>                
              </div>              
            </div>
        </div>
        <div class="col-lg-4 col-4">
          <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <ul class="list-group">
                  <h2>Today Working Task</h2>
                  <!--  <li class="list-group-item">Dapibus ac facilisis in</li> -->
                  <?php foreach ($to_wo_task as $k => $v) { 
                    foreach ($v as $key => $value) {
                  ?>
                  <li class="list-group-item <?php if($value->task_status == 0){ echo "list-group-item-danger";}else{ echo "list-group-item-success";} ?>"><?php echo $value->task_name; ?> - &nbsp&nbsp<b><?php echo date("d-m-y",strtotime($value->task_dedline_date));     echo "&nbsp;&nbsp;".date("h:iA",strtotime($value->task_submit_time)); ?></b></li>
                  <?php }  }?>
                </ul>
              </div>             
            </div>
          </div>     
        </div>
        <?php if(isset($_SESSION) && $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin" || $_SESSION['logtype']=="hod"){ ?>
          <div class="row">
        <?php if(isset($seat_month) && !empty($seat_month)){
          foreach($seat_month as $key=>$value){
            foreach ($value as $k => $v) {
                  if(!empty($v->seat_month)){


                    foreach ($v->seat_month as $m => $n) {
                   
      ?>
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-info">

              <div class="inner">
                <h5 style="text-align: center;"><?php  echo $value['branch_name']; ?></h5>
                <h4 style="text-align: center;"><?php echo $v->batch_code; ?></h4>
                <h3 style="text-align: center;"><?php echo $n->month_seat; ?></h3>
                
              </div>
             <!--  <div class="icon">
                <i class="ion ion-bag"></i>
              </div> -->
              <button type="button" class="btn btn-primary" style="width: 100%;" data-toggle="modal" data-target="#e<?php echo $key."_".$m; ?>">
 <?php  echo date("F", mktime(0, 0, 0, $n->month_name, 10)); ?>
</button>
    <div class="modal fade" id="e<?php echo $key."_".$m; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: red;text-align: center;" id="e<?php echo $key."_".$m; ?>" ><?php echo $v->batch_code; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="color: black;">
      <h3 style="text-align: center;"><?php echo $n->month_seat; ?></h3>
        <h4>Book Seat:&nbsp;&nbsp;<?php echo $e= $n->month_book_seat-$n->month_cancle_seat; ?></h4>
                
        <h4>Pending Seat:&nbsp;&nbsp;<?php echo  $n->month_seat-$e ;?></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
              
            </div>
          </div>
      <?php } } } } }?>
      </div>



<?php }else if(isset($_SESSION) && $_SESSION['logtype']=="Counselor "){  ?>
       <div class="row">

     <?php  


     if(isset($seat_month) && !empty($seat_month)){
     foreach($seat_month as $key=>$value){

                foreach ($value as $k => $v) {
                  if(!empty($v->seat_month)){


                    foreach ($v->seat_month as $m => $n) {

                      if($n->month_name == date('n') || $n->status == 1){
                   
      ?>
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-info">

              <div class="inner">
             
               <h4 style="text-align: center;"><?php echo $v->batch_code; ?></h4>

                <h3 style="text-align: center;"><?php echo $n->month_seat; ?></h3>
                
              </div>
             <!--  <div class="icon">
                <i class="ion ion-bag"></i>
              </div> -->
              <button type="button" class="btn btn-primary" style="width: 100%;" data-toggle="modal" data-target="#example<?php echo $m; ?>">
 <?php echo date("F", mktime(0, 0, 0, $n->month_name, 10)); ?>
</button>
    <div class="modal fade" id="example<?php echo $m; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: red;text-align: center;" id="example<?php echo $m; ?>" ><?php echo $v->batch_code; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="color: black;">
        <h4>Book Seat:&nbsp;&nbsp;<?php echo $e= $n->month_book_seat-$n->month_cancle_seat; ?></h4>
        <h4>Pending Seat:&nbsp;&nbsp;<?php echo  $n->month_seat-$e ;?></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
              
            </div>
          </div>
      <?php } } } } } }?>
        <!--   <div class="col-lg-3 col-6">
           
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
      
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          <!-- ./col -->
        </div>
<?php } ?>
   
    <div class="row">


        <div class="col-md-4">
            <div class="chart-box">
                 <form method="post" action="<?php echo base_url(); ?>welcome">
                  <div class="input-group">
                    <select  class="form-control select2" name="filter_branch_data">
                            <option value="">Select Branch</option>
                            <?php foreach($branch_all as $row) {
                            if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>
                                
                            <option <?php if(@$filter_branch_data==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                      
                        <?php   } } ?>
                    </select>
                    <span class="input-group-btn">
                      <input type="submit" name="search_filter" value="Filter" class="btn btn-default btn-success text-white" style="color:#fff"/>
                      <a  href="<?php echo base_url(); ?>welcome" class="btn btn-default btn-danger text-white"  style="color:#fff">Reset</a>
                    </span>
                  </div><!-- /input-group -->
                        
                      </form>
                <div id="year_pie" style="width: 100%; height: 300px; margin: 30px auto 0"></div>
                <h3 id="tota_d">Total Demo :<span id="total_demo"></span></h3>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="chart-box">
                <div id="3D_graf2" style="width: 100%; height: 300px; margin: 0 auto"></div>
                <h3 id="tota_d">Total Demo :<span id="demo_total"></span></h3>
            </div> 
        </div> 
        <div class="col-md-4" id="graph_wise_chart">
            <div class="chart-box">
                <div class="mbarchar">
                     <select class="form-control" id="calendar123">
                    <option value="">Time Selection</option>
                    <?php
                      foreach ($grafwiseday_all as $row)
                       {
                         echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                      }
                     ?>                     
                     </select>
                    <div id="columnchart_material" style="width:100%;height: 300px; position: relative; margin: 0 auto " id="result"></div>
                    <h3 id="tota_d">Total Demo :<span id="mt_demo"></span></h3><br>
                </div>
                         
            </div>
        </div> 
        
    </div>

    <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Counselor " || $_SESSION['logtype']=="Admin") { ?>
    <div class="row" id="untakegraph_wise_chart">
    <div class="col-md-4">
            <div class="chart-box">
              <select class="form-control" id="untakdemo">
                    <option value="">Time Selection</option>
                    <?php
                      foreach ($untakegraph_all as $untak)
                       {
                         echo '<option value="'.$untak->id.'">'.$untak->name.'</option>';
                      }
                     ?>                     
            </select>
            <div class="untaken-box-wrap">
              <h4>Untaken Demo</h4>
              <div class="untake" style="height: 215px;"><?php echo (round(100*$untackData/$allData)); ?>%</div>
                  <h3>Total Demo :<span><?php echo  $allData; ?></span></h3>
              </div> 
            </div>

        </div>


      
    <?php } ?>

        <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Counselor " || $_SESSION['logtype']=="Admin") { ?>
        <div id="cc_per">
    
    <div class="col-md-8">

            <div class="chart-box">
              
     
      <div class="row">
       <div class="col-md-3">
          
               <select class="form-control" id="cc_performe">
                    <option value="">Time Selection</option>
                    <option value="6">Current month</option>
                    <?php
                      foreach ($untakegraph_all as $untak)
                       {
                         echo '<option value="'.$untak->id.'">'.$untak->name.'</option>';
                      }
                     ?>                     
            </select>
        </div>
      <form method="post" id="frm_cc">
            <div class="col-md-3">
          
             <div class=form-group>
                  <div class="input-group date" data-provide="datepicker">
                    <input class="form-control" id="data" name="sdata" placeholder="YY/MM/DD" type="text" />

                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                  </div>
                </div>
        </div>
         <div class="col-md-3">
          
             <div class=form-group>
                  <div class="input-group date" data-provide="datepicker">
                    <input class="form-control" id="data" name="edata" placeholder="YY/MM/DD" type="text" />

                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                  </div>
                </div>
        </div>
        <div class="col-md-3">
              <button type="button" id="search_cc" class="btn btn-success">
                    search
              </button>
        </div>
        </form>
      </div>
             

            <div class="untaken-box-wrap" >
              <div class="table-responsive">
             <div id="top_x_div" style="height: 300px;"></div>
             </div> 
            </div>

        </div>
</div>
</div>
</div>
      
    <?php } ?>

    


      <!-- <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Counselor ") { ?>
     <div class="col-md-4" id="donegraph_wise_chart">
            <div class="chart-box">
                <div class="mbarchar">
                     <select class="form-control" id="donedemo">
                    <option value="">Time Selection</option>
                    <?php

                      foreach ($user_graph_counselor as $done)
                       {
                         echo '<option value="'.$done->id.'">'.$done->name. '</option>';
                      }
                     ?>                       
                     </select> 
                     <?php 
                     $count = 0;
                     if(isset($all_couselor)){
                      foreach($all_couselor as $k=>$val) { 
                        $count = $count  + $val;
                     } }?>
                    <div id="Counselor_demo" style="width:100%;height: 300px; position: relative; margin: 0 auto " id="result"></div>
                    <h3 id="tota_d" class="d">Counselor Total Done Demo :<span id=""><?php echo $count; ?></span></h3><br>
                </div>                         
            </div>  
        </div>
      </div>
      <?php } ?>
 -->
     <!-- <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Counselor ") { ?>
     <div class="col-md-4" id="donegraph_wise_chart">
            <div class="chart-box">
                <div class="mbarchar">
                     <select class="form-control" id="donedemo">
                    <option value="">Time Selection</option>
                    <?php

                      foreach ($user_graph_counselor as $done)
                       {
                         echo '<option value="'.$done->id.'">'.$done->name. '</option>';
                      }
                     ?>                       
                     </select> 
                     <?php 
                     $count = 0;
                     if(isset($all_couselor)){
                      foreach($all_couselor as $k=>$val) { 
                        $count = $count  + $val;
                     } }?>
                    <div id="Counselor_demo" style="width:100%;height: 300px; position: relative; margin: 0 auto " id="result"></div>
                    <h3 id="tota_d" class="d">Counselor Total Done Demo :<span id=""><?php echo $count; ?></span></h3><br>
                </div>                         
            </div>  
        </div>
      </div>
      <?php } ?>
 -->


        <!-- <div class="panel-body">
                <div id="chart_area" style="width: 1000px; height: 620px;"></div>
            </div> -->






<?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>

     <div id="new_cc">      

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Current Month Counselor Wise Performance"
  },
  legend:{
    cursor: "pointer",
    verticalAlign: "center",
    horizontalAlign: "right",
    itemclick: toggleDataSeries
  },
  data: [{
    type: "column",
    name: "Take Demo",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($taken_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "column",
    name: "Done Demo",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($done_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "column",
    name: "Cancel Demo",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($cancle_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
   {
    type: "column",
    name: "Running Demo",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($running_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "column",
    name: "Confusion Demo",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($confusion_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "column",
    name: "Leave Demo",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($leave_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {

    dataPoints: <?php echo json_encode($taken_name_demo, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
function toggleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else{
    e.dataSeries.visible = true;
  }
  chart.render();
}
 
}
</script>


<div class="row">
       <div class="col-md-3">
          
               <select class="form-control" id="donedemo_cc">
                    <option value="">Time Selection</option>
                    <option value="6">Current month</option>
                    <?php
                      foreach ($untakegraph_all as $untak)
                       {
                         echo '<option value="'.$untak->id.'">'.$untak->name.'</option>';
                      }
                     ?>                     
            </select>
        </div>

        <form id="ss" name="form" class="form-inline">
        <div class="col-md-3">
        	
        	
    <div class="form-group">
        <label for="startDate">Start Date</label>
        <input id="startDate" name="startDate" type="text" class="form-control" />
   
        
    </div>


        </div>
        <div class="col-md-3">
        	<label for="endDate">End Date</label>
        <input id="endDate" name="endDate" type="text" class="form-control" />
        </div>
        <div class="col-md-3">
        	<button type="button" class="btn btn-success">search</button>
        </div>

        </form>


      <!-- <form method="post" id="frm_cc">
            <div class="col-md-3">
          
             <div class=form-group>
                  <div class="input-group date" data-provide="datepicker">
                    <input class="form-control" id="data" name="sdata" placeholder="YY/MM/DD" type="text" />

                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                  </div>
                </div>
        </div>
         <div class="col-md-3">
          
             <div class=form-group>
                  <div class="input-group date" data-provide="datepicker">
                    <input class="form-control" id="data" name="edata" placeholder="YY/MM/DD" type="text" />

                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                  </div>
                </div>
        </div>
        <div class="col-md-3">
              <button type="button" id="search_cc" class="btn btn-success">
                    search
              </button>
        </div>
        </form> -->
      </div>
                  
  
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function(){
      $('#donedemo_cc').change(function(){


     var donekey = $(this).val();
  // alert(donekey);

      $.ajax({
          url:"Welcome/CounselorDone_graph_cc",
          type:'POST',
          data:
          {
            'k':donekey,
          },
          success:function(res){
              $('#new_cc').html(res);
          }
      });
  });
  });


</script>
 </div>



<?php } ?>


<br>
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
                            if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>
                                
              <option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                      
                      <?php   } } ?>
                        </select>
            
                   </div>
                  
                  <div class="col-md-2">
             <select  class="form-control select2" name="filter_department">
                          <option value="">
                            Department</option>
                            <?php foreach($department_all as $val) {
                            if(in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>
                              <option  <?php if(@$filter_department==$val->department_id) { echo "selected"; } ?>    value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
                            <?php } } ?>
                        </select>
          </div>  
                    <div class="col-md-4">
             <select  class="form-control select2" name="filter_faculty"  >
                          <option value="">Faculty</option>
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
               
             <select  class="form-control select2 " name="filter_course"  >
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
                        <input type="submit" value="Filter" class="btn btn-success pull-right" name="search"/>
                        </div>
                        <div class="col-sm-6">
                        <a  href="<?php echo base_url(); ?>welcome" class="btn btn-danger" >Reset</a>
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
                      
               <?php 


               if(isset($demo_all)) { foreach($demo_all as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {
              
                  if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") {
                      
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
                              else if($_SESSION['logtype']=="hod")
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
        //             echo "<pre>";
            // print_r($all_att);
        //             die();
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
                                        <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>
                                        <div class="col-md-2">
                                            <label class="radio-inline">
                                                  <input type="radio" checked id="radioP2" name="att" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'P')" value="P">P
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="att" id="radioA2" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'A')" value="A">A
                                                </label>
                                        </div>
                                        <div class="col-md-2">
                                            
                                            <input type="text" value="<?php echo date("Y-m-d"); ?>"  class="form-control datepicker <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>"    placeholder="Select Date" name="attDate" style="border:none; color:#FFF;" >
                                               
                                                
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
                                            <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>
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
                     
                    
                     
        
                    
                    <?php } } } } } } } }?>
                       
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
                        
                          <?php if(isset($demo_all)) { foreach($demo_all as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {
                  
                  if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") {
                      
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
                              else if($_SESSION['logtype']=="hod")
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
                                        <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>
                                        <div class="col-md-2">
                                            <label class="radio-inline">
                                                  <input type="radio" checked id="radioP2" name="att" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'P')" value="P">P
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="att" id="radioA2" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'A')" value="A">A
                                                </label>
                                        </div>
                                        <div class="col-md-2">
                                            
                                            <input type="text" value="<?php echo date("Y-m-d"); ?>"  class="form-control datepicker <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>"    placeholder="Select Date" name="attDate" style="border:none; color:#FFF;" >
                                               
                                                
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
                                            <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>
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
                     
                    
                     
        
                    
                    <?php } } } } } } } }?>
                       
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
                        
                          <?php if(isset($demo_all)) { foreach($demo_all as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {
                  
                  if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") {
                      
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
                              else if($_SESSION['logtype']=="hod")
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

                                 // echo "<pre>";
                                 // print_r($hod_faculty_ids);
                                 // die;
                                 if(in_array($val->faculty_id,$hod_faculty_ids)) 
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
          // $ldata = explode("&&",$val->demoStatus);
                    // echo "<pre>";
                    // print_r($val);
                    // die();
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
                                        <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>
                                        <div class="col-md-2">
                                            <label class="radio-inline">
                                                  <input type="radio" checked id="radioP2" name="att" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'P')" value="P">P
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="att" id="radioA2" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'A')" value="A">A
                                                </label>
                                        </div>
                                        <div class="col-md-2">
                                            
                                            <input type="text" value="<?php echo date("Y-m-d"); ?>"  class="form-control datepicker <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>"    placeholder="Select Date" name="attDate" style="border:none; color:#FFF;" >
                                               
                                                
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
                                            <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>
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
                        
                      </div>
                      
                    </div>

                    <?php } } } } } } } }?>
                       
                    </div>
                    <!-- /.box-body -->
                  </div> 
                  
                  
                  
                  
                  <!-- /.box -->
            </div>
          <div class="col-md-12">
         
             <div class="box box-primary" style="margin-bottom:10px;">
                    <div class="box-header with-border">
                      <h3 class="box-title">Take Demo Attendance &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; <?php if($_SESSION['logtype']!="Faculty") { echo "Total Demo : ".$all_today_new." &nbsp;&nbsp; P : ".$all_new_pr." &nbsp;&nbsp; A : ".$all_new_ab." &nbsp;&nbsp; Pending Attendance : ".$ttpend;  } ?></h3>
                    </div>
                </div>
              <?php
              if(isset($demo_data)) {

              foreach($demo_data as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {

                  if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") {
                      
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
                             else if($_SESSION['logtype']=="hod")
                             {
                                 if(in_array($val->faculty_id,$hod_faculty_ids))
                                 {
                                    $isRelavent=true;
                                 }
                                 else
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
                             }
                               // echo "<pre>";
                              // print_r($faculty_course_ids);
                              // print_r($faculty_package_ids);
                               

           if($isRelavent==true || $_SESSION['logtype']== "Super Admin" || $_SESSION['logtype']=="Admin") {
           
          
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
                                        <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>
                                        <div class="col-md-2">
                                            <label class="radio-inline">
                                                  <input type="radio" checked id="radioP" name="att" onclick="whichSelect(<?php  echo $val->demo_id; ?>,'P')" value="P">P
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="att" id="radioA" onclick="whichSelect(<?php  echo $val->demo_id; ?>,'A')" value="A">A
                                                </label>
                                        </div>
                                        <div class="col-md-2">
                                            
                                            <input type="text" value="<?php echo date("Y-m-d"); ?>"  class="form-control datepicker <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>"    placeholder="Select Date" name="attDate" style="border:none; color:#FFF;" >
                                               
                                                
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
                                            <?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") { ?>
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
                                              <span class="info-box-text" style="text-transform:capitalize; font-style:italic;">Assign To : 
                                             <?php foreach($hod_all as $row) { if($val->hod_id==$row->hod_id) {   echo $row->name; } }  ?>
                                              <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?></span>
                                          </div>
                                  </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                      
                      
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <?php } } } } } } ?>
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

<script src="<?php echo base_url(); ?>chart/js/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>chart/js/loader.js"></script>
<script type="text/javascript">
      google.charts.load('visualization', "1", {
          packages: ['corechart']
      });
  </script>
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







<?php $total_student =  array('Pending'=>$ttpend,'Absent'=>$all_new_ab,'leave'=>$all_new_leave,'Present'=>$all_new_pr,'Cancle Demo'=>$all_new_cancel,'Done Demo'=>$all_new_done,'Confusion Demo'=>$all_new_confus); 
?>
<script language="JavaScript">

    $("#total_demo").html(<?php echo $all_today_new?>);
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
        title: 'Demo Ratio_new',
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

 <!-- <script type="text/javascript"> -->

<!-- 
    <?php           
         if(!empty($filter_faculty)) { 
                        if(!empty($filter_demoDate_start) && !empty($filter_demoDate_end))
                        {
                            
                            $duration = $filter_demoDate_start." To ".$filter_demoDate_end;
                            
                        }
                    }
                    else
                    {
                        $duration = "Current Month";
                    }

                    ?> -->

     <?php 
     $duration = "Current Month";
        $ttt=0; $takedemo=0; $ddd=0; $lll=0;  $ccc=0; $rrr=0; $conf=0;  
        // echo "<pre>";
        // print_r($all_d);
        // die();
        if(isset($all_d)){
        foreach($all_d as $val) 
        {
             if($val->discard=="0") {  if(in_array($val->branch_id,$branch_ids) && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") {
                 
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
                 if($val->demoStatus=="4")
                {
                    $conf++;
                }

                 if($val->attendance!="")
                 {
                $day1=0;
               $all_att = explode("&&",$val->attendance);
                                                  
               for($i=0;$i<sizeof($all_att);$i++)
               {
                 $att = explode("/",$all_att[$i]);
                if(@$att[1]=="P")
                {
                     $day1++;  
                }
              }
              if($day1!=0)
              {
                            $takedemo++;
              }
                }
            
        } }
     }
   }
  
    ?>
     <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['        ','Take Demo','Cancel Demo','Leave Demo','Done Demo','Confusion Demo','Running Demo'],
         
          ['<?php echo $duration; ?>', <?php echo $takedemo;?>,<?php echo $ccc;?>,<?php echo $lll;?>,<?php echo $ddd;?>,<?php echo $conf;?>,<?php echo $rrr;?>]
        ]);
  
        var options = {
          chart: {
            title: ' ',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
         $("#mt_demo").html(<?php echo $ttt?>);
      }
    </script>

    <?php $total_student_old=  array('Pending'=>$allrun,'Absent'=>$all_old_ab,'leave'=>$all_old_leave,'Present'=>$all_old_pr,'Done Demo'=>$all_old_done,'Cancel Demo'=>$all_old_cancel,'Confusion Demo'=>$all_old_confus); 
?>
<script graf2="JavaScript">

    $("#demo_total").html(<?php echo $allrun?>);
  // Draw the pie chart for registered users month wise

 
  // Draw the pie chart for registered users year wise
  google.charts.setOnLoadCallback(yearWiseChartt);
   
  //for month wise
 
  function yearWiseChartt() {
 
    /* Define the chart to be drawn.*/
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Users Count'],
        <?php 
         foreach ($total_student_old as $d=>$val){
         echo "['".$d."',".$val."],";
         }
         ?>
    ]);
    var options = {
        title: 'Demo Ratio_old',
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
    var chart = new google.visualization.PieChart(document.getElementById('3D_graf2'));
    chart.draw(data, options);
  }
  // for year wise
  
</script>


<!-- <ul id="results"></ul> -->
<script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function(){
      $('#calendar123').change(function(){

     var key = $(this).val();
   // alert(lastWeek);

      $.ajax({
          url:"Welcome/search_graph",
          type:'POST',
          data:
          {
            'k1':key,
          },
          success:function(res){
              $('#graph_wise_chart').html(res);
          }
      });
  });
  });


</script>

<script type="text/javascript">
  
  $(document).ready(function(){
      $('#untakdemo').change(function(){

     var untkey = $(this).val();
  //alert(untkey);

      $.ajax({
          url:"Welcome/untake_graph",
          type:'POST',
          data:
          {
            'k2':untkey,
          },
          success:function(res){
              $('#untakegraph_wise_chart').html(res);
          }
      });
  });
  });


</script>

<?php 
      
     $duration = "Current Month";
     $cname='';
     $arr = array();
        

        if(isset($all_couselor)){
        foreach($all_couselor as $key=>$val) 
        { 
              

        }
      // echo "<pre>";
      // print_r($arr);
      // die;
  }
   //counselor chart
    ?>

   

    <script graf4="JavaScript">
  // Draw the pie chart for registered users year wise
  google.charts.setOnLoadCallback(yearWiseChartt);
   
  //for month wise
  function yearWiseChartt() {
 
    /* Define the chart to be drawn.*/
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Users Count'],
        <?php 
        if($_SESSION['logtype']=="Counselor" || $_SESSION['logtype']!="Faculty"){
         foreach ($all_couselor as $d=>$val){
          
         echo "['".$d."',".$val."],";
         }
       }
         ?>
    ]);
    var options = {
        title: 'Done Demo Ratio_Counselor',
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
    var chart = new google.visualization.PieChart(document.getElementById('Counselor_demo'));
    chart.draw(data, options);
  }
  // for year wise

</script>
<script type="text/javascript">
  
  $(document).ready(function(){
      $('#donedemo').change(function(){

     var donekey = $(this).val();
  //alert(donekey);

      $.ajax({
          url:"Welcome/CounselorDone_graph",
          type:'POST',
          data:
          {
            'k':donekey,
          },
          success:function(res){
              $('#donegraph_wise_chart').html(res);
          }
      });
  });
  });


</script>

<script type="text/javascript">
  
  $(document).ready(function(){
      $('#donedemo_cc').change(function(){


     var donekey = $(this).val();
  // alert(donekey);

      $.ajax({
          url:"Welcome/CounselorDone_graph_cc",
          type:'POST',
          data:
          {
            'k':donekey,
          },
          success:function(res){
              $('#new_cc').html(res);
          }
      });
  });
  });


</script>


<script type="text/javascript">
  
  $(document).ready(function(){
      $('#cc_performe').change(function(){

     var donekey = $(this).val();
  //alert(donekey);

      $.ajax({
          url:"Welcome/cc_graph",
          type:'POST',
          data:
          {
            'k':donekey,
          },
          success:function(res){
              $('#cc_per').html(res);
          }
      });
  });
  });


</script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          <?php foreach($user_all_couseller as $val) { 
              $demo_res1=0;  $ttttt=0;  $ddddd=0;
              foreach($demo_all_counselor as $row) {
                   if($row->discard=="0") {
                       if($val->name==$row->addBy) {
                             
                           
                            if($row->demoStatus=="1")
                            {
                                $ttttt++;
                            }
                            if($row->demoStatus=="3" && $row->attendance!="")
                            {
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
                          if($day!=0)
                          {
                                        $ttttt++;
                          }
                            }
                            if($row->demoStatus=="1")
                            {
                                $ddddd++;
                            }
                       }
                   }
              }
              
               $demo_res1 = $ddddd*100;
               if($demo_res1!=0)
               {
                  $ress = $demo_res1/$ttttt;
               }
               else
               {
                   $ress=0;
               }
              ?>
             
          ["<?php echo $val->name; ?>", <?php echo $ress; ?>],
          <?php } ?>
         
        ]);

        var options = {
          width: 900,
          legend: { position: 'none' },
          chart: {
            title: 'Counselor wise Demo performance',
            subtitle: '' },
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "25%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };







    </script>


<script type="text/javascript">
  
  $(document).ready(function(){
      $('#search_cc').click(function(){

     var s = $('input[name=sdata]').val();
     var e = $('input[name=edata]').val();
   
   

      $.ajax({
          url:"Welcome/cc_graph",
          type:'POST',
          data:{
            k:'10',
            sdate:s,
            edate:e
          },
          success:function(res){
              $('#cc_per').html(res);
          }
      });
  });
  });


</script>















<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
<sc0ript src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
	var bindDateRangeValidation = function (f, s, e) {
		
    if(!(f instanceof jQuery)){
			console.log("Not passing a jQuery object");
    }
  
    var jqForm = f,
        startDateId = s,
        endDateId = e;
  
    var checkDateRange = function (startDate, endDate) {
        var isValid = (startDate != "" && endDate != "") ? startDate <= endDate : true;
        return isValid;
    }

    var bindValidator = function () {
        var bstpValidate = jqForm.data('bootstrapValidator');
        var validateFields = {
            startDate: {
                validators: {
                    notEmpty: { message: 'This field is required.' },
                    callback: {
                        message: 'Start Date must less than or equal to End Date.',
                        callback: function (startDate, validator, $field) {
                            return checkDateRange(startDate, $('#' + endDateId).val())
                        }
                    }
                }
            },
            endDate: {
                validators: {
                    notEmpty: { message: 'This field is required.' },
                    callback: {
                        message: 'End Date must greater than or equal to Start Date.',
                        callback: function (endDate, validator, $field) {
                            return checkDateRange($('#' + startDateId).val(), endDate);
                        }
                    }
                }
            },
          	customize: {
                validators: {
                    customize: { message: 'customize.' }
                }
            }
        }
        if (!bstpValidate) {
            jqForm.bootstrapValidator({
                excluded: [':disabled'], 
            })
        }
      
        jqForm.bootstrapValidator('addField', startDateId, validateFields.startDate);
        jqForm.bootstrapValidator('addField', endDateId, validateFields.endDate);
      
    };

    var hookValidatorEvt = function () {
        var dateBlur = function (e, bundleDateId, action) {
            jqForm.bootstrapValidator('revalidateField', e.target.id);
        }

        $('#' + startDateId).on("dp.change dp.update blur", function (e) {
            $('#' + endDateId).data("DateTimePicker").setMinDate(e.date);
            dateBlur(e, endDateId);
        });

        $('#' + endDateId).on("dp.change dp.update blur", function (e) {
            $('#' + startDateId).data("DateTimePicker").setMaxDate(e.date);
            dateBlur(e, startDateId);
        });
    }

    bindValidator();
    hookValidatorEvt();
};


$(function () {
    var sd = new Date(), ed = new Date();
  
    $('#startDate').datetimepicker({ 
      pickTime: false, 
      format: "YYYY/MM/DD", 
      defaultDate: sd, 
      maxDate: ed 
    });
  
    $('#endDate').datetimepicker({ 
      pickTime: false, 
      format: "YYYY/MM/DD", 
      defaultDate: ed, 
      minDate: sd 
    });

    //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
    bindDateRangeValidation($("#form"), 'startDate', 'endDate');
});
</script>


<script type="text/javascript">
  function loadDoc() {

    setInterval(function(){

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         document.getElementById("gave_total_task").innerHTML = this.responseText;

        }
      };
      var m = document.getElementById("gave_total_task").innerHTML;
      
      $('#gave_total_task_main').text(m);
      xhttp.open("GET", "TaskController/count_dd", true);
      xhttp.send();

    },1000);


}

loadDoc();
</script>


<script type="text/javascript">
  function loadDocob() {

    setInterval(function(){

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         document.getElementById("gave_total_ob_task").innerHTML = this.responseText;

        }
      };
      var m = document.getElementById("gave_total_ob_task").innerHTML;
      
      $('#gave_total_ob_task_main').text(m);
      xhttp.open("GET", "TaskController/count_ob", true);
      xhttp.send();

    },1000);


}

loadDocob();
</script>

</body>
</html>

