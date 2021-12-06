<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
<style>
   #side_lead_response{
   position: absolute;
   top :0;
   right: 0;
   z-index: 1000000000;
   padding:10px;
   }
   .gmail_button{
   height: 50px;
   width: 50px;
   background-color: orange;
   float: right;
   border-radius: 50%;
   margin-top: 20px;
   cursor: pointer;
   font-size: 20px;
   text-align: center;
   line-height: 50px;
   color: #fff;
   }
   .form-display{
   border: none !important ;
   background-color: transparent !important;
   font-size: 14px !important;
   display: inline-block !important;
   margin-bottom: 8px !important;
   padding-left: 10px !important;
   border-radius:none !important;
   height:auto !important;
   }
   .cancel-btn{
   font-size: 12px;
   padding:18px 36px;  
   background-color: white; 
   color:black; 
   border:none;
   line-height: 3px;
   position: absolute; 
   top:130%;
   left:0;
   border-radius: 4px !important;
   }
   .form-group .btn-sm{
   font-size: 10px;
   }
   .submit-btn{
   font-size: 12px;
   padding:18px 36px; 
   background-color: orange; 
   color:white; 
   border:none;
   right: 0;
   line-height: 3px;
   position: absolute; 
   top:130%;
   border-radius: 4px !important;
   }
   .modal-backdrop{
   z-index: 8;
   }
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
   .main_content section{
   padding:0 0 40px 0;
   }
   .card-body{
   padding: 16px;
   }
   /* .col-md-3 {
   margin-bottom: 20px;
   } */
   .img-circle{
   width:65px;
   height:65px;
   background-color: #a2a2a2;
   border-radius: 50%;
   overflow:hidden;
   display:inline-block;
   /* border: 2px #212121 groove; */
   }
   .fill_new_leade_info_body{
   max-height:600px;
   padding: 0 5px;
   }
   .lead_small_box ul li a {
   text-decoration: none;
   }
   .right_side{
   width:320px !important;
   right: -320px ;
   }
   .main_content.right_show{
   padding-right:320px;
   padding-left: 7px;
   }
   .img-responsive{
   display: block;
   max-width: 100%;
   height: auto;
   }
   .form{
   border: 0;
   } 
   .sidetblth{
   background-color: #0b527e;
   color: #fff;
   font-size: 12px;
   }  
   .sidetbltd{
   background-color: #fff;
   color: black;
   font-size: 11px; 
   }  
   .form-group{
   margin-bottom:10px;
   }
   .img-section{
   width:140px ;
   height:auto;
   text-align:center;
   }
   .action_btn{
   width:50px;
   }
   .action_btn ul li ul li a {
   color: #7D7D7D;
   font-size: 14px;
   margin: 0 5px;
   }
   .action_btn ul li a {
   text-decoration: none;
   }
   .action_btn .lead_info_title{
   font-size: 12px;
   color: #8292a7;
   display: block;
   }
   .action_option_lead li {
   margin-bottom:10px;
   }   
   .lead_info_text{
   font-size:12px;
   }    
   .full_lead_block{
   max-height:100% !important;
   }   
   .click_btn{
   font-size:12px;
   } 
   .pdf_link{
   font-size:14px;
   color:#c52410;
   font-weight:600;
   line-height:32px;
   }
   .lead_small_box a{
   font-weight: 600;
   }
   @media (min-width:1200px) and (max-width:1300px){
   .lead_small_box_lg{
   width: 140px !important;
   }
   .lead_box_lg{
   width:24% !important;
   }
   .right_side{
   width: 320px !important;
   }
   .main_content.right_show{
   padding-left: 7px !important;
   padding-right: 320px !important;
   }
   .img-section{
   width: 160px;
   }
   .fill_new_leade_info_body{
   max-height:500px;
   }
   }
   @media (max-height: 800px){
   .fill_new_leade_info_body{
   max-height: 450px;
   min-height: 430px;
   }
   }
   .form-group span, .form-group select{
   font-size: 12px;
   }
   th img{
   width: 200px;
   display: block;
   margin: auto;
   vertical-align: middle;
   }
   .table td, .table th{
   font-size: 10px;
   padding: 5px;
   vertical-align: middle;
   }
</style>
<main class="main_content d-inline-block">
   <section class="axtraage_main_first_sec d-inline-block w-100 position-relative">
      <div class="container-fluid">
      <div class="row">
         <div class="col-xl-12">
            <div class="extra_Block_box">
               <div class="extra_lead_menu d-inline-block w-100 position-relative">
                  <ul>
                     <?php  foreach($status_wise as $k=>$v){  ?>
                     <li><a  href="<?php echo base_url(); ?>AddmissionController/admission_view?status=<?php echo $k; ?>"> 
                        <?php echo  $k; ?> (<?php echo $v; ?>)</a>
                     </li>
                     <?php } ?>
                     <button class="float-right btn-primary" type="button" data-toggle="modal" data-target="#searchingm"><i class="fa fa-search"></i></button>
                  </ul>
               </div>
               <div class="full_lead_block d-inline-block w-100 position-relative">
                  <?php 
                     if(!empty($list_all_admission)){
                     
                       $mk = 0;
                     
                     foreach($list_all_admission as $adm) { ?>
                  <div class="lead_block_box">
                     <div class="img-section">
                        <ul>
                           <li class="prospect_neme_first_list">
                              <div class="img-circle">
                                 <img src="<?php echo base_url(); ?>dist/admimages/<?php echo $adm->file_name;  ?>" class="img-fluid" alt="student passport photo"/>
                              </div>
                           </li>
                           <li>
                              <a href="" data-toggle="modal" data-target="#exampleModal">
                              <i class="fa fa-edit" style="font-size:15px;color:#0b527e;"></i>
                              </a>
                           </li>
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Image Upload</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <form id="submit">
                                          <div class="form-group">
                                             <input type="hidden" name="admission_id" id="admission_id<?php echo $mk; ?>" value="<?php echo @$adm->admission_id; ?>">
                                          </div>
                                          <div class="form-group">
                                             <label for="exampleFormControlFile1"><b>Upload Photo:</b></label>
                                             <input type="file" class="form-control-file" name="file" id="file" required>
                                          </div>
                                          <div class="form-group">
                                             <button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
                                          </div>
                                       </form>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <li>
                              <div class="form-group" >
                                 <span class="lead_info_title">Multi Course</span>
                                 <select class="form-control" id="multic<?php echo $mk; ?>" onchange="return getAdmissionData(<?php echo $mk; ?>)" style="height: 26px; width:115px; padding:3px 6px; line-height:1; font-size:12px; display:inline;" >
                                    <?php $i=0; foreach($adm->list_multi_course_admission as $k => $val){ ?>
                                    <option  value="<?php echo $k; ?>"><?php echo $val; ?></option>
                                    <?php $i++;  } ?>
                                 </select>
                              </div>
                           </li>
                        </ul>
                        <span id="ac_id<?php echo $mk; ?>">  
                        <a style="font-weight: 400;" class="btn btn-warning click_btn text-light" onclick="return Cancellation_admission(<?php echo $adm->admission_id; ?>);">Cancel Admission</a> 
                        </span>                            
                     </div>
                     <div class="lead_small_box lead_small_box_lg" style="width:140px !important;">
                        <ul>
                           <li>
                              <span class="lead_info_title">Gr Id</span>
                              <p class="lead_info_text"><?php echo $adm->gr_id; ?>/<?php echo $adm->admission_number; ?></p>
                           </li>
                           <div id="multi_course">
                              <li>
                                 <span class="lead_info_title">Department</span>
                                 <p class="lead_info_text" id="d_id<?php echo $mk; ?>"><?php $department_ids = explode(",",$adm->department_id);
                                    foreach($list_department as $row) { if(in_array($row->department_id,$department_ids)) {  echo $row->department_name; }  } ?>
                                 </p>
                              </li>
                           </div>
                           <li>
                              <span class="lead_info_title">Branch</span>
                              <p class="lead_info_text" id="b_id<?php echo $mk; ?>"><?php $branch_ids = explode(",",$adm->branch_id);
                                 foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?>
                              </p>
                           </li>
                        </ul>
                        <spna id="at_id<?php echo $mk; ?>"> 
                           <a style="font-weight: 400;" class="btn btn-warning click_btn text-light" onclick="return admission_terminated(<?php echo $adm->admission_id; ?>);">Mark Terminate</a>  
                        </spna>
                     </div>
                     <div class="lead_small_box lead_box_lg">
                        <ul>
                           <li>
                              <span class="lead_info_title">Prospect Name</span>
                              <span class="copy_info_text_line">
                              <a href="#" title="<?php echo $adm->surname; ?> <?php echo $adm->first_name; ?> <?php echo $adm->father_name; ?>" class="lead_info_text lead_student_info_copy" onclick="return update_adm_record(<?php echo $adm->admission_id; ?>);"><?php echo $adm->surname; ?> <?php echo $adm->first_name; ?> <?php echo $adm->father_name; ?></a>
                              <span><a href="#" class="d-inline-block" title="Click Here To Copy"><i class="fas fa-eye" onclick="return update_adm_record(<?php echo $adm->admission_id; ?>);" style="font-size:12px;color:#0b527e;"></i><i class="fas fa-copy"></i></a></span>
                              </span>
                           </li>
                           <li>
                              <span class="lead_info_title">Course</span>
                              <div id="c_id<?php echo $mk; ?>">
                                 <a href="#"  class="lead_info_text lead_student_info_copy " onclick="return courses_orpackages(<?php echo $adm->admission_id; ?>);">
                                 <?php $branch_ids = explode(",",$adm->package_id);
                                    foreach($list_package as $row) { if(in_array($row->package_id,$branch_ids)) {  echo "Package : ".''. $row->package_name; }  } ?>
                                 <?php $branch_ids = explode(",",$adm->course_id);
                                    foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo "Single : ".''. $row->course_name; }  } ?>
                                 </a>
                              </div>
                              <!-- <span><i class="fas fa-eye create_new_lead" onclick="return courses_orpackages(<?php echo $adm->admission_id; ?>);" style="font-size:12px;color:#0b527e;"></i></span> -->
                           </li>
                           <li>
                              <span class="lead_info_title">Year</span>
                              <p class="lead_info_text" id="year_id<?php echo $mk; ?>"><?php echo $adm->year; ?></p>
                           </li>
                        </ul>
                        <a  href="<?php echo base_url(); ?>AddmissionController/idcards?action=edit&id=<?php echo @$adm->admission_id; ?>" class="pdf_link text-danger"  target="blank">Print I'D card</a>       
                     </div>
                     <div class="lead_small_box lead_box_lg">
                        <ul>
                        <li>
                           <span class="lead_info_title">Email</span>
                           <span class="copy_info_text_line">
                           <a href="#edit_lead_emial d-inline-block" class="lead_info_text lead_student_info_copy" title="<?php echo $adm->email; ?>" onclick="return show_email_template(<?php echo $adm->admission_id; ?>)"><?php echo $adm->email; ?></a>
                           <span><a href="#" class="d-inline-block" title="Click Here To Copy"><i class="fas fa-copy"></i></a></span>
                           </span>
                        </li>
                        <li>
                           <span class="lead_info_title">Tuition Fess</span>
                           <a href="#" title="<?php echo $adm->tuation_fees; ?>" class="lead_info_text lead_student_info_copy" id="tf_id<?php echo $mk; ?>"  onclick="return admission_payment(<?php echo $adm->admission_id; ?>);"><?php echo $adm->tuation_fees; ?></a>                     
                        </li>
                        <li>
                           <span class="lead_info_title">Admission Date</span>
                           <p class="lead_info_text" id="date_id<?php echo $mk; ?>"><?php echo $adm->admission_date; ?></p>
                        </li>
                     </div>
                     <div class="lead_small_box lead_small_box_lg" style="width: 18%;">
                        <ul>
                        <li>
                           <span class="lead_info_title">Mobile</span>
                           <span class="copy_info_text_line">
                           <a href="#edit_lead_emial d-inline-block" title="<?php echo $adm->mobile_no; ?>" class="lead_info_text lead_student_info_copy" onclick="return get_sms_template_record(<?php echo $adm->admission_id; ?>)"><?php echo $adm->mobile_no; ?></a>
                           <span><a href="#" class="d-inline-block" title="Click Here To Copy"><i class="fas fa-copy"></i></a></span>
                           </span>
                        </li>
                        <li>
                           <span class="lead_info_title">Registration fees</span>
                           <p class="lead_info_text" id="rf_id<?php echo $mk; ?>"><?php echo $adm->registration_fees; ?></p>
                        </li>
                        <li>
                           <span class="lead_info_title">Remarks</span>
                           <a href="#add_remark_lead" class="lead_info_text" data-toggle="tooltip" data-placement="top" title="testing" onclick="return adm_remarks(<?php echo $adm->admission_id; ?>);">Add Remark</a>
                           <!-- <a href=""  data-toggle="remark" data-target="#remark"  data-placement="top">
                              <i class="fas fa-eye" style="font-size:15px;color:#0b527e;"></i>
                              
                              </a> -->
                           <div class="modal fade" id="remark" tabindex="-1" role="dialog" aria-labelledby="remark" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel"><b>Remarks</b></h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <table class="table table-str iped create_responsive_table">
                                          <thead>
                                             <tr class="sidetblth">
                                                <th>S_No</th>
                                                <th>Date-Time</th>
                                                <th>Label</th>
                                                <th>Remarks</th>
                                                <th>Rating</th>
                                                <th>Addby</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php $sno=1; foreach($list_remarks as $val) { ?>                  
                                             <tr class="sidetbltd">
                                                <td><?php echo $sno; ?></td>
                                                <td>
                                                   <?php echo $val->remarks_date; ?><br>
                                                   <?php echo $val->remarks_time; ?>
                                                </td>
                                                <td><?php echo  $val->labels; ?></td>
                                                <td>
                                                   <?php echo $val->admission_remrak; ?>
                                                </td>
                                                <td><?php echo $val->rating; ?></td>
                                                <td>
                                                   <?php echo $val->addby; ?>
                                                </td>
                                             </tr>
                                             <?php $sno++; }?>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </div>
                     <div class="lead_small_box lead_small_box_lg">
                        <ul>
                        <li>
                           <span class="lead_info_title">Source</span>
                           <p class="lead_info_text"><?php echo $adm->source_id; ?></p>
                        </li>
                        <li>
                           <span class="lead_info_title">Total pay</span>
                           <p class="lead_info_text">
                              <?php  foreach($adm->paidcount as $k => $val){ ?>
                              <?php echo $val->paid_amount; ?>
                              <?php  } ?>
                           </p>
                        </li>
                     </div>
                     <div class="action_btn">
                        <ul>
                           <li>
                              <span class="lead_info_title">Action</span>
                              <ul class="action_option_lead">
                                 <li>
                                    <div class="dropdown">
                                       <a href="#" data-toggle="dropdown">
                                       <i class="fas fa-ellipsis-h"></i>
                                       </a>
                                       <ul class="dropdown-menu edit_lead_dropdown" aria-labelledby="dropdownMenuButton">
                                          <!-- <li><a href="#" class="dropdown-item" onclick="return student_detail_record(<?php echo $adm->admission_id; ?>)"><i class="fa fa-eye"></i>View</a></li> -->
                                          <li><a href="#" class="dropdown-item" onclick="return edit_admission(<?php echo $adm->admission_id; ?>)"><i class="fas fa-pen-square" ></i>Edit Admission</a></li>
                                          <li  id="adm_id<?php echo $mk; ?>"><a href="#" class="dropdown-item"  onclick="return course_edit_admission(<?php echo $adm->admission_id; ?>)"><i class="fas fa-pen-square" ></i>Upgrade course</a></li>
                                          <!-- <li><a href="#" class="dropdown-item"><i class="fas fa-history"></i>View History</a></li> -->
                                          <li id="ah_id<?php echo $mk; ?>"><a href="#" class="dropdown-item" onclick="return hold_admission(<?php echo $adm->admission_id; ?>);"><i class="fas fa-share-square"></i>Admission Hold</a></li>
                                          <li id="a_histroy_id<?php echo $mk; ?>"><a onclick="return view_admission_histroy(<?php echo $adm->admission_id; ?>)" class="dropdown-item"><i class="fas fa-history"></i>View History</a></li>
                                          <li><a href="<?php echo base_url(); ?>AddmissionController/Assessment?action=edit&id=<?php echo @$adm->admission_id; ?>"><i class="fa fa-wpforms" aria-hidden="true"></i>Assessment</a></li>
                                          <li><a href="#" class="dropdown-item"><i class="fas fa-user-minus"></i>Delete</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li>
                                    <a href="#click_to_call_leade" data-toggle="modal" title="Click To Call Now"><i class="fas fa-phone-alt"></i></a>
                                 </li>
                                 <li>
                                    <a href="#lead_sent_whatsapp_msg" title="Sent Whatsapp Message"><i class="fab fa-whatsapp"></i></a>
                                 </li>
                                 <!-- <li>
                                    <a href="#lead_sent_email_msg" title="Sent Email Message"><i class="far fa-envelope"></i></a>
                                    
                                    </li> -->
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <?php  $mk++; } } ?>
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
                  <!--  -->
                  <h5 class="modal-title">
                     <span id="change_adm_status">Admission Edit</span>&nbsp;<span id="stu_name"></span>
                     <p class="flip btn btn-sm btn-success show_btn" onclick="myFunction()">Edit</p>
                     <button type="button" class="btn btn-sm btn-success edit_btn" id="update_adm_details">Update</button> 
                     <p class="flip btn btn-sm btn-success show_upd_course" onclick="course_upd_function()">Edit</p>
                     <button type="button" class="btn btn-sm btn-success edit_course_btn"  id="upd_course">Update</button>
                  </h5>
                  <button type="button" class="close close_side_bar" onclick="return close_right_side_bar()">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="fill_new_leade_info_body" id="create_leade">
                  <div class="right_side_row_panel">
                     <form method="post">
                        <a href="#candidate_details" data-toggle="collapse" class="collapsed"><i class="fas fa-chevron-down"></i><span id="change_status_details">Admission Details</span></a>
                        <div class="right_side_row_panel_block collapse show" id="candidate_details" data-parent="#create_leade">
                           <div class="new_lead_info_fill" id="basic_info">
                              <h6 class="lead_fill_title">Basic Details*</h6>
                              <div class="card" style="width: 17.5rem;">
                                 <div class="card-body">
                                    <p class="card-text">
                                    <div class="form-group d-flex">
                                       <label>Surname :</label>
                                       <input type="text" maxlength="50" class="form-display" name="sname" id="sname" placeholder="Surname" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                       <label>Name :</label>
                                       <input type="text" maxlength="50" class="form-display" name="fname" id="fname" placeholder="Name" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                       <label>Email :</label>
                                       <input type="text" maxlength="100" class="form-display" name="mail" id="mail" placeholder="Email" data-api-attached="true" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                       <label>Mobile :</label>
                                       <input type="tel" maxlength="13" class="form-display" min="0" name="mnumber" id="mnumber" placeholder="Mobile" data-api-attached="true" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail4">Branch :</label>
                                       <select class="form-display" name="bra_id" id="bra_id" readonly>
                                          <option value="">Select branch</option>
                                          <?php foreach($list_branch as $ld) { ?>
                                          <option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                                          <?php } ?>  
                                       </select>
                                    </div>
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <div class="new_lead_info_fill" id="basic_info_two">
                              <h6 class="lead_fill_title">Basic Details*</h6>
                              <input type="hidden" name="update_id" id="update_id" class="form-control">
                              <div class="form-group">
                                 <label>Surname*</label>
                                 <input type="text" maxlength="50" class="form-control" name="surname" id="surname" placeholder="Surname" value="" >
                              </div>
                              <div class="form-group">
                                 <label>Name*</label>
                                 <input type="text" maxlength="50" class="form-control" name="first_name" id="first_name" placeholder="Name" value="" >
                              </div>
                              <div class="form-group">
                                 <label>Email*</label>
                                 <input type="text" maxlength="100" class="form-control" name="email" id="email" placeholder="Email" data-api-attached="true" value="" >
                              </div>
                              <div class="form-group">
                                 <label>Mobile</label>
                                 <input type="tel" maxlength="13" class="form-control" min="0" name="mobile_no" id="mobile_no" placeholder="Mobile" data-api-attached="true" value="" >
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail4">Branch<span style="color:red">*</span></label>
                                 <select class="form-control" name="branch_id" id="branch_id" >
                                    <option value="">Select branch</option>
                                    <?php foreach($list_branch as $ld) { ?>
                                    <option  
                                       value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                                    <?php } ?>  
                                 </select>
                              </div>
                           </div>
                           <div id="courses">
                           </div>
                           <div id="remarks">
                           </div>
                           <div id="payment">
                           </div>
                           <div id="adms_cancellation">
                           </div>
                           <div id="adm_terminated">
                           </div>
                           <div id="adm_hold">
                           </div>
                           <div id="adm_histroy">
                           </div>
                     <form method="post" id="admission_sms_template"  style="position: relative;">
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
                     <div class="form-group" id="send_email_button_show">
                     <input type="button" name="submit" value="Cancel" class="cancel-btn" style="top:100%; left: 8%;">
                     <input type="button" id="send_email_template_button" onclick="return send_email_data();" name="submit" value="Submit" class="submit-btn" style="top:100%; right: 8%;">
                     </div>
                     </div>
                     </form>
                     <!-- <div class="form-group" style=" " id="send_email_button_show">
                        <input type="button" name="submit" value="cancel" style="font-size: 20px;padding:2rem 2.3rem 2rem 2.3rem; background-color: white; color:black; border:none;margin-top:25px;line-height: 3px;position: absolute; display: inline-block;">
                        
                        
                        
                        <input type="button" name="submit" id="send_email_template_button" value="Send SMS" onclick="return send_sms_data();" style="font-size: 20px;padding:2rem 2rem 2rem 2rem; background-color: orange; color:white; border:none;margin-top:25px;margin-left:110px;line-height: 3px;position: absolute; display: inline-block <i class="fa fa-spinner fa-spin" style="position: absolute;margin-top:25px;margin-left:122px; font-size: 20px; color: white;"></i> -->
                     <!-- <input type="button" name="submit" value="Send Email" style="font-size: 18p"> 
                        </div> -->
                     </div>
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
                     <div class="gmail_button">
                     <span data-toggle="modal" data-target="#myModal" id="mymodal1"><i class="fas fa-envelope"></i></span>
                     </div>
                     <div class="email_compose_Textarea_error"></div>
                     </div>
                     <div class="form-group" id="send_email_button_show">
                     <input type="button" name="submit" value="Cancel" class="cancel-btn">
                     <input type="button" id="send_email_template_button" onclick="return send_email_data();" name="submit" value="Submit" class="submit-btn">
                     </div>
                     </div>
                     </form>
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
   <div class="modal fade" id="student_datails_modal">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 1100px;">
         <div class="modal-content" id="admission_get_data">
         </div>
      </div>
   </div>
</div>
<div class="filter_ratio" id="filter_ratio">
   <div class="modal fade" id="courses_modal">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 1050px;">
         <div class="modal-content" id="get_course_data">
         </div>
      </div>
   </div>
</div>
<div class="filter_ratio" id="filter_ratio">
   <div class="modal fade" id="edit_admission_modal">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 1050px;">
         <div class="modal-content" id="get_data">
         </div>
      </div>
   </div>
</div>
<!-- Modal Shining Sheet-->
<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document" style="max-width: 800px;">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>Shining Sheet</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="get_shiningsheet">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- serach admission data modal -->
<div class="modal fade" id="searchingm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="max-width:1000px !important;">
      <div class="modal-content" style="margin-top: 55px;">
         <div class="modal-header" style="background-color: #0b527e;">
            <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Search Admission Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="card">
               <div class="card-body">
                  <!-- <h5 class="card-title btn text p">Master Search</h5> -->
                  <p class="card-text">
                  <form method="post" action="<?php  echo base_url(); ?>AddmissionController/admission_view">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label><b>Name</b></label>   
                              <input type="text" class="form-control" value="<?php if(!empty($filter_fname)) { echo @$filter_fname; } ?>" placeholder="Name"  name="filter_fname">
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label><b>Surname</b></label>   
                              <input type="text" class="form-control" value="<?php if(!empty($filter_lname)) { echo @$filter_lname; } ?>" placeholder="SurName"  name="filter_lname">
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label><b>Email</b></label>   
                              <input type="text" class="form-control" value="<?php if(!empty($filter_email)) { echo @$filter_email; } ?>" placeholder="Example@gmail.com" name="filter_email">
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label><b>Mobile</b></label>   
                              <input type="text" class="form-control" value="<?php if(!empty($filter_mobile)) { echo @$filter_mobile; } ?>" placeholder="+91-00000-00000" name="filter_mobile">
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">  
                              <label><b>GR ID</b></label>   
                              <input type="text" class="form-control" value="<?php if(!empty($filter_gr_id)) { echo @$filter_gr_id; } ?>" placeholder="GR ID"  name="filter_gr_id">
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label for="Faculty"><b>Branch</b></label>   
                              <select class="form-control custom-select my-1 mr-sm-2"   name="filter_branch">
                                 <option selected disabled>Filter Branch</option>
                                 <?php foreach($list_branch as $val) { ?>
                                 <option  <?php if(@$filter_branch==$val->branch_id) { echo "selected"; } ?> value="<?php echo $val->branch_name; ?>"> <?php echo $val->branch_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label for="Faculty"><b>Course</b></label>   
                              <select class="form-control"   name="filter_course">
                                 <option selected disabled>Course</option>
                                 <?php foreach($list_course as $val) { if($val->status=="0") { ?>
                                 <option   <?php if(@$filter_course==$val->course_name) { echo "selected"  ; } ?> value="<?php echo $val->course_id; ?>"> <?php echo $val->course_name; ?></option>
                                 <?php } } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label for="Faculty"><b>Package</b></label>   
                              <select class="form-control"   name="filter_package">
                                 <option selected disabled>Package</option>
                                 <?php foreach($list_package as $val) { if($val->status=="0") { ?>
                                 <option   <?php if(@$filter_package==$val->package_name) { echo "selected"  ; } ?> value="<?php echo $val->package_id; ?>"> <?php echo $val->package_name; ?></option>
                                 <?php } } ?>
                              </select>
                           </div>
                        </div>
                        <!--  <div class="col-sm-3">
                           <div class="form-group">
                           
                              <label for="Faculty"><b>Batch</b></label>   
                           
                           <select class="form-control"   name="filter_batch">
                           
                           <option selected disabled>Batch</option>
                           
                           <?php foreach($list_batch as $val) {  ?>
                           
                           <option   <?php if(@$filter_batch==$val->batch_name) { echo "selected"  ; } ?> value="<?php echo $val->batch_id; ?>"> <?php echo $val->batch_name; ?></option>
                           
                           <?php  } ?>
                           
                           </select>
                           
                           </div>
                           
                           </div> -->
                     </div>
                     <div class="float-right">
                        <input type="submit" id="btn" class="btn btn-success f" value="Search" name="filter_admission">
                        <a class="btn btn-danger f" href="<?php echo base_url(); ?>AddmissionController/admission_view">Reset</a>
                     </div>
                  </form>
                  </p>
               </div>
            </div>
         </div>
         <!--  <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
            <button type="button" class="btn btn-primary">Save changes</button>
            
            </div> -->
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
   
   //            selector: '#followup_remark_modal',
   
   //            plugins : [' preview code'],
   
   //            menubar:false,
   
   //            statusbar: false,
   
   //            height:500
   
   //        });
   
   
   
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
   function myFunction() {
   
     $('#basic_info').hide();
   
     document.getElementById("basic_info_two").style.display = "block";
   
   }
   
</script>
<script>
   function course_upd_function() {
   
     $('#course_upd_data').hide();
   
     document.getElementById("course_upd_data").style.display = "block";
   
   }
   
</script>
<script>
   function student_detail_record(admission_id='')
   
   {
   
     $('#student_datails_modal').modal('show');
   
     $.ajax({
   
       url : "<?php echo base_url(); ?>AddmissionController/get_admission_Student_detail",
   
       type : "post",
   
       data:{
   
         'admission_id' : admission_id
   
       },
   
       success:function(Response)
   
       {
   
         $('#student_datails_modal').modal('show');
   
         $('#admission_get_data').html(Response);
   
       }
   
     });
   
   }
   
   
   
   
   
   function course_edit_admission(admission_id='')
   
   {
   
     $('#courses_modal').modal('show');
   
     $.ajax({
   
       url : "<?php echo base_url(); ?>AddmissionController/get_courses_data",
   
       type : "post",
   
       data:{
   
         'admission_id' : admission_id
   
       },
   
       success:function(Response)
   
       {
   
         $('#courses_modal').modal('show');
   
         $('#get_course_data').html(Response);
   
       }
   
     });
   
   }
   
   
   
   function edit_admission(admission_id='')
   {
   
     $('#edit_admission_modal').modal('show');
   
     $.ajax({
   
       url : "<?php echo base_url(); ?>AddmissionController/get_adm",
   
       type : "post",
   
       data:{
   
         'admission_id' : admission_id
   
       },
   
       success:function(Response)
   
       {
   
         $('#edit_admission_modal').modal('show');
   
         $('#get_data').html(Response);
   
       }
   
     });
   
   }
   
   
   
    function update_adm_record(admission_id)
   {
       $.ajax({
   
         url: "<?php echo base_url(); ?>AddmissionController/get_adm_record",
   
         type : "post",
   
         data :{
   
           'admission_id' : admission_id
   
         },
   
         success:function(res)
   
         {
   
      $("aside").addClass('right_show');
   
     $('.main_content').addClass('right_show');
   
     $('.right_side').addClass('right_show');
   
     $('.plus_button').removeClass('create_new_lead');
   
     $('.edit_btn').show();
   
     $('.edit_course_btn').hide();
   
     $('.remark_btn').hide();
   
     $('#basic_info').show();
   
     $('#basic_info_two').hide();
   
     $('.show_upd_course').hide();
   
     $('#first_second_right_side').hide(); 
   
     $('#first_third_right_side').hide();
   
     $('#remarks_box').hide();
   
     $('#first_forth_right_side').hide();
   
     $('#admission_Cancellation').hide();
   
     $('#admission_termination').hide();
   
     $('#adm_histroy').hide();
   
     $('#change_adm_status').html("Admission Edit");
   
     $('#change_status_details').html("Admission Details");
   
           // $('#select_course_package').show();     
   
     $('#basic_info').show();
   
     $('#lead_list_email_template').show();
   
     $('#admission_sms_template').hide();
   
     $('.sms_template_view').hide();
   
     $('#lead_list_email_template').hide();
   
     $('.email_template_view').hide();
   
   
   
           var data = $.parseJSON(res);
   
           
   
           $('#update_id').val(data.record['adm_get_record'].admission_id);
   
           $('#surname').val(data.record['adm_get_record'].surname);
   
           $('#first_name').val(data.record['adm_get_record'].first_name);
   
           $('#email').val(data.record['adm_get_record'].email);
   
           $('#mobile_no').val(data.record['adm_get_record'].mobile_no);
   
           $('#branch_id').val(data.record['adm_get_record'].branch_id);
   
   
   
           $('#sname').val(data.record['adm_get_record'].surname);
   
           $('#fname').val(data.record['adm_get_record'].first_name);
   
           $('#mail').val(data.record['adm_get_record'].email);
   
           $('#mnumber').val(data.record['adm_get_record'].mobile_no);
   
           $('#bra_id').val(data.record['adm_get_record'].branch_id);
   
           // var depart = data.record['adm_get_record'].department_id;
   
           // var dep = [];
   
           
   
           // dep.push(depart.split(","));
   
   
   
           // console.log(dep);
   
           
   
           
   
           // var pack_sin =  data.record['lead_get_record'].package_id;
   
               
   
               // if(pack_sin == 'package')
   
               // {
   
               //    $("#course_package"). prop("checked", true);
   
               //    // get_course_package('package');
   
               //    $('.select_course_package').show();
   
               //    $('.select_course_single').hide();
   
               //    $('#course_orpackage').val(data.record['lead_get_record'].package_id);
   
                  
   
               // }
   
               // else
   
               // {
   
               //    $("#course_single"). prop("checked", true);  
   
               //    // get_course_package('single');
   
               //    $('.select_course_package').hide();
   
               //    $('.select_course_single').show();
   
               //    $('#course_orsingle').val(data.record['lead_get_record'].course_id);
   
               
   
               // }
   
         }
   
       });
   
   }
   
   
   
   
   
   function get_side_bar_modal()
   
   {
   
     $('.email_template_view').hide();
   
     $('.fill_new_leade_info_body').show();
   
     $('.lead_save_btn').show();
   
     $('#first_first_right_side').show();
   
     $('#first_second_right_side').show();
   
     $('#first_third_right_side').show();
   
     $('#remarks_box').show();
   
     $('.show_upd_course').hide();
   
     $('#lead_third_fill_title').show();
   
     $('#third_followup_mode').show();
   
     $('#admission_Cancellation').show();
   
     $('#admission_termination').show();
   
      $('#existing_follow_up').hide();
   
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
   
         $('#adm_histroy').hide();
   
         $('#add_lead').show();
   
         $('#change_adm_status').html("Admission Edit");  
   
         $('#change_status_details').html("Admission Details");  
   
         $('#stu_name').html('');
   
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
</script>
<script type="text/javascript">
   //  $('.edit_btn').hide();
   
   //   $('.remark_btn').hide();
   
   //   $('#basic_info').hide();
   
   //   $('#first_second_right_side').hide(); 
   
   //   $('#first_third_right_side').hide();
   
   //   $('#first_forth_right_side').hide();
   
   function admission_payment(admission_id=''){
   
     $("aside").addClass('right_show');
   
     $('.main_content').addClass('right_show');
   
     $('.right_side').addClass('right_show');
   
     $('.plus_button').removeClass('create_new_lead');
   
     $('.edit_btn').hide();
   
     $('.remark_btn').hide();
   
     $('#basic_info').hide();
   
     $('.show_btn').hide();
   
     $('.show_upd_course').hide();
   
     $('#basic_info_two').hide();
   
     $('.edit_course_btn').hide();
   
     $('#first_second_right_side').hide(); 
   
     $('#first_third_right_side').hide();
   
     $('#remarks_box').hide();
   
     $('#adm_histroy').hide();
   
     $('#first_forth_right_side').show();
   
     $('#change_adm_status').html("Payment");
   
     $('#change_status_details').html("Payment Details");
   
     $('#co_section_hidden').hide();
   
     $('#admission_Cancellation').hide();
   
     $('#admission_termination').hide();
   
     $('#admission_hold').hide();
   
     $('#admission_sms_template').hide();
   
     $('.sms_template_view').hide();
   
     $('#lead_list_email_template').hide();
   
     $('.email_template_view').hide();
   
      $.ajax({
   
        url : "<?php echo base_url(); ?>AddmissionController/ajax_admission_payment",
   
        type:"post",
   
        data:{
   
          'admission_id':admission_id 
   
        },
   
        success:function(Resp){
   
          $('#payment').html(Resp);
   
        }
   
      });
   
    }
   
</script>
<script type="text/javascript">
   function courses_orpackages(admission_id=''){
   
     $('.edit_btn').hide();
   
     $("aside").addClass('right_show');
   
     $('.main_content').addClass('right_show');
   
     $('.right_side').addClass('right_show');
   
     $('.plus_button').removeClass('create_new_lead');
   
     $('.remark_btn').hide();
   
     $('#basic_info').hide();
   
     $('.show_btn').hide();
   
     $('#basic_info_two').hide();
   
     $('.edit_course_btn').show();
   
     $('#first_second_right_side').hide(); 
   
     $('#first_third_right_side').hide();
   
     $('#remarks_box').hide();
   
     $('#first_forth_right_side').hide();
   
     $('#co_section_hidden').hide();
   
     $('#admission_Cancellation').hide();
   
     $('#admission_termination').hide();
   
     $('#admission_hold').hide();
   
     $('#adm_histroy').hide();
   
     $('#admission_sms_template').hide();
   
     $('.sms_template_view').hide();
   
     $('#change_adm_status').html("Edit  Course");
   
     $('#change_status_details').html("Course Details");
   
     $('#lead_list_email_template').hide();
   
     $('.email_template_view').hide();
   
      $.ajax({
   
        url : "<?php echo base_url(); ?>AddmissionController/ajax_admission_cp",
   
        type:"post",
   
        data:{
   
          'admission_id':admission_id 
   
        },
   
        success:function(Resp){
   
         
   
          $('#courses').html(Resp);
   
          $('.show_upd_course').show();
   
        }
   
      });
   
    }
   
   
   
    function Cancellation_admission(admission_id=''){
   
     $('.edit_btn').hide();
   
     $("aside").addClass('right_show');
   
     $('.main_content').addClass('right_show');
   
     $('.right_side').addClass('right_show');
   
     $('.plus_button').removeClass('create_new_lead');
   
     $('.edit_btn').hide();
   
     $('.remark_btn').hide();
   
     $('#basic_info').hide();
   
     $('.show_btn').hide();
   
     $('#basic_info_two').hide();
   
     $('.edit_course_btn').hide();
   
     $('.show_upd_course').hide();
   
     $('#first_second_right_side').hide(); 
   
     $('#first_third_right_side').hide();
   
     $('#remarks_box').hide();
   
     $('#first_forth_right_side').hide();
   
     $('#co_section_hidden').hide();
   
     $('#admission_Cancellation').show();
   
     $('#admission_termination').hide();
   
     $('#admission_hold').hide();
   
     $('#adm_histroy').hide();
   
     $('#change_adm_status').html("Admission  Cancel");
   
     $('#change_status_details').html("Cancel Admission Process");
   
     $('#admission_sms_template').hide();
   
     $('.sms_template_view').hide();
   
     $('#lead_list_email_template').hide();
   
     $('.email_template_view').hide();
   
      $.ajax({
   
        url : "<?php echo base_url(); ?>AddmissionController/ajax_Cancellation_admission",
   
        type:"post",
   
        data:{
   
          'admission_id':admission_id 
   
        },
   
        success:function(Resp){
   
         
   
          $('#adms_cancellation').html(Resp);
   
         
   
        }
   
      });
   
    }
   
   
   
    function admission_terminated(admission_id=''){
   
     $('.edit_btn').hide();
   
     $("aside").addClass('right_show');
   
     $('.main_content').addClass('right_show');
   
     $('.right_side').addClass('right_show');
   
     $('.plus_button').removeClass('create_new_lead');
   
     $('.edit_btn').hide();
   
     $('.remark_btn').hide();
   
     $('#basic_info').hide();
   
     $('.show_btn').hide();
   
     $('#basic_info_two').hide();
   
     $('.edit_course_btn').hide();
   
     $('.show_upd_course').hide();
   
     $('#first_second_right_side').hide(); 
   
     $('#first_third_right_side').hide();
   
     $('#remarks_box').hide();
   
     $('#adm_histroy').hide();
   
     $('#first_forth_right_side').hide();
   
     $('#co_section_hidden').hide();
   
     $('#admission_Cancellation').hide();
   
     $('#admission_termination').show();
   
     $('#admission_hold').hide();
   
     $('#change_adm_status').html("Admission  Terminated");
   
     $('#change_status_details').html("Terminated Admission Process");
   
     $('#admission_sms_template').hide();
   
     $('.sms_template_view').hide();
   
     $('#lead_list_email_template').hide();
   
     $('.email_template_view').hide();
   
      $.ajax({
   
        url : "<?php echo base_url(); ?>AddmissionController/ajx_Terminated_admission",
   
        type:"post",
   
        data:{
   
          'admission_id':admission_id 
   
        },
   
        success:function(Resp){
   
         
   
          $('#adm_terminated').html(Resp);
   
         
   
        }
   
      });
   
    }
   
   
   
    function adm_remarks(admission_id=''){
   
      $('.edit_btn').hide();
   
     $("aside").addClass('right_show');
   
     $('.main_content').addClass('right_show');
   
     $('.right_side').addClass('right_show');
   
     $('.plus_button').removeClass('create_new_lead');
   
     $('.edit_btn').hide();
   
     $('.remark_btn').hide();
   
     $('#basic_info').hide();
   
     $('.show_btn').hide();
   
     $('#basic_info_two').hide();
   
     $('.edit_course_btn').hide();
   
     $('.show_upd_course').hide();
   
     $('#first_second_right_side').hide(); 
   
     $('#first_third_right_side').show();
   
     $('#remarks_box').show();
   
     $('#first_forth_right_side').hide();
   
     $('#co_section_hidden').hide();
   
     $('#admission_Cancellation').hide();
   
     $('#admission_termination').hide();
   
     $('#admission_hold').hide();
   
     $('#adm_histroy').hide();
   
     $('#change_adm_status').html("Admission Remarks");
   
     $('#change_status_details').html("Admission Remraks");
   
     $('#admission_sms_template').hide();
   
     $('.sms_template_view').hide();
   
     $('#lead_list_email_template').hide();
   
     $('.email_template_view').hide();
   
      $.ajax({
   
        url : "<?php echo base_url(); ?>AddmissionController/ajax_admission_remarks",
   
        type:"post",
   
        data:{
   
          'admission_id':admission_id 
   
        },
   
        success:function(Resp){
   
         
   
          $('#remarks').html(Resp);
   
         
   
        }
   
      });
   
    }
   
   
   
    function get_email_template()
   
   {
   
     var id =  $('#email_template').val();
   
     $.ajax({
   
       url : "<?php echo base_url(); ?>AddmissionController/get_email_template_record",
   
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
   
           url: "<?php echo base_url(); ?>AddmissionController/send_email",
   
           type: "post",
   
           data:{
   
             'email' :email,
   
             'subject' : email_subject,
   
             'message' : email_compose_textarea,
   
             'admission_id' : email_recepient_id
   
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
   
               url   : "<?php echo base_url(); ?>AddmissionController/admission_view",
   
               type  : "POST",
   
               data  : { 'test' : 'test' },
   
               success : function(data)
   
               {
   
                 $('.full_lead_block').html(data);
   
               }
   
             });
   
   
   
             if(Res == ' sent')
   
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
   
   
   
    function show_email_template(admission_id){
   
     $('.edit_btn').hide();
   
     $("aside").addClass('right_show');
   
     $('.main_content').addClass('right_show');
   
     $('.right_side').addClass('right_show');
   
     $('.plus_button').removeClass('create_new_lead');
   
     $('.edit_btn').hide();
   
     $('.remark_btn').hide();
   
     $('#basic_info').hide();
   
     $('.show_btn').hide();
   
     $('#basic_info_two').hide();
   
     $('.edit_course_btn').hide();
   
     $('.show_upd_course').hide();
   
     $('#first_second_right_side').hide(); 
   
     $('#first_third_right_side').hide();
   
     $('#remarks_box').hide();
   
     $('#adm_histroy').hide();
   
     $('#first_forth_right_side').hide();
   
     $('#co_section_hidden').hide();
   
     $('#admission_Cancellation').hide();
   
     $('#admission_termination').hide();
   
     $('#admission_hold').hide();
   
     $('#admission_sms_template').hide();
   
     $('#change_adm_status').html("Send Email To");
   
     $('#change_status_details').html("Email Details");
   
     $('.sms_template_view').hide();
   
     $('#lead_list_email_template').show();
   
     $('.email_template_view').show();
   
     
   
     $.ajax({
   
       url: "<?php echo base_url(); ?>AddmissionController/get_admission_email_record",
   
         type : "post",
   
         data :{
   
           'admission_id' : admission_id
   
         },
   
         success:function(res)
   
         {
   
           var data = $.parseJSON(res);
   
           // console.log(res);
   
           // console.log(data.record['lead_get_record'].name);
   
           $('#stu_name').html(data.record['adm_get_record'].first_name);
   
           var email =  data.record['adm_get_record'].email;
   
           $('#primary_email').val(data.record['adm_get_record'].email);
   
           $('#email_recepient_id').val(data.record['adm_get_record'].admission_id);
   
           
   
         }
   
     });
   
     // $('.email_send_side_bar').show();
   
   }
   
   
   
    function get_sms_template_record(admission_id)
   
   {
   
       $('.edit_btn').hide();
   
     $("aside").addClass('right_show');
   
     $('.main_content').addClass('right_show');
   
     $('.right_side').addClass('right_show');
   
     $('.plus_button').removeClass('create_new_lead');
   
     $('.edit_btn').hide();
   
     $('.remark_btn').hide();
   
     $('#basic_info').hide();
   
     $('.show_btn').hide();
   
     $('#basic_info_two').hide();
   
     $('.edit_course_btn').hide();
   
     $('#first_second_right_side').hide(); 
   
     $('#first_third_right_side').hide();
   
     $('#remarks_box').hide();
   
     $('.show_upd_course').hide();
   
     $('#first_forth_right_side').hide();
   
     $('#co_section_hidden').hide();
   
     $('#adm_histroy').hide();
   
     $('#admission_Cancellation').hide();
   
     $('#admission_termination').hide();
   
     $('#admission_hold').hide();
   
     $('#admission_sms_template').show();
   
     $('#change_adm_status').html("Send Smd To");
   
     $('#change_status_details').html("Sms Details");
   
     $('.sms_template_view').show();
   
     $('#lead_list_email_template').hide();
   
     $('.email_template_view').hide();
   
     $.ajax({
   
       url : "<?php echo base_url(); ?>AddmissionController/get_admission_sms_record",
   
       type : "POST",
   
       data:{
   
         admission_id : admission_id
   
       },
   
       success:function(respo){
   
         // console.log(respo);
   
         var data = $.parseJSON(respo);
   
           $('#sms_recepient_id').val(data.record['adm_get_record'].admission_id);
   
           $('#primary_sms').val(data.record['adm_get_record'].mobile_no);  
   
           $('#stu_name').html(data.record['adm_get_record'].first_name);
   
       }
   
     });
   
   }
   
   
   
   function get_sms_template()
   
   {
   
     var sms_template_id =  $('#sms_template').val();
   
     $.ajax({
   
       url : "<?php echo base_url(); ?>AddmissionController/get_sms_template_record",
   
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
   
     //    $('.sms_template_error').html("<p style='color:red;'>Sms Template name is mandatory</p>");
   
     //    var sms_t =1; 
   
     // }
   
     // else
   
     // {
   
     //      sms_t = 0;
   
     //    $('.sms_template_error').html("");
   
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
   
           url: "<?php echo base_url(); ?>AddmissionController/send_sms_record",
   
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
   
               url   : "<?php echo base_url(); ?>AddmissionController/admission_view",
   
               type  : "POST",
   
               data  : { 'test' : 'test' },
   
               success : function(data)
   
               {
   
                 $('.full_lead_block').html(data);
   
               }
   
             });
   
   
   
             if(Res == ' sent')
   
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
   
   
   
    function hold_admission(admission_id=''){
   
     $('.edit_btn').hide();
   
     $("aside").addClass('right_show');
   
     $('.main_content').addClass('right_show');
   
     $('.right_side').addClass('right_show');
   
     $('.plus_button').removeClass('create_new_lead');
   
     $('.edit_btn').hide();
   
     $('.remark_btn').hide();
   
     $('#basic_info').hide();
   
     $('.show_btn').hide();
   
     $('.show_upd_course').hide();
   
     $('#basic_info_two').hide();
   
     $('.edit_course_btn').hide();
   
     $('#first_second_right_side').hide(); 
   
     $('#first_third_right_side').hide();
   
     $('#remarks_box').hide();
   
     $('#first_forth_right_side').hide();
   
     $('#co_section_hidden').hide();
   
     $('#admission_Cancellation').hide();
   
     $('#admission_termination').hide();
   
     $('#adm_histroy').hide();
   
     $('#admission_hold').show();
   
     $('#change_adm_status').html("Admission Hold");
   
     $('#change_status_details').html("Hold Admission Process");
   
     $('#admission_sms_template').hide();
   
     $('.sms_template_view').hide();
   
     $('#lead_list_email_template').hide();
   
     $('.email_template_view').hide();
   
      $.ajax({
   
        url : "<?php echo base_url(); ?>AddmissionController/ajax_admission_hold",
   
        type:"post",
   
        data:{
   
          'admission_id':admission_id 
   
        },
   
        success:function(Resp){
   
         
   
          $('#adm_hold').html(Resp);
   
         
   
        }
   
      });
   
    }
   
   
   
    function view_admission_histroy(admission_id=''){
   
     $('.edit_btn').hide();
   
     $("aside").addClass('right_show');
   
     $('.main_content').addClass('right_show');
   
     $('.right_side').addClass('right_show');
   
     $('.plus_button').removeClass('create_new_lead');
   
     $('.edit_btn').hide();
   
     $('.remark_btn').hide();
   
     $('#basic_info').hide();
   
     $('.show_btn').hide();
   
     $('.show_upd_course').hide();
   
     $('#basic_info_two').hide();
   
     $('.edit_course_btn').hide();
   
     $('#first_second_right_side').hide(); 
   
     $('#first_third_right_side').hide();
   
     $('#remarks_box').hide();
   
     $('#first_forth_right_side').hide();
   
     $('#co_section_hidden').hide();
   
     $('#admission_Cancellation').hide();
   
     $('#admission_termination').hide();
   
     $('#admission_hold').hide();
   
     $('#change_adm_status').html("Admission Histroy");
   
     $('#change_status_details').html("Admission Histroy");
   
     $('#admission_sms_template').hide();
   
     $('.sms_template_view').hide();
   
     $('#lead_list_email_template').hide();
   
     $('.email_template_view').hide();
   
      $.ajax({
   
        url : "<?php echo base_url(); ?>AddmissionController/ajax_get_histroy_record",
   
        type:"post",
   
        data:{
   
          'admission_id':admission_id 
   
        },
   
        success:function(Resp){
   
         $('#adm_histroy').show();
   
          $('#adm_histroy').html(Resp);
   
         
   
        }
   
      });
   
    }
   
   
   
   function getAdmissionData(fornumberData)
   {
   
     var dd = "multic"+fornumberData;
   
    var multic  = $('#'+dd).val();
   
    alert(multic);
   
     $.ajax({
   
      url:"<?php echo base_url(); ?>AddmissionController/get_multi_adm_course",
   
      method:"POST",
   
      data:{ 'multic' : multic },
   
      success:function(res)
   
      { 
   
           var data = $.parseJSON(res);
   
          //console.log(data);
   
           var adm = data.record['adm_get_record'].admission_id;
   
           var admissionId  = "adm_id"+fornumberData;
   
           $('#'+admissionId).html('<a href="#" class="dropdown-item"  onclick="return course_edit_admission('+adm+')"><i class="fas fa-pen-square" ></i>Upgrade course</a>');
   
   
           var ah = data.record['adm_get_record'].admission_id;
   
           var admissionhold_Id  = "ah_id"+fornumberData;
   
           $('#'+admissionhold_Id).html('<a href="#" class="dropdown-item create_new_lead" onclick="return hold_admission('+ah+');"><i class="fas fa-share-square"></i>Admission Hold</a>');
   
           var ahistrory = data.record['adm_get_record'].admission_id;
   
           var admissionhistroyId  = "a_histroy_id"+fornumberData;
   
           $('#'+admissionhistroyId).html('<a href="#" class="dropdown-item create_new_lead" onclick="return view_admission_histroy('+ahistrory+');"><i class="fas fa-share-square"></i>View Histroy</a>');
   
           var at = data.record['adm_get_record'].admission_id;
   
           var admitId  = "at_id"+fornumberData;
   
           $('#'+admitId).html('<a  class="btn btn-warning click_btn text-light" onclick="return admission_terminated('+at+');">Mark Terminate</a>');
   
           var ac = data.record['adm_get_record'].admission_id;
   
           var admicId  = "ac_id"+fornumberData;
   
           $('#'+admicId).html('<a  class="btn btn-warning click_btn text-light" onclick="return Cancellation_admission('+ac+');">Cancel Admission</a>');
   
           var b = data.record['adm_get_record'].branch_name;
   
           var branchId  = "b_id"+fornumberData;
   
           $('#'+branchId).html(b);
   
           var d = data.record['adm_get_record'].department_name;
   
           var departmentId  = "d_id"+fornumberData;
   
           $('#'+departmentId).html(d);
   
           var packageType = data.record['adm_get_record'].type;
   
           if(packageType == 'package')
           {
   
              var c = data.record['adm_get_record'].package_name;
   
              var a = data.record['adm_get_record'].admission_id;
   
              var courseId  = "c_id"+fornumberData;
   
             $('#'+courseId).html('<a href="#" class="lead_info_text lead_student_info_copy" onclick="return courses_orpackages('+a+');">'+"Package : "+c+'</a>');
   
           }
           else
           {
             var c = data.record['adm_get_record'].course_name;
   
             var a = data.record['adm_get_record'].admission_id;
   
             var courseId  = "c_id"+fornumberData;
   
             $('#'+courseId).html('<a href="#" class="lead_info_text lead_student_info_copy" onclick="return courses_orpackages('+a+');">'+"Single : "+c+'</a>');
   
           }
   
           var tf = data.record['adm_get_record'].tuation_fees;
   
           var a_Id = data.record['adm_get_record'].admission_id;
   
           var tfId  = "tf_id"+fornumberData;
   
           $('#'+tfId).html('<a href="#" class="lead_info_text lead_student_info_copy"  onclick="return admission_payment('+a_Id+');">'+tf+'</a>');
   
           var rf = data.record['adm_get_record'].registration_fees;
   
           var rfId  = "rf_id"+fornumberData;
   
           $('#'+rfId).html(rf);
   
           var y = data.record['adm_get_record'].year;
   
           var yearId  = "year_id"+fornumberData;
   
           $('#'+yearId).html(y);
   
           var adDate = data.record['adm_get_record'].admission_date;
   
           var admDateId  = "date_id"+fornumberData;
   
           $('#'+admDateId).html(adDate);
      }
   
   
     });
   
   }
   
</script>
<!-- <script>
   function get_course_package(course)
   
   {
   
      // alert(course);
   
      $.ajax({
   
         url : "<?php echo base_url() ?>AddmissionController/get_course_package_single",
   
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
   
   
   
   </script> -->
<script type="text/javascript">
   $('#update_adm_details').on('click',function(){
   
         var update_id = $('#update_id').val();
   
         var first_name = $('#first_name').val();
   
         var surname = $('#surname').val();
   
         var email = $('#email').val();
   
         var mobile_no = $('#mobile_no').val();
   
         var branch_id = $('#branch_id').val();
   
         
   
         $.ajax({
   
             type : "POST",
   
             url  : "<?php echo base_url()?>AddmissionController/upd_admission_basic",
   
             dataType : "JSON",
   
             data : {'admission_id' : update_id , 'first_name' : first_name ,'surname' : surname ,'email' : email ,'mobile_no' : mobile_no ,'branch_id' : branch_id },
   
             success: function(data){
   
               // $('#exampleModal').modal().hide();
   
               //$("#admission_id").val("");
   
               //$("#update_id").val("");
   
   
   
               alert('Are You Sure This Details Updated');
   
             }
   
         });
   
         return false;
   
     });
   
</script>
<script type="text/javascript">
   $('#upd_course').on('click',function(){
   
         var upd_id = $('#upd_id').val();
   
         var branch_ids = $('#branch_ids').val();
   
         var session = $('#session').val();  
   
        var type = $('input[name="type"]:checked').val();
   
         var course_orpackage = $('#course_orpackage').val();
   
         var course_orsingle = $('#course_orsingle').val();
   
         var faculty_id = $('#faculty_id').val();
   
         var batch_id = $('#batch_id').val();
   
         
   
         $.ajax({
   
             type : "POST",
   
             url  : "<?php echo base_url()?>AddmissionController/upd_admission_cp",
   
             dataType : "JSON",
   
             data : {'admission_id' : upd_id ,  'branch_ids' : branch_ids , 'year' : session , 'type' : type ,  'package_id' : course_orpackage , 'course_id' : course_orsingle , 'faculty_id' : faculty_id , 'batch_id' : batch_id },
   
             success: function(data){
   
               // $('#exampleModal').modal().hide();
   
               //$("#admission_id").val("");
   
               //$("#update_id").val("");
   
   
   
               alert('Are You Sure This Course Updated');
   
             }
   
         });
   
         return false;
   
     });
   
</script>
<script type="text/javascript">
   $(function() {
   
      $('[data-toggle="remark"]').hover(function() {
   
       var modalId = $(this).data('target');
   
       $(modalId).modal('show');
   
     });
   
   });
   
</script>