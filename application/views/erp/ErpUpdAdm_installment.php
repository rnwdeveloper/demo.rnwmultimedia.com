<?php  
    $amount = $data['tution_fee']; 
		$no_in =  $data['no_of_installment'];
		$reg_fee =  $data['registration_fee'];
		$total =  $amount - $reg_fee;
 		$divi_in = floor($total/$no_in);
		date_default_timezone_set('Asia/Kolkata'); 
		$currentTime = date( 'd-M-Y', time());
		$final = date( 'd-M-Y', time());  ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div id="ins_add"></div>
<input type="hidden" class="form-control" name="admission_id" id="admission_id" value="<?php echo $data['admission_id']; ?>">
<input type="hidden" class="form-control" name="registration_fee" id="registration_fee" value="<?php echo $data['registration_fee']; ?>">
	<div class="col-lg-12">
		                  		
  	</div>
    <div class="col-lg-2">
    	<div class="form-group text-center">
          <label><strong>#NO</strong></label> 
          <?php $no = "1"; ?>
          <p><?php if(isset($no)){ echo $no; } ?></p>
		<input type="hidden" class="form-control"  name="installment_no_first" id="installment_no_first" value="<?php if(isset($no)){ echo $no; } ?>" />	
	</div>
  	</div>
  	<div class="col-lg-4"> 
        <div class="form-group">
          <label>Installment Date</label>
          <input type="text" class="form-control" name="installment_date_fisrt" id="installment_date_first" value="<?php echo $currentTime; ?>" readonly>
        </div>
    </div>
    <div class="col-lg-3"> 
    	<div class="form-group">
          <label>Due Amount</label>
          <input type="text" class="form-control" name="due_amount_first" id="due_amount_first" value="<?php echo $reg_fee; ?>" readonly>
        </div>
	</div>
	<div class="col-lg-3"> 
        <div class="form-group">
          <label>Paid Amount</label>
          <input type="text" class="form-control" name="paid_amount_first" id="paid_amount_first" value="<?php echo $reg_fee; ?>" readonly>
        </div>
	</div>
	

<?php for($i=2;$i<= ($no_in+1); $i++) { ?>
	
	<div class="col-lg-12">
		                  		
  	</div>
  	<div class="col-lg-2">
  		<div class="form-group text-center">
         <label><strong></strong></label> 
         <p><?php if(isset($i)){ echo $i; } ?></p>
		<input type="hidden" class="form-control"  name="installment_no" id="installment_no" value="<?php if(isset($i)){ echo $i; } ?>"/>
	</div>
  	</div>
  	<div class="col-lg-4"> 
        <div class="form-group">
        		<?php $time = strtotime($final);
			$final = date("d-M-Y", strtotime("+1 month", $time)); ?>
          <label>Installment Date</label>
          <input type="text" class="form-control" name="installment_date" id="installment_date" value="<?php echo $final; ?>">
        </div>
    </div>
    <div class="col-lg-3"> 
    	<div class="form-group">
          <label>Due Amount</label>
          <input type="text" class="form-control" name="due_amount" id="due_amount" value="<?php echo $divi_in; ?>">
        </div>
	</div>
	<div class="col-lg-3"> 
        <div class="form-group">
          <label>Paid Amount</label>
          <input type="text" class="form-control" name="paid_amount" id="paid_amount">
        </div>
	</div>

  	<?PHP } ?>

    <div class="col-lg-2">
     
  </div>
  <div class="col-lg-2"> 
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="customCheck1">
      <label class="custom-control-label" for="customCheck1">Send SMS To:</label>
    </div>
  </div>
  <div class="col-lg-2"> 
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="customCheck2">
      <label class="custom-control-label" for="customCheck2">Send Email To:</label>
    </div>
</div>
<div class="col-lg-3"> 
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="customCheck3">
      <label class="custom-control-label" for="customCheck3">Send SMS Father:</label>
    </div>
</div>
<div class="col-lg-3"> 
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="customCheck4">
      <label class="custom-control-label" for="customCheck4">Send Email Father:</label>
    </div>
</div>

<div class="col-lg-12 mt-3 text-right">
  <input type="submit" class="btn btn-primary text-white" id="add_data" value="submit">
</div>


<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
  <script>
   $('#add_data').on('click', function() {
       var admission_id = $('#admission_id').val();
       var registration_fees = $('#registration_fee').val();
       var installment_no = [];
       $('input[name=installment_no]').map(function() {
        installment_no.push($(this).val());
       });
       var installment_date = [];
       $('input[name=installment_date]').map(function() {
        installment_date.push($(this).val());
       });
       var due_amount = [];
       $('input[name=due_amount]').map(function() {
        due_amount.push($(this).val());
       });
       var paid_amount = [];
       $('input[name=paid_amount]').map(function() {
        paid_amount.push($(this).val());
       });
      
       $.ajax({
           type: "POST",
           url: "<?php echo base_url() ?>Admission/Quick_Installment",
           data: {
               'admission_id': admission_id,
               'registration_fees': registration_fees,
               'installment_no': installment_no,
               'installment_date': installment_date,
               'due_amount': due_amount,
               'paid_amount': paid_amount
           },
           success: function(resp) {
               var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if(ddd == '1')
              {
                $('#ins_add').html(iziToast.success({
                                                            title: 'Success',
                                                            timeout: 2500,
                                                            message: 'Created All Installment.',
                                                            position: 'topRight'
                                                            }));
                                                            setTimeout(function() {
                                                              location.reload();
                                                          }, 2520);
             }
             else
             {
                $('#ins_add').html(iziToast.error({
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