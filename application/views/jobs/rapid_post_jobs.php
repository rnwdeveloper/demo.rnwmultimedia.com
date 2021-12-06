<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
      <div class="extra_lead_menu">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 d-flex justify-content-between">
                <h6 class="page-title text-dark mb-3">Rapid Company & Jobs List</h6>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Jobs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rapid Company & Jobs List</li>
                  </ol>
                </nav>
              </div>
              <div class="col-12"> 
                <div class="card"> 
                <div class="card-header">
                      <div class="ml-auto">
                          <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".company_job_filter">
                              <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i
                                      class="fa fa-plus text-white"></i></span>
                          </a>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped normal-table" id="table1">
                        <thead>
                          <tr>
                            <th>Company Details</th>
                            <th>Recruiter Name</th>
                            <th>Job Title</th>
                            <th>Salary</th>
                            <th>No Of Vacancy</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Job location</th>
                            <th width="200">Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rapid_job as $val) { ?>
                          <tr>
                              <td>
                                <strong><?php echo $val->company_name; ?></strong><br>
                                <span class="text-primary"><a href="<?php echo $val->company_email;  ?>" target="_blank"><?php echo $val->company_email;  ?></a></span><br>
                                <?php echo $val->company_address;  ?><br>
                              </td>
                              <td><?php echo $val->recruiter_name;  ?></td>
                              <td>
                                  <strong><?php echo $val->job_title;  ?></strong><br>
                                  <?php echo $val->position;  ?>
                              </td>
                              <td><?php echo $val->salary;  ?></td>
                              <td><?php echo $val->no_of_vacancy;  ?></td>
                              <td><?php echo $val->start_date;  ?></td>
                              <td><?php echo $val->end_date;  ?></td>
                              <td>
                              <?php echo $val->job_city;  ?><br>
                              <?php echo $val->job_location;  ?>
                              </td>
                              <td><?php echo $val->description;  ?></td>
                              <td>
                                <a href="javascript:co_upd(<?php echo $val->rapid_post_id ; ?>)"  class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:delete_job(<?php echo $val->rapid_post_id ; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                              </td>
                            </tr>
                            <?php }?>
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
    </div>
  </div>
</div> 

<div class="modal fade company_job_filter" tabindex="-1" role="dialog" aria-labelledby="company_job_filter"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="company_job_filter">Company Job Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                      <input type="hidden" id="rapid_post_id" name="rapid_post_id">
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" id="company_name" placeholder="Company Name">
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>URL:</label>
                                <input type="text" class="form-control" id="company_email" placeholder="URL">
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>Address:</label>
                                <input type="text" class="form-control" id="company_address" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>Recruiter Name</label>
                                <input type="text" class="form-control" id="recruiter_name" placeholder="Recruiter Name">
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>Job Title</label>
                                <input type="text" class="form-control" id="job_title" placeholder="Job Title">
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>Salary:</label>
                                <input type="text" class="form-control" id="salary" placeholder="Salary">
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>No of Vacancy:</label>
                                <input type="text" class="form-control" id="no_of_vacancy" placeholder="No of Vacancy">
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" id="position" placeholder="Position">
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" id="job_city" placeholder="Job City">
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>Job Location</label>
                                <input type="text" class="form-control" id="job_location" placeholder="Job Location">
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" id="start_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" id="end_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8 ">
                            <div class="form-group">
                                <label>Discription</label>
                                <textarea type="text" class="form-control" id="description" name="description" rows="3" placeholder="Add discription"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit" id="job_submit" name="Filter">
                                <a class="btn btn-light text-dark ml-md-2" href="">Reset</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>



<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>

<!-- General JS Scripts -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script> 
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>

<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
 
<script>
  function co_upd(rapid_post_id) {
           $.ajax({
             url: "<?php echo base_url(); ?>JobController/get_rapid_job_posotion",
             type: "post",
             data: {
               'rapid_post_id': rapid_post_id
             },
             success: function(resp) {
               $(".company_job_filter").modal();
               var data = $.parseJSON(resp);
               var rapid_post_id   = data['single_record'].rapid_post_id ;
               var company_name = data['single_record'].company_name;
               var company_email = data['single_record'].company_email;
               var recruiter_name  = data['single_record'].recruiter_name;
               var company_address = data['single_record'].company_address;
               var job_title = data['single_record'].job_title;
               var position  = data['single_record'].position;
               var salary = data['single_record'].salary;
               var no_of_vacancy = data['single_record'].no_of_vacancy; 
               var start_date = data['single_record'].start_date; 
               var end_date = data['single_record'].end_date; 
               var job_city = data['single_record'].job_city; 
               var job_location = data['single_record'].job_location; 
               var description = data['single_record'].description; 

              
               $('#rapid_post_id').val(rapid_post_id);
               $('#company_name').val(company_name);
               $('#company_email').val(company_email);
               $('#recruiter_name').val(recruiter_name);
               $('#company_address').val(company_address);
               $('#job_title').val(job_title);
               $('#position').val(position);
               $('#salary').val(salary);
               $('#no_of_vacancy').val(no_of_vacancy);
               $('#start_date').val(start_date);
               $('#end_date').val(end_date);
               $('#job_city').val(job_city);
               $('#job_location').val(job_location);
               $('#description').val(description);
              }
           });
         }

         function delete_job(rapid_post_id ) {
      var conf = confirm("Are you sure to delete record?");
      if (conf) {
        
        $.ajax({
          url: "<?php echo base_url(); ?>JobController/delete_SubCate",
          type: "post",
          data: {
            'id': rapid_post_id,
            'table': 'rapid_job_post',
            'field': 'rapid_post_id'
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
              $.ajax({
                  url: "<?php echo base_url(); ?>JobController/ajex_rapid_job_position",
                  type: "post",
                  data: {
                        'rapid_post_id ': rapid_post_id 
                  },
                  success: function(Resp) {
 
                        $('.normal-table').html(Resp);
                  }
               });
            }else if (ddd == '3') {
              $('#msg_doc').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Someting Wrong!!',
                position: 'topRight'
              }));
              $.ajax({
                  url: "<?php echo base_url(); ?>JobController/ajex_rapid_job_position",
                  type: "post",
                  data: {
                        'rapid_post_id ': rapid_post_id 
                  },
                  success: function(Resp) {
 
                        $('.normal-table').html(Resp);
                  }
               });
            }
          }
        });
      }
    }

    $('#job_submit').on('click', function() {
          $(".add_job_position_modal").modal('hide');
          var rapid_post_id   = $('#rapid_post_id').val();
          var company_name =  $('#company_name').val();
          var company_email =   $('#company_email').val();
          var recruiter_name  =  $('#recruiter_name').val();
          var company_address =  $('#company_address').val();
          var job_title =  $('#job_title').val();
          var position  = $('#position').val();
          var salary =  $('#salary').val();
          var no_of_vacancy = $('#no_of_vacancy').val();
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          var job_city = $('#job_city').val();
          var job_location = $('#job_location').val();
          var description = $('#description').val();
$.ajax({
    type: "POST",
    url: "<?php echo base_url() ?>jobController/add_record_rapid",
    data: {
        'rapid_post_id' :rapid_post_id,
        'company_name': company_name,
        'company_email': company_email,
        'recruiter_name' :recruiter_name,
        'company_address': company_address,
        'job_title' :job_title,
        'position': position,
        'salary': salary,
        'no_of_vacancy' :no_of_vacancy,
        'start_date': start_date,
        'job_city': job_city,
        'job_location': job_location,
        'description': description
    },       
    success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        if (ddd == '1') {
            $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2500,
                message: 'HI! New Record Is Now Inserted.',
                position: 'topRight'
            }));
            $.ajax({
                  url: "<?php echo base_url(); ?>JobController/ajex_rapid_job_position",
                  type: "post",
                  data: {
                        'rapid_post_id ': rapid_post_id 
                  },
                  success: function(Resp) {
 
                        $('.normal-table').html(Resp);
                  }
               });
        } else if (ddd == '2') {
            $('#msg').html(iziToast.success({
                title: 'success!',
                timeout: 2500,
                message: 'This course is updated!',
                position: 'topRight'
            }));
            $.ajax({
                  url: "<?php echo base_url(); ?>JobController/ajex_rapid_job_position",
                  type: "post",
                  data: {
                        'rapid_post_id ': rapid_post_id 
                  },
                  success: function(Resp) {
 
                        $('.normal-table').html(Resp);
                  }
               });
        }else if (ddd == '3') {
            $('#msg').html(iziToast.error({
              title: 'Canceled',
              timeout: 2000,
              message: 'Something Wrong',
              position: 'topRight'
            }));
          } 
    }
});
return false;
});


  </script>


</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>