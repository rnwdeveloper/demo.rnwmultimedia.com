<?php


$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));
//mysqli_set_charset('utf8mb4');



 $user_name=$_POST['user_name'];
$sql=mysqli_query($con,"insert into test(`user_name`) values('$user_name')") or die(mysqli_error($con));
if($sql)
{
	$response['status']=1;
}
else
{
	$response['status']=0;
}


$sql1=mysqli_query($con,"select * from test");
while($res=mysqli_fetch_array($sql1))
{
	$response['user_name']=$res['user_name'];
}
header('Content-Type: application/json;charset=utf-8');
                            
      echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>