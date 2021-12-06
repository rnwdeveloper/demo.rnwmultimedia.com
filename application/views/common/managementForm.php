<?php //print_r($_SESSION); die; 
$all_per = explode(',',$_SESSION['p_permission']); //print_r($all_per); die;
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<style type="text/css">
  li.select2-selection__choice {
    background-color: #5864BC !important;
  }
</style>
<div class="main-content overflow-hidden">
  <div class="row">
    <div class="col-12 d-flex justify-content-between">
      <h6 class="page-title text-dark mb-3">Form</h6>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Library</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
      </nav>
    </div>
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h4>Add Form</h4>
          <div class="card-header-action">
            <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Disable m_Form") { ?>
            <a href="#" class="btn btn-danger text-white" data-placement="bottom" title="Delete Multiple Record" id="multi_row_remove"><i class="fas fa-trash mr-1 text-white"></i></span>
            </a>
          <?php } } ?>
            <a href="<?php echo base_url(); ?>" class="btn btn-dark text-white">
              Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <form enctype="multipart/form-data" method="post" name="add" id="add">
            <input type="hidden" name="update_id" id="update_id" class="form-control">
            <div class="table-responsive form-assign-table">
              <table class="table table-bordered table-md managmentForm">
                <tr class="text-center">
                  <th>Name</th>
                  <?php foreach ($log_all as $key => $value) { ?>
                    <th><?php echo $value->logtype_name; ?></th>
                  <?php } ?>
                </tr>
                <tr class="text-center">
                  <th class="text-center">
                    <div class="custom-checkbox custom-checkbox-table custom-control">
                      <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                      <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                    </div>
                  </th>
                  <?php foreach ($log_all as $key => $value) { ?>
                    <th>
                      <?php
                      $val = trim($value->logtype_name);
                      $resval = str_replace(' ', '_', $val);
                      ?>
                      <div class="custom-checkbox custom-checkbox-table custom-control">
                        <input  type="checkbox" name="logall[]" data-checkboxes="mygroup" class="check custom-control-input" value="<?php echo $value->logtype_name; ?>" id="<?php echo $resval; ?>" ?>
                        <label for="<?php echo $resval; ?>" class="custom-control-label">&nbsp;</label>
                      </div>
                    </th>
                  <?php } ?>
                </tr>
              </table>
            </div>
            <div class="form-fldmanage">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Form Name</label>
                    <label id="first_name-error" class="error" for="form_name" style="float:right; color:red"></label>
                    <input type="text" class="form-control" name="form_name" id="form_name" placeholder="Form Name" required="">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label class="d-block">Upload Form</label>
                    <?= form_open_multipart('Common/ajax_form_submit'); ?>
                    <input type="file" class="mt-1" name="form_file" id="form_file">
                  </div>
                </div>
                <div class="col-12">
                  <div class="pb-3 mt-2">
                    <input type="submit" class="btn btn-primary" value="Submit" id="submit" name="submit">
                    <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>Common/managementForm">Reset</a>
                  </div>
                </div>
          </form>
          <div class="col-12">
            <div class="table-responsive mt-3">
              <table class="table table-striped income-table" id="table1">
                <thead>
                  <tr>
                    <th>
                      <div class="custom-checkbox custom-checkbox-table custom-control">
                        <input type="checkbox" data-checkboxes="mygroup1" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all1">
                        <label for="checkbox-all1" class="custom-control-label">&nbsp;</label>
                      </div>
                    </th>
                    <th width="200px">Form Name</th>
                    <th>Download</th>
                    <th>Permission</th>
                    <th>Status</th>
                    <th width="100px" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  if ($_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin") {   ?>
                    <?php foreach ($form_all as $val) {
                    ?>
                      <tr>
                        <td>
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" name="ids" value="<?php echo $val->form_id; ?>" 
                              data-checkboxes="mygroup1" class="multirow custom-control-input" id="checkbox-<?php echo  $val->form_id; ?>">
                            <label for="checkbox-<?php echo $val->form_id; ?>" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td><?php echo $val->form_name; ?>
                        </td>
                        <td><a target="_blank" href="<?php echo base_url(); ?>dist/signsheet/<?php echo $val->form_file; ?>">Download</a></td>
                        <?php if ($_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin") { ?>
                          <td width="300px;"><?php echo $val->permission; ?></td>
                        <?php } ?>
                        <?php if ($_SESSION['logtype'] == "Access Document" || $_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin") { ?>
                          <td>
                          <?php if($val->form_status=="0") { ?>
                          <a class="badge badge-success text-white">Active</a>
                          <?php } else { ?>
                          <a class="badge badge-danger text-white">Disable</a>
                          <?php } ?>
                          </td>                                 
                          <td>
                            <div class="dropdown">
                              <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                              <div class="dropdown-menu">
                                 <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Update m_Form") { ?>
                                <a class="dropdown-item has-icon" href="javascript:doc_upd(<?php echo @$val->form_id; ?>)">
                                  <i class="far fa-edit"></i> Edit
                                </a>
                              <?php  } }  ?>
                              <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Delete M_form") { ?>
                                <a class="dropdown-item has-icon text-danger" href="javascript:remove_doc(<?php echo @$val->form_id; ?>)">
                                  <i class="far fa-trash-alt"></i> Delete
                                </a>
                              <?php } }   ?>
                              <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Disable m_Form") { ?>
                                <?php if ($val->form_status == 0) { ?>
                                  <a class="dropdown-item has-icon" href="javascript:doc_status_upd(<?php echo @$val->form_id; ?>, 1)">
                                    <i class="fas fa-ban"></i> Disable
                                  </a>
                                <?php } else {  ?>
                                  <a class="dropdown-item has-icon" href="javascript:doc_status_upd(<?php echo @$val->form_id; ?>, 0)">
                                    <i class="far fa-check-circle"></i> Active
                                  </a>
                                <?php } ?>
                                <?php } } ?>
                              </div>
                          </td>
                        <?php } ?>
                      </tr>
                    <?php } ?>
                  <?php } else { ?>
                    <?php foreach ($form_all as $val) {
                      $fpall = explode(",", $val->permission);
                      foreach ($fpall as $m => $n) {
                        if ($n == "HOD") {
                          $n = strtolower($_SESSION['logtype']);
                        }
                        if ($n == $_SESSION['logtype']) {
                    ?>
                          <tr>
                            <td><?php echo $val->form_name; ?>
                            </td>
                            <td><a target="_blank" href="<?php echo base_url(); ?>dist/signsheet/<?php echo $val->form_file; ?>">Download</a></td>
                            <?php if ($_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin") { ?>
                              <td width="300px;"><?php echo $val->permission; ?></td>
                            <?php } ?>
                            <?php if ($_SESSION['logtype'] == "Access Document" || $_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin") { ?>
                              <!-- <td>
                                <div class="dropdown">
                                  <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                                    <span class="caret"></span></button>
                                  <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>FormController/managementForm?action=edit&id=<?php echo @$val->form_id; ?>"> Edit</a></li>
                                    <li><a href="<?php echo base_url(); ?>FormController/managementForm?action=delete&id=<?php echo @$val->form_id; ?>&status=<?php echo @$val->status; ?>">Delete</a></li>
                                  </ul>
                                </div>
                              </td> -->
                              <td><label style="color:#a6a6a6">
                                  <?php if ($val->form_status == "0") {
                                    echo "Active";
                                  }
                                  if ($val->form_status == "1") {
                                    echo  "Disable";
                                  } ?> </label></td>
                              <td>
                                <div class="dropdown">
                                  <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item has-icon" href="javascript:doc_upd(<?php echo @$val->form_id; ?>)">
                                      <i class="far fa-edit"></i> Edit
                                    </a>
                                    <a class="dropdown-item has-icon text-danger" href="javascript:remove_doc(<?php echo @$val->form_id; ?>)">
                                      <i class="far fa-trash-alt"></i> Delete
                                    </a>
                                    <?php if ($val->form_status == 0) { ?>
                                      <a class="dropdown-item has-icon" href="javascript:doc_status_upd(<?php echo @$val->form_id; ?>, 1)">
                                        <i class="fas fa-ban"></i> Disable
                                      </a>
                                    <?php } else {  ?>
                                      <a class="dropdown-item has-icon" href="javascript:doc_status_upd(<?php echo @$val->form_id; ?>, 0)">
                                        <i class="far fa-check-circle"></i> Active
                                      </a>
                                    <?php } ?>
                                  </div>
                              </td>
                            <?php } ?>
                          </tr>
                    <?php }
                      }
                    } ?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
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
  $("#add").validate({
    rules: {
      w_template_name: {
        required: true,
      },
      w_template_message: {
        required: true
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
      var form = $('#add')[0];
      var data = new FormData(form);
      $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?php echo base_url(); ?>Common/ajax_form_submit",
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
              message: data['all_record'].msg,
              position: 'topRight'
            }));

            setTimeout(function() {
              location.reload();
            }, 2020);
          } else if (ddd == '2') {
            $('#msg_doc').html(iziToast.error({
              title: 'Canceled!',
              timeout: 2000,
              message: data['all_record'].msg,
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
</script>

<script>
  function doc_upd(id) {
    //console.log(department_id);
    $.ajax({
      url: "<?php echo base_url(); ?>Common/get_record",
      type: "post",
      data: {
        'id': id,
        'table': 'form_list',
        'field': 'form_id'
      },
      success: function(resp) {
        console.log(resp);
        var data = $.parseJSON(resp);

        var form_name = data['single_record'].form_name;
        var form_id = data['single_record'].form_id;

        var form_file = data['single_record'].form_file;

        var permission = data['single_record'].permission;

        var arr = permission.split(",");
        $('.check').prop('checked', false);

        for (i = 0; i < arr.length; i++) {
          var val = arr[i].trim();
          var resval = val.replaceAll(' ', '_');
          $('#' + resval).prop('checked', true);
        }

        $('#form_name').val(form_name);
        $('#update_id').val(form_id);
        $("#form_file").attr("src", "http://demo.rnwmultimedia.com/dist/signsheet/" + form_file);

        $('#submit').val('Update');
      }

    });
  }

  function remove_doc(id) {
    var conf = confirm("Are you sure to delete record?");
    if (conf) {
      $.ajax({
        url: "<?php echo base_url(); ?>AdminSettings/delete_record",
        type: "post",
        data: {
          'id': id,
          'table': 'form_list',
          'field': 'form_id'
        },
        success: function(resp) {
          var data = $.parseJSON(resp);
          var ddd = data['all_record'].status;
          console.log("dddddd", ddd);
          if (ddd == '1') {
            $('#deleted_msg').html(iziToast.success({
              title: 'Success',
              timeout: 2000,
              message: 'HI! This Record Deleted.',
              position: 'topRight'
            }));


            setTimeout(function() {
              location.reload();
            }, 2020);
          } else if (ddd == '2') {
            $('#deleted_msg').html(iziToast.error({
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

  function doc_status_upd(id, status) {
    console.log(id);
    $.ajax({
      url: "<?php echo base_url(); ?>AdminSettings/update_status",
      type: "post",
      data: {
        'id': id,
        'status': status,
        'table': 'form_list',
        'field': 'form_status',
        'check_field': 'form_id'
      },
      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['status'].status;
        console.log("dddddd", ddd);
        if (ddd == '1') {
          $('#msg').html(iziToast.success({
            title: 'Success',
            timeout: 2000,
            message: data['status'].msg,
            position: 'topRight'
          }));


          setTimeout(function() {
            location.reload();
          }, 2020);
        } else if (ddd == '2') {
          $('#msg').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2000,
            message: data['status'].msg,
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }
      }
    });
  }
</script> <!-- JS Libraies -->
<script type="text/javascript">
  $(".form-assign-table").niceScroll({
    cursorcolor: "transparent"
  });

  $(function() {
    $('#table1').DataTable({
      stateSave: true
    })
  })

  $('#multi_row_remove').on('click', function() {
    alert("Are You Sure This Record Delted");
    var ids = [];

    $('.multirow:checked').map(function() {
      ids.push($(this).val());
    });

    console.log("idss "+ids);

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>Common/Multiple_rowremove",
      data: {
        'ids': ids
      },
      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        console.log(ddd);
        if (ddd == '1') {
          $('#deleted_msg').html(iziToast.success({
            title: 'Success',
            timeout: 2500,
            message: 'Deleted Record!',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2520);

        } else if (ddd == '2') {

          $('#deleted_msg').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2500,
            message: 'Someting Wrong!!',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2520);
        }
      }
    });
    return false;
  });
</script>