<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Chalan</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap');
*{
	margin:0;
	padding:0;box-sizing:border-box;
}
@page {
    margin: 0;
}
.invoice-company-logo, .invoice-other-company, .customer-details {  }
.invoice-company-logo h2 		{ margin-top: 10px;margin-bottom: 0;font-size: 25px; }
.invoice-wrapper				{ padding: 25px; overflow: hidden;font-family: 'Nunito', sans-serif;width:793px;padding-bottom: 0;height: 450px;overflow: hidden;}
.invoice-other-company, .customer-details:last-child {  }
.invoice-customer				{ overflow: hidden;width: 100%;border-top: 1px solid #dddddd;padding-top: 20px;margin-top:10px;    display: flex;justify-content: space-between;}
.customr-name					{ font-weight: 600;font-size: 16px; }
.customr-name h5 {
    display: inline-block;
    font-weight: bolder;
    margin-top: 0 !important;
    margin-bottom: 5px;
    color: #000;
    font-size: 14px;
    margin-right: 3px;
}
.receipt-author {
    width: 30%;
    font-size: 13px;
}
.customr-name span				{ font-weight: 400;font-size: 0.83em; }
table							{ font-family: arial, sans-serif;border-collapse: collapse;
width: 100%;}
.invoice-bill td, .invoice-bill th { border: 1px solid #dddddd; padding: 8px; }
.invoice-bill					{ margin-top: 15px;margin-bottom: 15px;    width: 70%; }
.invoice-bill table tr:nth-child(2) { height: 80px;vertical-align: top; }
.invoice-bill th				{ width: 70%; }
.invoice-other-company img		{ height: 80px; }
td                              { font-size: 0.83em;}


button#printbtn {
    padding: 12px 25px;
    border: 0;
    margin: auto;
    background-color: #2196F3;
    border-radius: 20px;
    color: #fff;
    font-size: 16px;
    letter-spacing: 0.1px;outline:none;margin-bottom:20px;
}
 
@page {
    margin: 0;
}
</style>
</head> 
<body>


<div class="invoice-wrapper" style="border-bottom: 2px dashed #e4e4e4;">
	<div>
		<div class="invoice-company-logo" style="display:flex;justify-content: center;">
			<h2>Chalan</h2>
		</div> 
	</div>
	<div class="invoice-customer">
		<div class="customer-details">
		<div class="customr-name"><h5>Branch :</h5> <span>
        <?php $branch_ids = explode(",", $list_otherincome->branch_id);
        foreach ($list_branch as $row) {
            if (in_array($row->branch_id, $branch_ids)) {
            echo $row->branch_code;
            }
        } ?>
        </span></div>
        <div class="customr-name"><h5>Subject :</h5><span>
        <?php $subjectids = explode(",", $list_otherincome->subject_id);
        foreach ($list_subject as $row) {
            if (in_array($row->subject_id, $subjectids)) {
            echo $row->subject_name;
            }
        } ?>      
        </span></div>
        <div class="customr-name"><h5>Details :</h5> <span>
        <?php echo $list_otherincome->info; ?>
        </span></div>
		</div>
		<div class="customer-details" style="text-align:right;">
        <div class="customr-name"><h5>ChalanNo :</h5> <span><?php echo $chalanno; ?></span></div>
		<div class="customr-name"><h5>Date :</h5> <span><?php date_default_timezone_set('Asia/Kolkata'); echo date('d-M-Y', strtotime($list_otherincome->pay_date)); ?></span></div>
		</div>
	</div>
	<div class="invoice-bill">
		<table> 
		  <tr>
			<th style="text-align:center;">Description</th>
			<th>Amount Rs.</th>
		  </tr>
		  <tr>
			<td style="text-align:left;">
            <?php if($list_otherincome->payment_mode != "Cash") { echo  "<b>Status : </b>".$list_otherincome->payment_mode."</br>"; } ?>
            
            <?php if($list_otherincome->payment_mode == "Cash") { echo $list_otherincome->payment_mode; } ?>
        <?php if (
            $list_otherincome->payment_mode == "Credit Card" || $list_otherincome->payment_mode == "Debit Card" || $list_otherincome->payment_mode == "Online Payment"
            || $list_otherincome->payment_mode == "Paytm" || $list_otherincome->payment_mode == "Banck Deposit (Cash)" || $list_otherincome->payment_mode == "Capital Float (EMI)"
            || $list_otherincome->payment_mode == "Google Pay" || $list_otherincome->payment_mode == "Phone Pay" || $list_otherincome->payment_mode == "Bajaj Finserv (EMI)"
            || $list_otherincome->payment_mode == "Bhim UPI(India)" || $list_otherincome->payment_mode == "Instamojo" || $list_otherincome->payment_mode == "Paypal"
            || $list_otherincome->payment_mode == "Razorpay"
            ) { ?>
            <?php echo "<b>Transaction No : </b>" . $list_otherincome->transaction_no . "<br>" ?>
            <?php echo "<b>Transaction Date : </b>" . $list_otherincome->transaction_date; ?>
            <?php } ?>
            <?php if ($list_otherincome->payment_mode == "Cheque" || $list_otherincome->payment_mode == "DD") { ?>
            <?php echo "<b>Bank Name : </b>" . $list_otherincome->bank_name . "<br>" ?>
            <?php echo "<b>Bank Branch Name : </b>" . $list_otherincome->bank_branch_name . "<br>" ?>
            <?php echo "<b>Cheque Holder Name : </b>" . $list_otherincome->cheque_holder_name . "<br>" ?>
            <?php echo "<b>Cheque No : </b>" . $list_otherincome->cheque_no . "<br>" ?>
            <?php echo "<b>Cheque Date : </b>" . $list_otherincome->cheque_date; ?>
            <?php } ?>
            <?php if ($list_otherincome->payment_mode == "NEFT / IMPS") { ?>
            <?php echo "<b>Bank Name : </b>" . $list_otherincome->bank_name . "<br>" ?>
            <?php echo "<b>Bank Branch Name : </b>" . $list_otherincome->bank_branch_name . "<br>" ?>
            <?php echo "<b>Transaction No : </b>" . $list_otherincome->transaction_no . "<br>" ?>
            <?php echo "<b>Transaction Date : </b>" . $list_otherincome->transaction_date; ?>
            <?php } ?>    
            </td>
			<td style="text-align:center;"><?php echo $list_otherincome->paying_amount; ?></td>
		  </tr>
		   <tr>
			<th style="text-align:right;">Total Rs.</th>
			<td style="text-align:center;font-size: 16px;"><?php echo $list_otherincome->paying_amount; ?></td>
		  </tr>
		</table> 
		<!-- <span style="padding-top: 20px;
    display: block;">Your online payment will be credited to your account within 3 working days.Incase of any failure in processing your transaction.</span> -->
	</div>

	<div class="customr-name" style="    text-align: center;display: flex;align-items: flex-end;    padding-bottom: 20px;height: 50px;    justify-content: flex-end;"><div class="receipt-author">
			<p>Authorized By</p>
		</div></div>
</div>
<div class="invoice-wrapper">
	 
	<div>
	    
		<div class="invoice-company-logo" style="display:flex;justify-content: center;">
			<h2>Chalan</h2>
		</div> 
	</div>
	<div class="invoice-customer">
		<div class="customer-details">
        <div class="customr-name"><h5>Branch :</h5> <span>
        <?php $branch_ids = explode(",", $list_otherincome->branch_id);
        foreach ($list_branch as $row) {
            if (in_array($row->branch_id, $branch_ids)) {
            echo $row->branch_code;
            }
        } ?>
        </span></div>
        <div class="customr-name"><h5>Subject :</h5><span>
        <?php $subjectids = explode(",", $list_otherincome->subject_id);
        foreach ($list_subject as $row) {
            if (in_array($row->subject_id, $subjectids)) {
            echo $row->subject_name;
            }
        } ?>      
        </span></div>
        <div class="customr-name"><h5>Details :</h5> <span>
        <?php echo $list_otherincome->info; ?>
        </span></div>
		</div>
		<div class="customer-details" style="text-align:right;">
        <div class="customr-name"><h5>ChalanNo :</h5> <span><?php echo $chalanno; ?></span></div>
		<div class="customr-name"><h5>Date :</h5> <span><?php date_default_timezone_set('Asia/Kolkata'); echo date('d-M-Y', strtotime($list_otherincome->pay_date)); ?></span></div>
		</div>
	</div>
	<div class="invoice-bill">
		<table> 
		  <tr>
			<th style="text-align:center;">Description</th>
			<th>Amount Rs.</th>
		  </tr>
		  <tr>
			<td style="text-align:left;">
            <?php if($list_otherincome->payment_mode != "Cash") { echo  "<b>Status : </b>".$list_otherincome->payment_mode."</br>"; } ?>
            <?php if($list_otherincome->payment_mode == "Cash") { echo $list_otherincome->payment_mode; } ?>
        <?php if (
            $list_otherincome->payment_mode == "Credit Card" || $list_otherincome->payment_mode == "Debit Card" || $list_otherincome->payment_mode == "Online Payment"
            || $list_otherincome->payment_mode == "Paytm" || $list_otherincome->payment_mode == "Banck Deposit (Cash)" || $list_otherincome->payment_mode == "Capital Float (EMI)"
            || $list_otherincome->payment_mode == "Google Pay" || $list_otherincome->payment_mode == "Phone Pay" || $list_otherincome->payment_mode == "Bajaj Finserv (EMI)"
            || $list_otherincome->payment_mode == "Bhim UPI(India)" || $list_otherincome->payment_mode == "Instamojo" || $list_otherincome->payment_mode == "Paypal"
            || $list_otherincome->payment_mode == "Razorpay"
            ) { ?>
            <?php echo "<b>Transaction No : </b>" . $list_otherincome->transaction_no . "<br>" ?>
            <?php echo "<b>Transaction Date : </b>" . $list_otherincome->transaction_date; ?>
            <?php } ?>
            <?php if ($list_otherincome->payment_mode == "Cheque" || $list_otherincome->payment_mode == "DD") { ?>
            <?php echo "<b>Bank Name : </b>" . $list_otherincome->bank_name . "<br>" ?>
            <?php echo "<b>Bank Branch Name : </b>" . $list_otherincome->bank_branch_name . "<br>" ?>
            <?php echo "<b>Cheque Holder Name : </b>" . $list_otherincome->cheque_holder_name . "<br>" ?>
            <?php echo "<b>Cheque No : </b>" . $list_otherincome->cheque_no . "<br>" ?>
            <?php echo "<b>Cheque Date : </b>" . $list_otherincome->cheque_date; ?>
            <?php } ?>
            <?php if ($list_otherincome->payment_mode == "NEFT / IMPS") { ?>
            <?php echo "<b>Bank Name : </b>" . $list_otherincome->bank_name . "<br>" ?>
            <?php echo "<b>Bank Branch Name : </b>" . $list_otherincome->bank_branch_name . "<br>" ?>
            <?php echo "<b>Transaction No : </b>" . $list_otherincome->transaction_no . "<br>" ?>
            <?php echo "<b>Transaction Date : </b>" . $list_otherincome->transaction_date; ?>
            <?php } ?>    
            </td>
			<td style="text-align:center;"><?php echo $list_otherincome->paying_amount; ?></td>
		  </tr>
		   <tr>
			<th style="text-align:right;">Total Rs.</th>
			<td style="text-align:center;font-size: 16px;"><?php echo $list_otherincome->paying_amount; ?></td>
		  </tr>
		</table> 
		<!-- <span style="padding-top: 20px;display: block;">Your online payment will be credited to your account within 3 working days.Incase of any failure in processing your transaction.</span> -->
	</div>

	<div class="customr-name" style="    text-align: center;display: flex;align-items: flex-end;    padding-bottom: 20px;height: 50px;    justify-content: flex-end;"><div class="receipt-author">
			<p>Authorized By</p>
		</div></div>
</div>
</body>

</html>
 