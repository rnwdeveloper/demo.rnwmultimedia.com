 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
<style type="text/css">
  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #2255a4;
    color: white;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 1px;
}
/*.select2-container--default .select2-selection--multiple {
    line-height: 27px;
}*/
.select2-container {
    box-sizing: border-box;
    display: block; 
    width:100% !important;
    margin: 0;
    position: relative;
    vertical-align: middle;
    z-index: 9999999999;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
    list-style: none;
    }
   
}
</style>

<main class="main_content d-inline-block">
	<section class="axtraage_main_first_sec d-inline-block w-100 position-relative">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="extra_Block_box">
						<div class="extra_top_search_header_bar d-inline-block w-100 position-relative">
							<div class="row align-items-center">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<div class="form-group mb-0">
										<div class="btn-group w-100">
											<input type="text" name="" class="form-control" placeholder="Search by Name, Email or Mobile">
											<button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<div class="extra_top_search_header_bar_icon text-sm-center text-xl-left text-lg-left text-md-left text-center">
										<ul>
											<li class="dropdown">
												<a href="#" class="" data-toggle="dropdown"><i class="fas fa-bell"></i><span class="notifiecount">104</span></a>
												<div class="dropdown-menu extra_foloup_dropdown">
													<div class="extra_dropdown_item_header">108 Pending Followups</div>
													<div class="notification_panel">
														<ul>
														    <li>
														        <label>Followup Type:</label>
														        <p>Schedule Walk-Ins</p>
														    </li>
														    <li>
														        <label>Prospect Name:</label><a href="#" title="Click to Change Status"><u>Nakrani  payl R. </u></a></li>
														    <li>
														        <label>When:</label><a href="#" title="Click to Postpone the Activity"><u>(18 hours and 30 minutes ago) May 4, 2020 2:31 PM</u></a></li>
														</ul>
														<ul>
														    <li>
														        <label>Followup Type:</label>
														        <p>Schedule Walk-Ins</p>
														    </li>
														    <li>
														        <label>Prospect Name:</label><a href="#" title="Click to Change Status"><u>Nakrani  payl R. </u></a></li>
														    <li>
														        <label>When:</label><a href="#" title="Click to Postpone the Activity"><u>(18 hours and 30 minutes ago) May 4, 2020 2:31 PM</u></a></li>
														</ul>
														<ul>
														    <li>
														        <label>Followup Type:</label>
														        <p>Schedule Walk-Ins</p>
														    </li>
														    <li>
														        <label>Prospect Name:</label><a href="#" title="Click to Change Status"><u>Nakrani  payl R. </u></a></li>
														    <li>
														        <label>When:</label><a href="#" title="Click to Postpone the Activity"><u>(18 hours and 30 minutes ago) May 4, 2020 2:31 PM</u></a></li>
														</ul>
														<ul>
														    <li>
														        <label>Followup Type:</label>
														        <p>Schedule Walk-Ins</p>
														    </li>
														    <li>
														        <label>Prospect Name:</label><a href="#" title="Click to Change Status"><u>Nakrani  payl R. </u></a></li>
														    <li>
														        <label>When:</label><a href="#" title="Click to Postpone the Activity"><u>(18 hours and 30 minutes ago) May 4, 2020 2:31 PM</u></a></li>
														</ul>
														<ul>
														    <li>
														        <label>Followup Type:</label>
														        <p>Schedule Walk-Ins</p>
														    </li>
														    <li>
														        <label>Prospect Name:</label><a href="#" title="Click to Change Status"><u>Nakrani  payl R. </u></a></li>
														    <li>
														        <label>When:</label><a href="#" title="Click to Postpone the Activity"><u>(18 hours and 30 minutes ago) May 4, 2020 2:31 PM</u></a></li>
														</ul>
													</div>
												</div>
											</li>
											<li>
												<a href="#" data-toggle="modal" data-target="#leed_add_modal"><i class="fas fa-plus"></i></a>
											</li>
										</ul>

									</div>
								</div>
							</div>
						</div>
						<div class="extra_lead_menu d-inline-block w-100 position-relative">
							<ul>
								<li><a href="#" class="active">All (659)</a></li>
								<li><a href="#">New (466)</a></li>
								<li><a href="#">Urgent Call (33)</a></li>
								<li><a href="#">Follow-up (77)</a></li>
								<li><a href="#">Email (0)</a></li>
								<li><a href="#">Walkin (3)</a></li>
								<li><a href="#">Confused (0)</a></li>
								<li><a href="#">Demo (0)</a></li>
								<li><a href="#">Enrolled (24)</a></li>
								<li><a href="#">Closed (56)</a></li>
								<li><a href="#">Referred From Me (6686)</a></li>
								<li><a href="#">Re-Enquired (0)</a></li>
							</ul>
						</div>
						<div class="menu_bottom_btn_row">
							<div class="row justify-content-center">
								<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
									<div class="dropdown">
									  <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <i class="fas fa-exchange-alt"></i>
									  </button>
									  <div class="dropdown-menu calender_drop" aria-labelledby="dropdownMenuButton">
									    <a class="dropdown-item" href="#">No sorting applied to this list.</a>
									    <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Creation Date</a>
									    <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Modification Date</a>
									    <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Next Action Date</a>
									    <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Re-Enquiry Date</a>
									    <a class="dropdown-item " href="#"><i class="fas fa-calendar-week"></i>Lead score</a>
									  </div>
									</div>
								</div>
								<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
									<ul class="icon_filter">
										<li>
											<a href="#add_camping" data-toggle="modal" title="Add Marketing Campaign" class="btn btn-primary"><i class="fas fa-bullhorn"></i></a>
											<a href="#refer_leads" data-toggle="modal" title="Refer All Leads" class="btn btn-primary"><i class="fas fa-share"></i></a>
											<a href="#sms_send_all" data-toggle="modal" title="Send SMS To All" class="btn btn-primary"><i class="fas fa-comment-alt"></i></a>
											<a href="#sms_email_all" data-toggle="modal" title="Send Email To All" class="btn btn-primary"><i class="fas fa-envelope"></i></a>
											<a href="#" title="Refresh Info" class="btn btn-primary"><i class="fas fa-sync-alt"></i></a>
											<a href="#download_all_leads" data-toggle="modal" title="Download All Leads" class="btn btn-primary"><i class="fas fa-download"></i></a>
											<a href="#" data-toggle="tooltip" title="Filter Leads" class="btn btn-primary"><i class="fas fa-filter"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="full_lead_block d-inline-block w-100 position-relative">
							<?php 
				              if(!empty($all_campaign)){
				              foreach($all_campaign as $data) { ?>
							<div class="lead_block_box">
								<div class="lead_small_box lead_small_box_first">
									<ul>
										<!-- <li class="prospect_neme_first_list">
											<span class="lead_info_title">Prospect Name <span class="prospect_neme">0</span></span>
											<div class="lead_info_text position-relative "><a href="#edit_lead" class="lead_info_text"><u>KAKADIYA  ISHAN RAJESHBHAI </u></a>
												<ul>
													<li class="position-relative"><a href="#"><i class="fas fa-users"></i></a><span class="notifiecount">104</span></li>
													<li class="position-relative"><a href="#"><i class="fas fa-user-graduate"></i></a><span class="notifiecount">104</span></li>
													<li class="position-relative"><a href="#"><i class="fas fa-user-clock"></i></a><span class="notifiecount">104</span></li>
												</ul>
											</div>
										</li> -->
										<li>
											<span class="lead_info_title">Campaign Name</span>
											<p class="lead_info_text"><?php echo $data->campaign_name; ?></p>
										</li>
										<li>
											<span class="lead_info_title">Campaign</span>
											<p class="lead_info_text">
											<?php	if('Centeral'==@$data->campaign || 'Marketing'==@$data->campaign) 
													{ 
														echo $data->campaign; 
													}
													else 	
													{
														 $branch_ids = explode(",",$data->campaign);
								                        foreach($branch_all as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; } } 
								                    }   
							                ?>
													
												
					                        </p>
										</li>	
										<li> 
											<span class="lead_info_title">Ending Date</span>
											<p class="lead_info_text"><?php echo $data->end_date; ?></p>
										</li>
										<!-- <li>
											<span class="lead_info_title">Referred From</span>
											<p class="lead_info_text">Hitesh Desai</p>
										</li> -->
									</ul>
								</div>
								<div class="lead_small_box lead_small_box_second">
									<ul>
										<!-- <li>
											<span class="lead_info_title">Email</span>
											<span class="copy_info_text_line">
												<a href="#edit_lead_emial d-inline-block" title="Ishankakadiya7@gmail.coma " class="lead_info_text lead_student_info_copy">Ishankakadiya7@gmail.coma </a>
												<span><a href="#" class="d-inline-block" title="Click Here To Copy"><i class="fas fa-copy"></i></a></span>
											</span>
										</li> -->
										<li>
											<span class="lead_info_title">Course</span>
											<p class="lead_info_text"><?php $branch_ids = explode(",",$data->course_id);
                        foreach($course_all as $row) { if(in_array($row->course_id,$branch_ids)) {  echo $row->course_name; }  } ?></p>
										</li>
										<li>
											<span class="lead_info_title">Counselor</span>
											<p class="lead_info_text"><?php $branch_ids = explode(",",$data->counselor_id);
                        foreach($counselor_all as $row) { if(in_array($row->user_id,$branch_ids)) {  echo $row->name; }  } ?></p>
										</li>
										<li>
											<span class="lead_info_title">Status</span>
											<p class="lead_info_text"><?php echo $data->status; ?></p>
										</li>
										<!-- <li>
											<span class="lead_info_title">Referred To</span>
											<p class="lead_info_text">Hitesh Desai</p>
										</li> -->
									</ul>
								</div>
								<div class="lead_small_box lead_small_box_third">
									<ul>
										<!-- <li>
											<span class="lead_info_title">Mobile</span>
											<span class="copy_info_text_line">
												<a href="#edit_lead_emial d-inline-block" class="lead_info_text lead_student_info_copy" title="6354279744">6354279744</a>
												<span><a href="#" class="d-inline-block" title="Click Here To Copy"><i class="fas fa-copy"></i></a></span>
											</span>
										</li> -->
										<li>
											<span class="lead_info_title">Branch</span>
											<p class="lead_info_text"><?php $branch_ids = explode(",",$data->branch_id);
                        foreach($branch_all as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?></p>
										</li>
										<li>
											<span class="lead_info_title">Total Limit</span>
											<p class="lead_info_text"><?php  echo $data->no_of_seet_limit; ?></p>
										</li>
										<li>
											<span class="lead_info_title">Remarks</span>
											<p class="lead_info_text"><?php echo $data->remarks; ?></p>
										</li>
										<!-- <li>
											<span class="lead_info_title">Followup Comment</span>
											<p class="lead_info_text"></p>
										</li> -->
									</ul>
								</div>
								<div class="lead_small_box lead_small_box_fourth">
									<ul>
										<li>
											<span class="lead_info_title">Faculty</span>
											<p class="lead_info_text"><?php $branch_ids = explode(",",$data->faculty_id);
                        foreach($faculty_all as $row) { if(in_array($row->faculty_id,$branch_ids)) {  echo $row->name; }  } ?></p>
										</li>	
										<li>
											<span class="lead_info_title">Stating Date</span>
											<p class="lead_info_text"><?php echo $data->start_date; ?></p>
										</li>
										<!-- <li>
											<span class="lead_info_title">Course</span>
											<p class="lead_info_text">Web Front End Designing</p>
										</li>
										<li>
											<span class="lead_info_title">Remarks</span>
											<a href="#add_remark_lead" class="lead_info_text">Add Remark</a>
										</li>
										<li>
											<span class="lead_info_title">Followup Comment</span>
											<p class="lead_info_text"></p>
										</li> -->
									</ul>
								</div>

								<div class="lead_small_box lead_small_box_fiveth">
									<ul>
										<li>
											<span class="lead_info_title">Action</span>
											<ul class="action_option_lead">
												<li>
													<a href="#click_to_call_leade" data-toggle="modal" title="Click To Call Now"><i class="fas fa-phone-alt"></i></a>
												</li>
												<li>
													<a href="#lead_sent_whatsapp_msg" title="Sent Whatsapp Message"><i class="fab fa-whatsapp"></i></a>
												</li>
												<li>
													<div class="dropdown">
													  <a href="#" data-toggle="dropdown">
													    <i class="fas fa-ellipsis-h"></i>
													  </a>
													  <ul class="dropdown-menu edit_lead_dropdown" aria-labelledby="dropdownMenuButton">
													    <li><a href="#" class="dropdown-item" onclick="return add_followup(<?php echo $data->campaign_id; ?>)"><i class="fas fa-notes-medical"></i>Add Followup</a></li>
													     <li><a href="#" class="dropdown-item" onclick="return edit_campaign(<?php echo $data->campaign_id; ?>)"><i class="fas fa-pen-square" ></i>Edit Campaign</a></li>
													      <li><a onclick="return view_campaign_batch_all(<?php echo $data->campaign_id; ?>)" class="dropdown-item"><i class="fa fa-database"></i>View All Batch</a></li>
													   <li><a onclick="return view_campaign_histroy(<?php echo $data->campaign_id; ?>)" class="dropdown-item"><i class="fas fa-history"></i>View History</a></li>
													    <li><a href="#" class="dropdown-item"><i class="fas fa-share-square"></i>Refer Leads</a></li>
													    <li><a href="#" class="dropdown-item"><i class="fas fa-user-minus"></i>Delete</a></li>
													  </ul>
													</div>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						<?php } } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	<div class="new_lead_genered_btn">
		<a href="javascript:void(0)" class="create_new_lead plus_button" onclick="return get_side_bar_modal()"><i class="fas fa-plus"></i></a>
	</div>
</main>


<div class="right_side d-inline-block">
	<section class="right_side_header d-inline-block w-100 position-relative">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="modal-header px-0">
						<h5 class="modal-title"><span id="change_campaign_status">Campaign</span>&nbsp;<span id="add_lead_name_fast"></span></h5>
						<button type="button" class="close close_side_bar" onclick="return close_right_side_bar()">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="fill_new_leade_info_body" id="create_leade">
						<div class="right_side_row_panel">
							<a href="#candidate_details" data-toggle="collapse" class="collapsed"><i class="fas fa-chevron-down"></i><span id="change_status_details">Campaign Details</span></a>
							<div class="right_side_row_panel_block collapse show" id="candidate_details" data-parent="#create_leade">
								<div class="new_lead_info_fill" id="first_first_right_sides">
									<h6 class="lead_fill_title"></h6>
									<div class="form-group">
										<label>Campaign Name:<span style="color:red">*</span></label>
										<input type="text"  class="form-control" id="campaign_name" placeholder="Campaign Name" value="">
									</div>
									<div class="form-group">
										<label>Course:<span style="color:red">*</span></label>
										<select class="form-control" name="course_id" id="course_id">
			                           <option value="">Select course</option>
			                                  <?php foreach($course_all as $ld) { ?>
			                                    <option  
			                                     value="<?php echo $ld->course_id; ?>"><?php echo $ld->course_name; ?></option>
			                                  <?php } ?>  
			                        </select>
									</div>
									<div class="form-group">
										<label>Branch:<span style="color:red">*</span></label>
										<select class="form-control" name="branch_id" id="branch_id">
			                           <option value="">Select branch</option>
			                                  <?php foreach($branch_all as $ld) { ?>
			                                    <option  
			                                     value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
			                                  <?php } ?>  
			                        </select>
									</div>	
									<div class="form-group">
										<label>Faculty:<span style="color:red">*</span></label>
										<select class="form-control" name="faculty_id" id="faculty_id">
			                           <option value="">Select faculty</option>
			                                 <!--  <?php foreach($faculty_all as $ld) { ?>
			                                    <option  
			                                     value="<?php echo $ld->faculty_id; ?>"><?php echo $ld->name; ?></option>
			                                  <?php } ?>   -->
			                        </select>
									</div>
									 
					                <div class="form-group">
					                      <label>Campaign:<span style="color:red">*</span></label>
					                        <select class="select2 form-control custom-form-control" name="campaign" id="campaign" multiple="multiple">
					                          <option value="">Select campaign</option>
					                          <option value="Marketing">Marketing </option>
					                          <option value="Centeral">Centeral</option>
					                              <?php foreach($branch_all as $ld) { ?>
					                              <option 
					                              value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
					                            <?php }  ?>
					                      </select>
					                  </div>
					                  <div class="form-group">
										<label>Counselor:<span style="color:red">*</span></label>
										<select class="form-control" name="counselor_id" id="counselor_id">
			                        </select>
									</div>
					                  <div class="form-group">
										<label>No Of Seet Limit:<span style="color:red">*</span></label>
										<input type="number"  class="form-control" id="no_of_seet_limit" min="0" value="">
									</div>
									<div class="form-group">
				                    <label for="datepicker">Stating Date:<span style="color:red">*</span></label>
				                    <input class="form-control datepicker" data-date-format="dd/mm/yyyy"  id="start_date">
				                  </div>
				                  <div class="form-group">
				                    <label for="datepicker">Ending Date:<span style="color:red">*</span></label>
				                    <input class="form-control datepicker1" data-date-format="dd/mm/yyyy" id="end_date">
				                  </div>
				                  <div class="form-group">
				                    <label> Remarks:<span style="color:red">*</span></label>
				                    <textarea   class="form-control" rows="5" id="remarks" placeholder="Enter Remarks"  name="remarks"></textarea>
				                  </div>
				                  <div class="lead_save_btn">
									<div class="btn-group w-100">
										<button type="button" class="btn btn-danger">CANCEL</button>
										<button type="button" class="btn btn-success" id="add_campaign">ADD Campaign</button>
									</div>
								</div>
								</div>
								<div id="campaign_data">
								</div>
								<div id="campaign_histroy">
								</div>
								<div id="addfollowup">
								</div>
							</div>

						</div>
					
					</div>
					

				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="click_to_call_leade">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Call lead</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3>Do you want to make a call to Savaliya toral abhishekkimar's number?</h3>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>
<div class="modal fade" id="download_all_leads">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Download All Leads</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3>Do you want to download filtered data?</h3>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-primary">Download Leads</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>
<div class="modal fade" id="sms_email_all">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Send email to All</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3>Do you want to send Email to 659 Leads?</h3>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-primary">Send email</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>
<div class="modal fade" id="sms_send_all">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Send sms to All</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3>Do you want to send SMS to 659 Leads?</h3>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-primary">Send Sms </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>
<div class="modal fade" id="refer_leads">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Refer Leads</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3>Do you want to Refer 659 Leads?</h3>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-primary">Refer Leads</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>
<div class="modal fade" id="add_camping">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Campaign</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3>Do you want to add campaign?</h3>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-primary">Add Camping</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>
<div class="modal fade" id="leed_add_modal">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Quick Add</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
						    <div><span><label for="FirstName">Full Name<i class="required">*</i></label><input type="text" maxlength="50" class="form-control" id="firstName" placeholder="Full Name" value=""></span></div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" maxlength="100" class="form-control" id="email" placeholder="Email" data-api-attached="true" value="">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
							<label>Mobile*</label>
							<input type="tel" maxlength="13" min="0" class="form-control" id="mobile" placeholder="Mobile" data-api-attached="true" value="">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
							<label>Source*</label>
							<select class="form-control">
								<option>Select Source</option>
								<option>CLASSBOAT</option>
								<option>CLASSBOAT</option>
								<option>CLASSBOAT</option>
								<option>CLASSBOAT</option>
								<option>CLASSBOAT</option>
								<option>CLASSBOAT</option>
							</select>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
							<label>Branch*</label>
							<select class="form-control">
								<option>Select Branch</option>
								<option>Rw1</option>
								<option>Rw1 A</option>
								<option>Rw2</option>
								<option>Rw3</option>
								<option>Rw4</option>
							</select>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
							<label>Category*</label>
							<select class="form-control">
								<option>Select Category</option>
								<option>DESIGNING</option>
								<option>DESIGNING</option>
								<option>DESIGNING</option>
								<option>DESIGNING</option>
								<option>DESIGNING</option>
							</select>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
							<label>Course*</label>
							<select class="form-control">
								<option>Select Course</option>
								<option>Advance Diploma In Fashion</option>
								<option>Advance Diploma In Fashion</option>
								<option>Advance Diploma In Fashion</option>
								<option>Advance Diploma In Fashion</option>
							</select>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="form-group">
							<label>Remarks</label>
							<textarea class="form-control" rows="3" placeholder="Remarks"></textarea>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
						  <label class="form-check-label" for="inlineCheckbox1">Send Welcome Email</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
						  <label class="form-check-label" for="inlineCheckbox2">Send Welcome Sms</label>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-primary">SAVE & ADD MORE</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>

<div class="filter_ratio" id="filter_ratio">
  <div class="modal fade" id="view_campaign_batches">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 1150px;">
      <div class="modal-content" id="get_data">
        
      </div>
    </div>
  </div>
</div>


<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
 <script src="https://cdn.tiny.cloud/1/n9ury2u6quy5yo8n0ij8xeo7agd9310wz8eb6t2ms04chtsd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script type="text/javascript">
    $('.datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('.datepicker').datepicker("setDate", new Date());
</script>

<script type="text/javascript">
    $('.datepicker1').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('.datepicker1').datepicker("setDate", new Date());
</script>
<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>

   <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        

    </script>
 <script>
function get_side_bar_modal()
{
	$('.email_template_view').hide();
	$('.fill_new_leade_info_body').show();
	$('.lead_save_btn').show();
	$('#first_first_right_side').show();
	$('#first_second_right_side').show();
	$('#first_third_right_side').show();
	$('#lead_third_fill_title').show();
	$('#third_followup_mode').show();
	// $('#existing_follow_up').hide();
	$('#first_forth_right_side').show();
	$('#first_fifth_right_side').show();
	$('#second_right_side').show();
	$('#third_right_side').show();
	$('.sms_template_view').hide();
	// $('.lead_save_btn').show();
	// $('#change_lead_status').html('Edit Followup For');
	$('#edit_lead').val('Edit Lead');
	// $('#add_lead').hide();
	$('.plus_button').show();
	// $("aside").addClass('right_show');
	// $('.main_content').addClass('right_show');
	// $('.right_side').addClass('right_show');

			$('#history_lead').hide();
			$('.right_side_row_panel').show();
			$('.lead_save_btn').show();
			$("aside").addClass('right_show');
			$('.main_content').addClass('right_show');
			$('.right_side').addClass('right_show');
			$('.plus_button').removeClass('create_new_lead');
			$('.select_course_single').hide();
			$('.select_course_package').show();
			$('#edit_lead').hide();
			$('#add_lead').show();
			$('#change_lead_status').html("Add New Campaign");	
			$('#add_lead_name_fast').html('');
			$("#lead_list_form_side_bar")[0].reset();
			$('.create_new_lead_upload').hide();
}

function close_right_side_bar()
{
	$('.sms_template_view').hide();
	$('#first_first_right_side').show();
	$('#first_second_right_side').show();
	$('#first_third_right_side').show();
	$('#lead_third_fill_title').show();
	$('#third_followup_mode').show();

	$('#first_forth_right_side').show();
	$('#first_fifth_right_side').show();
	$('#second_right_side').show();
	$('#third_right_side').show();
	// $('.lead_save_btn').show();
	// $('#change_lead_status').html('Edit Followup For');
	$('#edit_lead').val('Edit Lead');
	$('#edit_lead').hide();
	$('#add_lead').show();
	$('.plus_button').show();

  $('.main_content').removeClass('right_show');
    $('.right_side').removeClass('right_show');
    $("aside").removeClass('right_show');
    $('.plus_button').addClass('create_new_lead');
    $('.create_new_lead_upload').show();
}
 </script>


 <script>
  $(document).ready(function(){

    $('#branch_id').change(function(){
 
  var branch_id = $('#branch_id').val();
  //var course_id = $('#course_orsingle').val();
 // var branch_id =  $('#branch_id').val();
 
   $.ajax({
    url:"<?php echo base_url(); ?>LeadlistController/Get_faculty",
    method:"POST",
    data:{ 'branch_id' : branch_id },
    success:function(data)
    {
     $('#faculty_id').html(data);
 
    }


   });
 });

}); 
</script>

<script>
  $(document).ready(function(){

    $('#campaign').change(function(){
 
  var branch_id = $('#campaign').val();
  //var course_id = $('#course_orsingle').val();
 // var branch_id =  $('#branch_id').val();
 
   $.ajax({
    url:"<?php echo base_url(); ?>LeadlistController/get_branch_wise_conselor",
    method:"POST",
    data:{ 'branch_id' : branch_id },
    success:function(data)
    {
     $('#counselor_id').html(data);
 
    }


   });
 });

}); 
</script>

<script>
function add_followup(campaign_id=''){
  $("aside").addClass('right_show');
  $('.main_content').addClass('right_show');
  $('.right_side').addClass('right_show');
  $('#first_first_right_sides').hide();
   $('#first_second_right_side').hide();
  $('#campaign_histroy').hide();
  $('.plus_button').removeClass('create_new_lead'); 
  $('#change_campaign_status').html("CRM");
  $('#change_status_details').html("CRM Data Finde");
   $.ajax({
     url : "<?php echo base_url(); ?>LeadlistController/Ajax_followup",	
     type:"post",
     data:{
       'campaign_id':campaign_id 
     },
     success:function(Resp){
      $('#addfollowup').show();
       $('#addfollowup').html(Resp);
      
     }
   });
 }

function edit_campaign(campaign_id=''){
  $("aside").addClass('right_show');
  $('.main_content').addClass('right_show');
  $('.right_side').addClass('right_show');
  $('#first_first_right_sides').hide();
  $('#addfollowup').hide();
  $('.plus_button').removeClass('create_new_lead'); 
  $('#change_campaign_status').html("Update Campaign");
  $('#change_status_details').html("Update Campaign");
   $.ajax({
     url : "<?php echo base_url(); ?>LeadlistController/upd_campaign_record",
     type:"post",
     data:{
       'campaign_id':campaign_id 
     },
     success:function(Resp){
      $('#first_second_right_side').show();
      $('#campaign_histroy').hide();
       $('#campaign_data').html(Resp);
      
     }
   });
 }

 function view_campaign_histroy(campaign_id=''){
  $("aside").addClass('right_show');
  $('.main_content').addClass('right_show');
  $('.right_side').addClass('right_show');
  $('#first_first_right_sides').hide();
  $('#first_second_right_side').hide();
  $('#addfollowup').hide();
  $('.plus_button').removeClass('create_new_lead'); 
  $('#change_campaign_status').html("History Campaign");
  $('#change_status_details').html("History");
   $.ajax({
     url : "<?php echo base_url(); ?>LeadlistController/ajax_get_campaign_histroy_record",
     type:"post",
     data:{
       'campaign_id':campaign_id 
     },
     success:function(Resp){
      $('#campaign_histroy').show();
       $('#campaign_histroy').html(Resp);
      
     }
   });
 }

 function view_campaign_batch_all(campaign_id=''){
 $('#view_campaign_batches').modal('show');
   $.ajax({
     url : "<?php echo base_url(); ?>LeadlistController/ajax_get_campaign_batches_record",
     type:"post",
     data:{
       'campaign_id':campaign_id 
     },
     success:function(Resp){
     	  $('#view_campaign_batches').modal('show');
          $('#get_data').html(Resp);
     }
   });
 }

</script>




<script type="text/javascript">
   $('#add_campaign').on('click', function() {
     var campaign_name = $('#campaign_name').val();
     var course_id = $('#course_id').val();
     var branch_id = $('#branch_id').val();
     var faculty_id = $('#faculty_id').val();
     var campaign = $('#campaign').val();
     var counselor_id = $('#counselor_id').val();
     var no_of_seet_limit = $('#no_of_seet_limit').val();
     var start_date = $('#start_date').val();
     var end_date = $('#end_date').val();
     var remarks = $('#remarks').val();
    

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>LeadlistController/campaign_data",
       dataType: "JSON",
       data: {
         'campaign_name': campaign_name,
         'course_id': course_id,
         'branch_id': branch_id,
         'faculty_id': faculty_id,
         'campaign': campaign,
         'counselor_id': counselor_id,
         'no_of_seet_limit': no_of_seet_limit,
         'start_date': start_date,
         'end_date': end_date,
         'remarks': remarks
         
       },
       success: function(data) {
         alert('Data Inserted Success');
       }
     });
     return false;
   });
 </script>