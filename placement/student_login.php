<?php 

 ob_start();
 session_start();
include('student_header.php');
 include('db.php');

   
            // $a='PHPMailer/PHPMailer/PHPMailerAutoload.php';
            // require $a;



           
          // include('db.php');
          if(isset($_POST['submit']))
          {
            $username = $_POST['username'];
            $pass = $_POST['password'];
             $qu ="select * from application_job where `username`='$username' AND `password`='$pass'";
            $qu1 = mysqli_query($con,$qu);
            $qu2 = mysqli_fetch_array($qu1);
            $num =  mysqli_num_rows($qu1);
            if($num == 1)
            {
           
                  
                  if($qu2['application_status']=='1')
                  {
                     $_SESSION['student_record'] = $qu2;;
                     $_SESSION['login_data'] ="successfully Login";
                     header('location:main_page.php');
                  }
                  else
                  {
                      $_SESSION['login_data1'] =  "Contact Placement Department!!";
                  }
            }
            else
            {
                $_SESSION['login_data1'] =  "Username & Password Not Match";
            }
          }

        ?>   
<style type="text/css">
  .box-inner{
    box-shadow: 0 2px 6px 0 rgba(0,0,0,0.15);
    border-radius: 5px;
    padding: 12px 20px;
  }
  .btn-cust {
    text-align: center;
  }
  .btn-cust .btn-success {
    border-radius: 3px;
    border: 0;
    background-color: #C52410 !important;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
  }
  .btn-text {
    font-size: 12px !important;
    line-height: 30px !important;
    padding: 0 30px !important;
    margin-bottom: 20px !important;
  }
 
</style>
	<section class="posted_job_form d-inline-block w-100 position-relative" id="post_a_job">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="sec-heading text-center">
            <h2>Student Login</h2>
			        </div>
				</div>
			</div>
			<div class="col-xl-6 mx-auto">
        <div class="box-inner">
          <?php if(@$_SESSION['login_data1']) { ?>
          <div class="alert alert-danger"><?php echo $_SESSION['login_data1']; ?></div>
          <?php  unset($_SESSION['login_data1']); } ?>
          <?php if(@$_SESSION['login_data']) { ?>
          <div class="alert alert-success"><?php echo $_SESSION['login_data']; ?></div>
          <?php  }  ?>
  				<form method="post">
            <!-- <div class="col-xl-12 p-3"> -->
              <div class="row justify-content-center">              
                <div class="col-12">
                    <div class="form-group">
                        <label>Enter Username</label>
                        <input type="email" name="username" placeholder="Enter Your Email ID" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="password" placeholder="Enter Your Password" class="form-control" >
                    </div>
                </div>
                <div class="col-12 align-items-center">
                    <div class="form-group btn-cust">
                        <input type="submit" value="Login" name="submit" class="btn btn-success">
                    </div>
                </div>
              </div>
           <!--  </div> -->
  				</form>
        </div>
		   </div>		
		</div>
	</section>
	

 


<?php include('footer.php'); ?>	


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="margin-left:300px;">Apply On Job</h4>
        </div>
        <div class="modal-body">
         

         <form method="post"  enctype="multipart/form-data" >
            <div class="modal-body">
          
                 <input type="hidden" name="add_jobpost_id" id="add_jobpost_id">
                <input type="hidden" name="add_company_id" id="add_company_id">
                <input type="hidden" name="add_student_id" id="add_student_id">
                <input type="hidden" name="add_position_data" id="add_position_data">

                 <div class="form-group">
                        <label>About Your Skill</label>
                        <textarea class="form-control" name="about_skill" id="about_skill" rows="5" placeholder="Enter ..."></textarea>
                        <span id="about_skill_error" style="color:red"></span>
                  </div>

                  <div class="form-group">
                        <label>Upload Resume</label>
                        <input type="file" class="form-control"  id="resume" name="resume">

                        <span style="color:red" id="resume_error"></span>
                  </div>

            </div>
         
            <div class="modal-footer ">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              <button type="submit" value="Apply Job" name="Apply_Job" onclick="return validateForm()" class="btn btn-primary">Save changes</button>
            </div>
          </form>

        </div>
        
      </div>
      
    </div>
  </div>


  <script type="text/javascript">
  	
        function jobpost_modal(id)
        {
          var jobpp =  "jobpost_id"+id;
          var compp =  "company_id"+id;
          var studpp =  "student_id"+id;
         
          var posipp =  "position_data"+id;
          var jobpost_id =  $('#'+jobpp).val();
          var company_id =  $('#'+compp).val();
          var student_id =  $('#'+studpp).val();
          var position_data =  $('#'+posipp).val();
        
     
          $('#add_jobpost_id').val(jobpost_id);          
          $('#add_company_id').val(company_id);          
          $('#add_student_id').val(student_id);    
          $('#add_position_data').val(position_data);      
        }

  </script>