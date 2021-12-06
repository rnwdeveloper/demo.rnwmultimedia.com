<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
 <link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">

 <div class="main-content">
     <div class="row">
         <div class="col-12 d-flex justify-content-between">
             <h6 class="page-title text-dark mb-3">Students Admission Detail</h6>
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb p-0">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Library</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Data</li>
                 </ol>
             </nav>
         </div>
     </div>
     <div class="extra_lead_menu" id="response_sidemail_compose">
  
         <?php if (!empty($all_list_admission)) {
        $mk = 0;
        foreach ($all_list_admission as $adm) { ?>
         <div class="extra_lead_show abc">
             <div class="card card-primary">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-2 pr-5">
                             <div class="erp-admn_prof text-center mb-3">
                                 <figure class="avatar mr-2 avatar-lg">
                                     <img src="http://demo.rnwmultimedia.com/dist/admissiondocuments/<?php $docids = explode(",",$adm->admission_id);
                        foreach($doc_list as $row) { if(in_array($row->admission_id,$docids)) {  echo $row->photos; }  } ?>" alt="...">
                                 </figure>
                             </div>
                             <div class="form-group text-center">
                                 <label>Multi Course</label>
                                 <select class="form-control" id="multic<?php echo $mk; ?>"
                                     onchange="return getAdmissionData(<?php echo $mk; ?>)">
                                     <?php $i = 0;
                        foreach ($adm->list_multi_course_admission as $k => $val) { ?>
                                     <option value="<?php echo $k; ?>"><?php echo $val; ?></option>
                                     <?php $i++;
                        } ?>
                                 </select>
                             </div>
                             <div class="text-center">
                                 <a href="<?php echo base_url(); ?>Admission/erpprintidcard/<?php echo $adm->admission_id; ?>"
                                     target="_blank" class="btn btn-warning text-white mb-2 btn-sm">Print I'D card</a>
                             </div>
                         </div>
                         <div class="col-md-9">
                             <div class="lead_left">
                                 <div class="row">
                                     <div class="adm_item">
                                         <span>Gr ID</span>
                                         <p><?php echo $adm->gr_id; ?>/<?php echo $adm->admission_number; ?></p>
                                     </div>
                                     <div class="adm_item">
                                         <span>Prospect Name</span>
                                         <p class="open_rightsidebar"
                                             onclick="return erp_basic_details(<?php echo $adm->admission_id; ?>);">
                                             <?php echo $adm->surname; ?> <?php echo $adm->first_name; ?>
                                             <?php echo $adm->father_name; ?>
                                             <i class="fa fa-eye"></i></p>
                                     </div>
                                     <div class="adm_item">
                                         <span>Email</span>
                                         <p class="open_rightsidebar"
                                             onclick="return show_email_template(<?php echo $adm->admission_id; ?>)">
                                             <?php echo $adm->email; ?>
                                             <i class="fa fa-eye"></i> </p>
                                     </div>
                                     <div class="adm_item">
                                         <span>Mobile</span>
                                         <p class="open_rightsidebar"
                                             onclick="return get_sms_template_record(<?php echo $adm->admission_id; ?>)">
                                             <?php echo $adm->mobile_no; ?>
                                             <i class="fa fa-eye"></i></p>
                                     </div>
                                     <div class="adm_item">
                                         <span>Source</span>
                                         <p><?php echo $adm->source_id; ?></p>
                                     </div>
                                     <div class="adm_item">
                                         <span>Enrollmemnt No</span>
                                         <p id="enrollment_ids<?php echo $mk; ?>"><?php echo $adm->enrollment_number; ?>
                                         </p>
                                     </div>
                                     <div class="adm_item">
                                         <span>Branch</span>
                                         <span id="b_id<?php echo $mk; ?>">
                                         <p class="open_rightsidebar" onclick="return transfer_branch(<?php echo $adm->admission_id; ?>)">
                                             <?php $branch_ids = explode(",", $adm->branch_id);
                            foreach ($list_branch as $row) {
                              if (in_array($row->branch_id, $branch_ids)) {
                                echo $row->branch_name;
                              }
                            } ?>
                                         <i class="fa fa-eye"></i></p>
                                        </span>
                                     </div>
                                     <div class="adm_item">
                                         <span>Department</span>
                                         <p id="d_id<?php echo $mk; ?>">
                                             <?php $department_ids = explode(",", $adm->department_id);
                            foreach ($list_department as $row) {
                              if (in_array($row->department_id, $department_ids)) {
                                echo $row->department_name;
                              }
                            } ?>
                                         </p>
                                     </div>
                                     <div class="adm_item">
                                         <span>Course</span>
                                         <span id="c_id<?php echo $mk; ?>">
                                             <p class="open_rightsidebar"
                                                 onclick="return courses_orpackages(<?php echo $adm->admission_id; ?>);" style="font-size:12px;">
                                                 <?php $branch_ids = explode(",", $adm->package_id);
                              foreach ($list_package as $row) {
                                if (in_array($row->package_id, $branch_ids)) {
                                  echo "Package : " . '' . $row->package_name;
                                }
                              } ?>
                                                 <?php $branch_ids = explode(",", $adm->course_id);
                              foreach ($list_course as $row) {
                                if (in_array($row->course_id, $branch_ids)) {
                                  echo "Single : " . '' . $row->course_name;
                                }
                              } ?>
                                             <i class="fa fa-eye"></i></p>
                                         </span>
                                     </div>
                                     <div class="adm_item">
                                         <span>Year</span>
                                         <p id="year_id<?php echo $mk; ?>"><?php echo $adm->year; ?></p>
                                     </div>
                                     <div class="adm_item">
                                         <span>Tuition Fess</span>
                                         <span id="tf_id<?php echo $mk; ?>">
                                             <p class="open_rightsidebar"
                                                 onclick="return admission_payment(<?php echo $adm->admission_id; ?>);">
                                                 <?php echo $adm->tuation_fees; ?> <i class="fa fa-eye"></i></p>
                                         </span>
                                     </div>
                                     <div class="adm_item">
                                         <span>Registration fees</span>
                                         <p id="rf_id<?php echo $mk; ?>">
                                             <?php echo $adm->registration_fees; ?>
                                         </p>
                                     </div>
                                     <div class="adm_item">
                                         <span>Total pay</span>
                                         <p><?php foreach ($adm->paidcount as $k => $val) {
                              echo $val->paid_amount;
                            } ?></p>
                                     </div>
                                     <div class="adm_item">
                                         <span>Admission Date</span>
                                         <p id="date_id<?php echo $mk; ?>">
                                             <?php echo date('d-M-Y',strtotime($adm->admission_date))." ".$adm->admission_time; ?>
                                         </p>
                                     </div>
                                     <div class="adm_item">
                                         <span>Remarks</span>
                                         <span id="admi_remarks_id<?php echo $mk; ?>">
                                             <p class="open_rightsidebar"
                                                 onclick="return admission_remarks(<?php echo $adm->admission_id; ?>);">
                                                 Add Remark <i class="fa fa-eye"></i></p>
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
                                         <span id="ac_id<?php echo $mk; ?>">
                                             <a class="dropdown-item open_rightsidebar" href="#"
                                                 onclick="return Cancellation_admission(<?php echo $adm->admission_id; ?>);"><i
                                                     class="far fa-trash-alt mr-2"> </i>Canceled Admission</a>
                                         </span>
                                         <span id="at_id<?php echo $mk; ?>">
                                             <a class="dropdown-item open_rightsidebar" href="#"
                                                 onclick="return admission_terminated(<?php echo $adm->admission_id; ?>);"><i
                                                     class="fas fa-hand-rock mr-2"></i> Mark Terminated</a>
                                         </span>
                                         <span id="ah_id<?php echo $mk; ?>">
                                             <a class="dropdown-item open_rightsidebar" href="#"
                                                 onclick="return hold_admission(<?php echo $adm->admission_id; ?>);"><i
                                                     class="fas fa-hand-paper mr-2"></i>Hold Admission</a>
                                         </span>
                                         <span id="ho_id<?php echo $mk; ?>">
                                             <a class="dropdown-item open_rightsidebar" href="#"
                                                 onclick="return hold_admission_over(<?php echo $adm->admission_id; ?>);"><i
                                                     class="fab fa-cc-discover mr-2"></i>Hold Over</a>
                                         </span>
                                         <a class="dropdown-item" href="#"
                                             onclick="return upgrade_courses(<?php echo $adm->admission_id; ?>);"
                                             data-toggle="modal" data-target=".upgrademodal"><i
                                                 class="fas fa-edit mr-2"> </i>Upgrade Course</a>
                                         <a class="dropdown-item" href="<?php echo base_url(); ?>Admission/erpassestment?action=ass&met=<?php echo @$adm->admission_id; ?>" target="_blank"><i class="fas fa-eye mr-2"> </i>
                                         Assessment</a>
                                         <a class="dropdown-item" href="#"><i class="fas fa-eye mr-2"> </i>View
                                             History</a>
                                         <a class="dropdown-item" href="#"><i class="fas fa-trash mr-2"> </i>Delete</a>
                                     </div>
                                 </div>
                                 <div class="icon-set text-center">
                                  
                                 <a href="https://api.whatsapp.com/send?phone=91<?php echo $adm->mobile_no; ?>" target="_blank"><i class="fab fa-whatsapp"></i></a> 
                                 
                                    <a href="tel:<?php echo $adm->mobile_no; ?>"><i class="material-icons">phone</i></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <?php $mk++;
        }
      } ?>
     </div>
     <div class="extra_sidebar-menu">
         <div class="sidebar-panel pullDown">
             <button class="close-sidebar-left">X</button>
             <div class="rsidebar-items send-mail send-email-details">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Send Email To <span id="studentnameforemail"></span></h3>
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
                         <textarea class="form-control" name="email_subject" id="email_subject"></textarea>
                     </div>
                     <div class="rs-btn">
                         <a href="#" class="btn btn-danger text-white">Cancel</a>
                         <input type="submit" class="btn btn-primary text-white" id="send_email_forstudent"
                             name="submit" value="Submit">
                     </div>
                 </div>
             </div>
             <div class="rsidebar-items send-sms send-sms-details">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Send Sms To <span id="stu_name"></span></h3>
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
                             <?php foreach ($sms_template_list as $lt) { ?>
                             <option value="<?php echo $lt->category; ?>"><?php echo $lt->category; ?></option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label>SMS Template</label>
                         <textarea class="form-control" id="sms_compose_Textarea"
                             name="sms_compose_Textarea"></textarea>
                     </div>
                     <div class="rs-btn">
                         <a href="#" class="btn btn-danger text-white">Cancel</a>
                         <input type="submit" class="btn btn-primary text-white" id="send_sms_student" value="Submit">
                     </div>
                 </div>
             </div>
             <div class="rsidebar-items send-sms edit-details">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Basic Info <span class="float-right"><button class="btn btn-sm btn-primary"
                                 id="infoupd" style="line-height: 18px;"><i class="fas fa-edit"></i></button></span>
                     </h3>
                 </div>
                 <div class="rsidebar-middle p-0">
                     <div class="rs-stu-detail">
                         <div class="rs-stu-item mb-1">
                             <p>Surname :</p><span id="show_surname"></span>
                         </div>
                         <div class="rs-stu-item mb-1">
                             <p>Name :</p><span id="show_first_name"></span>
                         </div>
                         <div class="rs-stu-item mb-1">
                             <p>Email :</p><span id="show_email"></span>
                         </div>
                         <div class="rs-stu-item mb-1">
                             <p>Mobile :</p><span id="show_mobile_no"></span>
                         </div>
                         <div class="rs-stu-item mb-1">
                             <p>Branch :</p><span id="show_branch_id"></span>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="rsidebar-items send-sms basic-info-edit">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Basic Info Edit <span class="float-right"><button class="btn btn-sm btn-primary"
                                 id="infoshow" style="line-height: 18px;"><i class="fas fa-eye"></i></button></span>
                     </h3>
                 </div>
                 <div class="rsidebar-middle p-0">
                     <div class="col-md-12">
                         <div class="card ">
                             <div class="card-body pl-0 pr-0">
                                 <div id="edit_basic_info_msg"></div>
                                 <input type="hidden" class="form-control" id="basic_info_upd_id">
                                 <div class="form-group">
                                     <label>Surname</label>
                                     <input type="text" class="form-control" id="edit_sname">
                                 </div>
                                 <div class="form-group">
                                     <label>Name</label>
                                     <input type="text" class="form-control" id="edit_fname">
                                 </div>
                                 <div class="form-group">
                                     <label>Email</label>
                                     <input type="email" class="form-control" id="edit_mail">
                                 </div>
                                 <div class="form-group">
                                     <label>Mobile</label>
                                     <input type="text" class="form-control" id="edit_mobile">
                                 </div>
                                 <div class="form-group">
                                     <label>Brnach Name</label>
                                     <select class="form-control" id="edit_branch">
                                         <option value="">Select branch</option>
                                         <?php foreach ($list_branch as $ld) { ?>
                                         <option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?>
                                         </option>
                                         <?php } ?>
                                     </select>
                                 </div>
                                 <button class="btn btn-sm btn-primary" id="basic_info_updates">Update</button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
            
             <div class="rsidebar-items send-sms branch-transfer">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Branch Transfer</h3>
                 </div>
                 <div class="rsidebar-middle p-0 branch_data">

                 </div>
             </div>

             <div class="rsidebar-items send-sms courses">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Course Info</h3>
                 </div>
                 <div class="rsidebar-middle p-0 courses_data">

                 </div>
             </div>

             <div class="rsidebar-items send-sms pay-details">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Payment Details</h3>
                 </div>
                 <div class="rsidebar-middle payment_data">

                 </div>
             </div>

             <div class="rsidebar-items send-sms admission-cancellation">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Cancellation Admission</h3>
                 </div>
                 <div class="rsidebar-middle p-0 cancalletion_admission_data">

                 </div>
             </div>

             <div class="rsidebar-items send-sms admission-terminated">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Terminated Admission</h3>
                 </div>
                 <div class="rsidebar-middle p-0 terminated_admission_data">

                 </div>
             </div>

             <div class="rsidebar-items send-sms admission-hold">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Hold Admission</h3>
                 </div>
                 <div class="rsidebar-middle p-0 hold_admission_data">

                 </div>
             </div>

             <div class="rsidebar-items send-sms admission-hold-over">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Hold Admission Over</h3>
                 </div>
                 <div class="rsidebar-middle p-0 hold_over_data">

                 </div>
             </div>

             <div class="rsidebar-items send-sms admission-remraks">
                 <div class="rsidebar-title">
                     <h3 class="mb-0">Remarks For Admission</h3>
                 </div>
                 <div class="rsidebar-middle p-0 remarks_data">

                 </div>
             </div>
         </div>
     </div>
 </div>

 <!--  Course wise shiningsheets -->
 <div class="modal fade shiningsheet erpshining-preview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title text-dark" id="myLargeModalLabel">Shining Sheet</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body" id="get_shiningsheet">

             </div>
         </div>
     </div>
 </div>

 <!-- upgrademodal -->
 <div class="modal fade upgrademodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title text-dark" id="myLargeModalLabel">Upgrade Course</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body course_upgrade_data">

             </div>
         </div>
     </div>
 </div>

 <!-- Course As Completed -->
 <div class="modal fade course_completed" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="formModal">Course As Completed</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div id="admission_course_msg"></div>
                 <div class="form-group">
                <label>Batch Status</label>
                <select class="form-control" id="admission_courses_status">
                <option value="Completed" <?php echo "selected"; ?>>Completed</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Pending">Pending</option>
                <option value="Hold">Hold</option>
                <option value="Not Assigned">Not Assigned</option>
                </select>
                </div>
                 <div class="form-group">
                     <label>Please enter reason for Course Completed:<span style="color:red">*</span></label>
                     <textarea class="form-control" placeholder="Enter Remarks" name="admission_remrak"
                         id="admission_remrak"></textarea>
                 </div>
                 <div class="form-group">
                     <input type="submit" name="" id="mark_course_as_completed" class="btn btn-primary" value="Submit">
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Course As Completed -->
 <div class="modal fade admission_completed" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="formModal">Admission As Completed</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div id="admission_completed_msg"></div>
                 <div class="form-group">
                     <label>Completed Date:<span style="color:red">*</span></label>
                     <input type="date" class="form-control" id="admission_completed_date">
                 </div>
                 <div class="form-group">
                     <label>Status:<span style="color:red">*</span></label>
                     <select class="form-control" name="remarks_status_id" id="remarks_status_id">
                         <option value="">Select</option>
                         <?php foreach ($list_dropdown_adm as $ad) { ?>
                         <option value="<?php echo $ad->d_adm_id; ?>"><?php echo $ad->name; ?></option>
                         <?php } ?>
                     </select>
                 </div>
                 <div class="form-group">
                     <label>Please enter reason for Admission Completed:<span style="color:red">*</span></label>
                     <textarea class="form-control" name="completed_remrak" id="completed_remrak"
                         placeholder="Enter Remarks"></textarea>
                 </div>
                 <div class="form-group">
                     <input type="submit" name="" id="mark_admission_completed" class="btn btn-primary" value="Submit">
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- View All Remarks -->
 <div class="modal fade all_remarks_view" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myLargeModalLabel">All Remarks</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body show_all_admission_remraks">

             </div>
         </div>
     </div>
 </div>


 <!-- payment installmet  -->
 <div class="modal fade payment-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myLargeModalLabel">Intallment Payment</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body paymeny_installment_data">

             </div>
         </div>
     </div>
 </div>

<!-- batch Assigned -->
<div class="modal fade" id="assigned_batch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assigned Batch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body batches_record">
                
              </div>
            </div>
          </div>
        </div>

 <!-- JS Libraies -->
 <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js">
 </script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js">
 </script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js">
 </script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>

 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
 <script
     src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
 </script>
 <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
 <!-- General JS Scripts -->
 <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
 <!-- JS Libraies -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>

 <!-- JS Libraies -->
 <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
 <!-- Custom JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>

 <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>

 <!-- script for side bar conttent in Admission -->
 
  <script>
     //   var date=new Date();
   // var datenew=date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear();
  //console.log(val);
  //document.getElementById('cancellation_admission_dat').value = datenew;
//         var picker = new Lightpick({
//           field: document.getElementById('cancellation_admission_date'),
//         onSelect: function(date){
//         document.getElementById('result-1').innerHTML =  date.format('Do MMMM YYYY');
        
//     }
// });

var picker = new Lightpick({
    field: document.getElementById('cancellation_admission_date'),
    onSelect: function(date){
        document.getElementById('result-1').innerHTML = date.format('Do MMMM YYYY');
    }
});
    </script>

 <script>
//Sidebar
$(document).ready(function() {

    $(".open_rightsidebar").click(function() {
        $('body').addClass('sidebar-mini sidebar-left');
        var $this = $(this);
        $(this).parents('.extra_lead_show').addClass('abc');
       //$(this).parents('.extra_lead_show').nextAll().find('.extra_lead_show').removeClass('abc');
    });
    $(".close-sidebar-left").click(function() {
        $('body').removeClass('sidebar-mini sidebar-left');
        $('body').find('.extra_lead_show').removeClass('abc');

    });
});

$(document).ready(function() {
    $("#infoupd").click(function() {
        $(".edit-details").hide();
        $('.basic-info-edit').show();
    });

    $("#coinfoedit").click(function() {
        $(".edit-details").show();
        $('.basic-info-edit').hide();
    });
});
 </script>

 <script>
function erp_basic_details(admission_id) {
   // $('.abc').css("background-color", "red");
    $.ajax({
        url: "<?php echo base_url(); ?>Admission/get_adm_record",
        type: "post",
        data: {
            'admission_id': admission_id
        },
        success: function(res) {
            $('.edit-details').show();
            $('.branch-transfer').hide();
            $('.basic-info-edit').hide();
            $('.send-sms-details').hide();
            $('.send-email-details').hide();
            $('.courses').hide();
            $('.pay-details').hide();
            $('.admission-cancellation').hide();
            $('.admission-terminated').hide();
            $('.admission-hold').hide();
            $('.admission-hold-over').hide();
            $('.admission-remraks').hide();

            var data = $.parseJSON(res);

            $('#basic_info_upd_id').val(data.record['adm_get_record'].admission_id);
            $('#show_surname').html(data.record['adm_get_record'].surname);
            $('#show_first_name').html(data.record['adm_get_record'].first_name);
            $('#show_email').html(data.record['adm_get_record'].email);
            $('#show_mobile_no').html(data.record['adm_get_record'].mobile_no);
            $('#show_branch_id').html(data.record['adm_get_record'].branch_name);


            $('#edit_sname').val(data.record['adm_get_record'].surname);
            $('#edit_fname').val(data.record['adm_get_record'].first_name);
            $('#edit_mail').val(data.record['adm_get_record'].email);
            $('#edit_mobile').val(data.record['adm_get_record'].mobile_no);
            $('#edit_branch').val(data.record['adm_get_record'].branch_id);
        }
    });
}

// Transfer Branch
function transfer_branch(admission_id = '') {
$('.edit-details').hide();
$('.branch-transfer').show();
$('.basic-info-edit').hide();
$('.send-sms-details').hide();
$('.send-email-details').hide();
$('.courses').hide();
$('.pay-details').hide();
$('.admission-cancellation').hide();
$('.admission-terminated').hide();
$('.admission-hold').hide();
$('.admission-hold-over').hide();
$('.admission-remraks').hide();

$.ajax({
    url: "<?php echo base_url(); ?>Admission/ErpAdmision_BranchTransfer",
    type: "post",
    data: {
        'admission_id': admission_id
    },
    success: function(Resp) {
        $('.branch_data').html(Resp);
    }
});
}

// basic infomation section update details
$('#basic_info_updates').on('click', function() {

    var basic_info_upd_id = $('#basic_info_upd_id').val();
    var surname = $('#edit_sname').val();
    var first_name = $('#edit_fname').val();
    var email = $('#edit_mail').val();
    var mobile_no = $('#edit_mobile').val();
    var branch_id = $('#edit_branch').val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Admission/upd_admission_basic",
        data: {
            'admission_id': basic_info_upd_id,
            'first_name': first_name,
            'surname': surname,
            'email': email,
            'mobile_no': mobile_no,
            'branch_id': branch_id
        },
        success: function(resp) {
            alert('Are You Sure This Details Updated');

            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if (ddd == '1') {
                $('#edit_basic_info_msg').fadeIn();
                $('#edit_basic_info_msg').html(
                    "<div class='alert alert-success' role='alert'><b>Successfully Updated Detaild</b></div>"
                );
                $('#edit_basic_info_msg').fadeOut(2300);

                setTimeout(function() {
                    location.reload();
                }, 2500);

            } else if (ddd == '2') {
                $('#edit_basic_info_msg').fadeIn();
                $('#edit_basic_info_msg').html(
                    "<div class='alert alert-danger' role='alert'>Someting Wrong!!</b></div>");
                $('#edit_basic_info_msg').fadeOut(2300);

                setTimeout(function() {
                    location.reload();
                }, 2500);
            }
        }
    });
    return false;
});

// send email section 
function show_email_template(admission_id) {

    $.ajax({
        url: "<?php echo base_url(); ?>Admission/get_admission_email_record",
        type: "post",
        data: {
            'admission_id': admission_id
        },
        success: function(res) {
            $('.edit-details').hide();
            $('.branch-transfer').hide();
            $('.basic-info-edit').hide();
            $('.send-sms-details').hide();
            $('.send-email-details').show();
            $('.courses').hide();
            $('.pay-details').hide();
            $('.admission-cancellation').hide();
            $('.admission-terminated').hide();
            $('.admission-hold').hide();
            $('.admission-hold-over').hide();
            $('.admission-remraks').hide();

            var data = $.parseJSON(res);

            $('#studentnameforemail').html(data.record['adm_get_record'].first_name);
            $('#primary_email').val(data.record['adm_get_record'].email);
            $('#email_recepient_id').val(data.record['adm_get_record'].admission_id);
        }
    });
}

function get_email_template() {
    var id = $('#email_template').val();

    $.ajax({
        url: "<?php echo base_url(); ?>Admission/get_email_template_record",
        type: "post",
        data: {
            'template_id': id
        },
        beforeSend: function() {
            // tinymce.remove('#email_compose_Textarea');

        },
        success: function(res) {
            var data = $.parseJSON(res);
            $('#email_subject').val(data.reco['record'].category);
        }
    });
}

$('#send_email_forstudent').on('click', function() {
    var email = $('#primary_email').val();
    var email_subject = $('#email_subject').val();
    var email_recepient_id = $('#email_recepient_id').val();
    var message = $('#email_subject').val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Admission/send_email",
        data: {
            'email': email,
            'subject': email_subject,
            'message': message,
            'admission_id': email_recepient_id
        },
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if (ddd == '1') {
                $('#mail_send_msg').fadeIn();
                $('#mail_send_msg').html(
                    "<div class='alert alert-success' role='alert'><b>Successfully Send Mail!</b></div>"
                );
                $('#mail_send_msg').fadeOut(2300);

                setTimeout(function() {
                    location.reload();
                }, 2400);

            } else if (ddd == '2') {
                $('#mail_send_msg').fadeIn();
                $('#mail_send_msg').html(
                    "<div class='alert alert-danger' role='alert'>Someting Wrong!!</b></div>");
                $('#mail_send_msg').fadeOut(2300);

                setTimeout(function() {
                    location.reload();
                }, 2400);
            }
        }
    });
    return false;
});

// send Sms Student
function get_sms_template_record(admission_id) {
    $('.edit-details').hide();
    $('.branch-transfer').hide();
    $('.basic-info-edit').hide();
    $('.send-sms-details').show();
    $('.send-email-details').hide();
    $('.courses').hide();
    $('.pay-details').hide();
    $('.admission-cancellation').hide();
    $('.admission-terminated').hide();
    $('.admission-hold').hide();
    $('.admission-hold-over').hide();
    $('.admission-remraks').hide();

    $.ajax({
        url: "<?php echo base_url(); ?>Admission/get_admission_sms_record",
        type: "POST",
        data: {
            admission_id: admission_id
        },
        success: function(respo) {
            var data = $.parseJSON(respo);

            $('#sms_recepient_id').val(data.record['adm_get_record'].admission_id);
            $('#primary_sms').val(data.record['adm_get_record'].mobile_no);
            $('#stu_name').html(data.record['adm_get_record'].first_name);
        }
    });
}

function get_sms_template() {
    var sms_template_id = $('#sms_template').val();

    $.ajax({
        url: "<?php echo base_url(); ?>Admission/get_sms_template_record",
        type: "post",
        data: {
            'sms_template_id': sms_template_id
        },
        success: function(response) {
            var data = $.parseJSON(response);
            $('#sms_compose_Textarea').val(data.reco['records'].sms_template);
        }
    });
}

$('#send_sms_student').on('click', function() {
    var primary_sms = $('#primary_sms').val();
    var sms_recepient_id = $('#sms_recepient_id').val();
    var sms_template = $('#sms_template').val();
    var sms_textarea = $('#sms_compose_Textarea').val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Admission/send_sms_record",
        data: {
            'primary_sms': primary_sms,
            'sms_recepient_id': sms_recepient_id,
            'sms_template': sms_template,
            'sms_textarea': sms_textarea
        },
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if (ddd == '1') {
                $('#sms_send_msg').fadeIn();
                $('#sms_send_msg').html(
                    "<div class='alert alert-success' role='alert'><b>Successfully Send Sms!</b></div>"
                );
                $('#sms_send_msg').fadeOut(2300);

                setTimeout(function() {
                    location.reload();
                }, 2400);

            } else if (ddd == '2') {
                $('#sms_send_msg').fadeIn();
                $('#sms_send_msg').html(
                    "<div class='alert alert-danger' role='alert'>Someting Wrong!!</b></div>");
                $('#sms_send_msg').fadeOut(2300);

                setTimeout(function() {
                    location.reload();
                }, 2400);
            }
        }
    });
    return false;
});

// show course or packages
function courses_orpackages(admission_id = '') {
    $('.edit-details').hide();
    $('.branch-transfer').hide();
    $('.basic-info-edit').hide();
    $('.send-sms-details').hide();
    $('.send-email-details').hide();
    $('.courses').show();
    $('.edit-co-info').hide();
    $('.pay-details').hide();
    $('.admission-cancellation').hide();
    $('.admission-terminated').hide();
    $('.admission-hold').hide();
    $('.admission-hold-over').hide();
    $('.admission-remraks').hide();

    $.ajax({
        url: "<?php echo base_url(); ?>Admission/erpadmisson_show_courses",
        type: "post",
        data: {
            'admission_id': admission_id
        },
        success: function(Resp) {
            $('.courses_data').html(Resp);
        }
    });
}

// Admission Cancalletion
function Cancellation_admission(admission_id = '') {
    $('.edit-details').hide();
    $('.branch-transfer').hide();
    $('.basic-info-edit').hide();
    $('.send-sms-details').hide();
    $('.send-email-details').hide();
    $('.courses').hide();
    $('.pay-details').hide();
    $('.admission-cancellation').show();
    $('.admission-terminated').hide();
    $('.admission-hold').hide();
    $('.admission-hold-over').hide();
    $('.admission-remraks').hide();

    $.ajax({
        url: "<?php echo base_url(); ?>Admission/ErpCancellation_Admission",
        type: "post",
        data: {
            'admission_id': admission_id
        },
        success: function(Resp) {
            $('.cancalletion_admission_data').html(Resp);
        }
    });
}

// Terminated Admission
function admission_terminated(admission_id = '') {
    $('.edit-details').hide();
    $('.branch-transfer').hide();
    $('.basic-info-edit').hide();
    $('.send-sms-details').hide();
    $('.send-email-details').hide();
    $('.courses').hide();
    $('.pay-details').hide();
    $('.admission-cancellation').hide();
    $('.admission-terminated').show();
    $('.admission-hold').hide();
    $('.admission-hold-over').hide();
    $('.admission-remraks').hide();

    $.ajax({
        url: "<?php echo base_url(); ?>Admission/ErpTerminated_Admission",
        type: "post",
        data: {
            'admission_id': admission_id
        },
        success: function(Resp) {
            $('.terminated_admission_data').html(Resp);
        }
    });
}

// Hold Admision
function hold_admission(admission_id = '') {
    $('.edit-details').hide();
    $('.branch-transfer').hide();
    $('.basic-info-edit').hide();
    $('.send-sms-details').hide();
    $('.send-email-details').hide();
    $('.courses').hide();
    $('.pay-details').hide();
    $('.admission-cancellation').hide();
    $('.admission-terminated').hide();
    $('.admission-hold').show();
    $('.admission-hold-over').hide();
    $('.admission-remraks').hide();

    $.ajax({
        url: "<?php echo base_url(); ?>Admission/ErpHold_Admission",
        type: "post",
        data: {
            'admission_id': admission_id
        },
        success: function(Resp) {
            $('.hold_admission_data').html(Resp);
        }

    });

}

// Hold Over
function hold_admission_over(admission_id = '') {
$('.edit-details').hide();
$('.branch-transfer').hide();
$('.basic-info-edit').hide();
$('.send-sms-details').hide();
$('.send-email-details').hide();
$('.courses').hide();
$('.pay-details').hide();
$('.admission-cancellation').hide();
$('.admission-terminated').hide();
$('.admission-hold').hide();
$('.admission-hold-over').show();
$('.admission-remraks').hide();

$.ajax({
    url: "<?php echo base_url(); ?>Admission/ErpHold_Over",
    type: "post",
    data: {
        'admission_id': admission_id
    },
    success: function(Resp) {
        $('.hold_over_data').html(Resp);
    }
});
}

// Upgrade Admission
function upgrade_courses(admission_id = '') {
    $.ajax({
        url: "<?php echo base_url(); ?>Admission/ErpUpgradeCourse",
        type: "post",
        data: {
            'admission_id': admission_id
        },
        success: function(Resp) {
            $('.course_upgrade_data').html(Resp);
            $('.Cheque-Hidden').hide();
            $('.Dd-Hidden').hide();
            $('.Cradit-Card').hide();
            $('.Debit-Card').hide();
            $('.Online-Payment').hide();
            $('.NEFT-IMPS').hide();
            $('.Paytm').hide();
            $('.Bank-Deposit').hide();
            $('.Capital-Float').hide();
            $('.Google-Pay').hide();
            $('.Phone-Pay').hide();
            $('.Bajaj-Finserv').hide();
            $('.Bhim-UPI').hide();
            $('.Insta-mojo').hide();
            $('.Pay-pal').hide();
            $('.Razor-pay').hide();
        }
    });
}

// payment Intallmet Admission
function admission_payment(admission_id = '') {
    $('body').addClass('sidebar-mini sidebar-left');
    $('.edit-details').hide();
    $('.branch-transfer').hide();
    $('.basic-info-edit').hide();
    $('.send-sms-details').hide();
    $('.send-email-details').hide();
    $('.courses').hide();
    $('.pay-details').show();
    $('.admission-cancellation').hide();
    $('.admission-terminated').hide();
    $('.admission-hold').hide();
    $('.admission-hold-over').hide();
    $('.admission-remraks').hide();

    $.ajax({
        url: "<?php echo base_url(); ?>Admission/Erppayment_Admisison",
        type: "post",
        data: {
            'admission_id': admission_id
        },
        success: function(Resp) {
            $('.payment_data').html(Resp);
        }
    });
}

//Multiple Course Admission
function getAdmissionData(fornumberData) {
    var dd = "multic" + fornumberData;
    var multic = $('#' + dd).val();
    //alert(multic);
    $.ajax({
        url: "<?php echo base_url(); ?>Admission/get_multiple_admission_data",
        method: "POST",
        data: {
            'multic': multic
        },
        success: function(res) {
            var data = $.parseJSON(res);
            var tf = data.record['adm_get_record'].tuation_fees;
            var a_Id = data.record['adm_get_record'].admission_id;
            var tfId = "tf_id" + fornumberData;
            $('#' + tfId).html('<p class="open_rightsidebar" onclick="return admission_payment(' + a_Id +
                ');">' + tf + '</p>');

            //console.log(data);
            var ah = data.record['adm_get_record'].admission_id;
            var admissionhold_Id = "ah_id" + fornumberData;
            $('#' + admissionhold_Id).html(
                '<a class="dropdown-item open_rightsidebar" href="#" onclick="return hold_admission(' +
                ah + ');"><i class="fas fa-hand-paper mr-2"> Hold Admission</i></a>');

                var ho = data.record['adm_get_record'].admission_id;
            var admiid_ho = "ho_id" + fornumberData;
            $('#' + admiid_ho).html(
                '<a class="dropdown-item open_rightsidebar" href="#" onclick="return hold_admission_over(' +
                ho + ');"><i class="fab fa-cc-discover mr-2"> Hold Over</i></a>');

            var at = data.record['adm_get_record'].admission_id;
            var admitId = "at_id" + fornumberData;
            $('#' + admitId).html(
                '<a class="dropdown-item open_rightsidebar" href="#" onclick="return admission_terminated(' +
                at + ');"><i class="fas fa-hand-rock"> <b>Mark Terminated</b></i></a>');

            var ac = data.record['adm_get_record'].admission_id;
            var admicId = "ac_id" + fornumberData;
            $('#' + admicId).html(
                '<a class="dropdown-item open_rightsidebar" href="#" onclick="return Cancellation_admission(' +
                ac + ');"><i class="far fa-trash-alt"> <b>Canceled Admission</b></i></a>');

            var b = data.record['adm_get_record'].branch_name;
            var ta = data.record['adm_get_record'].admission_id;
            var branchId = "b_id" + fornumberData;
            $('#' + branchId).html('<p class="open_rightsidebar" onclick="return transfer_branch('+ta+');">'+b+'<i class="fa fa-eye"></i></p>');

            var d = data.record['adm_get_record'].department_name;
            var departmentId = "d_id" + fornumberData;
            $('#' + departmentId).html(d);

            var packageType = data.record['adm_get_record'].type;
            if (packageType == 'package') {
                var c = data.record['adm_get_record'].package_name;
                var a = data.record['adm_get_record'].admission_id;
                var courseId = "c_id" + fornumberData;
                $('#' + courseId).html('<p class="open_rightsidebar" onclick="return courses_orpackages(' +
                    a + ');">' + "Package : " + c + '</p>');
            } else {
                var c = data.record['adm_get_record'].course_name;
                var a = data.record['adm_get_record'].admission_id;
                var courseId = "c_id" + fornumberData;
                $('#' + courseId).html('<p class="open_rightsidebar" onclick="return courses_orpackages(' +
                    a + ');">' + "Single : " + c + '</p>');
            }

            var rf = data.record['adm_get_record'].registration_fees;
            var rfId = "rf_id" + fornumberData;
            $('#' + rfId).html(rf);

            var y = data.record['adm_get_record'].year;
            var yearId = "year_id" + fornumberData;
            $('#' + yearId).html(y);

            var enrollno = data.record['adm_get_record'].enrollment_number;
            var enrollmentno = "enrollment_ids" + fornumberData;
            $('#' + enrollmentno).html(enrollno);

            var adDate = data.record['adm_get_record'].admission_date;
            var admDateId = "date_id" + fornumberData;
            $('#' + admDateId).html(adDate);

            var admremark = data.record['adm_get_record'].admission_id;
            var admission_remarks = "admi_remarks_id" + fornumberData;
            $('#' + admission_remarks).html(
                '<p class="open_rightsidebar" onclick="return admission_remarks(' + admremark +
                ');">Add Remark</p>');
        }
    });
}

$('#mark_course_as_completed').on('click', function() {

    var admission_courses = [];

    $('input[name=admission_courses]:checked').map(function() {
        admission_courses.push($(this).val());
    });
    var admission_remrak = $('#admission_remrak').val();
    var admission_courses_status = $('#admission_courses_status').val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Admission/ErpCourse_completed",
        data: {

            'admission_courses_id': admission_courses,
            'admission_courses_status': admission_courses_status,
            'admission_remrak': admission_remrak
        },

        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if (ddd == '1') {
                $('#admission_course_msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 5000,
                    message: 'HI! Your Course Is Now Completed.',
                    position: 'topRight'
                }));

                setTimeout(function() {
                    location.reload();
                }, 5020);
            } else {
                $('#admission_course_msg').html(iziToast.error({
                    title: 'Canceled!',
                    timeout: 5000,
                    message: 'Someting Wrong!!',
                    position: 'topRight'
                }));

                setTimeout(function() {
                    location.reload();
                }, 5020);
            }
        }
    });
    return false;
});

$('#mark_admission_completed').on('click', function() {
    var admission_ids = $('#admission_ids').val();
    var admission_completed_date = $('#admission_completed_date').val();
    var remarks_status_id = $('#remarks_status_id').val();
    var admission_remrak = $('#completed_remrak').val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Admission/ErpAdmission_completed",
        data: {

            'admission_id': admission_ids,
            'admission_completed_date': admission_completed_date,
            'remarks_status_id': remarks_status_id,
            'admission_remrak': admission_remrak
        },

        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if (ddd == '1') {
                $('#admission_completed_msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 5000,
                    message: 'HI! Your Admission Is Now Completed.',
                    position: 'topRight'
                }));

                setTimeout(function() {
                    location.reload();
                }, 5020);
            } else {
                $('#admission_completed_msg').html(iziToast.error({
                    title: 'Canceled!',
                    timeout: 5000,
                    message: 'Someting Wrong!!',
                    position: 'topRight'
                }));

                setTimeout(function() {
                    location.reload();
                }, 5020);
            }
        }
    });
    return false;
});

// Admission Remrks
function admission_remarks(admission_id = '') {
    $('.edit-details').hide();
    $('.branch-transfer').hide();
    $('.basic-info-edit').hide();
    $('.send-sms-details').hide();
    $('.send-email-details').hide();
    $('.courses').hide();
    $('.pay-details').hide();
    $('.admission-cancellation').hide();
    $('.admission-terminated').hide();
    $('.admission-hold').hide();
    $('.admission-hold-over').hide();
    $('.admission-remraks').show();

    $.ajax({
        url: "<?php echo base_url(); ?>Admission/Erpadmission_remarks",
        type: "post",
        data: {
            'admission_id': admission_id
        },
        success: function(Resp) {
            $('.remarks_data').html(Resp);
        }
    });
}
// view all remarks for admission

function view_all_remraks(admission_id = '') {
    $.ajax({
        url: "<?php echo base_url(); ?>Admission/view_all_remrks_for_id_wise",
        type: "post",
        data: {
            'admission_id': admission_id
        },
        success: function(Resp) {
            $('.show_all_admission_remraks').html(Resp);
        }
    });
}
 </script>
 <script>
function batch_notification(admission_courses_id = '') {
    $.ajax({
        url: "<?php echo base_url(); ?>welcome/batchnotification_status",
        type: "post",
        data: {
            'admission_courses_id': admission_courses_id
        },
        success: function(Resp) {

            setTimeout(function() {
                location.reload();
            }, 500);
        }
    });
}
 </script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
$(function() {
   var start1=moment().subtract(1, 'days');
   var end1=moment();
   var start=""
   var end=""

    function cb(start, end) {
        $('#fromdate').val(start.format('YYYY-MM-DD'));
        $('#todate').val(end.format('YYYY-MM-DD'));
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
    }

    $('#reportrange').daterangepicker({
        startDate: start1,
        endDate: end1,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>

 </body>


 <!-- index.html  21 Nov 2019 03:47:04 GMT -->

 </html>