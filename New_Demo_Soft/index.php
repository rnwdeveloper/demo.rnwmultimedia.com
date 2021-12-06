<?php include('header.php'); ?>

<main class="main_content d-inline-block">
	<section class="page_title_block d-inline-block w-100 position-relative pb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="page_heading">
						<h1>Dashboard</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="filter_ratio d-inline-block w-100 position-relative pb-0">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-xl-4 col-lg-4 col-md-6 col-6">
					<button type="button" data-toggle="modal" data-target="#graph_block_modal" class="btn btn-info btn-block text-left filter_modal_btn">Filter Ratio <span class="d-inline-block float-right"><i class="fas fa-search"></i></span></button>
					<div class="modal fade" id="graph_block_modal">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Filter Ratio</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="graph_block_sec d-inline-block w-100 position-relative">
										<div class="row">
											<div class="col-lg-4 col-md-12">
												<div class="graph_box_block">
													<form>
														<div class="graph_box_block_1_form">
															<div class="btn-group w-100">
																<select class="form-control">
																	<option>Select Branch</option>
																	<option>YOGI CHOWK</option>
																</select>
																<button type="button" class="btn btn-success">Filter</button>
																<button type="button" class="btn btn-danger">Reset</button>
															</div>
														</div>
													</form>
													<span class="total_demo_count">Total Demo : 0</span>
												</div>
											</div>
											<div class="col-lg-4 col-md-12">
												<div class="graph_box_block">

													<span class="total_demo_count">Total Demo : 0</span>
												</div>
											</div>
											<div class="col-lg-4 col-md-12 mx-auto">
												<div class="graph_box_block">

													<span class="total_demo_count">Total Demo : 0</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-6">
					<button type="button" data-toggle="modal" data-target="#search_block" class="btn btn-info btn-block text-left filter_modal_btn">Filter Demo<span class="d-inline-block float-right"><i class="fas fa-search"></i></span></button>
					<div class="modal fade" id="search_block">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Filter Ratio</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="search_block d-inline-block w-100">
										<form class="col-lg-12">
											<div class="row">
												<div class="col-xl-3 col-lg-6">
													<div class="form-group">
														<select class="form-control">
															<option>Select Branch</option>
															<option>YOGI CHOWK</option>
														</select>
													</div>
												</div>
												<div class="col-xl-3 col-lg-6">
													<div class="form-group">
														<select class="form-control">
															<option>Department</option>
															<option>COMPUTER</option>
														</select>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6">
													<div class="form-group">
														<select class="form-control">
															<option>Select Course</option>
															<option>C </option>
															<option>CCC</option>
															<option>COREL DRAW</option>
															<option>PHOTOSHOP BASICS</option>
														</select>
													</div>
												</div>
												<div class="col-xl-5 col-lg-6">
													<div class="form-group">
														<select class="form-control">
															<option>Faculty</option>
															<option>NIRBHAY VIRANI-  COMPUTER  -  YOGI CHOWK</option>
															<option>MEHUL CHOPADA-  COMPUTER  -  AK ROAD & SARTHANA</option>
															<option>Jinkal Kalthiya-  COMPUTER  -  AK ROAD</option>
															<option>PIYUSH NAKRANI-  COMPUTER  -  YOGI CHOWK</option>
															<option>PIYUSH NAKRANI-  COMPUTER  -  YOGI CHOWK</option>
														</select>
													</div>
												</div>
												<div class="col-xl-3 col-lg-4">
													<div class="form-group">
														<input type="texs" name="sname" placeholder="Student Name" class="form-control">
													</div>
												</div>
												<div class="col-lg-3 col-lg-4">
													<div class="form-group">
														<input type="text" class="form-control" name="filter_demoId" placeholder="Demo ID ">
													</div>
												</div>
												<div class="col-xl-4 col-lg-4">
													<div class="form-group">
														<input type="phone" class="form-control" value="" id="" name="filter_phoneNo" placeholder="Filter Phone No">
													</div>
												</div>
												<div class="col-xl-3 col-lg-4">
													<div class="form-group">
														<input type="text" class="form-control" value="" id="datepicker" name="filter_demoDate_start" placeholder="Start Date" autocomplete="off">
													</div>
												</div>
												<div class="col-xl-3 col-lg-4">
													<div class="form-group">
														<input type="text" class="form-control datepicker-switch" data-provide="datepicker" value="" id="datepicker" name="filter_demoDate_end" placeholder="End Date" autocomplete="off">
													</div>
												</div>
												<div class="col-xl-2 col-lg-4">
													<div class="btn-group">
														<button type="button" class="btn btn-success">Filter</button>
														<button type="button" class="btn btn-danger">Reset</button>
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
		</div>
	</section>
	<section class="all_demo_student_block d-inline-block w-100 position-relative pb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="accordion" id="student_list_aoc">
						<div class="card">
							<div class="card-header mb-0">
								<h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_1">
										6 To 7 Timing Demo Students  <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
							</div>
							<div id="student_filter_panel_1" class="collapse" data-parent="#student_list_aoc">
								<div class="card-body">
									<div class="take_demo_panel_group">
										<div class="take_demo_panel">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
														<div class="take_demo_panel_heading">
															<p class="student_name" title="Mobile No : 8866463161" data-toggle="tooltip"> hardik jina bhai jinjala (5239)</p>
															<p>corel draw</p>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<select>
															<option value="0">Running</option>
															<option value="1">Done</option>
															<option value="2">Leave</option>
															<option value="3">Cancel</option>
															<option value="4">Confusion</option>
														</select>
														<p class="demo_date">Start Date : 19-03-2020</p>
													</div>
													<div class="col-xl-4 col-lg-2 col-md-2 col-sm-2 text-lg-center text-sm-center">
														<a href="javascript void(0)" class="demo_details_btn align-bottom" data-toggle="modal" data-target="#student_datails_modal">
															<i class="fa fa-eye"></i>
														</a>
														<button type="button" class="btn btn-primary alert_green border-0 btn-sm mt-lg-1 mt-sm-1">Submit</button>
													</div>
													<div class="col-lg-12">
														<div class="progress my-2" style="height: 3px;"></div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="student_status student_status_new d-inline-block p-1">New Demo Student</p>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="demo_time"> Time : 6:00 PM To 7:00 PM </p>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="demo_student_faculty">Assign To : VRAJESH RANK</p>
													</div>
												</div>
											</div>
										</div>
										<div class="take_demo_panel">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
														<div class="take_demo_panel_heading">
															<p class="student_name" title="Mobile No : 8866463161" data-toggle="tooltip"> hardik jina bhai jinjala (5239)</p>
															<p>corel draw</p>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<select>
															<option value="0">Running</option>
															<option value="1">Done</option>
															<option value="2">Leave</option>
															<option value="3">Cancel</option>
															<option value="4">Confusion</option>
														</select>
														<p class="demo_date">Start Date : 19-03-2020</p>
													</div>
													<div class="col-xl-4 col-lg-2 col-md-2 col-sm-2 text-lg-center text-sm-center">
														<a href="javascript void(0)" class="demo_details_btn align-bottom" data-toggle="modal" data-target="#student_datails_modal">
															<i class="fa fa-eye"></i>
														</a>
														<button type="button" class="btn btn-primary alert_green border-0 btn-sm mt-lg-1 mt-sm-1">Submit</button>
													</div>
													<div class="col-lg-12">
														<div class="progress my-2" style="height: 3px;"></div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="student_status student_status_new d-inline-block p-1">New Demo Student</p>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="demo_time"> Time : 6:00 PM To 7:00 PM </p>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="demo_student_faculty">Assign To : VRAJESH RANK</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header mb-0">
								<h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_2">
										7 To 8 Timing Demo Students  <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
							</div>
							<div id="student_filter_panel_2" class="collapse" data-parent="#student_list_aoc">
								<div class="card-body">

								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header mb-0">
								<h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_3">
										8 To 9 Timing Demo Students  <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
							</div>
							<div id="student_filter_panel_3" class="collapse" data-parent="#student_list_aoc">
								<div class="card-body">
									<div class="take_demo_panel_group">
										<div class="take_demo_panel">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
														<div class="take_demo_panel_heading">
															<p class="student_name" title="Mobile No : 8866463161" data-toggle="tooltip"> hardik jina bhai jinjala (5239)</p>
															<p>corel draw</p>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<select>
															<option value="0">Running</option>
															<option value="1">Done</option>
															<option value="2">Leave</option>
															<option value="3">Cancel</option>
															<option value="4">Confusion</option>
														</select>
														<p class="demo_date">Start Date : 19-03-2020</p>
													</div>
													<div class="col-xl-4 col-lg-2 col-md-2 col-sm-2 text-lg-center text-sm-center">
														<a href="javascript void(0)" class="demo_details_btn align-bottom" data-toggle="modal" data-target="#student_datails_modal">
															<i class="fa fa-eye"></i>
														</a>
														<button type="button" class="btn btn-primary alert_green border-0 btn-sm mt-lg-1 mt-sm-1">Submit</button>
													</div>
													<div class="col-lg-12">
														<div class="progress my-2" style="height: 3px;"></div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="student_status student_status_new d-inline-block p-1">New Demo Student</p>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="demo_time"> Time : 6:00 PM To 7:00 PM </p>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="demo_student_faculty">Assign To : VRAJESH RANK</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header mb-0">
								<h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_4">
										7 To 8 Timing Demo Students  <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
							</div>
							<div id="student_filter_panel_4" class="collapse" data-parent="#student_list_aoc">
								<div class="card-body">
									<div class="take_demo_panel_group">
										<div class="take_demo_panel">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
														<div class="take_demo_panel_heading">
															<p class="student_name" title="Mobile No : 8866463161" data-toggle="tooltip"> hardik jina bhai jinjala (5239)</p>
															<p>corel draw</p>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<select>
															<option value="0">Running</option>
															<option value="1">Done</option>
															<option value="2">Leave</option>
															<option value="3">Cancel</option>
															<option value="4">Confusion</option>
														</select>
														<p class="demo_date">Start Date : 19-03-2020</p>
													</div>
													<div class="col-xl-4 col-lg-2 col-md-2 col-sm-2 text-lg-center text-sm-center">
														<a href="javascript void(0)" class="demo_details_btn align-bottom" data-toggle="modal" data-target="#student_datails_modal">
															<i class="fa fa-eye"></i>
														</a>
														<button type="button" class="btn btn-primary alert_green border-0 btn-sm mt-lg-1 mt-sm-1">Submit</button>
													</div>
													<div class="col-lg-12">
														<div class="progress my-2" style="height: 3px;"></div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="student_status student_status_new d-inline-block p-1">New Demo Student</p>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="demo_time"> Time : 6:00 PM To 7:00 PM </p>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
														<p class="demo_student_faculty">Assign To : VRAJESH RANK</p>
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
			</div>
		</div>
	</section>
	<section class="take_demo_sec d-inline-block w-100 position-relative">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="take_demo_heading">
						<h3>Take Demo Attendance</h3>
					</div>
					<div class="take_demo_panel_group">
						<div class="take_demo_panel">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
										<div class="take_demo_panel_heading">
											<p class="student_name" title="Mobile No : 8866463161" data-toggle="tooltip"> hardik jina bhai jinjala (5239)</p>
											<p>corel draw</p>
										</div>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
										<select>
											<option value="0">Running</option>
											<option value="1">Done</option>
											<option value="2">Leave</option>
											<option value="3">Cancel</option>
											<option value="4">Confusion</option>
										</select>
										<p class="demo_date">Start Date : 19-03-2020</p>
									</div>
									<div class="col-xl-4 col-lg-2 col-md-2 col-sm-2 text-lg-center text-sm-center">
										<a href="javascript void(0)" class="demo_details_btn align-bottom" data-toggle="modal" data-target="#student_datails_modal">
											<i class="fa fa-eye"></i>
										</a>
										<button type="button" class="btn btn-primary alert_green border-0 btn-sm mt-lg-1 mt-sm-1">Submit</button>
									</div>
									<div class="col-lg-12">
										<div class="progress my-2" style="height: 3px;"></div>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
										<p class="student_status student_status_new d-inline-block p-1">New Demo Student</p>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
										<p class="demo_time"> Time : 6:00 PM To 7:00 PM </p>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
										<p class="demo_student_faculty">Assign To : VRAJESH RANK</p>
									</div>
								</div>
							</div>
						</div>
						<div class="take_demo_panel">
							<div class="col-lg-12">
								<div class="row align-items-center">
									<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
										<div class="take_demo_panel_heading">
											<p class="student_name" title="Mobile No : 8866463161" data-toggle="tooltip"> KALTHIYA AVNIKA (5238)</p>
											<p>ccc</p>
										</div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
										<select>
											<option value="0">Running</option>
											<option value="1">Done</option>
											<option value="2">Leave</option>
											<option value="3">Cancel</option>
											<option value="4">Confusion</option>
										</select>
										<p class="demo_date">Start Date : 19-03-2020</p>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
										<ul>
										    <li class="d-inline-block mr-3 mr-mr-0">
										    	<div class="form-check form-check-inline">
										    	    <input class="form-check-input" type="radio" name="one" id="chake1">
										    	    <label class="form-check-label" for="chake1">P</label>
										    	</div>
										    	<div class="form-check form-check-inline">
										    	    <input class="form-check-input" type="radio" id="chake2" name="one">
										    	    <label class="form-check-label" for="chake2">A</label>
										    	</div>
										    </li>
										    <li class="d-inline-block">
										    	<p class="curent_date">2020-04-30</p>
										    </li>
										</ul>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6	 text-lg-center text-sm-center">
										<a href="javascript void(0)" class="demo_details_btn align-bottom" data-toggle="modal" data-target="#student_datails_modal">
											<i class="fa fa-eye"></i>
										</a>
										<button type="button" class="btn btn-primary alert_green border-0 btn-sm mt-lg-1 mt-sm-1">Submit</button>
									</div>
									<div class="col-lg-12">
										<div class="progress my-2" style="height: 3px;"></div>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
										<a href="#demo_attendance_modal" class="student_status student_status_running d-inline-block p-1" data-toggle="modal">Attendance & follow up</a>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
										<p class="demo_time"> Time : 6:00 PM To 7:00 PM </p>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
										<p class="demo_student_faculty">Assign To : VRAJESH RANK</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="alert_bar d-inline-block w-100 position-relative">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert_bar_block">
						<div class="row">
							<div class="col-xl-3 col-lg-3 col-6 student_alert_bar alert_yellow">
								Attendance Pending
							</div>
							<div class="col-xl-2 col-2 student_alert_bar alert_green">
								P
							</div>
							<div class="col-xl-2 col-2 student_alert_bar alert_red">
								A
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="new_lead_genered_btn">
		<a href="javascript:void(0)" class="create_new_lead"><i class="fas fa-plus"></i></a>
	</div>

	
</main>



<div class="filter_ratio">
	<div class="modal fade" id="student_datails_modal">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Demo Details</h5>
					<div class="btn-group">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#edit_demo_show">Edia Demo </button>
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#demo_discard">Discard</button>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<div class="modal-body">
					<div class="demo_student_datails_block d-inline-block position-relative w-100">
						<div class="demo_details_block collapse" id="edit_demo_show">
							<div class="edit_demo_block d-inline-block w-100 position-relative border">
								<div class="row">
									<div class="col-lg-12">
										<div class="demo_edit_title">
											<span>Edit Demo</span>
										</div>
									</div>
									<div class="col-xl-12">
										<div class="row demo_edit_info">
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<input type="text" name="" placeholder="Student Name" class="form-control">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<input type="text" name="" placeholder="Student Phone Number" class="form-control">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<input type="text" name="" placeholder="Date" data-provide="datepicker" class="form-control">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<select class="form-control" required="" name="branch_id">
													    <option value="">select Branch</option>
													    <option value="1"> AK ROAD</option>
													    <option value="3"> MOTA VARACHHA</option>
													    <option value="5"> YOGI CHOWK</option>
													    <option selected="" value="8"> SARTHANA</option>
													    <option value="9"> AK ROAD-RW1B</option>
													    <option value="10"> INTERNATIONAL</option>
													    <option value="11"> RNWCOLLAGE</option>
													    <option value="15"> AK Road</option>
													</select>
												</div>
											</div>
											<div class="col-xl-12">
												<div class="form-group">
												    <label>Course Type:- &nbsp;&nbsp;&nbsp;</label>
												    <div class="form-check form-check-inline">
												        <input class="form-check-input" type="radio" name="one" id="chake3">
												        <label class="form-check-label" for="chake3">Regular Courses</label>
												    </div>
												    <div class="form-check form-check-inline">
												        <input class="form-check-input" type="radio" id="chake4" name="one">
												        <label class="form-check-label" for="chake4">Courses Packages</label>
												    </div>
												</div>
											</div>
											<div class="col-lg-12 regular_courses"> 
												<div class="row justify-content-start">
													<div class="col-xl-4 col-lg-6 col-md-6">
														<div class="form-group">
															<label>Course Pkg Category:* </label>
															<select class="form-control" name="department" id="demo_category">
															    <option value="">Select Pkg Category</option>
															    <option selected="" value="1">COMPUTER</option>
															    <option value="2">FASHION</option>
															    <option value="4">INTERIOR</option>
															    <option value="8">INTERNATIONAL</option>
															    <option value="9">COLLEGE</option>
															    <option value="11">computer</option>
															    <option value="12"> fashion</option>
															    <option value="13">design</option>
															    <option value="14"> int</option>
															    <option value="15">test</option>
															    <option value="16"> test2</option>
															</select>
														</div>
													</div>
													<div class="col-xl-4 col-lg-6 col-md-6">
														<div class="form-group">
															<label>Course:* </label>
															<select class="form-control" name="department" id="demo_category">
															    <option value="">Select Pkg Category</option>
															    <option selected="" value="1">COMPUTER</option>
															    <option value="2">FASHION</option>
															    <option value="4">INTERIOR</option>
															    <option value="8">INTERNATIONAL</option>
															    <option value="9">COLLEGE</option>
															    <option value="11">computer</option>
															    <option value="12"> fashion</option>
															    <option value="13">design</option>
															    <option value="14"> int</option>
															    <option value="15">test</option>
															    <option value="16"> test2</option>
															</select>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-12">
														<div class="form-group">
															<select class="form-control">
																<option>Faculty Name</option>
																<option>SAGAR VEKARIYA -   AK ROAD </option>
																<option>SAGAR VEKARIYA -   AK ROAD </option>
																<option>SAGAR VEKARIYA -   AK ROAD </option>
															</select>
														</div>
													</div>
													<div class="col-xl-3 col-lg-3 col-md-6">
														<div class="form-group">
															<input type="text" name="" placeholder="Time To" data-provide="timepicker" class="form-control">
														</div>
													</div>
													<div class="col-xl-3 col-lg-3 col-md-6">
														<div class="form-group">
															<input type="text" name="" placeholder="To End" data-provide="timepicker" class="form-control">
														</div>
													</div>
													<div class="col-xl-12 text-right">
														<div class="btn-group">
															<button type="button" class="btn btn-success">Update</button>
															<button type="button" class="btn btn-danger">Cancel</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="demo_details_block border-bottom mt-3">
							<div class="row">
								<div class="col-xl-12">
									<h3 class="demo_student_details_heading">Demo Details:</h3>
								</div>
								<div class="col-xl-5 col-lg-6 col-md-6  mx-auto">
									<ul class="demo_details_info_block">
										<li>Demo ID : <span class="student_demo_id badge">5236</span></li>
										<li>Name : <span>RAMANI CHINTAN RAJESHBHAI</span></li>
										<li>Mobile No : <span class="phone_num"><a href="javascript:void(0)">9664719764</a>
												<ul class="phone_num_data">
													<li><a href="tel:9664719764" data-toggle="tooltip" title="Call"><i class="fa fa-phone"></i></a> </li>
													<li><a href="#" data-toggle="tooltip" title="Copy"><i class="fa fa-clone"></i></a> </li>
													<li><a href="#" data-toggle="tooltip" title="Whatsapp"><i class="fa fa-whatsapp"></i></a> </li>
												</ul>
											</span>
										</li>
										<li>Demo Time : <span>6:00 PM TO 7:00 PM</span></li>
										<li>Total Attendance : 
											<ul>
												<li><span class="present">P: </span><span class="badge badge-success present-bage">1</span></li>
												<li><span class="present">A: </span><span class="badge badge-danger present-bage">1</span></li>		
											</ul>
										</li>
									</ul>
								</div>
								<div class="col-xl-5 col-lg-6 col-md-6  mx-auto">
									<ul class="demo_details_info_block">
										<li>Faculty Name : <span>KIRTIN GUJARATI</span></li>
										<li>Demo Stating Course : <span>PHOTOSHOP WEB</span></li>
										<li>Demo Course Package : <span>MASTER IN WEB FRONT END DESIGNING</span></li>
										<li>Demo Date : <span>2020-03-19</span></li>
										<li>Demo Status : <span class="demo_student_status demo_student_status_running  badge badge-danger">Running</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="demo_details_block mt-3">
							<div class="row">
								<div class="col-xl-11 mx-auto">
									<ul class="nav nav-tabs">
									  <li class="nav-item">
									    <a class="nav-link active" data-toggle="tab" href="#demo_ramark">Demo Remarks</a>
									  </li>
									  <li class="nav-item">
									    <a class="nav-link" data-toggle="tab" href="#demo_attendance">Demo Attendance Details</a>
									  </li>
									  <li class="nav-item">
									    <a class="nav-link" data-toggle="tab" href="#demo_follow_up">Demo follow up Details</a>
									  </li>
									</ul>
									<div class="tab-content" id="myTabContent">
									  <div class="tab-pane fade show active" id="demo_ramark">
									  	<div class="mb-3 d-inline-block w-100">
									  		<h3 class="demo_student_details_heading d-inline-block mb-0 align-sub">Demo Remark</h3>
									  		<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add_ramark">Add Remark</button>
									  	</div>
									  	<div class="table-responsive">
									  	  <table class="table table-bordered table-striped create_responsive_table">
									  	    <tr class="thead">
									  	    	<th>Remark Date And Time</th>
									  	    	<th>Comment</th>
									  	    	<th>By</th>
									  	    </tr>
									  	    <tr>
									  	    	<td data-heading="Remark Date And Time">2020-03-19 06:06:05pm</td>
									  	    	<td data-heading="Comment">Ref: Banner	</td>
									  	    	<td data-heading="By">Manisha</td>
									  	    </tr>
									  	    <tr>
									  	    	<td data-heading="Remark Date And Time">2020-03-19 06:07:29pm</td>
									  	    	<td data-heading="Comment">emne d.d sir j information api chhe job mate thi web designing learn krvanu chhe</td>
									  	    	<td data-heading="By">Hinal Savaliya</td>
									  	    </tr>
									  	  </table>
									  	</div>
									  </div>
									  <div class="tab-pane fade" id="demo_attendance">
									  	<div>
									  		<h3 class="demo_student_details_heading mb-3">Demo Attendance Details</h3>
									  	</div>
									  	<div class="table-responsive">
									  	  <table class="table table-bordered table-striped create_responsive_table">
									  	    <tr class="thead">
									  	    	<th>Date</th>
									  	    	<th>Attendance</th>
									  	    	<th>Mark by	</th>
									  	    	<th>Time</th>
									  	    </tr>
									  	    <tr>
									  	    	<td data-heading="Date">2020-03-19</td>
									  	    	<td data-heading="Attendance">P</td>
									  	    	<td data-heading="Mark By">Hinal Savaliya</td>
									  	    	<td data-heading="Time">2020-03-19 06:08:39 pm</td>
									  	    </tr>
									  	    <tr>
									  	    	<td data-heading="Date">2020-03-20</td>
									  	    	<td data-heading="Attendance">A</td>
									  	    	<td data-heading="Mark By">Hinal Savaliya</td>
									  	    	<td data-heading="Time">2020-03-20 05:15:31 pm</td>
									  	    </tr>
									  	  </table>
									  	</div>
									  </div>
									  <div class="tab-pane fade" id="demo_follow_up">
									  	<div class="table-responsive">
									  		<table class="table color-table table-bordered table-striped create_responsive_table">
								  		        <tr class="thead">
								  		            <th>Date</th>
								  		            <th>Follow Up</th>
								  		            <th>Follow By</th>
								  		            <th>Time</th>
								  		        </tr>
								  		        <tr>
								  		            <td data-heading="Date">2020-03-20</td>
								  		            <td data-heading="Follow Up">Demo Leave : 2020-03-20to2020-03-29 / 29-03 corona lidhe 29 thi avse </td>
								  		            <td data-heading="Follow By">Hinal Savaliya</td>
								  		            <td data-heading="Time">2020-03-20 05:15:31 pm</td>
								  		        </tr>
									  		</table>
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
	</div>
</div>
<div class="modal fade" id="add_ramark">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <from class="modal-content shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title">Add Remarks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
        	<label>Comment:</label>
        	<textarea placeholder="Add remark" class="form-control" rows="6"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </from>
  </div>
</div>
<div class="modal fade" id="demo_discard">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <from class="modal-content shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title">Discard Demo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      		<label>Student Response::</label>
      		<select class="form-control" name="enquiry_cancel_reason" required="">
      		    <option value="">Select Response</option>
      		    <option value="fees vadhare lage">fees vadhare lage</option>
      		    <option value="Time set nathi thato">Time set nathi thato</option>
      		    <option value="Call Not Receive ">Call Not Receive </option>
      		    <option value="Call Not Responding">Call Not Responding</option>
      		    <option value="Cut The Call">Cut The Call</option>
      		    <option value="Ringing Not Respond">Ringing Not Respond</option>
      		    <option value="Phone Disconnect">Phone Disconnect</option>
      		    <option value="Call Later">Call Later</option>
      		    <option value="On Holiday">On Holiday</option>
      		    <option value="Traveling">Traveling</option>
      		    <option value="Busy with Exams">Busy with Exams</option>
      		    <option value="Busy For Next Few Days">Busy For Next Few Days</option>
      		    <option value="Need Some Time to Decide ">Need Some Time to Decide </option>
      		    <option value="Want to Visit Institue">Want to Visit Institue</option>
      		    <option value="Need Discount">Need Discount</option>
      		    <option value="Went with another institute">Went with another institute</option>
      		    <option value="Cancelled plan for now">Cancelled plan for now</option>
      		    <option value="Change plan so, not interested">Change plan so, not interested</option>
      		    <option value="Not Interested Anymore">Not Interested Anymore</option>
      		    <option value="Transfer Branch">Transfer Branch</option>
      		    <option value="Not Take Any Demo">Not Take Any Demo</option>
      		    <option value="Distance Issue">Distance Issue</option>
      		    <option value="DUPLICATE">DUPLICATE</option>
      		    <option value="Went out of the city">Went out of the city</option>
      		    <option value="Got job so not interested">Got job so not interested</option>
      		</select>
      	</div>
        <div class="form-group">
        	<label>Reason/Comments:*:</label>
        	<textarea class="form-control" rows="6"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </from>
  </div>
</div>
<div class="filter_ratio">
	<div class="modal fade" id="demo_attendance_modal">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <from class="modal-content shadow-lg">
	      <div class="modal-header">
	        <h5 class="modal-title">Shubham</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="demo_student_attendance_details_block">
	      		<h3 class="demo_student_details_heading">Attendance Details</h3>
	      		<div class="table-responsive-sm">
	      		  <table class="table table-bordered table-striped create_responsive_table">
	      		    <tr class="thead">
	      		    	<th>Date</th>
	      		    	<th>Attendance</th>
	      		    	<th>Mark by	</th>
	      		    	<th>Time</th>
	      		    </tr>
	      		    <tr>
	      		    	<td data-heading="Date">2020-03-12</td>
	      		    	<td data-heading="Attendance">P</td>
	      		    	<td data-heading="Mark By">Radhi Sheladiya	</td>
	      		    	<td data-heading="Time">2020-03-12 05:51:06 pm</td>
	      		    </tr>
	      		  </table>
	      		</div>
	      	</div>
	      	<div class="demo_student_attendance_details_block">
	      		<h3 class="demo_student_details_heading">Follow Up Details</h3>
	      		<div class="table-responsive-sm">
	      		  <table class="table table-bordered table-striped create_responsive_table">
	      		    <tr class="thead">
	      		    	<th>Date</th>
	      		    	<th>Follow Up</th>
	      		    	<th>By</th>
	      		    	<th>Time</th>
	      		    </tr>
	      		    <tr>
	      		    	<td data-heading="Date">2020-03-12	</td>
	      		    	<td data-heading="Follow Up">kal thi ava na che	</td>
	      		    	<td data-heading="By">Radhi Sheladiya	</td>
	      		    	<td data-heading="Time">2020-03-17 05:16:31 pm</td>
	      		    </tr>
	      		    <tr>
	      		    	<td data-heading="Date">2020-03-12	</td>
	      		    	<td data-heading="Follow Up">Demo Leave : 2020-03-19to2020-04-01 / te bhai e tena father jode vat kari tene evu kidhu k aprill na start kare by-ankita	</td>
	      		    	<td data-heading="By">Radhi Sheladiya	</td>
	      		    	<td data-heading="Time">2020-03-17 05:16:31 pm</td>
	      		    </tr>
	      		  </table>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary">Save</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </from>
	  </div>
	</div>
</div>
<?php include('footer.php'); ?>





<div class="chat_block position-relative">
	<div class="chate_btn"><a href="javascript:void(0)" class="chate_btn_in"><i class="fas fa-envelope-open"></i></a></div>
	<div class="chate_box">
		<div class="card">
			<div class="card-header">
				Office<br>
				Please fill out the form below and we will get back to you as soon as possible.
			</div>
			<div class="card-body">
				<div class="">
					<div class="form-group">
						<input type="text" class="form-control" name="" placeholder="Name">
					</div>
					<div class="form-group">
						 <input type="text" class="form-control" name="" placeholder="Email">
					</div>
					<div class="form-group">
						<textarea placeholder="Message" class="form-control" rows="3"></textarea>
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<button type="button" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>