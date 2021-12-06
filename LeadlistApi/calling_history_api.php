<?php

include 'config_api.php';

mysqli_set_charset($con, "utf8mb4"); 



// if(isset($_POST['lead_list_id']))

if(isset($_POST['email']))

{

	$email =  $_POST['email'];

	$que = "select * from user where `email`='$email'";
	$que12 = "select * from admin where `email`='$email'";

	$que1 = mysqli_query($con,$que);
	$que123 = mysqli_query($con,$que12);

	$num = mysqli_num_rows($que1);
	$num1 = mysqli_num_rows($que123);

	if($num == 1 || $num1 == 1)

	{

		
		if($num==1){
			$que2 = mysqli_fetch_array($que1);
			$user_id  = $que2['user_id'];
		} else {
			$que23 = mysqli_fetch_array($que123);
			$user_id  = $que23['id'];
		}


		if(isset($_POST['lead_list_id']) && isset($user_id))

		{



			$lead_list_data = $_POST['lead_list_id'];

			// $mobile = $_POST['mobile_no'];

			 $q = "select * from lead_followup_history where (`recepient_id`='$lead_list_data')";

			

			$q1 = mysqli_query($con,$q);

			$num = mysqli_num_rows($q1);



			if($num > 0)

			{

				$query3 = array();

				while($q2 = mysqli_fetch_assoc($q1))

				{

					$query3[] = $q2;

				}



				

			}

		}

	}

}

// echo json_encode($query3);

 echo json_encode($query3,JSON_UNESCAPED_UNICODE);

?>