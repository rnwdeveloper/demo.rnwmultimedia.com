<?php  @$branch_ids = explode(",",$_SESSION['branch_ids']); ?>
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
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
   /* Rating Star Widgets Style */
   .rating-stars ul {
   list-style-type:none;
   padding:0;
   -moz-user-select:none;
   -webkit-user-select:none;
   }
   .rating-stars ul > li.star {
   display:inline-block;
   }
   .rating-stars ul > li.star_give {
   display:inline-block;
   }
   /* Idle State of the stars */
   .rating-stars ul > li.star > i.fa {
   font-size:2.5em; /* Change the size of the stars */
   color:#ccc; /* Color on idle state */
   }
   .rating-stars ul > li.star_give > i.fa {
   font-size:1em; /* Change the size of the stars */
   color:#FF912C; /* Color on idle state */
   list-style-type:none;
   padding:0;
   -moz-user-select:none;
   -webkit-user-select:none;
   }
   /* Hover state of the stars */
   .rating-stars ul > li.star.hover > i.fa {
   color:#FFCC36;
   }
   /* Selected state of the stars */
   .rating-stars ul > li.star.selected > i.fa {
   color:#FF912C;
   }
   .col{
   background-color: #7460ee;
   color: white;
   }
   .ring_round_block li.green_rign{
   border-color: green;
   }
   .ring_round_block li.yellow_rign{
   border-color: #c8c87a;
   cursor: pointer;
   }
   .ring_round_block li.red_rign{
   border-color: red;
   }
   .ring_round_block li {
   width: 13px;
   height: 13px;
   border: 2px solid #000;
   border-radius: 50%;
   display: inline-block;
   }
   .ring_round_block {
   float: right;
   }
   li a.tooltip {
   border-bottom: 1px dashed;
   text-decoration: none;
   }
   li a.tooltip:hover {
   cursor: help;
   position: relative;
   }
   li  a.tooltip span {
   display: none;
   }
   li  a.tooltip:hover span {
   border: #666 2px dotted;
   padding: 5px 20px 5px 5px;
   display: block;
   z-index: 100;
   background: #e3e3e3;
   left: 0px;
   margin: 15px;
   width: 300px;
   position: absolute;
   top: 15px;
   text-decoration: none;
   }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1 class="text-center">View Company</h1>
      <div class="text-center">
         <span><a href="<?php echo base_url() ?>FormController/viewall_company_detail?status=0" class="btn btn-warning" style="background-color:rgba(255,165,0);color:white;font-weight: bold;">New( Pending )(<?php echo $total_pending_company; ?>)</a></span> 
         <span><a href="<?php echo base_url() ?>FormController/viewall_company_detail?status=1" class="btn btn-success" style="background-color: rgba(0,128,0);color:white;font-weight: bold;">Active(<?php echo $total_active_company; ?>)</a></span> 
         <span><a href="<?php echo base_url() ?>FormController/viewall_company_detail?status=2" class="btn btn-danger" style="color:white;font-weight: bold;">Dective(<?php echo $total_deactive_company; ?>)</a></span> 
         <span><a href="<?php echo base_url() ?>FormController/viewall_company_detail?status=3" class="btn btn-info" style="background-color: rgba(255,0,0);color:white;font-weight: bold;">Dumped(<?php echo @$total_dumped_company; ?>)</a></span> 
         <span><a href="<?php echo base_url() ?>FormController/viewall_company_detail?status=all" class="btn btn-primary" >All(<?php echo $total_company; ?>)</a></span> 
      </div>
      <!-- <?php if($_SESSION['logtype']=="Super Admin") { ?>  -->
      <!--  <div style="margin-left: 320px; margin-top: -40px;">
         <a href="<?php echo base_url() ?>PropertyController/place" class="btn btn-success">PlaceType</a>
         
         <a href="<?php echo base_url() ?>PropertyController/producttype" class="btn btn-primary">productType</a>
         
         <a href="<?php echo base_url() ?>PropertyController/productlist" class="btn btn-warning">ProductList</a>
         
         <a href="<?php echo base_url() ?>PropertyController/addcomplain_new" class="btn btn-info">AddComplainNew</a>
         
         </div> -->
      <!-- <?php } ?> -->
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Complain List</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="col-md-12" id="filter_section">
         <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
               <h3 class="box-title">Filter</h3>
            </div>
            <div class="row">
               <form method="post" action="<?php echo base_url(); ?>FormController/viewall_company_detail?status=<?php echo $this->input->get('status'); ?>">
                  <div class="col-md-2 my-2">
                     <label><b>Compnay Name</b></label>
                     <input type="text" name="company_name" class="form-control" placeholder="company Name"
                        value="<?php echo @$filter_record['company_name']; ?>">          
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Compnay Email</b></label>
                     <input type="text" name="email" class="form-control" placeholder="Exaple@gmail.com"
                        value="<?php echo @$filter_record['email']; ?>">           
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Company Mobile No</b></label>
                     <input type="text" name="company_no" class="form-control" placeholder="+91-00000-00000"
                        value="<?php echo @$filter_record['company_no']; ?>">             
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Designation</b></label>
                     <input type="text" name="employer_name_search"  class="form-control" placeholder="Designation" value="<?php echo @$filter_record['employer_name_search']; ?>">            
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>Start Date</b></label>
                     <input type="date"  class="form-control datepicker"  id="" name="filter_start_date" placeholder="Stating Date" value="<?php echo @$filter_record['filter_start_date']?>">            
                  </div>
                  <div class="col-md-2 my-2">
                     <label><b>End Date</b></label>
                     <input type="date"  class="form-control datepicker"  placeholder="Ending Date" name="filter_end_date"  value="<?php echo @$filter_record['filter_end_date']?>">            
                  </div>
                  <div class="col-sm-2 my-2 float-right" style="margin-top: 24px;">
                     <input type="submit" class="btn btn-success" value="Filter" name="search"/>
                     <a  href="<?php echo base_url(); ?>FormController/viewall_company_detail?status=<?php echo $this->input->get('status'); ?>"class="btn btn-danger" style="color:#FFF">Reset</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-12" >
         <!-- general form elements -->
         <input type="button" class="btn btn-primary"  value="Filter" id="filter_section_company">
         <?php if(@$this->input->get('status')=='') { ?>
         <a href="<?php echo base_url(); ?>FormController/excelcompanyDetail/1" style="float:right; color:white; background-color: green; padding:5px;border-radius: 3px;" >Exports to Excel</a> 
         <?php } else { ?>
         <a href="<?php echo base_url(); ?>FormController/excelcompanyDetail/<?php echo $this->input->get('status');?>" style="float:right; color:white; background-color: green; padding:5px;border-radius: 3px;" >Exports to Excel</a> 
         <?php } ?>
         <div class="box box-success" style="padding:4px;">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <?php if(@$this->session->flashdata('msg_alert')) { ?>
            <div class="col-md-8" >
               <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $this->session->flashdata('msg_alert'); ?></div>
            </div>
            <?php } ?>
            <div class="row">
               <div class="col-md-12">
                  <div style="margin-top:5px;">
                     <table  id="example"  class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Company Name</th>
                              <th>Company Address</th>
                              <th>Company URL</th>
                              <th>Recruiter Name</th>
                              <th>Registered Date</th>
                              <th>Give Grade To Company</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                  <?php 
                    // echo "<pre>";
                    // print_r($recruiter);
                    // exit;
                                  $cncp = 1; foreach($recruiter as $val) {
                                  $cdate =  date('Y-m-d'); 
                                  $newd =  $val->date;
                                  $datetime1 = date_create("$newd"); 
                                  $datetime2 = date_create("$cdate");
                                  // calculates the difference between DateTime objects 
                                  $interval = date_diff($datetime1, $datetime2); 
                                  // printing result in days format 
                                $days = $interval->format('%R%a'); 
                                $days = substr($days,1,3);
                                if($val->status == 1){ $bgcolor = "rgba(0,166,90,0.2)"; $color = ''; $ank='';}  
                                if($val->status == 2){ $bgcolor = 'rgba(221,75,57,0.2)'; $color = ''; $ank='';} 
                                if($val->status == 3){ $bgcolor = 'rgba(221,75,57,0.2)'; $color = ''; $ank='';}  
                                  if($val->status == 0){ 
                                  if($days < 3 ) {
                                      $bgcolor = "rgba(220,220,220,0.2)"; $color =''; $ank=''; 
                                    } else { 
                                      $bgcolor = "rgba(255,165,0,0.2)"; $color =''; $ank=''; 
                                    }
                                  } ?>
                           <tr style="background-color: <?php echo @$bgcolor; ?>; color:<?php echo $color;?>">
                              <td>
                                 <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_<?php echo $cncp; ?>" onclick="return get_copy_paste(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text(<?php echo $cncp; ?>)">
                                 <a   href="javascript:all_jobs_by_company(<?php echo $val->company_id; ?>)" data-toggle=" modal" data-placement="top" title="Company Name::<?php echo $val->company_name; ?>" style="font-size:18px;" id="company_name_copy_paste_<?php echo $cncp; ?>"  data-target="#show_modal"><?php echo $val->company_name;?></a>
                                 <br> 
                                 <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_email_<?php echo $cncp; ?>" onclick="return get_copy_paste_email(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_email(<?php echo $cncp; ?>)">
                                 <span data-toggle="tooltip" data-placement="top" title="Company Email::<?php echo $val->email_id; ?>" id="company_name_copy_paste_email_<?php echo $cncp; ?>"><?php echo $val->email_id;?></span>
                                 <br>
                                 <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_mobile_<?php echo $cncp; ?>" onclick="return get_copy_paste_mobile(<?php echo $cncp; ?>)" onmouseover="return change_copy_paste_text_mobile(<?php echo $cncp; ?>)">
                                 <span data-toggle="tooltip" data-placement="top" title="<?php echo $val->company_number; ?>"  id="company_name_copy_paste_mobile_<?php echo $cncp; ?>"><?php echo $val->company_number;  ?></span>
                                 <a href="https://wa.me/<?php echo "91".$val->company_number; ?>" target="_blank"><img src="<?php echo base_url();?>assets/images/whatsapp1.png" width="30"></a>
                                 <br>
                                 <ul class="ring_round_block" style="position: relative;top: 16px;">
                                    <?php foreach($all_jobs as $aj) {
                                       if($aj->company_id == $val->company_id) { ?>
                                    <a href="#" style="color:green" class="tooltip">sadfa asdf  <span>CSS tooltip showing up when your mouse over the link asdfadsf asdfadfadsf asdfasdfasdf adfasdf</span></a>
                                    <?php } } ?>
                                 </ul>
                              </td>
                              <td>
                                 <span data-toggle="tooltip" data-placement="top" title="<?php echo $val->company_address; ?>"><?php echo substr($val->company_address,0,20)."...";  ?></span>
                              </td>
                              <!-- <td><?php echo $val->company_number;  ?></td> -->
                              <td><a href="<?php echo $val->url; ?>" target="_blank"><?php echo $val->url;  ?></a></td>
                              <td><?php echo $val->employer_name;  ?>(<?php echo $val->employer_designation;  ?>) </td>
                              <td><?php echo $val->date;  ?></td>
                              <td>
                                 <a href="#"   onclick="return give_rate('<?php echo $val->company_id; ?>')">Give/change Rating</a>
                                 <br><br>
                                 <div class='rating-stars text-center'>
                                    <ul id='stars'>
                                       <?php  
                                          $star =  $val->rating;
                                          
                                          for($i=1;$i<=$star ; $i++){
                                          
                                          ?>
                                       <li class='star_give' title='Poor' data-value="<?php echo $i; ?>">
                                          <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                 </div>
                              </td>
                              <td>
                                 <a href="#" class="btn btn-xs btn-default text-center" data-toggle="modal" data-target="#show_modal" style="margin-bottom: 10px; padding: 5px; border-radius: 3px;" onclick="return get_company_detail_ajax(<?php echo $val->company_id; ?>)">
                                 <i class="fa fa-eye"></i>
                                 </a>
                                 <a href="" data-toggle="modal" data-target="#query" onclick="return get_company_query_ajax(<?php echo $val->company_id; ?>)"><i class="material-icons" style="color: red;">email</i></a>
                                 <div class="dropdown">
                                    <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                    <?php if($val->status == 0){ 
                                       echo "Pending";
                                       
                                       } else if($val->status == 1) {
                                       
                                         echo "Active";
                                       
                                       } else if($val->status == 2){
                                       
                                         echo "Deactive";
                                       
                                       } else if($val->status == 3){
                                       
                                         echo "Dumped";
                                       
                                       }
                                       
                                       ?>
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                       <li ><a href="#" onclick="return get_company_change('pending','<?php echo $val->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','0')" >Pending</a></li>
                                       <li><a onclick="return get_company_change('active','<?php echo $val->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','1')" > Active</a></li>
                                       <li ><a onclick="return get_company_change('Deactive','<?php echo $val->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','2')">Deactive</a></li>
                                       <li ><a onclick="return get_company_change('Dumped','<?php echo $val->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','3')" >Dumped</a></li>
                                    </ul>
                                 </div>
                           </tr>
                           <?php $cncp++; }  ?>
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
   $(function () {
     $('#example').DataTable({
         buttons: [
           'excel'
       ]
     });
   })
</script>
<script>
   function selectPlace(){
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
  
   function get_company_detail_ajax(company_id=''){
     $.ajax({
       url : "<?php echo base_url(); ?>FormController/ajax_company_detail_get",
       type:"post",
       data:{
         'company_id':company_id
       },
       success:function(Resp){
         $('#get_company_detail').html(Resp);
       }
     });
   }
  
   function get_company_query_ajax(company_id=''){
     $.ajax({
       url : "<?php echo base_url(); ?>FormController/ajax_company_query_get",
       type:"post",
       data:{
         'company_id':company_id
       },
       success:function(Resp){
         $('#get_company_query').html(Resp);
       }
     });
   }
</script>
</body>
</html>
<div class="modal fade" id="dialog-modal" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times</button>
            <h3 class="modal-title">Change Status Of Company Remarks</h3>
         </div>
         <div class="modal-body">
            <form method="post" action="<?php echo base_url(); ?>FormController/viewall_company_detail">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>Reasons</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <div>                
                              <textarea rows = "5" cols = "50" name = "remarks"></textarea><br>
                              <input type="hidden" name="status" id="remarks_status"><br>
                              <input type="hidden" name="remarks_by" id="cr_remarks_by"><br>
                              <input type="hidden" name="cr_company_id" id="cr_company_id"><br>
                              <input type="hidden" name="status_data_change" id="status_data_change"><br>
                              <input type = "submit" value = "submit" name="submit" class="btn btn-primary">
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </form>
         </div>
         <div class="modal-footer" id="remarks_data_company">
            <table border="1">
               <tr>
                  <th>No</th>
                  <th>Remarks By</th>
                  <th>Remarks</th>
                  <th>Status</th>
                  <th>Date</th>
               </tr>
               <tr>
               </tr>
            </table>
            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="rating-modal" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times</button>
            <h3 class="modal-title">Change Rating</h3>
         </div>
         <div class="modal-body">
            <form method="post" action="<?php echo base_url(); ?>FormController/viewall_company_detail">
               <table class="table table-bordered">
                  <tbody>
                     <tr>
                        <td>
                           <div>
                              <div class='rating-stars text-center'>
                                 <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
                                       <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                       <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                       <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                       <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                       <i class='fa fa-star fa-fw'></i>
                                    </li>
                                 </ul>
                              </div>
                              <!--  <input type="hidden" name="status" id="remarks_status"><br>
                                 <input type="hidden" name="remarks_by" id="cr_remarks_by"><br> -->
                              <input type="hidden" name="cr_star_id" id="cr_star_id"><br>
                              <input type="hidden" name="star_company_id" id="star_company_id"><br>
                              <!-- <input type="hidden" name="status_data_change" id="status_data_change"><br> -->
                              <input type="submit" value="submit" name="star_submit" class="btn btn-primary">
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </form>
         </div>
      </div>
   </div>
</div>
<div id="show_modal" class="modal fade" role="dialog" >
   <div class="modal-dialog" style="width:1200px !important;">
      <div class="modal-content">
         <div class="modal-header">
            <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> Company Details</h3>
         </div>
         <div class="modal-body" id="get_company_detail">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
   </div>
</div>
<div id="show_history" class="modal fade" role="dialog" >
   <div class="modal-dialog" style="width:1200px !important;">
      <div class="modal-content">
         <div class="modal-header">
            <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> JOB Details</h3>
         </div>
         <div class="modal-body" id="job_history_detail">
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
<!-- Modal -->
<div id="query" class="modal fade" role="dialog">
   <div class="modal-dialog" style="width:800px !important;">
      <div class="modal-content">
         <div class="modal-header">
            <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i>Company Email Send</h3>
         </div>
         <div class="modal-body" id="get_company_query">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
   </div>
</div>
<script>
   function give_rate(company_id){
     $("#rating-modal").modal();  
     $('#star_company_id').val(company_id);
   }
   
   function get_company_change(status, company, remarks_by,status_data){
     alert(status);
     // alert(company);
     // alert(remarks_by);
     $('#cr_remarks_by').val(remarks_by);
     $('#remarks_status').val(status);
     $('#cr_company_id').val(company);
     $('#status_data_change').val(status_data);
     $.ajax({
         url   : "<?php echo base_url(); ?>FormController/get_remarks_company_data",
         type  : 'POST',
         data  :{
           'company_id' : company
         },
         success:function(res)
         {
            $('#remarks_data_company').html(res);
         }
     });
   
     $("#dialog-modal").modal();
   }
</script>
<script>
   $(document).ready(function(){
     $('#filter_section_company').click(function(){
           $('#filter_section').slideToggle();
   });
   
       $('#stars li').on('mouseover', function(){
     var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
     // Now highlight all the stars that's not after the current hovered star
     $(this).parent().children('li.star').each(function(e){
       if (e < onStar) {
         $(this).addClass('hover');
       } else {
         $(this).removeClass('hover');
       }
     });
   }).on('mouseout', function(){
     $(this).parent().children('li.star').each(function(e){
       $(this).removeClass('hover');
     });
   });
   
   
   /* 2. Action to perform on click */
   
   $('#stars li').on('click', function(){
     var onStar = parseInt($(this).data('value'), 10); // The star currently selected
     var stars = $(this).parent().children('li.star');
   
     for(i = 0; i < stars.length; i++) {
       $(stars[i]).removeClass('selected');
     }
   
     for (i = 0; i < onStar; i++) {
       $(stars[i]).addClass('selected');
     }
   
     // JUST RESPONSE (Not needed)
     var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
     var msg = "";
     if (ratingValue > 1) {
         // alert("Thanks! You rated this " + ratingValue + " stars.");
         $('#cr_star_id').val(ratingValue);
     } else {
         // alert("We will improve ourselves. You rated this " + ratingValue + " stars.");
         $('#cr_star_id').val(ratingValue);
     }
     responseMessage(msg);
   });
   });
   
   //session automatic  
     $(document).ready(function(){
       var submenu = sessionStorage.getItem("submenu");
       var leadsubmenu = sessionStorage.getItem("leadsubmenu");
       $('#sub_menu_'+submenu).addClass('show');
       $('#lead_submenu_'+leadsubmenu).addClass('show');
       // $('#lead_submenu_'+leadsubmenu).css({"background-color": "yellow", "color": "white"});
     });
  
     function getClick(id,subid){
       sessionStorage.setItem("submenu", id);
       sessionStorage.setItem("leadsubmenu", subid);
     }
  
     function hideMenu(id,subid){
       $("#sub_menu_"+id).removeClass('show');
       $("#lead_submenu_"+subid).removeClass('show');
     }
   //end session of sidebar menu open 
  
   $('#filter_section').hide();
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
           $("#show_modal").modal('show');
           $('#get_company_detail').html(data);
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
  
     function get_job_show_history(jobId){
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
   
   
   // $(document).ready(function() {
   //     $('#example1').DataTable({
   //         dom: 'Bfrtip',
   //         buttons: [{
   //             extend: 'excelHtml5',
   //             customize: function(xlsx) {
   //                 var sheet = xlsx.xl.worksheets['sheet1.xml'];
    
   //                 // Loop over the cells in column `C`
   //                 $('row c[r^="C"]', sheet).each( function () {
   //                     // Get the value
   //                     if ( $('is t', this).text() == 'New York' ) {
   //                         $(this).attr( 's', '20' );
   //                     }
   //                 });
   //             }
   //         }]
   //     });
   // });
</script>