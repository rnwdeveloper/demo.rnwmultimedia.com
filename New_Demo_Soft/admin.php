<?php include('header.php'); ?>

<main class="main_content d-inline-block">
	<section class="page_title_block d-inline-block w-100 position-relative pb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="page_heading">
						<h1>Admin</h1>
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
										Create Admin <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
			                </div>
			                <div id="student_filter_panel_1" class="collapse show" data-parent="#student_list_aoc" style="">
			                	<div class="coman_design_block_box">
			                		<div class="coman_design_block_title d-inline-block w-100 border-bottom">
			                			<h4 class="d-inline-block align-middle">Create Admin</h4>
			                			<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#logtype_create">Create Logtype</button>
			                		</div>
			                		<form class="coman_design_block_info">
			                			<div class="row">
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
			                					    <label for="pwd">State:</label>
			                					    <select class="form-control" name="state_id" id="state_id">
			                					        <option value="0">select state</option>
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
			                					        <option value="17">Meghalaya</option>
			                					        <option value="18">Mizoram</option>
			                					        <option value="19">Nagaland</option>
			                					        <option value="20">Odisha</option>
			                					        <option value="21">Punjab</option>
			                					        <option value="22">Rajasthan</option>
			                					        <option value="23">Sikkim</option>
			                					        <option value="24">Tamil Nadu</option>
			                					        <option value="25">Tripura</option>
			                					        <option value="26">Uttarakhand</option>
			                					        <option value="27">Uttar Pradesh</option>
			                					        <option value="28">West Bengal</option>
			                					        <option value="29">Andaman &amp; Nicobar</option>
			                					        <option value="30">Chandigarh</option>
			                					        <option value="31">Dadra and Nagar Haveli</option>
			                					        <option value="32">Daman &amp; Diu</option>
			                					        <option value="33">Delhi</option>
			                					        <option value="34">Lakshadweep</option>
			                					        <option value="35">Puducherry</option>
			                					    </select>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">City:</label>
			                					    <select class="form-control" name="city_id" id="city_id">
			                					        <option value="0">select city</option>
			                					        <option value="0">Surat</option>
			                					        <option value="0">Ahamdabad</option>
			                					    </select>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">Name:</label>
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
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">Company Name:</label>
			                					    <input class="form-control" value="" type="text" name="company_name" placeholder="Enter Company Name" required="">
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">Company Code:</label>
			                					    <input type="text" class="form-control" value="" name="company_code" placeholder="Enter Company Code" required="">
			                					</div>
			                				</div>
			                			</div>
			                			<div class="row mt-3 permission_raduo_btn_row">
			                				<div class="col-xl-12">
			                					<h3 class="coman_design_block_small_title">Permission :-</h3>
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
			                						<label class="radio_btn_top_title">Settings :</label>
			                						<div class="form-group">
			                							<label class="radio_btn_title">Single Course </label>
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
			                						<div class="form-group">
			                							<label class="radio_btn_title">Course Package </label>
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
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Job Application List :</label>
			                						<div class="form-group">
			                							<label class="radio_btn_title">Job Application </label>
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
			                						<label class="radio_btn_top_title">Other :</label>
			                						<div class="form-group">
			                							<label class="radio_btn_title">Discard</label>
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
			                							<label class="radio_btn_title">Edit</label>
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
			                				<div class="col-xl-12 text-center">
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
                            								<th>State</th>
                            								<th>City</th>
                            								<th>Satus</th>
                            								<th>Last Seen</th>
                            								<th>Action</th>
                            							</tr>
                            							<tr>
                            								<td data-heading="Logtype">Admin</td>
                            								<td data-heading="Name">
                            									<ul>
                            										<li>Name : ayush</li>
                            										<li>Email : ayush.donga@gmail.com</li>
                            										<li>company Name : Red & White</li>
                            										<li>company Code : rnw1	</li>
                            									</ul>
                            								</td>
                            								<td data-heading="State">Gujarat</td>
                            								<td data-heading="City">Surat</td>
                            								<td data-heading="Satus"><span class="text-active">Active</span></td>
                            								<td data-heading="Last Seen">2020-04-28 05:03:17</td>
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
                            							<tr>
                            								<td data-heading="Logtype">Admin</td>
                            								<td data-heading="Name">
                            									<ul>
                            										<li>Name : ayush</li>
                            										<li>Email : ayush.donga@gmail.com</li>
                            										<li>company Name : Red & White</li>
                            										<li>company Code : rnw1	</li>
                            									</ul>
                            								</td>
                            								<td data-heading="State">Gujarat</td>
                            								<td data-heading="City">Surat</td>
                            								<td data-heading="Satus"><span class="text-active">Active</span></td>
                            								<td data-heading="Last Seen">2020-04-28 05:03:17</td>
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
                            							<tr>
                            								<td data-heading="Logtype">Admin</td>
                            								<td data-heading="Name">
                            									<ul>
                            										<li>Name : ayush</li>
                            										<li>Email : ayush.donga@gmail.com</li>
                            										<li>company Name : Red & White</li>
                            										<li>company Code : rnw1	</li>
                            									</ul>
                            								</td>
                            								<td data-heading="State">Gujarat</td>
                            								<td data-heading="City">Surat</td>
                            								<td data-heading="Satus"><span class="text-active">Active</span></td>
                            								<td data-heading="Last Seen">2020-04-28 05:03:17</td>
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
                <div class="form-group">
                    <label>Log Type:</label>
                  	<div class="btn-group w-100">
                  		<input type="text" name="" class="form-control" placeholder="Enter Log Type">
                  		<button type="button" class="btn btn-primary">Save</button>
                  	</div>
                </div>
                <div class="table-responsive">
                	<table class="table table-striped create_responsive_table table-bordered"> 
                		<tr class="thead">
                			<th>Logtype	</th>
                			<th>Status</th>
                			<th>Action</th>
                		</tr>
                		<tr>
                			<td data-heading="Logtype">Admin</td>
                			<td data-heading="Status" class="text-active">Active</td>
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
                		<tr>
                			<td data-heading="Logtype">Admin</td>
                			<td data-heading="Status" class="text-active">Active</td>
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
                		<tr>
                			<td data-heading="Logtype">Admin</td>
                			<td data-heading="Status" class="text-active">Active</td>
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