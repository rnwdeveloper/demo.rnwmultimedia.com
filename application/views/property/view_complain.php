

    

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

  

  

  

 <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

     Complain List    

      </h1>

      <?php 

  
      if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=='Access Property') { ?> 

    <div style="margin-left: 320px; margin-top: -40px;">

      <a href="<?php echo base_url() ?>PropertyController/place" class="btn btn-success">PlaceType</a>

      <a href="<?php echo base_url() ?>PropertyController/producttype" class="btn btn-primary">productType</a>

      <a href="<?php echo base_url() ?>PropertyController/productlist" class="btn btn-warning">ProductList</a>

      <a href="<?php echo base_url() ?>PropertyController/addcomplain_new" class="btn btn-info">AddComplainNew</a>

    </div>

    <?php } ?>

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

       

        <li class="active">Complain List</li>

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

                   

              

             <div style="margin-top:50px;">

              <table  id="example1"  class="table table-bordered table-striped">

                <thead>

                  <tr>

                     <th>Complain Show</th>

                    <th>Complain Id</th>

                    <th>Complain Status</th>

                   

                    <th>Complain By</th>

                      <th>Property</th>

                     <th>Action</th>

                    

                    

                  </tr>

                </thead>

                <tbody>

                    <?php foreach($all_product_enquiry as $val) { 



                        if(in_array($val->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Access Property") {

                     ?>

                  <tr>

                    <td><?php if($val->enquiry_show==1) {  ?>  <i style="color: green" class="fa fa-fw fa-eye"></i>  <?php } else { ?>   <i class="fa fa-fw fa-eye-slash" style="color: red"></i> <?php } ?></td>

                    <td><?php echo $val->product_enquiry_id;  ?></td>

                    <td>

                      <?php if($val->enquiry_status==0) { ?>

                        <span class="label label-warning">Pending</span>

                      <?php } ?>



                      <?php if($val->enquiry_status==1) { ?>

                        <span class="label label-info">Processing</span>

                      <?php } ?>



                       <?php if($val->enquiry_status==2) { ?>

                        <span class="label label-success">Completed</span>

                      <?php } ?>



                      <?php if($val->enquiry_status==3) { ?>

                        <span class="label label-danger">Cancel</span>

                      <?php } ?>



                    </td>

                    

                    <td><?php echo $val->user_name;  ?> <br> <?php echo $val->enquiry_timestamp;  ?></td>

                     <td><?php  echo $val->kya; ?></td>

                      <td><a class="btn  btn-success btn-sm" href="<?php echo base_url(); ?>PropertyController/scomplain/<?php echo $val->product_enquiry_id;  ?>">View</a></td>

                  

                    

                

                  </tr>

                  <?php } } ?>

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



<script>

  function selectPlace()

  {

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

</script>



</body>

</html>



    

    

    

 