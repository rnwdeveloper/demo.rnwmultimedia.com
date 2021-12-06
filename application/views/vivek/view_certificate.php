<link href="https://fonts.googleapis.com/css2?family=Lustria&display=swap" rel="stylesheet">
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="extra_lead_menu">
                <div class="col-12 d-flex justify-content-between mb-3">
                    <h6 class="page-title text-dark mb-3">Certificate Request</h6>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Certificate</li>
                        </ol>
                    </nav>
                </div>
                <section class="section">
                    <div class="section-body">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav active_tab" id="pills-tab" role="tablist">
                                        <li class="nav-item mr-2">
                                            <a class="nav-link btn btn-primary shadow-none active" id="pills-certificate-request-tab" data-toggle="pill" href="#pills-certificate-request" role="tab" aria-controls="pills-certificate-request" aria-selected="true">Certificate Request</a>
                                        </li>
                                        <li class="nav-item mr-2">
                                            <a class="nav-link btn btn-primary shadow-none" id="pills-cconfirm-ertificate-request-tab" data-toggle="pill" href="#pills-cconfirm-ertificate-request" role="tab" aria-controls="pills-cconfirm-ertificate-request" aria-selected="false">Confirm Certificate Request</a>
                                        </li>
                                    </ul>
                                    <div class="card-header-form ml-auto"> 
                                        <button class="btn btn-info" data-toggle="modal" data-target=".add_certificate_request_modal"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade active show" id="pills-certificate-request" role="tabpanel" aria-labelledby="pills-certificate-request-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped normal-table" id="table1">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>GR ID</th>
                                                            <th>Student Name</th>
                                                            <th>Course</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Certificate Name</th>
                                                            <th>Grade</th>
                                                            <th>Request Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>2941</td>
                                                            <td>Vivek Dhorajiya</td>
                                                            <td>Web Design</td>
                                                            <td>20-8-2021</td>
                                                            <td>20-11-2021</td>
                                                            <td>Web Designing</td>
                                                            <td>A</td>
                                                            <td>21-11-2021</td>
                                                            <td>
                                                                <a href="#" class="bg-success action-icon text-white btn-success" target="_blank"><i class="fas fa-check"></i></a>
                                                                <a href="#" class="bg-danger action-icon text-white btn-danger" target="_blank"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-cconfirm-ertificate-request" role="tabpanel" aria-labelledby="pills-cconfirm-ertificate-request-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped normal-table" id="table1">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>GR ID</th>
                                                            <th>Student Name</th>
                                                            <th>Course</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Certificate Name</th>
                                                            <th>Grade</th>
                                                            <th>Request Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>2941</td>
                                                            <td>Vivek Dhorajiya</td>
                                                            <td>Web Design</td>
                                                            <td>20-8-2021</td>
                                                            <td>20-11-2021</td>
                                                            <td>Web Designing</td>
                                                            <td>A</td>
                                                            <td>21-11-2021</td>
                                                            <td>
                                                                <a href="#" class="bg-primary action-icon text-white btn-primary" target="_blank"><i class="fas fa-eye"></i></a>
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
                </section>
            </div>
        </div>
    </div>
</div>

<div class="modal fade add_certificate_request_modal" tabindex="-1" role="dialog" aria-labelledby="add_certificate_request_modal" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_certificate_request_modal">Add Certificate Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="https://demo.rnwmultimedia.com/Account/overdue_fees">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">GR ID</label>
                            <input type="text" class="form-control" placeholder="Enter GR ID">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Student Name</label>
                            <input type="text" class="form-control" placeholder="Student Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Course name</label>
                            <input type="text" class="form-control" placeholder="Course name">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Start Date</label>
                            <input type="date" class="form-control" placeholder="Start Date">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">End Date</label>
                            <input type="date" class="form-control" placeholder="End Date">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Issue Date</label>
                            <input type="date" class="form-control" placeholder="Issue Date">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Certificate Name</label>
                            <input type="text" class="form-control" placeholder="Certificate Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Grade</label>
                            <input type="text" class="form-control" placeholder="Enter Grade">
                        </div>
                    </div>
                    <div class="text-right">                   
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
   
   <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>

    <!-- General JS Scripts -->
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!--Excel Download-->
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/table2excel.js"></script> 
    <script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
    <script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script> 
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>
    <script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File --> 


    <!-- <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script> -->

    <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>

    <!-- JS Libraies -->
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script> 
    <!-- Page Specific JS File --> 


</body>
 
</html>