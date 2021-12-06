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
			<!-- <div class="rsidebar-items send-sms edit-co-info">
				<div class="rsidebar-title">
					<h3 class="mb-0">Course Info Edit <span class="float-right"><button class="btn btn-sm btn-primary" id="coinfoshow" style="line-height: 18px;"><i class="fas fa-eye"></i></button></span></h3>
				</div>
				<div class="rsidebar-middle p-0">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body pl-0 pr-0">
                  	<input type="hidden" name="upd_id" id="upd_id" value="<?php echo  $adm_get_record->admission_id; ?>">
                  	<div class="form-group">
                      <label>Brnach Name</label>
	                       <select class="form-control" name="branch_ids" id="branch_ids">
	                      <option value="">Select branch</option>
	                      <?php foreach($list_branch as $ld) { ?>
				         <option  <?php if($ld->branch_id==@$adm_get_record->branch_id) { echo "selected"; } ?>
				            value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
				         <?php } ?>
                   </select>
                    </div>
                    <div class="form-group">
                      <label>Session</label>
	                       <select class="form-control" name="no_year" id="session">
	                      <option value="">Select Year</option>
	                      <?php for($i=2019;$i<=2030;$i++){ ?>
				         <option <?php if($i==@$adm_get_record->year) { echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
				         <?php } ?>
                   </select>
                    </div>
                	<div class="form-group">
                     <label class="d-block">Type</label>
                    <div class="custom-control custom-radio custom-control-inline pl-0">
                      <input type="radio" id="customRadioInline1" name="type"
                        class="custom-control-input" value="package" <?php if(@$adm_get_record->type=="package") { echo "checked"; } ?> onclick="return show_hide_package_course()">
                      <label class="custom-control-label" for="customRadioInline1">Package</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="customRadioInline2" name="type"
                        class="custom-control-input" value="single" <?php if(@$adm_get_record->type=="single") { echo "checked"; } ?> onclick="return show_hide_package_course()">
                      <label class="custom-control-label" for="customRadioInline2">Single</label>
                    </div>
                    </div>
                    <div class="form-group select_course_package">
                      <label>Package</label>
	                       <select class="form-control select2" name="course_or_package[]" id="course_orpackage" multiple="">
    	                      <option value="">Select Package</option>
    	                      <?php foreach($list_package as $lp) { ?>
    				                <option <?php if($lp->package_id==@$adm_get_record->package_id) { echo "selected"; } ?>
    				                  value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
    				              <?php } ?> 
                         </select>
                    </div>
                    <div class="form-group select_course_single">
                      <label>Course</label>
	                       <select class="form-control select2"  name="course_or_single[]" id="course_orsingle" multiple="">
	                      <option value="">Select Course</option>
	                       <?php foreach($list_course as $lp) { ?>
				         <option <?php if($lp->course_id==@$adm_get_record->course_id) { echo "selected"; } ?>
				            value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
				         <?php } ?>
                   </select>
                    </div>
                    
                    <button class="btn btn-sm btn-primary" id="basic_info_updates">Update</button>
                  </div>
                </div>
              </div>
          </div>
          </div> -->

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
                <th>Shining Sheet</th>
              </tr>
            </thead>
            <tbody>
					<?php  $sno=1; foreach($admission_courses as $val) { if($val->without_fees_modifive=="0") { ?>
            <?php if ($val->admission_courses_status == "Ongoing") {
                              $dclass = 'success';
                            } else if($val->admission_courses_status == "Pending") {
                              $dclass = 'deposit';
                            } else if($val->admission_courses_status == "Not Assigned") {
                            $dclass = 'notas';
                            }else{
                              $dclass = '';
                            } ?>
              <tr class="text-center <?php echo $dclass; ?>">
              	  <td>
                  <div class="custom-checkbox custom-control">
                    <input type="checkbox" name="admission_courses" value="<?php echo $val->admission_courses_id ?>"   id="checkbox-4">
                  </div>
                </td>
                <td><?php echo $sno; ?></td>
                <td>
                   <?php  echo $val->subcourse_name;  ?>
                    <i class="fas fa-clipboard-list text-primary" data-toggle="modal"
                        data-target="#assigned_batch" onclick="return course_wise_batch_assigned(<?php echo $val->courses_id; ?>,<?php echo $val->branch_id; ?>,<?php echo $val->admission_courses_id; ?>)">
                    </i>
                </td>
                <td>
                <?php if ($val->admission_courses_status == "Ongoing") { ?>
                	 <i class="fas fa-eye text-primary" data-toggle="modal"
          data-target=".shiningsheet" onclick="return get_shiningsheet_record(<?php echo $val->courses_id;?>,<?php echo $val->admission_courses_id; ?>)"></i>
          <?php } ?>
                </td>
              </tr>
               <?php $sno++; } } ?> 
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
   function get_shiningsheet_record(subcourse_id='',admission_courses_id=''){
   
      $.ajax({
        url : "<?php echo base_url(); ?>AddmissionController/ajax_shiningsheet_data",
        type:"post",
        data:{ 'subcourse_id':subcourse_id , 'admission_courses_id':admission_courses_id },
        success:function(Resp)
        {
          $('#get_shiningsheet').html(Resp);
        }
   
      });
   
    }
    
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