
    
    
    
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
     Add Complain   
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Add Complain</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       
     	    
		
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
              
            </div>
           
           <div class="row"> 
               <div class="col-md-12">
                   <p style="color: green"><?php echo @$msg; ?></p>
                 
                    <table class="table table-bordered" border="1" cellspacing="0" cellpadding="15">
                    <?php foreach ($all_branch as $brans) { if($brans->branch_status==0) { ?>
                     <?php $p=1; foreach($all_place as $place) { if($place->place_status==0 && $place->branch_id==$brans->branch_id) { $p++; } } ?>


                    <tr>
                      <td rowspan="<?php echo $p; ?>"><?php echo $brans->branch_name; ?></td>
                      <td></td>
                      <td></td>
                    </tr>

                     <?php  foreach($all_place as $place) { if($place->place_status==0 && $place->branch_id==$brans->branch_id) { ?>
                    <tr>
                      <td><?php echo $place->place_name; ?></td>
                      <td>
                       <?php foreach($all_product_type as $tt) { if($tt->product_status==0) {
                            $t_p=0;
                            foreach($all_product as $prod)
                            {   if($tt->product_status==0) {
                                if($brans->branch_id==$prod->branch_id && $place->place_type_id ==$prod->place_type_id && $tt->product_type_id==$prod->product_type_id)
                                {
                                    $t_p++;
                                }
                            } }

                         ?>
                        <button class="btn btn-xs btn-success" onclick="selectProperty(<?php echo $brans->branch_id; ?>,<?php echo $place->place_type_id; ?>,<?php echo $tt->product_type_id; ?>)"><?php echo $tt->product_name; ?> : <?php echo $t_p; ?></button>
                        <?php } } ?>
                     

                      </td> 
                    </tr>
                    <?php } } ?>
                    


                    
                    <?php } } ?>


                    </table>
             
              <div id="propery_box">

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

<script type="text/javascript">
  function selectProperty(branch_id,place_type_id,product_type_id)
  {
     $.ajax({
      url:"<?php echo base_url(); ?>PropertyController/selectProperty",
      type:"post",
      data:{
        'branch_id':branch_id,
        'place_type_id':place_type_id,
        'product_type_id':product_type_id
      },
      success : function(data){
        $('#propery_box').html(data);
        $('#myModalp').modal("show");
      
      }
    });
  }
</script>

</body>
</html>

    
    
    
 