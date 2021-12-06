<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet"
   href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
   href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet"
   href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet"
   href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<link rel="stylesheet"
   href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<style type="text/css">
   .img-responsive {
   display: block;
   max-width: 100%;
   height: auto;
   }
   .form {
   border: 0;
   }
</style>

<div class="loader"></div>
<div id="app">
   <div class="main-wrapper main-wrapper-1">
      <div class="main-content">
         <section class="section">
            <div class="section-body">
               <div class="row">
                  <div class="col-12 d-flex justify-content-between">
                     <h6 class="page-title text-dark mb-3">Student Completed Batch List</h6>
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item"><a href="#">Library</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header d-flex justify-content-between income-wrapper">
                           <div class="d-flex justify-content-between">
                           </div>
                           <div class="table-right-content">
                              <a href="<?php echo base_url(); ?>Admission/erpbatch"
                                 class="btn text-dark pl-2">
                              <span><i class="fas fa-arrow-left mr-1"></i> Back</span>
                              </a>
                           </div>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table table-striped normal-table" id="table1">
                                 <thead>
                                    <tr class="text-center">
                                       <th class="p-2">
                                          <div
                                             class="custom-checkbox custom-checkbox-table custom-control">
                                             <input type="checkbox" data-checkboxes="mygroup"
                                                data-checkbox-role="dad" class="custom-control-input"
                                                id="checkbox-all">
                                             <label for="checkbox-all"
                                                class="custom-control-label">&nbsp;</label>
                                          </div>
                                       </th>
                                       <th>SN</th>
                                       <th>GR ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Course</th>
                                       <th>Status</th>
                                       <th>Attendance</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $sno = 1;
                                       foreach ($get_batch as $val) {
                                         if ($val->admission_courses_status == "Completed") { ?>
                                    <tr class="text-center">
                                       <td>
                                          <div class="custom-checkbox custom-control">
                                             <input type="checkbox" data-checkboxes="mygroup"
                                                class="custom-control-input"
                                                id="checkbox-<?php echo $sno; ?>"
                                                name="admission_coursesids"
                                                value="<?php echo $val->admission_courses_id; ?>">
                                             <label for="checkbox-<?php echo $sno; ?>"
                                                class="custom-control-label">&nbsp;</label>
                                          </div>
                                       </td>
                                       <td><?php echo $sno; ?></td>
                                       <td data-toggle="tooltip" data-placement="bottom" title="
                                       <?php $admids = explode(",", $val->admission_id);
                                             foreach ($Admission_record as $ad) {
                                               if (in_array($ad->admission_id, $admids)) {
                                                echo "(".$ad->first_name." ".$ad->surname.")";
                                                 if($ad->type=="single")
                                                 {
                                                   $coids = explode(",", $ad->course_id);
                                                   foreach ($list_course as $row) {
                                                     if (in_array($row->course_id, $coids)) {
                                                       echo " ("."Single :- ".$row->course_name.")";
                                                     } 
                                                   }
                                                 }
                                                 else
                                                 {
                                                   $paids = explode(",", $ad->package_id);
                                                   foreach ($list_package as $row) {
                                                     if (in_array($row->package_id, $paids)) {
                                                       echo " ("."Package :- ".$row->package_name.")";
                                                     } 
                                                   }
                                                   
                                                 }
                                               } } ?>
                                        "><?php echo $val->gr_id; ?></td>
                                       <td><?php echo $val->first_name; ?> <?php echo $val->surname; ?>
                                       </td>
                                       <td><?php echo $val->email; ?></td>
                                       <td>
                                          <?php $branch_ids = explode(",", $val->courses_id);
                                             foreach ($list_course as $row) {
                                               if (in_array($row->course_id, $branch_ids)) {
                                                 echo $row->course_name;
                                               }
                                             } ?>
                                       </td>
                                       <td><?php echo $val->admission_courses_status; ?></td>
                                       <td>
                                          <button type="button" class="btn btn-sm btn-info"
                                             data-toggle="modal" data-target=".view-attendance"
                                             onclick="return view_attendance(<?php echo $val->admission_courses_id; ?>)">
                                          <i class="fas fa-eye" data-toggle="tooltip"
                                             data-placement="bottom" title="View Attendance"></i>
                                          </button>
                                       </td>
                                       <td>
                                          <div class="dropdown">
                                             <a href="#" data-toggle="dropdown"
                                                class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                                             <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item has-icon"
                                                   data-toggle="modal"
                                                   data-target=".bd-example-modal-sm"
                                                   onclick="return batch_completed_status(<?php echo $val->admission_courses_id; ?>,<?php echo  @$val->admission_id; ?>)"><i
                                                   class="fas fa-check-circle"></i> Course
                                                Completed Status</a>
                                                <a href="#"
                                                   class="dropdown-item has-icon text-danger"><i
                                                   class="far fa-trash-alt"></i>
                                                Delete</a>
                                             </div>
                                          </div>
                                       </td>
                                    </tr>
                                    <?php $sno++;
                                       }
                                       } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </section>
         </div>
      </div>
   </div>
   
<!-- Batch Completed Status Signle Student -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="mySmallModalLabel">Single Bacth Completed Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="batch_completed_data">
         </div>
      </div>
   </div>
</div>

<!-- View Attendance -->
<div class="modal fade view-attendance" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="myLargeModalLabel">View Attendance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="attendance_view_data">
         </div>
      </div>
   </div>
</div>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
<!-- <script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script> -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script>
   var picker = new Lightpick({
     field: document.getElementById('attendance_date_multiple'),
   onSelect: function(date){
   document.getElementById('result-1').innerHTML =  date.format('Do MMMM YYYY');
   
   }
   });
</script>


<script>
   function batch_completed_status(admission_courses_id = '', admission_id = '') {
       $.ajax({
           url: "<?php echo base_url(); ?>Admission/single_batch_completed",
           type: "post",
           data: {
               'admission_courses_id': admission_courses_id,
               'admission_id': admission_id
           },
           success: function(Response) {
               $('#batch_completed_data').html(Response);
           }
       });
   }
</script>
<script>
   function view_attendance(admission_courses_id = '') {
       $.ajax({
           url: "<?php echo base_url(); ?>Admission/view_attendance",
           type: "post",
           data: {
               'admission_courses_id': admission_courses_id
           },
           success: function(Response) {
               $('#attendance_view_data').html(Response);
           }
       });
   }
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
</script>
</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>