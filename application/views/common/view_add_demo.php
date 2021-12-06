<link rel="stylesheet"
   href="https://demo.rnwmultimedia.com/dist/assets/bundles/owlcarousel2/dist/assets/owl.carousel.min.css">
<link rel="stylesheet"
   href="https://demo.rnwmultimedia.com/dist/assets/bundles/owlcarousel2/dist/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<style type="text/css">
   li.select2-selection__choice {
   background-color: #5864BC !important;
   }
</style>
<div id="app">
   <div class="main-wrapper main-wrapper-1">
      <div class="main-content">
         <div class="extra_lead_menu">
            <section class="section">
               <div class="section-body">
                  <div class="row">
                     <div class="col-12 d-flex flex-wrap justify-content-between">
                        <h6 class="page-title text-dark mb-3">Add Demo Students</h6>
                        <nav aria-label="breadcrumb">
                           <ol class="breadcrumb p-0">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item"><a href="#">Demo</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Add Demo Students</li>
                           </ol>
                        </nav>
                     </div>
                     <div class="col-12 mt-3">
                        <div class="card-item">
                           <div class="card card-primary">
                              <div class="card-header form-title">
                                 <h4>Add New Demo</h4>
                              </div>
                              <div class="card-body pl-3 pr-3 row pb-1 pt-2">
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>Demo Date:<span class="dmeoval" style="color: red;">*</span></label>
                                       <input type="date" class="form-control" id="demoDate" name="demoDate" value="<?php echo date("Y-m-d")?>">
                                    </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>Name:<span class="dmeoval" style="color: red;">*</span></label>
                                       <input type="text" class="form-control" placeholder="Enter Name" id="name" required>
                                    </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>Mobile No<span class="dmeoval" style="color: red;">*</span></label>
                                       <input type="text" class="form-control" placeholder="+91-00000-00000" id="mobileNo" required>
                                    </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>Branch:<span class="dmeoval" style="color: red;">*</span></label>
                                       <select name="branch_id" id="branch_id" class="form-control branch packbranch coursebranch cob hodbranch bids" >
                                          <option value="">----Select Branch----</option>
                                          <?php  $branch_id = explode(',',$_SESSION['branch_ids']);
                                             foreach($all_branches as $k=>$va){ $br_id = explode(',',$va->branch_id);
                                                if($br_id[0] != ''){
                                                   for($i=0; $i<sizeof($branch_id); $i++){
                                                      if(in_array($branch_id[$i],$br_id)){ ?>
                                          <option value="<?php echo $va->branch_id; ?>"><?php echo $va->branch_name; ?></option>
                                          <?php
                                             }
                                             }
                                             }
                                             } ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label class="d-block">Course Category:<span class="dmeoval" style="color: red;">*</span></label>
                                       <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                          <input class="form-check-input courses_type" type="radio" name="courses_type" id="exampleRadios1" value="package" onclick="show_hide_package_course_two()">
                                          <div class="state p-info">
                                             <i class="icon material-icons">done</i>
                                             <label>Package</label>
                                          </div>
                                       </div>
                                       <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                          <input class="form-check-input courses_type" type="radio" name="courses_type" id="exampleRadios2" value="single" onclick="show_hide_package_course_two()" checked>
                                          <div class="state p-info">
                                             <i class="icon material-icons">done</i>
                                             <label>Single</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 select_course_package_two">
                                    <div class="form-group">
                                       <label>Course<span class="dmeoval" style="color: red;">*</span></label>
                                       <select name="course_orsingle_two" id="course_orsingle_two" class="form-control course_or_single_two subco course_orsingle_two">
                                          <option value="">----Select Course----</option>
                                          <?php foreach($list_course as $val) { ?>
                                          <option value="<?php echo $val->course_name; ?>"><?php echo $val->course_name; ?></option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 select_course_single_two">
                                    <div class="form-group">
                                       <label>Package:<span class="dmeoval" style="color: red;">*</span></label>
                                       <select name="course_or_package_two" id="course_or_package_two" class="form-control subpa pafees">
                                          <option value="">----Select Package----</option>
                                          <?php foreach($list_package as $val) { ?>
                                          <option value="<?php echo $val->package_name; ?>"><?php echo $val->package_name; ?></option>
                                          <?php } ?> 
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>Starting Course:<span class="dmeoval" style="color: red;">*</span></label>
                                       <select class="form-control s-course" name="stating_course_id" id="stating_course_id">
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label class="d-block">Faculty Type:<span class="dmeoval" style="color: red;">*</span></label>
                                       <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                          <input class="form-check-input" type="radio" name="faculty_type" id="exampleRadios3" value="Faculty" onclick="show_hide_hod_fac()" checked>
                                          <div class="state p-info">
                                             <i class="icon material-icons">done</i>
                                             <label>Faculty</label>
                                          </div>
                                       </div>
                                       <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                          <input class="form-check-input" type="radio" name="faculty_type" id="exampleRadios4" value="Hod" onclick="show_hide_hod_fac()">
                                          <div class="state p-info">
                                             <i class="icon material-icons">done</i>
                                             <label>Hod</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 select_course_hod">
                                    <div class="form-group">
                                       <label>Assign Demo:<span class="dmeoval" style="color: red;">*</span></label>
                                       <select name="hod_id" id="hod_id" class="form-control subhod hod_fil" onchange="return selecttime_hod()">
                                          <option value="">----Select HOD----</option>
                                          <?php foreach($all_hod as $val) { ?>
                                          <option value="<?php echo $val->hod_id; ?>"><?php echo $val->name; ?></option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 select_course_faculty">
                                    <div class="form-group">
                                       <label>Assign Demo:<span class="dmeoval" style="color: red;">*</span></label>
                                       <select name="faculty_id" id="faculty_id" class="form-control subfac" onchange="return selecttime()">
                                          <option value="">----Select Faculty----</option>
                                          <?php foreach($all_user as $val) { ?>
                                          <option value="<?php echo $val->user_id; ?>"><?php echo $val->name; ?></option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>Time From:<span class="dmeoval" style="color: red;">*</span></label>
                                       <input type="text" class="form-control fromTime" id="fromTime" placeholder="--:-- --">
                                    </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>To:<span class="dmeoval" style="color: red;">*</span></label>
                                       <input type="text" class="form-control toTime" id="toTime" placeholder="--:-- --">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label>Remark</label>
                                       <textarea rows="5" class="form-control" id="remarks" name="remarks"></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="pb-3 px-3">
                                 <input class="btn btn-primary mr-1" type="submit" name="submit" id="submit_demo" value="Submit">
                                 <a href="<?php echo base_url(); ?>Common/view_add_demo" class="btn btn-light text-dark mr-1">Reset</a> 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
</div>
<!-- basic modal -->
<div class="modal fade bd-example-modal-lg" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Check Time</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="select_time">
         </div>
         <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Modal with form -->
<!-- basic modal -->
<div class="modal fade bd-example-modal-lg" id="basicModal_hod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Check Time</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="select_time_hod">
         </div>
         <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- <div class="modal fade" tabindex="-1" role="dialog" id="select_time" aria-labelledby="select_time"
   aria-hidden="true">
   <div class="modal-dialog modal-lg">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title text-dark" id="select_time">Check Time</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form>
                   <div class="table-responsive">
                       <table id="table" class="table">
                           <thead>
                               <tr>
                                   <th>Time</th>
                                   <th>Status</th>
                                   <th width="300">other Demo Student</th>
                                   <th>Note</th>
                                   <th>Select</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <td>8:00 AM To 9:00 AM</td>
                                   <td>Running</td>
                                   <td><span class="badge bg-primary text-white py-1 px-2 mb-1">Demo Date :2021-06-15 / GIM_Photoshop</span></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                               <tr>
                                   <td>9:00 AM To 10:00 AM</td>
                                   <td>Running</td>
                                   <td></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                               <tr>
                                   <td>10:00 AM To 11:00 AM</td>
                                   <td>Running</td>
                                   <td><span class="badge bg-primary text-white py-1 px-2 mb-1">Demo Date :2021-06-15 / GIM_Photoshop</span></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                               <tr>
                                   <td>11:00 AM To 12:00 PM</td>
                                   <td>Running</td>
                                   <td></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                               <tr>
                                   <td>12:00 PM To 1:00 PM</td>
                                   <td>Running</td>
                                   <td></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                               <tr>
                                   <td>1:00 PM To 2:00 PM</td>
                                   <td>Running</td>
                                   <td></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                               <tr>
                                   <td>2:00 PM To 3:00 PM</td>
                                   <td>Running</td>
                                   <td></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                               <tr>
                                   <td>3:00 PM To 4:00 PM</td>
                                   <td>Running</td>
                                   <td></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                               <tr>
                                   <td>4:00 PM To 5:00 PM</td>
                                   <td>Running</td>
                                   <td></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                               <tr>
                                   <td>5:00 PM To 6:00 PM</td>
                                   <td>Running</td>
                                   <td></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                               <tr>
                                   <td>6:00 PM To 7:00 PM</td>
                                   <td>Running</td>
                                   <td></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                               <tr>
                                   <td>7:00 PM To 8:00 PM</td>
                                   <td>Running</td>
                                   <td></td>
                                   <td></td>
                                   <td>
                                       <button type="button" class="btn btn-success btn-sm text-white">Select</button>
                                   </td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
               </form>    
           </div>
       </div>cghfgh
   </div>
   </div> -->
<!-- General JS Scripts -->
<!-- Modal with form -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
<script
   src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script
   src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script
   src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/owlcarousel2/dist/owl.carousel.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- JS Libraies -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script>
   $('#mobileNo').keyup(function(){
      var search = $(this).val();
      if(search != '')
      {
         getPrevDemo(mobileNo);
      }
      else
      {
         getPrevDemo();
      }
      });
   
   
      function getPrevDemo(mobileNo)
       {
           var mobileNo = $('#mobileNo').val();
           $.ajax({
            url:"<?php echo base_url(); ?>Common/GetPreviousDemo",
            method:"POST",
            data:{
                  'mobileNo' : mobileNo
                  },
            success:function(resp){
               var data = $.parseJSON(resp);
               console.log(data);
               var demo_id = data['select_demo'].demo_id;
               var mobileNo = data['select_demo'].mobileNo;
               $('#msg').html(iziToast.warning({
                 title: 'Success',
                 timeout: 5000,
                 message: 'Demo Already exists with ' +  mobileNo + ' And demo id is ' + demo_id,
                 position: 'topLeft'
             }));
               }
         });
       }
   
   
   $('.select_course_single_two').hide();
   function show_hide_package_course_two(){
     var courses_type = $("input[name='courses_type']:checked").val();
   //alert(courses_type);
       if(courses_type == 'single'){
       $('.select_course_single_two').hide();
       $('.select_course_package_two').show();
       $('.stating_course').show();    
       }else if (courses_type == 'package'){
       $('.select_course_single_two').show();
       $('.select_course_package_two').hide();
       $('.stating_course').show();
       }
   }
   
   $('.select_course_hod').hide();
   function show_hide_hod_fac(){
   var faculty_type = $("input[name='faculty_type']:checked").val();
   //alert(faculty_type);
       if(faculty_type == 'Hod'){
       $('.select_course_faculty').hide();
       $('.select_course_hod').show(); 
       }else if (faculty_type == 'Faculty'){
       $('.select_course_faculty').show();
       $('.select_course_hod').hide();
     }
   }
   $(document).ready(function(){
      $('#branch_id').change(function(){
      var branch_id = $('#branch_id').val();
      //alert(branch_id);
      $.ajax({
      url:"<?php echo base_url(); ?>Common/get_single_course",
      method:"POST",
      data:{
       'branch_id' : branch_id},
      success:function(data){
      $('.subco').html(data);
      }
      });
      });
      
      $('.branch').change(function(){
      var branch_id = $('.branch').val();
      // alert(department_id);
      $.ajax({
      url:"<?php echo base_url(); ?>Common/get_package_course",
      method:"POST",
      data:{
       'branch_id' : branch_id},
      success:function(data){
      $('.subpa').html(data);
      }
      });
      });
      });
      
      function setTime(time_id){
           var stime = $('#stimes'+time_id).val();
           var etime = $('#etimes'+time_id).val();
           $('.fromTime').val(stime);
           $('.toTime').val(etime);
           $('#basicModal').modal("hide");
           $('#basicModal_hod').modal("hide");
       }
      
       $(document).ready(function(){
        $('.coursebranch').change(function(){
        
        var branch_id = $('.coursebranch').val();
        // alert(department_id);
         $.ajax({
          url:"<?php echo base_url(); ?>Common/filter_branch_wise_faculty",
          method:"POST",
          data:{
            'branch_id' : branch_id},
          success:function(data){
           $('.subfac').html(data);
          }
         });
        });
      });
      
      $('#faculty_id').change(function(){
      var faculty_id = $('#faculty_id').val();
      
        $.ajax({
        url:"<?php echo base_url(); ?>Common/get_demobatch",
        method:"POST",
        data:{ 'faculty_id' : faculty_id }, 
        success:function(data){
           $('.demo-batch').html(data);
        }
        });
      });
      
      function selecttime(){
       var faculty_id = $('#faculty_id').val();
       var courseName = $('#stating_course_id').val();
       var demo_date = $('#demoDate').val();
   
       $.ajax({
           url : '<?php echo base_url(); ?>Common/checkTimefaculty',
           type:"post",
           data:{
           'faculty_id':faculty_id,
           'courseName':courseName,
           'demo_date':demo_date
           },
           success: function(data){
           $('#basicModal').modal();
           $('#select_time').html(data);
         }
      });
    }
   
        function selecttime_hod()
        {
           var hod_id = $('.hod_fil').val();
           //alert(hod_id);
           var courseName = $('.s-course').val();
           var demo_date = $('.d-date').val();
           $.ajax({
               url : '<?php echo base_url(); ?>Common/checkTimehod',
               type:"post",
               data:{
               'hod_id':hod_id,
               'courseName':courseName,
               'demo_date':demo_date
               },
               success: function(data){
                $('#basicModal_hod').modal();
                $('#select_time_hod').html(data);
               }
           });
        }
   
      $('.subco').change(function(){      
         var course_name = $('.subco').val();
         //    alert(course_name);
          $.ajax({
           url:"<?php echo base_url(); ?>Common/get_subcourse_single",
           method:"POST",
           data:{ 'course_name' : course_name }, 
           success:function(data){
             $('#stating_course_id').html(data);
           }
          });
         });
      
         $('.subpa').change(function(){
         var package_name = $('.subpa').val();
         
          $.ajax({
           url:"<?php echo base_url(); ?>Common/get_subpackage",
           method:"POST",
           data:{ 'package_name' : package_name }, 
           success:function(data){
             $('#stating_course_id').html(data);
         }
      });
   });
      
   $(document).ready(function(){
   $('.hodbranch').change(function(){
       var branch_id = $('.hodbranch').val();
       $.ajax({
       url:"<?php echo base_url(); ?>Common/filter_branch_wise_hod",
       method:"POST",
       data:{
       'branch_id' : branch_id},
       success:function(data){
           $('.subhod').html(data);
       }
      });
     });
   });
   
     $('#submit_demo').on('click', function() {
      
          var demoDate = $('#demoDate').val();
          var name = $('#name').val();
          var mobileNo = $('#mobileNo').val();
          var branch_id = $('.bids').val();
          var course_type = $("input[name='courses_type']:checked").val();
          var courseName = $('#course_orsingle_two').val();
          var packageName = $('#course_or_package_two').val();
          var startingCourse = $('#stating_course_id').val();
          var faculty_id = $('#faculty_id').val();
          var faculty_type = $("input[name='faculty_type']:checked").val();
          var hod_id = $('#hod_id').val();
          var fromTime = $('#fromTime').val();
          var toTime = $('#toTime').val();
          var remarks = $('#remarks').val();
      $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>Common/add_new_demo_edit",
      data: {
         'demoDate':demoDate,
         'name':name,
         'mobileNo':mobileNo,
         'branch_id':branch_id,
         'course_type':course_type,
         'courseName':courseName,
         'packageName':packageName,
         'startingCourse':startingCourse,     
         'faculty_id':faculty_id,
         'hod_id':hod_id,
         'faculty_type':faculty_type,
         'fromTime':fromTime,
         'toTime':toTime,
         'remarks':remarks
      },       
      success: function(resp) {
         var data = $.parseJSON(resp);
         var ddd = data['all_record'].status;
         var demo_id = data['last_demo_id'];
         //console.log(demo_id);
         if (ddd == '1') {
             $('#msg').html(iziToast.success({
                 title: 'Success',
                 timeout: 3000,
                 message: 'HI! Demo is added......',
                 position: 'topRight'
             }));
   
             $('#msg').html(iziToast.success({
                 title: 'Success',
                 timeout: 5000,
                 message: 'HI! demo Id is ---  '+ demo_id,
                 position: 'topLeft'
             }));
             setTimeout(function() {
               location.reload();
             }, 2500);
         } else if (ddd == '2') {
             $('#msg').html(iziToast.error({
                 title: 'Canceled!',
                 timeout: 2500,
                 message: 'Someting Wrong!!',
                 position: 'topRight'
             }));
            
             setTimeout(function() {
                     location.reload();
                   }, 2020);
         
         }
      }
      });
      return false;
      });
      
   
</script>
</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>