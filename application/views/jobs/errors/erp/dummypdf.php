<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
  .img-responsive{
  display: block;
  max-width: 100%;
  height: auto;
}
</style>
<div class="table-responsive"> 
<table class="table table-bordered">
  <tr>
    <th rowspan="3" colspan="2"></th>
    <td colspan="7"><b>FACULTY NAME :</b> <?php $branch_ids = explode(",",$admission_course->faculty_id);   
                        foreach($faculty_all as $row) { if(in_array($row->faculty_id,$branch_ids)) {  echo @$row->name; }  } ?></td>
  </tr>  
  <tr>
    <td colspan="5"><b>STARTING DATE :</b> <?php if(!empty($admission_course->stating_date)) { echo $admission_course->stating_date; } ?></td>
    <td colspan="2"><b>GRID :</b> <?php if(!empty($admission_course->gr_id)) { echo $admission_course->gr_id; } ?></td>
  </tr>
  <tr>
    <td colspan="5"><b>ENDING DATE :</b> <?php if(!empty($admission_course->ending_date)) { echo $admission_course->ending_date; } ?></td>
    <td colspan="2"><b>B. TIME :</b><?php if(!empty($admission_course->batch_time)) { echo $admission_course->batch_time; } ?></td>
  </tr>
  <tr>
    <td colspan="5"><b>STUDENT NAME :</b> <?php if(!empty($admission_course->surname)) { echo $admission_course->surname; } ?> <?php if(!empty($admission_course->first_name)) { echo $admission_course->first_name; } ?></td>
    <td colspan="4"><b>GOOGLE CLASSROOM CODE :</b> <?php if(!empty($admission_course->google_class_room_code)) { echo $admission_course->google_class_room_code; } ?></td>
  </tr>
  <tr>
    <td colspan="6"><b>COURSE NAME : </b> <?php $branch_ids = explode(",",$admission_course->courses_id);   
                        foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo $row->course_name; }  } ?></td>
    <td colspan="3"><b>TOTAL DAYS : </b> <?php if(!empty($admission_course->total_days)) { echo $admission_course->total_days; } ?></td>
  </tr>
  <tr>
    <th>LEC.</th>
    <th>TOPIC</th>
    <th>DATE</th>
    <th>P/A</th>
    <th>DAY</th>
    <th>FEEDBACK</th>
    <th>STU. SIGN</th>
    <th>FACULTY SIGN</th>
    <th>Assign Student</th>
  </tr>
  </table>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>