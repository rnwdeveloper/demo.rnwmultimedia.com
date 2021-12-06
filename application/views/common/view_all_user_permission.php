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
<?php //print_r($f_perms); die;?>
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
               <?php foreach($list_user as $l => $val) {?>
               <li class="nav-item mb-3">
                  <a href="<?php echo base_url();?>DemoReportController/view_all_user_permission?user_id=<?php echo $val->user_id; ?>" class="btn btn-primary text-white mx-1"><?php echo $val->name; ?></a>
               </li>
               <?php } ?>
            </ul> -->
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-3 p-2">
                     <select class="form-control border border-primary" name="logtype_id" id="logtype_name" required onchange="return get_log_user()" >
                        <option>Select Logtype</option>
                        <?php foreach($log_all as $val) { ?>
                        <option value="<?php echo $val->logtype_name; ?>"><?php echo $val->logtype_name; ?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="col-md-3 p-2">
                     <select class="form-control border border-primary" name="user_id" id="user_id" required onchange="return get_logtype()" >
                        <option>Select User</option>
                        <?php foreach($list_user as $val) { ?>
                        <option value="<?php echo $val->user_id; ?>"><?php echo $val->name; ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade show active" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab">
                  <div class="row grid">
                     <?php foreach($f_module as $k=>$row) { ?>
                     <div class="col-md-3 grid-item">
                        <div class="card card-primary">
                           <div class="card-header d-flex align-item-center justify-content-between">
                              <h4><?php echo $row->f_module_name; ?></h4>
                              <div class="pretty p-icon p-jelly p-round p-bigger">
                                 <input class="form-check-input" type="checkbox" name="fpermission" id="examplecheckboxs1-<?php echo $row->f_module_name; ?>"  value="<?php echo $row->f_module_name; ?>" <?php for($i=0;$i<sizeof($f_perms);$i++) { if($row->f_module_name == $f_perms[$i]) { echo "checked"; } } ?>>
                                 <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label><strong></strong></label>
                                 </div>
                              </div>
                           </div>
                           <!-- <?php echo $user_name; ?> -->
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
                                                      <input class="form-check-input" type="checkbox" name="ppermission" id="examplecheckboxs1-<?php echo $v->function_name; ?>" value="<?php  echo $v->function_name; ?>" >
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
                                       <?php }?>
                                    </li>
                                 </ul>
                                 <?php } ?>
                                 <?php } ?>
                              </div>
                              <div class="text-right">
                                 <!-- <a href="" class="btn btn-primary text-white shadow-none">Save</a> -->
                                 <!-- <button id="submut" type="submit" class="btn btn-primary text-white shadow-none">Save</button> -->
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
<input type="hidden" id="user" name="logtype">
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>  
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script> 
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- General JS Scripts -->
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<!-- JS Libraies --> 
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- Page Specific JS File -->
<!-- JS Libraies -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
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
       var user_id = $("#user").val();
       $.ajax({
           type: "POST",
           url: "<?php echo base_url() ?>DemoReportController/upd_user_permission",
           data: {
               'fpermission': fpermission,
               'mpermission': mpermission,
               'lpermission': lpermission,
               'ppermission': ppermission,
               'user_id': user_id
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
<script>
   function get_log_user()
   {
      var logtype_name = $("#logtype_name").val();
      //alert(logtype_name);
      $.ajax({
             type: "POST",
             url: "<?php echo base_url() ?>DemoReportController/get_user_logtype_wise",
             data: {
                 'logtype_name': logtype_name      
             },
             success: function(resp) {
              //$('.tab-content').show();
                   $('#user_id').html(resp);
             }
      });

   }



   function get_logtype()
     {
         var user_id = $("#user_id").val();
         //alert(package_id);
         $.ajax({
             type: "POST",
             url: "<?php echo base_url() ?>DemoReportController/get_log_user_permission",
             data: {
                 'user_id': user_id      
             },
             success: function(resp) {
              //$('.tab-content').show();
                   $('.tab-content').html(resp);
                   $('#user').val(user_id);
             }
         });
     }
   </script>
</body>
</html>