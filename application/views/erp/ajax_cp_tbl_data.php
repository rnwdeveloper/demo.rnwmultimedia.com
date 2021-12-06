<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
<style type="text/css">
   .select2-container--default .select2-selection--multiple .select2-selection__choice {
   background-color: #0b527e;
   color: white;
   border: 1px solid #aaa;
   border-radius: 4px;
   cursor: default;
   float: left;
   margin-right: 5px;
   margin-top: 8px;
   padding: 0 1px;
   }
   /*.select2-container--default .select2-selection--multiple {
   line-height: 27px;
   }*/
   .select2-container {
   box-sizing: border-box;
   display: block; 
   width:100% !important;
   margin: 0;
   position: relative;
   vertical-align: middle;
   z-index: 9999999999;
   }
   .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
   list-style: none;
   }
   .col-md-3 {
   margin-bottom: 20px;
   }
   .lead_info_title {
   font-size: 12px;
   color: #212121;
   display: block;
   }
   .form-control{
   height: 24px;
   padding: 2px 3px;
   font-size: 12px;
   }
   .table thead th {
   vertical-align: middle;
   }
   .sidetblth{
   font-size: 10px;
   }
   .table td, .table th{
   vertical-align: middle;
   }
   .form-check-inline{
   font-size: 12px;
   }
   .btn-group-sm>.btn, .btn-sm{
   font-size: 12px;
   }
   .toast{
   opacity: 1;
   }
</style>
<div class="new_lead_info_fill" id="course_upd_data_hide">
   <h6 class="lead_fill_title">Course.*</h6>
   <input type="hidden" name="upd_id" id="upd_id" value="<?php echo  $adm_get_record->admission_id; ?>">
   <div class="form-group">
      <label class="lead_info_title">Branch Name<span style="color:red">*</span></label>
      <select class="form-control" name="branch_ids" id="branch_ids" >
         <option value="">Select branch</option>
         <?php foreach($list_branch as $ld) { ?>
         <option  <?php if($ld->branch_id==@$adm_get_record->branch_id) { echo "selected"; } ?>
            value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
         <?php } ?>  
      </select>
   </div>
   <div class="form-group">
      <label class="lead_info_title">Session<span style="color:red">*</span></label>
      <select class="form-control" name="no_year" id="session" >
         <option value="0">Select Session</option>
         <?php for($i=2019;$i<=2030;$i++){ ?>
         <option <?php if($i==@$adm_get_record->year) { echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
         <?php } ?>
      </select>
   </div>
   <div class="form-group" id="school_college_name">
      <label class="lead_info_title">Course Category<span style="color:red">*</span></label>
      <ul>
         <li class="d-inline-block mr-3 mr-mr-0">
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" id="type_package" name="type" value="package" <?php if(@$adm_get_record->type=="package") { echo "checked"; } ?> onclick="return show_hide_package_course()" />Package
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" id="type_single" name="type"  value="single" <?php if(@$adm_get_record->type=="single") { echo "checked"; } ?> onclick="return show_hide_package_course()"/>Single
            </div>
         </li>
      </ul>
      <!-- <input type="text" name="school_college_id" id="school_college_id"> -->
   </div>
   <div class="form-group select_course_package" id="upload_select_course_package">
      <label class="lead_info_title">Select Package<span style="color:red">*</span></label>
      <select class="select2 form-control custom-form-control" name="course_or_package[]" id="course_orpackage" multiple="multiple">
         <option value="">Select Package</option>
         <?php foreach($list_package as $lp) { ?>
         <option <?php if($lp->package_id==@$adm_get_record->package_id) { echo "selected"; } ?>
            value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
         <?php } ?> 
      </select>
   </div>
   <div class="form-group select_course_single" id="upload_select_course_single">
      <label class="lead_info_title">Select Course<span style="color:red">*</span></label>
      <select class="select2 form-control custom-form-control" name="course_or_single[]" id="course_orsingle" multiple="multiple">
         <option value="">Select Course</option>
         <?php foreach($list_course as $lp) { ?>
         <option <?php if($lp->course_id==@$adm_get_record->course_id) { echo "selected"; } ?>
            value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
         <?php } ?> 
      </select>
   </div>
   <div class="form-group">
      <label class="lead_info_title">Assigned by<span style="color:red">*</span></label>                                  
      <select class="form-control" name="faculty_id" id="faculty_id">
         <option value="0">Select faculty</option>
         <?php foreach($faculty_all as $lp) { ?>
         <option <?php if($lp->faculty_id==@$adm_get_record->faculty_id) { echo "selected"; } ?>
            value="<?php echo $lp->faculty_id; ?>"><?php echo $lp->name; ?></option>
         <?php } ?>
      </select>
   </div>
   <div class="form-group">
      <label class="lead_info_title">Batch<span style="color:red">*</span></label>                                  
      <select class="form-control" name="batch_id" id="batch_id">
         <option value="0">Select Batch</option>
         <?php foreach($list_batch as $lp) { ?>
         <option <?php if($lp->batch_id==@$adm_get_record->batch_id) { echo "selected"; } ?>
            value="<?php echo $lp->batch_id; ?>"><?php echo $lp->batch_name; ?></option>
         <?php } ?>
      </select>
   </div>
</div>
<div class="new_lead_info_fill" id="first_second_right_side">
   <h6 class="lead_fill_title">Course.*</h6>
   <ul class="list-group">
      <li class="list-group-item">
         <label>Branch :</label> <?php foreach($list_branch as $ld) { ?>
         <?php if($ld->branch_id==@$adm_get_record->admission_branch) echo $ld->branch_name; ?>
         <?php } ?>
      </li>
      <li class="list-group-item">
         <label>Year :</label>  <?php echo $adm_get_record->year; ?>
      </li>
      <li class="list-group-item">
         <label>Department :</label>  <?php foreach($list_department as $ld) { ?>
         <?php if($ld->department_id==@$adm_get_record->department_id)  echo $ld->department_name;?>
         <?php } ?>
      </li>
      <li class="list-group-item">
         <label>Type :</label>  <?php echo $adm_get_record->type; ?>
      </li>
      <li class="list-group-item">
         <label>Course :</label>  <?php foreach($list_package as $lp) { ?>
         <?php if($lp->package_id==@$adm_get_record->package_id)  echo $lp->package_name; ?>
         <?php } ?> 
         <?php foreach($list_course as $lp) { ?>
         <?php if($lp->course_id==@$adm_get_record->course_id) echo $lp->course_name; ?>
         <?php } ?> 
      </li>
      <li class="list-group-item">
         <label>faculty Name :</label>  <?php foreach($faculty_all as $lp) { ?>
         <?php if($lp->faculty_id==@$adm_get_record->faculty_id) echo $lp->name; ?>
         <?php } ?>
      </li>
      <li class="list-group-item">
         <label>Batch :</label>   <?php foreach($list_batch as $lp) { ?>
         <?php if($lp->batch_id==@$adm_get_record->batch_id) echo $lp->batch_name; ?>
         <?php } ?>
      </li>
   </ul>
   <br>
   <div class="form-group">
      <div class="table-responsive">
         <table class="table table-sm text-center" id="courses">
            <thead>
               <tr class="sidetblth">
                  <th><input type="checkbox" id="CheckALL"></th>
                  <th>S_No</th>
                  <th>Course</th>
                  <th>Shining Sheet</th>
                  <th>Download</th>
               </tr>
            </thead>
            <tbody>
               <?php  $admission_courses_status = "CourseCompleted"; ?>
               <?php  $sno=1; foreach($admission_courses as $val) { ?>
               <tr class="sidetbltd">
                  <td>
                     <input type="checkbox" class="check" id="admission_courses_status"  value="<?php echo $admission_courses_status; ?>" >
                     <input type="hidden" id="admission_courses_id" value="<?php echo $val->admission_courses_id ?>">
                     <input type="hidden" id="admission_id" value="<?php echo $val->admission_id ?>">
                  </td>
                  <td><?php echo $sno; ?></td>
                  <td>
                     <?php $branch_ids = explode(",",$val->courses_id);   
                        foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo $row->course_name; }  } ?>                           
                  </td>
                  <td>
                     <i style="color:#0b527e;" class="fas fa-eye" data-toggle="modal" data-target="#exampleModals" onclick="return get_shiningsheet_record(<?php echo $val->courses_id;?>,<?php echo $val->admission_courses_id; ?>)"></i>
                  </td>
                  <!--                  
                     <td><a type="button" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#exampleModals" onclick="return get_shiningsheet_record(<?php echo $val->courses_id;?>,<?php echo $val->admission_courses_id; ?>)">
                     
                                       shiningsheet
                     
                     </a></td> -->
                  <td>
                     <i class="fas fa-download text-danger"></i>
                  </td>
               </tr>
               <?php $sno++; }?> 
            </tbody>
         </table>
      </div>
   </div>
   <div class="form-group">
      <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#course_completed">Course As Completed</button>
      <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#adm_completed">Admission As Completed</button>
   </div>
</div>
<!-- Modal Course Completed-->
<div class="modal fade" id="course_completed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document" style="top: 70px;">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>Course Completed</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <span id="admi_course">
               <div role="alert" aria-live="assertive" aria-atomic="true" class="toast bg-success text-white" data-autohide="false">
                  <div class="toast-header bg-success text-white">
                     <strong class="mr-auto">Course Completed</strong>
                     <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="toast-body">
                     <span id="course_status"></span>
                  </div>
               </div>
            </span>
            <input type="hidden" class="form-control" id="course_completed_adm_id" value="<?php echo $adm_get_record->admission_id; ?>">
            <?php  $addby =  $_SESSION['Admin']['username']; ?>
            <input type="hidden" name="addby" id="addby" value="<?php if(isset($addby)){ echo $addby; } ?>" placeholder="Assigned To" class="form-control" />
            <div class="form-group">
               <label for="datepicker">Completed Date:<span style="color:red">*</span></label>
               <input type="text" class="form-control datepicker" id="course_completed_date" >
            </div>
            <div class="form-group">
               <label for="inputEmail4">Completed</label>
               <select class="form-control" name="dropdown_adm_id" id="dropdown_adm_id" >
                  <option value="">Select</option>
                  <?php foreach($list_dropdown_adm as $ad) { ?>
                  <option  
                     value="<?php echo $ad->d_adm_id; ?>"><?php echo $ad->name; ?></option>
                  <?php } ?>       
               </select>
            </div>
            <div class="form-group">
               <label>Please enter reason for Course Completed:<span style="color:red">*</span></label>
               <textarea   class="form-control" rows="8" id="admission_remrak" placeholder="Enter Remarks"  name="admission_remrak"></textarea>
            </div>
            <div class="form-group">
               <button type="button" class="btn btn-success remark_btn" id="mark_course_as_completed">Save</button>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal Admission Completed-->
<div class="modal fade" id="adm_completed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document" style="top: 70px;">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>Admission Completed</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <span id="admission_complet">
               <div role="alert" aria-live="assertive" aria-atomic="true" class="toast bg-success text-white" data-autohide="false">
                  <div class="toast-header bg-success text-white">
                     <strong class="mr-auto">Admisssion Completed</strong>
                     <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="toast-body">
                     <span id="admission_status"></span>
                  </div>
               </div>
            </span>
            <?php  $referred =  $_SESSION['Admin']['username']; ?>
            <input type="hidden" name="referred" id="referred" value="<?php if(isset($referred)){ echo $referred; } ?>" placeholder="Assigned To" class="form-control" />
            <div class="form-group">
               <label for="datepicker">Completed Date:<span style="color:red">*</span></label>
               <input type="text" class="form-control datepickerone" id="admission_completed_date" >
            </div>
            <div class="form-group">
               <label for="inputEmail4">Completed</label>
               <select class="form-control" name="adm_dropdown_id" id="adm_dropdown_id" >
                  <option value="">Select</option>
                  <?php foreach($list_dropdown_adm as $ad) { ?>
                  <option  
                     value="<?php echo $ad->d_adm_id; ?>"><?php echo $ad->name; ?></option>
                  <?php } ?>       
               </select>
            </div>
            <div class="form-group">
               <label>Please Enter Reason For Course Completed:<span style="color:red">*</span></label>
               <textarea   class="form-control" rows="8" id="remark_admission" placeholder="Enter Remarks"  name="remark_admission"></textarea>
            </div>
            <div class="form-group">
               <button type="button" class="btn btn-success remark_btn" id="mark_admission_completed">Save</button>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $('.datepicker').datepicker({
   
      weekStart: 1,
   
       daysOfWeekHighlighted: "6,0",
   
       autoclose: true,
   
       todayHighlight: true,
   
   });
   
   
   
   $('.datepickerone').datepicker({
   
      weekStart: 1,
   
       daysOfWeekHighlighted: "6,0",
   
       autoclose: true,
   
       todayHighlight: true,
   
   });
   
   $(document).ready(function(){
   
   $(".show_upd_course").click(function(){
   
     $("#first_second_right_side").hide();
   
   });
   
   $(".show_upd_course").click(function(){
   
     $("#course_upd_data_hide").show();
   
   });
   
   });
   
</script>       
<script type="text/javascript">
   $('#course_upd_data_hide').hide();
   
   $(document).ready(function(){
   
     $('#CheckALL').click(function(){
   
         if($(this).is(":checked"))
   
         {
   
             $('.check').each(function(){
   
                 $(this).prop('checked',true);
   
             });
   
         }
   
         else
   
         {
   
             $('.check').each(function(){
   
                 $(this).prop('checked',false);
   
             });
   
         }
   
     });
   
   });
   
</script>
<script type="text/javascript">
   function get_shiningsheet_record(course_id='',admission_courses_id=''){
   
      $.ajax({
   
        url : "<?php echo base_url(); ?>AddmissionController/ajax_shiningsheet_data",
   
        type:"post",
   
        data:{
   
          'course_id':course_id , 'admission_courses_id':admission_courses_id
   
        },
   
        success:function(Resp){
   
          $('#get_shiningsheet').html(Resp);
   
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
   
   if(course_package == 'single'){
   
   $('.select_course_single').show();
   
   $('.select_course_package').hide(); 
   
   }else{
   
   
   
   $('.select_course_single').hide();
   
   $('.select_course_package').show();
   
   }
   
   
   
   }
   
</script>
<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>
<script>
   $(".select2").select2();
   
   $('.demo').each(function() {
   
   
   
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
<script type="text/javascript">
   $('#admi_course').hide();
   
   $('#mark_course_as_completed').on('click',function(){
   
   var course_completed_adm_id = $('#course_completed_adm_id').val();
   
   var addby = $('#addby').val();
   
   var course_completed_date = $('#course_completed_date').val();
   
   var dropdown_adm_id = $('#adm_dropdown_id').val();
   
   var admission_remrak = $('#admission_remrak').val();
   
   var admission_courses_status = $('#admission_courses_status').val();
   
   var admission_courses_id = $('#admission_courses_id').val();
   
   
   
   $.ajax({
   
       type : "POST",
   
       url  : "<?php echo base_url()?>AddmissionController/Course_as_completed",
   
       data : {  
   
         'course_completed_adm_id' : course_completed_adm_id,
   
         'addby' : addby,
   
         'course_completed_date' : course_completed_date,
   
         'dropdown_adm_id' : dropdown_adm_id,
   
         'admission_remrak' : admission_remrak,
   
         'admission_courses_status' : admission_courses_status,
   
         'admission_courses_id' : admission_courses_id
   
       },
   
       success: function(resp)
       {
         var data = $.parseJSON(resp);
         var ddd = data['all_record'].status;
         if(ddd == '1')
         {
             $('#admi_course').fadeIn();
             $('#course_status').html("HI! Your Course Is Now Completed.");
             $('#admi_course').fadeOut(6000);
         }
         else if(ddd == '2')
         {
           $('#admi_course').fadeIn();
             $('#course_status').html("Someting Wrong!!");
             $('#admi_course').fadeOut(6000);
         }
       }
   
   });
   
   return false;
   
   });
   
</script> 
<script type="text/javascript">
   $('#admission_complet').hide();
   
   $('#mark_admission_completed').on('click',function(){
   
   var admission_id = $('#admission_id').val();
   
   var referred = $('#referred').val();
   
   var admission_completed_date = $('#admission_completed_date').val();
   
   var adm_dropdown_id = $('#adm_dropdown_id').val();
   
   var remark_admission = $('#remark_admission').val();
   
   $.ajax({
   
     type : "POST",
   
     url  : "<?php echo base_url()?>AddmissionController/admission_completed",
   
     data : {
   
       'admission_id' : admission_id,
   
       'addby' : referred,
   
       'admission_completed_date' : admission_completed_date,
   
       'dropdown_adm_id' : adm_dropdown_id,
   
       'admission_remrak' : remark_admission
   
     },
   
     success: function(resp)
     {
         var data = $.parseJSON(resp);
         var ddd = data['all_record'].status;
         if(ddd == '1')
         {
             $('#admission_complet').fadeIn();
             $('#admission_status').html("HI! Your Admission Is Now Completed.");
             $('#admission_complet').fadeOut(6000);
         }
         else if(ddd == '2')
         {
           $('#admission_complet').fadeIn();
             $('#admission_status').html("Someting Wrong!!");
             $('#admission_complet').fadeOut(6000);
         }
     }
   
   });
   
   return false;
   
   });
   
   
   
   
   
   
   
</script> 
<!-- <script type="text/javascript">
   $('#upd_course').on('click',function(){
   
         var update_id = $('#update_id').val();
   
         var admission_branch = $('#admission_branch').val();
   
         var session = $('#session').val(); 
   
         var department_id = $('#department_id').val();
   
         var type = $('#type').val();
   
         var course_orpackage = $('#course_orpackage').val();
   
         var course_orsingle = $('#course_orsingle').val();
   
         var faculty_id = $('#faculty_id').val();
   
         var batch_id = $('#batch_id').val();
   
         
   
         $.ajax({
   
             type : "POST",
   
             url  : "<?php echo base_url()?>AddmissionController/upd_admission_cp",
   
             dataType : "JSON",
   
             data : {'update_id' : update_id ,  'admission_branch' : admission_branch , 'session' : session , 'department_id' : department_id , 'type' : type ,  'course_orpackage' : course_orpackage , 'course_orsingle' : course_orsingle , 'faculty_id' : faculty_id , 'batch_id' : batch_id },
   
             success: function(data){
   
               // $('#exampleModal').modal().hide();
   
               //$("#admission_id").val("");
   
               //$("#update_id").val("");
   
   
   
               alert('Are You Sure This Course Updated');
   
             }
   
         });
   
         return false;
   
     });
   
   </script> -->
      