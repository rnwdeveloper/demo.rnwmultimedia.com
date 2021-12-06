<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Invoice</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap');
.invoice-wrapper				{ padding: 15px; overflow: hidden;display:block;font-family: 'Nunito', sans-serif;width:793px;padding-bottom: 0;border: 1px solid #d3d3d3;font-size: 14px;} 
.invoice-other-company img {
    width: 160px;
    margin-bottom: 10px;
}
.invoice-other-company { float: right;    text-align: center;}
.invoice-company-logo { float: left;}
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
    margin: 15px 0 20px;width: 40%;
}
.invoice-note, .remark-content {
    display: flex;
    justify-content: space-between;
}
.invoice-note {
    padding-top: 40px;
}
</style>
</head> 
<body> 
	<?php date_default_timezone_set("Asia/Calcutta");
        $today = date('d-M-Y'); ?>
<div class="invoice-wrapper" style="margin-bottom:30px;background-image: url('<?php echo base_url(); ?>/dist/assets/img/receipt-logo.png');background-size: 20%;background-repeat: no-repeat;background-position: center;"> 
	<div style="text-align:center;"><button id="printbtn" class="btn btn-primary" onclick="return get_invoice()">Invoice</button></div>
	<div style="overflow:hidden;margin-bottom:15px;border-bottom: 1px solid #e4e4e4;padding-bottom: 10px;">
		<div class="invoice-company-logo">
			<h2><?php echo $branch_data->branch_title; ?></h2> 
			<p><?php echo $branch_data->branch_address; ?></p>
			<p><?php echo $branch_data->mobile_one; ?></p> 
		</div>
		<div class="invoice-other-company">
			<img src="http://demo.rnwmultimedia.com/dist/branchlogo/<?php echo $branch_data->branch_logo; ?>">
			<h4>Receipt No: <span><?php echo $receiptno; ?></span></h4>
		</div>	
	</div>
	<div style="justify-content: center;display: flex;">
		<h3 style="margin: 0 0 15px 0;">Registration Receipt</h3> 
	</div>
	<div class="receipt-content">
		<div class="receipt-item"> 
			<h4>Course : <span><?php if($admission->type=="single") { ?>
                    <?php $courseids = explode(",",$admission->course_id);
                foreach($list_course as $row) { if(in_array($row->course_id ,$courseids)) {  echo $row->course_name; }  } ?>
            <?php } if($admission->type=="package") { ?>
                <?php $packageids = explode(",",$admission->package_id);
                foreach($list_package as $row) { if(in_array($row->package_id ,$packageids)) {  echo $row->package_name; }  } ?>
            <?php } else { 
				$clgcoids = explode(",",$admission->college_courses_id);
                foreach($list_clg_courses as $row) { if(in_array($row->college_courses_id ,$clgcoids)) {  echo $row->college_course_name; }  }
			 } ?>
            <?php } ?></span></h4>
			<h4>Center Name : <span><?php echo $branch_data->branch_name; ?></span></h4> 
			<h4>Cheque Holder Name : <span><?php echo $instalment->cheque_holder_name; ?></span></h4>
			<h4>Comments : <span>IF CHEQUE RETURN 500/- PENALTY</span></h4>
		</div>
		<div class="receipt-item">
			<h4>GR Id : <span><?php echo $admission->gr_id; ?></span></h4>
			<h4>Date : <span><?php echo $today; ?></span></h4>
			<h4>State Code : <span>5248</span></h4>
			<h4>SAC : <span></span></h4> 
		</div>
	</div> 
	<div class="chk-detail">
		<P>Received with thanks from <strong><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></strong> a sum of <strong><?php echo $instalment->due_amount; ?> (<?php 
			$number =  $instalment->due_amount;
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
           ?>)</strong> By Cheque against bill of supply __________ and invoice __________</P>
	</div>
	<div class="remark-content">
		<h4>Cheque No: <span><?php echo $instalment->cheque_no; ?></span></h4>
		<h4>Cheque Date : <span><?php echo $instalment->cheque_date; ?></span></h4>
		<h4>Bank Name : <span><?php echo $instalment->bank_name;  ?></span></h4>
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
<div class="invoice-wrapper" style="margin-bottom:30px;background-image: url('<?php echo base_url(); ?>/dist/assets/img/receipt-logo.png');background-size: 20%;background-repeat: no-repeat;background-position: center;"> 
	
	<div style="overflow:hidden;margin-bottom:15px;border-bottom: 1px solid #e4e4e4;padding-bottom: 10px;">
		<div class="invoice-company-logo">
			<h2><?php echo $branch_data->branch_title; ?></h2> 
			<p><?php echo $branch_data->branch_address; ?></p>
			<p><?php echo $branch_data->mobile_one; ?></p> 
		</div>
		<div class="invoice-other-company">
			<img src="http://demo.rnwmultimedia.com/dist/branchlogo/<?php echo $branch_data->branch_logo; ?>">
			<h4>Receipt No: <span><?php echo $receiptno; ?></span></h4>
		</div>	
	</div>
	<div style="justify-content: center;display: flex;">
		<h3 style="margin: 0 0 15px 0;">Registration Receipt</h3> 
	</div>
	<div class="receipt-content">
		<div class="receipt-item"> 
			<h4>Course : <span><?php if($admission->type=="single") { ?>
                    <?php $courseids = explode(",",$admission->course_id);
                foreach($list_course as $row) { if(in_array($row->course_id ,$courseids)) {  echo $row->course_name; }  } ?>
            <?php } else if($admission->type=="package") { ?>
                <?php $packageids = explode(",",$admission->package_id);
                foreach($list_package as $row) { if(in_array($row->package_id ,$packageids)) {  echo $row->package_name; }  } ?>
            <?php } else { 
				$clgcoids = explode(",",$admission->college_courses_id);
                foreach($list_clg_courses as $row) { if(in_array($row->college_courses_id ,$clgcoids)) {  echo $row->college_course_name; }  }
			 }?></span></h4>
			<h4>Center Name : <span><?php echo $branch_data->branch_name; ?></span></h4> 
			<h4>Cheque Holder Name : <span><?php echo $instalment->cheque_holder_name ?></span></h4>
			<h4>Comments : <span>IF CHEQUE RETURN 500/- PENALTY</span></h4>
		</div>
		<div class="receipt-item"> 
			<h4>GR Id : <span><?php echo $admission->gr_id; ?></span></h4>
			<h4>Date : <span><?php echo $today; ?></span></h4>
			<h4>State Code : <span>5248</span></h4>
			<h4>SAC : <span></span></h4> 
		</div>
	</div> 
	<div class="chk-detail">
			<P>Received with thanks from <strong><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></strong> a sum of <strong><?php echo $instalment->due_amount; ?> (			<?php 
			$number =  $instalment->due_amount;
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
           ?>)</strong> By Cheque against bill of supply __________ and invoice __________</P>
	</div>
	<div class="remark-content">
		<h4>Cheque No: <span><?php echo $instalment->cheque_no; ?></span></h4>
		<h4>Cheque Date : <span><?php echo $instalment->cheque_date; ?></span></h4>
		<h4>Bank Name : <span><?php echo $instalment->bank_name;  ?></span></h4>
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