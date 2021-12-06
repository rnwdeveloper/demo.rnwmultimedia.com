<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                <div class="extra_lead_menu">
                    <div class="col-12 d-flex justify-content-end mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb p-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Notification</li>
                            </ol>
                        </nav>
                    </div>
                    <section class="section">
                        <div class="section-body">    
                            <div class="row"> 
                                <!-- # -->
                                <?php $sno = 1; foreach($notified_data as $val) {?>
                                    <div class="col-md-6 mb-3" id="notification<?php echo $sno; ?>">
                                        <div class="card card-primary shadow-sm">
                                            <div class="card-body py-2 px-1">
                                                <div class="row mx-0 align-items-center">
                                                    <div class="col-md-2">
                                                        <div class="student_image">
                                                            <img src="http://demo.rnwmultimedia.com/dist/admissiondocuments/<?php $docids = explode(",",$val->admission_id);  foreach($doc_list as $row) { if(in_array($row->admission_id,$docids)) {  echo $row->photos; }  } ?>" width="100%" height="100%" alt="..." onerror="this.src='<?php echo base_url(); ?>dist/admissiondocuments/dummy-user.png'" oncontextmenu="return false;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 pl-0">
                                                        <div class="student_detail py-2">
                                                            <h4> (<?php echo $val->admission_courses_id ; ?>) <?php echo $val->first_name; ?> <?php echo $val->surname;?> - <?php foreach($list_branch as $cal) { if($cal->branch_id == $val->branch_id){ echo $cal->branch_code; } }?></h4>
                                                            <p class="text-muted"><?php if($val->course_orpackage_id != "") { foreach($list_package as $row) { if($val->course_orpackage_id == $row->package_id) { echo "Package : " . $row->package_name ;} } }?><?php if($val->courses_id != "") { foreach($list_course as $row) { if($val->courses_id == $row->course_id) { echo " || Course : " . $row->course_name ;} } }?><?php if($val->college_courses_id != "") { foreach($college_courses_all as $row) { if($val->college_courses_id == $row->college_courses_id ) { echo "  College : " . $row->college_course_name ;} } }?><?php echo " || Course Status : " . $val->admission_courses_status; ?><?php foreach($list_batch as $row){ if($val->batch_id == $row->batches_id ) { foreach($list_user as $ky) { if($ky->user_id == $row->faculty_id) { echo " || Faculty Name : ".$ky->name; } } } }?></p>
                                                            <label class="text-muted"><?php $xx = $val->updated_at; echo $xx; ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 align-self-start">
                                                        <a href="javascript:co_status_upd(<?php echo $val->admission_courses_id; ?>,1)" class="bg-danger action-icon text-white btn-danger">
                                                        <i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php $sno++; }?>
                                <!-- # -->
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>  
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script> 
  <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
   <!-- General JS Scripts -->
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
  <!-- JS Libraies --> 
  <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<!-- JS Libraies -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
      function co_status_upd(admission_courses_id,status) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/update_status_batch",
          type: "post",
          data: {
            'id': admission_courses_id,
            'status': status,
            'table': 'admission_courses',
            'field': 'notification_status',
            'check_field': 'admission_courses_id '
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! this Record Removed.',
                position: 'topRight'
              }));
              setTimeout(function() {
                       location.reload();
                   }, 2520);
            }
             else if (ddd == '2')
             { 
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Try Again!!!!',
                position: 'topRight'
              }));
            }
          }
        });
      }
    
    </script>
</body>
 
</html>