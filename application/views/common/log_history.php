<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

<style type="text/css">
  li.select2-selection__choice {
    background-color: #5864BC !important;
  }
</style>
<!-- Main Content -->
<div class="main-content overflow-hidden">
  <section class="section">
    <div class="section-body ">
      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-end">
            <div class="table-right-content">
              <button class="btn btn-info py-2" data-toggle="modal" data-target=".filter-history">
                <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i class="fas fa-filter mr-1"></i></span>
              </button>
              <button class="btn text-dark">
                <span><i class="fas fa-arrow-left mr-1"></i> Back</span>
              </button>
            </div>
          </div>
          <div class="history-scrollbar pr-4">
            <?php
            foreach ($l_data as $kj => $v) { ?>
              <div class="card mt-3 card-primary">
                <div class="pc-details d-flex p-3">
                  <div>
                    <button class="btn btn-primary btn-sm mr-1"><?php echo $v->created_by; ?></button>
                    <button class="btn btn-light text-dark btn-sm mr-1"><?php echo $v->token; ?></button>
                    <button class="btn btn-light text-dark btn-sm mr-1"><?php echo $v->device; ?></button>
                    <button class="btn btn-light text-dark btn-sm mr-1"><?php echo $v->os; ?></button>
                    <button class="btn btn-light text-dark btn-sm mr-1"><?php echo $v->browser; ?></button>
                  </div>
                  <?php $hdata = explode("/../", $v->comment);
                  $test = array();
                  $tdata = array();
                  $q = array();
                  foreach ($hdata as $m => $n) {
                    $test[] = substr($n, strpos($n, '///') + strlen('///'));
                  }

                  foreach ($hdata as $u => $e) {
                    $tdata[$u][] = substr($e, 0, strpos($e, '///'));
                    if ($u != count($hdata) - 1) {
                      $a = substr($hdata[$u], 0, 8);
                      $b = substr($hdata[$u + 1], 0, 8);
                      $c =  strtotime($b) - strtotime($a);
                      $j = ($c / 3600);
                      $m = ($c / 60 % 60);
                      $s = ($c % 60);
                      // echo "<br>".sprintf("%02d",$j).":".sprintf("%02d",$m).":".sprintf("%02d",$s)."<br>";
                      $tdata[$u][] = sprintf("%02d", $j) . ":" . sprintf("%02d", $m) . ":" . sprintf("%02d", $s);
                    }
                  }

                  $sum1 = "00:00:00";
                  foreach ($tdata as $rr => $tt) {
                    if ($rr < count($tdata) - 1) {
                      $b1 = $tt[1];
                      $time1 = date('H:i:s', strtotime($sum1));
                      $time2 = date('H:i:s', strtotime($b1));
                      $times = array($time1, $time2);
                      $seconds = 0;
                      foreach ($times as $time) {
                        list($hour, $minute, $second) = explode(':', $time);
                        $seconds += $hour * 3600;
                        $seconds += $minute * 60;
                        $seconds += $second;
                      }
                      $hours = floor($seconds / 3600);
                      $seconds -= $hours * 3600;
                      $minutes  = floor($seconds / 60);
                      $seconds -= $minutes * 60;
                      if ($seconds < 9) {
                        $seconds = "0" . $seconds;
                      }

                      if ($minutes < 9) {
                        $minutes = "0" . $minutes;
                      }

                      if ($hours < 9) {
                        $hours = "0" . $hours;
                      }

                      $sum1 =   "{$hours}:{$minutes}:{$seconds}";
                    }
                  }

                  $demo = array();
                  $k = 0;

                  for ($x = 0; $x < count($test); $x++) {
                    $temp = 0;

                    for ($y = 0; $y < $k; $y++) {
                      if ($test[$x] == $demo[$y]) {
                        $temp = 1;
                        break;
                      }
                    }

                    if ($temp == 0) {
                      $demo[$k] = $test[$x];
                      $k++;
                    }
                  }

                  $all = array();

                  for ($g = 0; $g < count($demo); $g++) {
                    $cc = 1;
                    $sum = "00:00:00";
                    for ($w = 0; $w < count($test); $w++) {
                      if ($demo[$g] == $test[$w]) {
                        if ($w < count($test) - 1) {
                          $bb = $tdata[$w][1];
                          $time1 = date('H:i:s', strtotime($sum));
                          $time2 = date('H:i:s', strtotime($bb));
                          $times = array($time1, $time2);
                          $seconds = 0;

                          foreach ($times as $time) {
                            list($hour, $minute, $second) = explode(':', $time);
                            $seconds += $hour * 3600;
                            $seconds += $minute * 60;
                            $seconds += $second;
                          }

                          $hours = floor($seconds / 3600);
                          $seconds -= $hours * 3600;
                          $minutes  = floor($seconds / 60);
                          $seconds -= $minutes * 60;

                          if ($seconds < 9) {
                            $seconds = "0" . $seconds;
                          }

                          if ($minutes < 9) {
                            $minutes = "0" . $minutes;
                          }

                          if ($hours < 9) {
                            $hours = "0" . $hours;
                          }

                          $sum =   "{$hours}:{$minutes}:{$seconds}";
                        }

                        $all[$demo[$g]] = $cc++ . " ...." . $sum;
                      }
                    }
                  }

                  ?>
                  <div class="action-icon ml-auto">
                    <a href="#" class="bg-primary action-icon text-white btn-primary" data-toggle="modal" data-target=".user-history<?php echo $kj; ?>"><i class="fa fa-eye"></i></a>
                    <button class="btn btn-primary btn-sm ml-2"><?php $arr = explode(" ", $v->created_date);
                                                                echo $arr[0]; ?> <span class="badge badge-transparent"><?php echo $arr[1]; ?></span></button>
                    <button class="btn btn-danger btn-sm ml-2"><?php echo $sum1; ?></button>
                  </div>

                </div>
                <div class="log-details pl-3 pr-3">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th scope="row" width="100px">Log Type</th>
                          <?php foreach ($all as $key => $value) { ?>
                            <th width="150px"><?php echo $key; ?></th>
                          <?php } ?>
                        </tr>
                        <tr>
                          <th scope="row">Count</th>
                          <?php foreach ($all as $key => $value) { ?>
                            <td style="width: 15px;"><?php echo substr($value, 0, strpos($value, '....')); ?></td>
                          <?php } ?>
                        </tr>
                        <tr>
                          <th scope="row">Time</th>
                          <?php foreach ($all as $key => $value) { ?>
                            <td style="width: 20px;"><?php echo substr($value, strpos($value, '....') + strlen('....')); ?></td>
                          <?php } ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>
  </section>
</div>

<!-- Large modal -->
<div class="modal fade filter-history" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="myLargeModalLabel">Filter Ratio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="col-lg-12" method="post" action="<?php echo base_url(); ?>Common/log_history">
          <div class="form-row">
            <div class="form-group col-md-3">
              <label>User </label>
              <select class="form-control" name="user_id">
                <option value="0">Select User</option>
                <?php foreach ($u_all as $key => $value) { ?>
                  <option 
                  <?php if (@$filter_user_id == $value->user_id) {
                      echo "selected";
                    } ?>
                  value="<?php echo $value->user_id; ?>"><?php echo $value->name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Faculty </label>
              <select class="form-control" name="faculty_id">              >
                <option value="0">Select Faculty</option>
                <?php foreach ($f_all as $key => $value) { ?>
                  <option 
                  <?php if (@$filter_faculty_id == $value->faculty_id) {
                      echo "selected";
                    } ?>
                  value="<?php echo $value->faculty_id; ?>"><?php echo $value->name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>HOD </label>
              <select class="form-control" name="hod_id">
                <option value="0">Select HOD</option>
                <?php foreach ($h_all as $key => $value) { ?>
                  <option 
                  <?php if (@$filter_hod_id == $value->hod_id) {
                      echo "selected";
                    } ?>
                  value="<?php echo $value->hod_id; ?>"><?php echo $value->name; ?></option>
                <?php } ?>
              </select>
            </div> 
            <div class="form-group col-md-3">
              <label>Device </label>
              <select class="form-control" name="device">
                <option 
                <?php if (@$filter_device == "0") {
                      echo "selected";
                    } ?>
                value="0">Select Device</option>
                <option 
                <?php if (@$filter_device == "Computer") {
                      echo "selected";
                    } ?>
                value="Computer">Computer</option>
                <option 
                <?php if (@$filter_device == "Mobile") {
                      echo "selected";
                    } ?>
                value="Mobile">Mobile</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <?php
              $bdata  =   array(
                '/Trident/i'    =>  'Internet Explorer',
                '/firefox/i'    =>  'Firefox',
                '/safari/i'     =>  'Safari',
                '/chrome/i'     =>  'Chrome',
                '/edge/i'       =>  'Edge',
                '/opera/i'      =>  'Opera',
                '/netscape/i'   =>  'Netscape',
                '/maxthon/i'    =>  'Maxthon',
                '/konqueror/i'  =>  'Konqueror',
                '/ubrowser/i'   =>  'UC Browser',
                '/mobile/i'     =>  'Handheld Browser'
              );
              ?>
              <label>Browser </label>
              <select class="form-control" name="browser">
                <option value="0">Select Browser</option>
                <?php foreach ($bdata as $key => $value) { ?>
                  <option 
                  <?php if (@$filter_browser == $value) {
                      echo "selected";
                    } ?>
                  value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>Date From To </label>
              <input type="hidden" id="sdate" name="sdate" 
              value=<?php if (isset($filter_from_date)) { echo $filter_from_date; } ?>>
              <input type="hidden" id="edate" name="edate" 
              value=<?php if (isset($filter_to_date)) { echo $filter_to_date; } ?>>
              <div id="reportrange">
                <i class="far fa-calendar-alt"></i>&nbsp;
                <span></span> <i class="fa fa-caret-down"></i>
              </div>
            </div>
          </div>
          <div class="text-right">
            <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
            <button type="submit" name="search_l" value="search_l" class="btn btn-primary">Filter</button>

            <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>Common/log_history">Reset</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php foreach ($l_data as $kj => $v) { ?>
  <?php $hdata = explode("/../", $v->comment);
  $test = array();
  $tdata = array();
  $q = array();
  foreach ($hdata as $m => $n) {
    $test[] = substr($n, strpos($n, '///') + strlen('///'));
  }

  foreach ($hdata as $u => $e) {
    $tdata[$u][] = substr($e, 0, strpos($e, '///'));
    if ($u != count($hdata) - 1) {
      $a = substr($hdata[$u], 0, 8);
      $b = substr($hdata[$u + 1], 0, 8);
      $c =  strtotime($b) - strtotime($a);
      $j = ($c / 3600);
      $m = ($c / 60 % 60);
      $s = ($c % 60);
      // echo "<br>".sprintf("%02d",$j).":".sprintf("%02d",$m).":".sprintf("%02d",$s)."<br>";
      $tdata[$u][] = sprintf("%02d", $j) . ":" . sprintf("%02d", $m) . ":" . sprintf("%02d", $s);
    }
  }

  $sum1 = "00:00:00";
  foreach ($tdata as $rr => $tt) {
    if ($rr < count($tdata) - 1) {
      $b1 = $tt[1];
      $time1 = date('H:i:s', strtotime($sum1));
      $time2 = date('H:i:s', strtotime($b1));
      $times = array($time1, $time2);
      $seconds = 0;
      foreach ($times as $time) {
        list($hour, $minute, $second) = explode(':', $time);
        $seconds += $hour * 3600;
        $seconds += $minute * 60;
        $seconds += $second;
      }
      $hours = floor($seconds / 3600);
      $seconds -= $hours * 3600;
      $minutes  = floor($seconds / 60);
      $seconds -= $minutes * 60;
      if ($seconds < 9) {
        $seconds = "0" . $seconds;
      }

      if ($minutes < 9) {
        $minutes = "0" . $minutes;
      }

      if ($hours < 9) {
        $hours = "0" . $hours;
      }

      $sum1 =   "{$hours}:{$minutes}:{$seconds}";
    }
  }

  $demo = array();
  $k = 0;

  for ($x = 0; $x < count($test); $x++) {
    $temp = 0;

    for ($y = 0; $y < $k; $y++) {
      if ($test[$x] == $demo[$y]) {
        $temp = 1;
        break;
      }
    }

    if ($temp == 0) {
      $demo[$k] = $test[$x];
      $k++;
    }
  }

  $all = array();

  for ($g = 0; $g < count($demo); $g++) {
    $cc = 1;
    $sum = "00:00:00";
    for ($w = 0; $w < count($test); $w++) {
      if ($demo[$g] == $test[$w]) {
        if ($w < count($test) - 1) {
          $bb = $tdata[$w][1];
          $time1 = date('H:i:s', strtotime($sum));
          $time2 = date('H:i:s', strtotime($bb));
          $times = array($time1, $time2);
          $seconds = 0;

          foreach ($times as $time) {
            list($hour, $minute, $second) = explode(':', $time);
            $seconds += $hour * 3600;
            $seconds += $minute * 60;
            $seconds += $second;
          }

          $hours = floor($seconds / 3600);
          $seconds -= $hours * 3600;
          $minutes  = floor($seconds / 60);
          $seconds -= $minutes * 60;

          if ($seconds < 9) {
            $seconds = "0" . $seconds;
          }

          if ($minutes < 9) {
            $minutes = "0" . $minutes;
          }

          if ($hours < 9) {
            $hours = "0" . $hours;
          }

          $sum =   "{$hours}:{$minutes}:{$seconds}";
        }

        $all[$demo[$g]] = $cc++ . " ...." . $sum;
      }
    }
  }

  ?>
  <div class="modal fade user-history<?php echo $kj; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">User History</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="view-all-history">
            <table class="table table-bordered log-details">
              <tr>
                <th>Time</th>
                <th>Log Name</th>
                <th>Total Minute</th>
              </tr>
              <?php foreach ($hdata as $k => $v) { ?>
                <tr>
                  <td><?php echo substr($v, 0, strpos($v, '///')); ?></td>
                  <td><?php echo substr($v, strpos($v, '///') + strlen('///')); ?></td>
                  <td style="color: red;">
                    <?php
                    if ($k != count($hdata) - 1) {

                      $a = substr($hdata[$k], 0, 8);

                      $b = substr($hdata[$k + 1], 0, 8);

                      $c =  strtotime($b) - strtotime($a);

                      $j = ($c / 3600);

                      $m = ($c / 60 % 60);

                      $s = ($c % 60);

                      echo sprintf("%02d", $j) . ":" . sprintf("%02d", $m) . ":" . sprintf("%02d", $s);
                    }

                    ?>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
          <div class="text-right">
            <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!-- <div class="modal fade user-history" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="myLargeModalLabel">User History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="view-all-history">
          <table class="table table-bordered log-details">
            <tr>
              <th>Time</th>
              <th>Log Name</th>
              <th>Total Minute</th>
            </tr>
            <tr>
              <td>09:07:57 </td>
              <td>login success</td>
              <td>02:04:59</td>
            </tr>
            <tr>
              <td>09:07:57 </td>
              <td>login success</td>
              <td>02:04:59</td>
            </tr>
            <tr>
              <td>09:07:57 </td>
              <td>login success</td>
              <td>02:04:59</td>
            </tr>
          </table>
        </div>
        <div class="text-right">
          <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
<input type="submit" class="btn btn-primary" value="Filter" name="filter_income_fees">
<a class="btn btn-light text-dark" href="<?php echo base_url(); ?>Common/log_history">Reset</a>
</div>
</div>
</div>
</div>
</div> 
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
<!-- JS Libraies -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
  $(".history-scrollbar").niceScroll({
    cursorcolor: "#5864bd"
  });
  $(".log-details .table-responsive").niceScroll({
    cursorcolor: "transparent"
  });
</script>
<script type="text/javascript">
  $(function() {


    var start1 = moment().subtract(1, 'days');
    var end1 = moment();


    var start = ""
    var end = ""



    function cb(start, end) {
      $('#sdate').val(start.format('YYYY-MM-DD'));
      $('#edate').val(end.format('YYYY-MM-DD'));
      $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
    }

    var filSdate = $('#sdate').val();
    var filEdate = $('#edate').val();

    

    // $('#reportrange').data('daterangepicker').setStartDate(filSdate);
    // $('#reportrange').data('daterangepicker').setEndDate(filEdate);

    if (filSdate !== '' || filEdate !== '') {
      console.log("ss" + filSdate);
      console.log("ee" + filEdate)
      $('#reportrange span').html(filSdate + ' - ' + filEdate)  
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