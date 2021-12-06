<!DOCTYPE html>
<html>
	<head>
		<title>Rnw Software</title>
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/bootstrap.min.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/all.min.css"> -->
  		<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/font-awesome.min.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/style.css"> -->
  		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/media.css">
  		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/bootstrap-datepicker.min.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/bootstrap-timepicker.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/bootstrap.min.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/font-awesome.min.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/all.min.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>New_Demo_Soft/css/style.css">
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	</head>
	<style type="text/css">
		.bg-purple{
			background-color: #5864bd !important;
		}
		.text-purple{
			color: #ff0000 !important;
		}
		.logo{
			width: 50px;
			border-radius: 6px;
			box-shadow: 4px 3px 6px 0 rgb(0 0 0 / 20%);
		}
		.dropdown-item{
			font-size: 12px;
			padding:5px 18px;
		}
		.navbar{
			box-shadow: 15px 9px 25px 0 rgba(0,0,0,0.1);
		}
		.headerBadge1 {
		    position: absolute;
		    top: 4px;
		    right: 0px;
		    font-weight: 300;
		    padding: 3px 6px;
		    background: #fff;
		    border-radius: 10px;
		}
		.navbar .nav-link.nav-link-user{
			color: #fff;
		    padding-top: 4px;
		    padding-bottom: 4px;
		    font-weight: 600;
		    padding-right: 12px !important;
		}
		.navbar .nav-link.nav-link-user .user-img-radious-style{
			border-radius: 6px;
    		box-shadow: 4px 3px 6px 0 rgba(0,0,0,0.2);
		}
		.navbar .nav-link.nav-link-user img{
			width: 30px;
		}
		.dropdown-menu{
			width: 300px;
			box-shadow: 0 0 30px rgba(0,0,0,0.1);
			border: none;
		}
		.dropdown-menu a {
		    font-size: 13px;
		    color: #212121;
		}
		.bell {
		    display: block;
		    width: 24px;
		    height: 24px;
		    font-size: 40px;
		    color: #9e9e9e;
		    -webkit-animation: ring 4s 0.7s ease-in-out infinite;
		    -webkit-transform-origin: 50% 4px;
		    -moz-animation: ring 4s 0.7s ease-in-out infinite;
		    -moz-transform-origin: 50% 4px;
		    animation: ring 4s 0.7s ease-in-out infinite;
		    transform-origin: 50% 4px;
		}
		.scrollable-menu {
		    height: auto;
		    max-height: 200px;
		    overflow-x: hidden;
		}
		.scrollbar{
			float: left;
			height: 300px;
			background: #F5F5F5;
			overflow-y: scroll;
		}
		.force-overflow{
			min-height: 450px;
		}
		#style-10::-webkit-scrollbar-track{
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			background-color: #F5F5F5;
			border-radius: 10px;
		}
		#style-10::-webkit-scrollbar{
			width: 5px;
			background-color: #F5F5F5;
		}
		#style-10::-webkit-scrollbar-thumb{
			background-color: #AAA;
			border-radius: 10px;
			background-image: -webkit-linear-gradient(90deg,  rgba(0, 0, 0, .2) 25%,  transparent 25%,  transparent 50%,  rgba(0, 0, 0, .2) 50%,  rgba(0, 0, 0, .2) 75%,  transparent 75%,	transparent)
		}
		.pullDown {
		    animation-name: pullDown;
		    -webkit-animation-name: pullDown;
		    animation-duration: 1.1s;
		    -webkit-animation-duration: 1.1s;
		    animation-timing-function: ease-out;
		    -webkit-animation-timing-function: ease-out;
		    transform-origin: 50% 0%;
		    -ms-transform-origin: 50% 0%;
		    -webkit-transform-origin: 50% 0%;
		}
		@keyframes pullDown {
			0% {
			transform: scaleY(0.1);
			}

			40% {
			transform: scaleY(1.02);
			}

			60% {
			transform: scaleY(0.98);
			}

			80% {
			transform: scaleY(1.01);
			}

			100% {
			transform: scaleY(0.98);
			}

			80% {
			transform: scaleY(1.01);
			}

			100% {
			transform: scaleY(1);
			}
		}
		.list-group-item{
			font-size: 13px;
			padding: 5px 17px;
			border: none;
		}
		.dropdown-title{
			font-size: 14px;
		}
		.user_font{
			font-size: 10px;
		}
	</style>
	<body>
		<?php 
     @$user_permission =  explode(",",$_SESSION['user_permission']); 
     @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);
        
        $con = mysqli_connect("localhost","rnwsoftt_mzfrxmujjb","nathikevo#@!2021","rnwsoftt_mzfrxmujjb");
        
        $qu_course = mysqli_query($con,"SELECT * FROM `course`");
        
        ?>
		<header class="bg-purple">
    		<nav class="navbar navbar-expand-lg navbar-light">
      			<a class="navbar-brand" href="https://demo.rnwmultimedia.com">
        			<img src="http://demo.rnwmultimedia.com/assets/images/main_header_logo.png" alt="logo" class="img-fluid logo" width="50px" />
      			</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="text-light"><i class="fas fa-bars"></i></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
        			<ul class="navbar-nav mr-auto">
          				<li class="nav-item active">
            				<a class="nav-link text-light mr-1" href="http://demo.rnwsofttech.com">Dashboard <span class="sr-only">(current)</span></a>
          				</li>
						<li class="nav-item dropdown">
							<a class="nav-link text-light mr-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							CRM
							</a>
							<div class="dropdown-menu pullDown" aria-labelledby="navbarDropdown">
								<form class="accordion" id="crm">
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#lead" aria-expanded="true" aria-controls="lead">Lead<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="lead" class="collapse px-3" aria-labelledby="lead" data-parent="#crm">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Bulk_LeadController/Bulk_lead">Bulk Lead</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/LeadlistController/index">Lead List</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/LeadlistController/channel">Channal</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/LeadlistController/source">Source</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/LeadlistController/school_college">School / College</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/LeadlistController/lead_status">Lead Status</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/LeadlistController/lead_substatus">Lead Sub Status</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/LeadlistController/lead_followup_mode">Follow-Up Mode</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/LeadMyActivity/index">My Followup</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/LeadlistController/campaign">Campaign</a>
											  	</li>
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#enquiry" aria-expanded="true" aria-controls="enquiry">Enquiry<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="enquiry" class="collapse px-3" aria-labelledby="enquiry" data-parent="#crm">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Enquiry/leads_list">Leads</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Enquiry/proceedEnq">New Enquiry</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Enquiry/inquirys">Enquiry List</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Enquiry/enquiryPendingFollowup">Pending Followup</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Enquiry/enquiryOverdueFollowup">Overdue Followup</a>
											  	</li>
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#faq" aria-expanded="true" aria-controls="faq">FAQ<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="faq" class="collapse px-3" aria-labelledby="faq" data-parent="#crm">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FaqController/FaqAdd">Faq Add</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FaqController/FaqView">Faq View</a>
											  	</li>
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#demo" aria-expanded="true" aria-controls="demo">Demo<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="demo" class="collapse px-3" aria-labelledby="demo" data-parent="#crm">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/AdDemo_New">Add Demo</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/viewDemo/as">View Demo</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/viewDemo/rd">Running Demo</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/viewDemo/ord">Overdue Running Demo</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/viewDemo/cfd">Confusion Demo</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/viewDemo/ld">Leave Demo</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/viewDemo/dd">Done Demo</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/viewDemo/cd">Cancel Demo</a>
											  	</li>
											</ul>
										</div>
									</div>
								</form>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link text-light mr-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								LMS
							</a>
							<div class="dropdown-menu pullDown" aria-labelledby="lms">
								<form class="accordion" id="lms">
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#job" aria-expanded="true" aria-controls="job">Job Application List<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="job" class="collapse px-3" aria-labelledby="job" data-parent="#lms">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/jobApplication">Job Apply Application</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/viewgradeStudentsQuestions">View Stu Questions</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/viewall_company_detail">View Company</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/view_all_jobs">View all jobs</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/view_student_applied_jobs">View student applied on job</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/view_rapid_job_post">View Rapid Job</a>
											  	</li>
											  	
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#faq" aria-expanded="true" aria-controls="faq">LmsSetting<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="faq" class="collapse px-3" aria-labelledby="faq" data-parent="#lms">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/job_position">Job_Position</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/job_main_category">Job_ Main_Category</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/job_subcategory">Job_Subcategory</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/lmsWhatsappTemplate">Whatsapp Template</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/send_email_template">Email Template</a>
											  	</li>
											</ul>
										</div>
									</div>									
								</form>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link text-light mr-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ERP
							</a>
							<div class="dropdown-menu pullDown" aria-labelledby="navbarDropdown">
								<form class="accordion" id="erp">
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#Admission" aria-expanded="true" aria-controls="Admission">Admission<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="Admission" class="collapse px-3" aria-labelledby="Admission" data-parent="#erp">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/admissionprocess">Admission Process</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/admission_view">Show Admission</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/default_search">Master Search</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/unfillup_fealds">Unfillup Fealds</a>
											  	</li>
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#Eduzilla" aria-expanded="true" aria-controls="Eduzilla">Eduzilla Admission<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="Eduzilla" class="collapse px-3" aria-labelledby="Eduzilla" data-parent="#erp">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/seat_branch">Seat Batch</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/seat_course">Seat Course</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/seat_assign">Seat Assign</a>
											  	</li>
											  	
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#Events" aria-expanded="true" aria-controls="Events">Events<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="Events" class="collapse px-3" aria-labelledby="Events" data-parent="#erp">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/TaskController/create_event_data">Create Event</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/TaskController/cal_index">Show Event</a>
											  	</li>
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#admsettings" aria-expanded="true" aria-controls="admsettings">Admission Settings<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="admsettings" class="collapse px-3" aria-labelledby="admsettings" data-parent="#erp">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/receipt">Receipt</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/documents">Documents</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/shining_sheet">Shining Sheet</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/icard_form">Id Card</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/admprocess_permition">Permission</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/AddmissionController/batches">Batch</a>
											  	</li>
											</ul>
										</div>
									</div>
								</form>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link text-light mr-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								COMMON
							</a>
							<div class="dropdown-menu pullDown" aria-labelledby="navbarDropdown">
								<form class="accordion" id="accordionExample">
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#job" aria-expanded="true" aria-controls="job">Dashboard<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="job" class="collapse px-3" aria-labelledby="job" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/index">Take Attendance</a>
											  	</li>											  	
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#course" aria-expanded="true" aria-controls="course">Course Details<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="course" class="collapse px-3" aria-labelledby="course" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/courseDetails">Course Details</a>
											  	</li>
											</ul>
										</div>
									</div>		
									<div>
										<a class="dropdown-item" href="http://demo.rnwsofttech.com/welcome/courseDetails"class="nav-link" data-toggle="collapse" data-target="#form" aria-expanded="true" aria-controls="form">Form<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="form" class="collapse px-3" aria-labelledby="form" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/managementForm">Form</a>
											  	</li>
											</ul>
										</div>
									</div>	
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#hardware" aria-expanded="true" aria-controls="hardware">Hardware<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="hardware" class="collapse px-3" aria-labelledby="hardware" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/HardwareController/HardwareForm">Hardware Form</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/HardwareController/HardwareShow">Hardware Show</a>
											  	</li>
											</ul>
										</div>
									</div>	
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#tnc" aria-expanded="true" aria-controls="tnc">Terms & Conditions<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="tnc" class="collapse px-3" aria-labelledby="tnc" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Tc_Controller/TcAdd">Terms & Conditions Form</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Tc_Controller/TcAdd">Terms & Conditions Show</a>
											  	</li>
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#complain" aria-expanded="true" aria-controls="complain">Complain<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="complain" class="collapse px-3" aria-labelledby="complain" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/PropertyController/addcomplain_new">Add New Complain</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/PropertyController/viewComplain">View All Complain</a>
											  	</li>
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#task" aria-expanded="true" aria-controls="task">Task<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="task" class="collapse px-3" aria-labelledby="task" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/TaskController/group">Group Create</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/TaskController/show_chat_member">Show Member</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/TaskController/show_all_task">Add task</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/TaskController/observe_all_task">Observe Task</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/TaskController/working_all_task">Working Task</a>
											  	</li>
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#email" aria-expanded="true" aria-controls="email">Email<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="email" class="collapse px-3" aria-labelledby="email" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/gmail">Create Mail</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/all_gmail">Show Mail</a>
											  	</li>
											</ul>
										</div>
									</div>
								</form>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link text-light mr-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								REPORTS
							</a>
							<div class="dropdown-menu pullDown" aria-labelledby="navbarDropdown">
								<form class="accordion" id="accordionExample">
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#job" aria-expanded="true" aria-controls="job">Analysis<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="job" class="collapse px-3" aria-labelledby="job" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/todayr">Today Report</a>
											  	</li>	
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/analysis/sixm">Last 6 Months</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/analysis/cm">Current Month</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/analysis/fp">Faculty Wise Performance</a>
											  	</li>										  	
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#course" aria-expanded="true" aria-controls="course">Reports<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="course" class="collapse px-3" aria-labelledby="course" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/analysis/cr">Cancel Demo Reason Wise</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/demoReport">Demo Report</a>
											  	</li>
											</ul>
										</div>
									</div>		
								</form>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link text-light mr-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								ADMIN
							</a>
							<div class="dropdown-menu pullDown" aria-labelledby="navbarDropdown">
								<form class="accordion" id="accordionExample">
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#settings" aria-expanded="true" aria-controls="settings">Setting<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="settings" class="collapse px-3" aria-labelledby="settings" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/branch">Branch Create</a>
											  	</li>	
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/department">Department</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/subdepartment">SubDepartment</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/admin">Admin</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/user">User</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/hod">Hod</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/staff">Faculty</a>
											  	</li>

											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/course">Single Course</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/course_package">Course Package</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Settings/extradepartment">Extra Department</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/log_history">History</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/welcome/log_time">Logout Time</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/student_finder_permission">Student Finder</a>
											  	</li>								  	
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#Permission" aria-expanded="true" aria-controls="Permission">Permission<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="Permission" class="collapse px-3" aria-labelledby="Permission" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Settings/permission_all_data">Permission All</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Settings/personal_user_permission_all_data">User Permission</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Settings/personal_permission_all_data">Faculty Permission</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Settings/personal_hod_permission_all_data">Hod Permission</a>
											  	</li>
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#Property" aria-expanded="true" aria-controls="Property">Property<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="Property" class="collapse px-3" aria-labelledby="Property" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/PropertyController/place">Place Type</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/PropertyController/producttype">Property Type</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/PropertyController/productlist">Property List</a>
											  	</li>
											</ul>
										</div>
									</div>
									<div>
										<a class="dropdown-item" href="#"class="nav-link" data-toggle="collapse" data-target="#Sidebar" aria-expanded="true" aria-controls="Sidebar">TopBar<span class="float-right"><i class="fas fa-sort-down"></i></span>
										</a>
										<div id="Sidebar" class="collapse px-3" aria-labelledby="Sidebar" data-parent="#accordionExample">
											<ul class="list-group list-group-flush">
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/Settings/main_menu">Main Menu</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/mid_menu">Middle Menu</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/settings/las_menu">Last Menu</a>
											  	</li>
											  	<li class="list-group-item">
											  		<a href="http://demo.rnwsofttech.com/FormController/view_company_wise_job">View Company Post</a>
											  	</li>
											</ul>
										</div>
									</div>				
								</form>
							</div>
						</li>
						<!-- <li class="nav-item dropdown">
							<a class="nav-link text-light mr-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Reports
							</a>
							<div class="dropdown-menu pullDown" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Analysis</a>
								<a class="dropdown-item" href="#">Report</a>
							</div>
						</li> -->
		<!-- 				<li class="nav-item dropdown">
							<a class="nav-link text-light mr-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ADMIN
							</a>
							<div class="dropdown-menu pullDown" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Setting</a>
								<a class="dropdown-item" href="#">Permission</a>
								<a class="dropdown-item" href="#">Property</a>								
								<a class="dropdown-item" data-toggle="collapse" href="#collapseExample" role="button">Sidebar</a>
									<ul class="collapse" id="collapseExample">
										<li>
											<a class="nav-link text-dark" href="#">Setting</a>	
										</li>
									</ul>
								</div>
							</div>
						</li> -->
					</ul>
					<ul class="navbar-nav navbar-right">
			          <li class="dropdown dropdown-list-toggle show">
			          	<a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle" aria-expanded="true" id="dropdownMenuButton">
			          		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail text-light"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
			          		<span class="badge headerBadge1 text-purple">6 </span> 
			          	</a>
			          	<!-- <div class="scrollbar" id="style-10">
					    	<div class="force-overflow"></div>
					    </div> -->
						<div class="dropdown-menu scrollbar dropdown-menu-right scrollable-menu pullDown pb-3 bg-light" aria-labelledby="dropdownMenuButton" id="style-10">
							<div class="dropdown-header">
			                	Notifications
			                	<div class="float-right">
			                  		<a href="#">Mark All As Read</a>
		                		</div>
			              	</div>
						    <a class="dropdown-item" href="#">Action</a>
						    <a class="dropdown-item" href="#">Another action</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						    <div class="dropdown-footer text-center">
								<a href="#">View All <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>						
			          </li>
			          <li class="dropdown dropdown-list-toggle">
			          	<a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
			          		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell bell text-light">
			          			<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
			          			<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
			          		</svg>
			          		<span class="badge headerBadge1 text-purple"><?php echo $count_batch; ?></span>
			            </a>
			            <div class="dropdown-menu scrollbar dropdown-list dropdown-menu-right pullDown scrollable-menu pb-3 bg-light"  id="style-10" >
			              	<div class="dropdown-header">
			                	Notifications
			                	<div class="float-right">
			                  		<a href="#">Mark All As Read</a>
		                		</div>
			              	</div>
							<div class="dropdown-list-content dropdown-list-icons">
							    <a class="dropdown-item" href="#">
							    	<?php foreach ($batch_datas as $key) { ?>
			                    <div class="toast-body">
			                     <span><i class="fa fa-user-plus" aria-hidden="true" style="color: #6777ef;font-size: 15px;" onclick="return batch_notification(<?php echo $key->admission_courses_id; ?>);"></i></span> (<b><?php echo $key->gr_id; ?></b>) <?php echo $key->surname; ?> <?php echo $key->first_name; ?> <?php $courseids = explode(",",$key->courses_id);
			                        foreach($course_data as $row) { if(in_array($row->course_id,$courseids)) {  echo $row->course_name; }  } ?> 
			                  </div>
			                  <?php } ?>
							    </a>
							</div>
								<div class="dropdown-footer text-center">
								<a href="#">View All <i class="fas fa-chevron-right"></i></a>
							</div>
			            </div>
			          </li>
			          <li class="dropdown">
			          	<a href="#" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user"> 
			          		<?php if($_SESSION['user_image']=="") { ?>
			          		<img alt="image" src="http://demo.rnwsofttech.com/dist/img/RNW_1.jpeg" class="user-img-radious-style">
			          		<span class="d-sm-none d-lg-inline-block"></span>
			          		<?php } else  { ?>
			          		<img alt="image" src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image']; ?>" class="user-img-radious-style">
			          		<span class="d-sm-none d-lg-inline-block"></span>
			          		<?php  } ?> 
			          	</a>
			            <div class="dropdown-menu dropdown-menu-right pullDown " style="width: 150px;">
			            	<div class="dropdown-title pl-3 font-weight-bold user_font"><?php echo $_SESSION['user_name']; ?> <br> <?php echo $_SESSION['logtype']; ?> <br> <?php echo $_SESSION['user_email']; ?></div>
		              		<a href="<?php echo base_url(); ?>settings/profile" class="dropdown-item has-icon"> 
		              			<i class="far fa-user mr-2"></i> Profile
							</a> 
							 <?php if($_SESSION['logtype']=="Faculty" || $_SESSION['logtype']=="Super Admin") { ?>
							<a href="<?php echo base_url(); ?>settings/aspectedtime" class="dropdown-item has-icon"> 
								<i class="fas fa-bolt mr-2"></i>Expected Time
							</a> 
							<?php } ?>
							<a href="" class="dropdown-item has-icon"> 
								<i class="fas fa-cog mr-2"></i>Settings
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?php echo base_url(); ?>welcome/logout" class="dropdown-item has-icon text-danger"> 
								<i class="fas fa-sign-out-alt mr-2"></i>Sign Out 
							</a>
		            	</div>
			          </li>
			        </ul>
					<!-- <form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form> -->
	      		</div>
	    	</nav>
		</header>
	</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="https://cdn.tiny.cloud/1/n9ury2u6quy5yo8n0ij8xeo7agd9310wz8eb6t2ms04chtsd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  function batch_notification(admission_courses_id=''){
   $.ajax({
     url : "<?php echo base_url(); ?>welcome/batchnotification_status",
     type:"post",
     data:{
       'admission_courses_id':admission_courses_id 
     },
     success:function(Resp){
      
      setTimeout(function() {
                location.reload();
            },500);
     }
   });
 }
</script>


<script>
  function demo_notifive(d_id=''){
   $.ajax({
     url : "<?php echo base_url(); ?>welcome/demonotification_status",
     type:"post",
     data:{
       'd_id':d_id 
     },
     success:function(Resp){
      
      setTimeout(function() {
                location.reload();
            },500);
     }
   });
 }
</script>
