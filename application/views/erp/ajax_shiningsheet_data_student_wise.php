<div id="printableArea">
<form method="post">
<div class="sheet-preview">
   <div class="table-responsive">
      <table class="table table-bordered">
         <input type="hidden" name="admission_courses_id" id="admission_courses_id" value="">
         <tr>
            <th rowspan="3" colspan="2"><img src="<?php echo base_url(); ?>New_Demo_Soft/images/logo.png" class="img-responsive m-auto" width="200px"></th>
            <td colspan="7"><b>FACULTY NAME :</b> <input type="text" class="form" name="faculty_id" id="faculty_id"
               value="<?php echo $match_faculty->name; ?>" ></td>
         </tr>
         <tr>
            <td colspan="5"><b>STARTING DATE :</b><input type="text" size="12"  class="form" name="stating_date" id="stating_date" value=""></td>
            <td colspan="2"><b>GRID :</b>  </td>
         </tr>
         <tr>
            <td colspan="5"><b>ENDING DATE :</b><input type="text" class="form" size="12" name="ending_date" id="ending_date" value=""></td>
            <td colspan="2"><b>B. TIME :</b><input type="text" size="8" class="form" name="batch_time" id="batch_time" value=""></td>
         </tr>
         <tr>
            <td colspan="5"><b>STUDENT NAME :</b></td>
            <td colspan="4"><b>GOOGLE CLASSROOM CODE :</b> <input type="text" size="9" class="form" name="google_class_room_code" id="google_class_room_code" value=""></td>
         </tr>
         <tr>
            <td colspan="5"><b>COURSE NAME : </b><?php echo $match_course->subcourse_name; ?></td>
            <td colspan="4"><b>TOTAL DAYS : </b> <input type="text" size="8" class="form" name="total_days" id="total_days" value="">
               <a type="button" id="butsave" style="vertical-align: middle;" class="text-primary"><i class="fa fa-edit"></i></a>
            </td>
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
         <tbody>
            <?php  $i=1; foreach ($shining_sheet as $val) { ?>
            <tr>
               <td><?php echo $i; ?></td>
               <td><?php if(!empty($val->name)) { echo $val->name; } ?></td>
               <td>
               </td>
               <td></td>
               <td></td>
               <td></td>
               <td>
               </td>
               <td></td>
               <td>
                  <a  onclick="return assigned_multistudent(<?php echo $val->shining_sheet_id;?>)" title="Assign Student Mail" class="text-primary"><i class="fa fa-tasks" ></i>
                  </a><br>
                  <!-- <a href="javascript:void(0);" id="printButton" title="print Sheet"><i class="fa fa-print" style="font-size:20px;color:#0b527e;"></i></a> -->
                  <!-- <a target="_blank" onclick="printDiv('printableArea')"><i class="fa fa-print" style="font-size:20px;color:#0b527e;"></i></a> -->
               </td>
            </tr>
            <?php $i++; } ?>
         </tbody>
      </table>
   </div>
</div>
</form>
<!-- <script type="text/javascript">

 function assigned_multistudent(shining_sheet_id='',batches_id='')
 {
    $.ajax({
      url : "<?php echo base_url(); ?>AddmissionController/assigned_multistudent",
      type:"post",
      data:{
        'shining_sheet_id':shining_sheet_id , 'batches_id':batches_id 
      },
      success:function(Resp){
       // $('#get_shiningsheet').html(Resp);

      alert("Are You Sure This Topic Assign Student All Email");
      }
    });
  }
</script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.js"></script>
<script>
   function printDiv(divName)
    {
  
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
   }
</script>