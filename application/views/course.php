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
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
<style type="text/css">
  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #2255a4;
     color: white;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
}
.select2-container--default .select2-selection--multiple {
    line-height: 20px;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
    list-style: none;
    }
    .th{
      font-size: 12px;
    }
    .td{
      font-size: 11px;
      color: black;
    }
</style>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        COURSE
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Course</li>
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
         <div class="col-md-6">
              <!-- general form elements -->
             <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
              <h3 class="box-title">ADD Course</h3>
            </div>
           
            
                    
         <form class="login100-form validate-form" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>settings/course" id="filterForm">
              <input type="hidden" name="update_id" value="<?php if(!empty($select_course->course_id)) { echo $select_course->course_id; } ?>"/>
              <div class="form-group row">
                                    <label class="col-md-2">Session</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-control" name="no_year[]" multiple="multiple">
                                           <option>Select Year</option>

                                                  <?php for($i=2019;$i<=2030;$i++){ ?>
                                                    <option <?php if($i==@$select_course->session) { echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                  <?php } ?>
                                    </select>
                                    </div>
                                </div>
                            <?php if($_SESSION['logtype'] == "Super Admin"){ ?>
                            <div class="form-group row">
                            <label class="col-md-2">Admin</label>
                            <div class="col-md-9">
                            <select  class="form-control" name="admin_id"  id="admin">
                                  <option value="">Select Admin</option>
                                    <?php foreach($user_all as $val) { if($val->status==0 && $val->logtype == "Admin") { ?>
                                      <option <?php if($val->name==@$select_course->admin_id) { echo "selected"; } ?>   value="<?php echo $val->user_id; ?>" ><?php echo $val->name; ?></option>
                                    <?php } } ?>
                                </select>
                              </div>
                          </div>
                                  <div class="form-group row">
                                    <label class="col-md-2">Branch</label>
                                    <div class="col-md-9">
                                  <select class="select2 form-control" name="b_ids[]" id="branch_id" multiple="multiple">
                                   <option>Select Branch</option>
                                  <?php $branch_ids = explode(",",$select_course->branch_id);   
                                   foreach($branch_all as $row) {  ?> 
                                  <option <?php if(in_array($row->branch_id,$branch_ids)) { echo "selected"; } ?>
                                   value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                                  <?php } ?>   
                                  </select>
                                  </div>
                                </div>

                               

                                <?php }else{ ?>

                                  <div class="form-group row">
                                    <label class="col-md-2">Branch</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-control" name="b_ids[]" id="b_id" multiple="multiple">
                                           <option>Select Branch</option>
                                           <?php $branch_ids = explode(",",$select_course->branch_id);   
                                         foreach($branch_all as $row) {  ?> 
                                        <option <?php if(in_array($row->branch_id,$branch_ids)) { echo "selected"; } ?>
                                         value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                                        <?php } ?>   
                                  </select>
                                    </div>
                                </div>
                                <?php } ?>

                                 <div class="form-group row">
                                    <label class="col-md-2">Department</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-control" name="depart_ids[]" id="department" multiple="multiple">
                                           <option>Select Department</option>
                                          <?php $departids = explode(",",$select_course->department_id);   
                                           foreach($department_all as $row) {  ?> 
                                        <option <?php if(in_array($row->department_id,$departids)) { echo "selected"; } ?>
                                         value="<?php echo $row->department_id; ?>"><?php echo $row->department_name; ?></option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2">Sub Department</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-control" name="subdepart_ids[]" id="subdepartment" multiple="multiple">
                                           <option>Select SubDepartment</option>
                                           <?php $subdepartids = explode(",",$select_course->subdepart_ids);   
                                           foreach($subdepartment_all as $row) {  ?> 
                                        <option <?php if(in_array($row->subdepartment_id,$subdepartids)) { echo "selected"; } ?>
                                         value="<?php echo $row->subdepartment_id; ?>"><?php echo $row->subdepartment_name; ?></option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                </div>
                          
                            
                  <div class="form-group" >
                    <label for="pwd">Course Name:</label>
                   <input class="form-control"  value="<?php if(!empty($select_course->course_name)) { echo $select_course->course_name; } ?>"  type="text"  name="course_name" placeholder="Course Name" required>
                  </div>

                  <div class="form-group" >
                    <label for="pwd">Course Code:</label>
                   <input class="form-control"  value="<?php if(!empty($select_course->course_code)) { echo $select_course->course_code; } ?>"  type="text"  name="course_code" placeholder="Course Code" required>
                  </div>
                  
                 <!-- <div class="form-group" >
                    <label for="pwd">Course Detail:</label>
                   <textarea rows="3" cols="50" class="form-control"  value=""  type="text"  name="course_detail" placeholder="Course Detail" ><?php if(!empty($select_course->course_detail)) { echo $select_course->course_detail; } ?></textarea>
                  </div> -->
                  
                  <div class="form-group" >
                    <label for="pwd">Fees:</label>
                    <input type="text"  name="course_fees" value="<?php if(!empty($select_course->course_fees)) { echo $select_course->course_fees; } ?>" placeholder="Enter Course Fees" class="form-control num_of_emp" required >
                  </div>
                  
                  <div class="form-group" >
                    <label for="pwd">Installment :</label>
                     <input type="text"  name="installment" value="<?php if(!empty($select_course->installment)) { echo $select_course->installment; } ?>"  placeholder="Enter Installment " class="form-control num_of_emp" required >
                  </div>
                  
                  <div class="form-group">
                    <label for="pwd">Course Duration :</label>
                     <input type="text"  name="course_duration" value="<?php if(!empty($select_course->course_duration)) { echo $select_course->course_duration; } ?>"  placeholder="Enter Month " class="form-control num_of_emp" required >
                  </div>

                   <div class="form-group" >
                    <label for="pwd">Job Guarantee :</label>
                    <label class="radio-inline"><input type="radio"  value="1" name="jobg" <?php if(@$select_course->jobg=="1") { echo "checked"; } ?> >Yes</label>
                    <label class="radio-inline"><input type="radio" value="0" name="jobg" <?php if(@$select_course->jobg=="0") { echo "checked"; } ?> <?php if(empty($select_course->jobg)) { echo "checked"; } ?> >No</label>
                  </div>

                  <div class="form-group" >
                    <label for="pwd">Upload Signing Sheet :</label>
                    <input type="file" name="csigning_sheet">
                  </div>
                  
                  <input type="submit" name="submit" value="Save" class="btn btn-success" />
                </form> 
          </div>

            
            </div>
        </div>
        <div class="row">
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Display Course</h3>
            </div>
            <!-- /.box-header -->
           
              <table id="example1" class="table table-bordered table-striped example1">
                <thead>
                <tr class="th">
                  <th>S_No</th>
                  <th>Admin</th>
                  <th>Branch</th>
                  <th>Department</th>
                  <th>Sub Department</th>
                  <th>Course</th>
                  <th>Fees & Installment</th>
                  <th>Job Guarantee</th>
                  <th>RelevantCourseAdd</th>
                  <th>Status</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php $sno=1; foreach($course_all as $val) { ?>
                <tr class="td">
                  <td><?php echo $sno; ?></td>
                   <td><?php $branch_ids = explode(",",$val->admin_id);
                        foreach($user_all as $row) { if(in_array($row->user_id,$branch_ids)) {  echo $row->name; }  } ?></td>
                  <td><?php $branch_ids = explode(",",$val->branch_id);   
                        foreach($branch_all as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo "<br>".@$row->branch_name;}  } ?>
                   <td>
                     <?php $department_ids = explode(",",$val->department_id);   
                        foreach($department_all as $row) { if(in_array($row->department_id,$department_ids)) {  echo "<br>".@$row->department_name; }  } ?>
                   </td>       
                    <td>
                      <?php $subdepartment_ids = explode(",",$val->subdepart_ids);   
                        foreach($subdepartment_all as $row) { if(in_array($row->subdepartment_id,$subdepartment_ids)) {  echo "<br>".@$row->subdepartment_name; }  } ?>
                    </td> 
                  <td><br><?php echo $val->course_name; ?>
                    <br>
                    <?php echo "Course Code : ". $val->course_code; ?><br>
                    <?php if(!empty($val->csigning_sheet)) { ?><a target="_blank" href="<?php echo base_url(); ?>dist/signsheet/<?php echo $val->csigning_sheet; ?>">Download</a> <?php  } ?>
                  </td>
                   <td><br><?php echo "Fees : ".$val->course_fees;  ?> <br> <?php  echo "Installment : ".$val->installment; ?> <br> <?php  echo "Duration : ".$val->course_duration; ?></td>
                   <td><br><?php  if($val->jobg=="0") { echo "No"; } else { echo "Yes"; } ?></td>

                   <td><br><button type="button" onclick="viewCourse(<?php echo $val->course_id;  ?>)" class="btn btn-warning btn-sm" >RelevantCourse</button></td>

                  <td><br><label style="color:#a6a6a6"> <?php if($val->status=="0") { echo "Active"; } if($val->status=="1") { echo  "Disable"; } ?> </label></td>
                  <td><br>
                           <div class="dropdown">
                            <button class="btn btn-sm btn-success dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>settings/course?action=edit&id=<?php echo @$val->course_id; ?>"> Edit</a></li>
                              <?php if($val->status==0) { ?>
                              <li ><a href="<?php echo base_url(); ?>settings/course?action=delete&id=<?php echo @$val->course_id; ?>&status=<?php echo @$val->status; ?>">Disable</a></li>
                              <?php } else {  ?>
                              
                              <li ><a href="<?php echo base_url(); ?>settings/course?action=delete&id=<?php echo @$val->course_id; ?>&status=<?php echo @$val->status; ?>">Active</a></li>

                             <?php } ?>
                              <li>
                              <a href="<?php echo base_url().'/settings/delete_fun/'.$val->course_id;?>" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                              </li>                             
                            </ul>
                          </div>
                      
                  </td>
                 
                  
                </tr>
                
             <?php $sno++; } ?>
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
<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>
   <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        

    </script>
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
           url:"<?php echo base_url(); ?>settings/view_course",
           type:"post",
           data:{
               'course_id':id
               
           },
           success: function(data) {
                $('#viewc').html(data);
                $('#myModal_course').modal('show');
            }
           
       });
    }
    
    
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
        url:"<?php echo base_url(); ?>settings/filter_branch_wise",
        success:function(data){
          $('#branch_id').html(data);
        }
      });
    });
});

 //  $('#admin').change(function(){
 
 //  var admin_id = $('#admin').val();
 
 //   $.ajax({
 //    url:"<?php echo base_url(); ?>settings/filter_branch_wise",
 //    method:"POST",
 //    data:{admin_id:admin_id},
 //    success:function(data)
 //    {
 //     $('#branch').html(data);
 
 //    }
 //   });
 // });

</script>
<script>
  $(document).ready(function(){
 
    $('#branch_id').change(function(){
 
  var branch_id = $('#branch_id').val();
  //var course_id = $('#course_orsingle').val();
 // var branch_id =  $('#branch_id').val();
 
   $.ajax({
    url:"<?php echo base_url(); ?>settings/filter_department_wise",
    method:"POST",
    data:{ 'branch_id' : branch_id },
    success:function(data)
    {
     $('#department').html(data);
 
    }
   });
 });


 $('#b_id').change(function(){
 
  var branch_id = $('#b_id').val();
  //var course_id = $('#course_orsingle').val();
 // var branch_id =  $('#branch_id').val();
 
   $.ajax({
    url:"<?php echo base_url(); ?>settings/fetch_admin_wise_department",
    method:"POST",
    data:{ 'branch_id' : branch_id },
    success:function(data)
    {
     $('#department').html(data);
 
    }


   });
 });
  });
</script>

<script>
  $(document).ready(function(){
 
$('#department').change(function(){
 
  var department_id = $('#department').val();
  // alert(department_id);
 
   $.ajax({
    url:"<?php echo base_url(); ?>settings/filter_subdepartment_wise",
    method:"POST",
    data:{
      'department_id' : department_id},
    success:function(data)
    {
     $('#subdepartment').html(data);
 
    }
   });
 });
  });
</script>
<!-- <script type="text/javascript">
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
        url:"<?php echo base_url(); ?>settings/fetch_all_branch",
        success:function(data){
          $('#branch').html(data);
        }
      });
    });
  });
</script> -->
<!-- <script type="text/javascript">
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
</script> -->
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
</body>
</html>
