<?php include('db.php');

	$query = "select * from application_job where `application_status`='2'";
	$query1 = mysqli_query($con,$query);
	while($query2 = mysqli_fetch_array)
 ?>