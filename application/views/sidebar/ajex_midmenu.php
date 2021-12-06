<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<style type="text/css">
  li.select2-selection__choice {
    background-color: #5864BC !important;
  }
</style>
<div class="table-responsive mid_table">
                  <table class="table table-striped normal-table branch-table" id="table2">
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
                      foreach ($m_module as $val) { ?>
                        <tr>
                          <td>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?php echo $sno; ?>" name="mark" value="<?php echo $val->m_module_id; ?>">
                              <label for="checkbox-<?php echo $sno; ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?php echo $sno; ?></td>
                           <td><?php echo $val->module_name; ?></td>     
                           <td><?php echo $val->module_icon; ?></td> 
                            <td>
                              <?php if($val->status=="0") { ?>
                                <a class="badge badge-success text-white">Active</a>
                          <?php } else { ?>
                                <a class="badge badge-danger text-white">Disable</a>
                          <?php } ?>
                            </td>
                            <!-- <td>
                            <div class="dropdown">
                              <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                              <div class="dropdown-menu">
                                <?php $xx = $val->m_module_id; ?>
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
                          <td>
                            <?php $xx = $val->m_module_id; ?>
                                <a href="javascript:co_upd(<?php echo $xx; ?>)" class="bg-primary action-icon text-white btn-primary" ><i class="fas fa-pencil-alt"></i> </a>
                                <a href="javascript:remove_co(<?php echo $xx; ?>)" class="bg-danger action-icon text-white btn-primary" ><i class="fa fa-trash"></i> </a>
                                <?php if($val->status=="0") { ?>
                                <a href="javascript:co_status_upd(<?php echo $xx; ?>,1)" class="bg-danger action-icon text-white btn-danger"><i class="fa fa-check"></i></a> 
                                <?php } else {?>
                                <a href="javascript:co_status_upd(<?php echo $xx; ?>,0)" class="bg-danger action-icon text-white btn-danger"><i class="fa fa-ban"></i></a> 
                                <?php }?>
                                
                          </td>
                        </tr>
                      <?php $sno++;
                      } ?>
                    </tbody>
                  </table>
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
      $("#mid_menu_add").validate({
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
          var form = $('#mid_menu_add')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>MenuTop/ajax_midmenu",
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

                $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/mid_menu_table",
                  type: "post",
                  data: {
                        'm_module_id ': m_module_id 
                  },
                  success: function(Resp) {

                        $('.mid_table').html(Resp);
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
                  url: "<?php echo base_url(); ?>MenuTop/mid_menu_table",
                  type: "post",
                  data: {
                        'm_module_id ': m_module_id 
                  },
                  success: function(Resp) {

                        $('.mid_table').html(Resp);
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
                  url: "<?php echo base_url(); ?>MenuTop/mid_menu_table",
                  type: "post",
                  data: {
                        'm_module_id ': m_module_id 
                  },
                  success: function(Resp) {

                        $('.mid_table').html(Resp);
                  }
               });
              }
            }
          });
        }
      });


      function co_upd(m_module_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>MenuTop/get_record_midmenu",
          type: "post",
          data: {
            'm_module_id': m_module_id
          },
          success: function(resp) {
            $("#createcourse").modal();
            var data = $.parseJSON(resp);

            var m_module_id = data['single_record'].m_module_id;
            var f_module_id = data['single_record'].f_module_id;
            var module_name = data['single_record'].module_name;
            var module_icon = data['single_record'].module_icon;
            
            $('#f_module_id').val(f_module_id);
            $('#m_module_id').val(m_module_id);
            $('#module_name').val(module_name);
            $('#module_icon').val(module_icon);
           }

        });
      }

      function co_status_upd(m_module_id, status) {
        $.ajax({
          url: "<?php echo base_url(); ?>MenuTop/update_status",
          type: "post",
          data: {
            'id': m_module_id,
            'status': status,
            'table': 'm_module',
            'field': 'status',
            'check_field': 'm_module_id'
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
              $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/mid_menu_table",
                  type: "post",
                  data: {
                        'm_module_id ': m_module_id 
                  },
                  success: function(Resp) {

                        $('.mid_table').html(Resp);
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
                  url: "<?php echo base_url(); ?>MenuTop/mid_menu_table",
                  type: "post",
                  data: {
                        'm_module_id ': m_module_id 
                  },
                  success: function(Resp) {

                        $('.mid_table').html(Resp);
                  }
               });
            }
          }
        });
      }

      function remove_co(m_module_id) {
        var conf = confirm("Are you sure to delete record?");
        if (conf) {
          $.ajax({
            url: "<?php echo base_url(); ?>MenuTop/delete_midmenu",
            type: "post",
            data: {
              'id': m_module_id,
              'table': 'm_module',
              'field': 'm_module_id'
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
                $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/mid_menu_table",
                  type: "post",
                  data: {
                        'm_module_id ': m_module_id 
                  },
                  success: function(Resp) {

                        $('.mid_table').html(Resp);
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
                  url: "<?php echo base_url(); ?>MenuTop/mid_menu_table",
                  type: "post",
                  data: {
                        'm_module_id ': m_module_id 
                  },
                  success: function(Resp) {

                        $('.mid_table').html(Resp);
                  }
               });
              }
            }
          });
        }
      }
    
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
    // alert(ids)
     $('.multirow:checked').map(function() {
       ids.push($(this).val());
     });

    $('input[name=mark]:checked').map(function() {
         ids.push($(this).val());
       });

    console.log("idss "+ids);

    //  alert(ids);

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>MenuTop/Multiple_rowremove_mid",
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
          $.ajax({
                  url: "<?php echo base_url(); ?>MenuTop/mid_menu_table",
                  type: "post",
                  data: {
                        'm_module_id ': m_module_id 
                  },
                  success: function(Resp) {

                        $('.mid_table').html(Resp);
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
                  url: "<?php echo base_url(); ?>MenuTop/mid_menu_table",
                  type: "post",
                  data: {
                        'm_module_id ': m_module_id 
                  },
                  success: function(Resp) {

                        $('.mid_table').html(Resp);
                  }
               });
        }
      }
    });
    return false;
  });
</script>