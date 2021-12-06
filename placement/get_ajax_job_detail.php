<?php
include('db.php');

if(isset($_POST['jobpost_id']))
{
	$id =  $_POST['jobpost_id'];
	$qu ="select * from job_post where `jobpost_id`='$id'";
	$qu1 = mysqli_query($con,$qu);
	$qu2 = mysqli_fetch_array($qu1);
	echo json_encode($qu2);
}

?>