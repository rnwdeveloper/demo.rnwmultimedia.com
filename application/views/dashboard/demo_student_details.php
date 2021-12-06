

<div id="demo_update_record">
	
<div class="modal-header">
					<h5 class="modal-title">Demo Details</h5>
					<div class="btn-group">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#edit_demo_show">Edit Demo </button>
						<button type="button" class="btn btn-danger btn-sm" onclick="return discard_student_from_demo(<?php echo $demo_record->demo_id; ?>)">Discard</button>
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
									<input type="hidden" name="demo_id" id="demo_id" value="<?php if(!empty($demo_record->demo_id)) { echo $demo_record->demo_id; } ?>">
								
									<div class="col-xl-12">
										<div class="row demo_edit_info">
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<input type="text" name="name" id="name" placeholder="Student Name" class="form-control" value="<?php if(isset($demo_record->name)) { echo $demo_record->name; }?>">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<input type="text" name="mobileNo" id="mobileNo" placeholder="Student Phone Number" class="form-control"  value="<?php if(isset($demo_record->mobileNo)) { echo $demo_record->mobileNo; }?>">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<input type="text" name="date_selected" id="date_selected" placeholder="Date" data-provide="datepicker" class="form-control"  value="<?php if(isset($demo_record->demoDate)) { echo $demo_record->demoDate; }?>">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													
													<select class="form-control" required="" name="branch_id" id="branch_id">
													    <option value="">select Branch</option>
													    <?php foreach($branch as $br) { ?>
													    	<option value="<?php echo $br->branch_id; ?>" <?php if($br->branch_id == $demo_record->branch_id) { echo "selected"; } ?>><?php echo $br->branch_name; ?></option>
														<?php } ?>
													    
													</select>
												</div>
											</div>
											<div class="col-xl-12">
												<div class="form-group">
												    <label>Course Type:- &nbsp;&nbsp;&nbsp;</label>
												    <div class="form-check form-check-inline">
												        <input class="form-check-input"value="Single Course" type="radio" name="course_type" id="course_type" <?php if($demo_record->course_type=='Single Course'){ echo "checked"; } ?>>
												        <label class="form-check-label" for="chake3">Single Course</label>
												    </div>
												    <div class="form-check form-check-inline">
												        <input class="form-check-input"  value="Package" type="radio" id="course_type" name="course_type" <?php if($demo_record->course_type=='Package'){ echo "checked"; } ?>>
												        <label class="form-check-label" for="chake4">Package</label>
												    </div>
												</div>
											</div>
											<div class="col-lg-12 regular_courses"> 
												<div class="row justify-content-start">
													<div class="col-xl-4 col-lg-6 col-md-6">
														<div class="form-group">
															<label>Course Pkg Category:* </label>
															<select class="form-control" name="department" id="department" >
															    <option value="">Select Pkg Category</option>
															   <?php foreach($department as $dep) { ?>
															    	<option value="<?php echo $dep->department_id; ?>" <?php if($dep->department_id == $demo_record->department_id) { echo "selected"; } ?>><?php echo $dep->department_name; ?></option>
																<?php } ?>
															    															</select>
														</div>
													</div>
													<?php if($demo_record->course_type=="Single Course") { ?>    
														<div class="col-xl-4 col-lg-6 col-md-6">
															<div class="form-group">
																<label>Course:* </label>
																<select class="form-control" name="courseName" id="courseName">
																    <option value="">Select Pkg Category</option>
																    <?php foreach($course as $cou) { ?>
																    	<option value="<?php echo $cou->course_name; ?>"
																    		<?php if($demo_record->startingCourse == $cou->course_name) { echo "selected"; } ?>><?php echo $cou->course_name; ?></option>
																	<?php } ?>
																    
																</select>
															</div>
														</div>
													<?php } else if($demo_record->course_type == "Package") { ?>
														<div class="col-xl-4 col-lg-6 col-md-6">
															<div class="form-group">
																<label>Course:* </label>
																<select class="form-control" name="packageName" id="packageName">
																    <option value="">Select Pkg Category</option>
																    <?php foreach($package as $pac) { ?>
																    	<option value="<?php echo $pac->package_name; ?>"
																    		<?php if($demo_record->packageName == $pac->package_name) { echo "selected"; } ?>><?php echo $pac->package_name; ?></option>
																	<?php } ?>
																    
																</select>
															</div>
														</div>
													<?php } ?>
													<div class="col-xl-6 col-lg-6 col-md-12">
															<div class="form-group">
																<select class="form-control" name="faculty_id" id="faculty" onChange="selecttime()">
																	<option>Faculty Name</option>
																	<?php foreach($faculty as $fa) { ?>
																		<option value="<?php echo $fa->faculty_id; ?>" <?php if($fa->faculty_id == $demo_record->faculty_id) { echo "selected"; } ?>><?php echo $fa->name;?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													<div class="col-xl-3 col-lg-3 col-md-6">
														<div class="form-group">
															<input type="text" name="fromTime" id="fromTime" placeholder="Time To" data-provide="timepicker" class="form-control">
														</div>
													</div>
													<div class="col-xl-3 col-lg-3 col-md-6">
														<div class="form-group">
															<input type="text" name="toTime" id="toTime" placeholder="To End" data-provide="timepicker" class="form-control">
														</div>
													</div>
													<div class="col-xl-12 text-right">
														<div class="btn-group">
															<button type="button" class="btn btn-success" onclick="return submit_demo_edit()">Update</button>
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
										<li>Demo ID : <span class="student_demo_id badge"><?php if(isset($demo_record->demo_id)) { echo $demo_record->demo_id; } ?></span></li>
										<li>Name : <span><?php if(isset($demo_record->name)) { echo $demo_record->name; } ?></span></li>
										<li>Mobile No : <span class="phone_num"><a href="javascript:void(0)"><?php if(isset($demo_record->mobileNo)) { echo $demo_record->mobileNo; } ?></a>
												<ul class="phone_num_data">
													<li><a href="tel:<?php if(isset($demo_record->mobileNo)) { echo $demo_record->mobileNo; } ?>" data-toggle="tooltip" title="Call"><i class="fa fa-phone"></i></a> </li>
													<li><a href="#" data-toggle="tooltip" title="Copy"><i class="fa fa-clone"></i></a> </li>
													<li><a href="#" data-toggle="tooltip" title="Whatsapp"><i class="fa fa-whatsapp"></i></a> </li>
												</ul>
											</span>
										</li>
										<li>Demo Time : <span><?php if(isset($demo_record->fromTime)) { echo $demo_record->fromTime; } ?> TO <?php if(isset($demo_record->toTime)) { echo $demo_record->toTime; } ?></span></li>
										<li>Total Attendance : 
											<ul>
											<?php $present =  explode('&&',$demo_record->attendance); 
												$count_p = 0;
													$count_a = 0;
 													for($i=0;$i<sizeof($present); $i++) 
 													{ 
 														$recor = explode('/',$present[$i]);
 														if(@$recor[1]=='P')
 														{
 															$count_p++;
 														}
 														else if(@$recor[1]=='A')
 														{
 															$count_a++;
 														}
													} ?>

												<li><span class="present">P: </span><span class="badge badge-success present-bage"><?php echo $count_p; ?></span></li>
												<li><span class="present">A: </span><span class="badge badge-danger present-bage"><?php echo $count_a; ?></span></li>		
											</ul>
										</li>
									</ul>
								</div>
								<div class="col-xl-5 col-lg-6 col-md-6  mx-auto">
									<ul class="demo_details_info_block">
										<li>Faculty Name : <span><?php if(isset($demo_record->faculty_id)) { echo $demo_record->faculty_id;  }?></span></li>
										<li>Demo Stating Course : <span><?php if(isset($demo_record->startingCourse)) { echo $demo_record->startingCourse;  }?></span></li>
										<li>Demo Course Package : <span><?php if(isset($demo_record->packageName)) { echo $demo_record->packageName;  }?></span></li>
										<li>Demo Date : <span><?php if(isset($demo_record->demoDate)) { echo $demo_record->demoDate;  }?></span></li>
										<li>Demo Status : 
											<?php if($demo_record->discard==0) { ?>
    										 <?php if($demo_record->demoStatus==0) { ?>   
    										 	<span class="demo_student_status demo_student_status_running  badge badge-danger">Running</span>
    										 <?php } ?>
										     <?php if($demo_record->demoStatus==1) { ?>   
										     	<span class="demo_student_status demo_student_status_running  badge badge-danger">Done</span>
										     <?php } ?>
										     <?php if($demo_record->demoStatus==2) { ?>   
										     	<span class="demo_student_status demo_student_status_running  badge badge-danger">Leave</span>
										     <?php } ?>
										     <?php if($demo_record->demoStatus==3) { ?>  
										     	<span class="demo_student_status demo_student_status_running  badge badge-danger">Cancel</span>
										     <?php } ?>
       										<?php } ?> 

       										 <?php if($demo_record->discard==1) { ?>
										     	<span class="demo_student_status demo_student_status_running  badge badge-danger">Discard</span>
										      <?php } ?>
											</li>
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
									  		<button type="button" class="btn btn-primary float-right btn-sm" onclick="return add_demo_student_remarks(<?php echo $demo_record->demo_id; ?>)">Add Remark</button>
									  	</div>
									  	<input type="hidden" name="demo_id_record" value="<?php echo $demo_record->demo_id; ?>" >
									  	<div class="table-responsive" id="add_remarks_after">
									  	  <table class="table table-bordered table-striped create_responsive_table">
									  	    <tr class="thead">
									  	    	<th>Remark Date And Time</th>
									  	    	<th>Comment</th>
									  	    	<th>By</th>
									  	    </tr>
									  	  

									  	    <?php foreach($remarks_re as $rem) { ?>
										  	    <tr>
										  	    	<td data-heading="Remark Date And Time"><?php echo $rem->demo_remark_date; ?></td>
										  	    	<td data-heading="Comment"><?php echo $rem->demo_remark_comment; ?></td>
										  	    	<td data-heading="By"><?php echo $rem->demo_remark_by; ?></td>
										  	    </tr>
										  	<?php } ?>
									  	    
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
									  	    <?php $record = explode('&&',$demo_record->attendance);
									  	    for($i=0; $i<sizeof($record); $i++) { 
									  	    	$get_record =  explode('/',$record[$i]); ?>
										  	    <tr>
										  	    	<td data-heading="Date"><?php echo @$get_record[0]; ?></td>
										  	    	<td data-heading="Attendance"><?php echo @$get_record[1]; ?></td>
										  	    	<td data-heading="Mark By"><?php echo @$get_record[2]; ?></td>
										  	    	<td data-heading="Time"><?php echo @$get_record[3]; ?></td>
										  	    </tr>
										  	<?php } ?>
									  	   
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
								  		        <?php $demo_follow = explode('&&',$demo_record->reason); 
								  		        for($i=0; $i<sizeof($demo_follow); $i++) { 
								  		        	$follow =  explode('|/|',$demo_follow[$i]); ?>
								  		        <tr>
								  		            <td data-heading="Date"><?php echo @$follow[0];?></td>
								  		            <td data-heading="Follow Up"><?php echo @$follow[1];?> </td>
								  		            <td data-heading="Follow By"><?php echo @$follow[2];?></td>
								  		            <td data-heading="Time"><?php echo @$follow[3];?></td>
								  		        </tr>
								  		    <?php } ?>
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

<script>

	function submit_demo_edit()
	{
		var name = $('#name').val();
		var mobileNo = $('#mobileNo').val();
		var demoDate = $('#date_selected').val();
		var branch_id = $('#branch_id').val();
		 var course_type = $("input[name='course_type']:checked").val();
		var department = $('#department').val();
		var courseName = $('#courseName').val();
		var packageName = $('#packageName').val();
		var faculty = $('#faculty').val();
		var fromTime = $('#fromTime').val();
		var toTime = $('#toTime').val();
		var demoId = $('#demo_id').val();
	 	if(fromTime == '')
	 	{
	 		alert("enter FromTime for student");
	 		return false;
	 	}
	 	else if(toTime == '')
	 	{
	 		alert("enter toTime for students");
	 		return false;
	 	}
	 	else
	 	{
	 		$.ajax({
	 			url : "<?php echo base_url(); ?>welcome/edit_demo_students",
	 			type : "POST",
	 			data :{
	 				'demoDate'			: demoDate,
	 				'name'				: name,
	 				'mobileNo'			: mobileNo,
	 				'branch_id'			: branch_id,
	 				'demo_course_type'	: course_type,
	 				'courseName'		: courseName,
	 				'department'		: department,
	 				'packageName'		: packageName,
	 				'faculty_id'		: faculty,
	 				'fromTIme'			: fromTime,
	 				'toTime'			: toTime,
	 				'demo_id'			: demoId 
	 			},
	 			success:function(Response)
	 			{
	 				$('#msgAlert').html("Successfully Updated Demo");
	 				$('#demo_update_record').html(Response);
	 			}
	 		});
	 	}
	}




 </script>

