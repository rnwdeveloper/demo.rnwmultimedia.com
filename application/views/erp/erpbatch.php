<?php  $all_per = explode(',',$_SESSION['p_permission']);  ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<div class="loader"></div>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
      <div class="extra_lead_menu">
      <section class="section">
        <div class="section-body">
          <div class="row">
            <div class="col-12 d-flex justify-content-between">
              <h6 class="page-title text-dark mb-3">Faculty Batch List</h6>
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
              <div class="card-header">
                  <h4>Batches</h4>
                  <div class="card-header-action">
                    <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Batch Report") { ?>
                  <a href="#" class="btn btn-info" data-toggle="modal" data-target=".batch_report">
                      <span data-toggle="tooltip" data-placement="bottom" title="Batch Record"><i class="fas fa-clipboard-list mr-1 text-white"></i></span>
                    </a>
                  <?php } } ?>
                  <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Completed batch list") { ?>
                    <div class="dropdown">
                      <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle text-white">Task</a>
                      <div class="dropdown-menu">
                        <a href="<?php echo base_url(); ?>Admission/AllCompleted_BatchList" class="dropdown-item has-icon text-dark" ><i class="fas fa-th-list"></i>
                         Completed Batch List</a>
                      </div>
                    </div>
                  <?php } } ?>
                  <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Create Batch") { ?>
                    <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target="#batchcreate" data-placement="bottom" title="Create Batch">
                      <span data-toggle="tooltip" data-placement="bottom" title="Create Batch"><i class="fas fa-plus mr-1 text-white"></i></span>
                    </a>
                  <?php } }?>
                    <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".bd-example-modal-lg">
                      <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i class="fas fa-filter mr-1 text-white"></i></span>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped normal-table" id="table1">
                      <thead>
                        <tr>
                          <th>SN</th>
                          <th>Btach Name</th>
                          <th>Batch Code</th>
                          <th>Branch</th>
                          <th>Faculty</th>
                          <th>Course</th>
                          <th>View Batch</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $sno = 1;
                        foreach ($list_all_batches as $lb) { ?>
                          <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $lb->batch_name ?></td>
                            <td><?php echo $lb->batch_code ?></td>
                            <td>
                              <?php $branch_ids = explode(",", $lb->branch_id);
                              foreach ($list_branch as $ba) {
                                if (in_array($ba->branch_id, $branch_ids)) {
                                  echo $ba->branch_code;
                                }
                              } ?>
                            </td>
                            <td>
                              <?php $userids = explode(",", $lb->faculty_id);
                              foreach ($list_user as $un) {
                                if(in_array($un->user_id, $userids)) {
                                  echo $un->name;
                                }
                              } ?>
                            </td>
                            <td>
                              <?php
                              foreach ($list_subcourse as $lc) {
                                if ($lb->subcourse_id == $lc->subcourse_id) {
                                  echo $lc->subcourse_name;
                                }
                              }
                              ?>
                              <?php
                              foreach ($list_college_courses as $lc) {
                                if ($lb->college_courses_id == $lc->college_courses_id) {
                                  echo $lc->college_course_name;
                                }
                              }
                              ?>
                            </td>
                            <td class="view-batch-action">
                             <?php if($lb->overdue_status != "Overdue" ) { ?>
                                <a href="<?php echo base_url(); ?>Admission/student_view_batch?action=stub&ongo=<?php echo $lb->batches_id; ?>" class="bg-info action-icon text-white btn-info" data-toggle="tooltip" data-placement="left" title="Onoging Batch View"><?php if(!empty($lb->ongoing)){ $reco = array(); for($i=0; $i<sizeof($Admission_wise_courses); $i++){ if($Admission_wise_courses[$i]->batch_id==$lb->batches_id && $Admission_wise_courses[$i]->admission_courses_status=="Ongoing") { $reco[] = $Admission_wise_courses[$i]->batch_id;
                                 } } print_r(count($reco)); } else { echo  "0";} ?></a>
                                <a href="<?php echo base_url(); ?>Admission/stuCompleted_ViewBatch?action=stub&compli=<?php echo $lb->batches_id; ?>" class="bg-success action-icon text-white btn-success" data-toggle="tooltip" data-placement="right" title="Completed Batch View"><?php if(!empty($lb->completed)){ $comreco = array(); for($j=0; $j<sizeof($Admission_wise_courses); $j++){ if($Admission_wise_courses[$j]->batch_id==$lb->batches_id && $Admission_wise_courses[$j]->admission_courses_status=="Completed") { $comreco[] = $Admission_wise_courses[$j]->batch_id;
                                 } } print_r(count($comreco)); } else { echo  "0";} ?></a>
                              <?php } ?>
                                </td>
                            <td>
                              <?php if($lb->overdue_status == "Overdue" ) { ?> 

                              <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target=".ReAssign_Batch" onclick="return reassign_batch(<?php echo $lb->batches_id; ?>)"><i class="fas fa-eye" data-toggle="tooltip" data-placement="bottom" title="Re-Assign Batch"></i></button>
                              
                              <?php } else { ?>

                              <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "View batch History") { ?>
                              <a href="#" class="bg-primary action-icon text-white btn-primary open_rightsidebar" onclick="return batch_history(<?php echo $lb->batches_id; ?>);"><i class="far fa-eye"></i></a>
                            <?php } }?>
                            <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Edit batch") { ?>
                              <a href="#" class="bg-primary action-icon text-white btn-primary" data-toggle="modal" data-target="#editbatch" onclick="return update_baches(<?php echo $lb->batches_id; ?>)"><i class="fas fa-pencil-alt"></i> </a>
                            <?php }  }?>
                            <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Delete batch") { ?>
                              <a href="#" class="bg-danger action-icon text-white btn-danger" onclick="return deleted_batch(<?php echo $lb->batches_id; ?>)"><i class="far fa-trash-alt"></i></a> 
                            <?php } }?>

                          <?php  } ?>
                            </td>
                          </tr>
                        <?php $sno++;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      </div>
    </div>
  </div>
</div>
                      
<div class="extra_sidebar-menu">
<div class="sidebar-panel pullDown">

<button class="close-sidebar-left">X</button>
    <div class="rsidebar-items send-sms batch-history">
      <div class="rsidebar-title">
          <h3 class="mb-0">Batch History</h3>
      </div>
      <div class="rsidebar-middle p-0 history">

      </div>
  </div>
</div>
</div>


<div class="modal fade ReAssign_Batch" tabindex="-1" role="dialog" aria-labelledby="formModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-dark" id="formModal">Reassign batch</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
            <div id="msg_batch"></div>
               <div id="multiple_attendance_msg"></div>
               <div class="form-row">
                  <div class="form-group col-md-8">
                     <label>Reassign after days</label>
                     <input type="hidden" class="form-control" id="reas_batch_id" value=""> 
                     <input type="number" id="reassing_date" class="form-control form-control-sm" value="" min="0"/>
                  </div>
               </div>
               <button class="btn btn-primary" type="submit" id="reassign_batch_submit">Submit</button>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Craeted batch -->
<div class="modal fade" id="batchcreate" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Create New Batch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="msg_batch"></div>
        <div class="form-row">
          <?php $addby =  $_SESSION['Admin']['username']; ?>
          <input type="hidden" class="form-control" id="created_bye" value="<?php if (isset($addby)) {
                                                                              echo $addby;
                                                                            } ?>">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Batch Name</label>
            <input type="text" class="form-control" id="batch_name" placeholder="Batch Name" value="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Batch Code</label>
            <input type="text" class="form-control" id="batch_code" placeholder="C123" value="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Branch</label>
            <select id="inputState" class="form-control branch b" name="branch_id" id="branch_id">
              <option value="">Select Branch</option>
              <?php  $branch_id = explode(',',$_SESSION['branch_ids']);
              foreach($list_branch as $k=>$va){
                $br_id = explode(',',$va->branch_id);
                if($br_id[0] != ''){
                    for($i=0; $i<sizeof($branch_id); $i++){
                      if(in_array($branch_id[$i],$br_id)){
                          ?><option value="<?php echo $va->branch_id; ?>"><?php echo $va->branch_name; ?></option><?php
                      }
                    }
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-6 clg-Hidden">
            <label for="inputState">Faculty</label>
            <select id="inputState" class="form-control clgfids" name="clg_faculty_id" id="clg_faculty_id">
              <option value="">Select Faculty</option>
              <?php foreach ($list_user as $ld) { ?>
                <option value="<?php echo $ld->user_id; ?>"><?php echo $ld->name; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-6 clg-Hidden">
            <label for="inputState">College Course</label>
            <select id="inputState" class="form-control clgcoid" name="college_courses_id" id="college_courses_id">
              <option value="">Select Course</option>
              <?php foreach ($list_college_courses as $clg) { ?>
                <option value="<?php echo $clg->college_courses_id; ?>"><?php echo $clg->college_course_name; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-6 Hidden">
            <label for="inputState">Faculty</label>
            <select id="inputState" class="form-control faculty_id facultyids" name="faculty_id" id="faculty_id">
              <option value="">Select Faculty</option>
              <?php foreach ($all_user as $ld) { ?>
                <option value="<?php echo $ld->user_id; ?>"><?php echo $ld->name; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-6 Hidden">
            <label for="inputState">Course</label>
            <select id="inputState" class="form-control course_id" name="course_id" id="course_id">
              <option value="">Select Course</option>
              <?php foreach ($list_course as $lc) { ?>
                          <option  
                           value="<?php echo $lc->course_id; ?>"><?php echo $lc->course_name; ?></option>
                        <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-6 Hidden">
            <label for="inputState">Sub-Course</label>
            <input type="hidden" id="course_days">
            <select id="inputState" class="form-control subcourse_id mrghuerjg" name="subcourse_id" id="subcourse_id" onchange="return get_duration();">
              <option value="">Select Sub-Course</option>
              <?php foreach ($list_subcourse as $lc) { ?>
                          <option  
                           value="<?php echo $lc->subcourse_id ; ?>"><?php echo $lc->subcourse_name; ?></option>
                        <?php } ?>
            </select>
          </div>
        </div>
        <button type="button" class="btn btn-primary m-t-15 waves-effect" id="add_batch">Create Batch</button>
      </div>
    </div>
  </div>
</div>
<!-- batch List all faculty wise report -->
<div class="modal fade batch_report" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Batch Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="table-responsive">
                    <table class="table table-striped normal-table" id="table1">
                      <thead>
                        <tr class="text-center">
                          <th>Course</th>
                          <th>Ongoing</th>
                          <th>Pending</th>
                          <th>Not Assigned</th>
                          <th>Hold</th>
                          <th>Completed</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        foreach ($course_all as $cl) { ?>
                          <tr class="text-center">
                            <td><?php echo $cl->course_name; ?></td>
                            <td class=""><a href="#" class="<?php if($cl->ongoing != 0) { echo 'bg-success action-icon text-white btn-info'; } ?>"><?php echo $cl->ongoing; ?></a></td>
                            <td class="text-white"><a href="#" class="<?php if($cl->pending != 0) { echo 'bg-warning action-icon text-white btn-info'; } ?>"><?php echo $cl->pending; ?></a></td>
                            <td class="text-white"><a href="#" class="<?php if($cl->not_assigned != 0) { echo 'bg-danger action-icon text-white btn-info'; } ?>"><?php echo $cl->not_assigned; ?></a></td>
                            <td class="text-white"><a href="#" class="<?php if($cl->hold != 0) { echo 'bg-info action-icon text-white btn-info'; } ?>"><?php echo $cl->hold; ?></a></td>
                            <td class="text-white"><a href="#" class="<?php if($cl->completed != 0) { echo 'bg-success action-icon text-white btn-info'; } ?>"><?php echo $cl->completed; ?></a></td>
                          </tr>
                        <?php 
                        } ?>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>

<!-- update batch -->
<div class="modal fade" id="editbatch" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Edit Batch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="msg_upd_batch"></div>
        <div class="form-row">
        <input type="hidden" class="form-control" name="" id="batch_id" >
          <?php $addby =  $_SESSION['Admin']['username']; ?>
          <input type="hidden" class="form-control" id="created_bye" value="<?php if (isset($addby)) {
                                                                              echo $addby;
                                                                            } ?>">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Batch Name</label>
            <input type="text" class="form-control" id="b_name" placeholder="Batch Name" value="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Batch Code</label>
            <input type="text" class="form-control" id="b_code" placeholder="C123" value="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Brnach</label>
            <select id="inputState" class="form-control b_id" name="branch_id" id="b_id">
              <option value="">Select Barnch</option>
              <?php  $branch_id = explode(',',$_SESSION['branch_ids']);
                  foreach($list_branch as $k=>$va){
                    $br_id = explode(',',$va->branch_id);
                    if($br_id[0] != ''){
                        for($i=0; $i<sizeof($branch_id); $i++){
                          if(in_array($branch_id[$i],$br_id)){
                              ?><option value="<?php echo $va->branch_id; ?>"><?php echo $va->branch_name; ?></option><?php
                          }
                        }
                    }
                  }
                  ?>
            </select>
          </div>
          <div class="form-group col-md-6 clgedit-Hidden">
            <label for="inputState">Faculty</label>
            <select id="inputState" class="form-control clg_fid" name="clg_faculty_id" id="clg_faculty_id">
              <option value="">Select Faculty</option>
              <?php foreach ($list_user as $ld) { ?>
                <option value="<?php echo $ld->user_id; ?>"><?php echo $ld->name; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-6 clgedit-Hidden">
            <label for="inputState">College Course</label>
            <select id="inputState" class="form-control clg_coid" name="college_courses_id" id="college_courses_id">
              <option value="">Select Course</option>
              <?php foreach ($list_college_courses as $clg) { ?>
                <option value="<?php echo $clg->college_courses_id; ?>"><?php echo $clg->college_course_name; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-6 edit-Hidden">
            <label for="inputState">Faculty</label>
            <select id="inputState" class="form-control f_id" name="faculty_id" id="f_id">
              <option value="">Select Faculty</option>
              <?php foreach ($list_user as $ld) { ?>
                <option value="<?php echo $ld->user_id; ?>"><?php echo $ld->name; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-6 edit-Hidden">
            <label for="inputState">Course</label>
            <select id="inputState" class="form-control c_id" name="course_id" id="c_id">
              <option value="">Select Course</option>
              <?php foreach ($list_course as $lc) { ?>
                <option value="<?php echo $lc->course_id; ?>"><?php echo $lc->course_name; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-6 edit-Hidden">
            <label for="inputState">Sub-Course</label>
            <select id="inputState" class="form-control subcourse_id subcoids" name="subcourse_id" id="subcourse_id">
              <option value="">Select Sub-Course</option>
              <?php foreach ($list_subcourse as $lc) { ?>
                          <option  
                           value="<?php echo $lc->subcourse_id ; ?>"><?php echo $lc->subcourse_name; ?></option>
                        <?php } ?>
            </select>
          </div>
        </div>
        <button type="button" class="btn btn-primary m-t-15 waves-effect" id="upd_baches">Update Batch</button>
      </div>
    </div>
  </div>
</div>

<!-- Filter Batches -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>Admission/erpbatch">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">Batch Name</label>
              <input type="text" class="form-control" id="" value="<?php if (!empty($filter_fname)) {
                                                                      echo @$filter_fname;
                                                                    } ?>" placeholder="Batch Name" name="filter_fname">
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">batch Code</label>
              <input type="text" class="form-control" id="" name="filter_lname" value="<?php if (!empty($filter_lname)) {
                                                                                          echo @$filter_lname;
                                                                                        } ?>" placeholder="Batch Code">
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">Branch</label>
              <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
                <option value="">Select Branch</option>
                <?php foreach ($list_branch as $ld) { ?>
                  <option <?php if (@$filter_branch == $ld->branch_id) {
                            echo "selected";
                          } ?> value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">Faculty</label>
              <select id="inputState" class="form-control" name="filter_course" id="filter_faculty">
                <option value="">Select Faculty</option>
                <?php foreach ($faculty_all as $val) { ?>
                  <option <?php if (@$filter_faculty == $val->faculty_id) {
                            echo "selected";
                          } ?> value="<?php echo $val->faculty_id; ?>"> <?php echo $val->name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">Course</label>
              <select id="inputState" class="form-control" name="filter_course" id="filter_course">
                <option value="">Select Course</option>
                <?php foreach ($list_course as $val) {
                  if ($val->status == "0") { ?>
                    <option <?php if (@$filter_course == $val->course_name) {
                              echo "selected";
                            } ?> value="<?php echo $val->course_id; ?>"> <?php echo $val->course_name; ?></option>
                <?php }
                } ?>
              </select>
            </div>

          </div>
          <div class="text-right">
            <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
            <input type="submit" class="btn btn-primary" value="Filter" name="filter_batches">
            <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>Admission/erpbatch">Reset</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>

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

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
<!-- JS Libraies -->
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

    $('.branch').change(function() {

      var branch_id = $('.branch').val();
      //var course_id = $('#course_orsingle').val();
      // var branch_id =  $('#branch_id').val();ss
      $.ajax({
        url: "<?php echo base_url(); ?>AddmissionController/get_users",
        method: "POST",
        data: {
          'branch_id': branch_id
        },
        success: function(data) {
          $('.faculty_id').html(data);

        }
      });
    });

     $('.course_id').change(function() {

      var course_id = $('.course_id').val();
  
      $.ajax({
        url: "<?php echo base_url(); ?>AddmissionController/get_subcourse",
        method: "POST",
        data: {
          'course_id': course_id
        },
        success: function(data) {
          $('.subcourse_id').html(data);

        }

      });
    });

    $('.c_id').change(function() {

    var course_id = $('.c_id').val();

    $.ajax({
      url: "<?php echo base_url(); ?>AddmissionController/get_subcourse",
      method: "POST",
      data: {
        'course_id': course_id
      },
      success: function(data) {
        $('.subcourse_id').html(data);

      }

    });
    });

   $('.b').change(function() {

    var bid = $('.b').val();

    if(bid=="11")
    {
      $(".clg-Hidden").show();
      $(".Hidden").hide();
    } 
    else
    {
      $(".clg-Hidden").hide();
      $(".Hidden").show();
    }
  });

    // $('.faculty_id').change(function() {

    //   var faculty_id = $('.faculty_id').val();
    //   //var course_id = $('#course_orsingle').val();
    //   // var branch_id =  $('#branch_id').val();

    //   $.ajax({
    //     url: "<?php echo base_url(); ?>AddmissionController/Get_courses_faculty",
    //     method: "POST",
    //     data: {
    //       'faculty_id': faculty_id
    //     },
    //     success: function(data) {
    //       $('.course_id').html(data);

    //     }

    //   });
    // });

  });
</script>

<script type="text/javascript">
$(".clg-Hidden").hide();
  function update_baches(batches_id = '') {
    $.ajax({
      url: "<?php echo base_url(); ?>Admission/get_batches_data",
      type: "post",
      data: {
        'batches_id': batches_id
      },
      success: function(res) {

        var data = $.parseJSON(res);

        $('#batch_id').val(data.record['batches_id']);
        $('#b_name').val(data.record['batch_name']);
        $('#b_code').val(data.record['batch_code']);
        $('.b_id').val(data.record['branch_id']);
        $('.f_id').val(data.record['faculty_id']);
        $('.c_id').val(data.record['course_id']);
        $('.subcourse_id').val(data.record['subcourse_id']);
        $('.clg_fid').val(data.record['faculty_id']);
        $('.clg_coid').val(data.record['college_courses_id']);
         var bid = data.record['branch_id'];
         if(String(bid)==String(11))
         {
          $(".clgedit-Hidden").show();
          $(".edit-Hidden").hide();
         } else {
          $(".clgedit-Hidden").hide();
          $(".edit-Hidden").show();
         }

        // $('#submit').val('Update');
      }

    });
  }

  function deleted_batch(batches_id = '') {
    var conf = confirm("Are U Sure to Delete Record");
    if (conf) {
      $.ajax({
        url: "<?php echo base_url(); ?>Admission/batch_remove",
        type: "post",
        data: {
          'batches_id': batches_id
        },
        success: function(resp) {
          var data = $.parseJSON(resp);
              var ddd = data['all_record'].status;
              if(ddd == '1')
              {
                  $('#msg_delt_batch').html(iziToast.success({
                      title: 'Success',
                      timeout: 2500,
                      message: 'This Topic Deleted.',
                      position: 'topRight'
                      }));
                      setTimeout(function() {
                          location.reload();
                      }, 2520);
              }
              else if(ddd == '2')
              {
                  $('#msg_delt_batch').html(iziToast.error({
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
  }

  // History batch
function batch_history(batches_id = '') {
    
    $.ajax({
        url: "<?php echo base_url(); ?>Admission/ErpBatch_History",
        type: "post",
        data: {
            'batches_id': batches_id
        },
        success: function(Resp) {
            $('.history').html(Resp);
        }
    });
}

function hide() { 
  $('.clg-Hidden').hide();
}   
</script>

<script type="text/javascript">
  $('#add_batch').on('click', function() {
    var batch_name = $('#batch_name').val();
    var batch_code = $('#batch_code').val();
    var branch_id = $('.branch').val();
    var faculty_id = $('.facultyids').val();
    var clg_faculty_id = $('.clgfids').val();
    var college_courses_id = $('.clgcoid').val();
    var course_id = $('.course_id').val();
    var subcourse_id = $('.subcourse_id').val();
    var created_bye = $('#created_bye').val();
    var batch_duration = $('#course_days').val();


    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>Admission/Batch_add",
      data: {
        'batch_name': batch_name,
        'batch_code': batch_code,
        'branch_id': branch_id,
        'facultyids': faculty_id,
        'clg_faculty_id': clg_faculty_id,
        'college_courses_id': college_courses_id,
        'course_id': course_id,
        'subcourse_id': subcourse_id,
        'batch_duration': batch_duration,
        'created_bye': created_bye
      },
      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        if (ddd == '1') {
          $('#msg_batch').fadeIn();
          $('#msg_batch').html("<div class='alert alert-success' role='alert'><b>Successfully Inserted Record</b></div>");
          $('#msg_batch').fadeOut(2000);

          setTimeout(function() {
            location.reload();
          }, 2500);

        } else if (ddd == '2') {
          $('#msg_batch').fadeIn();
          $('#msg_batch').html("<div class='alert alert-danger' role='alert'><b>Someting Wrong!!</b></div>");
          $('#msg_batch').fadeOut(2000);

          setTimeout(function() {
            location.reload();
          }, 2500);
        }
      }
    });
    return false;
  });

  $('#upd_baches').on('click', function() {
    var batches_id = $('#batch_id').val();
    var batch_name = $('#b_name').val();
    var batch_code = $('#b_code').val();
    var branch_id = $('.b_id').val();
    var faculty_id = $('.f_id').val();
    var clg_faculty_id = $('.clg_fid').val();
    var course_id = $('.c_id').val();
    var college_courses_id = $('.clg_coid').val();
    var subcourse_id = $('.subcoids').val();
    var created_bye = $('#created_byes').val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>Admission/Batch_update",
      data: {
        'batches_id': batches_id,
        'batch_name': batch_name,
        'batch_code': batch_code,
        'branch_id': branch_id,
        'faculty_id': faculty_id,
        'clg_faculty_id': clg_faculty_id,
        'course_id': course_id,
        'college_courses_id': college_courses_id,
        'subcourse_id': subcourse_id,
        'created_bye': created_bye
      },
      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        if (ddd == '1') {
          $('#msg_upd_batch').fadeIn();
          $('#msg_upd_batch').html("<div class='alert alert-success' role='alert'><b>Successfully Updated Record</b></div>");
          $('#msg_upd_batch').fadeOut(2000);

          setTimeout(function() {
            location.reload();
          }, 2500);

        } else if (ddd == '2') {
          $('#msg_upd_batch').fadeIn();
          $('#msg_upd_batch').html("<div class='alert alert-danger' role='alert'><b style='color: white;'>Someting Wrong!!</b></div>");
          $('#msg_upd_batch').fadeOut(2000);

          setTimeout(function() {
            location.reload();
          }, 2500);
        }
      }
    });
    return false;
  });
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
  function get_duration(){
    var subcourse_id = $('.mrghuerjg').val();
    $.ajax({
      url: "<?php echo base_url(); ?>Admission/get_days_from_months",
      type: "post",
      data: {
        'subcourse_id': subcourse_id
      },
      success: function(Resp) {
          $("#course_days").val(Resp);
      }
    });
  }

  function reassign_batch(batches_id = "")
  {
    $("#reas_batch_id").val(batches_id);
  }

  $('#reassign_batch_submit').on('click', function() {
    var batches_id = $('#reas_batch_id').val();
    var reassing_days = $('#reassing_date').val();
    
    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>Admission/reassign_date_batch",
      data: {
        'batches_id': batches_id,
        'reassing_days': reassing_days
      },
      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        if (ddd == '1') {
          $('#msg_batch').fadeIn();
          $('#msg_batch').html("<div class='alert alert-success' role='alert'><b>Successfully Updated Record</b></div>");
          $('#msg_batch').fadeOut(2000);

          setTimeout(function() {
            location.reload();
          }, 2500);

        } else if (ddd == '2') {
          $('#msg_batch').fadeIn();
          $('#msg_batch').html("<div class='alert alert-danger' role='alert'><b>Someting Wrong!!</b></div>");
          $('#msg_batch').fadeOut(2000);

          setTimeout(function() {
            location.reload();
          }, 2500);
        }
      }
    });
    return false;
  });
</script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>