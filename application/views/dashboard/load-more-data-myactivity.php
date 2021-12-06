							
							<?php 
							if(!empty($lead_list_all)){
							foreach($lead_list_all as $lla) {
							if($lla->followup_status_yellow=='yellow'){
									$color = "#FBC044";
								}else if($lla->followup_status_red == 'red'){
									$color = "#EA5C5A";
								} else if($lla->followup_status_green == 'green'){
									$color =  '#69A853';
								}  ?>
							<div class="lead_block_box" style="border-left: 3px solid <?php echo $color; ?>;">
								<div class="lead_small_box lead_small_box_first">
									<ul>
										<li class="prospect_neme_first_list">
											<span class="lead_info_title">Prospect Name <span class="prospect_neme">0</span></span>
											<div class="lead_info_text position-relative "><a href="#" class="lead_info_text"  onclick="return update_lead_record(<?php echo $lla->lead_list_dupli_id; ?>);"><u><?php echo $lla->name; ?></u></a>
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
												<?php foreach($source_list as $sl) { if($sl->source_id == $lla->source_id) { echo $sl->source_name; } } ?></p>
										</li>
										<li>
											<span class="lead_info_title">Branch</span>
											<p class="lead_info_text"><!-- <?php echo $lla->branch_id; ?> -->
												<?php foreach($list_branch as $lb) { if($lb->branch_id == $lla->branch_id) { echo $lb->branch_name; } } ?>
											</p>
										</li>
										<li>
											<span class="lead_info_title">Lead Modification Date</span>
											<p class="lead_info_text"><?php if(!empty($lla->lead_modification_date)) { 
														$next_act=  $lla->lead_modification_date;
														echo date('M',strtotime($next_act))."  ".date('d',strtotime($next_act)).",  ".date('Y',strtotime($next_act))." ".date('H:i A',strtotime($next_act)); 
												 } ?></p>
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
												<a href="#edit_lead_emial d-inline-block" class="lead_info_text lead_student_info_copy" title="6354279744"><?php echo $lla->mobile_no; ?></a>
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
											<p class="lead_info_text"><?php if(!empty($lla->next_action_date)) { 
														$next_act=  $lla->next_action_date;
														echo date('M',strtotime($next_act))."  ".date('d',strtotime($next_act)).",  ".date('Y',strtotime($next_act))." ".date('H:i A',strtotime($next_act)); 
												 } ?></p>
										</li>
										<li>
											<span class="lead_info_title">Followup Comment</span>
											<p class="lead_info_text">
												<?php if(!empty($lla->followup_remark)) { 
														echo   $lla->followup_remark;
														 
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
												 echo $lla->status; ?> </a></p>
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
											<a href="#add_remark_lead" class="lead_info_text" onclick="return update_lead_record(<?php echo $lla->lead_list_id; ?>);"><?php echo substr($lla->any_remarks,0,25)."..."; ?></a>
										</li>
										<li>
											<span class="lead_info_title">Followup Comment</span>
											<p class="lead_info_text">
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
													<a href="#lead_sent_whatsapp_msg" title="Sent Whatsapp Message"><i class="fab fa-whatsapp"></i></a>
												</li>
												<li>
													<div class="dropdown">
													  <a href="#" data-toggle="dropdown">
													    <i class="fas fa-ellipsis-h"></i>
													  </a>
													  <ul class="dropdown-menu edit_lead_dropdown" aria-labelledby="dropdownMenuButton">
													     <li><a href="#"  onclick="return add_followup_lead_list(<?php echo $lla->lead_list_id;  ?>)" class="dropdown-item"><i class="fas fa-notes-medical"></i>Add Followup</a></li>
													     <li><a onclick="return update_lead_record(<?php echo $lla->lead_list_id; ?>);" class="dropdown-item"><i class="fas fa-pen-square"></i>Edit Lead</a></li>
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
							<?php  $lastId = $lla->lead_list_id; ?>
							<?php } ?>
							
							<?php if($postNum > $postLimit){ ?>
						        <div class="load-more" lastID="<?php echo $lastId; ?>" style="display: none;">
						            <img src="<?php echo base_url('assets/images/loading.gif'); ?>"/> Loading more posts...
						        </div>
    						<?php }else{ ?>
        						<div class="load-more" lastID="0">
            						That's All!
        						</div>
    						<?php } ?>
						</div>
					<?php }else{ ?>    
					    <div class="load-more" lastID="0">
					            That's All!
					    </div>    
					<?php } ?>


					<script>

						function add_followup_lead_list(lead_list_id)
{	

	$('.fill_new_leade_info_body').show();
	$('.email_template_view').hide();
	$('#history_lead').hide();
	$('.right_side_row_panel').show();
	$('#first_first_right_side').hide();
	$('#first_second_right_side').hide();
	$('#first_third_right_side').show();
	$('#lead_third_fill_title').hide();
	$('#third_followup_mode').hide();

	$('#first_forth_right_side').hide();
	$('#first_fifth_right_side').hide();
	$('#second_right_side').hide();
	$('#third_right_side').hide();
	$('.lead_save_btn').show();
	$('#change_lead_status').html('Edit Followup For');
	$('#edit_lead').val('Update Followup');
	$('#edit_lead').show();
	$('#add_lead').hide();
	$('.plus_button').hide();
	$("aside").addClass('right_show');
	$('.main_content').addClass('right_show');
	$('.right_side').addClass('right_show');


	$.ajax({
			url: "<?php echo base_url(); ?>LeadlistController/get_lead_record",
			type : "post",
			data :{
				'lead_list_id' : lead_list_id
			},
			success:function(res)
			{
				// $('#select_course_package').show();
				// $('.view_hide_side_bar').show();
				// $('.right_side_row_panel').show();
				// $('.lead_save_btn').show();
				// $('#history_lead').hide();
				// $('#edit_lead').show();
				// $('#add_lead').hide();
				// $("aside").addClass('right_show');
				// $('.main_content').addClass('right_show');
				// $('.right_side').addClass('right_show');
				// console.log("test");
				// $('#update_lead_record_click_name').html(res);
				// $('.plus_button').removeClass('create_new_lead');
				var data = $.parseJSON(res);
				// $('#change_lead_status').html("Edit Lead");
				// console.log(data.record['lead_get_record'].lead_list_id);
				$('#lead_list_id').val(data.record['lead_get_record'].lead_list_id);
				$('#name').val(data.record['lead_get_record'].name);
				$('#surname').val(data.record['lead_get_record'].surname);
				var gender = data.record['lead_get_record'].gender;
				if(gender == 'male'){
					$("#gender_male").prop("checked", true);
				}
				else if(gender=='female'){
					$("#gender_female").prop("checked", true);
				}
				else{
					$("#gender_other").prop("checked", true);

				}

				$('#add_lead_name_fast').html(data.record['lead_get_record'].name);
				$('#email').val(data.record['lead_get_record'].email);
				$('#mobile_no').val(data.record['lead_get_record'].mobile_no);
				$('#leadName').val(data.record['lead_get_record'].campaign_name);
				$('#source_id').val(data.record['lead_get_record'].source_id);
				var channel_id_record =  data.record['lead_get_record'].channel_id;
				if(channel_id_record == 'Telephonic Quick Add')
				{
					if(i==0)
					{
						$('#channel_id').append(new Option(channel_id_record, channel_id_record));
					}
					$('#channel_id').val(data.record['lead_get_record'].channel_id);
				}
				else
				{
					$('#channel_id').val(data.record['lead_get_record'].channel_id);
				}

				$('#priority').val(data.record['lead_get_record'].priority);
				$('#reference_name').val(data.record['lead_get_record'].reference_name);
				$('#referred_to').val(data.record['lead_get_record'].referred_to);
				
				
				$('#status').val(data.record['lead_get_record'].status);
				var sub_status_lead = data.record['lead_get_record'].sub_status;
				if(sub_status_lead == 'Not Known')
				{
					if(i==0){
						$('#sub_status').append(new Option(sub_status_lead, sub_status_lead));
						$('#sub_status').val(data.record['lead_get_record'].sub_status);
					}
				}
				else{
					$('#sub_status').val(data.record['lead_get_record'].sub_status);
				}
				
				$('#followup_mode').val(data.record['lead_get_record'].followup_mode);
				var next_follow = data.record['lead_get_record'].next_followup_date;
				if(next_follow != '')
				{
					// alert(next_follow);
				 var next_f = next_follow.split(" ");
				
				 $("#next_followup_date").val(next_f[0]);
				// $('#next_followup_date').val(dat1);

				 $('#next_followup_time').val(next_f[1]);
				 $('#followup_remark').val(data.record['lead_get_record'].followup_remark);
				}
				else
				{
					// alert("nathi");
					$('#next_followup_time').val('');
					$('#next_followup_date').val('');
					$('#followup_remark').val('');
				}
				
				$('#any_remarks').val(data.record['lead_get_record'].any_remarks);
				var area_lead = data.record['lead_get_record'].area;
				// alert(area_lead);
				if(area_lead == 'Not Known')
				{
					// if(i==0){
						$('#area').append(new Option(area_lead, area_lead));
					
					$('#area').val(data.record['lead_get_record'].area);
				}
				else
				{
					$('#area').val(data.record['lead_get_record'].area);
				}
				$('#branch_id').val(data.record['lead_get_record'].branch_id);
				$('#department').val(data.record['lead_get_record'].department);

				var pack_sin =  data.record['lead_get_record'].course_package;
				
				if(pack_sin == 'package')
				{
					$("#course_package"). prop("checked", true);
					// get_course_package('package');
					$('.select_course_package').show();
					$('.select_course_single').hide();
					$('#course_orpackage').val(data.record['lead_get_record'].course_or_package);
					
				}
				else
				{
					$("#course_single"). prop("checked", true);	
					// get_course_package('single');
					$('.select_course_package').hide();
					$('.select_course_single').show();
					$('#course_orsingle').val(data.record['lead_get_record'].course_or_package);
				
				}

				i++;

				
			}
		});

}

					</script>