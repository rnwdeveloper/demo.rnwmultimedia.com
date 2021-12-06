<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div id="Completd_Status_msg"></div>

<div class="form-row">
    <input type="hidden" class="form-control" name="admission_courses_id" id="admission_courses_id" value="<?php echo $admission_courses_list->admission_courses_id; ?>">
    <input type="hidden" class="form-control" name="admission_id" id="admission_id" value="<?php echo $admission_list->admission_id; ?>">
    <div class="form-group col-md-12">
      <label>Batch Status</label>
      <select class="form-control" id="admission_courses_status">
      <option value="Completed" <?php echo "selected"; ?>>Completed</option>
      <option value="Ongoing">Ongoing</option>
      <option value="Pending">Pending</option>
      <option value="Hold">Hold</option>
      <option value="Not Assigned">Not Assigned</option>
      </select>
    </div>
    <div class="form-group col-md-12">
      <label for="inputPassword4">Comment</label>
     <textarea class="form-control" name="remarks" id="remarks" required></textarea>
    </div>
    </div>
    <button class="btn btn-primary" type="submit" id="add_status_data">Submit</button>

    <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
    <script>
  $('#add_status_data').on('click', function() {
     var admission_courses_id = $('#admission_courses_id').val();
     var admission_id = $('#admission_id').val();
     var admission_courses_status = $('#admission_courses_status').val();
     var remarks = $('#remarks').val();

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>Admission/single_batch_course_completd_status",
       data: {
         'admission_courses_id' : admission_courses_id , 'admission_id': admission_id , 'admission_courses_status' : admission_courses_status , 'remarks' : remarks },    
       success: function(resp) 
       {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                $('#Completd_Status_msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'Course Is Completed.',
                    position: 'topRight'
                  }));
                setTimeout(function() {
                    location.reload();
                }, 2520);
            }
            else if(ddd == '2')
            {
              $('#Completd_Status_msg').html(iziToast.error({
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