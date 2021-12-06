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
                  <h4>Send Notification</h4>
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
                <div class="card-body">
                <div class="col-8">
                <form enctype="multipart/form-data" class="document-createmodal" method="post" name="add_notifive" id="add_notifive">
                <input type="hidden" name="send_notification_id" id="send_notification_id" class="form-control">
                <div id="msg_notifive"></div>
              <ul class="nav nav-pills" id="myTab3" role="tablist">
                  <li class="nav-item">
                  <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                      aria-controls="home" aria-selected="true">Individual</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab"
                      aria-controls="profile" aria-selected="false">Group</a>
                  </li>
              </ul>
              <div class="tab-content" id="myTabContent2">
                <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                <div class="form-row">
                    <div class="form-group col-md-3">
                    <label>GR ID</label>
                        <input type="text" class="form-control" id="gr_id" name="gr_id" value="" placeholder="GR ID">
                    </div>
                    <div class="form-group col-md-4">
                  <label>Type</label><br>
                  <div class="pretty p-icon p-jelly p-round p-bigger">
                    <input type="radio" name="pay_type" value="Student" class="pay-type-one"/>
                    <div class="state p-info">
                      <i class="icon material-icons">done</i>
                      <label>Student</label>
                    </div>
                  </div>
                  <div class="pretty p-icon p-jelly p-round p-bigger">
                    <input type="radio" name="pay_type" value="Parents" class="pay-type-two"/>
                    <div class="state p-info">
                      <i class="icon material-icons">done</i>
                      <label>Parents</label>
                    </div>
                  </div>
                </div>
                </div>  
                </div>
                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Type</label><br>
                  <div class="pretty p-icon p-jelly p-round p-bigger">
                    <input type="radio" name="pay_type" value="Student" class="pay-type-one"/>
                    <div class="state p-info">
                      <i class="icon material-icons">done</i>
                      <label>Student</label>
                    </div>
                  </div>
                  <div class="pretty p-icon p-jelly p-round p-bigger">
                    <input type="radio" name="pay_type" value="Parents" class="pay-type-two"/>
                    <div class="state p-info">
                      <i class="icon material-icons">done</i>
                      <label>Parents</label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4">Branch</label>
                  <select class="form-control s_co p_co depart" name="branch_id" id="branch_id">
                    <option value="">Select Branch</option>
                    <?php foreach($list_branch as $ld) { ?>
                      <option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4">Department</label>
                  <select class="form-control" name="department_id" id="department_id">
                  <option value="">Select Department</option>
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
                <div class="form-group col-md-3 select_course_single">
                  <label for="inputEmail4">SubCourse</label>
                  <select class="form-control" name="subcourse_id" id="subcourse_id" required>
                    <option value="">Select SubCourse</option>
                  </select>
                </div>
                <div class="form-group col-md-3 select_course_package">
                  <label for="inputEmail4">Package</label>
                  <select class="form-control" name="package_id" id="package_id" required>
                    <option value="">Select Package</option>
                  </select>
                </div>
                <div class="form-group col-md-3 select_course_package">
                  <label for="inputEmail4">SubPackage</label>
                  <select class="form-control" name="subpackage_id" id="subpackage_id" required>
                    <option value="">Select SubPackage</option>
                  </select>
                </div>
                <div class="form-group col-md-4 select_course_clg">
                  <label for="inputEmail4">Course</label>
                  <select class="form-control" name="college_courses_id" id="college_courses_id" required>
                  <option value="">Select Course</option>
                    <?php foreach($list_college_courses as $ld) { ?>
                      <option value="<?php echo $ld->college_courses_id; ?>"><?php echo $ld->college_course_name; ?></option>
                    <?php } ?>
                    </select>
                </div>
                </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputEmail4">Subject</label>
                  <select class="form-control" name="subject_id" id="subject_id" required>
                    <option value="">Select Subject</option>
                    <?php foreach($list_notifive_subject as $ld) { ?>
                      <option value="<?php echo $ld->notifive_subject_id; ?>"><?php echo $ld->subject; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4">Image/PDF</label>
                  <input type="file" class="form-control" id="image_pdf" name="image_pdf" value="" >
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4">URL</label>
                  <input type="text" class="form-control" id="url" name="url" value="" placeholder="URL">
                </div>
                <div class="form-group col-md-12">
                  <label for="inputEmail4">Taxt</label>
                  <textarea class="form-control" id="text" name="text" rows="3" cols="50"></textarea>
                </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
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
</div>
<!-- Category Expenses modal -->
<div class="modal fade expenses_form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="myLargeModalLabel">Create Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" class="document-createmodal" method="post" name="add_notifive" id="add_notifive">
          <input type="hidden" name="send_notification_id" id="send_notification_id" class="form-control">
      <div class="modal-body">
        <div id="msg_notifive"></div>
        <ul class="nav nav-pills" id="myTab3" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                aria-controls="home" aria-selected="true">Individual</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab"
                aria-controls="profile" aria-selected="false">Group</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent2">
            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
            <div class="form-row">
                <div class="form-group col-md-3">
                <label>GR ID</label>
                    <input type="text" class="form-control" id="gr_id" name="gr_id" value="" placeholder="GR ID">
                </div>
                <div class="form-group col-md-4">
              <label>Type</label><br>
              <div class="pretty p-icon p-jelly p-round p-bigger">
                <input type="radio" name="pay_type" value="Student" class="pay-type-one"/>
                <div class="state p-info">
                  <i class="icon material-icons">done</i>
                  <label>Student</label>
                </div>
              </div>
              <div class="pretty p-icon p-jelly p-round p-bigger">
                <input type="radio" name="pay_type" value="Parents" class="pay-type-two"/>
                <div class="state p-info">
                  <i class="icon material-icons">done</i>
                  <label>Parents</label>
                </div>
              </div>
            </div>
            </div>  
            </div>
            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
            <div class="form-row">
            <div class="form-group col-md-4">
              <label>Type</label><br>
              <div class="pretty p-icon p-jelly p-round p-bigger">
                <input type="radio" name="pay_type" value="Student" class="pay-type-one"/>
                <div class="state p-info">
                  <i class="icon material-icons">done</i>
                  <label>Student</label>
                </div>
              </div>
              <div class="pretty p-icon p-jelly p-round p-bigger">
                <input type="radio" name="pay_type" value="Parents" class="pay-type-two"/>
                <div class="state p-info">
                  <i class="icon material-icons">done</i>
                  <label>Parents</label>
                </div>
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Branch</label>
              <select class="form-control s_co p_co depart" name="branch_id" id="branch_id">
                <option value="">Select Branch</option>
                <?php foreach($list_branch as $ld) { ?>
                  <option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Department</label>
              <select class="form-control" name="department_id" id="department_id">
              <option value="">Select Department</option>
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
            <div class="form-group col-md-3 select_course_single">
              <label for="inputEmail4">SubCourse</label>
              <select class="form-control" name="subcourse_id" id="subcourse_id" required>
                <option value="">Select SubCourse</option>
              </select>
            </div>
            <div class="form-group col-md-3 select_course_package">
              <label for="inputEmail4">Package</label>
              <select class="form-control" name="package_id" id="package_id" required>
                <option value="">Select Package</option>
              </select>
            </div>
            <div class="form-group col-md-3 select_course_package">
              <label for="inputEmail4">SubPackage</label>
              <select class="form-control" name="subpackage_id" id="subpackage_id" required>
                <option value="">Select SubPackage</option>
              </select>
            </div>
            <div class="form-group col-md-4 select_course_clg">
              <label for="inputEmail4">Course</label>
              <select class="form-control" name="college_courses_id" id="college_courses_id" required>
              <option value="">Select Course</option>
                <?php foreach($list_college_courses as $ld) { ?>
                  <option value="<?php echo $ld->college_courses_id; ?>"><?php echo $ld->college_course_name; ?></option>
                <?php } ?>
                </select>
            </div>
            </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">Subject</label>
              <select class="form-control" name="branch_id" id="branch_id" required>
                <option value="">Select Subject</option>
                <?php foreach($list_notifive_subject as $ld) { ?>
                  <option value="<?php echo $ld->notifive_subject_id; ?>"><?php echo $ld->subject; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Image/PDF</label>
              <input type="file" class="form-control" id="image_pdf" name="image_pdf" value="" >
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">URL</label>
              <input type="text" class="form-control" id="url" name="url" value="" placeholder="URL">
            </div>
            <div class="form-group col-md-12">
              <label for="inputEmail4">Taxt</label>
              <textarea class="form-control" id="text" name="text" rows="3" cols="50"></textarea>
            </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="submit" class="btn btn-primary float-right" id="Submit" name="submit" value="Submit">
            </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Subject for Notification modal -->
<div class="modal fade category" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Create Subject For <br>Notification</h5>
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
  $("#add_notifive").validate({
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
          var form = $('#add_notifive')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>NotifiveController/Ajax_SendNotifive",
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

  function expenses_upd(send_notification_id) {
    $.ajax({
      url: "<?php echo base_url(); ?>Account/get_record_expenses",
      type: "post",
      data: {
        'send_notification_id': send_notification_id
      },
      success: function(resp) {
        $(".expenses_form").modal();
        var data = $.parseJSON(resp);
        var send_notification_id = data['single_record'].send_notification_id;
        var pay_type = data['single_record'].pay_type;
        var payment_mode = data['single_record'].payment_mode;
        var bank_name = data['single_record'].bank_name;
        var bank_branch_name = data['single_record'].bank_branch_name;
        var transaction_no = data['single_record'].transaction_no;
        var transaction_date = data['single_record'].transaction_date;
        var cheque_no = data['single_record'].cheque_no;
        var cheque_date = data['single_record'].cheque_date;
        var cheque_status = data['single_record'].cheque_status;
        var cheque_holder_name = data['single_record'].cheque_holder_name;
        var paying_amount = data['single_record'].paying_amount;
        var pay_for = data['single_record'].pay_for;
        var branch_id = data['single_record'].branch_id;
        var info = data['single_record'].info;
        var expenses_category_id = data['single_record'].expenses_category_id;
        var expenses_subcategory_id = data['single_record'].expenses_subcategory_id;
        var pay_date = data['single_record'].pay_date;
        var paid_by = data['single_record'].paid_by;
        var comment = data['single_record'].comment;
        var admission_id = data['single_record'].admission_id;
        var gr_id = data['single_record'].gr_id;
        var fullname = data['single_record'].fullname;
        var course_id = data['single_record'].course_id;
        var package_id = data['single_record'].package_id;
        var college_courses_id = data['single_record'].college_courses_id;
        var type = data['single_record'].type;
        $('#send_notification_id').val(send_notification_id);
        if(pay_type=="Individual")
        {
          $(".pay-type-one").prop("checked", true);
        }
        else
        {
          $(".pay-type-two").prop("checked", true);
        }
        if(pay_for=="Other")
        {
          $(".pay-for-one").prop("checked", true);
        }
        else
        {
          $(".pay-for-two").prop("checked", true);
        }
        
        $('.payment-mode').val(payment_mode);
        $('.bank-name').val(bank_name);
        $('.bank-branch-name').val(bank_branch_name);
        $('.cheque-no').val(cheque_no);
        $('.cheque-date').val(cheque_date);
        $('.cheque-status').val(cheque_status);
        $('.cheque-holder-name').val(cheque_holder_name);
        $('.dd-bank-name').val(bank_name);
        $('.dd-bank-branch-name').val(bank_branch_name);
        $('.dd-cheque-no').val(cheque_no);
        $('.dd-cheque-date').val(cheque_date);
        $('.dd-cheque-status').val(cheque_status);
        $('.dd-cheque-holder-name').val(cheque_holder_name);
        $('.cradit-transaction-no').val(transaction_no);
        $('.cradit-transaction-date').val(transaction_date);
        $('.debit-transaction-no').val(transaction_no);
        $('.debit-transaction-date').val(transaction_date);
        $('.online-transaction-no').val(transaction_no);
        $('.online-transaction-date').val(transaction_date);
        $('.neft-transaction-no').val(transaction_no);
        $('.neft-transaction-date').val(transaction_date);
        $('.neft-bank-name').val(bank_name);
        $('.neft-bank-branch-name').val(bank_branch_name);
        $('.paytm-transaction-no').val(transaction_no);
        $('.paytm-transaction-date').val(transaction_date);
        $('.deposit-transaction-no').val(transaction_no);
        $('.deposit-transaction-date').val(transaction_date);
        $('.capital-float-transaction-no').val(transaction_no);
        $('.capital-float-transaction-date').val(transaction_date);
        $('.google-pay-transaction-no').val(transaction_no);
        $('.google-pay-transaction_date').val(transaction_date);
        $('.phone-pay-transaction-no').val(transaction_no);
        $('.phone-pay-transaction-date').val(transaction_date);
        $('.bajaj-finserv-transaction-no').val(transaction_no);
        $('.bajaj-finserv-transaction-date').val(transaction_date);
        $('.bhim-upi-transaction-no').val(transaction_no);
        $('.bhim-upi-transaction-date').val(transaction_date);
        $('.instamoj-transaction-no').val(transaction_no);
        $('.instamoj-transaction-date').val(transaction_date);
        $('.pay-pal-transaction-no').val(transaction_no);
        $('.pay-pal-transaction-date').val(transaction_date);
        $('.razorpay-transaction-no').val(transaction_no);
        $('.razorpay-transaction-date').val(transaction_date);
        $('#paying_amount').val(paying_amount);
        $('#branch_id').val(branch_id);
        $('#info').val(info);
        $('#paid_by').val(paid_by);
        $('#expenses_category_id').val(expenses_category_id);
        $('#expenses_subcategory_id').val(expenses_subcategory_id);
        $('#pay_date').val(pay_date);
        $('#comment').val(comment);
        $('#admissionids').val(admission_id);
        $('#grids').val(gr_id);
        $('#fullname').val(fullname);
        $('#ctype').val(type);

       if(type == "package") {
        var pa = data['single_record'].package_id;
        $('#allco').val(pa);
       } else if(type == "single") {
        var co = data['single_record'].course_id;
        $('#allco').val(co);
       } else {
        var clg = data['single_record'].college_courses_id;
        $('#allco').val(clg);
       }

       let payfor = data['single_record'].pay_for;
  
        if(payfor == 'Student'){
          $('.hideden-section').show();
        } else {
          $('.hideden-section').hide();
        }

        $('#submit').val('Update');
      }

    });
  }
</script>
<script type="text/javascript">
  $('#add_subject').on('click', function() {
    var subject = $('#subject').val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>NotifiveController/Ajax_create_subject",
      data: {
        'subject': subject
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
    var items = document.getElementsByName('send_notification_ids');
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
