
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
  
  
   <?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);
        
       ?>
        
  
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
         Discard Demo List
      </h4>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">
             Demo discard list
        </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
       
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" >
            <div class="box-header with-border">
             
              <h3 class="box-title">Display Discard List</h3>
            </div>
            <!-- /.box-header -->
           <div class="table-responsive">
             <table  class="table table-responsive table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Demo Id</th>
                  <th>Demo Details</th>
                   <th>Demo Date / Time</th>
                  <th>Course</th>
                  <th>Discard Reason</th>
                  <th>Discard By</th>
                  <th>Branch Details</th>
                  <th>Faculty</th>
                
                  
                 
                  <th>action</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($demo_all as $val) {  if($val->discard=="1") {
                 if(in_array($val->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") {
                ?>
                <tr style=" <?php if($val->demoStatus=="0") { ?> background-color:#4c87c7; <?php  }
				if($val->demoStatus=="1") { ?> background-color:#5cb85c;  <?php  } 
				if($val->demoStatus=="2") { ?> background-color:#f0ad4e;  <?php  } 
				if($val->demoStatus=="3") { ?> background-color:#d9534f;  <?php  } ?>  color:#FFF;">
                 
                 <td><?php echo $no; ?></td>
                  <td><?php echo $val->demo_id; ?></td>
                  <td><?php echo $val->name;  ?> <br> <?php  echo "Mobile : ".$val->mobileNo; ?> 	<br>
                  
                  <?php  $day=0;
					$all_att = explode("&&",$val->attendance);
					
					for($i=0;$i<sizeof($all_att);$i++)
					{
						$att = explode("/",$all_att[$i]);
						if(@$att[1]=="P")
						{
							$day++;	
						}
					}
					if($val->attendance=="") { $day=0; } 
					if($day>0) { echo "Total Attendance : ".$day;  } ?>  
					
					<?php if($val->demoStatus==2) 
					{  
					    if(!empty($val->leaveDate)) {
					    $leave = explode("to",$val->leaveDate); 
					    $fromd = explode("-",@$leave[0]);
					    $tod = explode("-",@$leave[1]);
					  
					   
					} } ?> 
					
				  
                  
                  </td>
                  <td><?php echo $val->demoDate;  ?> <br> <?php echo $val->fromTime;  ?> To <?php echo $val->toTime;  ?> </td>
                  <td><?php echo $val->courseName;  ?> </td>
                  <td>
                      <?php echo $val->demo_discard_reason;  ?>
                  <br>
                    <?php echo $val->demo_discard_comment;  ?>
                  </td>
                  <td>
                      <?php echo $val->demo_discard_by;  ?>
                  <br>
                    <?php echo $val->demo_discard_timestamp;  ?>
                  </td>
                  <td><?php  foreach($branch_all as $row) {  if($val->branch_id==$row->branch_id) {
				   echo $row->branch_name;  } } ?>
                  
                   </td>
                  <td><?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?> </td>
                  
                  
               </td>
                
                  
                 
                 	<td>
                 	     
                    
                    <div class="dropdown">
                                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Action
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li ><a href="<?php echo base_url(); ?>Enquiry/demoView/<?php echo $val->demo_id; ?>">View</a></li>
                                    <?php if($_SESSION['logtype']=="Super Admin" || in_array("Discard=1",$user_permission)) {  ?>
                                     <li >
                 	    <a href="<?php echo base_url(); ?>welcome/viewDemo/as?action=delete&id=<?php echo @$val->demo_id; ?>&status=<?php echo @$val->discard; ?>"  >Restore</a>
                 	    </li>
                 	    
                    <?php } ?>
                                    
                                 
                                </ul>
                          </div>
                    
                    
                    </td>
                    
                </tr>
                
             <?php $no++; } } } ?>
                
                </tfoot>
              </table>
              </div>
          	<div class="col-md-2" >Row Color:</div>	
            <div class="col-md-2  text-white" style="background-color:#4c87c7;">Running</div>
            <div class="col-md-2  text-white" style="background-color:#5cb85c;">Done </div>
            <div class="col-md-2  text-white" style="background-color:#f0ad4e;">Leave</div>
            <div class="col-md-2  text-white" style="background-color:#d9534f;">Cancel</div>
            
            
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
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
  }
  
  if (document.getElementById("yellow1") != null) {
    setTimeout(function() {
      document.getElementById('yellow1').style.display = 'none';
    }, 5000);
  }
</script>

<script>
	function changeStatus(demo_id)
	{
	    var status;
			status = $('#dstatus'+demo_id).val();
			$('#myModal_cancel2'+demo_id).modal("show");
	    if(status==0)
        {
            $('#reasontype2'+demo_id).hide();
            $('#reason2'+demo_id).hide();
            
            document.getElementById("reason2"+demo_id).required= false;
            document.getElementById("reasontype2"+demo_id).required= false;
            document.getElementById("leavefrom2"+demo_id).required= false;
            document.getElementById("leaveto2"+demo_id).required= false;
           
        }
        
        if(status==1)
        {
            
            
            $('#reason2'+demo_id).hide();
            $('#reasontype2'+demo_id).hide();
            document.getElementById("reason2"+demo_id).required= false;
             document.getElementById("reasontype2"+demo_id).required= false;
            document.getElementById("leavefrom2"+demo_id).required= false;
            document.getElementById("leaveto2"+demo_id).required= false;
           
        }
       
        if(status==2)
        {
            
            
           
            $('#leavedate2'+demo_id).show();
            $('#reason2'+demo_id).show();
            $('#reasontype2'+demo_id).hide();
            document.getElementById("reason2"+demo_id).required= true;
             document.getElementById("reasontype2"+demo_id).required= false;
            document.getElementById("leavefrom2"+demo_id).required= true;
            document.getElementById("leaveto2"+demo_id).required= true;
           
        }
        if(status==3)
        {
            
        
          $('#leavedate2'+demo_id).hide();
          $('#reason2'+demo_id).show();
          $('#reasontype2'+demo_id).show();
          document.getElementById("reason2"+demo_id).required= true;
           document.getElementById("reasontype2"+demo_id).required= true;
          document.getElementById("leavefrom2"+demo_id).required= false;
            document.getElementById("leaveto2"+demo_id).required= false;
        }
	    
	    
	    
	    
	    
	
	}
</script>
<script>
$('.datepicker').datepicker({
      autoclose: true,
	  todayHighlight: true,
	  format:"yyyy-mm-dd"
    })


  $(function () {
    $('.example1').DataTable({
        "pageLength": 25
    })
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
