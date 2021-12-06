<!--===============================================================================================-->

    
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
        FORM
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">form</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php if(!empty($msg)) { ?>
         	    <div class="col-md-12" >
         	        
         	        <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $msg; ?></div>
         	    </div>
         	    <?php } ?>
              <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Manager" || $_SESSION['logtype']=="Admin") { ?>
    		 <div class="col-md-6">
              <!-- general form elements -->
              <?php if($_SESSION['logtype']!="Access Document" && $_SESSION['logtype']!="Faculty") { ?>
             <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
              <h3 class="box-title">ADD FORM</h3>
            </div>
           
            
            
           
				
				
				 <form class="login100-form validate-form" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>FormController/managementForm">
				    	<input type="hidden" name="update_id" value="<?php if(!empty($select_form->form_id)) { echo $select_form->form_id; } ?>"/>
                  

                                     <table class="table">
                      <tr>
                        <th>Name</th>
                        <th>Asssign <input type="checkbox"  id="CheckALL"></th>
                      </tr>


                      <?php foreach ($log_all as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value->logtype_name; ?></td>
                        <td><input type="checkbox" name="logall[]" value="<?php echo $value->logtype_name; ?>" <?php if(!empty($select_form->permission)) { $pall = explode(",", $select_form->permission);foreach ($pall as $k => $v) {if($v == $value->logtype_name){ echo "checked";} } } ?> class="check"></td>
                      </tr>
                      <?php } ?>
                   
                   </table>



                  <div class="form-group" >
                    <label for="pwd">Form Name:</label>
                   <input class="form-control"  value="<?php if(!empty($select_form->form_name)) { echo $select_form->form_name; } ?>"  type="text"  name="form_name" placeholder="Form Name" required>
                  </div>
                  
                  
                 

                  <div class="form-group" >
                    <label for="pwd">Upload Form :</label>
                    <input type="file" name="form_file">
                  </div>
                  
                  <input type="submit" name="submit" value="Save" class="btn btn-primary" />
                </form> 
          </div>
            <?php } ?>
            </div>
          <?php } ?>
        </div>
        <div class="row">
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Display Form</h3>
            </div>
            <!-- /.box-header -->
           
              <table id="example1" class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  
                  <th>Form Name</th>
                  <th>Download</th>
                   <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']== "Admin") { ?>
                   <th>Permission</th>
                   <?php } ?>
                 <?php if($_SESSION['logtype']=="Access Document" || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin")   { ?>
                  <th>action</th>
                <?php } ?>
                </tr>
                </thead>
                <tbody>
                 <?php if($_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin"){ ?>


                  <?php foreach($form_all as $val) { 
                   
                     
                  ?>
                <tr>
                  
                  <td><?php echo $val->form_name; ?>
                   
                  </td>
                  
                   <td><a target="_blank" href="<?php echo base_url(); ?>dist/signsheet/<?php echo $val->form_file; ?>">Download</a></td>
                   <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']== "Admin") { ?>
                   <td width="300px;"><?php echo $val->permission; ?></td>
                   <?php } ?>
                  
                  <?php if($_SESSION['logtype']=="Access Document" || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin")  { ?>
                  <td>
                           <div class="dropdown">
                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>FormController/managementForm?action=edit&id=<?php echo @$val->form_id; ?>"> Edit</a></li>
                             
                              <li ><a href="<?php echo base_url(); ?>FormController/managementForm?action=delete&id=<?php echo @$val->form_id; ?>&status=<?php echo @$val->status; ?>">Delete</a></li>
                              
                            </ul>
                          </div>
                      
                  </td>
                 <?php } ?>
                  
                </tr>
                
             <?php } ?>

                 <?php }else{ ?>

          <?php foreach($form_all as $val) { 

                    $fpall = explode(",", $val->permission);
                    foreach ($fpall as $m => $n) {

                      if($n == "HOD")
                      {
                        $n = strtolower($_SESSION['logtype']);
                      }
                      if($n == $_SESSION['logtype']){
                     
                  ?>
                <tr>
                  
                  <td><?php echo $val->form_name; ?>
                   
                  </td>
                  
                   <td><a target="_blank" href="<?php echo base_url(); ?>dist/signsheet/<?php echo $val->form_file; ?>">Download</a></td>
                   <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']== "Admin") { ?>
                   <td width="300px;"><?php echo $val->permission; ?></td>
                   <?php } ?>
                  
                  <?php if($_SESSION['logtype']=="Access Document" || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin")   { ?>
                  <td>
                           <div class="dropdown">
                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>FormController/managementForm?action=edit&id=<?php echo @$val->form_id; ?>"> Edit</a></li>
                             
                              <li ><a href="<?php echo base_url(); ?>FormController/managementForm?action=delete&id=<?php echo @$val->form_id; ?>&status=<?php echo @$val->status; ?>">Delete</a></li>
                              
                            </ul>
                          </div>
                      
                  </td>
                 <?php } ?>
                  
                </tr>
                
             <?php } }}?>
                 <?php } ?>
                </tbody>
                </tfoot>
              </table>
          		
            
          </div>
        
        </div>
        </div>
        <div class="col-ms-12">
            <div id="viewc"></div>
            
        </div>
    </section>
    <!-- /.content -->
  </div>

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
    $('.num_of_emp').keyup(function () { 
    this.value = this.value.replace(/[^0-9.]/g,'');
});
    
</script>
<script>
    
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
  }
</script>
<script>
    function viewCourse(id)
    {
        
       $.ajax({
           url:"<?php echo base_url(); ?>settings/view_course_package",
           type:"post",
           data:{
               'package_id':id
               
           },
           success: function(data) {
                $('#viewc').html(data);
                $('#myModal_course').modal('show');
            }
           
       });
    }
    
    
</script>

<script>
  $(function () {
    $('#example1').DataTable({
        "pageLength": 50
    })
    $('#example5').DataTable()
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
  
  $(document).ready(function(){
    $('#CheckALL').click(function(){
        if($(this).is(":checked"))
        {
            $('.check').each(function(){
                $(this).prop('checked',true);
            });
        }
        else
        {
            $('.check').each(function(){
                $(this).prop('checked',false);
            });
        }
    });
  });
</script>
</body>
</html>
