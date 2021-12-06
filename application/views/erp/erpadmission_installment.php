<?php   

    $amount = $data['tution_fee']; 
    $no_in =  $data['no_of_installment'];
		$reg_fee =  $data['registration_fee'];
		$total =  $amount - $reg_fee;
 		$divi_in = floor($total/$no_in);
		date_default_timezone_set('Asia/Kolkata'); 
		$currentTime = date( 'd-M-Y', time());
		$final = date( 'd-M-Y', time());
    // echo "<pre>";
    // print_r($data['payment_details']);
    // exit; 
    ?>

	  <div class="col-lg-12">
		</div>
    <div class="col-lg-2">
    	<div class="form-group text-center">
        <label><strong>#NO</strong></label> 
          <?php $no = 1; ?>
          <p><?php if(isset($no)){ echo $no; } ?></p>
		      <input type="hidden" class="form-control"  name="installment_no_first" id="installment_no_first" value="<?php if(isset($no)){ echo $no; } ?>"/>	
	   </div>
  	</div>
  	<div class="col-lg-4"> 
        <div class="form-group">
          <label>Installment Date</label>
          <input type="text" class="form-control" name="installment_date_fisrt" id="installment_date_fisrt" value="<?php echo $currentTime; ?>">
        </div>
    </div>
    <div class="col-lg-3"> 
    	<div class="form-group">
          <label>Due Amount</label>
          <input type="text" class="form-control" name="due_amount_first" id="due_amount_first" value="<?php echo $reg_fee; ?>">
        </div>
	</div>
	<div class="col-lg-3"> 
        <div class="form-group">
          <label>Paid Amount</label>
          <input type="text" class="form-control" name="paid_amount_first" id="paid_amount_first" value="<?php echo $reg_fee; ?>">
        </div>
	</div>
	 

<?php 

if(!empty($data['payment_details']->installment_no)){
  $no = $data['payment_details']->installment_no+2;
  $no_in =  $no_in + $no;
}else{
  $no =2;
}
for($i=$no;$i<=($no_in+1); $i++) { ?>
	
	<div class="col-lg-12">
		                  		
  	</div>
  	<div class="col-lg-2">
  		<div class="form-group text-center">
         <label><strong></strong></label> 
         <p><?php if(isset($i)){ echo $i; } ?></p>
		<input type="hidden" class="form-control"  name="installment_no[]" id="installment_no" value="<?php if(isset($i)){ echo $i; } ?>"/>
	</div>
  	</div>
  	<div class="col-lg-4"> 
        <div class="form-group">
        		<?php $time = strtotime($final);
			$final = date("d-M-Y", strtotime("+1 month", $time)); ?>
          <label>Installment Date</label>
          <input type="text" class="form-control" name="installment_date[]" id="installment_date" value="<?php echo $final; ?>">
        </div>
    </div>
    <div class="col-lg-3"> 
    	<div class="form-group">
          <label>Due Amount</label>
          <input type="text" class="form-control" name="due_amount[]" id="due_amount" value="<?php echo $divi_in; ?>">
        </div>
	</div>
	<div class="col-lg-3"> 
        <div class="form-group">
          <label>Paid Amount</label>
          <input type="text" class="form-control" name="paid_amount[]" id="paid_amount">
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



<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

 $( function() {

    $( "#datepicker" ).datepicker({  format: 'yyyy-mm-dd'});

  } );





 // $( function() {

 //    $( ".datepicker" ).datepicker({  format: 'yyyy-mm-dd'});

 //  } );

  </script>							                  				