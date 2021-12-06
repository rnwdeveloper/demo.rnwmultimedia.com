<div class="post_a_job_page"></div>


<?php include('new_header.php');
	  include('db.php');


	  if(@$_POST['Interview_session'])
	  {
	  	$student_id = $_POST['student_id'];
	  	$jobpost_id = $_POST['add_jobpost'];
	  	$company_id = $_POST['add_company'];
	  	$response = $_POST['response'];
	  	$response_query ="update student_applied_job set `response`='$response' where (`company_id`='$company_id' AND `jobpost_id`='$jobpost_id' AND `student_id`='$student_id')";
	  	$response_query1 = mysqli_query($con,$response_query);
	  	if($response_query1)
	  	{
	  		$data_success ="Response give successfully";
	  	}
	  }


	    $company_id = strtr(base64_decode($_GET['company_id']), '+/=', '._-'); 
        $job_post_id = strtr(base64_decode($_GET['jobpost_id']), '+/=', '._-'); 
        

	  if(isset($job_post_id) && isset($company_id)) { 

	  	if(!empty($_GET['resume'])){
		    $fileName = basename($_GET['resume']);
		    $filePath = '../student_placement/resumes/'.$fileName;
		    if(!empty($fileName) && file_exists($filePath)){
		        // Define headers
		        header("Cache-Control: public");
		        header("Content-Description: File Transfer");
		        header("Content-Disposition: attachment; filename=$fileName");
		        header("Content-Type: application/zip");
		        header("Content-Transfer-Encoding: binary");
		        
		        // Read the file
		        readfile($filePath);
		        exit;
		    }else{
		        $data_success = 'The file does not exist.';
		    }
		}
	  	$jobpost_id = $job_post_id;
	  	$company_id = $company_id;

	  	if(isset($_POST['submit']))
	  	{
	  		$name =  @$_POST['name'];
	  		$education =  @$_POST['education'];
	  		$skill =  @$_POST['skill'];

	  		if($name != '' && $education != '' && $skill != '')
	  		{
	  			 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND (`name` LIKE '%$name%' AND `qualification` LIKE '%$education%' AND `skill` LIKE '%$skill%')";
	  		}
	  		else if($name != '' && $education != '')
	  		{
	  			 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND (`name` LIKE '%$name%' AND `qualification` LIKE '%$education%')";
	  		}
	  		else if($name != '' && $skill != '')
	  		{
	  			  $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND (`name` LIKE '%$name%' AND `skill` LIKE '%$skill%')";	
	  		}
	  		else if($education != '' && $skill != '')
	  		{
	  			 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND (`qualification` LIKE '%$education%' AND `skill` LIKE '%$skill%')";
	  		}
	  		else if($name != '')
	  		{
	  			  $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND (`name` LIKE '%$name%')";
	  		}
	  		else if($education != '')
	  		{
	  			 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND (`qualification` LIKE '%$education%')";
	  		}
	  		else if($skill != '')
	  		{
	  			 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND (`skill` LIKE '%$skill%')";
	  		}
	  		else 
	  		{
				 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id'";

	  		}
	  	}
	  	else
	  	{
	  	 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id'";
	  	}
	  	$query1 = mysqli_query($con,$query);

	  }
	  else
	  {
	  	header('posted_job.php');
	  }
	  

?>
	

	<section class="posted_job_form d-inline-block w-100 position: relative" id="post_a_job">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="sec-heading text-center">
			            <h2>Hire Your Best Candidatess</h2>
			            <h3>Searching</h3>
			        </div>
				</div>
			</div>
			<div class="col-xl-10 mx-auto">
				<form class="row">
					<div class="col-xl-12 border p-3">
						<div class="row">
							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
							 	<div class="form-group">
							 		<label>Name</label>
							 		<input type="text" name="start_dates" placeholder="Name" class="form-control">
							 	</div>
							 </div>
							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
							 	<div class="form-group">
							 		<label>Education</label>
							 		<select name="education" id="" class="form-control">
							 		    <option value="">Category</option>
							 		    <option value="10th">10th</option>
							 		    <option value="12th">12th</option>
							 		    <option value="graduation">Graduation</option>
							 		    <option value="post graduation">Post Graduation</option>
							 		    <option value="any">Any</option>
							 		</select>
							 	</div>
							 </div>
							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
							 	<div class="form-group">
							 		<label>Skill</label>
							 		<input type="text" name="start_date" placeholder="Skill" class="form-control">
							 	</div>
							 </div>
							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
							 	<label>&nbsp;</label>
							 	<button type="button" class="btn btn-primary btn-block">Search</button>
							 </div>
						</div>
					</div>
				</form>
			</div>
			<?php 
			
						if(isset($data_success)) { ?>
    						<div class="alert alert-success">
    							<?php echo $data_success; ?>
    						</div>
						<?php } ?>
			<div class="col-xl-12 mt-4">
				<div class="row">
					 	
						<?php 
    					$num = mysqli_num_rows($query1);
    					if($num > 0 ) { $i=0;
    						while($query2 = mysqli_fetch_array($query1)) { ?>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="posted_job_box">
							<p class="start_end_date location"><?php echo $query2['city']; ?></p>
							<span class="Job_student_name"><?php $name =  explode(' ',$query2['name']); echo @$name[0]." ".@$name[1];  ?></span>
							<p class="student_position"><?php echo $query2['qualification'];?></p>
							<p class="student_skill"><?php echo $query2['skill']; ?></p>
							<ul class="student_contact_info">
								<li><a href="mailto:parthkachhadiya555@gmail.com"><?php echo $query2['email']; ?></a></li>
								<li><a href="tel:9737597253"><?php echo $query2['number'];?></a></li>
							</ul>
							<div class="student_contact_info_btns">
								<a href="applications.php?jobpost_id=<?php echo $query2['jobpost_id']; ?>&company_id=<?php echo $query2['company_id']; ?>&resume=<?php echo $query2['resume']; ?>" class="btn btn-primary">Download Resume</a>
								<?php 
								$co_id = $query2['company_id'];
								$jo_id = $query2['jobpost_id'];
								$st_id = $query2['gr_id'];
								$check_applied = "select * from student_applied_job where `company_id`='$co_id' AND `jobpost_id`='$jo_id' AND `student_id`='$st_id'";
								$check_applied1 = mysqli_query($con,$check_applied);
								$reco =  mysqli_fetch_array($check_applied1);
								$rs =  $reco['response'];
								if($rs != ''){
								?>
								<a href="javascript:al()" onclick="return set_interview_data()" class="btn btn-danger">Already Set Interview</a>
								<?php } else { ?>
								<a href="javascript:al()" class="btn btn-primary" data-toggle="modal" data-target="#myModal"  onclick="return get_response_data(<?php echo $i; ?>)">Timing for Interview session</a>

							<?php } ?>
							<input type="hidden" name="add_jobpost_id" id="add_jobpost_id<?php echo $i; ?>" value="<?php echo $query2['jobpost_id']; ?>" >
								  <input type="hidden" name="add_company_id" id="add_company_id<?php echo $i; ?>" value="<?php  echo $query2['company_id']; ?>" >
								  <input type="hidden" name="add_email" id="add_email<?php echo $i; ?>" value="<?php echo $query2['gr_id'];; ?>" >	
							</div>
						</div>
					</div>
				<?php } } else { ?>

					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="posted_job_box">
							<!-- <p class="start_end_date location">Surat</p> -->
							<span class="Job_student_name">No Record Found</span>
							<!-- <p class="student_position">Graduation</p> -->
							<!-- <p class="student_skill">UI/UX DESIGN, WEB DESIGN , LOGO DESIGN ,BROCHURE DESIGN ,  PACKAGING DESIGN, T-SHIRT DESIGN, GRAPHICS DESIGN ,BRANDING  DESIGN</p> -->
							<!-- <ul class="student_contact_info">
								<li><a href="mailto:parthkachhadiya555@gmail.com">parthkachhadiya555@gmail.com</a></li>
								<li><a href="tel:9737597253">9737597253</a></li>
							</ul>
							<div class="student_contact_info_btns">
								<a href="#" class="btn btn-primary">Download Resume</a>
								<a href="#" class="btn btn-danger">Already Set Interview</a>
							</div> -->
						</div>
					</div>
					<?php }  ?>
					
				</div>
			</div>
		</div>
	</section>


	 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" >For Interview Session</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
      
         

         <form method="post"  enctype="multipart/form-data" >
            <div class="modal-body">
          
                <input type="hidden" name="add_jobpost" id="add_jobpost">
                <input type="hidden" name="add_company" id="add_company">
                <input type="hidden" name="student_id" id="email_add">
					 <label>Enter time and Date For Interview Session</label>
                        <textarea class="form-control" name="response" id="response" rows="5" placeholder="Enter ..."></textarea>
                        <span id="about_skill_error" style="color:red"></span>
              </div>
         
            <div class="modal-footer ">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              <button type="submit" value="Interview_session" name="Interview_session" onclick="return validateForm()" class="btn btn-primary">Save changes</button>
            </div>
          </form>

        </div>
        
      </div>
      
    </div>
  </div>


<?php include('footer.php'); ?>	

<script>
function set_interview_data()
{
	alert("already set interview");
}

  </script>



  <script>
     function get_response_data(id)
     {
        var job_post =  "add_jobpost_id"+id;
        var compnay  =  "add_company_id"+id;
        var email    =  "add_email"+id;

        var jobpost_id =  $('#'+job_post).val();
        var company_id =  $('#'+compnay).val();
        var email_id =  $('#'+email).val();
        $('#add_jobpost').val(jobpost_id);
        $('#add_company').val(company_id);
        $('#email_add').val(email_id);
        // alert(company_id);
     }
  </script>