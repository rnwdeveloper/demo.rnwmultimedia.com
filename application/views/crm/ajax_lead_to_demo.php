<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<div id="msg"></div>
<div class="row">
   <div class="col-md-12">
      <div class="col-xl-12 col-lg-12">
         <div class="form-group">
            <label for="FirstName">Demo Date<span style="color:red;">*</span></label>
            <?php date_default_timezone_set("Asia/Calcutta"); $today = date('Y-m-d'); ?>
            <input type="date" class="form-control date_selected" id="demoDate" value="<?php echo $today;  ?>" name="demoDate">
            <input type="hidden" class="form-control lead_list_id" value="<?php echo $single_record->lead_list_id; ?>">
         </div>
      </div>
      <div class="col-xl-12 col-lg-12">
         <div class="form-group">
            <label>Name<span style="color:red;">*</span></label>
            <input type="text" class="form-control full-name" id="name" name="name" value="<?php echo $single_record->name; ?>" placeholder="Name">
         </div>
      </div>
      <div class="col-xl-12 col-lg-12">
         <div class="form-group">
            <label>Mobile<span style="color:red;">*</span></label>
            <input type="tel" class="form-control" id="mobileNo" name="mobileNo" value="<?php echo $single_record->mobile_no; ?>" placeholder="Mobile">
         </div>
      </div>
      <div class="col-xl-12 col-lg-12">
         <div class="form-group">
            <label>Branch<span style="color:red;">*</span></label>
            <select class="form-control branch_two b_facid b_hod b-name" id="branch_id_two" name="branch">
               <option value=''>Select Branch</option>
               <?php $branch_ids = explode(",",$single_record->branch_id);   
                  foreach($list_branch as $row) {  ?> 
                  <option <?php if(in_array($row->branch_id,$branch_ids)) { echo "selected"; } ?>
                  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                  <?php } ?>   
            </select>
         </div>
      </div>
      <div class="col-lg-12">
      <div class="form-group">
      <label class="d-block">Type</label>
      <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
      <input class="form-check-input" type="radio" name="courses_type" id="exampleRadios3" <?php if(@$single_record->course_package=="package") { echo "checked"; } ?> value="package" onclick="return show_hide_package_course_two()">
         <div class="state p-info">
            <i class="icon material-icons">done</i>
            <label>Package</label>
         </div>
      </div>
      <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
      <input class="form-check-input" type="radio" name="courses_type" id="exampleRadios4" <?php if(@$single_record->course_package=="single") { echo "checked"; } ?> value="single" onclick="return show_hide_package_course_two()">
         <div class="state p-info">
            <i class="icon material-icons">done</i>
            <label>Single</label>
         </div>
      </div> 
         </div>
   </div>
   <?php if(@$single_record->course_package=="single") {  ?>
      <div class="col-lg-12 select_course_single_two"> 
   <div class="form-group">
      <label>Course<span style="color:red;">*</span></label>
     <select class="form-control course_or_single subco s-course" name="course_orsingle_two" id="course_orsingle_two">
     <option value="">Select Course</option>
     <?php $courseids = explode(",",$single_record->course_or_package);   
         foreach($list_course as $row) {  ?> 
         <option <?php if(in_array($row->course_id,$courseids)) { echo "selected"; } ?>
         value="<?php echo $row->course_id; ?>"><?php echo $row->course_name; ?></option>
         <?php } ?>   
      </select>
   </div>
   </div>
   <div class="col-lg-12 select_course_single_two"> 
      <div class="form-group">
         <label>Starting Course<span style="color:red;">*</span></label>
      <select class="form-control scourse" name="stating_course_id_two" id="stating_course_id_two">
         <option value="">Select Course</option>
         </select>
      </div>
   </div>
   <?php } else { ?>
      <div class="col-lg-12 select_course_package_two">
   <div class="form-group">
      <label>package<span style="color:red;">*</span></label>
      <select class="form-control subpa p-course" name="course_or_package_two" id="course_or_package_two">
      <option value="">Select package</option>
      <?php $packageids = explode(",",$single_record->course_or_package);   
         foreach($list_package as $row) {  ?> 
         <option <?php if(in_array($row->package_id,$packageids)) { echo "selected"; } ?>
         value="<?php echo $row->package_id; ?>"><?php echo $row->package_name; ?></option>
         <?php } ?>   
      </select>
   </div>
   </div>
   <div class="col-lg-12 select_course_package_two"> 
      <div class="form-group">
         <label>Starting Course<span style="color:red;">*</span></label>
      <select class="form-control pcourse" name="stating_course_id_pco" id="stating_course_id_pco">
         <option value="">Select Course</option>
         </select>
      </div>
      </div>
   
      <?php } ?>
      <div class="col-lg-12">
      <div class="form-group">
      <label class="d-block">Designation</label>
      <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
      <input class="form-check-input" type="radio" name="designation" id="exampleRadios5" value="Faculty" onclick="return get_designations()" checked>
         <div class="state p-info">
            <i class="icon material-icons">done</i>
            <label>Faculty</label>
         </div>
      </div>
      <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
      <input class="form-check-input" type="radio" name="designation" id="exampleRadios7" value="Hod" onclick="return get_designations()">
         <div class="state p-info">
            <i class="icon material-icons">done</i>
            <label>Hod</label>
         </div>
      </div> 
         </div>
   </div>
   <div class="col-lg-12 slelect_faculty"> 
      <div class="form-group">
         <label>Faculty<span style="color:red;">*</span></label>
      <select class="form-control f-name fb-name fname" name="faculty_name" id="faculty_name" onChange="selecttimefaculty()">
         <option value="">Select Faculty</option> 
         <?php $uids = explode(",",$single_record->branch_id);   
         foreach($list_user as $row) { if($row->logtype=="Faculty" && $single_record->branch_id==$row->branch_ids) {  ?> 
         <option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
         <?php } } ?>    
         </select>
      </div>
   </div>
   <div class="col-lg-12 select_hod"> 
      <div class="form-group">
         <label>Hod<span style="color:red;">*</span></label>
      <select class="form-control h-name hname" name="hod_name" id="hod_name" onChange="selecttimehod()">
         <option value="">Select Hod</option>
         <?php $uids = explode(",",$single_record->branch_id);   
         foreach($list_user as $row) { if($row->logtype=="HOD" && $single_record->branch_id==$row->branch_ids) {  ?> 
         <option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
         <?php } } ?>   
         </select>
      </div>
      </div>
      <div class="col-lg-12"> 
      <div class="form-group">
         <label>Batch<span style="color:red;">*</span></label>
      <select class="form-control demo-batch dbatch" name="demo_batch" id="demo_batch">
         <option value="">Select Batch</option>
         </select>
      </div>
   </div>
      <div class="col-lg-12">
      <div class="form-group">
         <label for="inputPassword3" class="col-sm-2 control-label">Time<span style="color: red;">*</span></label>
         <div class="input-group">
            <div class="input-group">
               <input type="text" value="" name="fromTime" id="fromTime" class="form-control from-time">
            </div>
            <div class="input-group">
               <input type="text" value="" name="toTime" id="toTime" class="form-control to-time">
            </div>
         </div>
      </div>   
      </div>
      <div class="col-lg-12"> 
      <div class="form-group">
         <label>Remarks<span style="color:red;">*</span></label>
           <textarea type="text" class="form-control remark" name="remarks" id="remarks"></textarea>       
      </div>
      <div class="col-md-12">
         <div class="form-fix-bottom">
            <div class="btn-group mb-3 float-right" role="group" aria-label="Basic example">
               <a href="<?php echo base_url(); ?>LeadlistController/crm_list" class="btn btn-danger text-white" >RESET</a>
               <button type="button" class="btn btn-success" id="add_lead_demo">Submit</button>
            </div>
         </div>
      </div>
   </div>
</div>
</div>

<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script>
$('#add_lead_demo').on('click', function() {

var lead_list_id = $('.lead_list_id').val();
var demoDate = $('#demoDate').val();
var name = $('.full-name').val();
var mobileNo = $('#mobileNo').val();
var branch_id = $('.b-name').val();
var course_type = $('input[name="courses_type"]:checked').val();
var packageName = $('.p-course').val();
var courseName = $('.s-course').val();   
var scourse = $('.scourse').val();   
var pcourse = $('.pcourse').val();
var faculty_type = $('input[name="designation"]:checked').val();
var faculty_id = $('.fname').val();
var hod_id = $('.h-name').val();
var demo_batch = $('.dbatch').val();
var fromTime = $('.from-time').val();
var toTime = $('.to-time').val();
var remarks = $('.remark').val();
$.ajax({
type: "POST",
url: "<?php echo base_url() ?>Common/add_leadTodemo",
data: {
   'lead_list_id': lead_list_id,
   'demoDate': demoDate,
   'name': name,
   'mobileNo': mobileNo,
   'branch_id': branch_id,
   'course_type': course_type,
   'packageName': packageName,
   'courseName': courseName,
   'scourse' :scourse,
   'pcourse' : pcourse,
   'faculty_type' : faculty_type,
   'faculty_id' : faculty_id,
   'hod_id' : hod_id,
   'demo_batch' :demo_batch,
   'fromTime' :fromTime,
   'toTime' :toTime,
   'remarks' :remarks
},       
success: function(resp) {
   var data = $.parseJSON(resp);
   var ddd = data['all_record'].status;

   if (ddd == '1') {
      $('#msg').html(iziToast.success({
            title: 'Success',
            timeout: 2500,
            message: 'HI! Successfully Allocated To Demo.',
            position: 'topRight'
      }));
   }
   else if (ddd == '2') {
      $('#msg').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2500,
            message: 'Someting Wrong!!',
            position: 'topRight'
      }));
      }
    }
  });
});

$('.branch_two').change(function(){
var branch_id = $('.branch_two').val();

   $.ajax({
   url:"<?php echo base_url(); ?>LeadlistController/fetch_package_course",
   method:"POST",
   data:{branch_id:branch_id},
   success:function(data)
   {
   $('#course_or_package_two').html(data);
   }
   });
});

$('#branch_id_two').change(function(){

var branch_id = $('#branch_id_two').val();

   $.ajax({
   url:"<?php echo base_url(); ?>LeadlistController/fetch_single_course",
   method:"POST",
   data:{branch_id:branch_id},
   success:function(data)
   {
   $('#course_orsingle_two').html(data);
   }
   });
});

$('.b_facid').change(function(){

var branch_id = $('.b_facid').val();

   $.ajax({
   url:"<?php echo base_url(); ?>LeadlistController/get_faculty_branchwise",
   method:"POST",
   data:{branch_id:branch_id},
   success:function(data)
   {
   $('#faculty_name').html(data);
   }
   });
}); 

$('.b_hod').change(function(){

var branch_id = $('.b_hod').val();

   $.ajax({
   url:"<?php echo base_url(); ?>LeadlistController/get_hod_branchwise",
   method:"POST",
   data:{branch_id:branch_id},
   success:function(data)
   {
   $('#hod_name').html(data);
   }
   });
}); 


$('.subco').change(function(){
var course_id = $('.subco').val();

   $.ajax({
   url:"<?php echo base_url(); ?>LeadlistController/get_subcourse",
   method:"POST",
   data:{ 'course_id' : course_id }, 
   success:function(data)
   {
      $('#stating_course_id_two').html(data);
   }
   });
});

$('.subpa').change(function(){
var package_id = $('.subpa').val();

   $.ajax({
   url:"<?php echo base_url(); ?>LeadlistController/get_subpackage",
   method:"POST",
   data:{ 'package_id' : package_id }, 
   success:function(data)
   {
      $('#stating_course_id_pco').html(data);
   }
   });
});

$('.fb-name').change(function(){
var faculty_id = $('.fb-name').val();

   $.ajax({
   url:"<?php echo base_url(); ?>LeadlistController/get_demobatch",
   method:"POST",
   data:{ 'faculty_id' : faculty_id }, 
   success:function(data){
      $('.demo-batch').html(data);
   }
   });
});

//$('.select_course_package_two').hide();
function show_hide_package_course_two(){
var courses_type = $("input[name='courses_type']:checked").val();
//alert(course_package);
if(courses_type == 'single'){
   $('.select_course_single_two').show();
   $('.select_course_package_two').hide();	
}else{
   $('.select_course_single_two').hide();
   $('.select_course_package_two').show();
}
}


$('.select_hod').hide();
function get_designations(){
var designation = $("input[name='designation']:checked").val();
//alert(course_package);
if(designation == 'Faculty'){
   $('.slelect_faculty').show();
   $('.select_hod').hide();	
}else{
   $('.slelect_faculty').hide();
   $('.select_hod').show();
}
}

 function selecttimehod(){
   var faculty_id = $('.hname').val();
   var courseName = $('.course_or_single').val();
   var demo_date = $('.date_selected').val();

   if(faculty_id!=""){
   $.ajax({
      url : '<?php echo base_url(); ?>LeadlistController/checkTimefaculty',
      type:"post",
      data:{
         'faculty_id':faculty_id,
         'courseName':courseName,
         'demo_date':demo_date
         },
      success: function(data){
      $('.showtime').html(data);
      $('.facultytime').modal("show");
      }
   });
  }
}

function selecttimefaculty(){
   var faculty_id = $('.f-name').val();
   var courseName = $('.course_or_single').val();
   var demo_date = $('.date_selected').val();

   if(faculty_id!=""){
   $.ajax({
      url : '<?php echo base_url(); ?>LeadlistController/checkTimefaculty',
      type:"post",
      data:{
         'faculty_id':faculty_id,
         'courseName':courseName,
         'demo_date':demo_date
         },
      success: function(data){
      $('.showtime').html(data);
      $('.facultytime').modal("show");
      }
   });
  }
}

function setTime(time_id) {
       var stime = $('#stimes'+time_id).val();
       var etime = $('#etimes'+time_id).val();
   
       $('#fromTime').val(stime);
       $('#toTime').val(etime);
   
       $('.facultytime').modal("hide");
   }
</script>