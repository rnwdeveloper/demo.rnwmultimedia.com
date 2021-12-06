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
                           <button href="#" class="btn btn-info" data-toggle="modal" data-target="#allupdate" onclick="resetForm()">
                              <span>All Update</span>
                           </button>
                           <!-- <button href="#" class="btn btn-info" data-toggle="modal" data-target="#filteruser">
                              <span><i class="fas fa-filter mr-1"></i>Filter</span>
                           </button> -->
                           <button class="btn">
                              <span><i class="fas fa-arrow-left mr-1"></i> Back</span>
                           </button>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-striped normal-table branch-table" id="table-1">
                              <thead>
                                 <tr>
                                    <th>User Name</th>
                                    <th>Logout Limit</th>
                                    <th>Logtype</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Jinkal Kalathiya</td>
                                    <td>04:00:00</td>
                                    <td>Faculty</td>
                                    <td>
                                       <button href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#user_update" onclick="resetForm()">
                                          <span>Update</span>
                                       </button>      
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Jinkal Kalathiya</td>
                                    <td>04:00:00</td>
                                    <td>Faculty</td>
                                    <td>
                                       <button href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#user_update" onclick="resetForm()">
                                          <span>Update</span>
                                       </button>      
                                    </td>
                                 </tr>                              
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

   <!-- All Update -->
   <div class="modal fade" id="allupdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-dark" id="myLargeModalLabel">All Update</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form class="document-createmodal" method="post" name="user_add" id="user_add" action="<?php echo base_url(); ?>welcome/log_time">
               <div class="modal-body">
                  <div class="card">
                     <div class="branch-items row mb-2">
                        <input type="hidden" name="update_id" id="update_id" value="<?php if (!empty($select_user->user_id)) {
                           echo $select_user->user_id;} ?>" />
                        <div class="form-group  col-md-4 col-sm-12">
                           <label for="email">Logtype:</label>
                           <select required class="form-control filterlogtype parentChange" name="logtype" id="logtype">
                              <option>---SELECT TYPE----</option>
                              <option value="Super Admin">Super Admin</option>
                              <option value="Admin">Admin</option>
                              <option value="Manager">Manager</option>
                              <option value="Counselor">Counselor</option>
                              <option value="Access Document">Access Document</option>
                              <option value="Access Property">Access Property</option>
                              <option value="Accountant">Accountant</option>
                              <option value="Telecaller">Telecaller</option>
                              <option value="Receptionist">Receptionist</option>
                              <option value="Progress Report Checker">Progress Report Checker</option>
                              <option value="Faculty">Faculty</option>
                              <option value="HOD">HOD</option>
                              <option value="Super Admin">Super Admin</option>
                              <option value="Center Head">Center Head</option>
                           </select>
                        </div>                        
                        <div class="form-group  col-md-4 col-sm-12">
                           <label for="pwd">Log Name:</label>
                           <input class="form-control" type="time" name="time">
                        </div>
                     </div>
                  </div>
                  <input type="submit" name="submit" value="Save" class="btn btn-primary" />
                  <input type="submit" name="submit" value="Close" class="btn btn-light ml-2" />
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- user_update  -->
   <div class="modal fade" id="user_update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-dark" id="myLargeModalLabel">Jinkal Kalathiya</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form class="document-createmodal" method="post" name="user_add" id="user_add" action="<?php echo base_url(); ?>welcome/log_time">
               <div class="modal-body">
                  <div class="card">
                     <div class="branch-items row mb-2">
                        <input type="hidden" name="update_id" id="update_id" value="<?php if (!empty($select_user->user_id)) {
                           echo $select_user->user_id;} ?>" />                      
                        <div class="form-group  col-md-4 col-sm-12">
                           <label for="pwd">Log Name:</label>
                           <input class="form-control" type="time" name="time">
                        </div>
                     </div>
                  </div>
                  <input type="submit" name="submit" value="Save" class="btn btn-primary" />
                  <input type="submit" name="submit" value="Close" class="btn btn-light ml-2" />
               </div>
            </form>
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