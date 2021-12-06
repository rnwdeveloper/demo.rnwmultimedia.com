<?php

include('config_api.php');
$select=mysqli_query($con,"select * from user where name='manoj babariya'") or die(mysqli_error($con));
if($select)
{
	while($res=mysqli_fetch_array($select))
	{
		$token=$res['token'];
		echo $token;
	}
}
else
{
	echo "na";
}


?>