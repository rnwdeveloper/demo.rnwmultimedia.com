    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div class="main-content">
	
    <div class="row">
         <div class="col-12 d-flex justify-content-between">
             <h6 class="page-title text-dark mb-3">Job Apply Application</h6>
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb p-0">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Library</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Data</li>
                 </ol>
             </nav>
         </div>
     </div>
     <div id="msg"></div>
      <div class="extra_lead_menu">
        <div class="extra_top-menu d-flex justify-content-between">
            <ul class="pl-0">     
                <li>
                    <a href="<?php echo base_url(); ?>JobController/lms_all_jobs" class="btn btn-primary ">
                    All<span class="badge badge-transparent"><?php echo $all_jobs; ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>JobController/lms_all_jobs?job_status=active" class="btn btn-success ">
                    Active<span class="badge badge-transparent"><?php echo $active_job; ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>JobController/lms_all_jobs?job_status=pending" class="btn btn-hold ">
                    Pending<span class="badge badge-transparent"><?php echo @$pending_job; ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>JobController/lms_all_jobs?job_status=deactive" class="btn btn-red ">
                    Deactive<span class="badge badge-transparent"><?php echo @$deactive_job; ?></span>
                    </a>
                </li>
                       
            </ul>
            <ul style="padding-left:0;">
            <li class="float-right ml-2"><a href="" class="btn btn-info" data-toggle="modal" data-target=".filter-income"><span data-toggle="tooltip" data-placement="bottom" title="Export Data"><i class="fas fa-filter mr-1 text-white"></i></sapn></a></li>
                <li class="float-right"><a href="javascript:" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg" id="btnExporttoExcel"><span data-toggle="tooltip" data-placement="bottom" title="Filter"><i class="far fa-file-excel text-white"></i></span></a></li>
            </ul>
        </div>
    </div>
    <div class="card mt-4">
    <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped overdue-table " id="JobTable">
                        <thead>
                          <tr>
                          <th>Sno</th>
                          <th width="90px;">Job Title</th>
                          <th>Position</th>
                          <th>Salary</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Job Area</th>
                          <th>No Of Vacancy</th>
                          <th>Company Name</th>
                          <th>Company URL</th>
                          <th>Created Date</th>
                          <th>status</th>
                          <th>Options</th>
                          <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $cncp = 1; $sno=1; foreach($recruiter as $val) { ?>  
                          <?php  if($val->job_status=="1"){ ?>
                              <?php  $eclass = "<span class='badge badge-warning'>Pending</span>";  } else if($val->job_status == "0") { ?>
                              <?php $eclass = "<span class='badge badge-success'>Active</span>"; } else if($val->job_status=="2") {?>
                              <?php $eclass = "<span class='badge badge-danger'>Deactive</span>" ; } ?>
                            <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $val->job_name; ?> </td>
                            <td><?php echo $val->position;  ?> (<?php echo $val->job_subcategory; ?>)</td>
                            <td><?php echo $val->salary;  ?></td>
                            <td><?php echo $val->start_date;  ?></td>
                            <td><?php echo $val->end_date;  ?></td>
                            <td><?php echo $val->job_area;  ?></td>
                            <td><?php echo $val->no_of_vacancy;  ?></td>
                            <td><img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_<?php echo $cncp; ?>" onclick="return get_copy_paste(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text(<?php echo $cncp; ?>)">
                                <a href="javascript:all_jobs_by_company(<?php echo $val->company_id; ?>)"  data-placement="top" title="Company Name::<?php echo $val->company_name; ?>" style="font-size:18px;" id="company_name_copy_paste_<?php echo $cncp; ?>"  ><?php echo $val->company_name;?> </a><br> 
                                <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_email_<?php echo $cncp; ?>" onclick="return get_copy_paste_email(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_email(<?php echo $cncp; ?>)">
                                <span data-toggle="tooltip" data-placement="top" title="Company Email::<?php echo $val->email_id; ?>" id="company_name_copy_paste_email_<?php echo $cncp; ?>"><?php echo $val->email_id;?></span><br>
                                <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_mobile_<?php echo $cncp; ?>" onclick="return get_copy_paste_mobile(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_mobile(<?php echo $cncp; ?>)">
                                <span data-toggle="tooltip" data-placement="top" title="<?php echo $val->company_number; ?>"  id="company_name_copy_paste_mobile_<?php echo $cncp; ?>"><?php echo $val->company_number;  ?></span>
                                <a href="https://wa.me/<?php echo "91".$val->company_number; ?>" target="_blank"><img src="<?php echo base_url();?>assets/images/whatsapp1.png" width="30"></a></td>
                            </td>
                            <td><a href="<?php echo $val->url; ?>" target="_blank"><?php echo $val->url;  ?></a></td>
                            <td><?php echo $val->created_at;  ?></td>              
                            <td>
                               <?php echo $eclass; ?>
                            </td>
                            <td>
                            <a href="#" data-toggle="modal" data-target="#remark_modal" class="bg-info action-icon text-white btn-primary" onclick="return get_job_company_remark(<?php echo $val->jobpost_id; ?>)" ><span data-toggle="tooltip" data-placement="top" title="View Remark"  ><i class="far fa-comment-alt"></i></span></a>
                             <a href="#" data-toggle="modal" data-target="#show_modal" class="bg-primary action-icon text-white btn-primary" onclick="return get_job_company_detail(<?php echo $val->jobpost_id; ?>)" ><span data-toggle="tooltip" data-placement="top" title="View Company"  ><i class="fas fa-eye"></i></span></a>                             
                            <!-- <a href="#" data-toggle="modal" data-target="#applicant-remarks" class="bg-primary action-icon text-white btn-primary" onclick="return get_company_query_ajax(<?php echo $val->company_id; ?>,<?php echo $val->jobpost_id; ?>,<?php echo $val->job_status; ?>)"><span data-toggle="tooltip" data-placement="top" title="Add remark"  ><i class="fa fa-question-circle"></i></span></a> -->
                            </td>
                            <td>
                            <div class="dropdown">
                                  <a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle text-white">Status</a>
                                  <div class="dropdown-menu ">
                                  <?php $xx = $val->company_id; ?>
                                  <a href="#" data-toggle="modal" data-target="#Status-remarks" class="dropdown-item has-icon text-info" onclick="return job_active_deactive_by_admin(<?php echo $val->jobpost_id?>,'1',<?php echo $val->company_id; ?>);" >
                                      Pending
                                  </a>
                                  <a href="#" data-toggle="modal" data-target="#Status-remarks" class="dropdown-item has-icon  text-success" onclick="return job_active_deactive_by_admin(<?php echo $val->jobpost_id?>,'0',<?php echo $val->company_id; ?>);"  >
                                      Active
                                  </a>
                                  <a href="#" data-toggle="modal" data-target="#Status-remarks" class="dropdown-item has-icon text-warning" onclick="return job_active_deactive_by_admin(<?php echo $val->jobpost_id?>,'2',<?php echo $val->company_id; ?>);" >
                                    Deactive
                                  </a>
                                  <?php  ?>
                              </div>
                            </td>
                            </tr>
                        <?php $sno++; $cncp++; }?>                    
                        </tbody>
                      </table>
                    </div>
                  </div>
    </div>
</div>


<!-- Large modal -->
<div class="modal fade filter-income" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myLargeModalLabel">Search</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url();?>JobController/lms_all_jobs?job_status=<?php echo $this->input->get('job_status'); ?>" id="filter_job">
         <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputEmail4">Position applied for</label>
            <select class="form-control custom-select my-1 mr-sm-2"  name="filter_position_for_apply"  >
              <option value="">Position For Applied</option>
                <?php foreach($jobtype_all as $val) { ?>                                        
               <option  <?php if(@$filter_position_for_apply==$val->job_id) { echo "selected"; } ?> value="<?php echo $val->position; ?>"><?php echo $val->position; ?></option>
                <?php } ?>                                        
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="inputPassword4">Prefer job location</label>
            <select class="form-control custom-select my-1 mr-sm-2"  name="filter_prefer_job_location"  >
              <option value="">Prefer Job Location</option>
              <?php foreach($area_all as $val) { ?>
             <option <?php if(@$filter_prefer_job_location==$val->area_id) { echo "selected"; } ?>  value="<?php echo $val->area_name; ?>"><?php echo $val->area_name; ?></option>
              <?php } ?>                                       
            </select>
          </div>
           <div class="form-group col-md-3">
            <label for="inputPassword4">Company name</label>
            <input type="text" class="form-control" id="filter_fname"  name="filter_fname" value="<?php if(!empty($filter_fname)) { echo $filter_fname; } ?>" placeholder="Company name">
          </div>
          <div class="form-group col-md-3">
            <label for="inputPassword4">Starting Date</label>
            <input type="date" class="form-control" id="filter_startDate" name="filter_startDate" value="<?php if(!empty($filter_startDate)) { echo @$filter_startDate; } ?>" placeholder="Surname">
          </div>
           <div class="form-group col-md-3">
            <label for="inputPassword4">Ending Date</label>
            <input type="date" class="form-control" id="filter_endDate" name="filter_endDate" value="<?php if(!empty($filter_endDate)) { echo @$filter_endDate; } ?>" placeholder="Email">
          </div>
        </div>
         <div class="text-right">
          <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
          <input type="submit" class="btn btn-primary" value="Filter" name="filter_search">
          <a class="btn btn-light text-dark" onclick="resetForm()">Reset</a>  
        </div>
        </form>
        </div>
      </div>
    </div>
</div>


<!-- Large modal -->
<div class="modal fade whastapp-message" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Send Whastapp Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <form method="post" action="">
         <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputState">Select Template</label>
            <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
              <option value="">Select Barnch</option>
              <option  value="1">RW1 Web Technology</option>
              <option  value="3">RW4</option>
              <option  value="5">RW2</option>
              <option  value="8">RW3</option>
              <option  value="9">RW1B</option>
              <option  value="10">RW1 MM</option>
              <option  value="11">COLLEGE</option>
            </select>
          </div>  
          <div class="form-group col-md-12">
            <label for="inputEmail4">Template</label>
            <textarea type="text" class="form-control" id="" name="filter_fname" value=""  rows="7"></textarea>
          </div> 
        </div>
         <div class="text-right">
          <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
          <input type="submit" class="btn btn-primary" value="Filter" name="filter_income_fees">
          <a class="btn btn-light text-dark" href="https://demo.rnwmultimedia.com/Account/income">Reset</a>  
        </div>
        </form>
        </div>
      </div>
    </div>
</div>

 <!-- basic modal -->
 <!-- basic compony details -->
<div class="modal fade" id="com_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg  " role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalLabel" > Company job Posts</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body get_company_detail">
                       
         
         </div>
      </div>
   </div>
</div>
<!--end company detakls table -->
<div class="modal fade show_modal" id="show_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalLabel" > Company Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body job_details">
                       
         
         </div>
      </div>
   </div>
</div>
 <!-- company job detail-->
 <!-- company remark for jobs -->
 <div class="modal fade " id="remark_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalLabel" > Job Remarks</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body job_remark">
                       
         
         </div>
      </div>
   </div>
</div>
 <!-- end remarks modek-->
<!-- 
<div class="modal fade" id="applicant-remarks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel" >Suggetions for jobs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
          <input type="hidden" class="form-control" id="job_co_id_comments" name="job_post_comments">
            <input type="hidden" class="form-control" id="job_company_id_comments" name="company_job_post_comments">
            <input type="hidden" class="form-control" id="ad_rema_status" name="ad_rema_status">
            <label>Add Remark</label> 
            <textarea rows="5" class="form-control" id="remarks" name="remarks"></textarea>
          </div>
          <button type="submit" name="submit"  class="btn btn-primary" id="Comments_on_jobs">Give Comments</button>
      </div>
      </div> 
    </div>
  </div>
</div> -->

<!--active -deactive remark modek-->
<div class="modal fade" id="Status-remarks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel" >Suggetions for jobs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
          <input type="hidden" class="form-control" id="ad_jobpost_id" name="ad_jobpost_id">
            <input type="hidden" class="form-control" id="ad_company_id" name="ad_company_id">
            <input type="hidden" class="form-control" id="ad_status" name="ad_status">
            <div id="error_remarks"></div>
            <label>Add Remark</label> 
            <textarea rows="5" class="form-control" id="remarks" name="remarks"></textarea>
          </div>
          <button type="submit" name="submit"  class="btn btn-primary" id="Comments_on_jobs">Give Comments</button>
      </div>
      </div> 
    </div>
  </div>
</div>
<!-- end active deactive model-->

<div class="modal fade" id="joining-letter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel" >Upload Joining Letter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <div class="form-group">
              <label>Upload Joining Letter:</label> 
              <input type="file" class="mt-2" name=" "> 
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Confirmation Date:</label> 
            <input type="date" class="mt-2 form-control" name=" "> 
          </div>
      </div>
      <div class="col-md-12">
          <div class="form-group">
            <label>Add Remark</label> 
            <textarea rows="5" class="form-control" id="" name=""></textarea>
          </div>
      </div>
      </div> 
    </div>
  </div>
</div>

 <!-- General JS Scripts -->
 <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>  
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/js/table2excel.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/sweetalert/sweetalert.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/sweetalert.js"></script>
  <!-- JS Libraies -->
  <script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script> 
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script> 
<!-- Page Specific JS File -->
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
  <!-- JS Libraies --> 
  <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
 
  <script type="text/javascript">    

function resetForm() {
  document.getElementById("filter_job").reset();
}
            $(function () {    
                $("#btnExporttoExcel").click(function () {    
                    $("#JobTable").table2excel({    
                        filename: "Job Apply Application.xls"    
                    });    
                });    
            }); 



    //           $(function() {
    //     $('#table-1').DataTable({
    //         stateSave: true,
    //         "bDestroy": true
    //     })
    // })   
    </script>
<script>
  

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

</script>
<script>
  function all_jobs_by_company(company_id){

$.ajax({
  url : "<?php echo base_url() ?>JobController/view_company_wise_job",
  type :"post",
  data:{
    'company_id' : company_id
  },
  success:function(data){
       $("#com_detail").modal('show');
      $('.get_company_detail').html(data);
  }
});
}

 
  </script>
  <script>
  

    
  // function get_company_detail_ajax(company_id){
  //   $.ajax({
  //     url : "<?php echo base_url(); ?>JobController/get_ajax_job_detail",
  //     type : "POST",
  //     data:{
  //       'jobpost_id' : company_id
  //     },
  //     success:function(resp){
  //       $('.show_detail').model();
  //       //$('#job_details').html(resp);
  //     }
  //   });
  // }




  function get_job_company_detail(id){
    $.ajax({
      url : "<?php echo base_url(); ?>JobController/get_ajax_job_detail",
      type : "POST",
      data:{
        'jobpost_id' : id
      },
      success:function(resp){
        $('.job_details').html(resp);
      }
    });
  }

  function get_job_company_remark(id){
    $.ajax({
      url : "<?php echo base_url(); ?>JobController/get_ajax_job_remark",
      type : "POST",
      data:{
        'jobpost_id' : id
      },
      success:function(resp){
        $('.job_remark').html(resp);
      }
    });
  }

  function get_company_query_ajax(company_id='', job_id,job_status){
    $('#job_company_id_comments').val(job_id);
    $('#job_co_id_comments').val(company_id);
    $('#ad_rema_status').val(job_status);
  }

    </script>

    <script>
      function job_active_deactive_by_admin(jobpost_id, deactive_value, company_id){

      $('#ad_jobpost_id').val(jobpost_id);
      $('#ad_company_id').val(company_id);
      $('#ad_status').val(deactive_value);
      }
      </script>
      <script>
        $('#Comments_on_jobs').on('click', function() {

          var remarks =  $('#remarks').val();
        if(remarks==''){
          $('#error_remarks').html("<div style='color:red'>Enter Remarks</div>");
          return false;
        }
        else{
        var jobpost_id = $('#ad_jobpost_id').val();
        var job_company_id = $('#ad_company_id').val();
        var job_status = $('#ad_status').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>JobController/change_ststus_and_ad_remark",
            data: {
                'jobpost_id' :jobpost_id,
                'company_id' :job_company_id ,
                'job_status' :job_status ,
                'remarks' :remarks
            },       
            success: function(resp) {
                var data = $.parseJSON(resp);
                var ddd = data['all_record'].status;
                console.log(data);
                if (ddd == '1') {
                    $('#msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2000,
                        message: 'HI! Status is changed',
                        position: 'topRight'
                    }));

                    setTimeout(function () {
                      window.location = "<?php echo base_url(); ?>JobController/lms_all_jobs";
                    }, 1000);

                } else if(ddd == '2'){

                  $('#msg').html(iziToast.error({
                        title: 'Cencelled',
                        timeout: 2000,
                        message: 'something went wrong',
                        position: 'topRight'
                    }));
                  setTimeout(function () {
                      window.location = "<?php echo base_url(); ?>JobController/lms_all_jobs";
                    }, 1000);
                }
            }
        });
      }
    });

        </script>
</body> 
 
</html>