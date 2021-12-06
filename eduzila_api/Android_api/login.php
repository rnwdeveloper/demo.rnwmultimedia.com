<?php

$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));


 $email=$_POST['email'];
 $password=$_POST['password'];
 $mac_address =  $_POST['mac_address'];
 $android_token=$_POST['device_token'];

 $user=mysqli_query($con,"select * from user where email='$email' and password='$password' AND `student_finder_app_status`= '1'") or die(mysqli_error($con));
$faculty=mysqli_query($con,"select * from faculty where email='$email' and password='$password' AND `student_finder_app_status`= '1'") or die(mysqli_error($con));

$row_user= mysqli_num_rows($user);
  $row_faculty=mysqli_num_rows($faculty);
$info=array();
if($row_user > 0)
{


			$get_token=mysqli_query($con,"select lead_followup_android_devicetoken from user where email='$email' and password='$password' AND `status`='0'") or die(mysqli_error($con));
	//other=0
	while($res=mysqli_fetch_array($user))
	{
			$info[]=array(
				"user_type" => 0,
				"email"=>$res['email'],
				"password" => $res['password'],
				"user_name" => $res['name']
			);
		 
		 
	}
	$user_all = "select mac_address,user_id from user where email='$email' and password='$password' AND `student_finder_app_status`= '0'";
	$user_all_ch = mysqli_query($con,$user_all);
	$user_all_data = mysqli_fetch_array($user_all_ch);
	
	$user_id_mc = $user_all_data['user_id'];
	if($user_all_data['mac_address']=='')
	{
	 $mc_up = "update user set `mac_address`='$mac_address' where `user_id`='$user_id_mc'";
		
		$mc_up1 = mysqli_query($con,$mc_up);
		if($mc_up1)
		{
			$check_mc_user = 0;
		}
		else
		{
			$check_mc_user = 1;
		}
	}
	else if($user_all_data['mac_address']==$mac_address)
	{
		$check_mc_user = 0;
	}
	else
	{
		$check_mc_user = 1;
	}
	$user = 0;
	
}
else
{
	$user  = 1;

	 
}


if($row_faculty > 0)
{

	$get_token=mysqli_query($con,"select lead_followup_android_devicetoken from faculty where email='$email' and password='$password' AND `status`='0'") or die(mysqli_error($con));

	$row=mysqli_fetch_array($get_token);
 $tk= $row['lead_followup_android_devicetoken'];
   


	if(strcmp($tk,"") == 0)
	{
		

			// $a=explode(',', $tk);
			// print_r($a);
		
		$update=mysqli_query($con,"update faculty set lead_followup_android_devicetoken='$android_token' where  email='$email' and password='$password' AND `status`='0'") or die(mysqli_error($con));
		$success="updated";
	}
	else
	{
		$a=explode(',', $tk);
		//$a[]=$android_token;
		//print_r($a);
		if (in_array($android_token, $a))
		  {
		  // echo "Match found";
		  }
		else
		  {
		  $a[]=$android_token;
		  $tokens=implode(',', $a);
		  //print_r($a);
					$update=mysqli_query($con,"update faculty set lead_followup_android_devicetoken='$tokens' where  email='$email' and password='$password' AND `status`='0'") or die(mysqli_error($con));
					$success="updated append";
				}
	}


	//faculty=1
	
		while($res=mysqli_fetch_array($faculty))
	{
		$image_path = "https:://demo.rnwmultimedia.com/dist/img/";
		$img = $res['image'];
		$imm = $image_path.$img;

		$info[]=array(
		 "email" => $res['email'],
		 "password" => $res['password'],
		 "user_name" => $res['name'],
		 // "token" => $res['lead_followup_android_devicetoken'],
		 // "success" => $success,
		 'role' => $res['designation'],
		 'phone' => $res['phone'],
		 'logtype' => $res['logtype'],
		 'branch_id' => $res['branch_ids'],
		 'department_id' => $res['department_id'],
		 'image' => $imm
 		);

	}


	$faculty_all = "select mac_address,faculty_id from faculty where email='$email' and password='$password' AND `student_finder_app_status`= '0'";
	$faculty_all_ch = mysqli_query($con,$faculty_all);
	$faculty_all_data = mysqli_fetch_array($faculty_all_ch);
	
	$faculty_id_mc = $faculty_all_data['faculty_id'];
	if($faculty_all_data['mac_address']=='')
	{
	   $mc_up_fa = "update faculty set `mac_address`='$mac_address' where `faculty_id`='$faculty_id_mc'";
		
		$mc_up1_fac = mysqli_query($con,$mc_up_fa);
		if($mc_up1_fac)
		{
			$check_mc_faculty = 0;
		}
		else
		{
			$check_mc_faculty = 1;
		}
	}
	else if($faculty_all_data['mac_address']==$mac_address)
	{
		$check_mc_faculty = 0;
	}
	else
	{
		$check_mc_faculty = 1;
	}
	$fac=0;
}
else
{
	$fac = 1;
	
}

if(($user == 1) && ($fac == 1))
{

	http_response_code(403);
	echo json_encode(array('msg'=>"You are not Authorized",'data'=>''));
	exit;
}
else
{

	if($check_mc_user == 1)
	{
		http_response_code(403);
		echo json_encode(array('msg'=>"This is Not Your Device!! Contact Administartor",'data'=>''));
		exit;
	}
	else if($check_mc_faculty == 1)
	{
		http_response_code(403);
		echo json_encode(array('msg'=>"This is Not Your Device!! Contact Administartor",'data'=>''));
		exit;
	}
	else
	{
		$response['data']=$info;
		header('Content-Type: application/json;charset=utf-8');
		echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
	}
}

?>