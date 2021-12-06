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

                          <select class="form-control" id="multic<?php echo $mk; ?>" onchange="return getAdmissionData(<?php echo $mk; ?>)" style="height: 26px; width:115px; padding:3px 6px; line-height:1; font-size:12px; display:inline;">                 

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

                      <p class="lead_info_text" id="d_id<?php echo $mk; ?>"><?php $depertids = explode(",",$adm->department_id);

                        foreach($list_department as $row) { if(in_array($row->department_id,$depertids)) {  echo $row->department_name; }  } ?>

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

                      <div id="tf_id<?php echo $mk; ?>">

                      <a href="#" title="<?php echo $adm->tuation_fees; ?>" class="lead_info_text lead_student_info_copy" onclick="return admission_payment(<?php echo $adm->admission_id; ?>);"><?php echo $adm->tuation_fees; ?></a>

                      </div>                     

                      </li>

                       <li>

                      <span class="lead_info_title">EnrollmentNo</span>

                        <p class="lead_info_text" id="enrollmentno_data<?php echo $mk; ?>"><?php echo $adm->enrollment_number; ?></p>

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

                      <span class="lead_info_title">Admission Date</span>

                      <p class="lead_info_text" id="date_id<?php echo $mk; ?>"><?php echo $adm->admission_date; ?></p>

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

                            <?php if($adm->tuation_fees==$val->paid_amount) { ?>

                                <span class="fully-paid bg-success"></span>

                            <?php } else { ?>

                               <span class="un-paid bg-danger"></span>

                            <?php  } } ?>

                      </p>

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

                              <li  id="withoutfees_updadm_id<?php echo $mk; ?>"><a href="#" class="dropdown-item"  onclick="return upgarede_course_without_fees_modification(<?php echo $adm->admission_id; ?>)"><i class="fas fa-pen-square" ></i>Upgrade course <br>(without Fess Modification)</a></li>

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

            <?php   $mk++; } } ?>

          </div>
