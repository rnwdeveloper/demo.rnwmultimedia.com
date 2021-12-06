

<?php 

	ob_start();



	if(empty($_SESSION['Admin']))

	{

		redirect('welcome/login');

	}

	@$user_permission =  explode(",",$_SESSION['user_permission']); 

    @$branch_ids = explode(",",$_SESSION['branch_ids']);

    @$depart_ids = explode(",",$_SESSION['department_id']);

        

    $con = mysqli_connect("localhost","rnwsoftt_mzfrxmujjb","nathikevo#@!2021","rnwsoftt_mzfrxmujjb");

    $qu_course = mysqli_query($con,"SELECT * FROM `course`");





        

?>

<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

	<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->

	<!-- <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> -->

	<meta name="viewport" content="width=device-width, initial-scale=1">



	<title>Rnw Demo Soft</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/all.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/media.css">

	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

	

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->

</head>

<body class="position-relative">



<header class="top_header d-inline-block w-100 position-relative">

	<div class="container-fluid">

		<div class="row align-items-center">

			<div  class="col-lg-2 col-md-3 col-sm-12 text-center text-lg-left">

				<img src="<?php  echo base_url(); ?>assets/images/logo_White.png" class="logo" width="100%">

				<!-- <h2 class="logo_text">Red & White <br> Group Of Institute</h2> -->

			</div>

			<div class="col-lg-5 col-md-5 col-sm-12 text-sm-center text-lg-left text-md-left sort_details_row">

				<ul class="navbar-icon-list">

				 <?php if($_SESSION['logtype']!="Progress Report Checker") { ?>

				    <li>

				        <a href="https://demo.rnwmultimedia.com/welcome/addemo" title="Add Demo"><i class="fa fa-user"></i></a>

				    </li>

				    <li>

				        <a href="https://demo.rnwmultimedia.com/FormController/managementForm" title="Form"><i class="fa fa-fw fa-list-alt"></i></a>

				    </li>

				    <li>

				        <a href="https://demo.rnwmultimedia.com/welcome/courseDetails" title="Course Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>

				    </li>

				    <li>



				        <a href="https://demo.rnwmultimedia.com/FaqController/FaqView" title="FAQ's"><i class="fa fa-question-circle" aria-hidden="true"></i></a>

				    </li>



				    <li>

				        <a href="https://demo.rnwmultimedia.com/PropertyController/addcomplain_new" title="Add-Complain"><i class="fa fa-bullhorn" aria-hidden="true"></i></a>

				    </li>

				    <li>

				        <a href="https://demo.rnwmultimedia.com/GRid_search_api.php" title="GR_id"><i class="fa fa-user-circle" aria-hidden="true"></i></a>

				    </li>

				    <?php } ?>

          <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Manager" || $_SESSION['logtype']=="Progress Report Checker") { ?>

        <li>

          <a href="<?php echo base_url(); ?>GoogleFormController/googleform" title="Google-Form"><i class="fa fa-file-text-o"></i></a>

        </li>

      <?php } ?>

				    <li>

				        <a href="https://demo.rnwmultimedia.com/GoogleFormController/StaffDetail" title="Employee-Details"><i class="fa fa-users" aria-hidden="true"></i></a>

				    </li>

				</ul>

			</div>

			   

			<?php $nos=0; foreach($upd_see as $val) { if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Faculty") { $nos++; } } ?> 



			<div class="col-lg-5 col-md-4 col-sm-12 text-lg-right text-md-right text-sm-center">

				<ul class="top_header_right_block">

					<div class="d-inline-block">

						<li class="dropdown New_Demo_Msg_Dropdown d-inline-block">

							<button type="button" class="btn btn-link text-white" data-toggle="dropdown"><i class="fas fa-envelope"></i></button>

							<ul class="dropdown-menu">

								<li>You have <?php echo $nos; ?> messages</li>

								<li class="dropdown-divider">

									 <li>

                <!-- inner menu: contains the actual data -->

                <ul class="menu">

                 

                <?php foreach($upd_see as $val) { if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Faculty") { ?>

                  <li><!-- start message -->

                    <a href="#">

                      

                      <h4>

                        New Demo : <?php echo $val->name; ?> 

                       

                      </h4>

                      <p>Added By <?php echo $val->addBy; ?></p>

                      <p>Assign to <?php foreach($upd_faculty as $row) { if($val->faculty_id==$row->faculty_id) { echo $row->name; } } ?>  - <?php foreach($upd_branch as $row) { if($val->branch_id==$row->branch_id) { echo $row->branch_name ; } } ?> </p>

                     <p>Course : <?php echo $val->courseName; ?> Date : <?php echo $val->demoDate; ?></p> 

                    </a>

                  </li>

                <?php } } ?>

                </ul>

              </li>

								</li>

								<li class="text-center">

									<a href="#" class="text-black">See All Messages</a>

								</li>

							</ul>

						</li>

						<li class="dropdown User_Profile_Block d-inline-block">

							<a href="#" class="d-inline-block" data-toggle="dropdown">

								 <?php if($_SESSION['user_image']=="") { ?>

              <img src="<?php echo base_url(); ?>assets/images/avatar.jpg" class="user_image rounded-circle" width="100%">

              <?php } else  {  ?>

              	 <img src="<?php echo base_url(); ?>assets/images/avatar.jpg" class="user-image" alt="User Image">

             <!-- <img src="<?php echo base_url(); ?>assets/images/<?php echo $_SESSION['user_image']; ?>" class="user-image" alt="User Image">-->

              <?php } ?>

             

              <span class="d-inline-block align-middle ml-2"><?php echo $_SESSION['user_name']; ?></span>

            </a>

								

								

							</a>

							<ul class="dropdown-menu text-center">

								<div class="card">

									<div class="card-header" style="color:white">

										<?php if($_SESSION['user_image']=="") { ?>

                								<img src="<?php echo base_url(); ?>assets/images/avatar.jpg" class="user-image" alt="User Image">

     									<?php } else  { ?>

           										<img src="<?php echo base_url(); ?>assets/images/avatar.jpg" height="100" class="user-image" alt="User Image">

           								 <?php  } ?>

               							 <p>

                  								<?php echo $_SESSION['user_name']; ?> - <?php echo $_SESSION['logtype']; ?>

                  								<small><?php echo $_SESSION['user_email']; ?></small>

                						</p>

										<!-- <img src="https://demo.rnwmultimedia.com/dist/img/1576739309service_bg.jpg" class="main_profile_image mb-2">

										<p class="text-white">NIRBHAY VIRANI - Faculty</p>

										<small><a href="#">princevirani2610@gmail.com</a></small> -->

									</div>

									<div class="card-body">

										<a href="#">Expected Demo Time</a>

									</div>

									<div class="card-footer">

										<div class="float-left">

											<a href="<?php echo base_url(); ?>settings/profile" class="btn btn-primary">Profile</a>

										</div>

										<div class="float-right">

											<a href="<?php echo base_url(); ?>welcome/logout" class="btn btn-primary">Sign out</a>

										</div>

									</div>

								</div>

							</ul>

						</li>

					</div>

					<li class="toogle_btn_gp">

						<a href="javascript:void(0)" class="toogle_btn"><i class="fa fa-bars"></i></a>

					</li>

				</ul>				

			</div>

		</div>

	</div>

</header>

<aside class="side_Menu d-inline-block">

	<div class="side_menu_in_block">

		<div class="Side_profile">

			<span class="User_Profile_Block">

				<?php if($_SESSION['user_image']=="") { ?>

          		     <img src="https://demo.rnwmultimedia.com/dist/img/1576739309service_bg.jpg" class="user_image rounded-circle" width="100%">

          	    <?php } else { ?>

          			<img src="<?php echo base_url(); ?>assets/images/avatar.jpg" class="user-image" alt="User Image">

          		<?php } ?>

		        

		        <span class="d-inline-block align-middle ml-2"><?php echo $_SESSION['user_name']; ?></span>

			</span>

		</div>

		<div class="Nav_Title">

			MAIN NAVIGATION

		</div>

		<div class="side_all_menu">

			<?php if($_SESSION['logtype']!="Access Document" && $_SESSION['logtype']!="Access Property") { ?>

			<ul class="side_all_menu_block" id="ollcollapse"> 

				<li>

					<a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i>Dashboard</a>

				</li>

				<?php if($_SESSION['logtype']=="Hello") { ?>

		        		<li>

		          			<a href="<?php echo base_url() ?>ChatController">

		            			<i class="fa fa-comments-o"></i> <span>Chat</span>

		           			</a>

		          

		        		</li>

       			<?php } ?>

				

				<li>

					<a href="#sub_menu_1" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-gears"></i>Settings <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_1" data-parent="#ollcollapse">

						<?php if($_SESSION['logtype']=="Super Admin") { ?>

							<li><a href="<?php echo base_url() ?>settings/admin"><i class="fa fa-circle-o"></i>Admin</a></li>

           					<li><a href="<?php echo base_url() ?>settings/branch"><i class="fa fa-circle-o"></i>Branch</a></li>  

            				<li><a href="<?php echo base_url() ?>settings/department"><i class="fa fa-circle-o"></i>Department</a></li>

            				<li><a href="<?php echo base_url() ?>settings/user"><i class="fa fa-circle-o"></i>Role </a></li>

            			<?php } ?>

             		    <?php if(in_array("Faculty=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

             				<li><a href="<?php echo base_url() ?>settings/staff"><i class="fa fa-user"></i> Faculty</a></li>

             			<?php } ?>

             			<?php if(in_array("Single Course=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

            				<li><a href="<?php echo base_url() ?>settings/course"><i class="fa fa-circle-o"></i>Single Course</a></li>

            			<?php } ?>

            			<?php if(in_array("Course Package=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

            				<li><a href="<?php echo base_url() ?>settings/course_package"><i class="fa fa-circle-o"></i>Course Package</a></li>

             			<?php } ?>

                    </ul>

				</li>

				

				<li>

					<a href="#sub_menu_2" data-toggle="collapse" class="sub_menu collapsed"><i class="fab fa-leanpub"></i>Bulk Lead <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_2" data-parent="#ollcollapse">

						<?php if(in_array("Bulk_Lead=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

	            		<li>

	            				<a href="<?php echo base_url(); ?>Bulk_LeadController/Bulk_lead" title="Bulk-Lead"><i class="fa fa-circle-o"></i>Bulk Lead</a>

	          			</li>

	            		<?php }  ?> 

	           		</ul>

				</li>





				

				<li>

					<a href="#sub_menu_lead" data-toggle="collapse" class="sub_menu collapsed"><i class="fab fa-leanpub"></i>Lead List<span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_lead" data-parent="#ollcollapse">

						<?php if(in_array("Bulk_Lead=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

	            		<li>

	            				<a href="<?php echo base_url(); ?>LeadlistController/index" title="Bulk-Lead"><i class="fa fa-circle-o"></i>Lead List</a>

	          			</li>



	          			<li>

	            				<a href="<?php echo base_url(); ?>LeadMyActivity/index" title="Bulk-Lead"><i class="fa fa-circle-o"></i>My Followups</a>

	          			</li>



	          			<li>

	            				<a href="<?php echo base_url(); ?>LeadlistController/channel" title="Bulk-Lead"><i class="fa fa-circle-o"></i>Channel</a>

	          			</li>



	          			<li>

	            				<a href="<?php echo base_url(); ?>LeadlistController/source" title="Bulk-Lead"><i class="fa fa-circle-o"></i>Source</a>

	          			</li>



	          			<li>

	            				<a href="<?php echo base_url(); ?>LeadlistController/school_college" title="Bulk-Lead"><i class="fa fa-circle-o"></i>School/College</a>

	          			</li>



	          			<li>

	            				<a href="<?php echo base_url(); ?>LeadlistController/lead_status" title="Bulk-Lead"><i class="fa fa-circle-o"></i>Lead Status</a>

	          			</li>



	          			<li>

	            				<a href="<?php echo base_url(); ?>LeadlistController/lead_substatus" title="Bulk-Lead"><i class="fa fa-circle-o"></i>Lead Sub - Status</a>

	          			</li>



	          			<li>

	            				<a href="<?php echo base_url(); ?>LeadlistController/lead_followup_mode" title="Bulk-Lead"><i class="fa fa-circle-o"></i>Follow-Up Mode</a>

	          			</li>





	          			<li>

	            				<a href="<?php echo base_url(); ?>LeadlistController/email_template_category" title="Bulk-Lead"><i class="fa fa-circle-o"></i>Email Template</a>

	          			</li>



	          			<li>

	            				<a href="<?php echo base_url(); ?>LeadlistController/sms_template" title="Bulk-Lead"><i class="fa fa-circle-o"></i>Sms Template</a>

	          			</li>



	            		<?php }  ?> 

	           		</ul>

				</li>





				<li>

					<a href="#sub_menu_3" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-list-alt"></i>Enquiry <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_3" data-parent="#ollcollapse">

						<?php if(in_array("Leads=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

	           				<li><a href="<?php echo base_url() ?>Enquiry/leads_list"><i class="fa fa-circle-o"></i>Leads</a></li> 

	            		<?php }  ?> 

	            		<?php if(in_array("New Enquiry=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

	           				<li><a href="<?php echo base_url() ?>Enquiry/proceedEnq"><i class="fa fa-circle-o"></i>New Enquiry</a></li> 

	         			<?php } ?>

	          			<?php if(in_array("Enquiry List=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

	           				<li><a href="<?php echo base_url() ?>Enquiry/inquirys"><i class="fa fa-circle-o"></i>Enquiry List</a></li>

	         			<?php } ?>

	          			<?php if(in_array("PendingFollowup=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

	           				<li><a href="<?php echo base_url() ?>Enquiry/enquiryPendingFollowup"><i class="fa fa-circle-o"></i>Pending Follow ups</a></li>

	         			<?php } ?>

	          			<?php if(in_array("OverdueFollowup=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

	           				<li><a href="<?php echo base_url() ?>Enquiry/enquiryOverdueFollowup"><i class="fa fa-circle-o"></i>Overdue Follow ups</a></li>

         				<?php } ?>

              

					</ul>

				</li>

				



				<?php if(in_array("Add Demo=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

       				<li>

						<a href="<?php echo base_url(); ?>welcome/addemo" ><i class="fas fa-sync"></i>Add Demo</a>

					</li>

				<?php } ?>



				<?php if(in_array("View Demo=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>  

				<li>

					<a href="#sub_menu_4" data-toggle="collapse" class="sub_menu collapsed"><i class="fas fa-sync"></i>View Students <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_4" data-parent="#ollcollapse">

						<li><a href="#"><i class="fa fa-circle-o"></i>All Students</a></li>

						<li><a href="#"><i class="fa fa-circle-o"></i>Running Demo</a></li>

						<li><a href="#"><i class="fa fa-circle-o"></i>Overdue Running Demo</a></li>

						<li><a href="#"><i class="fa fa-circle-o"></i>Confusion Demo</a></li>

						<li><a href="#"><i class="fa fa-circle-o"></i>Leave Demo</a></li>

						<li><a href="#"><i class="fa fa-circle-o"></i>Done Demo</a></li>

						<li><a href="#"><i class="fa fa-circle-o"></i>Cancel Demo</a></li>

					</ul>

				</li>

			<?php } ?>

			<?php if(in_array("Course Details=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

        

				<li>

					<a href="#sub_menu_5" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-info-circle"></i>Course Details <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_5" data-parent="#ollcollapse">

						

					</ul>

				</li>

			<?php } ?>

			<?php if(in_array("Form=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

				<li>

					<a href="#sub_menu_6" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-list-alt"></i>Form <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_6" data-parent="#ollcollapse">

						

					</ul>

				</li>

			<?php } ?>



				<li>

					<a href="#sub_menu_7" data-toggle="collapse" class="sub_menu collapsed"><i class="fas fa-chart-pie"></i>Analysis <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_7" data-parent="#ollcollapse">

						<?php

						if(in_array("Today Report=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 

           						<li><a href="<?php echo base_url(); ?>welcome/todayr"><i class="fa fa-circle-o"></i>Today Report</a></li>

         				<?php } ?>

          				<?php if(in_array("Last 6 Months=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 

           						<li><a href="<?php echo base_url(); ?>welcome/analysis/sixm"><i class="fa fa-circle-o"></i>Last 6 Months</a></li> 

         				<?php } ?>

         				<?php if(in_array("Current Month=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 

            				<li><a href="<?php echo base_url(); ?>welcome/analysis/cm"><i class="fa fa-circle-o"></i>Current Month</a></li>

          				<?php } ?>

          				<?php if(in_array("Faculty Wise performance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 

            				<li><a href="<?php echo base_url(); ?>welcome/analysis/fp"><i class="fa fa-circle-o"></i>Faculty Wise performance</a></li>

          				<?php } ?>

          				<?php if(in_array("Cancel Demo Reason wise=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 

            				<li><a href="<?php echo base_url(); ?>welcome/analysis/cr"><i class="fa fa-circle-o"></i>Cancel Demo Reason wise</a></li>

          				<?php } ?>

					</ul>

				</li>

				<li>

					<a href="#sub_menu_8" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-dashboard"></i>Property <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_8" data-parent="#ollcollapse">

						<?php if(in_array("Place Type=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 

           						<li><a href="<?php echo base_url(); ?>PropertyController/place"><i class="fa fa-circle-o"></i>Place Type</a></li>

           				<?php } ?>

           				<?php if(in_array("Property Type=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>  

           						<li><a href="<?php echo base_url(); ?>PropertyController/producttype"><i class="fa fa-circle-o"></i>Property Type</a></li>

           				<?php } ?>

           				<?php if(in_array("Property List=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>   

            				   	<li><a href="<?php echo base_url(); ?>PropertyController/productlist"><i class="fa fa-circle-o"></i>Property List</a></li>

            			<?php } ?>

           				<!--  <?php if(in_array("Add Complain=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 

            				<li><a href="<?php echo base_url(); ?>PropertyController/addComplain"><i class="fa fa-circle-o"></i>Add Complain</a></li>

          				<?php } ?> -->

          				<?php if(in_array("View All Complain=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 

            					<li><a href="<?php echo base_url(); ?>PropertyController/viewComplain"><i class="fa fa-circle-o"></i>View All Complain</a></li>

          				<?php } ?>

		          		<?php if(in_array("AddComplain New=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?> 

		            			<li><a href="<?php echo base_url(); ?>PropertyController/addcomplain_new"><i class="fa fa-circle-o"></i>AddComplain New</a></li>

		          		<?php } ?>

		            </ul>

				</li>

				<li>

					<a href="#sub_menu_9" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-list-alt"></i>Job Apply Application List <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_9" data-parent="#ollcollapse">

						<li><a href="#"><i class="fa fa-fw fa-file-o"></i>Job Apply Application List</a></li>

						<li><a href="#"><i class="fa fa-fw fa-file-o"></i>View Grade Company Questions</a></li>

						<li><a href="#"><i class="fa fa-fw fa-file-o"></i>view Stu Questions</a></li>

						<li><a href="#"><i class="fa fa-fw fa-file-o"></i>View Company</a></li>

						<li><a href="#"><i class="fa fa-fw fa-file-o"></i>view All Jobs</a></li>

						<li><a href="#"><i class="fa fa-fw fa-file-o"></i>view Student applied on job</a></li>

						<li><a href="#"><i class="fa fa-fw fa-file-o"></i>view Rapid Job</a></li>

					</ul>

				</li>

				<?php if(in_array("Demo Report=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

				<li>

					<a href="#sub_menu_10" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-list-alt"></i>Report <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_10" data-parent="#ollcollapse">

						<li><a href="#"><i class="fa fa-circle-o"></i>Reports</a></li>

					</ul>

				</li>

				<?php } ?>

			

				<li>

					<a href="#sub_menu_11" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-list-alt"></i>FAQ <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_11" data-parent="#ollcollapse">

						<?php if(in_array("FaqAdd=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>        

                			<li><a href="<?php echo base_url() ?>FaqController/FaqAdd"><i class="fa fa-circle-o"></i>FaqInsert</a></li> 

                		<?php } ?>

                		<?php if(in_array("FaqView=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

             				<li><a href="<?php echo base_url() ?>FaqController/FaqView"><i class="fa fa-circle-o"></i>FaqShow</a></li>

             			<?php } ?>  

					</ul>

				</li>

				<li>

					<a href="#sub_menu_12" data-toggle="collapse" class="sub_menu collapsed"><i class="fas fa-microchip"></i>Hardware <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_12" data-parent="#ollcollapse">

						<?php if(in_array("HardwareForm=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

           					<li><a href="<?php echo base_url() ?>HardwareController/HardwareForm"><i class="fa fa-circle-o"></i>HardwareForm</a></li>

           				<?php } ?>

           				<?php if(in_array("HardwareShow=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

           					<li><a href="<?php echo base_url() ?>HardwareController/HardwareShow"><i class="fa fa-circle-o"></i>HardwareShow</a></li>

           				<?php } ?>

					</ul>

				</li>

				<li>

					<a href="#sub_menu_13" data-toggle="collapse" class="sub_menu collapsed"><i class="fas fa-question"></i>Terms & Conditions <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a>

					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_13" data-parent="#ollcollapse">

						<?php if(in_array("TcForm=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

                			<li><a href="<?php echo base_url() ?>Tc_Controller/TcAdd"><i class="fa fa-circle-o"></i>TcInsert</a></li> 

                		<?php } ?>

                		<?php if(in_array("TcShow=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

             				<li><a href="<?php echo base_url() ?>Tc_Controller/TcView"><i class="fa fa-circle-o"></i>TcShow</a></li>

                 		<?php } ?>

					</ul>

				</li>

			</ul>

			<?php } ?>

		</div>

	</div>

</aside>

