<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
 <link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
      <div class="extra_lead_menu">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 d-flex flex-wrap justify-content-between">
                <h6 class="page-title text-dark mb-3">Student Applied Jobs</h6>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Jobs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Student Applied Jobs</li>
                  </ol>
                </nav>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-header-action ml-auto">
                      <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".job_filter">
                        <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i class="fas fa-filter mr-1 text-white"></i></span>
                      </a>
                    </div>
                  </div>
                  
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped normal-table" id="table1">
                        <thead>
                          <tr>
                            <th>App. ID</th>
                            <th>GRID</th>
                            <th width="300px">Company Information</th>
                            <th>JOb Name</th>
                            <th>Student Information</th>
                            <th>Resume</th>
                            <th class="text-center">Response</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach($Applied_jobs as $val) { 
                            if($val->student_id != '0'){?>
                          <tr>
                            <td><?php echo $val->applied_id ; ?></td>
                            <td><?php echo $val->student_id; ?></td>
                            <td>
                              <strong><?php echo $val->co_name; ?></strong><br>
                              <strong class="text-success"><i class="fab fa-whatsapp"></i></strong>
                              <span class="text-primary"><?php echo $val->co_number;?></span><br>
                              <?php echo $val->co_address; ?><br>
                              <a href="<?php echo $val->url; ?>" target="_blank"><?php echo $val->url?></a>
                            </td>
                            <td>
                              <p class="d-inline-block mb-0"><?php echo $val->job_name;?></p>
                              <a href="#" class="bg-light action-icon btn-light text-dark"><?php echo $val->no_of_vacancy;  ?></a>
                            </td>
                            <td>
                                <strong><?php echo $val->name; ?></strong><br>
                                <a href="<?php echo $val->email; ?>"><?php echo $val->email; ?></a><br>
                                <i class="fab fa-whatsapp text-success"></i>
                                <?php echo "91".$val->number; ?><br>
                                <?php echo $val->skill ; ?>
                            </td>
                            <td>
                              <!-- <a href="javascript:get_resume(<?php echo $val->applied_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="far fa-eye"></i></a> -->
                              <a target="_blank" href="<?php echo base_url(); ?>student_placement/resumes/<?php echo $val->resume; ?>" class="bg-primary action-icon text-white btn-primary"><i class="far fa-eye"></i></a>
                            </td>
                            <td class="text-center">
                              <!-- <a data-toggle="tooltip" data-placement="top" title="<?php echo $val->response; ?>"><i class="fa fa-reply <?php echo $val->response; ?>"> text-primary" aria-hidden="true"></i></a> -->
                              <a><span style="color:blue"data-toggle="tooltip" data-placement="top" title="<?php if(!empty($val->response)) { echo "$val->response"; } else { echo "No responce Available"; } ?>"><i class="fa fa-reply" aria-hidden="true"></i></span></a>
                            </td>
                            <td>
                            <?php if($val->status == '1') { ?>
                              <a href="javascript:co_status_upd(<?php echo $val->applied_id; ?>,0)" class="btn btn-success btn-sm text-white rounded-pill">Active</a>
                              <?php } else { ?>
                                <a href="javascript:co_status_upd(<?php echo $val->applied_id; ?>,1)" class="btn btn-danger btn-sm text-white rounded-pill">Deactive</a>
                                <?php }?>
                            </td>
                          </tr>
                          <?php } } ?>
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
<!-- resume modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Resume</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="follow_table">
        
      </div>
    </div>
  </div>
</div>
<!-- Small Modal -->
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
                <form method="post" action="<?php echo base_url(); ?>JobController/lms_student_applied_job">
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" name="filter_company" placeholder="Company Name" value="<?php if(!empty($filter_company)) { echo $filter_company; } ?>">
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" class="form-control" name="filter_fname" placeholder="Student Name" value="<?php if(!empty($filter_fname)) { echo $filter_fname; } ?>" >
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <label>Company Mobile No</label>
                                <input type="text" class="form-control" name="filter_company_mobile_no" placeholder="+91-00000-00000" value="<?php if(!empty($filter_company_mobile_no)) { echo $filter_company_mobile_no; } ?>" >
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <label>Student Mobile No</label>
                                <input type="text" class="form-control" name="filter_mobile" placeholder="+91-00000-00000" value="<?php if(!empty($filter_mobile)) { echo $filter_mobile; } ?>">
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <label>GR No</label>
                                <input type="text" class="form-control" name="filter_grId" placeholder="Filter GR No" value="<?php if(!empty($filter_gr_id)) { echo $filter_gr_id; } ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Filter" name="Filter">
                                <input type="reset" class="btn btn-light text-dark ml-md-2" value="Reset" name="reset">
                                <!-- <a class="btn btn-light text-dark ml-md-2" href="">Reset</a> -->
                            </div>
                        </div>
                    </div>
                </form>
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
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
 <script>
     function co_status_upd(applied_id, status) {
        $.ajax({
          url: "<?php echo base_url(); ?>JobController/active_recruiter_jobs",
          type: "post",
          data: {
            'id': applied_id,
            'status': status,
            'table': 'student_applied_job',  
            'field': 'status',
            'check_field': 'applied_id'
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! status is changed......',
                position: 'topRight'
              }));


                setTimeout(function() {
                location.reload();
                }, 2020);
            } else if (ddd == '2') {
              $('#msg').html(iziToast.error({
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


      function get_resume(applied_id){
        
        $('.bd-example-modal-lg').modal();
        $.ajax({
       url: "<?php echo base_url(); ?>JobController/get_resume",
       type: "post",
       data: {
           'id': applied_id,
       },
       success: function(Resp) {
           $('#follow_table').html(Resp);
       }
       });
  }



     </script>



</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>