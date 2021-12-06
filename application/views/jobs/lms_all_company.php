<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<style>
.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 4vw;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}
</style>
<div class="main-content">
	
    <div class="row">
         <div class="col-12 d-flex justify-content-between">
             <h6 class="page-title text-dark mb-3">View Company</h6>
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb p-0">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Library</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Data</li>
                 </ol>
             </nav>
         </div>
     </div>
      <div class="extra_lead_menu">
        <div class="extra_top-menu d-flex justify-content-between">
        <ul class="pl-0">     
                <li>
                    <a href="<?php echo base_url() ?>Common/lms_all_company" class="btn btn-primary text-white">
                    All<span class="badge badge-transparent"><?php echo $total_company; ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>Common/lms_all_company?status=1" class="btn btn-success text-white">
                    Active<span class="badge badge-transparent"><?php echo $total_active_company; ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>Common/lms_all_company?status=0" class="btn btn-warning text-white">
                    New Pending<?php echo $total_pending_company; ?><span class="badge badge-transparent"><?php echo $total_pending_company; ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>Common/lms_all_company?status=2" class="btn btn-danger text-white">
                    Deactive<span class="badge badge-transparent"><?php echo $total_deactive_company; ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>Common/lms_all_company?status=3" class="btn btn-red text-white">
                    Dumped<span class="badge badge-transparent"><?php echo @$total_dumped_company; ?></span>
                    </a>
                </li>              
                      
            </ul>
           
            <ul style="padding-left:0;">
            <li class="float-right ml-2"><a href="" class="btn btn-info" data-toggle="modal" data-target=".filter-income"><span data-toggle="tooltip" data-placement="bottom" title="Export Data"><i class="fas fa-filter mr-1 text-white"></i></sapn></a></li>  
                <!-- <li class="float-right ml-2"><a href="" class="btn btn-info" data-toggle="modal" data-target=" "><span data-toggle="tooltip" data-placement="bottom" title="Remarks"><i class="far fa-bell text-white"></i></span></a></li>   -->
                <li class="float-right"><a href="javascript:" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg" id="btnExporttoExcel"><span data-toggle="tooltip" data-placement="bottom" title="Filter"><i class="far fa-file-excel text-white"></i></span></a></li>
            </ul>
        </div>
    </div>
    <div class="card mt-4">
    <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped overdue-table" id="table2">
                        <thead>
                        <tr>
                            <th>sno</th>
                            <th>Company Name</th>
                            <th width="70px">Company Address</th>
                            <th>Company URL</th>
                            <th>Recruiter Name</th>
                            <th>Registered Date</th>
                            <th>Status</th>
                            <th>Options</th>
                            <th width="150px" class="text-center">Actions</th>
                            <!-- <th width="180px">Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                        <?php $cncp = 1; $sno = 1; foreach($recruiter as $com) { ?>
                          
                              <?php $cdate =  date('Y-m-d');                               
                                            $newd =  $com->date;                             
                                            $datetime1 = date_create("$newd");                              
                                            $datetime2 = date_create("$cdate");                             
                                            $interval = date_diff($datetime1, $datetime2); 
                                            $days = $interval->format('%R%a');                               
                                            $days = substr($days,1,3);
                                                                      
                                          if($com->status == 1){ $bgcolor = "rgba(0,166,90,0.2)"; $color = ''; $ank=''; $bocolor ='#54ca68';}  
                                          if($com->status == 2){ $bgcolor = 'rgba(221,75,57,0.2)'; $color = ''; $ank=''; $bocolor='#f44336';}                              
                                          if($com->status == 3){ $bgcolor = 'rgba(221,75,57,0.2)'; $color = ''; $ank=''; $bocolor ='#f89406';}  
                                        if($com->status == 0)                             
                                           {                             
                                            if($days < 3 )                              
                                              {                              
                                                $bgcolor = "rgba(220,220,220,0.2)"; $color =''; $ank=''; $bocolor ='#f89406';                              
                                              }                             
                                         else                           
                                              {                             
                                                $bgcolor = "rgba(255,165,0,0.2)"; $color =''; $ank='';  $bocolor ='#f89406';                           
                                              }                                                         
                                           }   ?> 
                          <tr>
                          <td><?php echo $sno; ?></td>
                            <td class="app-details">
                            <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_<?php echo $cncp; ?>" onclick="return get_copy_paste(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text(<?php echo $cncp; ?>)">
                                 <a href="javascript:all_jobs_by_company(<?php echo $com->company_id; ?>)" data-toggle=" modal" data-placement="top" title="Company Name::<?php echo $com->company_name; ?>" style="font-size:18px;" id="company_name_copy_paste_<?php echo $cncp; ?>" ><?php echo $com->company_name;?></a>
                                 <br> 
                                 <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_email_<?php echo $cncp; ?>" onclick="return get_copy_paste_email(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_email(<?php echo $cncp; ?>)">
                                 <span data-toggle="tooltip" data-placement="top" title="Company Email::<?php echo $com->email_id; ?>" id="company_name_copy_paste_email_<?php echo $cncp; ?>"><?php echo $com->email_id;?></span>
                                 <br>
                                 <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_mobile_<?php echo $cncp; ?>" onclick="return get_copy_paste_mobile(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_mobile(<?php echo $cncp; ?>)">
                                 <span data-toggle="tooltip" data-placement="top" title="<?php echo $com->company_number; ?>"  id="company_name_copy_paste_mobile_<?php echo $cncp; ?>"><?php echo $com->company_number;  ?></span>
                                 <a href="https://wa.me/<?php echo "91".$com->company_number; ?>" target="_blank"></a>
                                 <br>
                                 <ul class="ring_round_block" style="position: relative;top: 16px;">
                                    <?php foreach($all_jobs as $aj) {
                                       if($aj->company_id == $com->company_id) { ?>
                                    <?php } } ?>
                                 </ul>
                                       </td>
                            <td><?php echo $com->company_address;?></td>
                            <td><a href="<?php echo $com->url; ?>" target="_blank"><?php echo $com->url?></a></td>
                            <td><?php echo $com->employer_name;?></td>
                            <td><?php echo $com->date;?></td>  
                            <td> <?php if($com->status==0) { ?>
                                    <span class="badge badge-warning">Pending</span>
                                    <?php } ?>
                                    <?php if($com->status==1) { ?>
                                    <span class="badge badge-success ">Active</span>
                                    <?php } ?>
                                    <?php if($com->status==2) { ?>
                                    <span class="badge badge-danger ">Deactive</span>
                                    <?php } ?>
                                    <?php if($com->status==3) { ?>
                                    <span class="badge badge-red">Dumped</span>
                                    <?php } ?>
                            </td>
                            <td class="text-center">
                              <?php $cid = $com->company_id; ?>
                              <a href="javascript:get_company_detail_ajax(<?php echo $com->company_id; ?>)" class="bg-primary action-icon text-white btn-primary" ><span data-toggle="tooltip" data-placement="top" title="View Company"  ><i class="fas fa-eye"></i></span></a>                             
                              <a href="javascript:send_mail(<?php echo $com->company_id; ?>)" class="bg-info action-icon text-white btn-primary" ><span data-toggle="tooltip" data-placement="top" title="View Company"  ><i class="fa fa-envelope"></i></span></a>                             
                              <a href="javascript:rate_app(<?php echo $cid; ?>)" class="bg-warning action-icon text-white btn-warning"><span data-toggle="tooltip" data-placement="top" title="Rating"><i class="far fa-star"></i></span></a>
                            </td> 
                            <td>
                                  <div class="dropdown">
                                  <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle align-center text-white">Status</a>
                                  <div class="dropdown-menu">
                                  <?php $xx = $com->company_id; ?>
                                  <a class="dropdown-item has-icon text-warning" onclick="return get_company_change('pending','<?php echo $com->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','0')" >
                                      Pending
                                  </a>
                                  <a class="dropdown-item has-icon text-success" onclick="return get_company_change('active','<?php echo $com->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','1')"  >
                                      Active
                                  </a>
                                  <a class="dropdown-item has-icon text-danger" onclick="return get_company_change('Deactive','<?php echo $com->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','2')" >
                                    Deactive
                                  </a>
                                  <a class="dropdown-item has-icon text-red" onclick="return get_company_change('Dumped','<?php echo $com->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','3')" >
                                    Dumped
                                  </a>
                                  <?php  ?>
                              </div>
                            </td>
                        </tr>
                        
                       <?php $cncp++ ;

                          $sno++; } ?>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
    </div>
</div>
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
<div class="modal fade" id="single_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalLabel" > Company Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body company_detail">
                       
         
         </div>
      </div>
   </div>
</div>
<!-- Large modal -->
<!--end company detakls table -->
<div class="modal fade" id="send_mail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalLabel" > Company Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body get_company_query">
                       
         
         </div>
      </div>
   </div>
</div>
<!-- Large modal -->
<!-- Rate apllicant -->
<div class="modal fade" tabindex="-1" role="dialog" id="ratecompany" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
   <div class="modal-header">
      <h5 class="modal-title" id="myLargeModalLabel">Rate Company</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <div class="modal-body">
        <input type="hidden" name="com_rate_id" id="com_rate_id">
      <div class="rating"> 
         <input type="radio" name="star" value="5" id="5"><label for="5">☆</label> 
         <input type="radio" name="star" value="4" id="4"><label for="4">☆</label> 
         <input type="radio" name="star" value="3" id="3"><label for="3">☆</label> 
         <input type="radio" name="star" value="2" id="2"><label for="2">☆</label> 
         <input type="radio" name="star" value="1" id="1"><label for="1">☆</label>
      </div>
      <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="com_rate_app" name="com_rate_app">Rate this company</button>
   </div>
</div>
</div>
</div>
<!-- end rateing -->
 <!-- basic modal -->

<div class="modal fade" id="company-remarks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel" >Company Remarks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <div class="form-group">
          <form method="post" action="<?php echo base_url(); ?>Common/lms_all_company">
            <input type="hidden" name="status" id="remarks_status">
            <input type="hidden" name="remarks_by" id="cr_remarks_by">
            <input type="hidden" name="cr_company_id" id="cr_company_id">
            <input type="hidden" name="status_data_change" id="status_data_change">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Add Reason</label> 
            <textarea rows="5" class="form-control" id="remarks" name="remarks"></textarea>
          </div>
      </div>
      <div class="col-md-12">
      <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="submit" name="submit">Submit</button>
      </div>
      </div> 
      </form>
    </div>
  </div>
</div>
<!-- filter model -->
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
          <form method="post" action="<?php echo base_url(); ?>Common/lms_all_company?status=<?php echo $this->input->get('status'); ?>">
         <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputEmail4">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name"   placeholder="Company Name" value="<?php echo @$filter_record['company_name']; ?>">
          </div>
           <div class="form-group col-md-3">
            <label for="inputPassword4">Company Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Compnay Email" value="<?php echo @$filter_record['email']; ?>">
          </div>
           <div class="form-group col-md-3">
            <label for="inputPassword4">Company Mobile</label>
            <input type="text" class="form-control" id="company_no" name="company_no"  placeholder="+91-00000-00000" value="<?php echo @$filter_record['company_no']; ?>">
          </div>
          <div class="form-group col-md-3">
            <label for="inputPassword4">Employer Name</label>
            <input type="text" class="form-control" id="employer_name" name="employer_name"  placeholder="+91-00000-00000" value="<?php echo @$filter_record['company_no']; ?>">
          </div>
           <div class="form-group col-md-3">
            <label for="inputPassword4">Designation</label>
            <input type="text" class="form-control" id="employer_designation" name="employer_designation" placeholder="Designation" value="<?php echo @$filter_record['employer_name_search']; ?>">
          </div>
          <div class="form-group col-md-3">
            <label for="inputPassword4">Date from</label>
            <input type="Date" class="form-control" id="filter_start_date" name="filter_start_date"  placeholder="+91-00000-00000" value="<?php echo @$filter_record['filter_start_date']; ?>">
          </div>
           <div class="form-group col-md-3">
            <label for="inputPassword4">Date to</label>
            <input type="Date" class="form-control" id="filter_end_date" name="filter_end_date" placeholder="Designation" value="<?php echo @$filter_record['filter_end_date']; ?>">
          </div>
        </div>
         <div class="text-right">
          <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
          <input type="submit" class="btn btn-primary" value="Filter" name="search">
          <a class="btn btn-light text-dark" href="<?php echo base_url();?>Common/lms_all_company">Reset</a>  
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

<!-- end filter model -->

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
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
  <script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script> 
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script> 
<!-- Page Specific JS File -->
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>

  <!-- JS Libraies --> 
  <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
 
  <script type="text/javascript">    
            $(function () {    
                $("#btnExporttoExcel").click(function () {    
                    $("#table2").table2excel({    
                        filename: "Job Apply Application.xls"    
                    });    
                });    
            });    
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
     $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
   }
   
   function change_copy_paste_text_mobile(ic){
     var copy_ppp =  "copy_paste_record_email_"+ic;
     $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'Click to Copy').tooltip('show');
   }
   
   function get_copy_paste_mobile(ic){ 
        
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
  


   function get_company_detail_ajax(company_id){
   $.ajax({
     url : "<?php echo base_url(); ?>Common/ajax_company_detail_get", 
     type:"post", 
     data:{ 
       'company_id':company_id 
     },
     success:function(Resp){
      $("#single_detail").modal();   
       $('.company_detail').html(Resp);
     }
   });
 }

  
</script>
<script>
   function co_upd(application_id ) {

       $.ajax({
         url: "<?php echo base_url(); ?>Common/get_Comp_details",
         type: "post",
         data: {
           'id': application_id ,
         },
         success: function(resp) {
           $(".applicant-details").modal();
           var data = $.parseJSON(resp);
          
         
         }
       });
     }
</script>
<script>
   function all_jobs_by_company(company_id){  
     $.ajax({   
       url : "<?php echo base_url() ?>Common/view_company_wise_job",   
       type :"post",   
       data:{   
         'company_id' : company_id   
       },   
       success:function(data){   

           $("#com_detail").modal();   
           $('.get_company_detail').html(data);   
       }   
     });   
   }
    
  </script>
<script>
    $('#ad_remark_com').on('click', function() {

var company_id = $('#comp_id').val();
var remarks = $('#remarks').val();
$.ajax({
    type: "POST",
    url: "<?php echo base_url() ?>Common/add_remark_comp",
    data: {
         'company_id' :company_id,
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
                message: 'HI! Mail is sent',
                position: 'topRight'
            }));
            setTimeout(function() {
                  location.reload();
                }, 2020);
        } else if(ddd == '2'){

          $('#msg').html(iziToast.error({
                title: 'Cencelled',
                timeout: 2000,
                message: 'something went wrong',
                position: 'topRight'
            }));
          setTimeout(function() {
                  location.reload();
                }, 2020);
        }
    }
});

});
  </script>
<script>
     function comp_status_upd(company_id) {

      $.ajax({
           url: "<?php echo base_url(); ?>Common/get_recoComp",
           type: "post",
           data: {
             'id': company_id,
           },
           success: function(Resp) {
             $('#applicant-remarks').modal();
             var data = $.parseJSON(Resp);
             console.log(data)
             var company_id  = data['single_record'].company_id ;
             $('#comp_id').val(company_id );
           }
         });
     }

     
</script>
<script>
   function rate_app(company_id) {
      $.ajax({
           url: "<?php echo base_url(); ?>Common/get_recoComp",
           type: "post",
           data: {
             'id': company_id ,
           },
           success: function(Resp) {
             $('#ratecompany').modal();
             var data = $.parseJSON(Resp);
             var company_id = data['single_record'].company_id;
             $('#com_rate_id').val(company_id);
           }
         });
     }


$('#com_rate_app').on('click', function() {

var company_id = $('#com_rate_id').val();
var rating = $("input[name='star']:checked").val();

$.ajax({
    type: "POST",
    url: "<?php echo base_url() ?>Common/give_company_rating",
    data: {
         'company_id' :company_id,
          'rating' : rating
    },       
    success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        console.log(data);
        if (ddd == '1') {
            $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI!  rating is submitted.',
                position: 'topRight'
            }));

            setTimeout(function() {
                  location.reload();
                }, 2020);
        } else if(ddd == '2'){

          $('#msg').html(iziToast.error({
                title: 'Cencelled',
                timeout: 2000,
                message: 'something went wrong',
                position: 'topRight'
            }));
          setTimeout(function() {
                  location.reload();
                }, 2020);
        }
    }
});
});

function send_mail(company_id){
   
   $.ajax({
     url : "<?php echo base_url(); ?>Common/ajax_company_query_get",
     type:"post",
     data:{
       'company_id':company_id
     },
     success:function(Resp){
      $('#send_mail').modal();
       $('.get_company_query').html(Resp);
     }
   });
 }
</script>
<script>
  function get_company_change(status, company, remarks_by,status_data) 
   { 
     alert(status);   
    //   alert(company);
    //  alert(remarks_by); 
    //  alert(status_data);
     $('#cr_remarks_by').val(remarks_by);  
     $('#remarks_status').val(status);  
     $('#cr_company_id').val(company);  
     $('#status_data_change').val(status_data);   
     $.ajax({  
         url   : "<?php echo base_url(); ?>Common/get_remarks_company_data", 
         type  : 'POST', 
         data  :{ 
           'company_id' : company 
         },  
         success:function(res){ 
            $("#company-remarks").modal();
            $('#remarks_data_company').html(res); 
         }   
     });  
   }

   $(function() {
        $('#table2').DataTable({
            stateSave: true,
            "bDestroy": true
        })
    }) 
  </script>
</body> 
 
</html>