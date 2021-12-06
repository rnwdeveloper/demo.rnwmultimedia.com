<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$con =  mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db Not connected");


$postdata= file_get_contents("php://input");


 	  $mobile =  $postdata;
	 
 	
			$query = "select * from lead_list where `alternate_mobile_no`='$postdata'";
		 	$query1 =  mysqli_query($con,$query);
		 	$query2 = mysqli_num_rows($query1);
		 	if($query2 == 1){
		 		$data =  mysqli_fetch_assoc($query1);
		 		$record  = array('status'=>1,'record'=>$data);
		 	}else{
		 		$record  = array('status'=>0);
			}
	
echo json_encode($record);

 


?>