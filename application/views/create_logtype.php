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
USER        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">user</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

              
                             <div class="row">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Logtype</h4>
                              <h2><a href="<?php echo base_url(); ?>Settings/permission_all_data"> Show all permission</a>
                              <a href="<?php echo base_url(); ?>Settings/personal_permission_all_data">Personal permission</a>
                              <a href="<?php echo base_url(); ?>Settings/personal_hod_permission_all_data">HoD</a>
                              <a href="<?php echo base_url(); ?>Settings/personal_user_permission_all_data">User</a>
                              </h2>
                            </div>
                            <div class="modal-body">

                            <div class="row">
                                     <form method="post" action="<?php echo base_url(); ?>settings/user_logtype">
                            <div class="col-md-12">
                                         <input type="hidden" name="update_id" value="<?php if(!empty($select_logtype->logtype_id)) { echo $select_logtype->logtype_id; } ?>" >
                            

                                      <?php if($_SESSION['logtype'] == "Super Admin"){ ?>
                                      <div class="form-group">
                                        <label for="email">Log Type:</label>
                                        <input type="text" name="logtype_name" class="form-control" value="<?php if(!empty($select_logtype->logtype_name)) { echo $select_logtype->logtype_name; } ?>" placeholder="Enter Log Type">
                                      </div>
                                      <?php } else{ ?>

                                       <div class="form-group">
                                        <label for="email">Parent Log Type:</label>
                                        <select class="form-control" name="parent_id" >
                                            <option value="0">---select Parent Logtype---</option>
                                            <?php foreach($log_all as $v){ if($v->parent_id == 0){?>
                                              <option value="<?php echo $v->logtype_id ?>" <?php if(isset($select_logtype)){ if($v->logtype_id == $select_logtype->parent_id){echo "selected";} }?>><?php echo $v->logtype_name; ?></option>
                                            <?php } }?>
                                            </select>

                                      </div>

                                        <div class="form-group">
                                        <label for="email">LogType NAME:</label>
                                        <select class="form-control" name="logtype_name" >
                                            <option value="0">---select Logtype Name---</option>
                                            <?php foreach($log_all as $v){  if($v->parent_id == 0 && $v->logtype_name!="Admin"){?>
                                              <option value="<?php echo $v->logtype_name ?>" <?php if(isset($select_logtype)){ if($v->logtype_name == $select_logtype->logtype_name){echo "selected";} }?>><?php echo $v->logtype_name; ?></option>
                                            <?php } }?>
                                            </select>

                                      </div>
                                      <?php } ?>


                                      
                                      
                                    
                                    </div>
                        <div class="col-md-12" >
                            <div class="form-group" >
                               
                            <label for="pwd">Permission :-</label>
                            
                            <br><br>


                            <?php if($_SESSION['logtype'] == "Super Admin"){ ?>


                            <?php if(isset($_GET['id']) && !empty($_GET['id'])){ ?>

                             <?php foreach ($f_module as $key => $value) { ?>
                            <h3><?php echo $value->f_module_name; ?><input type="checkbox" name="fp[]" value="<?php echo $value->f_module_name; ?>" <?php if(isset($select_logtype->f_permission) && in_array($value->f_module_name, explode(",",$select_logtype->f_permission))){echo "checked";} ?>></h3>
                            <?php foreach($m_module as $m){ 
                            if($m->f_module_id == $value->f_module_id){
                            ?>
                            <label for="pwd"><?php echo $m->module_name; ?> <input type="checkbox" name="m_all[]" value="<?php echo $m->module_name; ?>"<?php if(isset($select_logtype->m_permission) && in_array($m->module_name, explode(",",$select_logtype->m_permission))){echo "checked";} ?>>:</label>
                            <br>
                                <?php foreach($l_module as $k=> $l){ 
                                if($l->m_module_id == $m->m_module_id){
                            ?> 
                        <label style="width:30%;font-weight: normal;"><?php echo $l->name; ?> </label> 
                                    <label class="radio-inline">
                                      <input type="checkbox" name="f_all[]"  value="<?php echo $l->name ;?>" <?php if(isset($select_logtype->permission) && in_array($l->name, explode(",",$select_logtype->permission))){echo "checked";} ?>>Yes
                                    </label>
                                    <br>
                          <?php } } } } }  ?>   



                           <?php }else{ ?>
                              <?php foreach ($f_module as $key => $value) { ?>
                            <h3><?php echo $value->f_module_name; ?><input type="checkbox" name="fp[]" value="<?php echo $value->f_module_name; ?>" onclick="change_mod(<?php echo $value->f_module_id; ?>)" <?php if(isset($select_logtype) && in_array($value->f_module_name, explode(",", $select_logtype->permission))){echo "checked";} ?>></h3>
                            <div id="all_change_mod<?php echo $value->f_module_id; ?>"></div>
                           <?php } ?>

                           <?php } ?>
                            <?php }else { ?>


                               <?php if(isset($_GET['id']) && !empty($_GET['id'])){ ?>

                             <?php foreach ($f_module as $key => $value) { ?>
                            <h3><?php echo $value->f_module_name; ?><input type="checkbox" name="fp[]" value="<?php echo $value->f_module_name; ?>" <?php if(isset($select_logtype->f_permission) && in_array($value->f_module_name, explode(",",$select_logtype->f_permission))){echo "checked";} ?>></h3>
                            <?php foreach($m_module as $m){ 
                            if($m->f_module_id == $value->f_module_id){
                            ?>
                            <label for="pwd"><?php echo $m->module_name; ?> <input type="checkbox" name="m_all[]" value="<?php echo $m->module_name; ?>"<?php if(isset($select_logtype->m_permission) && in_array($m->module_name, explode(",",$select_logtype->m_permission))){echo "checked";} ?>>:</label>
                            <br>
                                <?php foreach($l_module as $k=> $l){ 
                                if($l->m_module_id == $m->m_module_id){
                            ?> 
                        <label style="width:30%;font-weight: normal;"><?php echo $l->name; ?> </label> 
                                    <label class="radio-inline">
                                      <input type="checkbox" name="f_all[]"  value="<?php echo $l->name ;?>" <?php if(isset($select_logtype->permission) && in_array($l->name, explode(",",$select_logtype->permission))){echo "checked";} ?>>Yes
                                    </label>
                                   
                                    <br>
                          <?php } } } } }  ?>   



                           <?php }else{ ?>
                           
                              <?php
                              //   $allp = explode(',', $_SESSION['user_permission']);
                               foreach ($f_module as $key => $value) { ?>
                            <h3><?php echo $value->f_module_name; ?><input type="checkbox" name="fp[]" value="<?php echo $value->f_module_name; ?>" onclick="change_mod(<?php echo $value->f_module_id; ?>)" ></h3>
                            <div id="all_change_mod<?php echo $value->f_module_id; ?>"></div>
                           <?php } ?>

                           <?php } ?>

                           <?php } ?>
                           
                           
                                
                          </div>
                                <input type="submit" name="logtype_submit" class="btn btn-sm btn-success" value="Save">
                                    </form> 
                        </div> 
                                    </div>

                                    
                                     <table class="table" style="margin-top:15px;">
                                        <thead>
                                          <tr>
                                            <th>Logtype</th>
                                            <th>Hirachiy</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($logtype_all as $val) { ?>
                                          <tr>
                                            <td><?php echo $val->logtype_name; ?></td>
                                            <td><?php if(isset($val->group_nameall)){ foreach ($val->group_nameall as $key => $value) {
                                                echo $value;
                                            }} ?></td>
                                            <td><label style="color:#a6a6a6"> <?php if($val->status=="0") { echo "Active"; } if($val->status=="1") { echo  "Disable"; } ?> </label></td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                  <li><a href="<?php echo base_url(); ?>settings/user_logtype?logtype_action=edit&id=<?php echo @$val->logtype_id; ?>"> Edit</a></li>
                                                  <?php if($val->status==0) { ?>
                                                  <li ><a href="<?php echo base_url(); ?>settings/user_logtype?logtype_action=delete&id=<?php echo @$val->logtype_id; ?>&status=<?php echo @$val->status; ?>">Disable</a></li>
                                                  <?php } else {  ?>
                                                  
                                                  <li ><a href="<?php echo base_url(); ?>settings/user_logtype?logtype_action=delete&id=<?php echo @$val->logtype_id; ?>&status=<?php echo @$val->status; ?>">Active</a></li>
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
<<!-- script>
  $(document).ready(function(){
 $('#branch').change(function(){
 console.log("heloo");
  var branch_id = $('#branch').val();
  alert(branch_id);
  if(branch_id !='')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>settings/fetch_depart_alll",
    method:"POST",
    data:{branch_id:branch_id},
    success:function(data)
    {
     $('#department').html(data);
     // $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#department').html('<option value="">Select Department</option>');
   // $('#city').html('<option value="">Select City</option>');
  }

 });
});
</script> -->

<script type="text/javascript">
  $(document).ready(function(){
    $('#admin').change(function(){
      // alert();
      var d = $(this).val();
      /*console.log("called");
      console.log($('#filterForm').serialize());*/
      // alert($('#filterForm').serialize());
      $.ajax({
        type:'POST',
        data:{

          'id':d
        },
        url:"<?php echo base_url(); ?>settings/admin_Wise_branchFetch",
        success:function(data){
          $('#branch').html(data);
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.filterCheck').change(function(){
      /*console.log("called");
      console.log($('#filterForm').serialize());*/
      // alert($('#filterForm').serialize());
      $.ajax({
        type:'POST',
        data:$('#filterForm').serialize(),
        url:"<?php echo base_url(); ?>settings/fetch_depart_alll",
        success:function(data){
          $('#department').html(data);
        }
      });
    });
  });

   $(document).ready(function(){
    $('.filterlogtype').change(function(){
      /*console.log("called");
      console.log($('#filterForm').serialize());*/
     
      $.ajax({
        type:'POST',
        data:$('#filterForm').serialize(),
        url:"<?php echo base_url(); ?>settings/fetch_permission_alll",
        success:function(data){
          $('#permission_all').html(data);
        }
      });
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




  $(document).ready(function(){
 $('#state_id').change(function(){
 
  var s = $('#state_id').val();
  alert(s);
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

<!-- page script -->
<?php if(!empty($select_logtype)) { ?>
<script>
    
    $('#mylogtype').modal("show");
</script>
<?php } ?>

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
    function viewManager(id)
    {
      
        
       $.ajax({
           url:"<?php echo base_url(); ?>settings/view_member",
           type:"post",
           data:{
               'user_id':id
               
           },
           success: function(data) {
                $('#viewc').html(data);
                $('#myModal_course').modal('show');
            }
           
       });
    }
</script>
</body>
</html>
