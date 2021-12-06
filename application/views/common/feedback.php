<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/css/bootstrap-select.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css"> 
<div class="loader"></div>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
      <section class="section">
        <div class="section-body">
          <div class="row">
            <div class="col-8">
              <div class="card">
                <div class="card-header">
                  <h4>Feed Back</h4>
                  <div class="card-header-action">
                    <!-- <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".bd-example-modal-lg">
                      <i class="fas fa-filter mr-1" data-toggle="tooltip" data-placement="bottom" title="Filter"></i>
                    </a> -->
                    <div class="dropdown">
                      <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle text-white"  ><i class="fas fa-tasks mr-1" data-toggle="tooltip" data-placement="bottom" title="Task"></i></a>
                      <div class="dropdown-menu">
                        <!-- <a href="#" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target=".expenses_form" onclick=hide()><i class="far fa-money-bill-alt" style="margin-top: 1px;"></i>
                          Notification Form</a> -->
                        <a href="#" class="dropdown-item has-icon text-dark" data-toggle="modal" data-target=".category"><i class="fas fa-th-list" style="margin-top: 1px;"></i>Create Subject</a>
                      </div>
                    </div>
                    <button class="btn" tabindex="0" aria-controls="tableExport"><span><i class="fas fa-arrow-left mr-1"></i> Back</span></button>
                  </div>
                </div>
                <form enctype="multipart/form-data" class="document-createmodal" method="post" name="add_feedback" id="add_feedback">
                 <input type="hidden" name="feedback_id" id="feedback_id" class="form-control">
                <div class="card-body">
                <div class="col-12">
                    <div class="form-row">
                    <div class="form-group col-md-3">
                    <label for="inputEmail4">GR ID</label>
                    <input type="text" class="form-control" id="gr_id" name="gr_id" value="" placeholder="Enter Your GR ID">
                    </div>
                    <div class="form-group col-md-3">
                    <label for="inputEmail4">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group col-md-3">
                    <label for="inputEmail4">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group col-md-3">
                    <label for="inputEmail4">Branch</label>
                    <select class="form-control s_co p_co depart" name="branch_id" id="branch_id">
                        <option value="">Select Branch</option>
                        <?php foreach($list_branch as $ld) { ?>
                        <option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                <label>Type</label><br>
                <div class="pretty p-icon p-jelly p-round p-bigger">
                    <input type="radio" name="type" value="single" class="pay-type-one" onclick="return hidden_type()"/>
                    <div class="state p-info">
                    <i class="icon material-icons">done</i>
                    <label>Single</label>
                    </div>
                </div>
                <div class="pretty p-icon p-jelly p-round p-bigger">
                    <input type="radio" name="type" value="package" class="pay-type-two" onclick="return hidden_type()"/>
                    <div class="state p-info">
                    <i class="icon material-icons">done</i>
                    <label>Package</label>
                    </div>
                </div>
                <div class="pretty p-icon p-jelly p-round p-bigger">
                    <input type="radio" name="type" value="COLLEGE" class="pay-type-three" onclick="return hidden_type()"/>
                    <div class="state p-info">
                    <i class="icon material-icons">done</i>
                    <label>College</label>
                    </div>
                </div>
                </div>
                <div class="form-group col-md-3 select_course_single">
                <label for="inputEmail4">Course</label>
                <select class="form-control" name="course_id" id="course_id" required>
                    <option value="">Select Course</option>
                </select>
                </div>
                <div class="form-group col-md-3 select_course_package">
                <label for="inputEmail4">Package</label>
                <select class="form-control" name="package_id" id="package_id" required>
                    <option value="">Select Package</option>
                </select>
                </div>
                <div class="form-group col-md-3 select_course_clg">
                <label for="inputEmail4">Course</label>
                <select class="form-control" name="college_courses_id" id="college_courses_id" required>
                <option value="">Select Course</option>
                    <?php foreach($list_college_courses as $ld) { ?>
                    <option value="<?php echo $ld->college_courses_id; ?>"><?php echo $ld->college_course_name; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                <label for="inputEmail4">Subject</label>
                <select class="form-control" name="subject_id" id="subject_id" required>
                    <option value="">Select Subject</option>
                    <?php foreach($list_subject as $ld) { ?>
                    <option value="<?php echo $ld->subject_feedback_id; ?>"><?php echo $ld->subject_name; ?></option>
                    <?php } ?>
                </select>
                </div>
                <div class="form-group col-md-4">
                <label for="inputEmail4">Faculty</label>
                <select class="form-control" name="faculty_id" id="faculty_id">
                    <option value="">Select Faculty</option>
                    <?php foreach($list_faculty as $ld) { ?>
                    <option value="<?php echo $ld->faculty_id; ?>"><?php echo $ld->name; ?></option>
                    <?php } ?>
                </select>
                </div>
                <div class="form-group col-md-8">
                <label for="inputEmail4">Remarks</label>
                <textarea class="form-control" id="remarks" name="remarks" rows="3" cols="50"></textarea>
                </div>
                <div class="form-group col-md-12">
              <input type="submit" class="btn btn-primary" id="Submit" name="submit" value="Submit">
            </div>
               </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<!-- Subject for Notification modal -->
<div class="modal fade category" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Create Subject For <br>Feed Back</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div id="msg_subject"></div>
          <div class="form-group col-md-12">
            <label for="inputEmail4">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" value="" placeholder="Subject Name">
          </div>
          <div class="form-group col-md-12">
            <input type="submit" class="btn btn-primary" id="add_subject" name="add_subject" value="Submit">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal deleted status -->
<div class="modal fade" id="deleted_expenses" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Delete For Reason</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="deleted_status_msg"></div>
        <div class="form-group">
          <label>Remarks</label>
          <textarea name="remarks" id="remarks" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="status_deleted" id="status_deleted" value="Submit">
      </div>
    </div>
  </div>
</div>

<!-- General JS Scripts -->
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
     $('.select_course_package').hide();
     $('.select_course_clg').hide();
   function hidden_type()
   {
   var co_pa_clg = $("input[name='type']:checked").val();
   //alert(course_package);
   if(co_pa_clg == 'single'){
   	$('.select_course_single').show();
   	$('.select_course_package').hide();
   	$('.select_course_clg').hide();
    } else if(co_pa_clg == 'package'){
   	$('.select_course_package').show();
   	$('.select_course_single').hide();
    $('.select_course_clg').hide();
   } else {
    $('.select_course_clg').show();
    $('.select_course_single').hide();
   	$('.select_course_package').hide();
   }
}
</script>

<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->
<script>
  $('#mySelect').selectpicker();

  $('.expenses_form').on('click', function() {
  $("#")[0].reset();
});
</script>
<script>
  $("#add_feedback").validate({
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
          var form = $('#add_feedback')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>Common/Ajax_feedback",
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
</script>
<script type="text/javascript">
  $('#add_subject').on('click', function() {
    var subject_name = $('#subject').val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>Common/Ajax_create_subject",
      data: {
        'subject_name': subject_name
      },

      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        if (ddd == '1') {
          $('#msg_subject').html(iziToast.success({
            title: 'Success',
            timeout: 2000,
            message: 'HI! This Record Inserted.',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        } else if (ddd == '2') {
          $('#msg_subject').html(iziToast.error({
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

    return false;
  });
</script>
<script>
$('.s_co').change(function(){
   var branch_id = $('.s_co').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_single_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
       $('#course_id').html(data);
     }
    });
   });

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

   $('.p_co').change(function(){
   var branch_id = $('.p_co').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_package_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
      $('#package_id').html(data);
     }
    });
   });

   $('#package_id').change(function(){
   var package_id = $('#package_id').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/get_subpackage",
     method:"POST",
     data:{ 'package_id' : package_id }, 
     success:function(data)
     {
       $('#subpackage_id').html(data);
     }
    });
   });

   $('.depart').change(function(){
   var branch_id = $('.depart').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>NotifiveController/fetch_branch_wise_department",
     method:"POST",
     data:{ 'branch_id' : branch_id }, 
     success:function(data)
     {
       $('#department_id').html(data);
     }
    });
   });
</script>
<script>
  function check_selectedvalue() {
    var id = "";
    var items = document.getElementsByName('feedback_ids');
    for (var i = 0; i < items.length; i++) {
      if (items[i].type == 'checkbox') {
        if (items[i].checked) {
          if (id == "") {
            id = items[i].value;
          } else {
            id = id + "," + items[i].value;
          }
        }
      }
    }

    if (id != "") {
      $('#id').val(id);
      $('#deleted_expenses').modal("show").on('click', '#updateok', function(e) {

      });
    } else {
      alert("Please Select Row");
    }
  }
</script>
<script>
$('#table2').DataTable({
            'stateSave': true
        })
</script>
<script>
function stu() {
 $('.hideden-section').show();
}

function stuhide() {
 $('.hideden-section').hide();
}
$('.hideden-section').hide();
</script>
<script>
$(document).ready(function(){
 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>Account/Serchbygrid",
   method:"POST",
   data:{query:query},
   success:function(resp){
    var data = $.parseJSON(resp);
  
      var fullname2 = data['single_record'].surname + " " + data['single_record'].first_name + " " + data['single_record'].father_name;
       $('#fullname').val(fullname2);

       var admiid = data['single_record'].admission_id;
       $('#admissionids').val(admiid);

       var gid = data['single_record'].gr_id;
       $('#grids').val(gid);

       var cotype = data['single_record'].type;
       $('#ctype').val(cotype);

       let c = data['single_record'].type;
       if(c == "package") {
        var pa = data['single_record'].package_name;
        $('#allco').val(pa);
       } else if(c == "single") {
        var co = data['single_record'].course_name;
        $('#allco').val(co);
       } else {
        var clg = data['single_record'].college_course_name;
        $('#allco').val(clg);
       }
   }
  });
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});

$('.txtedit').focusout(function(){
  // Get edit id, field name and value
  var edit_id = $(this).data('id');
  var fieldname = $(this).data('field');
  var value = $(this).val();

  // assign instance to element variable
  var element = this;
  // alert(edit_id);
  // alert(fieldname);
  // alert(value);

  // Send AJAX request
  $.ajax({
    url: '<?= base_url() ?>Account/edit_fillable_data',
    type: 'post',
    data: { field:fieldname, value:value, id:edit_id },
    success:function(response){

      // Hide Input element
     // $(element).hide();

      // Update viewing value and display it
      $(element).prev('.edit').show();
      if(value != ''){
        $('#edited_ccomentmsg').html(iziToast.success({
          title: 'Success',
          timeout: 2500,
          message: 'Update success.',
          position: 'topRight'
          }));
      }
      else{
        $('#edited_ccomentmsg').html(iziToast.error({
          title: 'Canceled!',
          timeout: 2500,
          message: 'Nothing to Change!!',
          position: 'topRight'
          }));
      }
    }
  });
});
</script>
<script type="text/javascript">
$(function() {
   var start1=moment().subtract(1, 'days');
    var end1=moment();

    var start=""
    var end=""
    
    function cb(start, end) {
        $('#fromdate').val(start.format('YYYY-MM-DD'));
        $('#todate').val(end.format('YYYY-MM-DD'));
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
    }

    $('#reportrange').daterangepicker({
        startDate: start1,
        endDate: end1,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>

  </body> 
</html>
