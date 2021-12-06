
    
    
    
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
     Add Product Type    
      </h1>
      <?php if($_SESSION['logtype']=="Super Admin") { ?> 
    <div style="margin-left: 300px; margin-top: -40px;">
      <a href="<?php echo base_url() ?>PropertyController/place" class="btn btn-success">PlaceType</a>
      <a href="<?php echo base_url() ?>PropertyController/productlist" class="btn btn-primary">ProductList</a>
       <a href="<?php echo base_url() ?>PropertyController/addcomplain_new" class="btn btn-warning">AddComplainNew</a>
       <a href="<?php echo base_url() ?>PropertyController/viewComplain" class="btn btn-info">ViewComplain</a>
    </div>
    <?php } ?>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Add Product Type </li>
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
                   
                 
               <form  method="post" action="<?php echo base_url(); ?>PropertyController/producttype">
                  <input type="hidden" name="update_id" value="<?php if(!empty($select_producttype->product_type_id)) { echo $select_producttype->product_type_id; } ?>">

                   

                   <div class="form-group">  
                   <label for="comment">Product Type Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Place name" value="<?php if(!empty($select_producttype->product_name)) { echo $select_producttype->product_name; } ?>" name="product_name">       
               </div>    
               
               
               
               
                <input type="submit" class="btn btn-default" name="submit" value="Save">
              </form>
              
              
              
             <div style="margin-top:50px;">
              <table  id="example1"  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    
                     <th>Product Type</th>
                     <th>Status</th>

                   
                     <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($all_producttype as $val) {  ?>
                  <tr>
                     <td><?php echo $val->product_name; ?></td>

                    <td><?php if($val->product_status==0){ echo "Active"; } else  { echo "Deactive"; }  ?></td>
                  
                   
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>PropertyController/producttype?action=edit&id=<?php echo @$val->product_type_id; ?>"> Edit</a></li>
                             <?php if($val->product_status==0) { ?>
 <li ><a href="<?php echo base_url(); ?>PropertyController/producttype?action=delete&id=<?php echo @$val->product_type_id; ?>&status=<?php echo $val->product_status; ?>">Deactive</a></li>
                             <?php }else { ?>
 <li ><a href="<?php echo base_url(); ?>PropertyController/producttype?action=delete&id=<?php echo @$val->product_type_id; ?>&status=<?php echo $val->product_status; ?>">Active</a></li>
                             <?php } ?>
                             

                              
                            
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

    
    
    
 