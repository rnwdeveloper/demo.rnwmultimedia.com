<?php
include('config_api.php');
if($_POST)
{


	$name=$_POST['user_name'];
	$password=$_POST['password'];
	



	
$info=array();
$result = mysqli_query($con,"SELECT * FROM test WHERE user_name='" . $name . "' and password = '". $password."'");
            
            if($row  = mysqli_fetch_array($result)) 
            {
                
                $response['success']=1;
                $info[]=array(
                	"name" => $row['user_name'],
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