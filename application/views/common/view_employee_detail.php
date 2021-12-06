<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="extra_lead_menu">
                <div class="col-12 d-flex justify-content-between">
                    <h6 class="page-title text-dark mb-3">Employee Details</h6>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item"><a href="#" data-toggle="modal"
                                    data-target=".filter-income">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" data-toggle="modal"
                                    data-target=".whastapp-message">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employe Details</li>
                        </ol>  
                    </nav>
                </div>
                <section class="section">
                    <div class="section-body">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav pl-0 ml-auto mb-3">
                                    <li class="float-right ml-2">
                                        <a href="" class="btn btn-info text-white" data-toggle="modal"
                                            data-target=".employee_filter">
                                            <i class="fas fa-filter" data-toggle="tooltip" data-placement="bottom" title="Filter"></i>
                                        </a>
                                    </li>
                                    <li class="float-right ml-2">
                                        <a href="" class="btn btn-info text-white" data-toggle="modal"
                                            data-target=".add_employe_detail">
                                            <i class="fas fa-plus" data-toggle="tooltip" data-placement="bottom" title="Create Employee Details"></i>
                                        </a>
                                    </li>
                                    <li class="float-right ml-2">
                                        <a href="" class="btn btn-info text-white" data-toggle="modal"
                                            data-target=".add_log_type">
                                            Create New LogType
                                        </a>
                                    </li>
                                    <li class="float-right ml-2">
                                        <a href="" class="btn btn-info text-white" id="btnExporttoExcel">
                                            <i class="far fa-file-excel" data-toggle="tooltip" data-placement="bottom" title="Excel"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="btn" tabindex="0" aria-controls="tableExport"><span><i class="fas fa-arrow-left mr-1"></i> Back</span></button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table table-striped normal-table staff_table" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Branch Name</th>
                                                <th>Logtype</th>
                                                <th>Employee Name</th>
                                                <th>Designation</th>
                                                <th>Email</th>
                                                <th>Personal Mobile No</th>
                                                <th>Offical Mobile No</th>
                                                <th>Last Seen</th>
                                                <th>Status</th>
                                                <th width="100">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sno=1; foreach($StaffDetail_all as $val) { ?>
                                            <tr>
                                                <td><?php echo $sno; ?></td>
                                                <td>
                                                    <?php $branch_ids = explode(",",$val->branch_id);
                                                    foreach($branch_all as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name."<br>"; }  } ?>
                                                </td>
                                                <td><?php echo $val->logtype; ?></td>                             
                                                <td><?php echo $val->name; ?></td>                             
                                                <td><?php echo $val->designation; ?></td>     
                                                <td><?php echo $val->email; ?></td>                         
                                                <td><?php echo $val->personal_mobile_no; ?></td>  
                                                <td><?php echo $val->mobile_no; ?></td>
                                                <td><?php echo $val->date_time; ?></td>
                                                <td><?php if($val->status=="0") {?> <span class="badge badge-success">Active</span> <?php } if($val->status=="1") { ?><span class="badge badge-danger">Diactive</span><?php  } ?></td>
                                                <td>
                                                    <a href="javascript:co_upd(<?php echo $val->id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="javascript:remo_co(<?php echo $val->id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                                                    <?php $xx = $val->id; ?>
                                                    <?php if ($val->status == 0) { ?>                                      
                                                    <a class="bg-danger action-icon text-white btn-danger" href="javascript:co_status(<?php echo $xx; ?>,1)"><i class="fas fa-ban "></i>                                                     </a>
                                                    <?php } else {  ?>
                                                    <a class="bg-primary action-icon text-white btn-primary" href="javascript:co_status(<?php echo $xx; ?>,0)"><i class="fa fa-check"></i></a>
                                                    <?php }  ?>
                                                </td>
                                            </tr>
                                        <?php $sno++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="modal fade add_employe_detail" tabindex="-1" role="dialog" aria-labelledby="add_employe_detail"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_employe_detail">Create User Employee Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" id="staff_ids">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Branch Name:</label>
                            <select name="branch_ids" id="branch_ids" class="form-control">
                                <option value="">Select Branch</option>
                                <?php foreach($list_branch as $val) { ?>
                                    <option value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logtype:</label>
                            <select name="logtype" id="logtype" class="form-control">
                                <option value="">Select Log</option>
                                <?php foreach($logtypestaff_all as $val) { ?>
                                    <option value="<?php echo $val->logtype_name; ?>"><?php echo $val->logtype_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Employee Name :</label>
                            <input type="text" class="form-control" placeholder="Enter Employee Name" id="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Designation :</label>
                            <input type="text" class="form-control" placeholder="Enter Designation" id="designation">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="text" class="form-control" placeholder="Enter Email" id="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Parsonal Mobile No :</label>
                            <input type="text" class="form-control" placeholder="Enter Parsonal Mobile No" id="personal_mobile_no">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile No :</label>
                            <input type="text" class="form-control" placeholder="Enter Mobile No" id="mobile_no">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit" id="add_staff">
                            <button type="reset" class="btn btn-light" onclick="fun()">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade employee_filter" tabindex="-1" role="dialog" aria-labelledby="employee_filter"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="employe_filter">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>Common/view_employee_detail">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Branch Name:</label>
                                <select name="filter_branch_id" id="filter_branch_id" class="form-control">
                                    <option value="">Select Branch</option>
                                    <?php foreach($branch_all as $val) { ?>
                                    <option <?php if(@$filter_branch_id==$val->branch_id) { echo "selected"; } ?>   value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Logtype:</label>
                                <select name="filter_logtype" id="" class="form-control">
                                    <option value="">Select Log</option>
                                    <?php foreach($logtypestaff_all as $val) { if($val->status==0) { ?>
                                        <option <?php if(@$filter_logtype==$val->logtype_name) { echo "selected"; } ?>   value="<?php echo $val->logtype_name; ?>"><?php echo $val->logtype_name; ?></option>
                                        <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Employee Name :</label>
                                <input type="text" class="form-control" value="<?php if(!empty($filter_name)) { echo $filter_name; } ?>" name="filter_name" placeholder="Enter Employee Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Designation :</label>
                                <input type="text" class="form-control" value="<?php if(!empty($filter_designation)) { echo $filter_designation; } ?>" name="filter_designation" placeholder="Enter Designation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email :</label> 
                                <input type="text" class="form-control" value="<?php if(!empty($filter_email)) { echo $filter_email; } ?>" name="filter_email" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parsonal Mobile No :</label>
                                <input type="text" class="form-control" value="<?php if(!empty($filter_per_mob_no)) { echo $filter_per_mob_no; } ?>" name="filter_per_mob_no" placeholder="Enter Parsonal Mobile No">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile No :</label>
                                <input type="text" class="form-control" value="<?php if(!empty($filter_mob_no)) { echo $filter_mob_no; } ?>" name="filter_mob_no" placeholder="Enter Mobile No">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save" name="submit">
                                <a href="<?php echo base_url(); ?>Common/view_employee_detail" class="btn btn-light text-dark">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade add_log_type" tabindex="-1" role="dialog" aria-labelledby="add_log_type"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_log_type">Create New LogType</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="fun1()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3 align-items-center">
                        <input type="hidden" id="log_ids">
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>LogType :</label>
                                <input type="text" class="form-control" placeholder="Enter LogType" id="logtype_name">
                            </div>
                        </div>
                        <div class="col-md-6"> 
                                <input type="submit" class="btn btn-primary mt-3" value="Save" id="logtype_add">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-striped normal-table log_table" id="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Logtype</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                    <?php $sno=1; foreach($logtypestaff_all as $val) { ?>
                                        <tr>
                                            <td><?php echo $sno; ?></td>
                                            <td><?php echo $val->logtype_name; ?></td>
                                            <td><?php if($val->status=="0") {?> <span class="badge badge-success">Active</span> <?php } if($val->status=="1") { ?><span class="badge badge-danger">Diactive</span><?php  } ?></td>
                                            <td>
                                                <a href="javascript:log_upd(<?php echo $val->logtype_id ; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="javascript:remo_log(<?php echo $val->logtype_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                                                <?php $xx = $val->logtype_id; ?>
                                                    <?php if ($val->status == 0) { ?>                                      
                                                    <a class="bg-danger action-icon text-white btn-danger" href="javascript:co_status_pro(<?php echo $xx; ?>,1)"><i class="fas fa-ban "></i>                                                     </a>
                                                    <?php } else {  ?>
                                                    <a class="bg-primary action-icon text-white btn-primary" href="javascript:co_status_pro(<?php echo $xx; ?>,0)"><i class="fa fa-check"></i></a>
                                                    <?php }  ?>
                                            </td>
                                        </tr>
                                        <?php $sno++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>

<!-- General JS Scripts -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!--Excel Download-->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/table2excel.js"></script>
<!--Excel Download-->
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>

<script
    src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>

<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>

<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/toastr.js"></script>

<script type="text/javascript">    
      $(function () {    
          $("#btnExporttoExcel").click(function () {    
              $("#table1").table2excel({    
                  filename: "Employee-Details.xls"    
              });    
          });    
      });    
</script>  
<script>
function co_status_pro(logtype_id,status) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/update_status_pro",
          type: "post",
          data: {
            'id': logtype_id ,
            'status': status,
            'table': 'staff_logtype',
            'field': 'status',
            'check_field': 'logtype_id'
          },
          success: function(resp) {
            var data = $.parseJSON(resp); 
            var ddd = data['status'].status;
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! Course status updated.',
                position: 'topRight'
              }));
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/log_tabel",
                  type: "post",
                  data: {
                    'logtype_id': logtype_id
                  },
                  success: function(Resp) {

                        $('.log_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Somthing went wrong!!!!!',
                position: 'topRight'
              }));
            } 
          }
        });
        return false;
      }

      function co_status(id,status) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/update_status_pro",
          type: "post",
          data: {
            'id': id ,
            'status': status,
            'table': 'staff_detail',
            'field': 'status',
            'check_field': 'id'
          },
          success: function(resp) {
            var data = $.parseJSON(resp); 
            var ddd = data['status'].status;
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! Course status updated.',
                position: 'topRight'
              }));
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/staff_tabel",
                  type: "post",
                  data: {
                        'id ': id 
                  },
                  success: function(Resp) {

                        $('.staff_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Somthing went wrong!!!!!',
                position: 'topRight'
              }));
            } 
          }
        });
        return false;
      }

    function log_upd(logtype_id){
        $.ajax({
           url: "<?php echo base_url(); ?>Common/get_recoLogtype",
           type: "post",
           dataType: 'html',  
           data: {
            'id'  : logtype_id 
           },
           success: function(resp) { 
            var data = $.parseJSON(resp);
            var logtype_id  = data['single_record'].logtype_id ;
            var logtype_name = data['single_record'].logtype_name ; 
   
            $('#log_ids').val(logtype_id);
            $('#logtype_name').val(logtype_name);
           }
         }); 
    }

    
    $('#logtype_add').on('click', function() {
   event.preventDefault();
   var logtype_id  = $('#log_ids').val();
    var logtype_name = $('#logtype_name').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/add_logType",
        data: {
            'logtype_id': logtype_id,
            'logtype_name': logtype_name
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            $('.add_employe_detail').modal('hide');  
            var ddd = data['all_record'].status;
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Record Is Now Inserted.',
                    position: 'topRight'
                }));     
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/log_tabel",
                  type: "post",
                  data: {
                    'logtype_id': logtype_id
                  },
                  success: function(Resp) {

                        $('.log_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Record Is Now Updated.!!',
                    position: 'topRight'
                }));          
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/log_tabel",
                  type: "post",
                  data: {
                    'logtype_id': logtype_id
                  },
                  success: function(Resp) {

                        $('.log_table').html(Resp);
                  }
               });
            }
            else if (ddd == '3') {
                $('#msg').html(iziToast.error({
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

     function co_upd(id){
      $.ajax({
           url: "<?php echo base_url(); ?>Common/get_recoStaff",
           type: "post",
           dataType: 'html',  
           data: {
            'id'  : id 
           },
           success: function(resp) { 
            $('.add_employe_detail').modal();  
            var data = $.parseJSON(resp);
            var id = data['single_record'].id;
            var branch_id = data['single_record'].branch_id; 
            var logtype = data['single_record'].logtype;
            var name = data['single_record'].name;
            var email = data['single_record'].email;
            var designation = data['single_record'].designation;
            var personal_mobile_no = data['single_record'].personal_mobile_no;
            var mobile_no = data['single_record'].mobile_no;
   
            $('#staff_ids').val(id);
            $('#branch_ids').val(branch_id);
            $('#logtype').val(logtype);
            $('#name').val(name);
            $('#email').val(email);
            $('#designation').val(designation);
            $('#personal_mobile_no').val(personal_mobile_no);
            $('#mobile_no').val(mobile_no);
           }
         });
   }

   function fun()
   {
    document.getElementById('staff_ids').value='';
    document.getElementById('branch_ids').value='';
    document.getElementById('logtype').value='';
    document.getElementById('name').value='';
    document.getElementById('email').value='';
    document.getElementById('designation').value='';
    document.getElementById('personal_mobile_no').value='';
    document.getElementById('mobile_no').value='';
   }

   function fun1()
   {
    document.getElementById('log_ids').value='';
    document.getElementById('logtype_name').value='';
   }

     $('#add_staff').on('click', function() {
   event.preventDefault();
   var id = $('#staff_ids').val();
    var branch_id = $('#branch_ids').val();
    var logtype = $('#logtype').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var designation = $('#designation').val();
    var personal_mobile_no = $('#personal_mobile_no').val();
    var mobile_no = $('#mobile_no').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/add_staff",
        data: {
            'id': id,
            'branch_id': branch_id,
            'logtype': logtype,
            'name': name,
            'email': email,
            'designation': designation,
            'personal_mobile_no': personal_mobile_no,
            'mobile_no': mobile_no
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            $('.add_employe_detail').modal('hide');  
            var ddd = data['all_record'].status;
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Record Is Now Inserted.',
                    position: 'topRight'
                }));     
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/staff_tabel",
                  type: "post",
                  data: {
                        'id ': id 
                  },
                  success: function(Resp) {

                        $('.staff_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Record Is Now Updated.!!',
                    position: 'topRight'
                }));          
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/staff_tabel",
                  type: "post",
                  data: {
                        'id ': id 
                  },
                  success: function(Resp) {

                        $('.staff_table').html(Resp);
                  }
               });
            }
            else if (ddd == '3') {
                $('#msg').html(iziToast.error({
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

   function remo_co(id) {
       var conf = confirm("Are you sure to delete record?");
       if (conf) {
         $.ajax({
           url: "<?php echo base_url(); ?>Common/delete_product",
           type: "post",
           dataType: 'html',  
           data: {
             'id': id ,
             'table': 'staff_detail',
             'field': 'id '
           },
           success: function(resp) {
             var data = $.parseJSON(resp);
             var ddd = data['all_record'].status;
             if (ddd == '1') {
               $('#msg').html(iziToast.success({
                 title: 'Success',
                 timeout: 2000,
                 message: 'HI! This Record Deleted.',
                 position: 'topRight'
               }));
               $.ajax({
                  url: "<?php echo base_url(); ?>Common/staff_tabel",
                  type: "post",
                  data: {
                        'id ': id 
                  },
                  success: function(Resp) {

                        $('.staff_table').html(Resp);
                  }
               });
             }   else if (ddd == '3') {
               $('#msg_doc').html(iziToast.error({
                 title: 'Canceled!',
                 timeout: 2000,
                 message: 'Someting Wrong!!',
                 position: 'topRight'
               }));
             }
           }
         });
         return false;
       }
   }


   function remo_log(logtype_id ) {
       var conf = confirm("Are you sure to delete record?");
       if (conf) {
         $.ajax({
           url: "<?php echo base_url(); ?>Common/delete_product",
           type: "post",
           dataType: 'html',  
           data: {
             'id': logtype_id  ,
             'table': 'staff_logtype',
             'field': 'logtype_id'
           },
           success: function(resp) {
             var data = $.parseJSON(resp);
             var ddd = data['all_record'].status;
             if (ddd == '1') {
               $('#msg').html(iziToast.success({
                 title: 'Success',
                 timeout: 2000,
                 message: 'HI! This Record Deleted.',
                 position: 'topRight'
               }));
               $.ajax({ 
                  url: "<?php echo base_url(); ?>Common/log_tabel",
                  type: "post",
                  data: {
                    'logtype_id': logtype_id
                  },
                  success: function(Resp) {

                        $('.log_table').html(Resp);
                  }
               });
             }   else if (ddd == '3') {
               $('#msg_doc').html(iziToast.error({
                 title: 'Canceled!',
                 timeout: 2000,
                 message: 'Someting Wrong!!',
                 position: 'topRight'
               }));
             }
           }
         });
         return false;
       }
   }

    </script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>