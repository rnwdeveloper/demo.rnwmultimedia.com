<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Invoice</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap');
.invoice-wrapper				{ padding: 15px; overflow: hidden;display:block;font-family: 'Nunito', sans-serif;width:793px;padding-bottom: 0;border: 1px solid #d3d3d3;font-size: 14px;} 
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
    margin: 15px 0 20px;width: 40%;
}
.invoice-note {
    display: flex;
    justify-content: space-between;
}
</style>
</head> 
<body> 
<div class="invoice-wrapper" style="margin-bottom:30px;background-image: url('<?php echo base_url(); ?>/dist/assets/img/receipt-logo.png');background-size: 20%;background-repeat: no-repeat;background-position: center;"> 
	<div style="text-align:center;"><button id="printbtn" class="btn btn-primary" onclick="return get_invoice()">Invoice</button></div>
	<div style="display: flex; margin-bottom:15px; border-bottom: 1px solid #e4e4e4; padding-bottom: 10px;">
		<div class="invoice-company-logo">
			<h2>Red & White Soft. Infotech</h2> 
			<p>4th Floor, BBC Complex, Opp. varachha bank, yogichowk, Punagam, Surat</p>
			<p>7202033359</p> 
		</div>
		<div class="invoice-other-company">
			<img src="<?php echo base_url(); ?>/dist/assets/img/rnw-logo-receipt.png">
			<h4>Receipt No: <span>RW1WT-10</span></h4>
		</div>	
	</div>
	<div style="justify-content: center;display: flex;">
		<h3 style="margin: 0;">Receipt</h3> 
	</div>
	<div class="receipt-content">
		<div class="receipt-item">
			<h4>Name : <span>RWn. Nency Kevadiya</span></h4>
			<h4>Course : <span>Diploma in Fashion Designing</span></h4> 
			<h4>Enrollment No : <span>RNW/Year 2--21/YCFD/90</span></h4> 
		</div>
		<div class="receipt-item"> 
			<h4>GR Id : <span>87YTRF</span></h4>
			<h4>Payment Date : <span>04/03/2021</span></h4>
			<h4>Installment : <span>114</span></h4> 
		</div>
	</div> 
	<div class="course-detail">
		<table id="customers">
			<tbody>
				<tr>
					<td>Tuition Fees</td>
					<td>35,000</td>
				</tr>
				<tr>
					<td>Fees Paid</td>
					<td>22,820</td>
				</tr>
				<tr>
					<td><strong>Total</strong></td>
					<td><strong>22,820</strong></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="remark-content">
		<h4>The Sum of : <span>TWENTY TWO THOUSAND EIGHT HUNDRED AND TWENTY</span></h4>
		<h4>Remarks : <span>By cheque No.: 839547, cheque :12 Mar 2021, Bank Name : IDBI BANK - paid</span></h4>
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
	<div style="text-align:center;"><button id="printbtn" class="btn btn-primary" onclick="return get_invoice()">Invoice</button></div>
	<div style="display: flex; margin-bottom:15px; border-bottom: 1px solid #e4e4e4; padding-bottom: 10px;">
		<div class="invoice-company-logo">
			<h2>Red & White Soft. Infotech</h2> 
			<p>4th Floor, BBC Complex, Opp. varachha bank, yogichowk, Punagam, Surat</p>
			<p>7202033359</p> 
		</div>
		<div class="invoice-other-company">
			<img src="<?php echo base_url(); ?>/dist/assets/img/rnw-logo-receipt.png">
			<h4>Receipt No: <span>RW1WT-10</span></h4>
		</div>	
	</div>
	<div style="justify-content: center;display: flex;">
		<h3 style="margin: 0;">Receipt</h3> 
	</div>
	<div class="receipt-content">
		<div class="receipt-item">
			<h4>Name : <span>RWn. Nency Kevadiya</span></h4>
			<h4>Course : <span>Diploma in Fashion Designing</span></h4> 
			<h4>Enrollment No : <span>RNW/Year 2--21/YCFD/90</span></h4> 
		</div>
		<div class="receipt-item"> 
			<h4>GR Id : <span>87YTRF</span></h4>
			<h4>Payment Date : <span>04/03/2021</span></h4>
			<h4>Installment : <span>114</span></h4> 
		</div>
	</div> 
	<div class="course-detail">
		<table id="customers">
			<tbody>
				<tr>
					<td>Tuition Fees</td>
					<td>35,000</td>
				</tr>
				<tr>
					<td>Fees Paid</td>
					<td>22,820</td>
				</tr>
				<tr>
					<td><strong>Total</strong></td>
					<td><strong>22,820</strong></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="remark-content">
		<h4>The Sum of : <span>TWENTY TWO THOUSAND EIGHT HUNDRED AND TWENTY</span></h4>
		<h4>Remarks : <span>By cheque No.: 839547, cheque :12 Mar 2021, Bank Name : IDBI BANK - paid</span></h4>
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