<?php





include 'config_api.php';






$faculty   = "select faculty_id,name,email,image,designation,phone,crm_mac_id,app_admin,personal_no,status from faculty";

$faculty1  =  mysqli_query($con,$faculty);

$faculty2 = mysqli_fetch_all($faculty1, MYSQLI_ASSOC);



$hod   = "select hod_id,name,email,image,designation,phone,crm_mac_id,app_admin,personal_no,status from hod";

$hod1  =  mysqli_query($con,$hod);

$hod2  = mysqli_fetch_all($hod1, MYSQLI_ASSOC);



$user   = "select user_id,name,email,image,designation,mobile_no,crm_mac_id,app_admin,personal_no,status,branch_ids from user";

$user1  =  mysqli_query($con,$user);

$user2  = mysqli_fetch_all($user1, MYSQLI_ASSOC);





echo json_encode(array('Faculty'=>$faculty2,'HOD'=>$hod2,'User'=>$user2));





?>