<?php
		ob_start();
		session_start();
		//echo $_SESSION['record']['company_name'];
		if(@$_SESSION['record']['company_name']){
			include('new_header.php'); 
		}else{
			include('header.php'); 
		}
	?>

	<style type="text/css">

	 

		/*.student{

			margin-top: 260px;

			margin-right: 350px;

		}*/



	 	.post_help{
			position: absolute;
			right: 0px;
			top: 100px;
			background-color:lightgray;
			width: 50px;
			color:red;
			padding:10px 0;
			border-top-left-radius: 10px;
			border-bottom-left-radius: 10px;
			cursor: hand;
			text-align: center;
		}

		.post_help:hover{
			cursor: hand !important;
		}
		.post_help img{
			margin-left:4px;
			margin-top:5px;
		}

		.post_help span{
			text-align: center;
			left:10px;
			font-weight: 800;
			font-size:20px;
		}

		.modal-content iframe{

			margin: 0 auto;

			display: block;

		}		

		.story_slide_info h2 {

		    font-size: 20px;

		    color: #C52410;

		    font-weight: 600;

		    margin-bottom: 20px;

		}

		.story_slide_info a{

			font-size: 16px;

	    	color: #e31e25;

	    	font-weight: 600;

	    }

	    .top_bob_text{

	    	color: #2b2a28;

	    }

	    .fa-hands-helping:before{

	    	    margin-left: 7px;

		    	line-height: 1.3;

		    	margin-top: 10px;

		    	font-size: 27px;

	    }

	</style>

	<section class="banner w-100 position-relative" id="banner">

		<div class="container">

			<?php if($_SESSION['record']['company_name']=='') { ?>

			<div class="row">				

				<div class="col-xl-6 col-lg-6 col-md-6">

					<div class="banner_in_left_block banner_in_right_block ">

						<!-- <img src="images/post_job_bg.jpg" width="100%"> -->

						<img src="images/StudentSide.jpg" width="100%">

						<div class="register_block student">

							<div class="d-inline-block text-center">

								<div class="register_block_job_countre">

									<ul>

										<li>S</li>

										<li>T</li>

										<li>U</li>

										<li>D</li>

										<li>E</li>

										<li>N</li>

										<li>T</li>

									</ul>									

								</div>							

							</div>

						</div>

						<div class="job_post_block">
							<div class="d-inline-block text-center">
								<div class="post_block_job_countre">
									<img src="images/verified.png">
								</div>
								<a href="https://demo.rnwmultimedia.com/placement/main_page.php" class="btn custom-btn cust-btn-red">Student Portal</a>
							</div>							

						</div>

					</div>
				</div>

				


				<div class="col-xl-6 col-lg-6 col-md-6" >
					<div class="banner_in_left_block" >
						<img src="images/companySide.jpg" width="100%">
						<div class="register_block">

							<div class="d-inline-block text-center">

								<div class="register_block_job_countre">

									<ul>

										<li>C</li>

										<li>O</li>

										<li>M</li>

										<li>P</li>

										<li>A</li>

										<li>N</li>

										<li>Y</li>

									</ul>

									<span class="top_bob_text position-relative">Jobs</span>

								</div>

								<!-- <a href="../recruiter/index.php" class="btn custom-btn cust-btn-light-blue" >Login</a><br>-->					<!-- <a href="../recruiter/recruiter_register.php" style='margin-top: 5px;' class="btn custom-btn cust-btn-light-blue" >Register</a> -->

								<!-- <button type="button" style='margin-top: 5px;' class="btn custom-btn cust-btn-light-blue" data-target="#register_model" data-toggle="modal">Register</button> -->

								<button type="button" style="left: 45px; position: relative;" class="btn custom-btn cust-btn-light-blue" data-toggle="modal" data-target="#login_model">Sign In</button><br>

								<button type="button" style='margin-top: 5px; left: 45px; position: relative;' class="btn custom-btn cust-btn-light-blue" data-target="#register_model" data-toggle="modal">Sign Up</button>

							</div>

						</div>

					</div>

					<!-- <span class="timing" style=" width: 100%;">

						<ul style="background-color: rgba(255,255,255,0.5);">

							<li>

								<a href="tel:9331313196">Tuesday | Friday  &nbsp;<i class="fa fa-calendar" style="padding: 2px 5px 0px 0px;"></i> </a>

								<a href="mailto:placement.rnwmultimedia@gmail.com">12:00 PM to 1:00 PM | 2:00 PM to 4:00 PM  &nbsp;<i class="fa fa-clock-o" style="padding: 5px 5px 0px 0px;"></i> </a>

							</li>

							 <li>

								

							</li> 

						</ul>	

					</span> -->

				</div>

			<?php } ?>

		</div>

		<div class="post_help" data-target="#myModal"  data-toggle="modal" id="post_help">  
			<img src="https://demo.rnwmultimedia.com/placement/images/helpIcon.png" height="30" width="30">
	        <span><br>H<br>e<br>l<br>p</span>
		</div>

	</section>



	<section class="success_storics d-inline-block w-100 position-relative" id="success_storics">

		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="sec-heading text-center">
						<span>What Our Students say</span>
						<h2>Our Success Stories</h2>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="recent_jobs d-inline-block w-100 position-relative pt-0" id="recent_jobs">

		<div class="container ju">

			<div class="sec-heading">

				<h2 class="text-center">5 Tips to Pass Your Interview!</h2>

			</div>

			<div class="row">

				<div class="col-xl-6 col-lg-6 col-md-12">

					<div class="recent_jobs_right_block">

						<div class="recent_jobs_video_block">

							<div class="embed-responsive embed-responsive-16by9">

								<iframe width="100%" height="315" src="https://www.youtube.com/embed/yL19XilAtO0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

							</div>

						</div>

					</div>

				</div>

				<div class="col-xl-6 col-lg-6 col-md-12">

					<div class="recent_jobs_right_block">

						<div class="recent_jobs_video_block">

							<div class="embed-responsive embed-responsive-16by9">

								<iframe width="100%" height="315" src="https://www.youtube.com/embed/WijSprr9lSU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</section>	

	<section class="counter d-inline-block w-100 position-relative">

		<div class="container">

			<div class="row">

				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">

					<div class="counter_box">

						<h3><span class="Count">600 </span>+</h3>

						<span class="counter_box_lable">Collaboration Company</span>

					</div>

				</div>

				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">

					<div class="counter_box">

						<h3><span class="Count">099 </span>+</h3>

						<span class="counter_box_lable">Resume</span>

					</div>

				</div>

				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">

					<div class="counter_box">

						<h3><span class="Count">288</span>+</h3>

						<span class="counter_box_lable">Jobs Available</span>

					</div>

				</div>

				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">

					<div class="counter_box">

						<h3><span class="Count">10000 </span>+</h3>

						<span class="counter_box_lable">Placed Student</span>

					</div>

				</div>

			</div>

		</div>

	</section>

	<section class="placement_partner d-inline-block w-100 position-relative" id="placement_partner">

		<div class="container">

			<div class="row">

				<div class="col-xl-12">

					<div class="sec-heading text-center">

						<h2>Placement Partner</h2>

						<p>Are you struggling to get the right Web Designing/Graphics Designing/Android/iOS/Core PHP/Laravel Etc, Candidate? Are you tired of searching appropriately skilled resources that will fit in your team? No more worries!! We, at Red & White Group of Institute, are at your disposal to give you a complete solution to the problems arising in IT Experts. There is a stiff competition in every field and corporate is no exception, with numerous companies increasing at a rapid speed. At that time, many students of the institute are moving in the right direction, along with the Red and White Group of Institutions giving their experts what they want. If you join this institute, you will get an accurate solution to your problem.</p>

					</div>

				</div>

			</div>

			<div class="row">

				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">

					<div class="placement_partner_company_logo position-relative">

						<img src="https://demo.rnwmultimedia.com/placement/Logo/dynamic-dreams.png" width="100%">

					</div>

				</div>

				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">

					<div class="placement_partner_company_logo position-relative">

						<img src="https://demo.rnwmultimedia.com/placement/Logo/coursecate.png" width="100%">

					</div>

				</div>

				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">

					<div class="placement_partner_company_logo position-relative">

						<img src="https://demo.rnwmultimedia.com/placement/Logo/narola.png" width="100%">

					</div>

				</div>

				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">

					<div class="placement_partner_company_logo position-relative">

						<img src="https://demo.rnwmultimedia.com/placement/Logo/triveni.png" width="100%">

					</div>

				</div>

				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">

					<div class="placement_partner_company_logo position-relative">

						<img src="https://demo.rnwmultimedia.com/placement/Logo/artoon.png" width="100%">

					</div>

				</div>

				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">

					<div class="placement_partner_company_logo position-relative">

						<img src="https://demo.rnwmultimedia.com/placement/Logo/casepoint.jpg" width="100%">

					</div>

				</div>

				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">

					<div class="placement_partner_company_logo position-relative">

	<img style="filter: drop-shadow(0px 0px 4px rgba(0,0,0,0.5));" src="https://demo.rnwmultimedia.com/placement/Logo/peacock.png" width="100%">
					</div>

				</div>

				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">

					<div class="placement_partner_company_logo position-relative">

						<img src="https://demo.rnwmultimedia.com/placement/Logo/hevin.jpg" width="100%">

					</div>

				</div>
				<div class="col-xl-12 text-center mt-3">

					<a href="https://www.rnwmultimedia.com/placement-partners/" target="_blank" class="btn custom-btn cust-btn-red">View All</a>

				</div>

			</div>

		</div>

	</section>

	<section class="company_testimonials d-inline-block w-100 position-relative" id="company_testimonials">

		<div class="container">

			<div class="row">

				<div class="col-xl-12">

					<div class="sec-heading text-center">

						<h2>Company Testimonials</h2>

					</div>

				</div>

			</div>

			<div class="row">

				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

					<div class="client_testi_box">

						<iframe width="100%" height="315" src="https://www.youtube.com/embed/M0aBW6JFwSY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

					</div>

				</div>

				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

					<div class="client_testi_box">

						 <iframe width="100%" height="315" src="https://www.youtube.com/embed/dLCL_S68zO8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

					</div>

				</div>

			</div>

		</div>

	</section>

	<section class="success_storics d-inline-block w-100 position-relative" id="blog_post">

		<div class="container">

			<div class="row">

				<div class="col-xl-12">

					<div class="sec-heading text-center">

						<!-- <span>Company Says</span> -->

						<h2>Our Blogs</h2>

					</div>

				</div>

			</div>

			<div class="row">

				<div class="col-xl-12">

					<div class="owl-carousel owl-theme success_storics_slider">

						<div class="item">

							<div class="success_storics_slide_box">

								<div class="rambhai" style="min-height: 560px; position: relative;">

									<div class="story_slide_logo"  style="height: 180px !important;">

										 <img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/05/domin_host_blog-640x398.jpeg" width="100%">

									</div>

									<div class="story_slide_info">

										<h2 >How to purchase Domain & Hosting From Hostinger</h2>

										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;"> Are you going to start your new website or online business? Learn here how to purchase a domain and hosting easily with some offer. Domain & Hosting is very required to start your website or blog. All Web Designer and Developer should know this procedure very well to Design and Develop a...</p><br>

										<a style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%);" href="https://www.rnwmultimedia.com/purchase-domain-hosting/">Read More</a>				

									</div>

								</div>

							</div>		

						</div>

						<div class="item">

							<div class="success_storics_slide_box">

								<div class="rambhai" style="min-height: 560px; position: relative;">

									<div class="story_slide_logo"  style="height: 180px !important;">

										 <img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/05/graphicdesign-640x427.jpg" width="100%">

									</div>

									<div class="story_slide_info">

										<h2>The Best Career As A Graphic Designer</h2>

										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;"> Graphic Design is one of the fields that demand is increasing day by day. Graphics design is an art, using a text photo shape to convey an idea or message in your point of view is called graphics design. An excellent graphic design can be the identity of any product and...</p><br>

										<a style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%);" href="https://www.rnwmultimedia.com/graphic-designer-career/">Read More</a>

									</div>

								</div>

							</div>		

						</div>

						<div class="item">

							<div class="success_storics_slide_box">

								<div class="rambhai" style="min-height: 560px; position: relative;">

									<div class="story_slide_logo"  style="height: 180px !important; ">

										 <img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/interior-fashion-salary-640x349.jpeg" width="100%">

									</div>

									<div class="story_slide_info">

										<h2>Some Important Tips For Study Abroad Preparation</h2>

										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;">If you are planning for a study abroad examination, you have to take precise preparation. With the help of proper preparation, you can crack those exams and hate towards the different countries to study the subject of your preference. So, to help you out we are about to share some tips with you...</p><br>

										<a style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%);" href="https://www.rnwmultimedia.com/some-important-tips-for-study-abroad-preparation/">Read More</a>				</div>

								</div>

							</div>		

						</div>

						<div class="item">

							<div class="success_storics_slide_box">

								<div class="rambhai" style="min-height: 560px; position: relative;">

									<div class="story_slide_logo"  style="height: 180px !important;">

										 <img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/interior-fashion-salary-640x349.jpeg" width="100%">

									</div>

									<div class="story_slide_info">

										<h2>Interior Design Vs Fashion Design: Salary, Degree, Job Opportunities And Package</h2>

										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;">Choosing a job in today's scenario is indeed no less than rocket science. Yeah, of course, there are plenty of options but that is something which is making things worse! With so many choices available, it gets really troublesome to decide which one of them to go for! On...</p><br>

										<a style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%);" href="https://www.rnwmultimedia.com/interior-design-vs-fashion-design/">Read More</a>				</div>

								</div>

							</div>		

						</div>



						<div class="item">

							<div class="success_storics_slide_box">

								<div class="rambhai" style="min-height: 560px; position: relative;">

									<div class="story_slide_logo"  style="height: 180px !important;">

										 <img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/Corona_Image-640x354.jpg" width="100%">

									</div>

									<div class="story_slide_info">

										<h2>It’s time to Avoid Corona.</h2>

										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;">These days, there is nothing to lose except a few bucks, but if someone goes out and causes an infection in the house, they should suffer more than difficulties.So follow this strictly:We all have as much grain as we can provide nutrition for six months, so just go out...</p><br>

										<a style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%);" href="https://www.rnwmultimedia.com/avoid-corona/">Read More</a>				</div>

								</div>

							</div>		

						</div>

						<div class="item">

							<div class="success_storics_slide_box">

								<div class="rambhai" style="min-height: 560px; position: relative;">

									<div class="story_slide_logo"  style="height: 180px !important;">

										 <img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/01/IMG_0640-min-640x326.jpg" width="100%">

									</div>

									<div class="story_slide_info">

										<h2>71st REPUBLIC DAY CELEBRATION BY RED & WHITE GROUP OF INSTITUTE.</h2>

										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;">Jay hind. We feel proud to inform you that on the 71st celebration on republican day in India, when people celebrate this day in different ways. Such as by Flag Worship, enjoying Cultural Programs and flag parade, we as a Red and White group of institute takes pride on...</p><br>

										<a style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%);" href="https://www.rnwmultimedia.com/71st-republic-day-celebration-by-red-white-group-of-institute/">Read More</a>				</div>

								</div>

							</div>		

						</div>

					</div>

				</div>

				<div class="col-xl-4">

					

				</div>

			</div>

		</div>

	</section>

	<?php include('footer.php'); ?>



	<!-- Login Modal -->

	<div class="modal fade" id="login_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

	  <div class="modal-dialog modal-dialog-centered" role="document">

	    <div class="modal-content">

	    	<div id="login_success_msg">

		    	

			</div>



	      <div class="modal-header">

	        <h5 class="modal-title" id="exampleModalCenterTitle">Recruiter Sign In</h5>

	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

	          <span aria-hidden="true">&times;</span>

	        </button>

	      </div>

	      <div class="modal-body">

	        <form id="recruiter_login">

	        	<div class="col-xl-12">

	        		<div class="form-group">

	        			<label>Email</label>

	        			<input type="text" name="email_login" id="email_login" placeholder="Email" class="form-control">

	        		</div>

	        	</div>

	        	<div class="col-xl-12">

	        		<div class="form-group">

	        			<label>Password</label>

	        			<input type="password" name="password_login" id="password_login" placeholder="Password" class="form-control">

	        		</div>

	        	</div>

	        	<div class="col-xl-12">

	        		<div class="text-right">

	        			<input type="submit" name="login" value="Login" class="btn btn-primary">

	        		</div>

	        	</div>

	        </form>

	      </div>

	    </div>

	  </div>

	</div>



	<!-- Register Modal -->

	<div class="modal fade" id="register_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

	    	      	



	    <div class="modal-content">

	    	



	      <div class="modal-header">

	      	



	        <h5 class="modal-title" id="exampleModalCenterTitle">Recruiter Sign Up</h5>

	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

	          <span aria-hidden="true">&times;</span>

	        </button>

	      </div>

	      <div class="modal-body">

	        <form id="registration_form" method="post">

	        	<div class="row">

	        		<div class="col-xl-6">

	        			<div class="form-group">

	        				<label>Company Name</label>

	        				<input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control">

	        			</div>

	        		</div>

	        		<div class="col-xl-6">

	        			<div class="form-group">

	        				<label>Company Phone No</label>

	        				<input type="text" name="company_phone_no" id="company_phone_no" placeholder="Company Phone No" class="form-control">

	        			</div>

	        		</div>

	        		<div class="col-xl-12">

	        			<div class="form-group">

	        				<label>Company Address</label>

	        				<textarea placeholder="Company Address" name="company_address" id="company_address" class="form-control"></textarea>

	        			</div>

	        		</div>

	        		<div class="col-xl-6">

	        			<div class="form-group">

	        				<label>Employer/Recruiter Name</label>

	        				<input type="text" name="employer_name" id="employer_name" placeholder="Employer/Recruiter Name" class="form-control">

	        			</div>

	        		</div>

	        		<div class="col-xl-6">

	        			<div class="form-group">

	        				<label>Company URL</label>

	        				<input type="text" name="company_url"  id="company_url" placeholder="Enter URL Like http://" class="form-control">

	        			</div>

	        		</div>

	        		<div class="col-xl-6">

	        			<div class="form-group">

	        				<label>Employer/Recruiter Designation</label>

	        				<input type="text" name="employer_designation" id="employer_designation" placeholder="Employer/Recruiter Designation" class="form-control">

	        			</div>

	        		</div>

	        		<div class="col-xl-6">

	        			<div class="form-group">

	        				<label>Company/Recruiter Email</label>

	        				<input type="email" name="employer_email" id="employer_email" placeholder="Company/Recruiter Email" class="form-control">

	        			</div>

	        		</div>

	        		<div class="col-xl-6">

	        			<div class="form-group">

	        				<label>Password</label>

	        				<input type="password" name="password" placeholder="Password" id="password" class="form-control">

	        			</div>

	        		</div>

	        		<div class="col-xl-6">

	        			<div class="form-group">

	        				<label>Confirm Password</label>

	        				<input type="password" name="cpassword" id="cpassword" placeholder="Password" class="form-control">

	        			</div>

	        		</div>

	        		<div class="col-xl-12">

	        			<div class="form-group form-check">

	        			   <label class="form-check-label"><input type="checkbox" value="agree" name="agreeterms" id="agreeterms" class="form-check-input" data-toggle="modal" data-target="#terms_conditions_data"> Terms & Conditions</label>

	        			 </div>

	        		</div>

	        		<div class="col-xl-12">

	        			<div id="success_msg">

		    	

						</div>

	        		</div>

	        		<div class="col-xl-12">

	        			<div class="">

	        				<input type="submit" name="RegisterCompany" value="Register Company" class="btn btn-primary"><i class="fa fa-spinner fa-spin" ></i>

	        			</div>

	        		</div>

	        	</div>

	        </form>

	      </div>

	    </div>

	  </div>

	</div>

	

	<div id="myModal" class="modal fade">

        <div class="modal-dialog">

            <div class="modal-content" style="width: 600px;margin-left:-100px;height: auto">

               

                <div class="modal-body">

                	<button type="button" id="videoClose" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



                  <!--  <iframe width="570" id="cartoonVideo" height="380" src="https://youtu.be/phSGNkDYDCE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

                 <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/wqG0uoHVdIE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

                 <iframe width="560" height="360" src="https://www.youtube.com/embed/Ws8pZsWXEvo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>

            </div>

        </div>

    </div>





	<div class="modal fade" id="terms_conditions_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

	    <div class="modal-content">

	      

	      <div class="modal-body">

	      	 <div style="max-width: 700px; margin: 0 auto;" class="email-container">

          

            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">

                <tr>

                    <td valign="top">

                    	<div class="text-center">

                    		<div class="logo">

                    			<img src="https://demo.rnwmultimedia.com/placement/images/logo.png" width="100%">

                    		</div>

                    	</div>

                      <h2 style="text-align: center; line-height: 58px;"> Training & Placement Policy </h2>



                      <ul class="Placement_Policy_Letter">

                      	<li>Red & White Group of Institutes offers a variety of courses in the field of IT, Multimedia (Designing & Development), Fashion, and Interior.</li>

                      	<li>Red & White Group of Institutes is an organization that runs a Training & Placement  (T&P) Department for the students and companies that are looking for potential candidates for their suitable requirements which will help to make Surat an IT HUB. However, Red & White is not a placement consultancy, in particular, so after the selection of candidates, Red & White is not bound to any responsibilities. Still, we will always be ready to provide necessary support and help, for which Red & White will not take any charge.</li>

                      	<li>For this, first of all, the company needs to register itself on the <a href="https://demo.rnwmultimedia.com/placement/" style="color:blue;">T&P Department’s requirement portal</a> and after that need to post the requirements for any position. After that T&P department will arrange the interview according to the suitability of time and other parameters <b>within 7 working days</b>.</li>

                      	<li>All the details regarding student placement such as student’s absence on the interview day, selection result, or any future update regarding student’s behavior and punctuality must be provided to the T&P department on a regular basis.</li>

                      	<li>The company can be applied for the campus interview If a company has <b>more than 40 employees</b>. In this procedure, the company can visit the institute for the selection process after letting the T&P department know.</li>

                      	<li><b>Institute can use the logo of a placement partner company, and can also enlist them as a partner list. Institute can send future students to visit the company for practical knowledge, and if needed the partner company must arrange the field expert for the knowledge sharing with students.</b></li>

                      	<li>If the candidate’s course is running and he\she gets selected on basis of his current knowledge, then to complete his remaining course company must arrange his job hours according to the lecture timing.</li>

                      	<li>The availability of the T&P department for contact is only on <b>Tuesday and Friday from 12:00 PM to 1:00 PM & 2:00 PM to 4:00 PM</b></li>

                      	<li>After the selection of candidates, the company must issue the offer/joining letter of the same.</li>

                      	<li>We expect you to provide your experiences and feedback in the medium of video review via mail to us.</li>

                      	<div class="text-right" style="margin-bottom: 15px;">

                      		<p>Thank You.<br/>

                      		Red & White Group of Institutes<br/>

                      		<a href="https://www.rnwmultimedia.com/" target="_blank" style="color: #c52410;">www.rnwmultimedia.com</a></p>

                      	</div>

                      </ul>

                    </td>

                </tr>

                <!-- end:tr -->

                <!-- 1 Column Text + Button : END -->

            </table>

            <table width="100%" style="background-color: #fff;" align="center">

               

            </table>

        </div>

	      <div class="modal-footer">

      

      <button type="button" class="btn btn-secondary  close-btn"  data-dependent="reject" data-dismiss="modal"  onclick="return acceRejTerms('reject')">Close</button>



      <button type="button" class="btn btn-primary " data-dependent="accept"  data-dismiss="modal" onclick="return acceRejTerms('accept')">Accept T&C </button>

      

      </div>

	    </div>

	  </div>

	</div>



	





<script>

	$(document).on("click","body",function() {

	    $('#cartoonVideo').each(function(index) {

		    $(this).attr('src', $(this).attr('src'));

		        return false;

		    });

	});



	

</script>



<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>







<script>

	



$('.fa-spinner').hide();

$('#success_msg').hide();

  function acceRejTerms(data)

  {

    if(data == 'reject')

    {

        $("#agreeterms").prop("checked", false);

    }

    else

    {

        $("#agreeterms").prop("checked", true);

    }

  }



  </script>



<script>

// just for the demos, avoids form submit

	jQuery.validator.setDefaults({

  		debug: true,

  		success: "valid"

	});

	$( "#registration_form" ).validate({

  		rules: {

    		company_name: {

      			required: true,

      			minlength:3

    		},

    		company_phone_no:{

    			required : true,

    			minlength : 10,

    			maxlength:10,

    			number : true

    		},

    		company_address:{

    			required : true

    		},

		    employer_name:{

		    	required : true

		    },

		    company_url:{

		    	required : true,

		    	url: true

		    },

		    employer_designation:{

		    	required : true

		    },

		    employer_email :{

		    	required :true,

		    	email : true

		    },

		    password : {

		    	required : true,

		    	minlength :5,

		    	maxlength :20

		    },

		    cpassword:{

		    	required : true,

		    	minlength :5,

		    	maxlength :20,

		    	equalTo:"#password"	

		    },

		    agreeterms:{

		    	required : true

		    }

  		},

		messages:{

			company_name:{

				required : "<div style='color:red'>Enter Company Name</div>",

				minlength : "<div style='color:red'>Enter proper company Name</div>"

			},

			company_phone_no:{

				required : "<div style='color:red'>Enter phone number</div>",

				minlength : "<div style='color:red'>Enter proper phone number</div>",

				maxlength : "<div style='color:red'>Enter proper phone number</div>",

				number: "<div style='color:red'>Enter Only numbers</div>"

			},

			company_address:{

				required : "<div style='color:red'>Enter company address</div>"

			},

			employer_name:{

				required : "<div style='color:red'>Enter employer name</div>"

			},

			company_url:{

				required : "<div style='color:red'>Enter company url</div>",

				url : "<div style='color:red'>Enter valid url</div>"

			},

			employer_designation:{

				required : "<div style='color:red'>Enter Employer Designation</div>",

			},

			employer_email :{

				required : "<div style='color:red'>Enter Employer Email</div>",

				email : "<div style='color:red'>Enter valid email</div>"

			},

			password:{

				required : "<div style='color:red'>Enter password</div>",

				minlength : "<div style='color:red'>Enter minimum 5 characters</div>",

				maxlength : "<div style='color:red'>Enter maximum 20 characters</div>",

			},

			cpassword:{

				required : "<div style='color:red'>Enter password</div>",

				minlength : "<div style='color:red'>Enter minimum 5 characters</div>",

				maxlength : "<div style='color:red'>Enter maximum 20 characters</div>",

				equalTo : "<div style='color:red'>password & Confirm password not match</div>"

			},

			agreeterms:{

				required : "<div style='color:red'>Select Terms & Conditions</div>"

			}



  		},

  		submitHandler: function() { 

   			event.preventDefault();

   			var form_data = $('#registration_form').serialize(); //Encode form elements for submission

			// var form_data = $(this).serialize(); //Encode form elements for submission

			$.ajax({



				url : "ajax_register_company.php",

				type: "post",

				data : form_data,

				beforeSend: function(){

        			$('.fa-spinner').show();

    			},

    			complete: function(){

      				 $('.fa-spinner').hide();

    			},

				success:function(res)

				{

					// alert(res);

					// console.log(res);

					$('#success_msg').show();

					if(res == '1')

					{

						alert("Company Detail Insert Successfull!! Now You Could Sign In!!");

						$('#success_msg').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Company Detail Insert Successfull!! After few days We will Conatct You Thank You!!</div>");

						$("#registration_form")[0].reset();

						// setTimeout(function() {

    		// 				location.reload();

						// }, 5000);

					}

					else if(res == '0')

					{

						alert("Something wrong!! Try After Some Time");

						$('#success_msg').html("<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button>Something wrong!! Try After Some Time</div>");

					}

					else if(res == '2')

					{

						alert("Already Registered Company!!");

						$('#success_msg').html("<div class='alert alert-warning alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button> Already Registered Company!!</div>");

					}

				}

			});

   		}

	}); 

</script>





<script>

	jQuery.validator.setDefaults({

  		debug: true,

  		success: "valid"

	});

	$( "#recruiter_login" ).validate({

  		rules: {

    		email_login: {

      		required: true,

      		email:true

    	},

    	password_login:{

    		required : true,

    		minlength : 5,

    		maxlength:30

    	}

  	},

	messages:{

		email_login :{

			required : "<div style='color:red'>Enter Email</div>",

			email : "<div style='color:red'>Enter valid email</div>"

		},

		password_login:{

			required : "<div style='color:red'>Enter password</div>",

			minlength : "<div style='color:red'>Enter minimum 5 characters</div>",

			maxlength : "<div style='color:red'>Enter maximum 20 characters</div>",

		}

	},

  	submitHandler: function() { 

		event.preventDefault();

		var form_data = $('#recruiter_login').serialize(); //Encode form elements for submission

		// var form_data = $(this).serialize(); //Encode form elements for submission

		$.ajax({



			url : "ajax_company_login.php",

			type: "post",

			data : form_data,

			beforeSend: function(){

				$('.fa-spinner').show();

			},

			complete: function(){

					 $('.fa-spinner').hide();

			},

			success:function(res)

			{

				// alert(res);

				// console.log(res);

				$('#login_success_msg').show();

				if(res == '1')

				{

					$('#login_success_msg').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Login Successfully</div>");

					$("#recruiter_login")[0].reset();

					setTimeout(function() {

						location.reload();

					}, 500);

				}

				else if(res == '0')

				{

					$('#login_success_msg').html("<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button> Invalid Email & Password!!</div>");

				}

				else if(res == 2){

					$('#login_success_msg').html("<div class='alert alert-warning alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button>Contact RNW Placement Department!! </div>");

				}

			}

		});

   	}

});

</script>





































