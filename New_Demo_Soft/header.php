<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rnw Demo Soft</title>
	<script src="js/silector_bild.js"></script>
	<link rel="stylesheet" type="text/css" href="css/fastselect.min.css">
	<script src="js/fastselect.standalone.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-timepicker.css">
</head>
<body class="position-relative">

<header class="top_header d-inline-block w-100 position-relative align-bottom">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div  class="col-lg-2 col-md-3 col-sm-12 text-center text-lg-left">
				<img src="images/logo_White.png" class="logo" width="100%">
				<!-- <h2 class="logo_text">Red & White <br> Group Of Institute</h2> -->
			</div>
			<div class="col-lg-5 col-md-5 col-sm-12 text-sm-center text-lg-left text-md-left sort_details_row">
				<ul class="navbar-icon-list">
					
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
				    <li>
				        <a href="https://demo.rnwmultimedia.com/GoogleFormController/StaffDetail" title="Employee-Details"><i class="fa fa-users" aria-hidden="true"></i></a>
				    </li>
				</ul>
			</div>
			<div class="col-lg-5 col-md-4 col-sm-12 text-lg-right text-md-right text-sm-center">
				<ul class="top_header_right_block">
					<div class="toogle_btn_gp">
						<a href="javascript:void(0)" class="toogle_btn"><i class="fa fa-bars"></i></a>
					</div>
					<div class="d-inline-block">
						<li class="dropdown New_Demo_Msg_Dropdown d-inline-block">
							<button type="button" class="btn btn-link text-white" data-toggle="dropdown"><i class="fas fa-envelope"></i></button>
							<ul class="dropdown-menu">
								<li>You have 0 messages</li>
								<li class="dropdown-divider"></li>
								<li class="text-center">
									<a href="#" class="text-black">See All Messages</a>
								</li>
							</ul>
						</li>
						<li class="dropdown User_Profile_Block d-inline-block">
							<a href="#" class="d-inline-block" data-toggle="dropdown">
								<img src="https://demo.rnwmultimedia.com/dist/img/1576739309service_bg.jpg" class="user_image rounded-circle" width="100%">
								<span class="d-inline-block align-middle ml-2">Nirbhay Virani</span>
							</a>
							<ul class="dropdown-menu text-center">
								<div class="card">
									<div class="card-header">
										<img src="https://demo.rnwmultimedia.com/dist/img/1576739309service_bg.jpg" class="main_profile_image mb-2">
										<p class="text-white">NIRBHAY VIRANI - Faculty</p>
										<small><a href="#">princevirani2610@gmail.com</a></small>
									</div>
									<div class="card-body">
										<a href="#">Expected Demo Time</a>
									</div>
									<div class="card-footer">
										<div class="float-left">
											<a href="#" class="btn btn-primary">Profile</a>
										</div>
										<div class="float-right">
											<a href="#" class="btn btn-primary">Sign out</a>
										</div>
									</div>
								</div>
							</ul>
						</li>
					</div>
				</ul>				
			</div>
		</div>
	</div>
</header>
<aside class="side_Menu d-inline-block">
	<div class="side_menu_in_block">
		<div class="Side_profile">
			<span class="User_Profile_Block">
		        <img src="https://demo.rnwmultimedia.com/dist/img/1576739309service_bg.jpg" class="user_image rounded-circle" width="100%">
		        <span class="d-inline-block align-middle ml-2">Nirbhay Virani</span>
			</span>
		</div>
		<div class="Nav_Title">
			MAIN NAVIGATION
		</div>
		<div class="side_all_menu">
			<ul class="side_all_menu_block" id="ollcollapse"> 
				<li>
					<a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li>
					<a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard 2</a>
				</li>
				<li>
					<a href="new_admission.php"><i class="fa fa-user"></i>New Admission</a>
				</li>
				<li>
					<a href="new_admission_page_2.php"><i class="fa fa-user"></i>New Admission Page 2</a>
				</li>

				<li>
					<a href="new_latest_admission_process.php"><i class="fa fa-user"></i>New Latest Admission Process</a>
				</li>
				
				<li>
					<a href="#sub_menu_1" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-gears"></i>Settings <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_1" data-parent="#ollcollapse">
						<li><a href="admin.php"><i class="fa fa-circle-o"></i>Admin</a></li>
						<li><a href="branch.php"><i class="fa fa-circle-o"></i>Branch</a></li>
						<li><a href="department.php"><i class="fa fa-circle-o"></i>Department</a></li>
						<li><a href="sub_department.php"><i class="fa fa-circle-o"></i>Sub Department</a></li>
						<li><a href="role.php"><i class="fa fa-circle-o"></i>Role</a></li>
						<li><a href="hod.php"><i class="fa fa-user"></i>Hod</a></li>
						<li><a href="faculty.php"><i class="fa fa-user"></i>Faculty</a></li>
						<li><a href="single_course.php"><i class="fa fa-circle-o"></i>Single Course</a></li>
						<li><a href="course_package.php"><i class="fa fa-circle-o"></i>Course Package</a></li>
						<li><a href="permission_all.php"><i class="fa fa-circle-o"></i>Permission All</a></li>
						<li><a href="user_permission.php"><i class="fa fa-circle-o"></i>User Permission</a></li>
						<li><a href="faculty_permission.php"><i class="fa fa-circle-o"></i>Faculty Permission </a></li>
						<li><a href="hod_permission"><i class="fa fa-circle-o"></i>HOD Permission </a></li>
					</ul>
				</li>
				<li>
					<a href="#sub_menu_2" data-toggle="collapse" class="sub_menu collapsed"><i class="fab fa-leanpub"></i>Lead <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_2" data-parent="#ollcollapse">
						
					</ul>
				</li>
				<li>
					<a href="#sub_menu_3" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-list-alt"></i>Enquiry <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_3" data-parent="#ollcollapse">
						
					</ul>
				</li>
				<li>
					<a href="add_demo_student.php"><i class="fa fa-user"></i>Add Demo Student</span></a>
				</li>
				<li>
					<a href="#sub_menu_4" data-toggle="collapse" class="sub_menu collapsed"><i class="fas fa-sync"></i>View Students <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_4" data-parent="#ollcollapse">
						<li><a href="all_demo_student.php"><i class="fa fa-circle-o"></i>All Students</a></li>
						<li><a href="running_demo.php"><i class="fa fa-circle-o"></i>Running Demo</a></li>
						<li><a href="overdue_demo.php"><i class="fa fa-circle-o"></i>Overdue Running Demo</a></li>
						<li><a href="confusion_demo.php"><i class="fa fa-circle-o"></i>Confusion Demo</a></li>
						<li><a href="leave_demo.php"><i class="fa fa-circle-o"></i>Leave Demo</a></li>
						<li><a href="done_demo.php"><i class="fa fa-circle-o"></i>Done Demo</a></li>
						<li><a href="cancel_demo.php"><i class="fa fa-circle-o"></i>Cancel Demo</a></li>
					</ul>
				</li>
				<li>
					<a href="#sub_menu_5" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-info-circle"></i>Course Details <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_5" data-parent="#ollcollapse">
						
					</ul>
				</li>
				<li>
					<a href="#sub_menu_6" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-list-alt"></i>Form <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_6" data-parent="#ollcollapse">
						
					</ul>
				</li>
				<li>
					<a href="#sub_menu_7" data-toggle="collapse" class="sub_menu collapsed"><i class="fas fa-chart-pie"></i>Analysis <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_7" data-parent="#ollcollapse">
						
					</ul>
				</li>
				<li>
					<a href="#sub_menu_8" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-dashboard"></i>Property <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_8" data-parent="#ollcollapse">
						
					</ul>
				</li>
				<li>
					<a href="#sub_menu_9" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-list-alt"></i>Job Apply Application List <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
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
				<li>
					<a href="#sub_menu_10" data-toggle="collapse" class="sub_menu collapsed"><i class="fa fa-list-alt"></i>FAQ <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_10" data-parent="#ollcollapse">
						<li><a href="create_faq.php"><i class="fa fa-circle-o"></i>Create Faq</a></li>
						<li><a href="show_faq.php"><i class="fa fa-circle-o"></i>Show Faq</a></li>
					</ul>
				</li>
				<li>
					<a href="#sub_menu_11" data-toggle="collapse" class="sub_menu collapsed"><i class="fas fa-microchip"></i>Hardware <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_11" data-parent="#ollcollapse">
					</ul>
				</li>
				<li>
					<a href="#sub_menu_12" data-toggle="collapse" class="sub_menu collapsed"><i class="fas fa-question"></i>Terms & Conditions <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_12" data-parent="#ollcollapse">
						<li><a href="#"><i class="fa fa-circle-o"></i>TcShow</a></li>
					</ul>
				</li>
				<li>
					<a href="#sub_menu_13" data-toggle="collapse" class="sub_menu collapsed"><i class="fas fa-tasks"></i>Task <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_13" data-parent="#ollcollapse">
						<li><a href="create_task.php"><i class="fa fa-circle-o"></i>Create Task</a></li>
						<li><a href="show_task.php"><i class="fa fa-circle-o"></i>Show Task</a></li>
						<li><a href="create_group.php"><i class="fa fa-circle-o"></i>Create Group</a></li>
					</ul>
				</li>
				<li>
					<a href="#sub_menu_14" data-toggle="collapse" class="sub_menu collapsed"><i class="fas fa-tasks"></i>CRM <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_14" data-parent="#ollcollapse">
						<li><a href="#lead_submenu_1" data-toggle="collapse" class="collapsed"><i class="fa fa-circle-o"></i>Lead <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a></li>
						<ul class="side_all_menu_sub_menu side_all_menu_sub_menu_in_sub collapse" id="lead_submenu_1">
							<li><a href="create_task.php"><i class="fa fa-circle-o"></i>Blank Lead</a></li>
							<li><a href="show_task.php"><i class="fa fa-circle-o"></i>Show Lead</a></li>
						</ul>
					</ul>
				</li>
				<li>
					<a href="#sub_menu_15" data-toggle="collapse" class="sub_menu collapsed"><i class="fas fa-tasks"></i>LMS <span class="d-inline-block float-right"><span class="open_menu_plus"></span></span></a>
					<ul class="side_all_menu_sub_menu collapse" id="sub_menu_15" data-parent="#ollcollapse">
						<li><a href="#lead_submenu_2" data-toggle="collapse" class="collapsed"><i class="fa fa-circle-o"></i>Lead <span class="d-inline-block float-right"><i class="fa fa-angle-left"></i></span></a></li>
						<ul class="side_all_menu_sub_menu side_all_menu_sub_menu_in_sub collapse" id="lead_submenu_2">
							<li><a href="create_task.php"><i class="fa fa-circle-o"></i>Blank Lead</a></li>
							<li><a href="show_task.php"><i class="fa fa-circle-o"></i>Show Lead</a></li>
						</ul>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</aside>
