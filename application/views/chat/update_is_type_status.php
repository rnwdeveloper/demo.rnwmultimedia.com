<?php 

include('connection.php');

session_start();


$q = "UPDATE login_details SET is_type = '".$_POST["is_type"]."' WHERE login_details_id = '".$_SESSION["login_details_id"]."' ";
$q1 = mysqli_query($con,$q);

?>