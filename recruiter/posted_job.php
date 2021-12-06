
    <?php include('header.php'); 
    	include('db.php');?>
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/new_post_background.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Posted Jobs</span></p>
            <h1 class="mb-3 bread">Posted Jobs</h1>
          </div>
        </div>
      </div>
    </div>

        <section class="ftco-section ftco-no-pb bg-light">
    	<div class="container">
    		<div class="row justify-content-center mb-4">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Browse Jobs</span>
            <h2 class="mb-4">Advance Search</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="ftco-search">
						<div class="row">
	            <div class="col-md-12 nav-link-wrap">
		            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find</a>
<!-- 
		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Find a Candidate</a>
 -->
		            </div>
		          </div>
		          <div class="col-md-12 tab-wrap">
		            
		            <div class="tab-content p-4" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
		              	<form method="post" class="search-job">
		              		<div class="row no-gutters">
		              			<div class="col-md mr-md-2">
		              				<div class="form-group">
		              					<label>Starting Date</label>
			              				<div class="form-field">
			              					<div class="icon"><span class="icon-briefcase"></span></div>
							                <input type="date" name="start_date" class="form-control" placeholder="Enter start date">
							              </div>
						              </div>
		              			</div>

		              			<div class="col-md mr-md-2">
		              				<div class="form-group">
		              					<label>Ending Date</label>
			              				<div class="form-field">
			              					<div class="icon"><span class="icon-briefcase"></span></div>
							                <input type="date" name="end_date" class="form-control" placeholder="Enter end date">
							              </div>
						              </div>
		              			</div>


		              			
		              			<div class="col-md mr-md-2">
		              				<div class="form-group">
		              					<label>Status</label>
		              					<div class="form-field">
			              					<div class="icon"><span class="icon-map-marker"></span></div>
							                <input type="text" name="status" class="form-control" placeholder="status">
							              </div>
						              </div>
		              			</div>
		              			<div class="col-md">
		              				<div class="form-group">
		              					<label></label>
		              					<div class="form-field">
						                	<button type="submit" value="Search" name="Search"  class="form-control btn btn-primary">Search</button>
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



		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 pr-lg-4">
						<div class="row">

					<?php 
						if(@$_SESSION['recruiter_data']['company_name']!='') { 
							$co_id = $_SESSION['recruiter_data']['company_id'];
							if(isset($_POST['Search']))
							{
								$start_date =  $_POST['start_date'];
								$end_date =  $_POST['end_date'];
								$status =  $_POST['status'];
								if($start_date != '' && $end_date !=''  && $status != '')
								{
									$query ="select * from job_post job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where job_post.company_id='$co_id' AND ((`start_date` between '$start_date' and '$end_date' ) OR (`end_date` between '$start_date' and '$end_date')) AND `status`='active' order by `jobpost_id` desc";
								}
								else if($start_date != '' && $end_date != '')
								{
									$query ="select * from job_post job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where job_post.company_id='$co_id' AND ((`start_date` between '$start_date' and '$end_date' ) OR (`end_date` between '$start_date' and '$end_date'))  order by `jobpost_id` desc";
								}
								else
								{
									 $query ="select * from job_post job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where job_post.company_id='$co_id' AND  MONTH(start_date) = MONTH(CURRENT_DATE()) AND YEAR(start_date) = YEAR(CURRENT_DATE()) order by `jobpost_id` desc";
								}
							}
							else
							{
								 $query ="select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where  job_post.company_id='$co_id' AND  MONTH(start_date) = MONTH(CURRENT_DATE()) AND YEAR(start_date) = YEAR(CURRENT_DATE()) order by `jobpost_id` desc";
							}
// 							$que ="SELECT *
// FROM table
// WHERE MONTH(columnName) = MONTH(CURRENT_DATE())
// AND YEAR(columnName) = YEAR(CURRENT_DATE())";


							$query1 = mysqli_query($con,$query);
							$num =  mysqli_num_rows($query1);
							if($num >0) {
							while($query2 = mysqli_fetch_array($query1)) {

					?>		
				<div class="col-md-12 ftco-animate">
		            <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
		              <div class="one-third mb-4 mb-md-0">
		                <div class="job-post-item-header align-items-center">
		                	<span class="subadge">Start date: <?php echo $query2['start_date']; ?></span>

		                	<span class="subadge">End date: <?php echo $query2['end_date']; ?></span>
		                  <h2 class="mr-3 text-black"><?php echo $query2['job_name']; ?></h2>
		                  <p><?php echo $query2['job_description'];?></p>
		                </div>
		                <div class="job-post-item-body d-block d-md-flex">
		                  <div class="mr-3"><span class="icon-layers"></span> <a href="#"><?php echo $query2['no_of_vacancy']; ?></a></div>
		                  <div><span class="icon-my_location"></span> <span><?php echo $query2['city']; ?>, <?php echo $query2['job_area']; ?></span></div>
		                </div>
		              </div>

		              <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
		              	<div>
			                <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
			                	<span class="icon-heart"></span>
			                </a>
		                </div>
		                <?php 
		                $com_id =  $query2['company_id'];
		                $job_id =  $query2['jobpost_id'];
		                $count_record = "select * from student_applied_job where `company_id`='$com_id' AND `jobpost_id`='$job_id'";
		                $count_record1 = mysqli_query($con,$count_record);
		                $count =  mysqli_num_rows($count_record1);
		                ?>
		                <?php $company_id = strtr(base64_encode($query2['company_id']), '+/=', '._-'); 
		                	$job_post_id = strtr(base64_encode($query2['jobpost_id']), '+/=', '._-'); ?>
		                <a href="applications.php?jobpost_id=<?php echo $job_post_id; ?>&company_id=<?php echo $company_id; ?>" class="btn btn-primary py-2">View Application (<?php echo $count; ?>)</a>
		              </div>
		            </div>
		          </div><!-- end -->
		      <?php }  }else { ?>
				<div class="col-md-12 ftco-animate">
		            <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
		              <div class="one-third mb-4 mb-md-0">
		                <div class="job-post-item-header align-items-center">
											<span class="subadge"></span>
		                  <h2 class="mr-3 text-black"><a href="#">No Record Found</a></h2>
		                </div>
		                <div class="job-post-item-body d-block d-md-flex">
		                 <!--  <div class="mr-3"><span class="icon-layers"></span> <a href="#">Google, Inc.</a></div> -->
		                 <!--  <div><span class="icon-my_location"></span> <span>Western City, UK</span></div> -->
		                </div>
		              </div>

		              <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
		              	<div>
			                <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
			                	<span class="icon-heart"></span>
			                </a>
		                </div>
		                
		              </div>
		            </div>
		          </div><!-- end -->
		      <?php } } ?>
		        
		        </div>
		        <!-- <div class="row mt-5">
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
		        </div> -->
		      </div>
		      <div class="col-lg-3 sidebar">
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

  <?php include('footer.php'); ?>