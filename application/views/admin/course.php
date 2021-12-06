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
            <h6 class="page-title text-dark mb-3">Course</h6>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Course</li>
              </ol>
            </nav>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between income-wrapper">
                <div class="d-flex justify-content-between">
                </div>
                <div class="table-right-content">
                  <button href="#" class="btn btn-info" data-toggle="modal" data-target="#createcourse" onclick="resetval()">
                    <span><i class="fas fa-plus mr-1"></i></span>
                  </button>
                  <button href="#" class="btn btn-info" data-toggle="modal" data-target="#filtercourse">
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
                        <th>Branch Name</th>
                        <th>Department Name</th>
                        <th>Sub-Department Name</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sno = 1;
                      foreach ($course_all as $val) { ?>
                        <tr>
                          <td class="text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?php echo $sno; ?>" name="mark" value="<?php echo $val->course_id; ?>">
                              <label for="checkbox-<?php echo $sno; ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?php echo $sno; ?></td>
                          <td>
                          <?php $branchids = explode(",", $val->branch_id);
                            foreach ($branch_all as $row) {
                              if (in_array($row->branch_id, $branchids)) {
                                echo $row->branch_name." <br> ";
                              }
                            } ?>
                          </td>
                          <td>
                          <?php $departmentids = explode(",", $val->department_id);
                            foreach ($department_all as $row) {
                              if (in_array($row->department_id, $departmentids)) {
                                echo $row->department_name." <br> ";
                              }
                            } ?>
                          </td>
                          <td>
                          <?php $subdepartmentids = explode(",", $val->subdepartment_id);
                            foreach ($subdepartment_all as $row) {
                              if (in_array($row->subdepartment_id, $subdepartmentids)) {
                                echo $row->subdepartment_name;
                              }
                            } ?>
                          </td>
                          <td><?php echo $val->course_name; ?></td>
                          <td><?php echo $val->course_code; ?></td>
                          <td><?php echo $val->created_by ?></td>
                          <td>
                          <?php if($val->course_status=="0") { ?>
                          <a class="badge badge-success text-white">Active</a>
                          <?php } else { ?>
                          <a class="badge badge-danger text-white">Disable</a>
                          <?php } ?>
                          </td>                                 
                          <td>
                            <div class="dropdown">
                              <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                              <div class="dropdown-menu">
                                <?php $xx = $val->course_id; ?>
                                <a class="dropdown-item has-icon" href="javascript:co_upd(<?php echo $xx; ?>)">
                                  <i class="far fa-edit"></i> Edit
                                </a>
                                <a class="dropdown-item has-icon text-danger" href="javascript:remove_co(<?php echo $xx; ?>)">
                                  <i class="far fa-trash-alt"></i> Delete
                                </a>
                                <?php if ($val->course_status == 0) { ?>
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
  <div class="modal fade" id="createcourse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Create Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" class="document-createmodal" method="post" name="course_add" id="course_add">
          <input type="hidden" name="course_id" id="course_id" class="form-control">
          <div class="modal-body">
            <div class="card">
              <div class="branch-items row mb-2">
                <div class="form-group col-md-4 col-sm-12">
                  <label for="">Branch:<span style="color: red;">*</span></label>
                  <select class="select2 form-control branch" name="branch_id[]" multiple="multiple" id="branch_id" required>
                    <option>Select Branch</option>
                      <?php foreach($branch_all as $val){ ?>
                        <option value="<?php echo $val->branch_id ?>"><?php echo $val->branch_name; ?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                  <label for="">Department:<span style="color: red;">*</span></label>
                  <select class="select2 form-control depart" name="department_id[]" multiple="multiple" id="department_id" required>
                    <option>Select Department</option>
                    <?php foreach($department_all as $val){ ?>
                        <option value="<?php echo $val->department_id ?>"><?php echo $val->department_name; ?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                  <label for="">Sub-Department:<span style="color: red;">*</span></label>
                  <select class="form-control" name="subdepartment_id" id="subdepartment_id" required>
                    <option>Select Sub-Department</option>
                    <?php foreach($subdepartment_all as $val) { ?>
                      <option value="<?php echo $val->subdepartment_id; ?>"><?php echo $val->subdepartment_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                  <label for="pwd">Course Name:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="course_name" name="course_name" placeholder="Enter Course Name" required>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                  <label for="pwd">Course Code:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="course_code" name="course_code" placeholder="Enter Course Code" required>
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
  <div class="modal fade" id="filtercourse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Filter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>AdminSettings/course">
            <div class="card">
              <div class="branch-items row mb-2">
              <div class="form-group col-md-6 col-sm-12">
              <label for="inputEmail4">Branch Name</label>
              <select class="form-control" name="filter_branch" id="filter_branch">
                <option value="">Select Branch</option>
                <?php foreach ($branch_all as $ld) { ?>
                  <option value="<?php echo $ld->branch_id ?>">
                    <?php echo $ld->branch_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-6 col-sm-12">
              <label for="inputEmail4">Department Name</label>
              <select class="form-control" name="filter_department" id="filter_department">
                <option value="">Select Department</option>
                <?php foreach ($department_all as $ld) { ?>
                  <option value="<?php echo $ld->department_id; ?>">
                    <?php echo $ld->department_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-6 col-sm-12">
              <label for="inputEmail4">Sub-Department Name</label>
              <select class="form-control" name="filter_subdepartment" id="filter_subdepartment">
                <option value="">Select Sub-Department</option>
                <?php foreach ($subdepartment_all as $ld) { ?>
                  <option value="<?php echo $ld->subdepartment_id ?>">
                    <?php echo $ld->subdepartment_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-6 col-sm-12">
              <label for="inputEmail4">Course Name</label>
              <select class="form-control" name="filter_course" id="filter_course">
                <option value="">Select Course Name</option>
                <?php foreach ($course_all as $ld) { ?>
                  <option value="<?php echo $ld->course_id ?>">
                    <?php echo $ld->course_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-12 col-sm-12">
              <label for="inputEmail4">Course Code</label>
              <select class="form-control" name="filter_code" id="filter_code">
                <option value="">Select Course Code</option>
                <?php foreach ($course_all as $ld) { ?>
                  <option value="<?php echo $ld->course_id ?>">
                    <?php echo $ld->course_code; ?>
                  </option>
                <?php } ?>
              </select>
            </div>                                                          
              </div>
            </div>
            <div class="float-right">
            <input type="submit" class="btn btn-primary" value="Submit" name="filter_course_data">
            <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>AdminSettings/course">Reset</a>
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
    $(document).ready(function(){

    $('.branch').change(function(){

    var branch_id = $('.branch').val();
        $.ajax({
        url:"<?php echo base_url(); ?>AdminSettings/ajax_branch_wise",
        method:"POST",
        data:{ 'branch_id' : branch_id },
        success:function(data)
        {
        $('#department_id').html(data);
        }
    });
    });

    $('#department_id').change(function(){
    
    var department_id = $('#department_id').val();
    // alert(department_id);
        $.ajax({
        url:"<?php echo base_url(); ?>AdminSettings/ajax_department_wise",
        method:"POST",
        data:{ 'department_id' : department_id },
        success:function(data)
        {
            $('#subdepartment_id').html(data);
        }
    });
    });

    });
    </script>
    <script>
      $("#course_add").validate({
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
          var form = $('#course_add')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>AdminSettings/ajax_course",
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

      function co_upd(course_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>AdminSettings/get_record_course",
          type: "post",
          data: {
            'course_id': course_id
          },
          success: function(resp) {
            $("#createcourse").modal();
            var data = $.parseJSON(resp);

            var course_id = data['single_record'].course_id;
            var branch_id = data['single_record'].branch_id;
            var department_id = data['single_record'].department_id;
            var subdepartment_id = data['single_record'].subdepartment_id;
            var course_name = data['single_record'].course_name;
            var course_code = data['single_record'].course_code;
            var created_by = data['single_record'].created_by;
           
            $('#course_id').val(course_id);
            $('#subdepartment_id').val(subdepartment_id);
            $('#course_name').val(course_name);
            $('#course_code').val(course_code);
            $('#created_by').val(created_by);
           
            // var depart = department_id.split(",");
            // for (j = 0; j<depart.length; j++) {
            //   $('#department_id option[value=' + depart[j] + ']').attr('selected', true);
            // }
            // $('#department_id').val(depart).trigger("change");

            var arr = branch_id.split(",");
            for (i = 0; i<arr.length; i++) {
              $('#branch_id option[value=' + arr[i] + ']').attr('selected', true);
            }
            $('#branch_id').val(arr).trigger("change");
            
            $('#submit').val('Update');
          }

        });
      }

      function co_status_upd(course_id, status) {
        $.ajax({
          url: "<?php echo base_url(); ?>AdminSettings/update_status",
          type: "post",
          data: {
            'id': course_id,
            'status': status,
            'table': 'rnw_course',
            'field': 'course_status',
            'check_field': 'course_id'
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

      function remove_co(course_id) {
        var conf = confirm("Are you sure to delete record?");
        if (conf) {
          $.ajax({
            url: "<?php echo base_url(); ?>AdminSettings/delete_record",
            type: "post",
            data: {
              'id': course_id,
              'table': 'rnw_course',
              'field': 'course_id'
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
      $("#course_add")[0].reset();
    }
    </script>

    </body>
    <!-- index.html  21 Nov 2019 03:47:04 GMT -->

    </html>