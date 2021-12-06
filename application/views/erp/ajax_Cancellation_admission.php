
<style>
	.toast{
		opacity: 1;
	}
</style>
                   

<div class="new_lead_info_fill" id="admission_Cancellation">

<h6 class="lead_fill_title ">Admission Cancellation *</h6> 

<span id="admi_cancel">
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast bg-success text-white" data-autohide="false">
  <div class="toast-header bg-success text-white">
    <strong class="mr-auto">Admission Cancellation</strong>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
  	<span id="cancelled_status"></span>
  </div>
</div>
</span>

<span id="admi_cancelone">
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast bg-danger text-white" data-autohide="false">
  <div class="toast-header bg-danger text-white">
    <strong class="mr-auto">Admission Cancellation</strong>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
  	<span id="cancelled_statusone"></span>
  </div>
</div>
</span>

<input type="hidden" class="form-control" id="admission_id" value="<?php echo $adm_get_record->admission_id; ?>">

<?php  $addby =  $_SESSION['Admin']['username']; ?>

<input type="hidden" name="addby" id="addby" value="<?php if(isset($addby)){ echo $addby; } ?>" placeholder="Assigned To" class="form-control" />

<div class="form-group">

<label for="datepicker">Cancellation Date:<span style="color:red">*</span></label>

<input  class="form-control datepickerone" id="cancellation_admission_date" >

</div>

<div class="form-group">

<label for="inputEmail4">Canceled</label>

<select class="form-control" name="dropdown_adm_id" id="dropdown_adm_id" >

<option value="">Select</option>

<?php foreach($list_dropdown_adm as $ad) { ?>

<option  

value="<?php echo $ad->d_adm_id; ?>"><?php echo $ad->name; ?></option>

<?php } ?>       

</select>

</div>

<div class="form-group">

<label>Please enter reason for cancellation:<span style="color:red">*</span></label>

<textarea   class="form-control" rows="8" id="admission_remrak" placeholder="Enter Remarks"  name="admission_remrak"></textarea>

</div>

<div class="form-group">

<button type="button" class="btn btn-success" id="canceled_adm">Save</button>

</div>

</div>





<script type="text/javascript">
	$('#admi_cancel').hide();
	$('#admi_cancelone').hide();

$('#canceled_adm').on('click',function(){

var admission_id = $('#admission_id').val();

var cancellation_admission_date = $('#cancellation_admission_date').val();

var dropdown_adm_id = $('#dropdown_adm_id').val();

var admission_remrak = $('#admission_remrak').val();

var addby = $('#addby').val();



$.ajax({

type : "POST",

url  : "<?php echo base_url()?>AddmissionController/admission_canceled",

data : {'admission_id' : admission_id , 'cancellation_admission_date' : cancellation_admission_date , 'dropdown_adm_id' : dropdown_adm_id , 'admission_remrak' : admission_remrak ,  'addby' : addby },

success: function(resp)
{

  var data = $.parseJSON(resp);
  var ddd = data['all_record'].status;
  if(ddd == '1')
  {
      $('#admi_cancel').fadeIn();
      $('#cancelled_status').html("HI! Finally Your Admission Is Cancelled.");
      $('#admi_cancel').fadeOut(6000);
  }
  else if(ddd == '3')
  {
     $('#admi_cancelone').fadeIn();
      $('#cancelled_statusone').html("Your Admission will Be Canceled After You Complete Your Fees.");
      $('#admi_cancelone').fadeOut(10000);
  }
  else if(ddd == '2')
  {
  	$('#admi_cancel').fadeIn();
      $('#cancelled_status').html("Someting Wrong!!");
      $('#admi_cancel').fadeOut(6000);
  }

}

});

return false;

});

</script>	

<script>
	
</script>
 

 <script type="text/javascript">

$('.datepickerone').datepicker({

weekStart: 1,

daysOfWeekHighlighted: "6,0",

autoclose: true,

todayHighlight: true,

});



$('.datepickertwo').datepicker({

weekStart: 1,

daysOfWeekHighlighted: "6,0",

autoclose: true,

todayHighlight: true,

});

</script>