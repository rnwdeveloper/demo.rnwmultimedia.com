<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div class="col-12">
<div id="unfill_doc_msg"></div>
<form name="unfillup_doc_id" id="unfillup_doc_id">
<input type="hidden" class="form-control" name="upd_admission_id" id="upd_admission_id" value="<?php echo $get_record->admission_id; ?>">
   <div class="card-body pl-3 pr-3 row pb-1 pt-2">
      <div class="col-lg-3">
         <div class="form-group">
            <label>Photos</label>
            <input type="file" class="mt-2" name="photos">
         </div>
      </div>
      <div class="col-lg-3">
         <div class="form-group">
            <label>10th Marksheet</label>
            <input type="file" class="mt-2" name="tenth_marksheet">
         </div>
      </div>
      <div class="col-lg-3">
         <div class="form-group">
            <label>12th Marksheet</label>
            <input type="file" class="mt-2" name="twelfth_marksheet">
         </div>
      </div>
      <div class="col-lg-3">
         <div class="form-group">
            <label>Leaving Certy</label>
            <input type="file" class="mt-2" name="leaving_certy">
         </div>
      </div>
      <div class="col-lg-3">
         <div class="form-group">
            <label>Trial Certy</label>
            <input type="file" name="treal_certy">
         </div>
      </div>
      <div class="col-lg-3">
         <div class="form-group">
            <label class="d-block">Light Bill</label>
            <input type="file" name="light_bill">
         </div>
      </div>
      <div class="col-lg-3">
         <div class="form-group">
            <label class="d-block">Aadhar Card</label>
            <input type="file" name="aadhar_card">
         </div>
      </div>
      <div class="col-lg-3">
         <div class="form-group">
            <label class="d-block">Fomr</label>
            <input type="file" name="form">
         </div>
      </div>
      <div class="col-lg-3">
         <div class="form-group">
            <label class="d-block">other</label>
            <input type="file" name="other">
         </div>
      </div>
      <div class="col-lg-12 mt-3 text-right">
      <div class="form-group">
            <input type="submit" class="btn btn-primary text-white" id="upd_docs" value="Submit">
      </div>
      </div>
   </div>
</form>
</div>

<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script>
   $('#upd_docs').on('click', function() {
      
   var form = $('#unfillup_doc_id')[0];
   // Create an FormData object 
   var data = new FormData(form);
         $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url() ?>Admission/Unfill_Doc",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(resp) {
                  var data = $.parseJSON(resp);
                  var ddd = data['all_record'].status;
                  // alert(ddd);
                  if(ddd == '1')
                  {
                     $('#unfill_doc_msg').html(iziToast.success({
                                                      title: 'Success',
                                                      timeout: 2500,
                                                      message: 'All Doc Uploded.',
                                                      position: 'topRight'
                                                      }));
                                                      setTimeout(function() {
                                                      location.reload();
                                                   }, 2520);
                  }
                  else
                  {
                     $('#unfill_doc_msg').html(iziToast.error({
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