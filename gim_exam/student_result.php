<?php

ob_start();
 include('config.php');
 $grid = $_SESSION["grId"];

 if(empty($grid)) {
	 header("location:index.php");
 }
 
			
	$sq = "SELECT * FROM gim_students WHERE grid=$grid";
    $res = mysqli_query($conn, $sq);
    $row = mysqli_fetch_assoc($res);
    $s_id = $row['schedule_id'];
	$sq_piq = "SELECT * FROM gim_piq WHERE grid=$grid AND schedule_id='$s_id'";
	$mq = "SELECT * FROM gim_marks WHERE grid=$grid AND schedule_id='$s_id'";
	$st = "SELECT * FROM gim_sub_time WHERE grid=$grid AND schedule_id='$s_id'";
	$cq = "SELECT * FROM gim_credit";
	$google_classroom_query = "SELECT * FROM gim_students WHERE grid=$grid";


	$res_piq = mysqli_query($conn, $sq_piq);
	$res2 = mysqli_query($conn, $mq);
	$res3 = mysqli_query($conn, $cq);
	$res4 = mysqli_query($conn, $st);
	$gc_res = mysqli_query($conn, $google_classroom_query);
	
	
	$row_piq = mysqli_fetch_assoc($res_piq);
	$row2 = mysqli_fetch_array($res2);
	$row4 = mysqli_fetch_array($res4);
	$gc_row = mysqli_fetch_array($gc_res);       
	
	
	
	
	
	
	$ans = explode("#",$row_piq['ans']);

	while($row3 = mysqli_fetch_array($res3)){
		$subject = $row3['subject'];

		$credit_psd = $row3['psd'];
		$credit_psd_g = $row3['psd_g'];
		$credit_animate = $row3['animate'];
		$credit_c_lang = $row3['c_lang'];
		$credit_drawing = $row3['drawing'];
		$credit_logic = $row3['logic'];

		$psd_marks = @$row2['psd'];
		$psd_g_marks = @$row2['psd_g'];
		$animate_marks = @$row2['animate'];
		$c_lang_marks = @$row2['c_lang'];
		$drawing_marks = @$row2['drawing'];
		$logic_marks = @$row2['logic'];

		$psd_per = $psd_marks * ($credit_psd*10)/30;
		$psd_g_per = $psd_g_marks * ($credit_psd_g*10)/30;
		$animate_per = $animate_marks * ($credit_animate*10)/30;
		$c_lang_per = $c_lang_marks * ($credit_c_lang*10)/30;
		$drawing_per = $drawing_marks * ($credit_drawing*10)/50;
		$logic_per = $logic_marks * ($credit_logic*10)/30;
		// $psd_per = ($credit_psd * $psd_marks) / 10;
		// $psd_g_per = ($credit_psd_g * $psd_g_marks) / 10;
		// $animate_per = ($credit_animate * $animate_marks) / 10;
		// $c_lang_per = ($credit_c_lang * $c_lang_marks) / 10;
		// $drawing_per = ($credit_drawing * $drawing_marks) / 10;
		// $logic_per = ($credit_logic * $logic_marks) / 10;

		$toal_per = $psd_per + $animate_per + $c_lang_per + $drawing_per + $logic_per + $psd_g_per;

		$final_result[$subject] = array(
			"psd"=>number_format($psd_per, 2) . " / " . $credit_psd*10,
			"psd_g"=>number_format($psd_g_per, 2) . " / " . $credit_psd_g*10,
			"animate"=>number_format($animate_per, 2) . " / " . $credit_animate*10,
			"c_lang"=>number_format($c_lang_per, 2) . " / " . $credit_c_lang*10,
			"drawing"=>number_format($drawing_per, 2) . " / " . $credit_drawing*10,
			"logic"=>number_format($logic_per, 2) . " / " . $credit_logic*10,
			"total_per"=>number_format($toal_per, 2)
		);

		$tot[] = number_format($toal_per, 2);

	}

	// echo "<pre>";
	// arsort($final_result[]['total_per']);


	asort($tot);

	$keys = array_column($final_result, 'total_per');

	array_multisort($keys, SORT_DESC, $final_result);

	// print_r($final_result);
	$c = 0;
	$cou = array();
	foreach($final_result as $k=>$dt){

		if($c<10)
		{
			$cou[] = $k;

		}

		$c++;
	}
	if($ans[7]==1){
		$first =  "Game Designing";
	} else if($ans[7]==2) {
		$first =  "Front-end Design";
	} else if($ans[7]==3) {
		$first =  "Graphics";
	} else if($ans[7]==4) {
		$first =  "Animation";
	} else if($ans[7]==5) {
		$first =  "Android Development";
	} else if($ans[7]==6) {
		$first =  "IOS Development";
	} else if($ans[7]==7) {
		$first =  "Back-end Developing";
	} else if($ans[7]==8) {
		$first =  "Game Development";
	} else if($ans[7]==9) {
		$first =  "Front-end Development";
	} else if($ans[7]==10) {
		$first =  "Flutter Development";
	}
	
	if($ans[22]==1){
		$second =  "Game Designing";
	} else if($ans[22]==2) {
		$second =  "Front-end Design";
	} else if($ans[22]==3) {
		$second =  "Graphics";
	} else if($ans[22]==4) {
		$second =  "Animation";
	} else if($ans[22]==5) {
		$second =  "Android Development";
	} else if($ans[22]==6) {
		$second =  "IOS Development";
	} else if($ans[22]==7) {
		$second =  "Back-end Developing";
	} else if($ans[22]==8) {
		$second =  "Game Development";
	} else if($ans[22]==9) {
		$second =  "Front-end Development";
	} else if($ans[22]==10) {
		$second =  "Flutter Development";
	}

function find_record($gr_id, $code, $security_code)
{
		//next example will insert new conversation
$service_url = 'https://erp.eduzilla.in/api/students/details';
$curl = curl_init($service_url);
$curl_post_data = array(
        'GR_ID' => $gr_id,
        'Inst_code' => $code,
        'Inst_security_code' => $security_code,        
);
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
$decoded = json_decode($curl_response);
// $tempp = json_encode($decoded);
// echo "<pre>";
// echo "</pre>";
// echo $decoded;
// print_r($temp);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}



return $decoded;


}

$code = "RNWEDU";
					 // $security_code = $res['security_code']; 
$security_code ="rnw"; 
$all=find_record($grid, $code, $security_code);

$branch_select = "RW";
foreach ($all->data as  $n) {
    // if($n->admission_code == $admission_code)
    // {

    
            //for remarks
        $test=array();
        foreach ($n->remarks as  $v2) {
            
                      $join=$v2->remark."./*/".$v2->remark_by;
                   $test[]=$join;
        }

        $m= implode('/**/', $test);
         $remarkk =  str_replace("'", "`",$m);

         //for image
           $address=$re =  str_replace("'", "`",$n->address);

        //    echo $n->fname;


        //  $update=mysqli_query($con,"update eduzilladata set  admission_status='$n->admission_status' , fname='$n->fname',lname='$n->lname',email='$n->email',mobile='$n->mobile',father_name='$n->father_name',father_mobile='$n->father_mobile',address='$address',course='$n->course',course_package='$n->course_package',admission_date='$n->admission_date',total_fees='$n->total_fees',paid_fees='$n->paid_fees',branch_name='$n->branch_name',remarks='$remarkk' where admission_code='$n->admission_code'") or die(mysqli_error($con));

         
         //$insert=mysqli_query($con,"insert into test_cron(`nme`) values('$gr_id')") or die(mysqli_error($con));


            
    // }

}

	
		

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GIM Exam Result</title>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>
    <main>
        <div class="container text-center">
            <a href="#">
                <img src="assets/images/rnw_red.png" height="60" alt="Red & White Groupd of Institutes"
                    title="Red & White Groupd of Institutes" />
            </a>
            <hr />
            <h1 class="text-center blue">Result of GIM Board of Examination - 2021</h1>
        </div>
        <div class="container student-details">
            <div class="row justify-between">
                <ul class="details align-self-center order1">
                    <li>
                        <span>Name :</span><span><?php echo $n->fname." ".$n->father_name?></span>
                    </li>
                    <li>
                        <span>GRID :</span><span><?php echo $grid; ?></span>
                    </li>
                    <li>
                        <span>Seat No :</span><span><?php 
                        
                        foreach ($all->data as  $n) {
                                if($n->branch_name[0] == 'R') {
                                    echo $n->branch_name[0].$n->branch_name[1].$n->branch_name[2];
                                    break;
                                }                        
                        
                        }
                        
                        
                        echo $grid ?></span>
                    </li>
                    <li>
                        <span>Branch :</span><span><?php 
                        
                        foreach ($all->data as  $n) {
                                if($n->branch_name[0] != '') {
                                    echo $n->branch_name.", ";
                                    
                                }                        
                        
                        }?></span>
                    </li>
                    <li>
                        <span>Exam Date :</span><span><?php 
				$que255 = "SELECT * FROM gim_students WHERE `grid`='$grid'";


				$res255 = mysqli_query($conn, $que255);
				$row255 = mysqli_fetch_array($res255);
				
				$iid = $row255[12];
				$sche = "SELECT * FROM gim_schedule WHERE id='$iid'";
				$res_sche = mysqli_query($conn, $sche);
				
				$row_sche = mysqli_fetch_array($res_sche);
				
				echo $row_sche['date']; ?></span>
                    </li>
                </ul>
                <ul class="align-self-center order2">
                    <li>
                        <img src="data:image/png;base64,<?php echo $n->image->content; ?>" alt="Profile Photo"
                            title="Profile Photo" width="120" />
                    </li>
                </ul>
            </div>
        </div>
        <div class="container student-details student-details1">
            <div class="row justify-center">
                <h2 class="text-center align-self-center">Fields of your PIQ choice :</h2>
                <ul class="d-flex piq align-self-center text-center">
                    <li><?php echo $first; ?></li>
                    <li><?php echo $second; ?></li>
                </ul>
            </div>
        </div>
        <div class="container student-details">
            <h2 class="text-center blue">Your GIM Eligibility Fields</h2>
            <div class="row">
                <table class="text-center" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Field Name</th>
                        <th>Grade</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Master in <?php echo $cou[0]; ?></td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Master in <?php echo $cou[1]; ?></td>
                        <td>B</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Master in <?php echo $cou[2]; ?></td>
                        <td>C</td>
                    </tr>
                    <!-- <tr>
                        <td>4.</td>
                        <td>Master in <?php echo $cou[3]; ?></td>
                        <td>D</td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Master in <?php echo $cou[4]; ?></td>
                        <td>E</td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Master in <?php echo $cou[5]; ?></td>
                        <td>F</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Master in <?php echo $cou[6]; ?></td>
                        <td>G</td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Master in <?php echo $cou[7]; ?></td>
                        <td>H</td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>Master in <?php echo $cou[8]; ?></td>
                        <td>I</td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>Master in <?php echo $cou[9]; ?></td>
                        <td>J</td>
                    </tr> -->
                </table>
            </div>
        </div>
        <div style="display:none" class="container student-details student-details1">
            <div class="row justify-center">
                <h2 class="text-center align-self-center">For Conference Round :</h2>
                <button>View Appointment</button>
            </div>
        </div>
        <h2 class="green text-center">Congratulations!! You have <strong>Passed</strong> this exam.</h2>
        <div class="img">
            <img src="assets/images/gim.png" alt="GIM" title="GIM" class="logo-img"/>
        </div>
    </main>
</body>

</html>