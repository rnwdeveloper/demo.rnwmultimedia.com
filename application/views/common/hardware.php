<?php //print_r($_SESSION); die; 
  $all_per = explode(',',$_SESSION['p_permission']); 
  //print_r($all_per); die;
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<style type="text/css">
  li.select2-selection__choice {
    background-color: #5864BC !important;
  }
</style>
<!-- Main Content -->
<div class="main-content overflow-hidden">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 d-flex justify-content-between">
          <h6 class="page-title text-dark mb-3">Hardware</h6>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Library</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
          </nav>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4> </h4>
              <div class="card-header-action">
                <div class="dropdown">
                  <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle text-white"><i class="fas fa-tasks mr-1" data-toggle="tooltip" data-placement="bottom" title="Task"></i></a>
                  <div class="dropdown-menu">
                    <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Form Hardware") { ?>
                    <a href="#" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target="#HardwareForm" onclick=reset()><i class="far fa-money-bill-alt" style="margin-top: 1px;"></i>
                      Hardware Form</a>
                    <?php } }   ?>
                    <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Company Form Hardware") { ?>
                    <a href="#" class="dropdown-item has-icon text-dark" data-toggle="modal" data-target="#HardwareCompany" onclick=reset()><i class="fas fa-th-list" style="margin-top: 1px;"></i>Company</a>
                  <?php } } ?>
                  <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Category From Hardware") { ?>
                    <a href="#" class="dropdown-item has-icon text-dark" data-toggle="modal" data-target="#HardwareCategory" onclick=reset()><i class="fas fa-th-list" style="margin-top: 1px;"></i>Category</a>
                    <?php } } ?>
                  </div>
                </div>
                <button class="btn" tabindex="0" aria-controls="tableExport"><span><i class="fas fa-arrow-left mr-1"></i> Back</span></button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped income-table tabel-ordered" id="table1">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Subject</th>
                      <th>HardwareCategory</th>
                      <th>Company</th>
                      <th width="300px">Description</th>
                      <th>Link</th>
                      <th width="100px" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sno = 1;
                    foreach ($hardware as $row) { ?>
                      <tr>
                        <td><?php echo $sno;
                            $sno++; ?></td>
                        <td><?php echo $row->subject; ?></td>
                        <td><?php echo $row->category; ?></td>
                        <td><?php echo $row->company; ?></td>
                        <td><?php echo $row->description; ?></td>
                        <td><?php echo $row->link; ?></td>
                        <td class="text-center">
                          <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Edit Hardware") { ?>
                          <a href="javascript:doc_upd(<?php echo $row->hardware_id; ?>)" class="bg-primary action-icon text-white btn-primary" ><i class="fas fa-pencil-alt"></i></a>
                          <?php } }?>
                          <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Delete Harware") { ?>
                          <a href="javascript:remove_doc(<?php echo $row->hardware_id; ?>)" class="bg-danger action-icon text-white btn-danger" onclick='check_selectedvalue()'><i class="far fa-trash-alt"></i>
                          </a>
                        <?php } } ?>
                        </td>
                      </tr>
                    <?php }   ?>
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


<!-- Modal Hardware Form -->
<div class="modal fade" id="HardwareForm" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="addhardware" id="addhardware" action="<?php echo base_url(); ?>Common/hardware">
          <div id="deleted_status_msg"></div>
          <input type="hidden" name="update_id" id="update_id"  />
          <div class="form-group ">
            <label for="inputEmail4">Hardware Company</label>
            <select class="form-control" name="hardwarecompany_id" id="hardwarecompany_id">
              <option value=""><b>Company</b></option>
              <?php
              foreach ($all_hardwarecompany as $row) {
                echo '<option value="' . $row->id . '">' . $row->company . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group ">
            <label for="inputEmail4">Hardware Category</label>
            <select class="form-control" name="hardwarecategory_id" id="hardwarecategory_id">
              <option value=""><b>Category</b></option>
              <?php
              foreach ($all_hardwarecategory as $row) {
                echo '<option value="' . $row->id . '">' . $row->category . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Subject</label>
            <input name="subject" id="subject" type="text" class="form-control" />
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Add Link</label>
            <input name="link" id="link" type="text" class="form-control" />
          </div>
          <input type="submit" class="btn btn-primary" name="submit" id="hardware_submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Hardware Company -->
<div class="modal fade" id="HardwareCompany" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="formModal">Hardware Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="add" id="add" action="<?php echo base_url(); ?>Common/hardware">
          <div class="form-group ">
            <label for="inputEmail4">Hardware Company</label>
            <select class="form-control" name="hardwarecompany_id">
              <option value=""><b>Company</b></option>
              <?php
              foreach ($all_hardwarecompany as $row) {
                echo '<option value="' . $row->id . '">' . $row->company . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group ">
            <label for="inputEmail4">Add Company</label>
            <input type="text" class="form-control" name="company" placeholder="Category Name">
          </div>
          <input type="submit" name="save" class="btn btn-primary mt-2" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hardware Category -->
<div class="modal fade" id="HardwareCategory" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="formModal">Hardware Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="addcat" id="addcat" action="<?php echo base_url(); ?>Common/hardware">
          <div class="form-group ">
            <label for="inputEmail4">Hardware Category</label>
            <select class="form-control" name="hardwarecategory_id">
              <option value=""><b>Category</b></option>
              <?php
              foreach ($all_hardwarecategory as $row) {
                echo '<option value="' . $row->id . '">' . $row->category . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group ">
            <label for="inputEmail4">Add Category</label>
            <input type="text" name="category" class="form-control" value="" placeholder="Category Name">
          </div>
          <input type="submit" class="btn btn-primary mt-2" name="save" value="Submit">
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
  $("#addhardware").validate({
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
      var form = $('#addhardware')[0];
      var data = new FormData(form);
      $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?php echo base_url(); ?>Common/ajax_hardware_submit",
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
        url: "<?php echo base_url(); ?>Common/ajax_company_submit",
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

  $("#addcat").validate({
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
      var form = $('#addcat')[0];
      var data = new FormData(form);
      $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?php echo base_url(); ?>Common/ajax_category_submit",
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
        'table': 'hardware',
        'field': 'hardware_id'
      },
      success: function(resp) {
        $("#HardwareForm").modal();
        var data = $.parseJSON(resp);

        console.log(data['single_record']);
        var hardware_id = data['single_record'].hardware_id;
        var hardwarecompany_id = data['single_record'].hardwarecompany_id;
        var hardwarecategory_id = data['single_record'].hardwarecategory_id;
        var subject = data['single_record'].subject;
        var description = data['single_record'].description;
        var link = data['single_record'].link;

        $('#hardwarecompany_id').val(hardwarecompany_id);
        $('#hardwarecategory_id').val(hardwarecategory_id);
        $('#subject').val(subject);
        $('#description').val(description);
        $('#link').val(link);

        $('#update_id').val(hardware_id);

        $('#hardware_submit').val('Update');
      }

    });
  }

  function remove_doc(id) {
    var conf = confirm("Are you sure to delete record?");
    if (conf) {
      $.ajax({
        url: "<?php echo base_url(); ?>Common/delete_record",
        type: "post",
        data: {
          'id': id,
          'table': 'hardware',
          'field': 'hardware_id'
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

    console.log("idss " + ids);

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

  function reset() {
    $('#addhardware').trigger("reset");
    $('#add').trigger("reset");
    $('#addtc').trigger("reset");
  }
</script>