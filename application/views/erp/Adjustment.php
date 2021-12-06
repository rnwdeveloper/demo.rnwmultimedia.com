<?php //   print_r($_SESSION); die; 
 $all_per = explode(',',$_SESSION['p_permission']); 
?>
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

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
                    <?php 
                    $total =0;
                    for($i=0; $i<sizeof($Adjustment_list); $i++) {  
                      $total = $total + $Adjustment_list[$i]->paid_amount;
                    }?> 
                        <div class="d-flex flex-wrap justify-content-between">
                          <h4><strong>Total Collection :</strong></h4>
                          <h4>( Sub Total  <span class="text-primary">₹<?php setlocale(LC_MONETARY, 'en_IN'); $ammount = @money_format('%!i',$total);  ?> 
                            <?php echo $ammount; ?> /-</span> </h4>
                            <h4>Tax Amount <span class="text-primary">₹ 0/-</span></h4>
                          <h4>Income   <span class="text-success">₹<?php setlocale(LC_MONETARY, 'en_IN'); $ammount = @money_format('%!i',$total);  ?> 
                          <?php echo $ammount; ?> /-</span> )</h4> 
                        </div>  
                   
                    <div class="table-right-content mt-3 mt-md-0">

                        <button class="btn btn-info " tabindex="0" aria-controls="tableExport" data-toggle="modal" data-target=".filter-income"><span data-toggle="tooltip" data-placement="bottom" title="Filter"><i class="fas fa-filter mr-1"></i></span></button>
                        <!-- <button class="btn btn-info dropdown-toggle" tabindex="0" aria-controls="tableExport" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" data-placement="bottom" title="Task"><i class="fas fa-tasks mr-1"></i></span></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item text-dark" href="#">Lorem</a>
                            <a class="dropdown-item text-dark" href="#">Lorem</a>
                            <a class="dropdown-item text-dark" href="#">Lorem</a> 
                            <a class="dropdown-item text-dark" href="#">Lorem</a>
                        </div> -->
                        <button class="btn btn-info" tabindex="0" aria-controls="tableExport" id="btnExporttoExcel"><span data-toggle="tooltip" data-placement="bottom" title="Excel"><i class="far fa-file-excel mr-1"></i></span></button>
                        <button class="btn" tabindex="0" aria-controls="tableExport"><span><i class="fas fa-arrow-left mr-1"></i> Back</span></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped income-table tabel-ordered" id="table1">
                        <thead>
                          <tr>
                          <th>NO</th>
                          <th>Payer Detail</th>
                          <th width="150">Payment Details</th>
                          <th>Sub-Total Amt (₹)</th>
                          <th>Tax Amt (₹)</th>
                          <th>Total Amt (₹)</th>
                          <th>Pay & Admission Status</th>
                          <!-- <th width="100px">Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php $sno=1; foreach($Adjustment_list as $val) { ?>
                          <tr>
                            <td><?php echo $sno; ?></td>
                            <td>
                             <?php  echo $val->surname." ".$val->first_name."<br>". "<strong>GR ID : </strong>".$val->gr_id."<br>". "<strong>(RNW/Year </strong>".$val->year."/".$val->enrollment_number."<strong>)</strong>"."<br>";?>
                             <?php $branch_ids = explode(",",$val->branch_id);
                                   foreach($list_branch as $ba) { if(in_array($ba->branch_id,$branch_ids)) {  echo "<strong>Branch : </strong>".$ba->branch_name."<br>"; }  } ?>
                                <?php if($val->type=="single") { ?>
                                  <?php $coids = explode(",",$val->course_id);
                                   foreach($list_course as $co) { if(in_array($co->course_id,$coids)) {  echo "<strong>Co : </strong>".$co->course_name; }  } ?>
                                <?php } else if($val->type=="package") { ?>
                                  <?php $paids = explode(",",$val->package_id);
                                   foreach($list_package as $po) { if(in_array($po->package_id,$paids)) {  echo "<strong>Pa : </strong>".$po->package_name; }  } ?>
                                <?php } else { ?>
                                  <?php $clgids = explode(",",$val->college_courses_id);
                                   foreach($list_clg_course as $clg) { if(in_array($clg->college_courses_id,$clgids)) {  echo "<strong>Clg : </strong>".$clg->college_course_name; }  } ?>
                               <?php } ?>
                              </td>
                            <td>
                              <b><?php echo "Student Fees"."<br>"; ?></b>
                              <?php echo "<strong>P : </strong>".$val->pay_date."<br>"; ?>
                              <?php echo "<strong>C : </strong>".$val->pay_date."<br>";?>
                              <?php echo "<strong>Pay Mode By : </strong>".$val->payment_mode."<br>"; ?>
                              <!-- <?php echo "<strong>Received By : </strong>".$val->received_by; ?> -->
                            </td>
                            <td><?php echo $val->paid_amount; ?></td>
                            <td>0</td>
                            <td><?php echo $val->paid_amount; ?></td>
                            <td><a href="#" class="btn btn-success text-white">Adjustment Payment</a></td>
                            <!-- <td>
                              <a href="#" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-eye"></i></a>
                              <a href="#" class="bg-primary action-icon text-white btn-primary"><i class="far fa-edit"></i></a> 
                              <a href="#" class="bg-danger action-icon text-white btn-danger" id="swal-6"><i class="far fa-trash-alt"></i></a>
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
  <div class="modal fade filter-income" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myLargeModalLabel">Search</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <form method="post" action="<?php  echo base_url(); ?>Account/Adjustment">
         <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputEmail4">GR Id</label>
            <input type="text" class="form-control" id="" name="filter_gr_id" value="<?php if(!empty($filter_gr_id)) { echo @$filter_gr_id ; } ?>"  placeholder="GR ID">
          </div>
           <div class="form-group col-md-3">
            <label for="inputPassword4">Enrollment NO</label>
            <input type="text" class="form-control" id="" name="filter_enrollnno" value="<?php if(!empty($filter_enrollnno)) { echo @$filter_enrollnno; } ?>" placeholder="Enrollment No">
          </div>
          <div class="form-group col-md-3">
          <label for="inputState">Brnach</label>
          <select id="inputState" class="form-control branchids pbids" name="filter_branch" id="filter_branch">
            <option value="">Select Barnch</option>
           <?php foreach($list_branch as $ld) { ?>
            <option <?php if(@$filter_branch==$ld->branch_id) { echo "selected"; } ?> value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="inputState">Course</label>
          <select id="inputState" class="form-control co" name="filter_course" id="filter_course">
            <option value="">Select Course</option>
           <?php foreach($list_course as $lp) { ?>
            <option <?php if(@$filter_course==$lp->course_id) { echo "selected"; } ?> value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
            <?php } ?>
          </select>
        </div>
         <div class="form-group col-md-3">
          <label for="inputState">Package</label>
          <select id="inputState" class="form-control pa" name="filter_package" id="filter_package">
            <option value="">Select Package</option>
           <?php foreach($list_package as $lp) { ?>
            <option <?php if(@$filter_package==$lp->package_id) { echo "selected"; } ?> value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="inputState">Clg Course</label>
          <select id="inputState" class="form-control" name="filter_clg" id="filter_clg">
            <option value="">Select Course</option>
           <?php foreach($list_clg_course as $clg) { ?>
            <option <?php if(@$filter_clg==$clg->college_courses_id) { echo "selected"; } ?> value="<?php echo $clg->college_courses_id; ?>"><?php echo $clg->college_course_name; ?></option>
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
         <div class="text-right">
          <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
          <input type="submit" class="btn btn-primary" value="Filter" name="filter_Adjustment_fees">
          <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>Account/Adjustment">Reset</a>  
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>  
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/js/table2excel.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/sweetalert/sweetalert.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/sweetalert.js"></script>
  <!-- JS Libraies -->
  <script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script> 
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script> 
<!-- Page Specific JS File -->
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script> 
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
            $(function () {    
                $("#btnExporttoExcel").click(function () {    
                    $("#table1").table2excel({    
                        filename: "Income-data.xls"    
                    });    
                });    
            });    
    </script>  
<script type="text/javascript">
$('.branchids').change(function(){
   
   var branch_id = $('.branchids').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_single_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
      $('.co').html(data);
     }
    });
   });

   $('.pbids').change(function(){
   var branch_id = $('.pbids').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_package_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
       $('.pa').html(data);
     }
    });
   });

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

$(function() {
        $('#table1').DataTable({
            stateSave: true,
            "bDestroy": true
        })
    }) 
</script>

  </body> 
</html>