
    
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
     View Grade Questions


                <div class="form-group" style="float:right;margin-top: 10px;">
                      <div class="col-md-2">
                        <a id="add-more" name="add-more" class="btn btn-primary" href="<?php echo base_url(); ?>FormController/add_questions_grade" >Add Student Grade Questions</a>
                      </div>
                    </div>    
                    <br>
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
      

                 <?php if($this->session->flashdata('msg_alert')!= '') { ?>
                      


                      <div class="alert alert-warning alert-dismissible col-md-4" role="alert" style="margin-top: 10px;">
                        <strong></strong> <?php echo $this->session->flashdata('msg_alert'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

              <?php 
              $this->session->set_flashdata('msg_alert','');
            } ?>
            <?php $i=1; 

            foreach(@$allgrade as $gs) { 
            
              ?>
            <section class="content" style="">
    <div class="col-md-12" >
      <div class="box box-success" style="padding:10px;">
        <div class="row"> 
          <div class="col-md-12">
            <form  method="post" action="<?php echo base_url(); ?>FormController/add_questions_grade">
             <div class="form-group" style="background-color: red;">
              <label class="col-md-2 control-label" for="action_id">Header Name</label>  
              <div class="col-md-3" style="font-size: 20px;">
                <?php echo @$gs[0]->header; ?>
              </div>
                  
              <div class="col-md-2" style="font-size:20px;">
                <?php echo @$gs[0]->total_weightege ; ?>
              </div>
            </div>
            <br>
            <?php for($j=0;$j<sizeof($gs);$j++) { ?>
                <div id="first">
                  <div id="field0">
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="action_name">Question 1</label>  
                      <div class="col-md-6">
                       <?php echo $gs[$j]->question; ?>
                      </div>
                      

                      <div class="col-md-2">
                        <?php echo $gs[$j]->percentage; ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="col-md-2">
                        <a id="add-more" name="add-more" class="btn btn-primary" href="<?php echo base_url(); ?>FormController/viewgradeStudentsQuestions/<?php echo $gs[$j]->grade_student_id; ?>">Delete</a>
                      </div>
                    </div>
                </div>
            <?php } ?>
                     
          </div>
        </div>    
      </div>
    </div>
  </section>
          <?php $i++; } ?>
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
  


  //session automatic  
    $(document).ready(function(){
        var submenu = sessionStorage.getItem("submenu");
         var leadsubmenu = sessionStorage.getItem("leadsubmenu");
           $('#sub_menu_'+submenu).addClass('show');
           $('#lead_submenu_'+leadsubmenu).addClass('show');
    });

    function getClick(id,subid){
      sessionStorage.setItem("submenu", id);
      sessionStorage.setItem("leadsubmenu", subid);
    }
//end session of sidebar menu open 


  
</script>

</body>
</html>

    
    
    
 