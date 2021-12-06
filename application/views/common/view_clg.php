<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
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
                        <h6 class="page-title text-dark mb-3">College Details</h6>
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
                              <div class="ml-auto">
                                 <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".add_clg">
                                 <i class="fas fa-flag mr-1 text-white"></i>
                                 </a>
                              </div>
                           </div>
                           <div class="card-body">
                              <div class="tab-content" id="pills-tabContent">
                                 <div class="tab-pane fade show active" id="pills-country" role="tabpanel"
                                    aria-labelledby="pills-country-tab">
                                    <div class="table-responsive ">
                                       <table class="table table-striped normal-table clg_table" id="table1">
                                          <thead>
                                             <tr>
                                              <th>Sno</th>
                                              <th>Clg Name</th>
                                              <th>Area</th>
                                              <th>Pincode</th>
                                              <th>City</th>
                                              <th>State</th>
                                              <th>Country</th>
                                              <th>Added At</th>
                                              <th>Added By</th>
                                              <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                            <?php foreach($all_clg_info as $val){?>
                                              <tr>
                                              <td><?php echo $val->clg_id;?></td>
                                              <td><?php echo $val->clg_name;?></td>
                                              <td><?php echo $val->area_name;?></td>
                                              <td><?php echo $val->pincode;?></td>
                                              <td><?php echo $val->city_name;?></td>
                                              <td><?php echo $val->state_name;?></td>
                                              <td><?php echo $val->country_name;?></td>
                                              <td><?php echo $val->added_at;?></td>
                                              <td><?php echo $val->added_by;?></td>
                                              <td>
                                              <a href="javascript:clg_upd(<?php echo $val->clg_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                              <a href="javascript:remove_clg(<?php echo $val->clg_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
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
<div class="modal fade add_clg" tabindex="-1" role="dialog" aria-labelledby="add_area"
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
                     <input type="hidden" class="form-control clg_id_cl" id="clg_id_fn">
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
                              <select class="form-control  c_name" name="ar_area_anme" id="ar_area_anme">
                                <option>----Select Area----</option>
                                    <?php foreach($city_area_all as $val) { ?>
                                    <option value="<?php echo $val->area_name; ?>"><?php echo $val->area_name; ?></option>
                                    <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Pincode</label>
                              <input type="text" class="form-control" placeholder="Pincode" id="pincode">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Collage Name</label>
                              <input type="text" class="form-control" placeholder="Collage Name" id="clg_name">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Submit" id="area_addd">
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
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
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
  function getcity(con)
  {
      var state_name = con.value;
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

  function clg_upd(clg_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recoclg",
          type: "post",
          data: {
            'id': clg_id,
          },
          success: function(resp) {
            $('.add_clg').modal();
            var data = $.parseJSON(resp);
            var clg_id = data['single_record'].clg_id;
            var clg_name = data['single_record'].clg_name;
            var pincode = data['single_record'].pincode;
            var area_name = data['single_record'].area_name;
            var city_name = data['single_record'].city_name;
            var state_name = data['single_record'].state_name;
            var country_name = data['single_record'].country_name;
            
            $('#clg_id_fn').val(clg_id);
            $('#clg_name').val(clg_name);
            $('#pincode').val(pincode);
            $('#ar_area_anme').val(area_name);
            $('#ar_city_anme').val(city_name);
            $('#area_st_name').val(state_name);
            $('#area_con_name').val(country_name);
          }
        });
        return false;
      }
</script>
<script>
    $('#area_addd').on('click', function() {
    var clg_id = $('.clg_id_cl').val();
    var clg_name = $('#clg_name').val();
    var pincode = $('#pincode').val();
    var area_name = $('#ar_area_anme').val();
    var city_name = $('#ar_city_anme').val();
    var state_name = $('#area_st_name').val();
    var country_name = $('#area_con_name').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Common/clg_add",
        data: {
            'clg_id': clg_id,
            'clg_name': clg_name,
            'pincode': pincode,
            'area_name': area_name,
            'city_name': city_name,
            'state_name': state_name,
            'country_name': country_name
        },       
        success: function(resp) {
         $('.add_clg').modal('hide');
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            // $('#property_table').html(data);
            console.log(data);
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Record Is Now Inserted.',
                    position: 'topRight'
                }));     
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/clg_table",
                  type: "post",
                  data: {
                        'clg_id ': clg_id 
                  },
                  success: function(Resp) {

                        $('.clg_table').html(Resp);
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
                  url: "<?php echo base_url(); ?>Common/clg_table",
                  type: "post",
                  data: {
                        'clg_id ': clg_id 
                  },
                  success: function(Resp) {

                        $('.clg_table').html(Resp);
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


   function remove_clg(clg_id) {
       var conf = confirm("Are you sure to delete record?");
       if (conf) {
         $.ajax({
           url: "<?php echo base_url(); ?>Common/delete_product",
           type: "post",
           dataType: 'html',  
           data: {
             'id': clg_id ,
             'table': 'clg_info',
             'field': 'clg_id '
           },
           success: function(resp) {
            $('.add_clg').modal('hide');
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
                  url: "<?php echo base_url(); ?>Common/clg_table",
                  type: "post",
                  data: {
                        'clg_id ': clg_id 
                  },
                  success: function(Resp) {

                        $('.clg_table').html(Resp);
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