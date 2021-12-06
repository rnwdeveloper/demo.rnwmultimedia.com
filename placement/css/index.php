<?php
 session_start();
if($_SESSION['record']['company_name']){
include('new_header.php'); 

}else{
include('header.php'); 
}
 ?>
 <style type="text/css">
 
.student{
	margin-top: 260px;
	margin-right: 350px;
}

 	.post_help{
    position: absolute;
    left: 10px;
    top: 10px;
    background-color:lightgray;
    height: 39px;
    width: 90px;
    color:red;
    border-radius: 20px;
  }
  .post_help:hover{
  	cursor: hand;
  }
  .post_help img{
  	margin-left:10px;
  	margin-top:5px;
  }
  .post_help span{
    color:red;
    left:20px;
  }
    .modal-content iframe{
        margin: 0 auto;
        display: block;
    }

 	
 
 </style>
	<section class="banner w-100 position-relative" id="banner">
		<div class="container">
			<?php if($_SESSION['record']['company_name']=='') { ?>
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6">
					<div class="banner_in_left_block position-relative">
						<!-- <img src="images/register-bg.png" width="100%"> -->
						<img src="images/companySide.jpg" width="100%">
						<!-- <div class="help"><i class="fa fa-question-circle" aria-hidden="true" style=""></i></div> -->
						<div class="post_help" data-target="#myModal"  data-toggle="modal" id="post_help">  <img src="http://demo.rnwmultimedia.com/placement/images/helpIcon.png" height="30" width="30" data-backdrop="static" data-keyboard="false" >
				               <span>Help</span>
				           
				           
    					</div>
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
<!-- 									<a href="../recruiter/index.php" class="btn custom-btn cust-btn-light-blue" >Login</a><br>

 -->									<!-- <a href="../recruiter/recruiter_register.php" style='margin-top: 5px;' class="btn custom-btn cust-btn-light-blue" >Register</a> -->
								<!-- <button type="button" style='margin-top: 5px;' class="btn custom-btn cust-btn-light-blue" data-target="#register_model" data-toggle="modal">Register</button> -->
							
								<button type="button" class="btn custom-btn cust-btn-light-blue" data-toggle="modal" data-target="#login_model">Sign In</button><br>
								<button type="button" style='margin-top: 5px;' class="btn custom-btn cust-btn-light-blue" data-target="#register_model" data-toggle="modal">Sign Up</button>
							
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6">
					<div class="banner_in_left_block banner_in_right_block position-relative">
						<!-- <img src="images/post_job_bg.jpg" width="100%"> -->
						<img src="images/StudentSide.jpg" width="100%">
						<div class="job_post_block">
							<div class="d-inline-block text-center">
								<div class="post_block_job_countre">
									<img src="images/verified.png">
								</div>
								<a href="https://demo.rnwmultimedia.com/student_placement/" class="btn custom-btn cust-btn-red">Student Portal</a><!-- 
								<a style='margin-top: 5px;' href="#" class="btn custom-btn cust-btn-red">Register Now</a> -->

							</div>							
						</div>
					</div>
				</div>
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
			</div>
		<?php } ?>
		</div>
	</section>
	<section class="new_rendom_job d-inline-block w-100 position-relative" id="new_rendome_job">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="sec-heading text-center">
						<span>200  New Jobs</span>
						<h2>New & Randome Jobs</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-6 mx-auto">
					<div class="rendome_job_box">
						<div class="text-right job_type_lable_block">
							<span class="job_type_lable job_type_lable_freelancer">Freelancer</span>
						</div>
						<div class="jobs_company_logo">
							<img src="images/casepoint.webp" width="100%">
						</div>
						<div class="job_definition_block text-center">
							<h3>UI/UX</h3>
						</div>
						<div class="job_skill text-center">
							<p>Photoshop, illustrator, XD, Sketch</p>
						</div>
						<div class="job_company_daitels d-inline-block w-100 mt-3">
							<span class="job_salary">$3.2K - $5K</span>
							<span class="comany_open_week">7 Open</span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-6 mx-auto">
					<div class="rendome_job_box">
						<div class="text-right job_type_lable_block">
							<span class="job_type_lable job_type_lable_full_time">Full Time</span>
						</div>
						<div class="jobs_company_logo">
							<img src="images/narola_logo-01.png" width="100%">
						</div>
						<div class="job_definition_block text-center">
							<h3>Web Design</h3>
						</div>
						<div class="job_skill text-center">
							<p>HTML5, CSS3, Javascript, Bootstrap, Jquery</p>
						</div>
						<div class="job_company_daitels d-inline-block w-100 mt-3">
							<span class="job_salary">$3.2K - $5K</span>
							<span class="comany_open_week">7 Open</span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-6 mx-auto">
					<div class="rendome_job_box">
						<div class="text-right job_type_lable_block">
							<span class="job_type_lable job_type_lable_part_time">Part Time</span>
						</div>
						<div class="jobs_company_logo">
							<img src="images/artoon.png" width="100%">
						</div>
						<div class="job_definition_block text-center">
							<h3>Game App Development</h3>
						</div>
						<div class="job_skill text-center">
							<p>C#, Unity 3D, Phoroshop</p>
						</div>
						<div class="job_company_daitels d-inline-block w-100 mt-3">
							<span class="job_salary">$3.2K - $5K</span>
							<span class="comany_open_week">7 Open</span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-6 mx-auto">
					<div class="rendome_job_box">
						<div class="text-right job_type_lable_block">
							<span class="job_type_lable job_type_lable_freelancer">Freelancer</span>
						</div>
						<div class="jobs_company_logo">
							<img src="images/casepoint.webp" width="100%">
						</div>
						<div class="job_definition_block text-center">
							<h3>UI/UX</h3>
						</div>
						<div class="job_skill text-center">
							<p>Photoshop, illustrator, XD, Sketch</p>
						</div>
						<div class="job_company_daitels d-inline-block w-100 mt-3">
							<span class="job_salary">$3.2K - $5K</span>
							<span class="comany_open_week">7 Open</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="how_it_works d-inline-block w-100 position-relative" id="how_it_works">
		<div class="container">
			<div class="row">
			    <div class="col-xl-12">
			        <div class="sec-heading text-center">
			            <span>Working Process</span>
			            <h2>How It Works</h2>
			        </div>
			    </div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-6">
					<div class="working_process_box">
						<span class="stepe_cunter">01</span>
						<div class="working_process_box_img">
							<img src="images/step-1.png" width="100%">
						</div>
						<div class="working_process_box_info">
							<h3>Create An Account</h3>
							<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6">
					<div class="working_process_box">
						<span class="stepe_cunter">02</span>
						<div class="working_process_box_img">
							<img src="images/step-2.png" width="100%">
						</div>
						<div class="working_process_box_info">
							<h3>Create An Account</h3>
							<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 mx-auto">
					<div class="working_process_box">
						<span class="stepe_cunter">03</span>
						<div class="working_process_box_img">
							<img src="images/step-3.png" width="100%">
						</div>
						<div class="working_process_box_info">
							<h3>Create An Account</h3>
							<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="recent_jobs d-inline-block w-100 position-relative pb-0" id="recent_jobs">
		<div class="container">
			<div class="row">
				<div class="col-xl-7 col-lg-7 col-md-12">
					<div class="recent_jobs_left_block">
						<div class="sec-heading">
							<h2>Recent Jobs</h2>
						</div>
						<div class="recent_jobs_info_block d-inline-block w-100 position-relative">
							<ul>
								<li>
									<div class="card">
									  <div class="row no-gutters align-items-center">
									    <div class="col-md-2 col-sm-12">
									      <div class="recent_jobs_company_logo">
									      	<img src="images/triguns.jpg" class="card-img">
									      </div>
									    </div>
									    <div class="col-md-8 col-sm-10">
									      <div class="card-body">
									        <h5 class="card-title">Markting Coordinatior - SEO / SEM Experience</h5>
									        <ul class="recent_jobs_block_in_box_onfo_list">
									        	<li><i class="fas fa-briefcase"></i>Trignac</li>
									        	<li><i class="fas fa-flag"></i>7th Varachha, Surat, Gujrat </li>
									        	<li><i class="fas fa-money"></i>₹5000 - ₹7000</li>
									        	<li class="job_type_lable job_type_lable_full_time">New</li>
									        </ul>
									      </div>
									    </div>
									    <div class="col-md-2 col-sm-2">
									    	<div class="text-right job_type_lable_block">
			    								<span class="job_type_lable job_type_lable_full_time">Full Time</span>
			    							</div>
									    </div>
									  </div>
									</div>
								</li>
								<li>
									<div class="card">
									  <div class="row no-gutters align-items-center">
									    <div class="col-md-2 col-sm-12">
									      <div class="recent_jobs_company_logo">
									      	<img src="images/avinashi-systems.png" class="card-img">
									      </div>
									    </div>
									    <div class="col-md-8 col-sm-10">
									      <div class="card-body">
									        <h5 class="card-title">Core PHP Developer for Site Maintenance</h5>
									        <ul class="recent_jobs_block_in_box_onfo_list">
									        	<li><i class="fas fa-briefcase"></i>Avinashi</li>
									        	<li><i class="fas fa-flag"></i>7th Varachha, Surat, Gujrat </li>
									        	<li><i class="fas fa-money"></i>₹5000 - ₹7000</li><!-- 
									        	<li class="job_type_lable job_type_lable_full_time">New</li> -->
									        </ul>
									      </div>
									    </div>
									    <div class="col-md-2 col-sm-2">
									    	<div class="text-right job_type_lable_block">
			    								<span class="job_type_lable job_type_lable_internsship">Internsship</span>
			    							</div>
									    </div>
									  </div>
									</div>
								</li>
								<li>
									<div class="card">
									  <div class="row no-gutters align-items-center">
									    <div class="col-md-2 col-sm-12">
									      <div class="recent_jobs_company_logo">
									      	<img src="images/triguns.jpg" class="card-img">
									      </div>
									    </div>
									    <div class="col-md-8 col-sm-10">
									      <div class="card-body">
									        <h5 class="card-title">Markting Coordinatior - SEO / SEM Experience</h5>
									        <ul class="recent_jobs_block_in_box_onfo_list">
									        	<li><i class="fas fa-briefcase"></i>Trignac</li>
									        	<li><i class="fas fa-flag"></i>7th Varachha, Surat, Gujrat </li>
									        	<li><i class="fas fa-money"></i>₹5000 - ₹7000</li>
									        	<li class="job_type_lable job_type_lable_full_time">New</li>
									        </ul>
									      </div>
									    </div>
									    <div class="col-md-2 col-sm-2">
									    	<div class="text-right job_type_lable_block">
			    								<span class="job_type_lable job_type_lable_full_time">Full Time</span>
			    							</div>
									    </div>
									  </div>
									</div>
								</li>
								<li>
									<div class="card">
									  <div class="row no-gutters align-items-center">
									    <div class="col-md-2 col-sm-12">
									      <div class="recent_jobs_company_logo">
									      	<img src="images/avinashi-systems.png" class="card-img">
									      </div>
									    </div>
									    <div class="col-md-8 col-sm-10">
									      <div class="card-body">
									        <h5 class="card-title">Core PHP Developer for Site Maintenance</h5>
									        <ul class="recent_jobs_block_in_box_onfo_list">
									        	<li><i class="fas fa-briefcase"></i>Avinashi</li>
									        	<li><i class="fas fa-flag"></i>7th Varachha, Surat, Gujrat </li>
									        	<li><i class="fas fa-money"></i>₹5000 - ₹7000</li><!-- 
									        	<li class="job_type_lable job_type_lable_full_time">New</li> -->
									        </ul>
									      </div>
									    </div>
									    <div class="col-md-2 col-sm-2">
									    	<div class="text-right job_type_lable_block">
			    								<span class="job_type_lable job_type_lable_internsship">Internsship</span>
			    							</div>
									    </div>
									  </div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-5 col-lg-5 col-md-12">
					<div class="recent_jobs_right_block">
						<div class="sec-heading">
							<h2>5 Tips to Pass Your Interview!</h2>
						</div>
						<div class="recent_jobs_video_block">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe width="100%" height="315" src="https://www.youtube.com/embed/yL19XilAtO0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						</div>
						<div class="resume_uplode_block">
							<div class="sec-heading">
								<h2>Post Your Resume</h2>
							</div>
							<div class="resume_uplode_btn position-relative">
								<input type="file"  name="">
								<button type="button">Uplode Your Resume <i class="fas fa-upload ml-2"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="success_storics d-inline-block w-100 position-relative" id="success_storics">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="sec-heading text-center">
						<span>What Say Our Company's</span>
						<h2>Our Success Stories</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="owl-carousel owl-theme success_storics_slider">
						<div class="item">
							<div class="success_storics_slide_box">
								<div class="rambhai">
									<div class="story_slide_logo">
										 <img src="images/sensus_info.png" width="100%">
									</div>
									<div class="story_slide_info">
										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat.</p>
										<span style="font-size: 25px; color: #e31e25;">★★★★★</span>
									</div>
								</div>
							</div>		
						</div>
						<div class="item">
							<div class="success_storics_slide_box">
								<div class="rambhai">
									<div class="story_slide_logo">
										 <img src="images/Coldfin_Logo.png" width="100%">
									</div>
									<div class="story_slide_info">
										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat.</p>
										<span style="font-size: 25px; color: #e31e25;">★★★★★</span>
									</div>
								</div>
							</div>		
						</div>
						<div class="item">
							<div class="success_storics_slide_box">
								<div class="rambhai">
									<div class="story_slide_logo">
										 <img src="images/hb.png" width="100%">
									</div>
									<div class="story_slide_info">
										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat.</p>
										<span style="font-size: 25px; color: #e31e25;">★★★★★</span>
									</div>
								</div>
							</div>		
						</div>
						<div class="item">
							<div class="success_storics_slide_box">
								<div class="rambhai">
									<div class="story_slide_logo">
										 <img src="images/sensus_info.png" width="100%">
									</div>
									<div class="story_slide_info">
										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat.</p>
										<span style="font-size: 25px; color: #e31e25;">★★★★★</span>
									</div>
								</div>
							</div>		
						</div>
						<div class="item">
							<div class="success_storics_slide_box">
								<div class="rambhai">
									<div class="story_slide_logo">
										 <img src="images/Coldfin_Logo.png" width="100%">
									</div>
									<div class="story_slide_info">
										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat.</p>
										<span style="font-size: 25px; color: #e31e25;">★★★★★</span>
									</div>
								</div>
							</div>		
						</div>
						<div class="item">
							<div class="success_storics_slide_box">
								<div class="rambhai">
									<div class="story_slide_logo">
										 <img src="images/hb.png" width="100%">
									</div>
									<div class="story_slide_info">
										<p><img src="images/edit-tools.png" width="30px" class="align-bottom" style="opacity: 0.3; margin-right: 15px;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat.</p>
										<span style="font-size: 25px; color: #e31e25;">★★★★★</span>
									</div>
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
						<h3><span class="Count">288 </span>+</h3>
						<span class="counter_box_lable">Place Student</span>
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
						<img src="https://www.rnwmultimedia.com/wp-content/uploads/2019/12/casepoint.webp" width="100%">
					</div>
				</div>
				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">
					<div class="placement_partner_company_logo position-relative">
						<img src="https://www.rnwmultimedia.com/wp-content/uploads/2019/12/narola.webp" width="100%">
					</div>
				</div>
				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">
					<div class="placement_partner_company_logo position-relative">
						<img src="https://www.rnwmultimedia.com/wp-content/uploads/2019/12/peacock.webp" width="100%">
					</div>
				</div>
				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">
					<div class="placement_partner_company_logo position-relative">
						<img src="https://www.rnwmultimedia.com/wp-content/uploads/2019/12/courscate.webp" width="100%">
					</div>
				</div>
				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">
					<div class="placement_partner_company_logo position-relative">
						<img src="https://www.rnwmultimedia.com/wp-content/uploads/2019/12/artoon.png" width="100%">
					</div>
				</div>
				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">
					<div class="placement_partner_company_logo position-relative">
						<img src="https://www.rnwmultimedia.com/wp-content/uploads/2019/12/himanshu.webp" width="100%">
					</div>
				</div>
				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">
					<div class="placement_partner_company_logo position-relative">
						<img style="filter: drop-shadow(0px 0px 4px rgba(0,0,0,0.5));" src="https://www.rnwmultimedia.com/wp-content/uploads/2019/12/dynamic-dreams.webp" width="100%">
					</div>
				</div>
				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">
					<div class="placement_partner_company_logo position-relative">
						<img src="https://www.rnwmultimedia.com/wp-content/uploads/2019/12/smart-infosic.webp" width="100%">
					</div>
				</div>
				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">
					<div class="placement_partner_company_logo position-relative">
						<img src="https://www.rnwmultimedia.com/wp-content/uploads/2019/12/Triveni-Global-Software-Services.webp" width="100%">
					</div>
				</div>
				<div class="placement_partner_logo_col col-xl-3 col-lg-3 col-md-4 col-sm-6">
					<div class="placement_partner_company_logo position-relative">
						<img src="https://www.rnwmultimedia.com/wp-content/uploads/2019/12/heaveninfotech.png" width="100%">
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

                   <iframe width="570" id="cartoonVideo" height="380" src="https://www.youtube.com/embed/ddrzcwDMTao" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                      	<li>This is Red & White Group of Institutes, Providing career-based courses in various fields like IT, Multimedia, Fashion, Interior any many more.</li>
                      	<li>We aim to provide quality education & skill-based knowledge to every student and help them to be industry-ready.</li>
                      	<li>We are always ready to collaborate with those industries who can provide a career platform to our students and we try our best to provide a quality employee to such industries.</li>
                      	<li>We are very proud to have such industries like yours, which can provide a career platform to our students and help them to generate revenue by their adequate skill knowledge.</li>
                      	<li>We know that you are always seeking a quality person as an employee for your company which we can impart. However, We would like to let you that Red & White Group of Institutes is not an agency which provides employee but We are an organization which builds  professionals who can work as a responsible employee directly into the industries by providing them quality knowledge and adequate training. Though we can only provide employees, if we have Students who are prepared for the job as well as ready to join your companies, otherwise we do not manage another candidate who has not been  trained from our Institutes.</li>
                      	<li><b>Moreover, we would like to make a couple of points to draw your attention which will be really helpful for your firm.</b></li>
                      	<li>As red & white provides free employment services to your company yet sometimes it happens that we do not have an adequate number of students according to your specified need.To tackle such a situation we would like to suggest that you by your self should select and send a few fresher candidates as a student to our institution according to your requirements. So we can train them and you can directly hire them as an employee who will be pre-ready for your need.</li>
                      	<li>Also, it will be helpful if any of the representatives of your company visit our Institutes to train, as well as to make aware our teachers about the specification and in detailed need of your company. Which will help us to train the student in such a way that you don’t have to face any hurdle after the recruitment of an employee.</li>
                      	<li>Moreover, Once a Candidate is selected, if in future any problem occurs then Red & White Group of Institutes is not responsible for this. Though we understand our  moral responsibility and we will do all possible & needful things but without being bound to any legal responsibilities.</li>
                      	<li>So we hope you will understand this and will cooperate with us in the future if such a situation happens.</li>
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
           <!--  <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                <tr>
                    <td valign="middle" class="bg_black footer email-section" style="padding: 30px 30px; ">
                        <table>
                            <tr>
                                <td valign="top" width="33.333%" style="padding-top: 0px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <div style="margin: 5px 0 10px;" class="footer-icon">
                                                <table width="200px" align="center">
                                                    <tbody><tr>
                                                        <td><a href="https://www.facebook.com/rnwmultimedia"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/Facebook_Icon.png" width="30px"></a></td>
                                                        <td><a href="https://twitter.com/rnw_multimedia"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/Twitter_Icon.png" width="30px"></a></td>
                                                        <td><a href="https://www.linkedin.com/in/rnwmultimedia/"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/Linkedin_Icon.png" width="30px"></a></td>
                                                        <td><a href="https://www.youtube.com/user/hitesdesai"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/YouTube_Icon.png" width="30px"></a></td>
                                                        <td><a href="https://www.instagram.com/rnwmultimedia/"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/Instagram_Icon.png" width="30px"></a></td>
                                                    </tr>
                                                </tbody></table>
                                            </div>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
              end: tr -->
            <!-- </table> --> 
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
						alert("Company Detail Insert Successfull!! After few days We will Conatct You Thank You!!");
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