<?php


include 'config_api.php';


$job   = "select * from application_job";

$job1  =  mysqli_query($con,$job);

$job2 = mysqli_fetch_all($job1, MYSQLI_ASSOC);



echo json_encode(array('Student'=>$job2));





?>