<!DOCTYPE html>

<html>

<head>



  <title>Admission Receipt</title>

</head>

<body>

  <?php date_default_timezone_set("Asia/Calcutta");

    $today = date('d-M-Y'); ?>

<div style="border-style: solid;">

  <table>

    <tr>

      <td>

        <img src="http://demo.rnwmultimedia.com/assets/images/receiptlogo.jpg" width="140"><br>

        <font size="2"><label style="margin-left: 10px;">DATE : </label></font><span style="font-size: 12px;"><?php echo $today; ?></span><br>

        <font size="2"><label style="margin-left: 10px;">REGISTER NO : </label></font><span style="font-size: 12px;"><?php echo $admission->admission_number; ?></span><br>



      </td>

    </tr>

  </table>



      

<div style="margin-left: 55%;margin-top: -12%;">

<table>

  <tr>

<td><font size="2"><label>COMPANY NAME : </label></font><span style="font-size: 12px;">Red & White</span><br>

<font size="2"><label>DEPARTMENT NAME : </label></font><span style="font-size: 12px;"><?php $depertids = explode(",",$admission->department_id);

        foreach($list_department as $row) { if(in_array($row->department_id,$depertids)) {  echo $row->department_name; }  } ?></span><br>

<font size="2"><label>SUBDEPARTMENT NAME : </label></font><span style="font-size: 12px;"><?php $subdepertids = explode(",",$admission->subdepartment_id);

        foreach($list_subdepartment as $row) { if(in_array($row->subdepartment_id ,$subdepertids)) {  echo $row->subdepartment_name; }  } ?></span><br>

<font size="2"><label>ADDRESS : </label></font><span style="font-size: 12px;"><?php echo $admission->permanent_address; ?></span><br>



<font size="2"><label>THE SUM OF : </label></font><span style="font-size: 12px;">

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

</td>

  </tr>

</table>

</div>

<br>

<hr>

<h3 style="margin-left: 37%">Fess Receipt</h3>

<div style="margin-left: 10px;">

  <table>

    <tr>

      <td><font size="2"><label>RECEIPT NO : </label></font><span style="font-size: 12px;"><?php echo $receiptno; ?></span><br>

      <font size="2"><label>GR ID : </label></font><span style="font-size: 12px;"><?php echo $admission->gr_id; ?></span><br>

      <font size="2"><label>INTSALLMENT No : </label></font><span></span><br>

      <font size="2"><label>NAME : </label></font><span style="font-size: 12px;"><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></span><br>

      <font size="2"><label>COURSE : </label></font><span style="font-size: 12px;">

        <?php if($admission->type=="single") { ?>

          <?php $courseids = explode(",",$admission->course_id);

        foreach($list_course as $row) { if(in_array($row->course_id ,$courseids)) {  echo $row->course_name; }  } ?>

      <?php } else { ?>

        <?php $packageids = explode(",",$admission->package_id);

        foreach($list_package as $row) { if(in_array($row->package_id ,$packageids)) {  echo $row->package_name; }  } ?>

      <?php } ?>

        </span><br>

      <font size="2"><label>PAY NOW : </label></font><span style="font-size: 12px;"><?php echo $instalment->paid_amount; ?></span><br>

      <font size="2"><label>REMARKS : </label></font><span style="font-size: 12px;"></span><br>

      <font size="2"><label>RECEIVED BY : </label></font><span style="font-size: 12px;"><?php echo $_SESSION['user_name']; ?></span><br></td>

    </tr>

  </table>

</div><br>

<div style="margin-left: 80%;">

     <font size="2"><span>Authorized By</span></font><br>

     <font size="2"><span></span></font><br>

</div>

</div>

<br>

<hr>

<br>

<div style="border-style: solid;">

  <table>

    <tr>

      <td>

        <img src="http://demo.rnwmultimedia.com/assets/images/receiptlogo.jpg" width="140"><br>

        <font size="2"><label style="margin-left: 12px;">DATE : </label><span><?php echo $today; ?></span><br>

        <font size="2"><label style="margin-left: 12px;">REGISTER NO : </label><span><?php echo $admission->admission_number; ?></span></font><br>



      </td>

    </tr>

  </table>



      

<div style="margin-left: 55%;margin-top: -21%;">

<table>

  <tr>

<td><font size="2"><label>COMPANY NAME : </label></font><span style="font-size: 12px;">Red & White</span><br>

<font size="2"><label>DEPARTMENT NAME : </label></font><span style="font-size: 12px;"><?php $depertids = explode(",",$admission->department_id);

        foreach($list_department as $row) { if(in_array($row->department_id,$depertids)) {  echo $row->department_name; }  } ?></span><br>

<font size="2"><label>SUBDEPARTMENT NAME : </label></font><span style="font-size: 12px;"><?php $subdepertids = explode(",",$admission->subdepartment_id);

        foreach($list_subdepartment as $row) { if(in_array($row->subdepartment_id ,$subdepertids)) {  echo $row->subdepartment_name; }  } ?></span><br>

<font size="2"><label>ADDRESS : </label></font><span style="font-size: 12px;"><?php echo $admission->permanent_address; ?></span><br>



<font size="2"><label>THE SUM OF : </label></font><span style="font-size: 12px;">

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

</td>

  </tr>

</table>

</div>

<br>

<hr>

<h3 style="margin-left: 37%">Fess Receipt</h3>



<div style="margin-left: 10px;">

<table>

    <tr>

      <td><font size="2"><label>RECEIPT NO : </label></font><span style="font-size: 12px;"><?php echo $receiptno; ?></span><br>

      <font size="2"><label>GR ID : </label></font><span style="font-size: 12px;"><?php echo $admission->gr_id; ?></span><br>

      <font size="2"><label>INTSALLMENT No : </label></font><span></span><br>

      <font size="2"><label>NAME : </label></font><span style="font-size: 12px;"><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></span><br>

      <font size="2"><label>COURSE : </label></font><span style="font-size: 12px;">

        <?php if($admission->type=="single") { ?>

          <?php $courseids = explode(",",$admission->course_id);

        foreach($list_course as $row) { if(in_array($row->course_id ,$courseids)) {  echo $row->course_name; }  } ?>

      <?php } else { ?>

        <?php $packageids = explode(",",$admission->package_id);

        foreach($list_package as $row) { if(in_array($row->package_id ,$packageids)) {  echo $row->package_name; }  } ?>

      <?php } ?>

        </span><br>

      <font size="2"><label>PAY NOW : </label></font><span style="font-size: 12px;"><?php echo $instalment->paid_amount; ?></span><br>

      <font size="2"><label>REMARKS : </label></font><span style="font-size: 12px;"></span><br>

      <font size="2"><label>RECEIVED BY : </label></font><span style="font-size: 12px;"><?php echo $_SESSION['user_name']; ?></span><br></td>

    </tr>

  </table>

</div><br>

<div style="margin-left: 80%;">

     <font size="2"><span>Authorized By</span></font><br>

     <font size="2"><span></span></font><br>

</div>

</div>

</body>

</html>