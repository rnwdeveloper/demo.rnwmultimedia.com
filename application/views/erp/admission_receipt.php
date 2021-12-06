<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
     <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url(); ?>assets/images/main_header_logo.png'/>
</head>
<body>
    <?php date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y'); ?>
<div style="border-style: solid;">
    <table>
        <tr>
            <td>
                <span style="margin-left: 10px;font-size: 20px;">Red & White Education Trust</span><br><br>
                 
                 <span style="margin-left: 10px;font-size: 14px;"><?php $branchids = explode(",",$admission->branch_id);
                  foreach($list_branch as $val) { if(in_array($val->branch_id,$branchids)) { echo $val->branch_address; } } ?></span> <br>
                  <span style="margin-left: 10px;font-size: 14px;"><?php $branchids = explode(",",$admission->branch_id);
                  foreach($list_branch as $val) { if(in_array($val->branch_id,$branchids)) { echo $val->mobile_one; } } ?></span> 

            </td>

        </tr>
    </table>

            
<div style="margin-left: 85%;margin-top: -13%;">
<table>
    <tr>
<td>
  <img src="http://demo.rnwmultimedia.com/dist/branchlogo/1614429938rw-01.png" width="80">
</td>
    </tr>
</table>
</div>

<hr>
<h3 style="margin-left: 40%">Fess Receipt</h3>
<div style="margin-left: 10px;">
    <table>
        <tr>
            <td><label style="font-size: 14px;">RECEIPT NO : </label><span style="font-size: 12px;"><?php echo $receiptno; ?></span><br>
            <label style="font-size: 14px;">Date : </label><span style="font-size: 12px;"><?php echo $today; ?></span><br>
            <label style="font-size: 14px;">GR ID : </label><span style="font-size: 12px;"><?php echo $admission->gr_id; ?></span><br>
            <label style="font-size: 14px;">INTSALLMENT No : <span style="font-size: 12px;">1</span></label><br>
            <label style="font-size: 14px;">NAME : </label><span style="font-size: 12px;"><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></span><br>
            <label style="font-size: 14px;">COURSE : </label><span style="font-size: 12px;">
                <?php if($admission->type=="single") { ?>
                    <?php $courseids = explode(",",$admission->course_id);
                foreach($list_course as $row) { if(in_array($row->course_id ,$courseids)) {  echo $row->course_name; }  } ?>
            <?php } else { ?>
                <?php $packageids = explode(",",$admission->package_id);
                foreach($list_package as $row) { if(in_array($row->package_id ,$packageids)) {  echo $row->package_name; }  } ?>
            <?php } ?>
                </span><br>
            <label style="font-size: 14px;">PAY NOW : </label><span style="font-size: 12px;"><?php echo $instalment->paid_amount; ?></span><br>
            <label style="font-size: 14px;">THE SUM OF : </label><span style="font-size: 12px;"><?php
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
           ?> </span><br>
            <label style="font-size: 14px;">REMARKS : </label><span style="font-size: 12px;">Cash-Paid</span><br>
            <label style="font-size: 14px;">RECEIVED BY : </label><span style="font-size: 12px;"><?php echo $_SESSION['user_name']; ?></span><br></td>
        </tr>
    </table>
</div><br>
<div style="margin-left: 10px;">
     <label style="font-size: 14px">T & C</label><br>
    <span style="font-size: 12px;">This invioce genrated for educatonal services payment.</span><br>
    <span style="font-size: 12px;">* Fees will be not refundable</span>
</div>
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
                <span style="margin-left: 10px;font-size: 20px;">Red & White Education Trust</span><br><br>
                 <span style="margin-left: 10px;font-size: 14px;"><?php $branchids = explode(",",$admission->branch_id);
                  foreach($list_branch as $val) { if(in_array($val->branch_id,$branchids)) { echo $val->branch_address; } } ?></span> <br>
                  <span style="margin-left: 10px;font-size: 14px;"><?php $branchids = explode(",",$admission->branch_id);
                  foreach($list_branch as $val) { if(in_array($val->branch_id,$branchids)) { echo $val->mobile_one; } } ?></span> 
            </td>
        </tr>
    </table>

            
<div style="margin-left: 85%;margin-top: -24%;">
<table>
    <tr>
<td>
   <img src="http://demo.rnwmultimedia.com/dist/branchlogo/1614429938rw-01.png" width="80">
</td>               
</td>
    </tr>
</table>
</div>
<hr>
<h3 style="margin-left: 40%">Fess Receipt</h3>

<div style="margin-left: 10px;">
    <table>
        <tr>
            <td><label style="font-size: 14px;">RECEIPT NO : </label><span style="font-size: 12px;"><?php echo $receiptno; ?></span><br>
            <label style="font-size: 14px;">Date : </label><span style="font-size: 12px;"><?php echo $today; ?></span><br>
            <label style="font-size: 14px;">GR ID : </label><span style="font-size: 12px;"><?php echo $admission->gr_id; ?></span><br>
            <label style="font-size: 14px;">INTSALLMENT No : </label><span style="font-size: 12px;">1</span><br>
            <label style="font-size: 14px;">NAME : </label><span style="font-size: 12px;"><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></span><br>
            <label style="font-size: 14px;">COURSE : </label><span style="font-size: 12px;">
                <?php if($admission->type=="single") { ?>
                    <?php $courseids = explode(",",$admission->course_id);
                foreach($list_course as $row) { if(in_array($row->course_id ,$courseids)) {  echo $row->course_name; }  } ?>
            <?php } else { ?>
                <?php $packageids = explode(",",$admission->package_id);
                foreach($list_package as $row) { if(in_array($row->package_id ,$packageids)) {  echo $row->package_name; }  } ?>
            <?php } ?>
                </span><br>
            <label style="font-size: 14px;">PAY NOW : </label><span style="font-size: 12px;"><?php echo $instalment->paid_amount; ?></span><br>
            <label style="font-size: 14px;">THE SUM OF : </label><span style="font-size: 12px;"><?php
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
           ?> </span><br>
            <label style="font-size: 14px;">REMARKS : </label><span style="font-size: 12px;">Cash-Paid</span><br>
            <label style="font-size: 14px;">RECEIVED BY : </label><span style="font-size: 12px;"><?php echo $_SESSION['user_name']; ?></span></td>
        </tr>
    </table>
</div><br>
<div style="margin-left: 10px;">
   <label style="font-size: 14px">T & C</label><br>
  <span style="font-size: 12px;">This invioce genrated for educatonal services payment.</span><br>
  <span style="font-size: 12px;">* Fees will be not refundable</span>
</div>
<div style="margin-left: 80%;">
     <font size="2"><span>Authorized By</span></font><br>
     <font size="2"><span></span></font><br>
</div>
</div>
</body>
</html>