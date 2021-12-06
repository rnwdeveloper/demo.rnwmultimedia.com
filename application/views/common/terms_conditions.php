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
<!-- Main Content -->
<div class="main-content overflow-hidden">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 d-flex justify-content-between">
          <h6 class="page-title text-dark mb-3">Terms And Conditions</h6>
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
                    <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "T&C TCForm") { ?>
                    <a href="#" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target="#tcForm" onclick=reset()><i class="far fa-money-bill-alt" style="margin-top: 1px;"></i>
                      T&C Form</a>
                    <?php } } ?>
                    <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Company Form TCForm") { ?>
                    <a href="#" class="dropdown-item has-icon text-dark" data-toggle="modal" data-target="#TCCompany"><i class="fas fa-th-list" style="margin-top: 1px;"></i>Company</a>
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
                      <th>Terms & Conditions</th>
                      <th>Download</th>
                      <th>Category</th>
                      <th width="100px" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <?php
                  $num = 1;
                  foreach ($all_termsconditions as $row) {
                    if ($row->Category_name == $_SESSION['logtype'] || $_SESSION['logtype'] == "Super Admin") {
                  ?>
                      <tbody>
                        <tr>
                          <td rowspan="0"><?php echo $num++ ?></td>
                          <td><b><?php echo $row->question; ?></b></td>
                          <td>
                            <a target="_blank" class="bg-success action-icon text-white btn-success" href="<?php echo base_url(); ?>dist/termsconditions/<?php echo $row->tc_file; ?>">
                              <i class="fas fa-download"></i>
                            </a>
                          </td>
                          <td><?php echo $row->Category_name; ?></td>
                          <!-- <td><td><a href="">Download</a> -->
                          <td class="text-center">
                            <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Update TCForm") { ?>
                            <a href="javascript:doc_upd(<?php echo $row->id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                          <?php } }?>
                          <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Delete TCForm") { ?>
                            <a href="javascript:remove_doc(<?php echo $row->id; ?>)" class="bg-danger action-icon text-white btn-danger" onclick='check_selectedvalue()'><i class="far fa-trash-alt"></i>
                            </a>
                          <?php } }?>
                          </td>
                        <?php } ?>
                        </tr>
                        <tr>
                          <td><?php echo $row->answer; ?></td>
                        </tr>
                        <tr>
                        </tr>
                      </tbody>
                    <?php  }
                    ?>
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
<div class="modal fade" id="tcForm" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="formModal">Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" method="post" name="addtc" id="addtc">
          <input type="hidden" name="update_id" id="update_id" />
          <div id="deleted_status_msg"></div>
          <div class="form-group ">
            <label for="inputEmail4">T&C Category</label>
            <select class="form-control" name="Tc_Category_id" id="Tc_Category_id">
              <option value=""><b>Category</b></option>
              <?php
              foreach ($all_termsconditions_category as $row) {
                echo '<option value="' . $row->Tc_Category_id . '">' . $row->Category_name . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Add Question</label>
            <textarea name="question" id="question" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Add Answer</label>
            <textarea name="answer" id="answer" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label class="d-block">Upload Form</label>
            <input type="file" class="mt-1" name="tc_file" id="tc_file">
          </div>
          <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hardware Form -->
<div class="modal fade" id="filterform" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="formModal">Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="deleted_status_msg"></div>
        <div class="form-group">
          <label>Add Question</label>
          <textarea class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Add Answer</label>
          <textarea class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label class="d-block">Upload Form</label>
          <input type="file" class="mt-1" name="photos" id="">
        </div>
        <input type="submit" class="btn btn-primary" name="status_deleted" id="status_deleted" value="Submit">
      </div>
    </div>
  </div>
</div>


<!-- Modal deleted status -->
<div class="modal fade" id="TCCompany" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="formModal">TcCategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="addcat" id="addcat" action="<?php echo base_url(); ?>Common/terms_conditions">
          <div class="form-group ">
            <label for="inputEmail4">T&C Category</label>
            <select class="form-control" name="Tc_Category_id">
              <option value=""><b>Category</b></option>
              <?php
              foreach ($all_termsconditions_category as $row) {
                echo '<option value="' . $row->Tc_Category_id . '">' . $row->Category_name . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group ">
            <label for="inputEmail4">Add Category</label>
            <input type="text" class="form-control" value="" name="Category_name" placeholder="Category Name">
          </div>
          <input type="submit" class="btn btn-primary mt-2" name="save" value="Submit">
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
<script src="<?php echo base_url(); ?>dist/assets/js/table1excel.js"></script>
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
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
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
        url: "<?php echo base_url(); ?>Common/ajax_tc_category_submit",
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

  $("#addtc").validate({
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
      var form = $('#addtc')[0];
      var data = new FormData(form);
      $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?php echo base_url(); ?>Common/ajax_tc_submit",
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
        'table': 'termsconditions',
        'field': 'id'
      },
      success: function(resp) {
        $("#tcForm").modal();
        var data = $.parseJSON(resp);

        console.log(data['single_record']);
        var id = data['single_record'].id;
        var question = data['single_record'].question;
        var answer = data['single_record'].answer;
        var Tc_Category_id = data['single_record'].Tc_Category_id;
        var tc_file = data['single_record'].tc_file;

        $('#question').val(question);
        $('#answer').val(answer);
        $('#Tc_Category_id').val(Tc_Category_id);


        $("#tc_file").attr("src", "http://demo.rnwmultimedia.com/dist/termsconditions/" + tc_file);
        $('#update_id').val(id);

        $('#submit').val('Update');
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
          'table': 'termsconditions',
          'field': 'id'
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
            stateSave: true,
            "bDestroy": true
        })
    })

  function reset() {
    $('#addtc').trigger("reset");
  }
</script>