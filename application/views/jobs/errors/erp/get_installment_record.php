


<?php   $amount = $data['tution_fee']; 
		$no_in =  $data['no_of_installment'];
		$reg_fee =  $data['registration_fee'];
		$total =  $amount - $reg_fee;
 		$divi_in = floor($total/$no_in);
		date_default_timezone_set('Asia/Kolkata'); 
		$currentTime = date( 'Y-m-d', time());
		$final = date( 'Y-m-d', time());  ?>


		
                             <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
							    <div class="form-group">
									<label for="email"><b>#NO</b></label>
									<?php $no = "1"; ?>
									<input type="text" name="" value="<?php if(isset($no)){ echo $no; } ?>"  class="form-control custom-form-control number" />			
							    </div>
							</div>
							<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
							    <div class="form-group">
							        <label for="email">Installment Date</label>
									<input type="text" name="installment_date_fisrt" id="installment_date_first"  class="form-control custom-form-control" value="<?php echo $currentTime; ?>"/>
							    </div>
							</div>
							<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
							    <div class="form-group">
							        <label>	Due Amount</label>
									<input type="text" name="due_amount_first" id="due_amount_first"  class="form-control custom-form-control" value="<?php echo $reg_fee; ?>"/>
							    </div>
							</div>
							<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
							    <div class="form-group">
							        <label for="email"> Paid Amount</label>
									<input type="text" name="paid_amount_first" id="paid_amount_first"  class="form-control custom-form-control" value="<?php echo $reg_fee; ?>" />
							    </div>
							</div>
							<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
							    <div class="form-group">
								<label>Send SMS To:</label>
								<input type="checkbox" ><br>
								<label>Send Email To:</label>
								<input type="checkbox" >
							    </div>
							</div>
							<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
							    <div class="form-group">
								<label>Send SMS Father:</label>
								<input type="checkbox" ><br>
								<label>Send Email Father:</label>
								<input type="checkbox" >
							    </div>
							</div>


	
		<?php for($i=2;$i<= ($no_in+1); $i++) { ?>
		<div class="col-xl-2 col-lg-1 col-md-6 col-sm-6">
		<div class="form-group">
			<input type="text" name="" value="<?php if(isset($i)){ echo $i; } ?>"  class="form-control custom-form-control number" />			
		</div>
	</div>
	<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
		<div class="form-group">
			<?php $time = strtotime($final);
			$final = date("Y-m-d", strtotime("+1 month", $time)); ?>
			<input type="text" id="datepicker12" name="installment_date[]" id="installment_date"  class="form-control custom-form-control" value="<?php echo $final; ?>"/>
		</div>
	</div>
	<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
		<div class="form-group">
			<input type="text" name="due_amount[]" id="due_amount" class="form-control custom-form-control" value="<?php echo $divi_in; ?>"/>
		</div>
	</div>
	<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
		<div class="form-group">
			<input type="text"  name="paid_amount[]" id="paid_amount" class="form-control custom-form-control"/>
		</div>
	</div>
	<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
		<div class="form-group">
			<input type="text"  name="" id="" class="form-control custom-form-control number"/>
		</div>
	</div>
	<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
		<div class="form-group">
			<input type="text"  name="" id="" class="form-control custom-form-control number"/>
		</div>
	</div>
	<?php } ?>



<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 $( function() {
    $( "#datepicker" ).datepicker({  format: 'yyyy-mm-dd'});
  } );


 // $( function() {
 //    $( ".datepicker" ).datepicker({  format: 'yyyy-mm-dd'});
 //  } );
  </script>