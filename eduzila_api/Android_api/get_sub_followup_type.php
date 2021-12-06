<?php

$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));

date_default_timezone_set('Asia/Kolkata');
 $current_date = date( 'Y-m-d', time () );


$followup_type_id=$_POST['followup_type_id'];

$sql=mysqli_query($con,"select * from bulk_lead_followup_subtype where followup_type_id='$followup_type_id'") or die(mysqli_error($con));
$inf0=array();
if(mysqli_num_rows($sql) > 0)
{
	while($res=mysqli_fetch_array($sql))
	{
		$info[]=array(
				"sub_type_name" => $res['sub_type_name'],
				"subtype_id" => $res['subtype_id']
		);
	}
}


$response['data']=$info;
header('Content-Type: application/json;charset=utf-8');
echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

?>