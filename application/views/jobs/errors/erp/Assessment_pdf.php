<!DOCTYPE html>
<html>
<head>
  <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

       <style type="text/css">
         .th{
          background-color: #0b527e;
          color: white;
          font-size: 14px;
        }
        .td{
          font-size: 12px;
        }
        </style>
</head>
<body>
<section>
  <h5>Assessment Form<label class="float-right">Date : <?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->date;; } ?></label></h5>
  <label>Student Details</label>
   <table class="table table-bordered">
  <thead>
    <tr align="center" class="th">
      <th><b>Student Name</b></th>
      <th><b>GR Id</b></th>
      <th><b>Course</b></th>
      <th><b>Professor Name</b></th>
    </tr>
  </thead>
  <tbody>
    <tr class="td">
      <th><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->student_name; } ?></th>
      <td><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->gr_id; } ?></td>
      <td><?php if(isset($assessment_pdf_data)){ foreach($list_package as $lp) { ?>
                            <?php if($lp->package_id==@$assessment_pdf_data->course_or_package_id) echo $lp->package_name; ?>
                          <?php } }?></td>
      <td><?php if(isset($assessment_pdf_data)){ foreach($faculty_all as $lp) { ?>
                            <?php if($lp->faculty_id==@$admission->faculty_id) echo $lp->name; ?>
                          <?php } }?></td>
    </tr>
  </tbody>
</table>
  <label> Behavior</label>
  <table class="table table-bordered">
  <thead>
    <tr align="center" class="th">
    <th>Uniform</th>
    <th>Discipline</th>
    <th>Behaviour OF Faculty</th>
    <th>Behaviour OF Student</th>
  </tr>
  </thead>
  <tbody>
    <tr class="td">
    <td>
       <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->uniform; } ?></span>
    </td>
    <td>
        <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->discipline; } ?></span>
    </td>
    <td>
    <span>
      <?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->faculty_behavior_mark; } ?>/10
      </span>
                                   
    </td>
    <td>
       <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->student_behavior_mark; } ?>/10</span>
    </td>
  </tr>
  </tbody>
</table>
<label>Attendance</label>
  <table class="table table-bordered mb-0">
  <thead align="center" class="th">
    <tr>
      <th>Total work Days</th>
      <th>Total Present Day </th>
      <th>Percentage</th>
    </tr>
  </thead>
  <tbody>
    <tr class="td">
      <td>
        <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->total_work_days; } ?></span>
      </td>
      <td>
        <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->total_present_days; } ?></span>
      </td>
      <td>
        <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->total_attendance_percentage; } ?></span>
      </td>
    </tr>
  </tbody>
</table>

<label>Project Work</label>
<table class="table table-bordered mb-0">
  <thead align="center" class="th">
    <tr>
      <th>Total Project</th>
      <th>Submited</th>
      <th>Percentage</th>
      <th>On Time</th>
      <th>Percentage</th>
      <th>Quality</th>
    </tr>
  </thead>
  <tbody>
    <tr class="td">
      <td>
        <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->total_project; } ?></span>
      </td>
      <td>
        <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->submited; } ?>/<?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->total_project; } ?></span>
      </td>
      <td>
        <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->submited_percentage; } ?></span>
      </td>
      <td>
        <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->on_time; } ?>/<?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->total_project; } ?></span>
      </td>
      <td>
        <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->on_time_percentage; } ?></span>
      </td>
      <td>
        <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->quality; } ?></span>
      </td>
    </tr>
  </tbody>
</table>

<label>Activity</label>
<table class="table table-bordered mb-0">
<thead align="center" class="th">
  <tr>
    <th>Total</th>
    <th>Participated</th>
    <th>Percentage</th>
  </tr>
</thead>
<tbody>
  <tr class="td">
    <td>
      <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->total_activity; } ?></span>
    </td>
    <td>
      <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->participated; } ?></span>
    </td>
    <td>
      <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->participated_percentage; } ?></span>
    </td>
  </tr>
</tbody>
</table>
<br><br><br>
<label>Remarks</label>
<table class="table table-bordered mb-0">
<thead align="center" class="th">
  <tr>
    <th>Remarks</th>
  </tr>
</thead>
<tbody>
  <tr class="td">
    <td>
      <span><?php if(isset($assessment_pdf_data)){ echo $assessment_pdf_data->remarks; } ?></span>
    </td>
  </tr>
</tbody>
</table>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>