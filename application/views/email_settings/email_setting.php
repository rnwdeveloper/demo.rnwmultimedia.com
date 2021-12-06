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
        EMAIL SETTINGS 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Email Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php if(!empty($this->session->flashdata('message'))) { ?>
              <div class="col-md-12" >
                  
                  <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $this->session->flashdata('message'); ?></div>
              </div>
              <?php } ?>
         <div class="col-md-12">
              <!-- general form elements -->
             <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
              <h3 class="box-title">Add Email Settings</h3>
            </div>
           
            
                    
         <form class="login100-form validate-form" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>EmailSettings/emailSetting">
              <input type="hidden" name="update_id" value="<?php if(!empty($select_email->id)) { echo $select_email->id; } ?>"/>
             
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" >
                          <label for="pwd">Email Type: </label>
                          <br>
                         <input value="1"  type="radio" <?php if(!empty($select_email->email_type) && ($select_email->email_type == 1)) { echo 'checked'; } ?> name="email_type"> Default
                         <input value="2"  type="radio" <?php if(!empty($select_email->email_type) && ($select_email->email_type == 2)) { echo 'checked'; } ?> name="email_type"> From
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                          <label for="pwd">First Name:</label>
                         <input class="form-control"  value="<?php if(!empty($select_email->name[0])) { echo $select_email->name[0]; } ?>"  type="text"  name="first_name" placeholder="Enter First Name">
                        </div>

                        <div class="form-group" >
                          <label for="pwd">Email:</label>
                         <input class="form-control"  value="<?php if(!empty($select_email->email)) { echo $select_email->email; } ?>"  type="text"  name="email" placeholder="Enter Email">
                        </div>
                        <span id="defaultPassword" style="display: none;">
                         
                        <div class="form-group" >
                            <label for="pwd">Host Name:</label>
                           <input class="form-control"  value="<?php if(!empty($select_email->host)) { echo $select_email->host; } ?>"  type="text"  name="host" placeholder="smtp.gmail.com">
                          </div>
                         <div class="form-group">
                              <label >Encryption</label>
                              <select class="form-control" name="encryption">
                                 <option value="">Select Email Encryption</option>
                                 <option value="smtp" <?php if(!empty($select_email->encryption)  && ($select_email->encryption == "smtp")) { echo 'selected'; } ?>>SMTP</option>
                                 <option value="pop" <?php if(!empty($select_email->encryption)  && ($select_email->encryption == "pop")) { echo 'selected'; } ?>>POP</option>
                              </select>
                        </div>
                      </span>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group" >
                          <label for="pwd">Last Name:</label>
                         <input class="form-control"  value="<?php if(!empty($select_email->name[1])) { echo $select_email->name[1]; } ?>"  type="text"  name="last_name" placeholder="Enter Last Name">
                        </div>
                      <span id="default" style="display: none;">
                        <div class="form-group" >
                          <label for="pwd">Password:</label>
                         <input class="form-control"  value="<?php if(!empty($select_email->password)) { echo $select_email->password; } ?>"  type="text"  name="password" placeholder="Enter Password">
                        </div>
                          <div class="form-group" >
                            <label for="pwd">Port:</label>
                           <input class="form-control"  value="<?php if(!empty($select_email->port)) { echo $select_email->port; } ?>"  type="text"  name="port" placeholder="587">
                          </div>
                        </span>
                        <div class="form-group" >
                          <label for="pwd">Default Email Set: </label>
                          <br>
                         <input value="1"  type="checkbox" <?php if(!empty($select_email->is_default) && ($select_email->is_default == 1)) { echo 'checked'; } ?> name="is_default">
                        </div>
                    </div>
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
              <h3 class="box-title">Display Email Settings</h3>
            </div>
            <!-- /.box-header -->
           
              <table id="example1" class="table table-bordered table-striped example1">
                <thead>
                <tr class="th">
                  <th>No</th>
                  <th>First Name</th> 
                  <th>Email</th>
                  <th>Password</th>
                  <th>Host</th>
                  <th>Port</th>
                  <th>Encryption</th>
                  <th>Email Type</th>
                  <th>Set Email</th>
                  <th>Status</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
               
                <?php  $no=1;
                       foreach ($email_all as $key => $value) { ?>
                        <tr class="td">
                           <td><?php echo $no; ?></td>
                           <td><?php echo $value->first_name; ?></td>
                           <td><?php echo $value->email; ?></td>
                           <td><?php echo $value->password; ?></td>
                           <td><?php echo $value->host; ?></td>
                           <td><?php echo $value->port; ?></td>
                           <td><?php echo $value->encryption; ?></td>
                            <td><?php if($value->email_type == 1) { ?><span style="font-size: 13px;" class="label label-info">Defalt</span><?php }else{ ?><span style="font-size: 13px;" class="label label-primary">From</span> <?php } ?></td>
                           <td><?php if($value->is_default == 1){ ?><span class="label label-warning"  style="font-size: 13px;" ><i class="fa fa-check"></i></span><?php } ?></td>
                          <td>
                            <label style="color:#a6a6a6"> <?php if($value->status=="0") { echo "Active"; } if($value->status=="1") { echo  "Disable"; } ?> </label>
                          </td>
                          <td>
                             <div class="dropdown">
                              <button class="btn btn-sm btn-success dropdown-toggle" type="button" data-toggle="dropdown">Action
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>EmailSettings/emailSetting?action=edit&id=<?php echo @$value->id; ?>"> Edit</a></li>
                                <?php if($value->status==0) { ?>
                                <li ><a href="<?php echo base_url(); ?>EmailSettings/emailSetting?action=delete&id=<?php echo @$value->id; ?>&status=<?php echo @$value->status; ?>">Disable</a></li>
                                <?php } else {  ?>
                                
                                <li ><a href="<?php echo base_url(); ?>EmailSettings/emailSetting?action=delete&id=<?php echo @$value->id; ?>&status=<?php echo @$value->status; ?>">Active</a></li>

                               <?php } ?>
                                <li>
                                <a href="<?php echo base_url().'EmailSettings/deleteEmailSettings/'.$value->id;?>" onclick="return confirm('Are you sure you want to delete this email settings?');">Delete</a>
                                </li>                             
                              </ul>
                            </div>
                          </td>
                        </tr>
                <?php $no++; } ?>
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
  });


  /*Email settings*/ 
$(document).ready(function(){
    if ($('input[name=email_type]').is(":checked")){
      if($('input[name=email_type]:checked').val() == 1){

        $('#from').show();
        $('#defaultPassword,#default').show();
      }else{
        $('#defaultPassword,#default').hide();
        $('#from').show();
      }
  }
});

$('input[name=email_type]').click(function(){
  if($(this).val() == 1){
    $('#from').show();
    $('#defaultPassword,#default').show();
  }else{
    $('#defaultPassword,#default').hide();
    $('#from').show();
  }
});
</script >

</body>
</html>
