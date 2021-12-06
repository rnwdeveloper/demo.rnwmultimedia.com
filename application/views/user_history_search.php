                                                       <table class="table table-bordered create_responsive_table" id="ll_mmssgg">
                                                            <tr class="thead">

                                                               <!--  <th>Counter</th> -->
                                                                <!-- <th>User</th> -->
                                                                <th>PC Details</th>
                                                               <!--  <th>Device</th>
                                                                <th>OS</th>
                                                                <th>Browse</th> -->
                                                                <!-- <th>History Date / Time</th> -->
                                                                <!-- <th>History total time</th> -->
                                                                <th>History Detail</th>
                                                                <!-- <th>History Data</th> -->
                                                               
                                                            </tr>

                                                            <?php
                                                            
                                                             foreach($l_data as $kj=> $v){ ?>
                                                            <tr class="demo_status_done demo_status_color">
                                                            
<!-- 
                                                                <td data-heading="Demo Details">
                                                                    <?php echo $v->created_by; ?>
                                                                </td> -->

                                                              <td data-heading="Demo Id">
                                                               
                                                               <ul>
                                                               <li class="student_alert_bar btn-warning"><!-- <marquee behavior="alternate"> --><?php echo $v->created_by; ?><!-- </marquee> --> </li>
                                                               
                                                                  <li class="student_alert_bar student_status_running"><?php echo $v->token; ?></li>
                                                                  <li class="student_alert_bar demo_status_confusion"><?php echo $v->device; ?></li>
                                                                  <li class="student_alert_bar demo_status_leave"><?php echo $v->os; ?></li>
                                                                  <li class="student_alert_bar demo_status_cancel"><?php echo $v->browser; ?></li>
                                                               </ul> 
                                                              </td>
                                                                <!-- <td data-heading="Demo Id"><?php echo $v->device; ?></td>
                                                                <td data-heading="Demo Date / Time">
                                                                    <?php echo $v->os; ?>
                                                                </td>
                                                                <td data-heading="Demo Date / Time">
                                                                    <?php echo $v->browser; ?>
                                                                </td>
                                                              <td data-heading="Demo Date / Time">
                                                                <?php echo $v->created_date; ?>
                                                              </td> -->
                                                               <td>
                                                                  <?php $hdata = explode("/../", $v->comment);
                                                                  $test = array();
                                                                  $tdata = array();
                                                                  $q = array();
                                                                  foreach ($hdata as $m => $n) {
                                                                    $test[]= substr($n, strpos($n,'///')+strlen('///'));
                                                                  }

                                                                  foreach ($hdata as $u => $e) {
                                                                    $tdata[$u][] = substr($e, 0, strpos($e, '///'));
                                                                     if($u != count($hdata)-1)
                                                                    {
                                                                        $a=substr($hdata[$u],0,8);
                                                                       $b=substr($hdata[$u+1],0,8);
                                                                       $c =  strtotime($b)-strtotime($a);
                                                                       $j=($c/3600);
                                                                       $m=($c/60%60);
                                                                       $s=($c%60);
                                                                      // echo "<br>".sprintf("%02d",$j).":".sprintf("%02d",$m).":".sprintf("%02d",$s)."<br>";
                                                                       $tdata[$u][] = sprintf("%02d",$j).":".sprintf("%02d",$m).":".sprintf("%02d",$s);
                                                                     }
                                                                  }
                                                                  // echo "<pre>";
                                                                  // print_r($tdata);
                                                                  // die;
                                                                  $sum1 = "00:00:00";
                                                                  foreach ($tdata as $rr => $tt) {
                                                                          if($rr<count($tdata)-1)
                                                                          {

                                                                           $b1 = $tt[1];
                                                                          $time1 = date('H:i:s',strtotime($sum1));
                                                                          $time2 = date('H:i:s',strtotime($b1));
                                                                          $times = array($time1, $time2);
                                                                          $seconds = 0;
                                                                          foreach ($times as $time)
                                                                          {
                                                                            list($hour,$minute,$second) = explode(':', $time);
                                                                            $seconds += $hour*3600;
                                                                            $seconds += $minute*60;
                                                                            $seconds += $second;
                                                                          }
                                                                          $hours = floor($seconds/3600);
                                                                          $seconds -= $hours*3600;
                                                                          $minutes  = floor($seconds/60);
                                                                          $seconds -= $minutes*60;
                                                                          if($seconds < 9)
                                                                          {
                                                                          $seconds = "0".$seconds;
                                                                          }
                                                                          if($minutes < 9)
                                                                          {
                                                                          $minutes = "0".$minutes;
                                                                          }
                                                                            if($hours < 9)
                                                                          {
                                                                          $hours = "0".$hours;
                                                                          }
                                                                          $sum1 =   "{$hours}:{$minutes}:{$seconds}";
                                                                        }
                                                                      }
                                                                       
                                                                //  $test = array(10,20,10,60,60,20,80,60,60);
                                                                  $demo = array();

                                                                  $k=0;
                                                                  for ($x=0; $x < count($test); $x++) { 
                                                                  $temp=0;

                                                                    for ($y=0; $y < $k; $y++) { 
                                                                        if($test[$x] == $demo[$y])
                                                                        {
                                                                          $temp=1;
                                                                          break;
                                                                        }
                                                                    }

                                                                    if($temp == 0)
                                                                    {
                                                                        $demo[$k] = $test[$x];
                                                                        $k++;
                                                                    }
                                                                  }
                                                                 $all = array();
                                                                  for ($g=0; $g < count($demo); $g++) { 
                                                                    $cc=1;
                                                                    $sum = "00:00:00";
                                                                    for ($w=0; $w < count($test); $w++) { 

                                                                      if($demo[$g] == $test[$w])
                                                                      {
                                                                           if($w < count($test)-1)
                                                                           { 
                                                                           $bb = $tdata[$w][1];
                                                                          $time1 = date('H:i:s',strtotime($sum));
                                                                          $time2 = date('H:i:s',strtotime($bb));
                                                                          $times = array($time1, $time2);
                                                                          $seconds = 0;
                                                                          foreach ($times as $time)
                                                                          {
                                                                            list($hour,$minute,$second) = explode(':', $time);
                                                                            $seconds += $hour*3600;
                                                                            $seconds += $minute*60;
                                                                            $seconds += $second;
                                                                          }
                                                                          $hours = floor($seconds/3600);
                                                                          $seconds -= $hours*3600;
                                                                          $minutes  = floor($seconds/60);
                                                                          $seconds -= $minutes*60;
                                                                          if($seconds < 9)
                                                                          {
                                                                          $seconds = "0".$seconds;
                                                                          }
                                                                          if($minutes < 9)
                                                                          {
                                                                          $minutes = "0".$minutes;
                                                                          }
                                                                            if($hours < 9)
                                                                          {
                                                                          $hours = "0".$hours;
                                                                          }
                                                                          $sum =   "{$hours}:{$minutes}:{$seconds}";
                                                                        }
                                                                          $all[$demo[$g]] = $cc++." ....".$sum;
                                                                          
                                                                      }
                                                                    }
                                                                  }
                                                                // foreach ($all as $key => $value) {
                                                                //  echo $key."=".$value."<br>";
                                                                // }
                                                                
  
                                                                 ?>
                                                                   <table class="table table-bordered" style="color: white;">
                                                                  <tr>
                                                                      <th>Total Log <span class="student_alert_bar student_status_running">[<?php echo $v->created_date; ?>]</span>
                                     <span class="btn btn-danger" style="float: right;"><?php echo $sum1; ?></span>
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $kj; ?>" style="float: right;">
                                        History
                                     </button>
                                                                      </th>
                                                                      <th>Count</th>
                                                                      <th>Time</th>
                                                                  </tr>
                                                                  <?php foreach ($all as $key => $value) { ?>
                                                                  <tr>
                                                                      <td><?php echo $key; ?></td>
                                                                      <td style="width: 15px;"><?php echo substr($value, 0, strpos($value, '....')); ?></td>
                                                                      <td style="width: 20px;"><?php echo substr($value, strpos($value,'....')+strlen('....')); ?></td>
                                                                  </tr>
                                                                  <?php } ?>
                                                              </table>
                                                               

                                                                                                    <div class="modal fade" id="exampleModal<?php echo $kj; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel" style="color: black;">All History Details <?php echo $v->created_by; ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <?php $hdata = explode("/../", $v->comment);  ?>
                                                                    <table class="table table-bordered" style="color: black;width: 100%;">
                                                                      <tr>
                                                                        <th>Time</th>
                                                                        <th>Log Name</th>
                                                                        <th>Total Minute</th>
                                                                      </tr>
                                                                      <?php  foreach($hdata as $k=>$v){ ?>
                                                                      <tr>
                                                                        <td><?php echo substr($v, 0, strpos($v, '///')); ?></td>
                                                                         <td><?php echo substr($v, strpos($v,'///')+strlen('///')); ?></td>
                                                                         <td style="color: red;">   
                                                                    <?php 
                                                                    if($k != count($hdata)-1)
                                                                    {
                                                                        $a=substr($hdata[$k],0,8);
                                                                       $b=substr($hdata[$k+1],0,8);
                                                                       $c =  strtotime($b)-strtotime($a);
                                                                       $j=($c/3600);
                                                                       $m=($c/60%60);
                                                                       $s=($c%60);
                                                                       echo sprintf("%02d",$j).":".sprintf("%02d",$m).":".sprintf("%02d",$s);
                                                                     }
                                                                          ?></td>
                                                                      </tr>
                                                                      <?php } ?>
                                                                    </table>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                                               
                                                                </td>
                                                            <!--  <td data-heading="Demo Date / Time">
                                                                    <?php $h = explode(",", $v->comment);

                                                                    $j=0;
                                                                    foreach ($h as $key => $value) {
                                                                        $h[$j++] = substr($h[$key],0,8);
                                                                    }
                                                             
                                                                    for ($i=0; $i < count($h); $i++) { 
                                                                       if($i != count($h)-1)
                                                                       {
                                                                        
                                                                       $a=$h[$i];
                                                                       $b=$h[$i+1];
                                                                       $c =  strtotime($b)-strtotime($a);
                                                                       $j=($c/3600);
                                                                       $m=($c/60%60);
                                                                       $s=($c%60);
                                                                       echo "<br>".sprintf("%02d",$j).":".sprintf("%02d",$m).":".sprintf("%02d",$s)."<br>";

                                                                       }

                                                                    }
                                                                     ?>
                                                                </td>
                                                               -->
                                       <!-- <td data-heading="Course" > -->
                                       

                                                               
                                                                <!-- </td> -->
                                                            </tr>
                                                            <?php } ?>
                                                            
                                                          

                                                      </table>


<?php include('footer_test.php'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
 <script type="text/javascript">
$(function() {

   var start1=moment().subtract(1, 'days');
    var end1=moment();

    
    var start=""
     var end=""
    
    

    function cb(start, end) {
        $('#fromdate').val(start.format('DD-MM-YYYY'));
        $('#todate').val(end.format('DD-MM-YYYY'));
        $('#reportrange span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
        alert(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
        $.ajax({
           url:'<?php echo base_url(); ?>Welcome/log_history_userdate',
           type:"post",
           data:{'d':start.format('DD-MM-YYYY') ,'e': end.format('DD-MM-YYYY')},
           success: function(data)
              {
                
                $('#ll_mmssgg').html(data);
                
                
                
              }
        });
    }

    $('#reportrange').daterangepicker({
        startDate: start1,
        endDate: end1,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>