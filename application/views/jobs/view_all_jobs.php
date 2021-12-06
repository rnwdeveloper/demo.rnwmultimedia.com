<?php @$branch_ids = explode(",", $_SESSION['branch_ids']); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <!-- <section class="content-header">
      <h1 class="text-center">
      
            View All Jobs
      
      </h1>
      
      <ol class="breadcrumb">
      
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      
       
      
        <li class="active">Company JOBS</li>
      
      </ol>
      
      </section> -->
   <center>
      <section class="content-header">
         <h1 class="text-center">View All Jobs</h1>
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Job Application</li>
         </ol>
         <div class="row text-uppercase d-flex all-btn justify-center " style="margin-top:20px;">
            <?php if (@$_SESSION['logtype'] == 'Manager' || @$_SESSION['logtype'] == "Super Admin") { ?>
            <a class="btn btn-warning text-white inactive-a"  href="<?php echo base_url(); ?>FormController/view_all_jobs?job_status=pending">Pending Jobs<span>(<?php echo @$pending_job; ?>)</span></a>
            <?php
} else { ?>
            <a class="btn btn-warning text-white active-a"  href="<?php echo base_url(); ?>FormController/view_all_jobs?job_status=pending">Pending Jobs (<span><?php echo @$pending_job; ?></span>)</a>  
            <?php
} ?>
            <?php if (@$_SESSION['logtype'] == 'Manager' || @$_SESSION['logtype'] == "Super Admin") { ?>
            <a class="btn btn-success text-white confirm-a" href="<?php echo base_url(); ?>FormController/view_all_jobs?job_status=active">Active JObs (<span><?php echo $active_job; ?></span>)</a> 
            <!--  <a class="btn text-white postpone-a" href="<?php echo base_url(); ?>FormController/jobApplication?status=postpone">Postponed<span><?php echo 0; ?></span></a>
               -->
            <a class="btn btn-danger text-white discart-a" href="<?php echo base_url(); ?>FormController/view_all_jobs?job_status=deactive">Deactive Jobs (<span><?php echo $deactive_job; ?></span>)</a>
            <a class="btn btn-primary text-white discart-a" href="<?php echo base_url(); ?>FormController/view_all_jobs">All Jobs (<span><?php echo $all_jobs; ?></span>)</a>
            <?php
} ?>
            <!-- <a class="btn text-white discart-a" data-toggle="modal" data-target="#myModal_discart">Discart<span><?php echo $discardRecord; ?></span></a> -->
            <!--       <a class="btn text-white profile-a" href="<?php echo base_url(); ?>FormController/profile">Profile<span></span></a>
               -->
         </div>
      </section>
   </center>
   <!-- Main content -->
   <section class="content">
      <div class="col-md-12" id="filter_section">
         <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
               <h3 class="box-title">Filter</h3>
            </div>
            <div class="row">
               <form method="post" action="<?php echo base_url(); ?>FormController/view_all_jobs">
                  <div class="col-md-2 my-2">
                     <label><b>Position For Applied</b></label>
                     <select class="form-control custom-select my-1 mr-sm-2"  name="filter_position_for_apply"  >
                        <option value="">Position For Applied</option>
                        <?php foreach ($jobtype_all as $val) { ?>                                        
                        <option  <?php if (@$filter_position_for_apply == $val->job_id) {
        echo "selected";
    } ?> value="<?php echo $val->position; ?>"><?php echo $val->position; ?></option>
                        <?php
} ?>                                        
                     </select>
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Prefer Job Location</b></label>
                     <select class="form-control custom-select my-1 mr-sm-2"  name="filter_prefer_job_location"  >
                        <option value="">Prefer Job Location</option>
                        <?php foreach ($area_all as $val) { ?>
                        <option <?php if (@$filter_prefer_job_location == $val->area_id) {
        echo "selected";
    } ?>  value="<?php echo $val->area_name; ?>"><?php echo $val->area_name; ?></option>
                        <?php
} ?>                                       
                     </select>
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Company Name</b></label>
                     <input type="text"  class="form-control" value="<?php if (!empty($filter_fname)) {
    echo $filter_fname;
} ?>"  id="" name="filter_fname" placeholder="Company Name">            
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Stating Date</b></label>
                     <input type="date" class="form-control datepicker"  name="filter_startDate" value="<?php if (!empty($filter_startDate)) {
    echo @$filter_startDate;
} ?>">      
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Ending Date</b></label>
                     <input type="date" class="form-control datepicker" name="filter_endDate" value="<?php if (!empty($filter_endDate)) {
    echo @$filter_endDate;
} ?>">           
                  </div>
                  <div class="col-sm-2 my-2" style="margin-top: 24px;">
                     <input type="submit" class="btn btn-success" value="Filter" name="filter_search"/>
                     <a class="btn btn-danger" href="<?php echo base_url(); ?>FormController/view_all_jobs">Reset</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-12" >
         <input type="button" class="btn btn-primary"  value="Filter" id="filter_section_company">
         <!-- general form elements -->
         <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <?php if (@$this->session->flashdata('msg_alert')) { ?>
            <div class="col-md-8" >
               <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $this->session->flashdata('msg_alert'); ?></div>
            </div>
            <?php
} ?>
            <div class="row">
               <div class="col-md-12">
                  <div style="margin-top:50px;">
                     <table  id="example1"  class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Job Title</th>
                              <th>Position</th>
                              <th>Salary</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Job Area</th>
                              <th>No Of Vacancy</th>
                              <th>Company Name</th>
                              <th>Company URL</th>
                              <th>Created Date</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($recruiter as $val) {
    $cncp = 1;
    $cdate = date('Y-m-d');
    $newd = $val->created_date;
    $datetime1 = date_create("$newd");
    $datetime2 = date_create("$cdate");
    // calculates the difference between DateTime objects
    $interval = date_diff($datetime1, $datetime2);
    // printing result in days format
    $days = $interval->format('%R%a');
    $days = substr($days, 1, 3);
    if ($val->job_status == 0) {
        $bgcolor = "rgba(0,166,90,0.2)";
        $color = '';
        $ank = '';
    }
    if ($val->job_status == 2) {
        $bgcolor = 'rgba(221,75,57,0.2)';
        $color = '';
        $ank = '';
    }
    if ($val->job_status == 3) {
        $bgcolor = 'rgba(221,75,57,0.2)';
        $color = '';
        $ank = '';
    }
    if ($val->job_status == 1) {
        if ($days < 3) {
            $bgcolor = "rgba(220,220,220,1)";
            $color = '';
            $ank = '';
        } else {
            $bgcolor = "rgba(243,156,18,0.2)";
            $color = '';
            $ank = '';
        }
    } ?>
                           <tr style="background-color: <?php echo @$bgcolor; ?>; color:<?php echo $color; ?>" >
                              <td><?php echo $val->job_name; ?> </td>
                              <td><?php echo $val->position; ?> (<?php echo $val->job_subcategory; ?>)</td>
                              <td><?php echo $val->salary; ?></td>
                              <td><?php echo $val->start_date; ?></td>
                              <td><?php echo $val->end_date; ?></td>
                              <td><?php echo $val->job_area; ?></td>
                              <td><?php echo $val->no_of_vacancy; ?></td>
                              <td><img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_<?php echo $cncp; ?>" onclick="return get_copy_paste(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text(<?php echo $cncp; ?>)">
                                 <a   href="javascript:all_jobs_by_company(<?php echo $val->company_id; ?>)"  data-placement="top" title="Company Name::<?php echo $val->company_name; ?>" style="font-size:18px;" id="company_name_copy_paste_<?php echo $cncp; ?>"  ><?php echo $val->company_name; ?> </a>
                                 <br> 
                                 <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_email_<?php echo $cncp; ?>" onclick="return get_copy_paste_email(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_email(<?php echo $cncp; ?>)">
                                 <span data-toggle="tooltip" data-placement="top" title="Company Email::<?php echo $val->email_id; ?>" id="company_name_copy_paste_email_<?php echo $cncp; ?>"><?php echo $val->email_id; ?></span>
                                 <br>
                                 <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_mobile_<?php echo $cncp; ?>" onclick="return get_copy_paste_mobile(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_mobile(<?php echo $cncp; ?>)">
                                 <span data-toggle="tooltip" data-placement="top" title="<?php echo $val->company_number; ?>"  id="company_name_copy_paste_mobile_<?php echo $cncp; ?>"><?php echo $val->company_number; ?></span>
                                 <a href="https://wa.me/<?php echo "91" . $val->company_number; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/whatsapp1.png" width="30"></a>
                              </td>
                              <td><a href="<?php echo $val->url; ?>" target="_blank"><?php echo $val->url; ?></a></td>
                              <td><?php echo $val->created_at; ?></td>
                              <td>
                                 <?php if ($val->job_status == '0') { ?>
                                 <a style="cursor:hand" onclick="return job_active_deactive_by_admin(<?php echo $val->jobpost_id ?>,'2',<?php echo $val->company_id; ?>);" class="btn  btn-success btn-sm" data-toggle="modal" data-target="#job_active_deactive" >Active</a>
                                 <!-- href="<?php echo base_url(); ?>FormController/active_recruiter/<?php echo $val->jobpost_id; ?>" -->
                                 <?php
    } else if ($val->job_status == '2') { ?>
                                 <a style="cursor:hand" onclick="return job_active_deactive_by_admin(<?php echo $val->jobpost_id ?>,'0',<?php echo $val->company_id; ?>);" class="btn  btn-danger btn-sm" data-toggle="modal" data-target="#job_active_deactive">DeActive</a>
                                 <!-- href="<?php echo base_url(); ?>FormController/Deactive_recruiter/<?php echo $val->jobpost_id; ?>" -->
                                 <?php
    } else if ($val->job_status == '1') { ?>
                                 <a style="cursor:hand" onclick="return job_active_deactive_by_admin(<?php echo $val->jobpost_id ?>,'0',<?php echo $val->company_id; ?>);" class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#job_active_deactive">Pending</a>
                                 <?php
    } ?>
                                 <a href="#" class="btn btn-xs btn-default text-center" data-toggle="modal" data-target="#show_modal" style="margin-bottom: 10px; padding: 5px; border-radius: 3px;" onclick="return get_job_company_detail(<?php echo $val->jobpost_id; ?>)">
                                 <i class="fa fa-eye"></i>
                                 </a>
                                 <a href="" data-toggle="modal" data-target="#job_comments_company" onclick="return get_company_query_ajax(<?php echo $val->company_id; ?>,<?php echo $val->jobpost_id; ?>,<?php echo $val->job_status; ?>)"><i class="fa fa-question-circle" style="font-size:25px;color:red"></i></a>
                                 <!--  <a href="#" class="btn btn-xs btn-default text-center" data-toggle="modal" data-target="#show_history" style="margin-bottom: 10px; padding: 5px; border-radius: 3px;" onclick="return get_job_show_history(<?php echo $val->jobpost_id; ?>)"><i class="fa fa-refresh" aria-hidden="true"></i></a> -->
                              </td>
                           </tr>
                           <?php $cncp++;
} ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->
<footer class="main-footer">
   <strong>Copyright©2018 Red & White Multimedia.</strong> All rights
   reserved.
</footer>
</div>
<!---  start show history -->
<div id="show_history" class="modal fade" role="dialog" >
   <div class="modal-dialog" style="width:1200px !important;">
      <div class="modal-content">
         <div class="modal-header">
            <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> JOB Details</h3>
         </div>
         <div class="modal-body" id="job_history_detail">
            <!-- <table class="table table-bordered table-striped">
               <thead class="btn-primary">
               
                 <tr>
               
                   <th>COMPANY NAME</th>
               
                   <th>JOB TITLE</th>
               
                   <th>POSITION</th>
               
                   <th>SALARY</th>
               
                   <th>DESCRIPTION</th>
               
                   <th>JOB AREA</th>
               
                   <th>NO OF VACANCY</th>
               
                   <th>COMPANY ADDRESS</th>
               
                   <th>STATUS</th>
               
                   <th>REGISTER DATE</th>
               
                   <th>Action</th>
               
                 </tr>
               
               </thead>
               
               <tbody>
               
                 <tr>
               
                   <td><p id="com_name"></p></td> 
               
                   <td><p id="job_title"></p></td>
               
                   <td><p id="positi"></p></td>
               
                   <td><p id="salary"></p></td>
               
                   <td><p id="description"></p></td>
               
                   <td><p id="job_area"></p></td>
               
                   <td><p id="vacancy"></p></td>
               
                   <td><p id="address"></p></td>
               
                   <td><p id="status"></p></td>
               
                   <td><p id="register_date"></p></td>
               
                
               
                 </tr>
               
               
               
               </tbody>
               
               </table> -->
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
   </div>
</div>
<!--   history of jobs end -->
<div id="show_modal" class="modal fade" role="dialog" >
   <div class="modal-dialog" style="width:1200px !important;">
      <div class="modal-content">
         <div class="modal-header">
            <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> JOB Details</h3>
         </div>
         <div class="modal-body" id="job_details">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
   </div>
</div>
<div id="job_active_deactive" class="modal fade" role="dialog" >
   <div class="modal-dialog" style="width:500px !important;">
      <div class="modal-content">
         <div class="modal-header">
            <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> JOB Deactive/Active Remarks::</h3>
         </div>
         <div class="modal-body">
            <table class="table table-bordered table-striped">
               <tbody>
                  <form method="post">
                     <input type="hidden" class="form-control" id="ad_jobpost_id" name="ad_jobpost_id">
                     <input type="hidden" class="form-control" id="ad_company_id" name="ad_company_id">
                     <input type="hidden" class="form-control" id="ad_status" name="ad_status">
                     <div class="form-group">
                        <label for="comment">Remarks:</label>
                        <textarea class="form-control" rows="5" id="ad_remarks" name="ad_remarks"></textarea>
                        <div id="error_remarks"></div>
                     </div>
                     <button type="submit" name="submit"  class="btn btn-primary" id="active_deactive_job">Active/Deactive</button>
                  </form>
               </tbody>
            </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
   </div>
</div>
<div id="job_comments_company" class="modal fade" role="dialog" >
   <div class="modal-dialog" style="width:700px !important;">
      <div class="modal-content">
         <div class="modal-header">
            <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> ::Suggestion for Jobs::</h3>
         </div>
         <div class="modal-body">
            <table class="table table-bordered table-striped">
               <tbody>
                  <form method="post">
                     <input type="hidden" class="form-control" id="job_co_id_comments" name="job_post_comments">
                     <input type="hidden" class="form-control" id="job_company_id_comments" name="company_job_post_comments">
                     <input type="hidden" class="form-control" id="ad_rema_status" name="ad_rema_status">
                     <div class="form-group">
                        <label for="comment">Remarks:</label>
                        <textarea class="form-control" rows="5" id="ad_remarks_job_comments" name="ad_remarks_job_comments"></textarea>
                        <div id="error_remarks_error"></div>
                     </div>
                     <button type="submit" name="submit"  class="btn btn-primary" id="Comments_on_jobs">Give Comments</button>
                  </form>
               </tbody>
            </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- page script -->
<script>
   $(document).ready(function(){
   
    $('#filter_section_company').click(function(){
   
          $('#filter_section').slideToggle();
   
   });
   
   });
   
   $(function () {
   
    $('#example1').DataTable()
   
    $('#example2').DataTable({
   
      'paging'      : true,
   
      'lengthChange': false,
   
      'searching'   : false,
   
      'ordering'    : true,
   
      'info'        : true,
   
      'autoWidth'   : false
   
    })
   
   })
   
   $('#filter_section').hide();
   
</script>
<script>
   function selectPlace()
   
   {
   
     var b_id = $('#branch_id').val();
   
     //alert(b_id);
   
     $.ajax({
   
       url:"<?php echo base_url(); ?>PropertyController/branchWisePlace",
   
       type:"post",
   
       data:{
   
         'branch_id':b_id
   
       },
   
       success : function(data){
   
         $('#place_box').html(data);
   
       
   
       }
   
     });
   
   
   
   
   
       
   
   }
   
   
   
   function get_job_company_detail(id){
   
     $.ajax({
   
       url : "<?php echo base_url(); ?>FormController/get_ajax_job_detail",
   
       type : "POST",
   
       data:{
   
         'jobpost_id' : id
   
       },
   
       success:function(resp){
   
         $('#job_details').html(resp);
   
       }
   
     });
   
   }
   
   
   
   function get_job_show_history(jobId)
   
   {
   
     $.ajax({
   
       url : "<?php echo base_url(); ?>FormController/get_ajax_job_show_history",
   
       type : "POST",
   
       data:{
   
         'jobpost_id' : jobId
   
       },
   
       success:function(resp){
   
         $('#job_history_detail').html(resp);
   
       }
   
     });
   
   }
   
   
   
   
   
   //session automatic  
   
     $(document).ready(function(){
   
   
   
         var submenu = sessionStorage.getItem("submenu");
   
          var leadsubmenu = sessionStorage.getItem("leadsubmenu");
   
            $('#sub_menu_'+submenu).addClass('show');
   
            $('#lead_submenu_'+leadsubmenu).addClass('show');
   
     });
   
   
   
     function getClick(id,subid){
   
       sessionStorage.setItem("submenu", id);
   
       sessionStorage.setItem("leadsubmenu", subid);
   
     }
   
   //end session of sidebar menu open 
   
   
   
   function job_active_deactive_by_admin(jobpost_id = '', deactive_value='', company_id=''){
  
   $('#ad_jobpost_id').val(jobpost_id);
   $('#ad_company_id').val(company_id);
   
   $('#ad_status').val(deactive_value);
   
   // $.ajax({
   
   //   url: "<?php echo base_url() ?>FormController/active_recruiter",
   
   //   type : "post",
   
   //   data:{
   
   //     'jobpost_id' : jobpost_id,
   
   //     'job_status' : deactive_value 
   
   //   },
   
   
   
   // });
   
   }
   
   
   
   
   
   
   
   $("#active_deactive_job").click(function(event){
   
   event.preventDefault();
   
   var remarks =  $('#ad_remarks').val();
   
   if(remarks==''){
   
     $('#error_remarks').html("<div style='color:red'>Enter Remarks</div>");
   
     return false;
   
   }
   
   else{
   
       $('#error_remarks').html("");
   
       var jobpost_id = $('#ad_jobpost_id').val();
   
       var company_id = $('#ad_company_id').val();
   
       var status = $('#ad_status').val();
   
       // alert(status);
   
       $.ajax({
   
         url: "<?php echo base_url(); ?>FormController/active_recruiter",
   
         type : "POST",
   
         data:{
   
           'jobpost_id' : jobpost_id,
   
           'company_id' : company_id,
   
           'remarks'    : remarks,
   
           'job_status' : status 
   
         },
   
         success:function(data){
   
           // console.log("success");
   
           if(data == '1'){
   
           setTimeout(function () {
   
                       window.location = "<?php echo base_url(); ?>FormController/view_all_jobs?job_status="+status;
   
                     }, 1000);
   
            }else{
   
             setTimeout(function () {
   
                       window.location = "<?php echo base_url(); ?>FormController/view_all_jobs?job_status="+status;
   
                     }, 1000);
   
            }
   
         return true;
   
         }
   
   
   
       });
   
       return true;
   
   }
   
   
   
   });
   
   
   
   
   
   
   
   
   
   
   
   
   
   $(document).ready(function(){
   
   
   
   $('[data-toggle="tooltip"]').tooltip();   
   
   });
   
   
   
   function change_copy_paste_text(ic){
   
   var copy_ppp =  "copy_paste_record_"+ic;
   
    $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'Click to Copy').tooltip('show');
   
   }
   
   
   
   function get_copy_paste(ic){
   
   // alert(ic);
   
   
   
    // $("#copy_paste_record_2").attr('data-toggle', "tooltip");
   
    // $("[title]").tooltip({ position: "top", opacity: 1 });

   var data_text  = "company_name_copy_paste_"+ic;
   var dd =  document.getElementById(data_text).textContent;
   
   var inp =document.createElement('input');
   document.body.appendChild(inp)
   inp.value =dd;
   inp.select();
   document.execCommand('copy',false);
   inp.remove();
   var copy_ppp =  "copy_paste_record_"+ic;
   var ddd =  document.getElementById(copy_ppp);
    // $("#copy_paste_record_2").prop('tooltipText', "copied");
    $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
   }
   
   function change_copy_paste_text_email(ic){
   var copy_ppp =  "copy_paste_record_email_"+ic;
    $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'Click to Copy').tooltip('show');
   }
   
   function get_copy_paste_email(ic){
   // alert(ic);
    // $("#copy_paste_record_2").attr('data-toggle', "tooltip");
    // $("[title]").tooltip({ position: "top", opacity: 1 });
   var data_text  = "company_name_copy_paste_email_"+ic;
   var dd =  document.getElementById(data_text).textContent;
   var inp =document.createElement('input');
   document.body.appendChild(inp)
   inp.value =dd;
   inp.select();
   document.execCommand('copy',false);
   inp.remove();
   var copy_ppp =  "copy_paste_record_email_"+ic;
   var ddd =  document.getElementById(copy_ppp);
    // $("#copy_paste_record_2").prop('tooltipText', "copied");
    $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
   }

   function change_copy_paste_text_mobile(ic){
   var copy_ppp =  "copy_paste_record_email_"+ic;
    $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'Click to Copy').tooltip('show');
   }
   
   function get_copy_paste_mobile(ic){
   // alert(ic);
    // $("#copy_paste_record_2").attr('data-toggle', "tooltip");
    // $("[title]").tooltip({ position: "top", opacity: 1 });
   var data_text  = "company_name_copy_paste_mobile_"+ic;
   var dd =  document.getElementById(data_text).textContent;
   var inp =document.createElement('input');
   document.body.appendChild(inp)
   inp.value =dd;
   inp.select();
   document.execCommand('copy',false);
   inp.remove();
   var copy_ppp =  "copy_paste_record_mobile_"+ic;
   var ddd =  document.getElementById(copy_ppp);
    // $("#copy_paste_record_2").prop('tooltipText', "copied");
    $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
   }
   
   function all_jobs_by_company(com_id){
   $.ajax({
     url : "<?php echo base_url() ?>FormController/view_company_wise_job",
     type :"post",
     data:{
       'company_id' : com_id
     },
     success:function(data){
         // $("#show_modal").modal('show');
         $('#get_company_detail').html(data);
     }
   });
   }
   
   function get_company_query_ajax(company_id='', job_id,job_status){
     $('#job_company_id_comments').val(job_id);
     $('#job_co_id_comments').val(company_id);
     $('#ad_rema_status').val(job_status);
   }
   

   $('#Comments_on_jobs').click(function(event){
      event.preventDefault();
       var job_id = $('#job_company_id_comments').val();
       var company_id = $('#job_co_id_comments').val();
       var reason_c = $('#ad_remarks_job_comments').val();
       var status = $('#ad_rema_status').val();
       var j_status= '';
   
       if(status == 1){
         j_status = 'pending';
       }else if(status == 0){
         j_status = 'active';
       } else if(status == 2){
         j_status = 'deactie';
       }

       $.ajax({
         url : "<?php echo base_url() ?>FormController/Any_remarks_to_comapny",
         type : "POST",
         data:{
           'jobpost_id' : job_id,
           'company_id' : company_id,
           'remarks' : reason_c
         },
         success:function(data)
         {
             if(data == '1'){
           setTimeout(function () {
                       window.location = "<?php echo base_url(); ?>FormController/view_all_jobs?job_status="+j_status;
                     }, 1000);
            }else{
             setTimeout(function () {
                       window.location = "<?php echo base_url(); ?>FormController/view_all_jobs?job_status="+j_status;
                     }, 1000);
            }
         return true;
         }
       });
   });
  
</script>
</body>
</html>