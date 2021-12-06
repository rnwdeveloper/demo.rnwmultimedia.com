<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
      <div class="extra_lead_menu">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 d-flex flex-wrap justify-content-between">
                <h6 class="page-title text-dark mb-3">Job Position</h6>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Jobs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Job Position</li>
                  </ol>
                </nav>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                      <div class="ml-auto">
                          <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".add_job_position">
                              <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i
                                      class="fa fa-plus text-white"></i></span>
                          </a>
                          <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".filter_job">
                              <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i
                                      class="fas fa-filter text-white"></i></span>
                          </a>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped normal-table" id="table1">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Main Category</th>
                            <th>Job Position</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Multimedia</td>
                            <td>Accounting</td>
                            <td>2020-07-20 22:53:56</td>
                            <td>
                              <a href="" data-toggle="modal" data-target=".add_job_position" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Multimedia</td>
                            <td>Accounting</td>
                            <td>2020-07-20 22:53:56</td>
                            <td>
                              <a href="" data-toggle="modal" data-target=".add_job_position" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Multimedia</td>
                            <td>Accounting</td>
                            <td>2020-07-20 22:53:56</td>
                            <td>
                              <a href="" data-toggle="modal" data-target=".add_job_position" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Multimedia</td>
                            <td>Accounting</td>
                            <td>2020-07-20 22:53:56</td>
                            <td>
                              <a href="" data-toggle="modal" data-target=".add_job_position" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
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
    </div>
  </div>
</div> 

<div class="modal fade add_job_position" tabindex="-1" role="dialog" aria-labelledby="add_job_position"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_job_position">Add Job Position Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Job Main Category</label>
                                <select class="form-control" name="" id="" >
                                  <option value="">Select Main Category</option>
                                  <option value="">Multimedia</option>
                                  <option value="">Designing</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Job Position Category</label>
                                <input type="text" class="form-control" placeholder="Job Position Category">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save" name="Save">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade filter_job" tabindex="-1" role="dialog" aria-labelledby="add_job_main_category"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_job_main_category">Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Main Category</label>
                                <input type="text" class="form-control" placeholder="Main Category">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Job Position</label>
                                <input type="text" class="form-control" placeholder="Job Position">
                            </div>
                        </div>
                        <div class="col-md-12 form-group" >
                            <label>Date From To </label> 
                            <input type="hidden" id="fromdate" name="filter_from_date" value="">
                            <input type="hidden" id="todate" name="filter_to_date" value="">
                            <div id="reportrange">
                                <i class="far fa-calendar-alt"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>

<!-- General JS Scripts -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script> 
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>

<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>

<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
$(function() {
   var start1=moment().subtract(1, 'days');
   var end1=moment();

    var start=""
     var end=""
    
    function cb(start, end) {
        $('#fromdate').val(start.format('YYYY-MM-DD'));
        $('#todate').val(end.format('YYYY-MM-DD'));
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
    }

    $('#reportrange').daterangepicker({
        startDate: start1,
        endDate: end1,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>


</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>