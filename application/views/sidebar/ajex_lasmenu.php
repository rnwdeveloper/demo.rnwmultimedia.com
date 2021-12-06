<div class="table-responsive last_menu">
                  <table class="table table-striped normal-table " id="table2">
                    <thead>
                      <tr>
                        <th>
                          <div class="custom-checkbox custom-checkbox-table custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                          </div> 
                        </th>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Controller</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sno = 1;
                      foreach ($l_module as $val) { ?>
                        <tr>
                          <td>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?php echo $sno; ?>" name="mark" value="<?php echo $val->l_module_id; ?>">
                              <label for="checkbox-<?php echo $sno; ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?php echo $sno; ?></td>
                           <td><?php echo $val->name; ?></td>     
                           <td><?php echo $val->icon; ?></td> 
                           <td><?php echo $val->controller; ?></td>
                            <td><?php echo $val->method; ?></td>
<td>
                              <?php if($val->status=="0") { ?>
                                <a class="badge badge-success text-white">Active</a>
                          <?php } else { ?>
                                <a class="badge badge-danger text-white">Disable</a>
                          <?php } ?>
                            </td>
                            <td>
                                <?php $xx = $val->l_module_id; ?>
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
                                <?php $xx = $val->l_module_id; ?>
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
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>

<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>

<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script>

                <script>
      $("#las_menu_add").validate({
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
          var form = $('#las_menu_add')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>MenuTop/ajax_lasmenu",
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


      function co_upd(l_module_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>MenuTop/get_record_lasmenu",
          type: "post",
          data: {
            'l_module_id': l_module_id 
          },
          success: function(resp) {
            $("#createcourse").modal();
            var data = $.parseJSON(resp);
            // console.log(data);
            var l_module_id = data['single_record'].l_module_id;
            console.log(l_module_id);
            var m_module_id = data['single_record'].m_module_id;
            var name = data['single_record'].name;
            var icon = data['single_record'].icon;
            var controller = data['single_record'].controller;
            var method = data['single_record'].method;
            
           
            $('#l_module_id').val(l_module_id);
            $('#m_module_id').val(m_module_id);
            $('#name').val(name);
            $('#icon').val(icon);
            $('#controller').val(controller);
            $('#method').val(method);
           }

        });
      }

      function co_status_upd(l_module_id, status) {
        $.ajax({
          url: "<?php echo base_url(); ?>MenuTop/update_status",
          type: "post",
          data: {
            'id': l_module_id,
            'status': status,
            'table': 'l_module',
            'field': 'status',
            'check_field': 'l_module_id'
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

      function remove_co(l_module_id) {
        var conf = confirm("Are you sure to delete record?");
        if (conf) {
          $.ajax({
            url: "<?php echo base_url(); ?>MenuTop/delete_lasmenu",
            type: "post",
            data: {
              'id': l_module_id,
              'table': 'l_module',
              'field': 'l_module_id'
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
      url: "<?php echo base_url() ?>MenuTop/Multiple_rowremove_las",
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
                }, 2020);

        } else if (ddd == '2') {

          $('#deleted_msg').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2500,
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
<script type="text/javascript">
    function resetval() {
      $("#mid_menu_add")[0].reset();
    }
    </script>