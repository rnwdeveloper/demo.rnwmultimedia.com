<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<div class="col-md-12">
  <div class="card">
    <div class="card-body pl-0 pr-0">
    	<div id="admission_hold_msg"></div>
    	<input type="hidden" class="form-control" id="admission_id" value="<?php echo $adm_get_record->admission_id; ?>">
      <div class="form-group">
        <label>Status :<span style="color: red;">*</span></label>
           <select class="form-control" id="dropdown_adm_id">
          <option value="">Select</option>
          <?php foreach($list_dropdown_adm as $ad) { ?>
            <option <?php  if($ad->d_adm_id=="5") { echo "selected"; } ?> value="<?php echo $ad->d_adm_id; ?>"><?php echo $ad->name; ?></option>
        <?php } ?>
     </select>
      </div>
       <div class="form-group">
        <label>Please Enter Reason For Enrolled :<span style="color: red;">*</span></label>
       <textarea class="form-control" name="admission_remrak" id="admission_remrak"></textarea>
      </div>
    
      <input type="submit" class="btn btn-primary" id="hold_over" value="Submit">
    </div>
  </div>
</div>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>   
<!-- JS Libraies --> 
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script> 
<!-- Page Specific JS File -->

<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- JS Libraies --> 
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>


<script type="text/javascript">
   $('#hold_over').on('click',function(){
   
   var admission_id = $('#admission_id').val();
   var dropdown_adm_id = $('#dropdown_adm_id').val();
   var admission_remrak = $('#admission_remrak').val();
   
   $.ajax({
   type : "POST",
   url  : "<?php echo base_url()?>Admission/Hold_Over",
   data : {'admission_id' : admission_id , 'dropdown_adm_id' : dropdown_adm_id ,'admission_remrak' : admission_remrak },
   
   success: function(resp)
   {
       var data = $.parseJSON(resp);
       var ddd = data['all_record'].status;
        if(ddd == '1')
        {
            $('#admission_hold_msg').html(iziToast.success({
                                                          title: 'Success',
                                                          timeout: 2500,
                                                          message: 'Enrolled.',
                                                          position: 'topRight'
                                                        }));
                                                        setTimeout(function() {
                                                            location.reload();
                                                        }, 2520);
        }
        else
        {
            $('#admission_hold_msg').html(iziToast.error({
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
</body> 


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>