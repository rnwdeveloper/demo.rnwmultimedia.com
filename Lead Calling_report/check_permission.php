<?php

$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));


 $username=$_POST['user_name'];
 

 $user=mysqli_query($con,"select * from user where name='$username'") or die(mysqli_error($con));
$faculty=mysqli_query($con,"select * from faculty where name='$username'") or die(mysqli_error($con));

$row_user= mysqli_num_rows($user);
 $row_faculty=mysqli_num_rows($faculty);

$info=array();
if($row_user > 0)
{
	//other=0
	while($res=mysqli_fetch_array($user))
	{
		$permission=explode(',', $res['permission']);
		// print_r($permission);
		if(in_array("Bulk_Lead=1",$permission))
		{

				$response['status']=1;
						

		}
		else
		{
			
							$response['status']=2;
							//status 2 mean not permisiion 

		}


		 
		 
	}
}
else if($row_faculty > 0)
{
	//faculty=1
		while($res=mysqli_fetch_array($faculty))
	{
		$permission=explode(',', $res['permission']);
		// print_r($permission);
		if(in_array("Bulk_Lead=1",$permission))
		{

				$response['status']=1;
						

		}
		else
		{
			$is_lead_permission=0;
							$response['status']=2;
							//status 2 mean not permisiion 

		}


		
	}
}
else
{//0 mean credential wrong
	$response['status']=0;
}



header('Content-Type: application/json;charset=utf-8');
                            
      echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);


?>