<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assetslogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assetslogin/css/main.css">
    
    
    
    
    
    
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
Settings        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if(!empty($msg_alert)) { ?>
     	            <div class="col-md-8" >
     	        
     	        <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-red"><?php echo $msg_alert; ?></div>
     	    </div>
     	    <?php } ?>
     	    
	
        
       
    
    
    
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
              <h3 class="box-title">Add IP Address</h3>
            </div>
           
            <div class="row">
            <div class="col-sm-6">
                <form  method="post" action="<?php echo base_url(); ?>settings/softset"> 
            
            	<input type="hidden" name="update_id" value="<?php if(!empty($select_ip->address_id)) { echo $select_ip->address_id; } ?>"/>
            	
            	    	<div class="wrap-input100 validate-input" data-validate = "Branch Name is required: xyz" style="width:100%;">
						 <select  class="input100" name="branch_id"  style="height:30px; background-color:#F0F8FF; border:1px solid #004F9D">
                        	<option value="">Select Branch</option>
                            <?php foreach($branch_all as $row) { 
					  ?>
                      
							<option <?php if(@$select_ip->branch_id==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                      
                     	<?php  }  ?>
                        </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-home" aria-hidden="true"></i>
						</span>
					</div>
            	    <div class="wrap-input100 validate-input" data-validate = "Name is required: xyz" style="width:100%;">
						<input class="input100" value="<?php if(!empty($select_ip->address_name)) { echo $select_ip->address_name; } ?>" style=" background-color:#F0F8FF; border:1px solid #004F9D" type="text"  name="address_name" placeholder="Enter IP Addrees Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							
						</span>
					</div>
					 <div class="wrap-input100 validate-input" data-validate = "ip address is required: xyz" style="width:100%;">
						<input class="input100" value="<?php if(!empty($select_ip->address_ip)) { echo $select_ip->address_ip; } ?>" style=" background-color:#F0F8FF; border:1px solid #004F9D" type="text"  name="address_ip" placeholder="Enter IP Address">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							
						</span>
					</div>
                    
                    
					
				

					
					
					<div class="container-login100-form-btn">
						
                        <input type="submit" value="Submit" class="btn btn-primary" name="submit_ip"/>
					</div>

					
					
				</form>
			</div>
			<div class="col-sm-6">
			    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Address Name</th>
                  <th>IP Address</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($network_ip_all as $val) { ?>
                <tr>
                  <td><?php echo $val->address_name; ?></td>
                  <td><?php echo $val->address_ip; ?></td>
                 <td>
                 	    
                  	  
                  	
                  	         <div class="dropdown">
                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>settings/softset?action_ip=edit&id=<?php echo @$val->address_id; ?>"> Edit</a></li>
                              
                              <li ><a href="<?php echo base_url(); ?>settings/softset?action_ip=delete&id=<?php echo @$val->address_id; ?>">Delete</a></li>
                             
                              
                             
                             
                            </ul>
                          </div>
                  	
                  	</td>
                </tr>
                
             <?php } ?>
                
                </tfoot>
              </table>
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
