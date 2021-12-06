
    
   <?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?> 
    
    
    
    
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
        Student Finder App Permission
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i>Apps Permission</a></li>
       
        <li class="active">student_finder_app_status</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if(!empty($msg)) { ?>
     	  <div class="col-md-12" >
     	    <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $msg; ?>
             
          </div>
     	  </div>
     	<?php } ?>
     	   
      <div class="row">
        <div class="col-md-12" >
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Display SF Apps</h3>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Settings/student_finder_permission">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th><input type="checkbox" name="" id="selectall"><input type="submit" name="submit"
                     value="Status"></th>
                    <th>Details</th>
                    <th>Branch</th>
                    <th>Admin</th>
                    <!-- <th>Subject</th> -->
                    <th>Status</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($faculty_all as $val) { ?>
                  <tr>
                    <td><input type="checkbox" name="faculty_records[]" value="<?php echo $val->faculty_id; ?>" class="case"> <input type="hidden" name="table_type_faculty" value="faculty"></td>
                    <td>
                      <?php echo "<b>Name : </b>".$val->name;  ?> <br> 
                      <?php  echo "<b>Email : </b>".$val->email; ?>  <br> 
                      <?php  echo "<b>Phone : </b>".$val->phone; ?>  <br>
                      <?php $branch_ids = explode(",",$val->department_id);
                        foreach($department_all as $row) 
                        { 
                          if(in_array($row->department_id,$branch_ids)) 
                            {  
                              echo "<b>Department : </b>" .$row->department_name; 
                            }  
                        } ?> <br>
                      <?php $branch_ids = explode(",",$val->subdepartment_id);
                        foreach($subdepartment_all as $row) 
                          { 
                            if(in_array($row->subdepartment_id,$branch_ids)) 
                            {  
                                echo "<b>Sub Department : </b>" .$row->subdepartment_name; 
                            }  
                          } ?> <br>
                      <?php  echo "Last Seen : ".$val->timestamp; ?>
                    </td>
                    <td>
                      <?php $branch_ids = explode(",",$val->branch_ids);
                        foreach($branch_all as $row) 
                        { 
                          if(in_array($row->branch_id,$branch_ids)) 
                          {  
                            echo $row->branch_name."<br>"; 
                          }  
                        } 
                      ?>
                    </td>
                    <td> 
                      <?php $branch_ids = explode(",",$val->admin_id);
                        foreach($user_all as $row) { if(in_array($row->user_id,$branch_ids)) {  echo $row->name; }  } ?>
                    </td>
                   <!--  <td>
                      <button type="button" onclick="viewCourse(<?php echo $val->faculty_id;  ?>)" class="btn btn-info btn-sm" >View</button>
                    </td> -->
                    <td>
                      <?php if($val->student_finder_app_status == 1){ ?>
                                <a href="#">Active</a>
                                <?php }else { ?>
                                <a href="#">Deactive</a>
                                <?php } ?>
                    </td>
                 	  <td>
                      
                     <?php if($val->student_finder_app_status == 1){ ?>
                        <a href="<?php echo base_url(); ?>settings/student_finder_permission?action=change_s&id=<?php echo @$val->faculty_id; ?>&status=1&faculty_sstt=faculty" class="btn btn-xs btn-warning" tooltip="Active"><i class="fa fa-user"></i></a>
                        <?php }else { ?>
                        <a href="<?php echo base_url(); ?>settings/student_finder_permission?action=change_s&id=<?php echo @$val->faculty_id; ?>&status=0&faculty_sstt=faculty" class="btn btn-xs btn-danger" tooltip="Deactive"><i class="fa fa-user" ></i></a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php  } ?>

                 <?php foreach($users_all as $val) { ?>
                  <tr>
                    <td><input type="checkbox"  class="case" name="user_records[]" value="<?php echo $val->user_id; ?>"> <input type="hidden" name="table_type_user" value="user"></td>
                    <td>
                      <?php echo "<b>Name : </b>".$val->name;  ?> <br> 
                      <?php  echo "<b>Email : </b>".$val->email; ?>  <br> 
                      <?php  echo "<b>Phone : </b>".$val->mobile_no; ?>  <br>
                      <?php $branch_ids = explode(",",@$val->department_id);
                        foreach($department_all as $row) 
                        { 
                          if(in_array($row->department_id,$branch_ids)) 
                            {  
                              echo "<b>Department : </b>" .$row->department_name; 
                            }  
                        } ?> <br>
                     <br>
                      <?php  echo "Last Seen : ".$val->timestamp; ?>
                    </td>
                    <td>
                      <?php $branch_ids = explode(",",$val->branch_ids);
                        foreach($branch_all as $row) 
                        { 
                          if(in_array($row->branch_id,$branch_ids)) 
                          {  
                            echo $row->branch_name."<br>"; 
                          }  
                        } 
                      ?>
                    </td>
                    <td> 
                      <?php $branch_ids = explode(",",$val->admin_id);
                        foreach($user_all as $row) { if(in_array($row->user_id,$branch_ids)) {  echo $row->name; }  } ?>
                    </td>
                   <!--  <td>
                      <button type="button" onclick="viewCourse(<?php echo $val->faculty_id;  ?>)" class="btn btn-info btn-sm" >View</button>
                    </td> -->
                    <td>
                      <?php if($val->student_finder_app_status == 1){ ?>
                                <a href="#">Active</a>
                                <?php }else { ?>
                                <a href="#">Deactive</a>
                                <?php } ?>
                    </td>
                    <td>
                      
                     <?php if($val->student_finder_app_status == 1){ ?>
                        <a href="<?php echo base_url(); ?>settings/student_finder_permission?action=change_s&id=<?php echo @$val->user_id; ?>&status=1&faculty_sstt=user" class="btn btn-xs btn-warning"><i class="fa fa-user"></i></a>
                        <?php }else { ?>
                        <a href="<?php echo base_url(); ?>settings/student_finder_permission?action=change_s&id=<?php echo @$val->user_id; ?>&status=0&faculty_sstt=faculty" class="btn btn-xs btn-danger"><i class="fa fa-user" ></i></a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php  } ?>
             
                </tbody>
              </table>
          		 </form>
            
          </div>
        </div>
      </div>
      <div class="col-ms-12">
        <div id="viewc"></div>
      </div>
    </section>
  </div>
  
  <footer class="main-footer">
    <strong>Copyright©2018 Red & White Multimedia.</strong> All rights
    reserved.
  </footer>
</div>




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
           url:"<?php echo base_url(); ?>settings/view_course_faculty",
           type:"post",
           data:{
               'faculty_id':id
               
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
    $('#example1').DataTable()
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

<script>
//   $(document).ready(function(){
//  $('#department').change(function(){
//  console.log("heloo");
//   var department_ids = $('#department').val();
//   if(department_ids !='')
//   {
//    $.ajax({
//     url:"<?php echo base_url(); ?>settings/fetch_subdepartment",
//     method:"POST",
//     data:{department_ids:department_ids},
//     success:function(data)
//     {
//      $('#subdepartment').html(data);
//      // $('#city').html('<option value="">Select City</option>');
//     }
//    });
//   }
//   else
//   {
//    $('#subdepartment').html('<option value="">Select Sub Department</option>');
//    // $('#city').html('<option value="">Select City</option>');
//   }

//  });
// });
</script>
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
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.tt').change(function(){
      alert();
      /*console.log("called");
      console.log($('#filterForm').serialize());*/
      // alert($('#filterForm').serialize());
      // $.ajax({
      //   type:'POST',
      //   data:$('#filterForm').serialize(),
      //   url:"<?php //echo base_url(); ?>settings/fetch_subdepart_alll",
      //   success:function(data){
      //     $('#subdepartment').html(data);
      //   }
      // });
    });
  });
</script>


<SCRIPT language="javascript">
$(function(){

  // add multiple select / deselect functionality
  $("#selectall").click(function () {
      $('.case').attr('checked', this.checked);
  });

  // if all checkbox are selected, check the selectall checkbox
  // and viceversa
  $(".case").click(function(){

    if($(".case").length == $(".case:checked").length) {
      $("#selectall").attr("checked", "checked");
    } else {
      $("#selectall").removeAttr("checked");
    }

  });
});
</SCRIPT>
</body>
</html>
