<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
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
                <div class="extra_lead_menu">
                    <section class="section">
                        <div class="section-body">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-between">
                                    <h6 class="page-title text-dark mb-3"></h6>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb p-0">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Library</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Demo Batch list</h4>
                                            <div class="card-header-action">  
                                                <a href="#" class="btn btn-info text-white" data-toggle="modal"
                                                    data-target="#batchcreate" data-placement="bottom"
                                                    title="Create Batch">
                                                    <span data-toggle="tooltip" data-placement="bottom"
                                                        title="Create Batch"><i
                                                            class="fas fa-plus mr-1 text-white"></i></span>
                                                </a>
                                                <!-- <a href="#" class="btn btn-info text-white" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg">
                                                    <span data-toggle="tooltip" data-placement="bottom"
                                                        title="Filter"><i
                                                            class="fas fa-filter mr-1 text-white"></i></span>
                                                </a> -->
                                                
                                                <a href="" class="btn btn-danger text-white" data-placement="bottom" title="Delete Multiple Record" id="multi_row_remove"><i class="fas fa-trash mr-1 text-white"></i></span>
                                                 </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive batch_table">
                                                <table class="table table-striped normal-table" id="batch_table">
                                                    <thead>
                                                        <tr>
                                                        <th>
                                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                            </th>
                                                            <th>SN</th>
                                                            <th>Details</th>
                                                            <th>Course / Package</th>
                                                            <th>Batch</th>
                                                            <th>Code</th>
                                                            <th>Assign By</th>
                                                            <th>Time From</th>
                                                            <th>Time To</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $sno = 1; ?>
                                                        <?php foreach($list_batch as $bat) {?>
                                                        <tr>
                                                        <td>
                                                            <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?php echo $sno; ?>" name="mark" value="<?php echo $bat->batch_list_id ; ?>">
                                                            <label for="checkbox-<?php echo $sno; ?>" class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                            <td><?php echo $sno;  ?></td>
                                                            <td>
                                                            <?php $branchids = explode(",", $bat->branch_id);
                                                            foreach ($list_branch as $row) {
                                                            if (in_array($row->branch_id, $branchids)) {
                                                                echo "<b>Branch : </b>".$row->branch_code." <br> ";
                                                            }
                                                            } ?> 
                                                            <?php $departids = explode(",", $bat->department_id);
                                                            foreach ($list_department as $row) {
                                                            if (in_array($row->department_id , $departids)) {
                                                                echo "<b>Department : </b>".$row->department_name." <br> ";
                                                            }
                                                            } ?> 
                                                            <?php $facids = explode(",", $bat->faculty_ids);
                                                            foreach ($list_user as $row) {
                                                            if (in_array($row['user_id'] , $facids)) {
                                                                echo "<b>Faculty : </b>".$row['name'];
                                                            }
                                                            } ?> 
                                                            </td>
                                                            <td>
                                                            <?php if(empty($bat->package_id)){?>
                                                            <?php $courseids = explode(",", $bat->course_id );
                                                            foreach ($list_course as $row) {
                                                            if (in_array($row->course_id  , $courseids)) {
                                                                echo "<b>S : </b>".$row->course_name;
                                                                }
                                                             } 
                                                            } else {
                                                             $packids = explode(",", $bat->package_id );
                                                            foreach ($list_package as $row) {
                                                            if (in_array($row->package_id  , $packids)) {
                                                                echo "<b>P : </b>".$row->package_name;
                                                                }
                                                             } 
                                                            }
                                                          ?>  
                                                            </td>
                                                            <td>
                                                                <?php echo $bat->batch_name;?>
                                                            </td>
                                                            <td>
                                                                <?php echo $bat->batch_code;?>
                                                            </td>
                                                            <td><?php echo $bat->created_by; ?></td>
                                                            <td><?php echo $bat->batch_time_from; ?></td>
                                                            <td><?php echo $bat->batch_time_to; ?></td>
                                                            <td> <?php if($bat->status=="0") { ?>
                                                                <a class="badge badge-success text-white">Active</a>
                                                                <?php } else { ?>
                                                                <a class="badge badge-danger text-white">Disable</a>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php $xx =  $bat->batch_list_id; ?>
                                                                <a href="javascript:co_upd(<?php echo $xx; ?>)" class="bg-primary action-icon text-white btn-primary" ><i class="fas fa-pencil-alt"></i> </a>
                                                                <?php if($bat->status=="0") { ?>
                                                                <a href="javascript:co_status_upd(<?php echo $xx; ?>,1)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a> 
                                                                <?php } else {?>
                                                                <a href="javascript:co_status_upd(<?php echo $xx; ?>,0)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a> 
                                                                <?php }?>
                                                               
                                                            </td>
                                                        </tr>
                                                        <?php $sno++; }?>
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
           
<div class="extra_sidebar-menu">
<div class="sidebar-panel pullDown">

<button class="close-sidebar-left">X</button>
    <div class="rsidebar-items send-sms batch-history">
      <div class="rsidebar-title">
          <h3 class="mb-0">Batch History</h3>
      </div>
      <div class="rsidebar-middle p-0 history">

      </div>
  </div>
</div>
</div> 
<!-- Craeted batch -->
<div class="modal fade" id="batchcreate" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="formModal">Create New Batch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <div class="form-row">
                    <input type="hidden" name="batch_list_id" id="batch_list_id">
                    <div class="form-group col-md-4">
                        <label for="inputState">Branch Name</label>
                        <select class="form-control branch_two barch_wise_faculty_two branch_wise_department" name="branch_id" id="branch_id" onchange="branch_data(this)">
                        <option>----Select Branch----</option>
                              <?php foreach($list_branch as $val) { ?>
                              <option value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                              <?php } ?>
                                </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Department</label>
                        <select class="form-control branch_dep departments" name="department_id" id="department_id">
                            <option value="">----Select Department----</option>
                            <?php foreach($list_department as $val) { ?>
                              <option value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
                              <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Faculty</label>
                        <select class="form-control clgfids" name="faculty_ids" id="faculty_ids">
                            <option value="">----Select Faculty----</option>
                            <?php foreach($list_user as $val) { ?>
                              <option value="<?php echo $val['user_id']; ?>"><?php echo $val['name']; ?></option>
                              <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                            <div class="form-group">
                              <label class="d-block">Course Category</label>
                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                            <input class="form-check-input cotypetwo" type="radio" name="courses_type" id="courses_type" value="package" onclick="return show_hide_package_course_two()">
                              <div class="state p-info">
                                <i class="icon material-icons">done</i>
                                <label>Package</label>
                              </div>
                            </div>
                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                            <input class="form-check-input cotype" type="radio" name="courses_type" id="courses_type" value="single" onclick="return show_hide_package_course_two()">
                              <div class="state p-info">
                                <i class="icon material-icons">done</i>
                                <label>Single</label>
                              </div>
                            </div> 
                            </div>
                        </div>
                    <div class="col-lg-4 select_course_package_two section-hidden">
                            <div class="form-group">
                                  <label>Select Package*</label>
                                  <select class="form-control subpa pafees" name="course_or_package_two" id="course_or_package_two">
                                    <option value="">----Select package----</option>
                              <?php foreach($list_package as $val) { ?>
                                <option value="<?php echo $val->package_id ; ?>"><?php echo $val->package_name; ?></option>
                                <?php } ?> 
                                  </select>
                                </div>
                        </div>
                                <div class="col-lg-4 select_course_single_two section-hidden"> 
                            <div class="form-group">
                              <label>Select Course*</label>
                             <select class="form-control course_or_single_two subco" name="course_orsingle_two" id="course_orsingle_two" >
                             <option value="">----Select Course----</option>
                             <?php foreach($list_course as $val) { ?>
                                        <option value="<?php echo $val->course_id  ; ?>"><?php echo $val->course_name; ?></option>
                                        <?php } ?>
                              </select>
                            </div>
                        </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Batch name:</label>
                        <input type="text" class="form-control" name="batch_name" id="batch_name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Batch Code</label>
                        <input type="text" class="form-control" name="batch_code" id="batch_code">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Batch Date:</label>
                        <input type="date" class="form-control" name="batch_date" id="batch_date">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Batch Time From:</label>
                        <input type="time" datetime="hour" class="form-control" name="batch_time_from" id="batch_time_from" >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Batch Time To:</label>
                        <input type="time" datetime="hour" class="form-control" name="batch_time_to" id="batch_time_to">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="add_batch" name="add_batch">Create Batch</button>
            </div>
        </div>
    </div>
</div>  



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
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>

<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>

<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script>

$('.select_course_package_two').hide();


function branch_data(b) {

var x = b.options[b.selectedIndex].text;

      if(x=="COLLEGE")
      {
          $(".section-hidden").hide();
          $(".clg-section").show();
      } 
      else
      {
          $(".section-hidden").show();
          $('.select_course_package_two').hide();
          $(".clg-section").hide();
      }

}


$('.branch_two').change(function(){
   var branch_id = $('.branch_two').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>Common/fetch_package_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
      $('#course_or_package_two').html(data);
     }
    });
   });



   $('.barch_wise_faculty_two').change(function(){
    var branch_id = $('#branch_id').val();
    //  console.log(branch_id);
    $.ajax({
     url:"<?php echo base_url(); ?>LeadlistController/get_faculty_branchwise",
     method:"POST",
     data:{ branch_id:branch_id },
     success:function(data)
     {
      $('.clgfids').html(data);
     }
    });
   });

   $('.branch_wise_department').change(function(){
    var branch_id = $('#branch_id').val();
    //  console.log(branch_id);
    $.ajax({
     url:"<?php echo base_url(); ?>Common/branch_wise_department",
     method:"POST",
     data:{ branch_id:branch_id },
     success:function(data)
     {
      $('.branch_dep').html(data);
     }
    });

   });


   $(document).ready(function(){
   $('#branch_id').change(function(){
   
   var branch_id = $('#branch_id').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>Common/fetch_single_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
      $('#course_orsingle_two').html(data);
     }
    });
   });

   });



</script> 
<script>
  function show_hide_package_course_two()
    {
          var courses_type = $("input[name='courses_type']:checked").val();
          // salert(courses_type);
          if(courses_type == 'single'){
            $('.select_course_single_two').show();
            $('.select_course_package_two').hide(); 
          }else{
          
            $('.select_course_single_two').hide();
            $('.select_course_package_two').show();
          }

    }
</script>
<script>
   $('#add_batch').on('click', function() {

    var batch_list_id = $('#batch_list_id').val();
    // alert(batch_list_id);
    var branch_id = $('#branch_id').val();
    var department_id = $('#department_id').val();
    var courses_type = $('input[name="courses_type"]:checked').val();
    var faculty_ids = $('#faculty_ids').val();
    var course_orsingle_two = $('#course_orsingle_two').val();   
    var course_or_package_two = $('#course_or_package_two').val();   
    var batch_name = $('#batch_name').val();
    var batch_code = $('#batch_code').val();
    var batch_date = $('#batch_date').val();
    var batch_time_from = $('#batch_time_from').val();
    var batch_time_to = $('#batch_time_to').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/add_batch_list",
        data: {
            'batch_list_id': batch_list_id,
            'branch_id': branch_id,
            'department_id': department_id,
            'faculty_ids': faculty_ids,
            'courses_type': courses_type,
            'course_id': course_orsingle_two,
            'package_id' :course_or_package_two,
            'batch_name' : batch_name,
            'batch_code' : batch_code,
            'batch_time_from' : batch_time_from,
            'batch_time_to' : batch_time_to,
            'batch_date' :batch_date
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;

            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Inserted.',
                    position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>Common/batch_table",
                  type: "post",
                  data: {
                        'batch_list_id  ': batch_list_id  
                  },
                  success: function(Resp) {
                        $('#batchcreate').modal("hide");
                        $('.batch_table').html(Resp);
                  }
               });
              
            } else if (ddd == '3') {
                $('#msg').html(iziToast.success({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now updated.',
                    position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>Common/batch_table",
                  type: "post",
                  data: {
                        'batch_list_id  ': batch_list_id  
                  },
                  success: function(Resp) {

                        $('.batch_table').html(Resp);
                  }
               });
    
            }

            else if (ddd == '2') {
                $('#msg').html(iziToast.error({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'Someting Wrong!!',
                    position: 'topRight'
                }));
   
            }
        }
    });

   });


      
   function co_status_upd(batch_list_id  , status) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/update_status_batch",
          type: "post",
          data: {
            'id': batch_list_id ,
            'status': status,
            'table': 'demo_batch_list',
            'field': 'status',
            'check_field': 'batch_list_id '
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! Record Removed.',
                position: 'topRight'
              }));

              $.ajax({
                  url: "<?php echo base_url(); ?>Common/batch_table",
                  type: "post",
                  data: {
                        'batch_list_id  ': batch_list_id  
                  },
                  success: function(Resp) {

                        $('.batch_table').html(Resp);
                  }
               });
             
            }
             else if (ddd == '2')
             {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Try Again!!!!',
                position: 'topRight'
              }));
            }
          }
        });
      }
</script>
<script>
   function co_upd(batch_list_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recobetch",
          type: "post",
          data: {
            'id': batch_list_id ,
          },
          success: function(resp) {
            $("#batchcreate").modal();
            var data = $.parseJSON(resp);

            var batch_list_id = data['single_record'].batch_list_id;
            // console.log(data['single_record'].batch_list_id);
            var branch_id = data['single_record'].branch_id;
            var department_id = data['single_record'].department_id;
            var faculty_ids = data['single_record'].faculty_ids;
            var courses_type = data['single_record'].courses_type;
            var course_id = data['single_record'].course_id;   
            var package_id = data['single_record'].package_id; 
            var batch_name = data['single_record'].batch_name;
            var batch_code = data['single_record'].batch_code;
            var batch_date = data['single_record'].batch_date;   
            var batch_time_from = data['single_record'].batch_time_from; 
            var batch_time_to = data['single_record'].batch_time_to; 
            
            $('#batch_list_id').val(batch_list_id);
            $('#branch_id').val(branch_id);
            $('.departments').val(department_id);
            $('#faculty_ids').val(faculty_ids);
            if (courses_type == "single") {
              $(".cotype").prop("checked", true);
            } else {
              $(".cotypetwo").prop("checked", true);
            }
            $('#course_orsingle_two').val(course_id);   
            $('#course_or_package_two').val(package_id);   
            $('#batch_name').val(batch_name);
            $('#batch_code').val(batch_code);
            $('#batch_date').val(batch_date);
            $('#batch_time_from').val(batch_time_from);
            $('#batch_time_to').val(batch_time_to);
            $('#add_batch').text('Update');
          }
        });
      }
</script>
<script>
    $('#multi_row_remove').on('click', function() {
    alert("Are You Sure This Record Deleted");
    var ids = [];
    var batch_list_id = $('#batch_list_id').val();
     $('.multirow:checked').map(function() {
       ids.push($(this).val());
     });

    $('input[name=mark]:checked').map(function() {
         ids.push($(this).val());
       });

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>Common/update_status_batch_multi",
      data: {
        'ids': ids
      },
      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        console.log(ddd);
        if (ddd == '1') {
          $('#deleted_msg').html(iziToast.success({
            title: 'Success',
            timeout: 2500,
            message: 'Hi! Records are successfully Removed!',
            position: 'topRight'
          }));

         $.ajax({
                  url: "<?php echo base_url(); ?>Common/batch_table",
                  type: "post",
                  data: {'batch_list_id  ': batch_list_id },
                  success: function(Resp) {
                        $('.batch_table').html(Resp);
                  }
               });
   
        }
         else if (ddd == '2') 
         {
          $('#deleted_msg').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2500,
            message: 'Someting Wrong!!',
            position: 'topRight'
          }));
        }
      }
    });
    return false;
  });
 
</script>
</body>
</html>