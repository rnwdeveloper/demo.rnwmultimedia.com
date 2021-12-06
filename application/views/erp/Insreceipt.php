<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Invoice</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap');
*{
	margin:0;
	padding:0;box-sizing:border-box;
}
@page {
    margin: 0;
}
.invoice-wrapper				{     padding: 15px;
    overflow: hidden;
    display: block;
    font-family: 'Nunito', sans-serif;
    width: 825px;
    padding-bottom: 0; 
    font-size: 14px;
    height: 580px;} 
.invoice-other-company img { width: 160px;
    margin-bottom: 10px;}
.invoice-other-company { text-align: center;}
.invoice-company-logo { padding-right: 30px; }
.invoice-company-logo p { margin: 4px; }
.invoice-company-logo h2 { margin-bottom: 8px;     margin-top: 0;}
.receipt-content 	{ display: flex;justify-content: space-between;}
.invoice-wrapper h3, .invoice-wrapper h4 { margin: 6px 0 6px 0; }
.receipt-item span, .remark-content span {
    font-weight: 500;
}
.invoice-customer p {
    font-size: 12px;
    margin: 0;
} 
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 6px 8px;
}
.receipt-author {
    padding-top: 50px;
    margin-right: 20px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
 

#customers th {
    text-align: left;
    background-color: #f2f2f2;
}
tfoot {
    background-color: #ffffff;
    font-weight: 600;
}
.gst-item {
    display: inline-block;
    margin-right: 20px;
    font-weight: 600; 
    margin-top: 5px;
}
.course-detail {
	margin: 10px 0 10px;
    overflow: hidden;
    height: 230px;
}
.invoice-note {
    display: flex;
    justify-content: space-between;padding-top: 20px;
}
table#customers { 
     margin-bottom: 15px;
}
.remark-content h4 {
    font-size: 13px;
}
</style>
</head> 
<body>
	<?php
		//---------------------------Gst------------------///////////////////
    // total pay mathi avto tax

    @$pay = $instalment->paid_amount;
    @$gst = "18%";
    @$b = "100";
    @$a = $b+$gst;
    @$p = $pay*$gst;
    // amount finde out
    @$taxamount = $p/$a;
   //tax lagavya pela ni  course pay amount  
    @$amount = $pay-$taxamount;
   // final gst tax
   @$finalgst = $amount*$gst;
   @$totalfinalgst = $finalgst/$b;
  // net payable amount 
   @$netpayableamountwithgst = $amount+$totalfinalgst;

   ?> 
	<?php date_default_timezone_set("Asia/Calcutta");
        $today = date('d-M-Y'); ?>
<div class="invoice-wrapper" style="background-image: url('<?php echo base_url(); ?>/dist/assets/img/receipt-logo.png');background-size: 20%;background-repeat: no-repeat;background-position: center;"> 
	<div style="text-align:center;"><button id="printbtn" class="btn btn-primary" onclick="return get_invoice()">Invoice</button></div>
	<div style="display: flex; margin-bottom:15px; border-bottom: 1px solid #e4e4e4; padding-bottom: 10px;">
		<div class="invoice-company-logo">
			<?php if($receipt_permission->branch_title=="Yes") { ?>
			<h2><?php echo $branch_data->branch_title; ?></h2> 
			<?php } ?>
			<?php if($receipt_permission->address=="Yes") { ?>
			<p><?php echo $branch_data->branch_address; ?></p>
			<p><?php echo $branch_data->mobile_one; ?></p>
			<?php } ?>
			<?php if($receipt_permission->gst_no=="Yes") { ?>
          <div class="gst-content">
		<div class="gst-item">GST No: <span><?php echo $branch_data->gst_no; ?></span></div>
	</div>
    <?php } ?>
		</div>
		<?php if($receipt_permission->logo=="Yes") { ?>
		<div class="invoice-other-company">
			<img src="http://demo.rnwmultimedia.com/dist/branchlogo/<?php echo $branch_data->branch_logo; ?>">
			<h4>Receipt No: <span><?php echo $receiptno; ?></span></h4>
		</div>	
	<?php } ?>
	</div>
	<div style="justify-content: center;display: flex;">
		<h3 style="margin: 0;">Receipt</h3> 
	</div>
	<div class="receipt-content">
		<div class="receipt-item">
			<?php if($receipt_permission->name=="Yes") { ?>
			<h4>Name : <span><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></span></h4>
			<?php } ?>
			<?php if($receipt_permission->course=="Yes") { ?>
			<h4>Course : <span> <?php if($admission->type=="single") { ?>
                    <?php $courseids = explode(",",$admission->course_id);
                foreach($list_course as $row) { if(in_array($row->course_id ,$courseids)) {  echo $row->course_name; }  } ?>
            <?php } else if($admission->type=="package") { ?>
                <?php $packageids = explode(",",$admission->package_id);
                foreach($list_package as $row) { if(in_array($row->package_id ,$packageids)) {  echo $row->package_name; }  } ?>
            <?php } else { 
				$clgcoids = explode(",",$admission->college_courses_id);
                foreach($list_clg_courses as $row) { if(in_array($row->college_courses_id ,$clgcoids)) {  echo $row->college_course_name; }  }
			 }?></span></h4> 
        	<?php } ?>
        	<?php if($receipt_permission->enrollment_no=="Yes") { ?>
			<h4> Enrollment No : <span><?php echo $admission->enrollment_number; ?></span></h4>
			<?php } ?> 
			<div class="course-detail">
		<table id="customers">
			<tbody>
				<?php if($receipt_permission->tuition_fees=="Yes") { ?>
				<tr>
					<td>Tuition Fees</td>
					<td>
					<?php if(isset($admission->tuation_fees)) { echo $admission->tuation_fees; } ?> 
					<?php if(isset($admission->college_tuition_fees)) { echo $admission->college_tuition_fees; } ?> 
					</td>
				</tr>
			  <?php } ?>
				<?php if($receipt_permission->pay_now=="Yes") { ?>
				<tr>
					<td>Fees Paid</td>
					<td><?php echo $instalment->paid_amount; ?></td>
				</tr>
			   <?php } ?>
				<?php if($receipt_permission->receipt_type=="GST") { ?>
				<tr>
					<td>GST 18%</td>
					<td><?php echo (int)$taxamount ?></td>
				</tr>
				<?php } ?>
				<?php if($receipt_permission->total_pay=="Yes") { ?>
				<tr>
					<td><strong>Total</strong></td>
					<td><strong><?php echo $instalment->paid_amount; ?></strong></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<div class="remark-content">
			<?php if($receipt_permission->the_sum_of=="Yes") { ?>
			<h4>The Sum of : <span>
				<?php 
				$number =  $instalment->paid_amount;
				$no = floor($number);
				$point = round($number - $no, 2) * 100;
				$hundred = null;
				$digits_1 = strlen($no);
				$i = 0;
				$str = array();
				$words = array('0' => '', '1' => 'One', '2' => 'Two',
				'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
				'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
				'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
				'13' => 'Thirteen', '14' => 'Fourteen',
				'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
				'18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
				'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
				'60' => 'Sixty', '70' => 'Seventy',
				'80' => 'Eighty', '90' => 'Ninety');
				$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
				while ($i < $digits_1) {
				$divider = ($i == 2) ? 10 : 100;
				$number = floor($no % $divider);
				$no = floor($no / $divider);
				$i += ($divider == 10) ? 1 : 2;
				if ($number) {
					$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
					$hundred = ($counter == 1 && $str[0]) ? ' And ' : null;
					$str [] = ($number < 21) ? $words[$number] .
						" " . $digits[$counter] . $plural . " " . $hundred
						:
						$words[floor($number / 10) * 10]
						. " " . $words[$number % 10] . " "
						. $digits[$counter] . $plural . " " . $hundred;
				} else $str[] = null;
				}
				$str = array_reverse($str);
				$result = implode('', $str);
				$points = ($point) ?
				"." . $words[$point / 10] . " " . 
						$words[$point = $point % 10] : '';
				echo $result . $points;
			?>
			</span></h4>
			<?php } ?>
			<?php if($receipt_permission->remarks=="Yes") { ?>
			<h4>Remarks : <span>
				<?php echo $instalment->payment_mode; ?>
				<?php if($instalment->payment_mode!="Cheque" || $instalment->payment_mode!="DD" || $instalment->payment_mode!="Cash") { ?>
			    <?php } else { ?>
			    	<?php if(isset($instalment->transaction_no)){ echo ", Transaction ID :".$instalment->transaction_no; } ?>
					<?php if(isset($instalment->transaction_no)){ echo ", Transaction Date :".$instalment->transaction_date; } ?>
			    <?php } ?>
			    <?php if($instalment->payment_mode=="Cheque" || $instalment->payment_mode=="DD") { ?>
				<?php if(isset($instalment->cheque_no)){ echo ", Cheque No :".$instalment->cheque_no; } ?>
				<?php if(isset($instalment->cheque_date)){ echo ", Cheque Date :".$instalment->cheque_date; } ?>
			    <?php } ?>
			    <?php if($instalment->payment_mode=="Cheque" || $instalment->payment_mode=="DD" || $instalment->payment_mode=="NEFT / IMPS") { ?>
			    <?php if(isset($instalment->bank_name)){ echo ", Bank Name :".$instalment->bank_name; } ?>
			    <?php } ?>
				</span></h4>
			<?php } ?>
			<?php if(!empty($next_reminder_installment->installment_date)) {?>
			<h4>Next Installment <br>Date :- <span><?php echo date('d-M-Y',strtotime($next_reminder_installment->installment_date)); ?></span><br>Amount :- <span><?php echo $next_reminder_installment->due_amount; ?></span></h4>
		<?php } ?>
		</div>
	</div> 
		</div>
		<div class="receipt-item"> 
			<?php if($receipt_permission->gr_id=="Yes") { ?>
			<h4>GR Id : <span><?php echo $admission->gr_id; ?></span></h4>
			<?php } ?>
			<?php if($receipt_permission->receipt_date=="Yes") { ?>
			<h4>Payment Date : <span><?php echo $today; ?></span></h4>
			<?php } ?>
			<?php if($receipt_permission->installment_no=="Yes") { ?>
			<h4><?php echo $receipttype; ?> : <span><?php echo $instalment->installment_no ?></span></h4>
			<?php } ?>  
		</div>
	</div> 
	
	<div class="invoice-note">
		<div>
			<h5 style="margin-bottom:8px;">T &amp; C</h5>
			<p>This Invoice Generated for educational services payment. <br><span>* Fess will be not refundable</span></p>
		</div>
		<div class="receipt-author">
			<p>Authorized By</p>
		</div>
	</div>					
</div>

<div class="invoice-wrapper" style="background-image: url('<?php echo base_url(); ?>/dist/assets/img/receipt-logo.png');background-size: 20%;background-repeat: no-repeat;background-position: center;    border-top: 3px dashed #d3d3d3;padding-top: 30px;"> 
	 
	<div style="display: flex; margin-bottom:15px; border-bottom: 1px solid #e4e4e4; padding-bottom: 10px;">
		<div class="invoice-company-logo">
			<?php if($receipt_permission->branch_title=="Yes") { ?>
			<h2><?php echo $branch_data->branch_title; ?></h2> 
			<?php } ?>
			<?php if($receipt_permission->address=="Yes") { ?>
			<p><?php echo $branch_data->branch_address; ?></p>
			<p><?php echo $branch_data->mobile_one; ?></p>
			<?php } ?>
			<?php if($receipt_permission->gst_no=="Yes") { ?>
          <div class="gst-content">
		<div class="gst-item">GST No: <span><?php echo $branch_data->gst_no; ?></span></div>
	</div>
    <?php } ?>      
		</div>
		<?php if($receipt_permission->logo=="Yes") { ?>
		<div class="invoice-other-company">
			<img src="http://demo.rnwmultimedia.com/dist/branchlogo/<?php echo $branch_data->branch_logo; ?>">
			<h4>Receipt No: <span><?php echo $receiptno; ?></span></h4>
		</div>	
	<?php } ?>
	</div>
	<div style="justify-content: center;display: flex;">
		<h3 style="margin: 0;">Receipt</h3> 
	</div>
	<div class="receipt-content">
		<div class="receipt-item">
			<?php if($receipt_permission->name=="Yes") { ?>
			<h4>Name : <span><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></span></h4>
			<?php } ?>
			<?php if($receipt_permission->course=="Yes") { ?>
			<h4>Course : <span> <?php if($admission->type=="single") { ?>
                    <?php $courseids = explode(",",$admission->course_id);
                foreach($list_course as $row) { if(in_array($row->course_id ,$courseids)) {  echo $row->course_name; }  } ?>
             <?php } else if($admission->type=="package") { ?>
                <?php $packageids = explode(",",$admission->package_id);
                foreach($list_package as $row) { if(in_array($row->package_id ,$packageids)) {  echo $row->package_name; }  } ?>
            <?php } else { 
				$clgcoids = explode(",",$admission->college_courses_id);
                foreach($list_clg_courses as $row) { if(in_array($row->college_courses_id ,$clgcoids)) {  echo $row->college_course_name; }  }
			 }?></span></h4> 
        	<?php } ?>
        	<?php if($receipt_permission->enrollment_no=="Yes") { ?>
			<h4>Enrollment No : <span><?php echo $admission->enrollment_number; ?></span></h4>
			<?php } ?> 
			<div class="course-detail">
		<table id="customers">
			<tbody>
				<?php if($receipt_permission->tuition_fees=="Yes") { ?>
				<tr>
					<td>Tuition Fees</td>
					<td>
					<?php if(isset($admission->tuation_fees)) { echo $admission->tuation_fees; } ?> 
					<?php if(isset($admission->college_tuition_fees)) { echo $admission->college_tuition_fees; } ?>
					</td>
				</tr>
			  <?php } ?>
				<?php if($receipt_permission->pay_now=="Yes") { ?>
				<tr>
					<td>Fees Paid</td>
					<td><?php echo $instalment->paid_amount; ?></td>
				</tr>
			   <?php } ?>
				<?php if($receipt_permission->receipt_type=="GST") { ?>
				<tr>
					<td>GST 18%</td>
					<td><?php echo (int)$taxamount ?></td>
				</tr>
				<?php } ?>
				<?php if($receipt_permission->total_pay=="Yes") { ?>
				<tr>
					<td><strong>Total</strong></td>
					<td><strong><?php echo $instalment->paid_amount; ?></strong></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<div class="remark-content">
			<?php if($receipt_permission->the_sum_of=="Yes") { ?>
			<h4>The Sum of : <span>
					<?php 
					$number =  $instalment->paid_amount;
					$no = floor($number);
					$point = round($number - $no, 2) * 100;
					$hundred = null;
					$digits_1 = strlen($no);
					$i = 0;
					$str = array();
					$words = array('0' => '', '1' => 'One', '2' => 'Two',
					'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
					'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
					'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
					'13' => 'Thirteen', '14' => 'Fourteen',
					'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
					'18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
					'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
					'60' => 'Sixty', '70' => 'Seventy',
					'80' => 'Eighty', '90' => 'Ninety');
					$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
					while ($i < $digits_1) {
					$divider = ($i == 2) ? 10 : 100;
					$number = floor($no % $divider);
					$no = floor($no / $divider);
					$i += ($divider == 10) ? 1 : 2;
					if ($number) {
						$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
						$hundred = ($counter == 1 && $str[0]) ? ' And ' : null;
						$str [] = ($number < 21) ? $words[$number] .
							" " . $digits[$counter] . $plural . " " . $hundred
							:
							$words[floor($number / 10) * 10]
							. " " . $words[$number % 10] . " "
							. $digits[$counter] . $plural . " " . $hundred;
					} else $str[] = null;
					}
					$str = array_reverse($str);
					$result = implode('', $str);
					$points = ($point) ?
					"." . $words[$point / 10] . " " . 
							$words[$point = $point % 10] : '';
					echo $result . $points;
				?>
				</span>
			</h4>
			<?php } ?>
			<?php if($receipt_permission->remarks=="Yes") { ?>
			<h4>Remarks : <span>
				<?php echo $instalment->payment_mode; ?>
				<?php if($instalment->payment_mode!="Cheque" || $instalment->payment_mode!="DD" || $instalment->payment_mode!="Cash") { ?>
			    <?php } else { ?>
			    	<?php if(isset($instalment->transaction_no)){ echo ", Transaction ID :".$instalment->transaction_no; } ?>
					<?php if(isset($instalment->transaction_no)){ echo ", Transaction Date :".$instalment->transaction_date; } ?>
			    <?php } ?>
			    <?php if($instalment->payment_mode=="Cheque" || $instalment->payment_mode=="DD") { ?>
				<?php if(isset($instalment->cheque_no)){ echo ", Cheque No :".$instalment->cheque_no; } ?>
				<?php if(isset($instalment->cheque_date)){ echo ", Cheque Date :".$instalment->cheque_date; } ?>
			    <?php } ?>
			    <?php if($instalment->payment_mode=="Cheque" || $instalment->payment_mode=="NEFT / IMPS") { ?>
			    <?php if(isset($instalment->bank_name)){ echo ", Bank Name :".$instalment->bank_name; } ?>
			    <?php } ?>
			</span></h4>
			<?php } ?>
			<?php if(!empty($next_reminder_installment->installment_date)) {?>
			<h4>Next Installment <br>Date :- <span><?php echo date('d-M-Y',strtotime($next_reminder_installment->installment_date)); ?></span><br>Amount :- <span><?php echo $next_reminder_installment->due_amount; ?></span></h4>
		<?php } ?>
		</div>
	</div>
		</div>
		<div class="receipt-item"> 
			<?php if($receipt_permission->gr_id=="Yes") { ?>
			<h4>GR Id : <span><?php echo $admission->gr_id; ?></span></h4>
			<?php } ?>
			<?php if($receipt_permission->receipt_date=="Yes") { ?>
			<h4>Payment Date : <span><?php echo $today; ?></span></h4>
			<?php } ?>
			<?php if($receipt_permission->installment_no=="Yes") { ?>
			<h4>Installment No : <span><?php echo $instalment->installment_no ?></span></h4>
			<?php } ?> 
		</div>
	</div> 
	
	
	<div class="invoice-note">
		<div>
			<h5 style="margin-bottom:8px;">T &amp; C</h5>
			<p>This Invoice Generated for educational services payment. <br><span>* Fess will be not refundable</span></p>
		</div>
		<div class="receipt-author">
			<p>Authorized By</p>
		</div>
	</div>					
	
</div>
 
</body>

</html>


 <script>
	
	function get_invoice()
	{
		var printButton = document.getElementById("printbtn");
	    printButton.style.display = "none";
		window.print();
	    printButton.style.display = "block";
		
	}

</script>