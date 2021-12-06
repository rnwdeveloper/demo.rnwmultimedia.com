<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div class="main-content">
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-12 d-flex justify-content-between">
               <h6 class="page-title text-dark mb-3">Source</h6>
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
                        <button class="btn btn-info"  data-toggle="modal" data-target=".create-source" onclick="resetval()"><span data-toggle="tooltip" data-placement="bottom" title="Source"><i class="fa fa-plus"></i></span></button>  
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-striped income-table" id="table1">
                           <thead>
                              <tr>
                                 <th>SN</th>
                                 <th>Source Name</th>
                                 <th>Addby</th>
                                 <th>Time</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>                              
                           <?php $sno=1; foreach($source_list as $cl) { ?>
                              <tr>
                                 <td><?php echo $sno; ?></td>
                                 <td>
                                 <?php echo $cl->source_name; ?>                     
                                 </td>
                                 <td>
                                 <?php echo $cl->addBy; ?>
                                 </td>
                                 <td><?php echo $cl->added_date; ?></td>
                                 <td>
                                 <?php if($cl->source_status=="0") { ?>
                                 <a class="badge badge-success text-white">Active</a>
                                 <?php } else { ?>
                                 <a class="badge badge-danger text-white">Disable</a>
                                 <?php } ?>                         
                                 </td>
                                 <td>
                                 <div class="dropdown">
                                 <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                                 <div class="dropdown-menu">
                                 <?php $xx = $cl->source_id; ?>
                                 <a class="dropdown-item has-icon" href="javascript:upd(<?php echo $xx; ?>)">
                                    <i class="far fa-edit"></i> Edit
                                 </a>
                                 <a class="dropdown-item has-icon text-danger" href="javascript:remove(<?php echo $xx; ?>)">
                                    <i class="far fa-trash-alt"></i> Delete
                                 </a>
                                 <?php if ($cl->source_status == 0) { ?>
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

 <!-- basic modal -->
 <div class="modal fade create-source" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Create Source</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" class="document-createmodal" method="post" name="source_add" id="source_add">
      <input type="hidden" name="source_id" id="source_id" class="form-control">
      <div class="form-row">
         <div class="form-group col-md-12">
         <label for="pwd">Select Channel:</label>
            <select name="channel_source_id" id="channel_source_id" class="form-control">
               <option value="teting">Select Channel</optin>
                  <?php foreach($channel_list as $cl) { ?>
               <option value="<?php echo $cl->channel_name; ?>"><?php echo $cl->channel_name; ?></optin>
                  <?php } ?>
            </select>
         </div>   
         <div class="form-group col-md-12">
            <label for="inputEmail4">Source Name:</label>
            <input class="form-control" type="text" name="source_name" id="source_name" placeholder="Enter Source Name" required value=""> 
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
      $("#source_add").validate({
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
          var form = $('#source_add')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>LeadlistController/ajax_source",
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

      function upd(source_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>LeadlistController/get_record_source",
          type: "post",
          data: {
            'source_id': source_id
          },
          success: function(resp) {
            $(".create-source").modal();
            var data = $.parseJSON(resp);

            var source_id = data['single_record'].source_id;
            var source_name	 = data['single_record'].source_name;
            var channel_source_id	 = data['single_record'].channel_source_id;
         
            $('#source_id').val(source_id);
            $('#source_name').val(source_name);
            $('#channel_source_id').val(channel_source_id);
            
            $('#submit').val('Update');
          }

        });
      }

      function status_upd(source_id, status) {
        $.ajax({
          url: "<?php echo base_url(); ?>LeadlistController/update_status",
          type: "post",
          data: {
            'id': source_id,
            'status': status,
            'table': 'lead_source',
            'field': 'source_status',
            'check_field': 'source_id'
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

      function remove(source_id) {
        var conf = confirm("Are you sure to delete record?");
        if (conf) {
          $.ajax({
            url: "<?php echo base_url(); ?>LeadlistController/delete_record",
            type: "post",
            data: {
              'id': source_id,
              'table': 'lead_source',
              'field': 'source_id'
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
      $("#source_add")[0].reset();
    }
    </script>
</html>