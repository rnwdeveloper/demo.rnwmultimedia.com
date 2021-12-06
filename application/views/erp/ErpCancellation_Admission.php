<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css"> 
<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<div class="col-md-12">
  <div class="card">
    <div class="card-body pl-0 pr-0">
      <div id="admission_cancelled_msg"></div>
    	<input type="hidden" class="form-control" id="admission_id" value="<?php echo $adm_get_record->admission_id; ?>">
    <?php  $addby =  $_SESSION['Admin']['username'];  date_default_timezone_set("Asia/Calcutta");
		$cancellation_admission_date = date('d-m-Y');?>
    <input type="hidden" class="form-control" name="addby" id="addby" value="<?php if(isset($addby)){ echo $addby; } ?>"/>
  	 <div class="form-group">
        <label>Canecallation Date :<span style="color: red;">*</span></label>
        <input type="text" class="form-control" id="cancellation_admission_date" value="<?php echo $cancellation_admission_date; ?>">
      </div>
      <div class="form-group">
        <label>Status :<span style="color: red;">*</span></label>
           <select class="form-control" id="dropdown_adm_id">
          <option value="">Select</option>
          <?php foreach($list_dropdown_adm as $ad) { ?>
            <option <?php  if($ad->d_adm_id=="3") { echo "selected"; } ?> value="<?php echo $ad->d_adm_id; ?>"><?php echo $ad->name; ?></option>
        <?php } ?>
     </select>
      </div>
       <div class="form-group">
        <label>Please Enter Reason For Canecallation :<span style="color: red;">*</span></label>
       <textarea class="form-control" name="admission_remrak" id="admission_remrak"></textarea>
      </div>
    
      <input type="submit" class="btn btn-primary" id="canceled_adm" value="Submit">
    </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
  <script>
        var picker = new Lightpick({
          field: document.getElementById('cancellation_admission_date'),
          onSelect: function(date){
            document.getElementById('result-1').innerHTML =  date.format('Do MMMM YYYY');
          }
          
        });
    </script>
<script type="text/javascript">
  $('#canceled_adm').on('click',function(){

var admission_id = $('#admission_id').val();
var cancellation_admission_date = $('#cancellation_admission_date').val();
var dropdown_adm_id = $('#dropdown_adm_id').val();
var admission_remrak = $('#admission_remrak').val();
var addby = $('#addby').val();

$.ajax({
type : "POST",
url  : "<?php echo base_url()?>Admission/admission_canceled",
data : {'admission_id' : admission_id , 'cancellation_admission_date' : cancellation_admission_date , 'dropdown_adm_id' : dropdown_adm_id , 'admission_remrak' : admission_remrak ,  'addby' : addby },
success: function(resp)
{

  var data = $.parseJSON(resp);
  var ddd = data['all_record'].status;
  if(ddd == '1')
  {
      $('#admission_cancelled_msg').html(iziToast.success({
        title: 'Success',
        timeout: 2500,
        message: 'HI! Finally Your Admission Is Cancelled!',
        position: 'topRight'
      }));
      setTimeout(function() {
          location.reload();
      }, 2520);
  }
  else if(ddd == '3')
  {
      $('#admission_cancelled_msg').html(iziToast.error({
        title: 'Canceled!',
        timeout: 10000,
        message: 'Your Admission will Be Canceled After You Complete Your Fees!',
        position: 'topRight'
      }));
      setTimeout(function() {
          location.reload();
      }, 2520);
  }
  else if(ddd == '2')
  {
     $('#admission_cancelled_msg').html(iziToast.error({
        title: 'Canceled!',
        timeout: 10000,
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





