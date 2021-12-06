<?php

include 'config_api.php';


// if(isset($_POST['lead_list_id']))





		if(isset($_POST['lead_list_id']))

		{



			$lead_list_data = $_POST['lead_list_id'];

			// $mobile = $_POST['mobile_no'];

			$q = "select * from lead_list_history where (`leadListId`='$lead_list_data') ";

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

echo json_encode($query3);

?>