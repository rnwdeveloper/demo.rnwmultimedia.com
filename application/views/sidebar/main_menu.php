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
            <h6 class="page-title text-dark mb-3">Main menu</h6>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Main menu</li>
              </ol>
            </nav>
          </div>
          <div class="col-12">
            <div class="card-header-action">
            
            <div class="card">
              <div class="card-header d-flex justify-content-between income-wrapper">
                <div class="d-flex justify-content-between">
                </div>
                <div class="table-right-content">
                  <button href="#" class="btn btn-info" data-toggle="modal" data-target="#createcourse" onclick="resetval()">
                    <span><i class="fas fa-plus mr-1"></i></span>
                  </button> 
                  <a href="#" class="btn btn-danger text-white" data-placement="bottom" title="Delete Multiple Record" id="multi_row_remove"><i class="fas fa-trash mr-1 text-white"></i></span>
            </a>
                </div>
              </div>
              <div class="card-body">
                <div id="msg"></div>
                <div class="table-responsive branch-table">
                  <table class="table table-striped normal-table " id="table2">
                    <thead>
                      <tr>
                        <th>
                          <div class="custom-checkbox custom-checkbox-table custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all" for="checkbox-all" name="select-all">
                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                          </div>
                        </th>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sno = 1;
                      foreach ($f_module as $val) { ?>
                        <tr>
                          <td>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?php echo $sno; ?>" name="mark" value="<?php echo $val->f_module_id; ?>">
                              <label for="checkbox-<?php echo $sno; ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?php echo $sno; ?></td>
                           <td><?php echo $val->f_module_name; ?></td>     
                           <td><?php echo $val->f_module_icon; ?></td> 
                            <td>
                              <?php if($val->status=="1") { ?>
                                <a class="badge badge-success text-white">Active</a>
                          <?php } else { ?>
                                <a class="badge badge-danger text-white">Disable</a>
                          <?php } ?>
                            </td>
                            <td>
                            <?php $xx = $val->f_module_id; ?>
                                <a href="javascript:co_upd(<?php echo $xx; ?>)" class="bg-primary action-icon text-white btn-primary" ><i class="fas fa-pencil-alt"></i> </a>
                                <a href="javascript:remove_co(<?php echo $xx; ?>)" class="bg-danger action-icon text-white btn-primary" ><i class="fa fa-trash"></i> </a>
                                <?php if($val->status=="0") { ?>
                                <a href="javascript:co_status_upd(<?php echo $xx; ?>,1)" class="bg-danger action-icon text-white btn-danger"><i class="fa fa-ban"></i></a> 
                                <?php } else {?>
                                <a href="javascript:co_status_upd(<?php echo $xx; ?>,0)" class="bg-danger action-icon text-white btn-danger"><i class="fa fa-check"></i></a> 
                                <?php }?>
                                
                            </td>
                            <!-- <td>
                            <div class="dropdown">
                              <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                              <div class="dropdown-menu">
                                <?php $xx = $val->f_module_id; ?>
                                <a class="dropdown-item has-icon" href="javascript:co_upd(<?php echo $xx; ?>)">
                                  <i class="far fa-edit"></i> Edit
                                </a>
                                <a class="dropdown-item has-icon text-danger" href="javascript:remove_co(<?php echo $xx; ?>)">
                                  <i class="far fa-trash-alt"></i> Delete
                                </a>
                                <?php if ($val->status == 0) { ?>
                                  <a class="dropdown-item has-icon" href="javascript:co_status_upd(<?php echo $xx; ?>, 1)">
                                    <i class="fas fa-ban"></i> Disable
                                  </a>
                                <?php } else {  ?>
                                  <a class="dropdown-item has-icon" href="javascript:co_status_upd(<?php echo $xx; ?>, 0)">
                                    <i class="far fa-check-circle"></i> Active
                                  </a>
                                <?php } ?>
                              </div>
                          </td> -->
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
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Create Main Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" class="document-createmodal" method="post" name="main_menu_add" id="main_menu_add">
          <input type="hidden" name="f_module_id" id="f_module_id" class="form-control">
          <div class="modal-body">
            <div class="card">
              <div class="branch-items row mb-2">
                <div class="form-group col-md-12 col-sm-12">
                  <label for="pwd">Name:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="f_module_name" name="f_module_name" placeholder="Enter Name" required>
                </div>
                <div class="form-group col-md-12 col-sm-12">
                  <label for="pwd">Icon:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="f_module_icon" name="f_module_icon" placeholder="Enter Icon" required>
                </div>
            
              </div>
            </div>
            <input type="submit" class="btn btn-primary" id="Submit" name="submit" value="Submit">
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
      $("#main_menu_add").validate({
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
          var form = $('#main_menu_add')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>MenuTop/ajax_mainmenu",
            type: "post",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(resp) {
              $("#createcourse").modal('hide');
              var data = $.parseJSON(resp);
              var ddd = data['all_record'].status;
              if (ddd == '1') {
                $('#msg_doc').html(iziToast.success({
                  title: 'Success',
                  timeout: 2000,
                  message: 'HI! This Record Inserted.',
                  position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/main_menu_table",
                  type: "post",
                  data: {
                        'f_module_id ': f_module_id 
                  },
                  success: function(Resp) {

                        $('.branch-table').html(Resp);
                  }
               });
              } else if (ddd == '2') {
                $('#msg_doc').html(iziToast.success({
                  title: 'Success',
                  timeout: 2000,
                  message: 'HI! This Record Updated',
                  position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/main_menu_table",
                  type: "post",
                  data: {
                        'f_module_id ': f_module_id 
                  },
                  success: function(Resp) {

                        $('.branch-table').html(Resp);
                  }
               });
              } else if (ddd == '3') {
                $('#msg_doc').html(iziToast.error({
                  title: 'Canceled!',
                  timeout: 2000,
                  message: 'Someting Wrong!!',
                  position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/main_menu_table",
                  type: "post",
                  data: {
                        'f_module_id ': f_module_id 
                  },
                  success: function(Resp) {

                        $('.branch-table').html(Resp);
                  }
               });
              }
            }
          });
        }
      });

      function co_upd(f_module_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>MenuTop/get_record_mainmenu",
          type: "post",
          data: {
            'f_module_id': f_module_id
          },
          success: function(resp) {
            $("#createcourse").modal();
            var data = $.parseJSON(resp);
            
            var f_module_id = data['single_record'].f_module_id;
            var f_module_name = data['single_record'].f_module_name;
            var f_module_icon = data['single_record'].f_module_icon;
            
           
            $('#f_module_id').val(f_module_id);
            $('#f_module_name').val(f_module_name);
            $('#f_module_icon').val(f_module_icon);
           }
        });
      }

      function co_status_upd(f_module_id, status) {
        $.ajax({
          url: "<?php echo base_url(); ?>MenuTop/update_status",
          type: "post",
          data: {
            'id': f_module_id,
            'status': status,
            'table': 'f_module',
            'field': 'status',
            'check_field': 'f_module_id'
          },
          success: function(resp) {
            $("#createcourse").modal('hide');
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


              $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/main_menu_table",
                  type: "post",
                  data: {
                        'f_module_id ': f_module_id 
                  },
                  success: function(Resp) {

                        $('.branch-table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: '',
                position: 'topRight'
              }));

              $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/main_menu_table",
                  type: "post",
                  data: {
                        'f_module_id ': f_module_id 
                  },
                  success: function(Resp) {

                        $('.branch-table').html(Resp);
                  }
               });
            }  else if (ddd == '3') {
                $('#msg_doc').html(iziToast.error({
                  title: 'Canceled!',
                  timeout: 2000,
                  message: 'Someting Wrong!!',
                  position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/main_menu_table",
                  type: "post",
                  data: {
                        'f_module_id ': f_module_id 
                  },
                  success: function(Resp) {

                        $('.branch-table').html(Resp);
                  }
               });
              }
          }
        });
      }

      
        function remove_co(f_module_id) {
          var conf = confirm("Are you sure to delete record?");
          if (conf) {
            $.ajax({
              url: "<?php echo base_url(); ?>MenuTop/delete_mainmenu",
              type: "post",
              data: {
                'id': f_module_id,
                'table': 'f_module',
                'field': 'f_module_id'
              },
              success: function(resp) {
                $("#createcourse").modal('hide');
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


                  $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/main_menu_table",
                  type: "post",
                  data: {
                        'f_module_id ': f_module_id 
                  },
                  success: function(Resp) {

                        $('.branch-table').html(Resp);
                  }
               });
                } else if (ddd == '2') {
                  $('#msg').html(iziToast.error({
                    title: 'Canceled!',
                    timeout: 2000,
                    message: '',
                    position: 'topRight'
                  }));

                  $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/main_menu_table",
                  type: "post",
                  data: {
                        'f_module_id ': f_module_id 
                  },
                  success: function(Resp) {

                        $('.branch-table').html(Resp);
                  }
               });
                }  else if (ddd == '3') {
                  $('#msg_doc').html(iziToast.error({
                    title: 'Canceled!',
                    timeout: 2000,
                    message: 'Someting Wrong!!',
                    position: 'topRight'
                  }));

                  $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/main_menu_table",
                  type: "post",
                  data: {
                        'f_module_id ': f_module_id 
                  },
                  success: function(Resp) {

                        $('.branch-table').html(Resp);
                  }
               });
                }
              }
            });
          }
        }
    </script>
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
    alert("Are You Sure This Record Deleted");
    var ids = [];
      $('input[name=ids]:checked').map(function() {
        ids.push($(this).val());
      });

    console.log("idss "+ids);

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>MenuTop/Multiple_rowremove",
      data: {
        'ids': ids
      },
      success: function(resp) {
        $("#createcourse").modal('hide');
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

          $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/main_menu_table",
                  type: "post",
                  data: {
                        'f_module_id ': f_module_id 
                  },
                  success: function(Resp) {

                        $('.branch-table').html(Resp);
                  }
               });
        } else if (ddd == '2') {

          $('#deleted_msg').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2500,
            message: 'Someting Wrong!!',
            position: 'topRight'
          }));

          $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/main_menu_table",
                  type: "post",
                  data: {
                        'f_module_id ': f_module_id 
                  },
                  success: function(Resp) {

                        $('.branch-table').html(Resp);
                  }
               });
        } 
      }
    });
    return false;
  });
</script>

    </body>
    </html>