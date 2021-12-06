
    
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
    .modal-dialog{
     
        bottom: 10%;
        top:15%;
        width: 60%;
    }
    .modal-header{
      background: #3c8dbc;
    }
    .modal-title{
      color: white;
    }
  </style>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Add Complain   
      </h1>
      <?php if($_SESSION['logtype']=="Super Admin") { ?> 
    <div style="margin-left: 320px; margin-top: -40px;">
      <a href="<?php echo base_url() ?>PropertyController/place" class="btn btn-success">PlaceType</a>
      <a href="<?php echo base_url() ?>PropertyController/producttype" class="btn btn-primary">productType</a>
      <a href="<?php echo base_url() ?>PropertyController/productlist" class="btn btn-warning">ProductList</a>
       <a href="<?php echo base_url() ?>PropertyController/viewComplain" class="btn btn-info">ViewComplain</a>
    </div>
    <?php } ?>
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
            <!-- /.box-header -->
             <?php if(!empty($msg_alert)) { ?>
     	            <div class="col-md-8" >
     	        
     	        <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-red"><?php echo $msg_alert; ?></div>
     	    </div>
     	    <?php } ?>
           <div class="row"> 
               <div class="col-md-4">
                   
                 
               <form  method="post" action="<?php echo base_url(); ?>PropertyController/addcomplain_new">
                  <input type="hidden" name="update_id" value="<?php if(!empty($select_place->product_id)) { echo $select_place->product_id; } ?>">

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
                      <select name="place_type_id" id="place_type_id" class="form-control" required>
                        <option value="">Select Place</option>

                        <?php  foreach($all_place as $val) { ?>
                            <option <?php if(@$select_place->place_type_id==$val->place_type_id) { echo "selected"; } ?> value="<?php echo $val->place_type_id; ?>"><?php echo $val->place_name; ?> - <?php  foreach($all_branch as $row) { if($row->branch_id==$val->branch_id) { echo $row->branch_name; } } ?></option>
                        <?php } ?>

                      </select>      
                    </div>  

                    <div class="form-group">  
                     <label for="comment">Select Property Type:</label>
                      <select name="product_type_id" class="form-control" id="product_type_id" required onchange="selectproduct()" >
                        <option value="">Select Property Type</option>

                        <?php  foreach($all_product_type as $val) { ?>
                            <option <?php if(@$select_product->product_type_id==$val->product_type_id) { echo "selected"; } ?> value="<?php echo $val->product_type_id; ?>"><?php echo $val->product_name; ?></option>
                        <?php } ?>

                      </select> 
                    </div>  


                   <div class="form-group" id="list_box">  
                     <label for="comment">Select List of property:</label>
                      <select name="list_property" id="list_property" class="form-control" required onchange="select_list()">                        
                      
               </select>   
             
            <div class="modal fade" id="dialog-modal" role="dialog">                

              
            <div class="modal-dialog">
               
            
              <!-- Modal content-->
             
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times</button>
                  <h3 class="modal-title">Add-Complain</h3>
                </div>
                <div class="modal-body">
                  <table class="table table-bordered">
          <thead>
            <tr>
              <th>Propery Description</th>
              <th>Add Complain</th>
            </tr>
          </thead>
          <tbody>                                  
            <tr>
              <td id="demo_data"></td> 
            
            <td>
              <div>                
                <textarea rows = "5" cols = "50" name = "complain"></textarea><br>
              <input type = "submit" value = "submit" name="submit" class="btn btn-primary">

            </div>
            </td>
          </tr>
           
         
          </tbody>
        </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
              </div>
              
            </div>
          </div>
          
        </div>


                  
                  <!-- <div id="msg"></div> -->
              <!-- <div>
              <label>Add Complain:</label>                 
                <textarea rows = "5" cols = "50" name = "complain"></textarea>
              <input type = "submit" value = "submit" class="btn btn-primary">
            </div> -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                       
              </form>              
              
             
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
    
    <strong>Copyrightę2018 Red & White Multimedia.</strong> All rights
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

<script>
  function selectproduct()
  {
    var product_id = $('#product_type_id').val();
    var branch_id = $('#branch_id').val();
     var place_id = $('#place_type_id').val();

    // alert(place_id);
    $.ajax({
      url:"<?php echo base_url(); ?>PropertyController/productWise",
      type:"post",
      data:{
        'product_type_id': product_id,
        'branch_id' : branch_id,
        'place_id' : place_id
      },
      success : function(data){
        // $('#msg').html(data);
        $('#list_property').html(data);
      
      }

    });
      
  } 


 function select_list()
  {

    // $('#list_property').change(function(){
        //alert($('#list_property').val());
        var m = $('#list_property').val();
        

          $.ajax({
      url:"<?php echo base_url(); ?>PropertyController/demo_data",
      type:"post",
      data:{
       d_id : m
      },
      success : function(data){
        // $('#msg').html(data);
        $('#demo_data').html(data);
      
      }

    });
    //});
      $('#dialog-modal').modal("show");
  } 
  

  // $(document).ready(function(){
  //   $('#list_property').change(function(){
  //       alert($(this).val());
  //   });
  // });

</script>

</body>
</html>

    
    
    
 