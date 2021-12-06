
<?php include('header.php');
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
    
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Canditates</span></p>
            <h1 class="mb-3 bread">Hire Your Best Candidates</h1>
          </div>
        </div>
      </div>
    </div>

    	<section class="ftco-section ftco-no-pb bg-light">
    	<div class="container">
    		<div class="row justify-content-center mb-4">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Browse Candidates</span>
            <h2 class="mb-4">Searching</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="ftco-search">
						<div class="row">
	            <div class="col-md-12 nav-link-wrap">
		            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Candidates</a>

		              
		            </div>
		          </div>
		          <div class="col-md-12 tab-wrap">
		            
		            <div class="tab-content p-4" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
		              	<form method="post" class="search-job">
		              		<div class="row no-gutters">
		              			<div class="col-md mr-md-2">
		              				<div class="form-group">
		              					<label>name</label>
			              				<div class="form-field">
			              					<div class="icon"><span class="icon-briefcase"></span></div>
							                <input type="text" name="name" class="form-control" placeholder="enter name">
							              </div>
						              </div>
		              			</div>
		              			<div class="col-md mr-md-2">
		              				<div class="form-group">
		              					<label>Education</label>
		              					<div class="form-field">
			              					<div class="select-wrap">
					                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
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
						              </div>
		              			</div>
		              			<div class="col-md mr-md-2">
		              				<div class="form-group">
		              					<label>skill</label>
		              					<div class="form-field">
			              					<div class="icon"><span class="icon-map-marker"></span></div>
							                <input type="text" name="skill" class="form-control" placeholder="skill">
							              </div>
						              </div>
		              			</div>
		              			<div class="col-md">
		              				<div class="form-group">
		              					<label>Search</label>
		              					<div class="form-field">
						                	<button type="submit" name="submit" value="submit" class="form-control btn btn-primary">Search</button>
							              </div>
						              </div>
		              			</div>
		              		</div>
		              	</form>
		              </div>

		              
		            </div>
		          </div>
		        </div>
	        </div>
    		</div>
    	</div>
    </section>




		<section class="ftco-section ftco-candidates ftco-candidates-2 bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-8 pr-lg-4">
    				<div class="row">
    						<?php 

    						if(isset($data_success)) { ?>
    							<div class="alert alert-success">
    								<?php echo $data_success; ?>
    							</div>

    							<?php } ?>

    					<?php
							
						
    					$num = mysqli_num_rows($query1);
    					if($num > 0 ) { $i=0;
    						while($query2 = mysqli_fetch_array($query1)) { ?>
		    			<div class="col-md-12">
		    				<div class="team d-md-flex p-4 bg-white">
		        			<!-- <div class="img" style="background-image: url(images/person_1.jpg);"></div> -->
		        			<div class="text pl-md-4">
		        				<span class="location mb-0"><?php echo $query2['city']?></span>
		        				<h2><?php echo $query2['name'];?></h2>
			        			<span class="position"><?php echo $query2['qualification']?></span>
			        			<p class="mb-2"><?php echo $query2['skill']; ?></p>
			        			<span class="seen"><?php echo $query2['email']; ?></span><br>
			        			<span class="seen"><?php echo $query2['number']; ?></span>
			        			<p>
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
								<a href="#" class="btn btn-danger"   onclick="return set_interview_data()">Already Set Interview</a>
								
							<?php } else { ?>
								<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal"  onclick="return get_response_data(<?php echo $i; ?>)">Timing for Interview session</a>

							<?php } ?>
											        			</p>
								  <input type="hidden" name="add_jobpost_id" id="add_jobpost_id<?php echo $i; ?>" value="<?php echo $query2['jobpost_id']; ?>" >
								  <input type="hidden" name="add_company_id" id="add_company_id<?php echo $i; ?>" value="<?php  echo $query2['company_id']; ?>" >
								  <input type="hidden" name="add_email" id="add_email<?php echo $i; ?>" value="<?php echo $query2['gr_id'];; ?>" >	
		        			</div>

		        		</div>
		    			</div>
		    		<?php $i++; } }else { ?>
		    			<div class="col-md-12">
		    				<div class="team d-md-flex p-4 bg-white">
		        			<!-- <div class="img" style="background-image: url(images/person_2.jpg);"></div> -->
		        			<div class="text pl-md-4">
<!-- 		        				<span class="location mb-0">Western City, UK</span>
		        				<h2>Danica Lewis</h2>
			        			<span class="position">Graduate</span>
			        			<p class="mb-2">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			        			<span class="seen">Last Activity 4 months ago</span> -->
			        			<p><a href="#" class="btn btn-primary">No Record Found</a></p>
		        			</div>
		        		</div>
		    			</div>
		    		<?php } ?>
		    			
		    		</div>
		    		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
		    	</div>
		    	<div class="col-lg-4 sidebar">
		        <div class="sidebar-box bg-white p-4 ftco-animate">
		        	<h3 class="heading-sidebar">Browse Category</h3>
		        	<form action="#" class="search-form mb-3">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Search...">
                </div>
              </form>
		        	<form action="#" class="browse-form">
							  <label for="option-job-1"><input type="checkbox" id="option-job-1" name="vehicle" value="" checked> Website &amp; Software</label><br>
							  <label for="option-job-2"><input type="checkbox" id="option-job-2" name="vehicle" value=""> Education &amp; Training</label><br>
							  <label for="option-job-3"><input type="checkbox" id="option-job-3" name="vehicle" value=""> Graphics Design</label><br>
							  <label for="option-job-4"><input type="checkbox" id="option-job-4" name="vehicle" value=""> Accounting &amp; Finance</label><br>
							  <label for="option-job-5"><input type="checkbox" id="option-job-5" name="vehicle" value=""> Restaurant &amp; Food</label><br>
							  <label for="option-job-6"><input type="checkbox" id="option-job-6" name="vehicle" value=""> Health &amp; Hospital</label><br>
							</form>
		        </div>

		        <div class="sidebar-box bg-white p-4 ftco-animate">
		        	<h3 class="heading-sidebar">Select Location</h3>
		        	<form action="#" class="search-form mb-3">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Search...">
                </div>
              </form>
		        	<form action="#" class="browse-form">
							  <label for="option-location-1"><input type="checkbox" id="option-location-1" name="vehicle" value="" checked> Sydney, Australia</label><br>
							  <label for="option-location-2"><input type="checkbox" id="option-location-2" name="vehicle" value=""> New York, United States</label><br>
							  <label for="option-location-3"><input type="checkbox" id="option-location-3" name="vehicle" value=""> Tokyo, Japan</label><br>
							  <label for="option-location-4"><input type="checkbox" id="option-location-4" name="vehicle" value=""> Manila, Philippines</label><br>
							  <label for="option-location-5"><input type="checkbox" id="option-location-5" name="vehicle" value=""> Seoul, South Korea</label><br>
							  <label for="option-location-6"><input type="checkbox" id="option-location-6" name="vehicle" value=""> Western City, UK</label><br>
							</form>
		        </div>

		        <div class="sidebar-box bg-white p-4 ftco-animate">
		        	<h3 class="heading-sidebar">Job Type</h3>
		        	<form action="#" class="browse-form">
							  <label for="option-job-type-1"><input type="checkbox" id="option-job-type-1" name="vehicle" value="" checked> Partime</label><br>
							  <label for="option-job-type-2"><input type="checkbox" id="option-job-type-2" name="vehicle" value=""> Fulltime</label><br>
							  <label for="option-job-type-3"><input type="checkbox" id="option-job-type-3" name="vehicle" value=""> Intership</label><br>
							  <label for="option-job-type-4"><input type="checkbox" id="option-job-type-4" name="vehicle" value=""> Temporary</label><br>
							  <label for="option-job-type-5"><input type="checkbox" id="option-job-type-5" name="vehicle" value=""> Freelance</label><br>
							  <label for="option-job-type-6"><input type="checkbox" id="option-job-type-6" name="vehicle" value=""> Fixed</label><br>
							</form>
		        </div>
		      </div>
    		</div>
    	</div>
    </section>
		
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-12">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php include('footer.php');?>

  <script>
function set_interview_data()
{
	alert("already set interview");
}

  </script>