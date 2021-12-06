<style>
.profile1{
  max-width:180px;
}


</style>
 <?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?>
        
<?php 
$total_running=0;  $total_done=0;  $total_leave=0;   $total_cancel=0;
foreach($demo_all as $val)
{
    if($val->discard=="0") {
            if(in_array($val->branch_id,$branch_ids) && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
                
               if($val->demoStatus=="0")
               {
                   $total_running++;
                   
               }
               else if($val->demoStatus=="1")
               {
                   $total_done++;
                   
               }
               else if($val->demoStatus=="2")
               {
                   $total_leave++;
                   
               }
               else if($val->demoStatus=="3")
               {
                   $total_cancel++;
                   
               }
                
            }
     }
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            <?php if($_SESSION['user_image']=="") { ?>
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" alt="User profile picture">
              <?php } else { ?>
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image'];  ?>" alt="User profile picture">
              <?php } ?>

              <h3 class="profile-username text-center"><?php echo $_SESSION['user_name']; ?></h3>

              <p class="text-muted text-center">
              <?php   echo $_SESSION['designation'];  ?>
              </p>
              
              <p> 
              <?php 
              if($_SESSION['logtype']!="Super Admin")
              {
                  $brans_ids = explode(",",$_SESSION['branch_ids']);
              foreach($branch_all as $row) {  
                  if(in_array($row->branch_id,$brans_ids)) {
				   echo $row->branch_name." <br> ";  } }  } ?>
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Running Demo</b> <a class="pull-right"><?php echo $total_running; ?></a>
                </li>
                 <li class="list-group-item">
                  <b>On Leave Demo</b> <a class="pull-right"><?php echo $total_leave; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Admission</b> <a class="pull-right"><?php echo $total_done; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Cancel Demo</b> <a class="pull-right"><?php echo $total_cancel; ?></a>
                </li>
              </ul>

             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
        	<?php if(!empty($msgp)) { ?> <p style="color:#F00;"><?php echo $msgp;  ?></p> <?php } ?>
            <?php if(!empty($msgpc)) { ?> <p style="color:#090;"><?php echo $msgpc;  ?></p> <?php } ?>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Change Profile Picture</a></li>
            
              <li><a href="#settings" data-toggle="tab">Change Password</a></li>
              <li><a href="#details" data-toggle="tab">Change Details</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              	<form enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>settings/profile">
                	<input type='file' name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg,image/png"  onchange="readURL(this);" />
                   <?php if($_SESSION['user_image']=="") { ?>
<img id="blah" class="profile1" src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" alt="your image" />
					<?php } else { ?>
                    <img id="blah" class="profile1" src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image'];  ?>" alt="your image" />
                    <?php } ?>
						<br>
					<input type="submit" name="cimage" class="btn btn-success" value="Change Image">

				</form>
                
              </div>
             

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>settings/profile">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">New Password</label>

                    <div class="col-sm-10">
                      <input type="text" name="npass" class="form-control" id="inputName" placeholder="New Password">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName"   class="col-sm-2 control-label">Confirm Passowrd</label>

                    <div class="col-sm-10">
                      <input type="text" name="cpass" class="form-control" id="inputName" placeholder="Confirm Passowrd">
                    </div>
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-danger" value="Change Password" name="cpassword">
                    </div>
                  </div>
                </form>
              </div>





                <div class="tab-pane" id="details">
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>settings/profile">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" id="inputName" placeholder="New Email" value="<?php echo $_SESSION['user_email']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Designation</label>

                    <div class="col-sm-10">
                     	<select name="designation" class="form-control">
                     			<option value="0">SELECT YOUR DESIGNATION</option>
                     			<option value="CEO">CEO</option>
                     			<option value="Dean">Dean</option>
                     			<option value="Center Head">Center Head</option>
                     			<option value="HR">HR</option>
                     			<option value="HOD">HOD</option>
                     			<option value="Sr.Faculty">Sr. Faculty</option>
                     			<option value="Jr.Faculty">Jr. Faculty</option>
                     			<option value="Sr.Counselor">Sr. Counselor</option>
                     			<option value="Jr.Counselor">Jr. Counselor</option>
                     			<option value="Sr.Telecaller">Sr. Telecaller</option>
                     			<option value="Jr.Telecaller">Jr. Telecaller</option>
                     			<option value="Sr.Cordinator">Sr. Cordinator</option>
                     			<option value="Jr.Cordinator">Jr. Cordinator</option>
                     			<option value="Data Analyst">Data Analyst</option>
                          <option value="Sr. Accountant">Sr. Accountant</option>
                          <option value="Jr. Accountant">Jr. Accountant</option>
                          <option value="Technical Head">Technical Head</option>
                          <option value="Sr. Technician">Sr. Technician</option>
                          <option value="Jr. Technician">Jr. Technician</option>
                     			<option value="Video Editor">Video Editor</option>
                     			<option value="Visiting Faculty">Visiting Faculty</option>
                     	</select>
                    </div>
                  </div>


                  
                  <div class="form-group">
                    <label for="inputName"   class="col-sm-2 control-label">Mobile No</label>

                    <div class="col-sm-10">
                      <input type="text" name="mobile_no" class="form-control" id="inputName" placeholder="Enter Mobile No">
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label for="inputName"   class="col-sm-2 control-label">Personal No</label>

                    <div class="col-sm-10">
                      <input type="text" name="personal_no" class="form-control" id="inputName" placeholder="Enter Personal No">
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-danger" value="Change Details" name="f_details">
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  
  
<script>
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>  
  