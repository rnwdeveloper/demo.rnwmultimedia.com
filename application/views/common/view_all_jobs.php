<link rel="stylesheet" href="dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

<div class="main-wrapper main-wrapper-1">
    <div class="main-content dashboard_section">
        <div class="card">
            <div class="col-md-12 px-0">
                <div class="card-header">
                    <div class="w-100 d-flex flex-wrap align-items-center justify-content-between">  
                        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item mb-3">
                                <a class="btn btn-info text-white mx-1" id="pills-all-jobs-tab" data-toggle="pill"
                                    href="#pills-all-jobs" role="tab" aria-controls="pills-all-jobs"
                                    aria-selected="false">All Jobs <span
                                        class="badge rounded-pill text-white badge-transparent">5</span> </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="btn btn-warning mx-1 text-white" id="pills-pending-jobs-tab" data-toggle="pill"
                                    href="#pills-pending-jobs" role="tab">Pending Jobs <span
                                        class="badge rounded-pill text-white badge-transparent">5</span> </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="btn btn-success text-white mx-1" id="pills-active-jobs-tab" data-toggle="pill"
                                    href="#pills-active-jobs" role="tab" aria-controls="pills-active-jobs"
                                    aria-selected="false">Active Jobs<span
                                        class="badge rounded-pill text-white badge-transparent">5</span> </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="btn btn-danger text-white mx-1" id="pills-deactive-jobs-tab" data-toggle="pill"
                                    href="#pills-deactive-jobs" role="tab" aria-controls="pills-deactive-jobs"
                                    aria-selected="false">Deactive Jobs<span
                                        class="badge rounded-pill text-white badge-transparent">5</span> </a>
                            </li>
                        </ul>
                        <div>
                            <a href="#" class="btn btn-info text-white mb-3" data-toggle="modal" data-target=".job_filter">
                                <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i
                                        class="fas fa-filter mr-1 text-white"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all-jobs" role="tabpanel" aria-labelledby="pills-all-jobs">
                            <div class="table-responsive">
                                <table class="table table-striped overdue-table" id="table">
                                    <thead>
                                        <tr>
                                            <th>Job Title</th>
                                            <th>Position</th>
                                            <th>Salary</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Job Area</th>
                                            <th width="40">No of vacancy</th>
                                            <th>Company Details</th>
                                            <th>Created Date</th>
                                            <th width="100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="deposit">
                                            <td>Laravel Developer</td>
                                            <td>Web Development (PHP + Laravel)</td>
                                            <td>8000 - 15058</td>
                                            <td>2021-08-28</td>
                                            <td>2021-09-30</td>
                                            <td>Mota Varachha</td>
                                            <td>15</td>
                                            <td>
                                                <p class="d-inline-block mb-0" id="p1">Lb TechHub</p>
                                                <i class="far fa-copy ml-1" onclick="copyToClipboard('#p1')"></i>
                                                <br>
                                                <p class="d-inline-block mb-0" id="p2">info@lathiyabrothers.com</p>
                                                <i class="far fa-copy ml-1" onclick="copyToClipboard('#p2')"></i>
                                                <br>
                                                <i class="fab fa-whatsapp"></i>
                                                <p class="d-inline-block mb-0" id="p3">7486005611</p>
                                                <i class="far fa-copy ml-1" onclick="copyToClipboard('#p3')"></i>
                                                <br>
                                                <a href="#" target="_blank">https://lathiyabrothers.com/index.php</a>
                                            </td>
                                            <td>2021-08-28 13:22:25</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target=".job_status_remark" class="bg-success action-icon text-white btn-success" target="_blank"><i class="fas fa-check"></i></a>
                                                <a href="" data-toggle="modal" data-target=".job_suggestion" class="bg-orange action-icon text-white btn-orange" target="_blank"><i class="fas fa-question"></i></a>
                                                <a href="" data-toggle="modal" data-target=".job_details" class="bg-primary action-icon text-white btn-primary" target="_blank"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="notas">
                                            <td>Laravel Developer</td>
                                            <td>Web Development (PHP + Laravel)</td>
                                            <td>8000 - 15058</td>
                                            <td>2021-08-28</td>
                                            <td>2021-09-30</td>
                                            <td>Mota Varachha</td>
                                            <td>15</td>
                                            <td>
                                                <p class="d-inline-block mb-0" id="p1">Lb TechHub</p>
                                                <i class="far fa-copy ml-1" onclick="copyToClipboard('#p1')"></i>
                                                <br>
                                                <p class="d-inline-block mb-0" id="p2">info@lathiyabrothers.com</p>
                                                <i class="far fa-copy ml-1" onclick="copyToClipboard('#p2')"></i>
                                                <br>
                                                <i class="fab fa-whatsapp"></i>
                                                <p class="d-inline-block mb-0" id="p3">7486005611</p>
                                                <i class="far fa-copy ml-1" onclick="copyToClipboard('#p3')"></i>
                                                <br>
                                                <a href="#" target="_blank">https://lathiyabrothers.com/index.php</a>
                                            </td>
                                            <td>2021-08-28 13:22:25</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target=".job_status_remark" class="bg-success action-icon text-white btn-success" target="_blank"><i class="fas fa-check"></i></a>
                                                <a href="" data-toggle="modal" data-target=".job_suggestion" class="bg-danger action-icon text-white btn-danger" target="_blank"><i class="fas fa-ban"></i></a>
                                                <a href="" data-toggle="modal" data-target=".job_details" class="bg-primary action-icon text-white btn-primary" target="_blank"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="success">
                                            <td>Laravel Developer</td>
                                            <td>Web Development (PHP + Laravel)</td>
                                            <td>8000 - 15058</td>
                                            <td>2021-08-28</td>
                                            <td>2021-09-30</td>
                                            <td>Mota Varachha</td>
                                            <td>15</td>
                                            <td>
                                                <p class="d-inline-block mb-0" id="p1">Lb TechHub</p>
                                                <i class="far fa-copy ml-1" onclick="copyToClipboard('#p1')"></i>
                                                <br>
                                                <p class="d-inline-block mb-0" id="p2">info@lathiyabrothers.com</p>
                                                <i class="far fa-copy ml-1" onclick="copyToClipboard('#p2')"></i>
                                                <br>
                                                <i class="fab fa-whatsapp"></i>
                                                <p class="d-inline-block mb-0" id="p3">7486005611</p>
                                                <i class="far fa-copy ml-1" onclick="copyToClipboard('#p3')"></i>
                                                <br>
                                                <a href="#" target="_blank">https://lathiyabrothers.com/index.php</a>
                                            </td>
                                            <td>2021-08-28 13:22:25</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target=".job_status_remark" class="bg-success action-icon text-white btn-success" target="_blank"><i class="fas fa-check"></i></a>
                                                <a href="" data-toggle="modal" data-target=".job_suggestion" class="bg-orange action-icon text-white btn-orange" target="_blank"><i class="fas fa-question"></i></a>
                                                <a href="" data-toggle="modal" data-target=".job_details" class="bg-primary action-icon text-white btn-primary" target="_blank"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-pending-jobs" role="tabpanel"
                            aria-labelledby="pills-pending-jobs-tab">
                           
                        </div>
                        <div class="tab-pane fade" id="pills-active-jobs" role="tabpanel"
                            aria-labelledby="pills-active-jobs">
                        
                        </div>
                        <div class="tab-pane fade" id="pills-deactive-jobs" role="tabpanel"
                            aria-labelledby="pills-deactive-jobs">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade job_status_remark" tabindex="-1" role="dialog" aria-labelledby="job_status_remark"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="job_status_remark">JOB Deactive/Active Remarks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form action="">
                   <div class="form-group">
                        <textarea placeholder="Enter your remark..." class="form-control" rows="10"></textarea>
                    </div>
                    <button class="btn btn-primary">Active/Deactive</button>
               </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade job_suggestion" tabindex="-1" role="dialog" aria-labelledby="job_suggestion"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="job_suggestion">Suggestion for Jobs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form action="">
                   <div class="form-group">
                        <textarea placeholder="Enter your remark..." class="form-control" rows="10"></textarea>
                    </div>
                    <button class="btn btn-primary">Give Comments</button>
               </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade job_filter" tabindex="-1" role="dialog" aria-labelledby="job_filter"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="job_filter">Job Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group" data-children-count="1">
                                <label>Position For Applied</label>
                                <select class="form-control">
                                    <option>Select Position</option>
                                    <option>Position 1</option>
                                    <option>Position 2</option>
                                    <option>Position 3</option>
                                    <option>Position 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" data-children-count="1">
                                <label>Prefer Job Location</label>
                                <select class="form-control">
                                    <option>Select Prefer Job Location</option>
                                    <option>Location 1</option>
                                    <option>Location 2</option>
                                    <option>Location 3</option>
                                    <option>Location 4</option>
                                    <option>Location 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" data-children-count="1">
                                <label>Company Name</label>
                                <input type="text" class="form-control" placeholder="Company Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" data-children-count="1">
                                <label>Start Date</label>
                                <input type="date" class="form-control" placeholder="Start Date">
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group" data-children-count="1">
                                <label>End Date</label>
                                <input type="date" class="form-control" placeholder="End Date">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Filter" name="Filter">
                                <a class="btn btn-light text-dark ml-md-2" href="">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade job_details" tabindex="-1" role="dialog" aria-labelledby="job_details"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width:1440px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="job_details">JOB Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="jobs_table">
                    <div class="table-responsive">
                        <table class="table table-striped overdue-table" id="table">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Job Title</th>
                                    <th>Position</th>
                                    <th>Salary</th>
                                    <th width="170">Description</th>
                                    <th width="100">From To</th>
                                    <th>Job Area</th>
                                    <th>No of vacancy</th>
                                    <th width="120">Compnay Address</th>
                                    <th>Job Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Flexion Infotech</td>
                                    <td>Android Mobile App Developer</td>
                                    <td>Android - ( Android + API )</td>
                                    <td>8000 - 15058</td>
                                    <td>We are hiring Android Developer in Our Company Please share best Candidate Resume to us</td>
                                    <td>FROM :2021-08-31 TO :2021-09-30</td>
                                    <td>Mota Varachha</td>
                                    <td>5</td>
                                    <td>307-308 Tulasi arced near Sudama chock Motavarachha Surat</td>
                                    <td>
                                        <a href="" class="bg-danger action-icon text-white btn-danger" target="_blank"><i class="fas fa-ban"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="jobs_table mt-4">
                    <div class="table-responsive">
                        <table class="table table-striped overdue-table" id="table">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Job Title</th>
                                    <th>Reason</th>
                                    <th>Reason Remarks</th>
                                    <th>Given By</th>
                                    <th>Created By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Flexion Infotech</td>
                                    <td>Android Mobile App Developer</td>
                                    <td>Android - ( Android + API )</td>
                                    <td>We are hiring Android Developer in Our Company Please share best Candidate Resume to us</td>
                                    <td>Mota Varachha</td>
                                    <td>Mota Varachha</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
<script
    src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script
    src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script
    src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/owlcarousel2/dist/owl.carousel.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
<!-- JS Libraies -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- JS Libraies -->

<script type="text/javascript">
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).html()).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>

</body>

</html>