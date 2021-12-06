<?php



include 'config_api.php';




if(isset($_POST['email'])){



	$email = $_POST['email'];

	$ch_qu = "select * from user where `email`='$email'";

	$ch_qu1 = mysqli_query($con,$ch_qu);



	$ch_qu2 = mysqli_fetch_array($ch_qu1);

	if($ch_qu2['logtype']=='Counselor'){

		$logtype  = $ch_qu2['logtype'];

		$username = $ch_qu2['name'];

	}



	if($ch_qu2['logtype'] == 'Admin'){

		$logtype  = $ch_qu2['logtype'];

		$username = $ch_qu2['name'];	

	}



	if($ch_qu2['logtype'] == 'Manager'){

		$logtype  = $ch_qu2['logtype'];

		$username = $ch_qu2['name'];	

	}



	$super_qu = "select * from admin where `email`='$email'";

	$super_qu1 = mysqli_query($con,$super_qu);

	$super_qu2 = mysqli_fetch_array($super_qu1);

	if($super_qu2['logtype'] == 'Super Admin'){

		$logtype = $super_qu2['logtype'];

		$username = $super_qu2['name'];

	}

}



$query ="select * from bulk_lead_followup_type";

$query1 = mysqli_query($con,$query);





if($logtype == 'Counselor'){

		$qu =  "select * from lead_list where `referred_to`='$username'";

	}

	else if($logtype == 'Admin' || $logtype == 'Super Admin' || $logtype == 'Manager') {

		$qu =  "select * from lead_list";

	}

$qu1 = mysqli_query($con,$qu);





$allLeadRecord = mysqli_num_rows($qu1);

$status_wise =  array();

 $status_wise['0 - All'] = $allLeadRecord;



while($query2 =  mysqli_fetch_array($query1)){

	$count = 0;

	if($logtype == 'Counselor'){

		$qu =  "select * from lead_list where `referred_to`='$username'";

	}

	else if($logtype== 'Admin' || $logtype == 'Super Admin' || $logtype == 'Manager'){

	$qu =  "select * from lead_list";

	}

	$qu1 = mysqli_query($con,$qu);

	while($qu2 = mysqli_fetch_array($qu1)){

		if($qu2['status'] == $query2['followup_type_name']){

			$count++;

		}

	}

	$status_wise[$query2['followup_type_name']] = $count;

}





// unset($status_wise['4 - Walkin']);

// unset($status_wise['5 - Confused']);

// unset($status_wise['8 - Closed']);

// unset($status_wise['6 - Demo']);

// unset($status_wise['7 - Enrolled']);

// $display['status_lead_record'] = $status_wise;

$status_wise['All'] =  $status_wise['0 - All'];

unset($status_wise['0 - All']);

unset($status_wise['10 - RNW Influencer']);





$status_wise['New'] =  $status_wise['1 - New'];

unset($status_wise['1 - New']);



$status_wise['Follow_up'] =  $status_wise['2 - Follow-up'];

unset($status_wise['2 - Follow-up']);



$status_wise['Urgent-Follow-up'] =  $status_wise['3 - Urgent Follow-up'];

unset($status_wise['3 - Urgent Follow-up']);



$status_wise['WALKIN'] = $status_wise['4 - Walkin'];

unset($status_wise['4 - Walkin']);



$status_wise['ENROLLED'] = $status_wise['7 - Enrolled'];

unset($status_wise['7 - Enrolled']);



$status_wise['CLOSED'] = $status_wise['8 - Closed'];

unset($status_wise['8 - Closed']);



$status_wise['CONFUSED'] = $status_wise['5 - Confused'];

unset($status_wise['5 - Confused']);



$status_wise['DEMO'] = $status_wise['6 - Demo'];



unset($status_wise['6 - Demo']);

unset($status_wise['3 - Urgent Follow-up']);

unset($status_wise['9 - Email']);



echo json_encode($status_wise);

// echo json_encode(array('status_record'=>$status_wise));



?>