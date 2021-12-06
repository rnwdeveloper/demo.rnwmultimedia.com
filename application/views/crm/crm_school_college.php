<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div class="main-content">
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-12 d-flex justify-content-between">
               <h6 class="page-title text-dark mb-3">School / Colleges</h6>
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
                  <div class="card-header d-flex justify-content-between income-wrapper">
                     <div class="table-right-content text-right w-100">
                        <button class="btn btn-info"  data-toggle="modal" data-target=".create-school" onclick="resetval()"><span data-toggle="tooltip" data-placement="bottom" title="Create School College"><i class="fa fa-plus"></i></span></button>  
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-striped income-table" id="table1">
                           <thead>
                              <tr> 
                                 <th>SN</th>
                                 <th>School-College Name</th>
                                 <th>Addby</th>
                                 <th>Time</th>
                                 <th>Status</th>
                                 <th>Action</th> 
                              </tr>
                           </thead>
                           <tbody>
                           <?php $sno=1; foreach($school_list as $cl) { ?>
                              <tr>
                                 <td><?php echo $sno; ?></td>
                                 <td>
                                 <?php echo $cl->school_name; ?>                     
                                 </td>
                                 <td>
                                 <?php echo $cl->addBy; ?>
                                 </td>
                                 <td><?php echo $cl->added_date; ?></td>
                                 <td>
                                 <?php if($cl->school_status=="0") { ?>
                                 <a class="badge badge-success text-white">Active</a>
                                 <?php } else { ?>
                                 <a class="badge badge-danger text-white">Disable</a>
                                 <?php } ?>                         
                                 </td>
                                 <td>
                                 <div class="dropdown">
                                 <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                                 <div class="dropdown-menu">
                                 <?php $xx = $cl->school_id; ?>
                                 <a class="dropdown-item has-icon" href="javascript:upd(<?php echo $xx; ?>)">
                                    <i class="far fa-edit"></i> Edit
                                 </a>
                                 <a class="dropdown-item has-icon text-danger" href="javascript:remove(<?php echo $xx; ?>)">
                                    <i class="far fa-trash-alt"></i> Delete
                                 </a>
                                 <?php if ($cl->school_status == 0) { ?>
                                    <a class="dropdown-item has-icon" href="javascript:status_upd(<?php echo $xx; ?>, 1)">
                                       <i class="fas fa-ban"></i> Disable
                                    </a>
                                 <?php } else {  ?>
                                    <a class="dropdown-item has-icon" href="javascript:status_upd(<?php echo $xx; ?>, 0)">
                                       <i class="far fa-check-circle"></i> Active
                                    </a>
                                <?php } ?>
                              </div>
                                 </td>
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

<div class="modal fade create-school" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="mySmallModalLabel">Create School - College</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
         <form enctype="multipart/form-data" class="document-createmodal" method="post" name="scclg_add" id="scclg_add">
         <input type="hidden" name="school_id" id="school_id" class="form-control">
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">School-College Name:</label>
               <input class="form-control" type="text" name="school_name" id="school_name" placeholder="Enter School-College Name" required value="">
            </div>
         </div>
         <div class="form-row">
         <div class="form-group col-md-12">
            <input type="submit" class="btn btn-primary" value="submit" name="submit">
         </div>
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
      $("#scclg_add").validate({
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
          var form = $('#scclg_add')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>LeadlistController/ajax_school_clg",
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

      function upd(school_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>LeadlistController/get_record_school_clg",
          type: "post",
          data: {
            'school_id': school_id
          },
          success: function(resp) {
            $(".create-school").modal();
            var data = $.parseJSON(resp);

            var school_id = data['single_record'].school_id;
            var school_name	 = data['single_record'].school_name;
         
            $('#school_id').val(school_id);
            $('#school_name').val(school_name);
            
            $('#submit').val('Update');
          }

        });
      }

      function status_upd(school_id, status) {
        $.ajax({
          url: "<?php echo base_url(); ?>LeadlistController/update_status",
          type: "post",
          data: {
            'id': school_id,
            'status': status,
            'table': 'list_school',
            'field': 'school_status',
            'check_field': 'school_id'
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! status updated.',
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

      function remove(school_id) {
        var conf = confirm("Are you sure to delete record?");
        if (conf) {
          $.ajax({
            url: "<?php echo base_url(); ?>LeadlistController/delete_record",
            type: "post",
            data: {
              'id': school_id,
              'table': 'list_school',
              'field': 'school_id'
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
      $("#scclg_add")[0].reset();
    }
    </script>
</body>
</html>