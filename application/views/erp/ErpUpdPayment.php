<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css"> 
<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body p-0 ">
				<div id="instament_data_msg"></div>
				<div class="form-row inst-pay">
					<input type="hidden" name="upd_intalment_id" id="upd_intalment_id" value="<?php echo $adm_instalment->admission_installment_id; ?>">
					<div class="form-group col-md-6">
						<div class="rs-stu-item mb-0">
							<p>Branch:<span style="color: red;">*</span></p>
							<span>
								<?php
								$branch_ids = explode(",", $admission_data->branch_id);
								foreach ($list_branch as $row) {
									if (in_array($row->branch_id, $branch_ids)) {
										echo $row->branch_name;
									}
								}
								?>
							</span>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="rs-stu-item mb-0">
							<p>Name:<span style="color: red;">*</span></p>
							<span>
								<?php echo $admission_data->surname; ?> <?php echo $admission_data->first_name; ?>
							</span>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="rs-stu-item mb-0">
							<p>Due Amount(₹):<span style="color: red;">*</span></p>
							<span>
								<?php echo $adm_instalment->due_amount; ?>
							</span>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="rs-stu-item mb-0">
							<p>Total Amount(₹):<span style="color: red;">*</span></p>
							<span>
								<?php echo $adm_instalment->due_amount; ?>
								<input type="hidden" name="total_due_amount_data" value="<?php echo $adm_instalment->due_amount; ?>" id="total_due_amount_data">
							</span>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="rs-stu-item mb-0">
							<p>Payment Type:<span style="color: red;">*</span></p>
							<span>
								<div class="pretty p-icon p-jelly p-round p-bigger">
									<input type="radio" id="payment_type" name="payment_type" value="Regular Payment" <?php {
																															echo "checked";
																														} ?> />
									<div class="state p-info">
										<i class="icon material-icons">done</i>
										<label>Regular Payment</label>
									</div>
								</div>
								<div class="pretty p-icon p-jelly p-round p-bigger">
									<input type="radio" id="payment_type" name="payment_type" value="Adjustment Payment" />
									<div class="state p-info">
										<i class="icon material-icons">done</i>
										<label>Adjustment Payment</label>
									</div>
								</div>
							</span>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="rs-stu-item mb-0">
							<p>Paying Amount(₹):<span style="color: red;">*</span></p>
							<span>
								<input type="text" class="form-control" id="paying_amount" name="paying_amount" value="<?php echo $adm_instalment->due_amount; ?>" onblur="return get_split_amount_date(<?php echo $adm_instalment->due_amount; ?>)">
							</span>
						</div>
					</div>

					<?php date_default_timezone_set("Asia/Calcutta");
					$today = date('d-m-Y'); ?>
					<div class="form-group col-md-6">
						<div class="rs-stu-item mb-0">
							<p>Payment Date:<span style="color: red;">*</span></p>
							<span>
								<input type="text" class="form-control" id="installment_date" name="installment_date" value="<?php echo $today; ?>">
							</span>
						</div>
					</div>


					<?php date_default_timezone_set("Asia/Calcutta");
					$today = date('d-m-Y'); ?>
					<div class="form-group col-md-6" id="split_payment_date">
						<div class="rs-stu-item mb-0">
							<p>Remaining Payment Date:<span style="color: red;">*</span></p>
							<span>
								<input type="date" class="form-control" name="split_installment_date_data" id="split_installment_date_data"  value="<?php echo $today; ?>">
							</span>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label>Payment Mode</label>
							<select class="form-control" name="payment_mode" id="payment_mode" onchange="paymenttype(this)">
								<option value="">Select Mode</option>
								<option value="Cash" selected="selected">Cash</option>
								<option value="Cheque">Cheque</option>
								<option value="DD">DD</option>
								<option value="Credit Card">Credit Card</option>
								<option value="Debit Card">Debit Card</option>
								<option value="Online Payment">Online Payment</option>
								<option value="NEFT / IMPS">NEFT / IMPS</option>
								<option value="Paytm">Paytm</option>
								<option value="Banck Deposit (Cash)">Bank Deposit (Cash)</option>
								<option value="Capital Float (EMI)">Capital Float (EMI)</option>
								<option value="Google Pay">Google Pay</option>
								<option value="Phone Pay">Phone Pay</option>
								<option value="Bajaj Finserv (EMI)">Bajaj Finserv (EMI)</option>
								<option value="Bhim UPI(India)">Bhim UPI(India)</option>
								<option value="Instamojo">Instamojo</option>
								<option value="Paypal">Paypal</option>
								<option value="Razorpay">Razorpay</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6 Cheque-Hidden">
						<div class="form-group">
							<label>Cheque Holder Name</label>
							<input type="text" class="form-control" name="cheque_holder_name" id="cheque_holder_name" placeholder="Cheque Holder Name">
						</div>
					</div>
					<div class="col-lg-6 Cheque-Hidden">
						<div class="form-group">
							<label>Cheque/DD No</label>
							<input type="text" class="form-control" name="cheque_dd_no" id="cheque_dd_no" placeholder="Cheque/DD No">
						</div>
					</div>
					<div class="col-lg-6 Cheque-Hidden">
						<div class="form-group">
							<label>Cheque/DD Date</label>
							<input type="date" class="form-control" name="cheque_dd_date" id="cheque_dd_date" placeholder="Cheque/DD Date">
						</div>
					</div>
					<div class="col-lg-6 Cheque-Hidden">
						<div class="form-group">
							<label>Bank Name</label>
							<input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Bnck Name">
						</div>
					</div>
					<div class="col-lg-6 Cheque-Hidden">
						<div class="form-group">
							<label>Bank Branch Name</label>
							<input type="text" class="form-control" name="bank_branch_name" id="bank_branch_name" placeholder="Bank Branch Name">
						</div>
					</div>
					<div class="col-lg-6 Cheque-Hidden">
						<div class="form-group">
							<label>Cheque Status</label>
							<select class="form-control" name="cheque_status" id="cheque_status">
								<option value="">Select</option>
								<option value="Paid/Cleared">Paid/Cleared</option>
								<option value="Deposit IN Bank">Deposit IN Bank</option>
								<option value="Cheque Collected">Cheque Collected</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6 Dd-Hidden">
						<div class="form-group">
							<label>Cheque Holder Name</label>
							<input type="text" class="form-control" name="dd_cheque_holder_name" id="dd_cheque_holder_name" placeholder="Cheque Holder Name">
						</div>
					</div>
					<div class="col-lg-6 Dd-Hidden">
						<div class="form-group">
							<label>Cheque/DD No</label>
							<input type="text" class="form-control" name="dd_cheque_dd_no" id="dd_cheque_dd_no" placeholder="Cheque/DD No">
						</div>
					</div>
					<div class="col-lg-6 Dd-Hidden">
						<div class="form-group">
							<label>Cheque/DD Date</label>
							<input type="date" class="form-control" name="dd_cheque_dd_date" id="dd_cheque_dd_date" placeholder="Cheque/DD Date">
						</div>
					</div>
					<div class="col-lg-6 Dd-Hidden">
						<div class="form-group">
							<label>Bank Name</label>
							<input type="text" class="form-control" name="dd_bank_name" id="dd_bank_name" placeholder="Bnck Name">
						</div>
					</div>
					<div class="col-lg-6 Dd-Hidden">
						<div class="form-group">
							<label>Bank Branch Name</label>
							<input type="text" class="form-control" name="dd_bank_branch_name" id="dd_bank_branch_name" placeholder="Bank Branch Name">
						</div>
					</div>
					<div class="col-lg-6 Dd-Hidden">
						<div class="form-group">
							<label>Cheque Status</label>
							<select class="form-control" name="dd_cheque_status" id="dd_cheque_status">
								<option value="">Select</option>
								<option value="Paid/Cleared">Paid/Cleared</option>
								<option value="Deposit IN Bank">Deposit IN Bank</option>
								<option value="Cheque Collected">Cheque Collected</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6 Cradit-Card">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="cradit_card_transaction_no" id="cradit_card_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Cradit-Card">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="cradit_card_transaction_date" id="cradit_card_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6 Debit-Card">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="debit_card_transaction_no" id="debit_card_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Debit-Card">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="debit_card_transaction_date" id="debit_card_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6 Online-Payment">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="online_payment_transaction_no" id="online_payment_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Online-Payment">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="online_payment_transaction_date" id="online_payment_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6 NEFT-IMPS">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="neft_imps_transaction_no" id="neft_imps_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 NEFT-IMPS">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="neft_imps_transaction_date" id="neft_imps_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6 NEFT-IMPS">
						<div class="form-group">
							<label>Bank Name</label>
							<input type="text" class="form-control" name="neft_imps_bank_name" id="neft_imps_bank_name" placeholder="Bnck Name">
						</div>
					</div>
					<div class="col-lg-6 NEFT-IMPS">
						<div class="form-group">
							<label>Bank Branch Name</label>
							<input type="text" class="form-control" name="neft_imps_bank_branch_name" id="neft_imps_bank_branch_name" placeholder="Bank Branch Name">
						</div>
					</div>
					<div class="col-lg-6 Paytm">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="paytm_transaction_no" id="paytm_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Paytm">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="paytm_transaction_date" id="paytm_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6 Bank-Deposit">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="bank_deposit_transaction_no" id="bank_deposit_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Bank-Deposit">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="bank_deposit_transaction_date" id="bank_deposit_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6  Capital-Float">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="capital_float_transaction_no" id="capital_float_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Capital-Float">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="capital_float_transaction_date" id="capital_float_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6  Google-Pay">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="google_pay_transaction_no" id="google_pay_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Google-Pay">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="google_pay_transaction_date" id="google_pay_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6  Phone-Pay">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="phone_pay_transaction_no" id="phone_pay_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Phone-Pay">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="phone_pay_transaction_date" id="phone_pay_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6  Bajaj-Finserv">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="bajaj_finserv_transaction_no" id="bajaj_finserv_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Bajaj-Finserv">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="bajaj_finserv_transaction_date" id="bajaj_finserv_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6  Bhim-UPI">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="bhim_upi_transaction_no" id="bhim_upi_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Bhim-UPI">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="bhim_upi_transaction_date" id="bhim_upi_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6  Insta-mojo">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="instamoj_transaction_no" id="instamoj_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Insta-mojo">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="instamoj_transaction_date" id="instamoj_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6  Pay-pal">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="pay_pal_transaction_no" id="pay_pal_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Pay-pal">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="pay_pal_transaction_date" id="pay_pal_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="col-lg-6  Razor-pay">
						<div class="form-group">
							<label>Transaction No</label>
							<input type="text" class="form-control" name="razorpay_transaction_no" id="razorpay_transaction_no" placeholder="Transaction ID">
						</div>
					</div>
					<div class="col-lg-6 Razor-pay">
						<div class="form-group">
							<label>Transaction Date</label>
							<input type="date" class="form-control" name="razorpay_transaction_date" id="razorpay_transaction_date" placeholder="Transaction Date">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="rs-stu-item mb-0">
							<p>Send Email To Student :</p>
							<div class="pretty p-icon p-jelly p-round p-bigger">
								<input type="radio" id="" name="send_email_student" value="yes" />
								<div class="state p-info">
									<i class="icon material-icons">done</i>
									<label>Yes</label>
								</div>
							</div>
							<div class="pretty p-icon p-jelly p-round p-bigger">
								<input type="radio" id="" name="send_email_student" value="no" <?php {
																									echo "checked";
																								} ?> />
								<div class="state p-info">
									<i class="icon material-icons">done</i>
									<label>No</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="rs-stu-item mb-0">
							<p>Send Sms To Student :</p>
							<div class="pretty p-icon p-jelly p-round p-bigger">
								<input type="radio" id="" name="send_sms_student" value="yes" />
								<div class="state p-info">
									<i class="icon material-icons">done</i>
									<label>Yes</label>
								</div>
							</div>
							<div class="pretty p-icon p-jelly p-round p-bigger">
								<input type="radio" id="" name="send_sms_student" value="no" <?php {
																									echo "checked";
																								} ?> />
								<div class="state p-info">
									<i class="icon material-icons">done</i>
									<label>No</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="rs-stu-item mb-0">
							<p>Send Email To Parents :</p>
							<div class="pretty p-icon p-jelly p-round p-bigger">
								<input type="radio" id="" name="send_email_parents" value="yes" />
								<div class="state p-info">
									<i class="icon material-icons">done</i>
									<label>Yes</label>
								</div>
							</div>
							<div class="pretty p-icon p-jelly p-round p-bigger">
								<input type="radio" id="" name="send_email_parents" value="no" <?php {
																									echo "checked";
																								} ?> />
								<div class="state p-info">
									<i class="icon material-icons">done</i>
									<label>No</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="rs-stu-item mb-0">
							<p>Send Sms To Parents : </p>
							<div class="pretty p-icon p-jelly p-round p-bigger">
								<input type="radio" id="" name="send_sms_parents" value="yes" />
								<div class="state p-info">
									<i class="icon material-icons">done</i>
									<label>Yes</label>
								</div>
							</div>

							<div class="pretty p-icon p-jelly p-round p-bigger">
								<input type="radio" id="" name="send_sms_parents" value="no" <?php {
																									echo "checked";
																								} ?> />
								<div class="state p-info">
									<i class="icon material-icons">done</i>
									<label>No</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="rs-stu-item mb-0">
							<span>
								<textarea class="form-control w-100" name="comments" id="comments" placeholder="Remarks"></textarea>
							</span>
						</div>
						<input type="hidden" class="form-control" id="receipt_admission_id" value="<?php echo $adm_instalment->admission_installment_id; ?>">
					</div>
					<input style="margin-top: 20px;" type="submit" name="upd_intallment" class="btn btn-primary" id="upd_intallment" value="Submit">
					<input style="margin-top: 20px;" type="submit" name="" class="btn btn-light text-dark ml-2 final-receipt" id="Receipt" value="Receipt" onclick="return disable_button()">
					<input style="margin-top: 20px;" type="submit" name="" class="btn btn-light text-dark ml-2 processingcheck-receipt" id="ChequeReceipt" value="Receipt" onclick="return disable_cheque_button()">
				</div>
			</div>
		</div>
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
		field: document.getElementById('installment_date'),
		onSelect: function(date){
		document.getElementById('result-1').innerHTML =  date.format('Do MMMM YYYY');
		}
		
	});
</script>
<script>
	function disable_button()
      {
         $("#Receipt").attr("disabled", true);
         $('#msg').html(iziToast.success({
   						title: 'Success',
   						timeout: 5000,
   						message: 'HI! Recirpt is already generated....',
   						position: 'topRight'
   					}));
      }
      function disable_cheque_button()
      {        
         $("#ChequeReceipt").attr("disabled", true);
         $('#msg').html(iziToast.success({
   						title: 'Success',
   						timeout: 5000,
   						message: 'HI! Recirpt is already generated....',
   						position: 'topRight'
   					}));
      }
     

	function paymenttype(p) {
		$("#Receipt").show();
		$("#ChequeReceipt").hide();

		var x = p.options[p.selectedIndex].text;

		if (x == "Cheque") {
			$(".Cheque-Hidden").show();
			$(".processingcheck-receipt").show();
			$(".final-receipt").hide();
		} else {
			$(".Cheque-Hidden").hide();
			// $(".processingcheck-receipt").hide();
			// $(".final-receipt").show();
		}

		if (x == "DD") {
			$(".Dd-Hidden").show();
			$(".processingcheck-receipt").show();
			$(".final-receipt").hide();
		} else {
			$(".Dd-Hidden").hide();
			// $(".processingcheck-receipt").hide();
			// $(".final-receipt").show();
		}

		if (x == "Credit Card") {
			$(".Cradit-Card").show();
		} else {
			$(".Cradit-Card").hide();
		}

		if (x == "Debit Card") {
			$(".Debit-Card").show();
		} else {
			$('.Debit-Card').hide();
		}

		if (x == "Online Payment") {
			$(".Online-Payment").show();
		} else {
			$('.Online-Payment').hide();
		}

		if (x == "NEFT / IMPS") {
			$(".NEFT-IMPS").show();
		} else {
			$('.NEFT-IMPS').hide();
		}

		if (x == "Paytm") {
			$(".Paytm").show();
		} else {
			$('.Paytm').hide();
		}

		if (x == "Bank Deposit (Cash)") {
			$(".Bank-Deposit").show();
		} else {
			$('.Bank-Deposit').hide();
		}

		if (x == "Capital Float (EMI)") {
			$(".Capital-Float").show();
		} else {
			$('.Capital-Float').hide();
		}

		if (x == "Google Pay") {
			$(".Google-Pay").show();
		} else {
			$('.Google-Pay').hide();
		}

		if (x == "Phone Pay") {
			$(".Phone-Pay").show();
		} else {
			$('.Phone-Pay').hide();
		}

		if (x == "Bajaj Finserv (EMI)") {
			$(".Bajaj-Finserv").show();
		} else {
			$('.Bajaj-Finserv').hide();
		}

		if (x == "Bhim UPI(India)") {
			$(".Bhim-UPI").show();
		} else {
			$('.Bhim-UPI').hide();
		}

		if (x == "Instamojo") {
			$(".Insta-mojo").show();
		} else {
			$('.Insta-mojo').hide();
		}

		if (x == "Paypal") {
			$(".Pay-pal").show();
		} else {
			$('.Pay-pal').hide();
		}

		if (x == "Razorpay") {
			$(".Razor-pay").show();
		} else {
			$('.Razor-pay').hide();
		}

	}
	$('.processingcheck-receipt').hide();
	$('.Cheque-Hidden').hide();
	$('.Dd-Hidden').hide();
	$('.Cradit-Card').hide();
	$('.Debit-Card').hide();
	$('.Online-Payment').hide();
	$('.NEFT-IMPS').hide();
	$('.Paytm').hide();
	$('.Bank-Deposit').hide();
	$('.Capital-Float').hide();
	$('.Google-Pay').hide();
	$('.Phone-Pay').hide();
	$('.Bajaj-Finserv').hide();
	$('.Bhim-UPI').hide();
	$('.Insta-mojo').hide();
	$('.Pay-pal').hide();
	$('.Razor-pay').hide();
</script>
<script type="text/javascript">
	$('#upd_intallment').on('click', function() {

		var upd_intalment_id = $('#upd_intalment_id').val();
		var comments = $('#comments').val();
		var paying_amount = $('#paying_amount').val();
		var payment_type = $('#payment_type').val();
		var payment_mode = $('#payment_mode').val();
		var cheque_holder_name = $('#cheque_holder_name').val();
		var cheque_dd_no = $('#cheque_dd_no').val();
		var cheque_dd_date = $('#cheque_dd_date').val();
		var bank_name = $('#cheque_holder_name').val();
		var bank_branch_name = $('#bank_branch_name').val();
		var cheque_status = $('#cheque_status').val();
		var dd_cheque_holder_name = $('#dd_cheque_holder_name').val();
		var dd_cheque_dd_no = $('#dd_cheque_dd_no').val();
		var dd_cheque_dd_date = $('#dd_cheque_dd_date').val();
		var dd_bank_name = $('#dd_bank_name').val();
		var dd_bank_branch_name = $('#dd_bank_branch_name').val();
		var dd_cheque_status = $('#dd_cheque_status').val();
		var cradit_card_transaction_no = $('#cradit_card_transaction_no').val();
		var cradit_card_transaction_date = $('#cradit_card_transaction_date').val();
		var debit_card_transaction_no = $('#debit_card_transaction_no').val();
		var debit_card_transaction_date = $('#debit_card_transaction_date').val();
		var online_payment_transaction_no = $('#online_payment_transaction_no').val();
		var online_payment_transaction_date = $('#online_payment_transaction_date').val();
		var neft_imps_transaction_no = $('#neft_imps_transaction_no').val();
		var neft_imps_transaction_date = $('#neft_imps_transaction_date').val();
		var neft_imps_bank_name = $('#neft_imps_bank_name').val();
		var neft_imps_bank_branch_name = $('#neft_imps_bank_branch_name').val();
		var paytm_transaction_no = $('#paytm_transaction_no').val();
		var paytm_transaction_date = $('#paytm_transaction_date').val();
		var bank_deposit_transaction_no = $('#bank_deposit_transaction_no').val();
		var bank_deposit_transaction_date = $('#bank_deposit_transaction_date').val();
		var capital_float_transaction_no = $('#capital_float_transaction_no').val();
		var capital_float_transaction_date = $('#capital_float_transaction_date').val();
		var google_pay_transaction_no = $('#google_pay_transaction_no').val();
		var google_pay_transaction_date = $('#google_pay_transaction_date').val();
		var phone_pay_transaction_no = $('#phone_pay_transaction_no').val();
		var phone_pay_transaction_date = $('#phone_pay_transaction_date').val();
		var bajaj_finserv_transaction_no = $('#bajaj_finserv_transaction_no').val();
		var bajaj_finserv_transaction_date = $('#bajaj_finserv_transaction_date').val();
		var bhim_upi_transaction_no = $('#bhim_upi_transaction_no').val();
		var bhim_upi_transaction_date = $('#bhim_upi_transaction_date').val();
		var instamoj_transaction_no = $('#instamoj_transaction_no').val();
		var instamoj_transaction_date = $('#instamoj_transaction_date').val();
		var pay_pal_transaction_no = $('#pay_pal_transaction_no').val();
		var pay_pal_transaction_date = $('#pay_pal_transaction_date').val();
		var razorpay_transaction_no = $('#razorpay_transaction_no').val();
		var razorpay_transaction_date = $('#razorpay_transaction_date').val();
		var send_email_student = $('input[name="send_email_student"]:checked').val();
		var send_sms_student = $('input[name="send_sms_student"]:checked').val();
		var send_email_parents = $('input[name="send_email_parents"]:checked').val();
		var send_sms_parents = $('input[name="send_sms_parents"]:checked').val();
		var split_installment_date_data = $('#split_installment_date_data').val();

		$.ajax({
			type: "POST",
			url: "<?php echo base_url() ?>Admission/upd_intsallment",
			data: {
				'upd_intalment_id': upd_intalment_id,
				'paying_amount': paying_amount,
				'payment_type': payment_type,
				'payment_mode': payment_mode,
				'cheque_holder_name': cheque_holder_name,
				'cheque_dd_no': cheque_dd_no,
				'cheque_dd_date': cheque_dd_date,
				'bank_name': bank_name,
				'bank_branch_name': bank_branch_name,
				'cheque_status': cheque_status,
				'dd_cheque_holder_name': dd_cheque_holder_name,
				'dd_cheque_dd_no': dd_cheque_dd_no,
				'dd_cheque_dd_date': dd_cheque_dd_date,
				'dd_bank_name': dd_bank_name,
				'dd_bank_branch_name': dd_bank_branch_name,
				'dd_cheque_status': dd_cheque_status,
				'cradit_card_transaction_no': cradit_card_transaction_no,
				'cradit_card_transaction_date': cradit_card_transaction_date,
				'debit_card_transaction_no': debit_card_transaction_no,
				'debit_card_transaction_date': debit_card_transaction_date,
				'online_payment_transaction_no': online_payment_transaction_no,
				'online_payment_transaction_date': online_payment_transaction_date,
				'neft_imps_transaction_no': neft_imps_transaction_no,
				'neft_imps_transaction_date': neft_imps_transaction_date,
				'neft_imps_bank_name': neft_imps_bank_name,
				'neft_imps_bank_branch_name': neft_imps_bank_branch_name,
				'paytm_transaction_no': paytm_transaction_no,
				'paytm_transaction_date': paytm_transaction_date,
				'bank_deposit_transaction_no': bank_deposit_transaction_no,
				'bank_deposit_transaction_date': bank_deposit_transaction_date,
				'capital_float_transaction_no': capital_float_transaction_no,
				'capital_float_transaction_date': capital_float_transaction_date,
				'google_pay_transaction_no': google_pay_transaction_no,
				'google_pay_transaction_date': google_pay_transaction_date,
				'phone_pay_transaction_no': phone_pay_transaction_no,
				'phone_pay_transaction_date': phone_pay_transaction_date,
				'bajaj_finserv_transaction_no': bajaj_finserv_transaction_no,
				'bajaj_finserv_transaction_date': bajaj_finserv_transaction_date,
				'bhim_upi_transaction_no': bhim_upi_transaction_no,
				'bhim_upi_transaction_date': bhim_upi_transaction_date,
				'instamoj_transaction_no': instamoj_transaction_no,
				'instamoj_transaction_date': instamoj_transaction_date,
				'pay_pal_transaction_no': pay_pal_transaction_no,
				'pay_pal_transaction_date': pay_pal_transaction_date,
				'razorpay_transaction_no': razorpay_transaction_no,
				'razorpay_transaction_date': razorpay_transaction_date,
				'comments': comments,
				'send_email_student': send_email_student,
				'send_sms_student': send_sms_student,
				'send_email_parents': send_email_parents,
				'send_sms_parents': send_sms_parents,
				'remaining_payment_date' : split_installment_date_data
			},

			success: function(resp) {
				var data = $.parseJSON(resp);
				var ddd = data['all_record'].status;
				var lastAdmiid = data['lastAdmiid'];
				if (ddd == '1') {
					$('#instament_data_msg').html(iziToast.success({
						title: 'Success',
						timeout: 5000,
						message: 'HI! You Have Completed The Installation Of Your Fees',
						position: 'topRight'
					}));

					$.ajax({
						url: "<?php echo base_url(); ?>Admission/Erppayment_Admisison",
						type: "post",
						data: {
							'admission_id': lastAdmiid
						},
						success: function(Resp) {
							$('.bg-table').html(Resp);
						}   	
					});
				} else if (ddd == '3') {
					$('#instament_data_msg').html(iziToast.success({
						title: 'Success',
						timeout: 5000,
						message: 'HI! You Have Completed The Split Installation Of Your Fees!',
						position: 'topRight'
					}));
				} else {
					$('#instament_data_msg').html(iziToast.error({
						title: 'Canceled!',
						timeout: 5000,
						message: 'Someting Wrong!!',
						position: 'topRight'
					}));
				}
			}

		});

		return false;

	});
</script>

<script type="text/javascript">
	$('#Receipt').on('click', function() {

		var instalment_id = $('#receipt_admission_id').val();
		alert(instalment_id);

		window.open("<?php echo base_url() ?>Admission/Insreceipt?action=Ins&Rec=" + instalment_id, '_blank');
		return false;
	});
</script>

<script type="text/javascript">
	$('#ChequeReceipt').on('click', function() {

		var instalment_id = $('#receipt_admission_id').val();
		alert(instalment_id);

		window.open("<?php echo base_url() ?>Admission/insproccessiongcheck?action=ins&procheck=" + instalment_id, '_blank');
		return false;
	});


	function get_split_amount_date(Amount){
		var due_amount_data = parseInt($('#total_due_amount_data').val());

		var lessAmount = parseInt($('#paying_amount').val());
		if(due_amount_data < lessAmount){
			$('#paying_amount').val(due_amount_data);
		}
		var totalAmount = parseInt(Amount);
		if(totalAmount > lessAmount)
		{
			$('#split_payment_date').show();
		}else{
			$('#split_payment_date').hide();
		}
	}

	$('#split_payment_date').hide();
</script>