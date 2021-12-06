<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/css/bootstrap-select.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css"> 
<div class="main-content assestment-content">
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
	      	 <h4>Student Details</h4>
	      </div>
	      <div class="card-body">
	      	<div class="table-responsive">
              <table class="table table-bordered table-md">
                <tr> 
                  <th>Student Name</th>
                  <th>GR Id</th>
                  <th>Course</th>
                  <th>Professor Name</th>
                </tr>
                <tr> 
                  <td><?php echo @$admission->surname; ?> <?php echo @$admission->first_name; ?></td>
                  <td><?php echo @$admission->gr_id; ?></td>
                  <td>
                  <?php $i=1; foreach($admission->list_multi_course_admission as $k => $val){ ?>
                  <?php echo "$i :".''. $val; ?>
                  <?php $i++; } ?>
                  </td>
                  <td><?php foreach($faculty_all as $lp) { ?>
                  <?php if($lp->faculty_id==@$admission->faculty_id) echo $lp->name; ?>
                  <?php } ?></td>
                </tr> 
              </table>
            </div>
	      </div>
	    </div> 
      <input type="hidden" name="admission_id" id="admission_id" value="<?php echo @$admission->admission_id; ?>">
         <input type="hidden" class="form-control" name="student_name" id="student_name" value="<?php echo @$admission->surname; ?> <?php echo @$admission->first_name; ?>" placeholder="Enter Youer Name">
         <input type="hidden" class="form-control" name="course_or_package_id" id="course_or_package_id" value="<?php echo @$admission->package_id; ?>" placeholder="Enter Youer Name">
         <input type="hidden" class="form-control" name="gr_id" id="gr_id" value="<?php echo @$admission->gr_id; ?>" placeholder="Enter Youre GR Id">
         <input type="hidden" class="form-control" name="faculty_id" id="faculty_id" placeholder="Professor Name" value="<?php echo $admission->faculty_id; ?>">
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
                    </div><br>
                    <?php if(isset($previous_adm_data)) { ?>
                    <span><?php if($previous_adm_data->uniform=="Regular"){ echo $previous_adm_data->uniform; }?></span>
                    <?php } ?>
                  </td>
                  <td>
                    <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input type="radio" name="uniform" value="InRegular"/>
                      <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>InRegular</label>
                      </div>
                    </div><br>
                    <?php if(isset($previous_adm_data)) { ?>
                    <span><?php if($previous_adm_data->uniform=="InRegular"){ echo $previous_adm_data->uniform; }?></span>
                    <?php } ?>
                  </td>
                  <td>
                    <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input type="radio" name="uniform" value="Excellent"/>
                      <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>Excellent</label>
                      </div>
                    </div><br>
                    <?php if(isset($previous_adm_data)) { ?>
                    <span><?php if($previous_adm_data->uniform=="Excellent"){ echo $previous_adm_data->uniform; }?></span>
                    <?php } ?>
                  </td>
                  <td>
                    <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input type="radio" name="discipline" value="Medium"/>
                      <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label class="ml-1">Medium</label>
                      </div>
                    </div><br>
                    <?php if(isset($previous_adm_data)) { ?>
                    <span><?php if($previous_adm_data->discipline=="Medium"){ echo $previous_adm_data->discipline; }?></span>
                    <?php } ?>
                  </td>
                  <td>
                    <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input type="radio" name="discipline" value="Weak"/>
                      <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label class="ml-1">Weak</label>
                      </div>
                    </div><br>
                    <?php if(isset($previous_adm_data)) { ?>
                    <span><?php if($previous_adm_data->discipline=="Weak"){ echo $previous_adm_data->discipline; }?></span>
                    <?php } ?>
                  </td>
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
                      <input type="number" class="form-control" min="0" max="10" name="faculty_behavior_mark" id="faculty_behavior_mark" value="0"><br>
                      <?php if(isset($previous_adm_data)) { ?>
                      <span><?php echo $previous_adm_data->faculty_behavior_mark; ?></span>
                      <?php } ?>
                  </td>
                  <td width="100" class="text-center">10</td>
                  <td class="mr-2"> 
                      <input type="number" class="form-control" min="0" max="10"  name="student_behavior_mark" id="student_behavior_mark" value="0"><br>
                      <?php if(isset($previous_adm_data)) { ?>
                      <span><?php echo $previous_adm_data->student_behavior_mark; ?></span> 
                      <?php } ?>
                  </td>
                </tr> 
              </table>
            </div>
	      </div>
	    </div> 
      <div class="card card-primary">
	      <div class="card-header">
	      	 <h4>Remarks</h4>
	      </div>
	      <div class="card-body"> 
            <textarea class="form-control" id="remarks" name="remarks"></textarea>
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
                  <input type="number" class="form-control w-50 ml-auto mr-auto" id="total_work_days" min="0" name="total_work_days" value="0"> <br>
                  <?php if(isset($previous_adm_data)) { ?>
                  <span><?php echo $previous_adm_data->total_work_days; ?></span>
                  <?php } ?>
                  </td>
                  <td>
                  <input type="number" class="form-control w-50 ml-auto mr-auto" id="total_present_days" min="0" name="total_present_days" onchange="myFunction()" value="0"> <br>
                  <?php if(isset($previous_adm_data)) { ?>
                  <span><?php echo $previous_adm_data->total_present_days; ?></span>
                  <?php } ?>
                  </td>
                  <td>
                  <input type="text" name="" class="form-control w-75 ml-auto mr-auto" id="total_attendance_percentage"><br>
                  <?php if(isset($previous_adm_data)) { ?>
                  <span><?php echo $previous_adm_data->total_attendance_percentage; ?></span>
                  <?php } ?>
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
                  <input type="number" class="form-control w-50 ml-auto mr-auto" name="total_project" id="total_project" min="0" value="0"><br>
                  <?php if(isset($previous_adm_data)) { ?>
                  <span><?php echo $previous_adm_data->total_project; ?></span>
                  <?php } ?>
                  </td>
                  <td>
                  <input type="number" class="form-control w-50 ml-auto mr-auto" name="submited" id="submited" min="0" value="0" onchange="submitevalue()"> <br>
                  <span id="pro" class="text-center"></span><input type="hidden" name="" id="submited_percentage"><br>
                  <?php if(isset($previous_adm_data)) { ?>
                  <span><?php echo $previous_adm_data->submited; ?>|<?php echo $previous_adm_data->submited_percentage; ?></span>
                  <?php } ?>
                  </td>
                  <td>
                  <input type="number" class="form-control w-50 ml-auto mr-auto" name="on_time" id="on_time" min="0" value="0" onchange="projectwork()"> <br>
                  <span id="project" class="text-center"></span><input type="hidden" name="" id="on_time_percentage"><br>
                  <?php if(isset($previous_adm_data)) { ?>
                  <span><?php echo $previous_adm_data->on_time; ?>|<?php echo $previous_adm_data->submited_percentage; ?></span>
                  <?php } ?>
                  </td>
                  <td> 
                  <select class="form-control" name="quality" id="quality">
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                     </select><br>
                     <?php if(isset($previous_adm_data)) { ?>
                     <span><?php echo $previous_adm_data->quality; ?></span>
                     <?php } ?>
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
                  <?php if(isset($previous_adm_data)) { ?>
                  <span><?php echo $previous_adm_data->total_activity; ?></span>
                  <?php } ?>
                  </td>
                  <td>
                  <input type="number" class="form-control w-50 ml-auto mr-auto" id="participated" min="0" name="participated" onchange="activitys()" value="0"><br>
                  <?php if(isset($previous_adm_data)) { ?>
                  <span><?php echo $previous_adm_data->participated; ?></span>
                  <?php } ?>
                  </td>
                  <td>
                  <input type="text" name="" id="participated_percentage" class="form-control w-50 ml-auto mr-auto"> <br>
                  <?php if(isset($previous_adm_data)) { ?>
                  <span><?php echo $previous_adm_data->participated_percentage; ?></span><?php } ?><input type="hidden" name="" id="participated_percentage"><br>
                  <input type="hidden" name="" id="total_participated">
                  </td>
                </tr> 
              </table>
            </div>
	      </div>
	    </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary mr-1" type="submit" name="submit" id="assessment_ins">Submit</button>
    </div>
    <div class="col-md-12 mt-5">
    <div class="card card-primary">
	      <div class="card-header">
	      	 <h4>Assessment Data</h4>
	      </div>
	      <div class="card-body">
	      	<div class="table-responsive">
          <table class="table table-striped overdue-table" id="table-1">
           <thead>
           <tr class="text-center">
           <th>SNo</th>
           <th>Date</th>
           <th>Download Pdf</th>
           </tr>
           </thead>
           <tbody>
           <?php $sno=1; foreach($tbl_data as $val) { ?>
           <tr class="text-center">
           <td><?php echo $sno; ?></td>
           <td><?php echo $val->date; ?></td>
           <td><a href="<?php echo base_url(); ?>AddmissionController/Assessment_pdf?action=edit&id=<?php echo @$val->admission_id; ?>" class="btn btn-primary" target="_blank"><i class="fas fa-download"></i></a></td>
           </tr>
           <?php $sno++; } ?>
           </tbody>
           </table>
          </div>
        </div>
    </div>
    </div>

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
     var admission_id = $('#admission_id').val();
     var student_name = $('#student_name').val();
     var course_or_package_id = $('#course_or_package_id').val();
     var gr_id = $('#gr_id').val();
     var faculty_id = $('#faculty_id').val();
     var uniform = [];
   
    $('input[name=uniform]:checked').map(function() {
                uniform.push($(this).val());
    });
   
     var discipline = [];
    $('input[name=discipline]:checked').map(function() {
                discipline.push($(this).val());
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
       url: "<?php echo base_url() ?>AddmissionController/Assessment_data",
       data: {
         'admission_id': admission_id,
         'student_name': student_name,
         'course_or_package_id': course_or_package_id,
         'gr_id': gr_id,
         'faculty_id': faculty_id,
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