
			<div class="row">
				<div class="col-xl-12">
					<div class="modal-header px-0">
						<h5 class="modal-title">Edit Lead &nbsp;<span id="add_lead_name_fast" style="color:gray;font-weight:bold;"><?php if(isset($lead_get_record->name)) { echo $lead_get_record->name; }?></span></h5>
						<button type="button" class="close close_side_bar" onclick="return close_right_side_bar()">
							<span aria-hidden="true">×</span>
						</button>
					</div>
				<form method="post" id="quick_lead_list_edit_form">
					<div class="fill_new_leade_info_body" id="create_leade">
						<div class="right_side_row_panel">
							<a href="#candidate_details" data-toggle="collapse" class="collapsed"><i class="fas fa-chevron-down"></i> Lead Details</a>
							<div class="right_side_row_panel_block collapse show" id="candidate_details" data-parent="#create_leade">
								<div class="new_lead_info_fill">
									<h6 class="lead_fill_title">Step 1 - Enter Prospect details (Either Email or Mobile is mandatory.).*</h6>	
									<input type="hidden" name="lead_list_id_edit" id="lead_list_id_edit" value="<?php if(isset($lead_get_record->lead_list_id)) { echo $lead_get_record->lead_list_id; }?>">
									<div class="form-group">
										<label>Name<span style="color:red">*</span></label>
										<input required type="text" maxlength="50" class="form-control" id="name" placeholder="Enter Name" name="name" onkeyup="return get_prospect_name()" value="<?php if(isset($lead_get_record->name)) { echo $lead_get_record->name; }?>">
									</div>
									<div class="form-group">
										<label>SurName<span style="color:red">*</span></label>
										<input type="text" maxlength="50" class="form-control" id="surname" placeholder="Enter Surname" name="surname"  value="<?php if(isset($lead_get_record->surname)) { echo $lead_get_record->surname; }?>">
									</div>
									<div class="form-group">
										<label>Select Gender</label><br>
										<input type="radio" maxlength="50"  id="gender"  name="gender"  value="male"  <?php if(isset($lead_get_record->gender)) { if($lead_get_record->gender=='male') { echo "checked"; } } ?>>Male
										<input type="radio" maxlength="50" id="gender"  name="gender"  value="female"  <?php if(isset($lead_get_record->gender)) { if($lead_get_record->gender=='fenale') { echo "checked"; } } ?>>Female
										<input type="radio" maxlength="50" id="gender"  name="gender"  value="Other"  <?php if(isset($lead_get_record->gender)) { if($lead_get_record->gender=='Other') { echo "checked"; } } ?>>Other
									</div>
									<div class="form-group">
										<label>Email<span style="color:red">*</span></label>
										<input type="text" maxlength="100" class="form-control" id="email" placeholder="Email" data-api-attached="true" name="email" required value="<?php if(isset($lead_get_record->email)) { echo $lead_get_record->email; }?>">
									</div>
									<div class="form-group">
										<label>Mobile<span style="color:red">*</span></label>
										<input type="tel" maxlength="13" class="form-control" min="0" id="mobile_no" placeholder="Mobile" data-api-attached="true" name="mobile_no" value="<?php if(isset($lead_get_record->mobile_no)) { echo $lead_get_record->mobile_no; }?>">
									</div>
								</div>
								<div class="new_lead_info_fill">
									<h6 class="lead_fill_title">Step 2 - Select appropriate values to add basic Lead details.*</h6>	
									<div class="form-group">
										<label>Campaign Name</label>
										<input type="text" maxlength="100" class="form-control" id="leadName"  placeholder="Campaign Name"  autocomplete="off" value="<?php if(isset($lead_get_record->campaign_name)) { echo $lead_get_record->campaign_name; }?>" name="campaign_name">
									</div>
									<div class="form-group">
										<label>Channel</label>
										<select class="form-control" name="channel_id" id="channel_id" onchange="return get_source123()">
										<?php if(isset($lead_get_record->channel_id)!='Telephonic Quick Add'){ ?>
											
											<?php foreach($channel_list as $cl) { ?>
												<option value="<?php echo $cl->channel_name; ?>" <?php if(isset($lead_get_record->channel_id)) { if($lead_get_record->channel_id == $cl->channel_id) { echo "selected"; } } ?>><?php echo $cl->channel_name; ?></option>
											<?php  } } else { ?>
												<option value="<?php echo $lead_get_record->channel_id; ?>"><?php echo $lead_get_record->channel_id; ?></option>
												<?php foreach($channel_list as $cl) { ?>
												<option value="<?php echo $cl->channel_name; ?>" <?php if(isset($lead_get_record->channel_id)) { if(@$lead_get_record->channel_id == $cl->channel_id) { echo "selected"; } } ?>><?php echo $cl->channel_name; ?></option>
											<?php  } ?>
											<?php } ?>
										</select>
									</div>
									<div class="form-group" id="source_record">
										<label>Source<span style="color:red">*</span></label>
										<select class="form-control" name="source_id" id="source_id">
											<option value="">Select Source</option>
											<?php foreach($source_list as $sl) { ?>
												<option value="<?php echo $sl->source_name; ?>" <?php if(isset($lead_get_record->source_id)) { if($lead_get_record->source_id == $sl->source_name) { echo "selected"; } } ?>><?php echo $sl->source_name; ?></option>
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
											<option value="hot" <?php if(isset($lead_get_record->priority) == 'hot') { echo "selected"; } ?>>Hot</option>
											<option value="low" <?php if(isset($lead_get_record->priority) == 'low') { echo "selected"; } ?>>Low</option>
											<option value="medium" <?php if(isset($lead_get_record->priority) == 'medium') { echo "selected"; } ?>>Medium</option>
										</select>
									</div>


									<div class="form-group">
										<label>Reference Name</label>
										<input type="tel" maxlength="13" class="form-control" min="0" id="reference_name" placeholder="Enter Reference Name" data-api-attached="true" name="reference_name"  value="<?php if(isset($lead_get_record->reference_name)) { echo $lead_get_record->reference_name; }?>">
									</div>


									<div class="form-group">
										<label>Reference Mobile Number</label>
										<input type="tel" maxlength="13" class="form-control" min="0" id="reference_mobile_no" placeholder="Enter Reference Mobile Number" data-api-attached="true" name="reference_mobile_no">
									</div>

									<div class="form-group" id="source_record">
										<label>Referred To</label>
										<select class="form-control" name="referred_to" id="referred_to">
											<!-- <option value="">e</option> -->
											<option value="Hitesh Desai" <?php if(@$lead_get_record->referred_to=='Hitesh Desai'){ echo "selected"; } ?>>Hitesh Desai</option>
											<option value="Jaydip Dave" <?php if(@$lead_get_record->referred_to=='Jaydip Dave'){ echo "selected"; } ?>>Jaydip Dave</option>
											<option value="Kishan Nandola" <?php if(@$lead_get_record->referred_to=='Kishan Nandola'){ echo "selected"; } ?>>Kishan Nandola</option>
											<option value="Raj Gondliya" <?php if(@$lead_get_record->referred_to=='Raj Gondliya'){ echo "selected"; } ?>>Raj Gondliya</option>
											<option value="RW1 Chetna Thummar" <?php if(@$lead_get_record->referred_to=='RW1 Chetna Thummar'){ echo "selected"; } ?>>RW1 Chetna Thummar</option>
											<option value="RWB1 Designing" <?php if(@$lead_get_record->referred_to=='RWB1 Designing'){ echo "selected"; } ?>>RWB1 Designing</option>
											<option value="RW1Calling Hetal Lodaliya" <?php if(@$lead_get_record->referred_to=='RW1Calling Hetal Lodaliya'){ echo "selected"; } ?>>RW1Calling Hetal Lodaliya</option>
											<option value="RW1Calling Renuka Hirpara" <?php if(@$lead_get_record->referred_to=='RW1Calling Renuka Hirpara'){ echo "selected"; } ?>>RW1Calling Renuka Hirpara</option>
											<option value="RW1co1 Yamini Mistry" <?php if(@$lead_get_record->referred_to=='RW1co1 Yamini Mistry'){ echo "selected"; } ?>>RW1co1 Yamini Mistry</option>
											<option value="RW1co2 Nisha Kalthiya" <?php if(@$lead_get_record->referred_to=='RW1co2 Nisha Kalthiya'){ echo "selected"; } ?>>RW1co2 Nisha Kalthiya</option>
											<option value="RW2co1 Priya Sutariya" <?php if(@$lead_get_record->referred_to=='RW2co1 Priya Sutariya'){ echo "selected"; } ?>>RW2co1 Priya Sutariya</option>
											<option value="RW2co2 Ashish Thummar" <?php if(@$lead_get_record->referred_to=='RW2co2 Ashish Thummar'){ echo "selected"; } ?>>RW2co2 Ashish Thummar</option>
											<option value="RW3Co1 Hinal Savaliya">RW3Co1 Hinal Savaliya</option>
											<option value="RW4 Rakesh Gosaliya" <?php if(@$lead_get_record->referred_to=='RW4 Rakesh Gosaliya'){ echo "selected"; } ?>>RW4 Rakesh Gosaliya</option>
											<option value="RW4Co2 Uttam Sojitra" <?php if(@$lead_get_record->referred_to=='RW4Co2 Uttam Sojitra'){ echo "selected"; } ?>>RW4Co2 Uttam Sojitra</option>
											<option value="Test Mobile" <?php if(@$lead_get_record->referred_to=='Test Mobile'){ echo "selected"; } ?>>Test Mobile</option>
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
												<option value="<?php echo $lsf->followup_type_name; ?>" <?php if($lead_get_record->status == $lsf->followup_type_name) {echo "selected"; }?>><?php echo $lsf->followup_type_name; ?></option>
											<?php } ?>
											
										</select>
									</div>

									<div class="form-group" id="substatus_record">
										<label>Sub -  Status</label>
										<select class="form-control" name="sub_status" id="sub_status">
											<option>Select Sub - Status</option>
											<?php foreach($list_substatus_followup as $lssf) { ?>
												<option value="<?php echo $lssf->sub_type_name; ?>" <?php if($lead_get_record->sub_status == $lssf->sub_type_name){ echo "selected"; } ?>><?php echo $lssf->sub_type_name; ?></option>
											<?php } ?>
											
										</select>
									</div>

									<div class="form-group">
										<label>Followup Mode</label>
										<select class="form-control" name="followup_mode" id="followup_mode" onchange="return get_status_followup()">
											<option>Select Followup Mode</option>
											<?php foreach($followupmode as $fm) { ?>
												<option value="<?php echo $fm->follow_up_mode_name; ?>" <?php if($lead_get_record->followup_mode == $fm->follow_up_mode_name){ echo "selected"; } ?>><?php echo $fm->follow_up_mode_name; ?></option>
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
												<option value="<?php echo $ls->state_name; ?>" <?php if("Gujarat"==$ls->state_name){ echo "selected"; } ?>><?php echo $ls->state_name; ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group" id="substatus_record">
										<label>Select City</label>
										<select class="form-control" name="city" id="city">
											<option>Select City</option>
											<?php foreach($list_city as $lc) { ?>
												<option value="<?php echo $lc->city_name; ?>" <?php if("Surat"==$lc->city_name) { echo "selected"; }?>><?php echo $lc->city_name; ?></option>
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
										<label>Branch<span style="color:red">*</span></label>
										<select class="form-control" name="branch_id" id="branch_id" onchange="return get_status_department()">
											<option value="">Select Branch</option>
											<?php foreach($list_branch as $br) { ?>
												<option value="<?php echo $br->branch_id; ?>" <?php if($br->branch_id == $lead_get_record->branch_id){ echo "selected"; } ?>><?php echo $br->branch_code; ?></option>
											<?php } ?>
											
										</select>
									</div>

									<div class="form-group" id="department_data">
										<label>Department<span style="color:red">*</span></label>
										<select class="form-control" name="department" id="department">
											<option value="">Select Department</option>
											<?php foreach($list_department as $ld) { ?>
												<option value="<?php echo $ld->department_id; ?>" <?php if($ld->department_id == $lead_get_record->department) { echo "selected"; } ?>><?php echo $ld->department_name; ?></option>
											<?php } ?>
											
										</select>
									</div>

									<div class="form-group">
										<label>Select Course Package<span style="color:red">*</span></label><br>
										<input type="radio" maxlength="50"  id="course_package"  name="course_package"  value="package"  
										onclick="return get_course_package('package')" <?php if($lead_get_record->course_package=='package') { echo "checked"; } ?>>Package
										<input type="radio" maxlength="50" id="course_package"  name="course_package"  value="single"  onclick="return get_course_package('single')" <?php if($lead_get_record->course_package=='single') { echo "checked"; } ?>>Single
										
									</div>

									<?php if($lead_get_record->course_package == 'package') { ?>
									<div class="form-group" id="select_course_package">
										<label>Select Pacakge<span style="color:red">*</span></label>
										<select class="form-control" name="course_or_package" id="course_or_package" >
											<option value="">Select Package</option>
											<?php foreach($list_package as $lp) { ?>
												<option value="<?php echo $lp->package_id; ?>" <?php if($lead_get_record->course_or_package == $lp->package_id){ echo "selected"; } ?>><?php echo $lp->package_name; ?></option>
											<?php } ?>
										</select>
									</div>
								<?php } else if($lead_get_record->course_package == 'single') { ?>

									<div class="form-group" id="select_course_package" name="select_course_package">
										<label>Select Courses<span style="color:red">*</span></label>
										<select class="form-control" name="course_or_package" id="course_or_package" >
											<option>Select Course</option>
											<?php foreach($list_course as $lc) { ?>
												<option value="<?php echo $lc->course_id; ?>" <?php if($lead_get_record->course_or_package == $lc->course_id){ echo "selected"; } ?>><?php echo $lc->course_name; ?></option>
											<?php } ?>
										</select>
									</div>

								<?php } ?>

									
								</div>


								<div class="new_lead_info_fill">
									<h6 class="lead_fill_title">Step 5 - Any Further Remarks*</h6>	
									
									<div class="form-group">
										<label>Remarks<span style="color:red">*</span></label>
										<textarea   class="form-control" id="any_remarks" placeholder="Enter Remarks"  name="any_remarks"><?php if(isset($lead_get_record->any_remarks)) { echo $lead_get_record->any_remarks; } ?></textarea>
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
							<button type="submit" name="submit"  value="submit" class="btn btn-success">Edit Lead</button>
						</div>
					</div>
				</form>
				</div>
			</div>
		


	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->
<script>
// just for the demos, avoids form submit
$(document).ready(function(){
event.preventDefault();
$( "#quick_lead_list_edit_form" ).validate({
  rules: {
    name: {
      required: true,
      minlength:2
    },
    surname :{
    	required :true,
    	minlength: 3
    },
    email :{
    	required :true,
    	email :true
    },
    mobile_no :{
    	required :true,
    	number : true,
    	minlength :10,
    	maxlength :10
    },
    source_id :{
    	required :true
    },
    branch_id :{
    	required :true
    },
    department:{
    	required :true
    },
    course_or_package :{
    	required : true
    },
    any_remarks :{
    	required :true
    }

  },
  messages:{
  	name:{
  		required : "<span style='color:red'>Please Enter Name</span>",
  		minlength:  "<span style='color:red'>Enter Minimum 2 characters</span>"
  	},
  	surname : {
  		required : "<span style='color:red'>Please Enter Sur - Name</span>",
  		minlength:  "<span style='color:red'>Enter Minimum 3 characters</span>"
  	},
  	email :{
  		required : "<span style='color:red'>Please Enter Email</span>",
  		email:  "<span style='color:red'>Enter Valid Email</span>"
  	},
  	mobile_no :{
  		required : "<span style='color:red'>Please Enter MObile Number</span>",
  		number:  "<span style='color:red'>Enter Only Numbers</span>",
  		minlength:  "<span style='color:red'>Enter minimum 10 characters</span>",
  		maxlength:  "<span style='color:red'>Enter maximum 10 characters</span>"
  	},
  	source_id :{
  		required : "<span style='color:red'>Please select Source Data</span>" 
  	},
  	branch_id :{
  		required : "<span style='color:red'>Please Branch Data</span>" 
  	},
  	department:{
  		required : "<span style='color:red'>Please select Department Data</span>" 
  	},
  	course_or_package :{
  		required : "<span style='color:red'>Please select Course Or package</span>"
  	},
  	any_remarks :{
  		required : "<span style='color:red'>Please Enter Remarks</span>"
  	}
  },
  submitHandler: function() { 
   			event.preventDefault();
   			var form_data = $('#quick_lead_list_edit_form').serialize(); //Encode form elements for submission
   			alert(form_data);
			
   }
});
});
</script>