<!DOCTYPE html>

<html>

<head>



	<title>Admission Receipt GST</title>

</head>

<body>

<?php date_default_timezone_set("Asia/Calcutta");

	$today = date('d-M-Y'); 

	 // total pay mathi avto tax

    $pay = $instalment->paid_amount;

   
    	if($admission->branch_id==$permission_branch_wise->branch_id) 
	      {
	      	foreach($all_daynamic_record_gst as $data) { if($data->label_name=="GST") {
	      	
	    	$gstpercentage = $data->gst_modual_name;
	      	} }
	      }

    $percentage = "%";
   	
   	$gst = $gstpercentage.$percentage;

    $b = "100";

    $a = $b+$gst;

    $p = $pay*$gst;

    // amount finde out

    $taxamount = $p/$a;

   //tax lagavya pela ni  course pay amount  

    $amount = $pay-$taxamount;

   // final gst tax

   $finalgst = $amount*$gst;

   $totalfinalgst = $finalgst/$b;

  // net payable amount 

   $netpayableamountwithgst = $amount+$totalfinalgst;

  // total fess and gst bad

   $gstbadammount = $pay-$taxamount;


    ?>

<div style="border-style: solid;">

	<table>
		<tr>
				<?php if ($admission->branch_id==$permission_branch_wise->branch_id) { ?>
			<td>		
			  <div style="background: white;padding: 12px;border-radius: 4px;">
			   <img src="http://demo.rnwmultimedia.com/assets/images/rnwGSTreceipt_logo.png" width="220">
			  </div>
			</td>
		<?php } ?>
		</tr>
		
	</table>

			
<div style="margin-left: 55%;margin-top: -8%;">

<table>

	<tr>

<td>
<font size="3"><label>Red & White Multimedia Education</label></font><br>

<font size="2"><label><?php $branchids = explode(",",$admission->branch_id);

				foreach($list_branch as $row) { if(in_array($row->branch_id,$branchids)) {  echo $row->branch_code; }  } ?></span></label></font><br>

<font size="1"><span style="color: #FFA500">One Step In Chnaging Education Chain..</span></font><br>
<font size="2"><span>
	<?php if ($admission->branch_id==$permission_branch_wise->branch_id) { ?>
			<?php echo $permission_branch_wise->branch_address; ?>
		<?php  }?>
</span></font>
</td>
</tr>
</table>
</div>

<hr>
<div style="margin-left: 12px;">
	<?php if($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->receipt_no=="yes") { ?>
<font size="2"><label>RECEIPT NO : </label></font><span style="font-size: 12px;"><?php  echo $receiptno; ?></span>
<?php } ?>


 <label style="margin-left: 20%;font-size: 20px;">Receipt</label>

<?php if($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->receipt_date=="yes") { ?>
 <span style="margin-left: 25%">DATE : <span style="font-size: 12px;"><?php echo $today; ?></span></span>
 <?php } ?>

</div>
<div style="margin-left: 10px;">

	<table>

		<tr>

			<td>
			<?php if($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->gr_id=="yes") { ?>
			<label><font size="2">GR ID : </label></font><span style="font-size: 12px;"><?php echo $admission->gr_id; ?></span><br>
			<?php } ?>
			
			<?php if($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->name=="yes") { ?>
			<label><font size="2">NAME : </label></font><span style="font-size: 12px;"><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></span><br>
			<?php } ?>
			
			<label><font size="2">COURSE : </label></font><span style="font-size: 12px;">
			
				<?php if($admission->type=="single") { ?>

			<?php if ($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->course=="yes") { ?>

					<?php $courseids = explode(",",$admission->course_id);

				foreach($list_course as $row) { if(in_array($row->course_id ,$courseids)) {  echo $row->course_name; }  } ?>

			<?php } } else { ?>

			<?php if ($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->package=="yes") { ?>
				<?php $packageids = explode(",",$admission->package_id);

				foreach($list_package as $row) { if(in_array($row->package_id ,$packageids)) {  echo $row->package_name; }  } ?>

		<?php } } ?>
				</span>
		</tr>

	</table><br>

	<div style="margin-left: 36%;">
				<table style="border:1px solid black;border-collapse:collapse;">
					<tr>
						<th style="border:1px solid;background-color: powderblue;">Particular</th>
						<th style="border:1px solid;background-color: powderblue;">Amount</th>
					</tr>
					<tr>
						<td  style="border:1px solid;"><font size="2">Course Fees</font></td>
						<td  style="border:1px solid;text-align: center;"><font size="2"><?php echo $instalment->paid_amount; ?></font></td>
					</tr>
					<tr>
						<td  style="border:1px solid;"><font size="2">Total Previous Paid</font></td>
						<td  style="border:1px solid;text-align: center;"><font size="2">0</font></td>
					</tr>
					<tr>
						<td  style="border:1px solid;"><font size="2">Fees Amount</font></td>
						<td  style="border:1px solid;text-align: center;"><?php echo (int)$gstbadammount; ?><font size="2"></font></td>
					</tr>
					<tr>
						<td  style="border:1px solid;"><font size="2">Total Fees Due</font></td>
						<td  style="border:1px solid;text-align: center;"><font size="2">0</font></td>
					</tr>
					<tr>
						<td style="border:1px solid;"><font size="2">GST @ 18%</font></td>
						<td style="border:1px solid;text-align: center;"><font size="2"><?php echo (int)$taxamount; ?></font></td>
				
					</tr>
					<tr>
						<td style="border:1px solid;"><font size="2">Total Amount</font></td>
						<td style="border:1px solid;text-align: center;"><font size="2"><?php echo $instalment->paid_amount; ?></font></td>
				
					</tr>
				</table>
			</div>

			<table>

		<tr>

			<td>
			<?php if ($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->the_sum_of=="yes") { ?>
			<label><font size="2">THE SUM OF : </font></label><span style="font-size: 12px;">
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
			</span><br>
			<?php } ?>

			<label><font size="2">GSTIN : </font></label><span style="font-size: 12px;">
		    <?php  if ($admission->branch_id==$permission_branch_wise->branch_id) { ?>
		    	<?php foreach($all_daynamic_record_gst as $data) { if($data->label_name=="GSTNO") { ?>
			<?php echo $data->gst_modual_name; ?>
		   <?php } } }?>
			</span><br>
			<label><font size="2">PAYMENT DATE : </font></label><span style="font-size: 12px;"><?php echo $today; ?></span>
			</td>
		</tr>

	</table>

</div>

<div style="margin-left: 80%;">

     <font size="2"><span>Authorized By</span></font><br>

     <font size="2"><span></span></font><br>

</div>
</div>
<hr>

<div style="border-style: solid;">

	<table>
		<tr>
			<td>		
			  <div style="background: white;padding: 12px;border-radius: 4px;">
			   <img src="http://demo.rnwmultimedia.com/assets/images/rnwGSTreceipt_logo.png" width="220">
			  </div>
			</td>
		</tr>
		
	</table>

			
<div style="margin-left: 55%;margin-top: -13%;">

<table>

	<tr>

<td>
<font size="3"><label>Red & White Multimedia Education</label></font><br>

<font size="2"><label><?php $branchids = explode(",",$admission->branch_id);

				foreach($list_branch as $row) { if(in_array($row->branch_id,$branchids)) {  echo $row->branch_code; }  } ?></span></label></font><br>

<font size="1"><span style="color: #FFA500">One Step In Chnaging Education Chain..</span></font><br>
<font size="2"><span>
	<?php if ($admission->branch_id==$permission_branch_wise->branch_id) { ?>
			<?php echo $permission_branch_wise->branch_address; ?>
		<?php } ?>
</span></font>
</td>
</tr>
</table>
</div>

<hr>
<div style="margin-left: 12px;">
	
<font size="2"><label>RECEIPT NO : </label></font><span style="font-size: 12px;"><?php echo $receiptno; ?></span>

 <label style="margin-left: 20%;font-size: 20px;">Receipt</label>


 <span style="margin-left: 25%">DATE : <span style="font-size: 12px;"><?php echo $today; ?></span></span>

</div>


<div style="margin-left: 10px;">

	<table>

		<tr>

			<td>
			<?php if ($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->gr_id=="yes") { ?>
			<label><font size="2">GR ID : </label></font><span style="font-size: 12px;"><?php echo $admission->gr_id; ?></span><br>
			<?php } ?>
			
			<?php if ($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->name=="yes") { ?>
			<label><font size="2">NAME : </label></font><span style="font-size: 12px;"><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></span><br>
		    <?php } ?>
			
			<label><font size="2">COURSE : </label></font><span style="font-size: 12px;">

				<?php if($admission->type=="single") { ?>

						<?php if($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->course=="yes") { ?>

					<?php $courseids = explode(",",$admission->course_id);

				foreach($list_course as $row) { if(in_array($row->course_id ,$courseids)) {  echo $row->course_name; }  } ?>
					
			<?php } } else { ?>

					
					<?php if($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->package=="yes") { ?>

				<?php $packageids = explode(",",$admission->package_id);

				foreach($list_package as $row) { if(in_array($row->package_id ,$packageids)) {  echo $row->package_name; }  } ?>

			<?php } } ?>

				</span>
		</tr>

	</table><br>

	<div style="margin-left: 36%;">
				<table style="border:1px solid black;border-collapse:collapse;">
					<tr>
						<th style="border:1px solid;background-color: powderblue;">Particular</th>
						<th style="border:1px solid;background-color: powderblue;">Amount</th>
					</tr>
					<tr>
						<td  style="border:1px solid;"><font size="2">Course Fees</font></td>
						<td  style="border:1px solid;text-align: center;"><font size="2"><?php echo $instalment->paid_amount; ?></font></td>
					</tr>
					<tr>
						<td  style="border:1px solid;"><font size="2">Total Previous Paid</font></td>
						<td  style="border:1px solid;text-align: center;"><font size="2">0</font></td>
					</tr>
					<tr>
						<td  style="border:1px solid;"><font size="2">Fees Amount</font></td>
						<td  style="border:1px solid;text-align: center;"><?php echo (int)$gstbadammount; ?><font size="2"></font></td>
					</tr>
					<tr>
						<td  style="border:1px solid;"><font size="2">Total Fees Due</font></td>
						<td  style="border:1px solid;text-align: center;"><font size="2">0</font></td>
					</tr>
					<tr>
						<td style="border:1px solid;"><font size="2">GST @ 18%</font></td>
						<td style="border:1px solid;text-align: center;"><font size="2"><?php echo (int)$taxamount; ?></font></td>
				
					</tr>
					<tr>
						<td style="border:1px solid;"><font size="2">Total Amount</font></td>
						<td style="border:1px solid;text-align: center;"><font size="2"><?php echo $instalment->paid_amount; ?></font></td>
				
					</tr>
				</table>
			</div>

			<table>

		<tr>

			<td>
				<?php if ($admission->branch_id==$permission_branch_wise->branch_id || $permission_branch_wise->the_sum_of=="yes") { ?>
			<label><font size="2">THE SUM OF : </font></label><span style="font-size: 12px;">
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

			</span><br>
			<?php } ?>
		

			<label><font size="2">GSTIN : </font></label><span style="font-size: 12px;">
				<?php  if ($admission->branch_id==$permission_branch_wise->branch_id) { ?>
					<?php foreach($all_daynamic_record_gst as $data) { if($data->label_name=="GSTNO") { ?>
			<?php echo $data->gst_modual_name; ?>
		<?php } } } ?>	
			</span><br>
			<label><font size="2">PAYMENT DATE : </font></label><span style="font-size: 12px;"><?php echo $today; ?></span>
		</tr>

	</table>

</div>

<div style="margin-left: 80%;">

     <font size="2"><span>Authorized By</span></font><br>

     <font size="2"><span></span></font><br>

</div>


