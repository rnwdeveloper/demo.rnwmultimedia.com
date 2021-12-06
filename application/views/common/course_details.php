<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<style type="text/css">
  li.select2-selection__choice {
    background-color: #5864BC !important;
  }
</style>

<div class="modal fade" id="courseDetails" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="myLargeModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="card">
          <div class="branch-items row mb-2">
            <div class="table-responsive mt-3 ">
              <table class="table table-striped income-table table-bordered">
                <thead>
                  <th>Course</th>
                  <th>Fees & Installment	</th>
                  <th>Signing Sheet</th>
                  <th>Job Guarantee</th>
                </thead>
                <tbody id="courseDetaildata">
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="main-content overflow-hidden">
  <section class="section">
    <div class="section-body ">
      <div class="card pt-3">
        <div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-end">
              <div class="table-right-content">
                <button class="btn text-dark">
                  <span><i class="fas fa-arrow-left mr-1"></i> Back</span>
                </button>
              </div>
            </div>
            <div class="CMcourses-details">
              <div class="card-body">
                <ul class="nav nav-pills" id="myTab3" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Single Course
                    </a>
                  </li>
                  <li class="nav-item mt-3 mt-md-0">
                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Package</a>
                  </li>
                  <li class="nav-item mt-3 mt-md-0">
                    <a class="nav-link" id="profile-tabclg" data-toggle="tab" href="#profileclg" role="tab" aria-controls="profile" aria-selected="false">College</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent2">
                  <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                    <div class="d-flex justify-content-between mt-3">
                      <div class="form-group col-md-6 pl-0">
                        <label>Single Course</label>
                        <select class="form-control" name="filter_single_course" id="course">
                          <option value="">Select Course</option>
                          <?php foreach ($course_all as $val) { ?>
                            <option value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-md-6 pl-0">
                      <label>Sub-Course</label>
                      <select class="form-control" name="subcourse_id" id="subcourse_id" required>
                        <option value="">Select Sub-Course</option>
                        <?php foreach ($list_subcourse as $val) { ?>
                          <option value="<?php echo $val->subcourse_id; ?>"><?php echo $val->subcourse_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="table-responsive mt-3 ">
                      <table class="table table-striped income-table table-bordered" id="table1">
                        <thead>
                          <tr>
                            <th>SN</th>
                            <th width="200px">Branch</th>
                            <th>Department</th>
                            <th>SubDepartment</th>
                            <th width="300px">Course</th>
                            <th width="200px">Fees & Installment</th>
                            <th>Signing Sheet</th>
                            <th>Job Guarantee</th>
                            <!-- <th>Relevant Course</th> -->
                          </tr>
                        </thead>
                        <tbody id="tbodydata"></tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                    <div class="d-flex justify-content-between mt-3">
                      <div class="form-group col-md-6 pl-0">
                        <label>Package</label>
                        <select class="form-control" name="package_id" id="package_id" required>
                          <option value="">Select Package</option>
                          <?php foreach ($package as $val) { ?>
                            <option value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="table-responsive mt-3 ">
                      <table class="table table-striped income-table table-bordered">
                        <thead>
                          <tr>
                            <th>SN</th>
                            <th width="200px">Branch</th>
                            <th>Department</th>
                            <th>SubDepartment</th>
                            <th width="300px">Package Name</th>
                            <th width="200px">Fees & Installment</th>
                            <th>Signing Sheet</th>
                            <th>Job Guarantee</th>
                            <th>Course</th>
                          </tr>
                        </thead>
                        <tbody id="tbodydatapackage"></tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profileclg" role="tabpanel" aria-labelledby="profile-tabclg">
                    <div class="d-flex justify-content-between mt-3">
                      <div class="form-group col-md-6 pl-0">
                        <label>Course</label>
                        <select class="form-control" name="college_courses_id" id="college_courses_id" required>
                          <option value="">Select Course</option>
                          <?php foreach($list_clg_course as $val) { ?>
                            <option value="<?php echo $val->college_courses_id; ?>"><?php echo $val->college_course_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="table-responsive mt-3 ">
                      <table class="table table-striped income-table table-bordered">
                        <thead>
                          <tr>
                            <th>SN</th>
                            <th width="200px">Branch</th>
                            <th>Department</th>
                            <th>Category</th>
                            <th width="300px">Course Name</th>
                            <th width="200px">Fees & Installment</th>
                            <th>Semester / Fees</th>
                          </tr>
                        </thead>
                        <tbody id="tbodydataclg"></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
  $('#course').change(function() {

    var course_id = $('#course').val();

    $.ajax({
      url: "<?php echo base_url(); ?>Common/get_subcourse",
      method: "POST",
      data: {
        'course_id': course_id
      },
      success: function(data) {
        $('#subcourse_id').html(data);
      }
    });
  });

  $('#subcourse_id').change(function() {

    var subcourse_id = $('#subcourse_id').val();

    $.ajax({
      url: "<?php echo base_url(); ?>Common/get_details",
      method: "POST",
      data: {
        'subcourse_id': subcourse_id
      },
      success: function(resp) {
        var data = $.parseJSON(resp);

        var tableDetails = '';
        for (var i = 0; i < data.length; i++) {
        if(data[i].shining_sheet == ""){
          tableDetails +=
            '<tr>' +
            '<td>' + (i + 1) + '</td>' +
            '<td>' + (data[i].branch_name) + '</td>' +
            '<td>' + (data[i].department_name) + '</td>' +
            '<td>' + (data[i].subdepartment_name) + '</td>' +
            '<td>' + (data[i].subcourse_name) + '</td>' +
            '<td>' + 'Fees: ' + data[i].fees + '<br/>' + 'Installment : ' + data[i].installment + '<br/>' + 'Duration : ' + data[i].duration + '<br/>' + '</td>' +
            '<td class="text-center"><span class="badge badge-danger">No Shining sheet Uploaded</span></td>' +
            '<td>' + (data[i].job_guarantee) + '</td>' +
            '</tr>';
        }else{
          tableDetails +=
            '<tr>' +
            '<td>' + (i + 1) + '</td>' +
            '<td>' + (data[i].branch_name) + '</td>' +
            '<td>' + (data[i].department_name) + '</td>' +
            '<td>' + (data[i].subdepartment_name) + '</td>' +
            '<td>' + (data[i].subcourse_name) + '</td>' +
            '<td>' + 'Fees: ' + data[i].fees + '<br/>' + 'Installment : ' + data[i].installment + '<br/>' + 'Duration : ' + data[i].duration + '<br/>' + '</td>' +
            '<td class="text-center"><a target="_blank" href="../dist/signsheet/' + data[i].shining_sheet + '" class="bg-success action-icon text-white btn-success"><i class="fa fa-download" aria-hidden="true"></i></a></td>' +
            '<td>' + (data[i].job_guarantee) + '</td>' +
            '</tr>';
        }
        }

        $('#tbodydata').html(tableDetails);
      }
    });
  });

  $('#package_id').change(function() {

    var package_id = $('#package_id').val();

    $.ajax({
      url: "<?php echo base_url(); ?>Common/get_package_details",
      method: "POST",
      data: {
        'package_id': package_id
      },
      success: function(resp) {
        var data = $.parseJSON(resp);

        var tableDetails = '';
        var courseDetails = '';

        for (var i = 0; i < data.length; i++) {
          if(data[i].shining_sheet == ""){

            '<tr>' +
            '<td>' + (i + 1) + '</td>' +
            '<td>' + (data[i].branch_name) + '</td>' +
            '<td>' + (data[i].department_name) + '</td>' +
            '<td>' + (data[i].subdepartment_name) + '</td>' +
            '<td>' + (data[i].package_name) + '</td>' +
            '<td>' + 'Fees: ' + data[i].fees + '<br/>' + 'Installment : ' + data[i].installment + '<br/>' + 'Duration : ' + data[i].duration + '<br/>' + '</td>' +
            '<td class="text-center"><span class="badge badge-danger">No Shining sheet Uploaded</span></td>' +
            '<td>' + (data[i].job_guarantee) + '</td>' +
            '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#courseDetails">Course</button></td>' +
            '</tr>';
          }else{ 
          tableDetails +=
            '<tr>' +
            '<td>' + (i + 1) + '</td>' +
            '<td>' + (data[i].branch_name) + '</td>' +
            '<td>' + (data[i].department_name) + '</td>' +
            '<td>' + (data[i].subdepartment_name) + '</td>' +
            '<td>' + (data[i].package_name) + '</td>' +
            '<td>' + 'Fees: ' + data[i].fees + '<br/>' + 'Installment : ' + data[i].installment + '<br/>' + 'Duration : ' + data[i].duration + '<br/>' + '</td>' +
            '<td class="text-center"><a target="_blank" href="../dist/signsheet/' + data[i].shining_sheet + '" class="bg-success action-icon text-white btn-success"><i class="fa fa-download" aria-hidden="true"></i></a></td>' +
            '<td>' + (data[i].job_guarantee) + '</td>' +
            '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#courseDetails">Course</button></td>' +
            '</tr>';
          }
            

            $('#myLargeModalLabel').html("Package: "+data[i].package_name);

            for (var j=0; j < data[i].course_details.length; j++ ) {

              
              courseDetails +=
              '<tr>' +
                '<td>' + data[i].course_details[j].subcourse_name + '</td>' +
                '<td>' + 'Fees: ' + data[i].course_details[j].fees + '<br/>' + 'Installment : ' + data[i].course_details[j].installment + '<br/>' + 'Duration : ' + data[i].course_details[j].duration + '<br/>' + '</td>' +
                '<td class="text-center"><a target="_blank" href="../dist/signsheet/' + data[i].course_details[j].shining_sheet + '" class="bg-success action-icon text-white btn-success"><i class="fa fa-download" aria-hidden="true"></i></a></td>' +
                '<td>' + data[i].course_details[j].job_guarantee + '</td>' +
              '</tr>';
            }
        }

        
        // for (var i = 0; i < data.course_details.length; i++) {
        //   console.log(data.course_details.subcourse_name);
        //   // courseDetails +=
        //   // '<tr>' +
        //   //   '<td>' + data[0].subcourse_name + '</td>' +
        //   // '</tr>';
        // }


        $('#tbodydatapackage').html(tableDetails);
        

        $('#courseDetaildata').html(courseDetails);
      }
    });
  });


$('#college_courses_id').change(function() {

var college_courses_id = $('#college_courses_id').val();

$.ajax({
  url: "<?php echo base_url(); ?>Common/get_clg_details",
  method: "POST",
  data: {
    'college_courses_id': college_courses_id
  },
  success: function(resp) {
    var data = $.parseJSON(resp);

    var tableDetails = '';
    var courseDetails = '';

    for (var i = 0; i < data.length; i++) {
      tableDetails +=
        '<tr>' +
        '<td>' + (i + 1) + '</td>' +
        '<td>' + (data[i].branch_name) + '</td>' +
        '<td>' + (data[i].department_name) + '</td>' +
        '<td>' + (data[i].subdepartment_name) + '</td>' +
        '<td>' + (data[i].college_course_name) + '</td>' +
        '<td>' + 'Fees: ' + data[i].college_tuition_fees + '<br/>' + 'Semester : ' + data[i].no_of_semester + '<br/>' + 'Duration : ' + data[i].duration + '<br/>' + '</td>' +
        '<td>' + (data[i].semester_fees) + '</td>' +
        '</tr>';
    }

    $('#tbodydataclg').html(tableDetails);
  }
});
});

  $('#profile-tab3').click(function() {
    $('#course').val('');
    $('#subcourse_id').val('');
    $('#tbodydata').html('');
  })

  $('#home-tab3').click(function() {
    $('#package_id').val('');
    $('#tbodydatapackage').html('');
  })

  $('#profile-tabclg"').click(function() {
    $('#college_courses_id').val('');
    $('#tbodydataclg').html('');
  })
</script>