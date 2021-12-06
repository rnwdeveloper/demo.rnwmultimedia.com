<?php include('header.php'); ?>

<main class="main_content d-inline-block">
	<section class="page_title_block d-inline-block w-100 position-relative pb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="page_heading">
						<h1>Role</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="coman_design_block d-inline-block w-100 position-relative">
		<div class="container-fluid">
			<div class="row all_demo_student_block">
			    <div class="col-lg-12">
			        <div class="accordion accordion_design_2" id="student_list_aoc">
			            <div class="card">
			                <div class="card-header mb-0">
			                    <h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_1" aria-expanded="false">
										Create User <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
			                </div>
			                <div id="student_filter_panel_1" class="collapse show" data-parent="#student_list_aoc" style="">
			                	<div class="coman_design_block_box">
			                		<div class="coman_design_block_title d-inline-block w-100 border-bottom">
			                			<h4 class="d-inline-block align-middle">Create User</h4>
			                			<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#logtype_create">Create Logtype</button>
			                		</div>
			                		<form class="coman_design_block_info">
			                			<div class="row">
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                				    <div class="form-group">
			                				        <label for="pwd">Admin:</label>
			                				        <select class="form-control">
			                				            <option>Select Admin</option>
			                				            <option>Hiral Khunt</option>
			                				            <option>Ayush Donga</option>
			                				        </select>
			                				    </div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                				    <label for="pwd">Branch:</label>
			                				    <div class="form-group">
			                				        <select required="" class="form-control" name="branch_id">
			                				            <option value="">Select Branch</option>
			                				            <option value="1">AK ROAD</option>
			                				            <option value="3">MOTA VARACHHA</option>
			                				            <option value="4">VESU</option>
			                				            <option value="5">YOGI CHOWK</option>
			                				            <option value="8">SARTHANA</option>
			                				            <option value="9">AK ROAD-RW1B</option>
			                				            <option value="10">INTERNATIONAL</option>
			                				            <option value="11">RNWCOLLAGE</option>
			                				            <option value="16">SARTHANA2</option>
			                				            <option value="15">AK Road</option>
			                				        </select>
			                				    </div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                				    <div class="form-group">
			                				        <label for="email">Logtype:</label>
			                				        <select required="" class="form-control" name="logtype">
			                				            <option value="1">Select Logtype</option>
			                				            <option value="Admin">Admin</option>
			                				            <option value="Manager">Manager</option>
			                				            <option value="Counselor ">Counselor </option>
			                				            <option value="Accountant">Accountant</option>
			                				            <option value="Telecaller">Telecaller</option>
			                				            <option value="Receptionist">Receptionist</option>
			                				            <option value="Progress Report Checker">Progress Report Checker</option>
			                				            <option value="Center Head">Center Head</option>
			                				            <option value="HOD">HOD</option>
			                				            <option value="Counselor_test">Counselor_test</option>
			                				            <option value="Faculty">Faculty</option>
			                				        </select>
			                				    </div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">Log Name:</label>
			                					    <input class="form-control" value="" type="text" name="name" placeholder="Enter Name" required="">
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">Email Id:</label>
			                					    <input class="form-control" value="" type="email" name="email" placeholder="Enter Email" required="" autocomplete="off">
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">Password :</label>
			                					    <input type="password" class="form-control" value="" name="password" placeholder="Enter password" required="">
			                					</div>
			                				</div>
			                			</div>
			                			<div class="row mt-3 permission_raduo_btn_row">
			                				<div class="col-xl-12">
			                					<h3 class="coman_design_block_small_title">Permission :-</h3>
			                				</div>
			                				<div class="col-xl-12">
						                		<div class="user_type_permission_block">
						                			<div class="row">
						                				<div class="col-xl-12">
						                					<h4 class="user_type_permission_block_heading">CRM</h4>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Lead :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Bulk Lead</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>	
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Enquery :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Leads</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">New Enquiry </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Enquiry List </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Pending Followup</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Overdue Followup</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">FAQ :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Add Faq</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">View Faq</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>		
						                			</div>
						                		</div>
						                		<div class="user_type_permission_block">
						                			<div class="row">
						                				<div class="col-xl-12">
						                					<h4 class="user_type_permission_block_heading">LMS</h4>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Demo :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title"> Add Demo</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title"> View Demo</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Job Application List :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Job Apply Application </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">View Stu Questions </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">View Company </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">View all jobs </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">View student applied on job </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">View Rapid Job </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Admission :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Seat Batch </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Seat Course </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Seat Assign </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                			</div>
						                		</div>
						                		<div class="user_type_permission_block">
						                			<div class="row">
						                				<div class="col-xl-12">
						                					<h4 class="user_type_permission_block_heading">COMMON</h4>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Dashboard :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Take Attendance </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Course Details :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title"> Course Details</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Form :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Form </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Property : </label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Place Type</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Property Type</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Property List</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Add Complain</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">View All Complain</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Add Complain New</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Hardware :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Hardware Form </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Hardware Show </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Terms & Conditions :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Tc Form </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Tc Show</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Task : </label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Group Create </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Create Task</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Shows Task</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                			</div>
						                		</div>
						                		<div class="user_type_permission_block">
						                			<div class="row">
						                				<div class="col-xl-12">
						                					<h4 class="user_type_permission_block_heading">REPORTS</h4>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Analysis :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Today Report </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Last 6 Months </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title"> Current Month</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title"> Faculty Wise performance</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">  Cancel Demo Reason wise</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Report :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Demo Report </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                			</div>
						                		</div>
						                		<div class="user_type_permission_block">
						                			<div class="row">
						                				<div class="col-xl-12">
						                					<h4 class="user_type_permission_block_heading">HELP</h4>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Complain :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">AddComplain New </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">View All Complain </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                			</div>
						                		</div>
						                		<div class="user_type_permission_block">
						                			<div class="row">
						                				<div class="col-xl-12">
						                					<h4 class="user_type_permission_block_heading">Permissions</h4>
						                				</div>
						                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
						                					<div class="radio_box_block">
						                						<label class="radio_btn_top_title">Permissions :</label>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Permission All </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">User Permission </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Faculty Permission </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Hod Permission </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Branch Create </label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Department</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Sub Department</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">User</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">HOD</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                						<div class="form-group">
						                							<label class="radio_btn_title">Faculty</label>
						                							<span>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">Yes</label>
						                								</div>
						                								<div class="form-check form-check-inline">
						                									<label><input type="radio" name="ok">No</label>
						                								</div>
						                							</span>
						                						</div>
						                					</div>
						                				</div>
						                			</div>
						                		</div>
			                				</div>
			                				<div class="col-xl-12 text-center mt-3">
			                					<button type="button" class="btn btn-primary">Save</button>
			                				</div>
			                			</div>
			                		</form>
			                	</div>
			                </div>
			            </div>
                        <div class="card">
                            <div class="card-header mb-0">
                                <h2 class="mb-0">
            						<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_2" aria-expanded="false">
            							Display User<span class="d-inline-block float-right pluse_icon">✕</span>
            						</button>
            					</h2>
                            </div>
                            <div id="student_filter_panel_2" class="collapse" data-parent="#student_list_aoc" style="">
                            	<div class="coman_design_block_box">
                            		<div class="coman_design_block_title d-inline-block w-100 border-bottom">
                            			<h4 class="d-inline-block align-middle">Display User</h4>
                            		</div>
                            		<div class="table_search_panel d-inline-block w-100">
                            			<div class="col-xl-4 mx-auto">
                            				<div class="btn-group w-100">
                            					<input type="text" name="" placeholder="Search Here" class="form-control">
                            					<button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            				</div>
                            			</div>
                            		</div>
                            		<div class="coman_design_block_info">
                            			<div class="row">
                            				<div class="col-xl-12">
                            					<div class="table-responsive">
                            						<table class="table table-bordered table-striped create_responsive_table">
                            							<tr class="thead">
                            								<th>Logtype</th>
                            								<th>Name</th>
                            								<th>Branch</th>
                            								<th>Department</th>
                            								<th>Last Seen</th>
                            								<th>Action</th>
                            							</tr>
                            							<tr>
                            								<td data-heading="Logtype">Accountant</td>
                            								<td data-heading="Name">
                            									<ul>
                            										<li>Name : YC Admission</li>
                            										<li>Email : rnwycadmission@rnwmultimedia.com</li>
                            									</ul>
                            								</td>
                            								<td data-heading="Branch">
                            									<ul>
                            										<li>YOGI CHOWK</li>
                            										<li>INTERNATIONAL</li>
                            									</ul>
                            								</td>
                            								<td data-heading="Department">
                            									<ul>
                            										<li>COMPUTER</li>
                            										<li>FASHION</li>
                            										<li>INTERIOR</li>
                            										<li>INTERNATIONAL</li>
                            									</ul>
                            								</td>
                            								<td data-heading="Last Seen">2020-04-28 05:03:17</td>
                            								<td data-heading="Action">
                            									<ul class="action_icon_block">
                            										<li>
                            											<a href="#" class="action_icon action_edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                            										</li>
                            										<li>
                            											<a href="#" class="action_icon action_delete" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            										</li>
                            									</ul>
                            								</td>
                            							</tr>
                            						</table>
                            					</div>
                            				</div>
                            			</div>
                            			<div class="row">
                            				<div class="col-xl-12 text-center">
                            					<nav class="pagination_block">
                            					  <ul class="pagination justify-content-center">
                            					    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            					    <li class="page-item"><a class="page-link" href="#">1</a></li>
                            					    <li class="page-item"><a class="page-link" href="#">2</a></li>
                            					    <li class="page-item"><a class="page-link" href="#">3</a></li>
                            					    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            					  </ul>
                            					</nav>
                            				</div>
                            			</div>
                            		</div>
                            	</div>
                            </div>
                        </div>
			        </div>
			    </div>
			</div>
		</div>
	</section>
</main>
<div class="modal fade" id="logtype_create">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <from class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Logtype</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                	<div class="col-xl-6 col-lg-6 col-md-6">
                		<div class="form-group">
                			<label>State:</label>
                			<select class="form-control">
                				<option>Select State</option>
                				<option value="1">Andhra Pradesh</option>
							    <option value="2">Arunachal Pradesh</option>
							    <option value="3">Assam</option>
							    <option value="4">Bihar</option>
							    <option value="5">Chhattisgarh</option>
							    <option value="6">Goa</option>
							    <option value="7">Gujarat</option>
							    <option value="8">Haryana</option>
							    <option value="9">Himachal Pradesh</option>
							    <option value="10">Jammu &amp; Kashmir</option>
							    <option value="11">Jharkhand</option>
							    <option value="12">Karnataka</option>
							    <option value="13">Kerala</option>
							    <option value="14">Madhya Pradesh</option>
							    <option value="15">Maharashtra</option>
							    <option value="16">Manipur</option>
                			</select>
                		</div>
                	</div>
                	<div class="col-xl-6 col-lg-6 col-md-6">
                		<div class="form-group">
            			<label>City : </label>
                			<select class="form-control">
                				<option>Select Cite</option>
                				<option value="1">Surat</option>
                				<option value="1">Rajkot</option>
                				<option value="1">Vadodra</option>
                			</select>
                		</div>
                	</div>
        	    	<div class="col-xl-6 col-lg-6 col-md-6">
        	    		<div class="form-group">
        	    		    <label for="email">Log Type:</label>
        	    		    <select class="form-control" name="parent_id">
        	    		        <option value="0">Select Parent Logtype</option>
        	    		        <option value="1">Admin</option>
        	    		        <option value="2">Manager</option>
        	    		        <option value="3">Counselor </option>
        	    		        <option value="4">Access Document</option>
        	    		        <option value="5">Access Property</option>
        	    		        <option value="6">Accountant</option>
        	    		        <option value="7">Telecaller</option>
        	    		        <option value="8">Receptionist</option>
        	    		        <option value="9">Progress Report Checker</option>
        	    		        <option value="10">Center Head</option>
        	    		        <option value="11">HOD</option>
        	    		        <option value="12">Counselor_test</option>
        	    		        <option value="13">Faculty</option>
        	    		    </select>
        	    		</div>
        	    	</div>
        	    	<div class="col-xl-6 col-lg-6 col-md-6">
        	    		<div class="form-group">
        	    		    <label>Log Type:</label>
        	    		  	<input type="text" name="" class="form-control" placeholder="Enter Log Type">
        	    		</div>
        	    	</div>
                </div>
    			<div class="row mt-3 permission_raduo_btn_row">
    				<div class="col-xl-12">
    					<h3 class="coman_design_block_small_title">Permission :-</h3>
    				</div>
    				<div class="col-xl-12">
                		<div class="user_type_permission_block">
                			<div class="row">
                				<div class="col-xl-12">
                					<h4 class="user_type_permission_block_heading">CRM</h4>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Lead :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Bulk Lead</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>	
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Enquery :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Leads</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">New Enquiry </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Enquiry List </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Pending Followup</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Overdue Followup</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">FAQ :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Add Faq</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">View Faq</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>		
                			</div>
                		</div>
                		<div class="user_type_permission_block">
                			<div class="row">
                				<div class="col-xl-12">
                					<h4 class="user_type_permission_block_heading">LMS</h4>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Demo :</label>
                						<div class="form-group">
                							<label class="radio_btn_title"> Add Demo</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title"> View Demo</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Job Application List :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Job Apply Application </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">View Stu Questions </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">View Company </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">View all jobs </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">View student applied on job </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">View Rapid Job </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Admission :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Seat Batch </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Seat Course </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Seat Assign </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>
                		<div class="user_type_permission_block">
                			<div class="row">
                				<div class="col-xl-12">
                					<h4 class="user_type_permission_block_heading">COMMON</h4>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Dashboard :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Take Attendance </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Course Details :</label>
                						<div class="form-group">
                							<label class="radio_btn_title"> Course Details</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Form :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Form </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Property : </label>
                						<div class="form-group">
                							<label class="radio_btn_title">Place Type</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Property Type</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Property List</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Add Complain</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">View All Complain</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Add Complain New</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Hardware :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Hardware Form </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Hardware Show </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Terms & Conditions :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Tc Form </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Tc Show</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Task : </label>
                						<div class="form-group">
                							<label class="radio_btn_title">Group Create </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Create Task</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Shows Task</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>
                		<div class="user_type_permission_block">
                			<div class="row">
                				<div class="col-xl-12">
                					<h4 class="user_type_permission_block_heading">REPORTS</h4>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Analysis :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Today Report </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Last 6 Months </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title"> Current Month</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title"> Faculty Wise performance</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">  Cancel Demo Reason wise</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Report :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Demo Report </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>
                		<div class="user_type_permission_block">
                			<div class="row">
                				<div class="col-xl-12">
                					<h4 class="user_type_permission_block_heading">HELP</h4>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Complain :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">AddComplain New </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">View All Complain </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>
                		<div class="user_type_permission_block">
                			<div class="row">
                				<div class="col-xl-12">
                					<h4 class="user_type_permission_block_heading">Permissions</h4>
                				</div>
                				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                					<div class="radio_box_block">
                						<label class="radio_btn_top_title">Permissions :</label>
                						<div class="form-group">
                							<label class="radio_btn_title">Permission All </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">User Permission </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Faculty Permission </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Hod Permission </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Branch Create </label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Department</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Sub Department</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">User</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">HOD</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                						<div class="form-group">
                							<label class="radio_btn_title">Faculty</label>
                							<span>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">Yes</label>
                								</div>
                								<div class="form-check form-check-inline">
                									<label><input type="radio" name="ok">No</label>
                								</div>
                							</span>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>
    				</div>
    				<div class="col-xl-12 text-center mt-3">
    					<button type="button" class="btn btn-primary">Save</button>
    				</div>
    			</div>
                <div class="table-responsive mt-3">
                	<table class="table table-striped create_responsive_table table-bordered"> 
                		<tr class="thead">
                			<th>Logtype	</th>
                			<th>Status</th>
                			<th>Hirachiy</th>
                			<th>Action</th>
                		</tr>
                		<tr>
                			<td data-heading="Logtype">Admin</td>
                			<td data-heading="Status" class="text-active">Active</td>
                			<td data-heading="Hirachiy">Hirachiy 1</td>
                			<td data-heading="Action">
                				<ul class="action_icon_block">
									<li>
										<a href="#" class="action_icon action_edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
									</li>
									<li>
										<a href="#" class="action_icon action_delete" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
									</li>
									<li>
										<a href="#" class="action_icon action_disable" data-toggle="tooltip" title="Disable"><i class="fas fa-ban"></i></a>
									</li>
								</ul>
                			</td>
                		</tr>
                	</table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </from>
    </div>
</div>


<?php include('footer.php'); ?>