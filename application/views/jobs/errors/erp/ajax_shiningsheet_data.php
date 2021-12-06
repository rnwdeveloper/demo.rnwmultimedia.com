    <div id="printableArea">
    <form method="post">
    <div class="table-responsive"> 
        <table class="table table-bordered">
<?php foreach($admission_course as $val) { ?>
      <input type="hidden" name="admission_courses_id" id="admission_courses_id" value="<?php if(!empty($val->admission_courses_id)) { echo $val->admission_courses_id; } ?>">
  <tr>
    <th rowspan="3" colspan="2"><img src="<?php echo base_url(); ?>New_Demo_Soft/images/logo.png" class="img-responsive"></th>
    <td colspan="7"><b>FACULTY NAME :</b> <input type="text" class="form" name="faculty_id" id="faculty_id"
    value="<?php $branch_ids = explode(",",$val->faculty_id);   
                        foreach($faculty_all as $row) { if(in_array($row->faculty_id,$branch_ids)) {  echo @$row->name; }  } ?>" ></td>
  </tr>  
  <tr>
    <td colspan="5"><b>STARTING DATE :</b><input type="text" size="12"  class="form" name="stating_date" id="stating_date" value="<?php if(!empty($val->stating_date)) { echo $val->stating_date; } ?>"></td>
    <td colspan="2"><b>GRID :</b>  <?php if(!empty($val->gr_id)) { echo $val->gr_id; } ?></td>
  </tr>
  <tr>
    <td colspan="5"><b>ENDING DATE :</b><input type="text" class="form" size="12" name="ending_date" id="ending_date" value="<?php if(!empty($val->ending_date)) { echo $val->ending_date; } ?>" ></td>
    <td colspan="2"><b>B. TIME :</b><input type="text" size="8" class="form" name="batch_time" id="batch_time" value="<?php if(!empty($val->batch_time)) { echo $val->batch_time; } ?>"></td>
  </tr>
  <tr>
    <td colspan="5"><b>STUDENT NAME :</b> <?php if(!empty($val->surname)) { echo $val->surname; } ?> <?php if(!empty($val->first_name)) { echo $val->first_name; } ?></td>
    <td colspan="4"><b>GOOGLE CLASSROOM CODE :</b> <input type="text" size="9" class="form" name="google_class_room_code" id="google_class_room_code" value="<?php if(!empty($val->google_class_room_code)) { echo $val->google_class_room_code; } ?>"></td>
  </tr>
  <tr>
    <td colspan="6"><b>COURSE NAME : </b><?php $branch_ids = explode(",",$val->courses_id);   
                        foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo $row->course_name; }  } ?></td>
    <td colspan="3"><b>TOTAL DAYS : </b> <input type="text" size="8" class="form" name="total_days" id="total_days" value="<?php if(!empty($val->total_days)) { echo $val->total_days; } ?>">
     <a type="button" id="butsave" style="vertical-align: middle; "><i class="fa fa-edit" style="font-size:16px;color:#0b527e;"></i></a>
    </td>
  </tr>
  <?php $admi_id = $val->admission_id; ?>
  <?php $cp_id = $val->course_orpackage_id; ?>
  <?php $g_id = $val->gr_id; ?>
  <?php } ?>
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
  <tbody>
     <?php  $i=1; foreach ($shining_sheet as $val) { ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php if(!empty($val->name)) { echo $val->name; } ?></td>
      <td>
     <?php $branch_ids = explode(",",$val->shining_sheet_id);
      foreach($assign_student as $row) { 
        if(in_array($row->shining_sheet_id,$branch_ids)&($row->admission_id==$admi_id)&($row->gr_id==$g_id)&($row->course_orpackage_id==$cp_id)) {  echo $row->date; }  } ?>
        </td>
      <td><?php $branch_ids = explode(",",$val->shining_sheet_id);
      foreach($assign_student as $row) { if(in_array($row->shining_sheet_id,$branch_ids)&($row->admission_id==$admi_id)&($row->gr_id==$g_id)&($row->course_orpackage_id==$cp_id)) {  echo $row->p_a; }  } ?></td>
      <td></td>
      <td><?php $branch_ids = explode(",",$val->shining_sheet_id);
      foreach($assign_student as $row) { if(in_array($row->shining_sheet_id,$branch_ids)&($row->admission_id==$admi_id)&($row->gr_id==$g_id)&($row->course_orpackage_id==$cp_id)) {  echo $row->feed_back; }  } ?></td>
      <td>
        <?php $branch_ids = explode(",",$val->shining_sheet_id);
      foreach($assign_student as $row) { if(in_array($row->shining_sheet_id,$branch_ids)&($row->admission_id==$admi_id)&($row->gr_id==$g_id)&($row->course_orpackage_id==$cp_id)) { ?>
       <img src="<?php echo base_url(); ?>assign_student/img/<?php echo $row->stu_sign  ?>" class="img-responsive" style="width: 30px;">
    <?php   }  } ?>     
       </td>
       <td></td>
      <td><a  onclick="return get_assing_student(<?php echo $val->shining_sheet_id;?>,<?php echo $admi_id; ?>,<?php echo $cp_id; ?>,<?php echo $g_id; ?>)" title="Assign Student Mail"><i class="fa fa-tasks" style="font-size:20px;color:#0b527e;"></i>
        </a><br>
        <!-- <a href="javascript:void(0);" id="printButton" title="print Sheet"><i class="fa fa-print" style="font-size:20px;color:#0b527e;"></i></a> -->
       <!-- <a target="_blank" onclick="printDiv('printableArea')"><i class="fa fa-print" style="font-size:20px;color:#0b527e;"></i></a> -->
      </td>
    </tr>
    <?php $i++; } ?>
  </tbody>
  </table>
</div>
</form>


  
<script type="text/javascript">
  
  // Ajax post
$(document).ready(function() 
{
$("#butsave").click(function() 
{
            var admission_courses_id = $('#admission_courses_id').val();
            //var faculty_id = $('#faculty_id').val();
            var stating_date = $('#stating_date').val();
            var ending_date = $('#ending_date').val();
            var batch_time = $('#batch_time').val();
            var google_class_room_code = $('#google_class_room_code').val();
            var total_days = $('#total_days').val();

   $.ajax({
     type : "POST",
     url  : "<?php echo base_url()?>AddmissionController/upd_shining_sheet_data",
     dataType : "JSON",
     data : {'admission_courses_id' : admission_courses_id ,'stating_date' : stating_date ,'ending_date' : ending_date ,'batch_time' : batch_time ,'google_class_room_code' : google_class_room_code , 'total_days' : total_days},
      success: function(data){
        $("#admission_courses_id").val("");
        // $("#faculty_name").val("");
        // $("#stating_date").val("");
        // $("#ending_date").val("");
        // $("#batch_time").val("");
        // $("#google_class_room_code").val("");
        // $("#total_days").val("");
        alert("Data Updated Successfully");
      }
   });
   return false;
});
});
</script>
    
     <script type="text/javascript">

 function get_assing_student(shining_sheet_id='',admi_id='',cp_id='',g_id=''){
    $.ajax({
      url : "<?php echo base_url(); ?>AddmissionController/assign_student",
      type:"post",
      data:{
        'shining_sheet_id':shining_sheet_id , 'admission_id':admi_id , 'course_orpackage_id':cp_id , 'gr_id':g_id
      },
      success:function(Resp){
       // $('#get_shiningsheet').html(Resp);

      alert("Are You Sure This Topic Assign Student Email");
      }
    });
  }

</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.js"></script>

<!-- <script>
$(document).ready(function(){
    $("#printButton").click(function(){
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = { mode : mode, popClose : close};
        $("div.printableArea").printArea( options );
    });
});
</script> -->

<script>
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

 
