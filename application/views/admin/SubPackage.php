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
            <h6 class="page-title text-dark mb-3">SubPackage</h6>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">SubPackage</li>
              </ol>
            </nav>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between income-wrapper">
                <div class="d-flex justify-content-between">
                </div>
                <div class="table-right-content">
                  <button href="#" class="btn btn-info" data-toggle="modal" data-target="#createsubpackage" onclick="resetval()">
                    <span><i class="fas fa-plus mr-1"></i></span>
                  </button>
                  <button href="#" class="btn btn-info" data-toggle="modal" data-target="#filtersubpackage">
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
                        <th>Package Name</th>
                        <th>Course Name</th>
                        <th>Sub-Course Name</th>
                        <th>Fees</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sno = 1;
                      foreach ($subpackage_all as $val) { ?>
                        <tr>
                          <td class="text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?php echo $sno; ?>" name="mark" value="<?php echo $val->subpackage_id; ?>">
                              <label for="checkbox-<?php echo $sno; ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?php echo $sno; ?></td>
                         <td>
                         <?php $packageids = explode(",", $val->package_id);
                            foreach ($package_all as $row) {
                              if (in_array($row->package_id, $packageids)) {
                                echo $row->package_name;
                              }
                            } ?>
                         </td>
                         <td>
                         <?php $courseids = explode(",", $val->course_id);
                            foreach ($course_all as $row) {
                              if (in_array($row->course_id, $courseids)) {
                                echo $row->course_name;
                              }
                            } ?>
                        </td>
                         <td>
                         <?php $subcourseids = explode(",", $val->subcourse_id);
                            foreach ($subcourse_all as $row) {
                              if (in_array($row->subcourse_id, $subcourseids)) {
                                echo $row->subcourse_name;
                              }
                            } ?>
                         </td>
                         <td><?php echo $val->fees; ?></td>
                         <td><?php echo $val->duration." - Month"; ?></td>
                         <td>
                          <?php if($val->subpackage_status=="0") { ?>
                          <a class="badge badge-success text-white">Active</a>
                          <?php } else { ?>
                          <a class="badge badge-danger text-white">Disable</a>
                          <?php } ?>
                          </td>
                          <td><?php echo $val->created_by; ?></td>                                
                          <td>
                            <div class="dropdown">
                              <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                              <div class="dropdown-menu">
                                <?php $xx = $val->subpackage_id; ?>
                                <a class="dropdown-item has-icon" href="<?php echo base_url(); ?>AdminSettings/SubPackage_Edit/<?php echo $val->package_id; ?>" target="_blank"><i class="far fa-edit"></i> Edit </a>
                                <a class="dropdown-item has-icon text-danger" href="javascript:remove_co(<?php echo $xx; ?>)">
                                  <i class="far fa-trash-alt"></i> Delete
                                </a>
                                <?php if ($val->subpackage_status == 0) { ?>
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
  <div class="modal fade" id="createsubpackage" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Create SubPackage</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" class="document-createmodal" method="post" name="subpackage_add" id="subpackage_add">
          <div class="modal-body">
            <div class="card">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-10 p-2">
                  <label for="">Package Name:<span style="color: red;">*</span></label>
                  <select class="form-control" name="package_id" id="package_id" required>
                    <option>Select Package</option>
                    <?php foreach($package_all as $val) { ?>
                      <option value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                </div>
             </div>
            <div id="dynamic_field">
            <div class="col-md-12">
            <div class="row">
            <div class="col-md-3">
                <label for="">Course:<span style="color: red;">*</span></label>
                <select class="form-control" name="course_id[]" id="course_id" required>
                <option>Select Course</option>
                <?php foreach($course_all as $val) { ?>
                    <option value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
                <?php } ?>
                </select>
            </div>  
            <div class="col-md-3">
                <label for="">Sub-Course:<span style="color: red;">*</span></label>
                <select class="form-control co" name="subcourse_id[]" id="subcourse_id" required>
                <option>Select Sub-Course</option>
                <?php foreach($subcourse_all as $val) { ?>
                    <option value="<?php echo $val->subcourse_id; ?>"><?php echo $val->subcourse_name; ?></option>
                <?php } ?>
                </select>
            </div>  
            <div class="col-md-2">
                <label for="">Fees:<span style="color: red;">*</span></label>
                <input class="form-control" name="fees[]" id="fees" required readonly> 
            </div>  
            <div class="col-md-2">
                <label for="">Duration:<span style="color: red;">*</span></label>
                <input class="form-control" name="duration[]" id="duration" readonly>
            </div> 
            <div class="col-md-2 p-4">
            <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i></button>
            </div>   
            </div>
            </div>
            </div>
            <div class="col-md-12">
           <div class="row">
            <div class="col-md-12">
            <input type="submit" class="btn btn-primary" id="Submit" name="submit" value="Submit">
            </div> 
            </div>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- edit subpackage -->
<div class="modal fade" id="editcreatesubpackage" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Edit SubPackage</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" class="document-createmodal" method="post" name="subpackage_add" id="subpackage_add">
          <div class="modal-body">
            <div class="card">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-10 p-2">
                  <label for="">Package Name:<span style="color: red;">*</span></label>
                  <select class="form-control packageids" name="package_id" id="package_id" required>
                    <option>Select Package</option>
                    <?php foreach($package_all as $val) { ?>
                      <option value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                </div>
             </div>
            <div id="dynamic">
            
            </div>
            <div class="col-md-12">
           <div class="row">
            <div class="col-md-12">
            <input type="submit" class="btn btn-primary" id="Submit" name="submit" value="Submit">
            </div> 
            </div>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Filter Course -->
  <div class="modal fade" id="filtersubpackage" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Filter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>AdminSettings/SubPackage">
            <div class="card">
              <div class="branch-items row mb-2">
              <div class="form-group col-md-12 col-sm-12">
              <label for="inputEmail4">Package</label>
              <select class="form-control" name="filter_package" id="filter_package">
                <option value="">Select Package</option>
                <?php foreach ($package_all as $ld) { ?>
                  <option value="<?php echo $ld->package_id; ?>">
                    <?php echo $ld->package_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>         
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
              </div>
            </div>
            <div class="float-right">
            <input type="submit" class="btn btn-primary" value="Submit" name="filter_package_data">
            <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>AdminSettings/SubPackage">Reset</a>
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
    <script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<div id="row'+i+'" class="col-md-12"><div class="row"><div class="col-md-3"><label for="">Course:<span style="color: red;">*</span></label><select class="form-control coone" name="course_id[]" id="course_id'+i+'" onchange="getsubcourse('+i+')" required><option>Select Course</option><?php foreach($course_all as $val) { ?><option value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option> <?php } ?></select></div><div class="col-md-3"><label for="">Sub-Course:<span style="color: red;">*</span></label><select class="form-control cotwo subco" name="subcourse_id[]" id="subcourse_id'+i+'" onchange="getdata('+i+')" required><option>Select Course</option><?php foreach($subcourse_all as $val) { ?><option value="<?php echo $val->subcourse_id; ?>"><?php echo $val->subcourse_name; ?></option><?php } ?></select></div><div class="col-md-2"><label for="">Fees:<span style="color: red;">*</span></label><input class="form-control fee" name="fees[]" id="fees'+i+'" required readonly></div><div class="col-md-2"><label for="">Duration:<span style="color: red; ">*</span></label><input class="form-control dura" name="duration[]" id="duration'+i+'" required readonly></div><div class="col-md-2 p-4"><button type="button" name="remove" id="'+i+'" class="btn btn-icon btn-danger btn_remove"><i class="fas fa-times"></i></button></div></div></div>');
      });
      
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

    });  


  function getsubcourse(ii)
  {
    var course_id = $('#course_id'+ii).val();
          
    $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/get_subcourse",
    method:"POST",
    data:{ 'course_id' : course_id }, 
    success:function(data)
    {
      $('#subcourse_id'+ii).html(data);
    }
    });
  }

  function getdata(il)
  {
    var subcourse_id = $('#subcourse_id'+il).val();
          
      $.ajax({
      url:"<?php echo base_url(); ?>AdminSettings/get_record_subcourse",
      method:"POST",
      data:{ 'subcourse_id' : subcourse_id }, 
      success:function(resp)
      {
        var data = $.parseJSON(resp);
        var fees = data['single_record'].fees;
        var duration = data['single_record'].duration;

        $('#fees'+il).val(fees);
        $('#duration'+il).val(duration);
      }
      });
  }
   </script>
    <script>
      $("#subpackage_add").validate({
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
          var form = $('#subpackage_add')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>AdminSettings/ajax_subpackage",
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

      // function co_upd(package_id) {
      //   $.ajax({
      //     url: "<?php echo base_url(); ?>AdminSettings/get_record_subpackage",
      //     type: "post",
      //     data: {
      //       'package_id': package_id
      //     },
      //     success: function(resp) {
      //       $("#editcreatesubpackage").modal();
      //       var data = $.parseJSON(resp);
      //       $('.packageids').val(data['multiple_record'][0]['package_id'])
      //       var reco='';
      //       reco += "<div class='col-md-12'><div class='row'><div class='col-md-3'><label for=''>Course:<span style='color: red;'>*</span></label><select class='form-control' name='course_id[]' id='course_id'><option value='"+data['multiple_record'][0]['course_id']+"'>"+data['multiple_record'][0]['course_name']+"</option></select></div><div class='col-md-3'><label for=''>Sub-Course:<span style='color: red;'>*</span></label><select class='form-control' name='subcourse_id[]' id='subcourse_id'><option value='"+data['multiple_record'][0]['subcourse_id']+"'>"+data['multiple_record'][0]['subcourse_name']+"</option></select></div><div class='col-md-2'><label for=''>Fees:<span style='color: red;'>*</span></label><input class='form-control' name='fees[]' id='fees' value='"+data['multiple_record'][0]['fees']+"'></div><div class='col-md-2'><label for=''>Duration:<span style='color: red; '>*</span></label><input class='form-control' name='duration[]' id='duration' value='"+data['multiple_record'][0]['duration']+"'></div><div class='col-md-2 p-4'><button type='button' name='add' id='add' class='btn btn-success'><i class='fas fa-plus'></i></button></div></div></div>";

      //       for(i=1; i< data['multiple_record'].length; i++) {
      //       reco += "<div class='col-md-12'><div class='row'><div class='col-md-3'><label for=''>Course:<span style='color: red;'>*</span></label><select class='form-control' name='course_id[]' id='course_id'><option value='"+data['multiple_record'][i]['course_id']+"'>"+data['multiple_record'][i]['course_name']+"</option></select></div><div class='col-md-3'><label for=''>Sub-Course:<span style='color: red;'>*</span></label><select class='form-control' name='subcourse_id[]' id='subcourse_id'><option value='"+data['multiple_record'][i]['subcourse_id']+"'>"+data['multiple_record'][i]['subcourse_name']+"</option></select></div><div class='col-md-2'><label for=''>Fees:<span style='color: red;'>*</span></label><input class='form-control' name='fees[]' id='fees' value='"+data['multiple_record'][i]['fees']+"'></div><div class='col-md-2'><label for=''>Duration:<span style='color: red; '>*</span></label><input class='form-control' name='duration[]' id='duration' value='"+data['multiple_record'][i]['duration']+"'></div><div class='col-md-2 p-4'><button type='button' name='remove' id='' class='btn btn-icon btn-danger btn_remove'><i class='fas fa-times'></i></button></div></div></div>";
      //     } 
          
      //      $('#dynamic').html(reco);

      //     }

      //   });
      // }


      function co_status_upd(subpackage_id, status) {
        $.ajax({
          url: "<?php echo base_url(); ?>AdminSettings/update_status",
          type: "post",
          data: {
            'id': subpackage_id,
            'status': status,
            'table': 'rnw_subpackage',
            'field': 'subpackage_status',
            'check_field': 'subpackage_id'
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

      function remove_co(subpackage_id) {
        var conf = confirm("Are you sure to delete record?");
        if (conf) {
          $.ajax({
            url: "<?php echo base_url(); ?>AdminSettings/delete_record",
            type: "post",
            data: {
              'id': subpackage_id,
              'table': 'rnw_subpackage',
              'field': 'subpackage_id'
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
      $("#subpackage_add")[0].reset();
    }
    </script>
    <script type="text/javascript">
  $('#course_id').change(function(){
   
   var course_id = $('#course_id').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/get_subcourse",
     method:"POST",
     data:{ 'course_id' : course_id }, 
     success:function(data)
     {
       $('#subcourse_id').html(data);
     }
    });
   });

   $('.co').change(function(){
   
   var subcourse_id = $('.co').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AdminSettings/get_record_subcourse",
     method:"POST",
     data:{ 'subcourse_id' : subcourse_id }, 
     success:function(resp)
     {
      var data = $.parseJSON(resp);
      var fees = data['single_record'].fees;
      var duration = data['single_record'].duration;

      $('#fees').val(fees);
      $('#duration').val(duration);
     }
    });
   });
</script>

    </body>
    <!-- index.html  21 Nov 2019 03:47:04 GMT -->

    </html>