<?php 

$con = mysqli_connect("localhost","root","12345","chat");
session_start();


echo $q = "UPDATE login_details SET last_activity = now() WHERE login_details_id = '".$_SESSION['login_details_id']."'";
$q1 = mysqli_query($con,$q);
//$q2 = mysqli_fetch_all($q1,MYSQLI_ASSOC);
// print_r($q2);

?>