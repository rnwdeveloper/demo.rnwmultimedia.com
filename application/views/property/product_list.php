

    

    

    

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

     Property List    

      </h1>

      <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=='Access Property') { ?>

    <div style="margin-left: 320px; margin-top: -40px;">

      <a href="<?php echo base_url() ?>PropertyController/place" class="btn btn-success">PlaceType</a>

      <a href="<?php echo base_url() ?>PropertyController/producttype" class="btn btn-primary">productType</a>

       <a href="<?php echo base_url() ?>PropertyController/addcomplain_new" class="btn btn-warning">AddComplainNew</a>

       <a href="<?php echo base_url() ?>PropertyController/viewComplain" class="btn btn-info">ViewComplain</a>

    </div>

    <?php } ?>

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

       

        <li class="active">Property List</li>

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

                   

                 

               <form  method="post" action="<?php echo base_url(); ?>PropertyController/productlist">

                  <input type="text" name="update_id" value="<?php if(!empty($select_place->product_id)) { echo $select_place->product_id; } ?>">



                    <div class="form-group">  

                     <label for="comment">Select Branch:</label>

                      <select name="branch_id" class="form-control" id="branch_id" required onchange="selectPlace()" >

                        <option value="">Select Branch</option>



                        <?php  foreach($all_branch as $val) { ?>

                            <option <?php if(@$select_place->branch_id==$val->branch_id) { echo "selected"; } ?> value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>

                        <?php } ?>



                      </select>      

                    </div>  



                    <div class="form-group" id="place_box">  

                     <label for="comment">Select Branch Place:</label>

                      <select name="place_type_id" class="form-control" required>

                        <option value="">Select Place</option>



                        <?php  foreach($all_place as $val) { ?>

                            <option <?php if(@$select_place->place_type_id==$val->place_type_id) { echo "selected"; } ?> value="<?php echo $val->place_type_id; ?>"><?php echo $val->place_name; ?> - <?php  foreach($all_branch as $row) { if($row->branch_id==$val->branch_id) { echo $row->branch_name; } } ?></option>

                        <?php } ?>



                      </select>      

                    </div>  





                    <div class="form-group">  

                     <label for="comment">Select Property Type:</label>

                      <select name="product_type_id" class="form-control" required>

                        <option value="">Select Property Type</option>



                        <?php  foreach($all_product_type as $val) { ?>

                            <option <?php if(@$select_place->product_type_id==$val->product_type_id) { echo "selected"; } ?> value="<?php echo $val->product_type_id; ?>"><?php echo $val->product_name; ?></option>

                        <?php } ?>



                      </select>      

                    </div>  



                   <div class="form-group">  

                   <label for="comment">Property Name:</label>

                    <input type="text" class="form-control" placeholder="Enter Property name" value="<?php if(!empty($select_place->product_name)) { echo $select_place->product_name; } ?>" name="product_name">       

                   </div> 





                   <div class="form-group">  

                   <label for="comment">Property Description:</label>

                  

                    <textarea name="product_decription" rows="5" class="form-control"><?php if(!empty($select_place->product_decription)) { echo $select_place->product_decription; } ?></textarea>    

                   </div>    

               

               

               

               

                <input type="submit" class="btn btn-default" name="submit" value="Save">

              </form>

              

              

              

             <div style="margin-top:50px;">

              <table  id="example1"  class="table table-bordered table-striped">

                <thead>

                  <tr>

                    <th>Property Id</th>

                      <th>Branch</th>

                     <th>Place </th>

                     <th>Property Type</th>

                     <th>Name</th>

                     <th>Description</th>

                     <th>Status</th>

                    <th>Action</th>

                   

                  </tr>

                </thead>

                <tbody>

                    <?php foreach($all_product as $val) {  ?>

                  <tr>

                    <td><?php echo $val->product_id;  ?></td>

                     <td><?php  foreach($all_branch as $row) { if($row->branch_id==$val->branch_id) { echo $row->branch_name; } } ?></td>

                   <td>

                     <?php  foreach($all_place as $row) { 

                        if($row->place_type_id==$val->place_type_id) { echo $row->place_name; }

                     }?>

                   </td>

                   <td>

                     <?php  foreach($all_product_type as $row) { 

                          if($row->product_type_id==$val->product_type_id) { echo $row->product_name; }

                       }?>

                   </td>

                   <td><?php echo $val->product_name; ?></td>

                   <td><?php echo $val->product_decription; ?></td>



                    <td><?php if($val->product_status==0){ echo "Active"; } else  { echo "Deactive"; }  ?></td>

                  

                   

                    <td>

                        <div class="dropdown">

                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action

                            <span class="caret"></span></button>

                            <ul class="dropdown-menu">

                              <li><a href="<?php echo base_url(); ?>PropertyController/productlist?action=edit&id=<?php echo @$val->product_id; ?>"> Edit</a></li>

                               <li><a href="<?php echo base_url(); ?>PropertyController/productlist?action=delete_record&id=<?php echo @$val->product_id; ?>"> Delete</a></li>

                             <?php if($val->product_status==0) { ?>

 <li ><a href="<?php echo base_url(); ?>PropertyController/productlist?action=delete&id=<?php echo @$val->product_id; ?>&status=<?php echo $val->product_status; ?>">Deactive</a></li>

                             <?php }else { ?>

 <li ><a href="<?php echo base_url(); ?>PropertyController/productlist?action=delete&id=<?php echo @$val->product_id; ?>&status=<?php echo $val->product_status; ?>">Active</a></li>

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



    

    

    

 