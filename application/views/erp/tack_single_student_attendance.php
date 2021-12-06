<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<?php
date_default_timezone_set("Asia/Calcutta");
$today = date('d/m/Y');
?>
  <div id="attendance_msg"></div>
  <div class="form-row">
    <input type="hidden" class="form-control" name="admission_courses_id" id="admission_courses_id" value="<?php echo $admission_courses_list->admission_courses_id; ?>">
    <input type="hidden" class="form-control" name="admission_id" id="admission_id" value="<?php echo $admission_list->admission_id; ?>">
    <div class="form-group col-md-6">
      <label>Attendance Date</label>
      <input type="text" id="attendance_date" class="form-control form-control-sm attendate" value="<?php echo $today; ?>"/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Attendance Time From</label>
      <input type="time" datetime="hour" class="form-control attentimefrom" id="attendance_time_from"  value="" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Attendance Time To</label>
      <input type="time" datetime="hour" class="form-control attentimeto" id="attendance_time_to" value="" required>
    </div>
     <div class="form-group col-md-3">
     <label class="d-block">Attendance</label>

     <div class="pretty p-icon p-jelly p-round p-bigger">
      <input type="radio" id="customRadioInline1" name="attendance_type" class="custom-control-input" value="P">
        <div class="state p-info">
          <i class="icon material-icons">done</i>
          <label>P</label>
        </div>
      </div>
      <div class="pretty p-icon p-jelly p-round p-bigger">
      <input type="radio" id="customRadioInline2" name="attendance_type" class="custom-control-input" value="A"> 
        <div class="state p-info">
          <i class="icon material-icons">done</i>
          <label>A</label>
        </div>
      </div>
      <div class="pretty p-icon p-jelly p-round p-bigger">
      <input type="radio" id="customRadioInline2" name="attendance_type" class="custom-control-input" value="L"> 
        <div class="state p-info">
          <i class="icon material-icons">done</i>
          <label>L</label>
        </div>
      </div>
    </div>
    <div class="form-group col-md-12">
      <label for="inputPassword4">Comment</label>
     <textarea class="form-control" name="remarks" id="remarks" required></textarea>
    </div>
    </div>
    <button class="btn btn-primary" type="submit" id="attendance_submit">Submit</button>
</div>

<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
  <script>
        var picker = new Lightpick({
          field: document.getElementById('attendance_date'),
          onSelect: function(date){
            document.getElementById('result-1').innerHTML =  date.format('Do MMMM YYYY');
          }
          
        });
    </script>
<script>
  $('#attendance_submit').on('click', function() {
     var admission_courses_id = $('#admission_courses_id').val();
     var admission_id = $('#admission_id').val();
     var attendance_date = $('.attendate').val();
     var attendance_time_from = $('.attentimefrom').val();
     var attendance_time_to = $('.attentimeto').val();
     var attendance_type = $('input[name="attendance_type"]:checked').val();
     var remarks = $('#remarks').val();

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>Admission/single_student_wise_attendance",
       data: {
         'admission_courses_id' : admission_courses_id , 'admission_id': admission_id , 'attendance_date' : attendance_date , 
         'attendance_time_from' : attendance_time_from , 'attendance_time_to' : attendance_time_to , 'attendance_type' : attendance_type , 
         'remarks' : remarks },    
       success: function(resp) 
       {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
              $('#attendance_msg').html(iziToast.success({
                                                          title: 'Success',
                                                          timeout: 2500,
                                                          message: 'Today Your Attendance Done.',
                                                          position: 'topRight'
                                                        }));
                                                      setTimeout(function() {
                                                          location.reload();
                                                      }, 2520);
            }
            else if(ddd == '2')
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

