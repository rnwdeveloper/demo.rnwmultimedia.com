<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<style type="text/css">
  li.select2-selection__choice {
    background-color: #5864BC !important;
  }
</style>

      <!-- Main Content -->
      <div class="main-content overflow-hidden">
        <section class="section">
            <div class="section-body ">
                <div class="card pt-3">
                    <div class="row">
                        <div class="col-12">  
                            <div class="d-flex justify-content-end">
                                <div class="table-right-content"> 
                                    <button class="btn text-dark">
                                    <span><i class="fas fa-arrow-left mr-1"></i> Back</span> 
                                    </button>
                                </div> 
                            </div>   
                                <div class="CMcourses-details">
                                    <div class="card-body">
                                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                                            <li class="nav-item">
                                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                                                aria-controls="home" aria-selected="true">Single Course
                                            </a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link mr-0" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab"
                                                aria-controls="profile" aria-selected="false">Package</a>
                                            </li> 
                                        </ul>
                                        <div class="tab-content" id="myTabContent2">
                                            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">   
                                                <div class="d-flex justify-content-between mt-3">
                                                  <div class="form-group col-md-6 pl-0">
                                                    <label>Single Course</label> 
                                                    <select class="form-control" required="">
                                                       <option value="">Single Course</option>
                                                       <option value="Google">Google</option>
                                                       <option value="Justdial">Justdial</option>
                                                       <option value="Sulekha">Sulekha</option>
                                                       <option value="Website">Website</option>
                                                       <option value="Social Media">Social Media</option>
                                                       <option value="Facebook">Facebook</option>
                                                       <option value="Instagram">Instagram</option>
                                                       <option value="Bulk Message">Bulk Message</option>
                                                       <option value="Reference">Reference</option>
                                                       <option value="Banner">Banner</option>
                                                       <option value="Leaflet">Leaflet</option>
                                                       <option value="Exhibition">Exhibition</option>
                                                       <option value="Seminar">Seminar</option>
                                                       <option value="College">College</option>
                                                       <option value="Newspaper">Newspaper</option>
                                                       <option value="Poster/Handbill">Poster/Handbill</option>
                                                       <option value="Repeated Student">Repeated Student</option>
                                                       <option value="Sponsorship">Sponsorship</option>
                                                       <option value="School">School</option>
                                                       <option value="Other">Other</option>
                                                   </select>
                                                  </div>
                                                  <div>
                                                    <a href="#" class="btn btn-info text-white mt-4 btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                      <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i class="fas fa-filter mr-1 text-white"></i></span>
                                                    </a>
                                                    <a href="#" class="btn btn-danger text-white mt-4 btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                      <span data-toggle="tooltip" data-placement="bottom" title="Reset"><i class="fas fa-redo mr-1 text-white"></i></span>
                                                    </a>
                                                  </div>
                                                </div>
                                                <div class="table-responsive mt-3 ">
                                                  <table class="table table-striped income-table table-bordered" id="table-1">
                                                    <thead>
                                                      <tr>
                                                        <th>SN</th>
                                                        <th width="200px">Branch</th>
                                                        <th>Department</th>
                                                        <th>SubDepartment</th>
                                                        <th width="300px">Course</th>
                                                        <th width="200px">Fees & Installment</th>
                                                        <th>Signing Sheet</th>
                                                        <th>Job Guarantee</th>
                                                        <th>Relevant Course</th>
                                                        <th class="text-center">CourseDetails</th>
                                                      </tr>
                                                    </thead>
                                                      <tbody>
                                                          <tr>
                                                            <td></td>
                                                            <td>
                                                              RW1 Web Technology<br/>
                                                              RW4 <br/>
                                                              RW2 <br/>
                                                              RW3 <br/>
                                                            </td>
                                                            <td>Computer</td>
                                                            <td>Designing</td>
                                                            <td>Interview technique with job (free but with course package)</td>
                                                            <td>
                                                              Fees : 4500
                                                              <br/>
                                                              Installment : 1
                                                              <br/>
                                                              Duration : 1
                                                            </td>
                                                            <td class="text-center"><a class="bg-success action-icon text-white btn-success" href="#"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                                            <td>No</td>
                                                            <td class="text-center"><a href="#" class="bg-primary action-icon text-white btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                                            <td class="view-batch-action text-center">
                                                                <a href="https://demo.rnwmultimedia.com/Admission/student_view_batch?action=stub&ongo=13" class="bg-info action-icon text-white btn-info" data-toggle="tooltip" data-placement="left" title="Onoging Batch View"><i class="fa fa-info-circle"></i></a> 
                                                            </td> 
                                                          </tr> 
                                                       </tbody>
                                                  </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                              <div class="d-flex justify-content-between mt-3">
                                                <div class="form-group col-md-6 pl-0">
                                                  <label>Package</label> 
                                                  <select class="form-control" required="">
                                                     <option value="">Select Package</option>
                                                     <option value="Google">Google</option>
                                                     <option value="Justdial">Justdial</option>
                                                     <option value="Sulekha">Sulekha</option>
                                                     <option value="Website">Website</option>
                                                     <option value="Social Media">Social Media</option>
                                                     <option value="Facebook">Facebook</option>
                                                     <option value="Instagram">Instagram</option>
                                                     <option value="Bulk Message">Bulk Message</option>
                                                     <option value="Reference">Reference</option>
                                                     <option value="Banner">Banner</option>
                                                     <option value="Leaflet">Leaflet</option>
                                                     <option value="Exhibition">Exhibition</option>
                                                     <option value="Seminar">Seminar</option>
                                                     <option value="College">College</option>
                                                     <option value="Newspaper">Newspaper</option>
                                                     <option value="Poster/Handbill">Poster/Handbill</option>
                                                     <option value="Repeated Student">Repeated Student</option>
                                                     <option value="Sponsorship">Sponsorship</option>
                                                     <option value="School">School</option>
                                                     <option value="Other">Other</option>
                                                 </select>
                                                </div>
                                                <div>
                                                  <a href="#" class="btn btn-info text-white mt-4 btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i class="fas fa-filter mr-1 text-white"></i></span>
                                                  </a>
                                                  <a href="#" class="btn btn-danger text-white mt-4 btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <span data-toggle="tooltip" data-placement="bottom" title="Reset"><i class="fas fa-redo mr-1 text-white"></i></span>
                                                  </a>
                                                </div>
                                              </div>
                                              <div class="table-responsive mt-3 ">
                                                <table class="table table-striped income-table table-bordered" id="table-2">
                                                  <thead>
                                                    <tr>
                                                      <th>SN</th>
                                                      <th width="200px">Branch</th>
                                                      <th>Department</th>
                                                      <th>SubDepartment</th>
                                                      <th width="300px">Course</th>
                                                      <th width="200px">Fees & Installment</th>
                                                      <th>Signing Sheet</th>
                                                      <th>Job Guarantee</th>
                                                      <th>Relevant Course</th>
                                                      <th class="text-center">CourseDetails</th>
                                                    </tr>
                                                  </thead>
                                                    <tbody>
                                                        <tr>
                                                          <td></td>
                                                          <td>
                                                            RW1 Web Technology<br/>
                                                            RW4 <br/>
                                                            RW2 <br/>
                                                            RW3 <br/>
                                                          </td>
                                                          <td>Computer</td>
                                                          <td>Designing</td>
                                                          <td>Interview technique with job (free but with course package)</td>
                                                          <td>
                                                            Fees : 4500
                                                            <br/>
                                                            Installment : 1
                                                            <br/>
                                                            Duration : 1
                                                          </td>
                                                          <td class="text-center"><a href="#" class="bg-success action-icon text-white btn-success"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                                          <td>No</td>
                                                          <td class="text-center"><a href="#" class="bg-primary action-icon text-white btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                                          <td class="view-batch-action text-center">
                                                              <a href="https://demo.rnwmultimedia.com/Admission/student_view_batch?action=stub&ongo=13" class="bg-info action-icon text-white btn-info" data-toggle="tooltip" data-placement="left" title="Onoging Batch View"><i class="fa fa-info-circle"></i></a> 
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
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <!-- Large modal -->
      <div class="modal fade filter-history" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="myLargeModalLabel">Filter Ratio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                  <div class="form-row">
                      <div class="form-group col-md-3"> 
                          <label>User </label> 
                          <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
                              <option value="">Select User</option>
                              <option  value="1">RW1 Web Technology</option>
                              <option  value="3">RW4</option>
                              <option  value="5">RW2</option>
                              <option  value="8">RW3</option>
                              <option  value="9">RW1B</option>
                              <option  value="10">RW1 MM</option>
                              <option  value="11">COLLEGE</option>
                          </select>
                      </div>
                      <div class="form-group col-md-3"> 
                          <label>Faculty </label> 
                          <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
                              <option value="">Select Faculty</option>
                              <option  value="1">RW1 Web Technology</option>
                              <option  value="3">RW4</option>
                              <option  value="5">RW2</option>
                              <option  value="8">RW3</option>
                              <option  value="9">RW1B</option>
                              <option  value="10">RW1 MM</option>
                              <option  value="11">COLLEGE</option>
                          </select>
                      </div>
                      <div class="form-group col-md-3"> 
                          <label>HOD </label> 
                          <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
                              <option value="">Select HOD</option>
                              <option  value="1">RW1 Web Technology</option>
                              <option  value="3">RW4</option>
                              <option  value="5">RW2</option>
                              <option  value="8">RW3</option>
                              <option  value="9">RW1B</option>
                              <option  value="10">RW1 MM</option>
                              <option  value="11">COLLEGE</option>
                          </select>
                      </div>
                      <div class="form-group col-md-3"> 
                          <label>Device </label> 
                          <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
                              <option value="">Select Device</option>
                              <option  value="1">RW1 Web Technology</option>
                              <option  value="3">RW4</option>
                              <option  value="5">RW2</option>
                              <option  value="8">RW3</option>
                              <option  value="9">RW1B</option>
                              <option  value="10">RW1 MM</option>
                              <option  value="11">COLLEGE</option>
                          </select>
                      </div>
                      <div class="form-group col-md-3"> 
                          <label>Browser </label> 
                          <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
                              <option value="">Select Browser</option>
                              <option  value="1">RW1 Web Technology</option>
                              <option  value="3">RW4</option>
                              <option  value="5">RW2</option>
                              <option  value="8">RW3</option>
                              <option  value="9">RW1B</option>
                              <option  value="10">RW1 MM</option>
                              <option  value="11">COLLEGE</option>
                          </select>
                      </div>
                      <div class="col-md-6 form-group" >
                        <label>Date From To </label> 
                          <input type="hidden" id="fromdate" name="filter_from_date" value="">
                          <input type="hidden" id="todate" name="filter_to_date" value="">
                          <div id="reportrange" >
                          <i class="far fa-calendar-alt"></i>&nbsp;
                              <span></span> <i class="fa fa-caret-down"></i>
                          </div>
                      </div> 
                  </div>
                  <div class="text-right">
                <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
                    <input type="submit" class="btn btn-primary" value="Filter" name="filter_income_fees">
                    <a class="btn btn-light text-dark" href="https://demo.rnwmultimedia.com/Account/income">Reset</a>  
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade user-history" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="myLargeModalLabel">User History</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                  <div class="view-all-history">
                    <table class="table table-bordered log-details">
                      <tr>
                        <th>Time</th>
                        <th>Log Name</th>
                        <th>Total Minute</th>
                      </tr>
                      <tr>
                        <td>09:07:57 </td>
                        <td>login success</td>
                        <td>02:04:59</td>
                      </tr>
                      <tr>
                        <td>09:07:57 </td>
                        <td>login success</td>
                        <td>02:04:59</td>
                      </tr>
                      <tr>
                        <td>09:07:57 </td>
                        <td>login success</td>
                        <td>02:04:59</td>
                      </tr>
                    </table>
                  </div> 
                  <div class="text-right">
                <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
                    <input type="submit" class="btn btn-primary" value="Filter" name="filter_income_fees">
                    <a class="btn btn-light text-dark" href="https://demo.rnwmultimedia.com/Account/income">Reset</a>  
                  </div>
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
