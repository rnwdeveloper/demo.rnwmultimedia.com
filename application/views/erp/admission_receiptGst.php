<!DOCTYPE html>
<html>
   <head>
      <title>Admission Receipt GST</title>
   </head>
   <body>
      <?php date_default_timezone_set("Asia/Calcutta");
         $today = date('m/d/Y'); ?>
      <div style="border: 1px solid red; border-radius: 12px;">
         <table>
            <tr>
               <td>
                  <div style="background: white;padding: 12px;border-radius: 4px;">
                     <img src="http://demo.rnwmultimedia.com/assets/images/rnwGSTreceipt_logo.png" width="220">
                  </div>
               </td>
            </tr>
         </table>
         <div style="margin-left: 55%;margin-top: -8%;">
            <table>
               <tr>
                  <td>
                    <span style="font-size: 16px;">Red & White Multimedia Education</span><br>
                     <span  style="font-size: 14px;"><?php $branchids = explode(",",$admission->branch_id);
                        foreach($list_branch as $row) { if(in_array($row->branch_id,$branchids)) {  echo $row->branch_name; }  } ?></span><br>
                       <span style="color: #FFA500;font-size: 10px;">One Step In Chnaging Education Chain..</span></font><br>
                       <span style="font-size: 14px;"><?php $branchids = explode(",",$admission->branch_id);
                        foreach($list_branch as $row) { if(in_array($row->branch_id,$branchids)) {  echo $row->branch_address; }  } ?></span>
                  </td>
               </tr>
            </table>
         </div>
           </div>
           <div style="border: 1px solid red; border-radius: 10px;margin-top: 5px;">
         <div style="margin-left: 40%;">
            <table>
               <tr><th style="font-size: 18px;">Fees Receipt</th></tr>
            </table>
         </div>
       </div>

       
           <div style="border: 1px solid red; border-radius: 12px;margin-top: 5px;">
             <table>
               <tr>
                  <td>
                     <label style="font-size: 14px;margin-left: 10px;">RECEIPT NO : </label><span style="font-size: 12px;"><?php echo $receiptno; ?></span><br>
                     <label style="font-size: 14px;margin-left: 10px;">Date : </label><span style="font-size: 12px;"><?php echo $today; ?></span><br>
                     <label style="font-size: 14px;margin-left: 10px;">NAME : </label><span style="font-size: 12px;"><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></span><br>
                     <label style="font-size: 14px;margin-left: 10px;">COURSE : </label><span style="font-size: 12px;">
                     <?php if($admission->type=="single") { ?>
                     <?php $courseids = explode(",",$admission->course_id);
                        foreach($list_course as $row) { if(in_array($row->course_id ,$courseids)) {  echo $row->course_name; }  } ?>
                     <?php } else { ?>
                     <?php $packageids = explode(",",$admission->package_id);
                        foreach($list_package as $row) { if(in_array($row->package_id ,$packageids)) {  echo $row->package_name; }  } ?>
                     <?php } ?>
                     </span><br>
                     <label style="font-size: 14px;margin-left: 10px;">PAY NOW : </label><span style="font-size: 12px;"><?php echo $instalment->paid_amount; ?></span><br>
                     <label style="font-size: 14px;margin-left: 10px;">THE SUM OF : </label><span style="font-size: 12px;"><?php
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
                     <label style="font-size: 14px;margin-left: 10px;">REMARKS : </label><span style="font-size: 12px;"></span><br>
                     <label style="font-size: 14px;margin-left: 10px;">RECEIVED BY : </label><span style="font-size: 12px;"><?php echo $_SESSION['user_name']; ?></span><br></font>
                  </td>
               </tr>
            </table>
          </div>
        
        <!--  <div style="margin-left: 80%;">
            <font size="2"><span>Authorized By</span></font><br>
            <font size="2"><span></span></font><br>
         </div> -->
     
      <br>
      <hr>
      <br>
   </body>
</html>