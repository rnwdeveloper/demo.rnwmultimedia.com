<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css"> 
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body p-3">
         <div id="upgraded_msg"></div>
         <form name="without_modifivefees" id="without_modifivefees">
            <div class="row">
               <input type="hidden" name="admission_id" id="admission_id" value="<?php echo $adm_record->admission_id; ?>">
               <input type="hidden" name="old_course_id" id="old_course_id" value="<?php echo $adm_record->course_id; ?>">
               <input type="hidden" name="old_package_id" id="old_package_id" value="<?php echo $adm_record->package_id; ?>">
               <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                  <label class="d-block">Course Category</label>
                  <div class="pretty p-icon p-jelly p-round p-bigger">
                     <input class="form-check-input" type="radio" id="course_package" name="type" value="package" onclick="return show_hide_package_course()" checked>
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>Package</label>
                     </div>
                  </div>
                  <div class="pretty p-icon p-jelly p-round p-bigger">
                     <input class="form-check-input" type="radio" id="course_single" name="type" value="single" onclick="return show_hide_package_course()" checked>
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>Single</label>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6 select_course_package form-group">
                  <label>Select Package</label>
                  <select class="form-control select2" name="course_or_package[]" id="course_orpackage" multiple="">
                     <option value="">Select Package</option>
                     <?php foreach ($list_package as $lp) { ?>
                     <option  value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                     <?php } ?>
                  </select>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6 select_course_single form-group">
                  <label>Select Course*</label>
                  <select class="form-control select2"  name="course_or_single[]" id="course_orsingle" multiple="">
                     <option value="">Select Course</option>
                     <?php foreach ($list_course as $lp) { ?>
                     <option value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
                     <?php } ?>
                  </select>
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                  <label>Remarks*</label>
                  <textarea class="form-control" name="admission_remrak" id="admission_remrak" placeholder="Enter Remarks"></textarea>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                  <input type="submit" class="btn btn-primary" name="submit" id="upd_co" value="Submit">
               </div>
            </div>
         </form>
         </div>
     </div>
  </div>
 </div>

 <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
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
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>

<script type="text/javascript">
   $('.select_course_package').hide();
   function show_hide_package_course() {
      var type = $("input[name='type']:checked").val();
      // alert(course_package);
      if (type == 'single') {
         $('.select_course_single').show();
         $('.select_course_package').hide();
      } else {
         $('.select_course_single').hide();
         $('.select_course_package').show();
      }
   }
</script>


<script type="text/javascript">
   $('#upd_co').on('click', function() {
    
      var form = $('#without_modifivefees')[0];
      // Create an FormData object 
      var data = new FormData(without_modifivefees);

      $.ajax({
         type: "POST",
         url: "<?php echo base_url() ?>Admission/UpgradeCourse_WithoutFeesModifive",
         data: data,
         processData: false,
         contentType: false,
         cache: false,
         success: function(resp)
         {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                  $('#withoutfees_msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'Upgraded.',
                    position: 'topRight'
                }));
                setTimeout(function() {
                        location.reload();
                }, 2520);
}
            else
            {
                  $('#withoutfees_msg').html(iziToast.error({
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
