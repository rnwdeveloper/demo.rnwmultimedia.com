<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
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
                                               <div class="table-responsive con_table" >
                                                     <table class="table table-striped normal-table" id="table1">
                                                        <thead>
                                                           <tr>
                                                              <th width="90">ID</th>
                                                              <th width="900">Country Name</th>
                                                              <th>Action</th>
                                                           </tr>
                                                        </thead>
                                                        <tbody>
                                                           <?php $sno=1; foreach($country_all as $val){?>
                                                           <tr>
                                                              <td><?php echo $sno; ?></td>
                                                              <td><?php echo $val->country_name; ?></td>
                                                              <td>
                                                                 <a href="javascript:con_upd(<?php echo $val->country_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                                 <a href="javascript:remove_co(<?php echo $val->country_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                                                              </td>
                                                           </tr>
                                                           <?php $sno++; }?>
                                                        </tbody>
                                                     </table>
                                                  </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-state" role="tabpanel"
                                                aria-labelledby="pills-state-tab">
                                                <div class="table-responsive st_table" >
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
                                                           <?php $sno=1; foreach($state_all as $val) {?>
                                                           <tr>
                                                              <td><?php echo $sno; ?></td>
                                                              <td><?php echo $val->country_name;?></td>
                                                              <td><?php echo $val->state_name;?></td>
                                                              <td>
                                                                 <a href="javascript:stat_upd(<?php echo $val->state_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                                 <a href="javascript:remove_st(<?php echo $val->state_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                                                              </td>
                                                           </tr>
                                                           <?php $sno++; } ?>
                                                        </tbody>
                                                     </table>
                                                  </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-city" role="tabpanel"
                                                aria-labelledby="pills-city-tab">
                                                 <div class="table-responsive city_table">
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
                                                           <?php $sno=1; foreach($city_all as $val){?>
                                                           <tr>
                                                              <td><?php echo $sno; ?></td>
                                                              <td><?php echo $val->country_name; ?></td>
                                                              <td><?php echo $val->city_state; ?></td>
                                                              <td><?php echo $val->city_name; ?></td>
                                                              <td>
                                                                 <a href="javascript:city_upd(<?php echo $val->city_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                                 <a href="javascript:remove_ci(<?php echo $val->city_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                                                              </td>
                                                           </tr>
                                                           <?php $sno++; } ?>
                                                        </tbody>
                                                     </table>
                                                  </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-area" role="tabpanel"
                                                aria-labelledby="pills-area-tab">
                                                <div class="table-responsive area_table">
                                                    <table class="table table-striped normal-table" id="table1">
                                                       <thead>
                                                          <tr>
                                                             <th width="30">ID</th>
                                                             <th width="300">Country Name</th>
                                                             <th width="150">State Name</th>
                                                             <th width="150">City Name</th>
                                                             <th width="150">Area Name</th>
                                                             <th width="150">Pincode</th>
                                                             <th width="100">Action</th>
                                                          </tr>
                                                       </thead>
                                                       <tbody>
                                                          <?php $sno=1; foreach ($city_area_all as $val) {?>
                                                          <tr>
                                                             <td><?php echo $sno;?></td>
                                                             <td><?php echo $val->country_name;?></td>
                                                             <td><?php echo $val->state_name;?></td>
                                                             <td><?php echo $val->city_name;?></td>
                                                             <td><?php echo $val->area_name;?></td>
                                                             <td><?php echo $val->pincode;?></td>
                                                             <td>
                                                                <a href="javascript:area_upd(<?php echo $val->area_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                                <a href="javascript:remove_ar(<?php echo $val->area_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
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
                     <div class="row">
                        <input type="hidden" class="form-control con_id_up" id="con_id_up">
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
                  <div class="row">
                   <input type="hidden" class="form-control sta_id_up" id="sta_id_up">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Country Name</label>
                              <select class="form-control cou_name" name="cou_name" id="cou_name">
                                <option>----Select Country----</option>
                                    <?php foreach($country_all as $val) { ?>
                                    <option <?php if($val->country_name=="India") { echo "selected"; }?> value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
                                    <?php } ?>
                                </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State Name</label>
                              <input type="text" class="form-control sta_name" placeholder="State Name" id="sta_name">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Submit" id="state_add">
                           </div>
                        </div>
                     </div>
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
               <input type="hidden" class="form-control cit_id_up" id="cit_id_up">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Country Name</label>
                              <select class="form-control coun_name" name="coun_name" id="coun_name">
                                <option>----Select Country----</option>
                                    <?php foreach($country_all as $val) { ?>
                                    <option <?php if($val->country_name=="India") { echo "selected"; }?> value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
                                    <?php } ?>
                                </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State Name</label>
                              <!-- <input type="text" class="form-control" placeholder="State Name" id="scit_name"> -->
                              <select class="form-control state_name scit_name" name="cit_st_name" id="scit_name">
                                <option>----Select State----</option>
                                    <?php foreach($state_all as $val) { ?>
                                    <option <?php if($val->state_name=="Gujarat") { echo "selected"; }?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
                                    <?php } ?>
                                </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>City Name</label>
                              <input type="text" class="form-control" placeholder="City Name" id="city_name">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Submit" id="addd_city">
                           </div>
                        </div>
                     </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade add_area" tabindex="-1" role="dialog" aria-labelledby="add_area"
         aria-hidden="true">
         <div class="modal-dialog modal-md">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title text-dark" id="add_area">Add City Area Detail</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                     <div class="row">
                     <input type="hidden" class="form-control are_id_up" id="are_id_up">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Country Name</label>
                              <select class="form-control coun_name" name="area_con_name" id="area_con_name">
                                <option>----Select Country----</option>
                                    <?php foreach($country_all as $val) { ?>
                                    <option <?php if($val->country_name=="India") { echo "selected"; }?> value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
                                    <?php } ?>
                                </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State Name</label>
                              <select class="form-control state_name" name="area_st_name" id="area_st_name" onchange="return getcity(this)">
                                <option>----Select State----</option>
                                    <?php foreach($state_all as $val) { ?>
                                    <option <?php if($val->state_name=="Gujarat") { echo "selected"; }?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
                                    <?php } ?>
                                </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>City Name</label>
                              <select class="form-control city_name c_name" name="ar_city_anme" id="ar_city_anme">
                                <option>----Select City----</option>
                                    <?php foreach($city_all as $val) { ?>
                                    <option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
                                    <?php } ?>
                                </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Area Name</label>
                              <input type="text" class="form-control" placeholder="Area Name" id="area_name">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Pincode</label>
                              <input type="text" class="form-control" placeholder="Area Name" id="Pincode">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Submit" id="area_addd">
                              <button type="reset" class="btn btn-light" onclick="fun()">Reset</button>
                           </div>
                        </div>
                     </div>
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
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>

<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script>
function fun()
   {
    document.getElementById('are_id_up').value='';
    document.getElementById('area_con_name').value='';
    document.getElementById('area_st_name').value='';
    document.getElementById('ar_city_anme').value='';
    document.getElementById('area_name').value='';
    document.getElementById('pincode').value='';
   }


function getstate()
{
    var country_name = $('#area_con_name').val();
    alert(country_name);
}

function getcity(con)
{
    var state_name = con.value;
    //alert(state_name);
    $.ajax({
   url:"<?php echo base_url(); ?>Common/GetCityStatuWise",
   method:"POST",
   data:{
    'state_name' : state_name},
   success:function(data)
   {
   $('.city_name').html(data);
   }
   });
    }

   function con_upd(country_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recoCon",
          type: "post",
          data: {
            'id': country_id,
          },
          success: function(resp) {
            $('.add_country').modal();
            var data = $.parseJSON(resp);
            var country_id = data['single_record'].country_id;
            var country_name = data['single_record'].country_name;
            
            $('#con_id_up').val(country_id);
            $('#con_name_up').val(country_name);
          }
        });
        return false;
      }
</script>
<script>
   function remove_co(country_id) {
       var conf = confirm("Are you sure to delete record?");
       if (conf) {
         $.ajax({
           url: "<?php echo base_url(); ?>Common/delete_product",
           type: "post",
           dataType: 'html',  
           data: {
             'id': country_id ,
             'table': 'country',
             'field': 'country_id '
           },
           success: function(resp) {
             var data = $.parseJSON(resp);
             $(".add_country").modal('hide');
             var ddd = data['all_record'].status;
             if (ddd == '1') {
               $('#msg').html(iziToast.success({
                 title: 'Success',
                 timeout: 2000,
                 message: 'HI! This Record Deleted.',
                 position: 'topRight'
               }));
               $.ajax({
                  url: "<?php echo base_url(); ?>Common/con_table",
                  type: "post",
                  data: {
                        'country_id ': country_id 
                  },
                  success: function(Resp) {

                        $('.con_table').html(Resp);
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
<script>
    $('#con_submit').on('click', function() {
    var country_id = $('#con_id_up').val();
    var country_name = $('#con_name_up').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Common/con_add",
        data: {
            'country_id': country_id,
            'country_name': country_name
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            $(".add_country").modal('hide');
            console.log(data);
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Inserted.',
                    position: 'topRight'
                }));     
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/con_table",
                  type: "post",
                  data: {
                        'country_id ': country_id 
                  },
                  success: function(Resp) {

                        $('.con_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Updated.!!',
                    position: 'topRight'
                }));          
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/con_table",
                  type: "post",
                  data: {
                        'country_id ': country_id 
                  },
                  success: function(Resp) {

                        $('.con_table').html(Resp);
                  }
               });
            }else if (ddd == '3') {
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
   </script>
<script>
   function stat_upd(state_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recoSta",
          type: "post",
          data: {
            'id': state_id,
          },
          success: function(resp) {
            $('.add_state').modal();
            var data = $.parseJSON(resp);
            var state_id = data['single_record'].state_id;
            var state_name = data['single_record'].state_name;
            var country_name = data['single_record'].country_name;
            
            $('#sta_id_up').val(state_id);
            $('#cou_name').val(country_name);
            $('#sta_name').val(state_name);
          }
        });
        return false;
      }

      function city_upd(city_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recoCit",
          type: "post",
          data: {
            'id': city_id,
          },
          success: function(resp) {
            $('.add_city').modal();
            var data = $.parseJSON(resp);
            var city_id  = data['single_record'].city_id;
            var city_name = data['single_record'].city_name;
            var city_state = data['single_record'].city_state;
            var country_name = data['single_record'].country_name;
            
            $('#cit_id_up').val(city_id);
            $('#coun_name').val(country_name);
            $('.scit_name').val(city_state);
            $('#city_name').val(city_name);
          }
        });
        return false;
      }
</script>
<script>
   function remove_st(state_id) {
       var conf = confirm("Are you sure to delete record?");
       if (conf) {
         $.ajax({
           url: "<?php echo base_url(); ?>Common/delete_con",
           type: "post",
           dataType: 'html',  
           data: {
             'id': state_id ,
             'table': 'state',
             'field': 'state_id '
           },
           success: function(resp) {
             var data = $.parseJSON(resp);
              $('.add_state').modal('hide');
             var ddd = data['all_record'].status;
             if (ddd == '1') {
               $('#msg').html(iziToast.success({
                 title: 'Success',
                 timeout: 2000,
                 message: 'HI! This Record Deleted.',
                 position: 'topRight'
               }));
               $.ajax({
                  url: "<?php echo base_url(); ?>Common/sta_table",
                  type: "post",
                  data: {
                        'state_id ': state_id 
                  },
                  success: function(Resp) {

                        $('.st_table').html(Resp);
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
<script>
    $('#state_add').on('click', function() {
    var state_id = $('#sta_id_up').val();
    var country_name = $('#cou_name').val();
    var state_name = $('#sta_name').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Common/sta_add",
        data: {
            'state_id': state_id,
            'country_name': country_name,
            'state_name': state_name
        },       
        success: function(resp) {
            $('.add_state').modal('hide');
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            // $('#property_table').html(data);
            console.log(data);
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Inserted.',
                    position: 'topRight'
                }));     
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/sta_table",
                  type: "post",
                  data: {
                        'state_id': state_id 
                  },
                  success: function(Resp) {

                        $('.st_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Updated.!!',
                    position: 'topRight'
                }));          
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/sta_table",
                  type: "post",
                  data: {
                        'state_id': state_id 
                  },
                  success: function(Resp) {

                        $('.st_table').html(Resp);
                  }
               });
            }else if (ddd == '3') {
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
   </script>
   <script>
   function remove_ci(city_id) {
       var conf = confirm("Are you sure to delete record?");
       if (conf) {
         $.ajax({
           url: "<?php echo base_url(); ?>Common/delete_con",
           type: "post",
           dataType: 'html',  
           data: {
             'id': city_id,
             'table': 'cities',
             'field': 'city_id '
           },
           success: function(resp) {
            $('.add_city').modal('hide');
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
                  url: "<?php echo base_url(); ?>Common/city_table",
                  type: "post",
                  data: {
                        'city_id': city_id 
                  },
                  success: function(Resp) {

                        $('.city_table').html(Resp);
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
<script>
    $('#addd_city').on('click', function() {
    var city_id = $('#cit_id_up').val();
    var country_name = $('#coun_name').val();
    var state_name = $('#scit_name').val();
    var city_name = $('#city_name').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Common/created_city",
        data: {
            'city_id': city_id,
            'country_name': country_name,
            'state_name': state_name,
            'city_name': city_name
        },       
        success: function(resp) {
            $('.add_city').modal('hide');
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            console.log(data);
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Record Is Now Inserted.',
                    position: 'topRight'
                }));     
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/city_table",
                  type: "post",
                  data: {
                        'city_id': city_id 
                  },
                  success: function(Resp) {

                        $('.city_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your record Is Now Updated.!!',
                    position: 'topRight'
                }));          
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/city_table",
                  type: "post",
                  data: {
                        'city_id': city_id 
                  },
                  success: function(Resp) {

                        $('.city_table').html(Resp);
                  }
               });
            }else if (ddd == '3') {
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
   </script>
   <script>
      function area_upd(area_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recoArea",
          type: "post",
          data: {
            'id': area_id,
          },
          success: function(resp) {
            $('.add_area').modal();
            var data = $.parseJSON(resp);
            var area_id = data['single_record'].area_id;
            var country_name = data['single_record'].country_name;
            var state_name = data['single_record'].state_name;
            var city_name = data['single_record'].city_name;
            var area_name = data['single_record'].area_name;
            var pincode = data['single_record'].pincode;

            $('#are_id_up').val(area_id);
            $('#area_con_name').val(country_name);
            $('#area_st_name').val(state_name);
            $('#ar_city_anme').val(city_name);
            $('#area_name').val(area_name);
            $('#Pincode').val(pincode);
          }
        });
        return false;
      }
      </script>
      <script>
   function remove_ar(area_id) {
       var conf = confirm("Are you sure to delete record?");
       if (conf) {
         $.ajax({
           url: "<?php echo base_url(); ?>Common/delete_con",
           type: "post",
           dataType: 'html',  
           data: {
             'id': area_id,
             'table': 'city_area',
             'field': 'area_id'
           },
           success: function(resp) {
            $('.add_area').modal('hide');
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
                  url: "<?php echo base_url(); ?>Common/area_table",
                  type: "post",
                  data: {
                        'area_id': area_id 
                  },
                  success: function(Resp) {

                        $('.area_table').html(Resp);
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
<script>
    $('#area_addd').on('click', function() {
    var area_id  = $('#are_id_up').val();
    var country_name = $('#area_con_name').val();
    var state_name = $('#area_st_name').val();
    var city_name = $('#ar_city_anme').val();
    var area_name = $('#area_name').val();
    var pincode = $('#Pincode').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Common/created_area",
        data: {
            'area_id': area_id,
            'country_name': country_name,
            'state_name': state_name,
            'city_name': city_name,
            'area_name': area_name,
            'pincode' : pincode
        },       
        success: function(resp) {
            $('.add_area').modal('hide');
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            console.log(data);
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Record Is Now Inserted.',
                    position: 'topRight'
                }));     
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/area_table",
                  type: "post",
                  data: {
                        'area_id': area_id 
                  },
                  success: function(Resp) {

                        $('.area_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your record Is Now Updated.!!',
                    position: 'topRight'
                }));          
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/area_table",
                  type: "post",
                  data: {
                        'area_id': area_id 
                  },
                  success: function(Resp) {

                        $('.area_table').html(Resp);
                  }
               });
            }else if (ddd == '3') {
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
   </script>
</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>