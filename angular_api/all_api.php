<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$con =  mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db Not connected");



$source   	= "select source_name from lead_source";
$source1  	= mysqli_query($con,$source);
$source2 	= mysqli_fetch_all($source1, MYSQLI_ASSOC);

$branch   	= "select branch_id,branch_code from branch";
$branch1  	= mysqli_query($con,$branch);
$branch2 	= mysqli_fetch_all($branch1, MYSQLI_ASSOC);

$depart   	= "select department_id,department_name,branch_id from department";
$depart1  	= mysqli_query($con,$depart);
$depart2 	= mysqli_fetch_all($depart1, MYSQLI_ASSOC);

$course_array =  array();
$cours   	= "select course_id,course_name from course";
$cours1  	= mysqli_query($con,$cours);

$package   	= "select package_id,package_name from package";
$package1  	= mysqli_query($con,$package);
$package2  	= mysqli_fetch_all($package1, MYSQLI_ASSOC);

$state   	= "select * from state";
$state1  	=  mysqli_query($con,$state);
$state2  	= mysqli_fetch_all($state1, MYSQLI_ASSOC);

$city   	= "select * from cities";
$city1  	=  mysqli_query($con,$city);
$city2  	= mysqli_fetch_all($city1, MYSQLI_ASSOC);

$city_area  = "select * from city_area";
$city_area1 =  mysqli_query($con,$city_area);
$city_area2 = mysqli_fetch_all($city_area1, MYSQLI_ASSOC);


$i=0;
while($qu =  mysqli_fetch_assoc($cours1))
{
	 $course_array[$i] =  $qu;
	 $i++;
}


echo json_encode(array('source'=>$source2,'state'=>$state2,'city'=>$city2,'city_area'=>$city_area2,'branch'=>$branch2,'department'=>$depart2,'package'=>$package2,'course'=>$course_array));
?>