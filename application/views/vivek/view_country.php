<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="extra_lead_menu">   
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 d-flex flex-wrap justify-content-between">
                                <h6 class="page-title text-dark mb-3">Country Details</h6>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb p-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Jobs</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Country Details</li>
                                    </ol>
                                </nav>
                            </div> 
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav active_tab" id="pills-tab" role="tablist">
                                            <li class="nav-item mr-2">
                                                <a class="nav-link active btn btn-primary shadow-none" id="pills-country-tab" data-toggle="pill"
                                                    href="#pills-country" role="tab" aria-controls="pills-country"
                                                    aria-selected="true">Country</a>
                                            </li>
                                            <li class="nav-item mr-2">
                                                <a class="nav-link btn btn-primary shadow-none" id="pills-state-tab" data-toggle="pill"
                                                    href="#pills-state" role="tab" aria-controls="pills-state"
                                                    aria-selected="false">State</a>
                                            </li>
                                            <li class="nav-item mr-2">
                                                <a class="nav-link btn btn-primary shadow-none" id="pills-city-tab" data-toggle="pill"
                                                    href="#pills-city" role="tab" aria-controls="pills-city"
                                                    aria-selected="false">City</a>
                                            </li> 
                                            <li class="nav-item mr-2">
                                                <a class="nav-link btn btn-primary shadow-none" id="pills-area-tab" data-toggle="pill"
                                                    href="#pills-area" role="tab" aria-controls="pills-area"
                                                    aria-selected="false">Area</a>
                                            </li>
                                        </ul>
                                        <div class="ml-auto">
                                            <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".add_country">
                                                <i class="fas fa-flag mr-1 text-white"></i>
                                            </a>
                                            <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".add_state">
                                                <i class="fas fa-bank mr-1 text-white"></i>
                                            </a>
                                            <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".add_city">
                                                <i class="fas fa-building mr-1 text-white"></i>
                                            </a>
                                            <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".add_area">
                                                <i class="fas fa-home mr-1 text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-country" role="tabpanel"
                                                aria-labelledby="pills-country-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-striped normal-table" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th width="30">ID</th>
                                                                <th>Country Name</th>                                                            
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($country_all as $val){?>
                                                            <tr>
                                                                <td><?php echo $val->country_id; ?></td>
                                                                <td><?php echo $val->country_name; ?></td>
                                                                <td>
                                                                    <a href="javascript:con_upd(<?php echo $val->country_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                                    <a href="" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a> </td>
                                                            </tr>
                                                        <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-state" role="tabpanel"
                                                aria-labelledby="pills-state-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-striped normal-table" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th width="30">ID</th>
                                                                <th width="500">Country Name</th>                                                            
                                                                <th width="300">State Name</th>                                                            
                                                                <th width="100">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($state_all as $val) {?>
                                                            <tr>
                                                                <td><?php echo $val->state_id;?></td>
                                                                <td><?php echo $val->country_name;?></td>
                                                                <td><?php echo $val->state_name;?></td>
                                                                <td>
                                                                    <a href="" data-toggle="modal"
                                                                        data-target=".add_job_sub_category"
                                                                        class="bg-primary action-icon text-white btn-primary"><i
                                                                            class="fa fa-plus text-white"></i></a>
                                                                    <a href="" data-toggle="modal"
                                                                        data-target=".add_job_sub_category"
                                                                        class="bg-primary action-icon text-white btn-primary"><i
                                                                            class="fas fa-pencil-alt"></i></a>
                                                                    <a href=""
                                                                        class="bg-danger action-icon text-white btn-danger"><i
                                                                            class="far fa-trash-alt"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-city" role="tabpanel"
                                                aria-labelledby="pills-city-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-striped normal-table" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th width="30">ID</th>
                                                                <th width="400">Country Name</th>                                                            
                                                                <th width="200">State Name</th>                                                            
                                                                <th width="200">City Name</th>                                                            
                                                                <th width="100">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($city_all as $val){?>
                                                            <tr>
                                                                <td><?php echo $val->city_id; ?></td>
                                                                <td><?php echo $val->country_name; ?></td>
                                                                <td><?php echo $val->city_state; ?></td>
                                                                <td><?php echo $val->city_name; ?></td>
                                                                <td>
                                                                    <a href="" data-toggle="modal"
                                                                        data-target=".add_job_sub_category"
                                                                        class="bg-primary action-icon text-white btn-primary"><i
                                                                            class="fa fa-plus text-white"></i></a>
                                                                    <a href="" data-toggle="modal"
                                                                        data-target=".add_job_sub_category"
                                                                        class="bg-primary action-icon text-white btn-primary"><i
                                                                            class="fas fa-pencil-alt"></i></a>
                                                                    <a href=""
                                                                        class="bg-danger action-icon text-white btn-danger"><i
                                                                            class="far fa-trash-alt"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-area" role="tabpanel"
                                                aria-labelledby="pills-area-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-striped normal-table" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th width="30">ID</th>
                                                                <th width="300">Country Name</th>                                                            
                                                                <th width="150">State Name</th>                                                            
                                                                <th width="150">City Name</th>                                                            
                                                                <th width="150">Area Name</th>                                                            
                                                                <th width="100">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($city_area_all as $val) {?>
                                                            <tr>
                                                                <td><?php echo $val->area_id;?></td>
                                                                <td><?php echo $val->country_name;?></td>
                                                                <td><?php echo $val->state_name;?></td>
                                                                <td><?php echo $val->city_name;?></td>
                                                                <td><?php echo $val->area_name;?></td>
                                                                <td>
                                                                    <a href="" data-toggle="modal"
                                                                        data-target=".add_job_sub_category"
                                                                        class="bg-primary action-icon text-white btn-primary"><i
                                                                            class="fa fa-plus text-white"></i></a>
                                                                    <a href="" data-toggle="modal"
                                                                        data-target=".add_job_sub_category"
                                                                        class="bg-primary action-icon text-white btn-primary"><i
                                                                            class="fas fa-pencil-alt"></i></a>
                                                                    <a href=""
                                                                        class="bg-danger action-icon text-white btn-danger"><i
                                                                            class="far fa-trash-alt"></i></a>
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
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="modal fade add_country" id="add_country_modal" tabindex="-1" role="dialog" aria-labelledby="add_country"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_country">Add Country Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <input type="text" class="form-control con_id_up" id="con_id_up">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Country Name</label>
                                <input type="text" class="form-control" placeholder="Country Name" id="con_name_up">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit" id="con_submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade add_state" tabindex="-1" role="dialog" aria-labelledby="add_state"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_state">Add State Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country Name</label>
                                <input type="text" class="form-control" placeholder="Country Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State Name</label>
                                <input type="text" class="form-control" placeholder="State Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade add_city" tabindex="-1" role="dialog" aria-labelledby="add_city"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_city">Add City Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country Name</label>
                                <input type="text" class="form-control" placeholder="Country Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State Name</label>
                                <input type="text" class="form-control" placeholder="State Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City Name</label>
                                <input type="text" class="form-control" placeholder="City Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade add_area" tabindex="-1" role="dialog" aria-labelledby="add_area"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_area">Add City Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country Name</label>
                                <input type="text" class="form-control" placeholder="Country Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State Name</label>
                                <input type="text" class="form-control" placeholder="State Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City Name</label>
                                <input type="text" class="form-control" placeholder="City Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Area Name</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Area</option>
                                    <option value="">Yogi Chowk</option>
                                    <option value="">Yogi Chowk</option>
                                    <option value="">Yogi Chowk</option>
                                    <option value="">Yogi Chowk</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script
    src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script
    src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script
    src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>

<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>

<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script>
    function con_upd(country_id='') {
        alert(country_id);
        $.ajax({
          url: "<?php echo base_url(); ?>VivekController/get_recoCon",
          type: "post",
          data: {
            'id': country_id,
          },
          success: function(resp) {
            $('#add_country_modal').modal('show');
            // var data = $.parseJSON(resp);
            // var country_id = data['single_record'].country_id;
            // var country_name = data['single_record'].country_name;
   
            // $('#con_id_up').val(country_id);
            // $('#con_name_up').val(country_name);
          }
        });
        return false;
      }
</script>
</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>