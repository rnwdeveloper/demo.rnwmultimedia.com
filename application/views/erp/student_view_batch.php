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
<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<link rel="stylesheet"
   href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<style type="text/css">
   .img-responsive {
   display: block;
   max-width: 100%;
   height: auto;
   }
   .form {
   border: 0;
   }
</style>
<div class="loader"></div>
<div id="app">
   <div class="main-wrapper main-wrapper-1">
      <div class="main-content">
         <section class="section">
            <div class="section-body">
               <div class="row">
                  <div class="col-12 d-flex justify-content-between">
                     <h6 class="page-title text-dark mb-3">Student Batch List</h6>
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item"><a href="#">Library</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header d-flex justify-content-between income-wrapper">
                           <div class="d-flex justify-content-between">
                           </div>
                           <div class="table-right-content">
                              <button class="btn btn-success" data-toggle="modal"
                                 data-target=".bd-example-modal-lg"
                                 onclick="return get_shiningsheet_record(<?php echo $batches->subcourse_id; ?>,<?php echo $batches->faculty_id; ?>,<?php echo $batches->batches_id; ?>)">
                              <i class="fas fa-book" data-toggle="tooltip" data-placement="bottom"
                                 title="ShiningSheet"></i>
                              </button>
                              <button class="btn btn-info" data-toggle="modal"
                                 data-target=".bd-example-modal-sm-2">
                              <i class="fas fa-check-circle" data-toggle="tooltip" data-placement="bottom"
                                 title="Multiple Bacth Completed Status"> </i>
                              </button>
                              <button class="btn btn-primary" data-toggle="modal"
                                 data-target=".multiple_student_attendance">
                              <i class="fas fa-allergies" data-toggle="tooltip" data-placement="bottom"
                                 title="Tack Multiple Student Attendance"></i>
                              </button>
                              <button class="btn btn-danger" data-toggle="modal"
                                 data-target=".bd-example-modal-lg-2"
                                 onclick="return extra_batch_add(<?php echo $batches->batches_id; ?>,<?php echo $batches->subcourse_id; ?>)">
                              <i class="fas fa-ban" data-toggle="tooltip" data-placement="bottom"
                                 title="Not Assigned Batch"></i>
                              </button>
                              <button class="btn btn-warning" data-toggle="modal"
                                 data-target=".bd-example-modal-lg-3"
                                 onclick="return pending_batch_add(<?php echo $batches->batches_id; ?>,<?php echo $batches->subcourse_id; ?>)">
                              <i class="fas fa-plus" data-toggle="tooltip" data-placement="bottom"
                                 title="Pending Batch"> </i>
                              </button>
                              <button class="btn btn-info mr-1" tabindex="0" aria-controls="tableExport" id="btnExporttoExcel"><span data-toggle="tooltip" data-placement="bottom" title="Excel"><i class="far fa-file-excel mr-1"></i></span></button>
                              <a href="<?php echo base_url(); ?>Admission/erpbatch"
                                 class="btn text-dark pl-2">
                              <span><i class="fas fa-arrow-left mr-1"></i> Back</span>
                              </a>
                           </div>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table table-striped normal-table" id="table1">
                                 <thead>
                                    <tr class="text-center">
                                       <th class="p-2">
                                          <div
                                             class="custom-checkbox custom-checkbox-table custom-control">
                                             <input type="checkbox" data-checkboxes="mygroup"
                                                data-checkbox-role="dad" class="custom-control-input"
                                                id="checkbox-all">
                                             <label for="checkbox-all"
                                                class="custom-control-label">&nbsp;</label>
                                          </div>
                                       </th>
                                       <th>SN</th>
                                       <th>GR ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Course</th>
                                       <th>Batch</th>
                                       <th>Running Software</th>
                                       <th>Total Fees</th>
                                       <th>Pending Fees</th>
                                       <th>Pay</th>
                                       <th>Status</th>
                                       <th>Joining Date</th>
                                       <th>Attendance</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $sno = 1;
                                       foreach ($get_batch as $val) { if($val->without_fees_modifive=="0") {
                                         if ($val->admission_courses_status == "Ongoing") { ?>
                                    <tr class="text-center">
                                       <td>
                                          <div class="custom-checkbox custom-control">
                                             <input type="checkbox" data-checkboxes="mygroup"
                                                class="custom-control-input"
                                                id="checkboxr-<?php echo $sno; ?>"
                                                name="admission_coursesids"
                                                value="<?php echo $val->admission_courses_id; ?>">
                                             <label for="checkboxr-<?php echo $sno; ?>"
                                                class="custom-control-label">&nbsp;</label>
                                          </div>
                                       </td>
                                       <td>
                                          <?php echo $sno; ?>
                                       </td>
                                       <td data-toggle="tooltip" data-placement="bottom" title="
                                          <?php $admids = explode(" ,", $val->admission_id);
                                             foreach ($Admission_record as $ad) {
                                             if (in_array($ad->admission_id, $admids)) {
                                             echo "(".$ad->first_name." ".$ad->surname.")";
                                             if($ad->type=="single")
                                             {
                                             $coids = explode(",", $ad->course_id);
                                             foreach ($list_course as $row) {
                                             if (in_array($row->subcourse_id, $coids)) {
                                             echo " ("."S :- ".$row->subcourse_name.")";
                                             }
                                             }
                                             }
                                             else if($ad->type=="package")
                                             {
                                             $paids = explode(",", $ad->package_id);
                                             foreach ($list_package as $row) {
                                             if (in_array($row->package_id, $paids)) {
                                             echo " ("."P :- ".$row->package_name.")";
                                             }
                                             }
                                             } else {
                                             $clgids = explode(",", $ad->college_courses_id);
                                             foreach ($list_college_courses as $row) {
                                             if (in_array($row->college_courses_id, $clgids)) {
                                             echo " ("."Clg :- ".$row->college_course_name.")";
                                             }
                                             }
                                             }
                                             } } ?>
                                          ">
                                          <?php echo $val->gr_id; ?>
                                       </td>
                                       <td>
                                          <?php echo $val->first_name; ?>
                                          <?php echo $val->surname; ?>
                                       </td>
                                       <td>
                                          <?php echo $val->email; ?>
                                       </td>
                                       <td>
                                          <?php $branch_ids = explode(",", $val->courses_id);
                                             foreach ($list_course as $row) {
                                               if (in_array($row->subcourse_id, $branch_ids)) {
                                                 echo $row->subcourse_name;
                                               }
                                             } ?>
                                          <?php $clgids = explode(",", $val->college_courses_id);
                                             foreach ($list_college_courses as $row) {
                                               if (in_array($row->college_courses_id, $clgids)) {
                                                 echo $row->college_course_name;
                                               }
                                             } ?>
                                       </td>
                                       <td>
                                       <?php $batchids = explode(" ,", $val->batch_id);
                                             foreach ($list_batches as $ab) {
                                             if (in_array($ab->batches_id, $batchids)) {
                                                 echo $ab->batch_name;
                                             } } ?>
                                       </td>
                                       <td> 
                                       <?php $amid = explode(" ,", $val->admission_id);
                                             foreach ($list_admission_courses as $lco) {
                                             if (in_array($lco->admission_id, $amid)) {
                                                 if($lco->admission_courses_status == "Ongoing"){
                                                   $lcoids = explode(" ,", $lco->courses_id);
                                                   foreach ($list_course as $k){
                                                      if (in_array($k->subcourse_id, $lcoids)) {
                                                         echo $k->subcourse_name.", ";
                                                      } 
                                                   }
                                            } } } ?>
                                       </td>
                                       <td>
                                       <?php $admids = explode(" ,", $val->admission_id);
                                             foreach ($Admission_record as $ad) {
                                             if (in_array($ad->admission_id, $admids)) {
                                             echo $ad->tuation_fees;
                                             } } ?>
                                       </td>
                                       <td>
                                          <?php 
                                                $this->db->select('SUM(due_amount) as amount');
                                                $this->db->from('admission_installment');
                                                $this->db->where('admission_id', $val->admission_id);
                                                $this->db->where("paid_amount" ," ");
                                                $query = $this->db->get(); 
                                                $this->db->select('SUM(paid_amount) as amounte');
                                                $this->db->from('admission_installment');
                                                $this->db->where('admission_id', $val->admission_id);
                                                $query1 = $this->db->get(); 
                                                //print_r($query->result());
                                                foreach ($query->result() as $key => $value) {
                                                   foreach ($query1->result() as $key => $valu) {
                                                      foreach($Admission_record as $row){ 
                                                         if($val->admission_id == $row->admission_id){ ?>
                                                            <?php 
                                                               if($value->amount != '') { ?> 
                                                                  <button class='btn btn-sm btn-red' onclick="return get_installment(<?php echo $val->admission_id; ?>);" data-toggle="tooltip" data-placement="bottom" title="Pending Fees"><?php echo $value->amount; ?></button>
                                                               <?php }else{ ?>
                                                                  <button class='btn btn-sm btn-success' onclick="return get_installment(<?php echo $val->admission_id; ?>);" data-toggle="tooltip" data-placement="bottom" title="Complete Fees"><?php echo $row->tuation_fees; ?></button>
                                                               <?php }
                                                            ?>
                                                              <?php
                                                         }
                                                      }
                                                   }
                                                }
                                           ?>
                                       </td>
                                       <td>
                                         <?php 
                                           $this->db->select('SUM(paid_amount) as amounte');
                                           $this->db->from('admission_installment');
                                           $this->db->where('admission_id', $val->admission_id);
                                           $payable = $this->db->get(); 
                                           foreach ($payable->result() as $key => $valu) {
                                             foreach($Admission_record as $row){ 
                                                if($val->admission_id == $row->admission_id){
                                                   echo $valu->amounte;
                                                } } }
                                         ?>
                                       </td>
                                       <td>
                                          <?php echo $val->admission_courses_status; ?>
                                       </td>
                                       <td>
                                       <?php $admids = explode(" ,", $val->admission_id);
                                             foreach ($Admission_record as $ad) {
                                             if (in_array($ad->admission_id, $admids)) {
                                                 echo date('d-M-Y',strtotime($ad->admission_date))." ".$ad->admission_time;
                                             } } ?>
                                       </td>
                                       <td>
                                          <button type="button" class="btn btn-sm btn-success"
                                             data-toggle="modal" data-target=".single_stu_attendance"
                                             onclick="return Tack_single_student_attendance(<?php echo $val->admission_courses_id; ?>,<?php echo  @$val->admission_id; ?>)">
                                          <i class="fas fa-allergies" data-toggle="tooltip"
                                             data-placement="bottom"
                                             title="Tack Single Student Attendance"></i>
                                          </button>
                                          <button type="button" class="btn btn-sm btn-warning"
                                             data-toggle="modal" data-target=".view-attendance"
                                             onclick="return view_attendance(<?php echo $val->admission_id; ?>)">
                                          <i class="fa fa-hand-paper-o" data-toggle="tooltip"
                                             data-placement="bottom" title="Attendance From Punch"></i>
                                          </button>
                                          <button type="button" class="btn btn-sm btn-info"
                                             data-toggle="modal" data-target=".show-attendance"
                                             onclick="return show_attendance(<?php echo $val->admission_courses_id; ?>)">
                                          <i class="fas fa-eye" data-toggle="tooltip"
                                             data-placement="bottom" title="Attendance From Batch"></i>
                                          </button>
                                       </td>
                                       <td>
                                          <div class="dropdown">
                                             <a href="#" data-toggle="dropdown"
                                                class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                                             <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item has-icon"
                                                   data-toggle="modal"
                                                   data-target=".bd-example-modal-sm"
                                                   onclick="return batch_completed_status(<?php echo $val->admission_courses_id; ?>,<?php echo  @$val->admission_id; ?>)"><i
                                                   class="fas fa-check-circle"></i> Course
                                                Completed Status</a>
                                                <a href="#"
                                                   class="dropdown-item has-icon text-danger"><i
                                                   class="far fa-trash-alt"></i>
                                                Delete</a>
                                             </div>
                                          </div>
                                       </td>
                                    </tr>
                                    <?php $sno++;
                                       }
                                       } }?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </section>
         </div>
      </div>
   </div>
   <!-- shining sheeet modal -->
   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-dark" id="myLargeModalLabel"><b>Shining Sheet</b></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body" id="get_shiningsheet">
               <div id="shiningsheet_msg"></div>
            </div>
         </div>
      </div>
   </div>
   <!-- not assigned batch list student modal -->
   <div class="modal fade bd-example-modal-lg-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <!-- <div class="modal-header">
               <h5 class="modal-title" id="myLargeModalLabel"><b>Not Assigned Batch</b></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
               </div> -->
            <div class="modal-body" id="get_data">
            </div>
         </div>
      </div>
   </div>
   <!-- not assigned batch list student modal -->
   <div class="modal fade bd-example-modal-lg-3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <!-- <div class="modal-header">
               <h5 class="modal-title" id="myLargeModalLabel"><b>Not Assigned Batch</b></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
               </div> -->
            <div class="modal-body" id="get_data_pending">
            </div>
         </div>
      </div>
   </div>
   <!-- Single Student Attendance -->
   <div class="modal fade single_stu_attendance" tabindex="-1" role="dialog" aria-labelledby="formModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-dark" id="formModal">Tack Single Student Attendance</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body" id="single_student_attendance_data">
            </div>
         </div>
      </div>
   </div>
   <!-- multiple Student Attendance -->
   <div class="modal fade multiple_student_attendance" tabindex="-1" role="dialog" aria-labelledby="formModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-dark" id="formModal">Tack Multiple Student Attendance</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div id="multiple_attendance_msg"></div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label>Attendance Date</label>
                     <!-- <input type="date" class="form-control" id="attendance_date_multiple" value=""> -->
                     <input type="text" id="attendance_date_multiple" class="form-control form-control-sm"
                        value="" />
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputPassword4">Attendance Time From</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <i class="far fa-clock"></i>
                           </div>
                        </div>
                        <input type="text" datetime="hour" class="form-control timepicker"
                           id="attendance_time_multiple_from" value="">
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputPassword4">Attendance Time To</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <i class="far fa-clock"></i>
                           </div>
                        </div>
                        <input type="text" datetime="hour" class="form-control timepicker"
                           id="attendance_time_multiple_to" value="">
                     </div>
                  </div>
                  <div class="form-group col-md-3">
                     <label class="d-block">Attendance</label>
                     <div class="pretty p-icon p-jelly p-round p-bigger">
                        <input type="radio" id="customRadioInline1" name="attendance_type_multiple"
                           class="custom-control-input" value="P">
                        <div class="state p-info">
                           <i class="icon material-icons">done</i>
                           <label>P</label>
                        </div>
                     </div>
                     <div class="pretty p-icon p-jelly p-round p-bigger">
                        <input type="radio" id="customRadioInline2" name="attendance_type_multiple"
                           class="custom-control-input" value="A">
                        <div class="state p-info">
                           <i class="icon material-icons">done</i>
                           <label>A</label>
                        </div>
                     </div>
                     <div class="pretty p-icon p-jelly p-round p-bigger">
                        <input type="radio" id="customRadioInline2" name="attendance_type_multiple"
                           class="custom-control-input" value="L">
                        <div class="state p-info">
                           <i class="icon material-icons">done</i>
                           <label>L</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputPassword4">Common Comments</label>
                     <textarea class="form-control" name="remarks" id="remarks_multiple" required></textarea>
                  </div>
               </div>
               <button class="btn btn-primary" type="submit" id="multiple_attendance_submit">Submit</button>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Batch Completed Status Signle Student -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="mySmallModalLabel">Single Bacth Completed Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="batch_completed_data">
         </div>
      </div>
   </div>
</div>
<!-- Batch Completed Status Multiple Student -->
<div class="modal fade bd-example-modal-sm-2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="mySmallModalLabel">Multiple Bacth Completed Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="multiple_btach_status_msg"></div>
            <div class="form-row">
               <div class="form-group col-md-12">
                  <label>Batch Status</label>
                  <select class="form-control" id="admission_courses_status_multiple">
                     <option value="Completed" <?php echo "selected" ; ?>>Completed</option>
                     <option value="Ongoing">Ongoing</option>
                     <option value="Pending">Pending</option>
                     <option value="Hold">Hold</option>
                     <option value="Not Assigned">Not Assigned</option>
                  </select>
               </div>
               <div class="form-group col-md-12">
                  <label for="inputPassword4">Common Comments</label>
                  <textarea class="form-control" name="remarks" id="comments_multiple" required></textarea>
               </div>
            </div>
            <button class="btn btn-primary" type="submit" id="multiple_status_data">Submit</button>
         </div>
      </div>
   </div>
</div>
<!-- View Attendance -->
<div class="modal fade view-attendance" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="myLargeModalLabel">View Attendance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="attendance_view_data">
         </div>
      </div>
   </div>
</div>
<!-- show Attendance -->
<div class="modal fade show-attendance" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="myLargeModalLabel">Show Attendance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="attendance_show_data">
         </div>
      </div>
   </div>
</div>
<!-- General JS Scripts -->
<div class="modal fade get_installments" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="myLargeModalLabel">View Installment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="install_student">
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script
   src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/table2excel.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
<!-- <script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script> -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script type="text/javascript">    
 $(".kkeditor").hide();
      $(function () {    
          $("#btnExporttoExcel").click(function () {    
              $("#table1").table2excel({    
                  filename: "batch-data.xls"    
              });    
          });    
      });    
</script> 
<script>
   var picker = new Lightpick({
       field: document.getElementById('attendance_date_multiple'),
       onSelect: function (date) {
           document.getElementById('result-1').innerHTML = date.format('Do MMMM YYYY');
   
       }
   });
</script>
<script>
   function get_shiningsheet_record(subcourse_id = '', faculty_id = '', batches_id = '') {
       $.ajax({
           url: "<?php echo base_url(); ?>AddmissionController/ajax_shiningsheet_data_all_student_wise",
           type: "post",
           data: {
               'subcourse_id': subcourse_id,
               'faculty_id': faculty_id,
               'batches_id': batches_id
           },
           success: function (Resp) {
               $('#get_shiningsheet').html(Resp);
           }
       });
   }
   
   var count = 1;
   
   function selectAllData() {
       if (count == 1) {
           $('#selectall').html('Email');
           count = 0;
       } else {
           count = 1;
           $('#selectall').html('SelectALL');
       }
   }
   
   
   $("#checkAll").click(function () {
       $('input:checkbox').not(this).prop('checked', this.checked);
   });
</script>
<script>
   function extra_batch_add(batches_id = '', subcourse_id = '') {
       $.ajax({
           url: "<?php echo base_url(); ?>Admission/get_not_assigned_batch",
           type: "post",
           data: {
               'batches_id': batches_id,
               'subcourse_id': subcourse_id
           },
           success: function (Response) {
               $('#get_data').html(Response);
           }
       });
   }
</script>
<script>
   function pending_batch_add(batches_id = '', subcourse_id = '') {
       $.ajax({
           url: "<?php echo base_url(); ?>Admission/get_pending_batch_student",
           type: "post",
           data: {
               'batches_id': batches_id,
               'subcourse_id': subcourse_id
           },
           success: function (Response) {
               $('#get_data_pending').html(Response);
           }
       });
   }
</script>
<script>
   function Tack_single_student_attendance(admission_courses_id = '', admission_id = '') {
       $.ajax({
           url: "<?php echo base_url(); ?>Admission/tack_single_student_attendance",
           type: "post",
           data: {
               'admission_courses_id': admission_courses_id,
               'admission_id': admission_id
           },
           success: function (Response) {
               $('#single_student_attendance_data').html(Response);
           }
       });
   }
</script>
<script>
   function batch_completed_status(admission_courses_id = '', admission_id = '') {
       $.ajax({
           url: "<?php echo base_url(); ?>Admission/single_batch_completed",
           type: "post",
           data: {
               'admission_courses_id': admission_courses_id,
               'admission_id': admission_id
           },
           success: function (Response) {
               $('#batch_completed_data').html(Response);
           }
       });
   }
</script>
<script>
   function view_attendance(admission_id = '') {
       $.ajax({
           //url: "<?php echo base_url(); ?>Admission/view_attendance",
           url: "<?php echo base_url(); ?>Qrimages/view_attendance",
           type: "post",
           data: {
               'admission_id': admission_id
           },
           success: function (Response) {
               $('#attendance_view_data').html(Response);
           }
       });
   }
</script>
<script>
   function show_attendance(admission_courses_id = '') {
       $.ajax({
           url: "<?php echo base_url(); ?>Admission/show_attendance",
           type: "post",
           data: {
               'admission_courses_id': admission_courses_id
           },
           success: function (Response) {
               $('#attendance_show_data').html(Response);
           }
       });
   }
</script>
<script>
   $('#multiple_attendance_submit').on('click', function () {
   
       var admission_coursesids = [];
   
       $('input[name=admission_coursesids]:checked').map(function () {
           admission_coursesids.push($(this).val());
       });
       var attendance_date_multiple = $('#attendance_date_multiple').val();
       var attendance_time_multiple_from = $('#attendance_time_multiple_from').val();
       var attendance_time_multiple_to = $('#attendance_time_multiple_to').val();
       var attendance_type_multiple = $('input[name="attendance_type_multiple"]:checked').val();
       var remarks_multiple = $('#remarks_multiple').val();
   
       $.ajax({
           type: "POST",
           url: "<?php echo base_url() ?>Admission/multiple_student_wise_attendance",
           data: {
               'admission_courses_id': admission_coursesids,
               'attendance_date': attendance_date_multiple,
               'attendance_time_multiple_from': attendance_time_multiple_from,
               'attendance_time_multiple_to': attendance_time_multiple_to,
               'attendance_type': attendance_type_multiple,
               'remarks': remarks_multiple
           },
           success: function (resp) {
               var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if (ddd == '1') {
                   $('#multiple_attendance_msg').html(iziToast.success({
                       title: 'Success',
                       timeout: 2500,
                       message: 'Today Your All Student Attendance Done.',
                       position: 'topRight'
                   }));
                   setTimeout(function () {
                       location.reload();
                   }, 2520);
               } else if (ddd == '2') {
                   $('#multiple_attendance_msg').html(iziToast.error({
                       title: 'Canceled!',
                       timeout: 2500,
                       message: 'Someting Wrong!!',
                       position: 'topRight'
                   }));
                   setTimeout(function () {
                       location.reload();
                   }, 2520);
               }
           }
       });
       return false;
   });
</script>
<script>
   $('#multiple_status_data').on('click', function () {
   
       var admission_coursesids = [];
   
       $('input[name=admission_coursesids]:checked').map(function () {
           admission_coursesids.push($(this).val());
       });
       var admission_courses_status_multiple = $('#admission_courses_status_multiple').val();
       var comments_multiple = $('#comments_multiple').val();
   
       $.ajax({
           type: "POST",
           url: "<?php echo base_url() ?>Admission/multiple_batch_status_course_completed",
           data: {
               'admission_courses_id': admission_coursesids,
               'admission_courses_status': admission_courses_status_multiple,
               'remarks': comments_multiple
           },
           success: function (resp) {
               var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if (ddd == '1') {
                   $('#multiple_btach_status_msg').html(iziToast.success({
                       title: 'Success',
                       timeout: 2500,
                       message: 'Multiple Course Completed!',
                       position: 'topRight'
                   }));
   
                   setTimeout(function () {
                       location.reload();
                   }, 2520);
               } else if (ddd == '2') {
                   $('#multiple_btach_status_msg').html(iziToast.error({
                       title: 'Canceled!',
                       timeout: 2500,
                       message: 'Someting Wrong!!',
                       position: 'topRight'
                   }));
   
                   setTimeout(function () {
                       location.reload();
                   }, 2520);
               }
           }
       });
       return false;
   });
   
   function assigned_multistudent(shining_sheet_id = '') {
       var admission_courses_id = [];
   
       $('input[name=admission_coursesids]:checked').map(function () {
           admission_courses_id.push($(this).val());
       });
       $.ajax({
           url: "<?php echo base_url(); ?>Admission/Assigned_MultiTopic",
           type: "post",
           data: {
               'shining_sheet_id': shining_sheet_id, 'admission_courses_id': admission_courses_id
           },
           success: function (resp) {
               var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if (ddd == '1') {
                   $('#shiningsheet_msg').html(iziToast.success({
                       title: 'Success',
                       timeout: 2500,
                       message: 'This Topic Assigned',
                       position: 'topRight'
                   }));
   
                   setTimeout(function () {
                       location.reload();
                   }, 2520);
   
               }
               else if (ddd == '2') {
   
                   $('#shiningsheet_msg').html(iziToast.error({
                       title: 'Canceled!',
                       timeout: 2500,
                       message: 'Someting Wrong!!',
                       position: 'topRight'
                   }));
   
                   setTimeout(function () {
                       location.reload();
                   }, 2520);
               }
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
           success: function (Resp) {
   
               setTimeout(function () {
                   location.reload();
               }, 500);
           }
       });
   }
   
   $(function () {
       $('#table1').DataTable({
           stateSave: true,
           "bDestroy": true
       })
   });






   function get_installment(admission_id = "")
{  
   $(".get_installments").modal();
   $.ajax({
           url: "<?php echo base_url(); ?>Admission/get_student_installments",
           type: "post",
           data: {
               'admission_id': admission_id
           },
           success: function(Response) {
               $('#install_student').html(Response);
           }
       });
}
</script>
</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>