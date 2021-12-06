<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
            <h6 class="page-title text-dark mb-3">College Courses</h6>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Course</li>
              </ol>
            </nav>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between income-wrapper">
                <div class="d-flex justify-content-between">
                </div>
                <div class="table-right-content">
                  <button href="#" class="btn btn-info" data-toggle="modal" data-target="#createcourse" onclick="resetval()">
                    <span><i class="fas fa-plus mr-1"></i></span>
                  </button>
                  <button href="#" class="btn btn-info" data-toggle="modal" data-target="#filtercourse">
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
                        <th>Details</th>
                        <th>Category</th>
                        <th>Course Name</th>
                        <th>College Tuition Fees</th>  
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sno=1; 
                      foreach ($clg_course_all as $val) { ?>
                        <tr>
                          <td class="text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-" name="mark" value="">
                              <label for="checkbox-" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?php echo $sno; ?></td>
                          <td>
                            <div><b>Intake</b> : <?php echo $val->intake; ?></div>
                            <div><b>Course Code</b> : <?php echo $val->college_course_code; ?></div>
                            <div><b>Semester Fees</b> : <?php echo $val->semester_fees; ?></div>
                            <div><b>Semester Date</b> : <?php echo $val->semester_fees_date; ?></div>
                            <div><b>Exam Fees</b> : <?php echo $val->examination_fees; ?></div>
                            <div><b>Exam Date</b> : <?php echo $val->exam_fees_date; ?></div>
                            <div><b>No Of Semester : <?php echo $val->no_of_semester; ?></b></div>
                            <div><b>Duration</b> : <?php echo $val->duration; ?></div>
                          </td>
                          <td>
                          <?php $courseids = explode(",", $val->course_category_id);
                            foreach ($subdepartment_all as $row) {
                              if (in_array($row->subdepartment_id, $courseids)) {
                                echo $row->subdepartment_name;
                              }
                            } ?>
                          </td>
                          <td><?php echo $val->college_course_name; ?></td>
                          <td><?php echo $val->college_tuition_fees; ?></td>
                          <td>
                          <?php if($val->college_courses_status=="0") { ?>
                          <a class="badge badge-success text-white">Active</a>
                          <?php } else { ?>
                          <a class="badge badge-danger text-white">Disable</a>
                          <?php } ?>
                          </td>                                 
                          <td>
                            <div class="dropdown">
                              <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                              <div class="dropdown-menu">
                              <?php $xx = $val->college_courses_id; ?>
                                <a class="dropdown-item has-icon" href="<?php echo base_url(); ?>AdminSettings/college_coinst_upd/<?php echo $xx; ?>" target="_blank">
                                  <i class="far fa-edit"></i> Edit
                                </a>
                                <a class="dropdown-item has-icon text-danger" href="javascript:remove_co(<?php echo $xx; ?>)">
                                  <i class="far fa-trash-alt"></i> Delete
                                </a>
                                <?php if ($val->college_courses_status == 0) { ?>
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
  <div class="modal fade" id="createcourse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Create College Courses</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" class="document-createmodal" method="post" name="course_add" id="course_add">
        <input type="hidden" name="college_courses_id" id="college_courses_id" class="form-control">
          <div class="modal-body">
            <div class="card">
              <div id="msg"></div>
              <div class="branch-items row mb-2">
              <div class="form-group col-md-3 col-sm-12">
                  <label for="">Branch:<span style="color: red;">*</span></label>
                  <select class="form-control" name="branch_id" id="branch_id" required>
                    <option value="">Select Branch</option>
                    <?php foreach($branch_all as $row) { ?>
                    <option value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
              <div class="form-group col-md-3 col-sm-12">
                  <label for="">Department:<span style="color: red;">*</span></label>
                  <select class="form-control" name="department_id" id="department_id" required>
                    <option value="">Select Department</option>
                  </select>
              </div>
              <div class="form-group col-md-3 col-sm-12">
                  <label for="">Category:<span style="color: red;">*</span></label>
                  <select class="form-control" name="course_category_id" id="course_category_id" required>
                    <option value="">Select Category</option>
                  </select>
                </div>
              <div class="form-group col-md-3 col-sm-12">
                  <label for="">Intake:<span style="color: red;">*</span></label>
                  <select class="form-control" name="intake" id="intake" required>
                    <option value="">Select Intake</option>
                    <option>19-20</option>
                    <option>20-21</option>
                    <option>21-22</option>
                    <option>22-23</option>
                    <option>23-24</option>
                    <option>24-25</option>
                    <option>25-26</option>
                    <option>26-27</option>
                    <option>27-28</option>
                    <option>28-29</option>
                    <option>29-30</option>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Course Name:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="college_course_name" name="college_course_name" placeholder="Enter Course Name">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Course Code:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="college_course_code" name="college_course_code" placeholder="Enter Course Code">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Registration Fees:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="college_registration_fees" name="college_registration_fees" placeholder="Enter Registration Fees">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Semester Fees:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="semester_fees" name="semester_fees" placeholder="Enter Semester Fees">
                </div>
                <?php date_default_timezone_set('Asia/Kolkata');  $y = date('Y'); $fy = substr($y,2); $semfeesdate = "01-07-20".$fy;?>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Semester Fees Date:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="semester_fees_date" name="semester_fees_date" value="<?php if(isset($semfeesdate)) { echo $semfeesdate; } ?>" placeholder="Semester Date">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Examination Fees:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="examination_fees" name="examination_fees" placeholder="Enter Fees">
                </div>
                <?php date_default_timezone_set('Asia/Kolkata');  $ey = date('Y'); $efy = substr($ey,2); $examfeesdate = "01-12-20".$efy;?>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Exam Fees Date:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="exam_fees_date" name="exam_fees_date" value="<?php if(isset($examfeesdate)) { echo $examfeesdate; } ?>" placeholder="Exam Date">
                </div>
               
                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">No Of Semester:<span style="color: red;">*</span></label>
                  <select class="form-control" name="no_of_semester" id="no_of_semester">
                    <option>Select Semester</option>
                    <option>2</option>
                    <option>4</option>
                    <option>6</option>
                    <option>8</option>
                    <option>10</option>
                  </select>
                </div>

                 <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">Duration:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="duration" name="duration" placeholder="Enter Duration">
                </div>

                <div class="form-group col-md-3 col-sm-12">
                  <label for="pwd">College Tuition Fees:<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="college_tuition_fees" name="college_tuition_fees" placeholder="Enter Fees">
                </div>
              </div>
              <div class="branch-items row mb-2 sem">
              </div>
            </div>
            <input type="submit" class="btn btn-primary" id="Submit" name="submit" value="Submit">
          </div>
          </form>
      </div>
    </div>
  </div>

  <!-- Filter Course -->
  <div class="modal fade" id="filtercourse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="myLargeModalLabel">Filter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>AdminSettings/College_Courses">
            <div class="card">
              <div class="branch-items row mb-2">
              <div class="form-group col-md-6 col-sm-12">
              <label for="">Intake:</label>
                  <select class="form-control" name="filter_intake" id="filter_intake">
                    <option value="">Select Intake</option>
                    <option>19-20</option>
                    <option>20-21</option>
                    <option>21-22</option>
                    <option>22-23</option>
                    <option>23-24</option>
                    <option>24-25</option>
                  </select>
            </div>                
            <div class="form-group col-md-6 col-sm-12">
            <label for="">Category:</label>
                  <select class="form-control" name="filter_category" id="filter_category">
                    <option value="">Select Category</option>
                    <?php foreach($list_subdepartment as $val) { ?>
                    <option value="<?php echo $val->subdepartment_id; ?>"><?php echo $val->subdepartment_name; ?></option>
                    <?php } ?>
                  </select>
            </div>      
            <div class="form-group col-md-6 col-sm-12">
            <label for="pwd">Course Name:</label>
                  <input class="form-control" type="text" id="filter_course_name" name="filter_course_name" placeholder="Enter Course Name">
            </div>     
            <div class="form-group col-md-6 col-sm-12">
            <label for="pwd">Course Code:</label>
                  <input class="form-control" type="text" id="filter_course_code" name="filter_course_code" placeholder="Enter Course Code">
            </div>                                               
              </div>
            </div>
            <div class="float-right">
            <input type="submit" class="btn btn-primary" value="Submit" name="filter_course_data">
            <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>AdminSettings/College_Courses">Reset</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
   <script>
      $(document).ready(function(){
        $("#semester_fees_date").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true
        });


        $("#exam_fees_date").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true
        });


      });
    </script>

  <script>
        var picker = new Lightpick({
          field: document.getElementById(''),
          onSelect: function(date){
            document.getElementById('result-1').innerHTML =  date.format('DD/MM/YY');
          }
          
        });


        $( "#semester_fees_date" ).datepicker({
          
        });
    </script>
    <script>
        var picker = new Lightpick({
          field: document.getElementById(''),
          onSelect: function(date){
            document.getElementById('result-1').innerHTML =  date.format('DD/MM/YY');
          }
          
        });
    </script>
    <script>
       $("#course_add").validate({
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
          var form = $('#course_add')[0];
          var data = new FormData(form);

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>AdminSettings/ajax_clg_co",
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
              }  else if (ddd == '0') {
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

      function co_status_upd(college_courses_id, status) {
        $.ajax({
          url: "<?php echo base_url(); ?>AdminSettings/update_status",
          type: "post",
          data: {
            'id': college_courses_id,
            'status': status,
            'table': 'college_courses',
            'field': 'college_courses_status',  
            'check_field': 'college_courses_id'
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

      function remove_co(college_courses_id) {
        var conf = confirm("Are you sure to delete record?");
        if (conf) {
          $.ajax({
            url: "<?php echo base_url(); ?>AdminSettings/delete_record",
            type: "post",
            data: {
              'id': college_courses_id,
              'table': 'college_courses',
              'field': 'college_courses_id'
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
    <script>
    $(document).ready(function(){

    $('#no_of_semester').change(function(){

    var no_of_semester = $('#no_of_semester').val();
    var cou = no_of_semester * 6;
    $('#duration').val(cou);
    var intake = $('#intake').val();
    var semester_fees = $('#semester_fees').val();
    var sem_fees_date = $('#semester_fees_date').val();
    // alert(sem_fees_date);
    var examination_fees = $('#examination_fees').val();
    var exam_fees_date = $('#exam_fees_date').val();
    $('#college_tuition_fees').val(semester_fees*no_of_semester);

    $.ajax({
        url:"<?php echo base_url(); ?>AdminSettings/make_clg_sem",
        method:"POST",
        data:{ 'no_of_semester' : no_of_semester , 'intake': intake, 'semester_fees' : semester_fees ,'sem_fees_date' : sem_fees_date,'examination_fees' : examination_fees , 'exam_fees_date' : exam_fees_date},
        success:function(data)
        {
            $('.sem').html(data);
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

    });
    </script>
    <script type="text/javascript">
     $(function() {
      $('#table1').DataTable({
            stateSave: true,
            "bDestroy": true
        })
      })

    function resetval() {
      $("#course_add")[0].reset();
    }
    </script>

    </body>
    <!-- index.html  21 Nov 2019 03:47:04 GMT -->

    </html>