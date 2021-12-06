<?php

include 'config_api.php';


// $data =  



if(!empty($_POST['mobile']))

{

	$mobile = $_POST['mobile'];

	$query = "select * from lead_list where `mobile_no`='$mobile' OR `alternate_mobile_no`='$mobile' OR `father_mobile_no`='$mobile'";

	$query1 = mysqli_query($con,$query);

	if(mysqli_num_rows($query1) > 0){



	$query2 = mysqli_fetch_assoc($query1);

	$lead_data =  array();

	$lead_data['lead_list_id'] 		= $query2['lead_list_id'];

	$lead_data['name'] 				= $query2['name'];

	$lead_data['email'] 			= $query2['email'];

	$lead_data['mobile_no'] 		= $query2['mobile_no'];

	$lead_data['campaign_name'] 	= $query2['campaign_name'];

	$lead_data['source_id'] 		= $query2['source_id'];

	$lead_data['status'] 			= $query2['status'];

	$lead_data['sub_status'] 		= $query2['sub_status'];

	$lead_data['channel_id'] 		= $query2['channel_id'];

	$lead_data['referred_to'] 		= $query2['referred_to'];

	$lead_data['branch_id'] 		= $query2['branch_id'];

	$lead_data['department'] 		= $query2['department'];

	$lead_data['course_package']	= $query2['course_package'];

	$lead_data['course_or_package'] = $query2['course_or_package'];

	$lead_data['city'] 				= $query2['city'];

	$lead_data['any_remarks'] 		= $query2['any_remarks'];





	$record =  array('status'=>1);

	echo json_encode($record);

	}

	else

	{

		$record =  array('status'=>0);

		echo json_encode($record);

	}

}





?>