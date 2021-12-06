

<?php
if (isset($_POST['submit'])) {
    //next example will insert new conversation
    function test($i) {
        $service_url = 'https://erp.eduzilla.in/api/students/details';
        $curl = curl_init($service_url);
        $curl_post_data = array('GR_ID' => $i, 'Inst_code' => 'RNWEDU', 'Inst_security_code' => 'rnw',);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
        $curl_response = curl_exec($curl);
        if ($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($curl);
        $decoded[] = json_decode($curl_response);
        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
            die('error occured: ' . $decoded->response->errormessage);
        }
        return $decoded;
    }
    //database connection
    $servername = "localhost";
    $username = "rnwsoftt_mzfrxmujjb";
    $password = "nathikevo#@!2021";
    $db = "rnwsoftt_mzfrxmujjb";
    $con = mysqli_connect($servername, $username, $password, $db);
    //test
    $insert = mysqli_query($con, "insert into test_cron(`nme`) values('surat')") or die(mysqli_error($con));
    if ($insert) {
        echo "success";
    } else {
        echo "error";
    }
    $query = mysqli_query($con, "select * from eduzilladata order by ID desc limit 1") or die(mysqli_error($con));
    if ($query) {
        while ($res = mysqli_fetch_array($query)) {
            $last_gr_id = $res['GR_ID'] . "   ";
            echo "starting id ==><b></b> " . $next_gr_id = $last_gr_id + 1;
        }
        echo "<br> ending id ====>" . $end_id = $next_gr_id + 50;
        echo "<br>";
    }
    //end
    for ($i = $next_gr_id;$i <= $end_id;$i++) {
        $all[] = test($i);
    }
    $remark = array();
    $i = $next_gr_id;
    foreach ($all as $key => $value) {
        $z = 0;
        foreach ($value as $k => $v) {
            //print_r($v->data);
            foreach ($v->data as $m => $n) {
                // die;
                $re = "";
                if (!empty($n->remarks)) {
                    // echo "hii";
                    // die;
                    $join = array();
                    foreach ($n->remarks as $v2) {
                        // $data[$z] = $v2->remark;
                        //$z++;
                        $join = $v2->remark . "./*/" . $v2->remark_by;
                        $test[] = $join;
                    }
                    //$m = implode(',',$data);
                    $m = implode('/**/', $test);
                    $re = str_replace("'", "`", $m);
                }
                if ($n->image->content) {
                    $m = base64_decode($n->image->content);
                    $size = getImageSizeFromString($m);
                    if (empty($size['mime']) || strpos($size['mime'], 'image/') !== 0) {
                        die('Base64 value is not a valid image');
                    }
                    $ext = substr($size['mime'], 6);
                    if (!in_array($ext, ['png', 'gif', 'jpeg'])) {
                        die('Unsupported image type');
                    }
                    $img_file = "Eduzilla_image/" . $i . "_" . rand() . ".{$ext}";
                    $s = file_put_contents($img_file, $m);
                    $dd = $img_file;
                } else {
                    $dd = "rnw.jpg";
                }
                $address = $re = str_replace("'", "`", $n->address);
                $q = "INSERT INTO eduzilladata(GR_ID,admission_code,admission_status,fname,lname,email,mobile,father_name,father_mobile,address,course,course_package,admission_date,total_fees,paid_fees,branch_name,remarks,image) VALUES('$i','" . $n->admission_code . "','" . $n->admission_status . "','" . $n->fname . "','" . $n->lname . "','" . $n->email . "','" . $n->mobile . "','" . $n->father_name . "','" . $n->father_mobile . "','" . $address . "','" . $n->course . "','" . $n->course_package . "','" . $n->admission_date . "','" . $n->total_fees . "','" . $n->paid_fees . "','" . $n->branch_name . "','" . $re . "','" . $dd . "')";
                $q1 = mysqli_query($con, $q) or die(mysqli_error($con));
                if ($q1) {
                    //echo "Data Inserted SuccessFully<br...>";
                    
                }
            }
            //}
            
        }
        $i++;
    }
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


          
</head>
<body>
<form action="Eduzilla_api.php" method="post" accept-charset="utf-8">
	
	<div style="margin-top: 25px; float: right;">
		<input type="text" name="start">
	<input type="text" name="gr_id" >
	<input type="submit" name="submit" value="Search">
</div>
</form>
 
<?php
if (!empty($decoded)) {
?>

<<!-- table class="table table-hover">
	
	<thead>
		<tr>	
			<th>First Name</th>
			<th>Father Name</th>
			<th>Last Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Father Mobile No</th>
			<th>Course Package Name</th>		
			<th>Course</th>
			<th>Total Fees</th>
			<th>Paid Fees</th>
			<th>Branch Name</th>
			<th>Admission Date</th>
			<!-- <th>Remarks</th> -->
			
		</tr>
	</thead>
	<tbody> 
		<tr>
			<?php
    //foreach ($decoded->data as $idx => $data) {
    
?>
				<!-- <td><?php echo $data->fname; ?></td>
				<td><?php echo $data->father_name; ?></td>
				<td><?php echo $data->lname; ?></td>
				<td><?php echo $data->address; ?></td>
				<td><?php echo $data->email; ?></td>
				<td><?php echo $data->mobile; ?></td>
				<td><?php echo $data->father_mobile; ?></td>				
				<td><?php echo $data->course; ?></td>
				<td><?php echo $data->course_package; ?></td>
				<td><?php echo $data->total_fees; ?></td>
				<td><?php echo $data->paid_fees; ?></td>
				<td><?php echo $data->branch_name; ?></td>
				<td><?php echo $data->admission_date; ?></td>
		    <?php
} ?> -->
			
		</tr>
	</tbody>
</table>
<table  class="table table-hover">
	<tr>
		<!-- <th>Remark</th>
	</tr>
	<?php
foreach ($data->remarks as $idx => $remarks) {
?>
	<tr>
		<td><?php echo $remarks->remark; ?></td>
		<?php
}
?>
	</tr>
</table> -->

<?php
//}

?>

</body>
</html>