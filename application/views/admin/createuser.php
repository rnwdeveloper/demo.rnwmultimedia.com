<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<style type="text/css">
   li.select2-selection__choice {
      background-color: #5864BC !important;
   }
</style>
<div class="main-wrapper main-wrapper-1">
   <div class="main-content">
      <section class="section">
         <div class="section-body">
            <div class="row">
               <div class="col-12 d-flex justify-content-between">
                  <h6 class="page-title text-dark mb-3">User</h6>
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
                           <button href="#" class="btn btn-info" data-toggle="modal" data-target="#createuser" onclick="resetForm()">
                              <span><i class="fas fa-plus mr-1"></i>Create User</span>
                           </button>
                           <button href="#" class="btn btn-info" data-toggle="modal" data-target="#filteruser">
                              <span><i class="fas fa-filter mr-1"></i>Filter</span>
                           </button>
                           <button class="btn">
                              <span><i class="fas fa-arrow-left mr-1"></i> Back</span>
                           </button>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-striped normal-table branch-table" id="table1">
                              <thead>
                                 <tr>
                                    <th>Logtype</th>
                                    <th>Name</th>
                                    <th>Branch</th>
                                    <th>Department</th>
                                    <th>Sub Department</th>
                                    <th>Last Seen</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($user_all as $val) {
                                    if ($val->logtype != "Admin") { ?>
                                       <tr>
                                          <td><?php echo $val->logtype; ?></td>
                                          <td><?php echo "Name : " . $val->name; ?> <?php echo "<br>Email : " . $val->email; ?> </td>
                                          <td><?php $branch_ids = explode(",", $val->branch_ids);
                                                foreach ($branch_all as $row) {
                                                   if (in_array($row->branch_id, $branch_ids)) {
                                                      echo $row->branch_name . "<br>";
                                                   }
                                                } ?></td>
                                          <td><?php $depart_ids = explode(",", $val->department_ids);
                                                foreach ($department_all as $row) {
                                                   if (in_array($row->department_id, $depart_ids)) {
                                                      echo $row->department_name . "<br>";
                                                   }
                                                } ?></td>
                                          <td><?php $subdepart_ids = explode(",", $val->subdepartment_ids);
                                                foreach ($subdepartment_all as $row) {
                                                   if (in_array($row->subdepartment_id, $subdepart_ids)) {
                                                      echo $row->subdepartment_name . "<br>";
                                                   }
                                                } ?></td>
                                          <td><?php echo $val->timestamp; ?></td>
                                          <td>
                                             <?php
                                             if ($val->user_status == 0) {
                                                echo "Active";
                                             } else {
                                                echo "Deactive";
                                             }
                                             ?>
                                          </td>
                                          <td>
                                             <div class="dropdown">
                                                <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                                                <div class="dropdown-menu">
                                                   <a class="dropdown-item has-icon" href="javascript:doc_upd(<?php echo @$val->user_id; ?>)">
                                                      <i class="far fa-edit"></i> Edit
                                                   </a>
                                                   <a class="dropdown-item has-icon" href="javascript:remove_doc(<?php echo @$val->user_id; ?>)">
                                                      <i class="far fa-trash-alt text-danger"></i> Delete
                                                   </a>
                                                   <?php if ($val->user_status == 0) { ?>
                                                      <a class="dropdown-item has-icon" href="javascript:doc_status_upd(<?php echo @$val->user_id; ?>, 1)">
                                                         <i class="fas fa-ban"></i> Disable
                                                      </a>
                                                   <?php } else {  ?>
                                                      <a class="dropdown-item has-icon" href="javascript:doc_status_upd(<?php echo @$val->user_id; ?>, 0)">
                                                         <i class="far fa-check-circle"></i> Active
                                                      </a>
                                                   <?php } ?>
                                                   <?php
                                                      if ($val->logtype == 'Faculty' || $val->logtype == 'HOD') { 
                                                   ?>
                                                      <a class="dropdown-item has-icon" href="javascript:assignCourse(<?php echo @$val->user_id; ?>)">
                                                         <i class="far fa-edit"></i> Assign Course
                                                      </a>  
                                                   <?php   }
                                                   ?>
                                                </div>
                                          </td>


                                       </tr>

                                 <?php }
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

   <!-- Create User -->
   <div class="modal fade" id="createuser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-dark" id="myLargeModalLabel">Create User</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form class="document-createmodal" method="post" name="user_add" id="user_add" action="<?php echo base_url(); ?>AdminSettings/createuser">
               <div class="modal-body">
                  <div class="card">
                     <div class="branch-items row mb-2">
                        <input type="hidden" name="update_id" id="update_id" value="<?php if (!empty($select_user->user_id)) {
                                                                                       echo $select_user->user_id;
                                                                                    } ?>" />
                        <?php if ($_SESSION['logtype'] == "Super Admin") { ?>
                           <div class="form-group  col-md-4 col-sm-12">
                              <label for="Admin">Admin</label>
                              <select class="form-control" name="admin_id" id="admin">
                                 <option value="">Select Admin</option>
                                 <?php foreach ($user_all as $val) {
                                    if ($val->status == 0 && $val->logtype == "Admin") { ?>
                                       <option <?php if ($val->user_id == @$select_user->admin_id) {
                                                   echo "selected";
                                                } ?> value="<?php echo $val->user_id; ?>"><?php echo $val->name; ?></option>
                                 <?php }
                                 } ?>
                              </select>
                           </div>
                           <div class="form-group  col-md-4 col-sm-12">
                              <label for="Branch">Branch</label>
                              <select class="select2 form-control parentChange" name="b_ids[]" id="branch_id" multiple="multiple">
                                 <option>Select Branch</option>
                                 <?php $branch_ids = explode(",", $select_user->branch_ids);
                                 foreach ($branch_all as $row) {  ?>
                                    <option <?php if (in_array($row->branch_id, $branch_ids)) {
                                                echo "selected";
                                             } ?> value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        <?php } else { ?>
                           <div class="form-group  col-md-4 col-sm-12">
                              <label class="col-md-2">Branch</label>
                              <select class="select2 form-control parentChange" name="b_ids[]" id="branch_id" multiple="multiple">
                                 <option>Select Branch</option>
                                 <?php $branch_ids = explode(",", $select_user->branch_ids);
                                 foreach ($branch_all as $row) {  ?>
                                    <option <?php if (in_array($row->branch_id, $branch_ids)) {
                                                echo "selected";
                                             } ?> value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        <?php } ?>

                        <div class="form-group  col-md-4 col-sm-12">
                           <label for="Department">Department</label>
                           <input type="hidden" id="hdepartment" name="hdepartment" />
                           <select class="select2 form-control" name="depart_ids[]" id="department" multiple="multiple">
                              <option>Select Department</option>
                              <?php $departids = explode(",", $select_user->department_ids);
                              foreach ($department_all as $row) {  ?>
                                 <option <?php if (in_array($row->department_id, $departids)) {
                                             echo "selected";
                                          } ?> value="<?php echo $row->department_id; ?>"><?php echo $row->department_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>

                        <div class="form-group  col-md-4 col-sm-12">
                           <label for="subdepartment">Sub Department</label>
                           <input type="hidden" id="hsubdepartment" name="hsubdepartment" />
                           <select class="select2 form-control" name="subdepart_ids[]" id="subdepartment" multiple="multiple">
                              <option>Select SubDepartment</option>
                              <?php $subdepartid = explode(",", $select_user->subdepartment_ids);
                              foreach ($subdepartment_all as $row) {  ?>
                                 <option <?php if (in_array($row->subdepartment_id, $subdepartid)) {
                                             echo "selected";
                                          } ?> value="<?php echo $row->subdepartment_id; ?>"><?php echo $row->subdepartment_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>

                        <div class="form-group  col-md-4 col-sm-12">
                           <label for="email">Logtype:</label>
                           <select required class="form-control filterlogtype parentChange" name="logtype" id="logtype">
                              <option value="0">Select Logtype</option>
                              <?php foreach ($logtype_all as $val) {
                                 if ($val->logtype_name != "Admin") { ?>
                                    <option <?php if ($val->logtype_name == @$select_user->logtype) {
                                                echo "selected";
                                             } ?> value="<?php echo $val->logtype_name; ?>"><?php echo $val->logtype_name; ?></option>
                              <?php }
                              } ?>
                           </select>
                        </div>
                        <div class="form-group  col-md-4 col-sm-12">
                           <input type="hidden" id="hm_parent_id" name="hm_parent_id" />
                           <label for="pwd" id="parentLable">Parent :</label>
                           <select class="form-control" name="m_parent_id" id="m_parent_id">
                              <option value="0">--SELECT PARENT----</option>
                           </select>
                        </div>
                        <div class="form-group  col-md-4 col-sm-12">
                           <label for="pwd">Log Name:</label>
                           <input class="form-control" value="<?php if (!empty($select_user->name)) {
                                                                  echo $select_user->name;
                                                               } ?>" type="text" name="name" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group  col-md-4 col-sm-12">
                           <label for="pwd">Email Id:</label>
                           <input class="form-control" value="<?php if (!empty($select_user->email)) {
                                                                  echo $select_user->email;
                                                               } ?>" type="email" name="email" id="email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group  col-md-4 col-sm-12">
                           <label for="pwd">Password :</label>
                           <input type="password" class="form-control" value="<?php if (!empty($select_user->password)) {
                                                                                 echo $select_user->password;
                                                                              } ?>" type="text" name="password" id="password" placeholder="Enter password" required>
                        </div>


                     </div>
                     <h5 class="modal-title text-dark" id="myLargeModalLabel">Permission: </h5>
                     <div class="branch-items row mb-2" id="allPermission"></div>
                     <div class="branch-items row mb-2" id="permission_all">

                        <?php if (!empty($select_user->permission)) { ?>
                           <!-- <?php foreach ($f_module as $key => $value) { ?>
                              <h5>
                                 <?php
                                    echo $value->f_module_name;
                                 ?>
                                 <input type="checkbox" name="fp[]" value="<?php echo $value->f_module_name; ?>" <?php if (isset($select_user->f_permission) && in_array($value->f_module_name, explode(",", $select_user->f_permission))) {
                                                                                                                     echo "checked";
                                                                                                                  } ?>>
                              </h5>
                              <?php foreach ($m_module as $m) {
                                       if ($m->f_module_id == $value->f_module_id) {
                              ?>
                                    <label for="pwd">
                                       <?php echo $m->module_name; ?>
                                       <input type="checkbox" name="m_all[]" id="m_all" value="<?php echo $m->module_name; ?>" <?php if (isset($select_user->m_permission) && in_array($m->module_name, explode(",", $select_user->m_permission))) {
                                                                                                                                    echo "checked";
                                                                                                                                 } ?>>:
                                    </label>
                                    <br>
                                    <?php foreach ($l_module as $k => $l) {
                                             if ($l->m_module_id == $m->m_module_id) {
                                    ?>
                                          <label style="width:30%;font-weight: normal;"><?php echo $l->name; ?> </label>
                                          <label class="radio-inline">
                                             <input type="checkbox" name="f_all[]" id="f_all" value="<?php echo $l->name; ?>" <?php if (isset($select_user->permission) && in_array($l->name, explode(",", $select_user->permission))) {
                                                                                                                                 echo "checked";
                                                                                                                              } ?>>Yes
                                          </label>
                                          <br>
                           <?php }
                                          }
                                       }
                                    }
                                 }  ?> -->
                        <?php } else { ?>
                           <?php
                           //   $allp = explode(',', $_SESSION['user_permission']);
                           foreach ($f_module as $key => $value) { ?>
                              <div class="form-group col-md-4 col-sm-12">
                                 <h6 class="text-dark">
                                    <?php echo $value->f_module_name; ?>
                                    <input 
                                       type="checkbox" 
                                       name="fp[]" 
                                       id="fp-<?php echo $value->f_module_id; ?>" 
                                       value="<?php echo $value->f_module_name; ?>" 
                                       onclick="return change_mod(<?php echo $value->f_module_id; ?>)"
                                    >
                                 </h6>
                                 <div id="all_change_mod<?php echo $value->f_module_id; ?>"></div>
                              </div>
                           <?php } ?>
                        <?php } ?>
                     </div>
                  </div>
                  <input type="submit" name="submit" value="Save" class="btn btn-primary" />
               </div>
         </div>
         </form>
      </div>
   </div>
</div>

<!-- Filter Department -->
<div class="modal fade" id="filteruser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="myLargeModalLabel">Filter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="post" action="<?php echo base_url(); ?>AdminSettings/createuser">
               <div class="card">
                  <div class="branch-items row mb-2">
                     <div class="form-group  col-md-4 col-sm-12">
                        <label class="">Branch</label>
                        <select class="select2 form-control parentChange" name="filter_b_ids[]" id="filter_branch_id" multiple="multiple">
                           <option>Select Branch</option>
                           <?php $branch_ids = explode(",", $select_user->branch_ids);
                           foreach ($branch_all as $row) {  ?>
                              <option 
                                 value="<?php echo $row->branch_id; ?>"
                                 <?php
                                    if (!empty($filter_b_ids)) {
                                       if (in_array($row->branch_id, $filter_b_ids)) {
                                          echo "selected";
                                       }
                                    }
                                 ?>
                              >
                                 <?php echo $row->branch_name; ?>
                              </option>
                           <?php } ?>
                        </select>
                     </div>
                     <div class="form-group  col-md-4 col-sm-12">
                        <label for="Department">Department</label>
                        <input type="hidden" id="filter_hdepartment" name="filter_hdepartment" />
                        <select class="select2 form-control" name="filter_depart_ids[]" id="filter_department" multiple="multiple">
                           <option>Select Department</option>
                           <?php $departids = explode(",", $select_user->department_ids);
                           foreach ($department_all as $row) {  ?>
                              <option 
                                 value="<?php echo $row->department_id; ?>"
                                 <?php
                                    if (!empty($filter_depart_ids)) {
                                       if (in_array($row->department_id, $filter_depart_ids)) {
                                          echo "selected";
                                       }
                                    }
                                 ?>
                              >
                                 <?php echo $row->department_name; ?>
                              </option>
                           <?php } ?>
                        </select>
                     </div>

                     <div class="form-group  col-md-4 col-sm-12">
                        <label for="subdepartment">Sub Department</label>
                        <input type="hidden" id="filter_hsubdepartment" name="filter_hsubdepartment" />
                        <select class="select2 form-control" name="filter_subdepart_ids[]" id="filter_subdepartment" multiple="multiple">
                           <option>Select SubDepartment</option>
                           <?php $subdepartid = explode(",", $select_user->subdepartment_ids);
                           foreach ($subdepartment_all as $row) {  ?>
                              <option 
                                 value="<?php echo $row->subdepartment_id; ?>"
                                 <?php
                                    if (!empty($filter_subdepart_ids)) {
                                       if (in_array($row->subdepartment_id, $filter_subdepart_ids)) {
                                          echo "selected";
                                       }
                                    }
                                 ?>
                              >
                                 <?php echo $row->subdepartment_name; ?>
                              </option>
                           <?php } ?>
                        </select>
                     </div>

                     <div class="form-group  col-md-4 col-sm-12">
                        <label for="email">Logtype:</label>
                        <select required class="form-control filterlogtype parentChange" name="filter_logtype" id="filter_logtype">
                           <option value="0">Select Logtype</option>
                           <?php foreach ($logtype_all as $val) {
                              if ($val->logtype_name != "Admin") { ?>
                                 <option 
                                    value="<?php echo $val->logtype_name; ?>"
                                    <?php
                                    if (!empty($filter_logtype)) {
                                       if ($val->logtype_name === $filter_logtype) {
                                          echo "selected";
                                       }
                                    }
                                 ?>
                                 >
                                    <?php echo $val->logtype_name; ?>
                                 </option>
                           <?php }
                           } ?>
                        </select>
                     </div>
                     <div class="form-group  col-md-4 col-sm-12">
                        <label for="pwd">Log Name:</label>
                        <input class="form-control" value="<?php if (!empty($filter_name)) {
                              echo $filter_name;
                           } ?>" type="text" name="filter_name" id="filter_name" placeholder="Enter Name">
                     </div>
                  </div>
               </div>
               <input type="submit" class="btn btn-primary" value="Submit" name="filter_user_data">
               <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>AdminSettings/createuser">Reset</a>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- Assign Course To Faculty -->
<div class="modal fade" id="assignCourse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="myLargeModalLabel">Assign Course & Package</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form class="document-createmodal" method="post" name="course_package_add" id="course_package_add" action="<?php echo base_url(); ?>AdminSettings/createuser">
               <div class="card">
                  <div class="branch-items row mb-2">
                     <div class="form-group  col-md-6 col-sm-12">
                        <input type="hidden" name="user_id_co_pk" id="user_id_co_pk">
                        <label class="">Course</label>
                        <input type="hidden" id="hcourse" name="hcourse" />
                        <select class="select2 form-control parentChange" name="course_ids[]" id="course_ids" multiple="multiple">
                           <option>Select Course</option>
                           <?php //$course_ids = explode(",", $select_user->branch_ids); ?>
                           <?php
                           foreach ($course_all as $row) {  ?>
                              <option 
                                 value="<?php echo $row->course_id; ?>"
                              >
                                 <?php echo $row->course_name; ?>
                              </option>
                           <?php } ?>
                        </select>
                     </div>
                     <div class="form-group  col-md-6 col-sm-12">
                        <label for="Department">Package</label>
                        <input type="hidden" id="hpackage" name="hpackage" />
                        <select class="select2 form-control" name="package_ids[]" id="package_ids" multiple="multiple">
                           <option>Select Package</option>
                           <?php //$departids = explode(",", $select_user->department_ids);
                           foreach ($package_all as $row) {  ?>
                              <option 
                                 value="<?php echo $row->package_id; ?>"
                              >
                                 <?php echo $row->package_name; ?>
                              </option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
               </div>
               <input type="submit" class="btn btn-primary" value="Submit" name="submit_course_package">
            </form>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
   function resetForm() {
      console.log("reset");
      //$('#user_add').trigger("reset")
      $('#user_add')[0].reset();
      $("[name='fp[]']").prop('checked', false);
      $("[name='m_all[]']").prop('checked', false);
      $("[name='f_all[]']").prop('checked', false);
      $("#branch_id option:selected").prop("selected", false);
      $('#branch_id').val("").trigger("change");
      $("#department option:selected").prop("selected", false);
      $('#department').val("").trigger("change");
      $("#subdepartment option:selected").prop("selected", false);
      $('#subdepartment').val("").trigger("change");
      $('#hdepartment').val("");
      $('#hsubdepartment').val("");
   }


   $("#course_package_add").validate({
      rules: {
         course_ids: {
            required: true
         },
         package_ids: {
            required: true
         },
         w_template_name: {
            required: true,
         },
         w_template_message: {
            required: true
         }
      },
      messages: {
         w_template_name: {
            required: "<div style='color:red'>Enter Template Name</div>",
         },
         w_template_message: {
            required: "<div style='color:red'>Please enter template Message</div>"
         }
      },
      submitHandler: function() {
         event.preventDefault();
         var formdata = $('#course_package_add').serialize();

         $.ajax({
            url: "<?php echo base_url(); ?>AdminSettings/ajax_course_package_submit",
            type: "post",
            data: formdata,
            success: function(resp) {
               var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if (ddd == '1') {
                  $('#msg_doc').html(iziToast.success({
                     title: 'Success',
                     timeout: 2000,
                     message: data['all_record'].msg,
                     position: 'topRight'
                  }));

                  setTimeout(function() {
                     location.reload();
                  }, 2020);
               } else if (ddd == '2') {
                  $('#msg_doc').html(iziToast.error({
                     title: 'Canceled!',
                     timeout: 2000,
                     message: data['all_record'].msg,
                     position: 'topRight'
                  }));

                  setTimeout(function() {
                     location.reload();
                  }, 2020);
               }
            }
         });
      }
   });

   $("#user_add").validate({
      rules: {
         branch_id: {
            required: true
         },
         w_template_name: {
            required: true,
         },
         w_template_message: {
            required: true
         }
      },
      messages: {
         w_template_name: {
            required: "<div style='color:red'>Enter Template Name</div>",
         },
         w_template_message: {
            required: "<div style='color:red'>Please enter template Message</div>"
         }
      },
      submitHandler: function() {
         event.preventDefault();
         var formdata = $('#user_add').serialize();

         $.ajax({
            url: "<?php echo base_url(); ?>AdminSettings/ajax_user_submit",
            type: "post",
            data: formdata,
            success: function(resp) {
               var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if (ddd == '1') {
                  $('#msg_doc').html(iziToast.success({
                     title: 'Success',
                     timeout: 2000,
                     message: data['all_record'].msg,
                     position: 'topRight'
                  }));

                  setTimeout(function() {
                     location.reload();
                  }, 2020);
               } else if (ddd == '2') {
                  $('#msg_doc').html(iziToast.error({
                     title: 'Canceled!',
                     timeout: 2000,
                     message: data['all_record'].msg,
                     position: 'topRight'
                  }));

                  setTimeout(function() {
                     location.reload();
                  }, 2020);
               }
            }
         });
      }
   });
</script>

<script>
   function assignCourse(id) {
      $('#user_id_co_pk').val(id);
      $("#assignCourse").modal();
      
      $.ajax({
         url: "<?php echo base_url(); ?>AdminSettings/get_course_package",
         type: "post",
         data: {
            'user_id': id
         },
         success: function(resp) {
            $("#assignCourse").modal();
            var data = $.parseJSON(resp);

            var course_ids = data['single_record'].course_ids;
            var package_ids = data['single_record'].package_ids;
            
            var arr = course_ids.split(",");
            var arr1 = package_ids.split(",");

            $('#hcourse').val(arr);
            $('#hpackage').val(arr1);

            console.log("arr  " + arr.length);
            console.log("arr1  " + arr1);

            for (i = 0; i < arr.length; i++) {
               if (arr[i] != '') {
                  $('#course_ids option[value=' + arr[i] + ']').attr('selected', 'selected');
               }
            }
            $('#course_ids').val(arr).trigger("change");

            for (i = 0; i < arr1.length; i++) {
               if (arr1[i] != '') {
                  $('#package_ids option[value=' + arr1[i] + ']').attr('selected', 'selected');
               }
            }
            $('#package_ids').val(arr1).trigger("change");

            // console.log(resp)

            

            // for(var i=0; i<course_all.length; i++) {
            //    $('#m_parent_id').html(data);
            // }
            //$("#xyz").prop("checked", true);

            
            
            //$('#submit').val('Update');
         }

      });
   }

   function doc_upd(id) {
      //console.log(department_id);
      $.ajax({
         url: "<?php echo base_url(); ?>AdminSettings/get_record_user",
         type: "post",
         data: {
            'user_id': id
         },
         success: function(resp) {
            $("#createuser").modal();
            var data = $.parseJSON(resp);




            //$("#xyz").prop("checked", true);

            var user_id = data['single_record'].user_id;
            var admin_id = data['single_record'].admin_id;
            var branch_id = data['single_record'].branch_ids;
            var department_ids = data['single_record'].department_ids;
            var subdepartment_ids = data['single_record'].subdepartment_ids;
            var logtype = data['single_record'].logtype;
            var m_parent_id = data['single_record'].m_parent_id;
            var name = data['single_record'].name;
            var email = data['single_record'].email;
            var password = data['single_record'].password;
            var f_permission = data['single_record'].f_permission;
            var m_permission = data['single_record'].m_permission;
            var permission = data['single_record'].permission;

            var arr3 = f_permission.split(",");

            console.log("XXXX" + m_parent_id);

            $('#hm_parent_id').val(m_parent_id);

            $.ajax({
               type: 'POST',
               data: {
                  logtype: logtype,
                  branch_ids: branch_id,
                  m_parent_id: m_parent_id
               },
               url: "<?php echo base_url(); ?>AdminSettings/fetch_parent",
               success: function(data) {
                  $('#m_parent_id').html(data);
               }
            });

            $.ajax({
               type: 'POST',
               data: {
                  f_permission: f_permission,
                  m_permission: m_permission,
                  permission: permission,
               },
               url: "<?php echo base_url(); ?>settings/fetch_permission_alll",
               success: function(data) {
                  $('#permission_all').html(data);
               }
            });

            $('#update_id').val(user_id);
            $('#admin').val(admin_id);
            $('#logtype').val(logtype).change();
            $('#logtype').val(logtype).trigger("change");
            
            $('#m_parent_id').val(m_parent_id).change();
            $('#m_parent_id').val(m_parent_id).trigger("change");
            $('#name').val(name);
            $('#email').val(email);
            $('#password').val(password);

            //$('#fp').val(f_permission);

            var arr = branch_id.split(",");
            var arr1 = department_ids.split(",");
            var arr2 = subdepartment_ids.split(",");

            $('#hdepartment').val(arr1);
            $('#hsubdepartment').val(arr2);

            console.log("arr  " + arr);
            console.log("arr1  " + arr1);
            console.log("arr2  " + arr2);

            for (i = 0; i < arr2.length; i++) {
               $('#branch_id option[value=' + arr[i] + ']').attr('selected', 'selected');
            }
            $('#branch_id').val(arr).trigger("change");

            // for (i = 0; i < arr1.length; i++) {
            //    $('#department option[value=' + arr1[i] + ']').attr('selected', 'selected');
            // }
            $('#department').val(arr1).trigger("change");

            for (i = 0; i < arr2.length; i++) {
               $('#subdepartment option[value=' + arr2[i] + ']').attr('selected', 'selected');
            }
            $('#subdepartment').val(arr2).trigger("change");

            $('#submit').val('Update');
         }

      });
   }

   function remove_doc(id) {
      var conf = confirm("Are you sure to delete record?");
      if (conf) {
         $.ajax({
            url: "<?php echo base_url(); ?>AdminSettings/delete_record",
            type: "post",
            data: {
               'id': id,
               'table': 'user',
               'field': 'user_id'
            },
            success: function(resp) {
               var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               console.log("dddddd", ddd);
               if (ddd == '1') {
                  $('#deleted_msg').html(iziToast.success({
                     title: 'Success',
                     timeout: 2000,
                     message: 'HI! This Record Deleted.',
                     position: 'topRight'
                  }));


                  setTimeout(function() {
                     location.reload();
                  }, 2020);
               } else if (ddd == '2') {
                  $('#deleted_msg').html(iziToast.error({
                     title: 'Canceled!',
                     timeout: 2000,
                     message: '',
                     position: 'topRight'
                  }));

                  setTimeout(function() {
                     location.reload();
                  }, 2020);
               }
            }
         });
      }
   }

   function doc_status_upd(id, status) {
      console.log(id);
      $.ajax({
         url: "<?php echo base_url(); ?>AdminSettings/update_status",
         type: "post",
         data: {
            'id': id,
            'status': status,
            'table': 'user',
            'field': 'user_status',
            'check_field': 'user_id'
         },
         success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
               $('#msg').html(iziToast.success({
                  title: 'Success',
                  timeout: 2000,
                  message: data['status'].msg,
                  position: 'topRight'
               }));


               setTimeout(function() {
                  location.reload();
               }, 2020);
            } else if (ddd == '2') {
               $('#msg').html(iziToast.error({
                  title: 'Canceled!',
                  timeout: 2000,
                  message: data['status'].msg,
                  position: 'topRight'
               }));

               setTimeout(function() {
                  location.reload();
               }, 2020);
            }
         }
      });
   }
</script>
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
<script type="text/javascript">
   $(document).ready(function() {
      $('#admin').change(function() {
         var d = $(this).val();

         $.ajax({
            type: 'POST',
            data: {

               'id': d
            },
            url: "<?php echo base_url(); ?>settings/filter_branch_wise",
            success: function(data) {
               $('#branch_id').html(data);
            }
         });
      });
   });
</script>
<script>
   $(document).ready(function() {

      $('#branch_id').change(function() {

         var branch_id = $('#branch_id').val();
         var department = $('#hdepartment').val();
         //console.log("dept"+branch_id);
         //var selected = $("select#branch_id option").filter(":selected").val();
         //var selected = $("#department option:selected").map(function(){ return this.value }).get().join(", ");
         console.log("Selectedxx" + department);

         $.ajax({
            url: "<?php echo base_url(); ?>settings/filter_department_wise",
            method: "POST",
            data: {
               'branch_id': branch_id,
               'selected': department
            },
            success: function(data) {
               $('#department').html(data);

            }
         });
      });

      $('#b_id').change(function() {

         var branch_id = $('#b_id').val();
         //var course_id = $('#course_orsingle').val();
         // var branch_id =  $('#branch_id').val();

         $.ajax({
            url: "<?php echo base_url(); ?>settings/fetch_admin_wise_department",
            method: "POST",
            data: {
               'branch_id': branch_id
            },
            success: function(data) {
               $('#department').html(data);

            }


         });
      });
   });
</script>

<script>
   $(document).ready(function() {

      $('#department').change(function() {

         var department_id = $('#department').val();
         var subdepartment = $('#hsubdepartment').val();
         //console.log("subbbb "+subdepartment);
         // alert(department_id);

         $.ajax({
            url: "<?php echo base_url(); ?>settings/filter_subdepartment_wise",
            method: "POST",
            data: {
               'department_id': department_id,
               'selected': subdepartment
            },
            success: function(data) {
               $('#subdepartment').html(data);

            }
         });
      });
   });
</script>

<script type="text/javascript">
   $(document).ready(function() {
      $('.filterCheck').change(function() {
         /*console.log("called");
         console.log($('#filterForm').serialize());*/
         // alert($('#filterForm').serialize());
         $.ajax({
            type: 'POST',
            data: $('#filterForm').serialize(),
            url: "<?php echo base_url(); ?>settings/fetch_depart_alll",
            success: function(data) {
               $('#department').html(data);
            }
         });
      });
   });

   $(document).ready(function() {
      $('#logtype').change(function() {
         var name = $('#logtype').val();
         var update_id = $('#update_id').val();

         console.log("update_id", update_id)
         /*console.log("called");
         console.log($('#filterForm').serialize());*/

         $.ajax({
            type: 'POST',
            data: {
               logtype_name: name,
               update_id: update_id
            },
            url: "<?php echo base_url(); ?>settings/fetch_permission_alll",
            success: function(data) {
               $('#permission_all').html(data);
            }
         });
      });
   });

   $(document).ready(function() {
      $('.parentChange').change(function() {
         var logtype = $('#logtype').val();
         var branch_id = $('#branch_id').val();
         var hm_parent_id = $('#hm_parent_id').val();
         console.log("m_parent_id" + hm_parent_id);
         console.log("logtype"+logtype);
         /*console.log("called");
         console.log($('#filterForm').serialize());*/

         if (logtype === "Manager") {
            var admin = $('#admin').val();
            //$('#m_parent_id').val(admin);
            $('#m_parent_id').hide();
            $('#parentLable').hide();
         } else {
            $('#m_parent_id').show();
            $('#parentLable').show();
         }

         if (logtype !== "Manager" && branch_id.length > 0) {
            $.ajax({
               type: 'POST',
               data: {
                  logtype: logtype,
                  branch_ids: branch_id,
                  m_parent_id: hm_parent_id
               },
               url: "<?php echo base_url(); ?>AdminSettings/fetch_parent",
               success: function(data) {
                  console.log("parent " + data);
                  $('#m_parent_id').html(data);
               }
            });
         } else {
            $('#m_parent_id').html("<option value='0'></option>");
         }
      });
   });
</script>
<script type="text/javascript">
   function change_mod(id) {
   	console.log(id); 
   	var fpStatus = $('#fp-'+id).is(":checked");
   	//console.log("xxxxxxx " + x);
      //if (fpStatus) {
      	$.ajax({
	         url: "<?php echo base_url(); ?>settings/change_f_mod",
	         type: 'POST',
	         data: {
	            a_name: id,
	            fpStatus: fpStatus
	         },
	         success: function(res) {
	            $('#all_change_mod' + id).html(res);
	         }
      	});

      	// if (fpStatus) {
      	// 	//console.log("true");
      	// 	// alert(id);
      	// 	$('.fp_'+id).prop('checked', true);
      	// } else {
      	// 	//console.log("false");
      	// 	$('.fp_'+id).prop('checked', false);
      	// }
      // 	$('#all_change_mod' + id).show();
      // } else {
      // 	$('#all_change_mod' + id).hide();
      // }
      
   }
</script>
<script>
   $(document).ready(function() {
      $('#state_id').change(function() {

         var s = $('#state_id').val();
         alert(s);
         if (s != '') {
            $.ajax({
               url: "<?php echo base_url(); ?>settings/fetch_cities",
               method: "POST",
               data: {
                  s_id: s
               },
               success: function(data) {
                  $('#city_id').html(data);
                  // $('#city').html('<option value="">Select City</option>');
               }
            });
         } else {
            $('#getfaculty').html('<option value="">Select Faculty</option>');
            // $('#city').html('<option value="">Select City</option>');
         }

      });
   });
</script>

<!-- page script -->
<?php if (!empty($select_logtype)) { ?>
   <script>
      $('#mylogtype').modal("show");
   </script>
<?php } ?>

<script>
   $(function() {
      $('#example1').DataTable()
      $('#example2').DataTable({
         'paging': true,
         'lengthChange': false,
         'searching': false,
         'ordering': true,
         'info': true,
         'autoWidth': false
      })
   })
</script>

<script>
   function viewManager(id) {


      $.ajax({
         url: "<?php echo base_url(); ?>settings/view_member",
         type: "post",
         data: {
            'user_id': id

         },
         success: function(data) {
            $('#viewc').html(data);
            $('#myModal_course').modal('show');
         }

      });
   }
   $(function() {
        $('#table1').DataTable({
            stateSave: true,
            "bDestroy": true
        })
    }) 
</script>
</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>