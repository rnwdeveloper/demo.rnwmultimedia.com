
    
    
    
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
     Message Template      
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active"></li>
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
               <div class="col-md-8">
                   
                 
               <form  method="post" action="<?php echo base_url(); ?>Settings/setMsgTemplate">
                  <input type="hidden" name="update_id" value="<?php if(!empty($select_msg_template->msg_template_id)) { echo $select_msg_template->msg_template_id; } ?>">
                   <div class="form-group">  
                   <label for="comment">Category:</label>
                <select  class="form-control" name="msg_category_name"  required>
                        	<option value="">Select Tempalte Category</option>
                            <?php foreach($msg_template_category_all as $row) { ?>
							<option <?php if(@$select_msg_template->msg_category_name==$row->msg_category_name) { echo "selected"; } ?>  value="<?php echo $row->msg_category_name; ?>"><?php echo $row->msg_category_name; ?></option>                      
                     	<?php  } ?>
                </select>       
               </div>    
               
               <div class="form-group">
                  <label for="comment">Message Template:</label>
                  
                  <textarea class="form-control" rows="5" name="msg_template_text"><?php if(!empty($select_msg_template->msg_template_text)) { echo $select_msg_template->msg_template_text; } ?></textarea>
                </div>
               
               
                <input type="submit" class="btn btn-default" name="submit" value="Save">
              </form>
              
              
              
             <div style="margin-top:50px;">
              <table  id="example1"  class="table table-bordered table-striped">
                <thead>
                  <tr>
                     <th>categories</th>
                    <th>Message Template</th>
                     <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($msg_template_all as $val) { ?>
                  <tr>
                   <td><?php echo $val->msg_category_name; ?></td>
                    <td><?php echo $val->msg_template_text; ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>settings/setMsgTemplate?action=edit&id=<?php echo @$val->msg_template_id; ?>"> Edit</a></li>
                             
                              <li ><a href="<?php echo base_url(); ?>settings/setMsgTemplate?action=delete&id=<?php echo @$val->msg_template_id; ?>">Delete</a></li>
                            
                            </ul>
                          </div>
                        
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
             </div> 
             
              </div>
              
               <div class="col-md-4" style="padding:20px">
                   <h4>Instructions For create Message Template:</h4>
                   <p>
                       
                        Step 1: select Message Category.
                        
                     <br>  <br> Step 2: Enter your Message Template.
                        
                  <br>  <br>    <b> if you want to add specific student details into Message Template:-</b>
                                
                   <br>   <br>   Student Name : [student_name]
                  <br>  <br>     Demo Date : [demo_date]
                  <br>  <br>     Demo Time : [demo_time]
                   <br>  <br>     Course : [course]
                   <br>  <br>     Faculty Name: [faculty]
                   <br>  <br>     Branch Name: [branch]
                    <br>  <br> 
                   <b>For Example :</b>
                   <br>
                   Dear [student_name] , this is a friendly reminder from red & white multimedia education about your [course] demo start from Today [demo_time]
                   
                       
                   </p>
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

    
    
    
 