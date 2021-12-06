<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<div class="main-wrapper main-wrapper-1">
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-between">
            <h6 class="page-title text-dark mb-3">Course & Fees-Edit</h6>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Course & Fees-Edit</li>
              </ol>
            </nav>
          </div>
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-primary">
            <div id="msg"></div>
            <input type="hidden" id="last_ins_no" value="<?php echo $last_reco->installment_no; ?>" >
            <form enctype="multipart/form-data" class="document-createmodal" method="post" name="admission_courses_add" id="admission_courses_add">
                <div class="card-body">
            <div id="dynamic_fields">
            <div class="col-md-12">
                <div class="row">
                <input type="hidden" class="form-control course_id" name="admission_courses_id[]" value="<?php echo $single_reco_co->admission_courses_id ; ?>"> 
                <?php if($main_reco->type=="single") { ?>
                  <div class="col-md-3">
                    <label for="">Course:</label>
                    <select class="form-control" name="course_orpackage_id[]" id="course_orpackage_id">
                    <option>Select Course</option>
                    <?php $courseids = explode(",",$single_reco_co->course_orpackage_id);
                     foreach($course_all as $val) { ?>
                        <option <?php if(in_array($val->course_id,$courseids)) { echo "selected"; } ?> value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
                    <?php } ?>
                    </select>
                </div> 
                <?php } else { ?>
                  <div class="col-md-3">
                    <label for="">Package:</label>
                    <select class="form-control" name="course_orpackage_id[]" id="course_orpackage_id">
                    <option>Select Package</option>
                    <?php $courseids = explode(",",$single_reco_co->course_orpackage_id);
                     foreach($package_all as $val) { ?>
                        <option <?php if(in_array($val->package_id,$courseids)) { echo "selected"; } ?> value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
                    <?php } ?>
                    </select>
                </div> 
                <?php } ?>
                <div class="col-md-3">
                    <label for="">SubCourse:</label>
                    <select class="form-control" name="courses_id[]" id="courses_id">
                    <option>Select SubCourse</option>
                    <?php $courseids = explode(",",$single_reco_co->courses_id);
                     foreach($subcourse_all as $val) { ?>
                        <option <?php if(in_array($val->subcourse_id,$courseids)) { echo "selected"; } ?> value="<?php echo $val->subcourse_id; ?>"><?php echo $val->subcourse_name; ?></option>
                    <?php } ?>
                    </select>
                </div>  
                <div class="col-md-3">
                    <label for="">Status:</label>
                    <select class="form-control" name="admission_courses_status[]" id="admission_courses_status">
                    <option>Select Status</option>
                    <?php $status = explode(",",$single_reco_co->admission_courses_status); ?>
                    <option <?php if(in_array("Completed",$status)) { echo "selected"; } ?> value="Completed">Completed</option>
                    <option <?php if(in_array("Ongoing",$status)) { echo "selected"; } ?> value="Ongoing">Ongoing</option>
                    <option <?php if(in_array("Hold",$status)) { echo "selected"; } ?> value="Hold">Hold</option>
                    <option <?php if(in_array("Not Assigned",$status)) { echo "selected"; } ?> value="Not Assigned">Not Assigned</option>
                    <option <?php if(in_array("Terminated",$status)) { echo "selected"; } ?> value="Terminated">Terminated</option>
                    </select>
                </div>  
                <div class="col-md-2 p-4">
                <button type="button" name="adds" id="adds" class="btn btn-success"><i class="fas fa-plus"></i></button>
                </div>  
                </div>
                </div>
            <?php for($i=1; $i<sizeof($multiple_record_co); $i++) {  ?>
                <input type="hidden" class="form-control" name="admission_courses_id[]" value="<?php echo $multiple_record_co[$i]->admission_courses_id; ?>">
                <div class="col-md-12">
                <div class="row">
                <?php if($main_reco->type=="single") { ?>
                  <div class="col-md-3">
                    <label for="">Course:</label>
                    <select class="form-control course_id" name="course_orpackage_id[]" id="course_orpackage_id">
                    <option>Select Course</option>
                    <?php $courseids = explode(",",$multiple_record_co[$i]->course_orpackage_id);
                     foreach($course_all as $val) { ?>
                        <option <?php if(in_array($val->course_id,$courseids)) { echo "selected"; } ?> value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
                    <?php } ?>
                    </select>
                </div> 
                <?php } else { ?>
                  <div class="col-md-3">
                    <label for="">Package:</label>
                    <select class="form-control" name="course_orpackage_id[]" id="course_orpackage_id">
                    <option>Select Package</option>
                    <?php $courseids = explode(",",$multiple_record_co[$i]->course_orpackage_id);
                     foreach($package_all as $val) { ?>
                        <option <?php if(in_array($val->package_id,$courseids)) { echo "selected"; } ?> value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
                    <?php } ?>
                    </select>
                </div> 
                <?php } ?>
                <div class="col-md-3">
                    <label for="">Course:</label>
                    <select class="form-control" name="courses_id[]" id="courses_id">
                    <option>Select Course</option>
                    <?php $courseids = explode(",",$multiple_record_co[$i]->courses_id);
                     foreach($subcourse_all as $val) { ?>
                        <option <?php if(in_array($val->subcourse_id,$courseids)) { echo "selected"; } ?> value="<?php echo $val->subcourse_id; ?>"><?php echo $val->subcourse_name; ?></option>
                    <?php } ?>
                    </select>
                </div>  
                <div class="col-md-3">
                    <label for="">Status:</label>
                    <select class="form-control" name="admission_courses_status[]" id="admission_courses_status">
                    <option>Select Status </option>
                    <option <?php if("Completed"==$multiple_record_co[$i]->admission_courses_status) { echo "selected"; } ?> value="Completed">Completed</option>
                    <option <?php if("Ongoing"==$multiple_record_co[$i]->admission_courses_status) { echo "selected"; } ?> value="Ongoing">Ongoing</option>
                    <option <?php if("Pending"==$multiple_record_co[$i]->admission_courses_status) { echo "selected"; } ?> value="Pending">Pending</option>
                    <option <?php if("Hold"==$multiple_record_co[$i]->admission_courses_status) { echo "selected"; } ?> value="Hold">Hold</option>
                    <option <?php if("Not Assigned"==$multiple_record_co[$i]->admission_courses_status) { echo "selected"; } ?> value="Not Assigned">Not Assigned</option>
                    <option <?php if("Terminated"==$multiple_record_co[$i]->admission_courses_status) { echo "selected"; } ?> value="Terminated">Terminated</option>
                    </select>
                </div> 
                <div class="col-md-2 p-4">
                <button type="button" name="removes" id="" class="btn btn-icon btn-danger btn_removes"  href="javascript:co_status(<?php echo $multiple_record_co[$i]->admission_courses_id; ?>, Terminated)"><i class="fas fa-times"></i></button>
                </div> 
                </div>
                </div>
                <?php }  ?>
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
            <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-primary">
            <div id="msg"></div>
            <form enctype="multipart/form-data" class="document-createmodal" method="post" name="admission_installment_add" id="admission_installment_add">
                <div class="card-body">
            <div id="dynamic_field">
            <div class="col-md-12">
                <div class="row">
                <input type="hidden" class="form-control" name="admission_installment_id[]" value="<?php echo $single_reco->admission_installment_id ; ?>">
                <div class="col-md-1">
                <div class="form-group text-center">
                <label><strong>#NO</strong></label>
                <p><?php echo $single_reco->installment_no; ?></p>
                </div>
                </div>  
                <div class="col-md-3">
                    <label for="">Installment Date:</label>
                    <input class="form-control" name="installment_date[]" id="installment_date" value="<?php echo $single_reco->installment_date; ?>">
                </div>  
                <div class="col-md-3">
                    <label for="">Due Amount:</label>
                    <input class="form-control" name="due_amount[]" id="due_amount" value="<?php echo $single_reco->due_amount; ?>">
                </div>  
                <div class="col-md-3">
                    <label for="">Paid Amount:</label>
                    <input class="form-control" name="paid_amount[]" id="paid_amount" value="<?php echo $single_reco->paid_amount; ?>" readonly>
                </div> 
                <div class="col-md-2 p-4">
                <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i></button>
                </div>  
                </div>
                </div>
            <?php for($i=1; $i<sizeof($multiple_record); $i++){  ?>
                <input type="hidden" class="form-control" name="admission_installment_id[]" value="<?php echo $multiple_record[$i]->admission_installment_id; ?>">
                <div class="col-md-12">
                <div class="row">
                <div class="col-md-1">
                <div class="form-group text-center">
                <label><strong></strong></label>
                <p><?php echo $multiple_record[$i]->installment_no; ?></p>
                </div>
                </div>  
                <div class="col-md-3">
                    <label for="">Installment Date:</label>
                    <input class="form-control" name="installment_date[]" id="installment_date" value="<?php echo $multiple_record[$i]->installment_date; ?>">
                </div>  
                <div class="col-md-3">
                    <label for="">Due Amount:</label>
                    <input class="form-control" name="due_amount[]" id="due_amount" value="<?php echo $multiple_record[$i]->due_amount; ?>">
                </div>  
                <div class="col-md-3">
                    <label for="">Paid Amount:</label>
                    <input class="form-control" name="paid_amount[]" id="paid_amount" value="<?php echo $multiple_record[$i]->paid_amount; ?>" readonly>
                </div> 
                <div class="col-md-2 p-4">
                <button type="button" name="remove" id="" class="btn btn-icon btn-danger btn_remove"><i class="fas fa-times"></i></button>
                </div> 
                </div>
                </div>
                <?php }  ?>
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
$("#admission_installment_add").validate({
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
          var form = $('#admission_installment_add')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>Admission/ajax_updinst",
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
</script>
<script type="text/javascript">
$("#admission_courses_add").validate({
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
          var form = $('#admission_courses_add')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>Admission/ajax_updco",
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
</script>
<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
      var last_ins_no = $('#last_ins_no').val();
      var l = last_ins_no.length;
      var j = parseInt(last_ins_no) + parseInt(l);
      $('#add').click(function(){  
           i++;   
           $('#dynamic_field').append('<div id="row'+i+'" class="col-md-12"><div class="row"><input type="hidden" name="admission_id" id="admission_id" value="<?php echo $main_reco->admission_id; ?>"><input type="hidden" name="branch_id" id="branch_id" value="<?php echo $main_reco->branch_id; ?>"><input type="hidden" name="installment_nos[]" id="installment_nos" value="'+j+'"><div class="col-md-1"><div class="form-group text-center"><label><strong></strong></label><p>'+j+'</p></div></div><div class="col-md-3"><label for="">Installment Date:</label><input class="form-control" name="installment_dates[]" id="installment_dates" value=""></div><div class="col-md-3"><label for="">Due Amount:</label><input class="form-control" name="due_amounts[]" id="due_amounts" value=""></div><div class="col-md-3"><label for="">Paid Amount:</label><input class="form-control" name="paid_amounts[]" id="paid_amounts" value="" readonly></div><div class="col-md-2 p-4"><button type="button" name="remove" id="'+i+'" class="btn btn-icon btn-danger btn_remove"><i class="fas fa-times"></i></button></div></div></div>');
           j++;
      });
  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
  
    });  
   </script>
   <script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
      
      $('#adds').click(function(){  
           i++;   
           $('#dynamic_fields').append('<div id="row'+i+'" class="col-md-12"><div class="row"><input type="hidden" name="admission_id" id="admission_id" value="<?php echo $main_reco->admission_id; ?>"><input type="hidden" name="branch_id" id="branch_id" value="<?php echo $main_reco->branch_id; ?>"><input type="hidden" name="gr_id" id="gr_id" value="<?php echo $main_reco->gr_id; ?>"><input type="hidden" name="surname" id="surname" value="<?php echo $main_reco->surname; ?>"><input type="hidden" name="first_name" id="first_name" value="<?php echo $main_reco->first_name; ?>"><input type="hidden" name="email" id="email" value="<?php echo $main_reco->email; ?>"><?php if($main_reco->type=="single") { ?><div class="col-md-3"><label for="">Course:</label><select class="form-control" name="course_orpackage_ids[]" id="course_orpackage_ids"><option>Select Course</option><?php $courseids = explode(",",$single_reco_co->course_orpackage_id);foreach($course_all as $val) { ?><option <?php if(in_array($val->course_id,$courseids)) { echo "selected"; } ?> value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option><?php } ?></select></div> <?php } else { ?><div class="col-md-3"><label for="">Package:</label><select class="form-control" name="course_orpackage_ids[]" id="course_orpackage_ids"><option>Select Package</option><?php $courseids = explode(",",$single_reco_co->course_orpackage_id); foreach($package_all as $val) { ?><option <?php if(in_array($val->package_id,$courseids)) { echo "selected"; } ?> value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option><?php } ?></select></div> <?php } ?><div class="col-md-3"><label for="">SubCourse:</label><select class="form-control" name="courses_ids[]" id="courses_ids"> <option>Select SubCourse</option> <? foreach($subcourse_all as $val) { ?><option value="<?php echo $val->subcourse_id; ?>"><?php echo $val->subcourse_name; ?></option><?php } ?></select></div><div class="col-md-3"><label for="">Status:</label><select class="form-control" name="admission_courses_statuss[]" id="admission_courses_statuss"><option>Select Status</option><option value="Completed">Completed</option><option  value="Ongoing">Ongoing</option><option value="Hold">Hold</option><option value="Not Assigned">Not Assigned</option><option value="Terminated">Terminated</option></select></div><div class="col-md-2 p-4"><button type="button" name="removes" id="'+i+'" class="btn btn-icon btn-danger btn_removes"><i class="fas fa-times"></i></button></div></div></div>');
      });
  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });
  
    });  
   </script>
    <script type="text/javascript">
  $('.course_id').change(function(){
   
   var course_id = $('.course_id').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/get_subcourse",
     method:"POST",
     data:{ 'course_id' : course_id }, 
     success:function(data)
     {
       $('#courses_id').html(data);
     }
    });
   });

   $('#course_orpackage_id').change(function(){
   
   var package_id = $('#course_orpackage_id').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/get_subpackage",
     method:"POST",
     data:{ 'package_id' : package_id }, 
     success:function(data)
     {
       $('#courses_id').html(data);
     }
    });
   });
</script>
<script>
function co_status(admission_courses_id, status) {
        $.ajax({
          url: "<?php echo base_url(); ?>AdminSettings/update_status",
          type: "post",
          data: {
            'id': admission_courses_id,
            'status': status,
            'table': 'admission_courses',
            'field': 'admission_courses_status',
            'check_field': 'admission_courses_id'
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! Branch status updated.',
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
