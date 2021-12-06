
    
    
    
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
  
  
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Add Cancellation Reason
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Add Cancellation Reason </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       
     	    
		
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
             <?php if(!empty($msg_alert)) { ?>
     	            <div class="col-md-8" >
     	        
     	        <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-red"><?php echo $msg_alert; ?></div>
     	    </div>
     	    <?php } ?>
           <div class="row"> 
               <div class="col-md-12">
                   
                 
               <form  method="post" action="<?php echo base_url(); ?>Settings/addCancellationReason">
                  <input type="hidden" name="update_id" value="<?php if(!empty($select_cancel_reason_list->reason_id)) { echo $select_cancel_reason_list->reason_id; } ?>">
                   <div class="form-group">  
                   <label for="comment">Add Cancellation Reason:</label>
                    <input type="text" class="form-control" placeholder="Enter reasonName" value="<?php if(!empty($select_cancel_reason_list->reasonName)) { echo $select_cancel_reason_list->reasonName; } ?>" name="reasonName">       
               </div>    
               
               
               
               
                <input type="submit" class="btn btn-default" name="submit" value="Save">
              </form>
              
              
              
             <div style="margin-top:50px;">
              <table  id="example1"  class="table table-bordered table-striped">
                <thead>
                  <tr>
                     <th>Cancellation Reason</th>
                   
                     <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($cancel_reason_list_all as $val) { ?>
                  <tr>
                   <td><?php echo $val->reasonName; ?></td>
                   
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>settings/addCancellationReason?action=edit&id=<?php echo @$val->reason_id; ?>"> Edit</a></li>
                             
                              <li ><a href="<?php echo base_url(); ?>settings/addCancellationReason?action=delete&id=<?php echo @$val->reason_id; ?>">Delete</a></li>
                            
                            </ul>
                          </div>
                        
                    </td>
                  </tr>
                  <?php } ?>
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
</body>
</html>

    
    
    
 