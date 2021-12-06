<?php




include 'config_api.php';


// mysqli_set_charset($con,"utf8mb4_bin");



// if(!empty($_POST['mobile']))

// {

// 	$mobile = $_POST['mobile'];

// 	$query = "select * from lead_list where `mobile_no`='$mobile' OR `alternate_mobile_no`='$mobile' OR `father_mobile_no`='$mobile'";

// 	$query1 = mysqli_query($con,$query);

// 	if(mysqli_num_rows($query1) > 0){



// 	$query2 = mysqli_fetch_assoc($query1);

// 		$record =  array('status'=>1,'msg'=>"Found Record",'data'=>$query2);

// 	echo json_encode($record);

// 	}

// 	else

// 	{

// 		$record =  array('status'=>0,'msg'=>"No Record Found",'data'=>array());

// 		echo json_encode($record);

// 	}

// }



if(!empty($_POST['data']) && !empty($_POST['email'])){



	$data =  $_POST['data']; 

	$email = $_POST['email'];





	// $data =  "Follow_up"; 

	// $email = "hitesdesai@gmail.com";



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

	if($super_qu2['logtype'] == 'Super Admin')

	{

		 $logtype = $super_qu2['logtype'];

		$username = $super_qu2['name'];

	}





	if($data == 'All'){

		if($logtype == 'Counselor'){

			 $query =  "select * from lead_list where `referred_to`='$username'";

		}

		else if($logtype == 'Admin' || $logtype == 'Super Admin' || $logtype == 'Manager') {

			 $query =  "select * from lead_list";



		}

	}

	else if($data == 'New'){

		if($logtype == 'Counselor'){

			$query ="select * from lead_list where `status`='1 - New' AND `referred_to`='$username'";

		}

		else if($logtype == 'Admin' || $logtype == 'Super Admin' || $logtype == 'Manager') {

			$query ="select * from lead_list where `status`='1 - New'";

		}

	}

	else if($data == 'Follow_up'){

		if($logtype == 'Counselor'){

			$query ="select * from lead_list where `status`='2 - Follow-up' AND `referred_to`='$username'";

		}

		else if($logtype == 'Admin' || $logtype == 'Super Admin' || $logtype == 'Manager') {

			$query ="select * from lead_list where `status`='2 - Follow-up'";

		}

	}

	else if($data == 'Urgent_Follow_up'){

		if($logtype == 'Counselor'){

			$query ="select * from lead_list where `status`='3 - Urgent Follow-up' AND `referred_to`='$username'";

		}

		else if($logtype == 'Admin' || $logtype == 'Super Admin' || $logtype == 'Manager') {

			$query ="select * from lead_list where `status`='3 - Urgent Follow-up'";

		}

	}

	else if($data == 'WALKIN'){

		if($logtype == 'Counselor'){

			$query ="select * from lead_list where `status`='4 - Walkin' AND `referred_to`='$username'";

		}

		else if($logtype == 'Admin' || $logtype == 'Super Admin' || $logtype == 'Manager') {

			$query ="select * from lead_list where `status`='4 - Walkin'";

		}

	}

	else if($data == 'ENROLLED'){

		if($logtype == 'Counselor'){

			$query ="select * from lead_list where `status`='7 - Enrolled' AND `referred_to`='$username'";

		}

		else if($logtype == 'Admin' || $logtype == 'Super Admin' || $logtype == 'Manager') {

			$query ="select * from lead_list where `status`='7 - Enrolled'";

		}

	}

	else if($data == 'CLOSED'){

		if($logtype == 'Counselor'){

			$query ="select * from lead_list where `status`='8 - Closed' AND `referred_to`='$username'";

		}

		else if($logtype == 'Admin' || $logtype == 'Super Admin' || $logtype == 'Manager') {

			$query ="select * from lead_list where `status`='8 - Closed' ";

		}

	}

	else if($data == 'CONFUSED'){

		if($logtype == 'Counselor'){

			$query ="select * from lead_list where `status`='5 - Confused' AND `referred_to`='$username'";

			}

		else if($logtype == 'Admin' || $logtype == 'Super Admin'  || $logtype == 'Manager') {

			$query ="select * from lead_list where `status`='5 - Confused' ";

		}

	}

	else if($data == 'DEMO'){

		if($logtype == 'Counselor'){

			$query ="select * from lead_list where `status`='6 - Demo' AND `referred_to`='$username'";

		}

		else if($logtype == 'Admin' || $logtype == 'Super Admin' || $logtype == 'Manager') {

			$query ="select * from lead_list where `status`='6 - Demo' ";

		}



	}





	$query1 = mysqli_query($con,$query);

	  $num    = mysqli_num_rows($query1);

	 

	

	 $query4 = array();

	if($num != 0){

		

		while($query3 = mysqli_fetch_assoc($query1))

		{

			

			$query3['any_remarks'] = substr($query3['any_remarks'],0,15);

			$query4[] = $query3;

			

		}

	}

	else

	{

		$query4 =  array("Record Not found");

	}

}



// print_r($query2);

// exit;

echo json_encode(array("data" => $query4));

// print_r($query2);



?>