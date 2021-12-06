<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<div class="loader"></div>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
      <section class="section">
        <div class="section-body">
          <div class="row">
            <div class="col-12">
              <div class="card"> 
                <div class="card-header d-flex justify-content-between income-wrapper">
                  <?php $total = 0;
                  for ($i = 0; $i < sizeof($erp_receipt_list); $i++) {
                    @$total = $total + $erp_receipt_list[$i]->pay_now;
                  } ?>
                  <?php $gsttotal = 0;
                  for ($i = 0; $i < sizeof($erp_receipt_list); $i++) {
                    @$gsttotal = $gsttotal + $erp_receipt_list[$i]->gst_amount;
                  } ?>

                  <div class="d-flex flex-wrap justify-content-between">
                    <h4><strong>Receipt List Collection :</strong></h4>
                    <h4>( Total :- <span class="text-success">₹<?php setlocale(LC_MONETARY, 'en_IN');
                                                                echo @money_format('%!i', $total);  ?>
                        /-</span> </h4>
                    <h4> Gst :- <span class="text-primary">₹<?php setlocale(LC_MONETARY, 'en_IN');
                                                            echo @money_format('%!i', $gsttotal);  ?>
                        /-</span> )</h4>
                  </div>

                  <div class="table-right-content mt-3 mt-md-0">
                    <button class="btn btn-info " tabindex="0" aria-controls="tableExport" data-toggle="modal" data-target=".bd-example-modal-lg"><span data-toggle="tooltip" data-placement="bottom" title="Filter"><i class="fas fa-filter mr-1"></i></span></button>
                    <button class="btn btn-info" tabindex="0" aria-controls="tableExport" id="btnExporttoExcel"><span data-toggle="tooltip" data-placement="bottom" title="Excel"><i class="far fa-file-excel mr-1"></i></span></button>
                    <button class="btn" tabindex="0" aria-controls="tableExport"><span><i class="fas fa-arrow-left mr-1"></i> Back</span></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped income-table" id="table1">
                      <thead>
                        <tr>
                          <!-- <th class="p-2">
                            <div class="custom-checkbox custom-checkbox-table custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th> -->
                          <th>SN</th>
                          <th>Details 1</th>
                          <th>Student Details</th>
                          <th>Amount</th>
                          <th>GST</th>
                          <th>Status</th>
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php $sno = 1;
                        foreach ($erp_receipt_list as $val) {  ?>
                          <tr class="notas">
                            <!-- <td>
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkboxx-<?php echo $sno; ?>" 
                                name="admissin_receipt_ids" value="<?php echo $val->admissin_receipt_id; ?>">
                                <label for="checkboxx-<?php echo $sno; ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td> -->
                            <td><?php echo $sno; ?></td>
                            <td>
                              <div><b>Receipt No :-</b> <?php echo $val->receipt_no ?></div>
                              <div><b>Pay Date :-</b> <?php echo $val->receipt_date ?></div>
                            </td>
                            <td>
                            <div><b>Gr Id :- </b> <?php echo $val->gr_id ?></div>
                            <div><b>Enrollment No :- </b> <?php echo $val->enrollment_no ?></div>
                            <div><b>Name :- </b>    <?php $adids = explode(",", $val->admission_id);
                              foreach ($list_admission_proccess as $ad) {
                                if (in_array($ad->admission_id, $adids)) {
                                  echo $ad->surname . " ";
                                }
                              }
                              foreach ($list_admission_proccess as $ad) {
                                if (in_array($ad->admission_id, $adids)) {
                                  echo $ad->first_name;
                                }
                              }
                              ?></div>
                            <div><b>Course :- </b> 
                            <?php $coids = explode(",", $val->course_id);
                              foreach ($list_course as $co) {
                                if (in_array($co->course_id, $coids)) {
                                  echo "Single : " . $co->course_name;
                                }
                              } ?>

                              <?php $paids = explode(",", $val->package_id);
                              foreach ($list_package as $po) {
                                if (in_array($po->package_id, $paids)) {
                                  echo "Package : " . $po->package_name;
                                }
                              } ?>

                              <?php $clgids = explode(",", $val->college_courses_id);
                              foreach ($list_college_courses as $clg) {
                                if (in_array($clg->college_courses_id, $clgids)) {
                                  echo "Clg : " . $clg->college_course_name;
                                }
                              } ?>
                              </div>
                            </td>
                            <td>
                            <?php echo $val->pay_now; ?>
                            </td>
                            <td><?php echo $val->gst_amount; ?></td>
                            <td>
                            <?php if (
                                $val->payment_mode == "Credit Card" || $val->payment_mode == "Debit Card" || $val->payment_mode == "Online Payment"
                                || $val->payment_mode == "Paytm" || $val->payment_mode == "Banck Deposit (Cash)" || $val->payment_mode == "Capital Float (EMI)"
                                || $val->payment_mode == "Google Pay" || $val->payment_mode == "Phone Pay" || $val->payment_mode == "Bajaj Finserv (EMI)"
                                || $val->payment_mode == "Bhim UPI(India)" || $val->payment_mode == "Instamojo" || $val->payment_mode == "Paypal"
                                || $val->payment_mode == "Razorpay"
                              ) { ?>
                                <?php echo "<b>Transaction No : </b>" . $val->transaction_no . "<br>" ?>
                                <?php echo "<b>Transaction Date : </b>" . $val->transaction_date; ?>
                              <?php }  else if ($val->payment_mode == "Cheque" || $val->payment_mode == "DD") { ?>
                                <?php echo "<b>Bank Name : </b>" . $val->bank_name . "<br>" ?>
                                <?php echo "<b>Bank Branch Name : </b>" . $val->bank_branch_name . "<br>" ?>
                                <?php echo "<b>Cheque Holder Name : </b>" . $val->cheque_holder_name . "<br>" ?>
                                <?php echo "<b>Cheque No : </b>" . $val->cheque_no . "<br>" ?>
                                <?php echo "<b>Cheque Date : </b>" . $val->cheque_date; ?>
                              <?php } else if ($val->payment_mode == "NEFT / IMPS") {  ?>
                                <?php echo "<b>Bank Name : </b>" . $val->bank_name . "<br>" ?>
                                <?php echo "<b>Bank Branch Name : </b>" . $val->bank_branch_name . "<br>" ?>
                                <?php echo "<b>Transaction No : </b>" . $val->transaction_no . "<br>" ?>
                                <?php echo "<b>Transaction Date : </b>" . $val->transaction_date; ?>
                              <?php } else { ?>
                                <?php echo $val->ramrk_by; ?>
                              <?php } ?>
                            </td>
                            <!-- <td>
                              <a href="<?php echo base_url(); ?>Admission/receipt_view?action=hjkl&qwxy=<?php echo @$val->intallment_id; ?>" 
                                  class="bg-primary action-icon text-white btn-primary" target="_blank"><i class="fas fa-eye"></i></a>
                                  <a href="#" class="bg-danger action-icon text-white btn-danger" onclick='check_selectedvalue()'><i class="far fa-trash-alt">
                                    </i></a>
                            </td> -->
                          </tr>
                        <?php $sno++; } ?>
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

<!-- Large modal -->
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
        <form method="post" action="<?php echo base_url(); ?>Account/erpdlt_receipt_list">
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputPassword4">Receipt No</label>
              <input type="text" class="form-control" id="" name="filter_receipt_no" value="<?php if (!empty($filter_receipt_no)) {
                                                                                              echo @$filter_receipt_no;
                                                                                            } ?>" placeholder="Receipt No">
            </div>
            <div class="form-group col-md-3">
              <label for="inputPassword4">GR Id</label>
              <input type="text" class="form-control" id="" name="filter_gr_id" value="<?php if (!empty($filter_gr_id)) {
                                                                                          echo @$filter_gr_id;
                                                                                        } ?>" placeholder="GR Id">
            </div>
            <div class="form-group col-md-3">
              <label for="inputPassword4">Enrollment NO</label>
              <input type="text" class="form-control" id="" name="filter_enrollnno" value="<?php if (!empty($filter_enrollnno)) {
                                                                                              echo @$filter_enrollnno;
                                                                                            } ?>" placeholder="Enrollment No">
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Brnach</label>
              <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
                <option value="">Select Barnch</option>
                <?php foreach ($list_branch as $ld) { ?>
                  <option <?php if (@$filter_branch == $ld->branch_id) {
                            echo "selected";
                          } ?> value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Course</label>
              <select id="inputState" class="form-control" name="filter_course" id="filter_course">
                <option value="">Select Course</option>
                <?php foreach ($list_course as $lp) { ?>
                  <option <?php if (@$filter_course == $lp->course_id) {
                            echo "selected";
                          } ?> value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Package</label>
              <select id="inputState" class="form-control" name="filter_package" id="filter_package">
                <option value="">Select Package</option>
                <?php foreach ($list_package as $lp) { ?>
                  <option <?php if (@$filter_package == $lp->package_id) {
                            echo "selected";
                          } ?> value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6 form-group" >
                      <label>Date From To </label> 
                <input type="hidden" id="fromdate" name="filter_from_date" value="<?php if(!empty($filter_from_date)) { echo @$filter_from_date; } ?>">
                <input type="hidden" id="todate" name="filter_to_date" value="<?php if(!empty($filter_to_date)) { echo @$filter_to_date; } ?>">
                <div id="reportrange" >
                <i class="far fa-calendar-alt"></i>&nbsp;
                    <span><?php if(!empty($filter_from_date) && !empty($filter_to_date)) { echo @$filter_from_date." - ".$filter_to_date; } ?></span> <i class="fa fa-caret-down"></i>
                </div>
            </div> 
             
          </div>
          <div class="text-right mt-2">
            <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
            <input type="submit" class="btn btn-primary" value="Filter" name="filter_receipt_record">
            <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>Account/erpdlt_receipt_list">Reset</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal deleted status -->
<div class="modal fade" id="receipt_deleted_modal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Delete For Reason</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="deleted_status_msg"></div>
        <div class="form-group">
          <label>Remarks</label>
          <textarea name="remarks" id="remarks" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="status_deleted" id="status_deleted" value="Submit">
      </div>
    </div>
  </div>
</div>
 

<!-- Page Specific JS File -->

 
<!-- Page Specific JS File -->


<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<!-- JS Libraies --> 

<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
<!-- JS Libraies -->

<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/table1excel.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript">    
            $(function () {    
                $("#btnExporttoExcel").click(function () {    
                    $("#table1").table1excel({    
                        filename: "ReceiptDlt_List.xls"    
                    });    
                });    
            });    
    </script> 
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

<script>
        var picker = new Lightpick({
          field: document.getElementById('demo-1'),
        onSelect: function(date){
        document.getElementById('result-1').innerHTML = date.format('Do MMMM YYYY');
    }
});
    </script>
<script>  
  $('#status_deleted').on('click', function() {

    var admissin_receipt_id = [];

    $('input[name=admissin_receipt_ids]:checked').map(function() {
      admissin_receipt_id.push($(this).val());
    });
    var remarks = $('#remarks').val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>Account/deleted_status_receipt",
      data: {
        'admissin_receipt_id': admissin_receipt_id,
        'remarks': remarks
      },
      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        if (ddd == '1') {
          $('#deleted_status_msg').html(iziToast.success({
            title: 'Success',
            timeout: 2000,
            message: 'Deteted This Record.',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        } else {
          $('#deleted_status_msg').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2000,
            message: 'Someting Wrong!!',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }
      }
    });
    return false;
  });
</script>
<script>
  function check_selectedvalue() {
    var id = "";
    var items = document.getElementsByName('admissin_receipt_ids');
    for (var i = 0; i < items.length; i++) {
      if (items[i].type == 'checkbox') {
        if (items[i].checked) {
          if (id == "") {
            id = items[i].value;
          } else {
            id = id + "," + items[i].value;
          }
        }
      }
    }

    if (id != "") {
      $('#id').val(id);
      $('#receipt_deleted_modal').modal("show").on('click', '#updateok', function(e) {

      });
    } else {
      alert("Please Select Row");
    }
  }
</script>
<script>
$(function() {
        $('#table1').DataTable({
            stateSave: true,
            "bDestroy": true
        })
    }) 
</script>

</body>
</html>