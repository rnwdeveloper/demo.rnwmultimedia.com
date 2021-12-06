<?php 

$con  = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db not connected");



if(isset($_POST['email']) && !empty($_POST['email']))
{
	$email = $_POST['email'];


		$q = "SELECT * FROM admin WHERE email='$email'";
	$q1 = mysqli_query($con,$q);
	$num = mysqli_num_rows($q1);

	if($num == 0)
	{
			$q = "SELECT * FROM user WHERE email='$email'";
			$q1 = mysqli_query($con,$q);
			$num = mysqli_num_rows($q1);
	}

	if($num == 0)
	{
			$q = "SELECT * FROM faculty WHERE email='$email'";
			$q1 = mysqli_query($con,$q);
			$num = mysqli_num_rows($q1);
	}

	if($num == 0)
	{
			$q = "SELECT * FROM hod WHERE email='$email'";
			$q1 = mysqli_query($con,$q);
			$num = mysqli_num_rows($q1);
	}
	$q2 = mysqli_fetch_assoc($q1);

	if($num == 1){


				$data['status'] = 1;
				$pall = explode(',',$q2['f_permission']);
				$a = "SELECT * FROM f_module";
				$a1 = mysqli_query($con,$a);
				$jjall = mysqli_fetch_all($a1,MYSQLI_ASSOC);
				
				foreach ($jjall as $key => $value) {
					if(in_array($value['f_module_name'], $pall))
					{
						$data['data'][] = $value;
					}
				}
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
