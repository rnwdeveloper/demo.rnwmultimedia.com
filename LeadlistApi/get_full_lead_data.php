<?php




include 'config_api.php';




if(isset($_POST['lead_list_id']))

{



	 $lead_list_id  = $_POST['lead_list_id'];

	$lead_record   = "select * from lead_list where `lead_list_id`='$lead_list_id'";

	$lead_record1  =  mysqli_query($con,$lead_record);

	$lead_record2  = mysqli_fetch_assoc($lead_record1);

	





}

echo json_encode($lead_record2);





?>