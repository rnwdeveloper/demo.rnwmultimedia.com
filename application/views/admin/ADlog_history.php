<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.css">
 <link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12"> 
                    <div class="d-flex justify-content-end">
                        <div class="table-right-content">
                            <button class="btn btn-info py-2" data-toggle="modal" data-target=".filter-history">
                            <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i class="fas fa-filter mr-1"></i></span> 
                            </button> 
                            <button class="btn text-dark">
                            <span><i class="fas fa-arrow-left mr-1"></i> Back</span> 
                            </button>
                        </div> 
                    </div> 
                    <div class="card mt-3 card-primary">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="pc-details p-4">
                                    <h6 class="text-primary">MILAN BHUT</h6>
                                    <h6>49.36.91.186</h6>
                                    <h6>Computer</h6>
                                    <h6>Windows 10</h6>
                                    <h6>Chrome</h6>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="history-detail">
                                    <table class="table table-bordered mb-0">
                                        <tr>
                                            <th>Total Log</th>
                                            <th class="text-center">Count</th>
                                            <th>Time</th>
                                        </tr>
                                        <tr>
                                            <td>show dashboard</td>
                                            <td class="text-center">2</td>
                                            <td>00:01:12</td>
                                        </tr>
                                        <tr>
                                            <td>user page open</td>
                                            <td class="text-center">2</td>
                                            <td>00:01:12</td>
                                        </tr>
                                        <tr>
                                            <td>login success	</td>
                                            <td class="text-center">2</td>
                                            <td>00:01:12</td>
                                        </tr>
                                        <tr>
                                            <td>Log history page open</td>
                                            <td class="text-center">2</td>
                                            <td>00:01:12</td>
                                        </tr>
                                        <tr>
                                            <td>Logout time page open</td>
                                            <td class="text-center">2</td>
                                            <td>00:01:12</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="card mt-3 card-primary">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="pc-details p-4">
                                    <h6 class="text-primary">MILAN BHUT</h6>
                                    <h6>49.36.91.186</h6>
                                    <h6>Computer</h6>
                                    <h6>Windows 10</h6>
                                    <h6>Chrome</h6>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="history-detail">
                                    <table class="table table-bordered mb-0">
                                        <tr>
                                            <th>Total Log</th>
                                            <th class="text-center">Count</th>
                                            <th>Time</th>
                                        </tr>
                                        <tr>
                                            <td>login success	</td>
                                            <td class="text-center">2</td>
                                            <td>00:01:12</td>
                                        </tr>
                                        <tr>
                                            <td>Log history page open</td>
                                            <td class="text-center">2</td>
                                            <td>00:01:12</td>
                                        </tr>
                                        <tr>
                                            <td>Logout time page open</td>
                                            <td class="text-center">2</td>
                                            <td>00:01:12</td>
                                        </tr>
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


<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>  
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>  
  <!-- JS Libraies --> 
  <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>  
  <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script> 
  <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script> 
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
  <!-- JS Libraies --> 
  <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
  <!-- JS Libraies --> 
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
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
</html>