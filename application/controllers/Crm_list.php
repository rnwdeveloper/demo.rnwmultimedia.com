<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link href="https://www.jqueryscript.net/demo/wysiwyg-editor-bootstrap/src/css/wysiwyg.css" rel="stylesheet"> 
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
 <link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<style>
.compose-btn i {
    font-size: 16px;
    vertical-align: middle;
}
   .compose-btn {
    border-radius: 30px;
    box-shadow: 0 1px 10px -3px rgb(60 64 67 / 30%);
}
textarea#editor, .editor-statusbar {
    display: none !important;
}
</style>
<div class="main-content overflow-hidden">
   <div class="row">
      <div class="col-12 d-flex justify-content-between">
         <h6 class="page-title text-dark mb-3">Lead List</h6>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
               <li class="breadcrumb-item">
                  
               
               <a href="#">Home</a></li>
               <li class="breadcrumb-item"><a href="#">Library</a></li>
               <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
         </nav>
      </div>
   </div> 
   <div class="extra_lead_menu" id="response_sidemail_compose">
      <div class="extra_top-menu lead-list-menu">
        <div class="lead-list-right-menu mt-2 mb-3">
          <div class="lead-list-icon text-right">
            <div class="crm-search-menu">
            <input onkeyup="submit_searching()" type="search" class="form-control" name="searching_form" id="searching_form"  placeholder="Search by Name, Email or Mobile">
            <i type="button" class="fa fa-search" aria-hidden="true"></i>
          </div>
          <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".quick-lead"><i class="fa fa-plus"></i></a>
            <a href="#" class="btn btn-info text-white"><i class="fa fa-bullhorn"></i></a>
            <a href="#" class="btn btn-info text-white open_rightsidebar" onclick="return referleads()"><i class="fas fa-share-alt-square"></i></a>
            <a href="#" class="btn btn-info text-white"><i class="fa fa-comment-alt"></i></a>
            <a href="#" class="btn btn-info text-white"><i class="fa fa-sync-alt"></i></a>
            <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".downloadlead"><i class="fa fa-download"></i></a>
            <a href="#" class="btn btn-info text-white open_rightsidebar" onclick="return filterlead()"><i class="fa fa-filter"></i></a> 
            <div class="dropdown d-inline-block dropleft">
               <a href="#" data-toggle="dropdown" class="btn btn-dark dropdown-toggle text-white"><i class="fa fa-retweet"></i></a>
               <div class="dropdown-menu">
               <a class="dropdown-item text-dark" href="#"><i class="fas fa-calendar-week"></i>Creation Date</a>
               <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Modification Date</a>
               <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Next Action Date</a>
               <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Re-Enquiry Date</a>
               <a class="dropdown-item " href="#"><i class="fas fa-calendar-week"></i>Lead score</a>
               </div>
            </div>
          </div>
        </div>
        <ul class="w-100 pl-0">
        <input type="hidden" name='filtering_type' id="filtering_type" value="<?php echo $class_type; ?>" >
        <?php foreach($status_wise as $k=>$v){  @$key =  explode('-',$k); @$key1 =  explode(' ',$key[1]); ?>
            <li>
              <a href="<?php echo base_url(); ?>LeadlistController/Crm_list?status=<?php echo @$key1[1]; ?>" class="btn btn-primary <?php if($class_type == trim($key1[1]))?>">
              <?php echo $key[1]; ?>
                <span class="badge badge-transparent"><?php echo $v; ?></span>
              </a>
            </li>
            <?php } ?>
        </ul>
      </div> 
      <div id="msg"></div>
   <div id="scroll" class="scroll">
      <div class=" ">
            <div class=" ">
               <div class="lead-main-wrap lead_block" >
         
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
                                                <i class="far fa-copy ml-1 copy-data open_rightsidebar" id="copy_paste_record_mobile_3"></i>
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
                                                <li><a href="#" class="open_rightsidebar"  onclick="return get_followup_response(<?php echo $lla->lead_list_id; ?>)"><i class="far fa-user"></i><span class="notifiecount"><?php echo $status_history1; ?></span></a></li>
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
               <!-- </div></div> -->
               <?php } else { ?>
                  <p>No Record Found</p>
               <?php } ?>
      
               </div>
            </div>
      </div>
   </div>
   
   <div class="extra_sidebar-menu">
      <div class="sidebar-panel pullDown"> 
         <button class="close-sidebar-left">X</button>
            
         <div class="rsidebar-items send-mail send-email-details">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Send Email To <span id="add_lead_name_fast"></span></h3>
                 </div>
                 <input type="hidden" name="email_recepient_id" id="email_recepient_id">
                 <div class="rsidebar-middle">
                     <div id="mail_send_msg"></div>
                     <div class="pretty p-default p-round p-thick">
                         <input type="checkbox" name="email_id_send" id="primary_email" checked>
                         <div class="state p-primary-o">
                             <label>Primary Email</label>
                         </div>
                     </div>
                     <div class="pretty p-default p-round p-thick">
                         <input type="checkbox" name="father_email" id="father_email">
                         <div class="state p-primary-o">
                             <label>Father's Email</label>
                         </div>
                     </div>
                     <div class="pretty p-default p-round p-thick">
                         <input type="checkbox" name="email_id_send" id="guardian_email">
                         <div class="state p-primary-o">
                             <label>Guardian's Email</label>
                         </div>
                     </div>
                     <div class="pretty p-default p-round p-thick">
                         <input type="checkbox" name="father_email" class="" id="alternate_email">
                         <div class="state p-primary-o">
                             <label>Alternate Email</label>
                         </div>
                     </div>
                     <div class="rs-mail-temp mt-4">
                         <h6>Select Email Template*</h6>
                     </div>
                     <div class="form-group">
                         <select class="form-control" id="email_template" onchange="return get_email_template();">
                             <option value="">Select Email Template</option>
                             <?php foreach ($list_email_template as $lt) { ?>
                             <option value="<?php echo $lt->id; ?>"><?php echo $lt->category; ?></option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label>Subject*</label>
                         <textarea class="form-control" name="email_subject" id="email_subject" rows="8"></textarea>
                     </div>
                     <div class="text-right">
                     <button class="btn btn-white compose-btn" data-toggle="modal"
                      data-target=".bd-example-modal-lg"><i class="fa fa-plus text-primary"></i> Compose</button>
                     </div>
                     <div class="rs-btn">
                         <a href="#" class="btn btn-danger text-white">Cancel</a>
                         <input type="submit" class="btn btn-primary text-white" id="send_email_forstudent"
                             name="submit" value="Submit" onclick="return send_email_data();">
                     </div>
                 </div>
             </div>
         <div class="rsidebar-items send-sms send-sms-details">
            <div class="rsidebar-title">
               <h3 class="mb-0">Send Sms To <span id="add_lead_name"></span></h3>
            </div>
            <div class="rsidebar-middle">
               <div id="sms_send_msg"></div>
               <div class="pretty p-default p-round p-thick">
                  <input type="checkbox" name="primary_sms" id="primary_sms" checked>
                  <div class="state p-primary-o">
                     <label>Primary Sms</label>
                  </div>
               </div>
               <div class="pretty p-default p-round p-thick">
                  <input type="checkbox" name="father_sms" id="father_sms">
                  <div class="state p-primary-o">
                     <label>Father's Sms</label>
                  </div>
               </div>
               <div class="pretty p-default p-round p-thick">
                  <input type="checkbox" name="guardian_sms" id="guardian_sms">
                  <div class="state p-primary-o">
                     <label>Guardian's Sms</label>
                  </div>
               </div>
               <div class="pretty p-default p-round p-thick">
                  <input type="checkbox" name="alernate_sms" class="" id="alternate_sms">
                  <div class="state p-primary-o">
                     <label>Alternate Sms</label>
                  </div>
               </div>
               <input type="hidden" class="form-control" name="sms_recepient_id" id="sms_recepient_id">
               <div class="rs-mail-temp mt-4">
                  <h6>Select SMS Template*</h6>
               </div>
               <div class="form-group">
                  <select class="form-control" name="sms_template" id="sms_template"
                     onchange="return get_sms_template();">
                     <option value="">Select SMS Template</option>
                        <?php foreach($sms_template_list as $lt) { ?>
                        <option value="<?php echo $lt->category; ?>"><?php echo $lt->category; ?></option>
                        <?php } ?> 
                  </select>
               </div>
               <div class="form-group">
                  <label>SMS Template</label>
                  <textarea class="form-control" id="sms_compose_Textarea" name="sms_compose_Textarea" rows="8"></textarea>
               </div>
               <div class="rs-btn">
                  <a href="#" class="btn btn-danger text-white">Cancel</a>
                  <input type="submit" class="btn btn-primary text-white" id="send_sms_student" value="Submit" onclick="return send_sms_data();">
               </div>
            </div>
         </div>
               <div class="rsidebar-items send-sms edit-details">
                  <form method="post" id="lead_list_form_side_bar">
                     <div class="rsidebar-title">
                        <h3 class="mb-0">Edit <span id="status_change"></span>
                        </h3>
                     </div>
                     <div class="rsidebar-middle p-0">
                     <div id="accordion" class="pb-0">
                     <div class="accordion">
                        <div class="accordion-header bg-primary" role="button" data-toggle="collapse" data-target="#panel-body-1"
                           aria-expanded="true">
                           <h4 class="text-white">Lead Details<i class="fa fa-plus" style="font-size: 10px;float:right;"></i></h4>
                        </div>
                        <div class="accordion-body collapse show pb-0" id="panel-body-1" data-parent="#accordion">
                           <div class="row">
                                 <div class="col-md-12">
                                    <div class="card">
                                       <div class="card-body pl-0 pr-0 pb-0">
                                          <div id="edit_basic_info_msg"></div>
                                          <input type="hidden" maxlength="50" class="form-control" id="lead_list_id" name="lead_list_id" readonly>
                                             <?php @$session_record =  @$_SESSION['Admin'];
                                             ?>
                                             <input type="hidden" class="form-control" id="user_role_name" name="user_role_name" value="<?php echo @$session_record['name']; ?>" readonly>
                                          <div class="first-section">
                                          <p><b>Step 1 - Enter Prospect details (Either Email or Mobile is mandatory.).*</b></p>
                                          <div class="form-group">
                                             <label>Name</label>
                                             <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" onkeyup="return get_prospect_name()">
                                          </div>
                                          <div class="form-group">
                                             <label>Surname</label>
                                             <input type="text" class="form-control" id="surname" placeholder="Enter Surname" name="surname">
                                          </div>
                                          <div class="form-group">
                                          <label>Select Your Gender</label>
                                       <div class="pretty p-icon p-curve p-jelly">
                                          <input type="radio" id="gender_male" name="gender" value="male">
                                          <div class="state p-info">
                                             <i class="icon material-icons">done</i>
                                             <label>Male</label>
                                          </div>
                                       </div>
                                       <div class="pretty p-icon p-curve p-jelly">
                                          <input type="radio" id="gender_female" name="gender" value="female">
                                          <div class="state p-info">
                                             <i class="icon material-icons">done</i>
                                             <label>FeMale</label>
                                          </div>
                                       </div>
                                       <div class="pretty p-icon p-curve p-jelly">
                                          <input type="radio" id="gender_male" name="gender" value="male">
                                          <div class="state p-info">
                                             <i class="icon material-icons">done</i>
                                             <label>Other</label>
                                          </div>
                                       </div>
                                    </div>                 
                                          <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="Email" data-api-attached="true" name="email">
                                          </div>
                                          <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" id="mobile_no" placeholder="Mobile" data-api-attached="true" name="mobile_no">
                                          </div>
                                       </div>
                                          <div class="second-section">
                                             <p><b>Step 2 - Select appropriate values to add basic Lead details.*</b></p>
                                          <div class="form-group">
                                                <label>Campaign Name</label>
                                                <input type="text" class="form-control" id="leadName" placeholder="Campaign Name" value="Manually Added" autocomplete="off" name="campaign_name">
                                          </div>
                                          <div class="form-group">
                                                <label>Channel</label>
                                                <select class="form-control" name="channel_id" id="channel_id" onchange="return get_source()">
                                                   <option value="">Select Channel</option>
                                                   <?php foreach ($channel_list as $cl) { ?>
                                                      <option value="<?php echo $cl->channel_name; ?>"><?php echo $cl->channel_name; ?></option>
                                                   <?php  } ?>
                                                </select>
                                          </div>
                                          <div class="form-group">
                                                <label>Source</label>
                                                <select class="form-control" name="source_id" id="source_id">
                                                   <option value="">Select Source</option>
                                                   <?php foreach ($source_list as $sl) { ?>
                                                      <option value="<?php echo $sl->source_name; ?>"><?php echo $sl->source_name; ?></option>
                                                   <?php  } ?>
                                                </select>
                                          </div>
                                          <div class="form-group">
                                                <label>Last School / College Name</label>
                                             <select class="form-control" name="school_college_id" id="school_college_id">
                                                <option value="">Select School/College</option>
                                                <?php foreach ($college_school_list as $csl) { ?>
                                                   <option value="<?php echo $csl->school_name; ?>"><?php echo $csl->school_name; ?></option>
                                                <?php  } ?>
                                             </select>
                                          </div>
                                          <div class="form-group">
                                          <label>Source Remarks</label>
                                          <input type="text"  class="form-control"  id="source_remark" placeholder="source Remarks" data-api-attached="true" name="source_remark">
                                       </div>
                                          <div class="form-group">
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
                                                <input type="text" class="form-control" id="reference_name" placeholder="Enter Reference Name" data-api-attached="true" name="reference_name">
                                          </div>
                                          <div class="form-group">
                                                <label>Reference Mobile Number</label>
                                                <input type="text" class="form-control" id="reference_mobile_no" placeholder="Enter Reference Mobile Number" data-api-attached="true" name="reference_mobile_no">
                                          </div>
                                          <div class="form-group">
                                                <label>Referred To</label>
                                                <select class="form-control" name="referred_to" id="referred_to">
                                                   <?php foreach ($counselor_record as $cr) { ?>
                                                      <option <?php if ($cr->name == "$username") {
                                                               echo "selected";
                                                            } ?> value="<?php echo $cr->name; ?>"><?php echo $cr->name; ?></option>
                                                   <?php } ?>
                                                   <option <?php if ($username == 'Hitesh Desai') {
                                                            echo "selected";
                                                         } ?> value="Hitesh Desai">Hitesh Desai</option>
                                             </select>
                                          </div>
                                          </div>
                                             <div class="third-section">
                                                <p><b>Step 3 - Select appropriate Followup details.*</b></p>
                                                <div class="form-group">
                                                      <label>Status</label>
                                                      <select class="form-control" name="status" id="status" onchange="return get_status_followup()">
                                                         <option value="">Select Status</option>
                                                         <?php foreach ($list_status_followup as $lsf) { ?>
                                                            <option value="<?php echo $lsf->followup_type_name; ?>"><?php echo $lsf->followup_type_name; ?></option>
                                                         <?php } ?>
                                                      </select>
                                                </div>
                                                <div class="form-group" id="substatus_record">
                                                      <label>Sub - Status</label>
                                                      <select class="form-control" name="sub_status" id="sub_status">
                                                         <option value="">Select Sub - Status</option>
                                                         <?php foreach ($list_substatus_followup as $lssf) { ?>
                                                            <option value="<?php echo $lssf->sub_type_name; ?>"><?php echo $lssf->sub_type_name; ?></option>
                                                         <?php } ?>
                                                      </select>
                                                </div>
                                                <div class="form-group" id="third_followup_mode">
                                                      <label>Followup Mode</label>
                                                      <select class="form-control" name="followup_mode" id="followup_mode" onchange="//return get_status_followup()">
                                                         <option value="">Select Followup Mode</option>
                                                         <?php foreach ($followupmode as $fm) { ?>
                                                            <option value="<?php echo $fm->follow_up_mode_name; ?>"><?php echo $fm->follow_up_mode_name; ?></option>
                                                         <?php } ?>
                                                      </select>
                                                </div>
                                                <div class="form-group" id="existing_follow_up_your">
                                                   <label>Do you want to add or update your existing follow up?*</label>
                                                   <select class="form-control" name="existing_follow_up" id="existing_follow_up">
                                                      <option value="Schedule Walk-Ins">Schedule Walk-Ins</option>
                                                      <option value="Manual - Take Follow Up Call">Manual - Take Follow Up Call</option>
                                                   </select>
                                                </div>
                                                <div class="form-group" id="next_follow_up_date12">
                                                   <label>Next Followup Date</label>
                                                   <input type="text" class="form-control" id="next_followup_date" name="next_followup_date">
                                                </div>
                                                <div class="form-group" id="next_follow_up_time12">
                                                   <label>Next Followup Time</label>
                                                   <input type="time" class="form-control" id="next_followup_time" name="next_followup_time" datetime="hour">
                                                </div>
                                                <div class="form-group" id="next_follow_up_remarks12">
                                                   <label>Followup Remarks</label>
                                                   <textarea class="form-control" rows="8" id="followup_remark" placeholder="Enter Remarks" name="followup_remark"></textarea>
                                                </div>
                                             </div>
                                       </div>
                                          <div class="forth-section">
                                          <p><b>Step 4 - Select Course details.*</b></p>
                                          <div class="form-group">
                                                <label>State</label>
                                                <select class="form-control" name="state" id="state" onchange="return get_status_followup()">
                                                <option value="">Select state</option>
                                                <?php foreach ($list_state as $ls) { ?>
                                                   <option value="<?php echo $ls->state_name; ?>" <?php if ("Gujarat" == $ls->state_name) { echo "selected"; } ?>>  
                                                   <?php echo $ls->state_name; ?></option>                         
                                                <?php } ?>
                                             </select>
                                          </div>
                                          <div class="form-group" id="substatus_record">
                                          <label>Select City</label>
                                          <select class="form-control" name="city" id="city">
                                             <option value="">Select City</option>
                                             <?php foreach ($list_city as $lc) { ?>
                                                <option value="<?php echo $lc->city_name; ?>" <?php if ("Surat" == $lc->city_name) { echo "selected"; } ?>>
                                                <?php echo $lc->city_name; ?></option>                                                                  
                                             <?php } ?>
                                          </select>
                                       </div>
                                       <div class="form-group" id="substatus_record">
                                          <label>Select Area</label>
                                          <select class="form-control" name="area" id="area">
                                             <option value="">Select Area</option>
                                             <?php foreach ($list_area as $la) { ?>
                                                <option value="<?php echo $la->area_name; ?>"><?php echo $la->area_name; ?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                       <div class="form-group">
                                          <label>Branch<span style="color:red">*</span></label>
                                          <select class="form-control" name="branch_id" id="branch_id" onchange="return get_status_department()">
                                             <!-- <option value="">Select Branch</option> -->
                                             <option value="Not Known">Not Known</option>
                                             <?php foreach ($list_branch as $br) { ?>
                                                <option value="<?php echo $br->branch_id; ?>"><?php echo $br->branch_code; ?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                       <div class="form-group" id="department_data">
                                          <label>Department<span style="color:red">*</span></label>
                                          <select class="form-control" name="department" id="department">
                                             <option value="">Select Department</option>
                                             <?php foreach ($list_department as $ld) { ?>
                                                <option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                       <div class="form-group">
                                          <label>Select Course Package</label><br>
                                          <input type="radio" maxlength="50" id="course_package" name="course_package" value="package" checked onclick="return get_course_package('package')">Package
                                          <input type="radio" maxlength="50" id="course_single" name="course_package" value="single" onclick="return get_course_package('single')">Single
                                       </div>
                                       <div class="form-group select_course_package" id="select_course_package">
                                          <label>Select Pacakge<span style="color:red">*</span></label>
                                          <select class="form-control" name="course_or_package1" id="course_orpackage">
                                             <option value="">Select Package</option>
                                             <option value="Not Known">Not Known</option>
                                             <?php foreach ($list_package as $lp) { ?>
                                                <option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                       <div class="form-group select_course_single" id="select_course_single">
                                          <label>Select Course<span style="color:red">*</span></label>
                                          <select class="form-control" name="course_or_package2" id="course_orsingle">
                                             <option value="">Select Course</option>
                                             <option value="Not Known">Not Known</option>
                                             <?php foreach ($list_course as $lp) { ?>
                                                <option value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                          </div>
                                       <div class="fifth-section">
                                       <p><b>Step 5 - Any Further Remarks*</b></p>
                                       <div class="form-group">
                                          <label>Remarks<span style="color:red">*</span></label>
                                          <textarea rows="9" class="form-control" id="any_remarks" placeholder="Enter Remarks" name="any_remarks">
                                          Date: <?php date_default_timezone_set("Asia/Calcutta"); echo  date('m/d/Y h:i A') . "<br>"; ?>
                                          </textarea>
                                       </div>
                                       </div>
                                    </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="candidate-details">
                     <div class="accordion pb-0">
                        <div class="accordion-header bg-primary" role="button" data-toggle="collapse" data-target="#panel-body-2">
                        <h4 class="text-white"> Candidate Details<i class="fa fa-plus" style="font-size: 10px;float:right;"></i></h4>
                        </div>
                        <div class="accordion-body collapse pb-0" id="panel-body-2" data-parent="#accordion">
                        <div class="row">
                        <div class="col-md-12">
                           <div class="card ">
                           <div class="card-body pl-0 pr-0 pb-0">
                           <p><b>Please Enter Candidate's Personal Details</b></p>
                           <div class="form-group">
                                 <label>Date of Birth*</label>
                                 <input type="text" maxlength="50" class="form-control" id="dob" name="dob">
                              </div>
                              <p><b>Please Enter Candidate's Parents Details</b></p>
                              <div class="form-group">
                                 <label>Alternate Mobile Number</label>
                                 <input type="text" maxlength="100" class="form-control" id="alternate_mobile_no" placeholder="Alternate Mobile Number" data-api-attached="true" name="alternate_mobile_no">
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
                        </div>
                        </div>
                     </div>
                     </div>
                     <div class="education-detail">
                     <div class="accordion pb-0">
                        <div class="accordion-header bg-primary" role="button" data-toggle="collapse" data-target="#panel-body-3">
                        <h4 class="text-white"> Educational Detail <i class="fa fa-plus" style="font-size: 10px;float:right;"></i></h4>
                        </div>
                        <div class="accordion-body collapse pb-0" id="panel-body-3" data-parent="#accordion">
                        <div class="row">
                        <div class="col-md-12">
                           <div class="card ">
                           <div class="card-body pl-0 pr-0 pb-0">
                           <p><b>Please Enter Candidate's Educational Details</b></p>
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
                        </div>
                     </div>
                     </div>
                     <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-danger">Cancel</button>
                        <input  type="submit" class="btn btn-success" name="submit" id="edit_lead" value="Edit Lead">
                     </div>
                  </form>
               </div>
               <div class="rsidebar-items send-sms crm-history">
                  <div class="rsidebar-title">
                        <h3 class="mb-0">Lead History</h3>
                  </div>
                  <div class="rsidebar-middle p-0 history">
                                          
                  </div>
               </div>

               <div class="rsidebar-items send-sms lead-refer">
                  <div class="rsidebar-title">
                        <h3 class="mb-0">Refer Lead :- (<span class="countedl"></span><span class="userwise"><?php echo @$user_wise_lead_count; ?></span>)</h3>
                  </div>
                  <div class="rsidebar-middle p-0">
                     <div class="row">
                     <input type="hidden" class="form-control referids" id="refer_to_lead_ids">
                     <input type="hidden" class="form-control" value="<?php echo @$user_wise_lead; ?>" id="user_wise_lead_ids">
                        <div class="col-md-12">
                           <div class="col-xl-12 col-lg-12">
                              <div class="form-group">
                                 <label>Refer To</label>
                                 <select class="form-control" id="refer_to_person" name="refer_to_person">
                                    <option value=''>Select Refer To</option>
                                    <?php foreach($admin_record as $admi) { if($admi->admin_status=="0") { ?>
                                    <option value="<?php echo $admi->name; ?>"><?php echo $admi->name; ?></option>
                                    <?php } } ?>
                                    <?php foreach($telecaller_record as $rfl) { if($rfl->user_status=="0") { ?>
                                    <option value="<?php echo $rfl->name; ?>"><?php echo $rfl->name; ?></option>
                                    <?php } } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                    <label>Remarks*</label>
                                    <textarea class="form-control" name="remarkss" id="remarkss" rows="8"></textarea>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-fix-bottom">
                                 <div class="btn-group mb-3 float-right" role="group" aria-label="Basic example">
                                    <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>LeadlistController/crm_list">Cancel</a>
                                    <a type="button" class="btn btn-primary text-white" onclick="return lead_refertto()">Refer</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                      </div>               
                  </div>
               </div>
               
               <div class="rsidebar-items send-sms filtered-lead">
               <div class="rsidebar-title">
                  <h3 class="mb-0">Search</h3>
               </div>
               <div class="rsidebar-middle p-0">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label for="FirstName">Full Name</label>
                              <input type="text" maxlength="50" class="form-control" id="filter_prospected_name" placeholder="Full Name" value="<?php if(!empty($filter_prospected_name)) { echo @$filter_prospected_name; } ?>" name="filter_prospected_name" >
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" id="filter_email"  name="filter_email" placeholder="Email" value="<?php if(!empty($filter_email)) { echo @$filter_email; } ?>">
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>Mobile</label>
                              <input type="tel" class="form-control" id="filter_mobile" name="filter_mobile" placeholder="Mobile" value="<?php if(!empty($filter_mobile)) { echo @$filter_mobile; } ?>">
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>Channel</label>
                              <select class="form-control" id="filter_channel" name="filter_channel">
                                 <option value="">Select Channel</option>
                                 <?php foreach($channel_list as $cl) { ?>
                                 <option value="<?php echo $cl->channel_name; ?>"><?php echo $cl->channel_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>Source</label>
                              <select class="form-control" id="filter_sourse" name="filter_sourse">
                                 <option value="">Select Source</option>
                                 <?php foreach($source_list as $sl) { ?>
                                 <option value="<?php echo $sl->source_name;  ?>"><?php echo $sl->source_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>Branch</label>
                              <select class="form-control" id="filter_branch" name="filter_branch">
                                 <option value=''>Select Branch</option>
                                 <?php foreach($list_branch as $lb) {  ?>
                                 <option value="<?php echo $lb->branch_id; ?>"><?php echo $lb->branch_code; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group" id="department_data_quick">
                              <label>Department</label>
                              <select class="form-control" id="filter_department" name="filter_department">
                                 <option value="">Select Department</option>
                                 <?php foreach($list_department as $ld) { ?>
                                 <option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="d-block">Select Course Package</label>
                              <div class="pretty p-icon p-jelly p-round p-bigger">
                                 <input class="form-check-input" type="radio" name="quick_course_package" id="exampleRadios1" value="package" onclick="return get_course_package_quicks('package')" checked>
                                 <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Package</label>
                                 </div>
                              </div>
                              <div class="pretty p-icon p-jelly p-round p-bigger">
                                 <input class="form-check-input" type="radio" name="quick_course_package" id="exampleRadios2" value="single" onclick="return get_course_package_quicks('single')" >
                                 <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Single</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group" id="select_course_package_quicks">
                              <label>Course</label>
                              <select class="form-control" id="quick_package" name="quick_package">
                                 <option value="">Select Package</option>
                                 <?php foreach($list_package as $lp) { ?>
                                 <option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>Status</label>
                              <select class="form-control followuptype" id="filter_status" name="filter_status">
                                 <option value="">Select Sub-Status</option>
                                 <?php foreach($list_status_followup as $sl) { ?>
                                 <option value="<?php echo $sl->followup_type_name; ?>"><?php echo $sl->followup_type_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>Sub-Status</label>
                              <select class="form-control followupsubtype" id="filter_substatus" name="filter_substatus">
                                 <option value="">Select Sub-Status</option>
                                 <?php foreach($list_substatus_followup as $sl) { ?>
                                 <option value="<?php echo $sl->sub_type_name; ?>"><?php echo $sl->sub_type_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>From Creation Date</label>
                              <input type="date" class="form-control" id="filter_from_creatioon_date" name="filter_from_creatioon_date">
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>To Creation Date</label>
                              <input type="date" class="form-control" id="filter_to_creatioon_date" name="filter_to_creatioon_date">
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>From Modification Date</label>
                              <input type="date" class="form-control" id="filter_from_modification_date" name="filter_from_modification_date">
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>To Modification Date</label>
                              <input type="date" class="form-control" id="filter_to_modification_date" name="filter_to_modification_date">
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>From Next Action Date</label>
                              <input type="date" class="form-control" id="filter_next_action_date" name="filter_next_action_date">
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                           <div class="form-group">
                              <label>From Next Action Date</label>
                              <input type="date" class="form-control" id="filter_to_action_date" name="filter_to_action_date">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-fix-bottom">
                              <div class="btn-group mb-3 float-right" role="group" aria-label="Basic example">
                                 <a href="<?php echo base_url(); ?>LeadlistController/crm_list" class="btn btn-light text-dark" >Reset</a>
                                 <button type="button" class="btn btn-primary text-white" onclick="return filtering_lead()">Filter</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

             <div class="rsidebar-items send-sms crm-followup_record">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Lead Followup</h3>
                 </div>
                 <div class="rsidebar-middle p-0 lead-wise-followup">
                                       
                 </div>
             </div>

              <div class="rsidebar-items send-sms crm-demo">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Add To Demo</h3>
                 </div>
                 <div class="rsidebar-middle p-0 show-demo-content">
                                       
                 </div>
             </div>
               <!-- <div class="rsidebar-items send-sms crm-followup_record">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Lead Followup</h3>
                 </div>
                 <div class="rsidebar-middle p-0 history">
                                       
                 </div>
             </div> -->

            </div>
         </div>
      </div>
   </div>
</div>

<div class="lead_upload-data btn-primary" style="bottom:80px;"  data-toggle="modal" data-target=".lead_upload"> 
      <span><i class="fas fa-arrow-up"></i></span>  
</div>
<div class="lead_upload-data btn-primary"> 
      <span><i class="fa fa-plus"></i></span>  
</div>


<!-- quick-lead -->
<div class="modal fade quick-lead" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title text-dark">Quick Add</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <form  method="post" id="quick_lead_list_form" name="quick_lead_list_form">
      <div class="modal-body">
      <div id="quickmsg"></div>
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
                  <div class="col-lg-6">
                     <div class="form-group">
                     <label class="d-block">Select Course Package</label>
                     <div class="pretty p-icon p-jelly p-round p-bigger">
                        <input class="form-check-input" type="radio" name="quick_course_package" id="exampleRadios1" value="package" onclick="return get_course_package_quick('package')" checked>
                        <div class="state p-info">
                           <i class="icon material-icons">done</i>
                           <label>Package</label>
                        </div>
                     </div>
                     <div class="pretty p-icon p-jelly p-round p-bigger">
                        <input class="form-check-input" type="radio" name="quick_course_package" id="exampleRadios2" value="single" onclick="return get_course_package_quick('single')" >
                        <div class="state p-info">
                           <i class="icon material-icons">done</i>
                           <label>Single</label>
                        </div>
                     </div>
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
                  <div class="col-lg-4 mt-3 "> 
                     <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                        <label class="custom-control-label" for="customCheck1" style="font-size:14px;">Send Welcome Email :</label>
                     </div>
                  </div>
                  <div class="col-lg-4 mt-3 "> 
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                        <label class="custom-control-label" for="customCheck2" style="font-size:14px;">Send Welcome Sms :</label>
                     </div>
                  </div>
                  <div class="col-xl-12">
                     <div class="form-group">
                     <input type="submit" name="submit" value="submit" class="btn btn-primary float-right">
                     </div>
                  </div>
               </div>  
            </div>
   </div>
   </form>
</div>
</div>
 <!-- Email commpose -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel1"
          aria-hidden="true">
   <div class="modal-dialog modal-lg">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" id="myLargeModalLabel1">Email Content</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
      <form class="composeForm"> 
         <!-- <textarea id="ckeditor" name="email_compose_Textarea" rows="5" class="form-control email_compose_Textarea"></textarea> -->
         <textarea id="editor" class="form-control email_compose_Textarea" rows="3" style="display:none;"></textarea> 
      </form>
      </div>
   </div>
   </div>
</div>

<!--Upload data-->
<div class="modal fade lead_upload" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2"
   aria-hidden="true">
   <div class="modal-dialog modal-lg">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title text-dark">Upload Data</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <form  method="post" id="upload_lead_data" name="upload_lead_data" enctype="multipart/form-data">
      <div class="modal-body">
      <div id="upload_msg"></div>
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
               <div class="form-group" >
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
               <div class="form-group" >
                  <label>Last School/College Name</label>
                  <select class="form-control" id="upload_last_school_college" name="upload_last_school_college">
                  <option value="">Select School/College</option>
                  <?php foreach($college_school_list as $csl) { ?>
                  <option value="<?php echo $csl->school_name; ?>"><?php echo $csl->school_name; ?></option>
                  <?php } ?>
               </select>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6">
               <div class="form-group" >
                  <label>Select Branch</label>
                  <select class="form-control" id="upload_branch" name="upload_branch" onchange="return get_status_department_upload()">
                     <option value="Not Known">Not Known</option>
                     <?php foreach($list_branch as $br) { ?>
                     <option value="<?php echo $br->branch_id; ?>"><?php echo $br->branch_code; ?></option>
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6" id="upload_department_data">
               <div class="form-group" >
                  <label>Select Department</label>
                  <select class="form-control" id="upload_department" name="upload_department">
                     <?php foreach($list_department as $ld) { ?>
                     <option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="form-group">
                  <label class="d-block">Select Course Package</label>
                  <div class="pretty p-icon p-jelly p-round p-bigger">
                     <input class="form-check-input" type="radio" name="upload_course_package" id="exampleRadios1" value="package"  onclick="return get_course_package_upload('package')" checked>
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>Package</label>
                     </div>
                  </div>
                  <div class="pretty p-icon p-jelly p-round p-bigger">
                     <input class="form-check-input" type="radio" name="upload_course_package" id="exampleRadios2" value="single" onclick="return get_course_package_upload('single')">
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>Single</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6" id="upload_select_course_package">
               <div class="form-group">
                  <label>Select package*</label>
                  <select class="form-control" name="course_or_package1_upload" id="course_orpackage_upload">
                     <option value="">Select Package</option>
                     <option value="Not Known">Not Known</option>
                     <?php foreach($list_package as $lp) { ?>
                     <option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="col-lg-6" id="upload_select_course_single"> 
               <div class="form-group">
                  <label>Select Course*</label>
                  <select class="form-control" name="course_or_package2_upload" id="course_orsingle_upload" >
                     <option value="">Select Course</option>
                     <option value="Not Known">Not Known</option>
                     <?php foreach($list_course as $lp) { ?>
                     <option value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
                     <?php } ?>
                  </select>
               </div>
            </div> 
            <div class="col-lg-6"> 
               <div class="form-group">
                  <label>State*</label> 
                  <select class="form-control" id="upload_state" name="upload_state">
                     <option value="">Select state</option>
                     <?php foreach($list_state as $ls) { ?>
                     <option value="<?php echo $ls->state_name; ?>" <?php if("Gujarat"==$ls->state_name){ echo "selected"; } ?>><?php echo $ls->state_name; ?></option>
                     <?php } ?>
                  </select>
               </div> 
            </div>
            <div class="col-lg-6"> 
               <div class="form-group">
                  <label>City*</label>
                  <select class="form-control" id="upload_city" name="upload_city">
                     <option value="">Select City</option>
                     <?php foreach($list_city as $lc) { ?>
                     <option value="<?php echo $lc->city_name; ?>" <?php if("Surat"==$lc->city_name) { echo "selected"; }?>><?php echo $lc->city_name; ?></option>
                     <?php } ?>
               </select>
               </div>
            </div>
            <h5 class="text-center text-primary w-100 mt-3">Upload File With Prospect Candidate Details</h5>
            <div class="col-md-8 mt-1 text-center">
               <div class="d-flex justify-content-center mt-3">
                  <div class="upload-lead-file">
                     <input type="file" class="mt-2"  id="csv_data"  name="csv_data" data-api-attached="true">
                  </div>
                  <div class="download-lead-file">
                  <a href="javascript:Download_file()" class="btn btn-primary text-white rounded-circle btn-sm"
                  style="border-radius: 100px !important;line-height: 17px;"><i class="fa fa-download pt-2 pb-2 pl-1 pr-1" aria-hidden="true"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 mt-3 "> 
               <div class="custom-control custom-checkbox mb-1">
                  <input type="checkbox" class="custom-control-input" id="customCheck1" name="quick_send_email" checked>
                  <label class="custom-control-label" for="customCheck1" style="font-size:14px;">Send Welcome Email :</label>
               </div>
               <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck2" name="quick_send_sms" checked>
			         <label class="custom-control-label" for="customCheck2" style="font-size:14px;">Send Welcome Sms :</label>
               </div>
            </div> 
            <div class="col-lg-12"> 
               <div class="form-group">
               <input type="submit" name="upload_data" value="import Data" class="btn btn-primary upload_import_data float-right">
               </div>
            </div>
         </div>
      </div>
      </form>
   </div>
   </div>
</div>        

<!-- basic modal -->
<div class="modal fade downloadlead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Download All Leads</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
      <div id="lead_msg_download"></div>
      <input type="hidden" name="current_user" id="current_user" value="<?php echo $_SESSION['user_name']; ?>">
      Do you want to download filtered data?
      </div>
      <div class="modal-footer bg-whitesmoke br">
         <input type="submit" class="btn btn-primary" id="leadmaildownload" value="Download Lead">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
   </div>
</div>
 <!-- Fsculty Time  -->
 <div class="modal fade facultytime" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" id="myLargeModalLabel">Check Time</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body showtime">
        
      </div>
   </div>
   </div>
</div>

<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="http://muffinman.io/rocketScroll/js/rocketHelpers.js"></script>
 <script src="http://muffinman.io/rocketScroll/js/rocketScroll.js"></script>
 <script src="http://muffinman.io/rocketScroll/js/demo.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
 <script src="https://www.jqueryscript.net/demo/wysiwyg-editor-bootstrap/src/js/wysiwyg.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
 <!-- General JS Scripts -->

 <!-- JS Libraies -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
 <script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
 <!-- Page Specific JS File -->

 <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
 <!-- <script src="http://www.radixtouch.in/templates/admin/otika/source/light/assets/bundles/ckeditor/ckeditor.js"></script>
  Page Specific JS File -->
  <!-- <script src="http://www.radixtouch.in/templates/admin/otika/source/light/assets/js/page/ckeditor.js"></script> -->  
 <!-- JS Libraies -->
 <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
 <!-- Custom JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>

 <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
 <script>
function copytextF() {
  var copyText = document.getElementsByClassName("open_rightsidebar"); 
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy"); 
}
</script>
<script>
function get_copy_paste_mobile(ic){
  // alert(ic);
  
   // $("#copy_paste_record_2").attr('data-toggle', "tooltip");
   // $("[title]").tooltip({ position: "top", opacity: 1 });

  var data_text  = "company_name_copy_paste_mobile_"+ic;
  var dd =  document.getElementById(data_text).textContent;
  var inp =document.createElement('input');
  document.body.appendChild(inp)
  inp.value =dd;
  inp.select();
  document.execCommand('copy',false);
  inp.remove();

  var copy_ppp =  "copy_paste_record_mobile_"+ic;
  var ddd =  document.getElementById(copy_ppp);
   // $("#copy_paste_record_2").prop('tooltipText', "copied");
   $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
}
</script>
 <script>
    $( document ).ready(function() {
       //Lead Query
       console.log($(window).innerWidth());

      if($(window).innerWidth() <= 1199) {
      var $list_dataI = $('.list_inquiry').html();
      $( ".list_statusI" ).after( $list_dataI );
      } 
      if($(window).innerWidth() <= 818)  {
         var $list_dataB = $('.list_inquiry').html();
         $( ".adm_item:first-child" ).after( $list_dataB );
      }
      //window Height
      $getheight = $( window ).height();
      
      $navheight = $('.navbar-bg').height();
      $topheight = $('.extra_top-menu').height();
      $bredheight = $('.main-content > .row').height();
    
      $totalheight = $navheight + $topheight + $bredheight;
     
      $get_Height = $(window).height() - $totalheight - 55;
      //$('.lead-main-wrap').css("height", $get_Height);
      //alert($get_Height);
   });
 </script>
 <script>
jQuery(".lead-main-wrap").niceScroll({
  cursorcolor:"#5864bd"
}); 
jQuery(".nicescroll-rails-vr").appendTo(".lead-main-wrap");

jQuery(".sidebar-panel").niceScroll({
  cursorcolor:"#5864bd"
}); 
jQuery(".nicescroll-rails-vr").clone().appendTo(".sidebar-panel");


 </script>
  <script type="text/javascript">
   $(document).ready(function () {
         $('#editor').wysiwyg({
         });
   });
</script>
        
 <script>
   $(document).ready(function(){
   	jQuery('.lead-main-wrap').scroll(function(){
   		 var filter_name =  $('#filtering_type').val();
   		 var lastID = $('.load-more').attr('lastID'); 
      
      // console.log("scroll height="+$(this).scrollTop());
      // console.log("InnerHeight="+$(this).innerHeight());
      // console.log("InnerHeight="+$(this)[0].scrollHeight);

   		if((($(this).scrollTop() +  $(this).innerHeight()) >=  $(this)[0].scrollHeight-1) && lastID != 0 )
   		{
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
                       $('.lead_block').append(html);
                   }
               });
   		}
     		// alert("bottom="+bottom);
   	});
   });
 </script>
<script>
var picker = new Lightpick({
    field: document.getElementById('next_followup_date'),
    onSelect: function(date){
        document.getElementById('result-1').innerHTML = date.format('Do MMMM YYYY');
    }
});

var picker = new Lightpick({
    field: document.getElementById('dob'),
    onSelect: function(date){
        document.getElementById('result-1').innerHTML = date.format('Do MMMM YYYY');
    }
});
</script>


<!-- script for side bar conttent in Lead -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
	// just for the demos, avoids form submit

	$(document).ready(function() {

		$('#lead_list_form_side_bar').validate({
			rules: {
				name: {
					required: true
				},
				gender: {
					required: true
				},
				mobile_no: {
					required: true,
					number: true,
					minlength: 10,
					maxlength: 10
				},
				source_id: {
					required: true
				},
				next_followup_date: {
					required: true
				},
				next_followup_time: {
					required: true
				},
				status: {
					required: true
				},
				sub_status: {
					required: true
				},
				branch_id: {
					required: true
				},
				department: {
					required: true
				},
				any_remarks: {
					required: true
				}
			},

			messages: {
				name: {
					required: "<div style='color:red'>Please Enter Name</div>"
				},
				gender: {
					required: "<div style='color:red'>Please Select Gender</div>"
				},
				mobile_no: {
					required: "<div style='color:red'>Please Enter Mobile Number</div>",
					number: "<div style='color:red'>Please Enter Number</div>",
					minlength: "<div style='color:red'>Minimum 10 digits</div>",
					maxlength: "<div style='color:red'>Maximum 10 digits</div>",
				},
				source_id: {
					required: "<div style='color:red'>Please Select Source</div>"
				},
				status: {
					required: "<div style='color:red'>Please select Status</div>"
				},
				sub_status: {
					required: "<div style='color:red'>Please select Sub-Status</div>"
				},
				next_followup_date: {
					required: "<div style='color:red'>Select Next Action Date</div>"
				},
				next_followup_time: {
					required: "<div style='color:red'>Select Next Action Time</div>"
				},
				branch_id: {
					required: "<div style='color:red'>Please select branch</div>"
				},
				department: {
					required: "<div style='color:red'>Please select Department</div>"
				},
				any_remarks: {
					required: "<div style='color:red'>Please Enter Remarks</div>"
				}
			},

			submitHandler: function() {
				event.preventDefault();
				var form_data = $('#lead_list_form_side_bar').serialize();
				console.log(form_data);
				var filter_name = $('#filtering_type').val();

				$.ajax({
					url: "<?php echo base_url(); ?>LeadlistController/lead_list_add",
					type: "POST",
					data: form_data,
					success: function(Res)
					{
						 //alert(Res);
                   if(Res == '1')
                  {
                        $('#msg').html(iziToast.success({
                           title: 'Success',
                           timeout: 2500,
                           message: 'This Record Updated.',
                           position: 'topRight'
                           }));
                  }
                  else if(Res == '0')
                  {
                        $('#msg').html(iziToast.error({
                           title: 'Canceled!',
                           timeout: 2500,
                           message: 'Someting Wrong!!',
                           position: 'topRight'
                           }));
                  }
					
						$.ajax({
							url: "<?php echo base_url(); ?>LeadlistController/Crm_list",
							type: "POST",
							data: {
								'test': 'test',
								'status_f': filter_name
							},
							success: function(data)
							{
								$('.lead_block').html(data);
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
             success:function(resp)
             {
               var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if(ddd=='1') {
                  $('#quickmsg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'Quick Lead Add Successfully',
                        position: 'topRight'
                        }));
                        setTimeout(function() {
                           location.reload();
                        },2520);
               }
               else if(ddd=="2") {
                  $('#quickmsg').html(iziToast.error({
                     title: 'Canceled!',
                     timeout: 2500,
                     message: 'Lead is already Exist!!',
                     position: 'topRight'
                     }));
                     setTimeout(function() {
                        location.reload();
                     },2520);
               } else if(ddd=="0") {
                  $('#quickmsg').html(iziToast.error({
                     title: 'Canceled!',
                     timeout: 2500,
                     message: 'Someting Wrong!!',
                     position: 'topRight'
                     }));
                     setTimeout(function() {
                           location.reload();
                        },2520);
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
             success:function(resp)
             {
                $('#upload_lead_data')[0].reset();
                var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if(ddd=='1') {
                  $('#upload_msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'Importing Data',
                        position: 'topRight'
                        }));
                        setTimeout(function() {
                           location.reload();
                        },2520);
               }
               else  if(ddd=="0") {
                  $('#upload_msg').html(iziToast.error({
                     title: 'Canceled!',
                     timeout: 2500,
                     message: 'Someting Wrong!!',
                     position: 'topRight'
                     }));
                     setTimeout(function() {
                           location.reload();
                        },2520);
               }
             }
          });
       }
 });

});
</script>

<script>
	var i = 0;
function update_lead_record(lead_list_id)
{
   $.ajax({
      url: "<?php echo base_url(); ?>LeadlistController/get_lead_record",
      type: "post",
      data: {
         'lead_list_id': lead_list_id
      },
      success: function(res)
      {
         $('.edit-details').show();
         $('.first-section').show();
         $('.second-section').show();
         $('.third-section').show();
         $('.forth-section').show();
         $('.fifth-section').show();
         $('.candidate-details').show();
         $('.education-detail').show();
         $('.send-email-details').hide();
         $('.send-sms-details').hide();
         $('#status_change').html('Lead');
         $('.crm-history').hide();
         $('.filtered-lead').hide();
         $('.lead-refer').hide();
         $('.crm-followup_record').hide();
         $('.crm-demo').hide();

         var data = $.parseJSON(res);
         $('#lead_list_id').val(data.record['lead_get_record'].lead_list_id);
         $('#name').val(data.record['lead_get_record'].name);
         $('#surname').val(data.record['lead_get_record'].surname);
         var gender = data.record['lead_get_record'].gender;
         if (gender == 'male') {
            $("#gender_male").prop("checked", true);
         } else if (gender == 'female') {
            $("#gender_female").prop("checked", true);
         } else {
            $("#gender_other").prop("checked", true);
         }

         $('#add_lead_name_fast').html(data.record['lead_get_record'].name);
         $('#email').val(data.record['lead_get_record'].email);
         $('#mobile_no').val(data.record['lead_get_record'].mobile_no);
         var campaign_name_data = data.record['lead_get_record'].campaign_name;

         if (campaign_name_data == '') {
            $('#leadName').val("Manually Added");
         } else
         {
            $('#source_id').val(data.record['lead_get_record'].source_id);
         }
         var channel_id_record = data.record['lead_get_record'].channel_id;

         if (channel_id_record == 'Telephonic Quick Add')
         {
            if (i == 0)
            {
               $('#channel_id').append(new Option(channel_id_record, channel_id_record));
            }
            $('#channel_id').val(data.record['lead_get_record'].channel_id);
         } else
         {
            $('#channel_id').val(data.record['lead_get_record'].channel_id);
         }

         var school_college_id = data.record['lead_get_record'].school_college_id;
         
         if (school_college_id == '')
         {
            if (i == 0) {
               $('#school_college_id').append(new Option(school_college_id, school_college_id));
               $('#school_college_id').val(data.record['lead_get_record'].school_college_id);
            }
         } else {
            $('#school_college_id').append(new Option(school_college_id, school_college_id));
            $('#school_college_id').val(data.record['lead_get_record'].school_college_id);
            // $('#sub_status').val(data.record['lead_get_record'].school_college_id);
         }

         $('#priority').val(data.record['lead_get_record'].priority);
         $('#reference_name').val(data.record['lead_get_record'].reference_name);
         $('#referred_to').val(data.record['lead_get_record'].referred_to);
         $('#status').val(data.record['lead_get_record'].status);

         var check_status = data.record['lead_get_record'].status;

         if (check_status == '1 - New' || check_status == '8 - Closed' || check_status == '7 - Enrolled') {
            $('#existing_follow_up_your').hide();
            $('#next_follow_up_date12').hide();
            $('#next_follow_up_time12').hide();
            $('#next_follow_up_remarks12').hide();
         } else {
            $('#existing_follow_up_your').show();
            $('#next_follow_up_date12').show();
            $('#next_follow_up_time12').show();
            $('#next_follow_up_remarks12').show();
         }
         var sub_status_lead = data.record['lead_get_record'].sub_status;

         if (sub_status_lead == 'Not Known')
         {
            if (i == 0) {
               $('#sub_status').append(new Option(sub_status_lead, sub_status_lead));
               $('#sub_status').val(data.record['lead_get_record'].sub_status);
            }
         } else {
            $('#sub_status').val(data.record['lead_get_record'].sub_status);
         }

         $('#followup_mode').val(data.record['lead_get_record'].followup_mode);
         $('#school_college_id').val(data.record['lead_get_record'].school_college_id);
         $('#followup_mode').val(data.record['lead_get_record'].followup_mode);

         var next_follow = data.record['lead_get_record'].next_followup_date;

         if (next_follow != '')
         {
            var next_f = next_follow.split(" ");

            $("#next_followup_date").val(next_f[0]);
            // $('#next_followup_date').val(dat1);
            $('#next_followup_time').val(next_f[1]);
            $('#followup_remark').val(data.record['lead_get_record'].followup_remark);
         } else
         {
            // alert("nathi");
            $('#next_followup_time').val('');
            $('#next_followup_date').val('');
            $('#followup_remark').val('');
         }

         $('#any_remarks').val(data.record['lead_get_record'].any_remarks);
         var area_lead = data.record['lead_get_record'].area;
         // alert(area_lead);
         if (area_lead == 'Not Known')
         {
            // if(i==0){
            $('#area').append(new Option(area_lead, area_lead));
            $('#area').val(data.record['lead_get_record'].area);
         } else
         {
            $('#area').val(data.record['lead_get_record'].area);
         }

         $('#branch_id').val(data.record['lead_get_record'].branch_id);
         $('#department').val(data.record['lead_get_record'].department);

         var pack_sin = data.record['lead_get_record'].course_package;

         if (pack_sin == 'package')
         {
            $("#course_package").prop("checked", true);
            // get_course_package('package');
            $('.select_course_package').show();
            $('.select_course_single').hide();
            $('#course_orpackage').val(data.record['lead_get_record'].course_or_package);
         } else
         {
            $("#course_single").prop("checked", true);
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

function submit_searching(){
   var se_form = $('#searching_form').val();
   var filter_name = $('#filtering_type').val();
   // alert(filter_name);
   // alert(se_form);
   var se = se_form.length;
   if (se >= 4)
   {
      $.ajax({
         url: "<?php echo base_url(); ?>LeadlistController/Crm_list",
         type: "post",
         data: {
            'status_f': filter_name,
            'searching_l': se_form,
            'test': 'test'
         },
         success: function(resp) {
            $('.lead_block').html(resp);
         }
      });
   } else
   {
      $('#side_lead_response').html("<div class='alert alert-warning'>Atleast 3 characters required</div>");
      $('#side_lead_response').fadeIn();
      $('#side_lead_response').fadeOut(2000);
   }
}

function filtering_lead()
{
   var filter_prospected_name = $('#filter_prospected_name').val();
   var filter_email = $('#filter_email').val();
   var filter_mobile = $('#filter_mobile').val();
   var filter_sourse = $('#filter_sourse').val();
   var filter_branch = $('#filter_branch').val();
   var filter_department = $('#filter_department').val();
   var filter_channel = $('#filter_channel').val();
   var filter_status = $('#filter_status').val();
   var filter_substatus = $('#filter_substatus').val();
   var filter_from_creatioon_date = $('#filter_from_creatioon_date').val();
   var filter_to_creatioon_date = $('#filter_to_creatioon_date').val();

      $.ajax({
         url: "<?php echo base_url(); ?>LeadlistController/lead_filter",
         type: "post",
         data: {
            'filter_prospected_name': filter_prospected_name,
            'filter_email': filter_email,
            'filter_mobile': filter_mobile,
            'filter_sourse': filter_sourse,
            'filter_branch': filter_branch,
            'filter_department': filter_department,
            'filter_channel': filter_channel,
            'filter_status': filter_status,
            'filter_substatus': filter_substatus,
            'filter_from_creatioon_date': filter_from_creatioon_date,
            'filter_to_creatioon_date': filter_to_creatioon_date
         },
         success: function(resp) {
            $('.lead_block').html(resp);
         }
      });

      $.ajax({
         url: "<?php echo base_url(); ?>LeadlistController/refer_reco",
         type: "post",
         data: {
            'filter_prospected_name': filter_prospected_name,
            'filter_email': filter_email,
            'filter_mobile': filter_mobile,
            'filter_sourse': filter_sourse,
            'filter_branch': filter_branch,
            'filter_department': filter_department,
            'filter_channel': filter_channel,
            'filter_substatus': filter_substatus,
            'filter_from_creatioon_date': filter_from_creatioon_date,
            'filter_to_creatioon_date': filter_to_creatioon_date
         },
         success: function(repo) {
            var data = $.parseJSON(repo);
            var le = data;
            var count = Object.keys(le).length;
            
            $('#refer_to_lead_ids').val(data);
            $('.countedl').html(count);
            $('.userwise').hide();
           
         }
      });
}

function lead_refertto()
{
   var user_wise_lead_ids = $('#user_wise_lead_ids').val();
   var lead_list_ids = $('.referids').val();
   var refer_to_person = $('#refer_to_person').val();
   var remarks = $('#remarkss').val();
  
      $.ajax({
         url: "<?php echo base_url(); ?>LeadlistController/refered_to_other",
         type: "post",
         data: {
            'user_wise_lead_ids': user_wise_lead_ids,
            'lead_list_ids': lead_list_ids,
            'refer_to_person': refer_to_person,
            'remarks': remarks
         },
         success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd=='1'){
               $('#msg').html(iziToast.success({
                  title: 'Success',
                  timeout: 2500,
                  message: 'SuccessFully Allocated On This Lead',
                  position: 'topRight'
                  }));

                  setTimeout(function() {
                    location.reload();
                }, 2520);
            } else if(ddd=="2") {
               $('#msg').html(iziToast.error({
                  title: 'Canceled!',
                  timeout: 2500,
                  message: 'Someting Wrong!!',
                  position: 'topRight'
                  }));
                  
                  setTimeout(function() {
                    location.reload();
                }, 2520);
            }
         }
      });
}

function add_followup_lead_list(lead_list_id)
{
   $.ajax({
      url: "<?php echo base_url(); ?>LeadlistController/get_lead_record",
      type: "post",
      data: {
         'lead_list_id': lead_list_id
      },
      success: function(res)
      {
         $('.edit-details').show();
         $('.first-section').hide();
         $('.second-section').hide();
         $('.third-section').show();
         $('.forth-section').hide();
         $('.fifth-section').hide();
         $('.candidate-details').hide();
         $('.education-detail').hide();
         $('.send-email-details').hide();
         $('.send-sms-details').hide();
         $('#status_change').html('Followup For');
         $('.crm-history').hide();
         $('.filtered-lead').hide();
         $('.lead-refer').hide();
         $('.crm-followup_record').hide();
         $('.crm-demo').hide();

         var data = $.parseJSON(res);

         $('#lead_list_id').val(data.record['lead_get_record'].lead_list_id);
         $('#name').val(data.record['lead_get_record'].name);
         $('#surname').val(data.record['lead_get_record'].surname);

         var gender = data.record['lead_get_record'].gender;

         if (gender == 'male') {
            $("#gender_male").prop("checked", true);
         } else if (gender == 'female') {
            $("#gender_female").prop("checked", true);
         } else {
            $("#gender_other").prop("checked", true);
         }

         $('#add_lead_name_fast').html(data.record['lead_get_record'].name);
         $('#email').val(data.record['lead_get_record'].email);
         $('#mobile_no').val(data.record['lead_get_record'].mobile_no);
         $('#leadName').val(data.record['lead_get_record'].campaign_name);
         $('#source_id').val(data.record['lead_get_record'].source_id);

         var channel_id_record = data.record['lead_get_record'].channel_id;

         if (channel_id_record == 'Telephonic Quick Add')
         {
            if (i == 0)
            {
               $('#channel_id').append(new Option(channel_id_record, channel_id_record));

            }
               $('#channel_id').val(data.record['lead_get_record'].channel_id);
         } else
         {
            $('#channel_id').val(data.record['lead_get_record'].channel_id);
         }

         $('#priority').val(data.record['lead_get_record'].priority);
         $('#reference_name').val(data.record['lead_get_record'].reference_name);
         $('#referred_to').val(data.record['lead_get_record'].referred_to);
         $('#status').val(data.record['lead_get_record'].status);

         var check_status = data.record['lead_get_record'].status;

         if (check_status == '1 - New' || check_status == '8 - Closed' || check_status == '7 - Enrolled') {

            $('#existing_follow_up_your').hide();
            $('#next_follow_up_date12').hide()
            $('#next_follow_up_time12').hide();
            $('#next_follow_up_remarks12').hide();
         } else {
            $('#existing_follow_up_your').show();
            $('#next_follow_up_date12').show();
            $('#next_follow_up_time12').show();
            $('#next_follow_up_remarks12').show();
         }

         var sub_status_lead = data.record['lead_get_record'].sub_status;

         if (sub_status_lead == 'Not Known')
         {
            if (i == 0) {
               $('#sub_status').append(new Option(sub_status_lead, sub_status_lead));
               $('#sub_status').val(data.record['lead_get_record'].sub_status);
            }
         } else {
            $('#sub_status').val(data.record['lead_get_record'].sub_status);
         }
         var school_college_id = data.record['lead_get_record'].school_college_id;

         $('#school_college_id').val(data.record['lead_get_record'].school_college_id);
         $('#followup_mode').val(data.record['lead_get_record'].followup_mode);

         var next_follow = data.record['lead_get_record'].next_followup_date;

         if (next_follow != '')
         {
            // alert(nex?t_follow);
            var next_f = next_follow.split(" ");

            $("#next_followup_date").val(next_f[0]);
            // $('#next_followup_date').val(dat1);
            $('#next_followup_time').val(next_f[1]);
            $('#followup_remark').val(data.record['lead_get_record'].followup_remark);
         } else
         {
            // alert("nathi");
            $('#next_followup_time').val('');
            $('#next_followup_date').val('');
            $('#followup_remark').val('');
         }
         $('#any_remarks').val(data.record['lead_get_record'].any_remarks);

         var area_lead = data.record['lead_get_record'].area;
         // alert(area_lead);

         if (area_lead == 'Not Known')
         {
            // if(i==0){
            $('#area').append(new Option(area_lead, area_lead));
            $('#area').val(data.record['lead_get_record'].area);
         } else
         {
            $('#area').val(data.record['lead_get_record'].area);
         }

         $('#branch_id').val(data.record['lead_get_record'].branch_id);
         $('#department').val(data.record['lead_get_record'].department);

         var pack_sin = data.record['lead_get_record'].course_package;

         if (pack_sin == 'package')
         {
            $("#course_package").prop("checked", true);
            // get_course_package('package');
            $('.select_course_package').show();
            $('.select_course_single').hide();
            $('#course_orpackage').val(data.record['lead_get_record'].course_or_package);
         } else
         {
            $("#course_single").prop("checked", true);
            // get_course_package('single');
            $('.select_course_package').hide();
            $('.select_course_single').show();
            $('#course_orsingle').val(data.record['lead_get_record'].course_or_package);
         }
         i++;

      }
   });
}

function show_email_template(lead_id){
      $('.edit-details').hide();
      $('.first-section').hide();
      $('.second-section').hide();
      $('.third-section').hide();
      $('.forth-section').hide();
      $('.fifth-section').hide();
      $('.candidate-details').hide();
      $('.education-detail').hide();
      $('.send-email-details').show();
      $('.send-sms-details').hide();
      $('#status_change').html('Send Email to');
      $('.crm-history').hide();
      $('.filtered-lead').hide();
      $('.lead-refer').hide();
      $('.crm-followup_record').hide();
      $('.crm-demo').hide();
   
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
   					// alert(Res)
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
               //tinyMCE.addClass('email_compose_Textarea').setContent(title_data);
              // tinymce.get('email_compose_Textarea').setContent(title_data);
   		}
   	});
   }

   function get_sms_template_record(lead_id)
   {
      $('.edit-details').hide();
      $('.first-section').hide();
      $('.second-section').hide();
      $('.third-section').hide();
      $('.forth-section').hide();
      $('.fifth-section').hide();
      $('.candidate-details').hide();
      $('.education-detail').hide();
      $('.send-email-details').hide();
      $('.send-sms-details').show();
      $('#status_change').html('Send SMS to');
      $('.crm-history').hide();
      $('.filtered-lead').hide();
      $('.lead-refer').hide();
      $('.crm-followup_record').hide();
      $('.crm-demo').hide();
      
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
   				$('#add_lead_name').html(data.record['lead_get_record'].name);
   		}
   	});
   }

   function get_sms_template()
   {
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
   				success:function(resp)
   				{
                  var data = $.parseJSON(resp);
                  var ddd = data['all_record'].status;
   					if(ddd=='1')
   					{
   						$('#msg').html(iziToast.success({
                           title: 'Success',
                           timeout: 2500,
                           message: 'Send SMS.',
                           position: 'topRight'
                           }));
   					}
   					else if(ddd=="2")
   					{
                     $('#msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                        }));
   					}

   					$.ajax({
   						url 	: "<?php echo base_url(); ?>LeadlistController/Crm_list",
   						type 	: "POST",
   						data 	: { 'test' : 'test' },
   						success : function(data)
   						{
   							$('.extra_lead_menu').html(data);
   						}
   					});
   				}
   		});	
   	}
   }

   function view_lead_histroy(id){
      $('.edit-details').hide();
      $('.first-section').hide();
      $('.second-section').hide();
      $('.third-section').hide();
      $('.forth-section').hide();
      $('.fifth-section').hide();
      $('.candidate-details').hide();
      $('.education-detail').hide();
      $('.send-email-details').hide();
      $('.send-sms-details').hide();
      $('.crm-history').show();
      $('.filtered-lead').hide();
      $('.lead-refer').hide();
      $('.crm-followup_record').hide();
      $('.crm-demo').hide();
      //$('#status_change').html('Send SMS to');
   	
   		$.ajax({
   			url: "<?php echo base_url(); ?>LeadlistController/crm_lead_history",
   			type : "post",
   			data :{
   				'lead_list_id' : id
   			},
   			success:function(res)
   			{
   				$('.history').html(res);
   			}
   		});
   }

   function allocated_todemo(assigned_id){
      $('.edit-details').hide();
      $('.first-section').hide();
      $('.second-section').hide();
      $('.third-section').hide();
      $('.forth-section').hide();
      $('.fifth-section').hide();
      $('.candidate-details').hide();
      $('.education-detail').hide();
      $('.send-email-details').hide();
      $('.send-sms-details').hide();
      $('.crm-history').hide();
      $('.filtered-lead').hide();
      $('.lead-refer').hide();
      $('.crm-followup_record').hide();
      $('.crm-demo').show();
     
   		$.ajax({
   			url: "<?php echo base_url(); ?>LeadlistController/allocated_to_demo",
   			type : "post",
   			data :{
   				'lead_list_id' : assigned_id
   			},
   			success:function(res)
   			{
   				$('.show-demo-content').html(res);
   			}
   		});
   }

   function referleads(id){
      $('.edit-details').hide();
      $('.first-section').hide();
      $('.second-section').hide();
      $('.third-section').hide();
      $('.forth-section').hide();
      $('.fifth-section').hide();
      $('.candidate-details').hide();
      $('.education-detail').hide();
      $('.send-email-details').hide();
      $('.send-sms-details').hide();
      $('.crm-history').hide();
      $('.filtered-lead').hide();
      $('.lead-refer').show();
      $('.crm-followup_record').hide();
      $('.crm-demo').hide();
   }

   function filterlead(id)
   {
      $('.edit-details').hide();
      $('.first-section').hide();
      $('.second-section').hide();
      $('.third-section').hide();
      $('.forth-section').hide();
      $('.fifth-section').hide();
      $('.candidate-details').hide();
      $('.education-detail').hide();
      $('.send-email-details').hide();
      $('.send-sms-details').hide();
      $('.crm-history').hide();
      $('.filtered-lead').show();
      $('.lead-refer').hide();
      $('.crm-followup_record').hide();
      $('.crm-demo').hide();
   }

   function get_prospect_name()
   {
   	var prospect_name =  $('#name').val();
   	$('#add_lead_name_fast').html(prospect_name);
   }

   function get_course_package_quick(package)
   {
     $.ajax({
   	url : "<?php echo base_url() ?>LeadlistController/get_course_package_single_quick",
   	type : "Post",
   	data : {
   		'course' : package
   	},
   	success:function(Res){
   		$('#select_course_package_quick').html(Res);
   	}
   });
   }

   function get_course_package_quicks(package)
   {
     $.ajax({
   	url : "<?php echo base_url() ?>LeadlistController/get_course_package_single_quick",
   	type : "Post",
   	data : {
   		'course' : package
   	},
   	success:function(Res){
   		$('#select_course_package_quicks').html(Res);
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

   $('.followuptype').change(function(){
   		var followup_type_name = $('.followuptype').val();

	   	$.ajax({
	     	url:"<?php echo base_url(); ?>LeadlistController/get_folloupreco",
	     	method:"POST",
	     	data:{ 'followup_type_name' : followup_type_name}, 
	     	success:function(data){
	      		$('.followupsubtype').html(data);
	   		}
		});
   });

   function get_followup_response(lead_id){
      $('.edit-details').hide();
      $('.first-section').hide();
      $('.second-section').hide();
      $('.third-section').hide();
      $('.forth-section').hide();
      $('.fifth-section').hide();
      $('.candidate-details').hide();
      $('.education-detail').hide();
      $('.send-email-details').hide();
      $('.send-sms-details').hide();
      $('.crm-history').hide();
      $('.filtered-lead').hide();
      $('.lead-refer').hide();
      $('.crm-followup_record').show();
      $('.crm-demo').hide();

      var user_role =  $('#user_role_name').val();
      var name =  $('#lead_info_name_record').val();

      $.ajax({
         url : "<?php echo base_url();  ?>LeadlistController/get_lead_record_followup",
         type:"post",
         data:{
            'lead_id' : lead_id,
            'user_role_name' : user_role
         },
         success:function(response){
            $('.lead-wise-followup').html(response);
            $('#change_lead_status').html('Counselor Followups For ');
            $('#add_lead_name_fast').html(name);
        }
    });
}
</script>
<script>  
  $('#leadmaildownload').on('click', function() {
    var current_user = $('#current_user').val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>LeadlistController/leadreco_download_mail",
      data: {
        'current_user': current_user
      },
      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        if (ddd == '1') {
          $('#lead_msg_download').html(iziToast.success({
            title: 'Success',
            timeout: 2000,
            message: 'Successfully Downloaded.',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        } else {
          $('#lead_msg_download').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2000,
            message: 'Someting Wrong!!',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }
      }
    });
    return false;
  });
</script>
