<?php error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);?>      
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
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div id="app">
   <div class="main-wrapper main-wrapper-1">
      <div class="main-content">
         <div class="extra_lead_menu">
            <div class="col-12 d-flex justify-content-end mb-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb p-0">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Admin</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Permission All</li>
                  </ol>
               </nav>
            </div>
            <!-- <ul class="active_tab nav nav-pills" id="pills-tab" role="tablist">
               <?php foreach($log_all as $l => $val) {?>
               <li class="nav-item mb-3">
                  <a href="<?php echo base_url();?>DemoReportController/view_all_permission?logtype=<?php echo $val->logtype_id; ?>" class="btn btn-primary text-white mx-1"><?php echo $val->logtype_name; ?></a>
               </li>
               <?php } ?>
               </ul>     -->
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-3 p-2">
                     <select class="form-control border border-primary" name="logtype_id" id="logtype_id" required onchange="return get_logtype()" >
                        <option>Select Logtype</option>
                        <?php foreach($log_all as $val) { ?>
                        <option value="<?php echo $val->logtype_id; ?>"><?php echo $val->logtype_name; ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
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
                                    <!-- <label><strong>All</strong></label> -->
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
         </div>
      </div>
   </div>
</div>
<input type="hidden" id="logtype" name="logtype">
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>
<!-- General JS Scripts -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!--Excel Download-->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/table2excel.js"></script> 
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script> 
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File --> 
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
   <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
   <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
   <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script> -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script> 
<!-- Page Specific JS File --> 
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
   
</script>
<script>
   //$('.tab-content').hide ();
   
     function get_logtype()
     {
         var logtype_id = $("#logtype_id").val();
         //alert(package_id);
         $.ajax({
             type: "POST",
             url: "<?php echo base_url() ?>DemoReportController/get_per_logtype",
             data: {
                 'logtype_id': logtype_id      
             },
             success: function(resp) {
              //$('.tab-content').show();
                   $('.tab-content').html(resp);
                   $('#logtype').val(logtype_id);
             }
         });
     }

     $('.grid').masonry({
       itemSelector: '.grid-item',
    });
</script>
</body>
</html>