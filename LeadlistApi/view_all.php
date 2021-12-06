<?php

include 'config_api.php';


$channel   = "select channel_name,channel_id from channel";

$cha1  =  mysqli_query($con,$channel);

$ch = mysqli_fetch_all($cha1, MYSQLI_ASSOC);



$source   = "select source_name,channel_source_id from lead_source";

$source1  =  mysqli_query($con,$source);

$source2 = mysqli_fetch_all($source1, MYSQLI_ASSOC);



$status   = "select * from bulk_lead_followup_type";

$status1  =  mysqli_query($con,$status);

$status2  = mysqli_fetch_all($status1, MYSQLI_ASSOC);



$sub_status   = "select * from bulk_lead_followup_subtype";

$sub_status1  =  mysqli_query($con,$sub_status);

$sub_status2  = mysqli_fetch_all($sub_status1, MYSQLI_ASSOC);



$followup   = "select * from list_follow_up_mode";

$followup1  =  mysqli_query($con,$followup);

$followup2  = mysqli_fetch_all($followup1, MYSQLI_ASSOC);



$state   = "select * from state";

$state1  =  mysqli_query($con,$state);

$state2  = mysqli_fetch_all($state1, MYSQLI_ASSOC);



$city   = "select * from cities";

$city1  =  mysqli_query($con,$city);

$city2  = mysqli_fetch_all($city1, MYSQLI_ASSOC);



$city_area   = "select * from city_area";

$city_area1  =  mysqli_query($con,$city_area);

$city_area2  = mysqli_fetch_all($city_area1, MYSQLI_ASSOC);



$branch   = "select branch_id,branch_code from branch";

$branch1  =  mysqli_query($con,$branch);

$branch2 = mysqli_fetch_all($branch1, MYSQLI_ASSOC);



$depart   = "select department_id,department_name,branch_id from department";

$depart1  =  mysqli_query($con,$depart);

$depart2 = mysqli_fetch_all($depart1, MYSQLI_ASSOC);



$course_array =  array();

$cours   =  "select course_id,course_name from course";

$cours1  =  mysqli_query($con,$cours);





$refe = "select name from user where `logtype`='Counselor'";

$refe1 =  mysqli_query($con,$refe);

$refer1 = mysqli_fetch_all($refe1, MYSQLI_ASSOC);



$i=0;

while($qu =  mysqli_fetch_assoc($cours1))

{

	 $course_array[$i] =  $qu;

	 $i++;

}



$package   =  "select package_id,package_name from package";

$package1  =  mysqli_query($con,$package);

$package2  =  mysqli_fetch_all($package1, MYSQLI_ASSOC);



echo json_encode(array('channel'=>$ch,'source'=>$source2,'status'=>$status2,'sub_status'=>$sub_status2,'followup_mode'=>$followup2,'state'=>$state2,'city'=>$city2,'city_area'=>$city_area2,'branch'=>$branch2,'department'=>$depart2,'package'=>$package2,'course'=>$course_array,'referred_to'=>$refer1));

?>