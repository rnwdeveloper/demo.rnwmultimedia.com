<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <h6 class="page-title text-dark mb-3">All Permission</h6>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">    
                    <a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
            <div class="lead-list-icon text-right d-flex justify-content-end w-100">
                <div class="crm-search-menu">
                    <input type="search" class="form-control" name="searching_form" id="searching_form"  placeholder="Enter Your Name">
                    <i type="button" class="fa fa-search" aria-hidden="true" onclick="return submit_searching()"></i>
                </div>
                <a href="#" class="btn btn-info text-white mr-2"><i class="fas fa-history"></i></a>
                <a href="#" class="btn btn-info text-white">All</a>
            </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card"> 
                    <div class="card-body">
                        <div id="accordion">
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1"
                                aria-expanded="true">
                                <h4>Admin</h4>
                                </div>
                                <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                                    <div class="d-flex justify-content-between">
                                        <div class="permit-all-item border p-3 rounded">
                                            <div class="d-flex mb-2">
                                                <h6 class="text-dark mr-3">All</h6>
                                                <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark border-primary"></span>
                                                    </label>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h6 class="text-primary mr-3 ">CRM</h6>
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="checkmark border-primary"></span>
                                                </label>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h6 class="text-primary mr-3 ">Lead</h6>
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="checkmark border-primary"></span>
                                                </label>
                                            </div>
                                            <div class="permit-items">
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Bulk Lead</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Lead List</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">My Followup</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">campaign</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                    <h6 class="text-primary mr-3">Enquiery</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark border-primary"></span>
                                                    </label>
                                            </div>
                                            <div class="permit-items">
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Leads</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">New Enquiry</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Enquiry List</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">OverdueFollowup</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="d-flex mb-2">
                                                <h6 class="text-primary mr-3 ">FAQ</h6>
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="checkmark border-primary"></span>
                                                </label>
                                            </div>
                                            <div class="permit-items">
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Faq</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Faq View</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                    <h6 class="text-primary mr-3">Demo</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark border-primary"></span>
                                                    </label>
                                            </div>
                                            <div class="permit-items">
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Add Demo</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">View Demo</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Running Demo</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Overdue Running Demo</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Confusion Demo</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Leave Demo</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Done Demo</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Cancel Demo</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                    <h6 class="text-primary mr-3">Lead Settings </h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark border-primary"></span>
                                                    </label>
                                            </div>
                                            <div class="permit-items">
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Channel</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Source</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">School-College</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Lead Status</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Lead Sub-Status</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Lead Follow-Up Mode</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="permit-all-item border p-3 rounded">
                                            <div class="d-flex mb-2">
                                                <h6 class="text-dark mr-3">All</h6>
                                                <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark border-primary"></span>
                                                    </label>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h6 class="text-primary mr-3 ">LMS</h6>
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="checkmark border-primary"></span>
                                                </label>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h6 class="text-primary mr-3 ">Job Application List</h6>
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="checkmark border-primary"></span>
                                                </label>
                                            </div>
                                            <div class="permit-items">
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Job Apply Application</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">View Stu Questions</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">View Company</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">View all jobs</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">View student applied on job</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">View Rapid Job</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div> 
                                            </div>
                                            <div class="d-flex mb-2">
                                                    <h6 class="text-primary mr-3">LmsSettings</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark border-primary"></span>
                                                    </label>
                                            </div>
                                            <div class="permit-items">
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">job_position</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">job_ main_category</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">job_subcategory</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Whatsapp Template</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Email Template</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="permit-all-item border p-3 rounded">
                                            <div class="d-flex mb-2">
                                                <h6 class="text-dark mr-3">All</h6>
                                                <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark border-primary"></span>
                                                    </label>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h6 class="text-primary mr-3 ">ERP</h6>
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="checkmark border-primary"></span>
                                                </label>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h6 class="text-primary mr-3 ">Events</h6>
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="checkmark border-primary"></span>
                                                </label>
                                            </div>
                                            <div class="permit-items">
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Create Event</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Show Event</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                    <h6 class="text-primary mr-3">Admission</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark border-primary"></span>
                                                    </label>
                                            </div>
                                            <div class="permit-items">
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Quick Admission</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Full Admission</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">View Admission</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Unfillup Fields</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Batch</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="d-flex mb-2">
                                                <h6 class="text-primary mr-3 ">Admission Settings</h6>
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="checkmark border-primary"></span>
                                                </label>
                                            </div>
                                            <div class="permit-items">
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Permission</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Shining Sheet</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Doc Permission</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">ID Card</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                    <h6 class="text-primary mr-3">Account</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark border-primary"></span>
                                                    </label>
                                            </div>
                                            <div class="permit-items">
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Overdue Fees</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Outstanding Fees</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Income</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Expenses</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Receipt List</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Check Collected</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h6 class="text-dark mr-3">Deleted Receipt</h6>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                                <h4>Panel 2</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                                <h4>Panel 3</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script> 
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script> 
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script> 
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script> 


</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>