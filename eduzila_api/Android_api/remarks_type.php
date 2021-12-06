<?php
	$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));
//user_type=
//1 faculty
//2 counceller
$user_type=$_POST['user_type'];
$select=mysqli_query($con,"select * from android_remarks_type where user_type='$user_type'") or die(mysqli_error($con));
$info=array();
if($select)
{
	while($res=mysqli_fetch_array($select))
	{
		$info[]=array(
			"type_id"=>$res['type_id'],
			"type_name"=>$res['type_name'],
		);
	}
}
$response['data']=$info;

header('Content-Type: application/json;charset=utf-8');                            
echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>