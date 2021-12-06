<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div class="form-row">
    <div id="batch_msg"></div>
    <input type="hidden" class="form-control" id="admission_courses_id" value="<?php echo $get_batch_course->admission_courses_id; ?>">
    <input type="hidden" class="form-control" id="admission_id" value="<?php echo $get_batch_course->admission_id; ?>">
   <div class="form-group col-md-6">
      <label for="inputPassword4">Batch Name</label>
      <select class="form-control" value="" name="batch_id" id="batch_id">
         <option value="">Select</option>
         <?php foreach($batch_all as $row) {  ?> 
         <option value="<?php echo $row->batches_id; ?>">
            <?php echo $row->batch_name; ?>
         </option>
         <?php } ?>
      </select>
   </div>
   <div class="form-group col-md-6">
      <label for="inputPassword4">Batch Status</label>
      <select class="form-control"  name="batch_status" id="batch_status">
         <option>Select</option>
         <option value="Ongoing" <?php echo "selected"; ?>>Ongoing</option>
         <option value="Pending">Pending</option>
         <option value="CourseCompleted">CourseCompleted</option>
      </select>
   </div>
   <div class="form-group col-md-12">
      <label for="inputPassword4">Remark</label>
      <textarea class="form-control" name="remarks" id="remarks" placeholder="Remark"></textarea>
   </div>
   <div class="form-group col-md-12">
      <input type="submit" class="btn btn-primary text-white" id="put_data" name="" value="Submit">
   </div>
</div>

<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>

    <script>
  $('#put_data').on('click', function() {
     var admission_courses_id = $('#admission_courses_id').val();
     var admission_id = $('#admission_id').val();
     var batch_id = $('#batch_id').val();
     var admission_courses_status = $('#batch_status').val();
     var remarks = $('#remarks').val();

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>Admission/ErpAssignedBatch",
       data: {
         'admission_courses_id' : admission_courses_id , 'admission_id': admission_id , 'admission_courses_status' : admission_courses_status , 'batch_id' : batch_id , 'remarks' : remarks },    
       success: function(resp) 
       {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                $('#batch_msg').html(iziToast.success({
                                                          title: 'Success',
                                                          timeout: 2500,
                                                          message: 'Batch Assigned.',
                                                          position: 'topRight'
                                                        }));
                                                      setTimeout(function() {
                                                          location.reload();
                                                      }, 2520);
            }
            else if(ddd == '2')
            {
              $('#batch_msg').html(iziToast.error({
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

