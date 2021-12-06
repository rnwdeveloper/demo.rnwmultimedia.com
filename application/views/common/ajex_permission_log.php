<!-- 
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet"
   href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
   href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet"
   href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet"
   href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<link rel="stylesheet"
   href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css"> -->
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab">
                        <div class="row grid">    
                        <?php foreach($f_module as $k=>$row) { ?>
                              <div class="col-lg-3 grid-item">
                                 <div class="card card-primary mb-3">
                                       <div class="card-header d-flex align-item-center justify-content-between">
                                          <h4><?php echo $row->f_module_name; ?></h4>
                                          <div class="pretty p-icon p-jelly p-round p-bigger">
                                          <input class="form-check-input" type="checkbox" name="fpermission" id="examplecheckboxs1-<?php echo $row->f_module_name; ?>"  value="<?php echo $row->f_module_name; ?>" <?php for($i=0;$i<sizeof($f_perms);$i++) { if($row->f_module_name == $f_perms[$i]) { echo "checked"; } } ?>>
                                             <div class="state p-info">
                                                   <i class="icon material-icons">done</i>
                                                   <label><strong>All</strong></label>
                                             </div>
                                          </div>
                                       </div>
                                       <hr class="mt-1 mb-2" />
                                       <div class="card-body px-3 pt-0">
                                          <div class="module_permission py-2">
                                             <?php foreach($m_module as $m=>$mod){ ?>
                                             <?php $fmodid = explode(",", $mod->f_module_id); if(in_array($row->f_module_id,$fmodid)) { ?>
                                                <ul class="parent_ul">
                                                      <div class="module_title">
                                                         <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                         <input class="form-check-input" type="checkbox" name="mpermission" id="m_permiss-<?php echo $mod->module_name; ?>"   value="<?php  echo $mod->module_name;  ?>" <?php for($i=0;$i<sizeof($m_perms);$i++) { if($mod->module_name == $m_perms[$i])  { echo "checked"; } }  ?>>
                                                            <div class="state p-info">
                                                                  <i class="icon material-icons">done</i>
                                                                  <label><strong><?php  echo $mod->module_name;  ?></strong></label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <li>
                                                      <?php foreach($l_module as $f=>$fid) { ?>
                                                      <?php $lmodid = explode(",", $fid->m_module_id); if(in_array($mod->m_module_id,$lmodid)) { ?>
                                                            <ul class="child_ul"> 
                                                               <div class="module_title">
                                                                     <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                     <input class="form-check-input" type="checkbox" id="examplecheckboxs1-<?php echo $fid->name; ?>" name="lpermission" value="<?php echo $fid->name; ?>" <?php for($i=0;$i<sizeof($permis);$i++) { if($fid->name == $permis[$i])  { echo "checked"; } }  ?> >
                                                                        <div class="state p-info">
                                                                           <i class="icon material-icons">done</i>
                                                                           <label><strong><?php echo $fid->name; ?></strong></label>
                                                                        </div>
                                                                     </div>
                                                               </div>
                                                               <li>
                                                               <?php foreach($p_module as $p => $v ) {?>
                                                               <?php $pmodid = explode(",", $v->l_module_id); if(in_array($fid->l_module_id,$pmodid)) { ?>
                                                                     <ul class="child_ul"> 
                                                                        <div class="module_title">
                                                                           <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                           <input class="form-check-input" type="checkbox" name="ppermission" id="examplecheckboxs1-<?php echo $v->function_name; ?>" value="<?php  echo $v->function_name; ?>" <?php for($i=0;$i<sizeof($ppermis);$i++) { if($v->function_name == $ppermis[$i])  { echo "checked"; } }  ?>>
                                                                                 <div class="state p-info">
                                                                                    <i class="icon material-icons">done</i>
                                                                                    <label><strong><?php  echo $v->function_name; ?></strong></label>
                                                                                 </div>
                                                                           </div>
                                                                        </div>
                                                                     </ul>
                                                                  <?php } ?>
                                                                  <?php } ?>
                                                               </li>
                                                            </ul>
                                                         <?php } ?>
                                                         <?php } ?>
                                                      </li>
                                                </ul>
                                             <?php } ?>
                                             <?php } ?>
                                          </div>
                                          <div class="text-right">
                                          <input value="Save" type="submit" class="btn btn-primary text-white shadow-none submit_per" id="submit_per" name="send">
                                          </div>
                                       </div>
                                 </div>
                              </div>
                           <?php } ?>
                        </div>
                    </div>
</div>
<!-- 
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>
                                                                
General JS Scripts -->
<!-- <script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
 --><!-- JS Libraies -->
<!--Excel Download-->
<!-- <script src="https://demo.rnwmultimedia.com/dist/assets/js/table2excel.js"></script> 
 -->
<!-- <script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script> 
 -->
<!-- <script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
 --><!-- Page Specific JS File --> 
<!-- <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
 --><!-- Page Specific JS File -->
<!-- <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script> -->
 <script>
    $('.grid').masonry({
        // options
        itemSelector: '.grid-item',
    });
</script>
<script>
    
   


   $('.submit_per').on('click', function() {
   
       var fpermission = [];
       var mpermission = [];
       var lpermission = [];
       var ppermission = [];
   
       $('input[name=fpermission]:checked').map(function() {
           fpermission.push($(this).val());
       });
       $('input[name=mpermission]:checked').map(function() {  
           mpermission.push($(this).val());
       });
       $('input[name=lpermission]:checked').map(function() {
           lpermission.push($(this).val());
       });
       $('input[name=ppermission]:checked').map(function() {
        ppermission.push($(this).val());
       });
       var logtype_id = $("#logtype").val();
       $.ajax({
           type: "POST",
           url: "<?php echo base_url() ?>DemoReportController/upd_permission",
           data: {
               'fpermission': fpermission,
               'mpermission': mpermission,
               'lpermission': lpermission,
               'ppermission': ppermission,
               'logtype_id': logtype_id      
           },
           success: function(resp) {
               var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if (ddd == '1') {
                   $('#multiple_attendance_msg').html(iziToast.success({
                       title: 'Success',   
                       timeout: 2500,
                       message: 'Hi ! this record is updated...',                                    
                       position: 'topRight'
                   }));
                   setTimeout(function() {
                       location.reload();
                   }, 2520);
               } else if (ddd == '2') {
                   $('#multiple_attendance_msg').html(iziToast.error({
                       title: 'Canceled!',
                       timeout: 2500,
                       message: 'Someting Wrong!!',
                       position: 'topRight'
                   }));
                   setTimeout(function() {
                       location.reload();
                   }, 2520);
               }
           }
       });
       return false;
   });


    </script>