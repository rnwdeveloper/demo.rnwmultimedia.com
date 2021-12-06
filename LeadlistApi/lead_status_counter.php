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





	







unset($status_wise['3 - Urgent Follow-up']);

unset($status_wise['9 - Email']);

unset($status_wise['4 - Walkin']);

unset($status_wise['5 - Confused']);

unset($status_wise['8 - Closed']);

unset($status_wise['6 - Demo']);

unset($status_wise['7 - Enrolled']);

unset($status_wise['10 - RNW Influencer']);

// $display['status_lead_record'] = $status_wise;

$status_wise['All'] =  $status_wise['0 - All'];

unset($status_wise['0 - All']);



$status_wise['New'] =  $status_wise['1 - New'];

unset($status_wise['1 - New']);



$status_wise['Follow_up'] =  $status_wise['2 - Follow-up'];

unset($status_wise['2 - Followup-up']);



//TOday follow up counting start

date_default_timezone_set("Asia/Calcutta");	

$current_date =  date('m/d/Y');

	if($logtype == 'Counselor'){

		

$pending_followup =  "select * from lead_list where (`referred_to`='$username') AND (`existing_follow_up_mode`='Schedule Walk-Ins' OR `existing_follow_up_mode`='Manual - Take Follow Up Call') AND (`next_followup_date` LIKE '$current_date%')";

}

else if($logtype == 'Admin'  || $logtype == 'Super Admin' || $logtype == 'Manager') {

	$pending_followup =  "select * from lead_list where (`existing_follow_up_mode`='Schedule Walk-Ins' OR `existing_follow_up_mode`='Manual - Take Follow Up Call') AND (`next_followup_date` LIKE '$current_date%')";

}

$pending_followup1 = mysqli_query($con,$pending_followup);

$pending_followup2 =  mysqli_num_rows($pending_followup1);

$status_wise['Today followups'] =  $pending_followup2;

//Today follow up counting end







date_default_timezone_set("Asia/Calcutta");	

$previous_date =  date('m/d/Y h:i A',strtotime("-1 days"));

$one_month_date =  date('m/d/Y h:i A',strtotime("-30 days"));

	if($logtype == 'Counselor'){



$pending = "SELECT * FROM lead_list WHERE (`referred_to`='$username') AND (`existing_follow_up_mode`='Schedule Walk-Ins' OR `existing_follow_up_mode`='Manual - Take Follow Up Call') AND  (`followup_status_red`='red')";

}else if($logtype == 'Admin'  || $logtype == 'Super Admin' || $logtype == 'Manager') {

	$pending = "SELECT * FROM lead_list WHERE  (`existing_follow_up_mode`='Schedule Walk-Ins' OR `existing_follow_up_mode`='Manual - Take Follow Up Call') AND   (`followup_status_red`='red')";



}

$pending1 = mysqli_query($con,$pending);

// $result = "select * from lead_list where  `next_followup_date` >= DATE_SUB($previous_date, INTERVAL 1 MONTH)";

// $result1 = mysqli_query($con,$result);

$pending2 = mysqli_num_rows($pending1);

$status_wise['Pending followups'] =  $pending2;



if($logtype == 'Counselor'){

		$query ="select * from lead_list where `status`='3 - Urgent Follow-up' AND `referred_to`='$username'";

	}

	else if($logtype == 'Admin' || $logtype == 'Super Admin' || $logtype == 'Manager') {

		$query ="select * from lead_list where `status`='3 - Urgent Follow-up'";

	}



$query1 = mysqli_query($con,$query);

$query2   = mysqli_num_rows($query1);

$status_wise['Urgent Follow-up'] = $query2;

$status_wise['missed calls'] = 0;







// $display['counter'] = $statu

$output = $status_wise;  

echo json_encode($output);





?>