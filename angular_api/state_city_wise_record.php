<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$con =  mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db Not connected");
$postdata= file_get_contents("php://input");

  $request = json_decode($postdata);

// echo "test";

$name =  $request[1];
$state_city = $request[0];

if(isset($name))
{

		 

		if(@$state_city=='state'){
			 $city  		= "select * from cities where `city_state`='$name'";
			$city1  	= mysqli_query($con,$city);
			$city2  	= mysqli_fetch_all($city1, MYSQLI_ASSOC);
			$record 	= array('city'=>$city2);
		}
		else if(@$state_city=='city'){
			 $city_area  = "select area_name from city_area where `city_name`='$name'";
			$city_area1 = mysqli_query($con,$city_area);
			$city_area2 = mysqli_fetch_all($city_area1, MYSQLI_ASSOC);
			$record 	= array('city_area'=>$city_area2);
		}

}
echo json_encode($record);
?>