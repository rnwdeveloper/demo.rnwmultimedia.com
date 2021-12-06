<?php

$con  = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db not connected");

$query = "select * from application_job";
$query1 = mysqli_query($con,$query);

while($query2 = mysqli_fetch_assoc($query1))
{
	$record[]  = $query2;
}

echo json_encode($record);

?>