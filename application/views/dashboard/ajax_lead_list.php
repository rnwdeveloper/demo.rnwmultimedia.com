<?php 
if(!empty($lead_list_all)){
foreach($lead_list_all as $lla) { ?>
							<div class="lead_block_box ">
								<div class="lead_small_box lead_small_box_first">
									<ul>
										<li class="prospect_neme_first_list">
											<span class="lead_info_title">Prospect Name <span class="prospect_neme">0</span></span>
											<div class="lead_info_text position-relative "><a href="#" class="lead_info_text"  onclick="return update_lead_record(<?php echo $lla->lead_list_id; ?>);"><u><?php echo $lla->name; ?></u></a>
												<ul>
													<?php 
														$status_history1 = 0;
														foreach($lead_followup_history as $lfh) { 
															if($lfh->recepient_id == $lla->lead_list_id){
																$status_history1++;
															}
														}	
													?>
													<li class="position-relative"><a href="#" onclick="return get_followup_response(<?php echo $lla->lead_list_id; ?>)"><i class="fas fa-users"></i><span class="notifiecount"><?php echo $status_history1; ?></span></a></li>

													<?php 
														$status_history2 = 0;
														foreach($lead_followup_history_response as $lfhr) { 
															if($lfhr->recepient_id == $lla->lead_list_id){
																$status_history2++;
															}
														}	
													?>
													<li class="position-relative"><a href="#"><i class="fas fa-user-graduate"></i><span class="notifiecount"><?php echo $status_history2; ?></span></a></li>

													<li class="position-relative"><a href="#"><i class="fas fa-user-clock"></i></a><span class="notifiecount">104</span></li>
												</ul>
											</div>
										</li>
										<li>
											<span class="lead_info_title">Campaign Name</span>
											<p class="lead_info_text"><?php echo $lla->campaign_name; ?></p>
										</li>
										<li>
											<span class="lead_info_title">Priority</span>
											<p class="lead_info_text"><?php echo $lla->priority; ?></p>
										</li>
										<li>
											<span class="lead_info_title">Lead Creation Date</span>
											<p class="lead_info_text"><?php $date = $lla->lead_creation_date;
		echo date('M',strtotime($date))."  ".date('d',strtotime($date)).",  ".date('Y',strtotime($date))." ".date('H:i A',strtotime($date)); ?></p>
										</li>
										<li>
											<span class="lead_info_title">Referred From</span>
											<p class="lead_info_text"><?php echo $lla->reference_name; ?></p>
										</li>
									</ul>
								</div>
								<div class="lead_small_box lead_small_box_second">
									<ul>
										<li>
											<span class="lead_info_title">Email</span>
											<span class="copy_info_text_line">
												<a href="#" title="<?php echo $lla->email; ?>" class="lead_info_text lead_student_info_copy" onclick="return show_email_template(<?php echo $lla->lead_list_id; ?>)"><?php echo $lla->email; ?></a>
												<span><a href="#" class="d-inline-block" title="Click Here To Copy"><i class="fas fa-copy"></i></a></span>
											</span>
										</li>
										<li>
											<span class="lead_info_title">Source</span>
											<p class="lead_info_text">
												<?php foreach($source_list as $sl) { if($sl->source_name == $lla->source_id) { echo $sl->source_name; } } ?></p>
										</li>
										<li>
											<span class="lead_info_title">Branch</span>
											<p class="lead_info_text"><!-- <?php echo $lla->branch_id; ?> -->
												<?php foreach($list_branch as $lb) { if($lb->branch_id == $lla->branch_id) { echo $lb->branch_name; } } ?>
											</p>
										</li>
										<li>
											<span class="lead_info_title">Lead Modification Date</span>

											<p class="lead_info_text">
												<?php $date = $lla->lead_modification_date;
		echo date('M',strtotime($date))."  ".date('d',strtotime($date)).",  ".date('Y',strtotime($date))." ".date('H:i A',strtotime($date)); ?>
											</p>
										</li>
										<li>
											<span class="lead_info_title">Referred To</span>
											<p class="lead_info_text"><?php echo $lla->referred_to; ?></p>
										</li>
									</ul>
								</div>
								<div class="lead_small_box lead_small_box_third">
									<ul>
										<li>
											<span class="lead_info_title">Mobile</span>
											<span class="copy_info_text_line">
												<a href="#" class="lead_info_text lead_student_info_copy" title="6354279744" onclick="return get_sms_template_record(<?php echo $lla->lead_list_id; ?>)"><?php echo $lla->mobile_no; ?></a>
												<span><a href="#" class="d-inline-block" title="Click Here To Copy"><i class="fas fa-copy"></i></a></span>
											</span>
										</li>
										<li>
											<span class="lead_info_title">Channel</span>
											<p class="lead_info_text"><?php echo $lla->channel_id; ?></p>
										</li>
										<li>
											<span class="lead_info_title">Department</span>
											<p class="lead_info_text">
												<?php foreach($list_department as $ld) { ?>
												<?php if($lla->department==$ld->department_id) { echo $ld->department_name; } ?>
													
													<?php } ?>
												</p>
										</li>
										<li>
											<span class="lead_info_title">Next Action Date</span>
											<p class="lead_info_text">
												<?php if(!empty($lla->next_followup_date)) { 
														$next_act=  $lla->next_followup_date;
														echo date('M',strtotime($next_act))."  ".date('d',strtotime($next_act)).",  ".date('Y',strtotime($next_act))." ".date('H:i A',strtotime($next_act)); 
												 } ?>
											</p>
										</li>
										<li>
											<span class="lead_info_title">Followup Comment</span>
											<p class="lead_info_text">
												<?php if(!empty($lla->followup_remark)) { 
														echo $lla->followup_remark;
														
												 } ?>
											</p>

										</li>
									</ul>
								</div>
								<div class="lead_small_box lead_small_box_fourth">
									<ul>
										<li>
											<span class="lead_info_title">Status</span>
											<p class="lead_info_text"><a onclick="return add_followup_lead_list(<?php echo $lla->lead_list_id;  ?>)">
												<?php 
												 echo $lla->status; ?></a> </p>
										</li>
										<li>
											<span class="lead_info_title">Sub-Status</span>
											<p class="lead_info_text"><?php echo $lla->sub_status; ?></p>
										</li>
										<li>
											<span class="lead_info_title">Course</span>
											<p class="lead_info_text"><?php echo $lla->course_package; ?>- 
												<?php if($lla->course_package == 'single'){ 
														foreach($course_all as $ca){
															if($ca->course_id == $lla->course_or_package){
																echo $ca->course_name;
															}
														}
													  }
													  else if($lla->course_package == 'package'){
													  	foreach($list_package as $lp){
													  		if($lp->package_id == $lla->course_or_package){
													  			echo $lp->package_name;
													  		}
													  	}
													  }

												?></p>
										</li>
										<li>
											<span class="lead_info_title">Remarks</span>
											<a  class="lead_info_text" onclick="return update_lead_record(<?php echo $lla->lead_list_id; ?>);"><?php echo substr($lla->any_remarks,0,25)."..."; ?></a>
										</li>
										<li>
											<span class="lead_info_title">Followup Comment</span>
											<p class="lead_info_text">
												<?php if(!empty($lla->followup_remark)) { 
														echo $lla->followup_remark;
														
												 } ?>
											</p>
										</li>
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
													<a href="https://api.whatsapp.com/send?phone=91<?php echo $lla->mobile_no; ?>" title="Sent Whatsapp Message"><i class="fab fa-whatsapp"></i></a>
												</li>
												<li>
													<div class="dropdown">
													  <a href="#" data-toggle="dropdown">
													    <i class="fas fa-ellipsis-h"></i>
													  </a>
													  <ul class="dropdown-menu edit_lead_dropdown" aria-labelledby="dropdownMenuButton">
													     <li><a href="#"  onclick="return add_followup_lead_list(<?php echo $lla->lead_list_id;  ?>)" class="dropdown-item"><i class="fas fa-notes-medical"></i>Add Followup</a></li>
													    <li><a  onclick="return update_lead_record(<?php echo $lla->lead_list_id; ?>);" class="dropdown-item"><i class="fas fa-pen-square"></i>Edit Lead</a></li>
													    <li><a onclick="return view_lead_histroy(<?php echo $lla->lead_list_id; ?>)" class="dropdown-item"><i class="fas fa-history"></i>View History</a></li>
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
							<?php $lastId = $lla->lead_list_id; ?>
							<?php } ?>

							<div class="load-more" lastID="<?php echo $lastId; ?>" style="display: none;">
            					<img src="<?php echo base_url('assets/images/loading.gif'); ?>"/> Loading more posts...
        					</div>
        					<?php } else {
        						echo "No Record Found";
        					 } ?>