<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assetslogin/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assetslogin/css/main.css">
    
    
    
    
    
    
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
        BRANCH
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Branch</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
     <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
              <h3 class="box-title">ADD SEAT BRANCH</h3>
            </div>
           
            
            
            <form class="login100-form validate-form" method="post" action="<?php echo base_url(); ?>AddmissionController/seat_branch"> 
            
              <input type="hidden" name="update_id" value="<?php if(!empty($select_seat_branch->seat_branch_id)) { echo $select_seat_branch->seat_branch_id; } ?>"/>
              <div class="wrap-input100 validate-input" data-validate = "Seat Branch Name is required: xyz" style="width:100%;">
            <input class="input100" value="<?php if(!empty($select_seat_branch->seat_branch_name)) { echo $select_seat_branch->seat_branch_name; } ?>" style="height:30px; background-color:#F0F8FF; border:1px solid #004F9D" type="text"  name="seat_branch_name" placeholder="Seat Branch Name">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-home" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="wrap-input100 validate-input" data-validate = "Branch Code is required: xyz" style="width:100%;">
            <input class="input100" value="<?php if(!empty($select_seat_branch->seat_branch_code)) { echo $select_seat_branch->seat_branch_code; } ?>" style="height:30px; background-color:#F0F8FF; border:1px solid #004F9D" type="text"  name="seat_branch_code" placeholder="Branch Seat Code">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-codepen" aria-hidden="true"></i>
            </span>
          </div>          
                    
          
        
          <?php if(!empty($select_seat_branch->department_ids)){
              $depart = explode(",",$select_seat_branch->department_ids);
              
          } ?>
          <div>
              <label>Select Branch Department</label> 
              <?php foreach($department_all as $val) { ?>
              <div class="checkbox">
                          <label><input type="checkbox" <?php if(@in_array($val->department_id,@$depart)) { echo "checked"; } ?> name="depart_ids[]" value="<?php echo $val->department_id ?>"><?php echo $val->department_name ?></label>
                        </div>
                        <?php } ?>
          </div>
          <div class="container-login100-form-btn">
            
                        <input type="submit" value="Submit" class="login100-form-btn" name="submit"/>
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
              <h3 class="box-title">Display BRANCH</h3>
            </div>
            <!-- /.box-header -->
           
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Seat Branch</th>
                  <th>Department</th>
                   <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($seat_branch_all as $val) { ?>
                <tr>
                  <td><?php echo $val->seat_branch_name."  - ".$val->seat_branch_code;  ?> 
                 
                  <br> <?php  echo "Last Seen : ".$val->timestamp; ?></td>
                  <td>
                      <?php 
                      
              $check_depart = explode(",",@$val->department_ids);
             
                      foreach($department_all as $row) 
                      {
                            if(@in_array($row->department_id,@$check_depart)) 
                            { echo $row->department_name."<br>"; }
                       } ?>
                  </td>
                  <td><label style="color:#a6a6a6"> <?php if($val->branch_status=="0") { echo "Active"; } if($val->branch_status=="1") { echo  "Disable"; } ?> </label></td>
                  <td>
                     
                    
                    
                        <div class="dropdown">
                            <button class="btn btn-sm btn-success dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>AddmissionController/seat_branch?action=edit&id=<?php echo @$val->seat_branch_id; ?>"> Edit</a></li>
                              <?php if($val->branch_status==0) { ?>
                              <li ><a href="<?php echo base_url(); ?>AddmissionController/seat_branch?action=delete&id=<?php echo @$val->seat_branch_id; ?>&status=<?php echo @$val->branch_status; ?>">Disable</a></li>
                              <?php } else {  ?>
                              
                              <li ><a href="<?php echo base_url(); ?>AddmissionController/seat_branch?action=delete&id=<?php echo @$val->seat_branch_id; ?>&status=<?php echo @$val->branch_status; ?>">Active</a></li>
                             <?php } ?>
                            </ul>
                          </div>
                    
                    </td>
                </tr>
                
             <?php } ?>
                
                </tfoot>
              </table>
              
            
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
  });



  
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

    function hideMenu(id,subid){
      $("#sub_menu_"+id).removeClass('show');
      $("#lead_submenu_"+subid).removeClass('show');
    }
//end session of sidebar menu open 

</script>
</body>
</html>
