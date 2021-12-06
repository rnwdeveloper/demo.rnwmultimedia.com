
    
    
    
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
Leads/Enquiry Source        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Source</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if(!empty($msg_alert)) { ?>
     	            <div class="col-md-8" >
     	        
     	        <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-red"><?php echo $msg_alert; ?></div>
     	    </div>
     	    <?php } ?>
     	    
		
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            
            <form class="form-inline" action="<?php echo base_url(); ?>settings/source" method="post">
            <div class="form-group">
             <input type="hidden" name="update_id" value="<?php if(!empty($select_source->source_id)) { echo $select_source->source_id; } ?>">
              <input type="text" class="form-control" value="<?php if(!empty($select_source->source_name)) { echo $select_source->source_name; } ?>"  placeholder="Enter Source" name="source_name">
            </div>
           
            <input type="submit" class="btn btn-default" value="ADD" name="submit">
          </form>
           
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Source</th>
                   <th>Status</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($source_all as $val) { ?>
                <tr>
                  <td><?php echo $val->source_name; ?></td>
                  <td><label style="color:#a6a6a6"> <?php if($val->source_status=="0" || $val->source_status=="2") { echo "Active"; } if($val->source_status=="1") { echo  "Disable"; } ?> </label></td>
                 	<td>
                 	    
                  	  
                  	    <?php if($val->source_status!="2") { ?>
                  	         <div class="dropdown">
                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>settings/source?action=edit&id=<?php echo @$val->source_id; ?>"> Edit</a></li>
                              <?php if($val->source_status==0) { ?>
                              <li ><a href="<?php echo base_url(); ?>settings/source?action=delete&id=<?php echo @$val->source_id; ?>&status=<?php echo @$val->source_status; ?>">Disable</a></li>
                              <?php } else {  ?>
                              
                              <li ><a href="<?php echo base_url(); ?>settings/source?action=delete&id=<?php echo @$val->source_id; ?>&status=<?php echo @$val->source_status; ?>">Active</a></li>
                             <?php } ?>
                            </ul>
                          </div>
                  	    <?php } ?>
                  	</td>
                </tr>
                
             <?php } ?>
                
                </tfoot>
              </table>
          		
            
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
    
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
  }
</script>


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
