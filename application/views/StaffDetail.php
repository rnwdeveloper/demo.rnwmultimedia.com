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
<style>
   .bg {
   background-image: url(..//images/interview_2.jpg);
   background-size: cover;
   background-position: center;
   }
   label {
   font-weight: bold;
   }
   .text-red {
   color: #ed1d25!important;
   }
   .shadow {
   box-shadow: 0 0 10px #ed1d25!important;
   }
   .bg-white {
   background-color: #fff !important;
   }
   .bg-grey {
   background-color: #eaeaea !important;
   }
   .footer-bg {
   background: rgb(27, 29, 38) !important;
   }
   .text-footer {
   color: #777;
   }
   .line{
   display-flex;
   } 
   .col-md-2{
   float: right;
   margin-right: 59%;
   } 
</style>
<div class="content-wrapper">
<!-- Content Header (Page header) -->

<section class="content-header">
   <h1>
      Employee Details        
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Employee Details</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <?php if($_SESSION['logtype']=="Super Admin") { ?>
   <div class="row">
      <div class="col-md-6">
         <!-- general form elements -->
         <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
               <h3 class="box-title">Create User </h3>
               <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#mylogtype">Create NewLogtype</button>
               <h3 class="box-title">Employee Details</h3>
            </div>
            <form class="login100-form validate-form" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>GoogleFormController/StaffDetail">
               <input type="hidden" name="update_id" value="<?php if(!empty($select_sttafDetail->id)) { echo $select_sttafDetail->id; } ?>"/>
               <div class="form-group">
                  <label for="email">Branch Name :</label>
                  <select required  name="branch_id" id="branch" class="form-control">
                     <option value="">Select Branch</option>
                     <?php foreach($branch_all as $val) { ?>
                     <option <?php if($val->branch_id==@$select_sttafDetail->branch_id) { echo "selected"; } ?>   value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                     <?php } ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="email">Logtype:</label>
                  <select required class="form-control" name="logtype"  required>
                     <option value="">Select Logtype</option>
                     <?php foreach($logtypestaff_all as $val) { if($val->status==0) { ?>
                     <option <?php if($val->logtype_name==@$select_sttafDetail->logtype) { echo "selected"; } ?>   value="<?php echo $val->logtype_name; ?>"><?php echo $val->logtype_name; ?></option>
                     <?php } } ?>
                  </select>
               </div>
               <div class="form-group" >
                  <label for="pwd">Employee Name :</label>
                  <input class="form-control"   value="<?php if(!empty($select_sttafDetail->name)) { echo $select_sttafDetail->name; } ?>"  type="name"  name="name" placeholder="Enter Name" required>
               </div>
               <div class="form-group" >
                  <label for="pwd">Designation :</label>
                  <input class="form-control"   value="<?php if(!empty($select_sttafDetail->designation)) { echo $select_sttafDetail->designation; } ?>"  type="name"  name="designation" placeholder="Enter Name" required>
               </div>
               <div class="form-group" >
                  <label for="pwd">Email :</label>
                  <input class="form-control"   value="<?php if(!empty($select_sttafDetail->email)) { echo $select_sttafDetail->email; } ?>"  type="email"  name="email" placeholder="Enter Email" required>
               </div>
               <div class="form-group" >
                  <label for="pwd">Parsonal Mobile No :</label>
                  <input class="form-control"   value="<?php if(!empty($select_sttafDetail->personal_mobile_no)) { echo $select_sttafDetail->personal_mobile_no; } ?>"  type="name"  name="personal_mobile_no" placeholder="Enter Personal Mobile No" required>
               </div>
               <div class="form-group" >
                  <label for="pwd">Mobile No :</label>
                  <input class="form-control"   value="<?php if(!empty($select_sttafDetail->mobile_no)) { echo $select_sttafDetail->mobile_no; } ?>"  type="name"  name="mobile_no" placeholder="Enter Mobile No" required>
               </div>
               <input type="submit" name="submit" value="submit" class="btn btn-primary" />
         </div>
         </form>  
      </div>
   </div>

      <?php } ?>                              
      <div class="row">
         <div class="col-md-12" >
            <!-- general form elements -->
            <div class="box box-primary" style="padding:20px;">
               <div class="box-header with-border">
                  <b>
                     <h3 class="box-title">Display Employee Data </h3>
                  </b>
                  <div class="dropdown pull-right" >
                     <button class="btn btn-sm btn-success active dropdown-toggle" type="button" data-toggle="dropdown">Download-xlSeat
                     <span class="caret"></span></button>
                     <ul class="dropdown-menu">
                        <li><a onclick="createExcel()">Download Employee Data xl Sheet</a></li>
                        <form method="post" id="frm_data" action="<?php  echo base_url();?>GoogleFormController/download_excel">
                           <input type="hidden" id="tb_data" name="data">  
                        </form>
                     </ul>
                  </div>
               </div>
               <!-- /.box-header -->
               <div  id="staff_table_exl">
                  <div class="table-responsive">
                     <table id="example1" class="table table-responsive table-bordered table-striped example1">
                        <thead>
                           <tr>
                              <th>NO</th>                            
                              <th>Branch Name</th>
                              <th>Logtype</th>                            
                              <th>Employee Name</th>                            
                              <th>Designation</th>                                     
                              <th>Email</th>                             
                              <th>Personal Mobile NO</th>
                              <th>Official Mobile NO</th>                            
                              <th>Lastseen</th>                      
                             <th>Action</th>                     
                           </tr>
                        </thead>
                        <tbody>
                           <?php $sno=1; foreach($StaffDetail_all as $val) { ?>
                           <tr>
                              <td><?php echo $sno; ?></td>
                              <td><?php $branch_ids = explode(",",$val->branch_id);
                                 foreach($branch_all as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name."<br>"; }  } ?></td>
                              <td><?php echo $val->logtype; ?></td>                             
                              <td><?php echo $val->name; ?></td>                             
                              <td><?php echo $val->designation; ?></td>                             
                              <td><?php echo $val->email; ?></td>                         
                              <td><?php echo $val->personal_mobile_no; ?></td>
                              <td><?php echo $val->mobile_no; ?></td>
                              <td><?php echo $val->date_time; ?></td>
                              <td>
                                 <?php if($_SESSION['logtype']=="Super Admin") { ?>
                                 <div class="dropdown">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                       <li><a href="<?php echo base_url(); ?>GoogleFormController/StaffDetail?action=edit&id=<?php echo @$val->id; ?>"> Edit</a></li>
                                       <li ><a href="<?php echo base_url(); ?>GoogleFormController/StaffDetail?action=delete&id=<?php echo @$val->id; ?>">Delete</a></li>
                                    </ul>
                                 </div>
                                 <?php } ?>
                              </td>
                           </tr>
                           <?php $sno++; } ?>
                           </tfoot>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
<div class="modal fade"  id="mylogtype" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Logtype</h4>
         </div>
         <div class="modal-body">
            <form method="post" action="<?php echo base_url(); ?>GoogleFormController/StaffDetail">
               <input type="hidden" name="update_id" value="<?php if(!empty($select_logtype->logtype_id)) { echo $select_logtype->logtype_id; } ?>" >
               <div class="form-group">
                  <label for="email">Log Type:</label>
                  <input type="text" name="logtype_name" class="form-control" value="<?php if(!empty($select_logtype->logtype_name)) { echo $select_logtype->logtype_name; } ?>" placeholder="Enter Log Type">
               </div>
               <input type="submit" name="logtype_submit" class="btn btn-sm btn-success" value="Save">
            </form>
            <table class="table" style="margin-top:15px;">
               <thead>
                  <tr>
                     <th>Logtype</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($logtypestaff_all as $val) { ?>
                  <tr>
                     <td><?php echo $val->logtype_name; ?></td>
                     <td><label style="color:#a6a6a6"> <?php if($val->status=="0") { echo "Active"; } if($val->status=="1") { echo  "Disable"; } ?> </label></td>
                     <td>
                        <div class="dropdown">
                           <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                           <span class="caret"></span></button>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>GoogleFormController/StaffDetail?logtype_action=edit&id=<?php echo @$val->logtype_id; ?>"> Edit</a></li>
                              <?php if($val->status==0) { ?>
                              <li ><a href="<?php echo base_url(); ?>GoogleFormController/StaffDetail?logtype_action=delete&id=<?php echo @$val->logtype_id; ?>&status=<?php echo @$val->status; ?>">Disable</a></li>
                              <?php } else {  ?>
                              <li ><a href="<?php echo base_url(); ?>GoogleFormController/StaffDetail?logtype_action=delete&id=<?php echo @$val->logtype_id; ?>&status=<?php echo @$val->status; ?>">Active</a></li>
                              <?php } ?>
                           </ul>
                        </div>
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<footer class="main-footer">
   <strong>Copyright©2018 Red & White Multimedia.</strong> All rights
   reserved.
</footer>
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
<?php if(!empty($select_logtype)) { ?>
<script>
   $('#mylogtype').modal("show");
   
</script>
<?php } ?>
<script>
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
   
</script>
<script>
   function createExcel()
   
   {
   
       
   
               var excel_data = $('#staff_table_exl').html();  
   
               $('#tb_data').val(excel_data);
   
              $('#frm_data').submit();
   
       
   
   }
   
</script>
</body>
</html>