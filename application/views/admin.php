
    
    
    
    
    
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
Admin        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
		 <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Admin </h3>
               <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#mylogtype">Create Logtype</button>
            </div>
                
				 <form  method="post" action="<?php echo base_url(); ?>settings/admin">
				     <div class="row" style="padding:10px">
    				   <div class="col-md-6" >
    				    	<input type="hidden" name="update_id" value="<?php if(!empty($select_user->user_id)) { echo $select_user->user_id; } ?>"/>
                           <div class="form-group">
                            <label for="email">Logtype:</label>
                            
                            <input type="text" name="logtype" value="Admin" readonly class="form-control">
                          </div> 

                           <div class="form-group" >
                                            <label for="pwd">State:</label>
                                            <select class="form-control" name="state_id" id="state_id">
                                            <option value="0">select state</option>
                                                <?php foreach($state_all as $v){ ?>
                                                  <option value="<?php echo $v->state_id; ?>" <?php if(isset($m_all)){ if($v->state_id == $m_all->state_id){echo "selected";} }?> <?php if(isset($select_user) && $select_user->state_id == $v->state_id){ echo "selected"; } ?>><?php echo $v->state_name; ?></option>
                                                <?php } ?>
                                            </select>
                                          </div>

                        <div class="form-group" >
                                            <label for="pwd">City:</label>
                                            <select class="form-control" name="city_id" id="city_id">
                                            <option value="0">select city</option>

                                            <?php foreach($city_all as $v){ ?>
                                                  <option value="<?php echo $v->city_id; ?>"  <?php if($select_user->city_id == $v->city_id){ echo "selected"; } ?>><?php echo $v->city_name; ?></option>
                                                <?php } ?>
                                               
                                            </select>
                                          </div>
                        
                           <div class="form-group" >
                            <label for="pwd">Name:</label>
                           <input class="form-control"  value="<?php if(!empty($select_user->name)) { echo $select_user->name; } ?>"  type="text"  name="name" placeholder="Enter Name" required>
                          </div>
                          <div class="form-group" >
                            <label for="pwd">Email Id:</label>
                           <input class="form-control"  value="<?php if(!empty($select_user->email)) { echo $select_user->email; } ?>"  type="email"  name="email" placeholder="Enter Email" required>
                          </div>
                          <div class="form-group" >
                            <label for="pwd">Password :</label>
                           <input type="password" class="form-control"  value="<?php if(!empty($select_user->password)) { echo $select_user->password; } ?>"  type="text"  name="password" placeholder="Enter password" required>
                          </div>
                          <div class="form-group" >
                            <label for="pwd">Company Name:</label>
                           <input class="form-control"  value="<?php if(!empty($select_user->company_name)) { echo $select_user->company_name; } ?>"  type="text"  name="company_name" placeholder="Enter Company Name" required>
                          </div>
                         <!--  <div class="form-group" >
                            <label for="pwd">Company Code:</label>
                           <input type="text" class="form-control"  value="<?php if(!empty($select_user->company_code)) { echo $select_user->company_code; } ?>"  type="text"  name="company_code" placeholder="Enter Company Code" required>
                          </div>   -->
                        </div>  
                           <div class="col-md-6" >
                                               
                            <div class="form-group"  id="permission_all">
                               
                            <label for="pwd">Permission :-</label>
                            
                            <br><br>
                            <?php  if(isset($_GET['id']) && !empty($_GET['id'])){ ?>
                                                 <?php foreach ($f_module as $key => $value) { ?>
                            <h3><?php echo $value->f_module_name; ?><input type="checkbox" name="fp[]" value="<?php echo $value->f_module_name; ?>" <?php if(isset($select_user->f_permission) && in_array($value->f_module_name, explode(",",$select_user->f_permission))){echo "checked";} ?>></h3>
                            <?php foreach($m_module as $m){ 
                            if($m->f_module_id == $value->f_module_id){
                            ?>
                            <label for="pwd"><?php echo $m->module_name; ?> <input type="checkbox" name="m_all[]" value="<?php echo $m->module_name; ?>"<?php if(isset($select_user->m_permission) && in_array($m->module_name, explode(",",$select_user->m_permission))){echo "checked";} ?>>:</label>
                            <br>
                                <?php foreach($l_module as $k=> $l){ 
                                if($l->m_module_id == $m->m_module_id){
                            ?> 
                        <label style="width:30%;font-weight: normal;"><?php echo $l->name; ?> </label> 
                                    <label class="radio-inline">
                                      <input type="checkbox" name="f_all[]"  value="<?php echo $l->name ;?>" <?php if(isset($select_user->permission) && in_array($l->name, explode(",",$select_user->permission))){echo "checked";} ?>>Yes
                                    </label>
                                   
                                    <br>
                          <?php } } } } }  ?>   


                            <?php }else{ ?>
                            <?php foreach ($f_module as $key => $value) { ?>
                            <h3><?php echo $value->f_module_name; ?><input type="checkbox" name="fp[]" value="<?php echo $value->f_module_name; ?>" onclick="change_mod(<?php echo $value->f_module_id; ?>)"></h3>
                            <div id="all_change_mod<?php echo $value->f_module_id; ?>"></div>
                           <?php } ?>
                            <?php } ?>
                                
                         </div>
                        </div>  
                        <div class="col-md-12" >
                          <input type="submit" name="submit" value="Save" class="btn btn-success pull-right" />
                        </div> 
                      
                  </div>
                </form> 
          </div>
        
        </div>
        </div>
       
        <div class="row">
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Display User</h3>
            </div>
            <!-- /.box-header -->
           
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Logtype</th>
                  <th>Name</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Satus</th>
                  <th>Last Seen</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($user_all as $val) { 
                  if($val->logtype == "Admin"){
                  ?>
                <tr>
                    <td><?php echo $val->logtype; ?></td>
                	<td><?php echo "Name : ".$val->name; ?>   
                  <?php echo "<br>Email : ".$val->email; ?>
                  <?php echo "<br>company Name : ".$val->company_name; ?>
                  <?php echo "<br>company Code : ".$val->company_code; ?> 
                   </td>
                  <td><?php $state_id = explode(",",$val->state_id);
                        foreach($state_all as $row) { if(in_array($row->state_id,$state_id)) {  echo $row->state_name."<br>"; }  } ?></td>
                  <td><?php $city_id = explode(",",$val->city_id);
                          foreach($city_all as $row) { if(in_array($row->city_id,$city_id)) {  echo $row->city_name."<br>"; }  } ?></td>
                          <td><label style="color:#a6a6a6"> <?php if($val->user_status=="0") { echo "Active"; } if($val->user_status=="1") { echo  "Disable"; } ?> </label></td>
                  <td><?php echo $val->timestamp; ?></td>        
                  <td>
                   <div class="dropdown">
                            <button class="btn btn-sm btn-success dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>settings/admin?action=edit&id=<?php echo @$val->user_id; ?>"> Edit</a></li>
                              <li><a href="<?php echo base_url(); ?>settings/admin?action=delete&id=<?php echo @$val->user_id; ?>">Delete</a></li>
                              <?php if($val->user_status==0) { ?>
                              <li ><a href="<?php echo base_url(); ?>settings/admin?action=status&id=<?php echo @$val->user_id; ?>&status=<?php echo @$val->user_status; ?>">Disable</a></li>
                              <?php } else {  ?>
                              
                              <li ><a href="<?php echo base_url(); ?>settings/admin?action=status&id=<?php echo @$val->user_id; ?>&status=<?php echo @$val->user_status; ?>">Active</a></li>
                             <?php } ?>
                            </ul>
                          </div>
                    
                    </td>
                  
                </tr>
                
             <?php } } ?>
                
                </tfoot>
              </table>
          		
            
          </div>
        
        </div>
        </div>
        
        
                             <div class="modal fade"  id="mylogtype" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Logtype</h4>
                            </div>
                            <div class="modal-body">
                                     <form method="post" action="<?php echo base_url(); ?>settings/admin">
                                         <input type="hidden" name="update_id" value="<?php if(!empty($select_logtype->logtype_id)) { echo $select_logtype->logtype_id; } ?>" >
                                      <div class="form-group">
                                        <label for="email">Log Type:</label>
                                        <input type="text" name="logtype_name" class="form-control" value="<?php if(!empty($select_logtype->logtype_name)) { echo $select_logtype->logtype_name; } ?>" placeholder="Enter Log Type">
                                      </div>
                                      
                                      <input type="submit" name="logtype_submit" class="btn btn-sm btn-success" value="Save">
                                    </form> 
                                    
                                    
                                    
                                     <table class="table" style="margin-top:15px;">
                                        <thead>
                                          <tr>
                                            <th>Logtype</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($logtype_all as $val) { ?>
                                          <tr>
                                            <td><?php echo $val->logtype_name; ?></td>
                                            <td><label style="color:#a6a6a6"> <?php if($val->status=="0") { echo "Active"; } if($val->status=="1") { echo  "Disable"; } ?> </label></td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                  <li><a href="<?php echo base_url(); ?>settings/user?logtype_action=edit&id=<?php echo @$val->logtype_id; ?>"> Edit</a></li>
                                                  <?php if($val->status==0) { ?>
                                                  <li ><a href="<?php echo base_url(); ?>settings/admin?logtype_action=delete&id=<?php echo @$val->logtype_id; ?>&status=<?php echo @$val->status; ?>">Disable</a></li>
                                                  <?php } else {  ?>
                                                  
                                                  <li ><a href="<?php echo base_url(); ?>settings/admin?logtype_action=delete&id=<?php echo @$val->logtype_id; ?>&status=<?php echo @$val->status; ?>">Active</a></li>
                                                 <?php } ?>
                                                </ul>
                                              </div>
                                                
                                                
                                            </td>
                                            
                                          </tr>
                                          <?php } ?>
                                        </tbody>
                                      </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
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
<?php if(!empty($select_logtype)) { ?>
<script>
    
    $('#mylogtype').modal("show");
</script>
<?php } ?>

<script>
  $(document).ready(function(){
 $('#state_id').change(function(){
 
  var s = $('#state_id').val();
 // alert(s);
  if(s !='')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>settings/fetch_cities",
    method:"POST",
    data:{s_id:s},
    success:function(data)
    {
     $('#city_id').html(data);
     // $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#getfaculty').html('<option value="">Select Faculty</option>');
   // $('#city').html('<option value="">Select City</option>');
  }

 });
});
</script>
<script type="text/javascript">
  function change_mod(id)
  {
   
      var a = id;
      $.ajax({
        url:"<?php echo base_url(); ?>settings/change_f_mod",
        type:'POST',
        data:{a_name:a},
        success:function(res){
          $('#all_change_mod'+id).html(res);
        }
      });
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
