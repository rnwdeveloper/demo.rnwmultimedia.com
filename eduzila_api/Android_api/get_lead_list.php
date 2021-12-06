<?php

$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));

date_default_timezone_set('Asia/Kolkata');
 $current_date = date( 'Y-m-d', time () );


$user_name=$_POST['user_name'];
 $followup_status=$_POST['followup_status'];


$limit = 3;  
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  





if($followup_status  == 0)
{
	
	$query=mysqli_query($con,"select * from bulk_lead where assign_to='$user_name' LIMIT $start_from, $limit") or die(mysqli_error($con));

}else
{
	$query=mysqli_query($con,"select * from bulk_lead where status='$followup_status' and assign_to='$user_name' LIMIT $start_from, $limit") or die(mysqli_error($con));
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
				"timestemp" => $res['time_stemp'],
				"name_of_school_or_classes" => $res['school_collage'],
				"student_name" => $res['name'],
				"Intrested_subjects" => $res['intersting_field'],
				"intresting_rating" => $res['intresting_rating'],
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