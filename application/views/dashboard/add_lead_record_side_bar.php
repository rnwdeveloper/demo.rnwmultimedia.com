<div class="row">
				<div class="col-xl-12">
					<div class="modal-header px-0">
						<h5 class="modal-title">Add New Lead &nbsp;<span id="add_lead_name_fast"></span></h5>
						<button type="button" class="close close_side_bar" onclick="return close_right_side_bar()">
							<span aria-hidden="true">×</span>
						</button>
					</div>
				<form method="post" id="lead_list_form">
					<div class="fill_new_leade_info_body" id="create_leade">
						<div class="right_side_row_panel">
							<a href="#candidate_details" data-toggle="collapse" class="collapsed"><i class="fas fa-chevron-down"></i> Lead Details</a>
							<div class="right_side_row_panel_block collapse show" id="candidate_details" data-parent="#create_leade">
								<div class="new_lead_info_fill">
									<h6 class="lead_fill_title">Step 1 - Enter Prospect details (Either Email or Mobile is mandatory.).*</h6>	
									<div class="form-group">
										<label>Name<span style="color:red">*</span></label>
										<input required type="text" maxlength="50" class="form-control" id="name" placeholder="Enter Name" name="name" onkeyup="return get_prospect_name()">
									</div>
									<div class="form-group">
										<label>SurName<span style="color:red">*</span></label>
										<input type="text" maxlength="50" class="form-control" id="surname" placeholder="Enter Surname" name="surname" required>
									</div>
									<div class="form-group">
										<label>Select Gender</label><br>
										<input type="radio" maxlength="50"  id="gender"  name="gender"  value="male" required>Male
										<input type="radio" maxlength="50" id="gender"  name="gender"  value="female" required>Female
										<input type="radio" maxlength="50" id="gender"  name="gender"  value="Other" required>Other
									</div>
									<div class="form-group">
										<label>Email<span style="color:red">*</span></label>
										<input type="text" maxlength="100" class="form-control" id="email" placeholder="Email" data-api-attached="true" name="email" required>
									</div>
									<div class="form-group">
										<label>Mobile<span style="color:red">*</span></label>
										<input type="tel" maxlength="13" class="form-control" min="0" id="mobile_no" placeholder="Mobile" data-api-attached="true" name="mobile_no">
									</div>
								</div>
								<div class="new_lead_info_fill">
									<h6 class="lead_fill_title">Step 2 - Select appropriate values to add basic Lead details.*</h6>	
									<div class="form-group">
										<label>Campaign Name</label>
										<input type="text" maxlength="100" class="form-control" id="leadName" placeholder="Campaign Name" value="Manually Added" autocomplete="off">
									</div>
									<div class="form-group">
										<label>Channel</label>
										<select class="form-control" name="channel_id" id="channel_id" onchange="return get_source123()">
											<option>Select Channel</option>
											<?php foreach($channel_list as $cl) { ?>
												<option value="<?php echo $cl->name; ?>"><?php echo $cl->channel_name; ?></option>
											<?php  } ?>
										</select>
									</div>
									<div class="form-group" id="source_record">
										<label>Source</label>
										<select class="form-control" name="source_id" id="source_id">
											<option>Select Source</option>
											<?php foreach($source_list as $sl) { ?>
												<option value="<?php echo $sl->source_id; ?>"><?php echo $sl->source_name; ?></option>
											<?php  } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Source Remarks<span style="color:red">*</span></label>
										<input type="tel" maxlength="13" class="form-control" min="0" id="source_remark" placeholder="source Remarks" data-api-attached="true" name="source_remark">
									</div>
									<div class="form-group" id="source_record">
										<label>Priority</label>
										<select class="form-control" name="priority" id="priority">
											<option value="">Select Priority</option>
											<option value="hot">Hot</option>
											<option value="low">Low</option>
											<option value="medium">Medium</option>
										</select>
									</div>


									<div class="form-group">
										<label>Reference Name</label>
										<input type="tel" maxlength="13" class="form-control" min="0" id="reference_name" placeholder="Enter Reference Name" data-api-attached="true" name="reference_name">
									</div>


									<div class="form-group">
										<label>Reference Mobile Number</label>
										<input type="tel" maxlength="13" class="form-control" min="0" id="reference_mobile_no" placeholder="Enter Reference Mobile Number" data-api-attached="true" name="reference_mobile_no">
									</div>

									<div class="form-group" id="source_record">
										<label>Referred To</label>
										<select class="form-control" name="referred_to" id="referred_to">
											<!-- <option value="">e</option> -->
											<option value="Hitesh Desai">Hitesh Desai</option>
											<option value="Jaydip Dave">Jaydip Dave</option>
											<option value="Kishan Nandola">Kishan Nandola</option>
											<option value="Raj Gondliya">Raj Gondliya</option>
											<option value="RW1 Chetna Thummar">RW1 Chetna Thummar</option>
											<option value="RWB1 Designing">RWB1 Designing</option>
											<option value="RW1Calling Hetal Lodaliya">RW1Calling Hetal Lodaliya</option>
											<option value="RW1Calling Renuka Hirpara">RW1Calling Renuka Hirpara</option>
											<option value="RW1co1 Yamini Mistry">RW1co1 Yamini Mistry</option>
											<option value="RW1co2 Nisha Kalthiya">RW1co2 Nisha Kalthiya</option>
											<option value="RW2co1 Priya Sutariya">RW2co1 Priya Sutariya</option>
											<option value="RW2co2 Ashish Thummar">RW2co2 Ashish Thummar</option>
											<option value="RW3Co1 Hinal Savaliya">RW3Co1 Hinal Savaliya</option>
											<option value="RW4 Rakesh Gosaliya">RW4 Rakesh Gosaliya</option>
											<option value="RW4Co2 Uttam Sojitra">RW4Co2 Uttam Sojitra</option>
											<option value="Test Mobile">Test Mobile</option>
										</select>
									</div>

								</div>
								<div class="new_lead_info_fill">
									<h6 class="lead_fill_title">Step 3 - Select appropriate Followup details.*</h6>	
									
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" name="status" id="status" onchange="return get_status_followup()">
											<option>Select Status</option>
											<?php foreach($list_status_followup as $lsf) { ?>
												<option value="<?php echo $lsf->followup_type_id; ?>"><?php echo $lsf->followup_type_name; ?></option>
											<?php } ?>
											
										</select>
									</div>

									<div class="form-group" id="substatus_record">
										<label>Sub -  Status</label>
										<select class="form-control" name="sub_status" id="sub_status">
											<option>Select Sub - Status</option>
											<?php foreach($list_substatus_followup as $lssf) { ?>
												<option value="<?php echo $lssf->subtype_id; ?>"><?php echo $lssf->sub_type_name; ?></option>
											<?php } ?>
											
										</select>
									</div>

									<div class="form-group">
										<label>Followup Mode</label>
										<select class="form-control" name="followup_mode" id="followup_mode" onchange="return get_status_followup()">
											<option>Select Followup Mode</option>
											<?php foreach($followupmode as $fm) { ?>
												<option value="<?php echo $fm->follow_up_mode_id; ?>"><?php echo $fm->follow_up_mode_name; ?></option>
											<?php } ?>
											
										</select>
									</div>

									<div class="form-group">
										<label>Next Followup Date</label>
										<input type="date" maxlength="13" class="form-control" min="0" id="next_followup_date" placeholder="Mobile" data-api-attached="true" name="next_followup_date">
									</div>

									<div class="form-group">
										<label>Followup Remarks</label>
										<textarea  maxlength="13" class="form-control" min="0" id="followup_remark" placeholder="Enter Remarks" data-api-attached="true" name="followup_remark"></textarea>
									</div>

								</div>

								<div class="new_lead_info_fill">
									<h6 class="lead_fill_title">Step 4 - Select Course details.*</h6>	
									
									<div class="form-group">
										<label>State</label>
										<select class="form-control" name="state" id="state" onchange="return get_status_followup()">
											<option>Select state</option>
											<?php foreach($list_state as $ls) { ?>
												<option value="<?php echo $ls->state_id; ?>" <?php if("Gujarat"==$ls->state_name){ echo "selected"; } ?>><?php echo $ls->state_name; ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group" id="substatus_record">
										<label>Select City</label>
										<select class="form-control" name="city" id="city">
											<option>Select City</option>
											<?php foreach($list_city as $lc) { ?>
												<option value="<?php echo $lc->city_id; ?>" <?php if("Surat"==$lc->city_name) { echo "selected"; }?>><?php echo $lc->city_name; ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group" id="substatus_record">
										<label>Select Area</label>
										<select class="form-control" name="area" id="area">
											<option>Select Area</option>
											<?php foreach($list_area as $la) { ?>
												<option value="<?php echo $la->area_id; ?>" ><?php echo $la->area_name; ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Branch</label>
										<select class="form-control" name="branch_id" id="branch_id" onchange="return get_status_department()">
											<option>Select Branch</option>
											<?php foreach($list_branch as $br) { ?>
												<option value="<?php echo $br->branch_id; ?>"><?php echo $br->branch_code; ?></option>
											<?php } ?>
											
										</select>
									</div>

									<div class="form-group" id="department_data">
										<label>Department</label>
										<select class="form-control" name="department" id="department">
											<option>Select Department</option>
											<?php foreach($list_department as $ld) { ?>
												<option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
											<?php } ?>
											
										</select>
									</div>

									<div class="form-group">
										<label>Select Course Package</label><br>
										<input type="radio" maxlength="50"  id="course_package"  name="course_package"  value="package" checked 
										onclick="return get_course_package('package')">Package
										<input type="radio" maxlength="50" id="course_package"  name="course_package"  value="single"  onclick="return get_course_package('single')">Single
										
									</div>

									<div class="form-group" id="select_course_package">
										<label>Select Course Or Pacakge</label>
										<select class="form-control" name="course_or_package" id="course_or_package" >
											<option>Select Package</option>
											<?php foreach($list_package as $lp) { ?>
												<option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
											<?php } ?>
										</select>
									</div>

									
								</div>


								<div class="new_lead_info_fill">
									<h6 class="lead_fill_title">Step 5 - Any Further Remarks*</h6>	
									
									<div class="form-group">
										<label>Remarks</label>
										<textarea  maxlength="13" class="form-control" min="0" id="any_remarks" placeholder="Enter Remarks" data-api-attached="true" name="any_remarks"></textarea>
									</div>

								</div>
							</div>
						</div>
						<div class="right_side_row_panel">
							<a href="#lead_deducational_detailsetails" data-toggle="collapse" class="collapsed"><i class="fas fa-chevron-down"></i> Candidate Details</a>
							<div class="right_side_row_panel_block collapse" id="lead_deducational_detailsetails" data-parent="#create_leade">
								<div class="new_lead_info_fill">
									<h6 class="lead_fill_title">Please Enter Candidate's Personal Details</h6>	
									<div class="form-group">
										<label>Date of Birth*</label>
										<input type="date" maxlength="50" class="form-control" id="dob" name="dob" >
									</div>
									<h6 class="lead_fill_title">Please Enter Candidate's Parents Details</h6>	
									<div class="form-group">
										<label>Alternate Mobile Number</label>
										<input type="text" maxlength="100" class="form-control" id="alternate_mobile_no" placeholder="alternate mobile Number" data-api-attached="true" name="alternate_mobile_no">
									</div>
									<div class="form-group">
										<label>Father's Name</label>
										<input type="text" maxlength="13" class="form-control" min="0" id="father_name" placeholder="Enter Father Name" data-api-attached="true" name="father_name">
									</div>

									<div class="form-group">
										<label>Father's Mobile Number</label>
										<input type="phone" maxlength="13" class="form-control" min="0" id="father_mobile_no" placeholder="Enter Father mobile Number" data-api-attached="true" name="father_mobile_no">
									</div>
								</div>
								
							</div>
						</div>
						<div class="right_side_row_panel">
							<a href="#lead_details" data-toggle="collapse" class="collapsed"><i class="fas fa-chevron-down"></i> Educational Details</a>
							<div class="right_side_row_panel_block collapse" id="lead_details" data-parent="#create_leade">
								<div class="new_lead_info_fill">
									<h6 class="lead_fill_title">Please Enter Candidate's Educational Details</h6>	
									<div class="form-group">
										<label>10<sup>th</sup> Board Name</label>
										<input type="text" maxlength="50" class="form-control" id="tenth_board" placeholder="Enter 10th Board Name" name="tenth_board">
									</div>

										<div class="form-group">
										<label>10<sup>th</sup> Percentage</label>
										<input type="text" maxlength="50" class="form-control" id="tenth_perc" placeholder="Enter 10th Board Name" name="tenth_perc">
									</div>

									<div class="form-group">
										<label>12<sup>th</sup> Board Name</label>
										<input type="text" maxlength="50" class="form-control" id="tweth_board" placeholder="Enter 12th Board Name" name="tweth_board">
									</div>

										<div class="form-group">
										<label>12<sup>th</sup> Percentage</label>
										<input type="text" maxlength="50" class="form-control" id="tweth_perc" placeholder="Enter 12th percentage" name="tweth_perc">
									</div>

									<div class="form-group">
										<label>Graduation Degree</label>
										<input type="text" maxlength="50" class="form-control" id="degree" placeholder="Graduation Degree" name="degree">
									</div>

										<div class="form-group">
										<label>Graduation Percentage</label>
										<input type="text" maxlength="50" class="form-control" id="degree_perc" placeholder="Graduation Percentage" name="degree_perc">
									</div>
									
								</div>
								
								
							</div>
						</div>
					</div>
					<div class="lead_save_btn">
						<div class="btn-group w-100">
							<button type="button" class="btn btn-danger" onclick="return close_right_side_bar()">CANCEL</button>
							<input type="submit" name="submit"  value="Add LEAD" class="btn btn-success">
						</div>
					</div>
				</form>
				</div>
			</div>