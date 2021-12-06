<?php
include('config_api.php');
if($_POST)
{


	$name=$_POST['name'];
	$password=$_POST['password'];
	$token=$_POST['token'];

	

	$update=mysqli_query($con,"update user set token='$token' where name='$name'");
	if($update)
	{
		$response['update']="succes";
		$response['token']=$token;
	}
$info=array();
$result = mysqli_query($con,"SELECT * FROM user WHERE name='" . $_POST['name'] . "' and password = '". $_POST['password']."'");
            
            if($row  = mysqli_fetch_array($result)) 
            {
                
                $response['success']=1;
                $info[]=array(
                	"name" => $row['name'],
                );
                $response['data']=$info;
            } 
            else
             {
             	$response['success']=0;
         
            }

            //include('notification.php');

	 header('Content-Type: application/json;charset=utf-8');
                            
      echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
?>