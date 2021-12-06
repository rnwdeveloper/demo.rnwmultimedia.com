
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style type="text/css">
    label{
      font-size: 12px;
      margin-bottom: 5px !important;
    }
    .form-control{
      height: 24px !important;
      font-size: 12px !important;
      padding: 0 0 0 10px;
    }
    select.form-control:not([size]):not([multiple]) {
        height: calc(1.7rem + 2px);
    }
    .form-group{
      margin-bottom: 5px;
    }
    .form-group label{
      color:#6c757d!important;
    }
    .main_content section{
      padding: 0;
    }
    .form-control span{
      font-size: 12px !important;
    }
    .table thead th{
      font-size: 10px;
    }
    .table td, .table th{
      vertical-align: middle;
      padding: 5px;
    }
    .checkbox{
      display: inline-flex; 
      font-size: 11px;
    }
    .pr{
      font-size: 10px;
    }
    .card-header{
      background-color: #0b527e;
      color: white;
      font-size: 14px;
      padding: 5px 10px;
    }
    .card-body{
      padding: 12px;
    }
  </style>
<main class="main_content d-inline-block">
  <section>
    <div class="row" style="margin: 20px 40px; align-items: center;}">
      <h5>Assessment Form</h5>
      <div class="ml-auto">
        <a href="<?php echo base_url(); ?>AddmissionController/admission_view" class="btn-sm btn-primary">Back</a>
      </div>
    </div>
    <div class="row" style="margin: 0 20px;">
      <div class="col-sm-12">
        <div class="card mb-3">
          <div class="card-header">
            Student Details
          </div>
          <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-3">
                      <label for="inputName">Student Name</label>
                      <span class="d-block" style="font-size: 11px;"><?php echo @$admission->surname; ?> <?php echo @$admission->first_name; ?></span>
                  </div>
                  <div class="form-group col-md-2">
                      <label for="inputGrid">GR Id</label>
                      <span class="d-block" style="font-size: 11px;"><?php echo @$admission->gr_id; ?></span>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="inputCorse">Course</label>
                      <span class="d-block" style="font-size: 11px;">
                        <?php $i=1; foreach($admission->list_multi_course_admission as $k => $val){ ?>
                            <?php echo "$i :".''. $val; ?>
                          <?php $i++; } ?>
                      </span>
                  </div>
                  <div class="form-group col-md-3">
                      <label for="inputProfessorname" style="font-size: 11px;">Professor Name</label>
                      <span class="d-block" style="font-size: 11px;">
                          <?php foreach($faculty_all as $lp) { ?>
                            <?php if($lp->faculty_id==@$admission->faculty_id) echo $lp->name; ?>
                          <?php } ?>
                        </span>
                  </div>
                 
                 <!--  <?php if(isset($previous_adm_data)){  ?>
                     <div class="form-group col-md-12"></div>
                    <div class="form-group col-md-12"></div>
                  <div class="form-group col-md-12"></div>
                  <div class="form-group col-md-12"></div>
                  <div class="form-group col-md-12"></div>
                  <?php } ?> -->
                 
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card mb-3">
          <div class="card-header">
            Behavior
          </div>
            <input type="hidden" name="admission_id" id="admission_id" value="<?php echo @$admission->admission_id; ?>">
           <input type="hidden" class="form-control" name="student_name" id="student_name" value="<?php echo @$admission->surname; ?> <?php echo @$admission->first_name; ?>" placeholder="Enter Youer Name">
            <input type="hidden" class="form-control" name="course_or_package_id" id="course_or_package_id" value="<?php echo @$admission->package_id; ?>" placeholder="Enter Youer Name">
          <input type="hidden" class="form-control" name="gr_id" id="gr_id" value="<?php echo @$admission->gr_id; ?>" placeholder="Enter Youre GR Id">
          <input type="hidden" class="form-control" name="faculty_id" id="faculty_id" placeholder="Professor Name" value="<?php echo $admission->faculty_id; ?>">
          <div class="card-body">
            <table class="table table-bordered mb-0">
            <thead>
              <tr align="center">
                <th colspan="2">Uniform</th>
                <th colspan="3">Discipline</th>
                <th colspan="2">Behaviour OF Faculty</th>
                <th colspan="2">Behaviour OF Student</th>
              </tr>
            </thead>
            <tbody>
              <tr align="center">
                <td>
                  <div class="col-sm-8 checkbox p-0">
                    <input type="checkbox"  name="uniform"  value="Regular"><span class="ml-2">Regular</span>
                  </div>
                </td>
                <td>
                  <div class="col-sm-8 checkbox p-0 text-center">
                    <input type="checkbox" name="uniform" value="InRegular"><span class="ml-2">InRegular</span>
                  </div>
                </td>
               <td>
                  <div class="col-sm-8 checkbox p-0">
                    <input type="checkbox"  name="discipline" value="Excellent"><span class="ml-2">Excellent</span>
                  </div>
                </td>
                <td>
                  <div class="col-sm-8 checkbox p-0">
                    <input type="checkbox" name="discipline" value="Medium"><span class="ml-2">Medium</span>
                  </div>
                </td>
                <td>
                  <div class="col-sm-8 checkbox p-0">
                    <input type="checkbox" name="discipline" value="Weak"><span class="ml-2">Weak</span>
                  </div>
                </td>
                <td>10</td>
                <td>
                  <div class="col-sm-8  p-0">
                    <input  type="number" class="form-control" min="0" max="10" name="faculty_behavior_mark" id="faculty_behavior_mark"  value="0"  maxlength="4">
                  </div>
                </td>
                <td>10</td>
                <td>
                  <div class="col-sm-8  p-0">
                    <input type="number"  class="form-control" min="0" max="10"  name="student_behavior_mark" id="student_behavior_mark" value="0">
                  </div>
                </td>
              </tr>
              <tr class="text-center" style="font-size: 10px;">
                <?php if(isset($previous_adm_data)){  ?>
                  <td ><span style="color: red;" >previous</span></td>
                  <td ><span class="uniform"><?php echo $previous_adm_data->uniform; ?></span></td>
                  <td colspan="3"><span class="discipline"><?php echo $previous_adm_data->discipline; ?></span></td>
                  <td colspan="2"><span class="faculty_behavior_mark"><?php echo $previous_adm_data->faculty_behavior_mark; ?></span></td>
                  <td colspan="2"><span class="student_behavior_mark"><?php echo $previous_adm_data->student_behavior_mark; ?></span></td> 
                <?php } ?>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="card mb-3">
          <div class="card-header">
            Attendance
          </div>
          <div class="card-body">
            <table class="table table-bordered mb-0">
            <thead align="center">
              <tr>
                <th>Total work Days</th>
                <th>Total Present Day </th>
                <th>Percentage</th>
              </tr>
            </thead>
            <tbody>
              <tr align="center">
                <td>
                  <div class="col-sm-8" >
                  <input type="number" class="form-control"  id="total_work_days" min="0" name="total_work_days" value="0">
                </div>
                </td>
                <td>
                  <div class="col-sm-8">
                  <input type="number" class="form-control" id="total_present_days" min="0" name="total_present_days" onchange="myFunction()" value="0">
                </div>
                </td>
                <td><b><span class="pr" id="total_percentage"></span></b>
                    <input type="hidden" id="total_attendance_percentage">
                </td>
              </tr>
              <tr class="text-center" style="font-size: 10px;">
                <?php if(isset($previous_adm_data)){  ?>
                  <td ><span class="mr-2" style="color: red;" >previous</span><span class="total_work_days"><?php echo $previous_adm_data->total_work_days; ?></span></span></td>
                  <td ><span class="total_present_days"><?php echo $previous_adm_data->total_present_days; ?></span></td>
                  <td><span class="total_attendance_percentage"><?php echo $previous_adm_data->total_attendance_percentage; ?></span></td>
                <?php } ?>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="card mb-3">
          <div class="card-header">
            Project Work
          </div>
          <div class="card-body">
             <table class="table table-bordered mb-0">
                <thead align="center">
                  <tr>
                    <th>Total Project</th>
                    <th>Submited</th>
                    <th>On Time</th>
                    <th>Quality</th>
                  </tr>
                </thead>
                <tbody>
                  <tr align="center">
                    <td width="25%"> 
                      <div class="col-sm-12 p-0">
                        <input type="number" class="form-control" name="total_project" id="total_project" min="0" value="0" >
                      </div>
                    </td>
                    <td width="20%">
                      <div class="col-sm-12 p-0">
                        <input type="number" class="form-control" name="submited" id="submited" min="0" value="0" onchange="submitevalue()">
                      </div>
                    </td>
                    <td width="20%">
                      <div class="col-sm-12 p-0">
                        <input type="number" class="form-control" name="on_time" id="on_time" min="0" value="0" onchange="projectwork()">
                      </div>
                    </td>
                    <td width="30%">
                      <div class="col-sm-12 p-0">
                        <select class="form-control" name="quality" id="quality">
                          <option value="High">High</option>
                          <option value="Medium">Medium</option>
                          <option value="Low">Low</option>
                        </select>
                      </div>
                    </td>
                  </tr>
                  <tr class="text-center" style="font-size: 10px;">
                    <?php if(isset($previous_adm_data)){  ?>
                      <td><span class="total_project"><?php echo $previous_adm_data->total_project; ?></span></td>
                      <td><span class="submited"><?php echo $previous_adm_data->submited; ?>|<?php echo $previous_adm_data->submited_percentage; ?></span></td>
                      <td><span class="on_time"><?php echo $previous_adm_data->on_time; ?>|<?php echo $previous_adm_data->submited_percentage; ?></span></td>
                      <td><span class="quality"><?php echo $previous_adm_data->quality; ?></span></td>
                    <?php } ?>
                  </tr>
                </tbody>
              </table>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="card mb-3">
          <div class="card-header">
            Activity
          </div>
          <div class="card-body">
            <table class="table table-bordered mb-0">
              <thead>
                <tr align="center">
                  <th>Total</th>
                  <th>Participated</th>
                  <th>Percentage</th>
                </tr>
              </thead>
              <tbody>
                <tr align="center">
                  <td>
                    <div class="col-sm-12" >
                    <input type="number" class="form-control"  id="total" min="0" name="total_activity"  value="0">
                  </div>
                  </td>
                  <td>
                    <div class="col-sm-12">
                    <input type="number" class="form-control" id="participated" min="0" name="participated"  id="" onchange="activitys()" value="0">
                  </div>
                  </td>
                  <td><b><span class="pr" id="total_participated"></span><input type="hidden" name="" id="participated_percentage"></b></td>
                </tr>
                <tr class="text-center" style="font-size: 10px;">
                  <?php if(isset($previous_adm_data)){  ?>
                    <td><span class="total_activity"><?php echo $previous_adm_data->total_activity; ?></span></td>
                    <td><span class="participated"><?php echo $previous_adm_data->participated; ?></span></td>
                    <td><span class="participated_percentage"><?php echo $previous_adm_data->participated_percentage; ?></span></td>
                  <?php } ?>
                </tr>
              </tbody>
            </table>
            <!-- <?php if(isset($previous_adm_data)){  ?>
           <label>
            <span style="color: red; font-size: 10px !important;" >previous</span>
            <span class="total_activity"><?php echo $previous_adm_data->total_activity; ?></span>
            <span class="participated"><?php echo $previous_adm_data->participated; ?></span>
            <span class="participated_percentage"><?php echo $previous_adm_data->participated_percentage; ?></span> 
          </label>
        <?php } ?> -->
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card mb-3">
          <div class="card-header">
            Remarks
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Remarks</label>
              <textarea class="form-control" id="remarks" name="remarks" rows="2"></textarea>
            </div>
            <?php if(isset($previous_adm_data)){  ?>
           <label>
            <span style="color: red; font-size: 10px !important;" >previous</span>
            <span class="remarks"><?php echo $previous_adm_data->remarks; ?></span>
        <?php } ?> 
          </div>
        </div>
      </div>
      <button type="submit" name="submit" id="assessment_ins" class="btn-sm btn-success ml-3">Submit</button>
    </div>
  </section>

  <section style="padding-top:  20px;">
    <div class="row" style="margin: 0 20px;">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Assessment Data
          </div>
          <div class="card-body">
            <p class="card-text">
              <table class="table table-bordered mb-0">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Download</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php if(isset($tbl_data)) { echo $tbl_data->date; }  ?></td>
                    <td><a href="<?php echo base_url(); ?>AddmissionController/Assessment_pdf?action=edit&id=<?php echo @$admission->admission_id; ?>" target="blank"><i class="fa fa-download" style="font-size:25px;color:red"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Data table and pagination & searching -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
 $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>

   <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        

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
//console.log(data);
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
 
//console.log(data);
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
       dataType: "JSON",
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
       success: function(data) {
         // $('#exampleModal').modal().hide();
         //$("#admission_id").val("");
         //$("#update_id").val("");

         alert('Data Inserted Success');
       }
     });
     return false;
   });
 </script>






