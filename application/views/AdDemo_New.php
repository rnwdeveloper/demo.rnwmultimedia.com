<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
<style type="text/css">
   .select2-container--default .select2-selection--multiple .select2-selection__choice {
   background-color: #2255a4;
   color: white;
   border: 1px solid #aaa;
   border-radius: 4px;
   cursor: default;
   float: left;
   margin-right: 5px;
   margin-top: 5px;
   padding: 0 5px;
   }
   .select2-container--default .select2-selection--multiple {
   line-height: 20px;
   }
   .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
   list-style: none;
   }
   .th{
   font-size: 12px;
   }
   .td{
   font-size: 11px;
   color: black;
   }
   .ul{
   margin-left: 260px;
   }
</style>
<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
   @$branch_ids = explode(",",$_SESSION['branch_ids']);
   
   @$depart_ids = explode(",",$_SESSION['department_id']);?>
<?php date_default_timezone_set("Asia/Calcutta");  ?>    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1><?php if(!empty($select_demo->demo_id)) { echo "Edit Demo Details"; } else { ?>ADD DEMO STUDENTS <?php } ?>
         <small>  </small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Set Time</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <?php if(!empty($msg)) { ?>
         <div class="col-md-8" >
            <?php if(!empty($exist_status)) { ?>
            <div style="padding:2px 5px 2px 5px" class="box yellow bg-red"><?php echo $msg; ?><br>
               <a class="btn btn-warning" target="_blank" href="<?php echo base_url(); ?>Enquiry/demoView/<?php echo $showid; ?>"> Show Demo Record</a>
            </div>
            <?php } else  { ?>
            <div style="padding:2px 5px 2px 5px" class="box yellow bg-green">
               <?php echo $msg; ?><br>
               <h3><?php  echo $showid; ?></h3>
            </div>
            <?php } ?>
         </div>
         <?php } ?>
         <div class="col-md-6">
            <!-- Default box -->
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title"><?php if(!empty($select_demo->demo_id)) { echo "Edit Demo Details"; } else { ?>ADD NEW DEMO <?php } ?></h3>
                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                     <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                     <i class="fa fa-times"></i></button>
                  </div>
               </div>
               <div class="box-body">
                  <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>welcome/AdDemo_New">
                     <input  type="hidden" name="update_id" value="<?php if(!empty($select_demo->demo_id)) { echo $select_demo->demo_id;  } ?>" >
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Demo Date<span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                           <input type="text" value="<?php if(!empty($select_demo->demoDate)) { echo $select_demo->demoDate;  }  ?>" class="form-control datepicker" id="date_selected" required  name="demoDate" placeholder="Select Demo Date">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name<span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" value="<?php if(!empty($select_demo->name)) { echo $select_demo->name;  } ?>" name="name" required id="inputEmail3" placeholder="Enter  Name">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" max-length="12" class="col-sm-2 control-label">MobileNo<span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                           <input type="text" value="<?php if(!empty($select_demo->mobileNo)) { echo $select_demo->mobileNo;  } ?>" class="form-control search_lead" required id="search_text" name="mobileNo">
                        </div>
                     </div>
                     <?php if($_SESSION['logtype'] == "Super Admin"){ ?>
                     <div class="form-group row">
                        <label class="col-sm-2 control-label">Branch<span style="color: red;">*</span></label>
                        <div class="col-md-10">
                           <select class="select2 form-control branch packbranch coursebranch" name="b_ids[]" id="branch_id" multiple="multiple">
                              <option>Select Branch</option>
                              <?php foreach($branch_all as $row) {  ?> 
                              <option 
                                 value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                              <?php } ?>  
                           </select>
                        </div>
                     </div>
                     <?php }else{ ?>
                     <div class="form-group row">
                        <label class="col-sm-2 control-label">Branch<span style="color: red;">*</span></label>
                        <div class="col-md-10">
                           <select class="select2 form-control bisb cob" name="b_ids[]" id="b_id" multiple="multiple">
                              <option>Select Branch</option>
                              <?php  foreach($branch_all as $row) {  ?> 
                              <option 
                                 value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <?php } ?>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                           <label class="radio-inline"><input type="radio" id="course_ids" name="coursee_type" checked value="single" onclick="return courses_or_packages()">Single</label>
                           <label class="radio-inline"><input type="radio" id="course_ids" name="coursee_type"  value="package" onclick="return courses_or_packages()">Package</label>
                        </div>
                     </div>
                     <div class="form-group row coses">
                        <label class="col-sm-2 control-label">Course<span style="color: red;">*</span></label>
                        <div class="col-md-10">
                           <select class="form-control subco cor" name="course_name[]" id="cour">
                           </select>
                        </div>
                     </div>
                     <div class="form-group row coses">
                        <label class="col-sm-2 control-label">Starting Course<span style="color: red;">*</span></label>
                        <div class="col-md-10">
                           <select class="form-control" name="stating_course_id" id="stating_course_id">
                           </select>
                        </div>
                     </div>
                     <div class="form-group pcoses">
                        <label for="inputPassword3" class="col-sm-2 control-label">Package<span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                           <select class="form-control subpa"  name="package_name" id="pack">
                           </select>
                        </div>
                     </div>
                     <div class="form-group pcoses">
                        <label for="inputPassword3" class="col-sm-2 control-label">Starting Course<span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                           <select class="form-control"  name="stating_course_id_pco" id="stating_course_id_pco">
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                           <label class="radio-inline"><input type="radio" id="hf_ids" name="f_h_type" checked value="faculty" onclick="return show_faculty()">Faculty</label>
                           <label class="radio-inline"><input type="radio" id="hf_ids" name="f_h_type"  value="hod" onclick="return show_faculty()">Hod</label>
                        </div>
                     </div>
                     <div class="form-group facul">
                        <label for="inputPassword3" class="col-sm-2 control-label">Assign Demo<span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                           <select class="form-control" required name="faculty_id" id="f_id"  onChange="selecttime()">
                              <option value="">Assign To</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group ho">
                        <label for="inputPassword3" class="col-sm-2 control-label">Assign Demo Hod<span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                           <select class="form-control"  name="hod_id" id="h_id"  onChange="selecttime()">
                              <option value="">Assign To</option>
                              <?php foreach($hod_all as $ho) { ?>
                              <option value="<?php echo $ho->hod_id; ?>"><?php echo $ho->name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Time<span style="color: red;">*</span></label>
                        <div class="input-group date">
                           <div class="input-group-addon">
                              <i>To </i>
                           </div>
                           <div class="input-group">
                              <input type="text" value="<?php if(!empty($select_demo->fromTime)) { echo $select_demo->fromTime;  } ?>" name="fromTime" id="fromTime"   class="form-control timepicker">
                           </div>
                           <div class="input-group">
                              <input type="text" value="<?php if(!empty($select_demo->toTime)) { echo $select_demo->toTime;  } ?>" name="toTime" id="toTime" class="form-control timepicker">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Remarks</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" value="<?php if(!empty($select_demo->remarks)) { echo $select_demo->remarks;  } ?>" name="remarks"  id="inputEmail3" placeholder="">
                        </div>
                     </div>
                     <div class="box-footer">
                        <a  href="<?php echo base_url(); ?>welcome/AdDemo_New" class="btn bnt-sm btn-danger">Reset</a>
                        <input type="submit" name="submit" value="save" class="btn btn-sm btn-success pull-right">
                     </div>
                     <!-- /.box-footer -->
                  </form>
               </div>
            </div>
         </div>
         <div class="col-md-2 ul record" id="redata">
            <ul class="list-group text-center">
               <li class="list-group-item"><b>Previous Record Demo</b></li>
               <li class="list-group-item">
                  <span style="color: red">
                     <div id="demo_id"></div>
                  </span>
                  <span style="color: red">
                     <div id="branch"></div>
                  </span>
                  <span style="color: red">
                     <div id="name"></div>
                  </span>
                  <span style="color: red">
                     <div id="mobileno"></div>
                  </span>
                  <span style="color: red">
                     <div id="startingCourse"></div>
                  </span>
                  <!-- <span style="color: red"><div id="faculty_demo"></div></span> -->
                  <span style="color: red">
                     <div id="demodate"></div>
                  </span>
                  <span style="color: red">
                     <div id="addedby"></div>
                  </span>
               </li>
               <li class="list-group-item"><b>Previous Record Lead</b></li>
               <li class="list-group-item">
                  <span style="color: red">
                     <div id="lead_list_id"></div>
                  </span>
                  <span style="color: red">
                     <div id="lead_branch"></div>
                  </span>
                  <span style="color: red">
                     <div id="lead_name"></div>
                  </span>
                  <span style="color: red">
                     <div id="mobile_no"></div>
                  </span>
                  <span style="color: red">
                     <div id="lead_course"></div>
                  </span>
                  <span style="color: red">
                     <div id="lead_creation_date"></div>
                  </span>
                  <span style="color: red">
                     <div id="reference_name"></div>
                  </span>
               </li>
               <li class="list-group-item"><b>Previous Record Admission</b></li>
               <li class="list-group-item">
                  <span style="color: red">
                     <div id="gr_ids"></div>
                  </span>
                  <span style="color: red">
                     <div id="enrollmentno"></div>
                  </span>
                  <span style="color: red">
                     <div id="admissionbarnch"></div>
                  </span>
                  <span style="color: red">
                     <div id="fullname"></div>
                  </span>
                  <span style="color: red">
                     <div id="admission_mobileno"></div>
                  </span>
                  <span style="color: red">
                     <div id="admission_course"></div>
                  </span>
                  <span style="color: red">
                     <div id="af"></div>
                  </span>
                  <span style="color: red">
                     <div id="admission_date"></div>
                  </span>
                  <span style="color: red">
                     <div id="admission_adby"></div>
                  </span>
               </li>
            </ul>
         </div>
      </div>
      <div class="col-md-12">
         <div class="container" id="showtime">
            <!-- Modal -->
         </div>
      </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<!-- /.content-wrapper -->
<footer class="main-footer">
   <strong>Copyright©2018 Red & White Multimedia.</strong> All rights
   reserved.
</footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- Page script -->
<script>
   $('.record').hide();
   if (document.getElementById("yellow") != null) {
   setTimeout(function() {
     document.getElementById('yellow').style.display = 'none';
   }, 5000);
   }
   
   $('.datepicker').datepicker({ 
   autoclose: true,
   todayHighlight: true,
   format:"yyyy-mm-dd"
   })
</script>
<!-- <script>
   $( function() {
   
     $( "#demodates" ).datepicker();
   
     autoclose: true
   
   } );
   
   </script> -->
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
   $(document).ready(function(){

   $('#branch_id').change(function(){
      
   var branch_id = $('#branch_id').val();
   
   // alert(department_id);
    $.ajax({
     url:"<?php echo base_url(); ?>settings/filter_branch_wise_course_single",
     method:"POST",
     data:{
       'branch_id' : branch_id},
     success:function(data)
     {
      $('#cour').html(data);
     }
    });
   });
   
   $('.branch').change(function(){

   var branch_id = $('.branch').val();
   // alert(department_id);
    $.ajax({
     url:"<?php echo base_url(); ?>settings/filter_branch_wise_package",
     method:"POST",
     data:{
       'branch_id' : branch_id},
     success:function(data)
     {
      $('#pack').html(data);
     }
    });
   });
   
   $('#b_id').change(function(){
   var branch_id = $('#b_id').val();
 
    $.ajax({
     url:"<?php echo base_url(); ?>settings/filter_branch_wise_course_single",
     method:"POST",
     data:{ 'branch_id' : branch_id },
     success:function(data)
     {
       $('#cour').html(data);
     }
    });
   });

   $('.bisb').change(function(){
   
   var branch_id = $('.bisb').val();
   
   // alert(department_id);
    $.ajax({
     url:"<?php echo base_url(); ?>settings/filter_branch_wise_package",
     method:"POST",
     data:{
       'branch_id' : branch_id},
     success:function(data)
     {
      $('#pack').html(data);
     }
    });
   });
   });
</script>
<script>
   function selecttime()
   {
       var faculty_id = $('#f_id').val();
       var courseName = $('.cour').val();
       var demo_date = $('#date_selected').val();

       if(faculty_id!="")
       {
         $.ajax({
           url : '<?php echo base_url(); ?>welcome/checkTimefaculty',
           type:"post",
           data:{
             'faculty_id':faculty_id,
             'courseName':courseName,
             'demo_date':demo_date
             },
              success: function(data)
             {
               $('#showtime').html(data);
               $('#myModal').modal("show");
             }
   
           });
       }
   }
   
   function setTime(time_id)
   {
       var stime = $('#stimes'+time_id).val();
       var etime = $('#etimes'+time_id).val();
   
       $('#fromTime').val(stime);
       $('#toTime').val(etime);
   
       $('#myModal').modal("hide");
   }
   
   function select_faculty()
   {
      var branch_id = $('#branch_id').val();
      var course = $('#courseName').val();

   if(course!="")
   {
   $.ajax({
      url:'<?php echo base_url(); ?>welcome/filter_faculty_new',
      type:"post",
      data:{
      'course_name' : course,
      'branch_id' : branch_id
      },
      success: function(data)
      {
       $('#display_faculty').html(data);
      }
   });
   }
}
   
   function select_hod(type)
   {
      var h = type;
      var branch_id = $('#branch_id').val();
      var course = $('#courseName').val();
   
      if(course!="")
      {
      $.ajax({
         url:'<?php echo base_url(); ?>welcome/filter_hod_new',
         type:"post",
         data:{
         'course_name' : course,
         'branch_id' : branch_id,
         'faculty_type':h
         },
         success: function(data)
         {
         $('#display_faculty').html(data);
         }
      });
   }
}
   
   function select_package_course()
   {
       if($("#packagec").prop("checked")) 
       {
         var packages = $('#packageName').val();
         if(packages!="")
         {
            $.ajax({
               url:'<?php echo base_url(); ?>welcome/filter_package_course_new',
               type:"post",
               data:{
               'package_name' : packages
               },
               success: function(data)
               {
               $('#pk_course').html(data);
               }
            });  
         }
       }
   }
</script>
<script>
   $(document).ready(function(){
   $('.coursebranch').change(function(){
   
   var branch_id = $('.coursebranch').val();
   // alert(department_id);
    $.ajax({
     url:"<?php echo base_url(); ?>welcome/filter_branch_wise_faculty",
     method:"POST",
     data:{
       'branch_id' : branch_id},
     success:function(data)
     {
      $('#f_id').html(data);
     }
    });
   });
   
   $('.packbranch-error').change(function(){

   var branch_id = $('.packbranch-error').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>welcome/filter_branch_wise_faculty",
     method:"POST",
     data:{
       'branch_id' : branch_id},
     success:function(data)
     {
      $('#f_id').html(data);
     }
    });
   });
   
   $('.cob').change(function(){

   var branch_id = $('.cob').val();
   // alert(department_id);
    $.ajax({
     url:"<?php echo base_url(); ?>welcome/filter_branch_wise_faculty",
     method:"POST",
     data:{
       'branch_id' : branch_id},
     success:function(data)
     {
      $('#f_id').html(data);
     }
    });
   });

   $('.packbran_ee').change(function(){
   
   var branch_id = $('.packbran_ee').val();
   // alert(department_id);
    $.ajax({
     url:"<?php echo base_url(); ?>welcome/filter_package_wise_faculty",
     method:"POST",
     data:{
       'branch_id' : branch_id},
     success:function(data)
     {
      $('#f_id').html(data);
     }
    });
   });
});
</script>
<script type="text/javascript">
   $('.ho').hide(); 
   
   function show_faculty()
   {
   var hf_ids = $("input[name='f_h_type']:checked").val();
   // alert(course_package);
   if(hf_ids == 'faculty'){
     $('.facul').show();
     $('.ho').hide(); 
   }else{
     $('.ho').show();
     $('.facul').hide();
   }
}
</script>
<script type="text/javascript">
   $('.pcoses').hide(); 
   
   function courses_or_packages()
   {
    var course_ids = $("input[name='coursee_type']:checked").val();
   // alert(course_package);
   if(course_ids == 'single'){
     $('.coses').show();
     $('.pcoses').hide(); 
   }else{
     $('.pcoses').show();
     $('.coses').hide();
   }
   }
</script>
<script>
   $(function () {
     //Initialize Select2 Elements
     $('.select2').select2()
     //Datemask dd/mm/yyyy
     $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
     //Datemask2 mm/dd/yyyy
     $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
     //Money Euro
     $('[data-mask]').inputmask()
     //Date range picker
     $('#reservation').daterangepicker()
     //Date range picker with time picker
     $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
     //Date range as a button
     $('#daterange-btn').daterangepicker(
       {
         ranges   : {
   
           'Today'       : [moment(), moment()],
           'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month'  : [moment().startOf('month'), moment().endOf('month')],
           'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
         },
         startDate: moment().subtract(29, 'days'),
         endDate  : moment()
       },
       function (start, end) {
         $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
       }
     )
     //Date picker
     $('.datepicker').datepicker({
       autoclose: true,
       todayHighlight: true,
       format:"yyyy-mm-dd"
     })
   
      $(".datepicker" ).datepicker("show");
     //iCheck for checkbox and radio inputs
     $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
       checkboxClass: 'icheckbox_minimal-blue',
       radioClass   : 'iradio_minimal-blue'
     })
     //Red color scheme for iCheck
     $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
       checkboxClass: 'icheckbox_minimal-red',
       radioClass   : 'iradio_minimal-red'
     })
     //Flat red color scheme for iCheck
     $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
       checkboxClass: 'icheckbox_flat-green',
       radioClass   : 'iradio_flat-green'
     })
     //Colorpicker
     $('.my-colorpicker1').colorpicker()
     //color picker with addon
     $('.my-colorpicker2').colorpicker()
     //Timepicker
     $('.timepicker').timepicker({
       showInputs: false,
      defaultTime: false
     })
   })
</script>
<script type="text/javascript">
   $(function () {
       $('.datetimepicker11').datetimepicker({
           daysOfWeekDisabled: [0, 6]
       });
   });
</script>
<script>
   $(document).ready(function(){
   $('#admin_id').change(function(){
    var admin_id = $('#admin_id').val();

    $.ajax({
     url:"<?php echo base_url(); ?>welcome/fetch_branch",
     method:"POST",
     data:{admin_id:admin_id},
     success:function(data)
     {
      $('#branch_id').html(data);
     }
    });
   });
});

$('.subco').change(function(){
   
   var course_id = $('.subco').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/get_subcourse",
     method:"POST",
     data:{ 'course_id' : course_id }, 
     success:function(data)
     {
       $('#stating_course_id').html(data);
     }
    });
   });

   $('.subpa').change(function(){
   
   var package_id = $('.subpa').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/get_subpackage",
     method:"POST",
     data:{ 'package_id' : package_id }, 
     success:function(data)
     {
       $('#stating_course_id_pco').html(data);
     }
    });
   });
</script>
<script>
   $(document).ready(function(){
   
    load_data();

    function load_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>welcome/previous_data_demo",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);
         console.log(data);
       $('#redata').show(data.record['demo_id']);
       var d2 = data.record['demo_id'];
       var d1 = "<b style='color: black'>Demo ID : </b>";
       var demo = d1.concat(d2);
   
       $('#demo_id').html(demo);
       var b2 = data.record['branch_name'];
       var b1 = "<b style='color: black'>Branch : </b>";
       var branch = b1.concat(b2);
   
       $('#branch').html(branch);
       var n2 = data.record['name'];
       var n1 = "<b style='color: black'>Name : </b>";
       var name = n1.concat(n2);

       $('#name').html(name);
       var mno2 = data.record['mobileNo'];
       var mno1 = "<b style='color: black'>MobileNo : </b>";
       var mobileno = mno1.concat(mno2);
   
       $('#mobileno').html(mobileno);
       var staco2 = data.record['startingCourse'];
       var staco1 = "<b style='color: black'>Course : </b>";
       var staco = staco1.concat(staco2);
   
       $('#startingCourse').html(staco);
       // var fd2 = data.record['name'];
       // var fd1 = "<b style='color: black'>Assigned To : </b>";
       // var fdemo = fd1.concat(fd2);
       // $('#faculty_demo').html(fdemo);
   
       var demodate2 = data.record['addDate'];
       var demodate1 = "<b style='color: black'>Date : </b>";
       var demodate = demodate1.concat(demodate2);

       $('#demodate').html(demodate);
       var adb2 = data.record['addBy'];
       var adb1 = "<b style='color: black'>AddBy : </b>";
       var adby = adb1.concat(adb2);
   
       $('#addedby').html(adby);
      }
     })
    }

    $('#search_text').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      load_data(search);
     }
     else
     {
      load_data();
     }
   });
});
</script>
<script>
   $(document).ready(function(){
    lead_data();
    function lead_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>welcome/previous_data_lead",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);
       $('#redata').show(data.record['lead_list_id']);
       var le2 = data.record['lead_list_id'];
       var le1 = "<b style='color: black'>Lead ID : </b>";
       var lead = le1.concat(le2);
   
       $('#lead_list_id').html(lead);
       var lb2 = data.record['branch_name'];
       var lb1 = "<b style='color: black'>Branch : </b>";
       var lb = lb1.concat(lb2);
   
       $('#lead_branch').html(lb);
       var ln2 = data.record['name'];
       var ln1 = "<b style='color: black'>Name : </b>";
       var ln = ln1.concat(ln2);
   
       $('#lead_name').html(ln);
       var lm2 = data.record['mobile_no'];
       var lm1 = "<b style='color: black'>MobileNo : </b>";
       var lm = lm1.concat(lm2);
   
       $('#mobile_no').html(lm);
       var lc2 = data.record['package_name'];
       var lc1 = "<b style='color: black'>Course : </b>";
       var lc = lc1.concat(lc2);
   
       $('#lead_course').html(lc);
       var lead_creation_date1 = data.record['lead_creation_date'];
       var lead_creation_date2 = "<b style='color: black'>Date : </b>";
       var lead_creation_date = lead_creation_date2.concat(lead_creation_date1);
   
       $('#lead_creation_date').html(lead_creation_date);
       var ref2 = data.record['reference_name'];
       var ref1 = "<b style='color: black'>Reference By : </b>";
       var ref = ref1.concat(ref2);
   
       $('#reference_name').html(ref);
      }
     })
    }

    $('.search_lead').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      lead_data(search);
     }
     else
     {
      lead_data();
     }
    });
   });
</script>
<script>
   $(document).ready(function(){
    lead_data();
    
    function lead_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>welcome/previous_data_admission",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);

       $('#redata').show(data.record['admission_id']);
       var gr2 = data.record['gr_id'];
       var gr1 = "<b style='color: black'>GR ID : </b>";
       var gr = gr1.concat(gr2);

       $('#gr_ids').html(gr);
       var enrollmentno2 = data.record['enrollment_number'];
       var enrollmentno1 = "<b style='color: black'>EnrollmentNo : </b>";
       var enrollmentno = enrollmentno1.concat(enrollmentno2);
   
       $('#enrollmentno').html(enrollmentno);
       const fullname2 = data.record['surname'] + " " + data.record['first_name'] + " " + data.record['father_name'];
       var fullname1 = "<b style='color: black'>Name : </b>";
       var fullname = fullname1.concat(fullname2);
   
       $('#fullname').html(fullname);
       var admissionbarnch1 = data.record['branch_name'];
       var admissionbarnch2 = "<b style='color: black'>Branch : </b>";
       var admissionbarnch = admissionbarnch2.concat(admissionbarnch1);
   
       $('#admissionbarnch').html(admissionbarnch);
       var admission_mobileno1 = data.record['mobile_no'];
       var admission_mobileno2 = "<b style='color: black'>MobileNo : </b>";
       var admission_mobileno = admission_mobileno2.concat(admission_mobileno1);
   
       $('#admission_mobileno').html(admission_mobileno);
       var course1 = data.record['course_name'];
       var course2 = "<b style='color: black'>Course : </b>";
       var course = course2.concat(course1);
   
       $('#admission_course').html(course);
       var af1 = data.record['name'];
       var af2 = "<b style='color: black'>Assigned To : </b>";
       var af = af2.concat(af1);
   
       $('#af').html(af);  
       var admission_date1 = data.record['admission_date'];
       var admission_date2 = "<b style='color: black'>Date : </b>";
       var admission_date = admission_date2.concat(admission_date1);
   
       $('#admission_date').html(admission_date);
       var adby1 = data.record['addby'];  
       var adby2 = "<b style='color: black'>AddBy : </b>";
       var adby = adby2.concat(adby1);
   
       $('#admission_adby').html(adby);
      }
     })
    }
   
    $('.search_lead').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      lead_data(search);
     }
     else
     {
      lead_data();
     }
   
    });
   
   });
   
</script>
</body>
</html>