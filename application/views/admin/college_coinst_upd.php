<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<div class="main-wrapper main-wrapper-1">
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-between">
            <h6 class="page-title text-dark mb-3">College Courses & Installment-Edit</h6>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">College Courses & Installment-Edit</li>
              </ol>
            </nav>
          </div>
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-primary">
            <div id="msg"></div>
            <form enctype="multipart/form-data" class="document-createmodal" method="post" name="subpackage_add" id="subpackage_add">
            <input type="hidden" class="form-control" name="college_courses_id" id="college_courses_id" value="<?php echo $single_reco->college_courses_id; ?>">
                <div class="card-body">
                <div class="branch-items row mb-2">
                <div class="form-group col-md-3 col-sm-12">
                  <label for="">Branch:<span style="color: red;">*</span></label>
                  <select class="form-control" name="branch_id" id="branch_id" required>
                    <option value="">Select Branch</option>
                    <?php  $catids = explode(",",$single_reco->branch_id);
                    foreach($branch_all as $val) { ?>
                    <option <?php if(in_array($val->branch_id,$catids)) { echo "selected"; } ?> value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="">Department:<span style="color: red;">*</span></label>
                  <select class="form-control" name="department_id" id="department_id" required>
                    <option value="">Select Department</option>
                    <?php  $catids = explode(",",$single_reco->department_id);
                    foreach($department_all as $val) { ?>
                    <option <?php if(in_array($val->department_id,$catids)) { echo "selected"; } ?> value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="">Category:<span style="color: red;">*</span></label>
                  <select class="form-control" name="course_category_id" id="course_category_id" required>
                    <option value="">Select Category</option>
                    <?php  $catids = explode(",",$single_reco->course_category_id);
                    foreach($subdepartment_all as $val) { ?>
                    <option <?php if(in_array($val->subdepartment_id,$catids)) { echo "selected"; } ?> value="<?php echo $val->subdepartment_id; ?>"><?php echo $val->subdepartment_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="">Intake:<span style="color: red;">*</span></label>
                  <select class="form-control" name="intake" id="intake" required>
                    <option value="">Select Intake</option>
                    <option <?php if($single_reco->intake=="19-20") { echo "selected"; } ?> value="19-20">19-20</option>
                    <option <?php if($single_reco->intake=="20-21") { echo "selected"; } ?> value="20-21">20-21</option>
                    <option <?php if($single_reco->intake=="21-22") { echo "selected"; } ?> value="21-22">21-22</option>
                    <option <?php if($single_reco->intake=="22-23") { echo "selected"; } ?> value="22-23">22-23</option>
                    <option <?php if($single_reco->intake=="23-24") { echo "selected"; } ?> value="23-24">23-24</option>
                    <option <?php if($single_reco->intake=="24-25") { echo "selected"; } ?> value="24-25">24-25</option>
                    <option <?php if($single_reco->intake=="25-26") { echo "selected"; } ?> value="25-26">25-26</option>
                    <option <?php if($single_reco->intake=="26-27") { echo "selected"; } ?> value="26-27">26-27</option>
                    <option <?php if($single_reco->intake=="27-28") { echo "selected"; } ?> value="27-28">27-28</option>
                    <option <?php if($single_reco->intake=="28-29") { echo "selected"; } ?> value="28-29">28-29</option>
                    <option <?php if($single_reco->intake=="28-29") { echo "selected"; } ?> value="28-29">29-30</option>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Course Name:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="college_course_name" name="college_course_name" value="<?php echo $single_reco->college_course_name; ?>" placeholder="Enter Course Name">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Course Code:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="college_course_code" name="college_course_code" value="<?php echo $single_reco->college_course_code; ?>" placeholder="Enter Course Code">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Registration Fees:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="college_registration_fees" name="college_registration_fees" value="<?php echo $single_reco->college_registration_fees; ?>" placeholder="Enter Registration Fees">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Semester Fees:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="semester_fees" name="semester_fees" value="<?php echo $single_reco->semester_fees; ?>" placeholder="Enter Semester Fees">
                </div>
                
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Semester Fees Date:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="semester_fees_date" name="semester_fees_date" value="<?php echo $single_reco->semester_fees_date; ?>" placeholder="Semester Date">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Examination Fees:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="examination_fees" name="examination_fees" value="<?php echo $single_reco->examination_fees; ?>" placeholder="Enter Fees">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Exam Fees Date:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="exam_fees_date" name="exam_fees_date" value="<?php echo $single_reco->exam_fees_date; ?>" placeholder="Exam Date">
                </div>
               
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">No Of Semester:<span style="color: red;">*</span></label>
                  <select class="form-control" name="no_of_semester" id="no_of_semester">
                    <option>Select Semester</option>
                    <option <?php if($single_reco->no_of_semester=="2") { echo "selected"; } ?> value="2">2</option>
                    <option <?php if($single_reco->no_of_semester=="4") { echo "selected"; } ?> value="4">4</option>
                    <option <?php if($single_reco->no_of_semester=="6") { echo "selected"; } ?> value="6">6</option>
                    <option <?php if($single_reco->no_of_semester=="8") { echo "selected"; } ?> value="8">8</option>
                    <option <?php if($single_reco->no_of_semester=="10") { echo "selected"; } ?> value="10">10</option>
                  </select>
                </div>
                 <div class="form-group col-md-6 col-sm-12">
                  <label for="pwd">Duration:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="duration" name="duration" value="<?php echo $single_reco->duration; ?>" placeholder="Enter Duration">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                  <label for="pwd">College Tuition Fees:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="college_tuition_fees" name="college_tuition_fees" value="<?php echo $single_reco->college_tuition_fees; ?>" placeholder="Enter Fees">
                </div>

                <?php for($i=0; $i<sizeof($match_data); $i++) { ?>
                <input type="hidden" class="form-control" name="college_installment_id[]" value="<?php echo $match_data[$i]->college_installment_id; ?>">
                <div class="form-group col-md-1 col-sm-12">
                <label for="pwd">Sem</label>
                <p><?php echo $match_data[$i]->semester; ?></p>
                <input class="form-control" type="hidden" id="semester" name="semester[]" value="<?php echo $match_data[$i]->semester; ?>">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                <label for="pwd">Sem Date:<span style="color: red;">*</span></label>
                <input class="form-control" type="text" id="sem_date" name="sem_date[]" value="<?php echo $match_data[$i]->sem_date; ?>" placeholder="Select Date" required>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                <label for="pwd">Sem Fees:<span style="color: red;">*</span></label>
                <input class="form-control" type="text" id="sem_fees" name="sem_fees[]" value="<?php echo $match_data[$i]->sem_fees; ?>" placeholder="Enter Fees" required>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                <label for="pwd">Exam Date:<span style="color: red;">*</span></label>
                <input class="form-control" type="text" id="exam_date" name="exam_date[]" value="<?php echo $match_data[$i]->exam_date; ?>" placeholder="Select Date" required>
                </div>
                <div class="form-group col-md-2 col-sm-12">
                <label for="pwd">Exam Fees:<span style="color: red;">*</span></label>
                <input class="form-control" type="text" id="exam_fees" name="exam_fees[]" value="<?php echo $match_data[$i]->exam_fees; ?>" placeholder="Exam Fees" required>
                </div>
                <?php } ?>
                <div class="form-group col-md-12 col-sm-12">
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </div>
             </div>
        </div>
    </form>
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
            url: "<?php echo base_url(); ?>AdminSettings/ajax_updclgco",
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

   $('#branch_id').change(function(){

var branch_id = $('#branch_id').val();

$.ajax({
    url:"<?php echo base_url(); ?>AdminSettings/get_departmet",
    method:"POST",
    data:{ 'branch_id' : branch_id},
    success:function(data)
    {
        $('#department_id').html(data);
    }
  });
});

$('#department_id').change(function(){

var department_id = $('#department_id').val();

$.ajax({
    url:"<?php echo base_url(); ?>AdminSettings/get_subdepartmet",
    method:"POST",
    data:{ 'department_id' : department_id},
    success:function(data)
    {
        $('#course_category_id').html(data);
    }
  });
});
</script>