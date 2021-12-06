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
                           <button class="btn btn-info" data-toggle="modal"
                                 data-target=".bd-example-modal-sm-2">
                              <i class="fas fa-check-circle"> </i> Multiple Batch Chnage Status
                              </button>
                              <button class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <i class="fas fa-filter mr-1"> </i>Filter
                              </button>
                              <a href="<?php echo base_url(); ?>Admission/erpbatch"
                                 class="btn text-dark pl-2">
                              <span><i class="fas fa-arrow-left mr-1"></i> Back</span>
                              </a>
                           </div>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table table-striped normal-table" id="table-2">
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
                                       <th>Student Detals</th>
                                       <th>Faculty Name</th>
                                       <th>Batch Name</th>
                                       <th>Course</th>
                                       <th>Status</th>
                                       <th>Attendance</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $sno = 1;
                                       foreach ($get_batch as $val) {
                                         if ($val->admission_courses_status=="Completed") { ?>
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
                                        ">
                                        <?php echo "<b>GR Id : </b>".$val->gr_id; ?><br>
                                       <?php echo "<b>Name : </b>".$val->first_name; ?> <?php echo $val->surname; ?><br>
                                       <?php echo "<b>Email : </b>".$val->email; ?><br>
                                       <?php $branch_ids = explode(",", $val->branch_id);
                                             foreach ($list_branch as $row) {
                                               if (in_array($row->branch_id, $branch_ids)) {
                                                 echo "<b>Branch : </b>".$row->branch_code;
                                               }
                                             } ?><br>
                                       <?php date_default_timezone_set("Asia/Calcutta"); echo "<b>Completed Date : </b>".date('d-M-Y',strtotime($val->course_completed_date)); ?>
                                       </td>
                                       <td>
                                       <?php $facultyids = explode(",", $val->faculty_id);
                                             foreach ($faculty_all as $row) {
                                               if (in_array($row->faculty_id, $facultyids)) {
                                                 echo $row->name;
                                               }
                                             } ?>
                                       </td>
                                       <td>
                                       <?php $batchesids = explode(",", $val->batch_id);
                                             foreach ($list_all_batches as $row) {
                                               if (in_array($row->batches_id, $batchesids)) {
                                                 echo $row->batch_name;
                                               }
                                             } ?>
                                       </td>
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
   <!-- Large modal -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Search</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php  echo base_url(); ?>Admission/AllCompleted_BatchList">
         <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputEmail4">First Name</label>
            <input type="text" class="form-control" id="" name="filter_fname" value="<?php if(!empty($filter_fname)) { echo @$filter_fname; } ?>"  placeholder="Name">
          </div>
          <div class="form-group col-md-3">
            <label for="inputPassword4">Last Name</label>
            <input type="text" class="form-control" id="" name="filter_lname" value="<?php if(!empty($filter_lname)) { echo @$filter_lname; } ?>" placeholder="Surname">
          </div>
           <div class="form-group col-md-3">
            <label for="inputPassword4">Email</label>
            <input type="email" class="form-control" id="" name="filter_email" value="<?php if(!empty($filter_email)) { echo @$filter_email; } ?>" placeholder="Email">
          </div>
          <div class="form-group col-md-3">
            <label>GR Id</label>
            <input type="text" class="form-control" id="" name="filter_gr_id" value="<?php if(!empty($filter_gr_id)) { echo @$filter_gr_id; } ?>" placeholder="GR Id">
          </div>
          <div class="form-group col-md-3">
          <label for="inputState">Branch</label>
          <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
            <option value="">Select Branch</option>
           <?php foreach($list_branch as $ld) { ?>
            <option <?php if(@$filter_branch==$ld->branch_id) { echo "selected"; } ?> value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="inputState">Course</label>
          <select id="inputState" class="form-control" name="filter_course" id="filter_course">
            <option value="">Select Course</option>
           <?php foreach($list_course as $lp) { ?>
            <option <?php if(@$filter_course==$lp->course_id) { echo "selected"; } ?> value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="inputState">Batch</label>
          <select id="inputState" class="form-control" name="filter_batch" id="filter_batch">
            <option value="">Select Batch</option>
           <?php foreach($list_all_batches as $lp) { ?>
            <option <?php if(@$filter_batch==$lp->batches_id) { echo "selected"; } ?> value="<?php echo $lp->batches_id; ?>"><?php echo $lp->batch_name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="inputState">Faculty</label>
          <select id="inputState" class="form-control" name="filter_faculty" id="filter_faculty">
            <option value="">Select Faculty</option>
           <?php foreach($faculty_all as $lp) { ?>
            <option <?php if(@$filter_faculty==$lp->faculty_id) { echo "selected"; } ?> value="<?php echo $lp->faculty_id; ?>"><?php echo $lp->name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-12 form-group">
            <label>Date From - To </label> 
            <input type="hidden" id="fromdate" name="filter_from_date" value="<?php if(!empty($filter_from_date)) { echo @$filter_from_date; } ?>">
            <input type="hidden" id="todate" name="filter_to_date" value="<?php if(!empty($filter_to_date)) { echo @$filter_to_date; } ?>">
            <div id="reportrange">
                <i class="far fa-calendar-alt"></i>&nbsp;
                <span><?php if(!empty($filter_from_date) && !empty($filter_to_date)) { echo @$filter_from_date." - ".$filter_to_date; } ?></span> <i class="fa fa-caret-down"></i>
            </div>
        </div>
  
        </div>
         <div class="text-right">
          <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
          <input type="submit" class="btn btn-primary" value="Filter" name="filter_completed_batch_list">
          <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>Admission/AllCompleted_BatchList">Reset</a>  
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
   <!-- Batch Completed Status Multiple Student -->
<div class="modal fade bd-example-modal-sm-2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="mySmallModalLabel">Multiple Bacth Change Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="multiple_btach_status_msg"></div>
            <div class="form-row">
               <div class="form-group col-md-12">
                  <label>Batch Status</label>
                  <select class="form-control" id="admission_courses_status_multiple">
                  <option value="Completed" <?php echo "selected"; ?>>Completed</option>
                  <option value="Ongoing">Ongoing</option>
                  <option value="Pending">Pending</option>
                  <option value="Hold">Hold</option>
                  <option value="Not Assigned">Not Assigned</option>
                  </select>
               </div>
               <div class="form-group col-md-12">
                  <label for="inputPassword4">Common Comments</label>
                  <textarea class="form-control" name="remarks" id="comments_multiple" required></textarea>
               </div>
            </div>
            <button class="btn btn-primary" type="submit" id="multiple_status_data">Submit</button>
         </div>
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
   $('#multiple_status_data').on('click', function() {
   
       var admission_coursesids = [];
   
       $('input[name=admission_coursesids]:checked').map(function() {
           admission_coursesids.push($(this).val());
       });
       var admission_courses_status_multiple = $('#admission_courses_status_multiple').val();
       var comments_multiple = $('#comments_multiple').val();
   
       $.ajax({
           type: "POST",
           url: "<?php echo base_url() ?>Admission/multiple_batch_status_course_completed",
           data: {
               'admission_courses_id': admission_coursesids,
               'admission_courses_status': admission_courses_status_multiple,
               'remarks': comments_multiple
           },
           success: function(resp) {
               var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if(ddd == '1')
               {
                  $('#multiple_btach_status_msg').html(iziToast.success({
                     title: 'Success',
                     timeout: 2500,
                     message: 'Multiple Course Completed!',
                     position: 'topRight'
                  }));

                  setTimeout(function() {
                        location.reload();
                  }, 2520);

               }
               else if(ddd == '2')
               {
      
                  $('#multiple_btach_status_msg').html(iziToast.error({
                     title: 'Canceled!',
                     timeout: 2500,
                     message: 'Someting Wrong!!',
                     position: 'topRight'
                  }));

                  setTimeout(function() {
                        location.reload();
                  }, 2520);
               }
            }
       });
       return false;
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
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script type="text/javascript">
$(function() {
   var start1=moment().subtract(1, 'days');
   var end1=moment();
   var start=""
   var end=""
   
    function cb(start, end) {
        $('#fromdate').val(start.format('YYYY-MM-DD'));
        $('#todate').val(end.format('YYYY-MM-DD'));
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
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
</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>