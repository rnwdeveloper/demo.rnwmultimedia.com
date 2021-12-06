<?php date_default_timezone_set("Asia/Calcutta");
        	                  $current_date = date('m/d/Y'); ?>
						<input type="hidden" name="start_date" id="start_date" value="<?php echo $followup_status_wise['date_record'] ?>">

						<input type="hidden" name="status_of_record" id="status_of_record" value="ALL">
						
						<div class="menu_bottom_btn_row">
							<a href="#" style="padding:12px; border-top-left-radius: 10px; border-top-right-radius: 10px; background-color: orange; color:white; font-size:14px;">
								<?php if($current_date == $followup_status_wise['date_record']){ ?>
									Today's Followups (<?php echo $followup_status_wise['ALL']; ?>)
								<?php }else { ?>	
									Followups on <?php echo $followup_status_wise['date_record'] ?> (<?php echo $followup_status_wise['ALL']; ?>) 
								<?php } ?>
							</a>

							<a href="<?php echo base_url(); ?>LeadlistController/index" style="padding:12px; border-top-left-radius: 10px; border-top-right-radius: 10px; background-color: orange; color:white; font-size:14px; text-align: right;margin-left:10px;">
								Go To LeadList
							</a>
							<div style="border-top: 1px solid orange; margin-bottom: 23px; margin-top:11px;padding-top:20px;">
							<a href="#" onclick="return get_activity_wise_record('ALL')" style="color:rgb(0,0,255); font-weight: bold;font-size: 14px; margin-left: 10px; display: inline-block;">ALL (<?php echo $followup_status_wise['ALL']; ?>)</a>
									<a href="#" onclick="return get_activity_wise_record('done')"style="color:rgb(52,168,83); font-weight: bold;font-size: 14px; margin-left: 30px; display: inline-block;">Green - Done Followups (<?php echo $followup_status_wise['green']; ?>)</a>
									<a href="#" onclick="return get_activity_wise_record('missed')" style="color:rgb(234,92,90); font-weight: bold;font-size: 14px; margin-left: 10px; display: inline-block;"> Red - Missed Followups (<?php echo @$followup_status_wise['red']; ?>) </a>
									<a href="#" onclick="return get_activity_wise_record('planned')" style="color:rgb(251,192,68); font-weight: bold;font-size: 14px; margin-left: 10px; display: inline-block;"> Yellow - Planned Followups (<?php echo @$followup_status_wise['yellow']; ?>) </a>
								</div>	
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
						<div class="full_lead_block scrollbar-rail d-inline-block w-100 position-relative">
							<?php
							// echo "<pre>"; 
							// print_r($lead_list_all);
							// exit;
							if(!empty($lead_list_all)){
							foreach($lead_list_all as $lla) { 
								if($lla->followup_status_yellow=='yellow'){
									$color = "#FBC044";
								}else if($lla->followup_status_red == 'red'){
									$color = "#EA5C5A";
								} else if($lla->followup_status_green == 'green'){
									$color =  '#69A853';
								} ?>
							<div class="lead_block_box"  style="border-left: 3px solid <?php echo @$color; ?>;">
								<div class="lead_small_box lead_small_box_first">
									<ul>
										<li class="prospect_neme_first_list">
											<span class="lead_info_title">Prospect Name <span class="prospect_neme">0</span></span>
											<div class="lead_info_text position-relative "><a href="#" class="lead_info_text"  onclick="return update_lead_record(<?php echo $lla->lead_list_dupli_id; ?>);"><u><?php echo $lla->name; ?></u></a>
												<input type="hidden" name="lead_info_name_record" id="lead_info_name_record" value="<?php echo @$lla->name; ?>">
												<ul>
													<?php 
														$status_history1 = 0;
														foreach($lead_followup_history as $lfh) { 
															if($lfh->recepient_id == $lla->lead_list_dupli_id){
																$status_history1++;
															}
														}	
													?>
													<li class="position-relative"><a href="#" onclick="return get_followup_response(<?php echo $lla->lead_list_dupli_id; ?>)"><i class="fas fa-users"></i><span class="notifiecount"><?php echo $status_history1; ?></span></a></li>
													
													<?php 
														$status_history2 = 0;
														foreach($lead_followup_history_response as $lfhr) { 
															if($lfhr->recepient_id == $lla->lead_list_id){
																$status_history2++;
															}
														}	
													?>
													<li class="position-relative"><a href="#"><i class="foreachas fa-user-graduate"></i></a><span class="notifiecount"><?php echo $status_history2; ?></span></li>
													
													<li class="position-relative"><a href="#"><i class="fas fa-user-clock"></i></a><span class="notifiecount">104</span></li>
												</ul>
											</div>
										</li>
										<li>
											<span class="lead_info_title">Campaign Name</span>
											<p class="lead_info_text"><?php echo $lla->campaign_name; ?>
											
											</p>
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
												<a href="#" class="lead_info_text lead_student_info_copy" title="<?php echo $lla->mobile_no; ?>" onclick="return get_sms_template_record(<?php echo $lla->lead_list_id; ?>)"><?php echo $lla->mobile_no; ?></a>
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
											<p >
												<a  class="lead_info_text" href="#" onclick="return add_followup_lead_list(<?php echo $lla->lead_list_id;  ?>)" >
												<?php if(!empty($lla->next_followup_date)) { 
														$next_act=  $lla->next_followup_date;
														echo date('M',strtotime($next_act))."  ".date('d',strtotime($next_act)).",  ".date('Y',strtotime($next_act))." ".date('H:i A',strtotime($next_act)); 
												 } ?>
												</a>
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
											<a href="#" class="lead_info_text" onclick="return update_lead_record(<?php echo $lla->lead_list_id; ?>);"><?php echo substr($lla->any_remarks,0,25)."..."; ?></a>
										</li>
										<li>
											<span class="lead_info_title">Last Re-enquired</span>
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
        				<?php } else { ?>
        					<p>No Record Found</p>
        				<?php } ?>
						</div>
<script>

$(document).ready(function(){

	jQuery('.scrollbar-rail').scroll(function(){
		 var filter_name =  $('#start_date').val();
		 // alert(filter_name);
		 // console.log(filter_name);
		 var lastID = $('.load-more').attr('lastID'); 
		 // console.log(lastID);
		//   jQuery('.scrollbar-rail').scrollTop();
		// console.log("position="+pos);
		// // alert("position="+pos);
		// var do_he = jQuery(document).height();
		// console.log("document="+do_he);  
		// var sc_he = jQuery('.scrollbar-rail').height();
		// console.log("scroll_he="+sc_he);
		// var bottom = jQuery(document).height() - jQuery('.scrollbar-rail').height();
		// // alert("bot="+bottom);
		// console.log("lastId="+lastID);
		// console.log(bottom);
		// if((jQuery('.scrollbar-rail').scrollTop() == jQuery(document).height() - jQuery('.scrollbar-rail').height()) && (lastID != 0))
		var innerHeight = ($(this).scrollTop() +  $(this).innerHeight())+10;
		// console.log($(this)[0].scrollHeight);
		if((innerHeight >=  $(this)[0].scrollHeight) && lastID != 0 )
		{
			console.log("test");
			$.ajax({
                type:'POST',
                url:"<?php echo base_url(); ?>LeadMyActivity/loadMoreData",
                data:{
                	'id': lastID,
                	'start_date' : filter_name
                },
                beforeSend:function(){
                    $('.load-more').show();
                },
                success:function(html){
                    $('.load-more').remove();
                    $('.full_lead_block').append(html);
                }
            });
		}
  		// alert("bottom="+bottom);

	});
 

 
});


</script>
