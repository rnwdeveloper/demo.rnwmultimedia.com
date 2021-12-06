
    
    <?php  @$branch_ids = explode(",",$_SESSION['branch_ids']); ?>
    
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
     Rapid Company & Jobs List
     
     <!-- <span><a href="<?php echo base_url() ?>FormController/viewall_company_detail?status=0" class="btn btn-primary">All(<?php echo $total_company; ?>)</a></span> 
     <span><a href="<?php echo base_url() ?>FormController/viewall_company_detail?status=0" class="btn btn-primary">Pending(<?php echo $total_pending_company; ?>)</a></span> 
     <span><a href="<?php echo base_url() ?>FormController/viewall_company_detail?status=1" class="btn btn-success">Active(<?php echo $total_active_company; ?>)</a></span> 
     <span><a href="<?php echo base_url() ?>FormController/viewall_company_detail?status=2" class="btn btn-info">Dective(<?php echo $total_deactive_company; ?>)</a></span> 
     <span><a href="<?php echo base_url() ?>FormController/viewall_company_detail?status=3" class="btn btn-danger">Dumped(<?php echo @$total_dumped_company; ?>)</a></span>  -->


 </h1>
      
      <?php if($_SESSION['logtype']=="Super Admin") { ?> 
    <div style="margin-left: 320px; margin-top: -40px;">
      <a href="<?php echo base_url() ?>PropertyController/place" class="btn btn-success">PlaceType</a>
      <a href="<?php echo base_url() ?>PropertyController/producttype" class="btn btn-primary">productType</a>
      <a href="<?php echo base_url() ?>PropertyController/productlist" class="btn btn-warning">ProductList</a>
      <a href="<?php echo base_url() ?>PropertyController/addcomplain_new" class="btn btn-info">AddComplainNew</a>
    </div>
    <?php } ?>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Complain List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="col-md-12" id="filter_section">
          <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
              <h3 class="box-title">Filter</h3>
            </div>
            <form method="post" action="<?php echo base_url(); ?>FormController/view_rapid_job_post">
              <div class="row">
                <div class="col-md-3">
                  <input type="text" name="company_name" class="form-control" placeholder="company Name"
                  value="<?php echo @$filter_record['company_name']; ?>">  
                </div>
                <div class="col-md-3">
                  <input type="text" name="recruiter_name" class="form-control" placeholder="Recruiter Name"
                  value="<?php echo @$filter_record['recruiter_name']; ?>">      
                </div>
                <div class="col-md-3">
                  <input type="text" name="job_title"  class="form-control" placeholder="job_title" value="<?php echo @$filter_record['job_title']; ?>">   
                </div>
                <div class="col-md-3">
                  <input type="text" name="position" class="form-control" placeholder="Position"
                  value="<?php echo @$filter_record['position']; ?>"> 
                </div>
              </div>  
              
              <div class="row" style="margin-top:10px;">
                <div class="col-md-3">
                  <input type="text" name="job_location" class="form-control" placeholder="job_location"
                  value="<?php echo @$filter_record['position']; ?>"> 
                </div>

                <div class="col-md-3">
                    <input type="date"  class="form-control datepicker"  id="" name="filter_start_date" placeholder="Staring Date" value="<?php echo @$filter_record['filter_start_date']?>">
                </div>
                <div class="col-md-3">
                    <input type="date"  class="form-control datepicker"  placeholder="End Date" name="filter_end_date"  value="<?php echo @$filter_record['filter_end_date']?>">
                </div>

                <div class="col-md-2">
                  <input type="submit" value="Filter"  class="btn btn-success" name="search"/>
                   <a   href="<?php echo base_url(); ?>FormController/viewall_company_detail?status=<?php echo $this->input->get('status'); ?>"class="btn btn-primary" style="color:#FFF">Reset</a>
                </div>
               
                
              </div>
                 
              
            </form>   
          </div>
        </div>
       
     	    
		
        <div class="col-md-12" >
          <!-- general form elements -->
        <input type="button" value="filter" id="filter_section_company">
          <div class="box box-success" style="padding:4px;">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
             <?php if(@$this->session->flashdata('msg_alert')) { ?>
     	            <div class="col-md-8" >
     	        
     	        <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $this->session->flashdata('msg_alert'); ?></div>
     	    </div>
     	    <?php } ?>
           <div class="row"> 
               <div class="col-md-12">
                   
              
             <div style="margin-top:5px;">
              <table  id="example1"  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Company Name</th>
                    <th>Company email</th>
                    <th>Recruiter Name</th>
                    <th>Company Address</th>
                    <th>Job Title</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>No Of Vacancy</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Job City</th>
                    <th>Job Location</th>
                    <th>Description</th>
                   <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($rapid_job as $val) { ?>
                  <tr>
                    <td><?php echo $val->company_name; ?></td>
                    <td><?php echo $val->company_email;  ?></td>
                    <td><?php echo $val->recruiter_name;  ?></td>
                    <td><?php echo $val->company_address;  ?></td>
                    <td><?php echo $val->job_title;  ?></td>
                    <td><?php echo $val->position;  ?></td>
                    <td><?php echo $val->salary;  ?></td>
                    <td><?php echo $val->no_of_vacancy;  ?></td>
                    <td><?php echo $val->start_date;  ?></td>
                    <td><?php echo $val->end_date;  ?></td>
                    <td><?php echo $val->job_city;  ?></td>
                    <td><?php echo $val->job_location;  ?></td>
                    <td><?php echo $val->description;  ?></td>
                    <td>
                        <!-- <div class="dropdown"> -->
                          <!--   <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                              <?php if(@$val->status == 0){ 
                                echo "Pending";
                                } else if(@$val->status == 1) {
                                  echo "Active";
                                } else if(@$val->status == 2){
                                  echo "Deactive";
                                } else if(@$val->status == 3){
                                  echo "Dumped";
                                }
                                ?>
                            
                            <span class="caret"></span></button> -->
                         <!--  <ul class="dropdown-menu">
                            <li ><a href="#" onclick="return get_company_change('pending','<?php echo $val->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','0')" >Pending</a></li>
                            <li><a onclick="return get_company_change('active','<?php echo $val->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','1')" > Active</a></li>
                            <li ><a onclick="return get_company_change('Deactive','<?php echo $val->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','2')">Deactive</a></li>
                            <li ><a onclick="return get_company_change('Dumped','<?php echo $val->company_id; ?>','<?php echo @$_SESSION['user_name']; ?>','3')" >Dumped</a></li>
                          </ul> -->

                        <!-- </div> -->
                        Action
                      </td>
                  </tr>
                  <?php }  ?>
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

    
<div class="modal fade" id="dialog-modal" role="dialog">                
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times</button>
        <h3 class="modal-title">Change Status Of Company Remarks</h3>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>FormController/viewall_company_detail">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Reasons</th>
              </tr>
            </thead>
            <tbody>       
              <tr>
                <td>
                  <div>                
                    <textarea rows = "5" cols = "50" name = "remarks"></textarea><br>
                    <input type="hidden" name="status" id="remarks_status"><br>
                    <input type="hidden" name="remarks_by" id="cr_remarks_by"><br>
                    <input type="hidden" name="cr_company_id" id="cr_company_id"><br>
                    <input type="hidden" name="status_data_change" id="status_data_change"><br>
                    <input type = "submit" value = "submit" name="submit" class="btn btn-primary">
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
      <div class="modal-footer" id="remarks_data_company">
        <table border="1">
          <tr>
            <th>No</th>
            <th>Remarks By</th>
            <th>Remarks</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
          <tr>

          </tr>
        </table>
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>
    
 <script>
function get_company_change(status, company, remarks_by,status_data)
{
  // alert(status);
  // alert(company);
  // alert(remarks_by);
  $('#cr_remarks_by').val(remarks_by);
  $('#remarks_status').val(status);
  $('#cr_company_id').val(company);
  $('#status_data_change').val(status_data);
  $.ajax({
      url   : "<?php echo base_url(); ?>FormController/get_remarks_company_data",
      type  : 'POST',
      data  :{
        'company_id' : company
      },
      success:function(res)
      {
         $('#remarks_data_company').html(res);
      }

  });



  $("#dialog-modal").modal();
}
</script>
<script>
  $(document).ready(function(){
    $('#filter_section_company').click(function(){
          $('#filter_section').slideToggle();
  });
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
//end session of sidebar menu open 


   $('#filter_section').hide();
 </script>