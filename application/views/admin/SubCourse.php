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
            <h6 class="page-title text-dark mb-3">SubCourse</h6>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">SubCourse</li>
              </ol>
            </nav>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between income-wrapper">
                <div class="d-flex justify-content-between">
                </div>
                <div class="table-right-content">
                  <button href="#" class="btn btn-info" data-toggle="modal" data-target="#createsubcourse" onclick="resetval()">
                    <span><i class="fas fa-plus mr-1"></i></span>
                  </button>
                  <button href="#" class="btn btn-info" data-toggle="modal" data-target="#filtersubcourse">
                    <span><i class="fas fa-filter mr-1"></i></span>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="msg"></div>
                <div class="table-responsive">
                  <table class="table table-striped normal-table branch-table" id="table1">
                    <thead>
                      <tr>
                        <th class="p-0 text-center">
                          <div class="custom-checkbox custom-checkbox-table custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                          </div>
                        </th>
                        <th>SN</th>
                        <th>Course Name</th>
                        <th>Sub-Course Name</th>
                        <th>Code</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Shining Sheet</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sno = 1;
                      foreach ($subcourse_all as $val) { ?>
                        <tr>
                          <td class="text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?php echo $sno; ?>" name="mark" value="<?php echo $val->subcourse_id; ?>">
                              <label for="checkbox-<?php echo $sno; ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?php echo $sno; ?></td>
                          <td>
                          <?php $courseids = explode(",", $val->course_id);
                            foreach ($course_all as $row) {
                              if (in_array($row->course_id, $courseids)) {
                                echo $row->course_name;
                              }
                            } ?>
                          </td>
                          <td><?php echo $val->subcourse_name; ?></td>                         
                          <td><?php echo $val->subcourse_code; ?></td>                                          
                          <td>
                            <strong>Fees :</strong> <span><?php echo $val->fees; ?></span> </br>
                            <strong>Duration :</strong> <span><?php echo $val->duration." - Month"; ?></span> </br>
                            <strong>Installment :</strong> <span><?php echo $val->installment; ?></span> </br>
                            <strong>Percentage :</strong> <span><?php echo $val->percentage; ?></span> </br>
                            <strong>job_guarantee :</strong> <span><?php echo $val->job_guarantee; ?></span>
                          </td>
                          <td>
                          <?php if($val->subcourse_status=="0") { ?>
                          <a class="badge badge-success text-white">Active</a>
                          <?php } else { ?>
                          <a class="badge badge-danger text-white">Disable</a>
                          <?php } ?>
                          </td>
                          <td><?php echo $val->created_by; ?></td>     
                          <td>
                            <?php if(!empty($val->shining_sheet)) {  ?>
                              <a target="_blank" href="<?php echo base_url(); ?>dist/signsheet/<?php echo $val->shining_sheet; ?>" class="bg-primary action-icon text-white btn-primary"><i class="far fa-eye"></i></a>
                              <?php } else {  ?>
                                <?php echo "No Sheet Available"; ?> 
                              <?php } ?>
                          </td>                        
                          <td>
                            <div class="dropdown">
                              <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                              <div class="dropdown-menu">
                                <?php $xx = $val->subcourse_id; ?>
                                <a class="dropdown-item has-icon" href="javascript:co_upd(<?php echo $xx; ?>)">
                                  <i class="far fa-edit"></i> Edit
                                </a>
                                <a class="dropdown-item has-icon text-danger" href="javascript:remove_co(<?php echo $xx; ?>)">
                                  <i class="far fa-trash-alt"></i> Delete
                                </a>
                                <?php if ($val->subcourse_status == 0) { ?>
                                  <a class="dropdown-item has-icon" href="javascript:co_status_upd(<?php echo $xx; ?>, 1)">
                                    <i class="fas fa-ban"></i> Disable
                                  </a>
                                <?php } else {  ?>
                                  <a class="dropdown-item has-icon" href="javascript:co_status_upd(<?php echo $xx; ?>, 0)">
                                    <i class="far fa-check-circle"></i> Active
                                  </a>
                                <?php } ?>
                              </div>
                          </td>
                        </tr>
                      <?php $sno++;
                      } ?>
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

  <!-- Create course -->
  <div class="modal fade" id="createsubcourse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Create SubCourse</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" class="document-createmodal" method="post" name="subcourse_add" id="subcourse_add">
          <input type="hidden" name="subcourse_id" id="subcourse_id" class="form-control">
          <div class="modal-body">
            <div class="card">
              <div class="branch-items row mb-2">
                <div class="form-group col-md-4 col-sm-12">
                  <label for="">Course:<span style="color: red;">*</span></label>
                  <select class="form-control" name="course_id" id="course_id" required>
                    <option>Select Course</option>
                    <?php foreach($course_all as $val) { ?>
                      <option value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                  <label for="pwd">Sub-Course Name:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="subcourse_name" name="subcourse_name" placeholder="Enter SubCourse Name" required>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                  <label for="pwd">Sub-Course Code:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="subcourse_code" name="subcourse_code" placeholder="Enter SubCourse Code" required>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                  <label for="pwd">Fees:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="fees" name="fees" placeholder="Enter Course Fees" required>
                </div>   
                <div class="form-group col-md-4 col-sm-12">
                  <label for="pwd">Duration:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="duration" name="duration" placeholder="Enter Course Duration" required>
                </div> 
                <div class="form-group col-md-4 col-sm-12">
                  <label for="pwd">Installment:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="installment" name="installment" placeholder="Enter No-OF-Installment" required>
                </div>      
                <!-- <div class="form-group col-md-4 col-sm-12">
                  <label for="pwd">Percentage:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="percentage" name="percentage" placeholder="Enter Percentage">
                </div>  -->
                <div class="form-group col-md-4 col-sm-12">
                <label class="d-block">Job-Guarantee:<span style="color: red;">*</span></label>
                <div class="pretty p-icon p-jelly p-round p-bigger">
                <input class="form-check-input" type="radio" name="job_guarantee" id="job_guarantee_yes" value="yes">
                <div class="state p-info">
                    <i class="icon material-icons">done</i>
                    <label>Yes</label>
                </div>
                </div>
                <div class="pretty p-icon p-jelly p-round p-bigger">
                <input class="form-check-input" type="radio" name="job_guarantee" id="job_guarantee_no" value="no">
                <div class="state p-info">
                    <i class="icon material-icons">done</i>
                    <label>No</label>
                </div>
                </div> 
                </div>
                <div class="form-group col-md-4 col-sm-12">
                  <label for="pwd">Uplode Shining-Sheet:<span style="color: red;">*</span></label>
                  <input class="form-control" type="file" name="shining_sheet" id="shining_sheet_file">
                  <!-- <img id="shining_sheet" src="" width="90px" class="shining_sheet" /> -->
                  <?= form_open_multipart('AdminSettings/ajax_subcourse'); ?>
                </div>  
              </div>
            </div>
            <input type="submit" class="btn btn-primary" id="Submit" name="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Filter Course -->
  <div class="modal fade" id="filtersubcourse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Filter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>AdminSettings/SubCourse">
            <div class="card">
              <div class="branch-items row mb-2">
              <div class="form-group col-md-6 col-sm-12">
              <label for="inputEmail4">Course Name</label>
              <select class="form-control" name="filter_course" id="filter_course">
                <option value="">Select Branch</option>
                <?php foreach ($course_all as $ld) { ?>
                  <option value="<?php echo $ld->course_id ?>">
                    <?php echo $ld->course_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-6 col-sm-12">
              <label for="inputEmail4">SubCourse Name</label>
              <select class="form-control" name="filter_subcourse" id="filter_subcourse">
                <option value="">Select SubCourse</option>
                <?php foreach ($subcourse_all as $ld) { ?>
                  <option value="<?php echo $ld->subcourse_id; ?>">
                    <?php echo $ld->subcourse_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-12 col-sm-12">
              <label for="inputEmail4">SubCourse Code</label>
              <select class="form-control" name="filter_code" id="filter_code">
                <option value="">Select Code</option>
                <?php foreach ($subcourse_all as $ld) { ?>
                  <option value="<?php echo $ld->subcourse_id; ?>">
                    <?php echo $ld->subcourse_code; ?>
                  </option>
                <?php } ?>
              </select>
            </div>                                                                           
              </div>
            </div>
            <div class="float-right">
            <input type="submit" class="btn btn-primary" value="Submit" name="filter_course_data">
            <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>AdminSettings/SubCourse">Reset</a>
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

    <script>
      $("#subcourse_add").validate({
        rules: {
          w_template_name: {
            required: true,
          },
          w_template_message: {
            required: true
          },
          branch_logo: {
            required: true,
          }
        },
        messages: {
          w_template_name: {
            required: "<div style='color:red'>Enter Template Name</div>",
          },
          w_template_message: {
            required: "<div style='color:red'>Please enter template Message</div>"
          }
        },
        submitHandler: function() {
          event.preventDefault();
          var form = $('#subcourse_add')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>AdminSettings/ajax_subcourse",
            type: "post",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(resp) {
              var data = $.parseJSON(resp);
              var ddd = data['all_record'].status;
              if (ddd == '1') {
                $('#msg_doc').html(iziToast.success({
                  title: 'Success',
                  timeout: 2000,
                  message: 'HI! This Record Inserted.',
                  position: 'topRight'
                }));

                setTimeout(function() {
                  location.reload();
                }, 2020);
              } else if (ddd == '2') {
                $('#msg_doc').html(iziToast.success({
                  title: 'Success',
                  timeout: 2000,
                  message: 'HI! This Record Updated',
                  position: 'topRight'
                }));

                setTimeout(function() {
                  location.reload();
                }, 2020);
              } else if (ddd == '3') {
                $('#msg_doc').html(iziToast.error({
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
        }
      });

      function co_upd(subcourse_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>AdminSettings/get_record_subcourse",
          type: "post",
          data: {
            'subcourse_id': subcourse_id
          },
          success: function(resp) {
            $("#createsubcourse").modal();
            var data = $.parseJSON(resp);

            var subcourse_id = data['single_record'].subcourse_id;
            var course_id = data['single_record'].course_id;
            var subcourse_name = data['single_record'].subcourse_name;
            var subcourse_code = data['single_record'].subcourse_code;
            var fees = data['single_record'].fees;
            var duration = data['single_record'].duration;
            var installment = data['single_record'].installment;
            var percentage = data['single_record'].percentage;
            var job_guarantee = data['single_record'].job_guarantee;
            var shining_sheet = data['single_record'].shining_sheet;
            
            //console.log(shining_sheet);

            $('#subcourse_id').val(subcourse_id);
            $('#course_id').val(course_id);
            $('#subcourse_name').val(subcourse_name);
            $('#subcourse_code').val(subcourse_code);
            $('#fees').val(fees);
            //$('#shining_sheet_file').html(shining_sheet);
            $('#duration').val(duration);
            $('#installment').val(installment);
            $('#percentage').val(percentage);
            if (job_guarantee == "Yes") {
              $("#job_guarantee_yes").prop("checked", true);
            } else {
              $("#job_guarantee_no").prop("checked", true);
            }
            $(".shining_sheet").attr("src", "http://demo.rnwmultimedia.com/dist/signsheet/" + shining_sheet);
            
            $('#submit').val('Update');
          }

        });
      }

      function co_status_upd(subcourse_id, status) {
        $.ajax({
          url: "<?php echo base_url(); ?>AdminSettings/update_status",
          type: "post",
          data: {
            'id': subcourse_id,
            'status': status,
            'table': 'rnw_subcourse',
            'field': 'subcourse_status',
            'check_field': 'subcourse_id'
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! Course status updated.',
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

      function remove_co(subcourse_id) {
        var conf = confirm("Are you sure to delete record?");
        if (conf) {
          $.ajax({
            url: "<?php echo base_url(); ?>AdminSettings/delete_record",
            type: "post",
            data: {
              'id': subcourse_id,
              'table': 'rnw_subcourse',
              'field': 'subcourse_id'
            },
            success: function(resp) {
              var data = $.parseJSON(resp);
              var ddd = data['all_record'].status;
              console.log("dddddd", ddd);
              if (ddd == '1') {
                $('#msg').html(iziToast.success({
                  title: 'Success',
                  timeout: 2000,
                  message: 'HI! This Record Deleted.',
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
      }
    </script>
    <script type="text/javascript">
        $(function() {
        $('#table1').DataTable({
            stateSave: true,
            "bDestroy": true
        })
    })


    function resetval() {
      $("#subcourse_add")[0].reset();
    }
    </script>

    </body>
    <!-- index.html  21 Nov 2019 03:47:04 GMT -->

    </html>