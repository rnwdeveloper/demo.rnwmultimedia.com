<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
  
<style type="text/css">
	.img-responsive{
   display: block;
   max-width: 100%;
   height: auto;
   }
   .form{
   border: 0;
   } 
</style>
<div class="rs-stu-detail">
	<div class="rs-stu-item mb-1"><p>Branch :</p>
		<span>
			<?php foreach($list_branch as $ld) { ?>
         <?php if($ld->branch_id==@$adm_get_record->branch_id) echo $ld->branch_name; ?>
         <?php } ?>
		</span>
	</div>
	<div class="rs-stu-item mb-1"><p>Year :</p>
		<span>
			<?php echo $adm_get_record->year; ?>
		</span>
	</div>
	<div class="rs-stu-item mb-1"><p>Department :</p>
		<span>
			<?php foreach($list_department as $ld) { ?>
         <?php if($ld->department_id==@$adm_get_record->department_id) echo $ld->department_name; ?>
         <?php } ?>
		</span>
	</div>
	<div class="rs-stu-item mb-1"><p>Type :</p>
		<span>
			<?php echo $adm_get_record->type; ?>
		</span>
	</div>
	<div class="rs-stu-item mb-1"><p>Course :</p>
		<span>
			 <?php foreach($list_package as $lp) { ?>
         <?php if($lp->package_id==@$adm_get_record->package_id) { echo $lp->package_name; } ?>
         <?php } ?> 
         <?php foreach($list_course as $lp) { ?>
         <?php if($lp->course_id==@$adm_get_record->course_id) { echo $lp->course_name; } ?>
         <?php } ?>
         <?php foreach($list_college_courses as $clg) { ?>
         <?php if($clg->college_courses_id==@$adm_get_record->college_courses_id) { echo $clg->college_course_name; } ?>
         <?php } ?>
		</span>
	</div>	
</div> 
<div class="rsidebar-items send-sms">
<div class="rsidebar-middle">
        <div class="table-responsive p-3`">
        <table class="table table-bordered table-hover erpshowcourse bg-table" id="tableExport" style="width:100%;">
        <thead>
            <tr class="text-center">
            <th>
            <div class="custom-checkbox custom-checkbox-table custom-control">
                <input type="checkbox" name="ddddddd" id="checkbox-all-3">
            </div>
            </th>
            <th>S_No</th>
            <th>Course</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($single_clg_data->admission_courses_status == "Ongoing") {
                $dclass = 'success';
            } else if($single_clg_data->admission_courses_status == "Pending") {
                $dclass = 'deposit';
            } else if($single_clg_data->admission_courses_status == "Not Assigned") {
            $dclass = 'notas';
            }else{
                $dclass = '';
            } ?>
            <tr class="text-center <?php echo $dclass; ?>">
                <td>
                <div class="custom-checkbox custom-control">
                <input type="checkbox" name="admission_courses" value="<?php echo $single_clg_data->admission_courses_id ?>"  id="checkbox-4">
                </div>
            </td>
            <td><?php echo "1"; ?></td>
            <td>
            <?php foreach($list_college_courses as $clg) { ?>
         <?php if($clg->college_courses_id==@$adm_get_record->college_courses_id) { echo $clg->college_course_name; } ?>
         <?php } ?>
                <!-- 
                <i class="fas fa-clipboard-list text-primary" data-toggle="modal"
                    data-target="#assigned_batch" onclick="return course_wise_batch_assigned(<?php echo $val->courses_id; ?>,<?php echo $val->branch_id; ?>,<?php echo $val->admission_courses_id; ?>)">
                </i> -->
            </td>
            </tr>
        </tbody>
        </table>
    </div>
    <div class="mb-3 text-center" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target=".course_completed" onclick="return course_completed(<?php echo $adm_get_record->admission_id; ?>)">Course As Completed</button>
        <input type="hidden" class="form-control" id="admission_ids" name="admission_ids" value="<?php echo $adm_get_record->admission_id; ?>">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".admission_completed">Admission As Completed</button>
    </div>
</div>
</div>
  


  
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
   <!-- General JS Scripts -->
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
  <!-- JS Libraies --> 
  <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
    <!-- Page Specific JS File --> 

  <script type="text/javascript">
  // 	 jQuery(".erpshowcourse thead input[type=checkbox]").click(function() {
  //   jQuery(".erpshowcourse tbody input[type=checkbox]").prop("checked", $(this).prop("checked"));
  //   // alert("Hi Prince");
  // });

      $("#checkbox-all-3").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
      });
  </script>

  <script type="text/javascript">
    function course_completed(admission_id=''){
   
      $.ajax({
        url : "<?php echo base_url(); ?>Admission/Erpcourse_completed",
        type:"post",
        data:{ 'admission_id':admission_id },
        success:function(Resp)
        {
          $('.course_completed_data').html(Resp);
        }
   
      });
   
    }

    function course_wise_batch_assigned(course_id='',branch_id='',admission_courses_id=''){
   
   $.ajax({
     url : "<?php echo base_url(); ?>Admission/CourseWiseBatch_Assigned",
     type:"post",
     data:{ 'course_id':course_id , 'branch_id':branch_id , 'admission_courses_id':admission_courses_id},
     success:function(Resp)
     {
       $('.batches_record').html(Resp);
     }

   });

 }
</script>

  <script type="text/javascript">
   $('.select_course_single').hide();
   function show_hide_package_course()
   {
     var course_package = $("input[name='type']:checked").val();
   // alert(course_package);
   if(course_package == 'single')
   {
     $('.select_course_single').show();
     $('.select_course_package').hide(); 
   }
   else
   {
     $('.select_course_single').hide();
     $('.select_course_package').show();
   }
}
</script>