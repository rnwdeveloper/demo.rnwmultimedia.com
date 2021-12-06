<?php


include 'config_api.php';



$faculty   = "select faculty_id,name,email,image,designation,phone,crm_mac_id,app_admin,personal_no,status from faculty";

$faculty1  =  mysqli_query($con,$faculty);

$faculty2 = mysqli_fetch_all($faculty1, MYSQLI_ASSOC);



$branch   = "select * from branch";

$branch1  =  mysqli_query($con,$branch);

$branch2 = mysqli_fetch_all($branch1, MYSQLI_ASSOC);







echo json_encode(array('Faculty'=>$faculty2, 'Branch'=>$branch2));





?>