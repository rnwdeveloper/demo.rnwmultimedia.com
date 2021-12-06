<style>
   #side_lead_response{
   position: absolute;
   top :0;
   right: 0;
   z-index: 1000000000;
   padding:10px;
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
                                 <input type="text" name="searching_form" id="searching_form" class="form-control" placeholder="Search by Name, Email or Mobile">
                                 <button type="button" class="btn btn-primary" onclick="return submit_searching()"><i class="fa fa-search"></i></button>
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
                                                <label>Prospect Name:</label><a href="#" title="Click to Change Status"><u>Nakrani  payl R. </u></a>
                                             </li>
                                             <li>
                                                <label>When:</label><a href="#" title="Click to Postpone the Activity"><u>(18 hours and 30 minutes ago) May 4, 2020 2:31 PM</u></a>
                                             </li>
                                          </ul>
                                          <ul>
                                             <li>
                                                <label>Followup Type:</label>
                                                <p>Schedule Walk-Ins</p>
                                             </li>
                                             <li>
                                                <label>Prospect Name:</label><a href="#" title="Click to Change Status"><u>Nakrani  payl R. </u></a>
                                             </li>
                                             <li>
                                                <label>When:</label><a href="#" title="Click to Postpone the Activity"><u>(18 hours and 30 minutes ago) May 4, 2020 2:31 PM</u></a>
                                             </li>
                                          </ul>
                                          <ul>
                                             <li>
                                                <label>Followup Type:</label>
                                                <p>Schedule Walk-Ins</p>
                                             </li>
                                             <li>
                                                <label>Prospect Name:</label><a href="#" title="Click to Change Status"><u>Nakrani  payl R. </u></a>
                                             </li>
                                             <li>
                                                <label>When:</label><a href="#" title="Click to Postpone the Activity"><u>(18 hours and 30 minutes ago) May 4, 2020 2:31 PM</u></a>
                                             </li>
                                          </ul>
                                          <ul>
                                             <li>
                                                <label>Followup Type:</label>
                                                <p>Schedule Walk-Ins</p>
                                             </li>
                                             <li>
                                                <label>Prospect Name:</label><a href="#" title="Click to Change Status"><u>Nakrani  payl R. </u></a>
                                             </li>
                                             <li>
                                                <label>When:</label><a href="#" title="Click to Postpone the Activity"><u>(18 hours and 30 minutes ago) May 4, 2020 2:31 PM</u></a>
                                             </li>
                                          </ul>
                                          <ul>
                                             <li>
                                                <label>Followup Type:</label>
                                                <p>Schedule Walk-Ins</p>
                                             </li>
                                             <li>
                                                <label>Prospect Name:</label><a href="#" title="Click to Change Status"><u>Nakrani  payl R. </u></a>
                                             </li>
                                             <li>
                                                <label>When:</label><a href="#" title="Click to Postpone the Activity"><u>(18 hours and 30 minutes ago) May 4, 2020 2:31 PM</u></a>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <a href="#" data-toggle="modal" data-target="#leed_add_modal" ><i class="fas fa-plus"></i></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="extra_lead_menu d-inline-block w-100 position-relative">
                     <ul>
                        <input type="hidden" name='filtering_type' id="filtering_type" value="<?php echo $class_type; ?>" >
                        <?php 
                           // echo "<pre>";
                           
                           // print_r($status_wise);
                           
                               foreach($status_wise as $k=>$v){ 
                           
                           		@$key =  explode('-',$k); @$key1 =  explode(' ',$key[1]); ?>
                        <li><a  href="<?php echo base_url(); ?>LeadlistController/index?status=<?php echo @$key1[1]; ?>" class="<?php if($class_type == trim($key1[1])){ echo "active"; }?>"><?php echo $key[1]; ?> (<?php echo $v; ?>)</a></li>
                        <?php } ?>
                        <!-- 				<li><a href="#">Urgent Call (33)</a></li>
                           <li><a href="#">Follow-up (77)</a></li>
                           
                           <li><a href="#">Email (0)</a></li>
                           
                           <li><a href="#">Walkin (3)</a></li>
                           
                           <li><a href="#">Confused (0)</a></li>
                           
                           <li><a href="#">Demo (0)</a></li>
                           
                           <li><a href="#">Enrolled (24)</a></li>
                           
                           <li><a href="#">Closed (56)</a></li>
                           
                           <li><a href="#">Referred From Me (6686)</a></li>
                           
                           <li><a href="#">Re-Enquired (0)</a></li> -->
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
                  <div class="full_lead_block scrollbar-rail d-inline-block w-100 position-relative">
                     <?php 
                        if(!empty($lead_list_all)){
                        
                        foreach($lead_list_all as $lla) { ?>
                     <div class="lead_block_box">
                        <div class="lead_small_box lead_small_box_first">
                           <ul>
                              <li class="prospect_neme_first_list">
                                 <span class="lead_info_title">Prospect Name <span class="prospect_neme">0</span></span>
                                 <div class="lead_info_text position-relative ">
                                    <a href="#" class="lead_info_text"  onclick="return update_lead_record(<?php echo $lla->lead_list_id; ?>);"><u><?php echo $lla->name; ?></u></a>
                                    <input type="hidden" name="lead_info_name_record" id="lead_info_name_record" value="<?php echo @$lla->name; ?>">
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
                                    <?php foreach($source_list as $sl) { if($sl->source_name == $lla->source_id) { echo $sl->source_name; } } ?>
                                 </p>
                              </li>
                              <li>
                                 <span class="lead_info_title">Branch</span>
                                 <p class="lead_info_text">
                                    <!-- <?php echo $lla->branch_id; ?> -->
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
                                       echo $lla->status; ?></a> 
                                 </p>
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
                                       
                                       
                                       
                                       ?>
                                 </p>
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
                                       <a href="https://api.whatsapp.com/send?phone=91<?php echo $lla->mobile_no; ?>" title="Sent Whatsapp Message"><i class="fab fa-whatsapp"></i></a>
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
                     <?php $lastId = $lla->lead_list_id; ?>
                     <?php } ?>
                     <div class="load-more" lastID="<?php echo $lastId; ?>" style="display: none;">
                        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"/> Loading more posts...
                     </div>
                     <?php } else { ?>
                     <p>No Record Found</p>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <div class="new_lead_genered_btn">
      <a href="javascript:void(0)" class="create_new_lead plus_button" onclick="return get_side_bar_modal()"><i class="fas fa-plus"></i></a>
   </div>
   <?php //echo "<pre>"; print_r($_SESSION['Admin']['role']); 
      if(@$_SESSION['Admin']['role'] == 'Super Admin') { ?>
   <div class="new_lead_genered_btn_upload" style="top:400px;">
      <a href="javascript:void(0)" class="create_new_lead_upload plus_button" data-toggle="modal" data-target="#upload_data_modal"><i class="fas fa-arrow-up"></i></a>
   </div>
   <?php } ?>
   <div id="side_lead_response"></div>
</main>
<div class="right_side d-inline-block">
   <section class="right_side_header d-inline-block w-100 position-relative">
      <div class="container-fluid" id="update_lead_record_click_name">
         <div class="row">
            <div class="col-xl-12">
               <div class="modal-header px-0">
                  <h5 class="modal-title"><span id="change_lead_status">Add New Lead</span>&nbsp;<span id="add_lead_name_fast"></span></h5>
                  <button type="button" class="close close_side_bar" onclick="return close_right_side_bar()">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <form method="post" id="lead_list_form_side_bar" class="view_hide_side_bar">
                  <div class="fill_new_leade_info_body" id="create_leade">
                     <div class="right_side_row_panel">
                        <a href="#candidate_details" data-toggle="collapse" class="collapsed"><i class="fas fa-chevron-down"></i> Lead Details</a>
                        <div class="right_side_row_panel_block collapse show" id="candidate_details" data-parent="#create_leade">
                           <div class="new_lead_info_fill" id="first_first_right_side">
                              <h6 class="lead_fill_title">Step 1 - Enter Prospect details (Either Email or Mobile is mandatory.).*</h6>
                              <div class="form-group" >
                                 <input  type="hidden" maxlength="50" class="form-control" id="lead_list_id"  name="lead_list_id" readonly>
                                 <?php @$session_record =  @$_SESSION['Admin'];
                                    ?>
                                 <input  type="hidden"  class="form-control" id="user_role_name"  name="user_role_name" value="<?php echo @$session_record['name']; ?>" readonly>
                                 <label>Name<span style="color:red">*</span></label>
                                 <input required type="text" maxlength="50" class="form-control" id="name" placeholder="Enter Name" name="name" onkeyup="return get_prospect_name()">
                              </div>
                              <div class="form-group">
                                 <label>SurName<span style="color:red"></span></label>
                                 <input type="text" maxlength="50" class="form-control" id="surname" placeholder="Enter Surname" name="surname" >
                              </div>
                              <div class="form-group">
                                 <label>Select Gender<span style="color:red">*</span></label><br>
                                 <input type="radio" maxlength="50"  id="gender_male"  name="gender"  value="male" required>Male
                                 <input type="radio" maxlength="50" id="gender_female"  name="gender"  value="female" required>Female
                                 <input type="radio" maxlength="50" id="gender_other"  name="gender"  value="Other" required>Other
                              </div>
                              <div class="form-group">
                                 <label>Email<span style="color:red"></span></label>
                                 <input type="text" maxlength="100" class="form-control" id="email" placeholder="Email" data-api-attached="true" name="email">
                              </div>
                              <div class="form-group">
                                 <label>Mobile<span style="color:red">*</span></label>
                                 <input type="tel" maxlength="13" class="form-control" min="0" id="mobile_no" placeholder="Mobile" data-api-attached="true" name="mobile_no">
                              </div>
                           </div>
                           <div class="new_lead_info_fill" id="first_second_right_side">
                              <h6 class="lead_fill_title">Step 2 - Select appropriate values to add basic Lead details.*</h6>
                              <div class="form-group">
                                 <label>Campaign Name</label>
                                 <input type="text" class="form-control" id="leadName" placeholder="Campaign Name" value="Manually Added" autocomplete="off" name="campaign_name">
                              </div>
                              <div class="form-group">
                                 <label>Channel</label>
                                 <select class="form-control" name="channel_id" id="channel_id" onchange="return get_source()">
                                    <option value="">Select Channel</option>
                                    <?php foreach($channel_list as $cl) { ?>
                                    <option value="<?php echo $cl->channel_name; ?>"><?php echo $cl->channel_name; ?></option>
                                    <?php  } ?>
                                 </select>
                              </div>
                              <div class="form-group" id="source_record">
                                 <label>Source<span style="color:red">*</span></label>
                                 <select class="form-control" name="source_id" id="source_id">
                                    <option value="">Select Source</option>
                                    <?php foreach($source_list as $sl) { ?>
                                    <option value="<?php echo $sl->source_name; ?>"><?php echo $sl->source_name; ?></option>
                                    <?php  } ?>
                                 </select>
                              </div>
                              <div class="form-group" id="school_college_name">
                                 <label>Last School / College Name <span style="color:red">*</span></label>
                                 <select class="form-control" name="school_college_id" id="school_college_id">
                                    <option value="">Select School/College</option>
                                    <?php foreach($college_school_list as $csl) { ?>
                                    <option value="<?php echo $csl->school_name; ?>"><?php echo $csl->school_name; ?></option>
                                    <?php  } ?>
                                 </select>
                                 <!-- <input type="text" name="school_college_id" id="school_college_id"> -->
                              </div>
                              <div class="form-group">
                                 <label>Source Remarks</label>
                                 <input type="text"  class="form-control"  id="source_remark" placeholder="source Remarks" data-api-attached="true" name="source_remark">
                              </div>
                              <div class="form-group" id="source_record">
                                 <label>Priority</label>
                                 <select class="form-control" name="priority" id="priority">
                                    <option value="">Select Priority</option>
                                    <option value="Hot">Hot</option>
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
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
                              <?php  $username =  $_SESSION['Admin']['username']; ?>
                              <div class="form-group" id="source_record">
                                 <label>Referred To</label>
                                 <select class="form-control" name="referred_to" id="referred_to">
                                    <!-- <option value="">e</option> -->
                                    <?php foreach($counselor_record as $cr) { ?>
                                    <option <?php if($cr->name == "$username") { echo "selected"; } ?> value="<?php echo $cr->name; ?>"><?php echo $cr->name; ?></option>
                                    <?php } ?>
                                    <option <?php if($username == 'Hitesh Desai') { echo "selected"; } ?> value="Hitesh Desai">Hitesh Desai</option>
                                    <!-- <option value="Jaydip Dave">Jaydip Dave</option>
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
                                       
                                       <option value="Test Mobile">Test Mobile</option> -->
                                 </select>
                              </div>
                           </div>
                           <div class="new_lead_info_fill" id="first_third_right_side">
                              <h6 class="lead_fill_title" id="lead_third_fill_title">Step 3 - Select appropriate Followup details.*</h6>
                              <div class="form-group">
                                 <label>Status</label>
                                 <select class="form-control" name="status" id="status" onchange="return get_status_followup()">
                                    <option value="">Select Status</option>
                                    <?php foreach($list_status_followup as $lsf) { ?>
                                    <option value="<?php echo $lsf->followup_type_name; ?>"><?php echo $lsf->followup_type_name; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group" id="substatus_record">
                                 <label>Sub -  Status</label>
                                 <select class="form-control" name="sub_status" id="sub_status">
                                    <option value="">Select Sub - Status</option>
                                    <?php foreach($list_substatus_followup as $lssf) { ?>
                                    <option value="<?php echo $lssf->sub_type_name; ?>"><?php echo $lssf->sub_type_name; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group" id="third_followup_mode">
                                 <label>Followup Mode</label>
                                 <select class="form-control" name="followup_mode" id="followup_mode" onchange="//return get_status_followup()">
                                    <option value="">Select Followup Mode</option>
                                    <?php foreach($followupmode as $fm) { ?>
                                    <option value="<?php echo $fm->follow_up_mode_name; ?>"><?php echo $fm->follow_up_mode_name; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group" id="existing_follow_up_your">
                                 <label>Do you want to add or update your existing follow up?*</label>
                                 <select class="form-control" name="existing_follow_up" id="existing_follow_up">
                                    <!-- <option value="">Select Followup Mode</option> -->
                                    <option value="Schedule Walk-Ins">Schedule Walk-Ins</option>
                                    <option value="Manual - Take Follow Up Call">Manual - Take Follow Up Call</option>
                                 </select>
                              </div>
                              <div class="form-group" id="next_follow_up_date12">
                                 <label>Next Followup Date</label>
                                 <input type="text" class="form-control" 
                                    id="next_followup_date"  name="next_followup_date">
                              </div>
                              <div class="form-group" id="next_follow_up_time12">
                                 <label>Next Followup Time</label>
                                 <input type="time" class="form-control" id="next_followup_time"  name="next_followup_time" datetime="hour">
                              </div>
                              <div class="form-group" id="next_follow_up_remarks12">
                                 <label>Followup Remarks</label>
                                 <textarea   class="form-control" rows="8" id="followup_remark" placeholder="Enter Remarks"  name="followup_remark"></textarea>
                              </div>
                           </div>
                           <div class="new_lead_info_fill" id="first_forth_right_side">
                              <h6 class="lead_fill_title">Step 4 - Select Course details.*</h6>
                              <div class="form-group">
                                 <label>State</label>
                                 <select class="form-control" name="state" id="state" onchange="return get_status_followup()">
                                    <option value="">Select state</option>
                                    <?php foreach($list_state as $ls) { ?>
                                    <option value="<?php echo $ls->state_name; ?>" <?php if("Gujarat"==$ls->state_name){ echo "selected"; } ?>><?php echo $ls->state_name; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group" id="substatus_record">
                                 <label>Select City</label>
                                 <select class="form-control" name="city" id="city">
                                    <option value="">Select City</option>
                                    <?php foreach($list_city as $lc) { ?>
                                    <option value="<?php echo $lc->city_name; ?>" <?php if("Surat"==$lc->city_name) { echo "selected"; }?>><?php echo $lc->city_name; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group" id="substatus_record">
                                 <label>Select Area</label>
                                 <select class="form-control" name="area" id="area">
                                    <option value="">Select Area</option>
                                    <?php foreach($list_area as $la) { ?>
                                    <option value="<?php echo $la->area_name; ?>" ><?php echo $la->area_name; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Branch<span style="color:red">*</span></label>
                                 <select class="form-control" name="branch_id" id="branch_id" onchange="return get_status_department()">
                                    <!-- <option value="">Select Branch</option> -->
                                    <option value="Not Known">Not Known</option>
                                    <?php foreach($list_branch as $br) { ?>
                                    <option value="<?php echo $br->branch_id; ?>"><?php echo $br->branch_code; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group" id="department_data">
                                 <label>Department<span style="color:red">*</span></label>
                                 <select class="form-control" name="department" id="department">
                                    <option value="">Select Department</option>
                                    <?php foreach($list_department as $ld) { ?>
                                    <option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Select Course Package</label><br>
                                 <input type="radio" maxlength="50"  id="course_package"  name="course_package"  value="package" checked 
                                    onclick="return get_course_package('package')">Package
                                 <input type="radio" maxlength="50" id="course_single"  name="course_package"  value="single"  onclick="return get_course_package('single')">Single
                              </div>
                              <div class="form-group select_course_package" id="select_course_package">
                                 <label>Select Pacakge<span style="color:red">*</span></label>
                                 <select class="form-control" name="course_or_package1" id="course_orpackage">
                                    <option value="">Select Package</option>
                                    <option value="Not Known">Not Known</option>
                                    <?php foreach($list_package as $lp) { ?>
                                    <option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group select_course_single" id="select_course_single">
                                 <label>Select Course<span style="color:red">*</span></label>
                                 <select class="form-control" name="course_or_package2" id="course_orsingle" >
                                    <option value="">Select Course</option>
                                    <option value="Not Known">Not Known</option>
                                    <?php foreach($list_course as $lp) { ?>
                                    <option value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="new_lead_info_fill" id="first_fifth_right_side">
                              <h6 class="lead_fill_title">Step 5 - Any Further Remarks*</h6>
                              <div class="form-group">
                                 <label>Remarks<span style="color:red">*</span></label>
                                 <textarea  rows="9" class="form-control"  id="any_remarks" placeholder="Enter Remarks"  name="any_remarks">
                                 Date: <?php date_default_timezone_set("Asia/Calcutta");
                                    echo  date('m/d/Y h:i A')."<br>"; ?>
                                 </textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="right_side_row_panel" id="second_right_side">
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
                     <div class="right_side_row_panel" id="third_right_side">
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
                     <div id="history_lead">
                     </div>
                  </div>
                  <div class="lead_save_btn">
                     <div class="btn-group w-100">
                        <button type="button" class="btn btn-danger" onclick="return close_right_side_bar()">CANCEL</button>
                        <input type="submit" name="submit"  value="Add LEAD" id="add_lead" class="btn btn-success">
                        <input type="submit" name="submit"  value="Edit Lead" id="edit_lead" class="btn btn-success">
                     </div>
                  </div>
               </form>
               <form method="post" id="lead_list_email_template"  style="position: relative;">
                  <div class="email_template_view" style="padding:0.4rem 0.4rem 0.4rem 0.4rem">
                     <div class="form-group">
                        <input type="checkbox" name="email_id_send" id="primary_email" class="" checked><span>Primary Email</span><br>
                        <input type="checkbox" name="father_email" id="father_email" class="" disabled><span>Father's Email</span>
                        <br><input type="checkbox" name="email_id_send" id="guardian_email" class="" disabled ><span>Guardian's Email</span><br>
                        <input type="checkbox" name="father_email" class="" id="alternate_email" disabled><span>Alternate Email</span>
                        <input type="hidden" name="email_recepient_id" id="email_recepient_id" >
                     </div>
                     <div class="form-group">
                        <label>Select Email Template<span style="color:red">*</span></label>
                        <select name="email_template" id="email_template" class="form-control" onchange="return get_email_template();">
                           <option value="">Select Email Template</option>
                           <?php foreach($list_email_template as $lt) { ?>
                           <option value="<?php echo $lt->id; ?>"><?php echo $lt->category; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Subject<span style="color:red">*</span></label>
                        <input type="text" name="email_subject" id="email_subject" class="form-control">
                        <div class="email_subject_error"></div>
                     </div>
                     <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="lead_form_record_result">
                           <div class="modal-content">
               <form  method="post" id="quick_lead_list_form" name="quick_lead_list_form">
               <div class="modal-body">
               <div class="row">
               <div class="col-xl-12">
               <div class="form-group">
               <label>Compose Email</label>
               <textarea style="height:500px;" class="form-control"   id="email_compose_Textarea" name="email_compose_Textarea"></textarea>
               </div>
               </div>
               </div>
               </div>
               <div class="modal-footer">
               <input type="submit" name="submit" value="submit" class="btn btn-primary">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
               </form>
               </div>
               </div>
               </div>
               <div class="form-group">
               <div class="gmail_button" style="height: 70px;width: 70px;background-color: orange;float:right;border-radius: 50%; margin-top: 20px; cursor:crosshair;">
               <!-- <a href="#" data-toggle="modal" data-target="#compose_email_template" style="color:white; font-size: 40px;  margin-left:18px;margin-top:20px;"> -->
               <a href="#" data-toggle="modal" data-target="#myModal" style="color:white; font-size: 40px;  margin-left:18px;margin-top:20px;" id="mymodal1">
               <i class="fas fa-envelope"></i>
               </a>
               </div>
               <div class="email_compose_Textarea_error"></div>
               </div>
               <div class="form-group" style=" " id="send_email_button_show">
               <input type="button" name="submit" value="cancel" style="font-size: 20px;padding:2rem 2.3rem 2rem 2.3rem; background-color: white; color:black; border:none;margin-top:240px;line-height: 3px;position: absolute; display: inline-block; left:-15px">
               <input type="button" name="submit" id="send_email_template_button" value="Send Email" onclick="return send_email_data();" style="font-size: 20px;padding:2rem 2rem 2rem 2rem; background-color: orange; color:white; border:none;margin-top:240px;margin-left:110px;line-height: 3px;position: absolute; display: inline-block;"><i class="fa fa-spinner fa-spin" style="position: absolute;margin-top:264px;margin-left:122px; font-size: 20px; color: white;"></i>
               <!-- <input type="button" name="submit" value="Send Email" style="font-size: 18p"> -->
               </div>
               </div>
               </form>
               <form method="post" id="lead_list_sms_template"  style="position: relative;">
                  <div class="sms_template_view" style="padding:0.4rem 0.4rem 0.4rem 0.4rem">
                     <div class="form-group">
                        <input type="checkbox" name="primary_sms" id="primary_sms" class="" checked><span>Primary Sms</span><br>
                        <input type="checkbox" name="father_sms" id="father_sms" class="" disabled><span>Father's Sms</span>
                        <br><input type="checkbox" name="guardian_sms" id="guardian_sms" class="" disabled ><span>Guardian's Sms</span><br>
                        <input type="checkbox" name="alernate_sms" class="" id="alternate_sms" disabled><span>Alternate Sms</span>
                        <input type="hidden" name="sms_recepient_id" id="sms_recepient_id" >
                     </div>
                     <div class="form-group">
                        <label>Select SMS Template<span style="color:red">*</span></label>
                        <select name="sms_template" id="sms_template" class="form-control" onchange="return get_sms_template();">
                           <option value="">Select SMS Template</option>
                           <!-- <option value="first sms">First SMS</option>
                              <option value="Second sms">Second SMS</option> -->
                           <?php foreach($sms_template_list as $lt) { ?>
                           <option value="<?php echo $lt->category; ?>"><?php echo $lt->category; ?></option>
                           <?php } ?> 
                        </select>
                        <div class="sms_template_error"></div>
                     </div>
                     <div class="form-group">
                        <label>SMS Template</label>
                        <textarea style="height:200px;" class="form-control"   id="sms_compose_Textarea" name="sms_compose_Textarea"></textarea>
                        <div class="sms_compose_Textarea_error"></div>
                     </div>
                     <div class="form-group" style=" " id="send_email_button_show">
                        <input type="button" name="submit" value="cancel" style="font-size: 20px;padding:2rem 2.3rem 2rem 2.3rem; background-color: white; color:black; border:none;margin-top:25px;line-height: 3px;position: absolute; display: inline-block; left:-15px">
                        <input type="button" name="submit" id="send_email_template_button" value="Send SMS" onclick="return send_sms_data();" style="font-size: 20px;padding:2rem 2rem 2rem 2rem; background-color: orange; color:white; border:none;margin-top:25px;margin-left:110px;line-height: 3px;position: absolute; display: inline-block;"><i class="fa fa-spinner fa-spin" style="position: absolute;margin-top:25px;margin-left:122px; font-size: 20px; color: white;"></i>
                        <!-- <input type="button" name="submit" value="Send Email" style="font-size: 18p"> -->
                     </div>
                  </div>
               </form>
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
<!--  show followup modal and popup -->
<div class="modal fade" id="click_followup_remark_record">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="change_type_name">Email</h5>
            <br>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p id="subject_fol" style="color:grey;font-size: 16px;">Subject : <span id="followup_subject_name"></span></p>
            <hr>
            <p id="sender_type_name"> Sender Name : info@rnwmultimedia.com</p>
            <div  id="followup_remark_modal" style="width: 100%; height: auto;"></div>
         </div>
         <div class="modal-footer">
            <!-- <button type="button" class="btn btn-primary">Add Camping</button> -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- end followup modal and popup -->
<!--   Quick Lead Add Modal start -->
<div class="modal fade" id="leed_add_modal">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="lead_form_record_result">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Quick Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form  method="post" id="quick_lead_list_form" name="quick_lead_list_form">
            <div id="quick_lead_response"></div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <div><span><label for="FirstName">Full Name<i class="required">*</i></label><input type="text" maxlength="50" class="form-control" id="quick_name" placeholder="Full Name" name="quick_name" ></span></div>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Email</label>
                        <input type="text" maxlength="100" class="form-control" id="quick_email" placeholder="Email" data-api-attached="true" name="quick_email">
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Mobile*</label>
                        <input type="tel" maxlength="13" min="0" class="form-control" id="quick_mobile_no" placeholder="Mobile" data-api-attached="true" name="quick_mobile_no">
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Source*</label>
                        <select class="form-control" id="quick_source_id" name="quick_source_id">
                           <option value="">Select Source</option>
                           <?php foreach($source_list as $sl) { ?>
                           <option value="<?php echo $sl->source_name;  ?>"><?php echo $sl->source_name; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Branch*</label>
                        <select class="form-control" id="quick_branch_id" name="quick_branch_id" onchange="return get_department_record()">
                           <option value=''>Select Branch</option>
                           <?php foreach($list_branch as $lb) {  ?>
                           <option value="<?php echo $lb->branch_id; ?>"><?php echo $lb->branch_code; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group" id="department_data_quick">
                        <label>Department*</label>
                        <select class="form-control" id="quick_department_id" name="quick_department_id">
                           <option value="">Select Department</option>
                           <?php foreach($list_department as $ld) { ?>
                           <option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Select Course Package</label><br>
                        <input type="radio" maxlength="50"  id="quick_course_package"  name="quick_course_package"  value="package" checked 
                           onclick="return get_course_package_quick('package')">Package
                        <input type="radio" maxlength="50" id="quick_course_package"  name="quick_course_package"  value="single"  onclick="return get_course_package_quick('single')">Single
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group" id="select_course_package_quick">
                        <label>Course*</label>
                        <select class="form-control" id="quick_package" name="quick_package">
                           <option value="">Select Package</option>
                           <?php foreach($list_package as $lp) { ?>
                           <option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-12">
                     <div class="form-group">
                        <label>Remarks</label>
                        <textarea class="form-control" rows="3" placeholder="Remarks" id="quick_remark" name="quick_remark"></textarea>
                     </div>
                  </div>
                  <div class="col-xl-6">
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="quick_send_email" name="quick_send_email" value="send email" checked="checked" >
                        <label class="form-check-label" for="inlineCheckbox1">Send Welcome Email</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"id="quick_send_sms" name="quick_send_sms" value="send sms" checked="checked">
                        <label class="form-check-label" for="inlineCheckbox2">Send Welcome Sms</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="submit" name="submit" value="submit" class="btn btn-primary"><i class="fa fa-spinner fa-spin"></i>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!--   Quick Lead Add Modal End  -->
<!--    Upload data  -->
<div class="modal fade" id="upload_data_modal">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="lead_form_record_result">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" style="font-weight: bold;font-size: 20px;">Upload Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form  method="post" id="upload_lead_data" name="upload_lead_data" enctype="multipart/form-data">
            <div id="upload_lead_response"></div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Channel*</label>
                        <select class="form-control" id="upload_channel" name="upload_channel">
                           <option value="">Select Channel</option>
                           <?php foreach($channel_list as $cl) { ?>
                           <option value="<?php echo $cl->channel_name; ?>"><?php echo $cl->channel_name; ?></option>
                           <?php  } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Priotiry</label>
                        <select class="form-control" id="upload_priority" name="upload_priority">
                           <option value="">Select Priority</option>
                           <option value="Hot">Hot</option>
                           <option value="Low">Low</option>
                           <option value="Medium">Medium</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group" >
                        <label>Status</label>
                        <select class="form-control" id="upload_status" name="upload_status" onchange="return get_status_followup_upload()">
                           <option value="">Select Status</option>
                           <?php foreach($list_status_followup as $lsf) { ?>
                           <option value="<?php echo $lsf->followup_type_name; ?>"><?php echo $lsf->followup_type_name; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group" id="upload_substatus_record">
                        <label>Sub Status</label>
                        <select class="form-control" id="upload_sub_status" name="upload_sub_status">
                           <option value="">Select Sub Status</option>
                           <?php foreach($list_substatus_followup as $lssf) { ?>
                           <option value="<?php echo $lssf->sub_type_name; ?>"><?php echo $lssf->sub_type_name; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Referred To</label>
                        <select class="form-control" id="upload_referred_to" name="upload_referred_to">
                           <option value="">Select</option>
                           <?php foreach($counselor_record as $cr) { ?>
                           <option <?php if($cr->name == "$username") { echo "selected"; } ?> value="<?php echo $cr->name; ?>"><?php echo $cr->name; ?></option>
                           <?php } ?>
                           <option <?php if($username == 'Hitesh Desai') { echo "selected"; } ?> value="Hitesh Desai">Hitesh Desai</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Last School/College Name</label>
                        <select class="form-control" id="upload_last_school_college" name="upload_last_school_college">
                           <option value="">Select School/College</option>
                           <?php foreach($college_school_list as $csl) { ?>
                           <option value="<?php echo $csl->school_name; ?>"><?php echo $csl->school_name; ?></option>
                           <?php  } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Select Branch</label>
                        <select class="form-control" id="upload_branch" name="upload_branch" onchange="return get_status_department_upload()">
                           <option value="Not Known">Not Known</option>
                           <?php foreach($list_branch as $br) { ?>
                           <option value="<?php echo $br->branch_id; ?>"><?php echo $br->branch_code; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group" id="upload_department_data">
                        <label>Select Department</label>
                        <select class="form-control" id="upload_department" name="upload_department">
                           <?php foreach($list_department as $ld) { ?>
                           <option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Select Course Package</label><br>
                        <input type="radio" maxlength="50"  id="upload_course_package"  name="upload_course_package"  value="package" checked 
                           onclick="return get_course_package_upload('package')">Package
                        <input type="radio" maxlength="50" id="upload_course_package"  name="upload_course_package"  value="single"  onclick="return get_course_package_upload('single')">Single
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group select_course_package" id="upload_select_course_package">
                        <label>Select Pacakge<span style="color:red">*</span></label>
                        <select class="form-control" name="course_or_package1_upload" id="course_orpackage_upload">
                           <option value="">Select Package</option>
                           <option value="Not Known">Not Known</option>
                           <?php foreach($list_package as $lp) { ?>
                           <option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                     <div class="form-group select_course_single" id="upload_select_course_single">
                        <label>Select Course<span style="color:red">*</span></label>
                        <select class="form-control" name="course_or_package2_upload" id="course_orsingle_upload" >
                           <option value="">Select Course</option>
                           <option value="Not Known">Not Known</option>
                           <?php foreach($list_course as $lp) { ?>
                           <option value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Select State</label>
                        <select class="form-control" id="upload_state" name="upload_state">
                           <option value="">Select state</option>
                           <?php foreach($list_state as $ls) { ?>
                           <option value="<?php echo $ls->state_name; ?>" <?php if("Gujarat"==$ls->state_name){ echo "selected"; } ?>><?php echo $ls->state_name; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                     <div class="form-group">
                        <label>Select City</label>
                        <select class="form-control" id="upload_city" name="upload_city">
                           <option value="">Select City</option>
                           <?php foreach($list_city as $lc) { ?>
                           <option value="<?php echo $lc->city_name; ?>" <?php if("Surat"==$lc->city_name) { echo "selected"; }?>><?php echo $lc->city_name; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  </hr>
                  <div class="col-xl-8 col-lg-8">
                     <div class="form-group">
                        <label style="font-weight: bold;font-size: 20px; border:none;">Upload File With Prospect Candidate Details </label>
                        <input type="file"  class="form-control" id="csv_data"  name="csv_data" data-api-attached="true" style="border:none;" >
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4">
                     <div class="form-group" >
                        <a href="javascript:Download_file()" title="Download Template" style="font-size: 30px; margin-top:10px; color:black"><i class="fa fa-arrow-circle-down" ></i></a>
                     </div>
                  </div>
                  <div class="col-xl-12">
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="quick_send_email" name="quick_send_email" value="send email" checked="checked" >
                        <label class="form-check-label" for="inlineCheckbox1">Send Welcome Email</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"id="quick_send_sms" name="quick_send_sms" value="send sms" checked="checked">
                        <label class="form-check-label" for="inlineCheckbox2">Send Welcome Sms</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <div class="upload_data_successfully alert alert-success"></div>
               <div class="Someting_wrong_upload alert alert-danger"></div>
               <input type="submit" name="upload_data" value="import Data" class="btn btn-primary upload_import_data"><i class="fa fa-spinner fa-spin"></i>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- end upload data-->
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="https://cdn.tiny.cloud/1/n9ury2u6quy5yo8n0ij8xeo7agd9310wz8eb6t2ms04chtsd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
   
   				    selector: '#email_compose_Textarea',
   
   				  	plugins: [
   
   				      '  preview code',
   
   				      'searchreplace wordcount visualblocks visualchars  fullscreen',
   
   				      'insertdatetime media nonbreaking save  contextmenu directionality',
   
   				      'emoticons template imagetools'
   
   				    ],
   
   				  	toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
   
   				  	 toolbar2: 'preview media | forecolor backcolor emoticons',
   
   				  	 image_advtab: true,
   
   				  	 height:500
   
   				});
   
   
   
   
   
   // tinymce.init({
   
   // 				    selector: '#followup_remark_modal',
   
   // 				    plugins : [' preview code'],
   
   // 				  	menubar:false,
   
   //     				statusbar: false,
   
   // 				  	height:500
   
   // 				});
   
   
   
   // Prevent bootstrap dialog from blocking focusin
   
   $(document).on('focusin', function(e) {
   
       if ($(e.target).closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
   
   		e.stopImmediatePropagation();
   
   	}
   
   });
   
   
   
   $('#open').click(function() {
   
   	$("#dialog").modal({
   
   		width: 800
   
   	});
   
   });
   
</script>
<!-- 
   <script>
   
   tinymce.init({
   
       selector: '#email_compose_Textarea',
   
     	plugins: [
   
         'advlist autolink lists link image charmap print preview hr anchor pagebreak',
   
         'searchreplace wordcount visualblocks visualchars code fullscreen',
   
         'insertdatetime media nonbreaking save table contextmenu directionality',
   
         'emoticons template paste textcolor colorpicker textpattern imagetools'
   
       ],
   
     	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
   
     	 toolbar2: 'print preview media | forecolor backcolor emoticons',
   
     	 image_advtab: true
   
   });
   
   	</script>
   
   
   
   <script type="text/javascript">
   
   	$(document).ready(function() {
   
   		$('.sub_menu').click(function() {
   
   			$('.sub_menu').children("span").addClass('hiiamdown');
   
   		})
   
   	})
   
   </script> -->
<script>
   $(document).ready(function(){ 
   
   
   
      $("#mymodal1").click(function(){
   
         $(".modal-backdrop").css("z-index","2");
   
         $(".modal").css("z-index","3");
   
      });
   
   
   
   
   
   });
   
   
   
   	
</script>
<script> 
   $(document).ready(function() {
   
       $('#example').DataTable();
   
   } );
   
</script>
<script type="text/javascript">
   $(document).ready(function() {
   
     $('.toogle_btn').click(function() {
   
       $('.side_Menu').toggleClass("showsidebar");
   
       $('.main_content').toggleClass("showsidebar");
   
     })
   
   })
   
</script>
<script type="text/javascript">
   $( function() {
   
       $( "#datepicker" ).datepicker();
   
     } );
   
</script>
<script type="text/javascript">
   $(document).ready(function() {
   
     $(window).scroll(function() {
   
       var header = $('.top_header');
   
       var scroll = $(window).scrollTop();
   
   
   
       if (scroll >= 40) {
   
         header.addClass('fixed');
   
       }
   
       else{
   
         header.removeClass('fixed');
   
       }
   
     });
   
   
   
    
   
   });
   
   
   
   $(function () {
   
     $('[data-toggle="tooltip"]').tooltip()
   
   })
   
</script>
<script type="text/javascript">
   google.charts.load('visualization', "1", {
   
       packages: ['corechart']
   
   });
   
</script>
<script>
   if(document.getElementById("yellow") != null) {
   
    setTimeout(function() {
   
      document.getElementById('yellow').style.display = 'none';
   
    }, 3000);
   
   }
   
</script>
<script>
   $(document).ready(function(){
   
       $('[data-toggle="popover"]').popover();   
   
   });
   
</script>
<script type="text/javascript">
   $(document).ready(function() {
   
   	$('.toogle_btn').click(function() {
   
   		$('.side_Menu').toggleClass("showsidebar");
   
   		$('.main_content').toggleClass("showsidebar");
   
   	})
   
   })
   
</script>
<script type="text/javascript">
   $( function() {
   
       $( "#datepicker" ).datepicker();
   
     } );
   
</script>
<script type="text/javascript">
   $(document).ready(function() {
   
   	$(window).scroll(function() {
   
   		var header = $('.top_header');
   
   		var scroll = $(window).scrollTop();
   
   
   
   		if (scroll > 250) {
   
   			header.addClass('fixed');
   
   		}
   
   		else{
   
   			header.removeClass('fixed');
   
   		}
   
   	});
   
   });
   
   $(function () {
   
     $('[data-toggle="tooltip"]').tooltip()
   
   });
   
   
   
   function close_right_side_bar(){
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
   
   
   
   
   
   function get_source()
   
   {
   
   var channel_id= $('#channel_id').val();
   
   $.ajax({
   
   	url : "<?php echo base_url() ?>LeadlistController/get_source_data",
   
   	type : "Post",
   
   	data : {
   
   		'channel_id' : channel_id
   
   	},
   
   	success:function(Res)
   
   	{
   
   		$('#source_record').html(Res);
   
   	}
   
   });
   
   }
   
   
   
   function get_status_followup()
   
   {
   
   var status_followup =  $('#status').val();
   
   // alert(status_followup);
   
   if(status_followup == '1 - New' || status_followup == '8 - Closed' || status_followup =='7 - Enrolled'){
   
   	$('#existing_follow_up_your').hide();
   
   	$('#next_follow_up_date12').hide();
   
   	$('#next_follow_up_time12').hide();
   
   	$('#next_follow_up_remarks12').hide();
   
   }
   
   else
   
   {
   
   	$('#existing_follow_up_your').show();
   
   	$('#next_follow_up_date12').show();
   
   	$('#next_follow_up_time12').show();
   
   	$('#next_follow_up_remarks12').show();
   
   }
   
   $.ajax({
   
   	url : "<?php echo base_url() ?>LeadlistController/get_substatus_data",
   
   	type : "Post",
   
   	data : {
   
   		'status_id' : status_followup
   
   	},
   
   	success:function(Res)
   
   	{
   
   		$('#substatus_record').html(Res);
   
   	}
   
   });
   
   }
   
   
   
   function get_status_department()
   
   {
   
   var branch_id =  $('#branch_id').val();
   
   $.ajax({
   
   	url : "<?php echo base_url() ?>LeadlistController/get_department_data",
   
   	type : "Post",
   
   	data : {
   
   		'branch_id' : branch_id
   
   	},
   
   	success:function(Res)
   
   	{
   
   		$('#department_data').html(Res);
   
   	}
   
   });
   
   }
   
   
   
   
   
   function get_course_package(course)
   
   {
   
   // alert(course);
   
   $.ajax({
   
   	url : "<?php echo base_url() ?>LeadlistController/get_course_package_single",
   
   	type : "Post",
   
   	data : {
   
   		'course' : course
   
   	},
   
   	success:function(Res)
   
   	{
   
   		// alert(Res);
   
   		if(course == 'package'){
   
   			$('.select_course_package').show();
   
   			$('.select_course_single').hide();
   
   			$('#course_orsingle').val('Select Course');
   
   			$('#select_course_package').html(Res);
   
   		}
   
   		else
   
   		{
   
   			$('.select_course_package').hide();
   
   			$('.select_course_single').show();
   
   			$('#course_orpackage').val('Select Package');
   
   			$('#select_course_single').html(Res);	
   
   		}
   
   
   
   	}
   
   });	
   
   }
   
   function get_side_bar_modal(){
   
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
   
   		$('#change_lead_status').html("Add New Lead");	
   
   		$('#add_lead_name_fast').html('');
   
   		$("#lead_list_form_side_bar")[0].reset();
   
   		$('.create_new_lead_upload').hide();
   
   }
   
   
   
   
   
   
   
   $("#lead_list_form").submit(function(event){
   
   event.preventDefault(); //prevent default action 
   
   // var post_url = $(this).attr("action"); //get form action url
   
   // var request_method = $(this).attr("method"); //get form GET/POST method
   
   var form_data = $(this).serialize(); //Encode form elements for submission
   
   
   
   console.log(form_data);
   
   // $.ajax({
   
   // 	url : post_url,
   
   // 	type: request_method,
   
   // 	data : form_data
   
   // }).done(function(response){ //
   
   // 	$("#server-results").html(response);
   
   // });
   
   });
   
   
   
   function get_department_record()
   
   {
   
   var branch_id =  $('#quick_branch_id').val();
   
   $.ajax({
   
   	url : "<?php echo base_url() ?>LeadlistController/quick_get_department_data",
   
   	type : "Post",
   
   	data : {
   
   		'branch_id' : branch_id
   
   	},
   
   	success:function(Res)
   
   	{
   
   		$('#department_data_quick').html(Res);
   
   	}
   
   });
   
   }
   
   
   
   function get_course_package_quick(package)
   
   {
   
   $.ajax({
   
   	url : "<?php echo base_url() ?>LeadlistController/get_course_package_single_quick",
   
   	type : "Post",
   
   	data : {
   
   		'course' : package
   
   	},
   
   	success:function(Res)
   
   	{
   
   		$('#select_course_package_quick').html(Res);
   
   	}
   
   });
   
   }
   
   
   
   
   
   
   
   $("#quick_lead_list_form1234").submit(function(event){
   
   event.preventDefault(); //prevent default action 
   
   // var post_url = $(this).attr("action"); //get form action url
   
   // var request_method = $(this).attr("method"); //get form GET/POST method
   
   var name =  $('#quick_name').val();
   
   var email =  $('#quick_email').val();
   
   var mobile =  $('#quick_mobile_no').val();
   
   var source =  $('#quick_source_id').val();
   
   if(name == '' )
   
   {
   
   	$('#quick_name').html("Enter proper name");
   
   }
   
   else
   
   {
   
   
   
   	var form_data = $(this).serialize(); //Encode form elements for submission
   
   	
   
   	// console.log(form_data);
   
   	// $.ajax({
   
   
   
   	// 	url : post_url,
   
   	// 	type: request_method,
   
   	// 	data : form_data
   
   	// }).done(function(response){ //
   
   	// 	$("#server-results").html(response);
   
   	// });
   
   }
   
   
   
   });
   
</script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
   // just for the demos, avoids form submit
   
   $(document).ready(function(){
   
   	$('#lead_list_form_side_bar').validate({
   
   		rules: {
   
   			name :{
   
   				required :true
   
   			},
   
   			gender :{
   
   				required : true
   
   			},
   
   			mobile_no :{
   
   				required :true,
   
   				number : true,
   
   				minlength : 10,
   
   				maxlength :10
   
   			},
   
   			source_id :{
   
   				required :true
   
   			},
   
   			next_followup_date:{
   
   				required : true
   
   			},
   
   			next_followup_time:{
   
   				required : true
   
   			},
   
   			status:{
   
   				required :true
   
   			},
   
   			sub_status :{
   
   				required :true
   
   			},
   
   			branch_id:{
   
   				required :true
   
   			},
   
   			department:{
   
   				required :true
   
   			},
   
   			any_remarks :{
   
   				required :true
   
   			}
   
   		},
   
   		messages:{
   
   			name :{
   
   				required : "<div style='color:red'>Please Enter Name</div>"
   
   			},
   
   			gender:{
   
   				required : "<div style='color:red'>Please Select Gender</div>"
   
   			},
   
   			mobile_no :{
   
   				required : "<div style='color:red'>Please Enter Mobile Number</div>",
   
   				number : "<div style='color:red'>Please Enter Number</div>",
   
   				minlength : "<div style='color:red'>Minimum 10 digits</div>",
   
   				maxlength : "<div style='color:red'>Maximum 10 digits</div>",
   
   			},
   
   			source_id :{
   
   				required : "<div style='color:red'>Please Select Source</div>"
   
   			},
   
   			status :{
   
   				required :"<div style='color:red'>Please select Status</div>"
   
   			},
   
   			sub_status :{
   
   				required : "<div style='color:red'>Please select Sub-Status</div>"
   
   			},
   
   			next_followup_date:{
   
   				required : "<div style='color:red'>Select Next Action Date</div>"
   
   			},
   
   			next_followup_time:{
   
   				required : "<div style='color:red'>Select Next Action Time</div>"
   
   			},
   
   			branch_id:{
   
   				required : "<div style='color:red'>Please select branch</div>" 
   
   			},
   
   			department :{
   
   				required : "<div style='color:red'>Please select Department</div>"
   
   			},
   
   			any_remarks :{
   
   				required : "<div style='color:red'>Please Enter Remarks</div>" 
   
   			}
   
   		},
   
   		submitHandler: function() { 
   
      			event.preventDefault();
   
      			var form_data = $('#lead_list_form_side_bar').serialize();
   
      			console.log(form_data);
   
      			var filter_name =  $('#filtering_type').val(); 
   
      			
   
   			$.ajax({
   
   				url : "<?php echo base_url(); ?>LeadlistController/lead_list_add",
   
   				type : "POST",
   
   				data: form_data,
   
   				success:function(Res)
   
   				{
   
   					// alert(Res);
   
   
   
   					$('#add_lead_name_fast').html('');
   
   					$('#side_lead_response').fadeIn();
   
   					if(Res == '	1')
   
   					{
   
   						$('#side_lead_response').html("<div class='alert alert-success'>Lead Update Successfully</div>");
   
   
   
   					}
   
   					else if(Res == '	2')
   
   					{
   
   						$('#side_lead_response').html("<div class='alert alert-warning'>Lead Insert Successfully</div>");
   
   						$("#lead_list_form_side_bar")[0].reset();
   
   					}
   
   					else if(Res == '	0')
   
   					{
   
   						$('#side_lead_response').html("<div class='alert alert-danger'>Lead Already exist!! </div>");
   
   					}
   
   
   
   					// $("#lead_list_form_side_bar")[0].reset();
   
   						// setTimeout(function() {
   
       		// 				location.reload();
   
   						// }, 2000);
   
   				 	
   
   					$.ajax({
   
   						url 	: "<?php echo base_url(); ?>LeadlistController/index",
   
   						type 	: "POST",
   
   						data 	: { 'test' : 'test', 'status_f' : filter_name },
   
   						success : function(data)
   
   						{
   
   							$('.full_lead_block').html(data);
   
   						}
   
   					});
   
   					$('#side_lead_response').fadeOut(5000);
   
   				}
   
   			});
   
   		}
   
   	});
   
   
   
   
   
   
   
   
   
   
   
   $( "#quick_lead_list_form" ).validate({
   
     rules: {
   
       quick_name: {
   
         required: true,
   
         minlength : 2
   
       },
   
       quick_email :{
   
       	required : true,
   
       	email : true
   
       },
   
       quick_mobile_no : {
   
       	required :true,
   
       	number : true,
   
       	minlength :10,
   
       	maxlength :10
   
       },
   
       quick_source_id :{
   
       	required : true,
   
       },
   
       quick_branch_id :{
   
       	required : true,
   
       },
   
       quick_department_id : {
   
       	required :true,
   
       },
   
       quick_package :{
   
       	required :true
   
       },
   
       quick_remark :{
   
       	required : true,
   
       }
   
     },
   
     messages:{
   
     	quick_name:{
   
     		required : "<span style='color:red'>Please Enter Name</span>",
   
     		minlength : "<span style='color:red'>Minimum 2 characters required</span>"
   
     	},
   
     	quick_email : {
   
     		required : "<span style='color:red'>Please enter Email id</span>",
   
     		email : "<span style='color:red'>Please enter Valid Email Id</span>"
   
     	},
   
     	quick_mobile_no : {
   
     		required : "<span style='color:red'>Please Enter Mobile Number</span>",
   
     		number : "<span style='color:red'>Number is Required</span>",
   
     		minlength : "<span style='color:red'>Please Enter minimum 10 Digits</span>",
   
     		maxlength : "<span style='color:red'>Please Enter Maximum 10 digits</span>"
   
     	},
   
     	quick_source_id :{
   
     		required : "<span style='color:red'>Please select Source</span>",
   
     	},
   
     	quick_branch_id :{
   
     		required : "<span style='color:red'>Please select Branch</span>",	
   
     	},
   
     	quick_department_id : {
   
     		required : "<span style='color:red'>Please select Department</span>",
   
     	},
   
     	quick_package :{
   
     		required : "<span style='color:red'>Please select Course Package</span>", 
   
     	},
   
     	quick_remark :{
   
     		required : "<span style='color:red'>Please Enter Remarks</span>",
   
     	}
   
     },
   
      submitHandler: function() { 
   
      			event.preventDefault();
   
      			var form_data = $('#quick_lead_list_form').serialize(); //Encode form elements for submission
   
   			// var form_data = $(this).serialize(); //Encode form elements for submission
   
   			$.ajax({
   
   
   
   				url : "<?php echo base_url() ?>LeadlistController/quick_lead_form",
   
   				type: "post",
   
   				data : form_data,
   
   				beforeSend: function(){
   
           			$('.fa-spinner').show();
   
       			},
   
       			complete: function(){
   
         				 $('.fa-spinner').hide();
   
       			},
   
   				success:function(res)
   
   				{
   
   					console.log(res);
   
   					if(res == '	1')
   
   					{
   
   						$('#quick_lead_response').html("<div class='alert alert-success'>Quick Lead Add Successfully</div>");
   
   						$("#quick_lead_list_form")[0].reset();
   
   						setTimeout(function() {
   
       						location.reload();
   
   						}, 5000);
   
   					}
   
   					else if(res == '	0')
   
   					{
   
   						$('#quick_lead_response').html("<div class='alert alert-danger'>Someting Wrong!!</div>");
   
   					}
   
   					else if(res == '	2')
   
   					{
   
   						$('#quick_lead_response').html("<div class='alert alert-warning'>Lead is already Exist!!</div>");
   
   					}
   
   				}
   
   			});
   
      }
   
   });
   
   
   
   
   
   
   
   
   
   $( "#upload_lead_data" ).validate({
   
     rules: {
   
       upload_channel: {
   
         required: true
   
       },
   
       upload_priority:{
   
       	required : true
   
       },
   
       upload_status:{
   
       	required : true
   
       },
   
       upload_sub_status:{
   
       	required : true
   
       },
   
       upload_referred_to :{
   
       	required: true
   
       },
   
       csv_data :{
   
       	required : true
   
       }
   
     },
   
     messages:{
   
     	upload_channel:{
   
     		required : "<span style='color:red'>channel is mandatory</span>"
   
     	},
   
     	upload_priority:{
   
     		required :  "<span style='color:red'>Priority is mandatory</span>"
   
     	},
   
     	upload_status:{
   
     		required : "<span style='color:red'>status is mandatory</span>"
   
     	},
   
     	upload_sub_status : {
   
     		required : "<span style='color:red'>Sub Status is mandatory</span>"
   
     	},
   
     	upload_referred_to :{
   
     		required :"<span style='color:red'>Referred to is mandatory</span>"
   
     	},
   
     	csv_data:{
   
     		required :"<span style='color:red'>file is mandatory</span>"
   
     	}
   
     },
   
      submitHandler: function() { 
   
      			event.preventDefault();
   
      			// var form_data = $('#upload_lead_data').serialize(); 
   
      			let myForm = document.getElementById('upload_lead_data');//Encode form elements for submission
   
      			 var form_data = new FormData(myForm); 
   
      			 // form_data.append('csv_data', this.files);//Encode form elements for submission
   
   			// var form_data = $(this).serialize(); //Encode form elements for submission
   
   			$.ajax({
   
   
   
   				url : "<?php echo base_url() ?>LeadlistController/import_lead_data",
   
   				method: "POST",
   
   				dataType:'json',
   
   				contentType:false,
   
   				processData:false,
   
   				data:form_data,
   
   				beforeSend: function(){
   
           			$('.fa-spinner').show();
   
           			$('.upload_import_data').val('Importing...');
   
       			},
   
       			complete: function(){
   
         				 $('.fa-spinner').hide();
   
           			$('.upload_import_data').val('import Data');
   
   
   
       			},
   
   				success:function(res)
   
   				{
   
   					$('#upload_lead_data')[0].reset();
   
   					// console.log(res);
   
   					if(res == '1'){
   
   						$('.upload_data_successfully').show();
   
   						$('.upload_data_successfully').html("Successfully Importing Data");
   
   						$('.upload_data_successfully').fadeOut(5000);
   
   					}
   
   					else{
   
   						$('.Someting_wrong_upload').show();
   
   						$('.Someting_wrong_upload').html("Something Wrong");
   
   						$('.Someting_wrong_upload').fadeOut(5000);
   
   					}
   
   				}
   
   			});
   
      	}
   
   });
   
   
   
   
   
   
   
   
   
   });
   
   
   
   $('.upload_data_successfully').hide();
   
   $('.Someting_wrong_upload').hide();
   
   // $('#quick_lead_response').fadeOut(2000);
   
   var i = 0;
   
   function update_lead_record(lead_list_id)
   
   {
   
   		
   
   
   
   		$.ajax({
   
   			url: "<?php echo base_url(); ?>LeadlistController/get_lead_record",
   
   			type : "post",
   
   			data :{
   
   				'lead_list_id' : lead_list_id
   
   			},
   
   			success:function(res)
   
   			{
   
   				// $('#select_course_package').show();
   
   				$('.fill_new_leade_info_body').show();
   
   				$('.email_template_view').hide();
   
   				$('.email_template_view').hide();
   
   				$('#first_first_right_side').show();
   
   	$('#first_second_right_side').show();
   
   	$('#first_third_right_side').show();
   
   	$('#lead_third_fill_title').show();
   
   	$('#third_followup_mode').show();
   
   	$('.sms_template_view').hide();
   
   	$('#first_forth_right_side').show();
   
   	$('#first_fifth_right_side').show();
   
   	$('#second_right_side').show();
   
   	$('#third_right_side').show();
   
   	// $('.lead_save_btn').show();
   
   	// $('#change_lead_status').html('Edit Followup For');
   
   	$('#edit_lead').val('Edit Lead');
   
   	// $('#add_lead').hide();
   
   	$('.plus_button').show();
   
   	// $("aside").addClass('right_show');
   
   	// $('.main_content').addClass('right_show');
   
   	// $('.right_side').addClass('right_show');
   
   
   
   
   
   				$('.view_hide_side_bar').show();
   
   				$('.right_side_row_panel').show();
   
   				$('.lead_save_btn').show();
   
   				$('#history_lead').hide();
   
   				$('#edit_lead').show();
   
   				$('#add_lead').hide();
   
   				$("aside").addClass('right_show');
   
   				$('.main_content').addClass('right_show');
   
   				$('.right_side').addClass('right_show');
   
   				// console.log("test");
   
   				// $('#update_lead_record_click_name').html(res);
   
   				$('.plus_button').removeClass('create_new_lead');
   
   				var data = $.parseJSON(res);
   
   				$('#change_lead_status').html("Edit Lead");
   
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
   
   				var campaign_name_data = data.record['lead_get_record'].campaign_name;
   
   				if(campaign_name_data == ''){
   
   					$('#leadName').val("Manually Added");
   
   
   
   				}
   
   				else
   
   				{
   
   				$('#source_id').val(data.record['lead_get_record'].source_id);
   
   				}
   
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
   
   
   
   				var school_college_id = data.record['lead_get_record'].school_college_id;
   
   				// $('#school_college_id').val(school_college_id);
   
   
   
   				// var school_college_id = data.record['lead_get_record'].school_college_id;
   
   				
   
   				if(school_college_id == '')
   
   				{
   
   					if(i==0){
   
   						$('#school_college_id').append(new Option(school_college_id, school_college_id));
   
   						$('#school_college_id').val(data.record['lead_get_record'].school_college_id);
   
   					}
   
   				}
   
   				else{
   
   						$('#school_college_id').append(new Option(school_college_id, school_college_id));
   
   						$('#school_college_id').val(data.record['lead_get_record'].school_college_id);
   
   					// $('#sub_status').val(data.record['lead_get_record'].school_college_id);
   
   						
   
   				 }
   
   
   
   				$('#priority').val(data.record['lead_get_record'].priority);
   
   				$('#reference_name').val(data.record['lead_get_record'].reference_name);
   
   				$('#referred_to').val(data.record['lead_get_record'].referred_to);
   
   				
   
   				
   
   				$('#status').val(data.record['lead_get_record'].status);
   
   				var check_status = data.record['lead_get_record'].status;
   
   				if(check_status == '1 - New' || check_status == '8 - Closed' || check_status == '7 - Enrolled'){
   
   					$('#existing_follow_up_your').hide();
   
   					$('#next_follow_up_date12').hide();
   
   					$('#next_follow_up_time12').hide();
   
   					$('#next_follow_up_remarks12').hide();
   
   				}
   
   				else{
   
   					$('#existing_follow_up_your').show();
   
   					$('#next_follow_up_date12').show();
   
   					$('#next_follow_up_time12').show();
   
   					$('#next_follow_up_remarks12').show();
   
   				}
   
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
   
   
   
   
   
   					$('#school_college_id').val(data.record['lead_get_record'].school_college_id);
   
   				
   
   				$('#followup_mode').val(data.record['lead_get_record'].followup_mode);
   
   				var next_follow = data.record['lead_get_record'].next_followup_date;
   
   				if(next_follow != '')
   
   				{
   
   					// alert(nex?t_follow);
   
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
   
   				$('#father_mobile_no').val(data.record['lead_get_record'].father_mobile_no);
   
   				$('#alternate_mobile_no').val(data.record['lead_get_record'].alternate_mobile_no);
   
   				$('#dob').val(data.record['lead_get_record'].dob);
   
   
   
   				$('#priority').val(data.record['lead_get_record'].priority);
   
   				i++;
   
   
   
   				
   
   			}
   
   		});
   
   }
   
   
   
   
   
   function get_prospect_name()
   
   {
   
   	var prospect_name =  $('#name').val();
   
   	$('#add_lead_name_fast').html(prospect_name);
   
   }
   
   
   
   $('#right_side_edit').hide();
   
   
   
   
   
   
   
   $(document).ready(function(){
   
   
   
   	jQuery('.scrollbar-rail').scroll(function(){
   
   		 var filter_name =  $('#filtering_type').val();
   
   		 var lastID = $('.load-more').attr('lastID'); 
   
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
   
   		if(($(this).scrollTop() +  $(this).innerHeight() >=  $(this)[0].scrollHeight) && lastID != 0 )
   
   		{
   
   			// alert("test");
   
   			$.ajax({
   
                   type:'POST',
   
                   url:"<?php echo base_url(); ?>LeadlistController/loadMoreData",
   
                   data:{
   
                   	'id': lastID,
   
                   	'status_f' : filter_name
   
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
   
   
   
   function view_lead_histroy(id)
   
   {
   
   	$('.sms_template_view').hide();
   
   	$('.right_side_row_panel').hide();
   
   	$('.lead_save_btn').hide();
   
   	$('#change_lead_status').html('Lead History For');
   
   	$("aside").addClass('right_show');
   
   	$('.main_content').addClass('right_show');
   
   	$('.right_side').addClass('right_show');
   
   				// console.log("test");
   
   				// $('#update_lead_record_click_name').html(res);
   
   	$('.plus_button').removeClass('create_new_lead');
   
   
   
   		$.ajax({
   
   			url: "<?php echo base_url(); ?>LeadlistController/history_get_lead_list",
   
   			type : "post",
   
   			data :{
   
   				'lead_list_id' : id
   
   			},
   
   			success:function(res)
   
   			{
   
   				// alert(res);
   
   				$('#history_lead').show();
   
   				$('#add_lead_name_fast').html('');
   
   				$('#history_lead').html(res);
   
   			}
   
   		});
   
   }
   
   
   
   
   
   function add_followup_lead_list(lead_list_id)
   
   {	
   
   	$('#lead_list_form_side_bar').show();
   
   	$('#lead_list_email_template').show();
   
   	$('.fill_new_leade_info_body').show();
   
   	$('.email_template_view').hide();
   
   	$('#history_lead').hide();
   
   	$('.right_side_row_panel').show();
   
   	$('#first_first_right_side').hide();
   
   	$('#first_second_right_side').hide();
   
   	$('#first_third_right_side').show();
   
   	$('#lead_third_fill_title').hide();
   
   	$('#third_followup_mode').hide();
   
   	$('.sms_template_view').hide();
   
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
   
   				// $('/')
   
   				
   
   				$('#status').val(data.record['lead_get_record'].status);
   
   
   
   				var check_status = data.record['lead_get_record'].status;
   
   				if(check_status == '1 - New' || check_status == '8 - Closed' || check_status == '7 - Enrolled'){
   
   					$('#existing_follow_up_your').hide();
   
   					$('#next_follow_up_date12').hide();
   
   					$('#next_follow_up_time12').hide();
   
   					$('#next_follow_up_remarks12').hide();
   
   				}
   
   				else{
   
   					$('#existing_follow_up_your').show();
   
   					$('#next_follow_up_date12').show();
   
   					$('#next_follow_up_time12').show();
   
   					$('#next_follow_up_remarks12').show();
   
   				}
   
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
   
   
   
   				var school_college_id = data.record['lead_get_record'].school_college_id;
   
   				
   
   				// if(school_college_id == 'Not Known')
   
   				// {
   
   				// 	if(i==0){
   
   				// 		$('#school_college_id').append(new Option(school_college_id, school_college_id));
   
   				// 		$('#school_college_id').val(data.record['lead_get_record'].school_college_id);
   
   				// 	}
   
   				// }
   
   				// else{
   
   				// 	// $('#sub_status').val(data.record['lead_get_record'].school_college_id);
   
   						
   
   				// }
   
   
   
   				// $('#school_college_id').append(new Option(school_college_id, school_college_id));
   
   				$('#school_college_id').val(data.record['lead_get_record'].school_college_id);
   
   				
   
   				$('#followup_mode').val(data.record['lead_get_record'].followup_mode);
   
   				var next_follow = data.record['lead_get_record'].next_followup_date;
   
   				if(next_follow != '')
   
   				{
   
   					// alert(nex?t_follow);
   
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
   $(function() {               
   
       $("#next_followup_date" ).datepicker({
   
           dateFormat : 'mm/dd/yy'
   
           // defaultDate: new Date()
   
       });
   
      // $("#datepicker").datepicker('setDate', new Date());
   
   });
   
   
   
   
   
   function submit_searching()
   
   {
   
       var se_form =  $('#searching_form').val();
   
       var filter_name = $('#filtering_type').val();
   
       // alert(filter_name);
   
       // alert(se_form);
   
       var se = se_form.length;
   
       if(se >= 4)
   
       {
   
       	$.ajax({
   
       		url 	: "<?php echo base_url(); ?>LeadlistController/index",
   
       		type 	: "post",
   
       		data 	: { 'status_f' : filter_name, 'searching_l' : se_form, 'test' : 'test' },
   
       		success:function(resp){
   
       			$('.full_lead_block').html(resp);
   
       		}
   
       	});
   
       }
   
       else
   
       {
   
       	$('#side_lead_response').html("<div class='alert alert-warning'>Atleast 3 characters required</div>");
   
       	$('#side_lead_response').fadeIn();
   
       	$('#side_lead_response').fadeOut(2000);
   
       }
   
   }
   
   
   
   
   
   function show_email_template(lead_id){
   
   
   
   
   
   	$('#lead_list_form_side_bar').show();
   
   	$('#lead_list_email_template').show();	
   
   	// $('.send_email_button_show').show();
   
   	$('.email_template_view').show();
   
   	$("aside").addClass('right_show');
   
   	$('.main_content').addClass('right_show');
   
   	$('.right_side').addClass('right_show');
   
   	$('.fill_new_leade_info_body').hide();
   
   	$('.email_template_view').show();
   
   	$('.lead_save_btn').hide();
   
   	$('#change_lead_status').html("Send Email to ");
   
   	$('.plus_button').hide();
   
   	$('.sms_template_view').hide();
   
   	// $('#send_email_template_button').prop('disabled', true);
   
   	
   
   	$.ajax({
   
   		url: "<?php echo base_url(); ?>LeadlistController/get_lead_record",
   
   			type : "post",
   
   			data :{
   
   				'lead_list_id' : lead_id
   
   			},
   
   			success:function(res)
   
   			{
   
   				var data = $.parseJSON(res);
   
   				// console.log(res);
   
   				// console.log(data.record['lead_get_record'].name);
   
   				$('#add_lead_name_fast').html(data.record['lead_get_record'].name);
   
   				var email =  data.record['lead_get_record'].email;
   
   				$('#primary_email').val(data.record['lead_get_record'].email);
   
   				$('#email_recepient_id').val(data.record['lead_get_record'].lead_list_id);
   			}
   	});
   	// $('.email_send_side_bar').show();
   }
   
   
   
   function get_email_template()
   {
   
   	var id =  $('#email_template').val();
   
   	$.ajax({
   
   		url : "<?php echo base_url(); ?>LeadlistController/get_email_template_record",
   
   		type : "post",
   
   		data:{
   
   			'template_id' : id
   
   		},
   
   		beforeSend: function(){
   
       			 // tinymce.remove('#email_compose_Textarea');
   
     		},
   
   		success:function(res){
   
   				var data = $.parseJSON(res);
   
   				$('#email_subject').val(data.reco['record'].category);
   
   				$('#send_email_template_button').prop('disabled', false);
   
   				// $('#email_compose_Textarea').val("123");
   
   				var content_data =  data.reco['record'].html_template;
   
   				var title_data = $('textarea[name=email_compose_Textarea]').html(content_data).text();
   
   				tinymce.get('email_compose_Textarea').setContent(title_data);
   
   		}
   
   	});
   
   }
   
   
   
   
   
   function send_email_data()
   
   {
   
   	var email_subject = $('#email_subject').val();
   
   	tinyMCE.activeEditor.getContent();
   
   	tinyMCE.activeEditor.getContent({format : 'html'});
   
   	var email_compose_textarea = tinyMCE.get('email_compose_Textarea').getContent()
   
   	var email = $('#primary_email').val();
   
   	var email_recepient_id = $('#email_recepient_id').val();
   
   
   
   	
   
   	if(email_subject == '')
   
   	{
   
   			$('.email_subject_error').html("<p style='color:red;'>Email subject is mandatory</p>");
   
   			var email_s =1;	
   
   	}
   
   	else
   
   	{
   
   		    email_s = 0;
   
   			$('.email_subject_error').html("");
   
   	}
   
   	if(email_compose_textarea == '')
   
   	{
   
   			$('.email_compose_Textarea_error').html("<p style='color:red'>Email Message is mandatory</p>");
   
   			var compose_s =1;
   
   	}
   
   	else
   
   	{
   
   		$('.email_compose_Textarea_error').html("");
   
   			var compose_s =0;
   
   	}
   
   	if(email_s == 1 || compose_s == 1){
   
   		return false;
   
   	}
   
   	else
   
   	{
   
   		$.ajax({
   
   				url: "<?php echo base_url(); ?>LeadlistController/send_email",
   
   				type: "post",
   
   				data:{
   
   					'email' :email,
   
   					'subject' : email_subject,
   
   					'message' : email_compose_textarea,
   
   					'recepient_id' : email_recepient_id
   
   				},
   
   				beforeSend: function(){
   
           			$('.fa-spinner').show();
   
       			},
   
       			complete: function(){
   
         				 $('.fa-spinner').hide();
   
       			},
   
   				success:function(Res)
   
   				{
   
   					// alert(Res);
   
   					$('#side_lead_response').fadeIn();
   
   					$.ajax({
   
   						url 	: "<?php echo base_url(); ?>LeadlistController/index",
   
   						type 	: "POST",
   
   						data 	: { 'test' : 'test' },
   
   						success : function(data)
   
   						{
   
   							$('.full_lead_block').html(data);
   
   						}
   
   					});
   
   
   
   					if(Res == '	sent')
   
   					{	
   
   
   
   						$('#side_lead_response').html("<div class='alert alert-success'>Email Send Successfully</div>");
   
   					}
   
   					else
   
   					{
   
   						$('#side_lead_response').html("Something Wrong");
   
   
   
   					}
   
   					$('#side_lead_response').fadeOut(4000);
   
   				}
   
   		});
   
   	}
   
   }
   
   function get_followup_response(lead_id){
   	$('.fill_new_leade_info_body').show();
   	$('.right_side_row_panel').hide();
   	$('.lead_save_btn').hide();
   	$('#change_lead_status').html('Lead History For');
   	$("aside").addClass('right_show');
   	$('.main_content').addClass('right_show');
   	$('.right_side').addClass('right_show');
   	$('.plus_button').removeClass('create_new_lead');
   	$('.right_side_row_panel').hide();
   	$('.email_template_view').hide();
   	$('#history_lead').show();
   	$('.sms_template_view').hide();
   	$('.create_new_lead_upload').hide();
   
   	var user_role =  $('#user_role_name').val();
   	var name =  $('#lead_info_name_record').val();

   	$.ajax({
   		url : "<?php echo base_url();  ?>LeadlistController/get_lead_followup_record",
   		type:"post",
   		data:{
   			'lead_id' : lead_id,
   			'user_role_name' : user_role
   		},
   		success:function(response){
   			$('#history_lead').html(response);
   			$('#change_lead_status').html('Counselor Followups For ');
   			$('#add_lead_name_fast').html(name);
   		}
   	});
}
   
   function get_sms_template_record(lead_id){
   	$('#lead_list_form_side_bar').show();
   	$('#lead_list_email_template').show();	
   	// $('.send_email_button_show').show();
   	$('.email_template_view').hide();
   	$("aside").addClass('right_show');
   	$('.main_content').addClass('right_show');
   	$('.right_side').addClass('right_show');
   	$('.fill_new_leade_info_body').hide();
   	$('.lead_save_btn').hide();
   	$('#change_lead_status').html("Send SMS to ");
   	$('.plus_button').hide();
   	$('.sms_template_view').show();
   
   	$.ajax({
   		url : "<?php echo base_url(); ?>LeadlistController/get_lead_list_sms_record",
   		type : "POST",
   		data:{
   			lead_list_id : lead_id
   		},
   		success:function(respo){
   			// console.log(respo);
   			var data = $.parseJSON(respo);
   				$('#sms_recepient_id').val(data.record['lead_get_record'].lead_list_id);
   				$('#primary_sms').val(data.record['lead_get_record'].mobile_no);	
   				$('#add_lead_name_fast').html(data.record['lead_get_record'].name);
   		}
   	});
   }
   
   function get_sms_template(){
   	var sms_template_id =  $('#sms_template').val();

   	$.ajax({
   		url : "<?php echo base_url(); ?>LeadlistController/get_sms_template_record",
   		type : "post",
   		data:{
   			'sms_template_id' : sms_template_id
   		},
   		success:function(response){
   				var data = $.parseJSON(response);
   				$('#sms_compose_Textarea').val(data.reco['records'].sms_template);
   		}
   	});
   }
   
   function send_sms_data(){
   	var primary_sms =  $('#primary_sms').val();
   	var sms_recepient_id =  $('#sms_recepient_id').val();
   	var sms_template =  $('#sms_template').val();
   	var sms_textarea =  $('#sms_compose_Textarea').val();
   	// alert(primary_sms);
   
   	// alert(sms_recepient_id);
   
   	// alert(sms_template);
   
   	// alert(sms_textarea);
   
   	// if(sms_template == '')
   
   	// {
   
   	// 		$('.sms_template_error').html("<p style='color:red;'>Sms Template name is mandatory</p>");
   
   	// 		var sms_t =1;	
   
   	// }
   
   	// else
   
   	// {
   
   	// 	    sms_t = 0;
   
   	// 		$('.sms_template_error').html("");
   
   	// }
   
   	if(sms_textarea == '')
   	{
   			$('.sms_compose_Textarea_error').html("<p style='color:red'>SMS Message is mandatory</p>");
   			var sms_text =1;
   	}
   	else
   	{
   		$('.sms_compose_Textarea_error').html("");
   			var sms_text =0;
   	}

   	if( sms_text == 1){
   		return false;
   	}
   	else 
   	{
   		$.ajax({
   				url: "<?php echo base_url(); ?>LeadlistController/send_sms_record",
   				type: "post",
   				data:{
   					'primary_sms' :primary_sms,
   					'sms_recepient_id' : sms_recepient_id,
   					'sms_template' : sms_template,
   					'sms_textarea' : sms_textarea
   				},
   				beforeSend: function(){
           			$('.fa-spinner').show();
       			},
       			complete: function(){
         				 $('.fa-spinner').hide();
       			},
   				success:function(Res)
   				{
   					// alert(Res);
   					$('#side_lead_response').fadeIn();

   					$.ajax({
   						url 	: "<?php echo base_url(); ?>LeadlistController/index",
   						type 	: "POST",
   						data 	: { 'test' : 'test' },
   						success : function(data)
   						{
   							$('.full_lead_block').html(data);
   						}
   					});
   
   					if(Res == '	sent')
   					{
   						$('#side_lead_response').html("<div class='alert alert-success'>Sms Send Successfully</div>");
   					}
   					else
   					{
   						$('#side_lead_response').html("Something Wrong");
   					}
   					$('#side_lead_response').fadeOut(4000);
   				}
   		});	
   	}
   // return false;
   }
   
   function get_template_record_modal(template_id,id)
   {
   	// var t_name = "lead_followup_type_name"+id;
   	var type_name =  $("#lead_followup_type_name"+id).val();
   	var type_subject =  $("#lead_followup_type_subject"+id).val();
   
   			// alert(type_subject);
   	$.ajax({
   		url:"<?php echo base_url(); ?>LeadlistController/get_template_modal",
   		type:"post",
   		data : {
   			'template_id' :template_id
   		},
   		success:function(respo){
   			$('#followup_remark_modal').html(respo);
   			if(type_name == 'email')
   			{
   				$('#change_type_name').html('EMAIL');
   				$('#subject_fol').show();
   				$('#followup_subject_name').html(type_subject);
   				$('#sender_type_name').show();
   			}
   			else if(type_name == 'SMS'){
   				$('#change_type_name').html('SMS');
   				$('#subject_fol').show();
   				$('#followup_subject_name').html(type_subject);
   				$('#sender_type_name').hide();
   			 // jQuery("#click_followup_remark_record").modal("show");
   			}
   			// console.log(respo);
   
   			// var data = $.parseJSON(respo);
   
   			// $('#followup_remark_modal').html(data.record['all_template_record'].comment).text();
   
   
   
   			// var content_data =  data.record['all_template_record'].comment;
   
   				// var cont_data =  content_data.trim();
   
   				// var title_data = $('textarea[name=followup_remark_modal]').html(cont_data).text();
   
   
   
   				// tinymce.get('followup_remark_modal').setContent(title_data);
   		}
   	});
   }
   // $(document).ready(function(){
   
   // 	$(this).click(function(){
   
   // 	});
   
   // });
   
   var i=0;
   
   function apply_css_icon(id){
   	var full = $('#comment_show_full'+id).val();
   	var half = $('#comment_show_half'+id).val();
   
   	if(i%2==0){
   		 $("#comment_show_icon"+id).parent().parent().css({"height": "auto"});
   		 $("#comment_show_icon"+id).html("<i class='fa fa-hand-o-down'></i>");
   		 $('#comment_message'+id).html(full);
   	}else {
   		 $("#comment_show_icon"+id).parent().parent().css({"height": "70px"});
   		 $("#comment_show_icon"+id).html("<i class='fa fa-hand-o-right'></i>");
   		 $('#comment_message'+id).html(half);
   	}
   	i++;
   }
   $('.fa-spinner').hide();
   
   setTimeout(function(){
   	var boxtiny =  document.querySelector('.tox-notifications-container');
   	boxtiny.hidden =  true;
   },1000);
   $('#existing_follow_up_your').hide();
   $('#next_follow_up_date12').hide();
   $('#next_follow_up_time12').hide();
   $('#next_follow_up_remarks12').hide();
  
   function get_status_followup_upload()
   {
   	var status_followup =  $('#upload_status').val();

   	$.ajax({
   		url : "<?php echo base_url() ?>LeadlistController/upload_get_substatus_data",
   		type : "Post",
   		data : {
   			'status_id' : status_followup
   		},
   		success:function(Res)
   		{
   			$('#upload_substatus_record').html(Res);
   		}
   	});
   }
   
   function get_status_department_upload()
   {
   	var branch_id =  $('#upload_branch').val();

   	$.ajax({
   		url : "<?php echo base_url() ?>LeadlistController/upload_get_department_data",
   		type : "Post",
   		data : {
   			'branch_id' : branch_id
   		},
   		success:function(Res)
   		{
   			$('#upload_department_data').html(Res);
   		}
   	});
   }
   
   function get_course_package_upload(package)
   {
   	if(package == 'package'){
   		$('#upload_select_course_package').show();
   		$('#upload_select_course_single').hide();
   	}else{
   		$('#upload_select_course_package').hide();
   		$('#upload_select_course_single').show();
   	}
   }

  $('#upload_select_course_single').hide();
   
   function Download_file(){
   	var filepath = "<?php echo base_url(); ?>uploadFiles/lead-template-data.csv";
   
   	$.ajax({
   		url : "<?php echo base_url(); ?>LeadlistController/download_lead_file",
   		type : "post",
   		data: {
   			'file_path' : filepath
   		},
   		success:function(){
   			 window.location = filepath;
   		}
   	});
   }
</script>
</body>
</html>