<?php 

$con  = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db not connected");



if(isset($_POST['email']) && !empty($_POST['email']  && !empty($_POST['password'])))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$q = "SELECT * FROM admin WHERE email='$email' AND password ='$password'";
	$q1 = mysqli_query($con,$q);
	$num = mysqli_num_rows($q1);

	if($num == 0)
	{
			$q = "SELECT * FROM user WHERE email='$email' AND password ='$password'";
			$q1 = mysqli_query($con,$q);
			$num = mysqli_num_rows($q1);
	}

	if($num == 0)
	{
			$q = "SELECT * FROM faculty WHERE email='$email' AND password ='$password'";
			$q1 = mysqli_query($con,$q);
			$num = mysqli_num_rows($q1);
	}

	if($num == 0)
	{
			$q = "SELECT * FROM hod WHERE email='$email' AND password ='$password'";
			$q1 = mysqli_query($con,$q);
			$num = mysqli_num_rows($q1);
	}
	
	$q2 = mysqli_fetch_assoc($q1);

	if($num == 1){

				
				$data['status'] = 1;
				$data['msg'] = "Successfully Login";
				$data['data'][] = $q2;
			
			}
			else
			{
				
				$data['status']=0;
				$data['msg'] = "Invalid email";
			}
					
}
else
{
	$data['status']=0;
	$data['msg'] = "Invalid email";
}

echo json_encode($data);
exit;
?>
