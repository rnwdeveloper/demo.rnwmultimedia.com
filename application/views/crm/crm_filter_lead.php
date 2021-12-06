<div id="msg"></div>
      <div class="lead-main-wrap lead_block">
      <?php if (!empty($lead_list_all)) { ?>
      <?php foreach ($lead_list_all as $lla) { ?>
     
      <div class="extra_lead_show crm-list-view">  
         <div class="card card-primary">
            <div class="card-body">
               <div class="row"> 
                  <div class="col-md-11">
                     <div class="lead_left">
                        <div class="row">
                           <div class="adm_item">
                              <span>Prospect Name</span>
                              <p id="company_name_copy_paste_mobile_3" class="open_rightsidebar"
                              onclick="return update_lead_record(<?php echo $lla->lead_list_id; ?>);">
                                 <?php echo $lla->name; ?>  
                                 </p>
                                 <i class="far fa-copy ml-1 copy-data" onclick="return get_copy_paste_mobile(3)" id="copy_paste_record_mobile_3"></i>
                                 <!-- <i class="fa fa-copy" onclick="copytextF()"></i> -->
                           </div>
                           <div class="adm_item">
                              <span>Email</span>
                              <p id="company_name_copy_paste_mobile_1" class="open_rightsidebar"
                                 onclick="return show_email_template(<?php echo $lla->lead_list_id; ?>);">
                                 <?php echo $lla->email; ?>  
                              </p>
                              <i class="far fa-copy ml-1 copy-data" onclick="return get_copy_paste_mobile(1)" id="copy_paste_record_mobile_1"></i>
                              <!-- <i class="fa fa-copy" onclick="copytextF()"></i> -->
                           </div>
                           <div class="adm_item">
                              <span>Mobile</span>
                              <p id="company_name_copy_paste_mobile_2" class="open_rightsidebar"
                                 onclick="return get_sms_template_record(<?php echo $lla->lead_list_id; ?>)">
                                 <?php echo $lla->mobile_no; ?>  
                              </p>
                              <i class="far fa-copy ml-1 copy-data" onclick="return get_copy_paste_mobile(2)" id="copy_paste_record_mobile_2"></i>
                              <!-- <i class="fa fa-copy" onclick="copytextF()"></i> -->
                           </div>
                           <div class="adm_item list_statusI">
                              <span>Status</span>
                              <p class="open_rightsidebar"
                              onclick="return add_followup_lead_list(<?php echo $lla->lead_list_id;  ?>)">
                                    <?php echo $lla->status; ?>
                              </p>
                           </div>
                           <!-- <div class="adm_item">
                              <span>Campaign Name</span>
                              <p><?php echo $lla->campaign_name; ?></p>
                           </div>  -->
                           
                           <div class="adm_item">
                              <span>Source</span>
                              <p id="enrollment_ids0">
                              <?php foreach ($source_list as $sl) {
															if ($sl->source_name == $lla->source_id) {
																echo $sl->source_name;
															}
														} ?>
                              </p>
                           </div>
                           <div class="adm_item list_inquiry">
                           <div class="lead-list-inquiry">
                              <ul>
                                <?php 
                                          $status_history1 = 0;
                                          
                                          foreach($lead_followup_history as $lfh) { 
                                          
                                            if($lfh->recepient_id == $lla->lead_list_id){
                                          
                                              $status_history1++;
                                          
                                            }
                                          } 
                                          ?>
                                 <li><a href="#" onclick="return get_followup_response(<?php echo $lla->lead_list_id; ?>)"><i class="far fa-user"></i><span class="notifiecount"><?php echo $status_history1; ?></span></a></li>
                                 <?php 
                                          $status_history2 = 0;
                                          foreach($lead_followup_history_response as $lfhr) { 
                                            if($lfhr->recepient_id == $lla->lead_list_id){
                                              $status_history2++;
                                            }
                                          } 
                                          
                                          ?>
                                 <li><a href="#"><i class="fas fa-mobile-alt"></i> <span class="notifiecount"><?php echo $status_history2; ?></span></a></li>
                                 <li><a href="#"><i class="fas fa-user-clock"></i> <span class="notifiecount">104</span></a></li>
                              </ul>
                              </div>
                                       </div>
                           <div class="adm_item">
                              <span>Channel</span>
                              <span id="b_id0">
                                 <p>
                                 <?php echo $lla->channel_id; ?>
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Sub-Status</span>
                              <p id="d_id0">
                              <?php echo $lla->sub_status; ?>                                        
                              </p>
                           </div>
                           <div class="adm_item">
                              <span>Priority</span>
                              <span id="c_id0">
                                 <p style="font-size:12px;">
                                    <?php echo $lla->priority; ?>                                                                               
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Branch</span>
                              <p id="year_id0">
                              <?php foreach ($list_branch as $lb) {
															if($lb->branch_id == $lla->branch_id) {
																echo $lb->branch_name;
															}
														} ?>
                              </p>
                           </div>
                           <div class="adm_item">
                              <span>Department</span>
                              <span id="tf_id0">
                                 <p>
                                    <?php foreach ($list_department as $ld) { ?>
															<?php if ($lla->department == $ld->department_id) {
																echo $ld->department_name;
															} ?>
														<?php } ?>
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Course</span>
                              <p id="rf_id0">
                              <?php echo $lla->course_package; ?>-
														<?php if ($lla->course_package == 'single') {
															foreach ($course_all as $ca) {
																if ($ca->course_id == $lla->course_or_package) {
																	echo $ca->course_name;
																}
															}
														} else if ($lla->course_package == 'package') {
															foreach ($list_package as $lp) {
																if ($lp->package_id == $lla->course_or_package) {
																	echo $lp->package_name;
																}
															}
														}
											?>                                      
                              </p>
                           </div>
                           <div class="adm_item">
                              <span>Lead Creation Date</span>
                              <p>
                              <?php $date = $lla->lead_creation_date;
										echo date('M', strtotime($date)) . "  " . date('d', strtotime($date)) . ",  " . date('Y', strtotime($date)) . " " . date('H:i A', strtotime($date)); ?>
                              </p>
                           </div>
                           <div class="adm_item">
                              <span>Lead Modification Date</span>
                              <p id="date_id0">
                              <?php $date = $lla->lead_modification_date;
														echo date('M', strtotime($date)) . "  " . date('d', strtotime($date)) . ",  " . date('Y', strtotime($date)) . " " . date('H:i A', strtotime($date)); ?>                                   
                              </p>
                           </div>
                           <div class="adm_item">
                              <span>Next Action Date</span>
                              <span id="admi_remarks_id0">
                                 <p class="open_rightsidebar"
                                    onclick="return add_followup_lead_list(<?php echo $lla->lead_list_id;?>);">
                                    <?php if (!empty($lla->next_followup_date)) {
																$next_act =  $lla->next_followup_date;

																echo date('M', strtotime($next_act)) . "  " . date('d', strtotime($next_act)) . ",  " . date('Y', strtotime($next_act)) . " " . date('H:i A', strtotime($next_act));
															} ?>
                                     <i class="fa fa-eye"></i>
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Remarks</span>
                              <span id="admi_remarks_id0">
                                 <p class="open_rightsidebar"
                                    onclick="return update_lead_record(<?php echo $lla->lead_list_id;?>);">
                                    <?php echo substr($lla->any_remarks, 0, 25) . "..."; ?>
                                     <i class="fa fa-eye"></i>
                                 </p>
                              </span>
                           </div> 
                           <div class="adm_item">
                           <?php $username =  $_SESSION['Admin']['username']; ?>
                              <span>Referred To</span>
                              <span id="admi_remarks_id0">
                                 <p>
                                    <?php echo $lla->referred_to; ?>
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Followup Comment</span>
                              <span id="admi_remarks_id0">
                                 <p>
                                    <?php if (!empty($lla->followup_remark)) {
															echo $lla->followup_remark;
														} ?>
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Last Re-enquired</span>
                              <span id="admi_remarks_id0">
                                 <p>
                                    Add Remark
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Referred From</span>
                              <span id="admi_remarks_id0">
                                 <p>
                                    <?php echo $lla->reference_name; ?>
                                 </p>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-1">
                     <div class="lead_right">
                        <div class="dropleft text-center">
                           <span>Action</span>
                           <p class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"><i class="fas fa-ellipsis-h"></i></p>
                           <div class="dropdown-menu dropleft">
                           <span id="ac_id0">
                           <a class="dropdown-item open_rightsidebar" href="#"
                           onclick="return allocated_todemo(<?php echo $lla->lead_list_id;  ?>)">
                           <i class="fas fa-notes-medical mr-2"> </i>Allocated To Demo</a>
                           </span>
                           <span id="ac_id0">
                              <a class="dropdown-item open_rightsidebar" href="#"
                              onclick="return add_followup_lead_list(<?php echo $lla->lead_list_id;  ?>)">
                              <i class="fas fa-notes-medical mr-2"> </i>Add Followup</a>
                              </span>
                              <span id="at_id0">
                              <a class="dropdown-item open_rightsidebar" href="#"
                              onclick="return update_lead_record(<?php echo $lla->lead_list_id; ?>);">
                              <i class="fas fa-edit mr-2"></i>Edit Lead</a>
                              </span>
                              <span id="historyid0">
                              <a class="dropdown-item open_rightsidebar" href="#" onclick="return view_lead_histroy(<?php echo $lla->lead_list_id; ?>)"><i class="fas fa-history mr-2"> </i>View
                              History</a>
                              </span>
                              <a class="dropdown-item" href="#"><i class="fas fa-share-square mr-2"> </i>Refer Leads</a>
                              <a class="dropdown-item" href="https://demo.rnwmultimedia.com/Common/view_batches"><i class="fas fa-share-square mr-2"> </i>View Batches</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-trash mr-2"> </i>Delete</a>
                           </div>
                        </div>
                        <div class="icon-set text-center">
                           <a href="https://api.whatsapp.com/send?phone=91<?php echo $lla->mobile_no; ?>" target="_blank"><i class="fab fa-whatsapp"></i></a> 
                           <a href="tel:91<?php echo $lla->mobile_no; ?>"><i class="material-icons">phone</i></a>
                        </div>
                        <!-- <div class="lead-list-inquiry">
                           <ul>
                              <li><a href="#" onclick="return get_followup_response(7579)"><i class="far fa-user"></i><span class="notifiecount">2</span></a></li>
                              <li><a href="#"><i class="fas fa-mobile-alt"></i> <span class="notifiecount">0</span></a></li>
                              <li><a href="#"><i class="fas fa-user-clock"></i> <span class="notifiecount">104</span></a></li>
                           </ul>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <?php $lastId = $lla->lead_list_id; ?>
      <?php } ?>
      </div>
      <div class="load-more" lastID="<?php echo $lastId; ?>" style="display: none;">
            <img src="<?php echo base_url('assets/images/loading.gif'); ?>" /> Loading more posts...
      </div>
      <?php } else { ?>
         <p>No Record Found</p>
      <?php } ?>