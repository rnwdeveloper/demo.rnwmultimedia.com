<?php

ob_start();
include 'config_api.php';




$branch   = "select branch_id,branch_code from branch";

$branch1  =  mysqli_query($con,$branch);

$branch2 = mysqli_fetch_all($branch1, MYSQLI_ASSOC);



$depart   = "select * from department";

$depart1  =  mysqli_query($con,$depart);

$depart2 = mysqli_fetch_all($depart1, MYSQLI_ASSOC);



$user   = "select user_id,logtype,name,email from user";

$user1  =  mysqli_query($con,$user);

$user2 = mysqli_fetch_all($user1, MYSQLI_ASSOC);







echo json_encode(array('branch'=>$branch2,'department'=>$depart2,'Faculty'=>$user2));

?>