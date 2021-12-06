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
                  <h4>Help Center</h4>
                </div>
                <form enctype="multipart/form-data" class="document-createmodal" method="post" name="add_help" id="add_help">
                 <input type="hidden" name="help_center_id" id="help_center_id" class="form-control">
                <div class="card-body">
                <div class="col-12">
                <div class="form-row">
                <div class="form-group col-md-3">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Your Name">
                </div>
                <div class="form-group col-md-3">
                <label for="inputEmail4">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="" placeholder="Enter Your Email">
                </div>
                <div class="form-group col-md-3">
                <label for="inputEmail4">Contact No</label>
                <input type="text" class="form-control" id="contact_no" name="contact_no" value="" placeholder="Enter Your Contact No">
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
                <div class="form-group col-md-3">
                <label for="inputEmail4">Department</label>
                <select class="form-control de_id" name="department_id" id="department_id">
                    <option value="">Select Department</option>
                </select>
                </div>
                <div class="form-group col-md-3">
                <label for="inputEmail4">URL</label>
                <input type="text" class="form-control" id="url" name="url" value="" placeholder="Enter Your URL">
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
  $("#add_help").validate({
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
          var form = $('#add_help')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>Common/Ajax_helpcenter",
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
<script>
   $('.depart').change(function(){
   var branch_id = $('.depart').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>NotifiveController/fetch_branch_wise_department",
     method:"POST",
     data:{ 'branch_id' : branch_id }, 
     success:function(data)
     {
       $('.de_id').html(data);
     }
    });
   });
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
