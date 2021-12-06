<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<style type="text/css">
  li.select2-selection__choice {
    background-color: #5864BC !important;
  }
</style>
<div class="main-wrapper main-wrapper-1">
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
        <div class="col-12 d-flex justify-content-between">
            <h6 class="page-title text-dark mb-3"> </h6>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Notification</li>
              </ol>
            </nav>
          </div>
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary notifications-wrap">
                <div class="card-header d-flex justify-content-between border-bottom">
                  <h6 class="text-dark">Notifications (<?php echo $all_batch_notifive_count+$all_completed_batch_notifive_count; ?>)</h6>
                  <span>Do Not Disturb 
                    <!-- <label class="switch notify">
                      <input type="checkbox" checked>
                      <span class="slider round"></span>
                    </label> -->
                  </span>
                </div>
                <!-- <div class="card-body">

                  <div class="notification-menu">
                    <ul class="text-center">
                        <li class="btn btn-primary">CRM</li>
                        <li class="btn btn-primary">ERP</li>
                        <li class="btn btn-primary">LMS</li>
                        <li class="btn btn-primary">ADMIN</li>
                    </ul>
                  </div>

                  <div class="notification-submenu">
                    <ul class="pl-0 text-center">
                      <li class="btn btn-info btn-sm">Pragati kachahdiya - Web Frontend Faculty <span class="badge badge-transparent">10</span></li>
                      <li class="btn btn-info btn-sm">Pragati kachahdiya - Web Frontend Faculty <span class="badge badge-transparent">4</span></li>
                      <li class="btn btn-info btn-sm">Pragati kachahdiya - Web Frontend Faculty <span class="badge badge-transparent">2</span></li> 
                    </ul>
                  </div> 
                  
                </div> -->
            </div>
                  <div class="hd col-xl-7 pl-0 pr-0">
                  <?php foreach($all_batch_notifive as $key) { ?>
                  <div class="card p-3 shadow-sm card-primary rounded" onclick="return batch_notification(<?php echo $key->admission_courses_id; ?>);">
                  <div class="notification-view">
                      <div class="notify-item d-flex">
                        <div class="notify-item-icon">
                           <span class="close-notify"><i class="fa fa-times" onclick="return batch_notification(<?php echo $key->admission_courses_id; ?>);"></i></span>
                        </div> 
                        <div class="notify-msg">
                          <h6 class="mb-0"><span class="text-primary"><?php echo $key->gr_id; ?></span> <?php echo $key->surname; ?> <?php echo $key->first_name; ?>  (<?php echo $key->f_name; ?>)</h6>
                          <p class="mb-0"><?php $courseids = explode(",",$key->courses_id);
                        foreach($all_course_data as $row) { if(in_array($row->course_id,$courseids)) {  echo $row->course_name; }  } ?></p>
                          <p class="mb-0 text-primary">Batch Assigned</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php foreach($all_completed_batch_notifive as $key) { ?>
                  <div class="card p-3 shadow-sm card-primary rounded" onclick="return course_completed_notification(<?php echo $key->admission_courses_id; ?>);">
                  <div class="notification-view">
                      <div class="notify-item d-flex">
                        <div class="notify-item-icon">
                           <span class="close-notify"><i class="fa fa-times" onclick="return course_completed_notification(<?php echo $key->admission_courses_id; ?>);"></i></span>
                        </div> 
                        <div class="notify-msg">
                          <h6 class="mb-0"><span class="text-success"><?php echo $key->gr_id; ?></span> <?php echo $key->surname; ?> <?php echo $key->first_name; ?>  (<?php echo $key->f_name; ?>)</h6>
                          <p class="mb-0"><?php $courseids = explode(",",$key->courses_id);
                        foreach($all_course_data as $row) { if(in_array($row->course_id,$courseids)) {  echo $row->course_name; }  } ?></p>
                          <p class="mb-0 text-success">Completed Course</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
            </div>
        </div>
      </div>
    </section>
  </div>

    <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script> 
    <!-- Page Specific JS File -->
    <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
    <!-- JS Libraies -->
    <script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
    <!-- JS Libraies -->
    <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>  
    <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>

<script>
  $(".notify-scrollbar").niceScroll({
  cursorcolor:"#5864bd"
});
</script>

<script>
  function batch_notification(admission_courses_id = '') {
    $.ajax({
      url: "<?php echo base_url(); ?>welcome/batchnotification_status",
      type: "post",
      data: {
        'admission_courses_id': admission_courses_id
      },
      success: function(Resp) {
        setTimeout(function() {
          location.reload();
        }, 500);
      }
    });
  }

  function course_completed_notification(admission_courses_id = '') {
    $.ajax({
      url: "<?php echo base_url(); ?>welcome/course_completed_notification",
      type: "post",
      data: {
        'admission_courses_id': admission_courses_id
      },
      success: function(Resp) {
        setTimeout(function() {
          location.reload();
        }, 500);
      }
    });
  }
</script>
    </body>
    <!-- index.html  21 Nov 2019 03:47:04 GMT -->

    </html>