<?php


include 'config_api.php';


	// date_default_timezone_set('Asia/Kolkata');  

	 // $currentTime = date( 'm/d/Y h:i A', time ());

	 // $cutim = substr($currentTime,0,10);



	 if(isset($_POST['email']))

	 {

	 	 // $cutim = $_POST['followup_date'];



	 	 $email = $_POST['email'];



	 	 // $followup_date = $_POST['followup_date'];



	 	 $qu = "select * from `user` where `email`='$email'";



	 	 $qu1 = mysqli_query($con,$qu);

	 	 $qu2 = mysqli_fetch_array($qu1);

	 	 if($qu2['logtype']=='Counselor'){

			 $logtype  = $qu2['logtype'];

			 $username = $qu2['name'];

		 }



		if($qu2['logtype'] == 'Admin'){

			$logtype  = $qu2['logtype'];

			$username = $qu2['name'];	

		}

	 	 // print_r($query2);



		$super_qu = "select * from admin where `email`='$email'";

		$super_qu1 = mysqli_query($con,$super_qu);

		$super_qu2 = mysqli_fetch_array($super_qu1);

		if($super_qu2['logtype'] == 'Super Admin')

		{

			$logtype = $super_qu2['logtype'];

			$username = $super_qu2['name'];

		}



	 	 $name = $qu2['name'];





	    // $query ="select * from lead_list where `referred_to`='$name' AND `next_action_date` LIKE '$cutim%' AND `followup_status_red`='red'";

	 	if($logtype == 'Counselor'){

	    	$query ="select * from lead_list where `referred_to`='$name' AND `followup_status_red`='red'";

		}

		else if($logtype == 'Admin' || $logtype == 'Super Admin') {

			$query ="select * from lead_list where  `followup_status_red`='red'";

		}



		$query1 = mysqli_query($con,$query);

	



		$data = array();

		while($query2 = mysqli_fetch_assoc($query1))

		{

			$data[] = $query2;

		}



		echo json_encode($data);

	}





?>