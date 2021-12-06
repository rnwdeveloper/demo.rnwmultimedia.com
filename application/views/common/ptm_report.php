<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
 
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/css/bootstrap-select.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div class="main-content assestment-content ptm_report">
<div class="col-12">
   <div class="assestment-title">
      <!-- <h4>Assessment Form</h4> -->
   </div>
</div>
<div id="ass_msg"></div>
<div class="row">
<div class="col-md-6 col-sm-12">
   <div class="card card-primary">
      <div class="card-header">
         <h4>PTM Report</h4>
      </div>
      <form enctype="multipart/form-data" class="document-createmodal" method="post" name="add_help" id="add_help">
      <div class="col-12">
         <div class="form-row">
         <div class="form-group col-md-3">
               <label for="inputEmail4">From Date</label>
               <input type="date" class="form-control" id="from_date" name="from_date" value="">
            </div>
            <div class="form-group col-md-3">
               <label for="inputEmail4">To Date</label>
               <input type="date" class="form-control" id="to_date" name="to_date" value="">
            </div>
            <div class="form-group col-md-3">
               <label for="inputEmail4">Batch Tiaming From</label>
               <input type="text" datetime="hour" class="form-control timepicker" id="batch_tiaming_from" name="batch_tiaming_from" value="">
            </div>
            <div class="form-group col-md-3">
               <label for="inputEmail4">Batch Tiaming To</label>
               <input type="text" datetime="hour" class="form-control timepicker" id="batch_tiaming_to" name="batch_tiaming_to" value="">
            </div>
            <div class="form-group col-md-3">
               <label for="inputEmail4">GR ID</label>
               <input type="text" class="form-control" id="gr_id" name="gr_id" value="" placeholder="Enter Your GR ID">
            </div>
            <div class="form-group col-md-3">
               <label for="inputEmail4">Name</label>
               <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Your Name">
            </div>
            <div class="form-group col-md-3">
               <label for="inputEmail4">Parent NO</label>
               <input type="text" class="form-control" id="parent_no" name="parent_no" value="" placeholder="Enter Your Parent No">
            </div>
            <div class="form-group col-md-3">
               <label for="inputEmail4">Branch</label>
               <select class="form-control s_co p_co fac_lt" name="branch_id" id="branch_id">
                  <option value="">Select Branch</option>
                  <?php foreach($list_branch as $ld) { ?>
                  <option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form-group col-md-3">
               <label for="inputEmail4">Faculty</label>
               <select class="form-control" name="faculty_id" id="fac_ltid">
                  <option value="">Select Faculty</option>
                  <?php foreach($list_faculty as $ld) { ?>
                  <option value="<?php echo $ld->name; ?>"><?php echo $ld->name; ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form-group col-md-3">
               <label for="inputEmail4">Hod</label>
               <select class="form-control" name="hod_id" id="hod_id">
                  <option value="">Select Hod</option>
                  <?php foreach($list_hod as $ld) { ?>
                  <option value="<?php echo $ld->name; ?>"><?php echo $ld->name; ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form-group col-md-3">
               <label>Type</label><br>
               <div class="pretty p-icon p-jelly p-round p-bigger">
                  <input type="radio" name="type" value="single" class="pay-type-one" onclick="return hidden_type()"/>
                  <div class="state p-info">
                     <i class="icon material-icons">done</i>
                     <label>Single</label>
                  </div>
               </div>
               <div class="pretty p-icon p-jelly p-round p-bigger">
                  <input type="radio" name="type" value="package" class="pay-type-two" onclick="return hidden_type()"/>
                  <div class="state p-info">
                     <i class="icon material-icons">done</i>
                     <label>Package</label>
                  </div>
               </div>
            </div>
            <div class="form-group col-md-3 select_course_single">
               <label for="inputEmail4">Course</label>
               <select class="form-control" name="course_id" id="course_id" required>
                  <option value="">Select Course</option>
               </select>
            </div>
            <div class="form-group col-md-3 select_course_package">
               <label for="inputEmail4">Package</label>
               <select class="form-control" name="package_id" id="package_id" required>
                  <option value="">Select Package</option>
               </select>
            </div>
            <div class="form-group col-md-12">
               <label for="inputEmail4">Remark</label>
               <textarea class="form-control" id="remarks" name="remarks"></textarea>
            </div>
         </div>
      </div>
   </div>
   <div class="card card-primary">
      <div class="card-header">
         <h4>Behavior</h4>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered table-md">
               <tr>
                  <th colspan="2" class="text-center">Uniform</th>
                  <th colspan="3" class="text-center">Discipline</th>
               </tr>
               <tr>
                  <td>
                     <div class="pretty p-icon p-jelly p-round p-bigger">
                        <input type="radio" name="uniform" value="Regular"/>
                        <div class="state p-info">
                           <i class="icon material-icons">done</i>
                           <label>Regular</label>
                        </div>
                     </div>
                  </td>
                  <td>
                     <div class="pretty p-icon p-jelly p-round p-bigger">
                        <input type="radio" name="uniform" value="InRegular"/>
                        <div class="state p-info">
                           <i class="icon material-icons">done</i>
                           <label>InRegular</label>
                        </div>
                     </div>
                  </td>
                  <td>
                     <div class="pretty p-icon p-jelly p-round p-bigger">
                        <input type="radio" name="uniform" value="Excellent"/>
                        <div class="state p-info">
                           <i class="icon material-icons">done</i>
                           <label>Excellent</label>
                        </div>
                     </div>
                  </td>
                  <td>
                     <div class="pretty p-icon p-jelly p-round p-bigger">
                        <input type="radio" name="discipline" value="Medium"/>
                        <div class="state p-info">
                           <i class="icon material-icons">done</i>
                           <label class="ml-1">Medium</label>
                        </div>
                     </div>
                  </td>
                  <td>
                     <div class="pretty p-icon p-jelly p-round p-bigger">
                        <input type="radio" name="discipline" value="Weak"/>
                        <div class="state p-info">
                           <i class="icon material-icons">done</i>
                           <label class="ml-1">Weak</label>
                        </div>
                     </div>
               </tr>
            </table>
         </div>
         <div class="table-responsive">
            <table class="table table-bordered table-md">
               <tr>
                  <th colspan="2" class="text-center">Behaviour Of Faculty</th>
                  <th colspan="2" class="text-center">Behaviour Of Student</th>
               </tr>
               <tr>
                  <td width="100" class="text-center">10</td>
                  <td class="mr-2"> 
                     <input type="number" class="form-control" min="0" max="10" name="faculty_behavior_mark" id="faculty_behavior_mark" value="0">
                  </td>
                  <td width="100" class="text-center">10</td>
                  <td class="mr-2"> 
                     <input type="number" class="form-control" min="0" max="10"  name="student_behavior_mark" id="student_behavior_mark" value="0">
                  </td>
               </tr>
            </table>
         </div>
      </div>
   </div>
</div>
<div class="col-md-6 col-sm-12">
<div class="card card-primary">
      <div class="card-header">
         <h4>Attendance</h4>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered table-md">
               <tr class="text-center">
                  <th>Total work Days	</th>
                  <th>Total Present Day	</th>
                  <th>Percentage</th>
               </tr>
               <tr>
                  <td>
                     <input type="number" class="form-control w-50 ml-auto mr-auto" id="total_work_days" min="0" name="total_work_days" value="<?php echo 90; ?>" readonly> 
                  </td>
                  <td>
                     <input type="number" class="form-control w-50 ml-auto mr-auto" id="total_present_days" min="0" name="total_present_days" onchange="myFunction()" value="0">
                  </td>
                  <td>
                     <input type="text" name="" class="form-control w-75 ml-auto mr-auto" id="total_attendance_percentage">
                  </td>
               </tr>
            </table>
         </div>
      </div>
   </div>
   <div class="card card-primary">
      <div class="card-header">
         <h4>Project Work</h4>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered table-md">
               <tr class="text-center">
                  <th>Total Project</th>
                  <th>Submited</th>
                  <th>On Time</th>
                  <th>Quality</th>
               </tr>
               <tr>
                  <td>
                     <input type="number" class="form-control w-50 ml-auto mr-auto" name="total_project" id="total_project" min="0" value="<?php echo 5; ?>" readonly>
                  </td>
                  <td>
                     <input type="number" class="form-control w-50 ml-auto mr-auto" name="submited" id="submited" min="0" value="0" onchange="submitevalue()"> <br>
                     <span id="pro" class="text-center"></span><input type="hidden" name="" id="submited_percentage"><br>
                  </td>
                  <td>
                     <input type="number" class="form-control w-50 ml-auto mr-auto" name="on_time" id="on_time" min="0" value="0" onchange="projectwork()"> <br>
                     <span id="project" class="text-center"></span><input type="hidden" name="" id="on_time_percentage"><br>
                  </td>
                  <td>
                     <select class="form-control" name="quality" id="quality">
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                     </select>
                  </td>
               </tr>
            </table>
         </div>
      </div>
   </div>
   <div class="card card-primary">
      <div class="card-header">
         <h4>Activity</h4>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered table-md">
               <tr class="text-center">
                  <th>Total</th>
                  <th>Participated</th>
                  <th>Percentage</th>
               </tr>
               <tr>
                  <td>
                     <input type="number" class="form-control w-50 ml-auto mr-auto" id="total" min="0" name="total_activity"  value="0"><br>
                  </td>
                  <td>
                     <input type="number" class="form-control w-50 ml-auto mr-auto" id="participated" min="0" name="participated" onchange="activitys()" value="0"><br>
                  </td>
                  <td>
                     <input type="text" name="" id="participated_percentage" class="form-control w-50 ml-auto mr-auto"> <br>
                     <input type="hidden" name="" id="total_participated">
                  </td>
               </tr>
            </table>
         </div>
      </div>
   </div>
</div>
<div class="col-12">
    <input type="submit" class="btn btn-primary" id="assessment_ins" name="submit" value="Submit">
    </div>
    </form>

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
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
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
$('.s_co').change(function(){
   var branch_id = $('.s_co').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>Common/fetch_single_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
       $('#course_id').html(data);
     }
    });
   });

   $('.p_co').change(function(){
   var branch_id = $('.p_co').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>Common/fetch_package_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
      $('#package_id').html(data);
     }
    });
   });
</script>
<script>
   $('.select_course_package').hide();
   function hidden_type()
   {
   var co_pa_clg = $("input[name='type']:checked").val();
   //alert(course_package);
   if(co_pa_clg == 'single'){
   $('.select_course_single').show();
   $('.select_course_package').hide();
   } else {
   $('.select_course_package').show();
   $('.select_course_single').hide();
   } 
   }
</script>
<script>
   function myFunction() {
   
      var total_work_days = $('#total_work_days').val();
      var total_present_days = $('#total_present_days').val();
   
   if(total_work_days >= total_present_days)
   {
     let test = total_present_days * 100;
     let  data =  (test / total_work_days).toFixed(2) + "%";
   
     $('#total_percentage').html(data);
     $('#total_attendance_percentage').val(data);
   }
   else 
   {
     alert("value is overflow");
     $('#total_percentage').html('');
     $('#total_attendance_percentage').val('');
   }
   
   }
</script>
<script>
   function activitys() {
     var total = $('#total').val();
     var participated = $('#participated').val();
   
     let ta = participated * 100;
     let  to =  (ta / total).toFixed(2) + "%";
   
     $('#total_participated').html(to);
     $('#participated_percentage').val(to);
   }
</script>
<script>
   function projectwork() {
     var total_project = $('#total_project').val();
     var on_time = $('#on_time').val();
   
     let pro = on_time * 100;
     let  project =  (pro / total_project).toFixed(2) + "%";
     //console.log(project);
     $('#project').html(project);
     $('#on_time_percentage').val(project);
   //console.log(data);
   }
</script>
<script>
   function submitevalue()
   {
     var total_project = $('#total_project').val();
     var submited = $('#submited').val();
   
     let on = submited * 100;
     let ont = (on / total_project).toFixed(2) + "%";
     $('#pro').html(ont);
     $('#submited_percentage').val(ont);
   }
</script>
<script type="text/javascript">
   $('#assessment_ins').on('click', function() {
     var from_date = $('#from_date').val();
     var to_date = $('#to_date').val();
     var batch_tiaming_from = $('#batch_tiaming_from').val();
     var batch_tiaming_to = $('#batch_tiaming_to').val();
     var gr_id = $('#gr_id').val();
     var name = $('#name').val(); 
     var parent_no = $('#parent_no').val();
     var branch_id = $('#branch_id').val();
     var faculty_id = $('#fac_ltid').val();
     var hod_id = $('#hod_id').val();
     var course_id = $('#course_id').val();
     var package_id = $('#package_id').val();
     var uniform = [];
   
    $('input[name=uniform]:checked').map(function() {
                uniform.push($(this).val());
    });
   
     var discipline = [];
    $('input[name=discipline]:checked').map(function() {
                discipline.push($(this).val());
    });

    var type = [];
    $('input[name=type]:checked').map(function() {
         type.push($(this).val());
    });
   
     var faculty_behavior_mark = $('#faculty_behavior_mark').val();
     var student_behavior_mark = $('#student_behavior_mark').val();
     var total_work_days = $('#total_work_days').val();
     var total_present_days = $('#total_present_days').val();
     var total_attendance_percentage = $('#total_attendance_percentage').val();
     var total_project = $('#total_project').val();
     var submited = $('#submited').val();
     var submited_percentage = $('#submited_percentage').val();
     var on_time = $('#on_time').val();
     var on_time_percentage = $('#on_time_percentage').val();
     var quality = $('#quality').val();
     var total = $('#total').val();
     var participated = $('#participated').val();
     var participated_percentage = $('#participated_percentage').val();
     var remarks = $('#remarks').val();
   
     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>Common/ajax_ptm_report",
       data: {
         'from_date': from_date,
         'to_date': to_date,
         'batch_tiaming_from': batch_tiaming_from,
         'batch_tiaming_to': batch_tiaming_to,
         'gr_id': gr_id,
         'name': name,
         'parent_no': parent_no,
         'branch_id': branch_id,
         'faculty_id': faculty_id,
         'hod_id': hod_id,
         'type': type,
         'course_id': course_id,
         'package_id': package_id,
         'uniform': uniform,
         'discipline': discipline,
         'faculty_behavior_mark': faculty_behavior_mark,
         'student_behavior_mark': student_behavior_mark,
         'total_attendance_percentage': total_attendance_percentage,
         'total_work_days': total_work_days,
         'total_present_days': total_present_days,
         'total_project': total_project,
         'submited': submited,
         'submited_percentage': submited_percentage,
         'on_time': on_time,
         'on_time_percentage': on_time_percentage,
         'quality': quality,
         'total': total,
         'participated': participated,
         'participated_percentage': participated_percentage,
         'remarks' : remarks
       },
       success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
          if(ddd == '1')
          {
              $('#ass_msg').html(iziToast.success({
                title: 'Success',
                timeout: 2500,
                message: 'Inserted Record.',
                position: 'topRight'
              }));
              setTimeout(function() {
                  location.reload();
              }, 2520);
          }
          else
          {
              $('#ass_msg').html(iziToast.error({
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