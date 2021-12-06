<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
     <!-- <link rel="stylesheet" href="https://www.jqueryscript.net/demo/powerful-calendar/style.css"> -->
    <!-- <link rel="stylesheet" href="https://www.jqueryscript.net/demo/powerful-calendar/theme.css">  -->
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
 <link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

<div class="main-content">
   <div class="extra_lead_menu" id="response_sidemail_compose">
      <div class="row">
         <div class="col-12 d-flex justify-content-between">
            <h6 class="page-title text-dark mb-3">Lead List</h6>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb p-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Library</a></li>
                  <li class="breadcrumb-item active open_rightsidebar" aria-current="page">Data</li>
               </ol>
            </nav>
         </div>
      </div>
      <div class="extra_Block_box"> 
      <div class="extra_top-menu lead-list-menu">
        <div class="lead-list-right-menu mt-2 mb-3">
          <div class="lead-list-icon text-right">
          	<?php date_default_timezone_set("Asia/Calcutta");
                     $current_date = date('m/d/Y'); ?>

                     <input type="hidden" name="start_date" id="start_date" value="<?php echo $followup_status_wise['date_record'] ?>">
          <div class="d-inline-block float-left"><button class="btn btn-light text-dark">Followups on <?php echo $current_date; ?></button></div>
            <div class="crm-search-menu">
            <input type="search" class="form-control" name="searching_form" id="searching_form"  placeholder="Search by Name, Email or Mobile">
            <i type="button" class="fa fa-search" aria-hidden="true" onclick="return submit_searching()"></i>
          </div>
            <a href="#" class="btn btn-info text-white"><i class="fa fa-bullhorn"></i></a>
            <a href="#" class="btn btn-info text-white"><i class="fas fa-share-alt-square"></i></a>
            <a href="#" class="btn btn-info text-white"><i class="fa fa-comment-alt"></i></a>
            <a href="#" class="btn btn-info text-white"><i class="fa fa-sync-alt"></i></a>
            <a href="#" class="btn btn-info text-white"><i class="fa fa-download"></i></a>
            <a href="#" class="btn btn-info text-white"><i class="fa fa-filter"></i></a> 
            <div class="dropdown d-inline-block dropleft">
               <a href="#" data-toggle="dropdown" class="btn btn-dark dropdown-toggle text-white"><i class="fa fa-retweet"></i></a>
               <div class="dropdown-menu">
               <a class="dropdown-item text-dark" href="#"><i class="fas fa-calendar-week"></i>Creation Date</a>
               <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Modification Date</a>
               <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Next Action Date</a>
               <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Re-Enquiry Date</a>
               <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Lead score</a>
               </div>
            </div>
          </div>
        </div>
        <ul class="w-100 pl-0">
            <li>
              <a href="#" class="btn btn-primary ">
               All
                <span class="badge badge-transparent">(<?php echo @$followup_status_wise['ALL']; ?>)</span>
              </a>
            </li>
            <li>
              <a href="#" class="btn btn-success">
              Green - Done Followups
                <span class="badge badge-transparent">(<?php echo @$followup_status_wise['green']; ?>)</span>
              </a>
            </li>
            <li>
              <a href="#" class="btn btn-danger">
              Red - Missed Followups
                <span class="badge badge-transparent">(<?php echo @$followup_status_wise['red']; ?>)</span>
              </a>
            </li>
            <li>
              <a href="#" class="btn btn-warning">
              Yellow - Planned Followups
                <span class="badge badge-transparent">(<?php echo @$followup_status_wise['yellow']; ?>)</span>
              </a>
            </li> 
        </ul>
        <div id="side_lead_response"></div>
      </div> 
       <div id="scroll" class="scroll">
      <div class=" ">
            <div class=" ">
               <div class="lead-main-wrap lead_block">
            	<?php 
                        if(!empty($lead_list_all)){
                        
                        foreach($lead_list_all as $lla) { 
                        
                        	if($lla->followup_status_yellow=='yellow'){
                        
                        		$color = "#FBC044";
                        
                        	}else if($lla->followup_status_red == 'red'){
                        
                        		$color = "#EA5C5A";
                        
                        	}else if($lla->followup_status_green == 'green'){
                        
                        		$color =  '#69A853';
                        
                        	} ?>
             
               <div class="extra_lead_show crm-list-view" >  
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
   </div>
            </div>
         </div>
      </div>   
   </div>
   <div class="extra_sidebar-menu">
      <div class="sidebar-panel pullDown">
         <!-- <button class="close-sidebar-left">X</button> -->
          <div class="rsidebar-items" id="calendar_show_hide">
               <div class="rsidebar-title">
                     <h3 class="mb-0">Followup Calendar <span id="stu_name">jone</span></h3>
               </div>
               <div class="calendar-wrapper custom_calaender"></div>
          </div>

          <div class="rsidebar-items send-sms" id="edit-details">
                  <form method="post" id="lead_list_form_side_bar">
                     <div class="rsidebar-title">
                        <h3 class="mb-0"><span id="status_change"></span> <span id="addedleadname"></span></h3>
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
                                          <input type="text"  class="form-control source-remark"  id="source_remark" placeholder="source Remarks" data-api-attached="true" name="source_remark">
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
                                                <input type="text" class="form-control reference-mobile_no" id="reference_mobile_no" placeholder="Enter Reference Mobile Number" data-api-attached="true" name="reference_mobile_no">
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
                                                   <input type="date" class="form-control" id="next_followup_date" name="next_followup_date">
                                                </div>
                                                <div class="form-group" id="next_follow_up_time12">
                                                   <label>Next Followup Time</label>
                                                   <input type="time" class="form-control" id="next_followup_time" name="next_followup_time" datetime="hour">
                                                </div>
                                                <div class="form-group" id="next_follow_up_remarks12">
                                                   <label>Followup Remarks</label>
                                                   <textarea class="form-control" rows="4" id="followup_remark" placeholder="Enter Remarks" name="followup_remark"></textarea>
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
                                          <label>Address</label>
                                          <textarea class="form-control" rows="4" id="address" placeholder="Enter Adderess" name="address"></textarea>
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
                                          <input type="radio"  id="course_package" name="course_package" value="package"  onclick="return get_course_package('package')">Package
                                          <input type="radio" id="course_single" name="course_package" value="single" checkedy onclick="return get_course_package('single')">Single
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
                                 <input type="date" maxlength="50" class="form-control" id="dob" name="dob">
                              </div>
                              <p><b>Please Enter Candidate's Parents Details</b></p>
                              <div class="form-group">
                                 <label>Alternate Mobile Number</label>
                                 <input type="text" maxlength="100" class="form-control" id="alternate_mobile_no" placeholder="Alternate Mobile Number" data-api-attached="true" name="alternate_mobile_no">
                              </div>
                              <div class="form-group">
                                 <label>Father's Name</label>
                                 <input type="text" class="form-control" id="father_name" placeholder="Enter Father Name" data-api-attached="true" name="father_name">
                              </div>
                              <div class="form-group">
                                 <label>Father's Mobile Number</label>
                                 <input type="phone" maxlength="10" class="form-control" min="0" id="father_mobile_no" placeholder="Enter Father mobile Number" data-api-attached="true" name="father_mobile_no">
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
                        <div class="form-fix-bottom pb-4 mb-2">
                        <a href="<?php echo base_url(); ?>LeadlistController/crm_list" class="btn btn-danger text-white">Cancel</a>
                        <input  type="submit" class="btn btn-primary createdlead" name="submit" id="add_lead" value="Add LEAD">
                        <input  type="submit" class="btn btn-primary editedlead" name="submit" id="edit_lead" value="Edit Lead">
                        </div>
                     </div>
                  </form>
          </div>

        </div>
  </div>


</div>

<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script> 

 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script> 
 <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
 <!-- General JS Scripts -->
 
 <!-- JS Libraies -->
 <script></script>
 <script src="https://www.jqueryscript.net/demo/powerful-calendar/calendar.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
 <script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
 <!-- JS Libraies -->
 <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
 <!-- Custom JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script> 
 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
 <script>
    $( document ).ready(function() {
      $('body').addClass('sidebar-left open_rightsidebar');

});

     setTimeout(function(){
        $('#edit-details').hide();
        $('.fc-day-grid-event').hide();

      },1000);

     $('.fc-next-button').click(function(){
        setTimeout(function(){
            $('#edit-details').hide();
            $('.fc-day-grid-event').hide();
       },5000);
     })
 </script>
 <script>

  $('#close-sidebar-left').click(function(){
    $('.edit-details').hide();
     $('#calendar_show_hide').show();
      $('body').addClass('sidebar-left open_rightsidebar');
  });
  // function selectDate(date) {
  //   $('.calendar-wrapper').updateCalendarOptions({
  //     date: date
  //   });
  // }
  // var defaultConfig = {
  //   weekDayLength: 1,
  //   date: new Date(),
  //   onClickDate: selectDate,
  //   showYearDropdown: true,
  // };
  // $('.calendar-wrapper').calendar(defaultConfig);

  $(document).ready(function(){ 
    // alert("alert");

    var calendar = $('.calendar-wrapper').fullCalendar({
      editable:true,
       header:{
          // left:'prev,next today',
          // center:'title',
          // right:'month,agendaWeek,agendaDay'
       },
      events:"<?php echo base_url(); ?>LeadMyActivity/load_calendar_data",
      eventRender: function (event, element, view) { 
        var dateString = event.start.format("YYYY-MM-DD");
        $(view.el[0]).find('.fc-day[data-date=' + dateString + ']').css('background-color', '#FAA732');
        $(view.el[0]).find('.fc-today[data-date=' + dateString + ']').css('background-color', 'red');
      },
      
    selectable:true,
    selectHelper:true,
    select:function(start)
    {
           var start = $.fullCalendar.formatDate(start, "MM/DD/Y");
           // alert(start);
            $('#start_date').val(start);
            $.ajax({
               url:"<?php echo base_url(); ?>LeadMyActivity/index",
               type:"POST",
               data:{ start:start, st_update_status : 'st_update_status' },
               beforeSend: function(){
                  $('.fa-spinner').show();
               },
              complete: function(){
                $('.fa-spinner').hide();
              },
              success:function(data)
              {
                // alert(data);c
                // console.log(data);
                $('#edit-details').show();
                $('.extra_Block_box').html(data);
                // $('.full_lead_block').html(data);
              }
            });
    },
    });
   });
   


    var i = 0;
function update_lead_record(lead_list_id)
{
  // alert(lead_list_id);
   $.ajax({
      url: "<?php echo base_url(); ?>LeadlistController/get_lead_record",
      type: "post",
      data: {
         'lead_list_id': lead_list_id
      },
      success: function(res)
      {

        $('#calendar_show_hide').hide();
        // $('#edit_crm_form_record').show();

         $('#edit-details').show();
         $('.first-section').show();
         $('.second-section').show();
         $('.third-section').show();
         $('.forth-section').show();
         $('.fifth-section').show();
         $('.candidate-details').show();
         $('.education-detail').show();
         $('.send-email-details').hide();
         $('.send-sms-details').hide();
         $('#status_change').html('Edit Lead');
         $('.crm-history').hide();
         $('.filtered-lead').hide();
         $('.lead-refer').hide();
         $('.crm-followup_record').hide();
         $('.crm-demo').hide();
         $('.send-email-details-correntuser-filtered').hide();
         $('.send-sms-details-filtred-leadwise').hide();
         $('.editedlead').show();
         $('.createdlead').hide();

         var data = $.parseJSON(res);
         $('#lead_list_id').val(data.record['lead_get_record'].lead_list_id);
         $('#addedleadname').html(data.record['lead_get_record'].name);
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

         $('#addedleadname').html(data.record['lead_get_record'].name);
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

         $('.source-remark').val(data.record['lead_get_record'].source_remark);
         $('.reference-mobile_no').val(data.record['lead_get_record'].reference_mobile_no);
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
         $('#followup_remark').val(data.record['lead_get_record'].followup_remark);
         $('#address').val(data.record['lead_get_record'].address);
         // var next_follow = data.record['lead_get_record'].next_followup_date;

         // if (next_follow != '')
         // {
         //    var next_f = next_follow.split(" ");

         //    $("#next_followup_date").val(next_f[0]);
         //    // $('#next_followup_date').val(dat1);
         //    $('#next_followup_time').val(next_f[1]);
         //    $('#followup_remark').val(data.record['lead_get_record'].followup_remark);
         // } else
         // {
         //    // alert("nathi");
         //    $('#next_followup_time').val('');
         //    $('#next_followup_date').val('');
         //    $('#followup_remark').val('');
         // }

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

         if (pack_sin == 'package'){
            $("#course_package").prop("checked", true);
            // get_course_package('package');
            $('.select_course_package').show();
            $('.select_course_single').hide();
            $('#course_orpackage').val(data.record['lead_get_record'].course_or_package);
         } else {
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
</script>  
 <body>
 <html>