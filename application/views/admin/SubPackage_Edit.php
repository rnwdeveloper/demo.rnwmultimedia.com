<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<div class="main-wrapper main-wrapper-1">
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-between">
            <h6 class="page-title text-dark mb-3">SubPackage-Edit</h6>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">SubPackage-Edit</li>
              </ol>
            </nav>
          </div>
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-primary">
            <div id="msg"></div>
            <form enctype="multipart/form-data" class="document-createmodal" method="post" name="subpackage_add" id="subpackage_add">
                <div class="card-body">
                <div class="col-md-12">
                <div class="row">
                <div class="col-md-10 p-2">
                  <label for="">Package Name:<span style="color: red;">*</span></label>
                  <select class="form-control" name="package_id" id="package_id" required>
                    <option>Select Package</option>
                    <?php $package_ids = explode(",",$single_reco->package_id);
                     foreach($package_all as $val) { ?>
                      <option <?php if(in_array($val->package_id,$package_ids)) { echo "selected"; } ?> value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                </div>
             </div>
            <div id="dynamic_field">
            <div class="col-md-12">
                <div class="row">
                <input type="hidden" class="form-control" name="subpackage_id[]" value="<?php echo $single_reco->subpackage_id ; ?>">
                <div class="col-md-3">
                    <label for="">Course:<span style="color: red;">*</span></label>
                    <select class="form-control" name="course_id[]" id="course_id" required>
                    <option>Select Course</option>
                    <?php $courseids = explode(",",$single_reco->course_id);
                     foreach($course_all as $val) { ?>
                        <option <?php if(in_array($val->course_id,$courseids)) { echo "selected"; } ?> value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
                    <?php } ?>
                    </select>
                </div>  
                <div class="col-md-3">
                    <label for="">Sub-Course:<span style="color: red;">*</span></label>
                    <select class="form-control" name="subcourse_id[]" id="subcourse_id" required>
                    <option>Select Sub-Course</option>
                    <?php $subcourseids = explode(",",$single_reco->subcourse_id);
                     foreach($subcourse_all as $val) { ?>
                        <option <?php if(in_array($val->subcourse_id,$subcourseids)) { echo "selected"; } ?> value="<?php echo $val->subcourse_id; ?>"><?php echo $val->subcourse_name; ?></option>
                    <?php } ?>
                    </select>
                </div>  
                <div class="col-md-2">
                    <label for="">Fees:<span style="color: red;">*</span></label>
                    <input class="form-control" name="fees[]" id="fees" value="<?php echo $single_reco->fees; ?>">
                </div>  
                <div class="col-md-2">
                    <label for="">Duration:<span style="color: red;">*</span></label>
                    <input class="form-control" name="duration[]" id="duration" value="<?php echo $single_reco->duration; ?>">
                </div> 
                <div class="col-md-2 p-4">
                <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i></button>
                </div>   
                </div>
                </div>
            <?php for($i=1; $i<sizeof($match_data); $i++){ if($match_data[$i]->subpackage_status=="0") { ?>
                <input type="hidden" class="form-control" name="subpackage_id[]" value="<?php echo $match_data[$i]->subpackage_id ; ?>">
                <div class="col-md-12">
                <div class="row">
                <div class="col-md-3">
                    <label for="">Course:<span style="color: red;">*</span></label>
                    <select class="form-control" name="course_id[]" id="course_id" required>
                    <option>Select Course</option>
                    <?php $courseids = explode(",",$match_data[$i]->course_id);
                     foreach($course_all as $val) { ?>
                        <option <?php if(in_array($val->course_id,$courseids)) { echo "selected"; } ?> value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
                    <?php } ?>
                    </select>
                </div>  
                <div class="col-md-3">
                    <label for="">Sub-Course:<span style="color: red;">*</span></label>
                    <select class="form-control" name="subcourse_id[]" id="subcourse_id" required>
                    <option>Select Sub-Course</option>
                    <?php $subcourseids = explode(",",$match_data[$i]->subcourse_id);
                     foreach($subcourse_all as $val) { ?>
                        <option <?php if(in_array($val->subcourse_id,$subcourseids)) { echo "selected"; } ?> value="<?php echo $val->subcourse_id; ?>"><?php echo $val->subcourse_name; ?></option>
                    <?php } ?>
                    </select>
                </div>  
                <div class="col-md-2">
                    <label for="">Fees:<span style="color: red;">*</span></label>
                    <input class="form-control" name="fees[]" id="fees" value="<?php echo $match_data[$i]->fees; ?>">
                </div>  
                <div class="col-md-2">
                    <label for="">Duration:<span style="color: red;">*</span></label>
                    <input class="form-control" name="duration[]" id="duration" value="<?php echo $match_data[$i]->duration; ?>">
                </div> 
                <div class="col-md-2 p-4">
                <a href="javascript:co_status_upd(<?php echo $match_data[$i]->subpackage_id; ?>, 1)" class="btn btn-icon btn-danger text-white"><i class="fas fa-times"></i></a>
                </div>   
                </div>
                </div>
                <?php } } ?>
            </div>
            <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <input type="submit" class="btn btn-primary" id="Submit" name="submit" value="Submit">
                    </div> 
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </section>
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
            url: "<?php echo base_url(); ?>AdminSettings/ajax_updsubpackage",
            type: "post",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(resp) {
              var data = $.parseJSON(resp);
              var ddd = data['all_record'].status;
              if (ddd == '1') {
                $('#msg').html(iziToast.success({
                  title: 'Success',
                  timeout: 2000,
                  message: 'HI! This Record Updated.',
                  position: 'topRight'
                }));

                setTimeout(function() {
                  location.reload();
                }, 2020);
              } else if (ddd == '3') {
                $('#msg').html(iziToast.success({
                  title: 'Success',
                  timeout: 2000,
                  message: 'HI! This Record Inserted.',
                  position: 'topRight'
                }));

                setTimeout(function() {
                  location.reload();
                }, 2020);
              } else if (ddd == '2') {
                $('#msg').html(iziToast.error({
                  title: 'Canceled',
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

    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<div id="row'+i+'" class="col-md-12"><div class="row"><div class="col-md-3"><label for="">Course:<span style="color: red;">*</span></label><select class="form-control" name="course_id[]" id="course_id" required><option>Select Course</option><?php foreach($course_all as $val) { ?><option value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option> <?php } ?></select></div><div class="col-md-3"><label for="">Sub-Course:<span style="color: red;">*</span></label><select class="form-control" name="subcourse_id[]" id="subcourse_id" required><option>Select Course</option><?php foreach($subcourse_all as $val) { ?><option value="<?php echo $val->subcourse_id; ?>"><?php echo $val->subcourse_name; ?></option><?php } ?></select></div><div class="col-md-2"><label for="">Fees:<span style="color: red;">*</span></label><input class="form-control" name="fees[]" id="fees" required></div><div class="col-md-2"><label for="">Duration:<span style="color: red; ">*</span></label><input class="form-control" name="duration[]" id="duration"></div><div class="col-md-2 p-4"><button type="button" name="remove" id="'+i+'" class="btn btn-icon btn-danger btn_remove"><i class="fas fa-times"></i></button></div></div></div>');
      });
  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
  
    });  

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
</script>