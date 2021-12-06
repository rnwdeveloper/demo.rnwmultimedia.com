<?php

$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));

date_default_timezone_set('Asia/Kolkata');
 $current_date = date( 'd-m-Y', time () );

$lead_type=$_POST['lead_type'];
$user_name=$_POST['user_name'];


//lead type  1 -new    0 - old
if($lead_type == "1")
{
	$query=mysqli_query($con,"select * from bulk where assign_date='$current_date' and assign_to='$user_name'") or die(mysqli_error($con));
}
else if($lead_type == "0")
{
	$query=mysqli_query($con,"select * from bulk where assign_date < '$current_date' and assign_to='$user_name'") or die(mysqli_error($con));

}
  mysqli_num_rows($query);
$info=array();
	if(mysqli_num_rows($query) > 0)
	{

		while($res=mysqli_fetch_array($query))
		{
			$response['status'] = 1;

			$info[]=array(
				"id" => $res['id'],
				"timestemp" => $res['timestemp'],
				"name_of_school_or_classes" => $res['name_of_school_or_classes'],
				"student_name" => $res['student_name'],
				"Intrested_subjects" => $res['Intrested_subjects'],
				"lead_assign_date" => $res['assign_date'],
				"followup_status" => $res['followup_status']
			);
		}
	} 
	else
	{
		$response['status']=0;
	}
 
 $response['data']=$info;
header('Content-Type: application/json;charset=utf-8');
                            
      echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>