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
   .modal-header{
   background: #3c8dbc;
   }
   .modal-title{
   color: white;
   }
   .col-md-2{
   float: right;
   margin-right: 50%;
   }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Hardware        
   </h1>
   <div style="margin-left: 200px; margin-top: -40px;">
      <a href="<?php echo base_url() ?>HardwareController/HardwareShow" class="btn btn-danger">HardwareShow</a>
   </div>
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Hardware Form</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-md-12" >
<form method="post" action="<?php echo base_url(); ?>HardwareController/HardwareForm" style="padding-bottom:20px; padding-top:20px;">
   <input type="hidden" name="update_id" value="<?php if(!empty($Select_Hardware->hardware_id)) { echo $Select_Hardware->hardware_id; } ?>"/>
   <div>
   <div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
               <h4 class="modal-title" id="myModalLabel">Add-Company</h4>
            </div>
            <div class="modal-body">
<form method="post" action="<?php echo base_url(); ?>HardwareController/HardwareForm" style="padding-bottom:20px; padding-top:20px;">
<div style="margin-left: 1.6%;">
<label><b>Add Company<b></label><br>
<input type="text" name="company"  size="42"><br><br> 
<input type="submit" name="save" value="submit" class="btn btn-primary">                        
</div>
<br>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div><br> 
<div id="Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
<h4 class="modal-title" id="myModalLabel">Add-category</h4>
</div>
<div class="modal-body">
<form method="post" action="<?php echo base_url(); ?>HardwareController/HardwareForm" style="padding-bottom:20px; padding-top:20px;">
<div style="margin-left: 1.6%;"> 
<label><b>Add Category<b></label><br>
<input type="text" name="category" size="42"><br><br>
<input type="submit" name="save" value="submit" class="btn btn-primary">                                 
</div><br>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div><br> 
<div class="col-md-2">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#GSCCModal">Add</button>
</div>  
<div class="col-md-4">
<select class="form-control" name="hardwarecompany_id">
<option value=""><b>Company</b></option>
<?php
   foreach ($all_hardwarecompany as $row)
   
    {
   
      echo '<option value="'.$row->id.'">'.$row->company.'</option>';
   
    }
   
   ?>          
</select>                                   
</div>  
<br>  
<br>  
<br>  
<div style="margin-left: 1.6%;">
<label><b>Subject<b></label><br>
<input type="text" name="subject" size="42">                                   
</div>
<br>
<div style="margin-left: 1.6%;">
<label><b>Description<b></label><br>
<textarea rows = "4" cols = "44" name = "description"></textarea>                                   
</div> 
<br>
<div style="margin-left: 1.6%;">
<label><b>Add Link<b></label><br>
<input type="text" name="link" size="42">                                   
</div>
<br>
<div class="col-md-2">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal">Add</button>
</div>  
<div class="col-md-4">
<select class="form-control" name="hardwarecategory_id">
<option value=""><b>HardwareCategory</b></option>
<?php
   foreach ($all_hardwarecategory as $row)
   
    {
   
      echo '<option value="'.$row->id.'">'.$row->category.'</option>';
   
   }
   
   ?>          
</select>                                   
</div> 
<br>
<br>            
<br>            
<div style="margin-left: 1.6%;">
<input type = "submit" value = "submit" name="submit" class="btn btn-success" />
</div>
</form>
<!-- /.content-wrapper -->
<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
<script type="text/javascript"> function showMyModalSetTitle(myTitle, myBodyHtml) {
   /*
   
    * '#myModayTitle' and '#myModalBody' refer to the 'id' of the HTML tags in
   
    * the modal HTML code that hold the title and body respectively. These id's
   
    * can be named anything, just make sure they are added as necessary.
   
    *
   
    */
   
   
   
   $('#myModalTitle').html(myTitle);
   
   $('#myModalBody').html(myBodyHtml);
   
   
   
   $('#myModal').modal('show');
   
   }
   
</script>
<script>
   $(document).on('click','.status_checks',function()
   
   { 
   
   var status = ($(this).hasClass("btn-success")) ? '0' : '1'; 
   
   var msg = (status=='0')? 'Deactivate' : 'Activate'; 
   
   if(confirm("Are you sure to "+ msg))
   
   { 
   
     var current_element = $(this); 
   
     var id = $(current_element).attr('data');
   
     url = "<?php echo base_url().'HardwareController/update_status'?>"; 
   
         $.ajax({
   
           type:"POST",
   
           url: "<?php echo base_url(); ?>HardwareController/HardwareForm", 
   
           data: {"id":id,"status":status}, 
   
           success: function(data) { 
   
           location.reload();
   
     } });
   
   }  
   
   });
   
   
   
</script>
</body>
</html>